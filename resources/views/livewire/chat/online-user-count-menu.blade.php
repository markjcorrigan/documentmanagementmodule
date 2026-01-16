<div wire:poll.30s="updateCount">
    <flux:menu.item href="{{ route('chat.index') }}"
                    class="text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
        <div class="flex items-center justify-between w-full">
            <span class="flex items-center">
                <i class="fa-solid fa-comments mr-2"></i> Live Chat
            </span>
            @if($onlineCount > 0)
                <span class="inline-flex items-center gap-1.5">
                    <!-- Count Badge -->
                    <span class="inline-flex items-center justify-center px-2 py-0.5 text-xs font-bold leading-none text-white bg-red-500 rounded-full min-w-6 h-6">
                        {{ $onlineCount }}
                    </span>
                    <!-- Pulsing Dot -->
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-red-500"></span>
                    </span>
                </span>
            @endif
        </div>
    </flux:menu.item>
</div>