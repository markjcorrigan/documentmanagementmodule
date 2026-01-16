{{-- resources/views/livewire/logs/partials/log-modal.blade.php --}}
<div x-data="{ show: @entangle('showModal') }"
     x-show="show"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     class="fixed inset-0 z-[60] overflow-y-auto"
     aria-labelledby="modal-title"
     role="dialog"
     aria-modal="true"
     style="display: none;">

    <!-- Backdrop -->
    <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity"></div>

    <!-- Modal Container -->
    <div class="flex min-h-screen items-center justify-center p-4">
        <!-- Modal Panel -->
        <div @click.away="$wire.closeModal()"
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
                    <i class="fa-solid fa-{{ $isEditing ? 'pencil' : 'plus-circle' }} mr-2 text-gray-600 dark:text-gray-400 text-lg"></i>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        {{ $isEditing ? 'Edit Log' : 'Create New Log' }}
                    </h3>
                </div>
                <button wire:click="closeModal"
                        class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 rounded-lg p-2 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                    <i class="fa-solid fa-xmark text-xl"></i>
                </button>
            </div>

            <!-- Loading Overlay -->
            <div wire:loading wire:target="images,documents"
                 class="absolute inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-xl">
                    <div class="flex flex-col items-center">
                        <div class="w-16 h-16 border-4 border-blue-600 border-t-transparent rounded-full animate-spin"></div>
                        <p class="mt-4 font-medium text-gray-700 dark:text-gray-300">Uploading files...</p>
                    </div>
                </div>
            </div>

            <form wire:submit.prevent="save">
                <div class="p-6 max-h-[70vh] overflow-y-auto">
                    {{-- Title --}}
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Title <span class="text-red-500">*</span>
                        </label>
                        <input type="text"
                               wire:model="title"
                               class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('title') border-red-500 @enderror"
                               placeholder="Enter log title"
                               autofocus>
                        @error('title')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Category and Pin --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Category</label>
                            <select wire:model="logCategoryId"
                                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                                <option value="">No Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex items-center">
                            <label class="flex items-center cursor-pointer">
                                <input class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                       type="checkbox"
                                       wire:model="isPinned"
                                       id="pinCheck">
                                <span class="ml-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                                    <i class="fa-solid fa-thumbtack mr-1"></i>Pin This Log
                                </span>
                            </label>
                        </div>
                    </div>

                    {{-- Content --}}
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Content</label>
                        <textarea wire:model="content"
                                  class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors resize-none"
                                  rows="6"
                                  placeholder="Enter your log content..."></textarea>
                    </div>

                    {{-- Tags Section --}}
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fa-solid fa-tags mr-1"></i>Tags
                        </label>

                        {{-- Selected Tags --}}
                        <div class="flex flex-wrap gap-2 mb-3">
                            @foreach($tags as $tag)
                                @if(in_array($tag->id, $selectedTags))
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300">
                                        {{ $tag->name }}
                                        <button type="button"
                                                wire:click="removeTag({{ $tag->id }})"
                                                class="ml-1.5 text-gray-500 hover:text-gray-700 dark:hover:text-gray-400">
                                            <i class="fa-solid fa-circle-xmark"></i>
                                        </button>
                                    </span>
                                @endif
                            @endforeach
                        </div>

                        {{-- Add New Tag --}}
                        <div class="flex mb-3">
                            <input type="text"
                                   wire:model="newTag"
                                   wire:keydown.enter.prevent="addTag"
                                   class="flex-1 px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-l-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                   placeholder="Add a tag...">
                            <button type="button"
                                    wire:click="addTag"
                                    class="px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white font-medium rounded-r-lg transition-colors">
                                <i class="fa-solid fa-plus mr-1"></i>Add
                            </button>
                        </div>

                        {{-- Available Tags --}}
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mb-2">Quick add:</p>
                            <div class="flex flex-wrap gap-2">
                                @foreach($tags as $tag)
                                    @if(!in_array($tag->id, $selectedTags))
                                        <button type="button"
                                                wire:click="$set('selectedTags.{{ count($selectedTags) }}', {{ $tag->id }})"
                                                class="px-3 py-1 bg-gray-50 hover:bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 rounded-full text-sm font-medium transition-colors">
                                            {{ $tag->name }}
                                        </button>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>

                    {{-- Image Upload --}}
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fa-solid fa-image mr-1"></i>Images
                        </label>
                        <input type="file"
                               wire:model="images"
                               multiple
                               accept="image/*"
                               class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 dark:file:bg-blue-900 dark:file:text-blue-200">
                        @error('images.*')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Max 5MB per image</p>

                        {{-- Image Preview for New Uploads --}}
                        @if($images)
                            <div class="mt-3 grid grid-cols-4 gap-2">
                                @foreach($images as $image)
                                    <div class="relative">
                                        <img src="{{ $image->temporaryUrl() }}"
                                             class="w-full h-24 object-cover rounded-lg border border-gray-200 dark:border-gray-700">
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    {{-- Document Upload --}}
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fa-solid fa-file mr-1"></i>Documents
                        </label>
                        <input type="file"
                               wire:model="documents"
                               multiple
                               accept=".pdf,.doc,.docx,.xls,.xlsx,.txt,.ppt,.pptx"
                               class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 dark:file:bg-blue-900 dark:file:text-blue-200">
                        @error('documents.*')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Max 10MB per document (PDF, DOC, XLS, TXT, PPT)</p>
                    </div>

                    {{-- Existing Attachments --}}
                    @if($isEditing && $uploadedFiles->count() > 0)
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Existing Attachments</label>
                            <div class="space-y-2">
                                @foreach($uploadedFiles as $file)
                                    <div class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                        <div class="flex items-center">
                                            <div class="mr-3 p-2 bg-gray-100 dark:bg-gray-600 rounded">
                                                <i class="fa-solid fa-{{ $file->isImage() ? 'image' : 'file' }} text-gray-600 dark:text-gray-400"></i>
                                            </div>
                                            <div>
                                                <div class="font-medium text-gray-900 dark:text-white">{{ $file->filename }}</div>
                                                <div class="text-sm text-gray-500 dark:text-gray-400">{{ $file->formatted_size }}</div>
                                            </div>
                                        </div>
                                        <div class="flex space-x-2">
                                            @if($file->isImage())
                                                <button type="button"
                                                        wire:click="previewFile({{ $file->id }})"
                                                        class="p-2 text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 hover:bg-blue-50 dark:hover:bg-blue-900/30 rounded-lg transition-colors">
                                                    <i class="fa-solid fa-eye"></i>
                                                </button>
                                            @endif
                                            <button type="button"
                                                    wire:click="deleteAttachment({{ $file->id }})"
                                                    wire:confirm="Delete this file?"
                                                    class="p-2 text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300 hover:bg-red-50 dark:hover:bg-red-900/30 rounded-lg transition-colors">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- Save as Template Option --}}
                    @if($isEditing || ($title && $content))
                        <div class="p-4 bg-blue-50 dark:bg-blue-900/30 border border-blue-200 dark:border-blue-800 rounded-lg flex justify-between items-center">
                            <div class="flex items-center text-blue-800 dark:text-blue-300">
                                <i class="fa-solid fa-circle-info mr-2"></i>
                                <span>Want to reuse this log structure?</span>
                            </div>
                            <button type="button"
                                    wire:click="openTemplateModal({{ $logId ?? 'null' }})"
                                    class="px-4 py-2 border border-blue-600 text-blue-600 hover:bg-blue-50 dark:text-blue-400 dark:border-blue-400 dark:hover:bg-blue-900/30 font-medium rounded-lg text-sm transition-colors">
                                Save as Template
                            </button>
                        </div>
                    @endif
                </div>

                <!-- Modal Footer -->
                <div class="flex justify-end space-x-3 p-6 border-t border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900">
                    <button type="button"
                            wire:click="closeModal"
                            class="px-4 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 font-medium rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                        <i class="fa-solid fa-xmark mr-1"></i>Cancel
                    </button>
                    <button type="submit"
                            class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors disabled:opacity-50 disabled:cursor-not-allowed"
                            wire:loading.attr="disabled"
                            wire:target="images,documents,save">
                        <span wire:loading.remove wire:target="save">
                            <i class="fa-solid fa-{{ $isEditing ? 'check' : 'plus' }} mr-1"></i>
                            {{ $isEditing ? 'Update Log' : 'Create Log' }}
                        </span>
                        <span wire:loading wire:target="save" class="flex items-center">
                            <svg class="animate-spin h-4 w-4 mr-2" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" fill="none"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Saving...
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>