<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomEnsureEmailIsVerified
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if (!$user) {
            return $next($request);
        }

        if (!$user->hasVerifiedEmail()) {
            
            if ($request->is('verify-otp') || $request->is('verify-otp/*')) {
                return $next($request);
            }

            return redirect()->route('verification.notice');
        }

        if ($user->hasVerifiedEmail()) {
            
            if ($request->is('verify-otp') || $request->is('verify-otp/*')) {
                return redirect()->route('dashboard');
            }
        }

        return $next($request);
    }
}