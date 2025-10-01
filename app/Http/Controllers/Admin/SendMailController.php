<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendMailController extends Controller
{

    public function form(Request $request)
    {
        if (!($request->user() && $request->user()->is_admin)) {
            abort(403, 'Acesso restrito a administradores.');
        }
        $users = User::all();
        return view('admin.sendmail', compact('users'));
    }

    public function send(Request $request)
    {
        if (!($request->user() && $request->user()->is_admin)) {
            abort(403, 'Acesso restrito a administradores.');
        }
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'subject' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
        $user = User::findOrFail($request->user_id);
        Mail::raw($request->content, function ($message) use ($user, $request) {
            $message->to($user->email)
                ->subject($request->subject);
        });
        return back()->with('success', 'Email enviado com sucesso!');
    }
}
