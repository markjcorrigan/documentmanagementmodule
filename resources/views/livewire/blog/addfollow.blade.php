<div>
    @if(!$isFollowing)
        <button wire:click="follow" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors flex items-center gap-2">
            <i class="fas fa-user-plus"></i>
            Follow
        </button>
    @endif
</div>