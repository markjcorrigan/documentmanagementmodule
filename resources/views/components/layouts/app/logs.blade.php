<!DOCTYPE html>
{{-- Logs Layout - Tailwind CSS with Theme Integration --}}
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.head')
    <link rel="stylesheet" href="{{ asset('fontawesome6/fontawesome6/pro/css/all.min.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Logs-specific styles --}}
    <style>
        /* Ensure scroll button stays on top */
        button[aria-label="Scroll to top"] {
            z-index: 9999 !important;
            position: fixed !important;
        }
    </style>
</head>

<body class="min-h-screen bg-white dark:bg-zinc-800">
<x-toast-notification />

{{-- CRITICAL: Prevent flash of unstyled content --}}
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

{{-- LOGS HEADER --}}
<flux:header container class="border-b flex justify-between items-center border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900 min-h-[60px] px-4">

    {{-- Logo / Home Link --}}
    <div class="flex items-center flex-shrink-0">
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

    {{-- Logs Navigation --}}
    <div class="flex items-center gap-2 md:gap-4 ml-auto" wire:ignore>
        <nav class="flex items-center justify-end gap-2 md:gap-3">

            {{-- Logs Dropdown Menu --}}
            <div wire:ignore>
                <flux:dropdown align="end">
                    <flux:button
                            variant="primary"
                            class="bg-gray-200 hover:bg-gray-300 text-gray-900 dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-white transition-colors"
                            icon:trailing="chevron-down">
                        <i class="fa-solid fa-journal-text mr-2"></i>
                        <span class="hidden md:inline">Logs</span>
                    </flux:button>

                    <flux:menu class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 w-48 md:w-56">
                        <flux:menu.item
                                href="{{ route('logs.index') }}"
                                class="text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                            <i class="fa-solid fa-list mr-2"></i> All Logs
                        </flux:menu.item>

                        <flux:menu.item
                                href="{{ route('logs.categories') }}"
                                class="text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                            <i class="fa-solid fa-folder mr-2"></i> Categories
                        </flux:menu.item>
                    </flux:menu>  {{-- ⭐ THIS WAS MISSING --}}
                </flux:dropdown>
            </div>

            {{-- Back to Main Site --}}
{{--            <a href="{{ route('home') }}"--}}
{{--               class="inline-flex items-center px-3 py-2 bg-gray-200 hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-900 dark:text-white rounded-lg transition-colors">--}}
{{--                <i class="fa-solid fa-home mr-2"></i>--}}
{{--                <span class="hidden md:inline">Home</span>--}}
{{--            </a>--}}

            {{-- Theme Toggle Icon --}}
            <div wire:ignore class="flex-shrink-0">
                <i id="themeIcon"
                   class="fa-solid fa-moon cursor-pointer text-xl hover:rotate-180 hover:scale-110 transition-all duration-300"
                   style="color: #1f2937;"
                   title="Toggle theme"
                   role="button"
                   tabindex="0"
                   aria-label="Toggle theme"></i>
            </div>
        </nav>
    </div>
</flux:header>

{{-- MAIN CONTENT --}}
<flux:main container style="padding-bottom: 50px; padding-top: 60px;">
    {{ $slot }}
</flux:main>

{{-- Footer Spacer --}}
<div style="height: 100px;"></div>

{{-- FOOTER --}}
<flux:footer style="width: 100%; margin: 0; padding: 0;">
    <x-footer />
</flux:footer>

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
            :style="`--scroll-dashoffset: ${283 - (scrollProgress / 100) * 283}`"
            style="z-index: 9999 !important;">
        <svg class="absolute top-0 left-0 w-12 h-12 transform -rotate-90" viewBox="0 0 100 100">
            <circle cx="50" cy="50" r="45" stroke="rgba(255,255,255,0.3)" stroke-width="3" fill="none" />
            <circle cx="50" cy="50" r="45" stroke="white" stroke-width="3" fill="none" stroke-dasharray="283"
                    :stroke-dashoffset="283 - (scrollProgress / 100) * 283" class="transition-all duration-100" />
        </svg>
        <i class="fa-solid fa-arrow-up text-white text-sm relative z-10 group-hover:transform group-hover:-translate-y-0.5 transition-transform"></i>
    </button>
</div>

{{-- IMAGE MODAL (Tailwind Version) --}}
<div id="imageModal"
     class="fixed inset-0 z-[9999] hidden bg-black/80 backdrop-blur-sm"
     onclick="closeImageModal()">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="relative max-w-7xl w-full">
            {{-- Close Button --}}
            <button
                    onclick="closeImageModal()"
                    class="absolute top-4 right-4 z-10 w-10 h-10 flex items-center justify-center rounded-full bg-white/10 hover:bg-white/20 text-white transition-colors">
                <i class="fa-solid fa-xmark text-2xl"></i>
            </button>

            {{-- Image --}}
            <img id="modalImage"
                 src=""
                 alt="Enlarged view"
                 class="w-full h-auto rounded-lg shadow-2xl"
                 onclick="event.stopPropagation()">
        </div>
    </div>
</div>

<script>
    function openImageModal(imageSrc) {
        document.getElementById('modalImage').src = imageSrc;
        document.getElementById('imageModal').classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeImageModal() {
        document.getElementById('imageModal').classList.add('hidden');
        document.body.style.overflow = '';
    }

    // Close on ESC key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && !document.getElementById('imageModal').classList.contains('hidden')) {
            closeImageModal();
        }
    });
</script>

{{-- SCRIPTS --}}
@stack('scripts')
@livewireScripts
@fluxScripts

</body>
</html>