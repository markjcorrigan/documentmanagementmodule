<div class="text-center">
    @auth
        <a wire:click.prevent="vote(1)"
           href="#"
           class="text-decoration-none {{ $userVote === 1 ? 'text-success' : 'text-secondary' }}"
           title="Upvote">
            <i class="fa-solid fa-chevron-up fa-2x" aria-hidden="true"></i>
        </a>
    @else
        <a href="{{ route('login') }}"
           class="text-decoration-none text-secondary"
           title="Login to vote">
            <i class="fa-solid fa-chevron-up fa-2x" aria-hidden="true"></i>
        </a>
    @endauth

    <h3 class="mb-0 mt-0 {{ $sumVotes > 0 ? 'text-success' : ($sumVotes < 0 ? 'text-danger' : 'text-dark') }}">
        {{ $sumVotes }}
    </h3>

    @auth
        <a wire:click.prevent="vote(-1)"
           href="#"
           class="text-decoration-none {{ $userVote === -1 ? 'text-danger' : 'text-secondary' }}"
           title="Downvote">
            <i class="fa-solid fa-chevron-down fa-2x" aria-hidden="true"></i>
        </a>
    @else
        <a href="{{ route('login') }}"
           class="text-decoration-none text-secondary"
           title="Login to vote">
            <i class="fa-solid fa-chevron-down fa-2x" aria-hidden="true"></i>
        </a>
    @endauth
        <style>
            /* Dark mode support for Bootstrap */
            [data-bs-theme="dark"] .text-secondary {
                color: #adb5bd !important;
            }

            [data-bs-theme="dark"] .text-success {
                color: #198754 !important;
            }

            [data-bs-theme="dark"] .text-danger {
                color: #dc3545 !important;
            }

            [data-bs-theme="dark"] h3 {
                color: #f8f9fa !important;
            }

            [data-bs-theme="dark"] .text-dark {
                color: #adb5bd !important;
            }

            /* Hover effects */
            a:hover i {
                transform: scale(1.1);
                transition: transform 0.2s ease;
            }
        </style>

</div>

