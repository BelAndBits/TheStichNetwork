<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Events\NewUserRegistered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    /**
     * Show the registration form.
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Handle a registration request for the application.
     */
    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'username' => 'required|min:3|unique:users,username',
            'password' => 'required|min:7'
        ]);

        try {
            // Create the user and store the result in $user
            $user = User::create([
                'email' => $request->email,
                'username' => $request->username,
                'password' => Hash::make($request->password),
            ]);

            // Authenticate the user
            Auth::login($user);

            // Fire the event to create the library
            event(new NewUserRegistered($user));

            
            // Redirect to the user's library page
            return redirect('/my-library');

        } catch (\Exception $e) {
            // Log the error in Laravel's logs
            Log::error('Registration error: ' . $e->getMessage());
            // It's better to return a generic error message
            return back()->withErrors(['registration_error' => 'Unable to complete registration. Please try again.'])->withInput();
        }
    }
}
