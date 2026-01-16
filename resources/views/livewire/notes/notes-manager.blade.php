{{-- resources/views/livewire/notes/notes-manager.blade.php --}}
<div class="container-fluid py-4">
    {{-- Header --}}
    <div class="mb-4">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="h2 fw-bold mb-0">
                <i class="bi bi-journal-text me-2"></i>My Notes
            </h1>
            <div class="btn-group">
                <button wire:click="openCreateModal" class="btn btn-primary">
                    <i class="bi bi-plus-lg me-1"></i>New Note
                </button>
                <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">
                    <span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    @foreach($templates as $template)
                        <li>
                            <a class="dropdown-item" wire:click="createFromTemplate({{ $template->id }})" href="javascript:void(0)">
                                <i class="bi bi-file-text me-2"></i>{{ $template->name }}
                            </a>
                        </li>
                    @endforeach
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item" wire:click="openTemplateModal" href="javascript:void(0)">
                            <i class="bi bi-plus-circle me-2"></i>Manage Templates
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    {{-- Flash Message --}}
    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i>{{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Search and Filters --}}
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <div class="row g-3">
                {{-- Search --}}
                <div class="col-md-4">
                    <label class="form-label fw-semibold">
                        <i class="bi bi-search me-1"></i>Search
                    </label>
                    <input type="text"
                           wire:model.live.debounce.300ms="searchTerm"
                           class="form-control"
                           placeholder="Search notes...">
                </div>

                {{-- Category Filter --}}
                <div class="col-md-3">
                    <label class="form-label fw-semibold">
                        <i class="bi bi-folder me-1"></i>Category
                    </label>
                    <select wire:model.live="filterCategory" class="form-select">
                        <option value="">All Categories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }} ({{ $category->notes_count }})</option>
                        @endforeach
                    </select>
                </div>

                {{-- Tag Filter --}}
                <div class="col-md-3">
                    <label class="form-label fw-semibold">
                        <i class="bi bi-tags me-1"></i>Tag
                    </label>
                    <select wire:model.live="filterTag" class="form-select">
                        <option value="">All Tags</option>
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- View Type --}}
                <div class="col-md-2">
                    <label class="form-label fw-semibold">
                        <i class="bi bi-eye me-1"></i>View
                    </label>
                    <select wire:model.live="viewType" class="form-select">
                        <option value="all">All Notes</option>
                        <option value="own">My Notes</option>
                        <option value="shared">Shared with Me</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    {{-- Notes Grid --}}
    <div class="row g-4">
        @forelse($notes as $note)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm hover-shadow-lg transition">
                    <div class="card-body">
                        {{-- Header with Pin --}}
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div class="flex-grow-1">
                                @if($note->category)
                                    <span class="badge mb-2" style="background-color: {{ $note->category->color }}">
                                        {{ $note->category->name }}
                                    </span>
                                @endif
                                @if($note->user_id !== auth()->id())
                                    <span class="badge bg-info mb-2">
                                        <i class="bi bi-share me-1"></i>Shared by {{ $note->user->name }}
                                    </span>
                                @endif
                            </div>
                            @if($note->is_pinned)
                                <i class="bi bi-pin-fill text-warning fs-5"></i>
                            @endif
                        </div>

                        {{-- Title --}}
                        <h5 class="card-title fw-bold mb-2">{{ $note->title }}</h5>

                        {{-- Content Preview --}}
                        @if($note->content)
                            <p class="card-text text-muted small mb-3" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                                {{ $note->content }}
                            </p>
                        @endif

                        {{-- Tags --}}
                        @if($note->tags->count() > 0)
                            <div class="mb-3">
                                @foreach($note->tags as $tag)
                                    <span class="badge bg-secondary me-1">
                                        <i class="bi bi-tag-fill me-1"></i>{{ $tag->name }}
                                    </span>
                                @endforeach
                            </div>
                        @endif

                        {{-- Attachments Preview --}}
                        @if($note->attachments->count() > 0)
                            <div class="d-flex gap-3 mb-3 text-muted small">
                                @if($note->images->count() > 0)
                                    <span>
                                        <i class="bi bi-image me-1"></i>{{ $note->images->count() }} image(s)
                                    </span>
                                @endif
                                @if($note->documents->count() > 0)
                                    <span>
                                        <i class="bi bi-file-earmark me-1"></i>{{ $note->documents->count() }} doc(s)
                                    </span>
                                @endif
                            </div>
                        @endif

                        {{-- Meta Info --}}
                        <div class="text-muted small mb-3">
                            <i class="bi bi-clock me-1"></i>{{ $note->created_at->diffForHumans() }}
                        </div>
                    </div>

                    {{-- Actions --}}
                    <div class="card-footer bg-transparent">
                        <div class="btn-group w-100" role="group">
                            <button wire:click="openEditModal({{ $note->id }})" class="btn btn-outline-primary btn-sm">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <button wire:click="togglePin({{ $note->id }})" class="btn btn-outline-secondary btn-sm">
                                <i class="bi bi-{{ $note->is_pinned ? 'pin-angle' : 'pin' }}"></i>
                            </button>
                            @can('share', $note)
                                <button wire:click="openShareModal({{ $note->id }})" class="btn btn-outline-info btn-sm">
                                    <i class="bi bi-share"></i>
                                </button>
                            @endcan
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-outline-success btn-sm dropdown-toggle" data-bs-toggle="dropdown">
                                    <i class="bi bi-download"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" wire:click="exportNote({{ $note->id }}, 'pdf')" href="javascript:void(0)">PDF</a></li>
                                    <li><a class="dropdown-item" wire:click="exportNote({{ $note->id }}, 'markdown')" href="javascript:void(0)">Markdown</a></li>
                                </ul>
                            </div>
                            @can('delete', $note)
                                <button wire:click="deleteNote({{ $note->id }})"
                                        wire:confirm="Are you sure you want to delete this note?"
                                        class="btn btn-outline-danger btn-sm">
                                    <i class="bi bi-trash"></i>
                                </button>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="text-center py-5">
                    <i class="bi bi-journal-x display-1 text-muted"></i>
                    <p class="lead text-muted mt-3">No notes found. Create your first note!</p>
                </div>
            </div>
        @endforelse
    </div>

    {{-- Pagination (Bootstrap 5) --}}
    <div class="mt-4">
        {{ $notes->links() }}
    </div>

    {{-- Create/Edit Modal --}}
    @if($showModal)
        @include('livewire.notes.partials.note-modal')
    @endif

    {{-- Share Modal --}}
    @if($showShareModal)
        @include('livewire.notes.partials.share-modal')
    @endif

    {{-- Template Modal --}}
    @if($showTemplateModal)
        @include('livewire.notes.partials.template-modal')
    @endif

    {{-- Preview Modal --}}
    @if($showPreviewModal)
        @include('livewire.notes.partials.preview-modal')
    @endif
</div>

@push('styles')
    <style>
        .hover-shadow-lg {
            transition: box-shadow 0.3s ease-in-out;
        }
        .hover-shadow-lg:hover {
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
        }
        .transition {
            transition: all 0.3s ease-in-out;
        }

        /* Dark mode support */
        [data-bs-theme="dark"] .card {
            background-color: #212529;
            border-color: #495057;
        }
        [data-bs-theme="dark"] .text-muted {
            color: #adb5bd !important;
        }
        [data-bs-theme="dark"] .card-footer {
            border-color: #495057;
        }
    </style>
@endpush
