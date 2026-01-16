@extends('jokes.layout')

@section('title', 'Create Joke')

@section('content')
    @can('joke management')
        <div class="page-header">
            <h1>Create New Joke</h1>
        </div>

        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('jokes.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="title" class="form-label">Joke <span class="text-danger">*</span></label>
                                <textarea name="title" id="title" rows="5"
                                          class="form-control @error('title') is-invalid @enderror"
                                          required>{{ old('title') }}</textarea>
                                @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Additional Details (Optional)</label>
                                <textarea name="description" id="description" rows="3"
                                          class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="jokecat_id" class="form-label">Category <span class="text-danger">*</span></label>
                                <select name="jokecat_id" id="jokecat_id"
                                        class="form-select @error('jokecat_id') is-invalid @enderror" required>
                                    <option value="">Select a category...</option>
                                    @foreach($jokecats as $cat)
                                        <option value="{{ $cat->id }}" {{ old('jokecat_id') == $cat->id ? 'selected' : '' }}>
                                            {{ $cat->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('jokecat_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input type="checkbox" name="is_ok" id="is_ok" value="1"
                                           class="form-check-input" {{ old('is_ok') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_ok">
                                        Approve this joke
                                    </label>
                                </div>
                                <div class="form-check mt-2">
                                    <input type="checkbox" name="is_favorite" id="is_favorite" value="1"
                                           class="form-check-input" {{ old('is_favorite') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_favorite">
                                        Mark as favorite
                                    </label>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('jokes.index') }}" class="btn btn-secondary">
                                    <i class="bi bi-arrow-left"></i> Back to List
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-check-circle"></i> Create Joke
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-danger">
            <h4>Access Denied</h4>
            <p>You do not have permission to create jokes.</p>
            <a href="{{ route('jokes.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Back to Jokes
            </a>
        </div>
    @endcan
@endsection