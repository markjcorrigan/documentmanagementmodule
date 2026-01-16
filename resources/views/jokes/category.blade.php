@extends('jokes.layout')

@section('title', $jokecat->name . ' Jokes')

@section('content')
    <div class="page-header">
        <h1>{{ $jokecat->name }} <small class="text-muted">Jokes</small></h1>
    </div>

    <div class="row mb-3">
        <div class="col-md-12">
            <a href="{{ route('jokes.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Back to All Jokes
            </a>
            @can('joke management')
                <a href="{{ route('jokes.create') }}" class="btn btn-success">
                    <i class="bi bi-plus-circle"></i> Create Joke
                </a>
            @endcan
        </div>
    </div>

    @if($jokes->count() > 0)
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead class="table-dark">
                <tr>
                    <th style="width: 60px;">ID</th>
                    <th>Joke</th>
                    <th style="width: 100px;">Status</th>
                    <th style="width: 150px;">Created</th>
                    <th style="width: 200px;">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($jokes as $joke)
                    <tr>
                        <td>{{ $joke->id }}</td>
                        <td>
                            <strong>{{ Str::limit($joke->title, 100) }}</strong>
                            @if($joke->description)
                                <br><small class="text-muted">{{ Str::limit($joke->description, 150) }}</small>
                            @endif
                        </td>
                        <td>
                            @if($joke->is_ok)
                                <span class="badge bg-success">Approved</span>
                            @else
                                <span class="badge bg-warning">Pending</span>
                            @endif
                        </td>
                        <td>{{ $joke->created_at->format('Y-m-d') }}</td>
                        <td>
                            <a href="{{ route('jokes.show', $joke) }}" class="btn btn-sm btn-info" title="View">
                                <i class="bi bi-eye"></i>
                            </a>
                            @can('joke management')
                                <a href="{{ route('jokes.edit', $joke) }}" class="btn btn-sm btn-warning" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <button class="btn btn-sm btn-danger delete-joke"
                                        data-id="{{ $joke->id }}"
                                        title="Delete">
                                    <i class="bi bi-trash"></i>
                                </button>
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <!-- Simple Pagination -->
        @if($jokes->hasPages())
            <div class="d-flex justify-content-between align-items-center mt-4">
                <div class="text-muted">
                    Showing {{ $jokes->firstItem() }} to {{ $jokes->lastItem() }} of {{ $jokes->total() }} jokes
                </div>
                <div>
                    {{ $jokes->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
        @endif
    @else
        <div class="alert alert-info">
            <strong>No jokes found in this category!</strong>
            @can('joke management')
                <a href="{{ route('jokes.create') }}">Create one now</a>
            @endcan
        </div>
    @endif

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            @can('joke management')
            // Delete single joke
            $('.delete-joke').on('click', function() {
                const jokeId = $(this).data('id');

                if (confirm('Are you sure you want to delete this joke?')) {
                    $.ajax({
                        url: '/jokes/' + jokeId,
                        type: 'DELETE',
                        success: function(response) {
                            location.reload();
                        },
                        error: function(xhr) {
                            alert('Error deleting joke');
                        }
                    });
                }
            });
            @endcan
        });
    </script>
@endpush