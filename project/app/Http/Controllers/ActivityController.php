<?php

namespace App\Http\Controllers;

use App\Helpers\ActivityHelper;
use App\Models\Activity;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{
    use ActivityHelper;
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $activity = Activity::sortable()->paginate(10);
        return view('admin.activities.index')->with('activities', $activity);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        $subjects = Subject::all();
        $grades = Grade::all();
        $teachers = Teacher::all();
        return view('admin.activities.create')->with('subjects', $subjects)->with('grades', $grades)->with('teachers', $teachers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return string
     */
    public function store(Request $request): string
    {
        $teacher = Teacher::findOrFail($request->teacher_id);
        if (!($teacher instanceof Teacher) || !(Auth::user() instanceof User)) {
            return redirect('error');
        }
        if ($teacher->subject_id != $request->subject_id) {
            if (Auth::user()->role == 1) {
                return redirect('activity/create')->with('flaga_zajecia', 1);
            } else {
                return redirect('myclass')->with('flaga_zajecia', 1);
            }
        }

        $request->validate([
            'day' => 'string',
            'hour' => 'string'
        ]);

        if (Activity::where('teacher_id', $request->teacher_id)->where('hour', $request->hour)->where('day', $request->day)->exists()) {
            $this->store_helper('flaga_data');
        }
        if (Activity::where('grade_id', $request->grade_id)->where('hour', $request->hour)->where('day', $request->day)->exists()) {
            $this->store_helper('flaga_klasa');
        }

        $activity = new Activity();
        $this->saveActivity($activity, $request);
        if (Auth::user()->role == 1) {
            return redirect('activity/');
        } else {
            return redirect('myclass');
        }
    }

    public function store_helper(string $flag): Redirector|Application|RedirectResponse
    {
        if (Auth::user()!=null and Auth::user()->role== 1) {
            return redirect('activity/create')->with($flag, 1);
        } else {
            return redirect('myclass')->with($flag, 1);
        }
    }

    /**
     * Display the specified resource.
     *
     * @return Application|Factory|View
     */
    public function show(Activity $activity): Application|Factory|View
    {
        $teacher = Teacher::where('user_id', $activity->teacher_id)->first();
        $subject = Subject::where('id', $activity->subject_id)->first();
        $grade = Grade::where('id', $activity->grade_id)->first();
        return view('admin.activities.show')->with('activity', $activity)->with('subject', $subject)->with('grade', $grade)->with('teacher', $teacher);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return Application|Factory|View
     */
    public function edit(Activity $activity): Application|Factory|View
    {
        return view('admin.activities.edit')->with('activity', $activity)->with('subjects', Subject::all())->with('grades', Grade::all())->with('teachers', Teacher::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request, Activity $activity): RedirectResponse
    {
        $teacher = Teacher::findOrFail($request->teacher_id);
        $subject_id = $teacher->subject_id ?? '';
        if ($subject_id != $request->subject_id) {
            return back()->with('flaga_zajecia', 1);
        }
        if (Activity::where('teacher_id', $request->teacher_id)->where('day', $request->day)->where('hour', $request->hour)->exists()) {
            return back()->with('flaga_data', 1);
        }
        if (Activity::where('grade_id', $request->grade_id)->where('day', $request->day)->where('hour', $request->hour)->exists()) {
            return back()->with('flaga_klasa', 1);
        }
        $this->saveActivity($activity, $request);
        return redirect('/activity');
    }


    public function destroy(Activity $activity): Redirector|Application|RedirectResponse
    {
        $activity->delete();
        return redirect('/activity');
    }

    public function activity_grade(Request $request, int $id): string
    {
        $request->request->add(['grade_id',$id]);
        return $this->store($request);
    }
}
