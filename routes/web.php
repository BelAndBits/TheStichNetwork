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
Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth');

//Add project 
Route::middleware('auth')->group(function () {
    Route::get('/my-library/projects/prepare', [ProjectController::class, 'create'])->name('projects.create');
});
//All projects 
Route::get('/all-projects', [ProjectController::class, 'showAllProjects'])->name('projects.all');

//Save a project
Route::post('/my-library/projects/store', [ProjectController::class, 'store'])->name('projects.store');

//Paterns
Route::get('/patterns/create', [PatternController::class, 'create'])
    ->middleware('auth')
    ->name('patterns.create');

Route::post('/patterns', [PatternController::class, 'store'])
    ->middleware('auth')
    ->name('patterns.store');

Route::get('/patterns', [PatternController::class, 'index'])
    ->name('patterns.index');