<!DOCTYPE html>
{{-- Visitor Analytics Layout --}}
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.head')
    <link rel="stylesheet" href="{{ asset('fontawesome6/fontawesome6/pro/css/all.min.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        /* Ensure proper layout */
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex: 1;
            padding-top: 2rem;
            padding-bottom: 2rem;
        }

        button[aria-label="Scroll to top"] {
            z-index: 9999 !important;
            position: fixed !important;
        }
    </style>
</head>

<body class="min-h-screen bg-white dark:bg-zinc-800">
<x-toast-notification />

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
                document.body.classList.add('dark');
                document.body.style.backgroundColor = '#27272a';
                document.documentElement.style.backgroundColor = '#27272a';
            }
        } catch (error) {
            console.log('Pre-init theme application failed');
        }
    })();
</script>

{{-- HEADER --}}
<flux:header container class="border-b border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
    <div class="w-full flex justify-between items-center min-h-[60px] px-4">
        {{-- Left: Logo / Home Link --}}
        <div class="flex items-center">
            <a href="{{ route('home') }}" class="nav-link">
                <span class="flex h-10 w-10 md:h-12 md:w-12 items-center justify-center rounded-md">
                    <span class="block dark:hidden">
                        <x-app-logo-icon-black/>
                    </span>
                    <span class="hidden dark:block">
                        <x-app-logo-icon-white/>
                    </span>
                </span>
            </a>
        </div>

        {{-- Right: Theme Toggle --}}
        <div class="flex items-center">
            <div wire:ignore>
                <i id="themeIcon"
                   class="fa-solid fa-moon cursor-pointer text-xl hover:rotate-180 hover:scale-110 transition-all duration-300 text-gray-700 dark:text-gray-300"
                   title="Toggle theme"
                   role="button"
                   tabindex="0"
                   aria-label="Toggle theme"></i>
            </div>
        </div>
    </div>
</flux:header>

{{-- MAIN CONTENT - This is where your Livewire view loads --}}
<main class="container mx-auto px-4">
    {{ $slot }}
</main>

{{-- FOOTER --}}
<footer class="mt-auto">
    <x-footer />
</footer>

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
            class="fixed bottom-6 right-6 w-12 h-12 bg-blue-600 hover:bg-blue-700 text-white rounded-full shadow-lg hover:shadow-xl transition-all duration-300 z-[9999] flex items-center justify-center group"
            aria-label="Scroll to top"
            style="display: none;">
        <svg class="absolute top-0 left-0 w-12 h-12 transform -rotate-90" viewBox="0 0 100 100">
            <circle cx="50" cy="50" r="45" stroke="rgba(255,255,255,0.3)" stroke-width="3" fill="none" />
            <circle cx="50" cy="50" r="45" stroke="white" stroke-width="3" fill="none" stroke-dasharray="283"
                    :stroke-dashoffset="283 - (scrollProgress / 100) * 283" class="transition-all duration-100" />
        </svg>
        <i class="fa-solid fa-arrow-up text-white text-sm relative z-10 group-hover:transform group-hover:-translate-y-0.5 transition-transform"></i>
    </button>
</div>

{{-- SCRIPTS --}}
@stack('scripts')
@livewireScripts
@fluxScripts

</body>
</html>