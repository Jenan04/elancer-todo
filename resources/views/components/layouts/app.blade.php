<!DOCTYPE html>
<html class="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 26'><path d='M9 24L0 19V9L9 4L18 9V19L9 24ZM6.1 11.25C6.48333 10.85 6.925 10.5417 7.425 10.325C7.925 10.1083 8.45 10 9 10C9.55 10 10.075 10.1083 10.575 10.325C11.075 10.5417 11.5167 10.85 11.9 11.25L14.9 9.575L9 6.3L3.1 9.575L6.1 11.25ZM8 21.15V17.875C7.1 17.6417 6.375 17.1667 5.825 16.45C5.275 15.7333 5 14.9167 5 14C5 13.8167 5.00833 13.6458 5.025 13.4875C5.04167 13.3292 5.075 13.1667 5.125 13L2 11.25V17.825L8 21.15ZM9 16C9.55 16 10.0208 15.8042 10.4125 15.4125C10.8042 15.0208 11 14.55 11 14C11 13.45 10.8042 12.9792 10.4125 12.5875C10.0208 12.1958 9.55 12 9 12C8.45 12 7.97917 12.1958 7.5875 12.5875C7.19583 12.9792 7 13.45 7 14C7 14.55 7.19583 15.0208 7.5875 15.4125C7.97917 15.8042 8.45 16 9 16ZM10 21.15L16 17.825V11.25L12.875 13C12.925 13.1667 12.9583 13.3292 12.975 13.4875C12.9917 13.6458 13 13.8167 13 14C13 14.9167 12.725 15.7333 12.175 16.45C11.625 17.1667 10.9 17.6417 10 17.875V21.15Z' fill='%232815b6' /></svg>">         
    <title>{{ $title ?? 'Focus - Dashboard' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Geist:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Geist', sans-serif;
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        .card-elevation {
            box-shadow: 0px 4px 6px -1px rgba(0, 0, 0, 0.05), 0px 2px 4px -1px rgba(0, 0, 0, 0.03);
        }
    </style>
    <script>
        (function() {
            const isCollapsed = localStorage.getItem('sidebar-collapsed') === 'true';
            if (isCollapsed) {
                document.documentElement.classList.add('sidebar-collapsed');
            }
        })();
    </script>
</head>

<body class="bg-background text-on-background min-h-screen flex overflow-hidden">

    <x-layouts.sidebar />

    {{-- <div class="ml-64 flex-1 flex flex-col h-screen overflow-y-auto custom-scrollbar"> --}}
        <div class="ml-64 [.sidebar-collapsed_&]:ml-20 flex-1 flex flex-col h-screen overflow-y-auto custom-scrollbar">
        @if(!isset($hideHeader) || !$hideHeader)
            <x-layouts.header>
                @if(isset($headerActions))
                    <x-slot:actions>
                        {{ $headerActions }}
                    </x-slot:actions>
                @endif
            </x-layouts.header>
        @endif

        <main class="flex-1">
            {{ $slot }}
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const items = document.querySelectorAll('.animate-fade-in');
            items.forEach((el, index) => {
                el.style.opacity = '0';
                el.style.transform = 'translateY(10px)';
                setTimeout(() => {
                    el.style.transition = 'all 0.6s cubic-bezier(0.16, 1, 0.3, 1)';
                    el.style.opacity = '1';
                    el.style.transform = 'translateY(0)';
                }, index * 100);
            });
        });
    </script>
</body>

</html>