<div>
    <form wire:submit.prevent="save" class="space-y-6">
        <!-- Document File Upload -->
        <div>
            <label for="documentFile" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                Document File @if(!$isEditMode)<span class="text-red-500">*</span>@endif
            </label>
            <input 
                type="file" 
                wire:model="documentFile" 
                id="documentFile"
                class="block w-full text-sm text-gray-900 dark:text-gray-300 border border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-700 focus:outline-none"
                @if(!$isEditMode) required @endif
            >
            @if($isEditMode && $document)
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    Current file: <strong>{{ $document->name }}</strong> (Leave empty to keep current file)
                </p>
            @endif
            @error('documentFile') 
                <span class="text-red-500 text-sm mt-1">{{ $message }}</span> 
            @enderror
            
            @if($documentFile)
                <div class="mt-2 text-sm text-green-600 dark:text-green-400">
                    <i class="fas fa-check-circle"></i> File selected: {{ $documentFile->getClientOriginalName() }}
                </div>
            @endif

            <div wire:loading wire:target="documentFile" class="mt-2 text-sm text-blue-600 dark:text-blue-400">
                <i class="fas fa-spinner fa-spin"></i> Uploading...
            </div>
        </div>

        <!-- Shortname -->
        <div>
            <label for="shortname" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                Shortname <span class="text-red-500">*</span>
            </label>
            <input 
                type="text" 
                wire:model="shortname" 
                id="shortname"
                maxlength="30"
                placeholder="Enter a unique shortname (max 30 characters)"
                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white"
                required
            >
            @error('shortname') 
                <span class="text-red-500 text-sm mt-1">{{ $message }}</span> 
            @enderror
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                A unique identifier for quick reference
            </p>
        </div>

        <!-- Description -->
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                Description
            </label>
            <textarea 
                wire:model="description" 
                id="description"
                rows="4"
                maxlength="1000"
                placeholder="Enter a description (optional)"
                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white"
            ></textarea>
            @error('description') 
                <span class="text-red-500 text-sm mt-1">{{ $message }}</span> 
            @enderror
        </div>

        <!-- File Type Info -->
        <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-4">
            <h4 class="text-sm font-medium text-blue-800 dark:text-blue-300 mb-2">
                <i class="fas fa-info-circle"></i> Supported File Types
            </h4>
            <div class="text-sm text-blue-700 dark:text-blue-400 grid grid-cols-2 md:grid-cols-4 gap-2">
                <div><strong>Documents:</strong> PDF, DOC, DOCX</div>
                <div><strong>Spreadsheets:</strong> XLS, XLSX, CSV</div>
                <div><strong>Presentations:</strong> PPT, PPTX</div>
                <div><strong>Images:</strong> JPG, PNG, GIF, SVG</div>
                <div><strong>Archives:</strong> ZIP, RAR</div>
                <div><strong>Text:</strong> TXT</div>
            </div>
            <p class="text-sm text-blue-700 dark:text-blue-400 mt-2">
                Maximum file size: 200MB
            </p>
        </div>

        <!-- Form Actions -->
        <div class="flex items-center justify-end space-x-4 pt-4 border-t border-gray-200 dark:border-gray-700">
            <a href="{{ route('documents.index') }}" 
               class="px-6 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                Cancel
            </a>
            <button 
                type="submit" 
                class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition disabled:opacity-50 disabled:cursor-not-allowed"
                wire:loading.attr="disabled"
                wire:target="save,documentFile"
            >
                <span wire:loading.remove wire:target="save">
                    @if($isEditMode)
                        <i class="fas fa-save"></i> Update Document
                    @else
                        <i class="fas fa-upload"></i> Upload Document
                    @endif
                </span>
                <span wire:loading wire:target="save">
                    <i class="fas fa-spinner fa-spin"></i> Processing...
                </span>
            </button>
        </div>
    </form>
</div>
