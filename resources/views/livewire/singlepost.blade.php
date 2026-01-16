<div class="container py-md-5 container--narrow">
    {{-- New LiveWire Blog Single Post for Voting --}}
    <div class="d-flex justify-content-between">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <h2>{{$post->post_title}}</h2>
        <div class="d-inline-flex align-items-center">
            @can('update post', $post)
                <a wire:navigate href="/post/{{$post->id}}/edit" class="text-primary mr-2" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></a>
            @endcan
            @can('delete post', $post)
                <livewire:deletepost :post="$post" />
            @endcan
        </div>
    </div>

    <p class="text-muted small mb-4">
        <a wire:navigate href="/profile/{{$post->user->name}}"><img class="avatar-tiny" src="{{$post->user->avatar}}" /></a>
        Posted by <a wire:navigate href="/profile/{{$post->user->name}}">{{$post->user->username}}</a> on {{$post->created_at->format('n/j/Y')}}
    </p>

    @if($post->photo)
        <img src="{{ $post->photo }}" alt="{{ $post->post_title }}" class="img-fluid mb-4 rounded shadow-sm">
    @endif

    <!-- Voting Box - Placed after photo, before content -->
    <!-- Voting Box -->
    <div class="card mb-4 shadow-sm border-2" style="max-width: 500px;">
        <div class="card-body p-3">
            <div class="row align-items-center">
                <!-- Vote Counter Box (Left Side) -->
                <div class="col-auto">
                    <div class="border rounded p-2 text-center vote-counter-box" style="min-width: 80px;">
                        <livewire:blog-post-votes
                            :blogPost="$post"
                            designTemplate="bootstrap"
                            :key="'post-votes-'.$post->id" />
                    </div>
                </div>

                <!-- Instructions (Right Side) -->
                <div class="col">
                    <h5 class="mb-1 fw-bold">
                        <i class="fa fa-thumbs-up text-primary"></i> Vote for this post
                    </h5>
                    <p class="mb-0 text-muted" style="font-size: 0.95rem;">
                        Click the arrows to vote • 1 vote per logged in user
                        @guest
                            <br><a href="{{ route('login') }}" class="btn btn-sm btn-outline-primary mt-1">
                                <i class="fa fa-sign-in"></i> Login to Vote
                            </a>
                        @endguest
                    </p>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Dark mode support */
        [data-bs-theme="dark"] .card {
            background-color: #2b3035;
            border-color: #495057 !important;
        }

        [data-bs-theme="dark"] .vote-counter-box {
            background-color: #1a1d20 !important;
            border-color: #495057 !important;
        }

        [data-bs-theme="dark"] .text-muted {
            color: #adb5bd !important;
        }

        [data-bs-theme="dark"] h5 {
            color: #f8f9fa !important;
        }

        /* Light mode explicit colors */
        [data-bs-theme="light"] .card {
            background-color: #ffffff;
            border-color: #e0e0e0 !important;
        }

        [data-bs-theme="light"] .vote-counter-box {
            background-color: #f8f9fa !important;
        }
    </style>




    <div class="blog-post-content">
        {!! $post->post_description !!}
    </div>

    <div class="blog-post-content">
        {!! $post->post_description !!}
    </div>

    <!-- Most Voted Posts Preview -->
    <div class="blog-post-content">
        {!! $post->post_description !!}
    </div>

    <!-- Most Voted Posts Preview -->
    <div class="mt-5 pt-4 border-top">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">
                <i class="fa fa-trophy text-warning"></i> Community's Top Voted Posts
            </h4>
            <a href="{{ route('new.blog.most.voted') }}" class="btn btn-primary btn-sm">
                View All <i class="fa fa-arrow-right"></i>
            </a>
        </div>

        <livewire:most-voted-posts
            :limit="5"
            designTemplate="bootstrap"
        />
    </div>
</div>

{{--<div class="container py-md-5 container--narrow">
    <div>
        <div class="d-flex justify-content-between align-items-center">
            <h2>{{$post->post_title}}</h2>
            <div>
                <!-- @can('edit post', $post)
                <a wire:navigate href="/post/{{$post->id}}/edit" class="text-primary mr-2" data-toggle="tooltip"
                    data-placement="top" title="Edit"><i class="fas fa-edit"></i></a>
                @endcan
                @can('delete post', $post)
                <a wire:navigate href="/post/{{$post->id}}/delete"
                    onclick="return confirm('Are you sure you want to delete this post?')" class="text-danger"
                    data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i></a>
                @endcan -->

                @can('update', $post)
                <span class="pt-2">
                    <a wire:navigate href="/post/{{$post->id}}/edit" class="text-primary mr-2" data-toggle="tooltip"
                        data-placement="top" title="Edit"><i class="fas fa-edit"></i></a>
                    <livewire:deletepost :post="$post" />
                </span>
                @endcan

            </div>
        </div>
        <p class="text-muted small mb-4">
            @if($post->user)
            <a wire:navigate href="/profile/{{$post->user->name}}"><img class="avatar-tiny"
                    src="{{$post->user->avatar}}" /></a> Posted by <a wire:navigate
                href="/profile/{{$post->user->name}}">{{$post->user->name}}</a>
            @else
            Posted by Unknown User
            @endif
            on {{$post->created_at->format('n/j/Y')}}
        </p>
        <p>
            <!-- Slug: <a href="/post/{{$post->post_slug}}">{{$post->post_slug}}</a> -->
            Slug: {{$post->post_slug}}
        </p>
        <p>
            Tags:
            @if($post->post_tags)
            @foreach(explode(',', $post->post_tags) as $tag)
            <span class="badge badge-secondary">{{$tag}}</span>
            @endforeach
            @else
            No tags
            @endif
        </p>
        @if($post->photo)
        <img src="/{{ $post->photo }}" alt="Post Photo" class="img-fluid mb-4"
            style="max-width: 300px; max-height: 300px;">
        @endif
        <div class="body-content">
            {!! $post->post_description !!}
        </div>

    </div>
</div> --}}
