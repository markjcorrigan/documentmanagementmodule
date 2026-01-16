<div>
    @if($isFollowing)
        <button wire:click="unfollow" class="px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg transition-colors flex items-center gap-2">
            <i class="fas fa-user-minus"></i>
            Unfollow
        </button>
    @endif
</div>