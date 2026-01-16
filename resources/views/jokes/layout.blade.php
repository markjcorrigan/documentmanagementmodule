<!DOCTYPE html>
{{-- Jokes Module Layout --}}
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Jokes') - {{ config('app.name') }}</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Theme Initialization (MUST BE IN HEAD BEFORE CSS) -->
    <script>
        // ✅ Apply theme IMMEDIATELY before page renders to prevent flash
        (function() {
            // STEP 1: Read theme from localStorage (priority order)
            const savedTheme = localStorage.getItem('flux.appearance') ||
                localStorage.getItem('flux:appearance') ||
                localStorage.getItem('theme');

            // STEP 2: Check system preference if no saved theme
            const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

            // STEP 3: Resolve 'system' preference
            let theme = savedTheme;
            if (!savedTheme || savedTheme === 'system') {
                theme = systemPrefersDark ? 'dark' : 'light';
            }

            // STEP 4: Apply theme immediately
            const html = document.documentElement;
            if (theme === 'dark') {
                html.classList.add('dark');
                html.setAttribute('data-bs-theme', 'dark');
                html.setAttribute('data-theme', 'dark');
                html.setAttribute('flux:appearance', 'dark');
            } else {
                html.classList.remove('dark');
                html.setAttribute('data-bs-theme', 'light');
                html.setAttribute('data-theme', 'light');
                html.setAttribute('flux:appearance', 'light');
            }
        })();
    </script>

    <style>
        /* THEME-AWARE STYLES */

        /* LIGHT MODE */
        [data-bs-theme="light"] body {
            background-color: #f8f9fa;
            color: #212529;
        }
        [data-bs-theme="light"] .navbar {
            background-color: #f8f9fa !important;
            border-bottom: 1px solid #dee2e6;
        }
        [data-bs-theme="light"] .card {
            background-color: #ffffff;
            border-color: #dee2e6;
        }

        /* DARK MODE */
        [data-bs-theme="dark"] body {
            background-color: #212529;
            color: #dee2e6;
        }
        [data-bs-theme="dark"] .navbar {
            background-color: #212529 !important;
            border-bottom: 1px solid #495057;
        }
        [data-bs-theme="dark"] .card {
            background-color: #2c3034;
            border-color: #495057;
        }
        [data-bs-theme="dark"] .text-muted {
            color: #adb5bd !important;
        }
        [data-bs-theme="dark"] .card-footer {
            border-color: #495057;
        }
        [data-bs-theme="dark"] .modal-content {
            background-color: #2c3034;
            color: #dee2e6;
        }
        [data-bs-theme="dark"] .form-control,
        [data-bs-theme="dark"] .form-select {
            background-color: #2c3034;
            border-color: #495057;
            color: #dee2e6;
        }
        [data-bs-theme="dark"] .form-control:focus,
        [data-bs-theme="dark"] .form-select:focus {
            background-color: #2c3034;
            border-color: #0d6efd;
            color: #dee2e6;
        }
        [data-bs-theme="dark"] .table {
            color: #dee2e6;
            border-color: #495057;
        }
        [data-bs-theme="dark"] .table-striped > tbody > tr:nth-of-type(odd) > * {
            background-color: rgba(255, 255, 255, 0.03);
        }
        [data-bs-theme="dark"] .table-hover > tbody > tr:hover > * {
            background-color: rgba(255, 255, 255, 0.075);
        }
        [data-bs-theme="dark"] .list-group-item {
            background-color: #2c3034;
            border-color: #495057;
            color: #dee2e6;
        }
        [data-bs-theme="dark"] .list-group-item-action:hover {
            background-color: #343a40;
        }

        /* NAVBAR TEXT COLORS */
        [data-bs-theme="light"] .navbar .navbar-brand,
        [data-bs-theme="light"] .navbar .nav-link {
            color: #212529 !important;
        }
        [data-bs-theme="light"] .navbar .nav-link:hover {
            color: #0d6efd !important;
        }
        [data-bs-theme="dark"] .navbar .navbar-brand,
        [data-bs-theme="dark"] .navbar .nav-link {
            color: #f8f9fa !important;
        }
        [data-bs-theme="dark"] .navbar .nav-link:hover {
            color: #0d6efd !important;
        }

        /* NAVBAR TOGGLER */
        [data-bs-theme="light"] .navbar-toggler {
            border-color: rgba(0,0,0,.1);
        }
        [data-bs-theme="light"] .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%280, 0, 0, 0.55%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        /* DROPDOWN MENU */
        [data-bs-theme="light"] .navbar .dropdown-menu {
            background-color: #ffffff;
            border-color: #dee2e6;
        }
        [data-bs-theme="light"] .navbar .dropdown-item {
            color: #212529;
        }
        [data-bs-theme="light"] .navbar .dropdown-item:hover {
            background-color: #f8f9fa;
        }
        [data-bs-theme="dark"] .navbar .dropdown-menu {
            background-color: #2c3034;
            border-color: #495057;
        }
        [data-bs-theme="dark"] .navbar .dropdown-item {
            color: #dee2e6;
        }
        [data-bs-theme="dark"] .navbar .dropdown-item:hover {
            background-color: #343a40;
        }

        /* THEME TOGGLE ICON COLORS */
        /* YELLOW SUN in dark mode */
        [data-bs-theme="dark"] #themeIcon.bi-sun {
            color: #ffc107 !important;
        }
        /* Dark moon in light mode */
        [data-bs-theme="light"] #themeIcon.bi-moon-stars {
            color: #212529 !important;
        }

        /* PAGE HEADER */
        .page-header {
            padding: 1.5rem 0;
            margin-bottom: 1.5rem;
            border-bottom: 1px solid;
        }
        [data-bs-theme="light"] .page-header {
            border-bottom-color: #dee2e6;
        }
        [data-bs-theme="dark"] .page-header {
            border-bottom-color: #495057;
        }

        /* UTILITY CLASSES */
        .cursor-pointer {
            cursor: pointer;
        }
    </style>

    @stack('styles')
</head>
<body>
<!-- Navbar -->

<x-navjokes />
{{--<nav class="navbar navbar-expand-lg">--}}
{{--    <div class="container-fluid">--}}
{{--        <a class="navbar-brand" href="{{ route('jokes.index') }}">--}}
{{--            <i class="bi bi-emoji-laughing"></i> Jokes--}}
{{--        </a>--}}
{{--        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">--}}
{{--            <span class="navbar-toggler-icon"></span>--}}
{{--        </button>--}}
{{--        <div class="collapse navbar-collapse" id="navbarNav">--}}
{{--            <ul class="navbar-nav me-auto">--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="{{ route('jokes.index') }}">All Jokes</a>--}}
{{--                </li>--}}
{{--                @can('joke management')--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="{{ route('jokes.create') }}">Create Joke</a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="{{ route('jokes.jokecats.index') }}">Categories</a>--}}
{{--                    </li>--}}
{{--                @endcan--}}
{{--            </ul>--}}
{{--            <ul class="navbar-nav">--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="/">--}}
{{--                        <i class="bi bi-house"></i> Home--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <button id="themeToggle" onclick="toggleTheme()" class="btn btn-link nav-link">--}}
{{--                        <i class="bi bi-moon-stars" id="themeIcon"></i>--}}
{{--                    </button>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</nav>--}}

<!-- Main Content -->
<div class="container mt-4">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @yield('content')
</div>

<!-- Footer -->
<footer class="mt-5 py-4 border-top">
    <style>
        .joke-footer {
            background-color: #111;
            color: #ccc;
            font-size: 0.85rem;
            line-height: 1.5;
            padding: 20px 15px;
            border-top: 1px solid #333;
        }

        .joke-footer-inner {
            max-width: 900px;
            margin: 0 auto;
            text-align: center;
        }

        .joke-footer p {
            margin: 0.5em 0;
        }

        .joke-footer strong {
            color: #fff;
            font-weight: 600;
        }

        .joke-footer .muted {
            color: #888;
            font-style: italic;
        }
    </style>
    <div class="container text-center text-muted">
        <style>
            /* Shared styles */
            .joke-footer {
                font-size: 0.85rem;
                line-height: 1.6;
                padding: 22px 16px;
                border-top: 1px solid;
                transition: background-color 0.3s ease, color 0.3s ease;
            }

            .joke-footer-inner {
                max-width: 900px;
                margin: 0 auto;
                text-align: center;
            }

            .joke-footer p {
                margin: 0.6em 0;
            }

            .joke-footer strong {
                font-weight: 600;
            }

            .joke-footer .muted {
                font-style: italic;
            }

            /* 🌞 Light mode (default) */
            .joke-footer {
                background-color: #f8f9fa;
                color: #333;
                border-color: #ddd;
            }

            .joke-footer .muted {
                color: #666;
            }

            /* 🌙 Dark mode */
            .dark .joke-footer {
                background-color: #111;
                color: #ccc;
                border-color: #333;
            }

            .dark .joke-footer strong {
                color: #fff;
            }

            .dark .joke-footer .muted {
                color: #888;
            }
        </style>

        <footer class="joke-footer">
            <div class="joke-footer-inner">
                <p>
                    <strong>Please note:</strong><br>
                    This joke database was compiled automatically from content found around the internet.
                    The site owner does not endorse or take responsibility for the nature of individual jokes.
                </p>

                <p>
                    Some jokes may be crude, offensive, or in poor taste.
                    If this isn't your thing, it's best to move along.
                </p>

                <p class="muted">
                    Over time, the collection will be reviewed and jokes likely to offend will be removed.
                </p>
            </div>
        </footer>


        <!-- jQuery (required for AJAX) -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- Bootstrap 5 JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

        <!-- CSRF Token Setup for AJAX -->
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>

        <!-- Theme Switcher Script -->
        <script>
            function toggleTheme() {
                // STEP 1: Get current theme
                const currentTheme = document.documentElement.getAttribute('data-bs-theme') ||
                    (document.documentElement.classList.contains('dark') ? 'dark' : 'light');

                // STEP 2: Toggle to opposite theme
                const newTheme = currentTheme === 'dark' ? 'light' : 'dark';

                // STEP 3: Save to ALL localStorage keys (for synchronization)
                localStorage.setItem('flux.appearance', newTheme);
                localStorage.setItem('flux:appearance', newTheme);
                localStorage.setItem('theme', newTheme);

                // STEP 4: Apply theme to page
                applyTheme(newTheme);

                // STEP 5: Dispatch event for other scripts
                window.dispatchEvent(new CustomEvent('themeChanged', {
                    detail: { theme: newTheme }
                }));
            }

            function applyTheme(theme) {
                const html = document.documentElement;

                if (theme === 'dark') {
                    // Apply dark theme
                    html.classList.add('dark');
                    html.setAttribute('data-bs-theme', 'dark');
                    html.setAttribute('data-theme', 'dark');
                    html.setAttribute('flux:appearance', 'dark');
                } else {
                    // Apply light theme
                    html.classList.remove('dark');
                    html.setAttribute('data-bs-theme', 'light');
                    html.setAttribute('data-theme', 'light');
                    html.setAttribute('flux:appearance', 'light');
                }

                // Update icon
                updateThemeIcon(theme);
            }

            function updateThemeIcon(theme) {
                const icon = document.getElementById('themeIcon');
                if (!icon) return;

                if (theme === 'dark') {
                    // Dark mode → show SUN icon (yellow)
                    icon.classList.remove('bi-moon-stars');
                    icon.classList.add('bi-sun');
                } else {
                    // Light mode → show MOON icon
                    icon.classList.remove('bi-sun');
                    icon.classList.add('bi-moon-stars');
                }
            }

            // Initialize theme on page load
            document.addEventListener('DOMContentLoaded', function() {
                const currentTheme = document.documentElement.getAttribute('data-bs-theme') || 'light';
                updateThemeIcon(currentTheme);
            });
        </script>

@stack('scripts')
</body>
</html>