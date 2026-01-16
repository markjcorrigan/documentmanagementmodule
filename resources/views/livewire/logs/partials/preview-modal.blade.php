{{-- resources/views/livewire/logs/partials/preview-modal.blade.php --}}
<div x-data="{ show: @entangle('showPreviewModal') }" 
     x-show="show"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     class="fixed inset-0 z-[60] overflow-y-auto"
     aria-labelledby="preview-modal-title"
     role="dialog"
     aria-modal="true"
     style="display: none;">
    
    <!-- Backdrop -->
    <div class="fixed inset-0 bg-black bg-opacity-80 transition-opacity"></div>
    
    <!-- Modal Container -->
    <div class="flex min-h-screen items-center justify-center p-4">
        <!-- Modal Panel -->
        <div @click.away="$wire.closePreviewModal()"
             x-show="show"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95"
             class="relative bg-gray-900 dark:bg-gray-800 rounded-lg shadow-xl w-full max-w-6xl max-h-[90vh] overflow-hidden">
            
            <!-- Modal Header -->
            <div class="flex items-center justify-between p-6 bg-gray-900 border-b border-gray-800">
                <div class="flex items-center">
                    <i class="fa-solid fa-eye mr-2 text-gray-400 text-lg"></i>
                    <h3 class="text-lg font-semibold text-white">
                        {{ $previewFile->filename ?? 'Preview' }}
                    </h3>
                </div>
                <button wire:click="closePreviewModal"
                        class="text-gray-400 hover:text-gray-300 rounded-lg p-2 hover:bg-gray-800 transition-colors">
                    <i class="fa-solid fa-xmark text-xl"></i>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="bg-black">
                @if($previewFile && $previewFile->isImage())
                    <!-- Image Preview -->
                    <div class="flex items-center justify-center p-8">
                        <img src="{{ $previewFile->url }}"
                             alt="{{ $previewFile->filename }}"
                             class="max-w-full max-h-[70vh] object-contain">
                    </div>
                @elseif($previewFile && $previewFile->mime_type === 'application/pdf')
                    <!-- PDF Preview -->
                    <div class="h-[70vh]">
                        <iframe src="{{ $previewFile->url }}"
                                class="w-full h-full border-0"
                                title="PDF Preview"></iframe>
                    </div>
                @elseif($previewFile)
                    <!-- Document Info -->
                    <div class="flex flex-col items-center justify-center p-12 text-white">
                        <div class="mb-6 p-6 bg-gray-800 rounded-full">
                            <i class="fa-solid fa-file-lines text-5xl text-gray-400"></i>
                        </div>
                        <h4 class="text-2xl font-semibold mb-2">{{ $previewFile->filename }}</h4>
                        <p class="text-gray-400 mb-1">{{ $previewFile->formatted_size }}</p>
                        <p class="text-gray-500 mb-6">{{ $previewFile->mime_type }}</p>
                        <a href="{{ $previewFile->url }}"
                           download="{{ $previewFile->filename }}"
                           class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors">
                            <i class="fa-solid fa-download mr-2"></i>Download File
                        </a>
                    </div>
                @endif
            </div>

            <!-- Modal Footer -->
            @if($previewFile)
                <div class="flex justify-between items-center p-6 bg-gray-900 border-t border-gray-800">
                    <a href="{{ $previewFile->url }}"
                       download="{{ $previewFile->filename }}"
                       class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition-colors">
                        <i class="fa-solid fa-download mr-1"></i>Download
                    </a>
                    <div class="flex space-x-3">
                        <a href="{{ $previewFile->url }}"
                           target="_blank"
                           class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors">
                            <i class="fa-solid fa-arrow-up-right-from-square mr-1"></i>Open in New Tab
                        </a>
                        <button type="button"
                                wire:click="closePreviewModal"
                                class="px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white font-medium rounded-lg transition-colors">
                            <i class="fa-solid fa-xmark mr-1"></i>Close
                        </button>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>