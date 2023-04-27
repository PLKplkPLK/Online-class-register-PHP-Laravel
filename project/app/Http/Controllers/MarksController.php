<?php

namespace App\Http\Controllers;

use App\Models\Marks;
use App\Models\Teacher;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MarksController extends Controller
{
    public function deletemark(int $mark_id): RedirectResponse
    {
        $mark = Marks::findOrFail($mark_id);
        $mark->delete();
        return redirect('zajecia');
    }

    public function editmarks(Request $request): RedirectResponse
    {
        $oceny=Teacher::findOrFail(Auth::id())->marks;
        foreach ($oceny as $ocena) {
            $name = 'mark'.$ocena->id;

            $ocena->mark = $request->$name;
            $name = 'descr'.$ocena->id;
            if ($request->$name != null) {
                $ocena->description = $request->$name;
            }
            $ocena->save();
        }

        return redirect('zajecia');
    }
}
