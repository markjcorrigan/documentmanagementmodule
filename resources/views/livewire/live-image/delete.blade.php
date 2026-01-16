<div>
    @if($showModal)
        <div class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50"
             x-data="{ 
                 confirmText: '',
                 errorMessage: '',
                 init() {
                     this.$nextTick(() => this.$refs.confirmInput.focus());
                     window.addEventListener('show-delete-error', (e) => {
                         this.errorMessage = e.detail.message;
                     });
                 }
             }"
             @keydown.escape="$wire.closeModal()"
             @keydown.enter.prevent="if(confirmText.trim() === 'DELETE') { $wire.delete(confirmText); }">
            
            <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-2/3 lg:w-1/2 shadow-lg rounded-lg bg-white dark:bg-gray-800">
                <!-- Header -->
                <div class="flex items-center justify-between pb-3 border-b dark:border-gray-700">
                    <h3 class="text-xl font-bold text-red-600 dark:text-red-400">
                        <i class="fas fa-exclamation-triangle mr-2"></i>
                        Delete Image
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
                                 class="h-32 w-32 object-cover rounded border-2 border-gray-300 dark:border-gray-600">
                        </div>
                    </div>
                @endif

                <!-- Warning Message -->
                <div class="mt-4 p-4 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-lg">
                    <p class="text-red-800 dark:text-red-200 text-center">
                        <i class="fas fa-exclamation-circle mr-2"></i>
                        <strong>Warning:</strong> You are about to permanently delete:
                    </p>
                    <p class="text-red-900 dark:text-red-100 font-bold text-center mt-2 text-lg">
                        {{ $imageName }}
                    </p>
                    <p class="text-red-700 dark:text-red-300 text-center mt-2 text-sm">
                        This action cannot be undone. The image file will be permanently removed from storage.
                    </p>
                </div>

                <!-- Confirmation Input -->
                <div class="mt-4">
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                        <i class="fas fa-keyboard mr-1"></i>Type <span class="text-red-600 dark:text-red-400 font-bold">DELETE</span> to confirm
                    </label>
                    <input type="text" 
                           x-ref="confirmInput"
                           x-model="confirmText"
                           @input="errorMessage = ''"
                           placeholder="Type DELETE here"
                           class="w-full px-3 py-2 border-2 border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 dark:bg-gray-700 dark:text-white uppercase"
                           autocomplete="off">
                    
                    <!-- Visual Feedback -->
                    <div class="mt-2 flex items-center" x-show="confirmText.trim() !== ''">
                        <template x-if="confirmText.trim() === 'DELETE'">
                            <span class="text-green-600 dark:text-green-400 text-sm">
                                <i class="fas fa-check-circle mr-1"></i>Confirmed - you may proceed
                            </span>
                        </template>
                        <template x-if="confirmText.trim() !== 'DELETE'">
                            <span class="text-red-600 dark:text-red-400 text-sm">
                                <i class="fas fa-times-circle mr-1"></i>You typed: <span x-text="confirmText"></span>
                            </span>
                        </template>
                    </div>

                    <!-- Error Message -->
                    <div x-show="errorMessage" 
                         x-transition
                         class="mt-2 p-2 bg-red-100 dark:bg-red-900/30 border border-red-300 dark:border-red-700 rounded text-red-700 dark:text-red-300 text-sm">
                        <i class="fas fa-exclamation-triangle mr-1"></i>
                        <span x-text="errorMessage"></span>
                    </div>
                </div>

                <!-- Keyboard Shortcuts Info -->
                <div class="mt-3 p-2 bg-gray-100 dark:bg-gray-700 rounded text-xs text-gray-600 dark:text-gray-400 text-center">
                    <i class="fas fa-info-circle mr-1"></i>
                    Press <kbd class="px-2 py-1 bg-gray-200 dark:bg-gray-600 rounded">Enter</kbd> to delete or 
                    <kbd class="px-2 py-1 bg-gray-200 dark:bg-gray-600 rounded">Esc</kbd> to cancel
                </div>

                <!-- Buttons -->
                <div class="flex justify-end space-x-3 pt-4 border-t dark:border-gray-700 mt-4">
                    <button type="button"
                            wire:click="closeModal"
                            class="px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors">
                        <i class="fas fa-times mr-2"></i>Cancel
                    </button>
                    <button type="button"
                            @click="$wire.delete(confirmText)"
                            wire:loading.attr="disabled"
                            class="px-4 py-2 bg-red-600 hover:bg-red-700 dark:bg-red-500 dark:hover:bg-red-600 text-white rounded-lg transition-colors disabled:opacity-50">
                        <span wire:loading.remove>
                            <i class="fas fa-trash mr-2"></i>Delete Image
                        </span>
                        <span wire:loading>
                            <i class="fas fa-spinner fa-spin mr-2"></i>Deleting...
                        </span>
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>
