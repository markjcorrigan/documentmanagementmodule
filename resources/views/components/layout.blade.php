<!DOCTYPE html>
{{--  New Blog Layout with Dark Mode --}}
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <title>
        @isset($doctitle)
            {{ $doctitle }} | New Blog
        @else
            PMWay Blog
        @endisset
    </title>

    <script>
        // ✅ Apply theme IMMEDIATELY before page renders
        (function() {
            const savedTheme = localStorage.getItem('flux.appearance') ||
                localStorage.getItem('flux:appearance') ||
                localStorage.getItem('theme');

            const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

            // Resolve 'system' preference
            let theme = savedTheme;
            if (!savedTheme || savedTheme === 'system') {
                theme = systemPrefersDark ? 'dark' : 'light';
            }

            if (theme === 'dark') {
                document.documentElement.classList.add('dark');
            }
        })();
    </script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('fontawesome6/fontawesome6/pro/css/all.css') }}">

    {{-- Use dedicated blog.css instead of app.css to avoid Tailwind conflicts --}}
    <link rel="stylesheet" href="{{ asset('css/newblog.css') }}">

    {{-- Load ONLY app.js for Livewire functionality --}}
    @vite(['resources/js/app.js'])

    <style>
        /* ========== BOOTSTRAP 4 DARK MODE STYLES ========== */

        /* Base styles */
        body {
            transition: background-color 0.2s ease, color 0.2s ease;
        }

        /* Light mode (default) */
        body {
            background-color: #ffffff !important;
            color: #212529;
        }

        /* Dark mode */
        .dark body {
            background-color: #1a1a1a !important;
            color: #e4e4e7;
        }

        .dark {
            background-color: #1a1a1a;
            color: #e4e4e7;
        }

        /* ========== NAVBAR STYLES ========== */

        .header-bar {
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
            transition: background-color 0.2s ease, border-color 0.2s ease;
        }

        .dark .header-bar {
            background-color: #27272a;
            border-bottom: 1px solid #3f3f46;
        }

        /* Navbar links - Light mode */
        .header-bar a {
            color: #212529 !important;
            transition: color 0.2s ease;
        }

        .header-bar a:hover {
            color: #0056b3 !important;
        }

        /* Navbar links - Dark mode */
        .dark .header-bar a {
            color: #e4e4e7 !important;
        }

        .dark .header-bar a:hover {
            color: #60a5fa !important;
        }

        /* Buttons in navbar */
        .header-bar .btn-success {
            background-color: #28a745;
            border-color: #28a745;
            color: white !important;
        }

        .dark .header-bar .btn-success {
            background-color: #22c55e;
            border-color: #22c55e;
            color: white !important;
        }

        /* ========== THEME TOGGLE ICON ANIMATION ========== */

        #themeIcon {
            cursor: pointer;
            font-size: 1.25rem;
            transition: all 0.3s ease-in-out;
            display: inline-block;
            color: #1f2937; /* gray-800 - light mode */
        }

        /* Dark mode icon color */
        .dark #themeIcon {
            color: #fbbf24; /* yellow-400 */
        }

        /* Hover animation - rotate and scale */
        #themeIcon:hover {
            transform: rotate(180deg) scale(1.1);
        }

        /* Focus styles for accessibility */
        #themeIcon:focus {
            outline: 2px solid #3b82f6;
            outline-offset: 2px;
            border-radius: 0.25rem;
        }

        /* Active state */
        #themeIcon:active {
            transform: rotate(180deg) scale(1.05);
        }

        /* ========== CONTENT STYLES ========== */

        /* Main content area */
        .slot-text {
            color: #212529;
        }

        .dark .slot-text {
            color: #e4e4e7;
        }

        /* Alerts */
        .alert {
            color: inherit;
        }

        .dark .alert-success {
            background-color: #065f46;
            border-color: #047857;
            color: #d1fae5;
        }

        .dark .alert-danger {
            background-color: #7f1d1d;
            border-color: #991b1b;
            color: #fecaca;
        }

        /* Cards and containers */
        .dark .card {
            background-color: #27272a;
            border-color: #3f3f46;
            color: #e4e4e7;
        }

        .dark .container {
            color: #e4e4e7;
        }
    </style>
</head>

<body>

<header class="header-bar mb-3">
    <div class="container d-flex flex-row align-items-center p-3 justify-content-between">
        <h4 class="my-0 font-weight-normal">
            <a wire:navigate href="/home" class="text-decoration-none">Home</a>
        </h4>

        @auth
            <div class="d-flex align-items-center">
                @persist('headerdynamic')
                <div class="d-flex flex-row align-items-center mr-2">
                    <livewire:search />
                    <livewire:chat />
                </div>
                @endpersist

                <!-- Dark Mode Toggle Icon -->
                <div class="mr-2">
                    <i id="themeIcon"
                       class="fa-solid fa-moon"
                       title="Toggle theme"
                       role="button"
                       tabindex="0"
                       aria-label="Toggle theme"></i>
                </div>

                <a wire:navigate href="/writestuff" class="btn btn-sm btn-success mr-2">Following</a>

                <a wire:navigate href="/profile/{{ auth()->user()->name }}" class="mr-2">
                    <img title="My Profile" data-toggle="tooltip" data-placement="bottom"
                         style="width: 32px; height: 32px; border-radius: 16px"
                         src="{{ auth()->user()->avatar }}"
                         alt="Profile">
                </a>

                <a wire:navigate class="btn btn-sm btn-success" href="/create-post">Create Post</a>
            </div>
        @else
            <div class="d-flex flex-row align-items-center">
                <!-- Dark Mode Toggle Icon for guests -->
                <div class="mr-2">
                    <i id="themeIcon"
                       class="fa-solid fa-moon"
                       title="Toggle theme"
                       role="button"
                       tabindex="0"
                       aria-label="Toggle theme"></i>
                </div>

                <a wire:navigate class="btn btn-sm btn-success mr-2" href="/writestuff">Following</a>
            </div>
        @endauth
    </div>
</header>

@if (session()->has('success'))
    <div class="container container--narrow">
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    </div>
@endif

@if (session()->has('failure'))
    <div class="container container--narrow">
        <div class="alert alert-danger text-center">{{ session('failure') }}</div>
    </div>
@endif

{{-- Render $slot --}}
@isset($slot)
    <div class="slot-text">
        {{ $slot }}
    </div>
@endisset

<x-footerbs />

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script>
    // ========== DARK MODE FUNCTIONALITY ==========

    function applyTheme(isDark) {
        // Update HTML class
        document.documentElement.classList.toggle('dark', isDark);

        // Update toggle icon
        const themeIcon = document.getElementById('themeIcon');
        if (themeIcon) {
            // Moon icon for light mode, Sun icon for dark mode
            if (isDark) {
                themeIcon.className = 'fa-solid fa-sun';
            } else {
                themeIcon.className = 'fa-solid fa-moon';
            }
        }

        // Save to all storage keys for compatibility
        localStorage.setItem('theme', isDark ? 'dark' : 'light');
        localStorage.setItem('flux.appearance', isDark ? 'dark' : 'light');
        localStorage.setItem('flux:appearance', isDark ? 'dark' : 'light');

        console.log('🎨 Theme applied:', isDark ? 'dark' : 'light');
    }

    function toggleTheme() {
        const isDark = !document.documentElement.classList.contains('dark');
        applyTheme(isDark);
    }

    // Initialize theme on page load
    document.addEventListener('DOMContentLoaded', function() {
        // Read from localStorage (check all possible keys)
        const savedTheme = localStorage.getItem('flux.appearance') ||
            localStorage.getItem('flux:appearance') ||
            localStorage.getItem('theme');

        const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

        // Resolve 'system' preference
        let theme = savedTheme;
        if (!savedTheme || savedTheme === 'system') {
            theme = systemPrefersDark ? 'dark' : 'light';
        }

        const isDark = theme === 'dark';
        applyTheme(isDark);

        // Setup toggle icon click handler
        const themeIcon = document.getElementById('themeIcon');
        if (themeIcon) {
            themeIcon.addEventListener('click', toggleTheme);

            // Keyboard accessibility
            themeIcon.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    toggleTheme();
                }
            });
        }

        // Tooltip initialization
        $('[data-toggle="tooltip"]').tooltip();
    });

    // Listen for theme changes from other tabs/windows
    window.addEventListener('storage', function(e) {
        if (e.key === 'theme' || e.key === 'flux.appearance' || e.key === 'flux:appearance') {
            const isDark = e.newValue === 'dark';
            applyTheme(isDark);
        }
    });

    // Listen for Livewire navigation
    document.addEventListener('livewire:navigated', function() {
        // Reapply theme after navigation
        const savedTheme = localStorage.getItem('flux.appearance') ||
            localStorage.getItem('flux:appearance') ||
            localStorage.getItem('theme');

        const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

        let theme = savedTheme;
        if (!savedTheme || savedTheme === 'system') {
            theme = systemPrefersDark ? 'dark' : 'light';
        }

        const isDark = theme === 'dark';
        applyTheme(isDark);
    });
</script>

</body>
</html>
