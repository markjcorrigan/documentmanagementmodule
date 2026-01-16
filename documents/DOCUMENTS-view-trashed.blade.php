@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <div class="flex items-center text-sm text-gray-600 dark:text-gray-400 mb-4">
                <a href="{{ route('documents.index') }}" class="hover:text-blue-600 dark:hover:text-blue-400">
                    <i class="fas fa-file-alt"></i> Documents
                </a>
                <span class="mx-2">/</span>
                <span class="text-gray-900 dark:text-white">Trash</span>
            </div>
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
                <i class="fas fa-trash"></i> Trashed Documents
            </h1>
            <p class="text-gray-600 dark:text-gray-400 mt-1">
                Restore or permanently delete documents
            </p>
        </div>
        <a href="{{ route('documents.index') }}" 
           class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
            <i class="fas fa-arrow-left"></i> Back to Documents
        </a>
    </div>

    <!-- Trashed Documents Component -->
    @livewire('documents.trashed-documents')
</div>
@endsection
