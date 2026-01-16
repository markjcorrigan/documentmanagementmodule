<div>
    @if($showModal)
        <div class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
            <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-2/3 lg:w-1/2 shadow-lg rounded-lg bg-white dark:bg-gray-800">
                <!-- Header -->
                <div class="flex items-center justify-between pb-3 border-b dark:border-gray-700">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white">
                        <i class="fas fa-edit mr-2 text-purple-600 dark:text-purple-400"></i>
                        Edit Image
                    </h3>
                    <button wire:click="closeModal" 
                            class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 transition-colors">
                        <i class="fas fa-times text-2xl"></i>
                    </button>
                </div>

                <!-- Image Preview -->
                @if($image)
                    <div class="mt-4 mb-4">
                        <div class="flex items-center justify-center p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                            <img src="{{ Storage::url($image->path) }}" 
                                 alt="{{ $image->name }}"
                                 class="max-h-48 object-contain rounded">
                        </div>
                    </div>
                @endif

                <!-- Form -->
                <form wire:submit.prevent="update" class="mt-4 space-y-4">
                    <!-- Name -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-tag mr-1"></i>Image Name *
                        </label>
                        <input type="text" 
                               wire:model="name"
                               placeholder="Enter image name"
                               class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent dark:bg-gray-700 dark:text-white">
                        @error('name') 
                            <span class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</span> 
                        @enderror
                    </div>

                    <!-- Shortname -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-link mr-1"></i>Shortname *
                        </label>
                        <input type="text" 
                               wire:model="shortname"
                               placeholder="image-shortname"
                               class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent dark:bg-gray-700 dark:text-white">
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                            <i class="fas fa-info-circle mr-1"></i>Only letters, numbers, dashes and underscores (max 255 chars)
                        </p>
                        @error('shortname') 
                            <span class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</span> 
                        @enderror
                    </div>

                    <!-- Description -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-align-left mr-1"></i>Description
                        </label>
                        <textarea 
                            wire:model="description"
                            rows="3"
                            placeholder="Optional description"
                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent dark:bg-gray-700 dark:text-white resize-none"></textarea>
                        @error('description') 
                            <span class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</span> 
                        @enderror
                    </div>

                    <!-- Note -->
                    <div class="p-3 bg-purple-50 dark:bg-purple-900/20 border border-purple-200 dark:border-purple-800 rounded-lg">
                        <p class="text-sm text-purple-700 dark:text-purple-300">
                            <i class="fas fa-info-circle mr-2"></i>
                            <strong>Note:</strong> You cannot change the actual image file. To use a different image, delete this one and upload a new one.
                        </p>
                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-end space-x-3 pt-4 border-t dark:border-gray-700">
                        <button type="button"
                                wire:click="closeModal"
                                class="px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors">
                            <i class="fas fa-times mr-2"></i>Cancel
                        </button>
                        <button type="submit"
                                wire:loading.attr="disabled"
                                wire:target="update"
                                class="px-4 py-2 bg-purple-600 hover:bg-purple-700 dark:bg-purple-500 dark:hover:bg-purple-600 text-white rounded-lg transition-colors disabled:opacity-50">
                            <span wire:loading.remove wire:target="update">
                                <i class="fas fa-save mr-2"></i>Update Image
                            </span>
                            <span wire:loading wire:target="update">
                                <i class="fas fa-spinner fa-spin mr-2"></i>Updating...
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
