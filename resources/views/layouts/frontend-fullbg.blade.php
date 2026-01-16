<!DOCTYPE html>
{{-- Custom Layout for Full Background Control - Based on app.blade.php --}}
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('fontawesome6/css/all.min.css') }}">

    <!-- Livewire Styles -->
    @livewireStyles

    <!-- Theme initialization -->
    <script>
        (function() {
            try {
                const savedTheme = localStorage.getItem('flux.appearance') ||
                    localStorage.getItem('flux:appearance') ||
                    localStorage.getItem('theme');

                const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

                let theme = savedTheme;
                if (!savedTheme || savedTheme === 'system') {
                    theme = systemPrefersDark ? 'dark' : 'light';
                }

                document.documentElement.setAttribute('data-bs-theme', theme);

                if (theme === 'dark') {
                    document.documentElement.classList.add('dark');
                }
            } catch (error) {
                console.log('Theme init failed');
            }
        })();
    </script>

    <!-- Custom Styles -->
    <style>
        /* CUSTOM: No background on body - let page content control it */
        body {
            transition: background-color 0.3s ease, color 0.3s ease;
            padding-top: 56px; /* For fixed navbar */
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background: transparent !important; /* Let page control background */
        }

        /* CUSTOM: No wrapper styling - direct content control */
        main {
            flex: 1;
            /* NO background, margins, or padding - page has full control */
        }

        /* NAVBAR THEMING - Same as original */
        [data-bs-theme="light"] .navbar-theme {
            background-color: #ffffff !important;
            border-bottom: 1px solid #dee2e6 !important;
        }

        [data-bs-theme="light"] .navbar-theme .navbar-brand,
        [data-bs-theme="light"] .navbar-theme .nav-link,
        [data-bs-theme="light"] .navbar-theme .nav-link i {
            color: #212529 !important;
        }

        [data-bs-theme="light"] .navbar-theme .nav-link:hover {
            color: #000000 !important;
        }

        [data-bs-theme="light"] .navbar-theme .nav-link.active {
            color: #0d6efd !important;
            font-weight: 500;
            background-color: rgba(13, 110, 253, 0.1);
            border-radius: 4px;
        }

        [data-bs-theme="dark"] .navbar-theme {
            background-color: #000000 !important;
            border-bottom: 1px solid #333333 !important;
        }

        [data-bs-theme="dark"] .navbar-theme .navbar-brand,
        [data-bs-theme="dark"] .navbar-theme .nav-link,
        [data-bs-theme="dark"] .navbar-theme .nav-link i {
            color: #ffffff !important;
        }

        [data-bs-theme="dark"] .navbar-theme .nav-link:hover {
            color: #e0e0e0 !important;
        }

        [data-bs-theme="dark"] .navbar-theme .nav-link.active {
            color: #ffffff !important;
            font-weight: 500;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 4px;
        }

        /* Theme toggle button styling */
        .theme-toggle-btn {
            background: none;
            border: none;
            font-size: 1.2rem;
            padding: 0.375rem 0.75rem;
            border-radius: 4px;
            transition: all 0.3s ease;
        }

        [data-bs-theme="light"] .theme-toggle-btn {
            color: #212529 !important;
        }

        [data-bs-theme="light"] .theme-toggle-btn:hover {
            background-color: rgba(0, 0, 0, 0.1);
        }

        [data-bs-theme="dark"] .theme-toggle-btn {
            color: #ffffff !important;
        }

        [data-bs-theme="dark"] .theme-toggle-btn:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        #themeIcon.fa-sun {
            color: #fbbf24 !important;
        }

        [data-bs-theme="light"] #themeIcon.fa-moon {
            color: #212529 !important;
        }

        [data-bs-theme="dark"] #themeIcon.fa-moon {
            color: #ffffff !important;
        }

        /* Dark mode Bootstrap elements */
        [data-bs-theme="dark"] .card {
            background-color: #1e1e1e;
            border-color: #333333;
        }

        [data-bs-theme="dark"] .text-muted {
            color: #aaaaaa !important;
        }

        [data-bs-theme="dark"] .form-control,
        [data-bs-theme="dark"] .form-select {
            background-color: #2d2d2d;
            border-color: #444444;
            color: #e0e0e0;
        }

        [data-bs-theme="dark"] .form-control:focus,
        [data-bs-theme="dark"] .form-select:focus {
            background-color: #2d2d2d;
            border-color: #0d6efd;
            color: #e0e0e0;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }

        [data-bs-theme="light"] .navbar-toggler {
            border-color: rgba(0, 0, 0, 0.1);
        }

        [data-bs-theme="dark"] .navbar-toggler {
            border-color: rgba(255, 255, 255, 0.1);
        }

        [data-bs-theme="dark"] .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 0.75%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        /* Footer responsiveness */
        footer {
            width: 100%;
            max-width: 100%;
            overflow-x: hidden;
            box-sizing: border-box;
            padding-top: 10px !important;
        }

        footer .container {
            max-width: 100%;
            padding-left: 15px;
            padding-right: 15px;
            margin-left: auto;
            margin-right: auto;
        }

        footer * {
            max-width: 100%;
        }

        @media (max-width: 768px) {
            footer {
                padding-left: 10px !important;
                padding-right: 10px !important;
            }

            footer .row {
                margin-left: -5px;
                margin-right: -5px;
            }

            footer .col {
                padding-left: 5px;
                padding-right: 5px;
            }
        }

        body {
            overflow-x: hidden;
        }

        /* Scroll to top button styles */
        .scroll-to-top-btn {
            position: fixed;
            bottom: 24px;
            right: 24px;
            width: 48px;
            height: 48px;
            background-color: #2563eb;
            color: white;
            border: none;
            border-radius: 50%;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            cursor: pointer;
            z-index: 9999;
            display: none;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            opacity: 0;
            transform: translateY(20px);
        }

        .scroll-to-top-btn.show {
            display: flex;
            opacity: 1;
            transform: translateY(0);
        }

        .scroll-to-top-btn:hover {
            background-color: #1d4ed8;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .scroll-to-top-btn svg {
            position: absolute;
            top: 0;
            left: 0;
            width: 48px;
            height: 48px;
            transform: rotate(-90deg);
        }

        .scroll-to-top-btn svg circle {
            transition: stroke-dashoffset 0.1s ease;
        }

        .scroll-to-top-btn i {
            position: relative;
            z-index: 10;
            font-size: 14px;
            transition: transform 0.3s ease;
        }

        .scroll-to-top-btn:hover i {
            transform: translateY(-2px);
        }
    </style>

    @stack('styles')
</head>
<body>
<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-theme fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            {{ config('app.name', 'Laravel') }}
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
            </ul>

            <ul class="navbar-nav">
                <li class="nav-item">
                    <button class="btn btn-link nav-link theme-toggle-btn" id="themeToggle" onclick="toggleTheme()"
                            title="Toggle theme" aria-label="Toggle theme">
                        <i class="fas fa-moon" id="themeIcon"></i>
                    </button>
                </li>

                @auth
                    <li class="nav-item">
                        <span class="nav-link">
                            <i class="bi bi-person-circle me-1"></i>
                            {{ Auth::user()->name }}
                        </span>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<!-- Main Content Area - NO WRAPPER - Full control to page -->
<main>
    @yield('content')
</main>

<!-- Footer -->
<x-footer />

<!-- Scroll to Top Button -->
<button class="scroll-to-top-btn" id="scrollToTopBtn" aria-label="Scroll to top">
    <svg viewBox="0 0 100 100" preserveAspectRatio="xMidYMid meet">
        <circle
            cx="50"
            cy="50"
            r="45"
            stroke="rgba(255,255,255,0.3)"
            stroke-width="3"
            fill="none"
        />
        <circle
            cx="50"
            cy="50"
            r="45"
            stroke="white"
            stroke-width="3"
            fill="none"
            stroke-dasharray="283"
            id="scrollProgressCircle"
        />
    </svg>
    <i class="fa-solid fa-arrow-up"></i>
</button>

<!-- Bootstrap Bundle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Livewire Scripts -->
@livewireScripts

<!-- Theme Toggle Script -->
<script>
    function initializeTheme() {
        const savedTheme = localStorage.getItem('flux.appearance') ||
            localStorage.getItem('flux:appearance') ||
            localStorage.getItem('theme') ||
            'light';

        document.documentElement.setAttribute('data-bs-theme', savedTheme);
        updateThemeIcon(savedTheme);

        if (savedTheme === 'dark') {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    }

    function toggleTheme() {
        const currentTheme = document.documentElement.getAttribute('data-bs-theme');
        const newTheme = currentTheme === 'dark' ? 'light' : 'dark';

        document.documentElement.setAttribute('data-bs-theme', newTheme);

        if (newTheme === 'dark') {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }

        localStorage.setItem('theme', newTheme);
        localStorage.setItem('flux:appearance', newTheme);
        localStorage.setItem('flux.appearance', newTheme);

        updateThemeIcon(newTheme);
    }

    function updateThemeIcon(theme) {
        const icon = document.getElementById('themeIcon');
        if (icon) {
            if (theme === 'dark') {
                icon.classList.remove('fa-moon');
                icon.classList.add('fa-sun');
                icon.style.color = '#fbbf24';
            } else {
                icon.classList.remove('fa-sun');
                icon.classList.add('fa-moon');
            }
        }
    }

    // Scroll to Top Button Functionality
    (function() {
        const scrollBtn = document.getElementById('scrollToTopBtn');
        const progressCircle = document.getElementById('scrollProgressCircle');
        const circumference = 283; // 2 * PI * 45

        function updateScrollButton() {
            const scrollTop = window.scrollY;
            const docHeight = document.documentElement.scrollHeight - window.innerHeight;
            const scrollPercent = scrollTop / docHeight;
            const scrollProgress = Math.min(scrollPercent * 100, 100);

            // Update progress circle
            const offset = circumference - (scrollProgress / 100) * circumference;
            progressCircle.style.strokeDashoffset = offset;

            // Show/hide button
            if (scrollTop > 300) {
                scrollBtn.classList.add('show');
            } else {
                scrollBtn.classList.remove('show');
            }
        }

        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }

        // Initialize
        progressCircle.style.strokeDashoffset = circumference;

        // Event listeners
        window.addEventListener('scroll', updateScrollButton);
        scrollBtn.addEventListener('click', scrollToTop);
    })();

    document.addEventListener('DOMContentLoaded', initializeTheme);
</script>

@stack('scripts')
</body>
</html>
