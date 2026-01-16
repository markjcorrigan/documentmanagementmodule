import _ from 'lodash';
window._ = _;

import axios from 'axios';
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

console.log('🚀 MANUALLY creating Echo with Reverb...');

// Clear any existing Echo instance
if (window.Echo) {
    console.log('🗑️ Removing existing Echo instance');
    delete window.Echo;
}

const useSecureWebSocket = (import.meta.env.VITE_REVERB_SCHEME ?? 'https') === 'https';

/**
 * Custom Echo-like object for Reverb WebSocket connections
 * @type {Object}
 */
window.Echo = {
    connector: null,
    channels: new Map(),
    _socketId: null,
    socket: null,
    connected: false,

    /**
     * Initialize WebSocket connection to Reverb
     */
    init() {
        console.log('🔧 Initializing manual Reverb connection...');

        const protocol = useSecureWebSocket ? 'wss' : 'ws';
        const port = useSecureWebSocket ? (import.meta.env.VITE_REVERB_PORT || 443) : (import.meta.env.VITE_REVERB_PORT || 80);
        const wsUrl = `${protocol}://${import.meta.env.VITE_REVERB_HOST}:${port}/app/${import.meta.env.VITE_REVERB_APP_KEY}?protocol=7&client=js&version=1.0.0`;

        console.log('🔌 Connecting to:', wsUrl);

        this.socket = new WebSocket(wsUrl);

        this.socket.onopen = () => {
            console.log('🟢 WebSocket connected to Reverb');
            this.connected = true;
        };

        // CENTRAL MESSAGE HANDLER - handles ALL channels
        this.socket.onmessage = (event) => {
            const data = JSON.parse(event.data);
            console.log('📨 Reverb message:', data);

            // Handle connection established
            if (data.event === 'pusher:connection_established') {
                const connectionData = JSON.parse(data.data);
                this._socketId = connectionData.socket_id;
                console.log('🔑 Socket ID:', this._socketId);
                return;
            }

            // Handle channel-specific events
            if (data.channel) {
                const channelData = this.channels.get(data.channel);

                if (channelData && channelData.listeners) {
                    console.log('🔍 Processing event for channel:', data.channel, 'Event:', data.event);
                    console.log('🔍 Available listeners:', Array.from(channelData.listeners.keys()));

                    channelData.listeners.forEach((callback, eventName) => {
                        console.log('🔍 Checking:', eventName, 'against:', data.event);

                        if (data.event === eventName || data.event.endsWith(':' + eventName)) {
                            console.log('✅ Event matched! Calling callback for:', eventName);
                            const parsedData = typeof data.data === 'string' ? JSON.parse(data.data) : data.data;

                            if (eventName === 'pusher_internal:subscription_succeeded' && parsedData.presence) {
                                const users = Object.values(parsedData.presence.hash);
                                callback(users);
                            } else if (eventName === 'pusher_internal:member_added' && parsedData.user_info) {
                                // For member_added, pass the user_info object
                                callback(parsedData.user_info);
                            } else if (eventName === 'pusher_internal:member_removed' && parsedData.user_id) {
                                // For member_removed, pass a user object with id
                                callback({ id: parsedData.user_id });
                            } else {
                                callback(parsedData);
                            }
                        }
                    });
                }
            }
        };

        this.socket.onclose = (event) => {
            console.log('🔴 WebSocket disconnected:', event.reason);
            this.connected = false;
        };

        this.socket.onerror = (error) => {
            console.error('❌ WebSocket error:', error);
        };
    },

    /**
     * Join a channel
     * @param {string} channelName - The name of the channel to join
     * @returns {Object} Channel object with event handlers
     */
    join(channelName) {
        console.log('👥 Joining channel:', channelName);

        const listeners = new Map();

        // Store channel reference
        this.channels.set(channelName, { listeners });

        // Handle authentication and subscription
        const doSubscribe = async () => {
            if (this.socket && this.connected) {
                let authData = { channel: channelName };

                // Get auth token for presence/private channels
                if (channelName.startsWith('presence-') || channelName.startsWith('private-')) {
                    try {
                        const response = await fetch('/broadcasting/auth', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content'),
                                'X-Requested-With': 'XMLHttpRequest'
                            },
                            body: JSON.stringify({
                                socket_id: this._socketId,
                                channel_name: channelName
                            })
                        });

                        const authResult = await response.json();
                        authData.auth = authResult.auth;
                        if (authResult.channel_data) {
                            authData.channel_data = authResult.channel_data;
                        }
                        console.log('✅ Channel authenticated:', channelName);
                    } catch (error) {
                        console.error('❌ Authentication failed:', error);
                    }
                }

                // Send subscription message
                this.socket.send(JSON.stringify({
                    event: 'pusher:subscribe',
                    data: authData
                }));
            }
        };

        // Start subscription process (non-blocking)
        doSubscribe();

        return {
            here(callback) {
                console.log('👂 Listening for event: here on channel:', channelName);
                listeners.set('pusher_internal:subscription_succeeded', callback);
                return this;
            },
            joining(callback) {
                console.log('👂 Listening for event: joining on channel:', channelName);
                listeners.set('pusher_internal:member_added', callback);
                return this;
            },
            leaving(callback) {
                console.log('👂 Listening for event: leaving on channel:', channelName);
                listeners.set('pusher_internal:member_removed', callback);
                return this;
            },
            listen(event, callback) {
                console.log('👂 Listening for event:', event, 'on channel:', channelName);
                listeners.set(event, callback);
                return this;
            },
            stopListening(event) {
                console.log('🛑 Stop listening for event:', event, 'on channel:', channelName);
                listeners.delete(event);
                return this;
            },
            error(callback) {
                console.log('❌ Setting up error callback for:', channelName);
                listeners.set('pusher:error', callback);
                return this;
            },
            whisper(event, data) {
                console.log('🤫 Whispering event:', event, 'on channel:', channelName);
                return this;
            },
            listenForWhisper(event, callback) {
                console.log('👂 Listening for whisper:', event, 'on channel:', channelName);
                listeners.set('client-' + event, callback);
                return this;
            }
        };
    },

    /**
     * Join a public channel
     * @param {string} channelName - The name of the channel
     * @returns {Object} Channel object
     */
    channel(channelName) {
        return this.join(channelName);
    },

    /**
     * Join a private channel
     * @param {string} channelName - The name of the channel
     * @returns {Object} Channel object
     */
    private(channelName) {
        return this.join('private-' + channelName);
    },

    /**
     * Join a presence channel
     * @param {string} channelName - The name of the channel
     * @returns {Object} Channel object
     */
    presence(channelName) {
        return this.join('presence-' + channelName);
    },

    /**
     * Get the socket ID for Livewire
     * @returns {string|null} The socket ID
     */
    socketId() {
        return this._socketId;
    },

    /**
     * Leave a channel
     * @param {string} channelName - The name of the channel to leave
     */
    leave(channelName) {
        console.log('🚪 Leaving channel:', channelName);

        if (this.socket && this.connected) {
            this.socket.send(JSON.stringify({
                event: 'pusher:unsubscribe',
                data: {
                    channel: channelName
                }
            }));
        }

        this.channels.delete(channelName);
    },

    /**
     * Leave all channels
     */
    leaveAllChannels() {
        console.log('🚪 Leaving all channels');
        this.channels.forEach((channel, channelName) => {
            this.leave(channelName);
        });
        this.channels.clear();
    },

    /**
     * Disconnect from the WebSocket
     */
    disconnect() {
        console.log('🔌 Disconnecting from Reverb');
        if (this.socket) {
            this.socket.close();
        }
        this.connected = false;
    }
};

// Initialize our manual Echo
window.Echo.init();

// Make available for Livewire
window.LivewireEcho = window.Echo;

console.log('✅ Manual Echo initialization complete');