<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use \App\Models\User;
use Session;

class LoginController extends Controller
{
   public function showLoginForm(): View|RedirectResponse
{
    if (Auth::check()) {
        $user = Auth::user();

        if ($user->authority == 1) {
            return redirect('/');
        } else {
            return redirect('/' . $user->id);
        }
    }

    return view('login');
}
    public function login(Request $request): RedirectResponse
{

    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    $credentials = $request->only('email', 'password');

    $user = User::where('email', $request->email)->first();

    if (!$user) {

        return back()->withErrors([
            'email' => 'Bu email kayıtlı değil',
        ])->withInput();
    }


    if (!Auth::attempt($credentials)) {
        return back()->withErrors([
            'password' => 'Şifre hatalı',
        ])->withInput($request->only('email'));
    }

    if ($user->authority == 1) {
        return redirect('/');
    } else {
        return redirect('/' . $user->id);
    }
}



}
