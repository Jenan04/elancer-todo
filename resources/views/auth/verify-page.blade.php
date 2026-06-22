<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 26'><path d='M9 24L0 19V9L9 4L18 9V19L9 24ZM6.1 11.25C6.48333 10.85 6.925 10.5417 7.425 10.325C7.925 10.1083 8.45 10 9 10C9.55 10 10.075 10.1083 10.575 10.325C11.075 10.5417 11.5167 10.85 11.9 11.25L14.9 9.575L9 6.3L3.1 9.575L6.1 11.25ZM8 21.15V17.875C7.1 17.6417 6.375 17.1667 5.825 16.45C5.275 15.7333 5 14.9167 5 14C5 13.8167 5.00833 13.6458 5.025 13.4875C5.04167 13.3292 5.075 13.1667 5.125 13L2 11.25V17.825L8 21.15ZM9 16C9.55 16 10.0208 15.8042 10.4125 15.4125C10.8042 15.0208 11 14.55 11 14C11 13.45 10.8042 12.9792 10.4125 12.5875C10.0208 12.1958 9.55 12 9 12C8.45 12 7.97917 12.1958 7.5875 12.5875C7.19583 12.9792 7 13.45 7 14C7 14.55 7.19583 15.0208 7.5875 15.4125C7.97917 15.8042 8.45 16 9 16ZM10 21.15L16 17.825V11.25L12.875 13C12.925 13.1667 12.9583 13.3292 12.975 13.4875C12.9917 13.6458 13 13.8167 13 14C13 14.9167 12.725 15.7333 12.175 16.45C11.625 17.1667 10.9 17.6417 10 17.875V21.15Z' fill='%232815b6' /></svg>">         
    <title>Focus - Verify OTP</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Geist:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Geist', sans-serif; }
    </style>
</head>
<body class="bg-background text-on-background min-h-screen flex items-center justify-center p-4">

    <div id="laravel-session" data-status="{{ session('status') }}" class="hidden"></div>

    <div class="w-full max-w-md bg-surface-container-low rounded-2xl p-8 border border-outline-variant shadow-sm flex flex-col gap-6">
        
        <div class="flex flex-col items-center gap-2 text-center">
            <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-surface-container-highest border border-outline-variant">
                <svg class="w-8 h-8" viewBox="0 0 20 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 24L0 19V9L9 4L18 9V19L9 24ZM6.1 11.25C6.48333 10.85 6.925 10.5417 7.425 10.325C7.925 10.1083 8.45 10 9 10C9.55 10 10.075 10.1083 10.575 10.325C11.075 10.5417 11.5167 10.85 11.9 11.25L14.9 9.575L9 6.3L3.1 9.575L6.1 11.25ZM8 21.15V17.875C7.1 17.6417 6.375 17.1667 5.825 16.45C5.275 15.7333 5 14.9167 5 14C5 13.8167 5.00833 13.6458 5.025 13.4875C5.04167 13.3292 5.075 13.1667 5.125 13L2 11.25V17.825L8 21.15ZM9 16C9.55 16 10.0208 15.8042 10.4125 15.4125C10.8042 15.0208 11 14.55 11 14C11 13.45 10.8042 12.9792 10.4125 12.5875C10.0208 12.1958 9.55 12 9 12C8.45 12 7.97917 12.1958 7.5875 12.5875C7.19583 12.9792 7 13.45 7 14C7 14.55 7.19583 15.0208 7.5875 15.4125C7.97917 15.8042 8.45 16 9 16ZM10 21.15L16 17.825V11.25L12.875 13C12.925 13.1667 12.9583 13.3292 12.975 13.4875C12.9917 13.6458 13 13.8167 13 14C13 14.9167 12.725 15.7333 12.175 16.45C11.625 17.1667 10.9 17.6417 10 17.875V21.15Z" fill="#2815b6" />
                </svg>
            </div>
            <h1 class="text-headline-md font-black text-primary tracking-tight mt-2">Security Verification</h1>
            <p class="text-body-md text-on-surface-variant px-4">We've sent a 6-digit verification code to your email address.</p>
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="flex items-center gap-2 bg-surface-container-highest border border-primary/20 text-primary p-4 rounded-xl text-body-sm font-medium animate-fade-in">
                <span class="material-symbols-outlined text-[20px]">check_circle</span>
                <span>A new verification code has been resent to your email.</span>
            </div>
        @endif

        <form action="/verify-otp" method="POST" id="otp-form" class="flex flex-col gap-6" novalidate>
            @csrf
            <input type="hidden" name="otp" id="hidden-code">

            <div class="flex flex-col gap-2">
                <label class="text-label-md font-bold text-on-surface text-center sm:text-left">Verification Code</label>
                
                <div class="flex justify-between gap-2 sm:gap-3" dir="ltr">
                    <input type="text" maxlength="1" inputmode="numeric" pattern="[0-9]*" class="otp-box w-12 h-12 text-center text-headline-sm font-black bg-surface border border-outline-variant rounded-xl focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all p-0" required autofocus>
                    <input type="text" maxlength="1" inputmode="numeric" pattern="[0-9]*" class="otp-box w-12 h-12 text-center text-headline-sm font-black bg-surface border border-outline-variant rounded-xl focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all p-0" required>
                    <input type="text" maxlength="1" inputmode="numeric" pattern="[0-9]*" class="otp-box w-12 h-12 text-center text-headline-sm font-black bg-surface border border-outline-variant rounded-xl focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all p-0" required>
                    <input type="text" maxlength="1" inputmode="numeric" pattern="[0-9]*" class="otp-box w-12 h-12 text-center text-headline-sm font-black bg-surface border border-outline-variant rounded-xl focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all p-0" required>
                    <input type="text" maxlength="1" inputmode="numeric" pattern="[0-9]*" class="otp-box w-12 h-12 text-center text-headline-sm font-black bg-surface border border-outline-variant rounded-xl focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all p-0" required>
                    <input type="text" maxlength="1" inputmode="numeric" pattern="[0-9]*" class="otp-box w-12 h-12 text-center text-headline-sm font-black bg-surface border border-outline-variant rounded-xl focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all p-0" required>
                </div>

                @error('otp')
                    <span class="text-error text-label-sm mt-1 font-medium text-center sm:text-left">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="w-full bg-primary text-on-primary font-bold py-3 rounded-xl flex items-center justify-center gap-2 cursor-pointer active:scale-[0.98] hover:opacity-95 transition-all">
                <span class="material-symbols-outlined text-[20px]">verified_user</span>
                <span>Verify & Proceed</span>
            </button>
        </form>

        <div class="flex items-center my-1">
            <div class="flex-1 border-t border-outline-variant"></div>
            <span id="timer-text" class="px-3 text-label-sm text-on-surface-variant whitespace-nowrap font-medium">
                Didn't receive it?
            </span>
            <div class="flex-1 border-t border-outline-variant"></div>
        </div>

        <form action="{{ route('verification.resend') }}" method="POST" id="resend-form" class="w-full">
            @csrf
            <button type="submit" id="resend-btn" class="w-full flex items-center justify-center gap-2 py-2.5 border border-outline-variant rounded-xl transition-all font-medium text-body-md text-on-surface">
                <span class="material-symbols-outlined text-[20px]">refresh</span>
                <span id="resend-btn-text">Resend Code</span>
            </button>
        </form>

        <form action="/logout" method="POST" class="text-center">
            @csrf
            <button type="submit" class="text-label-sm text-on-surface-variant hover:text-error hover:underline font-bold cursor-pointer transition-all">
                Cancel & Sign Out
            </button>
        </form>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
    const boxes = document.querySelectorAll('.otp-box');
    const hiddenInput = document.getElementById('hidden-code');
    const form = document.getElementById('otp-form');
    const resendBtn = document.getElementById('resend-btn');
    const resendBtnText = document.getElementById('resend-btn-text');
    const timerText = document.getElementById('timer-text');
    const resendForm = document.getElementById('resend-form');
    const sessionElement = document.getElementById('laravel-session');

    boxes.forEach((box, index) => {
        box.addEventListener('input', (e) => {
            e.target.value = e.target.value.replace(/[^0-9]/g, '');
            if (e.target.value.length === 1 && index < boxes.length - 1) {
                boxes[index + 1].focus();
            }
            updateHiddenInput();
        });

        box.addEventListener('keydown', (e) => {
            if (e.key === 'Backspace' && e.target.value.length === 0 && index > 0) {
                boxes[index - 1].focus();
            }
        });

        box.addEventListener('paste', (e) => {
            e.preventDefault();
            const pastedData = (e.clipboardData || window.clipboardData).getData('text').trim();
            if (/^\d{6}$/.test(pastedData)) {
                pastedData.split('').forEach((char, i) => {
                    if (boxes[i]) boxes[i].value = char;
                });
                boxes[boxes.length - 1].focus();
                updateHiddenInput();
            }
        });
    });

    function updateHiddenInput() {
        let code = '';
        boxes.forEach(box => code += box.value);
        hiddenInput.value = code;
    }

    form.addEventListener('submit', function(e) {
        // e.preventDefault(); 
        
        updateHiddenInput();
        
        if (hiddenInput.value.length !== 6) {
        e.preventDefault(); 
        const firstEmptyBox = Array.from(boxes).find(box => !box.value);
        if (firstEmptyBox) firstEmptyBox.focus();
    }
    });

    const COOLDOWN_TIME = 60; 
    let countdown;

    const sessionStatus = sessionElement ? sessionElement.getAttribute('data-status') : '';
    if (sessionStatus === 'verification-link-sent') {
        localStorage.setItem('otp_timer_expiry', Date.now() + (COOLDOWN_TIME * 1000));
    }

    checkAndRunTimer();

    resendForm.addEventListener('submit', function (e) {
        if (resendBtn.hasAttribute('disabled')) {
            e.preventDefault();
            return;
        }
        localStorage.setItem('otp_timer_expiry', Date.now() + (COOLDOWN_TIME * 1000));
    });

    function checkAndRunTimer() {
        const expiry = localStorage.getItem('otp_timer_expiry');
        if (expiry) {
            const timeLeft = Math.ceil((expiry - Date.now()) / 1000);
            if (timeLeft > 0) {
                startTimer(timeLeft);
            } else {
                enableResend();
            }
        } else {
            enableResend();
        }
    }

    function startTimer(seconds) {
        clearInterval(countdown);
        disableResend();

        timerText.textContent = `Resend available in ${seconds}s`;
        resendBtnText.textContent = `Resend (${seconds}s)`;

        countdown = setInterval(() => {
            seconds--;
            
            if (seconds <= 0) {
                clearInterval(countdown);
                localStorage.removeItem('otp_timer_expiry');
                enableResend();
            } else {
                timerText.textContent = `Resend available in ${seconds}s`;
                resendBtnText.textContent = `Resend (${seconds}s)`;
            }
        }, 1000);
    }

    function disableResend() {
        resendBtn.setAttribute('disabled', 'true');
        resendBtn.classList.add('opacity-50', 'cursor-not-allowed', 'bg-surface-container-highest');
        resendBtn.classList.remove('cursor-pointer', 'hover:bg-surface-container', 'active:scale-[0.98]');
    }

    function enableResend() {
        resendBtn.removeAttribute('disabled');
        resendBtn.classList.remove('opacity-50', 'cursor-not-allowed', 'bg-surface-container-highest');
        resendBtn.classList.add('cursor-pointer', 'hover:bg-surface-container', 'active:scale-[0.98]');
        timerText.textContent = "Didn't receive it?";
        resendBtnText.textContent = "Resend Code";
    }
});
    </script>
</body>
</html>