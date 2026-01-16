@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit File: {{ $file->name }}</h3>
                </div>

                <form action="{{ route('protectedstorage.update', $file->id) }}" method="POST">
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
                            <label for="name">File Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                   id="name" name="name" value="{{ old('name', $file->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="resource">Resource/Category</label>
                            <input type="text" class="form-control @error('resource') is-invalid @enderror" 
                                   id="resource" name="resource" value="{{ old('resource', $file->resource) }}" 
                                   placeholder="e.g., scientology, lrh, etc.">
                            @error('resource')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" name="description" rows="4">{{ old('description', $file->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>File Information</label>
                            <table class="table table-sm table-bordered">
                                <tr>
                                    <th style="width: 150px;">Path:</th>
                                    <td>{{ $file->path }}</td>
                                </tr>
                                <tr>
                                    <th>Extension:</th>
                                    <td>{{ $file->extension }}</td>
                                </tr>
                                <tr>
                                    <th>Size:</th>
                                    <td>{{ number_format($file->size / 1024, 2) }} KB</td>
                                </tr>
                                <tr>
                                    <th>MIME Type:</th>
                                    <td>{{ $file->mime_type }}</td>
                                </tr>
                                <tr>
                                    <th>Modified:</th>
                                    <td>{{ \Carbon\Carbon::parse($file->file_modified_at)->format('Y-m-d H:i:s') }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Update File
                        </button>
                        <a href="{{ route('protectedstorage.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Cancel
                        </a>
                        <a href="{{ route('protectedstorage.view', $file->id) }}" class="btn btn-info" target="_blank">
                            <i class="fas fa-eye"></i> View File
                        </a>
                        <a href="{{ route('protectedstorage.download', $file->id) }}" class="btn btn-success">
                            <i class="fas fa-download"></i> Download
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
