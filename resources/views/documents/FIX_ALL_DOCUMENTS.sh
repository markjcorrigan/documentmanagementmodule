#!/bin/bash

echo "🔧 Fixing All Documents Module Files"
echo "====================================="
echo ""

# Navigate to documents directory
cd resources/views/documents

echo "1️⃣ Fixing create.blade.php..."
cat > create.blade.php << 'CREATEEOF'
@extends('documents.layouts.main')

@section('content')
<div class="container mx-auto px-4">
    <div class="max-w-2xl mx-auto">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">
                <i class="fas fa-upload mr-2"></i>Upload New Document
            </h2>

            <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- File Upload -->
                <div class="mb-6">
                    <label for="document" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Select File *
                    </label>
                    <input type="file" 
                           name="document" 
                           id="document" 
                           required
                           class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white">
                    @error('document')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Short Name -->
                <div class="mb-6">
                    <label for="shortname" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Short Name (optional)
                    </label>
                    <input type="text" 
                           name="shortname" 
                           id="shortname"
                           class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white"
                           placeholder="Leave blank to auto-generate">
                </div>

                <!-- Description -->
                <div class="mb-6">
                    <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Description (optional)
                    </label>
                    <textarea name="description" 
                              id="description" 
                              rows="4"
                              class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white"
                              placeholder="Enter document description"></textarea>
                </div>

                <!-- Buttons -->
                <div class="flex justify-end space-x-3">
                    <a href="{{ route('documents.index') }}" 
                       class="px-6 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition">
                        Cancel
                    </a>
                    <button type="submit" 
                            class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                        <i class="fas fa-upload mr-2"></i>Upload
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
CREATEEOF

echo "2️⃣ Fixing edit.blade.php..."
cat > edit.blade.php << 'EDITEOF'
@extends('documents.layouts.main')

@section('content')
<div class="container mx-auto px-4">
    <div class="max-w-2xl mx-auto">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">
                <i class="fas fa-edit mr-2"></i>Edit Document
            </h2>

            <form action="{{ route('documents.update', $document) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Current File Info -->
                <div class="mb-6 p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        <strong>Current File:</strong> {{ $document->name }}
                    </p>
                </div>

                <!-- Replace File (optional) -->
                <div class="mb-6">
                    <label for="document" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Replace File (optional)
                    </label>
                    <input type="file" 
                           name="document" 
                           id="document"
                           class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white">
                </div>

                <!-- Short Name -->
                <div class="mb-6">
                    <label for="shortname" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Short Name
                    </label>
                    <input type="text" 
                           name="shortname" 
                           id="shortname"
                           value="{{ old('shortname', $document->shortname) }}"
                           class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white">
                </div>

                <!-- Description -->
                <div class="mb-6">
                    <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Description
                    </label>
                    <textarea name="description" 
                              id="description" 
                              rows="4"
                              class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white">{{ old('description', $document->description) }}</textarea>
                </div>

                <!-- Buttons -->
                <div class="flex justify-end space-x-3">
                    <a href="{{ route('documents.index') }}" 
                       class="px-6 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition">
                        Cancel
                    </a>
                    <button type="submit" 
                            class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                        <i class="fas fa-save mr-2"></i>Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
EDITEOF

echo "3️⃣ Fixing show.blade.php..."
cat > show.blade.php << 'SHOWEOF'
@extends('documents.layouts.main')

@section('content')
<div class="container mx-auto px-4">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
            <!-- Header -->
            <div class="flex justify-between items-start mb-6">
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white flex items-center">
                        <i class="fas {{ $document->icon }} text-3xl mr-3 text-blue-600"></i>
                        {{ $document->name }}
                    </h2>
                    <p class="text-gray-600 dark:text-gray-400 mt-2">{{ $document->shortname }}</p>
                </div>
                <span class="px-3 py-1 bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200 rounded-full text-sm font-semibold">
                    {{ strtoupper($document->extension) }}
                </span>
            </div>

            <!-- Details -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">File Size</h3>
                    <p class="text-lg text-gray-900 dark:text-white">{{ $document->file_size }}</p>
                </div>
                <div>
                    <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Uploaded</h3>
                    <p class="text-lg text-gray-900 dark:text-white">{{ $document->created_at->format('M d, Y g:i A') }}</p>
                </div>
            </div>

            <!-- Description -->
            <div class="mb-6">
                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">Description</h3>
                <p class="text-gray-900 dark:text-white">{{ $document->description }}</p>
            </div>

            <!-- Actions -->
            <div class="flex space-x-3 pt-6 border-t border-gray-200 dark:border-gray-700">
                <a href="{{ route('documents.download', $document) }}" 
                   class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                    <i class="fas fa-download mr-2"></i>Download
                </a>
                <a href="{{ route('documents.edit', $document) }}" 
                   class="px-6 py-2 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700 transition">
                    <i class="fas fa-edit mr-2"></i>Edit
                </a>
                <form action="{{ route('documents.destroy', $document) }}" method="POST" class="inline"
                      onsubmit="return confirm('Move this document to trash?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                        <i class="fas fa-trash mr-2"></i>Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
SHOWEOF

echo "4️⃣ Fixing trashed.blade.php..."
cat > trashed.blade.php << 'TRASHEDEOF'
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
TRASHEDEOF

echo ""
echo "✅ All CRUD pages fixed!"
echo ""
echo "Now updating navigation..."

cd partials

cat > navigation.blade.php << 'NAVEOF'
{{-- Documents Module Navigation --}}
<nav class="bg-white dark:bg-zinc-900 border-b border-gray-200 dark:border-gray-700 shadow-sm">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center h-16">
            
            {{-- Left Side - Home Icon Only --}}
            <div class="flex items-center">
                <a href="{{ route('home') }}" 
                   class="flex items-center justify-center w-10 h-10 text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg transition"
                   title="Home">
                    <i class="fas fa-home text-2xl"></i>
                </a>
            </div>

            {{-- Right Side - Context-Aware Navigation --}}
            <div class="flex items-center space-x-3">
                
                {{-- Back to Documents List (show on all pages except index) --}}
                @if(!request()->routeIs('documents.index'))
                    <a href="{{ route('documents.index') }}" 
                       class="flex items-center px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition shadow-sm">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Back to Documents
                    </a>
                @endif

                {{-- Upload (only show on index and trashed pages) --}}
                @if(request()->routeIs('documents.index') || request()->routeIs('documents.trashed'))
                    <a href="{{ route('documents.create') }}" 
                       class="flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition shadow-sm">
                        <i class="fas fa-plus mr-2"></i>
                        Upload
                    </a>
                @endif

                {{-- Trash (only show on index page) --}}
                @if(request()->routeIs('documents.index'))
                    <a href="{{ route('documents.trashed') }}" 
                       class="flex items-center px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition shadow-sm">
                        <i class="fas fa-trash mr-2"></i>
                        Trash
                    </a>
                @endif

            </div>

        </div>
    </div>
</nav>
NAVEOF

echo "✅ Navigation updated!"
echo ""
echo "====================================="
echo "✅ ALL FILES FIXED!"
echo ""
echo "Now run these commands:"
echo "1. cd /c/xampp/htdocs/pmway"
echo "2. bash resources/views/documents/FIX_ALL_DOCUMENTS.sh"
echo ""
echo "Then refresh your browser! 🚀"

