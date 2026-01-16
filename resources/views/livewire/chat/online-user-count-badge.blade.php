<div wire:poll.30s="updateCount">
    @if($this->onlineCount > 0)
        <span class="absolute -top-1 -right-1 flex h-5 w-5 items-center justify-center rounded-full bg-red-500 text-white text-xs font-bold">
            {{ $this->onlineCount }}
        </span>
    @endif
</div>
