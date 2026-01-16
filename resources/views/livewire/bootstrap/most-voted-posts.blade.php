<div class="card shadow-sm">
    <style>
        /* Dark mode support */
        [data-bs-theme="dark"] .card {
            background-color: #2b3035;
            border-color: #495057;
        }

        [data-bs-theme="dark"] .card-header {
            background-color: #0a58ca !important;
            border-color: #495057;
        }

        [data-bs-theme="dark"] .list-group-item {
            background-color: #2b3035;
            border-color: #495057;
        }

        [data-bs-theme="dark"] .list-group-item a {
            color: #6ea8fe !important;
        }

        [data-bs-theme="dark"] .list-group-item a:hover {
            color: #9ec5fe !important;
        }

        [data-bs-theme="dark"] .text-muted {
            color: #adb5bd !important;
        }

        [data-bs-theme="dark"] .badge.bg-light {
            background-color: #495057 !important;
            color: #f8f9fa !important;
        }

        /* Hover effect */
        .list-group-item:hover {
            background-color: #f8f9fa;
        }

        [data-bs-theme="dark"] .list-group-item:hover {
            background-color: #343a40;
        }
    </style>
    <div class="card-header bg-primary text-white">
        <h4 class="mb-0">
            <i class="fa fa-trophy text-warning"></i> Most Voted Posts
        </h4>
    </div>
    <div class="card-body p-0">
        @if($mostVoted->isEmpty())
            <div class="p-4 text-center text-muted">
                <i class="fa fa-inbox fa-3x mb-3"></i>
                <p class="mb-0 fs-5">No voted posts yet. Be the first to vote!</p>
            </div>
        @else
            <div class="list-group list-group-flush">
                @foreach($mostVoted as $index => $item)
                    <div class="list-group-item py-3">
                        <div class="row align-items-center">
                            <!-- Rank Badge -->
                            <div class="col-auto">
                                <span class="badge fs-5 px-3 py-2 {{ $index === 0 ? 'bg-warning text-dark' : ($index === 1 ? 'bg-secondary' : 'bg-light text-dark border') }}">
                                    #{{ $index + 1 }}
                                </span>
                            </div>

                            <!-- Post Title and Stats -->
                            <div class="col">
                                <h5 class="mb-2">
                                    <a href="{{ url('/post/details/' . $item['post']->post_slug) }}"
                                       class="text-decoration-none text-dark fw-bold">
                                        {{ $item['post']->post_title }}
                                    </a>
                                </h5>
                                <div class="text-muted">
                                    <i class="fa fa-arrow-up text-success"></i>
                                    <strong>{{ $item['vote_sum'] }}</strong> points
                                    <span class="mx-2">•</span>
                                    <i class="fa fa-users"></i>
                                    {{ $item['voter_count'] }} voters
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>


