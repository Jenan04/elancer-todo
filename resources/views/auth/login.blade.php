<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 26'><path d='M9 24L0 19V9L9 4L18 9V19L9 24ZM6.1 11.25C6.48333 10.85 6.925 10.5417 7.425 10.325C7.925 10.1083 8.45 10 9 10C9.55 10 10.075 10.1083 10.575 10.325C11.075 10.5417 11.5167 10.85 11.9 11.25L14.9 9.575L9 6.3L3.1 9.575L6.1 11.25ZM8 21.15V17.875C7.1 17.6417 6.375 17.1667 5.825 16.45C5.275 15.7333 5 14.9167 5 14C5 13.8167 5.00833 13.6458 5.025 13.4875C5.04167 13.3292 5.075 13.1667 5.125 13L2 11.25V17.825L8 21.15ZM9 16C9.55 16 10.0208 15.8042 10.4125 15.4125C10.8042 15.0208 11 14.55 11 14C11 13.45 10.8042 12.9792 10.4125 12.5875C10.0208 12.1958 9.55 12 9 12C8.45 12 7.97917 12.1958 7.5875 12.5875C7.19583 12.9792 7 13.45 7 14C7 14.55 7.19583 15.0208 7.5875 15.4125C7.97917 15.8042 8.45 16 9 16ZM10 21.15L16 17.825V11.25L12.875 13C12.925 13.1667 12.9583 13.3292 12.975 13.4875C12.9917 13.6458 13 13.8167 13 14C13 14.9167 12.725 15.7333 12.175 16.45C11.625 17.1667 10.9 17.6417 10 17.875V21.15Z' fill='%232815b6' /></svg>">         
    <title>Focus - Login</title>
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

    <div class="w-full max-w-md bg-surface-container-low rounded-2xl p-8 border border-outline-variant shadow-sm flex flex-col gap-6">
        
        <div class="flex flex-col items-center gap-2 text-center">
            <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-surface-container-highest border border-outline-variant">
                <svg class="w-8 h-8" viewBox="0 0 20 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 24L0 19V9L9 4L18 9V19L9 24ZM6.1 11.25C6.48333 10.85 6.925 10.5417 7.425 10.325C7.925 10.1083 8.45 10 9 10C9.55 10 10.075 10.1083 10.575 10.325C11.075 10.5417 11.5167 10.85 11.9 11.25L14.9 9.575L9 6.3L3.1 9.575L6.1 11.25ZM8 21.15V17.875C7.1 17.6417 6.375 17.1667 5.825 16.45C5.275 15.7333 5 14.9167 5 14C5 13.8167 5.00833 13.6458 5.025 13.4875C5.04167 13.3292 5.075 13.1667 5.125 13L2 11.25V17.825L8 21.15ZM9 16C9.55 16 10.0208 15.8042 10.4125 15.4125C10.8042 15.0208 11 14.55 11 14C11 13.45 10.8042 12.9792 10.4125 12.5875C10.0208 12.1958 9.55 12 9 12C8.45 12 7.97917 12.1958 7.5875 12.5875C7.19583 12.9792 7 13.45 7 14C7 14.55 7.19583 15.0208 7.5875 15.4125C7.97917 15.8042 8.45 16 9 16ZM10 21.15L16 17.825V11.25L12.875 13C12.925 13.1667 12.9583 13.3292 12.975 13.4875C12.9917 13.6458 13 13.8167 13 14C13 14.9167 12.725 15.7333 12.175 16.45C11.625 17.1667 10.9 17.6417 10 17.875V21.15Z" fill="#2815b6" />
                </svg>
            </div>
            <h1 class="text-headline-md font-black text-primary tracking-tight mt-2">Welcome back to Focus</h1>
            <p class="text-body-md text-on-surface-variant">Enter your details to access your workspace</p>
        </div>
{{-- <x-layouts.app>
    <x-slot:title>Focus - login</x-slot:title> --}}
        <form action="{{ route('login') }}" method="POST" class="flex flex-col gap-4" novalidate>
            @csrf

            <div class="flex flex-col gap-1.5">
                <label for="email" class="text-label-md font-bold text-on-surface">Email Address</label>
                <div class="relative">
                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant text-[20px]">mail</span>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full pl-10 pr-4 py-2.5 bg-surface border border-outline-variant rounded-xl text-body-md focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all"
                        placeholder="name@example.com">
                </div>
                @error('email')
                    <span class="text-error text-label-sm mt-1 font-medium">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col gap-1.5">
                <div class="flex justify-between items-center">
                    <label for="password" class="text-label-md font-bold text-on-surface">Password</label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-label-sm text-primary hover:underline font-medium">Forgot password?</a>
                    @endif
                </div>
                <div class="relative">
                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant text-[20px]">lock</span>
                    <input id="password" type="password" name="password" required
                        class="w-full pl-10 pr-4 py-2.5 bg-surface border border-outline-variant rounded-xl text-body-md focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all"
                        placeholder="••••••••">
                </div>
                @error('password')
                    <span class="text-error text-label-sm mt-1 font-medium">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex items-center gap-2 py-1">
                <input id="remember" type="checkbox" name="remember" class="w-4 h-4 rounded border-outline-variant text-primary focus:ring-primary cursor-pointer">
                <label for="remember" class="text-body-sm text-on-surface-variant select-none cursor-pointer">Remember me on this device</label>
            </div>

            <button type="submit" class="w-full bg-primary text-on-primary font-bold py-3 rounded-xl flex items-center justify-center gap-2 cursor-pointer active:scale-[0.98] hover:opacity-95 transition-all mt-2">
                <span class="material-symbols-outlined text-[20px]">login</span>
                <span>Sign In</span>
            </button>
        </form>

        <div class="flex items-center my-1">
            <div class="flex-1 border-t border-outline-variant"></div>
            <span class="px-3 text-label-sm text-on-surface-variant whitespace-nowrap">Or</span>
            <div class="flex-1 border-t border-outline-variant"></div>
        </div>

        <div class="grid grid-cols gap-3">
            <a href="#" class="flex items-center justify-center gap-2 py-2.5 border border-outline-variant rounded-xl hover:bg-surface-container transition-all active:scale-[0.98] font-medium text-body-md text-on-surface">
                <svg class="w-5 h-5" viewBox="0 0 24 24">
                    <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                    <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                    <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z" fill="#FBBC05"/>
                    <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z" fill="#EA4335"/>
                </svg>
                <span>Continue With Google</span>
            </a>

            {{-- <a href="#" class="flex items-center justify-center gap-2 py-2.5 border border-outline-variant rounded-xl hover:bg-surface-container transition-all active:scale-[0.98] font-medium text-body-md text-on-surface">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.477 2 2 6.477 2 12c0 4.42 2.865 8.166 6.839 9.489.5.092.682-.217.682-.482 0-.237-.008-.866-.013-1.7-2.782.603-3.369-1.34-3.369-1.34-.454-1.156-1.11-1.464-1.11-1.464-.908-.62.069-.608.069-.608 1.003.07 1.531 1.03 1.531 1.03.892 1.529 2.341 1.087 2.91.831.092-.646.35-1.086.636-1.336-2.22-.253-4.555-1.11-4.555-4.943 0-1.091.39-1.984 1.029-2.683-.103-.253-.446-1.27.098-2.647 0 0 .84-.269 2.75 1.025A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.294 2.747-1.025 2.747-1.025.546 1.377.203 2.394.1 2.647.64.699 1.028 1.592 1.028 2.683 0 3.842-2.339 4.687-4.566 4.935.359.309.678.919.678 1.852 0 1.336-.012 2.415-.012 2.743 0 .267.18.577.688.479C19.138 20.162 22 16.418 22 12c0-5.523-4.477-10-10-10z"/>
                </svg>
                <span>GitHub</span>
            </a> --}}
        </div>

        <p class="text-center text-body-sm text-on-surface-variant">
            Don't have an account? 
            <a href="{{ route('signup') }}" class="text-primary hover:underline font-bold">Sign up</a>
        </p>

    </div>
{{-- </x-layouts.app> --}}

</body>
</html>