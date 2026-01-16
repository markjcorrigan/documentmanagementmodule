<!DOCTYPE html>
{{-- Documents Module Layout --}}
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Documents</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('fontawesome6/fontawesome6/pro/css/all.min.css') }}">

    <!-- Vite Assets (Tailwind CSS + JS) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

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

                if (theme === 'dark') {
                    document.documentElement.classList.add('dark');
                    document.body.style.backgroundColor = '#27272a';
                }
            } catch (error) {
                console.log('Theme init failed');
            }
        })();
    </script>

    @stack('styles')
</head>
<body class="min-h-screen bg-zinc-50 dark:bg-zinc-900">

<!-- Documents Navigation -->
@include('documents.partials.navigation')

<!-- Main Content -->
<main class="py-8">
    @yield('content')
</main>

<!-- Footer -->
<x-footer />

<!-- Livewire Scripts -->
@livewireScripts

@stack('scripts')
</body>
</html>
