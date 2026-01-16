<div class="min-h-screen bg-gray-50 dark:bg-gray-900 transition-colors duration-300">
    <!-- Header Section with Navigation -->
    <div class="bg-gradient-to-r from-purple-800 to-purple-900 dark:from-purple-900 dark:to-gray-900 py-8 px-4 shadow-lg">
        <div class="container mx-auto flex items-start justify-between">
            <!-- Title Section -->
            <div>
                <h1 class="text-4xl font-bold text-white mb-2 border-b border-purple-600 dark:border-purple-500 pb-4">
                    <i class="fas fa-list mr-2"></i>Image List
                </h1>
                <p class="text-white/90 dark:text-purple-100 font-medium text-lg">
                    Table view of all images
                </p>
            </div>
            
            <!-- Navigation Buttons -->
            <div class="flex flex-col space-y-2 ml-4">
                <a href="{{ route('liveimages.index') }}" 
                   class="px-4 py-2 bg-white/20 hover:bg-white/30 text-white rounded-lg transition-colors text-sm font-medium whitespace-nowrap flex items-center justify-center space-x-2">
                    <i class="fas fa-th"></i>
                    <span>Back to Grid</span>
                </a>
                <a href="/portfoliodash" 
                   class="px-4 py-2 bg-purple-700 hover:bg-purple-600 text-white rounded-lg transition-colors text-sm font-medium whitespace-nowrap flex items-center justify-center space-x-2">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Rest of content stays the same -->
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
                            placeholder="Search images..."
                            class="w-full pl-12 pr-10 py-3 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent dark:text-white">
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
                    class="px-6 py-3 bg-purple-600 hover:bg-purple-700 text-white font-semibold rounded-lg flex items-center space-x-2 transition-colors shadow-md">
                    <i class="fas fa-plus"></i>
                    <span>Upload Image</span>
                </button>
            </div>
        </div>

        <!-- Images Table -->
        @if($images->count())
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-purple-600 dark:bg-purple-700">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">Preview</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">Name</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">Shortname</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">Type</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">Description</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">Date</th>
                                <th class="px-6 py-3 text-right text-xs font-semibold text-white uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($images as $image)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <img src="{{ Storage::url($image->path) }}" 
                                             alt="{{ $image->name }}"
                                             class="h-16 w-16 object-cover rounded border border-gray-300 dark:border-gray-600">
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium text-gray-900 dark:text-white">
                                            {{ $image->name }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-600 dark:text-gray-400 font-mono">
                                            {{ $image->shortname }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 dark:bg-purple-900/30 text-purple-800 dark:text-purple-300 uppercase">
                                            {{ $image->extension ?? 'IMG' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-600 dark:text-gray-400 max-w-xs truncate">
                                            {{ $image->description ?: '-' }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-600 dark:text-gray-400">
                                            {{ $image->created_at->format('M d, Y') }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                        <a href="{{ Storage::url($image->path) }}"
                                           download
                                           class="text-green-600 dark:text-green-400 hover:text-green-800 dark:hover:text-green-300"
                                           title="Download">
                                            <i class="fas fa-download"></i>
                                        </a>
                                        <button 
                                            wire:click="$dispatch('openEditModal', {imageId: {{ $image->id }}})"
                                            class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300"
                                            title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button 
                                            wire:click="$dispatch('openDeleteModal', {imageId: {{ $image->id }}})"
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
                    {{ $images->links() }}
                </div>
            </div>
        @else
            <!-- Empty State -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 p-16">
                <div class="text-center">
                    <div class="text-gray-300 dark:text-gray-600 text-6xl mb-4">
                        <i class="fas fa-images"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-2">
                        No images found
                    </h3>
                    <p class="text-lg text-gray-600 dark:text-gray-400 mb-6">
                        @if($search)
                            Try adjusting your search
                        @else
                            Get started by uploading your first image
                        @endif
                    </p>
                    <button
                        wire:click="$dispatch('open-create-modal')"
                        class="px-6 py-3 bg-purple-600 hover:bg-purple-700 text-white font-semibold rounded-lg transition-colors shadow-md">
                        <i class="fas fa-plus mr-2"></i>Upload Image
                    </button>
                </div>
            </div>
        @endif

        <!-- Modals -->
        @livewire('live-image.create')
        @livewire('live-image.edit')
        @livewire('live-image.delete')
    </div>
</div>
