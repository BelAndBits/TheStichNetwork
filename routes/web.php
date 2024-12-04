<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Authentication
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

//Library
use App\Http\Controllers\LibraryController;

//About us
use App\Http\Controllers\AboutUsController;


Route::get('/', function () {
    return view('home');
});

// Authentication routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

//Library with middleware
Route::get('/my-library', [LibraryController::class, 'index'])->name('my-library')->middleware('auth');

//About-us
Route::get('/about', [App\Http\Controllers\AboutUsController::class, 'index'])->name('about');

//Log out
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//Profile
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
