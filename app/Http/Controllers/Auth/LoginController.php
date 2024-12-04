<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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

        if (Auth::attempt($request->only('email', 'password'))) {
            // If is correct we redirect to home
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'User not found',
        ]);
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

