<?php

namespace App\Helpers;

use App\Models\Grade;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

trait TeachStudHelper
{
    public function ensureIsString(mixed $object): string
    {
        if (gettype($object) != 'string') {
            abort(500, '$object is not a string!');
        }
        return $object;
    }



    /**
     * @throws ValidationException
     */
    public function validatereq(Request $request): void
    {
        $this->validate($request, [
            'name' => 'required|string',
            'surname' => 'required|string',
            'email' => 'required|unique:users,email|email',
            'password' => 'required'
        ]);
    }

    /**
     * @throws ValidationException
     */
    public function validateReqUpdate(Request $request): void
    {
        $this->validate($request, [
            'name' => 'required|string',
            'surname' => 'required|string',
            'email' => 'required'
        ]);
    }

    public function updatehelper(Request $request, Student|Teacher $StOrTc): void
    {
        $user = User::findOrFail($StOrTc->user_id);
        if ($user instanceof User) {
            $this->updateAndSave($StOrTc, $user, $request);
        }
    }

    public function UpdateAndSave(Student|Teacher $StOrTc, User $user, Request $request): void
    {
        $user->surname = $this->ensureIsString($request->surname);
        $user->name= $this->ensureIsString($request->name);
        $user->email = $this->ensureIsString($request->email);
        if ($StOrTc instanceof Student) {
            if (isset($request->about)) {
                $StOrTc->about = $this->ensureIsString($request->about);
            }

            $user->role = USER::ROLE_STUDENT;
            $StOrTc->number_of_absences = 0;
            $StOrTc->class_id = intval($request->class_id);
        } else {
            $user->role = USER::ROLE_TEACHER;
            $StOrTc->is_class_teacher = boolval($request->is_class_teacher);
            $StOrTc->subject_id = intval($request->subject_id);
        }
        $user->save();
        $StOrTc->user_id = $user->id;

        $StOrTc->save();
    }

    public function updatePassword(Request $request, Student|Teacher $StOrTc): void
    {
        $user = User::findOrFail($StOrTc->user_id);
        if ($user instanceof User) {
            $password = Hash::make($this->ensureIsString($request->password));
            $user->password = $password;
            $user->save();
        }
    }

    public function deleteUser(Student|Teacher $model): void
    {
        $id = $model->getKey();
        $user = User::where('id', $id)->first();

        $model->delete();
        if ($user != null) {
            $user->delete();
        }
    }

    public function saveClassTeacher(Request $request, User $user): void
    {
        if (Grade::where('class_teacher_id', $user->id)->exists()) {
            $grade = Grade::where('class_teacher_id', $user->id)->first();

            if (!($grade instanceof Grade)) {
                abort(405);
            }

            $grade->class_teacher_id = null;
            $grade->save();
        }
        $grade = Grade::where('id', $request->class_id)->first();

        if (!($grade instanceof Grade)) {
            abort(405);
        }

        if (!empty($grade->class_teacher_id)) {
            $old_teacher = Teacher::where('user_id', $grade->class_teacher_id)->first();

            if (!($old_teacher instanceof Teacher)) {
                abort(405);
            }
            $old_teacher->is_class_teacher = 0;
            $old_teacher->save();
        }
        $grade->class_teacher_id = $user->id;
        $grade->save();
    }
}
