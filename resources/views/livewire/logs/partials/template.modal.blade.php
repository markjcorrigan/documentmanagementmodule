{{-- resources/views/livewire/logs/partials/template-modal.blade.php --}}
<div x-data="{ show: @entangle('showTemplateModal') }" 
     x-show="show"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     class="fixed inset-0 z-[60] overflow-y-auto"
     aria-labelledby="template-modal-title"
     role="dialog"
     aria-modal="true"
     style="display: none;">
    
    <!-- Backdrop -->
    <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity"></div>
    
    <!-- Modal Container -->
    <div class="flex min-h-screen items-center justify-center p-4">
        <!-- Modal Panel -->
        <div @click.away="$wire.closeTemplateModal()"
             x-show="show"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95"
             class="relative bg-white dark:bg-gray-800 rounded-lg shadow-xl w-full max-w-4xl max-h-[90vh] overflow-hidden">
            
            <!-- Modal Header -->
            <div class="flex items-center justify-between p-6 border-b border-gray-200 dark:border-gray-700">
                <div class="flex items-center">
                    <i class="fa-solid fa-file-lines mr-2 text-gray-600 dark:text-gray-400 text-lg"></i>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Log Templates
                    </h3>
                </div>
                <button wire:click="closeTemplateModal"
                        class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 rounded-lg p-2 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                    <i class="fa-solid fa-xmark text-xl"></i>
                </button>
            </div>

            <div class="p-6 max-h-[70vh] overflow-y-auto">
                <!-- Create New Template Form -->
                @if($title || $content)
                    <div class="mb-6 bg-blue-50 dark:bg-blue-900/30 border border-blue-200 dark:border-blue-800 rounded-lg overflow-hidden">
                        <div class="px-4 py-3 bg-blue-600 dark:bg-blue-700">
                            <div class="flex items-center text-white">
                                <i class="fa-solid fa-plus-circle mr-2"></i>
                                <span class="font-medium">Save Current Log as Template</span>
                            </div>
                        </div>
                        <div class="p-4">
                            <form wire:submit="saveAsTemplate">
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Template Name <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text"
                                           wire:model="templateName"
                                           class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('templateName') border-red-500 @enderror"
                                           placeholder="e.g., Meeting Logs, Daily Journal"
                                           required>
                                    @error('templateName')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>

                                @if(auth()->user()->hasRole('Super Admin'))
                                    <div class="mb-4">
                                        <label class="flex items-start cursor-pointer">
                                            <input class="mt-1 mr-3" type="checkbox" wire:model="templateIsPublic" id="templatePublic">
                                            <div>
                                                <div class="flex items-center text-gray-700 dark:text-gray-300">
                                                    <i class="fa-solid fa-globe mr-2 text-gray-600 dark:text-gray-400"></i>
                                                    Make this template available to all users
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                @endif

                                <button type="submit"
                                        class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors">
                                    <i class="fa-solid fa-floppy-disk mr-1"></i>Save as Template
                                </button>
                            </form>
                        </div>
                    </div>
                @endif

                <!-- Existing Templates -->
                <div>
                    <h6 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">Available Templates</h6>

                    @if($templates->count() > 0)
                        <div class="space-y-3">
                            @foreach($templates as $template)
                                <div class="p-4 border border-gray-200 dark:border-gray-700 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                    <div class="flex justify-between items-start">
                                        <div class="flex-1">
                                            <div class="flex items-center mb-2">
                                                <h6 class="text-base font-semibold text-gray-900 dark:text-white mr-2">
                                                    {{ $template->name }}
                                                </h6>
                                                @if($template->is_public)
                                                    <span class="inline-flex items-center px-2 py-1 rounded text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                                        <i class="fa-solid fa-globe mr-1"></i>Public
                                                    </span>
                                                @endif
                                            </div>
                                            
                                            @if($template->category)
                                                <span class="inline-block px-2 py-1 mb-2 rounded text-xs font-medium" style="background-color: {{ $template->category->color }}; color: white;">
                                                    {{ $template->category->name }}
                                                </span>
                                            @endif
                                            
                                            @if($template->title)
                                                <p class="mb-1 text-sm text-gray-600 dark:text-gray-400">
                                                    <strong class="text-gray-700 dark:text-gray-300">Title:</strong> {{ Str::limit($template->title, 50) }}
                                                </p>
                                            @endif
                                            
                                            @if($template->content)
                                                <p class="mb-1 text-sm text-gray-600 dark:text-gray-400">
                                                    {{ Str::limit($template->content, 100) }}
                                                </p>
                                            @endif
                                            
                                            @if($template->user_id !== auth()->id())
                                                <div class="flex items-center mt-2 text-sm text-gray-500 dark:text-gray-400">
                                                    <i class="fa-solid fa-user mr-1"></i>
                                                    by {{ $template->user->name }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="flex flex-col space-y-2 ml-4">
                                            <button type="button"
                                                    wire:click="createFromTemplate({{ $template->id }})"
                                                    class="px-3 py-1.5 border border-blue-600 text-blue-600 hover:bg-blue-50 dark:text-blue-400 dark:border-blue-400 dark:hover:bg-blue-900/30 font-medium rounded-lg text-sm transition-colors">
                                                <i class="fa-solid fa-plus-circle mr-1"></i>Use
                                            </button>
                                            @if($template->user_id === auth()->id())
                                                <button type="button"
                                                        wire:click="deleteTemplate({{ $template->id }})"
                                                        wire:confirm="Delete this template?"
                                                        class="px-3 py-1.5 border border-red-600 text-red-600 hover:bg-red-50 dark:text-red-400 dark:border-red-400 dark:hover:bg-red-900/30 font-medium rounded-lg text-sm transition-colors">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="p-4 bg-blue-50 dark:bg-blue-900/30 border border-blue-200 dark:border-blue-800 rounded-lg">
                            <div class="flex items-center text-blue-800 dark:text-blue-300">
                                <i class="fa-solid fa-circle-info mr-2 flex-shrink-0"></i>
                                <div>
                                    <p class="font-medium">No templates available</p>
                                    <p class="text-sm text-blue-700 dark:text-blue-400">Create logs and save them as templates for reuse!</p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="flex justify-end p-6 border-t border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900">
                <button type="button"
                        wire:click="closeTemplateModal"
                        class="px-4 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 font-medium rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                        <i class="fa-solid fa-xmark mr-1"></i>Close
                </button>
            </div>
        </div>
    </div>
</div>