// This file should be empty or contain only Reverb configuration
import Echo from 'laravel-echo';

// Reverb configuration
const useSecureWebSocket = (import.meta.env.VITE_REVERB_SCHEME ?? 'https') === 'https';

window.Echo = new Echo({
    broadcaster: 'reverb',
    key: import.meta.env.VITE_REVERB_APP_KEY,
    wsHost: import.meta.env.VITE_REVERB_HOST,
    wsPort: import.meta.env.VITE_REVERB_PORT ?? 80,
    wssPort: import.meta.env.VITE_REVERB_PORT ?? 443,
    forceTLS: useSecureWebSocket,
    enabledTransports: ['ws', 'wss'],
    
    auth: {
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content'),
            'X-Requested-With': 'XMLHttpRequest'
        }
    },
    
    authEndpoint: '/broadcasting/auth'
});

export default window.Echo;