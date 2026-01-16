@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Protected Storage Files</h3>
                    <div class="card-tools">
                        <a href="{{ route('protectedstorage.folders.index') }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-folder"></i> Browse Folders
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <!-- Search Form -->
                    <form method="GET" action="{{ route('protectedstorage.index') }}" class="mb-3">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" name="search" class="form-control" placeholder="Search files..." value="{{ request('search') }}">
                            </div>
                            <div class="col-md-3">
                                <input type="text" name="resource" class="form-control" placeholder="Filter by resource..." value="{{ request('resource') }}">
                            </div>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <input type="text" name="extension" class="form-control" placeholder="Filter by extension..." value="{{ request('extension') }}">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                        <a href="{{ route('protectedstorage.index') }}" class="btn btn-secondary">Clear</a>
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

                    <!-- Files Table -->
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Resource</th>
                                    <th>Extension</th>
                                    <th>Size</th>
                                    <th>Modified</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($files as $file)
                                    <tr>
                                        <td>
                                            <i class="fas fa-file"></i>
                                            {{ $file->name }}
                                        </td>
                                        <td>{{ $file->resource ?? '-' }}</td>
                                        <td><span class="badge badge-info">{{ strtoupper($file->extension) }}</span></td>
                                        <td>{{ number_format($file->size / 1024, 2) }} KB</td>
                                        <td>{{ \Carbon\Carbon::parse($file->file_modified_at)->format('Y-m-d H:i') }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('protectedstorage.view', $file->id) }}" class="btn btn-sm btn-info" target="_blank" title="View">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('protectedstorage.download', $file->id) }}" class="btn btn-sm btn-success" title="Download">
                                                    <i class="fas fa-download"></i>
                                                </a>
                                                <a href="{{ route('protectedstorage.edit', $file->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('protectedstorage.destroy', $file->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this file?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No files found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center">
                        {{ $files->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
