<div class="container mx-auto p-6">
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg">
        <!-- Header -->
        <div class="border-b border-gray-200 dark:border-gray-700 p-6">
            <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-100">Document Management System</h2>
            <p class="text-gray-600 dark:text-gray-400 mt-2">Upload, organize, and manage your documents</p>
        </div>

        <!-- Flash Messages -->
        @if (session()->has('message'))
            <div class="mx-6 mt-4 bg-green-100 dark:bg-green-900 border border-green-400 dark:border-green-600 text-green-700 dark:text-green-200 px-4 py-3 rounded relative">
                <span class="block sm:inline">{{ session('message') }}</span>
            </div>
        @endif

        @if (session()->has('error'))
            <div class="mx-6 mt-4 bg-red-100 dark:bg-red-900 border border-red-400 dark:border-red-600 text-red-700 dark:text-red-200 px-4 py-3 rounded relative">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        <div class="p-6">
            <!-- Upload Section -->
            <div class="mb-8 bg-gray-50 dark:bg-gray-700 rounded-lg p-6 border-2 border-dashed border-gray-300 dark:border-gray-600">
                <h3 class="text-lg font-semibold mb-4 text-gray-700 dark:text-gray-200">Upload Documents</h3>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Uploading to: <span class="font-bold text-blue-600 dark:text-blue-400">{{ $currentFolder }}</span>
                    </label>

                    <div class="mt-2">
                        <label for="file-upload"
                               id="drop-zone"
                               class="relative cursor-pointer bg-white dark:bg-gray-800 rounded-lg border-2 border-dashed border-gray-300 dark:border-gray-600 p-6 hover:border-blue-500 dark:hover:border-blue-400 transition block">
                            <div class="text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400 dark:text-gray-500" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="mt-4 flex justify-center text-sm leading-6 text-gray-600 dark:text-gray-400">
                                    <span class="font-semibold text-blue-600 dark:text-blue-400">Click to upload</span>
                                    <span class="pl-1">or drag and drop</span>
                                </div>
                                <p class="text-xs leading-5 text-gray-600 dark:text-gray-500 mt-2">
                                    PDF, DOC, DOCX, XLS, XLSX, TXT, JPG, PNG, ZIP up to 100MB
                                </p>
                                <p class="text-xs leading-5 text-gray-600 dark:text-gray-500">
                                    Multiple files supported
                                </p>
                            </div>
                            <input
                                id="file-upload"
                                type="file"
                                wire:model="uploads"
                                multiple
                                accept=".pdf,.doc,.docx,.xls,.xlsx,.txt,.jpg,.jpeg,.png,.gif,.zip"
                                class="sr-only"
                            >
                        </label>
                    </div>

                    <!-- Show selected files -->
                    @if($uploads)
                        <div class="mt-4 space-y-2">
                            <p class="text-sm font-medium text-gray-700 dark:text-gray-300">
                                Selected {{ count($uploads) }} file(s):
                            </p>
                            @foreach($uploads as $index => $upload)
                                <div class="flex items-center justify-between p-3 bg-white dark:bg-gray-800 rounded border border-gray-200 dark:border-gray-600">
                                    <div class="flex items-center flex-1 min-w-0">
                                        <svg class="w-5 h-5 text-blue-500 dark:text-blue-400 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="text-sm text-gray-700 dark:text-gray-300 truncate">{{ $upload->getClientOriginalName() }}</span>
                                    </div>
                                    <span class="text-xs text-gray-500 dark:text-gray-400 ml-2 flex-shrink-0">
                                        {{ number_format($upload->getSize() / 1024, 2) }} KB
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <!-- Upload progress -->
                    <div wire:loading wire:target="uploads" class="mt-4">
                        <div class="bg-blue-50 dark:bg-blue-900/30 border border-blue-200 dark:border-blue-800 rounded-lg p-4">
                            <div class="flex items-center">
                                <svg class="animate-spin h-5 w-5 text-blue-600 dark:text-blue-400 mr-3" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                <span class="text-sm font-medium text-blue-800 dark:text-blue-300">Processing files...</span>
                            </div>
                        </div>
                    </div>

                    @error('uploads.*')
                    <span class="text-red-500 dark:text-red-400 text-sm mt-2 block">{{ $message }}</span>
                    @enderror
                </div>

                <button
                    wire:click="save"
                    wire:loading.attr="disabled"
                    wire:target="save,uploads"
                    type="button"
                    @disabled(!$uploads)
                    class="bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white font-semibold py-2 px-6 rounded-lg shadow disabled:opacity-50 disabled:cursor-not-allowed transition">

                    <span wire:loading.remove wire:target="save">
                        <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                        </svg>
                        Upload Files
                    </span>
                    <span wire:loading wire:target="save">
                        <svg class="animate-spin inline-block w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Uploading...
                    </span>
                </button>
            </div>

            <!-- Folder Management -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                <!-- Folder List -->
                <div class="lg:col-span-1 bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                    <h3 class="text-lg font-semibold mb-4 text-gray-700 dark:text-gray-200">Folders</h3>

                    <!-- Create New Folder -->
                    <div class="mb-4">
                        <div class="flex gap-2">
                            <input
                                type="text"
                                wire:model="newFolderName"
                                placeholder="New folder name"
                                class="flex-1 rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm"
                            >
                            <button
                                wire:click="createFolder"
                                class="bg-green-600 hover:bg-green-700 dark:bg-green-500 dark:hover:bg-green-600 text-white px-4 py-2 rounded-md text-sm font-medium whitespace-nowrap">
                                Create
                            </button>
                        </div>
                        @error('newFolderName')
                        <span class="text-red-500 dark:text-red-400 text-xs mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Folder List -->
                    <div class="space-y-2 max-h-96 overflow-y-auto">
                        @foreach($folders as $folder)
                            <div class="flex items-center justify-between p-3 rounded-lg transition {{ $currentFolder === $folder ? 'bg-blue-100 dark:bg-blue-900 border-2 border-blue-500 dark:border-blue-400' : 'bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-600' }}">
                                <button
                                    wire:click="$set('currentFolder', '{{ $folder }}')"
                                    class="flex-1 text-left font-medium text-gray-700 dark:text-gray-200 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-yellow-500 dark:text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2 6a2 2 0 012-2h5l2 2h5a2 2 0 012 2v6a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"></path>
                                    </svg>
                                    {{ $folder }}
                                </button>
                                @if($folder !== 'pending')
                                    <button
                                        wire:click="deleteFolder('{{ $folder }}')"
                                        onclick="return confirm('Are you sure you want to delete this folder?')"
                                        class="text-red-600 dark:text-red-400 hover:text-red-800 dark:hover:text-red-300 ml-2">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- File Browser -->
                <div class="lg:col-span-2">
                    <!-- Controls -->
                    <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-4 mb-4">
                        <div class="flex flex-col lg:flex-row gap-4 items-start lg:items-center justify-between">
                            <!-- Search -->
                            <div class="flex-1 w-full lg:w-auto">
                                <input
                                    type="text"
                                    wire:model.live.debounce.300ms="searchTerm"
                                    placeholder="Search files..."
                                    class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm"
                                >
                            </div>

                            <!-- Selection Actions -->
                            <div class="flex gap-2 flex-wrap">
                                <button
                                    wire:click="selectAll"
                                    class="bg-gray-600 hover:bg-gray-700 dark:bg-gray-500 dark:hover:bg-gray-600 text-white px-3 py-2 rounded-md text-sm font-medium">
                                    Select All
                                </button>
                                <button
                                    wire:click="deselectAll"
                                    class="bg-gray-600 hover:bg-gray-700 dark:bg-gray-500 dark:hover:bg-gray-600 text-white px-3 py-2 rounded-md text-sm font-medium">
                                    Deselect All
                                </button>
                            </div>
                        </div>

                        <!-- Bulk Actions -->
                        @if(count($selectedFiles) > 0)
                            <div class="mt-4 p-4 bg-blue-50 dark:bg-blue-900/30 rounded-lg border border-blue-200 dark:border-blue-800">
                                <p class="text-sm font-medium text-blue-800 dark:text-blue-300 mb-3">
                                    {{ count($selectedFiles) }} file(s) selected
                                </p>
                                <div class="flex gap-2 flex-wrap">
                                    <select
                                        wire:model="moveToFolder"
                                        class="rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                                        <option value="">-- Move to folder --</option>
                                        @foreach($folders as $folder)
                                            @if($folder !== $currentFolder)
                                                <option value="{{ $folder }}">{{ $folder }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <button
                                        wire:click="moveSelectedFiles"
                                        class="bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white px-4 py-2 rounded-md text-sm font-medium">
                                        Move Files
                                    </button>
                                    <button
                                        wire:click="deleteSelectedFiles"
                                        onclick="return confirm('Are you sure you want to delete selected files?')"
                                        class="bg-red-600 hover:bg-red-700 dark:bg-red-500 dark:hover:bg-red-600 text-white px-4 py-2 rounded-md text-sm font-medium">
                                        Delete Selected
                                    </button>
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- File List -->
                    <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700">
                        @if(count($uploadedFiles) > 0)
                            <!-- Table Header -->
                            <div class="grid grid-cols-12 gap-4 p-4 bg-gray-50 dark:bg-gray-700 border-b border-gray-200 dark:border-gray-600 font-semibold text-sm text-gray-700 dark:text-gray-200">
                                <div class="col-span-1">
                                    <input type="checkbox" class="rounded dark:bg-gray-600 dark:border-gray-500">
                                </div>
                                <div class="col-span-5 cursor-pointer hover:text-blue-600 dark:hover:text-blue-400" wire:click="toggleSort('name')">
                                    Filename
                                    @if($sortBy === 'name')
                                        <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                                    @endif
                                </div>
                                <div class="col-span-2 cursor-pointer hover:text-blue-600 dark:hover:text-blue-400" wire:click="toggleSort('size')">
                                    Size
                                    @if($sortBy === 'size')
                                        <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                                    @endif
                                </div>
                                <div class="col-span-2 cursor-pointer hover:text-blue-600 dark:hover:text-blue-400" wire:click="toggleSort('date')">
                                    Modified
                                    @if($sortBy === 'date')
                                        <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                                    @endif
                                </div>
                                <div class="col-span-2 text-center">Actions</div>
                            </div>

                            <!-- File Rows -->
                            <div class="divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach($uploadedFiles as $file)
                                    <div class="grid grid-cols-12 gap-4 p-4 hover:bg-gray-50 dark:hover:bg-gray-700 transition items-center {{ in_array($file['path'], $selectedFiles) ? 'bg-blue-50 dark:bg-blue-900/30' : '' }}">
                                        <div class="col-span-1">
                                            <input type="checkbox" wire:click="toggleFileSelection('{{ $file['path'] }}')" {{ in_array($file['path'], $selectedFiles) ? 'checked' : '' }} class="rounded border-gray-300 dark:border-gray-600 dark:bg-gray-700">
                                        </div>
                                        <div class="col-span-5 flex items-center">
                                            @php
                                                $iconColor = match($file['extension']) {
                                                    'pdf' => 'text-red-500 dark:text-red-400',
                                                    'doc', 'docx' => 'text-blue-500 dark:text-blue-400',
                                                    'xls', 'xlsx' => 'text-green-500 dark:text-green-400',
                                                    'jpg', 'jpeg', 'png' => 'text-purple-500 dark:text-purple-400',
                                                    'zip' => 'text-yellow-500 dark:text-yellow-400',
                                                    default => 'text-gray-500 dark:text-gray-400',
                                                };
                                            @endphp
                                            <svg class="w-6 h-6 mr-3 {{ $iconColor }} flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"></path>
                                            </svg>
                                            <span class="text-sm font-medium text-gray-700 dark:text-gray-200 truncate" title="{{ $file['name'] }}">{{ $file['name'] }}</span>
                                        </div>
                                        <div class="col-span-2 text-sm text-gray-600 dark:text-gray-400">
                                            {{ number_format($file['size'] / 1024, 2) }} KB
                                        </div>
                                        <div class="col-span-2 text-sm text-gray-600 dark:text-gray-400">
                                            {{ date('Y-m-d H:i', $file['modified']) }}
                                        </div>
                                        <div class="col-span-2 flex justify-center gap-2">
                                            <a href="{{ route('admin.download.document', ['path' => base64_encode($file['path'])]) }}" class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300" title="Download">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                                </svg>
                                            </a>
                                            <button wire:click="toggleFileSelection('{{ $file['path'] }}')" type="button" class="text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-300" title="Select">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="p-12 text-center text-gray-500 dark:text-gray-400">
                                <svg class="w-16 h-16 mx-auto mb-4 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <p class="text-lg font-medium">No files in this folder</p>
                                <p class="text-sm mt-2">Upload some documents to get started</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
        <style>
            .sr-only {
                position: absolute;
                width: 1px;
                height: 1px;
                padding: 0;
                margin: -1px;
                overflow: hidden;
                clip: rect(0, 0, 0, 0);
                white-space: nowrap;
                border-width: 0;
            }

            .dark input[type="file"]::file-selector-button {
                background-color: #4b5563;
                color: #f3f4f6;
                border: 1px solid #6b7280;
            }
        </style>
    @endpush

    @push('scripts')
        <script>
            function applyDarkMode() {
                const fluxTheme = localStorage.getItem('flux:appearance');
                const isDark = fluxTheme === 'dark';

                if (isDark) {
                    document.documentElement.classList.add('dark');
                } else {
                    document.documentElement.classList.remove('dark');
                }
            }

            applyDarkMode();

            window.addEventListener('storage', function(e) {
                if (e.key === 'flux:appearance') {
                    applyDarkMode();
                }
            });

            document.addEventListener('livewire:navigated', applyDarkMode);

            document.addEventListener('DOMContentLoaded', function() {
                const dropZone = document.getElementById('drop-zone');
                const fileInput = document.getElementById('file-upload');

                if (dropZone && fileInput) {
                    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                        dropZone.addEventListener(eventName, preventDefaults, false);
                        document.body.addEventListener(eventName, preventDefaults, false);
                    });

                    function preventDefaults(e) {
                        e.preventDefault();
                        e.stopPropagation();
                    }

                    ['dragenter', 'dragover'].forEach(eventName => {
                        dropZone.addEventListener(eventName, highlight, false);
                    });

                    ['dragleave', 'drop'].forEach(eventName => {
                        dropZone.addEventListener(eventName, unhighlight, false);
                    });

                    function highlight(e) {
                        dropZone.classList.add('border-blue-500', 'dark:border-blue-400', 'bg-blue-50', 'dark:bg-blue-900');
                    }

                    function unhighlight(e) {
                        dropZone.classList.remove('border-blue-500', 'dark:border-blue-400', 'bg-blue-50', 'dark:bg-blue-900');
                    }

                    dropZone.addEventListener('drop', handleDrop, false);

                    function handleDrop(e) {
                        const dt = e.dataTransfer;
                        const files = dt.files;

                        fileInput.files = files;

                        const event = new Event('change', { bubbles: true });
                        fileInput.dispatchEvent(event);
                    }
                }
            });
        </script>
    @endpush
</div>
