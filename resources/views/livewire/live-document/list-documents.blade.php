<div class="min-h-screen bg-gray-50 dark:bg-gray-900 transition-colors duration-300">
    <!-- Header Section with Navigation -->
    <div class="bg-gradient-to-r from-blue-800 to-blue-900 dark:from-blue-900 dark:to-gray-900 py-8 px-4 shadow-lg">
        <div class="container mx-auto flex items-start justify-between">
            <!-- Title Section -->
            <div>
                <h1 class="text-4xl font-bold text-white mb-2 border-b border-blue-600 dark:border-blue-500 pb-4">
                    <i class="fas fa-list mr-2"></i>Document List
                </h1>
                <p class="text-white/90 dark:text-blue-100 font-medium text-lg">
                    Table view of all documents
                </p>
            </div>
            
            <!-- Navigation Buttons -->
            <div class="flex flex-col space-y-2 ml-4">
                <a href="{{ route('livedocuments.index') }}" 
                   class="px-4 py-2 bg-white/20 hover:bg-white/30 text-white rounded-lg transition-colors text-sm font-medium whitespace-nowrap flex items-center justify-center space-x-2">
                    <i class="fas fa-th"></i>
                    <span>Back to Grid</span>
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
                 class="mb-6 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 text-green-800 dark:text-green-200 px-4 py-3 rounded-lg shadow-md">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle text-green-600 dark:text-green-400 mr-3"></i>
                        <span class="font-medium">{{ session('message') }}</span>
                    </div>
                    <button @click="show = false" class="text-green-600 hover:text-green-800 dark:text-green-400 dark:hover:text-green-200">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        @endif

        <!-- Search and Controls -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 p-6 mb-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <!-- Search -->
                <div class="flex-1">
                    <div class="relative">
                        <input
                            type="text"
                            wire:model.live.debounce.300ms="search"
                            placeholder="Search documents..."
                            class="w-full pl-12 pr-10 py-3 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:text-white">
                        <div class="absolute left-4 top-3.5 text-gray-400">
                            <i class="fas fa-search"></i>
                        </div>
                        @if($search)
                            <button wire:click="$set('search', '')" class="absolute right-3 top-3 text-gray-400 hover:text-gray-600">
                                <i class="fas fa-times-circle"></i>
                            </button>
                        @endif
                    </div>
                </div>

                <!-- Create Button -->
                <button
                    wire:click="$dispatch('open-create-modal')"
                    class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg flex items-center space-x-2 transition-colors shadow-md">
                    <i class="fas fa-plus"></i>
                    <span>Upload Document</span>
                </button>
            </div>
        </div>

        <!-- Documents Table -->
        @if($documents->count())
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-blue-600 dark:bg-blue-700">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">Type</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">Name</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">Shortname</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">Extension</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">Description</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">Date</th>
                                <th class="px-6 py-3 text-right text-xs font-semibold text-white uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($documents as $document)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-2xl text-blue-600 dark:text-blue-400">
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
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium text-gray-900 dark:text-white">
                                            {{ $document->name }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-600 dark:text-gray-400 font-mono">
                                            {{ $document->shortname }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 dark:bg-blue-900/30 text-blue-800 dark:text-blue-300 uppercase">
                                            {{ $document->extension ?? 'DOC' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-600 dark:text-gray-400 max-w-xs truncate">
                                            {{ $document->description ?: '-' }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-600 dark:text-gray-400">
                                            {{ $document->created_at->format('M d, Y') }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                        <a href="{{ Storage::url($document->path) }}"
                                           download
                                           class="text-green-600 dark:text-green-400 hover:text-green-800 dark:hover:text-green-300"
                                           title="Download">
                                            <i class="fas fa-download"></i>
                                        </a>
                                        <button 
                                            wire:click="$dispatch('openEditModal', {documentId: {{ $document->id }}})"
                                            class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300"
                                            title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button 
                                            wire:click="$dispatch('openDeleteModal', {documentId: {{ $document->id }}})"
                                            class="text-red-600 dark:text-red-400 hover:text-red-800 dark:hover:text-red-300"
                                            title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700">
                    {{ $documents->links() }}
                </div>
            </div>
        @else
            <!-- Empty State -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 p-16">
                <div class="text-center">
                    <div class="text-gray-300 dark:text-gray-600 text-6xl mb-4">
                        <i class="fas fa-folder-open"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-2">
                        No documents found
                    </h3>
                    <p class="text-lg text-gray-600 dark:text-gray-400 mb-6">
                        @if($search)
                            Try adjusting your search
                        @else
                            Get started by uploading your first document
                        @endif
                    </p>
                    <button
                        wire:click="$dispatch('open-create-modal')"
                        class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition-colors shadow-md">
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
