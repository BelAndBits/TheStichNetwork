<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Authentication
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

//Library
use App\Http\Controllers\LibraryController;

//Projects
use App\Http\Controllers\ProjectController;

//Patterns
use App\Http\Controllers\PatternController;



// Home
Route::get('/', function () {
    return view('home');
})->name('home');

// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Profile
Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth');

// About Us - Direct view
Route::view('/about', 'about')->name('about');

// Library
Route::get('/my-library', [LibraryController::class, 'index'])->middleware('auth')->name('my-library');

// Projects
Route::middleware('auth')->group(function () {
    Route::get('/my-library/projects/prepare', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/my-library/projects/store', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/all-projects', [ProjectController::class, 'showAllProjects'])->name('projects.all');
});

// Patterns
Route::middleware('auth')->group(function () {
    Route::get('/patterns', [PatternController::class, 'index'])->name('patterns.index');
    Route::get('/patterns/create', [PatternController::class, 'create'])->name('patterns.create');
    Route::post('/patterns', [PatternController::class, 'store'])->name('patterns.store');
    Route::get('/patterns/{pattern}', [PatternController::class, 'show'])->name('patterns.show');
});

