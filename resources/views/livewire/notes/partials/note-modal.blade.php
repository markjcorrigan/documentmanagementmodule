{{-- resources/views/livewire/notes/partials/note-modal.blade.php --}}
<div class="modal fade show d-block" tabindex="-1" style="background-color: rgba(0,0,0,0.5);">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="bi bi-{{ $isEditing ? 'pencil' : 'plus-circle' }} me-2"></i>
                    {{ $isEditing ? 'Edit Note' : 'Create New Note' }}
                </h5>
                <button type="button" class="btn-close" wire:click="closeModal"></button>
            </div>

            <form wire:submit.prevent="save">
                <div class="modal-body" style="max-height: 70vh; overflow-y: auto;">
                    {{-- Loading Overlay for File Uploads --}}
                    <div wire:loading wire:target="images,documents" class="position-fixed top-50 start-50 translate-middle" style="z-index: 9999;">
                        <div class="spinner-border text-primary" role="status" style="width: 4rem; height: 4rem;">
                            <span class="visually-hidden">Uploading...</span>
                        </div>
                        <div class="text-center mt-2 fw-bold text-primary">Uploading files...</div>
                    </div>

                    {{-- Title --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            Title <span class="text-danger">*</span>
                        </label>
                        <input type="text"
                               wire:model="title"
                               class="form-control @error('title') is-invalid @enderror"
                               placeholder="Enter note title"
                               autofocus>
                        @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Category and Pin --}}
                    <div class="row mb-3">
                        <div class="col-md-10">
                            <label class="form-label fw-semibold">Category</label>
                            <select wire:model="categoryId" class="form-select">
                                <option value="">No Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2 d-flex align-items-end">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" wire:model="isPinned" id="pinCheck">
                                <label class="form-check-label" for="pinCheck">
                                    <i class="bi bi-pin"></i> Pin
                                </label>
                            </div>
                        </div>
                    </div>

                    {{-- Content --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Content</label>
                        <textarea wire:model="content"
                                  class="form-control"
                                  rows="6"
                                  placeholder="Enter your note content..."></textarea>
                    </div>

                    {{-- Tags Section --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            <i class="bi bi-tags me-1"></i>Tags
                        </label>

                        {{-- Selected Tags --}}
                        <div class="mb-2">
                            @foreach($tags as $tag)
                                @if(in_array($tag->id, $selectedTags))
                                    <span class="badge bg-secondary me-1 mb-1">
                                        {{ $tag->name }}
                                        <i class="bi bi-x-circle ms-1" wire:click="removeTag({{ $tag->id }})" style="cursor: pointer;"></i>
                                    </span>
                                @endif
                            @endforeach
                        </div>

                        {{-- Add New Tag --}}
                        <div class="input-group">
                            <input type="text"
                                   wire:model="newTag"
                                   class="form-control"
                                   placeholder="Add a tag..."
                                   wire:keydown.enter.prevent="addTag">
                            <button type="button" class="btn btn-outline-secondary" wire:click="addTag">
                                <i class="bi bi-plus-lg"></i> Add
                            </button>
                        </div>

                        {{-- Available Tags --}}
                        <div class="mt-2">
                            <small class="text-muted">Quick add:</small>
                            @foreach($tags as $tag)
                                @if(!in_array($tag->id, $selectedTags))
                                    <span class="badge bg-light text-dark me-1 mb-1"
                                          wire:click="$set('selectedTags.{{ $loop->index }}', {{ $tag->id }})"
                                          style="cursor: pointer;">
                                        {{ $tag->name }}
                                    </span>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    {{-- Image Upload --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            <i class="bi bi-image me-1"></i>Images
                        </label>
                        <input type="file"
                               wire:model="images"
                               multiple
                               accept="image/*"
                               class="form-control @error('images.*') is-invalid @enderror">
                        @error('images.*')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Max 5MB per image</small>

                        {{-- Upload Progress --}}
                        <div wire:loading wire:target="images" class="mt-2">
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated"
                                     role="progressbar"
                                     style="width: 100%">
                                    Uploading images...
                                </div>
                            </div>
                        </div>

                        {{-- Image Preview for New Uploads --}}
                        @if($images)
                            <div class="mt-2">
                                <div class="row g-2">
                                    @foreach($images as $image)
                                        <div class="col-3">
                                            <img src="{{ $image->temporaryUrl() }}" class="img-thumbnail">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>

                    {{-- Document Upload --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            <i class="bi bi-file-earmark me-1"></i>Documents
                        </label>
                        <input type="file"
                               wire:model="documents"
                               multiple
                               accept=".pdf,.doc,.docx,.xls,.xlsx,.txt,.ppt,.pptx"
                               class="form-control @error('documents.*') is-invalid @enderror">
                        @error('documents.*')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Max 10MB per document (PDF, DOC, XLS, TXT, PPT)</small>

                        {{-- Upload Progress --}}
                        <div wire:loading wire:target="documents" class="mt-2">
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated"
                                     role="progressbar"
                                     style="width: 100%">
                                    Uploading documents...
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Existing Attachments --}}
                    @if($isEditing && $uploadedFiles->count() > 0)
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Existing Attachments</label>
                            <div class="list-group">
                                @foreach($uploadedFiles as $file)
                                    <div class="list-group-item d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-{{ $file->isImage() ? 'image' : 'file-earmark' }} me-2 fs-4"></i>
                                            <div>
                                                <div class="fw-semibold">{{ $file->filename }}</div>
                                                <small class="text-muted">{{ $file->formatted_size }}</small>
                                            </div>
                                        </div>
                                        <div class="btn-group">
                                            @if($file->isImage())
                                                <button type="button"
                                                        wire:click="previewFile({{ $file->id }})"
                                                        class="btn btn-sm btn-outline-primary">
                                                    <i class="bi bi-eye"></i>
                                                </button>
                                            @endif
                                            <button type="button"
                                                    wire:click="deleteAttachment({{ $file->id }})"
                                                    wire:confirm="Delete this file?"
                                                    class="btn btn-sm btn-outline-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- Save as Template Option --}}
                    @if($isEditing || ($title && $content))
                        <div class="alert alert-info d-flex justify-content-between align-items-center">
                            <span>
                                <i class="bi bi-info-circle me-2"></i>
                                Want to reuse this note structure?
                            </span>
                            <button type="button"
                                    class="btn btn-sm btn-outline-primary"
                                    wire:click="openTemplateModal({{ $noteId ?? 'null' }})">
                                Save as Template
                            </button>
                        </div>
                    @endif
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal">
                        <i class="bi bi-x-lg me-1"></i>Cancel
                    </button>
                    <button type="submit"
                            class="btn btn-primary"
                            wire:loading.attr="disabled"
                            wire:target="images,documents,save">
                        <span wire:loading.remove wire:target="save">
                            <i class="bi bi-{{ $isEditing ? 'check-lg' : 'plus-lg' }} me-1"></i>
                            {{ $isEditing ? 'Update Note' : 'Create Note' }}
                        </span>
                        <span wire:loading wire:target="save">
                            <span class="spinner-border spinner-border-sm me-1"></span>
                            Saving...
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('styles')
    <style>
        /* Ensure modal content is scrollable */
        .modal-dialog-scrollable .modal-body {
            overflow-y: auto;
        }

        /* Blur effect when uploading */
        [wire\:loading][wire\:target="images"],
        [wire\:loading][wire\:target="documents"] {
            opacity: 0.6;
            pointer-events: none;
        }
    </style>
@endpush
