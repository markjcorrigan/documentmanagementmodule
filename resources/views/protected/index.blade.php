@extends('documents.documentlayout.default')

@section('title', 'Files Library')

@section('header')
    @include('components.simple-nav')
@endsection

@section('maincontent')
    <main class="min-h-screen">
        <div class="container mx-auto p-4 pt-6">
            {{-- Success Alert --}}
            @if (session()->has('success'))
                <div class="bg-green-100 dark:bg-green-900 border border-green-400 dark:border-green-700 text-green-700 dark:text-green-100 px-4 py-3 rounded mb-6">
                    {{ session()->get('success') }}
                </div>
            @endif
            {{-- Error Alert --}}
            @if (session()->has('error'))
                <div class="bg-red-100 dark:bg-red-900 border border-red-400 dark:border-red-700 text-red-700 dark:text-red-100 px-4 py-3 rounded mb-6">
                    {{ session()->get('error') }}
                </div>
            @endif

            <h1 class="text-3xl font-bold mb-6 text-gray-900 dark:text-white">Protected Storage Files</h1>

            <!-- SEARCH AND FILTER FORM -->
            <div class="mb-8 bg-white dark:bg-gray-900 rounded-lg shadow p-6">
                <form action="{{ route('protected.index') }}" method="GET" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <!-- Search -->
                        <input type="text"
                               name="search"
                               value="{{ request('search') }}"
                               placeholder="Search files and folders..."
                               class="px-4 py-3 border border-gray-300 dark:border-gray-600
                                      rounded-lg focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400
                                      focus:border-transparent bg-white dark:bg-gray-800
                                      text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400">

                        <!-- Resource Filter -->
                        <select name="resource"
                                class="px-4 py-3 border border-gray-300 dark:border-gray-600
                                       rounded-lg focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400
                                       focus:border-transparent bg-white dark:bg-gray-800
                                       text-gray-900 dark:text-white">
                            <option value="">All Resources</option>
                            @foreach($resources as $resource)
                                <option value="{{ $resource }}" {{ request('resource') === $resource ? 'selected' : '' }}>
                                    {{ ucfirst($resource) }}
                                </option>
                            @endforeach
                        </select>

                        <!-- Type Filter -->
                        <select name="type"
                                class="px-4 py-3 border border-gray-300 dark:border-gray-600
                                       rounded-lg focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400
                                       focus:border-transparent bg-white dark:bg-gray-800
                                       text-gray-900 dark:text-white">
                            <option value="">All Types</option>
                            <option value="file" {{ request('type') === 'file' ? 'selected' : '' }}>Files</option>
                            <option value="folder" {{ request('type') === 'folder' ? 'selected' : '' }}>Folders</option>
                        </select>
                    </div>

                    <div class="flex gap-2">
                        <button type="submit"
                                class="bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600
                                       text-white font-medium py-3 px-6 rounded-lg transition-colors">
                            Search
                        </button>

                        @if(request('search') || request('resource') || request('type'))
                            <a href="{{ route('protected.index') }}"
                               class="bg-gray-300 hover:bg-gray-400 dark:bg-gray-700 dark:hover:bg-gray-600
                                      text-gray-800 dark:text-gray-200 font-medium py-3 px-6 rounded-lg transition-colors">
                                Clear
                            </a>
                        @endif
                    </div>
                </form>
            </div>

            <!-- UPLOAD AND CREATE FOLDER FORMS -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
                <!-- Upload Form -->
                <div class="bg-white dark:bg-gray-900 rounded-lg shadow p-6">
                    <h2 class="text-xl font-semibold mb-4 text-gray-900 dark:text-white">Upload File</h2>

                    <form action="{{ route('protected.upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label class="block mb-2 font-medium text-gray-700 dark:text-gray-300">Resource:</label>
                            <select name="resource" required
                                    class="block w-full p-3 border border-gray-300 dark:border-gray-600
                                           rounded-lg focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400
                                           focus:border-transparent bg-white dark:bg-gray-800
                                           text-gray-900 dark:text-white">
                                @foreach($resources as $resource)
                                    <option value="{{ $resource }}">{{ ucfirst($resource) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block mb-2 font-medium text-gray-700 dark:text-gray-300">Folder (optional):</label>
                            <input type="text" name="folder" placeholder="subfolder/path"
                                   class="block w-full p-3 border border-gray-300 dark:border-gray-600
                                          rounded-lg focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400
                                          focus:border-transparent bg-white dark:bg-gray-800
                                          text-gray-900 dark:text-white">
                        </div>

                        <div class="mb-4">
                            <label class="block mb-2 font-medium text-gray-700 dark:text-gray-300">File:</label>
                            <input type="file" name="file" required
                                   class="block w-full text-sm text-gray-500 dark:text-gray-400
                                          file:mr-4 file:py-3 file:px-4 file:rounded-lg
                                          file:border-0 file:text-sm file:font-semibold
                                          file:bg-blue-50 file:text-blue-700 dark:file:bg-blue-900 dark:file:text-blue-300
                                          hover:file:bg-blue-100 dark:hover:file:bg-blue-800">
                        </div>

                        <button type="submit"
                                class="w-full bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600
                                       text-white font-bold py-3 px-6 rounded-lg transition-colors">
                            Upload File
                        </button>
                    </form>
                </div>

                <!-- Create Folder Form -->
                <div class="bg-white dark:bg-gray-900 rounded-lg shadow p-6">
                    <h2 class="text-xl font-semibold mb-4 text-gray-900 dark:text-white">Create Folder</h2>

                    <form action="{{ route('protected.createFolder') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="block mb-2 font-medium text-gray-700 dark:text-gray-300">Resource:</label>
                            <select name="resource" required
                                    class="block w-full p-3 border border-gray-300 dark:border-gray-600
                                           rounded-lg focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400
                                           focus:border-transparent bg-white dark:bg-gray-800
                                           text-gray-900 dark:text-white">
                                @foreach($resources as $resource)
                                    <option value="{{ $resource }}">{{ ucfirst($resource) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block mb-2 font-medium text-gray-700 dark:text-gray-300">Parent Folder (optional):</label>
                            <input type="text" name="parent_folder" placeholder="parent/path"
                                   class="block w-full p-3 border border-gray-300 dark:border-gray-600
                                          rounded-lg focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400
                                          focus:border-transparent bg-white dark:bg-gray-800
                                          text-gray-900 dark:text-white">
                        </div>

                        <div class="mb-4">
                            <label class="block mb-2 font-medium text-gray-700 dark:text-gray-300">Folder Name:</label>
                            <input type="text" name="folder_name" required
                                   class="block w-full p-3 border border-gray-300 dark:border-gray-600
                                          rounded-lg focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400
                                          focus:border-transparent bg-white dark:bg-gray-800
                                          text-gray-900 dark:text-white">
                        </div>

                        <button type="submit"
                                class="w-full bg-green-600 hover:bg-green-700 dark:bg-green-500 dark:hover:bg-green-600
                                       text-white font-bold py-3 px-6 rounded-lg transition-colors">
                            Create Folder
                        </button>
                    </form>
                </div>
            </div>

            @if($files->count() > 0)
                <!-- Top Pagination -->
                <div class="mb-6">
                    {{ $files->links('pagination::tailwind') }}
                </div>

                <!-- Files Table -->
                <div class="hidden md:block overflow-x-auto bg-white dark:bg-gray-900 rounded-lg shadow">
                    <table class="w-full border-collapse">
                        <thead class="bg-gray-100 dark:bg-gray-800">
                        <tr>
                            <th class="border border-gray-300 dark:border-gray-700 px-4 py-3 text-left text-gray-700 dark:text-gray-300">Type</th>
                            <th class="border border-gray-300 dark:border-gray-700 px-4 py-3 text-left text-gray-700 dark:text-gray-300">Name</th>
                            <th class="border border-gray-300 dark:border-gray-700 px-4 py-3 text-left text-gray-700 dark:text-gray-300">Path</th>
                            <th class="border border-gray-300 dark:border-gray-700 px-4 py-3 text-left text-gray-700 dark:text-gray-300">Size</th>
                            <th class="border border-gray-300 dark:border-gray-700 px-4 py-3 text-left text-gray-700 dark:text-gray-300">Modified</th>
                            <th class="border border-gray-300 dark:border-gray-700 px-4 py-3 text-left text-gray-700 dark:text-gray-300">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($files as $file)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                                <td class="border border-gray-300 dark:border-gray-700 px-4 py-3 text-gray-900 dark:text-gray-200">
                                    @if($file->type === 'folder')
                                        <i class="fas fa-folder text-yellow-600"></i> Folder
                                    @else
                                        <i class="fas fa-file text-blue-600"></i> File
                                    @endif
                                </td>
                                <td class="border border-gray-300 dark:border-gray-700 px-4 py-3 text-gray-900 dark:text-gray-200">
                                    {{ $file->name }}
                                    @if($file->extension)
                                        <span class="text-xs text-gray-500">.{{ $file->extension }}</span>
                                    @endif
                                </td>
                                <td class="border border-gray-300 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400 text-sm">
                                    {{ $file->path }}
                                </td>
                                <td class="border border-gray-300 dark:border-gray-700 px-4 py-3 text-gray-900 dark:text-gray-200">
                                    @if($file->type === 'file')
                                        {{ number_format($file->size / 1024, 2) }} KB
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="border border-gray-300 dark:border-gray-700 px-4 py-3 text-gray-900 dark:text-gray-200">
                                    {{ $file->file_modified_at?->format('Y-m-d H:i') ?? '-' }}
                                </td>
                                <td class="border border-gray-300 dark:border-gray-700 px-4 py-3">
                                    <div class="flex flex-wrap gap-2">
                                        @if($file->type === 'file')
                                            <a href="{{ $file->url }}" target="_blank"
                                               class="flex-1 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600
                                                      text-white font-medium py-2 px-3 rounded text-center transition-colors">
                                                View
                                            </a>
                                            <a href="{{ route('protected.download', $file->id) }}"
                                               class="flex-1 bg-green-600 hover:bg-green-700 dark:bg-green-500 dark:hover:bg-green-600
                                                      text-white font-medium py-2 px-3 rounded text-center transition-colors">
                                                Download
                                            </a>
                                        @endif
                                        <a href="{{ route('protected.edit', $file->id) }}"
                                           class="flex-1 bg-yellow-600 hover:bg-yellow-700 dark:bg-yellow-500 dark:hover:bg-yellow-600
                                                  text-white font-medium py-2 px-3 rounded text-center transition-colors">
                                            Edit
                                        </a>
                                        <form action="{{ route('protected.destroy', $file->id) }}" method="POST" class="flex-1">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="w-full bg-red-600 hover:bg-red-700 dark:bg-red-500 dark:hover:bg-red-600
                                                           text-white font-medium py-2 px-3 rounded text-center transition-colors"
                                                    onclick="return confirm('Delete {{ $file->type === 'folder' ? 'this folder and all its contents' : 'this file' }}?')">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                {{ $files->links('pagination::tailwind') }}
            @else
                {{-- No Results Message --}}
                <div class="bg-white dark:bg-gray-900 rounded-lg shadow p-8 text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <h3 class="mt-2 text-lg font-medium text-gray-900 dark:text-white">No files found</h3>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                        @if(request('search'))
                            No files match your search. Try different criteria.
                        @else
                            Run 'php artisan system:maintenance-confidential' to sync files.
                        @endif
                    </p>
                </div>
            @endif
        </div>
        <br><br><br><br>
    </main>
@endsection

@section('footer')
    <x-footer />
@endsection

{{-- SCROLL TO TOP BUTTON - Outside all sections to ensure proper rendering --}}
@push('body-end')
    <button
        id="scrollToTopBtnProtected"
        class="fixed bottom-6 right-6 w-12 h-12 bg-blue-600 hover:bg-blue-700 text-white rounded-full shadow-lg hover:shadow-xl transition-all duration-300 flex items-center justify-center group"
        aria-label="Scroll to top"
        style="z-index: 99999 !important; opacity: 0; pointer-events: none; position: fixed !important;">
        <svg id="progressRingProtected" class="absolute top-0 left-0 w-12 h-12 transform -rotate-90" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid meet">
            <circle
                cx="50"
                cy="50"
                r="45"
                stroke="rgba(255,255,255,0.3)"
                stroke-width="3"
                fill="none"
            />
            <circle
                id="progressCircleProtected"
                cx="50"
                cy="50"
                r="45"
                stroke="white"
                stroke-width="3"
                fill="none"
                stroke-dasharray="283"
                stroke-dashoffset="283"
                class="transition-all duration-100"
            />
        </svg>
        <i class="fa-solid fa-arrow-up text-white text-sm relative z-10 group-hover:transform group-hover:-translate-y-0.5 transition-transform"></i>
    </button>

    <script>
        (function() {
            // Scroll to top functionality
            const scrollToTopBtn = document.getElementById('scrollToTopBtnProtected');
            const progressCircle = document.getElementById('progressCircleProtected');

            if (!scrollToTopBtn || !progressCircle) {
                console.error('Scroll to top elements not found');
                return;
            }

            const circumference = 283; // 2 * π * 45

            // Show/hide button and update progress on scroll
            function handleScroll() {
                const scrollTop = window.scrollY || document.documentElement.scrollTop;
                const docHeight = document.documentElement.scrollHeight - window.innerHeight;
                const scrollPercent = scrollTop / docHeight;
                const scrollProgress = Math.min(scrollPercent * 100, 100);

                // Update progress circle
                const offset = circumference - (scrollProgress / 100) * circumference;
                progressCircle.style.strokeDashoffset = offset;

                // Show/hide button
                if (scrollTop > 300) {
                    scrollToTopBtn.style.opacity = '1';
                    scrollToTopBtn.style.pointerEvents = 'auto';
                } else {
                    scrollToTopBtn.style.opacity = '0';
                    scrollToTopBtn.style.pointerEvents = 'none';
                }
            }

            window.addEventListener('scroll', handleScroll);

            // Scroll to top when clicked
            scrollToTopBtn.addEventListener('click', function() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });

            // Initial check
            handleScroll();
        })();
    </script>
@endpush
