@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Header -->
    <div class="mb-6">
        <div class="flex items-center text-sm text-gray-600 dark:text-gray-400 mb-4">
            <a href="{{ route('documents.index') }}" class="hover:text-blue-600 dark:hover:text-blue-400">
                <i class="fas fa-file-alt"></i> Documents
            </a>
            <span class="mx-2">/</span>
            <span class="text-gray-900 dark:text-white">Document Details</span>
        </div>
        <div class="flex justify-between items-start">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
                    <i class="fas {{ $document->icon }}"></i> {{ $document->name }}
                </h1>
                <p class="text-gray-600 dark:text-gray-400 mt-1">
                    {{ $document->description }}
                </p>
            </div>
            <div class="flex space-x-2">
                <a href="{{ route('documents.download', $document) }}" 
                   class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                    <i class="fas fa-download"></i> Download
                </a>
                <a href="{{ route('documents.edit', $document) }}" 
                   class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                    <i class="fas fa-edit"></i> Edit
                </a>
            </div>
        </div>
    </div>

    <!-- Document Details Card -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden">
        <div class="p-6">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                Document Information
            </h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Left Column -->
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">
                            File Name
                        </label>
                        <p class="text-gray-900 dark:text-white">{{ $document->name }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">
                            Short Name
                        </label>
                        <p class="text-gray-900 dark:text-white">{{ $document->shortname }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">
                            File Type
                        </label>
                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                            {{ strtoupper($document->extension) }}
                        </span>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">
                            File Size
                        </label>
                        <p class="text-gray-900 dark:text-white">{{ $document->file_size }}</p>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">
                            Uploaded At
                        </label>
                        <p class="text-gray-900 dark:text-white">
                            {{ $document->created_at->format('F d, Y \a\t h:i A') }}
                        </p>
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            ({{ $document->created_at->diffForHumans() }})
                        </p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">
                            Last Modified
                        </label>
                        <p class="text-gray-900 dark:text-white">
                            {{ $document->updated_at->format('F d, Y \a\t h:i A') }}
                        </p>
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            ({{ $document->updated_at->diffForHumans() }})
                        </p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">
                            File Path
                        </label>
                        <p class="text-gray-900 dark:text-white text-sm font-mono bg-gray-100 dark:bg-gray-700 px-2 py-1 rounded">
                            {{ $document->path }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Description Section -->
            @if($document->description)
                <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
                    <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">
                        Description
                    </label>
                    <p class="text-gray-900 dark:text-white">{{ $document->description }}</p>
                </div>
            @endif
        </div>

        <!-- Actions Footer -->
        <div class="bg-gray-50 dark:bg-gray-700 px-6 py-4 flex justify-between items-center">
            <form action="{{ route('documents.destroy', $document) }}" method="POST" 
                  onsubmit="return confirm('Move this document to trash?');">
                @csrf
                @method('DELETE')
                <button type="submit" 
                        class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                    <i class="fas fa-trash"></i> Move to Trash
                </button>
            </form>

            <div class="flex space-x-2">
                <a href="{{ route('documents.index') }}" 
                   class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-600 transition">
                    <i class="fas fa-arrow-left"></i> Back to List
                </a>
            </div>
        </div>
    </div>

    <!-- Preview Section (for images and PDFs) -->
    @if(in_array($document->extension, ['jpg', 'jpeg', 'png', 'gif', 'pdf']))
        <div class="mt-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                Preview
            </h2>
            
            @if(in_array($document->extension, ['jpg', 'jpeg', 'png', 'gif']))
                <div class="flex justify-center">
                    <img src="{{ asset($document->path) }}" 
                         alt="{{ $document->name }}" 
                         class="max-w-full h-auto rounded-lg shadow-md">
                </div>
            @elseif($document->extension === 'pdf')
                <div class="aspect-video">
                    <iframe src="{{ asset($document->path) }}" 
                            class="w-full h-full border-0 rounded-lg"
                            title="{{ $document->name }}">
                    </iframe>
                </div>
            @endif
        </div>
    @endif
</div>
@endsection
