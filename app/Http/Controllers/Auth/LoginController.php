<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // View for Login
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        //Email veryfication
        $user = User::where('email', $request->email)->first();

        //If doesn´t exist an user with that email, return email error
        if (!$user) {
            return back()->withErrors(['email' => 'The email is not registered.'])->withInput($request->only('email'));
        }

        //If the user exist but the password is wrong
        if (!Auth::attempt($request->only('email', 'password'))) {
            return back()->withErrors(['password' => 'The password is incorrect.'])->withInput($request->only('email'));
        }

        //If everything is ok, redirect
        return redirect()->intended('/');
    }

    protected function authenticated(Request $request, $user)
    {
        return redirect('/my-library');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}

