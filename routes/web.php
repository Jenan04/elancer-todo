<?php

use App\Http\Controllers\OtpVerificationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('auth.login');
})->middleware('guest')->name('show.login');

Route::get('/signup', function () {
    return view('auth.signup');
})->middleware('guest')->name('show.register');

Route::get('/verify-otp', [OtpVerificationController::class, 'show'])
     ->middleware(['auth'])
     ->name('verification.notice');

Route::post('/verify-otp', [OtpVerificationController::class, 'verify'])
     ->middleware(['auth', 'throttle:6,1']); 

Route::post('/verify-otp/resend', [OtpVerificationController::class, 'resend'])
     ->middleware(['auth'])
     ->name('verification.resend');


Route::middleware(['auth', 'custom_verified'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('tasks',TaskController::class);
    
});
