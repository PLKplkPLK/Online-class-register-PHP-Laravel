<?php

namespace App\Helpers;

use App\Models\Activity;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

trait ActivityHelper
{
    public function saveActivity(Activity $activity, Request $request): void
    {
        $activity->subject_id = intval($request->subject_id);
        $activity->grade_id = intval($request->grade_id);
        $activity->teacher_id = intval($request->teacher_id);
        if (is_string($request->day) and is_string($request->hour)) {
            $activity->day = $request->day;
            $activity->hour = $request->hour;
        }
        $activity->save();
    }
}
