{{-- resources/views/livewire/notes/partials/template-modal.blade.php --}}
<div class="modal fade show d-block" tabindex="-1" style="background-color: rgba(0,0,0,0.5);">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="bi bi-file-text me-2"></i>Note Templates
                </h5>
                <button type="button" class="btn-close" wire:click="closeTemplateModal"></button>
            </div>

            <div class="modal-body">
                {{-- Create New Template Form --}}
                @if($title || $content)
                    <div class="card mb-4">
                        <div class="card-header bg-primary text-white">
                            <i class="bi bi-plus-circle me-2"></i>Save Current Note as Template
                        </div>
                        <div class="card-body">
                            <form wire:submit="saveAsTemplate">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">
                                        Template Name <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                           wire:model="templateName"
                                           class="form-control @error('templateName') is-invalid @enderror"
                                           placeholder="e.g., Meeting Notes, Daily Journal"
                                           required>
                                    @error('templateName')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                @if(auth()->user()->hasRole('Super Admin'))
                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input"
                                                   type="checkbox"
                                                   wire:model="templateIsPublic"
                                                   id="templatePublic">
                                            <label class="form-check-label" for="templatePublic">
                                                <i class="bi bi-globe me-1"></i>Make this template available to all users
                                            </label>
                                        </div>
                                    </div>
                                @endif

                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save me-1"></i>Save as Template
                                </button>
                            </form>
                        </div>
                    </div>
                @endif

                {{-- Existing Templates --}}
                <div>
                    <h6 class="fw-semibold mb-3">Available Templates</h6>

                    @if($templates->count() > 0)
                        <div class="list-group">
                            @foreach($templates as $template)
                                <div class="list-group-item">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1 fw-semibold">
                                                {{ $template->name }}
                                                @if($template->is_public)
                                                    <span class="badge bg-success">
                                                        <i class="bi bi-globe"></i> Public
                                                    </span>
                                                @endif
                                            </h6>
                                            @if($template->category)
                                                <span class="badge mb-2" style="background-color: {{ $template->category->color }}">
                                                    {{ $template->category->name }}
                                                </span>
                                            @endif
                                            @if($template->title)
                                                <p class="mb-1 text-muted small">
                                                    <strong>Title:</strong> {{ Str::limit($template->title, 50) }}
                                                </p>
                                            @endif
                                            @if($template->content)
                                                <p class="mb-1 text-muted small">
                                                    {{ Str::limit($template->content, 100) }}
                                                </p>
                                            @endif
                                            @if($template->user_id !== auth()->id())
                                                <small class="text-muted">
                                                    <i class="bi bi-person me-1"></i>by {{ $template->user->name }}
                                                </small>
                                            @endif
                                        </div>
                                        <div class="btn-group-vertical ms-3">
                                            <button type="button"
                                                    wire:click="createFromTemplate({{ $template->id }})"
                                                    class="btn btn-sm btn-outline-primary">
                                                <i class="bi bi-plus-circle"></i> Use
                                            </button>
                                            @if($template->user_id === auth()->id())
                                                <button type="button"
                                                        wire:click="deleteTemplate({{ $template->id }})"
                                                        wire:confirm="Delete this template?"
                                                        class="btn btn-sm btn-outline-danger">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="alert alert-info">
                            <i class="bi bi-info-circle me-2"></i>
                            No templates available. Create notes and save them as templates for reuse!
                        </div>
                    @endif
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" wire:click="closeTemplateModal">
                    <i class="bi bi-x-lg me-1"></i>Close
                </button>
            </div>
        </div>
    </div>
</div>
