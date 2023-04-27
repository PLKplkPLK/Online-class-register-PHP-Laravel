<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\View\View;

class WelcomeController extends BaseController
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;

    public function index(): View
    {
        return view('welcome')->with("btn", "aktualnosci");
    }

    public function aktualnosci(): View
    {
        return view('welcome')->with("btn", "aktualnosci");
    }

    public function patron(): View
    {
        return view('welcome')->with("btn", "patron");
    }

    public function kontakt(): View
    {
        return view('welcome')->with("btn", "kontakt");
    }
}
