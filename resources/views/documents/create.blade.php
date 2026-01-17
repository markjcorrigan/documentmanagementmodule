@extends('documents.layouts.main')

@section('content')
    {{-- Theme initialization script - PREVENTS FLASH OF UNSTYLED CONTENT --}}
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
                }
            } catch (error) {
                console.log('Theme init failed');
            }
        })();
    </script>

<div class="container mx-auto px-4">
    <div class="max-w-2xl mx-auto">
        {{-- Add theme toggle in header --}}
        <div class="flex justify-end mb-4">
            <button
                onclick="toggleTheme()"
                class="px-3 py-2 bg-gray-100 dark:bg-gray-800 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-700 transition-all duration-300 border border-gray-300 dark:border-gray-600"
                aria-label="Toggle theme">
                {{-- Show BLACK MOON in light mode (click to go dark) --}}
                <svg id="theme-toggle-moon-icon" class="w-5 h-5 text-gray-900 transition-transform duration-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                </svg>
                {{-- Show YELLOW SUN in dark mode (click to go light) --}}
                <svg id="theme-toggle-sun-icon" class="w-5 h-5 text-yellow-500 hidden transition-transform duration-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">
                <i class="fas fa-upload mr-2"></i>Upload New Document
            </h2>
            <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- File Upload -->
                <div class="mb-6">
                    <label for="document" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Select File *
                    </label>
                    <input type="file" 
                           name="document" 
                           id="document" 
                           required
                           class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400 dark:bg-gray-700 dark:text-white">
                    @error('document')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Short Name -->
                <div class="mb-6">
                    <label for="shortname" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Short Name (optional)
                    </label>
                    <input type="text" 
                           name="shortname" 
                           id="shortname"
                           class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400 dark:bg-gray-700 dark:text-white placeholder-gray-500 dark:placeholder-gray-400"
                           placeholder="Leave blank to auto-generate">
                </div>
                <!-- Description -->
                <div class="mb-6">
                    <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Description (optional)
                    </label>
                    <textarea name="description" 
                              id="description" 
                              rows="4"
                              class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400 dark:bg-gray-700 dark:text-white placeholder-gray-500 dark:placeholder-gray-400"
                              placeholder="Enter document description"></textarea>
                </div>
                <!-- Buttons -->
                <div class="flex justify-end space-x-3">
                    <a href="{{ route('documents.index') }}" 
                       class="px-6 py-2 bg-gray-500 dark:bg-gray-600 text-white rounded-lg hover:bg-gray-600 dark:hover:bg-gray-700 transition">
                        Cancel
                    </a>
                    <button type="submit" 
                            class="px-6 py-2 bg-blue-600 dark:bg-blue-500 text-white rounded-lg hover:bg-blue-700 dark:hover:bg-blue-600 transition">
                        <i class="fas fa-upload mr-2"></i>Upload
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    {{-- Theme Toggle Script --}}
    <script>
        function toggleTheme() {
            const html = document.documentElement;
            const body = document.body;
            const moonIcon = document.getElementById('theme-toggle-moon-icon');
            const sunIcon = document.getElementById('theme-toggle-sun-icon');
            
            const isDark = html.classList.contains('dark');
            
            if (isDark) {
                // Switch to LIGHT mode
                html.classList.remove('dark');
                body.classList.remove('dark');
                localStorage.setItem('flux.appearance', 'light');
                localStorage.setItem('theme', 'light');
                
                // Swivel animation
                moonIcon.style.transform = 'rotate(360deg)';
                sunIcon.style.transform = 'rotate(360deg)';
                
                setTimeout(() => {
                    sunIcon.classList.add('hidden');
                    moonIcon.classList.remove('hidden');
                    moonIcon.style.transform = 'rotate(0deg)';
                    sunIcon.style.transform = 'rotate(0deg)';
                }, 300);
            } else {
                // Switch to DARK mode
                html.classList.add('dark');
                body.classList.add('dark');
                localStorage.setItem('flux.appearance', 'dark');
                localStorage.setItem('theme', 'dark');
                
                // Swivel animation
                moonIcon.style.transform = 'rotate(360deg)';
                sunIcon.style.transform = 'rotate(360deg)';
                
                setTimeout(() => {
                    moonIcon.classList.add('hidden');
                    sunIcon.classList.remove('hidden');
                    moonIcon.style.transform = 'rotate(0deg)';
                    sunIcon.style.transform = 'rotate(0deg)';
                }, 300);
            }
        }

        // Initialize icon state on page load
        document.addEventListener('DOMContentLoaded', function() {
            const html = document.documentElement;
            const moonIcon = document.getElementById('theme-toggle-moon-icon');
            const sunIcon = document.getElementById('theme-toggle-sun-icon');
            
            if (html.classList.contains('dark')) {
                moonIcon.classList.add('hidden');
                sunIcon.classList.remove('hidden');
            } else {
                moonIcon.classList.remove('hidden');
                sunIcon.classList.add('hidden');
            }
        });
    </script>
@endpush
