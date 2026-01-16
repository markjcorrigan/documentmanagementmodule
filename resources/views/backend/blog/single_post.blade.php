@extends('admin.admin_dashboard')
@section('admin')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    {{-- Display Post Image --}}
                    @if($post->photo)
                        <div class="post-image mb-4">
                            <img src="{{ asset('storage/images/' . $post->photo) }}" alt="{{ $post->post_title }}" class="img-fluid" style="max-width: 100%; height: auto;">
                        </div>
                    @endif

                    {{-- Post Title --}}
                    <h1 class="mb-3">{{ $post->post_title }}</h1>

                    {{-- Post Meta --}}
                    <div class="post-meta mb-4">
                        <p class="text-muted">
                            <strong>Author:</strong> {{ $post->user?->name }} |
                            <strong>Published:</strong> {{ $post->created_at->format('F d, Y') }} |
                            <strong>Tags:</strong> {{ $post->post_tags }}
                        </p>
                    </div>

                    {{-- Post Content - THIS IS WHERE HTML IS RENDERED --}}
                    <div class="post-content">
                        {!! $post->post_description !!}
                    </div>

                    {{-- Optional: Edit Button --}}
                    @if(auth()->check() && auth()->id() === $post->user_id)
                        <div class="mt-4">
                            <a href="{{ route('edit.post', $post->id) }}" class="btn btn-primary">Edit Post</a>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
