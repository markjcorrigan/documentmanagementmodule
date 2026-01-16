<div class="min-h-screen bg-gray-50 dark:bg-gray-900 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Live Chat</h1>
            <p class="mt-2 text-gray-600 dark:text-gray-400">Connect with online users in real-time</p>
        </div>

        <!-- Main Content Area -->
        @if($activeView === 'online-users')
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Left Column - Online Users -->
                <div class="lg:col-span-2">
                    <livewire:chat.online-users wire:key="online-users-component" />
                </div>

                <!-- Right Column - Chat Requests -->
                <div class="lg:col-span-1">
                    <livewire:chat.chat-requests wire:key="chat-requests-component" />
                </div>
            </div>
        @endif

        <!-- Chat Window View -->
        @if($activeView === 'chat-window' && $selectedSessionId)
            <div class="max-w-4xl mx-auto">
                <livewire:chat.chat-window
                    :sessionId="$selectedSessionId"
                    wire:key="chat-window-{{ $selectedSessionId }}"
                />
            </div>
        @endif
    </div>
</div>
