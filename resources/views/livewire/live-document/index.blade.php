<div class="min-h-screen bg-gray-50 dark:bg-gray-900 transition-colors duration-300">
    <!-- Header Section with Navigation -->
    <div class="bg-gradient-to-r from-blue-800 to-blue-900 dark:from-blue-900 dark:to-gray-900 py-8 px-4 shadow-lg">
        <div class="container mx-auto flex items-start justify-between">
            <!-- Title Section -->
            <div>
                <h1 class="text-4xl font-bold text-white mb-2 border-b border-blue-600 dark:border-blue-500 pb-4">
                    <i class="fas fa-folder mr-2"></i>Document Gallery
                </h1>
                <p class="text-white/90 dark:text-blue-100 font-medium text-lg">
                    Document Management System
                </p>
            </div>
            
            <!-- Navigation Buttons -->
            <div class="flex flex-col space-y-2 ml-4">
                <a href="{{ route('livedocuments.list') }}" 
                   class="px-4 py-2 bg-white/20 hover:bg-white/30 text-white rounded-lg transition-colors text-sm font-medium whitespace-nowrap flex items-center justify-center space-x-2">
                    <i class="fas fa-list"></i>
                    <span>Back to List</span>
                </a>
                <a href="/portfoliodash" 
                   class="px-4 py-2 bg-blue-700 hover:bg-blue-600 text-white rounded-lg transition-colors text-sm font-medium whitespace-nowrap flex items-center justify-center space-x-2">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="container mx-auto px-4 py-8">
        <!-- Flash Messages -->
        @if(session()->has('message'))
            <div x-data="{ show: true }" 
                 x-show="show" 
                 x-init="setTimeout(() => show = false, 5000)"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 transform translate-y-2"
                 x-transition:enter-end="opacity-100 transform translate-y-0"
                 x-transition:leave="transition ease-in duration-300"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="mb-6 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 text-green-800 dark:text-green-200 px-4 py-3 rounded-lg shadow-md">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle text-green-600 dark:text-green-400 mr-3"></i>
                        <span class="font-medium">{{ session('message') }}</span>
                    </div>
                    <button @click="show = false" 
                            class="text-green-600 hover:text-green-800 dark:text-green-400 dark:hover:text-green-200 ml-4">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        @endif

        @if(session()->has('error'))
            <div x-data="{ show: true }" 
                 x-show="show" 
                 x-init="setTimeout(() => show = false, 5000)"
                 class="mb-6 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 text-red-800 dark:text-red-200 px-4 py-3 rounded-lg shadow-md">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <i class="fas fa-exclamation-circle text-red-600 dark:text-red-400 mr-3"></i>
                        <span class="font-medium">{{ session('error') }}</span>
                    </div>
                    <button @click="show = false" 
                            class="text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-200 ml-4">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        @endif

        <!-- Search and Controls Card -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 p-6 mb-8 transition-colors duration-300">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <!-- Search Input -->
                <div class="flex-1">
                    <div class="relative">
                        <input
                            type="text"
                            wire:model.live.debounce.300ms="search"
                            placeholder="Search documents by name, description, or shortname..."
                            class="w-full pl-12 pr-10 py-3 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:text-white dark:placeholder-gray-400 transition-colors duration-300"
                        >
                        <div class="absolute left-4 top-3.5 text-gray-400 dark:text-gray-500">
                            <i class="fas fa-search"></i>
                        </div>
                        @if($search)
                            <button 
                                wire:click="$set('search', '')"
                                class="absolute right-3 top-3 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                                <i class="fas fa-times-circle"></i>
                            </button>
                        @endif
                    </div>
                </div>

                <!-- Filter and Create Buttons -->
                <div class="flex items-center space-x-3">
                    <!-- Filter Toggle -->
                    <button
                        wire:click="$toggle('showFilters')"
                        class="px-6 py-3 bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-white font-semibold rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors duration-300 flex items-center space-x-2"
                    >
                        <i class="fas fa-filter"></i>
                        <span>Filter</span>
                        @if($extension || $sortField !== 'name')
                            <span class="ml-1 px-2 py-0.5 bg-blue-500 text-white text-xs rounded-full">•</span>
                        @endif
                    </button>

                    <!-- Create Button -->
                    <button
                        wire:click="$dispatch('open-create-modal')"
                        class="px-6 py-3 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white font-semibold rounded-lg flex items-center space-x-2 transition-colors duration-300 shadow-md hover:shadow-lg"
                    >
                        <i class="fas fa-plus"></i>
                        <span>Upload Document</span>
                    </button>
                </div>
            </div>

            <!-- Filters Panel -->
            @if($showFilters)
                <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Extension Filter -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                <i class="fas fa-file-alt mr-1"></i>Document Type
                            </label>
                            <select
                                wire:model.live="extension"
                                class="w-full px-4 py-2.5 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors duration-300"
                            >
                                <option value="">All Types</option>
                                @foreach($availableExtensions as $ext)
                                    <option value="{{ $ext }}">{{ strtoupper($ext) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Sort Options -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                <i class="fas fa-sort mr-1"></i>Sort By
                            </label>
                            <div class="flex space-x-2">
                                <button
                                    wire:click="sortBy('name')"
                                    class="flex-1 px-4 py-2.5 border rounded-lg text-sm transition-colors duration-300 {{ $sortField === 'name' ? 'bg-blue-50 dark:bg-blue-900/30 border-blue-500 dark:border-blue-400 text-blue-700 dark:text-blue-300 font-semibold' : 'border-gray-300 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-300' }}"
                                >
                                    Name
                                    @if($sortField === 'name')
                                        <i class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }} ml-1"></i>
                                    @endif
                                </button>
                                <button
                                    wire:click="sortBy('created_at')"
                                    class="flex-1 px-4 py-2.5 border rounded-lg text-sm transition-colors duration-300 {{ $sortField === 'created_at' ? 'bg-blue-50 dark:bg-blue-900/30 border-blue-500 dark:border-blue-400 text-blue-700 dark:text-blue-300 font-semibold' : 'border-gray-300 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-300' }}"
                                >
                                    Date
                                    @if($sortField === 'created_at')
                                        <i class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }} ml-1"></i>
                                    @endif
                                </button>
                            </div>
                        </div>

                        <!-- Results Per Page -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                <i class="fas fa-th mr-1"></i>Per Page
                            </label>
                            <select
                                wire:model.live="perPage"
                                class="w-full px-4 py-2.5 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors duration-300"
                            >
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <!-- Loading Overlay -->
        <div wire:loading.delay class="mb-4">
            <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-4 flex items-center">
                <i class="fas fa-spinner fa-spin text-blue-600 dark:text-blue-400 mr-3"></i>
                <span class="text-blue-700 dark:text-blue-300 font-medium">Loading documents...</span>
            </div>
        </div>

        <!-- Documents Grid -->
        @if($documents->count())
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mb-8">
                @foreach($documents as $document)
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md border border-gray-200 dark:border-gray-700 hover:shadow-xl dark:hover:shadow-gray-900/50 transition-all duration-300 overflow-hidden group">
                        <!-- Document Icon/Preview -->
                        <div class="relative bg-gradient-to-br from-blue-50 to-blue-100 dark:from-blue-900/20 dark:to-gray-800 p-8 flex items-center justify-center">
                            <div class="text-6xl text-blue-600 dark:text-blue-400">
                                @if(in_array($document->extension, ['pdf']))
                                    <i class="fas fa-file-pdf"></i>
                                @elseif(in_array($document->extension, ['doc', 'docx']))
                                    <i class="fas fa-file-word"></i>
                                @elseif(in_array($document->extension, ['xls', 'xlsx']))
                                    <i class="fas fa-file-excel"></i>
                                @elseif(in_array($document->extension, ['jpg', 'jpeg', 'png', 'gif']))
                                    <i class="fas fa-file-image"></i>
                                @elseif(in_array($document->extension, ['txt']))
                                    <i class="fas fa-file-alt"></i>
                                @else
                                    <i class="fas fa-file"></i>
                                @endif
                            </div>
                            
                            <!-- Overlay with actions -->
                            <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-60 transition-all duration-300 flex items-center justify-center opacity-0 group-hover:opacity-100">
                                <div class="flex space-x-2">
                                    <a href="{{ Storage::url($document->path) }}" 
                                       download
                                       class="p-3 bg-white dark:bg-gray-800 text-green-600 dark:text-green-400 rounded-lg hover:bg-green-50 dark:hover:bg-green-900/20 transition-colors"
                                       title="Download">
                                        <i class="fas fa-download"></i>
                                    </a>
                                    <button 
                                        wire:click="$dispatch('openEditModal', {documentId: {{ $document->id }}})"
                                        class="p-3 bg-white dark:bg-gray-800 text-blue-600 dark:text-blue-400 rounded-lg hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-colors"
                                        title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button 
                                        wire:click="$dispatch('openDeleteModal', {documentId: {{ $document->id }}})"
                                        class="p-3 bg-white dark:bg-gray-800 text-red-600 dark:text-red-400 rounded-lg hover:bg-red-50 dark:hover:bg-red-900/20 transition-colors"
                                        title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Extension Badge -->
                            <div class="absolute top-2 right-2">
                                <span class="px-2 py-1 bg-blue-600 text-white text-xs font-bold rounded uppercase">
                                    {{ $document->extension ?? 'DOC' }}
                                </span>
                            </div>
                        </div>

                        <!-- Document Info -->
                        <div class="p-4">
                            <h3 class="text-sm font-semibold text-gray-900 dark:text-white truncate mb-1" 
                                title="{{ $document->name }}">
                                {{ $document->name }}
                            </h3>
                            <p class="text-xs text-gray-500 dark:text-gray-400 font-mono truncate mb-2"
                               title="{{ $document->shortname }}">
                                {{ $document->shortname }}
                            </p>
                            @if($document->description)
                                <p class="text-xs text-gray-600 dark:text-gray-400 line-clamp-2">
                                    {{ $document->description }}
                                </p>
                            @endif
                            <div class="mt-2 text-xs text-gray-500 dark:text-gray-400">
                                {{ $document->created_at->format('M d, Y') }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md border border-gray-200 dark:border-gray-700 p-4">
                {{ $documents->links() }}
            </div>
        @else
            <!-- Empty State -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 p-16">
                <div class="text-center">
                    <div class="text-gray-300 dark:text-gray-600 text-6xl mb-4">
                        <i class="fas fa-folder-open"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-2">
                        @if($search || $extension)
                            No documents found
                        @else
                            No documents yet
                        @endif
                    </h3>
                    <p class="text-lg text-gray-600 dark:text-gray-400 mb-6 max-w-md mx-auto">
                        @if($search || $extension)
                            Try adjusting your search or filters
                        @else
                            Get started by uploading your first document
                        @endif
                    </p>
                    @if($search || $extension)
                        <button
                            wire:click="clearFilters"
                            class="px-6 py-3 bg-gray-600 hover:bg-gray-700 text-white font-semibold rounded-lg transition-colors duration-300 mr-3">
                            <i class="fas fa-times-circle mr-2"></i>Clear Filters
                        </button>
                    @endif
                    <button
                        wire:click="$dispatch('open-create-modal')"
                        class="px-6 py-3 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white font-semibold rounded-lg transition-colors duration-300 shadow-md hover:shadow-lg">
                        <i class="fas fa-plus mr-2"></i>Upload Document
                    </button>
                </div>
            </div>
        @endif

        <!-- Modals -->
        @livewire('live-document.create')
        @livewire('live-document.edit')
        @livewire('live-document.delete')
    </div>
</div>

<style>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
