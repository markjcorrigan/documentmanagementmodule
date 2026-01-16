@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Folder: {{ $folder->name }}</h3>
                </div>

                <form action="{{ route('protectedstorage.folders.update', $folder->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="name">Folder Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                   id="name" name="name" value="{{ old('name', $folder->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">
                                <i class="fas fa-info-circle"></i> Renaming this folder will also update all file paths within it.
                            </small>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" name="description" rows="4">{{ old('description', $folder->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Folder Information</label>
                            <table class="table table-sm table-bordered">
                                <tr>
                                    <th style="width: 150px;">Current Path:</th>
                                    <td>{{ $folder->path }}</td>
                                </tr>
                                <tr>
                                    <th>Parent Path:</th>
                                    <td>{{ $folder->parent_path ?? 'Root Level' }}</td>
                                </tr>
                                <tr>
                                    <th>Resource:</th>
                                    <td>{{ $folder->resource ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Created:</th>
                                    <td>{{ \Carbon\Carbon::parse($folder->created_at)->format('Y-m-d H:i:s') }}</td>
                                </tr>
                                <tr>
                                    <th>Last Modified:</th>
                                    <td>{{ \Carbon\Carbon::parse($folder->file_modified_at)->format('Y-m-d H:i:s') }}</td>
                                </tr>
                            </table>
                        </div>

                        <div class="alert alert-warning">
                            <i class="fas fa-exclamation-triangle"></i> 
                            <strong>Warning:</strong> Renaming this folder will update the folder name on disk and in the database. 
                            All files and subfolders within this folder will have their paths updated automatically.
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Update Folder
                        </button>
                        <a href="{{ route('protectedstorage.folders.show', $folder->id) }}" class="btn btn-info">
                            <i class="fas fa-folder-open"></i> View Contents
                        </a>
                        <a href="{{ route('protectedstorage.folders.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
