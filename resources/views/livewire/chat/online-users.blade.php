<div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
    <div class="mb-4">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">Online Users</h2>
        <p class="text-sm text-gray-600 dark:text-gray-400">Click Chat button for a user below to start chatting.</p>

        <!-- Real-time status indicator -->
        <div class="flex items-center space-x-2 text-sm text-green-600 dark:text-green-400 mt-2">
            <span class="relative flex h-2 w-2">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
            </span>
            <span>Real-time updates active</span>
        </div>
    </div>

    @if (session()->has('message'))
        <div class="mb-4 p-3 bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-200 rounded-lg">
            {{ session('message') }}
        </div>
    @endif

    <!-- Online Users List -->
    <div class="space-y-3">
        @forelse ($onlineUsers as $onlineUser)
            <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-gray-700 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors">
                <div class="flex items-center space-x-3">
                    <div class="flex-shrink-0 relative">
                        <div class="w-10 h-10 rounded-full bg-blue-500 flex items-center justify-center text-white font-semibold">
                            {{ substr($onlineUser->name, 0, 1) }}
                        </div>
                        <div class="w-3 h-3 bg-green-500 rounded-full border-2 border-white dark:border-gray-700 -mt-2 ml-7 absolute"></div>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900 dark:text-white">{{ $onlineUser->name }}</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ $onlineUser->email }}</p>
                    </div>
                </div>
                <button
                        wire:click="sendChatRequest({{ $onlineUser->id }})"
                        class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors"
                        wire:loading.attr="disabled"
                >
                    <span wire:loading.remove>Chat</span>
                    <span wire:loading>Sending...</span>
                </button>
            </div>
        @empty
            <div class="text-center py-8 text-gray-500 dark:text-gray-400">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                </svg>
                <p class="mt-2">No users online at the moment</p>
                <p class="text-sm mt-1">Users will appear here when they come online</p>
            </div>
        @endforelse
    </div>

    @script
    <script>
        console.log('🎯 OnlineUsers component mounted');

        // Request presence data immediately when component loads
        setTimeout(() => {
            if (window.__presenceUsers && window.__presenceUsers.length > 0) {
                console.log('📤 Dispatching stored presence users to OnlineUsers:', window.__presenceUsers);
                // Use Livewire.dispatch instead of $wire.dispatch to ensure it reaches the component
                Livewire.dispatch('presence-here', {
                    users: window.__presenceUsers,
                    count: window.__presenceUsers.length
                });
            } else {
                console.log('⚠️ No stored presence users found, component will use database fallback');
                // Trigger refresh from database
                $wire.call('refreshOnlineUsers');
            }
        }, 100);

        // Also listen for future presence updates
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('presence-here', (data) => {
                console.log('👂 OnlineUsers received presence-here event:', data);
            });
        });
    </script>
    @endscript
</div>