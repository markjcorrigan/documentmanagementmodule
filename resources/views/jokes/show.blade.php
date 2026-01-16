@extends('jokes.layout')

@section('title', $joke->title)

@section('content')
    <div class="page-header">
        <h1>{{ $joke->title }}</h1>
    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>
                @if($joke->jokecat)
                    <a href="{{ route('jokes.category', $joke->jokecat->id) }}" class="badge bg-secondary">
                        {{ $joke->jokecat->name }}
                    </a>
                @endif
                @if($joke->is_ok)
                    <span class="badge bg-success">Approved</span>
                @else
                    <span class="badge bg-warning">Pending</span>
                @endif
            </span>
            <span class="text-muted">{{ $joke->created_at->format('F j, Y') }}</span>
        </div>
        <div class="card-body">
            <p class="lead">{{ $joke->description }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('jokes.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Back to Jokes
            </a>
            @can('joke management')
                <a href="{{ route('jokes.edit', $joke) }}" class="btn btn-warning">
                    <i class="bi bi-pencil"></i> Edit
                </a>
            @endcan

            @auth
                <button class="btn toggle-favorite {{ $joke->isFavoritedByUser() ? 'btn-warning' : 'btn-outline-warning' }}"
                        data-id="{{ $joke->id }}">
                    <i class="bi bi-star{{ $joke->isFavoritedByUser() ? '-fill' : '' }}"></i>
                    {{ $joke->isFavoritedByUser() ? 'Unfavorite' : 'Favorite' }}
                </button>
            @endauth
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Toggle favorite
            $('.toggle-favorite').on('click', function() {
                const button = $(this);
                const jokeId = button.data('id');

                $.ajax({
                    url: '/jokes/' + jokeId + '/toggle-favorite',
                    type: 'POST',
                    success: function(response) {
                        if (response.is_favorite) {
                            button.removeClass('btn-outline-warning').addClass('btn-warning');
                            button.find('i').removeClass('bi-star').addClass('bi-star-fill');
                            button.html('<i class="bi bi-star-fill"></i> Unfavorite');
                        } else {
                            button.removeClass('btn-warning').addClass('btn-outline-warning');
                            button.find('i').removeClass('bi-star-fill').addClass('bi-star');
                            button.html('<i class="bi bi-star"></i> Favorite');
                        }
                    }
                });
            });
        });
    </script>
@endpush