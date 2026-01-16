@extends('jokes.layout')

@section('title', 'Joke Categories')

@section('content')
    <div class="page-header">
        <h1>Joke Categories / Ratings</h1>
    </div>


    <div class="row mb-3">
        <div class="col-md-6">
            <!-- Search Form -->
            <form action="{{ route('jokes.jokecats.index') }}" method="GET" class="d-flex">
                <input type="text" name="s" class="form-control me-2"
                       placeholder="Search categories..."
                       value="{{ request('s') }}">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-search"></i> Search
                </button>
            </form>
        </div>
        <div class="col-md-6 text-end">
            @can('joke management')
                <a href="{{ route('jokes.jokecats.create') }}" class="btn btn-success">
                    <i class="bi bi-plus-circle"></i> Create Category
                </a>
            @endcan
        </div>
    </div>

    @if($jokecats->count() > 0)
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead class="table-dark">
                <tr>
                    <th style="width: 60px;">ID</th>
                    <th>Category Name</th>
                    <th style="width: 150px;">Jokes Count</th>
                    <th style="width: 250px;">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($jokecats as $cat)
                    <tr>
                        <td>{{ $cat->id }}</td>
                        <td>{{ $cat->name }}</td>
                        <td>
                            <span class="badge bg-info">{{ $cat->jokes_count }} jokes</span>
                        </td>
                        <td>
                            <a href="{{ route('jokes.category', $cat->id) }}" class="btn btn-sm btn-primary">
                                <i class="bi bi-list"></i> View Jokes
                            </a>
                            @can('joke management')
                                <a href="{{ route('jokes.jokecats.edit', $cat) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <button class="btn btn-sm btn-danger delete-category"
                                        data-id="{{ $cat->id }}"
                                        {{ $cat->jokes_count > 0 ? 'disabled' : '' }}>
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($jokecats->hasPages())
            <div class="d-flex justify-content-between align-items-center mt-4">
                <div class="text-muted">
                    Showing {{ $jokecats->firstItem() }} to {{ $jokecats->lastItem() }} of {{ $jokecats->total() }} categories
                </div>
                <div>
                    <nav aria-label="Categories pagination">
                        <ul class="pagination justify-content-center mb-0">
                            {{-- Previous Page Link --}}
                            <li class="page-item @if($jokecats->onFirstPage()) disabled @endif">
                                <a class="page-link" href="{{ $jokecats->previousPageUrl() }}" @if($jokecats->onFirstPage()) tabindex="-1" aria-disabled="true" @endif>
                                    <i class="bi bi-chevron-left"></i>
                                </a>
                            </li>

                            {{-- Pagination Numbers --}}
                            @foreach($jokecats->getUrlRange(1, $jokecats->lastPage()) as $page => $url)
                                <li class="page-item @if($page == $jokecats->currentPage()) active @endif">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endforeach

                            {{-- Next Page Link --}}
                            <li class="page-item @if(!$jokecats->hasMorePages()) disabled @endif">
                                <a class="page-link" href="{{ $jokecats->nextPageUrl() }}" @if(!$jokecats->hasMorePages()) tabindex="-1" aria-disabled="true" @endif>
                                    <i class="bi bi-chevron-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        @endif
    @else
        <div class="alert alert-info">
            <strong>No categories found!</strong>
            @can('joke management')
                <a href="{{ route('jokes.jokecats.create') }}">Create your first category</a>
            @endcan
        </div>
    @endif

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            @can('joke management')
            // Delete category
            $('.delete-category').on('click', function() {
                const categoryId = $(this).data('id');

                if (confirm('Are you sure you want to delete this category?')) {
                    $.ajax({
                        url: '/categories/' + categoryId,
                        type: 'DELETE',
                        success: function(response) {
                            location.reload();
                        },
                        error: function(xhr) {
                            const response = xhr.responseJSON;
                            alert(response.message || 'Error deleting category');
                        }
                    });
                }
            });
            @endcan
        });
    </script>
@endpush