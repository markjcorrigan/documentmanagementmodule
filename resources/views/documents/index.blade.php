@extends('documents.layouts.main')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
                <i class="fas fa-file-alt"></i> Document Library
            </h1>
            <p class="text-gray-600 dark:text-gray-400 mt-1">
                Manage and organize your documents
            </p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('documents.trashed') }}" 
               class="px-4 py-2 bg-gray-600 dark:bg-gray-700 text-white rounded-lg hover:bg-gray-700 dark:hover:bg-gray-600 transition">
                <i class="fas fa-trash"></i> Trash
            </a>

            <a href="{{ route('documents.create') }}" 
               class="px-4 py-2 bg-blue-600 dark:bg-blue-500 text-white rounded-lg hover:bg-blue-700 dark:hover:bg-blue-600 transition">
                <i class="fas fa-plus"></i> Upload New Document
            </a>

            <div style="width: 2rem;"></div>

            {{-- Dark/Light Mode Toggle --}}
            <button
                onclick="toggleTheme()"
                class="px-3 py-2 bg-gray-100 dark:bg-gray-800 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-700 transition-all duration-300 border border-gray-300 dark:border-gray-600"
                aria-label="Toggle theme"
                style="min-width: 44px; min-height: 44px; display: flex; align-items: center; justify-content: center;">
                
                {{-- BLACK MOON for light mode --}}
                <svg id="theme-toggle-moon-icon" class="w-5 h-5 text-gray-900 transition-transform duration-500" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                </svg>
                
                {{-- YELLOW SUN for dark mode --}}
                <svg id="theme-toggle-sun-icon" class="w-5 h-5 text-yellow-500 transition-transform duration-500" fill="currentColor" viewBox="0 0 20 20" style="display: none;">
                    <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
    </div>
    
    <!-- Success Message -->
    @if(session('success'))
        <div class="mb-6 bg-green-100 dark:bg-green-900/30 border border-green-400 dark:border-green-800 text-green-700 dark:text-green-200 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif
    
    <!-- Document List Component -->
    @livewire('documents.document-list')
</div>
@endsection

@push('scripts')
    <script>
        // Initialize theme immediately
        (function() {
            const savedTheme = localStorage.getItem('flux.appearance') ||
                              localStorage.getItem('flux:appearance') ||
                              localStorage.getItem('theme');
            
            const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            let theme = savedTheme || (systemPrefersDark ? 'dark' : 'light');
            
            if (theme === 'dark') {
                document.documentElement.classList.add('dark');
                document.body.classList.add('dark');
            }
        })();

        function toggleTheme() {
            const html = document.documentElement;
            const body = document.body;
            const moonIcon = document.getElementById('theme-toggle-moon-icon');
            const sunIcon = document.getElementById('theme-toggle-sun-icon');
            
            const isDark = html.classList.contains('dark');
            
            if (isDark) {
                // Switch to LIGHT mode - show BLACK MOON
                html.classList.remove('dark');
                body.classList.remove('dark');
                localStorage.setItem('flux.appearance', 'light');
                localStorage.setItem('theme', 'light');
                
                sunIcon.style.display = 'none';
                moonIcon.style.display = 'block';
            } else {
                // Switch to DARK mode - show YELLOW SUN
                html.classList.add('dark');
                body.classList.add('dark');
                localStorage.setItem('flux.appearance', 'dark');
                localStorage.setItem('theme', 'dark');
                
                moonIcon.style.display = 'none';
                sunIcon.style.display = 'block';
            }
        }

        // Set correct icon on page load
        window.addEventListener('DOMContentLoaded', function() {
            const html = document.documentElement;
            const moonIcon = document.getElementById('theme-toggle-moon-icon');
            const sunIcon = document.getElementById('theme-toggle-sun-icon');
            
            if (html.classList.contains('dark')) {
                // Dark mode - show YELLOW SUN
                moonIcon.style.display = 'none';
                sunIcon.style.display = 'block';
            } else {
                // Light mode - show BLACK MOON
                moonIcon.style.display = 'block';
                sunIcon.style.display = 'none';
            }
        });
    </script>
@endpush
