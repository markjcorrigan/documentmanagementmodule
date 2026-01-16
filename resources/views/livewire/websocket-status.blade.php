<div>
    @auth
        @can('reverb viewer')
            <div
                x-data="{
                    status: 'initializing',
                    statusMessage: 'Initializing...',
                    debugInfo: 'Starting up',
                    lastCheck: '',
                    buttonText: '🔄 Test',
                    buttonDisabled: false,
                    buttonLoading: false,

                    init() {
                        this.lastCheck = new Date().toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'});

                        // Auto-test on load
                        this.$nextTick(() => {
                            setTimeout(() => {
                                this.testConnection();
                            }, 1000);
                        });

                        // Auto-refresh every 30 seconds
                        setInterval(() => {
                            this.testConnection();
                        }, 30000);
                    },

                    getReverbConfig() {
                        // Use window.location to determine protocol and hostname
                        const isSecure = window.location.protocol === 'https:';
                        const currentHost = window.location.hostname;

                        return {
                            protocol: isSecure ? 'wss' : 'ws',
                            host: currentHost === 'localhost' ? '127.0.0.1' : currentHost,
                            port: isSecure ? '443' : '8080',  // Use 443 for HTTPS, 8080 for HTTP
                            key: '{{ config('broadcasting.connections.reverb.key', '') }}'
                        };
                    },

                    updateButtonState(testing = false) {
                        this.buttonDisabled = testing;
                        this.buttonLoading = testing;
                        this.buttonText = testing ? 'Testing...' : '🔄 Test';
                    },

                    updateStatus(status, message, debug) {
                        this.status = status;
                        this.statusMessage = message;
                        this.debugInfo = debug;
                        this.lastCheck = new Date().toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'});
                        this.updateButtonState(false);
                    },

                    getStatusDotClass() {
                        if (this.status === 'connected') {
                            return 'w-2 h-2 rounded-full bg-green-500';
                        } else if (this.status === 'error') {
                            return 'w-2 h-2 rounded-full bg-red-500';
                        } else {
                            return 'w-2 h-2 rounded-full bg-yellow-500 animate-pulse';
                        }
                    },

                    testConnection() {
                        this.updateButtonState(true);
                        this.updateStatus('testing', 'Testing Connection...', 'Checking Reverb server...');

                        const config = this.getReverbConfig();

                        // Log for debugging
                        console.log('Attempting to connect to:', config);

                        try {
                            const wsUrl = `${config.protocol}://${config.host}:${config.port}/app/${config.key}?protocol=7&client=js&version=1.0.0`;
                            console.log('WebSocket URL:', wsUrl);

                            const socket = new WebSocket(wsUrl);

                            socket.onopen = (event) => {
                                console.log('WebSocket opened:', event);
                                this.updateStatus('connected', 'Live Connection Active', 'WebSocket handshake complete');

                                setTimeout(() => {
                                    const pingMessage = JSON.stringify({
                                        event: 'pusher:ping',
                                        data: {}
                                    });
                                    socket.send(pingMessage);
                                }, 100);
                            };

                            socket.onmessage = (event) => {
                                try {
                                    const data = JSON.parse(event.data);
                                    console.log('WebSocket message:', data);
                                    if (data.event === 'pusher:pong') {
                                        this.updateStatus('connected', 'Live Connection Active', 'Ping-pong successful');
                                    }
                                } catch (e) {
                                    console.log('Raw message:', event.data);
                                }
                            };

                            socket.onerror = (error) => {
                                console.error('WebSocket error:', error);
                                this.updateStatus('error', 'Connection Failed', 'Connection failed');
                            };

                            socket.onclose = (event) => {
                                console.log('WebSocket closed:', event);
                                if (event.code !== 1000 && event.code !== 1001) {
                                    this.updateStatus('error', 'Connection Failed', `Error: ${event.code} - ${event.reason || 'Unknown'}`);
                                }
                            };

                            setTimeout(() => {
                                if (socket.readyState === WebSocket.CONNECTING) {
                                    this.updateStatus('error', 'Connection Timeout', 'No response from server');
                                    socket.close();
                                }
                            }, 3000);

                        } catch (error) {
                            console.error('Connection error:', error);
                            this.updateStatus('error', 'Connection Error', error.message);
                        }
                    }
                }"
                class="websocket-status-component mt-4"
            >
                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-gray-800 dark:to-gray-900 border border-blue-200 dark:border-gray-700 rounded-lg px-4 py-3 shadow-sm">
                    <div class="flex items-center justify-center space-x-4 flex-wrap gap-2">
                        <!-- Status with Icon -->
                        <div class="flex items-center space-x-2">
                            <div :class="getStatusDotClass()"></div>
                            <svg class="w-4 h-4 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span x-text="statusMessage" class="text-sm font-semibold text-gray-800 dark:text-gray-200"></span>
                        </div>

                        <!-- Server Info -->
                        <div x-text="debugInfo" class="text-xs text-gray-600 dark:text-gray-300 bg-white dark:bg-gray-700 px-3 py-1 rounded border border-gray-300 dark:border-gray-600"></div>

                        <!-- Controls -->
                        <div class="flex items-center space-x-2">
                            <span x-text="lastCheck" class="text-xs text-gray-500 dark:text-gray-400"></span>
                            <button
                                    @click="testConnection()"
                                    :disabled="buttonDisabled"
                                    :class="buttonDisabled ?
                    'bg-blue-500 text-black dark:text-white dark:bg-blue-600 cursor-not-allowed opacity-75' :
                    'bg-green-500 text-black dark:text-white hover:bg-green-600 dark:bg-green-600 dark:hover:bg-green-700'"
                                    class="text-xs px-3 py-1.5 rounded transition-colors flex items-center space-x-1 font-medium font-semibold"
                                    title="Click to test Reverb connection">
                                <span x-text="buttonText"></span>
                                <span x-show="buttonLoading" class="animate-spin">⟳</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endcan
    @endauth
</div>