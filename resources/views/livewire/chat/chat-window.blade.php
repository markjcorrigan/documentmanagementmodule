<div>
    @if ($session)
        <!-- Chat Window Card -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden">
            <!-- Header -->
            <div class="flex items-center justify-between px-6 py-4 bg-gradient-to-r from-blue-600 to-blue-700 dark:from-blue-700 dark:to-blue-800">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 rounded-full bg-white dark:bg-gray-200 flex items-center justify-center text-blue-600 font-bold text-lg">
                        {{ substr($otherUser->name, 0, 1) }}
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-white">{{ $otherUser->name }}</h3>
                        <p class="text-sm text-blue-100">{{ $otherUser->email }}</p>
                    </div>
                </div>
                <div class="flex space-x-2">
                    <button
                        wire:click="endChat"
                        class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg text-sm font-medium transition-colors"
                        title="End Chat"
                    >
                        <svg class="w-5 h-5 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        End Chat
                    </button>
                    <button
                        wire:click="closeChat"
                        class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg text-sm font-medium transition-colors"
                        title="Back to User List"
                    >
                        <svg class="w-5 h-5 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back
                    </button>
                </div>
            </div>

            @if (session()->has('error'))
                <div class="px-6 py-3 bg-red-100 dark:bg-red-900/50 text-red-700 dark:text-red-200 border-b border-red-200 dark:border-red-800">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Messages Area -->
            <div
                id="messages-container-{{ $session->id }}"
                class="h-[500px] overflow-y-auto px-6 py-4 space-y-4 bg-gray-50 dark:bg-gray-900/50"
            >
                @forelse ($chatMessages as $message)
                    <div class="flex {{ $message->sender_id === auth()->id() ? 'justify-end' : 'justify-start' }}">
                        <div class="max-w-xs lg:max-w-md">
                            <div class="{{ $message->sender_id === auth()->id()
                                ? 'bg-blue-600 text-white'
                                : 'bg-white dark:bg-gray-700 text-gray-900 dark:text-white border border-gray-200 dark:border-gray-600'
                            }} rounded-lg px-4 py-3 shadow-sm">
                                <p class="text-sm break-words whitespace-pre-wrap">{{ $message->message }}</p>
                            </div>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1 {{ $message->sender_id === auth()->id() ? 'text-right' : 'text-left' }}">
                                {{ $message->created_at->format('g:i A') }}
                                @if($message->sender_id === auth()->id() && $message->is_read)
                                    <span class="text-blue-500 dark:text-blue-400">✓ Read</span>
                                @endif
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="flex items-center justify-center h-full text-gray-500 dark:text-gray-400">
                        <div class="text-center">
                            <svg class="mx-auto h-16 w-16 text-gray-400 dark:text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                            <p class="mt-4 text-lg font-medium">Start the conversation</p>
                            <p class="mt-1 text-sm">Send a message to begin chatting</p>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Message Input -->
            <div class="px-6 py-4 bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700">
                <form wire:submit.prevent="sendMessage" class="flex space-x-3">
                    <input
                        type="text"
                        wire:model="message"
                        placeholder="Type your message..."
                        class="flex-1 px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white placeholder-gray-400 dark:placeholder-gray-500"
                        autofocus
                        maxlength="1000"
                    >
                    <button
                        type="submit"
                        class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium transition-colors disabled:opacity-50 disabled:cursor-not-allowed flex items-center space-x-2"
                        wire:loading.attr="disabled"
                        wire:target="sendMessage"
                    >
                        <span wire:loading.remove wire:target="sendMessage">Send</span>
                        <span wire:loading wire:target="sendMessage">Sending...</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                        </svg>
                    </button>
                </form>
                @error('message')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>
        </div>

        @script
        <script>
            let isSubscribed = false;
            let chatChannel = null;

            // Scroll function
            const scrollToBottom = () => {
                setTimeout(() => {
                    const container = document.getElementById('messages-container-{{ $session->id }}');
                    if (container) {
                        container.scrollTop = container.scrollHeight;
                    }
                }, 50);
            };

            // Initial scroll
            setTimeout(() => {
                scrollToBottom();
                $wire.markMessagesAsRead();
                subscribeToChat();
            }, 100);

            // Subscribe to chat channel
            function subscribeToChat() {
                const sessionId = {{ $session->id }};

                // Leave old channel if exists
                if (chatChannel) {
                    window.Echo.leave(`chat-session.${chatChannel}`);
                    console.log('🚪 Left old channel:', chatChannel);
                }

                chatChannel = sessionId;

                console.log('🔗 Subscribing to chat-session.' + sessionId);

                window.Echo.join(`chat-session.${sessionId}`)
                    .listen('ChatMessageSent', (e) => {
                        console.log('📨 Message received via broadcast:', e);

                        // Only process if message is from another user
                        if (e.sender_id !== {{ auth()->id() }}) {
                            // Check if message already exists in DOM to prevent duplicates
                            const messageExists = document.querySelector(`[data-message-id="${e.id}"]`) !== null;
                            if (!messageExists) {
                                console.log('➕ Adding new message from broadcast');
                                $wire.handleNewMessage(e);
                            }
                        }
                    })
                    .listen('MessageRead', (e) => {
                        console.log('✓ Message read via broadcast:', e);
                        $wire.handleMessageRead(e);
                    })
                    .listen('ChatEnded', (e) => {
                        console.log('🚫 Chat ended via broadcast:', e);
                        if (confirm('The other user has ended the chat. You will be redirected.')) {
                            window.location.href = '/chat';
                        }
                    });

                isSubscribed = true;
                console.log('✅ Subscribed to chat-session.' + sessionId);
            }

            // Cleanup
            Livewire.hook('component.removed', (component) => {
                if (component.id === $wire.__instance.id && chatChannel) {
                    window.Echo.leave(`chat-session.${chatChannel}`);
                    console.log('🚪 Cleanup: Left chat channel:', chatChannel);
                }
            });
        </script>
        @endscript
    @endif
</div>
