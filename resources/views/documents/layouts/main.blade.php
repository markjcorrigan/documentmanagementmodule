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
                }
            } catch (error) {
                console.log('Theme init failed');
            }
        })();
    </script>

    @stack('styles')
</head>
<body class="min-h-screen !bg-white dark:!bg-zinc-900 transition-colors duration-300">

<!-- Documents Navigation -->
@include('documents.partials.navigation')

<!-- Main Content -->
<main class="py-8">
    @yield('content')
</main>

<!-- Footer -->
<x-footer />

{{-- SCROLL TO TOP BUTTON --}}
<div x-data="{
    showScroll: false,
    scrollProgress: 0,
    init() {
        window.addEventListener('scroll', () => {
            const scrollTop = window.scrollY;
            const docHeight = document.documentElement.scrollHeight - window.innerHeight;
            const scrollPercent = scrollTop / docHeight;
            this.scrollProgress = Math.min(scrollPercent * 100, 100);
            this.showScroll = scrollTop > 300;
        });
    },
    scrollToTop() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }
}">
    <button
            x-show="showScroll"
            @click="scrollToTop()"
            class="fixed bottom-6 right-6 w-12 h-12 bg-blue-600 dark:bg-blue-500 hover:bg-blue-700 dark:hover:bg-blue-600 text-white rounded-full shadow-lg hover:shadow-xl transition-all duration-300 z-[9999] flex items-center justify-center group"
            aria-label="Scroll to top"
            :style="`--scroll-dashoffset: ${283 - (scrollProgress / 100) * 283}`"
            style="z-index: 9999 !important;"
    >
        <svg class="absolute top-0 left-0 w-12 h-12 transform -rotate-90" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid meet">
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
                    :stroke-dashoffset="283 - (scrollProgress / 100) * 283"
                    class="transition-all duration-100"
            />
        </svg>
        <i class="fa-solid fa-arrow-up text-white text-sm relative z-10 group-hover:transform group-hover:-translate-y-0.5 transition-transform"></i>
    </button>
</div>

<!-- Livewire Scripts -->
@livewireScripts

@stack('scripts')
</body>
</html>
