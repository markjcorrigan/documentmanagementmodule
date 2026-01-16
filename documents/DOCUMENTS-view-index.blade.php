@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
                <i class="fas fa-file-alt"></i> Document Library
            </h1>
            <p class="text-gray-600 dark:text-gray-400 mt-1">
                Manage and organize your documents
            </p>
        </div>
        <div class="flex space-x-3">
            <a href="{{ route('documents.trashed') }}" 
               class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition">
                <i class="fas fa-trash"></i> Trash
            </a>
            <a href="{{ route('documents.create') }}" 
               class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                <i class="fas fa-plus"></i> Upload New Document
            </a>
        </div>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <!-- Document List Component -->
    @livewire('documents.document-list')
</div>
@endsection
