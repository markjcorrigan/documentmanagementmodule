@extends('protectedguitar.layout')

@section('content')
    {{-- NAVIGATION --}}
    <div class="sticky top-0 z-50 bg-white dark:bg-zinc-800 border-b border-gray-200 dark:border-gray-700 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-4">
                    <a href="{{ url('/') }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors font-semibold">
                        Home
                    </a>
                    <a href="{{ url('/admin') }}" class="px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg transition-colors font-semibold">
                        Admin
                    </a>
                    <a href="{{ route('guitar.folders.index') }}" class="px-4 py-2 bg-orange-600 hover:bg-orange-700 text-white rounded-lg transition-colors font-semibold">
                        ← Back to Folders
                    </a>
                </div>

                <div class="flex items-center">
                    <button id="theme-toggle" type="button" class="p-2.5 text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors">
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
        {{-- FOLDER HEADER --}}
        <div class="mb-8 bg-gradient-to-r from-orange-50 to-yellow-50 dark:from-orange-900/20 dark:to-yellow-900/20 rounded-lg p-6 border border-orange-200 dark:border-orange-800">
            <div class="flex items-center justify-between">
                <div>
                    <div class="flex items-center gap-3 mb-2">
                        <span class="text-4xl">📁</span>
                        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
                            {{ $folder->name }}
                        </h1>
                    </div>
                    <p class="text-gray-600 dark:text-gray-400 font-mono text-sm">
                        📂 {{ $folder->path }}
                    </p>
                </div>
                <div class="flex gap-2">
                    {{-- SCAN BUTTON --}}
                    <form action="{{ route('guitar.folders.scan', $folder->id) }}" method="POST" class="inline">
                        @csrf
                        <button type="submit"
                                class="px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-lg font-semibold transition-colors">
                            🔄 Scan for New Files
                        </button>
                    </form>

                    <a href="{{ route('guitar.folders.edit', $folder->id) }}"
                       class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg font-semibold transition-colors">
                        ✏️ Rename Folder
                    </a>
                </div>
            </div>
        </div>

        {{-- SCAN RESULT MESSAGES --}}
        @if(session('success') && str_contains(session('success'), 'Scanned'))
            <div class="mb-6 p-4 bg-purple-50 dark:bg-purple-900/20 border border-purple-200 dark:border-purple-800 text-purple-700 dark:text-purple-200 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        @if(session('success') && !str_contains(session('success'), 'Scanned'))
            <div class="mb-6 p-4 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 text-green-700 dark:text-green-200 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        @if(session('info'))
            <div class="mb-6 p-4 bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 text-blue-700 dark:text-blue-200 rounded-lg">
                {{ session('info') }}
            </div>
        @endif

        @if(session('error'))
            <div class="mb-6 p-4 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 text-red-700 dark:text-red-200 rounded-lg">
                {{ session('error') }}
            </div>
        @endif

        {{-- SUBFOLDERS IN THIS FOLDER --}}
        @if($subfolders->count() > 0)
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow border border-gray-200 dark:border-gray-700 overflow-hidden mb-6">
                <div class="px-6 py-4 bg-orange-50 dark:bg-orange-900/30 border-b border-orange-200 dark:border-orange-800">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white">
                        📁 Subfolders ({{ $subfolders->count() }})
                    </h2>
                </div>

                <div class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach($subfolders as $subfolder)
                        <div class="p-4 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-orange-100 dark:bg-orange-900/30 rounded flex items-center justify-center">
                                        <span class="text-xl">📁</span>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-gray-900 dark:text-white">
                                            {{ $subfolder->name }}
                                        </h3>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">
                                            {{ $subfolder->file_count }} files
                                        </p>
                                    </div>
                                </div>
                                <a href="{{ route('guitar.folders.show', $subfolder->id) }}"
                                   class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-sm font-medium transition-colors">
                                    Open →
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        {{-- FILES IN FOLDER --}}
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow border border-gray-200 dark:border-gray-700 overflow-hidden">
            <div class="px-6 py-4 bg-gray-50 dark:bg-gray-900 border-b border-gray-200 dark:border-gray-700">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Files in This Folder ({{ $files->count() }})
                </h2>
            </div>

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
                                            <div class="mt-2 flex flex-wrap items-center gap-3 text-sm text-gray-600 dark:text-gray-400">
                                                <span class="font-mono bg-gray-100 dark:bg-gray-700 px-2 py-1 rounded text-xs uppercase font-semibold">
                                                    .{{ $file->extension }}
                                                </span>
                                                <span>{{ number_format($file->size / 1024 / 1024, 2) }} MB</span>
                                                <span>{{ $file->file_modified_at->format('M d, Y') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- ACTION BUTTONS (reuse existing routes from file controller) --}}
                                <div class="flex flex-wrap lg:flex-col gap-2 lg:min-w-[140px]">
                                    <a href="{{ route('guitar.view', $file->id) }}"
                                       class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-sm font-medium text-center transition-colors whitespace-nowrap">
                                        @if($file->extension === 'mp3') ▶️ Play
                                        @elseif($file->extension === 'mp4') ▶️ Play
                                        @elseif($file->extension === 'pdf') 👁️ View
                                        @else 👁️ View
                                        @endif
                                    </a>

                                    <a href="{{ route('guitar.download', $file->id) }}"
                                       class="px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg text-sm font-medium text-center transition-colors whitespace-nowrap">
                                        ⬇️ Download
                                    </a>

                                    <a href="{{ route('guitar.edit', $file->id) }}"
                                       class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg text-sm font-medium text-center transition-colors whitespace-nowrap">
                                        ✏️ Rename
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="p-12 text-center">
                    <div class="text-6xl mb-4">📭</div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">This folder is empty</h3>
                    <p class="text-gray-600 dark:text-gray-400">
                        @if($subfolders->count() === 0)
                            No subfolders or files found in this folder.
                            <br>
                            <small class="text-gray-500">Try clicking "Scan for New Files" above to find any files.</small>
                        @else
                            No files directly in this folder, but there are {{ $subfolders->count() }} subfolders above.
                        @endif
                    </p>
                </div>
            @endif
        </div>
    </div>

    {{-- DARK MODE SCRIPT --}}
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