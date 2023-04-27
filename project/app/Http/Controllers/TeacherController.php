<?php

namespace App\Http\Controllers;

use App\Helpers\TeachStudHelper;
use App\Models\Activity;
use App\Models\Grade;

use App\Models\Marks;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

use function PHPUnit\Framework\isEmpty;

class TeacherController extends Controller
{
    use TeachStudHelper;

    public function index(): View
    {
        $user = User::where('id', Auth::id())->first();
        if ($user!=null and $user->role!= USER::ROLE_ADMIN) {
            return view('error');
        }
        $teachers = Teacher::sortable()->paginate(10);
        return view('admin.teachers.index')->with('teachers', $teachers);
    }

    public function create(): View
    {
        $subjects = Subject::all();
        $grades = Grade::all();
        return view('admin.teachers.create')->with('subjects', $subjects)->with('grades', $grades);
    }

    /**
     * @throws ValidationException
     */
    public function store(Request $request): Redirector|Application|RedirectResponse
    {
        $this->validatereq($request);

        $user = new User();
        $password = Hash::make($this->ensureIsString($request->password));
        $user->password = $password;
        $teacher = new Teacher();
        $this->updateAndSave($teacher, $user, $request);

        if ($teacher->is_class_teacher) {
            $this->saveClassTeacher($request, $user);
        }


        return redirect('teachers/');
    }

    public function show(Teacher $teacher): View
    {
        $user = $teacher->user;
        $subject = $teacher->subject;

        if ($teacher->is_class_teacher) {
            $grade = $teacher->grade;
        } else {
            $grade = null;
        }
        return view('admin.teachers.show')->with('teacher', $teacher)->with('user', $user)->with('subject', $subject)->with('grade', $grade);
    }

    public function edit(Teacher $teacher): View
    {
        $user = $teacher->user;
        $subjects = Subject::all();
        $grades = Grade::all();
        return view('admin.teachers.edit')->with('teacher', $teacher)->with('user', $user)->with('subjects', $subjects)->with('grades', $grades);
    }

    /**
     * @throws ValidationException
     */
    public function update(Request $request, Teacher $teacher): Redirector|Application|RedirectResponse
    {
        $this->validateReqUpdate($request);

        $this->updatehelper($request, $teacher);
        if (($teacher->is_class_teacher) && ($teacher->user instanceof User)) {
            $this->saveClassTeacher($request, $teacher->user);
        } else {
            if (Grade::where('class_teacher_id', $teacher->user_id)->exists()) {
                $grade = $teacher->grade;
                if (!($grade instanceof Grade)) {
                    abort(405);
                }
                $grade->class_teacher_id = 0;
                $grade->save();
            }
        }

        return redirect('teachers/');
    }

    /**
     * @throws ValidationException
     */
    public function update_password(Request $request, Teacher $teacher): Redirector|Application|RedirectResponse
    {
        $this->updatePassword($request, $teacher);
        return redirect('teachers/');
    }

    public function destroy(Teacher $teacher): Redirector|Application|RedirectResponse
    {
        $activities = $teacher->activity;

        foreach ($activities as $activity) {
            $activity->delete();
        }

        $marks = $teacher->marks;

        foreach ($marks as $mark) {
            $mark->delete();
        }

        foreach ($activities as $activity) {
            $activity->delete();
        }

        $grade = $teacher->grade;

        if ($grade instanceof Grade) {
            $grade->class_teacher_id = null;
            $grade->save();
        }

        $this->deleteUser($teacher);
        return redirect('teachers/');
    }

    public function start(): View
    {
        $user = User::where('id', Auth::id())->first();
        $klasy = Grade::whereIn('id', Activity::where('teacher_id', Auth::id())->select('grade_id')->distinct()->get())->get();
        if ($user!=null) {
            $teacher = $user->teacher;
            return view('teachers.start')->with('teacher', $teacher)->with('user', $user)->with('klasy', $klasy);
        } else {
            return view('teachers.start')->with('user', $user);
        }
    }

    public function start2(): View
    {
        $klasa_id = $_GET['klasa_id'];
        $klasa = Grade::findOrFail($klasa_id);
        if (!($klasa instanceof Grade)) {
            return view('error');
        }

        $students = $klasa->students;
        $teacher = Teacher::where('user_id', Auth::id())->first();
        return view('teachers.start2')->with('klasa', $klasa)->with('teacher', $teacher)->with('students', $students);
    }

    public function savemarks(): Application|RedirectResponse|Redirector|View
    {
        $klasa_id = $_GET['klasa_id'];
        $klasa = Grade::where('id', $klasa_id)->first();
        if (!($klasa instanceof Grade)) {
            return view('error');
        }

        $teacher = Teacher::where("user_id", Auth::id())->first();

        if ($teacher != null) {
            foreach ($klasa->students as $student) {
                if (isset($_POST['mark' . $student->user_id]) and $_POST['mark' . $student->user_id] != '') {
                    $ocena = new Marks();
                    $ocena->mark = $_POST['mark' . $student->user_id];
                    $ocena->student_id = $student->user_id;
                    $ocena->subject_id = $teacher->subject_id;
                    $ocena->teacher_id = $teacher->user_id;
                    $ocena->description = $_POST['descr' . $student->user_id];
                    $ocena->save();
                }
                #zapisywana nieobecność w tablicy: attendance["dzien.mies.rok godzina=teacher_id"] = "id_przedmiotu=wiadomość_wpisana_przez_naucz"
                #znak = jest po prostu znakiem rozdzielającym
                if (isset($_POST['attendance' . $student->user_id]) and $student->attendance != null and $_POST['attendance' . $student->user_id] != '') {
                    $obecnosc = unserialize($student->attendance);
                    if (is_array($obecnosc)) {
                        $student->number_of_absences +=1;
                        $przedmiot = $teacher->subject_id;
                        $data = date("d.m.Y G=") . $teacher->user_id;
                        $obecnosc[$data] = $przedmiot . '=' . $_POST['attendance' . $student->user_id];
                        $student->attendance = serialize($obecnosc);
                        $student->save();
                    }
                }
                #zapisywana uwag w tablicy: uwagi["dzien.mies.rok godzina:minuta=teacher_id"] = "treść"
                if (isset($_POST['uwaga' . $student->user_id]) and $student->uwagi != null and $_POST['uwaga' . $student->user_id] != '') {
                    $uwagi = unserialize($student->uwagi);
                    if (is_array($uwagi)) {
                        $data = date("d.m.Y G:i=") . $teacher->user_id;
                        $uwagi[$data] = $_POST['uwaga' . $student->user_id];
                        $student->uwagi = serialize($uwagi);
                        $student->save();
                    }
                }
            }
        }

        $students = $klasa->students;

        return view('teachers.start2')->with('klasa', $klasa)->with('teacher', $teacher)->with('students', $students);
    }


    public function myclass(): View
    {
        $teacher = Teacher::where("user_id", Auth::id())->first();

        if (!($teacher instanceof Teacher)) {
            return view('error');
        }

        if ($teacher->is_class_teacher) {
            $grade = $teacher->grade;
            if (!($grade instanceof Grade)) {
                return view('error');
            }
            $students = $grade->students;
            $activities = $grade->activity;
            $subjects = Subject::all();
            $teachers = Teacher::all();
            return view('teachers.myclass')->with('grade', $grade)->with('students', $students)->with('activities', $activities)->with('subjects', $subjects)->with('teachers', $teachers)->with('flaga', 0);
        } else {
            return view('error');
        }
    }

    public function zajecia(): View
    {
        $tablica = Activity::where('teacher_id', Auth::id())->select('grade_id')->distinct()->get();
        $klasy = Grade::whereIn('id', $tablica)->get();
        $teacher = Teacher::where('user_id', Auth::id())->first();

        return view('teachers.classes')->with('klasy', $klasy)->with('teacher', $teacher);
    }


    public function show_student(Student $student): Factory|\Illuminate\Contracts\View\View|Application
    {
        if ($student->uwagi==null) {
            return view('error');
        }
        $data = unserialize($student->uwagi);
        return view('teachers.show_student')->with('student', $student)->with('data', $data);
    }

    public function delete_absences(Request $request, Student $student): Application|RedirectResponse|Redirector
    {
        $student->number_of_absences = 0;
        $student->attendance = serialize(array());
        $student->save();
        return redirect('myclass/' . $student->user_id);
    }

    public function delete_notes(Request $request, Student $student): Application|RedirectResponse|Redirector
    {
        $student->uwagi = serialize(array());
        $student->save();
        return redirect('myclass/' . $student->user_id);
    }
}
