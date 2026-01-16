@extends('images.imagelayout.default')

@section('title', 'Download Image')

@section('header')
    <x-documentsnav />
@endsection

@section('maincontent')
    <main class="min-h-screen">
        <div class="container mx-auto p-4 pt-6">
            @if(isset($image) && $image)
                <div class="bg-white dark:bg-gray-900 rounded-lg shadow p-8 text-center">
                    <div class="mb-6">
                        <svg class="mx-auto h-16 w-16 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10" />
                        </svg>
                    </div>

                    <h1 class="text-2xl font-bold mb-4 text-gray-900 dark:text-white">Download Image</h1>

                    <div class="mb-6 bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
                        <p class="text-gray-700 dark:text-gray-300 mb-2">
                            <strong>Image Name:</strong> {{ $image->name }}
                        </p>
                        <p class="text-gray-700 dark:text-gray-300 mb-2">
                            <strong>Short Name:</strong> {{ $image->shortname }}
                        </p>
                        <p class="text-gray-700 dark:text-gray-300">
                            <strong>Description:</strong> {{ $image->description }}
                        </p>
                    </div>

                    <a href="{{ route('images.download', $image->shortname) }}"
                       class="inline-flex items-center justify-center bg-green-600 hover:bg-green-700
                              dark:bg-green-500 dark:hover:bg-green-600 text-white font-bold
                              py-3 px-6 rounded-lg transition-colors text-lg">
                        <i class="fas fa-download mr-2"></i>
                        Download Image
                    </a>

                    <p class="mt-4 text-sm text-gray-600 dark:text-gray-400">
                        Click the button above to download "{{ $image->name }}"
                    </p>

                    <div class="mt-8">
                        <a href="{{ route('image-uploading') }}"
                           class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300
                                  font-medium transition-colors">
                            ← Back to Images
                        </a>
                    </div>
                </div>
            @else
                <div class="bg-red-100 dark:bg-red-900 border border-red-400 dark:border-red-700
                            text-red-700 dark:text-red-100 px-4 py-3 rounded">
                    <p>Image not found or has been deleted.</p>
                </div>

                <div class="mt-4">
                    <a href="{{ route('image-uploading') }}"
                       class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300
                              font-medium transition-colors">
                        ← Back to Images
                    </a>
                </div>
            @endif
        </div>
    </main>
@endsection

@section('footer')
    <x-footer />
@endsection