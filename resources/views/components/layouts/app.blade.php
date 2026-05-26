{{-- <!DOCTYPE html>
<html class="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>{{ $title ?? 'Focus - Dashboard' }}</title>

    {{-- <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script> 
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Geist:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet">

    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "on-tertiary-fixed": "#2a1700",
                        "surface-bright": "#f8f9ff",
                        "on-secondary": "#ffffff",
                        "surface-dim": "#cbdbf5",
                        "surface-container": "#e5eeff",
                        "on-primary": "#ffffff",
                        "secondary-fixed": "#6ffbbe",
                        "surface-container-lowest": "#ffffff",
                        "tertiary-fixed-dim": "#ffb95f",
                        "tertiary": "#684000",
                        "inverse-primary": "#c3c0ff",
                        "on-primary-container": "#dad7ff",
                        "surface-container-low": "#eff4ff",
                        "secondary": "#006c49",
                        "primary-fixed-dim": "#c3c0ff",
                        "on-tertiary": "#ffffff",
                        "on-surface-variant": "#464555",
                        "error": "#ba1a1a",
                        "primary-fixed": "#e2dfff",
                        "inverse-on-surface": "#eaf1ff",
                        "on-primary-fixed": "#0f0069",
                        "on-secondary-fixed": "#002113",
                        "on-secondary-container": "#00714d",
                        "outline-variant": "#c7c4d8",
                        "surface-tint": "#4d44e3",
                        "secondary-fixed-dim": "#4edea3",
                        "primary": "#3525cd",
                        "tertiary-fixed": "#ffddb8",
                        "background": "#f8f9ff",
                        "surface-variant": "#d3e4fe",
                        "on-error": "#ffffff",
                        "on-tertiary-container": "#ffd4a4",
                        "error-container": "#ffdad6",
                        "on-surface": "#0b1c30",
                        "surface-container-highest": "#d3e4fe",
                        "on-error-container": "#93000a",
                        "surface-container-high": "#dce9ff",
                        "on-secondary-fixed-variant": "#005236",
                        "tertiary-container": "#885500",
                        "primary-container": "#4f46e5",
                        "surface": "#f8f9ff",
                        "inverse-surface": "#213145",
                        "on-primary-fixed-variant": "#3323cc",
                        "on-tertiary-fixed-variant": "#653e00",
                        "outline": "#777587",
                        "on-background": "#0b1c30",
                        "secondary-container": "#6cf8bb"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "base": "8px",
                        "stack-md": "12px",
                        "container-max": "1200px",
                        "stack-lg": "24px",
                        "gutter-desktop": "24px",
                        "gutter-mobile": "16px",
                        "stack-sm": "4px"
                    },
                    "fontFamily": {
                        "headline-md": ["Geist"],
                        "label-md": ["Geist"],
                        "label-sm": ["Geist"],
                        "body-md": ["Geist"],
                        "headline-lg": ["Geist"],
                        "headline-lg-mobile": ["Geist"],
                        "body-lg": ["Geist"]
                    },
                    "fontSize": {
                        "headline-md": ["20px", { "lineHeight": "28px", "letterSpacing": "-0.01em", "fontWeight": "600" }],
                        "label-md": ["12px", { "lineHeight": "16px", "letterSpacing": "0.02em", "fontWeight": "500" }],
                        "label-sm": ["11px", { "lineHeight": "14px", "letterSpacing": "0.03em", "fontWeight": "500" }],
                        "body-md": ["14px", { "lineHeight": "20px", "letterSpacing": "0", "fontWeight": "400" }],
                        "headline-lg": ["32px", { "lineHeight": "40px", "letterSpacing": "-0.02em", "fontWeight": "600" }],
                        "headline-lg-mobile": ["24px", { "lineHeight": "32px", "letterSpacing": "-0.02em", "fontWeight": "600" }],
                        "body-lg": ["16px", { "lineHeight": "24px", "letterSpacing": "0", "fontWeight": "400" }]
                    }
                },
            },
        }
    </script>
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
</head>

<body class="bg-background text-on-background min-h-screen flex overflow-hidden">

    <x-layouts.sidebar />

    <div class="ml-64 flex-1 flex flex-col h-screen overflow-y-auto custom-scrollbar">

        {{-- @if(!isset($hideHeader) || !$hideHeader)
        <x-layouts.header />
        @endif 

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

</html> --}}

<!DOCTYPE html>
<html class="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
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
</head>

<body class="bg-background text-on-background min-h-screen flex overflow-hidden">

    <x-layouts.sidebar />

    <div class="ml-64 flex-1 flex flex-col h-screen overflow-y-auto custom-scrollbar">

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