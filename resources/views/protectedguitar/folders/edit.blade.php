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

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="mb-8">
            <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-2">
                ✏️ Rename Folder
            </h1>
            <p class="text-lg text-gray-600 dark:text-gray-400">
                Rename folder on disk (updates folder AND all files inside)
            </p>
        </div>

        @if(session('error'))
            <div class="mb-6 p-4 bg-red-50 dark:bg-red-900/20 border border-red-400 dark:border-red-800 text-red-700 dark:text-red-200 rounded-lg">
                {{ session('error') }}
            </div>
        @endif

        {{-- FOLDER INFO CARD --}}
        <div class="mb-8 bg-white dark:bg-gray-800 rounded-lg shadow border border-gray-200 dark:border-gray-700 p-6">
            <div class="flex items-start space-x-4">
                <div class="flex-shrink-0">
                    <div class="w-16 h-16 bg-orange-100 dark:bg-orange-900/30 rounded-lg flex items-center justify-center">
                        <span class="text-3xl">📁</span>
                    </div>
                </div>
                
                <div class="flex-1 min-w-0">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">
                        Current Folder Name
                    </h3>
                    <p class="text-lg text-gray-700 dark:text-gray-300 font-mono bg-gray-50 dark:bg-gray-900 px-4 py-3 rounded border border-gray-200 dark:border-gray-700 break-all">
                        {{ $folder->name }}
                    </p>
                    <div class="mt-4 space-y-2 text-sm text-gray-600 dark:text-gray-400">
                        <div class="flex items-center gap-2">
                            <span class="font-semibold text-orange-600 dark:text-orange-400">
                                📄 Contains {{ $folder->file_count }} files
                            </span>
                        </div>
                        <div class="font-mono text-xs bg-gray-50 dark:bg-gray-900 px-3 py-2 rounded border border-gray-200 dark:border-gray-700 break-all">
                            📁 {{ $folder->path }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- RENAME FORM --}}
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow border border-gray-200 dark:border-gray-700 p-6 mb-6">
            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">
                New Folder Name
            </h2>

            <form action="{{ route('guitar.folders.update', $folder->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-6">
                    <label for="name" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                        Enter New Folder Name <span class="text-red-500">*</span>
                    </label>
                    <input type="text" 
                           id="name" 
                           name="name" 
                           value="{{ old('name', $folder->name) }}" 
                           required
                           class="w-full px-4 py-3 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent font-mono text-lg @error('name') border-red-500 @enderror">
                    @error('name')
                        <p class="text-sm text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Important Notice --}}
                <div class="mb-6 p-4 bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg">
                    <div class="flex items-start gap-3">
                        <span class="text-2xl">ℹ️</span>
                        <div>
                            <h3 class="font-semibold text-blue-900 dark:text-blue-200 mb-1">
                                This will update:
                            </h3>
                            <ul class="text-sm text-blue-800 dark:text-blue-300 list-disc list-inside space-y-1">
                                <li>Folder name on disk</li>
                                <li>Folder record in database</li>
                                <li>All {{ $folder->file_count }} file records (their parent_path)</li>
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- Rename Button --}}
                <div class="flex flex-col sm:flex-row gap-3">
                    <button type="submit" 
                            class="px-8 py-4 bg-green-600 hover:bg-green-700 text-white font-bold text-lg rounded-lg transition-colors shadow-lg hover:shadow-xl">
                        ✏️ RENAME FOLDER
                    </button>
                    
                    <a href="{{ route('guitar.folders.index') }}" 
                       class="px-8 py-4 bg-gray-200 hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-900 dark:text-white font-bold text-lg rounded-lg text-center transition-colors">
                        Cancel
                    </a>
                </div>
            </form>
        </div>

        {{-- DELETE FORM (SEPARATE) --}}
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow border border-red-200 dark:border-red-800 p-6">
            <h2 class="text-2xl font-semibold text-red-900 dark:text-red-200 mb-4">
                ⚠️ Danger Zone
            </h2>
            <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">
                <strong class="text-red-600 dark:text-red-400">This will DELETE {{ $folder->file_count }} files!</strong>
            </p>
            <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
                Permanently delete this folder AND all {{ $folder->file_count }} files inside. This action cannot be undone.
            </p>
            
            <form action="{{ route('guitar.folders.destroy', $folder->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" 
                        onclick="return confirm('⚠️ DELETE FOLDER AND ALL FILES?\n\nFolder: {{ $folder->name }}\nContains: {{ $folder->file_count }} files\n\nThis will DELETE:\n- The folder from disk\n- All {{ $folder->file_count }} files from disk\n- All database records\n\nThis CANNOT BE UNDONE!\n\nAre you ABSOLUTELY SURE?')"
                        class="px-8 py-4 bg-red-600 hover:bg-red-700 text-white font-bold text-lg rounded-lg transition-colors shadow-lg hover:shadow-xl">
                    🗑️ DELETE FOLDER + {{ $folder->file_count }} FILES
                </button>
            </form>
        </div>

        {{-- Quick Actions --}}
        <div class="mt-6 flex flex-wrap gap-3">
            <a href="{{ route('guitar.folders.show', $folder->id) }}" 
               class="px-4 py-2 bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-900 dark:text-white rounded-lg text-sm font-medium transition-colors">
                👁️ View Files in Folder
            </a>
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
