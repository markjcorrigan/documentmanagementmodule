{{-- resources/views/livewire/notes/partials/preview-modal.blade.php --}}
<div class="modal fade show d-block" tabindex="-1" style="background-color: rgba(0,0,0,0.8);">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="bi bi-eye me-2"></i>{{ $previewFile->filename }}
                </h5>
                <button type="button" class="btn-close btn-close-white" wire:click="closePreviewModal"></button>
            </div>

            <div class="modal-body p-0 bg-dark">
                @if($previewFile->isImage())
                    {{-- Image Preview --}}
                    <div class="text-center p-4">
                        <img src="{{ $previewFile->url }}"
                             alt="{{ $previewFile->filename }}"
                             class="img-fluid"
                             style="max-height: 70vh; width: auto;">
                    </div>
                @elseif($previewFile->mime_type === 'application/pdf')
                    {{-- PDF Preview --}}
                    <iframe src="{{ $previewFile->url }}"
                            style="width: 100%; height: 70vh; border: none;">
                    </iframe>
                @else
                    {{-- Document Info --}}
                    <div class="text-center p-5 text-white">
                        <i class="bi bi-file-earmark-text display-1 mb-4"></i>
                        <h4>{{ $previewFile->filename }}</h4>
                        <p class="text-muted">{{ $previewFile->formatted_size }}</p>
                        <p class="text-muted">{{ $previewFile->mime_type }}</p>
                        <a href="{{ $previewFile->url }}"
                           download="{{ $previewFile->filename }}"
                           class="btn btn-primary mt-3">
                            <i class="bi bi-download me-2"></i>Download File
                        </a>
                    </div>
                @endif
            </div>

            <div class="modal-footer">
                <a href="{{ $previewFile->url }}"
                   download="{{ $previewFile->filename }}"
                   class="btn btn-success">
                    <i class="bi bi-download me-1"></i>Download
                </a>
                <a href="{{ $previewFile->url }}"
                   target="_blank"
                   class="btn btn-primary">
                    <i class="bi bi-box-arrow-up-right me-1"></i>Open in New Tab
                </a>
                <button type="button" class="btn btn-secondary" wire:click="closePreviewModal">
                    <i class="bi bi-x-lg me-1"></i>Close
                </button>
            </div>
        </div>
    </div>
</div>
