@extends('documents.documentlayout.default')

@section('title', 'Guitar Practice Media')

@section('header')
    @include('components.simple-nav')
@endsection

@section('maincontent')
    <main class="min-h-screen bg-white dark:bg-zinc-800">
        <div class="container mx-auto p-4 pt-6">
            <h1 class="text-3xl font-bold mb-6 text-center text-gray-900 dark:text-white">
                🎸 Guitar Practice Media
            </h1>

            @if(session('success'))
                <div class="mb-6 p-4 bg-green-100 dark:bg-green-900 border border-green-400 text-green-700 dark:text-green-200 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 p-4 bg-red-100 dark:bg-red-900 border border-red-400 text-red-700 dark:text-red-200 rounded-lg">
                    {{ session('error') }}
                </div>
            @endif

            {{-- Simple Upload --}}
            <div class="mb-8 bg-white dark:bg-gray-900 rounded-lg shadow p-4">
                <form action="{{ route('guitar.upload') }}" method="POST" enctype="multipart/form-data" class="flex gap-4">
                    @csrf
                    <input type="file" name="file" required accept=".mp3,.mp4,.pdf,.jpg,.jpeg,.png"
                           class="flex-grow p-2 border border-gray-300 dark:border-gray-600 rounded-lg
                                  bg-white dark:bg-gray-800 text-gray-900 dark:text-white">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg">
                        Upload
                    </button>
                </form>
                <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">
                    MP3, MP4, PDF, JPG, PNG • Max 100MB
                </p>
            </div>

            {{-- Simple Search --}}
            <div class="mb-8">
                <form action="{{ route('guitar.index') }}" method="GET" class="flex gap-2">
                    <input type="text" name="search" value="{{ request('search') }}"
                           placeholder="Search files..."
                           class="flex-grow p-3 border border-gray-300 dark:border-gray-600 rounded-lg
                                  bg-white dark:bg-gray-800 text-gray-900 dark:text-white">
                    <button type="submit" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-6 rounded-lg">
                        Search
                    </button>
                </form>
            </div>

            {{-- Media Files List --}}
            <div class="bg-white dark:bg-gray-900 rounded-lg shadow overflow-hidden">
                @if($files->count() > 0)
                    <div class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($files as $file)
                            <div class="p-4 hover:bg-gray-50 dark:hover:bg-gray-800">
                                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                                    {{-- File Info --}}
                                    <div class="flex items-start space-x-3 min-w-0">
                                        {{-- Icon --}}
                                        @if($file->extension === 'mp3')
                                            <span class="text-2xl text-green-500 mt-1">🎵</span>
                                        @elseif($file->extension === 'mp4')
                                            <span class="text-2xl text-blue-500 mt-1">🎬</span>
                                        @elseif($file->extension === 'pdf')
                                            <span class="text-2xl text-red-500 mt-1">📄</span>
                                        @else
                                            <span class="text-2xl text-yellow-500 mt-1">🖼️</span>
                                        @endif

                                        {{-- Details --}}
                                        <div class="min-w-0">
                                            <div class="font-medium text-gray-900 dark:text-white truncate">
                                                {{ $file->name }}
                                            </div>
                                            <div class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                                                {{ $file->composer }} @if($file->title)- {{ $file->title }}@endif
                                            </div>
                                            <div class="text-xs text-gray-500 dark:text-gray-400 mt-1 flex flex-wrap gap-2">
                                                <span class="font-mono bg-gray-100 dark:bg-gray-700 px-1 rounded">
                                                    {{ strtoupper($file->extension) }}
                                                </span>
                                                <span>{{ number_format($file->size / 1024 / 1024, 2) }} MB</span>
                                                <span>{{ $file->file_modified_at->format('Y-m-d') }}</span>
                                            </div>
                                            {{-- PATH --}}
                                            <div class="text-xs text-gray-400 dark:text-gray-500 font-mono mt-2 truncate">
                                                📁 storage/protectedGuitar/{{ $file->path }}
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Actions --}}
                                    <div class="flex flex-wrap gap-2">
                                        {{-- Play/View Button --}}
                                        <a href="{{ route('guitar.view', $file->id) }}"
                                           @if(in_array($file->extension, ['mp3', 'mp4'])) target="_blank" @endif
                                           class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-sm">
                                            @if($file->extension === 'mp3') Play Audio
                                            @elseif($file->extension === 'mp4') Play Video
                                            @elseif($file->extension === 'pdf') View PDF
                                            @else View Image
                                            @endif
                                        </a>

                                        {{-- Download --}}
                                        <a href="{{ route('guitar.download', $file->id) }}"
                                           class="px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg text-sm">
                                            Download
                                        </a>

                                        {{-- Delete --}}
                                        <form action="{{ route('guitar.destroy', $file->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Delete this file?')"
                                                    class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg text-sm">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- Pagination --}}
                    <div class="p-4 bg-gray-50 dark:bg-gray-800">
                        <div class="text-sm text-gray-600 dark:text-gray-400 mb-2">
                            Page {{ $files->currentPage() }} of {{ $files->lastPage() }}
                        </div>
                        {{ $files->links() }}
                    </div>
                @else
                    <div class="p-8 text-center text-gray-400">
                        No media files found. Upload MP3, MP4, or PDF files to practice!
                    </div>
                @endif
            </div>
        </div>
    </main>
@endsection

@section('footer')
    <x-footer />
@endsection