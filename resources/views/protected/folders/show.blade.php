@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-folder-open"></i> {{ $folder->name }}
                    </h3>
                    <div class="card-tools">
                        <form action="{{ route('protectedstorage.folders.scan', $folder->id) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-info">
                                <i class="fas fa-sync"></i> Scan Folder
                            </button>
                        </form>
                        <a href="{{ route('protectedstorage.folders.index') }}" class="btn btn-sm btn-secondary">
                            <i class="fas fa-arrow-left"></i> Back to Folders
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('protectedstorage.folders.index') }}">Root</a>
                            </li>
                            @if($parentFolder)
                                <li class="breadcrumb-item">
                                    <a href="{{ route('protectedstorage.folders.show', $parentFolder->id) }}">{{ $parentFolder->name }}</a>
                                </li>
                            @endif
                            <li class="breadcrumb-item active">{{ $folder->name }}</li>
                        </ol>
                    </nav>

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

                    <!-- Folder Info -->
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-info"><i class="fas fa-folder"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Folder Information</span>
                                    <span class="info-box-number">
                                        Path: {{ $folder->path }}
                                        @if($folder->resource)
                                            <span class="badge badge-primary ml-2">{{ $folder->resource }}</span>
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Subfolders Section -->
                    @if($subfolders->count() > 0)
                        <h4><i class="fas fa-folder"></i> Subfolders ({{ $subfolders->count() }})</h4>
                        <div class="row mb-4">
                            @foreach($subfolders as $subfolder)
                                <div class="col-md-2 col-sm-4 col-6 mb-3">
                                    <div class="card h-100">
                                        <div class="card-body text-center p-2">
                                            <a href="{{ route('protectedstorage.folders.show', $subfolder->id) }}" class="text-decoration-none">
                                                <i class="fas fa-folder fa-3x text-warning"></i>
                                                <p class="mb-0 mt-2 small">{{ $subfolder->name }}</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle"></i> No subfolders in this folder.
                        </div>
                    @endif

                    <!-- Files Section -->
                    @if($files->count() > 0)
                        <h4><i class="fas fa-file"></i> Files ({{ $files->count() }})</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Extension</th>
                                        <th>Size</th>
                                        <th>Modified</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($files as $file)
                                        <tr>
                                            <td>
                                                @if(in_array($file->extension, ['jpg', 'jpeg', 'png', 'gif']))
                                                    <i class="fas fa-image text-success"></i>
                                                @elseif(in_array($file->extension, ['mp3', 'mp4']))
                                                    <i class="fas fa-play-circle text-primary"></i>
                                                @elseif($file->extension === 'pdf')
                                                    <i class="fas fa-file-pdf text-danger"></i>
                                                @else
                                                    <i class="fas fa-file"></i>
                                                @endif
                                                {{ $file->name }}
                                            </td>
                                            <td><span class="badge badge-info">{{ strtoupper($file->extension) }}</span></td>
                                            <td>{{ number_format($file->size / 1024, 2) }} KB</td>
                                            <td>{{ \Carbon\Carbon::parse($file->file_modified_at)->format('Y-m-d H:i') }}</td>
                                            <td>
                                                <div class="btn-group btn-group-sm">
                                                    <a href="{{ route('protectedstorage.view', $file->id) }}" class="btn btn-info" target="_blank" title="View">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('protectedstorage.download', $file->id) }}" class="btn btn-success" title="Download">
                                                        <i class="fas fa-download"></i>
                                                    </a>
                                                    <a href="{{ route('protectedstorage.edit', $file->id) }}" class="btn btn-warning" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('protectedstorage.destroy', $file->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete this file?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger" title="Delete">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle"></i> No files in this folder.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
