<!DOCTYPE html>
{{-- Notes Layout - Bootstrap with Theme Integration --}}
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Notes</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <!-- Font Awesome (for consistency with your other pages) -->
    <link rel="stylesheet" href="{{ asset('fontawesome6/css/all.min.css') }}">

    <!-- Livewire Styles -->
    @livewireStyles

    <!-- Theme initialization - INTEGRATED WITH YOUR STYLE-GUIDE -->
    <script>
        (function() {
            try {
                // Check ALL possible theme storage keys (matches your other pages)
                const savedTheme = localStorage.getItem('flux.appearance') ||
                    localStorage.getItem('flux:appearance') ||
                    localStorage.getItem('theme');

                const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

                let theme = savedTheme;
                if (!savedTheme || savedTheme === 'system') {
                    theme = systemPrefersDark ? 'dark' : 'light';
                }

                // Apply to Bootstrap's data-bs-theme
                document.documentElement.setAttribute('data-bs-theme', theme);

                // Also add Tailwind's .dark class for consistency
                if (theme === 'dark') {
                    document.documentElement.classList.add('dark');
                }
            } catch (error) {
                console.log('Theme init failed');
            }
        })();
    </script>

    <!-- Custom Styles - FIXED NAVBAR THEMING -->
    <style>
        body {
            transition: background-color 0.3s ease, color 0.3s ease;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #27272a !important; /* zinc-800 from style guide */
            overflow-x: hidden;
        }

        /* Make main content grow to push footer to bottom */
        main {
            flex: 1;
            background-color: #ffffff;
            margin: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Dark mode adjustments */
        [data-bs-theme="dark"] main {
            background-color: #111827; /* gray-900 from style guide */
            color: #e5e7eb;
        }

        /* FOOTER PADDING FIX - Add 1cm (10px) top padding */
        footer {
            padding-top: 10px !important;
        }

        /* Dark mode adjustments for Bootstrap elements */
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

        /* FOOTER RESPONSIVENESS FIX */
        footer {
            width: 100%;
            max-width: 100%;
            overflow-x: hidden;
            box-sizing: border-box;
        }

        footer .container {
            max-width: 100%;
            padding-left: 15px;
            padding-right: 15px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Ensure footer content wraps on small screens */
        footer * {
            max-width: 100%;
        }

        /* Mobile-specific fixes */
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
    </style>

    <!-- Page Specific Styles -->
    @stack('styles')
</head>
<body>
<!-- Navigation Bar -->
<x-navnotes />

<!-- Main Content Area -->
<main class="py-4">
    <div class="container">
        {{ $slot ?? '' }}
        @yield('content')
    </div>
</main>

<!-- Use your x-footer component - Will sit at bottom -->
<x-footer />

<!-- Bootstrap Image Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-transparent border-0">
            <div class="modal-header border-0 pb-0">
                <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center p-0">
                <img id="modalImage" src="" alt="Enlarged view" class="img-fluid rounded shadow">
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap Bundle JS (includes Popper) - MUST be before Livewire -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Livewire Scripts - MUST be after Bootstrap -->
@livewireScripts

<!-- Page Specific Scripts -->
@stack('scripts')
</body>
</html>