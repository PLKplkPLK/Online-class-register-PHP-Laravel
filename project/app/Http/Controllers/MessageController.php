<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class MessageController extends Controller
{
    public function message(Request $request): View
    {
        $user = User::where('id', Auth::id())->first();
        $sender_id=Auth::id();
        $users = User::where('role', '<', 4)->orderBy('role')->orderBy('surname')->orderBy('name')->get();

        if ($request->reply_id!=null and $request->title!=null) {
            $reply_id = $request->reply_id;
            $title = $request->title;
        } else {
            $reply_id = 1;
            $title = '';
        }

        return view('message.message')->with('user', $user)->with('sender_id', $sender_id)->with('users', $users)->with('reply_id', $reply_id)->with('title', $title);
    }

    public function sendmessage(Request $request): Application|RedirectResponse|Redirector
    {
        $request->validate([
            'sender_id' => 'int|required',
            'receiver_id' => 'int|required',
            'title' => 'string|required',
            'message' => 'string|required'
        ]);

        $mess = new \App\Models\Message();
        $mess->sender_id = $_POST['sender_id'];
        $mess->receiver_id = $_POST['receiver_id'];
        $mess->title = $_POST['title'];
        $mess->message = $_POST['message'];
        $mess->save();
        return redirect('/dashboard');
    }

    public function clearmessages(): Application|RedirectResponse|Redirector
    {
        Message::where('receiver_id', Auth::id())->delete();
        return redirect('/dashboard');
    }
}
