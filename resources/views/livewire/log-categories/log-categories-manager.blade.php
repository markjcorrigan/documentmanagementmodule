<div class="max-w-7xl mx-auto px-4 py-8">
    {{-- Header --}}
    <div class="mb-8 flex justify-between items-center">
        <h1 class="text-4xl font-bold text-gray-900 dark:text-white border-b border-gray-200 dark:border-gray-700 pb-4">
            <i class="fa-solid fa-folder mr-2"></i>Log Categories
        </h1>
        <button wire:click="openCreateModal" 
                class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors">
            <i class="fa-solid fa-plus mr-2"></i>New Category
        </button>
    </div>

    {{-- Flash Message --}}
    @if (session()->has('message'))
        <div class="mb-6 flex items-center justify-between px-4 py-3 bg-green-50 dark:bg-green-900/30 border border-green-200 dark:border-green-800 rounded-lg">
            <div class="flex items-center text-green-800 dark:text-green-300">
                <i class="fa-solid fa-circle-check mr-2"></i>
                {{ session('message') }}
            </div>
            <button onclick="this.parentElement.remove()" 
                    class="text-green-600 hover:text-green-800 dark:text-green-400 dark:hover:text-green-300">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
    @endif

    {{-- Categories Grid --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($categories as $category)
            <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6 hover:shadow-lg transition-shadow">
                <div class="flex items-start justify-between mb-4">
                    <div class="flex items-center">
                        <div class="w-8 h-8 rounded-full mr-3" style="background-color: {{ $category->color }}"></div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white">{{ $category->name }}</h3>
                    </div>
                </div>

                <div class="text-gray-600 dark:text-gray-400 text-sm mb-4">
                    <i class="fa-solid fa-journal-text mr-1"></i>
                    {{ $category->logs_count }} {{ Str::plural('log', $category->logs_count) }}
                </div>

                <div class="flex gap-2">
                    <button wire:click="openEditModal({{ $category->id }})" 
                            class="flex-1 px-3 py-2 border border-blue-600 text-blue-600 hover:bg-blue-50 dark:text-blue-400 dark:border-blue-400 dark:hover:bg-blue-900/30 font-medium rounded-lg text-sm transition-colors">
                        <i class="fa-solid fa-pencil mr-1"></i>Edit
                    </button>
                    <button wire:click="deleteCategory({{ $category->id }})"
                            wire:confirm="Delete this category? Logs will not be deleted."
                            class="flex-1 px-3 py-2 border border-red-600 text-red-600 hover:bg-red-50 dark:text-red-400 dark:border-red-400 dark:hover:bg-red-900/30 font-medium rounded-lg text-sm transition-colors">
                        <i class="fa-solid fa-trash mr-1"></i>Delete
                    </button>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-12">
                <i class="fa-solid fa-folder-open text-gray-300 dark:text-gray-600 text-6xl mb-4"></i>
                <p class="text-xl text-gray-500 dark:text-gray-400">No categories yet. Create your first category!</p>
            </div>
        @endforelse
    </div>

    {{-- Pagination --}}
    <div class="mt-8">
        {{ $categories->links() }}
    </div>

    {{-- Create/Edit Modal --}}
    @if($showModal)
        <div x-data="{ show: @entangle('showModal') }" 
             x-show="show"
             class="fixed inset-0 z-[60] overflow-y-auto"
             style="display: none;">
            
            <div class="fixed inset-0 bg-black bg-opacity-50"></div>
            
            <div class="flex min-h-screen items-center justify-center p-4">
                <div @click.away="$wire.closeModal()"
                     x-show="show"
                     class="relative bg-white dark:bg-gray-800 rounded-lg shadow-xl w-full max-w-md">
                    
                    <div class="flex items-center justify-between p-6 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            {{ $isEditing ? 'Edit Category' : 'Create New Category' }}
                        </h3>
                        <button wire:click="closeModal"
                                class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 rounded-lg p-2">
                            <i class="fa-solid fa-xmark text-xl"></i>
                        </button>
                    </div>

                    <form wire:submit.prevent="save">
                        <div class="p-6">
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Category Name <span class="text-red-500">*</span>
                                </label>
                                <input type="text"
                                       wire:model="name"
                                       class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 @error('name') border-red-500 @enderror"
                                       placeholder="e.g., Work, Personal"
                                       autofocus>
                                @error('name')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Color
                                </label>
                                <input type="color"
                                       wire:model="color"
                                       class="w-full h-12 border border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer">
                            </div>
                        </div>

                        <div class="flex justify-end space-x-3 p-6 border-t border-gray-200 dark:border-gray-700">
                            <button type="button"
                                    wire:click="closeModal"
                                    class="px-4 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 font-medium rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700">
                                Cancel
                            </button>
                            <button type="submit"
                                    class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg">
                                {{ $isEditing ? 'Update' : 'Create' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>