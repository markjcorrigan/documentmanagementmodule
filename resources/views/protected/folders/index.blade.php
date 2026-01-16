@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Protected Storage Folders</h3>
                    <div class="card-tools">
                        <a href="{{ route('protectedstorage.index') }}" class="btn btn-sm btn-secondary">
                            <i class="fas fa-file"></i> View All Files
                        </a>
                        <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#createFolderModal">
                            <i class="fas fa-plus"></i> New Folder
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <!-- Search Form -->
                    <form method="GET" action="{{ route('protectedstorage.folders.index') }}" class="mb-3">
                        <div class="row">
                            <div class="col-md-8">
                                <input type="text" name="search" class="form-control" placeholder="Search folders..." value="{{ request('search') }}">
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <input type="text" name="resource" class="form-control" placeholder="Filter by resource..." value="{{ request('resource') }}">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                        <a href="{{ route('protectedstorage.folders.index') }}" class="btn btn-secondary">Clear</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show">
                            {{ session('error') }}
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                        </div>
                    @endif

                    <!-- Folders Grid -->
                    <div class="row">
                        @forelse($folders as $folder)
                            <div class="col-md-3 col-sm-6 mb-4">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div class="text-center mb-3">
                                            <i class="fas fa-folder fa-4x text-warning"></i>
                                        </div>
                                        <h5 class="card-title text-center">{{ $folder->name }}</h5>
                                        <p class="card-text text-center text-muted small">
                                            <i class="fas fa-file"></i> {{ $folder->file_count }} files<br>
                                            <i class="fas fa-folder"></i> {{ $folder->subfolder_count }} subfolders
                                        </p>
                                        @if($folder->resource)
                                            <p class="card-text text-center">
                                                <span class="badge badge-primary">{{ $folder->resource }}</span>
                                            </p>
                                        @endif
                                    </div>
                                    <div class="card-footer">
                                        <div class="btn-group btn-group-sm w-100">
                                            <a href="{{ route('protectedstorage.folders.show', $folder->id) }}" class="btn btn-primary" title="Open">
                                                <i class="fas fa-folder-open"></i>
                                            </a>
                                            <a href="{{ route('protectedstorage.folders.edit', $folder->id) }}" class="btn btn-warning" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('protectedstorage.folders.scan', $folder->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-info btn-sm" title="Scan">
                                                    <i class="fas fa-sync"></i>
                                                </button>
                                            </form>
                                            <form action="{{ route('protectedstorage.folders.destroy', $folder->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure? This will delete the folder and all its contents!');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <div class="alert alert-info text-center">
                                    No folders found. Create a new folder or run the sync command.
                                </div>
                            </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center">
                        {{ $folders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Create Folder Modal -->
<div class="modal fade" id="createFolderModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('protectedstorage.folders.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Create New Folder</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Folder Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="parent_path">Parent Path (optional)</label>
                        <input type="text" class="form-control" id="parent_path" name="parent_path" placeholder="Leave empty for root level">
                        <small class="form-text text-muted">Example: scientology or scientology/subfolder</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Create Folder</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
