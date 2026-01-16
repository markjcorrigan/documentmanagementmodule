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

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="mb-8">
            <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-2">
                🎸 Guitar Practice Media
            </h1>
            <p class="text-lg text-gray-600 dark:text-gray-400">
                Manage your sheet music, audio, and video files
            </p>
        </div>

        @if(session('success'))
            <div class="mb-6 p-4 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 text-green-700 dark:text-green-200 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="mb-6 p-4 bg-red-50 dark:bg-red-900/20 border border-red-400 dark:border-red-800 text-red-700 dark:text-red-200 rounded-lg">
                {{ session('error') }}
            </div>
        @endif

        {{-- UPLOAD SECTION --}}
        <div class="mb-8 bg-white dark:bg-gray-800 rounded-lg shadow border border-gray-200 dark:border-gray-700 p-6">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Upload File</h2>
            <form action="{{ route('guitar.upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex gap-4">
                    <input type="file" name="file" required accept=".mp3,.mp4,.pdf,.jpg,.jpeg,.png"
                           class="flex-grow p-3 border border-gray-300 dark:border-gray-600 rounded-lg
                                  bg-white dark:bg-gray-700 text-gray-900 dark:text-white file:mr-4 file:py-2 file:px-4
                                  file:rounded-lg file:border-0 file:text-sm file:font-semibold
                                  file:bg-blue-50 file:text-blue-700 dark:file:bg-blue-900/20 dark:file:text-blue-400
                                  hover:file:bg-blue-100 dark:hover:file:bg-blue-900/40">
                    <button type="submit" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white font-semibold rounded-lg transition-colors">
                        Upload
                    </button>
                </div>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">
                    MP3, MP4, PDF, JPG, PNG • Max 100MB
                </p>
            </form>
        </div>

        {{-- SEARCH SECTION --}}
        <div class="mb-8">
            <form action="{{ route('guitar.index') }}" method="GET" class="flex gap-2">
                <input type="text" name="search" value="{{ request('search') }}" 
                       placeholder="Search by filename..."
                       class="flex-grow px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg 
                              bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <button type="submit" class="px-6 py-3 bg-gray-600 hover:bg-gray-700 dark:bg-gray-700 dark:hover:bg-gray-600 text-white font-semibold rounded-lg transition-colors">
                    Search
                </button>
                @if(request('search'))
                    <a href="{{ route('guitar.index') }}" class="px-6 py-3 bg-gray-200 hover:bg-gray-300 dark:bg-gray-800 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-300 font-semibold rounded-lg transition-colors">
                        Clear
                    </a>
                @endif
            </form>
        </div>

        {{-- FILES LIST --}}
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow border border-gray-200 dark:border-gray-700 overflow-hidden">
            @if($files->count() > 0)
                <div class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach($files as $file)
                        <div class="p-6 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                            <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6">
                                {{-- FILE INFO --}}
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-start space-x-4">
                                        {{-- FILE ICON --}}
                                        <div class="flex-shrink-0">
                                            @if($file->extension === 'mp3')
                                                <div class="w-12 h-12 bg-green-100 dark:bg-green-900/30 rounded-lg flex items-center justify-center">
                                                    <span class="text-2xl">🎵</span>
                                                </div>
                                            @elseif($file->extension === 'mp4')
                                                <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center">
                                                    <span class="text-2xl">🎬</span>
                                                </div>
                                            @elseif($file->extension === 'pdf')
                                                <div class="w-12 h-12 bg-red-100 dark:bg-red-900/30 rounded-lg flex items-center justify-center">
                                                    <span class="text-2xl">📄</span>
                                                </div>
                                            @else
                                                <div class="w-12 h-12 bg-yellow-100 dark:bg-yellow-900/30 rounded-lg flex items-center justify-center">
                                                    <span class="text-2xl">🖼️</span>
                                                </div>
                                            @endif
                                        </div>
                                        
                                        {{-- FILE DETAILS --}}
                                        <div class="flex-1 min-w-0">
                                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white break-words">
                                                {{ $file->name }}
                                            </h3>
                                            {{-- SHOW PARENT FOLDER --}}
                                            @if($file->parent_path)
                                                <div class="mt-1 text-sm font-semibold text-orange-600 dark:text-orange-400">
                                                    📁 {{ $file->parent_path }}
                                                </div>
                                            @else
                                                <div class="mt-1 text-sm text-gray-500 dark:text-gray-400 italic">
                                                    📁 Root folder
                                                </div>
                                            @endif
                                            <div class="mt-2 flex flex-wrap items-center gap-3 text-sm text-gray-600 dark:text-gray-400">
                                                <span class="font-mono bg-gray-100 dark:bg-gray-700 px-2 py-1 rounded text-xs uppercase font-semibold">
                                                    .{{ $file->extension }}
                                                </span>
                                                <span>{{ number_format($file->size / 1024 / 1024, 2) }} MB</span>
                                                <span>{{ $file->file_modified_at->format('M d, Y') }}</span>
                                            </div>
                                            <div class="mt-2 text-xs font-mono text-gray-400 dark:text-gray-500 truncate">
                                                📁 {{ $file->path }}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- ACTION BUTTONS --}}
                                <div class="flex flex-wrap lg:flex-col gap-2 lg:min-w-[140px]">
                                    <a href="{{ route('guitar.view', $file->id) }}"
                                       class="px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white rounded-lg text-sm font-medium text-center transition-colors whitespace-nowrap">
                                        @if($file->extension === 'mp3') ▶️ Play
                                        @elseif($file->extension === 'mp4') ▶️ Play
                                        @elseif($file->extension === 'pdf') 👁️ View
                                        @else 👁️ View
                                        @endif
                                    </a>
                                    
                                    <a href="{{ route('guitar.download', $file->id) }}"
                                       class="px-4 py-2 bg-gray-600 hover:bg-gray-700 dark:bg-gray-700 dark:hover:bg-gray-600 text-white rounded-lg text-sm font-medium text-center transition-colors whitespace-nowrap">
                                        ⬇️ Download
                                    </a>

                                    <a href="{{ route('guitar.edit', $file->id) }}"
                                       class="px-4 py-2 bg-green-600 hover:bg-green-700 dark:bg-green-500 dark:hover:bg-green-600 text-white rounded-lg text-sm font-medium text-center transition-colors whitespace-nowrap">
                                        ✏️ Rename
                                    </a>
                                    
                                    <form action="{{ route('guitar.destroy', $file->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Delete this file from disk?')"
                                                class="w-full px-4 py-2 bg-red-600 hover:bg-red-700 dark:bg-red-500 dark:hover:bg-red-600 text-white rounded-lg text-sm font-medium transition-colors whitespace-nowrap">
                                            🗑️ Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                {{-- PAGINATION --}}
                <div class="px-6 py-4 bg-gray-50 dark:bg-gray-900 border-t border-gray-200 dark:border-gray-700">
                    {{ $files->links() }}
                </div>
            @else
                <div class="p-12 text-center">
                    <div class="text-6xl mb-4">🎸</div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">No files found</h3>
                    <p class="text-gray-600 dark:text-gray-400">
                        @if(request('search'))
                            No files match your search. Try a different term or <a href="{{ route('guitar.index') }}" class="text-blue-600 dark:text-blue-400 hover:underline">view all files</a>.
                        @else
                            Upload MP3, MP4, or PDF files to get started with your practice library!
                        @endif
                    </p>
                </div>
            @endif
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
