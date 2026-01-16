<div>
    <!-- Modal -->
    <div x-data="{
        open: @entangle('isOpen'),
        confirmText: '',
        errorMessage: ''
    }"
         x-show="open"
         @show-delete-error.window="errorMessage = $event.detail.message"
         @keydown.escape.window="if(open) { open = false; $wire.closeModal(); }"
         class="fixed inset-0 z-50 overflow-y-auto"
         style="display: none;">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center">
            <!-- Overlay -->
            <div x-show="open" 
                 x-transition:enter="ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 @click="open = false; $wire.closeModal()"
                 class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

            <!-- Modal Panel -->
            <div x-show="open"
                 x-transition:enter="ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave="ease-in duration-200"
                 x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 @click.stop
                 class="relative bg-white dark:bg-gray-800 rounded-lg shadow-xl max-w-md w-full p-6 border border-gray-200 dark:border-gray-700">

                <div class="text-center">
                    <!-- Warning Icon -->
                    <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100 dark:bg-red-900/20 mb-4">
                        <i class="fas fa-exclamation-triangle text-red-600 dark:text-red-400 text-xl"></i>
                    </div>

                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Delete Document</h3>
                    <p class="text-sm text-gray-700 dark:text-gray-300 mb-4">
                        Are you sure you want to delete "<strong class="text-red-600 dark:text-red-400">{{ $document->name ?? '' }}</strong>"?
                        This action cannot be undone.
                    </p>

                    <!-- Input using Alpine.js -->
                    <div class="mb-6">
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">
                            Type <span class="font-bold text-red-600 dark:text-red-400">DELETE</span> to confirm:
                        </p>
                        <input
                            type="text"
                            x-model="confirmText"
                            @input="errorMessage = ''"
                            @keydown.enter="if(confirmText.trim() === 'DELETE') { $wire.delete(confirmText); confirmText = ''; }"
                            class="w-full px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent"
                            placeholder="Type DELETE here"
                            autofocus
                        >

                        <!-- Error message -->
                        <div x-show="errorMessage" 
                             x-transition
                             class="mt-2 text-sm text-red-600 dark:text-red-400 flex items-center justify-center">
                            <i class="fas fa-exclamation-circle mr-1"></i>
                            <span x-text="errorMessage"></span>
                        </div>

                        <!-- Debug info (remove in production) -->
                        <p class="mt-2 text-xs text-gray-500" x-show="confirmText">
                            You typed: '<span x-text="confirmText"></span>' 
                            <span x-show="confirmText.trim() === 'DELETE'" class="text-green-600">✓</span>
                        </p>
                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-center space-x-3">
                        <button
                            type="button"
                            @click="confirmText = ''; errorMessage = ''; open = false; $wire.closeModal()"
                            class="px-4 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-300"
                        >
                            <i class="fas fa-times mr-1"></i> Cancel
                        </button>
                        <button
                            type="button"
                            @click="
                                if(confirmText.trim() === 'DELETE') {
                                    $wire.delete(confirmText);
                                    confirmText = '';
                                    errorMessage = '';
                                } else {
                                    errorMessage = 'Please type DELETE to confirm.';
                                }
                            "
                            wire:loading.attr="disabled"
                            wire:target="delete"
                            class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors duration-300 disabled:opacity-50 disabled:cursor-not-allowed"
                            :class="{ 'opacity-50': confirmText.trim() !== 'DELETE' }"
                        >
                            <span wire:loading.remove wire:target="delete">
                                <i class="fas fa-trash mr-1"></i> Delete Document
                            </span>
                            <span wire:loading wire:target="delete">
                                <i class="fas fa-spinner fa-spin mr-1"></i> Deleting...
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
