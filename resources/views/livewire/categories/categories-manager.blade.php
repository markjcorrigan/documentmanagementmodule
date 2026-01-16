{{-- resources/views/livewire/categories/categories-manager.blade.php --}}
<div class="container-fluid py-4">
    {{-- Header --}}
    <div class="mb-4">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="h2 fw-bold mb-0">
                <i class="bi bi-folder2 me-2"></i>Categories
            </h1>
            <button wire:click="openCreateModal" class="btn btn-primary">
                <i class="bi bi-plus-lg me-1"></i>New Category
            </button>
        </div>
    </div>

    {{-- Flash Message --}}
    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i>{{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Categories Grid --}}
    <div class="row g-4">
        @forelse($categories as $category)
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 shadow-sm hover-shadow-lg transition">
                    {{-- Color Indicator --}}
                    <div class="card-header" style="background-color: {{ $category->color }}; height: 60px;">
                    </div>

                    <div class="card-body">
                        {{-- Category Name --}}
                        <h5 class="card-title fw-bold mb-2">{{ $category->name }}</h5>

                        {{-- Notes Count --}}
                        <p class="text-muted mb-0">
                            <i class="bi bi-journals me-1"></i>
                            {{ $category->notes_count }} {{ Str::plural('note', $category->notes_count) }}
                        </p>
                    </div>

                    <div class="card-footer bg-transparent">
                        <div class="btn-group w-100">
                            <button wire:click="openEditModal({{ $category->id }})"
                                    class="btn btn-outline-primary btn-sm">
                                <i class="bi bi-pencil"></i> Edit
                            </button>
                            <button wire:click="deleteCategory({{ $category->id }})"
                                    wire:confirm="Are you sure? Notes in this category will remain but lose their category."
                                    class="btn btn-outline-danger btn-sm">
                                <i class="bi bi-trash"></i> Delete
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="text-center py-5">
                    <i class="bi bi-folder-x display-1 text-muted"></i>
                    <p class="lead text-muted mt-3">No categories yet. Create your first one!</p>
                </div>
            </div>
        @endforelse
    </div>

    {{-- Pagination (Bootstrap 5) --}}
    <div class="mt-4">
        {{ $categories->links() }}
    </div>

    {{-- Create/Edit Modal --}}
    @if($showModal)
        <div class="modal fade show d-block" tabindex="-1" style="background-color: rgba(0,0,0,0.5);">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <i class="bi bi-{{ $isEditing ? 'pencil' : 'plus-circle' }} me-2"></i>
                            {{ $isEditing ? 'Edit Category' : 'Create New Category' }}
                        </h5>
                        <button type="button" class="btn-close" wire:click="closeModal"></button>
                    </div>

                    <form wire:submit="save">
                        <div class="modal-body">
                            {{-- Name --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    Category Name <span class="text-danger">*</span>
                                </label>
                                <input type="text"
                                       wire:model="name"
                                       class="form-control @error('name') is-invalid @enderror"
                                       placeholder="e.g., Work, Personal, Ideas"
                                       autofocus>
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Color Picker --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    Color <span class="text-danger">*</span>
                                </label>
                                <div class="row g-2">
                                    <div class="col-auto">
                                        <input type="color"
                                               wire:model.live="color"
                                               class="form-control form-control-color"
                                               style="width: 60px; height: 45px;">
                                    </div>
                                    <div class="col">
                                        <input type="text"
                                               wire:model.live="color"
                                               class="form-control @error('color') is-invalid @enderror"
                                               placeholder="#3b82f6">
                                        @error('color')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- Suggested Colors --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Quick Colors</label>
                                <div class="d-flex gap-2 flex-wrap">
                                    @foreach(['#3b82f6', '#ef4444', '#10b981', '#f59e0b', '#8b5cf6', '#ec4899', '#14b8a6', '#f97316'] as $suggestedColor)
                                        <button type="button"
                                                wire:click="$set('color', '{{ $suggestedColor }}')"
                                                class="btn btn-sm border"
                                                style="background-color: {{ $suggestedColor }}; width: 40px; height: 40px; {{ $color === $suggestedColor ? 'border: 3px solid #000 !important;' : '' }}">
                                        </button>
                                    @endforeach
                                </div>
                            </div>

                            {{-- Preview --}}
                            <div class="mb-0">
                                <label class="form-label fw-semibold">Preview</label>
                                <div class="card">
                                    <div class="card-header" style="background-color: {{ $color }}; height: 50px;"></div>
                                    <div class="card-body">
                                        <h6 class="mb-0">{{ $name ?: 'Category Name' }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" wire:click="closeModal">
                                <i class="bi bi-x-lg me-1"></i>Cancel
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-{{ $isEditing ? 'check-lg' : 'plus-lg' }} me-1"></i>
                                {{ $isEditing ? 'Update' : 'Create' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
