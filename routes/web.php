<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('auth.login');
    // return redirect()->route('login');
})->name('login');

Route::get('/signup', function () {
    return view('auth.signup');
    // return redirect()->route('login');
})->name('signup');


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('tasks',TaskController::class);
