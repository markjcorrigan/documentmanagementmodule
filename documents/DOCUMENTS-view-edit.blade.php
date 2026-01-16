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
            <span class="text-gray-900 dark:text-white">Edit Document</span>
        </div>
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
            <i class="fas fa-edit"></i> Edit Document
        </h1>
        <p class="text-gray-600 dark:text-gray-400 mt-1">
            Update document information: <strong>{{ $document->name }}</strong>
        </p>
    </div>

    <!-- Form Card -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 max-w-3xl">
        @livewire('documents.document-form', ['document' => $document])
    </div>
</div>
@endsection
