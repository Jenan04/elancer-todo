<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\SendOtpNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Log;

class OtpVerificationController extends Controller
{
    // if the user auth i'll generate an Otp for him/her 
    protected function generateAndSendOtp($user) {
        // $user = auth()->user();
        $otp = (int) rand(100000,999999);

        session([
                'calculated_otp' => (string)$otp,
                'otp_expires_at' => now()->addMinutes(2), 
            ]);
        $user->notify(new SendOtpNotification((string)$otp));
    }

    public function show() {
        $user = auth()->user();

        if(!session('calculated_otp') || now()->greaterThan(session('otp_expires_at'))){
            $this->generateAndSendOtp($user);
            session()->flash('status', 'verification-link-sent');
        }

        \Log::info('SHOW_LOG', [
            'session_id' => session()->getId(), 
            'otp' => session('calculated_otp')
        ]);
        return view('auth.verify-page');

    }

public function verify(Request $req) {
    \Log::info('VERIFY_LOG', [
        'session_id' => session()->getId(), 
        'otp_in_session' => session('calculated_otp'), 
        'submitted' => $req->otp
    ]);
    // 1. Validation
    $req->validate([
        'otp' => ['required', 'numeric']
    ], [
        'otp.required' => 'We need your OTP',
        'otp.numeric' => 'The OTP must be a valid 6-digit number.'
    ]);

    $userOtpInput = trim($req->otp);
    $sessionOtp   = session('calculated_otp');
    $time         = session('otp_expires_at');

    if ($time && now()->greaterThan($time)) {
        session()->forget(['calculated_otp', 'otp_expires_at']);
        return back()->withErrors(['otp' => 'The verification code has expired. Please request a new one.']);
    }

    $user = auth()->user(); 

        $cleanSessionOtp = (int) $sessionOtp;
        $cleanUserInput  = (int) $userOtpInput;
        if ($cleanSessionOtp === $cleanUserInput) {   
        $user->update([
            'email_verified_at' => now(),
        ]);  

        $user->save();
       
        session()->forget(['calculated_otp', 'otp_expires_at']);
        
        RateLimiter::clear('resend-otp:' . $user->email);
        
        return redirect()->route('dashboard')->with('success', 'Welcome to Focus');
    }

    return back()->withInput()->withErrors(['otp' => 'The verification code you entered is incorrect.']);
}
public function resend() {
            // $otp = $this->random(6);
            $user = auth()->user();
            $otp = rand(100000, 999999);
            session([
                'calculated_otp' => $otp,
                'otp_expires_at' => now()->addMinutes(2),
                ]);
    
            $user->notify(new SendOtpNotification($otp));
            return back()->with('success', 'A new OTP has been sent to your email.');
    
        }
}
