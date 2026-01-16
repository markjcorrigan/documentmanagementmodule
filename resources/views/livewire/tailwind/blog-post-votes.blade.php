<div class="text-center">
    @auth
        <a wire:click.prevent="vote(1)"
           href="#"
           class="no-underline {{ $userVote === 1 ? 'text-green-600 dark:text-green-500' : 'text-gray-500 dark:text-gray-400' }} hover:scale-110 transition-transform"
           title="Upvote">
            <i class="fa fa-2x fa-sort-asc" aria-hidden="true"></i>
        </a>
    @else
        <a href="{{ route('login') }}"
           class="no-underline text-gray-500 dark:text-gray-400"
           title="Login to vote">
            <i class="fa fa-2x fa-sort-asc" aria-hidden="true"></i>
        </a>
    @endauth

    <div class="text-3xl font-bold my-1 {{ $sumVotes > 0 ? 'text-green-600 dark:text-green-500' : ($sumVotes < 0 ? 'text-red-600 dark:text-red-500' : 'text-gray-700 dark:text-gray-300') }}">
        {{ $sumVotes }}
    </div>

    @auth
        <a wire:click.prevent="vote(-1)"
           href="#"
           class="no-underline {{ $userVote === -1 ? 'text-red-600 dark:text-red-500' : 'text-gray-500 dark:text-gray-400' }} hover:scale-110 transition-transform"
           title="Downvote">
            <i class="fa fa-2x fa-sort-desc" aria-hidden="true"></i>
        </a>
    @else
        <a href="{{ route('login') }}"
           class="no-underline text-gray-500 dark:text-gray-400"
           title="Login to vote">
            <i class="fa fa-2x fa-sort-desc" aria-hidden="true"></i>
        </a>
    @endauth
</div>
