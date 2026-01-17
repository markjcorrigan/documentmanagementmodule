<!DOCTYPE html>
{{-- Livewire Landing Page Layout - MOBILE FIXED VERSION --}}
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.head')
    <link rel="stylesheet" href="{{ asset('fontawesome6/fontawesome6/pro/css/all.min.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Chat Icon Dark Mode Support --}}
    <style>
        #chatIcon {
            color: #1f2937 !important;
        }
        .dark #chatIcon {
            color: #f3f4f6 !important;
        }

        /* Ensure scroll button stays on top of everything */
        button[aria-label="Scroll to top"] {
            z-index: 9999 !important;
            position: fixed !important;
        }

        /* Force Able Player elements to have lower z-index */
        .able-player,
        .able-wrapper,
        .able-video,
        .able-controls,
        .able-button,
        .able-status-bar {
            z-index: 1 !important;
            position: relative !important;
        }

        /* Ensure no Able Player overlay covers the scroll button */
        .able-overlay,
        .able-captions,
        .able-transcript {
            z-index: 10 !important;
        }

        /* Mobile-specific fixes */
        @media (max-width: 768px) {
            .header-container {
                padding: 0 1rem !important;
            }

            .nav-items-container {
                gap: 0.5rem !important;
            }

            .menu-text {
                display: none !important;
            }

            .impersonation-banner {
                margin-right: 0.5rem !important;
            }

            flux:button {
                padding: 0.25rem 0.5rem !important;
                font-size: 0.875rem !important;
            }

            /* Make chat button more compact on mobile */
            /* Hide the chat icon on mobile screens */
            a[href*="chat.index"] i.fa-comment,
            a[href*="chat.index"] i.fa-comments,
            a[href*="chat.index"] svg[class*="comment"] {
                display: none !important;
            }

            /* Target the LiveChat text and make it shorter */
            a[href*="chat.index"] flux:button {
                font-size: 0.75rem !important;
                padding: 0.25rem 0.4rem !important;
                white-space: nowrap !important;
            }
        }

        @media (max-width: 640px) {
            .complex-menu-items {
                flex-wrap: wrap;
                justify-content: flex-end;
            }

            /* Extra compact for small screens */
            a[href*="chat.index"] flux:button {
                padding: 0.25rem 0.35rem !important;
                font-size: 0.7rem !important;
            }
        }

        @media (max-width: 480px) {
            .logo-link {
                min-width: 40px;
            }

            .header-container {
                min-height: 50px !important;
            }
        }
    </style>
</head>

<body class="min-h-screen bg-white dark:bg-zinc-800">
<x-toast-notification />
@auth
    {{-- Presence tracker will be initialized via JavaScript only --}}
@endauth

{{-- CRITICAL: Prevent flash of unstyled content - MUST stay inline --}}
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

{{-- HEADER - MOBILE FIXED --}}
<flux:header container class="header-container border-b flex justify-between items-center shadow-b border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900 min-h-[60px] px-4">

    {{-- Logo / Home Link --}}
    <div class="flex items-center flex-shrink-0">
        <a href="{{ route('home') }}" class="logo-link nav-link relative top-0">
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

    {{-- Right Side Navigation - MOBILE OPTIMIZED --}}
    <div class="flex items-center gap-1 md:gap-2 ml-auto complex-menu-items" wire:ignore>

        {{-- Impersonation Banner (Admin Only) - MOBILE FIXED --}}
        @auth
            @if(Session::has('admin_user_id'))
                <div class="py-2 flex items-center justify-center dark:text-white rounded impersonation-banner mr-2 md:mr-4">
                    <form id="stop-impersonating" class="flex flex-col items-center gap-2"
                          action="{{ route('impersonate.destroy') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <flux:button type="submit" size="sm" variant="danger" form="stop-impersonating"
                                     class="!w-full !flex !flex-row cursor-pointer text-xs md:text-sm">
                            <div class="flex items-center gap-1 md:gap-2">
                                <flux:icon.loader-circle class="animate-spin mr-1 md:mr-2 h-3 w-3 md:h-4 md:w-4" />
                                <span class="menu-text">{{ __('users.stop_impersonating') }}</span>
                            </div>
                        </flux:button>
                    </form>
                </div>
            @endif
        @endauth

        <flux:spacer class="hidden md:block" />

        <nav class="flex items-center justify-end gap-1 md:gap-3 nav-items-container">

            {{-- LIVE CHAT BUTTON - Only for LiveChat role members --}}
            @auth
                @can('live chat')
                    <a href="{{ route('chat.index') }}" class="flex-shrink-0 relative">
                        <flux:button
                                variant="primary"
                                id="liveChatButton"
                                data-chat-status="idle"
                                class="!p-2 !min-h-0 bg-gray-200 hover:bg-gray-300 text-gray-900 dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-white transition-colors relative">
                            <div class="flex items-center gap-2 relative">
                                <i class="fa-solid fa-comments text-base md:text-lg hidden md:inline-block"></i>
                                <span class="font-medium text-sm md:text-base whitespace-nowrap">
                            <span class="md:hidden">Chat</span>
                            <span class="hidden md:inline">Live Chat</span>
                        </span>
                            </div>

                            {{-- Blue badge for online count --}}
                            <span data-online-count-badge
                                  class="absolute -top-1.5 -right-1.5 inline-flex items-center justify-center px-1.5 py-0.5 text-xs font-bold leading-none text-white bg-blue-600 dark:bg-blue-500 rounded-full min-w-[20px] h-5 shadow-lg border-2 border-white dark:border-gray-800"
                                  style="display: none;">
                        0
                    </span>

                            {{-- Yellow badge for chat requests --}}
                            <span id="chatRequestIndicator"
                                  class="absolute -top-1.5 -right-1.5 flex items-center justify-center w-6 h-6 bg-gradient-to-br from-yellow-400 to-orange-500 text-white text-sm font-black rounded-full border-2 border-white dark:border-gray-800 shadow-lg animate-pulse"
                                  style="display: none;">
                        !
                    </span>
                        </flux:button>
                    </a>
                @endcan
            @endauth

            {{-- BLOG DROPDOWN MENU - FIXED VERSION (search removed) --}}
            @auth
                <div wire:ignore class="blog-dropdown">
                    <flux:dropdown align="end">

                        <flux:button
                                variant="primary"
                                class="bg-gray-200 hover:bg-gray-300 text-gray-900 dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-white transition-colors !px-2 md:!px-3"
                                icon:trailing="chevron-down">
                            <span class="hidden md:inline">Blog</span>
                            <span class="inline md:hidden"><i class="fa-solid fa-blog"></i></span>
                        </flux:button>

                        <flux:menu class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg w-48 md:w-52">
                            <flux:menu.item href="/blog/create"
                                            class="text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                                <i class="fa-solid fa-pen mr-2"></i> Create Post
                            </flux:menu.item>

                            <flux:menu.item href="{{ route('blog.profile', auth()->user()->name) }}"
                                            class="flex items-center gap-2 text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                                @if(auth()->user()->avatar)
                                    <img src="{{ auth()->user()->avatar }}"
                                         alt="{{ auth()->user()->name }}"
                                         class="w-6 h-6 rounded-full object-cover border border-gray-300 dark:border-gray-600">
                                @else
                                    <div class="w-6 h-6 rounded-full bg-gray-300 dark:bg-gray-700 flex items-center justify-center text-gray-900 dark:text-white font-semibold text-xs">
                                        {{ auth()->user()->initials() }}
                                    </div>
                                @endif
                                <span class="truncate">{{ auth()->user()->name }} Posts</span>
                            </flux:menu.item>

                            {{-- Blog Search Menu Item (opens modal) --}}
                            <flux:menu.item
                                    as="button"
                                    onclick="toggleBlogSearch()"
                                    class="text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors w-full text-left">
                                <i class="fa-solid fa-magnifying-glass mr-2"></i> Search Blogs
                            </flux:menu.item>

                            <flux:menu.item href="{{ route('writestuff') }}"
                                            class="text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                                <i class="fa-solid fa-users mr-2"></i> Following Writers
                            </flux:menu.item>
                            <flux:menu.separator class="border-gray-200 dark:border-gray-700" />
                            {{--                            <flux:menu.item href="/cv/index.html" class="text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">--}}
                            {{--                                <i class="fa-solid fa-circle-user mr-2"></i> Me--}}
                            {{--                            </flux:menu.item>--}}

                            <flux:menu.item href="{{ route('portfolio') }}" class="text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                                <i class="fa-solid fa-folder-open mr-2"></i> My Portfolio
                            </flux:menu.item>
                            <flux:menu.item href="{{ route('blog') }}" class="text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                                <i class="fa-solid fa-blog mr-2"></i> Ideas Blog
                            </flux:menu.item>

                            <flux:menu.item href="{{ route('most.voted') }}" class="text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                                <i class="fa-solid fa-list mr-2"></i> Top Rated Posts
                            </flux:menu.item>
                        </flux:menu>
                    </flux:dropdown>
                </div>
            @endauth

            {{-- Main Menu Dropdown - MOBILE OPTIMIZED --}}
            <div wire:ignore>
                <flux:dropdown align="end">
                    <flux:button variant="primary"
                                 class="bg-gray-200 hover:bg-gray-300 text-gray-900 dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-white transition-colors text-sm md:text-base"
                                 icon:trailing="chevron-down">
                        <span class="menu-text">Menu</span>
                        <span class="md:hidden"><i class="fa-solid fa-bars"></i></span>
                    </flux:button>

                    {{-- Dropdown Menu Content - unchanged but responsive --}}
                    <flux:menu class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 w-48 md:w-56">
                        {{-- Your existing menu content remains the same --}}
                        @guest
                            <flux:menu.item href="{{ route('login') }}" class="text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                                <i class="fa-solid fa-right-to-bracket mr-2"></i> {{ __('global.log_in') }}
                            </flux:menu.item>

                            @if(Route::has('register'))
                                <flux:menu.item href="{{ route('register') }}" class="text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                                    <i class="fa-solid fa-user-plus mr-2"></i> {{ __('global.register') }}
                                </flux:menu.item>
                            @endif

                            <flux:menu.separator class="border-gray-200 dark:border-gray-700" />
                            {{--                            <flux:menu.item href="/cv/index.html" class="text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">--}}
                            {{--                                <i class="fa-solid fa-circle-user mr-2"></i> Me--}}
                            {{--                            </flux:menu.item>--}}
                            <flux:menu.item href="{{ route('portfolio') }}" class="text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                                <i class="fa-solid fa-folder-open mr-2"></i> My Portfolio
                            </flux:menu.item>

                            <flux:menu.item href="{{ route('blog') }}" class="text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                                <i class="fa-solid fa-blog mr-2"></i> Ideas Blog
                            </flux:menu.item>

                            <flux:menu.separator class="border-gray-200 dark:border-gray-700" />

                            <flux:menu.item href="/about-pmway" class="text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                                <i class="fa-regular fa-cogs mr-2"></i> About PMWay
                            </flux:menu.item>

                            <flux:menu.item href="/contact" class="text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                                <i class="fa-solid fa-envelope mr-2"></i> Contact
                            </flux:menu.item>
                        @endguest

                        @auth
                            {{-- User Info Card --}}
                            <div class="p-2 text-sm font-normal border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800">
                                <div class="flex items-center gap-2 px-1 py-1.5">
                            <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                <span class="flex h-full w-full items-center justify-center rounded-lg bg-gray-300 dark:bg-gray-700 text-gray-900 dark:text-white font-semibold">
                                    {{ auth()->user()->initials() }}
                                </span>
                            </span>
                                    <div class="grid flex-1 text-left text-sm leading-tight min-w-0">
                                        <span class="truncate font-semibold text-gray-900 dark:text-white">{{ auth()->user()->name }}</span>
                                        <span class="truncate text-xs text-gray-600 dark:text-gray-400">{{ auth()->user()->email }}</span>
                                    </div>
                                </div>
                            </div>

                            {{-- Navigation Items --}}
                            <flux:menu.item href="{{ route('home') }}" class="text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                                <i class="fa-solid fa-home mr-2"></i> Home
                            </flux:menu.item>

                            <flux:menu.item href="{{ route('dashboard') }}" class="text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                                <i class="fa-solid fa-chart-line mr-2"></i> Dashboard
                            </flux:menu.item>

                            <flux:menu.separator class="border-gray-200 dark:border-gray-700" />

                            <flux:menu.item href="/about-pmway" class="text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                                <i class="fa-regular fa-cogs mr-2"></i> About PMWay
                            </flux:menu.item>

                            <flux:menu.item href="{{ route('the-pmway') }}" class="text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                                <i class="fa-solid fa-compass mr-2"></i> The PMWay
                            </flux:menu.item>




                            <flux:menu.item href="{{ route('agile-traditional') }}" class="text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                                <i class="fa-solid fa-people-arrows mr-2"></i> Waterfall vs Agile
                            </flux:menu.item>

                            {{--                            <flux:menu.item href="{{ route('notes.index') }}" class="text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">--}}
                            {{--                                <i class="fa-solid fa-note-sticky mr-2"></i> Project Logs (Bootstrap)--}}
                            {{--                            </flux:menu.item>--}}

                            <flux:navlist.item href="{{ route('logs.index') }}" :current="request()->routeIs('logs.*')">
                                <i class="fa-solid fa-note-sticky mr-2"></i>
                                Project Logs
                            </flux:navlist.item>

                            <flux:menu.item href="/documents" class="text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                                <i class="fa-solid fa-envelope mr-2"></i> Documents
                            </flux:menu.item>

                            <flux:menu.item href="/contact" class="text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                                <i class="fa-solid fa-envelope mr-2"></i> Contact
                            </flux:menu.item>

                            <flux:menu.separator class="border-gray-200 dark:border-gray-700" />

                            <flux:menu.item href="{{ route('pmwaysearch') }}" class="text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                                <i class="fa-solid fa-magnifying-glass mr-2"></i> Search PMWay
                            </flux:menu.item>

                            <flux:menu.separator class="border-gray-200 dark:border-gray-700" />

                            @can('access dashboard')
                                <flux:menu.item href="{{ route('admin.index') }}" class="text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                                    <i class="fa-solid fa-shield mr-2"></i> {{ __('global.admin_dashboard') }}
                                </flux:menu.item>
                            @endcan

                            <flux:menu.item href="/settings/profile" class="text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                                <i class="fa-solid fa-cog mr-2"></i> {{ __('settings.title') }}
                            </flux:menu.item>
                            <flux:menu.separator class="border-gray-200 dark:border-gray-700" />


                            <flux:menu.separator class="border-gray-200 dark:border-gray-700" />

                            @role('Super Admin')
                            <flux:menu.item
                                    href="{{ route('visitor.analytics') }}"
                                    class="text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                                <i class="fa-solid fa-chart-line mr-2"></i>
                                Visitor Analytics
                            </flux:menu.item>

                            <flux:menu.separator class="border-gray-200 dark:border-gray-700" />
                            @endrole

                            <flux:menu.item
                                    as="button"
                                    type="button"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    class="w-full text-left text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                                <i class="fa-solid fa-arrow-right-from-bracket mr-2"></i> {{ __('global.log_out') }}
                            </flux:menu.item>

                            <form id="logout-form" method="POST" action="{{ route('logout') }}" class="hidden">@csrf</form>
                        @endauth
                    </flux:menu>
                </flux:dropdown>
            </div>

            {{-- Theme Toggle Icon - MOBILE FIXED --}}
            <div wire:ignore class="flex-shrink-0">
                <i id="themeIcon"
                   class="fa-solid fa-moon cursor-pointer text-lg md:text-xl hover:rotate-180 hover:scale-110 transition-all duration-300"
                   style="color: #1f2937;"
                   title="Toggle theme"
                   role="button"
                   tabindex="0"
                   aria-label="Toggle theme"></i>
            </div>
        </nav>
    </div>
</flux:header>

{{-- Rest of your content remains the same --}}
<flux:main container style="padding-bottom: 50px; padding-top: 60px;">
    {{ $slot }}
</flux:main>

{{-- Footer Spacer --}}
<div style="height: 100px;"></div>

{{-- FOOTER --}}
<flux:footer style="width: 100%; margin: 0; padding: 0;">
    <x-footer />
</flux:footer>

{{-- COMPLETE SCROLL TO TOP BUTTON --}}
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

{{-- BLOG SEARCH MODAL --}}
@auth
    <div id="blogSearchModal"
         class="fixed inset-0 z-[10000] hidden relative z-50"
         aria-labelledby="modal-title"
         role="dialog"
         aria-modal="true">

        {{-- Backdrop (Blur & Darken) --}}
        <div class="fixed inset-0 bg-gray-900/75 backdrop-blur-sm transition-opacity"
             onclick="closeBlogSearch()"></div>

        {{-- Layout Container (Flexbox for perfect centering) --}}
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">

                {{-- Modal Panel --}}
                <div class="relative transform overflow-hidden rounded-xl bg-white text-left shadow-2xl transition-all sm:w-full sm:max-w-2xl dark:bg-gray-800 flex flex-col h-[80vh] max-h-[800px]">

                    {{-- Header --}}
                    <div class="flex items-center justify-between px-4 py-3 border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 shrink-0">
                        <div class="flex items-center gap-3">
                            {{-- Icon Fixed: Added items-center and a specific wrapper size --}}
                            <div class="flex items-center justify-center h-10 w-10 rounded-full bg-blue-50 dark:bg-blue-900/30">
                                <i class="fa-solid fa-blog text-blue-600 dark:text-blue-400 text-lg"></i>
                            </div>
                            <div class="text-left">
                                <h3 class="text-lg font-semibold leading-6 text-gray-900 dark:text-white" id="modal-title">
                                    Search Blogs
                                </h3>
                                <p class="text-xs text-gray-500 dark:text-gray-400">
                                    Find posts by title or content
                                </p>
                            </div>
                        </div>
                        <button onclick="closeBlogSearch()" class="rounded-md bg-white dark:bg-gray-800 text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            <span class="sr-only">Close</span>
                            <i class="fa-solid fa-xmark text-xl"></i>
                        </button>
                    </div>

                    {{-- Livewire Component Container --}}
                    {{-- Added 'p-4' for breathing room and 'overflow-y-auto' to handle scrolling here --}}
                    <div class="flex-1 overflow-y-auto p-4 bg-gray-50 dark:bg-gray-900/50" id="modalScrollContainer">
                        <livewire:blog.search />
                    </div>

                    {{-- Footer --}}
                    <div class="bg-gray-50 dark:bg-gray-800 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6 border-t border-gray-200 dark:border-gray-700 shrink-0">
                        <span class="text-xs text-gray-500 dark:text-gray-400">Press <strong>ESC</strong> to close</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Minimal Styles to target the INTERNAL Livewire Input only --}}
    <style>
        /* We only target the input to make it compact as requested.
           We let the rest of the layout handle itself naturally.
        */
        #blogSearchModal input[type="search"],
        #blogSearchModal input[type="text"] {
            padding: 10px 14px !important;
            border-radius: 8px !important;
            font-size: 1rem !important;
            margin-bottom: 0 !important; /* Remove margin, let the container padding handle spacing */
            width: 100%;
        }

        /* Custom Scrollbar for the modal body */
        #modalScrollContainer::-webkit-scrollbar {
            width: 8px;
        }
        #modalScrollContainer::-webkit-scrollbar-track {
            background: transparent;
        }
        #modalScrollContainer::-webkit-scrollbar-thumb {
            background-color: #cbd5e1;
            border-radius: 4px;
        }
        .dark #modalScrollContainer::-webkit-scrollbar-thumb {
            background-color: #4b5563;
        }
    </style>

    <script>
        function toggleBlogSearch() {
            const modal = document.getElementById('blogSearchModal');
            const isHidden = modal.classList.contains('hidden');

            if (isHidden) {
                modal.classList.remove('hidden');
                // Prevent background scrolling
                document.body.style.overflow = 'hidden';

                // Focus input with slight delay to allow rendering
                setTimeout(() => {
                    const searchInput = modal.querySelector('input[type="search"], input[type="text"]');
                    if (searchInput) searchInput.focus();
                }, 100);
            } else {
                closeBlogSearch();
            }
        }

        function closeBlogSearch() {
            const modal = document.getElementById('blogSearchModal');
            modal.classList.add('hidden');
            document.body.style.overflow = '';
        }

        // Keydown listeners
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && !document.getElementById('blogSearchModal').classList.contains('hidden')) {
                closeBlogSearch();
            }
        });
    </script>
@endauth
{{-- SCRIPTS --}}
@stack('scripts')
@livewireScripts
@fluxScripts

{{-- Mobile chat button text replacement ONLY --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Mobile chat button text replacement
        function updateChatButtonForMobile() {
            if (window.innerWidth <= 768) {
                // Find the chat button link
                const chatLink = document.querySelector('a[href*="chat.index"]');
                if (chatLink) {
                    // Find all text nodes and replace "LiveChat" with "Chat"
                    const walker = document.createTreeWalker(
                        chatLink,
                        NodeFilter.SHOW_TEXT,
                        null,
                        false
                    );

                    let node;
                    while (node = walker.nextNode()) {
                        if (node.textContent.includes('LiveChat')) {
                            node.textContent = node.textContent.replace('LiveChat', 'Chat');
                        }
                        if (node.textContent.includes('Live Chat')) {
                            node.textContent = node.textContent.replace('Live Chat', 'Chat');
                        }
                    }

                    // Hide any icons in the chat button
                    const icons = chatLink.querySelectorAll('i[class*="fa-comment"], i[class*="fa-message"], svg');
                    icons.forEach(icon => {
                        // Don't hide the online count number
                        if (!icon.closest('.online-count') && !icon.textContent.match(/\d+/)) {
                            icon.style.display = 'none';
                        }
                    });
                }
            }
        }

        // Run on load
        updateChatButtonForMobile();

        // Run on resize
        let resizeTimer;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function() {
                updateChatButtonForMobile();
            }, 250);
        });

        // Run after Livewire updates
        document.addEventListener('livewire:navigated', updateChatButtonForMobile);
    });
</script>

{{-- Disable Flux auto wire:navigate --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('a[href*="home"]').forEach(link => {
            link.removeAttribute('wire:navigate');
        });
    });
</script>

{{-- Alpine reinitialization on Livewire navigation --}}
<script>
    document.addEventListener('livewire:navigated', () => {
        document.querySelectorAll('[x-data]').forEach(el => {
            if (!el.__x) {
                Alpine.initTree(el);
            }
        });
    });
</script>

</body>
</html>