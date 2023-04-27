<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Student;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function dashboard(): View
    {
        if (!empty(Auth::user())) {
            if (Auth::user()->role == USER::ROLE_ADMIN) {
                $user = Auth::user();
                $messages = Message::where('receiver_id', Auth::id())->orderBy('created_at', 'DESC')->get();

                return view('admin.dashboard_admin')->with('messages', $messages)->with('user', $user);
            } elseif (Auth::user()->role == USER::ROLE_TEACHER) {
                $messages = Message::where('receiver_id', Auth::id())->orderBy('created_at', 'DESC')->get();
                $teacher = Teacher::where('user_id', Auth::id())->first();
                if (!$teacher) {
                    return view('error');
                }
                $przedmiot = $teacher->subject;
                $user = $teacher->user;
                if ($teacher->is_class_teacher) {
                    $grade = $teacher->grade;
                } else {
                    $grade=null;
                }

                return view('teachers.dashboard_teacher')->with('messages', $messages)->with('teacher', $teacher)->with('user', $user)->with('przedmiot', $przedmiot)->with('grade', $grade);
            } else {
                $student = Student::where('user_id', Auth::id())->first();
                if (!$student or !$student->uwagi) {
                    return view('error');
                }
                $user = $student->user;
                $grade = $student->grade;
                $messages = Message::where('receiver_id', Auth::id())->orderBy('created_at', 'DESC')->get();
                $data = unserialize($student->uwagi);

                return view('students.dashboard_student')->with('student', $student)->with('messages', $messages)->with('data', $data)->with('user', $user)->with('grade', $grade);
            }
        } else {
            return view('error');
        }
    }
}
