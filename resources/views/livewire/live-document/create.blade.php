<div>
    <!-- Modal -->
    <div x-data="{ open: @entangle('isOpen') }" 
         x-show="open" 
         class="fixed inset-0 z-50 overflow-y-auto"
         style="display: none;">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center">
            <!-- Overlay -->
            <div x-show="open" 
                 x-transition:enter="ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

            <!-- Modal Panel -->
            <div x-show="open"
                 x-transition:enter="ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave="ease-in duration-200"
                 x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 class="relative bg-white dark:bg-gray-800 rounded-lg shadow-xl max-w-md w-full p-6 border border-gray-200 dark:border-gray-700">

                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    <i class="fas fa-upload mr-2"></i>Upload Document
                </h3>

                <form wire:submit.prevent="save" enctype="multipart/form-data">
                    <!-- Name -->
                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            Document Name <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               wire:model.blur="name"
                               class="w-full px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                               placeholder="Enter document name">
                        @error('name') <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                    </div>

                    <!-- Short Name (Auto-generated or manual) -->
                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            Short Name (auto-generated)
                        </label>
                        <input type="text" 
                               wire:model="shortname"
                               class="w-full px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                               placeholder="Auto-generated from name"
                               maxlength="30">
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                            <i class="fas fa-info-circle mr-1"></i>Leave empty to auto-generate from document name
                        </p>
                        @error('shortname') <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Description</label>
                        <textarea wire:model="description" 
                                  rows="3"
                                  class="w-full px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                  placeholder="Optional description"></textarea>
                        @error('description') <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                    </div>

                    <!-- File Upload -->
                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            File <span class="text-red-500">*</span>
                            <span class="text-xs font-normal text-gray-500">(Max: 10MB)</span>
                        </label>

                        <input type="file" 
                               wire:model="file" 
                               id="fileInput"
                               class="w-full px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 dark:file:bg-blue-900/20 dark:file:text-blue-300">

                        <!-- File Preview -->
                        @if ($file)
                            <div class="mt-3 p-3 bg-gray-50 dark:bg-gray-700 rounded-lg border border-gray-200 dark:border-gray-600">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-2">
                                        <i class="fas fa-file text-blue-500"></i>
                                        <div>
                                            <div class="text-sm font-medium text-gray-900 dark:text-white">
                                                {{ $file->getClientOriginalName() }}
                                            </div>
                                            <div class="text-xs text-gray-500 dark:text-gray-400">
                                                {{ round($file->getSize() / 1024, 2) }} KB
                                            </div>
                                        </div>
                                    </div>
                                    <i class="fas fa-check-circle text-green-500"></i>
                                </div>
                            </div>
                        @endif

                        <!-- Loading indicator for file upload -->
                        <div wire:loading wire:target="file" class="mt-2">
                            <div class="flex items-center text-sm text-blue-600 dark:text-blue-400">
                                <i class="fas fa-spinner fa-spin mr-2"></i>
                                Processing file...
                            </div>
                        </div>

                        @error('file')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">
                            <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                        </p>
                        @enderror

                        <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">
                            <i class="fas fa-info-circle mr-1"></i>Allowed: PDF, Word, Excel, Text, Images
                        </p>
                    </div>

                    <!-- Folder -->
                    <div class="mb-6">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            Folder <span class="text-red-500">*</span>
                        </label>
                        <select wire:model="folder"
                                class="w-full px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option value="assets">📁 Assets</option>
                            <option value="documents">📄 Documents</option>
                            <option value="images">🖼️ Images</option>
                        </select>
                        @error('folder') <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                    </div>

                    <!-- Actions -->
                    <div class="flex justify-end space-x-3">
                        <button type="button" 
                                wire:click="closeModal"
                                class="px-4 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-300">
                            <i class="fas fa-times mr-1"></i> Cancel
                        </button>
                        <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-300 flex items-center space-x-2 disabled:opacity-50 disabled:cursor-not-allowed"
                                wire:loading.attr="disabled"
                                wire:target="save, file">
                            <span wire:loading.remove wire:target="save">
                                <i class="fas fa-upload mr-1"></i> Upload Document
                            </span>
                            <span wire:loading wire:target="save">
                                <i class="fas fa-spinner fa-spin mr-2"></i> Uploading...
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
