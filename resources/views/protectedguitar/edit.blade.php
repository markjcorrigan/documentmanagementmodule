@extends('protectedguitar.layout')

@section('content')
    {{-- NAVIGATION AND DARK MODE SWITCHER --}}
    <div class="sticky top-0 z-50 bg-white dark:bg-zinc-800 border-b border-gray-200 dark:border-gray-700 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                {{-- Left Navigation Buttons --}}
                <div class="flex items-center space-x-4">
                    <a href="{{ url('/') }}" 
                       class="px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white rounded-lg transition-colors font-semibold">
                        Home
                    </a>
                    <a href="{{ url('/admin') }}" 
                       class="px-4 py-2 bg-gray-600 hover:bg-gray-700 dark:bg-gray-700 dark:hover:bg-gray-600 text-white rounded-lg transition-colors font-semibold">
                        Admin
                    </a>
                    <a href="{{ route('guitar.folders.index') }}" 
                       class="px-4 py-2 bg-orange-600 hover:bg-orange-700 dark:bg-orange-500 dark:hover:bg-orange-600 text-white rounded-lg transition-colors font-semibold">
                        📁 Folders
                    </a>
                </div>

                {{-- Right Dark/Light Mode Switcher --}}
                <div class="flex items-center">
                    <button id="theme-toggle" type="button" 
                            class="p-2.5 text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors">
                        <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                        </svg>
                        <svg id="theme-toggle-light-icon" class="hidden w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="mb-8">
            <div class="flex items-center gap-4 mb-4">
                <a href="{{ route('guitar.index') }}" 
                   class="inline-flex items-center text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                    Back to Files
                </a>
            </div>
            
            <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-2">
                ✏️ Rename File
            </h1>
            <p class="text-lg text-gray-600 dark:text-gray-400">
                Change the filename on disk (this updates both disk and database)
            </p>
        </div>

        @if(session('error'))
            <div class="mb-6 p-4 bg-red-50 dark:bg-red-900/20 border border-red-400 dark:border-red-800 text-red-700 dark:text-red-200 rounded-lg">
                {{ session('error') }}
            </div>
        @endif

        {{-- FILE INFO CARD --}}
        <div class="mb-8 bg-white dark:bg-gray-800 rounded-lg shadow border border-gray-200 dark:border-gray-700 p-6">
            <div class="flex items-start space-x-4">
                {{-- FILE ICON --}}
                <div class="flex-shrink-0">
                    @if($file->extension === 'mp3')
                        <div class="w-16 h-16 bg-green-100 dark:bg-green-900/30 rounded-lg flex items-center justify-center">
                            <span class="text-3xl">🎵</span>
                        </div>
                    @elseif($file->extension === 'mp4')
                        <div class="w-16 h-16 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center">
                            <span class="text-3xl">🎬</span>
                        </div>
                    @elseif($file->extension === 'pdf')
                        <div class="w-16 h-16 bg-red-100 dark:bg-red-900/30 rounded-lg flex items-center justify-center">
                            <span class="text-3xl">📄</span>
                        </div>
                    @else
                        <div class="w-16 h-16 bg-yellow-100 dark:bg-yellow-900/30 rounded-lg flex items-center justify-center">
                            <span class="text-3xl">🖼️</span>
                        </div>
                    @endif
                </div>
                
                {{-- FILE DETAILS --}}
                <div class="flex-1 min-w-0">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">
                        Current Filename
                    </h3>
                    <p class="text-lg text-gray-700 dark:text-gray-300 font-mono bg-gray-50 dark:bg-gray-900 px-4 py-3 rounded border border-gray-200 dark:border-gray-700 break-all">
                        {{ $file->name }}
                    </p>
                    {{-- SHOW PARENT FOLDER --}}
                    @if($file->parent_path)
                        <div class="mt-3 p-3 bg-orange-50 dark:bg-orange-900/20 border border-orange-200 dark:border-orange-800 rounded">
                            <div class="text-sm font-semibold text-orange-900 dark:text-orange-200">
                                📁 Location: {{ $file->parent_path }}
                            </div>
                        </div>
                    @else
                        <div class="mt-3 p-3 bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded">
                            <div class="text-sm text-gray-600 dark:text-gray-400">
                                📁 Location: Root folder
                            </div>
                        </div>
                    @endif
                    <div class="mt-4 space-y-2 text-sm text-gray-600 dark:text-gray-400">
                        <div class="flex items-center gap-2">
                            <span class="font-mono bg-gray-100 dark:bg-gray-700 px-2 py-1 rounded text-xs uppercase font-semibold">
                                .{{ $file->extension }}
                            </span>
                            <span>{{ number_format($file->size / 1024 / 1024, 2) }} MB</span>
                            <span>{{ $file->file_modified_at->format('M d, Y') }}</span>
                        </div>
                        <div class="font-mono text-xs bg-gray-50 dark:bg-gray-900 px-3 py-2 rounded border border-gray-200 dark:border-gray-700 break-all">
                            📁 {{ $file->path }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- RENAME FORM (SEPARATE - NO NESTING) --}}
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow border border-gray-200 dark:border-gray-700 p-6 mb-6">
            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">
                New Filename
            </h2>

            <form action="{{ route('guitar.update', $file->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Filename Input --}}
                <div class="mb-6">
                    <label for="name" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                        Enter New Filename <span class="text-red-500">*</span>
                    </label>
                    <input type="text" 
                           id="name" 
                           name="name" 
                           value="{{ old('name', pathinfo($file->name, PATHINFO_FILENAME)) }}" 
                           required
                           class="w-full px-4 py-3 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent font-mono text-lg @error('name') border-red-500 @enderror">
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">
                        Extension <span class="font-semibold">.{{ $file->extension }}</span> will be added automatically
                    </p>
                    @error('name')
                        <p class="text-sm text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Important Notice --}}
                <div class="mb-6 p-4 bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-800 rounded-lg">
                    <div class="flex items-start gap-3">
                        <span class="text-2xl">⚠️</span>
                        <div>
                            <h3 class="font-semibold text-yellow-900 dark:text-yellow-200 mb-1">
                                This renames the physical file on disk
                            </h3>
                            <p class="text-sm text-yellow-800 dark:text-yellow-300">
                                The file in <code class="bg-yellow-100 dark:bg-yellow-900/40 px-1 py-0.5 rounded">storage/protectedguitar/</code> will be renamed. 
                                The database will be updated immediately so you can see the new name right away.
                            </p>
                            <p class="text-sm text-yellow-800 dark:text-yellow-300 mt-2">
                                ✅ <strong>Duplicate protection:</strong> You'll be warned if a file with this name already exists in the same folder.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Rename Button (Green) --}}
                <div class="flex flex-col sm:flex-row gap-3">
                    <button type="submit" 
                            class="px-8 py-4 bg-green-600 hover:bg-green-700 dark:bg-green-500 dark:hover:bg-green-600 text-white font-bold text-lg rounded-lg transition-colors shadow-lg hover:shadow-xl">
                        ✏️ RENAME FILE
                    </button>
                    
                    <a href="{{ route('guitar.index') }}" 
                       class="px-8 py-4 bg-gray-200 hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-900 dark:text-white font-bold text-lg rounded-lg text-center transition-colors">
                        Cancel
                    </a>
                </div>
            </form>
        </div>

        {{-- DELETE FORM (SEPARATE - NOT NESTED) --}}
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow border border-red-200 dark:border-red-800 p-6">
            <h2 class="text-2xl font-semibold text-red-900 dark:text-red-200 mb-4">
                Danger Zone
            </h2>
            <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
                This will permanently delete the file from disk AND database. This action cannot be undone.
            </p>
            
            <form action="{{ route('guitar.destroy', $file->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" 
                        onclick="return confirm('⚠️ DELETE FILE PERMANENTLY?\n\nFile: {{ $file->name }}\n\nThis will remove it from disk AND database.\n\nThis action CANNOT be undone!')"
                        class="px-8 py-4 bg-red-600 hover:bg-red-700 dark:bg-red-500 dark:hover:bg-red-600 text-white font-bold text-lg rounded-lg transition-colors shadow-lg hover:shadow-xl">
                    🗑️ DELETE FILE PERMANENTLY
                </button>
            </form>
        </div>

        {{-- Quick Actions --}}
        <div class="mt-6 flex flex-wrap gap-3">
            <a href="{{ route('guitar.view', $file->id) }}" 
               class="px-4 py-2 bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-900 dark:text-white rounded-lg text-sm font-medium transition-colors">
                @if($file->extension === 'mp3') ▶️ Play File
                @elseif($file->extension === 'mp4') ▶️ Play Video
                @elseif($file->extension === 'pdf') 👁️ View PDF
                @else 👁️ View Image
                @endif
            </a>
            
            <a href="{{ route('guitar.download', $file->id) }}"
               class="px-4 py-2 bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-900 dark:text-white rounded-lg text-sm font-medium transition-colors">
                ⬇️ Download
            </a>
        </div>
    </div>

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
            class="fixed bottom-6 right-6 w-12 h-12 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white rounded-full shadow-lg hover:shadow-xl transition-all duration-300 z-[9999] flex items-center justify-center group"
            aria-label="Scroll to top"
            style="z-index: 9999 !important;"
            x-transition
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

    {{-- DARK MODE TOGGLE SCRIPT --}}
    <script>
        // Dark mode toggle functionality - syncs with pmway site-wide theme
        const themeToggleBtn = document.getElementById('theme-toggle');
        const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

        // Check for saved theme preference
        const isDark = localStorage.getItem('theme') === 'dark' || 
                      localStorage.getItem('flux:appearance') === 'dark' ||
                      (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches);

        if (isDark) {
            themeToggleLightIcon.classList.remove('hidden');
            document.documentElement.classList.add('dark');
        } else {
            themeToggleDarkIcon.classList.remove('hidden');
        }

        themeToggleBtn.addEventListener('click', function() {
            // Toggle icons
            themeToggleDarkIcon.classList.toggle('hidden');
            themeToggleLightIcon.classList.toggle('hidden');

            // If currently dark, switch to light
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                // Write to both storage keys for site-wide sync
                localStorage.setItem('theme', 'light');
                localStorage.setItem('flux:appearance', 'light');
            } else {
                document.documentElement.classList.add('dark');
                // Write to both storage keys for site-wide sync
                localStorage.setItem('theme', 'dark');
                localStorage.setItem('flux:appearance', 'dark');
            }
        });
    </script>
@endsection
