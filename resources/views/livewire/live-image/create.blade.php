<div>
    @if($showModal)
        <div class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50"
             x-data="{ confirmText: '' }"
             x-init="$watch('show', value => value && $nextTick(() => $refs.nameInput.focus()))">
            
            <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-2/3 lg:w-1/2 shadow-lg rounded-lg bg-white dark:bg-gray-800">
                <!-- Header -->
                <div class="flex items-center justify-between pb-3 border-b dark:border-gray-700">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white">
                        <i class="fas fa-upload mr-2 text-purple-600 dark:text-purple-400"></i>
                        Upload Image
                    </h3>
                    <button wire:click="closeModal" 
                            class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 transition-colors">
                        <i class="fas fa-times text-2xl"></i>
                    </button>
                </div>

                <!-- Form -->
                <form wire:submit.prevent="save" class="mt-4 space-y-4">
                    <!-- File Upload -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-file-image mr-1"></i>Image File *
                        </label>
                        <input type="file" 
                               wire:model="file"
                               accept="image/*"
                               class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent dark:bg-gray-700 dark:text-white">
                        @error('file') 
                            <span class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</span> 
                        @enderror
                        
                        <!-- Loading State -->
                        <div wire:loading wire:target="file" class="mt-2">
                            <span class="text-purple-600 dark:text-purple-400 text-sm">
                                <i class="fas fa-spinner fa-spin mr-1"></i>Uploading...
                            </span>
                        </div>

                        <!-- Image Preview -->
                        @if ($file)
                            <div class="mt-3 p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                <div class="flex items-start space-x-3">
                                    @if(method_exists($file, 'temporaryUrl'))
                                        <img src="{{ $file->temporaryUrl() }}" 
                                             class="h-16 w-16 object-cover rounded border border-gray-300 dark:border-gray-600">
                                    @endif
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-gray-900 dark:text-white truncate">
                                            {{ $file->getClientOriginalName() }}
                                        </p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">
                                            {{ number_format($file->getSize() / 1024, 2) }} KB
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Name -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-tag mr-1"></i>Image Name *
                        </label>
                        <input type="text" 
                               wire:model.blur="name"
                               x-ref="nameInput"
                               placeholder="Enter image name"
                               class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent dark:bg-gray-700 dark:text-white">
                        @error('name') 
                            <span class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</span> 
                        @enderror
                    </div>

                    <!-- Shortname -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-link mr-1"></i>Shortname
                        </label>
                        <input type="text" 
                               wire:model="shortname"
                               placeholder="Auto-generated from name"
                               class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent dark:bg-gray-700 dark:text-white">
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                            <i class="fas fa-info-circle mr-1"></i>Leave blank to auto-generate from image name
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

                    <!-- Buttons -->
                    <div class="flex justify-end space-x-3 pt-4 border-t dark:border-gray-700">
                        <button type="button"
                                wire:click="closeModal"
                                class="px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors">
                            <i class="fas fa-times mr-2"></i>Cancel
                        </button>
                        <button type="submit"
                                wire:loading.attr="disabled"
                                wire:target="save"
                                class="px-4 py-2 bg-purple-600 hover:bg-purple-700 dark:bg-purple-500 dark:hover:bg-purple-600 text-white rounded-lg transition-colors disabled:opacity-50">
                            <span wire:loading.remove wire:target="save">
                                <i class="fas fa-upload mr-2"></i>Upload Image
                            </span>
                            <span wire:loading wire:target="save">
                                <i class="fas fa-spinner fa-spin mr-2"></i>Uploading...
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
