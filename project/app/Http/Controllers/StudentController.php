<?php

namespace App\Http\Controllers;

use App\Helpers\TeachStudHelper;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    use TeachStudHelper;
    public function index(): View
    {
        $students = Student::sortable()->paginate(10);
        return view('admin.students.index')->with('students', $students);
    }

    public function create(): View
    {
        $grades = Grade::all();
        return view('admin.students.create')->with('grades', $grades);
    }

    /**
     * @throws ValidationException
     */
    public function store(Request $request): Redirector|Application|RedirectResponse
    {
        $this->validatereq($request);

        $student = new Student();
        $student->attendance = serialize(array());
        $student->uwagi = serialize(array());
        $user = new User();
        $password = Hash::make($this->ensureIsString($request->password));
        $user->password = $password;
        $this->updateAndSave($student, $user, $request);
        return redirect('students/');
    }

    public function show(Student $student): View
    {
        $user = $student->user;
        $grade = $student->grade;
        return view('admin.students.show')->with('student', $student)->with('user', $user)->with('grade', $grade);//->with('teacher', $teacher);
    }

    public function edit(Student $student): View
    {
        $user = $student->user;
        $grades = Grade::all();
        return view('admin.students.edit')->with('student', $student)->with('user', $user)->with('grades', $grades);
    }


    /**
     * @throws ValidationException
     */
    public function update(Request $request, Student $student): Redirector|Application|RedirectResponse
    {
        $this->validateReqUpdate($request);
        $this->updatehelper($request, $student);
        return redirect('students/');
    }
    /**
     * @throws ValidationException
     */
    public function update_password(Request $request, Student $student): Redirector|Application|RedirectResponse
    {
        $this->updatePassword($request, $student);
        return redirect('students/');
    }

    public function update_about(Request $request, Student $student): Redirector|Application|RedirectResponse
    {
        $student->about = strval($request->about);
        $student->save();
        return redirect('/myclass/' . $student->user_id);
    }

    public function destroy(Student $student): Redirector|Application|RedirectResponse
    {
        $marks = $student->marks;

        foreach ($marks as $mark) {
            $mark->delete();
        }
        $this->deleteUser($student);
        return redirect('students/');
    }
}
