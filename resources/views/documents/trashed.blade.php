@extends('documents.layouts.main')

@section('content')
<div class="container mx-auto px-4">
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
            <i class="fas fa-trash mr-2"></i>Deleted Documents
        </h1>
        <p class="text-gray-600 dark:text-gray-400 mt-1">
            Restore or permanently delete documents
        </p>
    </div>

    @livewire('documents.trashed-list')
</div>
@endsection
