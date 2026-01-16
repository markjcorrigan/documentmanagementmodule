/**
 * Global Chat Presence and Notifications
 * This handles presence channel updates and chat request notifications across the entire app
 */

document.addEventListener('DOMContentLoaded', function() {
    // Only run if user is authenticated
    if (typeof userId === 'undefined' || !userId) {
        console.log('⚠️ Chat presence: User not authenticated');
        return;
    }

    console.log('🚀 Initializing global chat presence for user:', userId);

    // Wait for Echo to be fully initialized and connected
    function initializePresence() {
        if (!window.Echo) {
            console.log('⏳ Waiting for Echo to initialize...');
            setTimeout(initializePresence, 100);
            return;
        }

        // Check if custom Echo implementation is connected
        if (!window.Echo.connected) {
            console.log('⏳ Waiting for Echo to connect...');
            setTimeout(initializePresence, 100);
            return;
        }

        // Check if we have a socket ID (means auth is complete)
        if (!window.Echo._socketId) {
            console.log('⏳ Waiting for socket ID...');
            setTimeout(initializePresence, 100);
            return;
        }

        // Already connected, join immediately
        console.log('✅ Echo ready and connected, joining presence channel...');
        joinPresenceChannels();
    }

    function joinPresenceChannels() {
        console.log('📡 Joining presence and private channels...');

        // ============================================
        // 1. PRESENCE CHANNEL - Track online users
        // ============================================
        const presenceChannel = window.Echo.join('presence-online-users')
            .here((users) => {
                console.log('👥 Users currently in presence channel:', users);
                // Use != instead of !== to handle string/int comparison
                const otherUsers = users.filter(u => u.id != userId);
                console.log('✂️ Filtered to other users:', otherUsers, 'Current user ID:', userId);
                updateOnlineCount(otherUsers.length);

                // Store for later use
                window.__presenceUsers = otherUsers;

                // Notify Livewire components
                try {
                    Livewire.dispatch('presence-here', { users: otherUsers, count: otherUsers.length });
                    console.log('📤 Dispatched presence-here event with users:', otherUsers);
                } catch (e) {
                    console.error('❌ Error dispatching presence-here:', e);
                }

                // If on chat page, try again after delay
                if (window.location.pathname.includes('/chat')) {
                    setTimeout(() => {
                        try {
                            Livewire.dispatch('presence-here', { users: otherUsers, count: otherUsers.length });
                            console.log('📤 Re-dispatched presence-here for chat page');
                        } catch (e) {
                            console.error('❌ Error re-dispatching:', e);
                        }
                    }, 500);
                }
            })
            .joining((user) => {
                console.log('✅ User joined:', user);
                if (user.id != userId) {
                    incrementOnlineCount();

                    // Update stored users
                    if (!window.__presenceUsers) window.__presenceUsers = [];
                    if (!window.__presenceUsers.find(u => u.id === user.id)) {
                        window.__presenceUsers.push(user);
                    }

                    Livewire.dispatch('presence-joining', { user: user });
                    console.log('📤 Dispatched presence-joining event');
                }
            })
            .leaving((user) => {
                console.log('❌ User left:', user);
                if (user.id !== userId) {
                    decrementOnlineCount();

                    // Update stored users
                    if (window.__presenceUsers) {
                        window.__presenceUsers = window.__presenceUsers.filter(u => u.id !== user.id);
                    }

                    Livewire.dispatch('presence-leaving', { user: user });
                    console.log('📤 Dispatched presence-leaving event');
                }
                
                // 🔥 NEW: Cleanup chat sessions when ANY user goes offline
                // This ensures sessions are deleted whether it's you or the other person leaving
                cleanupChatSessions(user.id);
            })
            .error((error) => {
                console.error('❌ Presence channel error:', error);
            });

        // ============================================
        // 2. PRIVATE CHANNEL - Chat request notifications
        // ============================================
        const privateChannel = window.Echo.private(`user.${userId}`)
            .listen('chat.request.sent', (event) => {
                console.log('📨 New chat request received:', event);

                // Show browser notification
                showBrowserNotification(
                    'New Chat Request',
                    `${event.request.sender.name} wants to chat with you`,
                    '/chat'
                );

                // Show in-app toast notification
                showToastNotification(
                    `${event.request.sender.name} sent you a chat request!`,
                    'info'
                );

                // Add badge to chat button
                addChatRequestBadge();

                // Play notification sound
                playNotificationSound();

                // Notify Livewire components to refresh
                Livewire.dispatch('chat-request-received');
            })
            .listen('chat.request.accepted', (event) => {
                console.log('✅ Chat request accepted:', event);

                showBrowserNotification(
                    'Chat Request Accepted',
                    `${event.request.receiver.name} accepted your chat request!`,
                    '/chat'
                );

                showToastNotification(
                    `${event.request.receiver.name} accepted your chat!`,
                    'success'
                );

                playNotificationSound();

                // Remove the yellow badge
                removeChatRequestBadge();

                // FIXED: Open chat - navigate to chat page if not already there
                if (window.location.pathname === '/chat') {
                    // Already on chat page, dispatch event to open session
                    Livewire.dispatch('open-chat', { sessionId: event.session.id });
                } else {
                    // Navigate to chat page with session ID in URL
                    window.location.href = `/chat?session=${event.session.id}`;
                }
            })
            .listen('chat.request.cancelled', (event) => {
                console.log('🚫 Chat request cancelled:', event);

                // Hide badge
                removeChatRequestBadge();

                // Show notification
                showToastNotification(
                    'Chat request was cancelled',
                    'info'
                );

                // Dispatch to Livewire to reload requests
                Livewire.dispatch('chat-request-received');
            });

        // Request browser notification permission
        if (Notification.permission === 'default') {
            Notification.requestPermission().then(permission => {
                console.log('🔔 Notification permission:', permission);
            });
        }

        // Cleanup on page unload - cleanup YOUR OWN sessions when you leave
        window.addEventListener('beforeunload', () => {
            console.log('👋 Page unloading - cleaning up my own sessions');
            
            // Cleanup MY sessions before I leave
            cleanupChatSessions(userId);
            
            if (presenceChannel) {
                console.log('👋 Leaving presence channel');
                presenceChannel.leave();
            }
        });

        console.log('✅ Presence and private channels joined successfully');
    }

    // ============================================
    // HELPER FUNCTIONS
    // ============================================

    function updateOnlineCount(count) {
        // Update the count badge
        const countBadges = document.querySelectorAll('[data-online-count-badge]');
        countBadges.forEach(badge => {
            badge.textContent = count;
            badge.style.display = count > 0 ? 'inline-flex' : 'none';
        });

        // Show/hide pulse dots
        const pulseDots = document.querySelectorAll('[data-pulse-dot]');
        pulseDots.forEach(dot => {
            dot.style.display = count > 0 ? 'flex' : 'none';
        });

        console.log('📊 Updated online count:', count);
    }

    function incrementOnlineCount() {
        const countBadges = document.querySelectorAll('[data-online-count-badge]');
        countBadges.forEach(badge => {
            let current = parseInt(badge.textContent) || 0;
            badge.textContent = current + 1;
            badge.style.display = 'inline-flex';
        });

        // Show pulse dots
        const pulseDots = document.querySelectorAll('[data-pulse-dot]');
        pulseDots.forEach(dot => {
            dot.style.display = 'flex';
        });
    }

    function decrementOnlineCount() {
        const countBadges = document.querySelectorAll('[data-online-count-badge]');
        countBadges.forEach(badge => {
            let current = parseInt(badge.textContent) || 0;
            badge.textContent = Math.max(0, current - 1);
            if (current - 1 <= 0) {
                badge.style.display = 'none';
            }
        });
    }

    function addChatRequestBadge() {
        // Hide online count badge and show yellow exclamation
        const onlineBadge = document.querySelector('[data-online-count-badge]');
        const requestIndicator = document.getElementById('chatRequestIndicator');
        const button = document.getElementById('liveChatButton');

        if (onlineBadge) {
            onlineBadge.style.display = 'none';
        }

        if (requestIndicator) {
            requestIndicator.style.display = 'flex';
        }

        if (button) {
            button.setAttribute('data-chat-status', 'pending');
            // Optional: Change button color to yellow
            button.classList.remove('bg-gray-200', 'dark:bg-gray-700', 'hover:bg-gray-300', 'dark:hover:bg-gray-600');
            button.classList.add('bg-yellow-400', 'dark:bg-yellow-500', 'hover:bg-yellow-500', 'dark:hover:bg-yellow-600');
        }

        console.log('🟡 Chat request badge activated');
    }

    function removeChatRequestBadge() {
        // Show online count badge again and hide yellow exclamation
        const onlineBadge = document.querySelector('[data-online-count-badge]');
        const requestIndicator = document.getElementById('chatRequestIndicator');
        const button = document.getElementById('liveChatButton');

        if (requestIndicator) {
            requestIndicator.style.display = 'none';
        }

        if (button) {
            button.setAttribute('data-chat-status', 'idle');
            // Restore normal button colors
            button.classList.remove('bg-yellow-400', 'dark:bg-yellow-500', 'hover:bg-yellow-500', 'dark:hover:bg-yellow-600');
            button.classList.add('bg-gray-200', 'dark:bg-gray-700', 'hover:bg-gray-300', 'dark:hover:bg-gray-600');
        }

        // Show online count if there are users
        if (onlineBadge) {
            const count = parseInt(onlineBadge.textContent) || 0;
            if (count > 0) {
                onlineBadge.style.display = 'inline-flex';
            }
        }

        console.log('🔵 Chat request badge removed');
    }

    function showBrowserNotification(title, body, url) {
        if (Notification.permission === 'granted') {
            const notification = new Notification(title, {
                body: body,
                icon: '/favicon.ico',
                badge: '/favicon.ico',
                tag: 'chat-notification-' + Date.now(),
                requireInteraction: false,
                silent: false
            });

            notification.onclick = function() {
                window.focus();
                if (url) {
                    window.location.href = url;
                }
                notification.close();
            };

            // Auto-close after 5 seconds
            setTimeout(() => notification.close(), 5000);
        }
    }

    function showToastNotification(message, type = 'info') {
        // REMOVED: Livewire.dispatch('alert') was causing hasOwnProperty errors
        // Components don't have alert listeners, so just use the toast fallback
        
        // Create simple toast
        const toast = document.createElement('div');
        toast.className = `fixed top-4 right-4 z-50 px-6 py-3 rounded-lg shadow-lg text-white ${
            type === 'success' ? 'bg-green-500' :
                type === 'error' ? 'bg-red-500' :
                    type === 'warning' ? 'bg-yellow-500' :
                        'bg-blue-500'
        }`;
        toast.textContent = message;
        toast.style.animation = 'slideInRight 0.3s ease-out';

        document.body.appendChild(toast);

        setTimeout(() => {
            toast.style.animation = 'slideOutRight 0.3s ease-in';
            setTimeout(() => toast.remove(), 300);
        }, 4000);
    }

    function playNotificationSound() {
        // Create a simple beep sound using Web Audio API
        try {
            const audioContext = new (window.AudioContext || window.webkitAudioContext)();
            const oscillator = audioContext.createOscillator();
            const gainNode = audioContext.createGain();

            oscillator.connect(gainNode);
            gainNode.connect(audioContext.destination);

            oscillator.frequency.value = 800;
            oscillator.type = 'sine';

            gainNode.gain.setValueAtTime(0.3, audioContext.currentTime);
            gainNode.gain.exponentialRampToValueAtTime(0.01, audioContext.currentTime + 0.5);

            oscillator.start(audioContext.currentTime);
            oscillator.stop(audioContext.currentTime + 0.5);
        } catch (e) {
            console.log('Could not play notification sound:', e);
        }
    }

    /**
     * 🔥 NEW FUNCTION: Cleanup chat sessions when user goes offline
     * This is called both when the other user leaves AND when you leave
     */
    function cleanupChatSessions(userId) {
        console.log('🧹 Cleaning up chat sessions for user:', userId);
        
        // Get CSRF token
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content || '';
        
        if (!csrfToken) {
            console.error('❌ No CSRF token found - cannot cleanup sessions');
            return;
        }
        
        // Call backend to delete any active chat sessions for this user
        fetch('/api/chat/cleanup-sessions', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({ user_id: userId })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log('✅ Chat sessions cleaned up for user:', userId, data);
            
            // If we're on the chat page and sessions were deleted, redirect to chat index
            if (data.sessions_deleted > 0 && window.location.pathname.includes('/chat')) {
                console.log('🔄 Sessions were deleted, redirecting to chat index...');
                // Give it a moment before redirecting
                setTimeout(() => {
                    window.location.href = '/chat';
                }, 500);
            }
        })
        .catch(error => {
            console.error('❌ Error cleaning up chat sessions:', error);
        });
    }

    // Handle Livewire navigation - refresh presence on chat page
    document.addEventListener('livewire:navigated', () => {
        console.log('🔄 Livewire navigated to:', window.location.pathname);
        if (window.location.pathname.includes('/chat')) {
            console.log('🔍 On chat page, refreshing presence...');
            // Give Livewire components time to mount
            setTimeout(() => {
                if (window.__presenceUsers) {
                    console.log('👥 Dispatching stored presence users:', window.__presenceUsers);
                    try {
                        Livewire.dispatch('presence-here', {
                            users: window.__presenceUsers,
                            count: window.__presenceUsers.length
                        });
                        console.log('✅ Successfully dispatched presence-here after navigation');
                    } catch (e) {
                        console.error('❌ Error dispatching after navigation:', e);
                    }
                } else {
                    console.warn('⚠️ No stored presence users available');
                }
            }, 1000);
        }
    });

    // Start the initialization
    initializePresence();
});

// Add CSS animations if not already present
if (!document.getElementById('chat-presence-animations')) {
    const style = document.createElement('style');
    style.id = 'chat-presence-animations';
    style.textContent = `
        @keyframes slideInRight {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        @keyframes slideOutRight {
            from { transform: translateX(0); opacity: 1; }
            to { transform: translateX(100%); opacity: 0; }
        }
        @keyframes pulse-scale {
            0%, 100% {
                transform: scale(1);
                opacity: 1;
            }
            50% {
                transform: scale(1.3);
                opacity: 0.8;
            }
        }
    `;
    document.head.appendChild(style);
}
