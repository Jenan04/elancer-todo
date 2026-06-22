<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // if unauthinticated user (guest) tried to enter any protected pages i'll navigate him to root page=>login 
        $middleware->redirectGuestsTo(fn (Request $request) => route('login'));

        // if the user auth but isn't a verified user 
        $middleware->redirectUsersTo(fn (Request $request) => route('dashboard'));

        // $middleware->redirectUsersTo(fn (Request $request) => route('verification.notice'));
        $middleware->alias([
            'custom_verified' => \App\Http\Middleware\CustomEnsureEmailIsVerified::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
