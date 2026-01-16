{{-- Toast Notification Component --}}
<div x-data="{
    show: false,
    type: 'success',
    message: '',
    init() {
        // Listen for Livewire notify events
        window.addEventListener('notify', (event) => {
            this.type = event.detail[0].type || 'success';
            this.message = event.detail[0].message || '';
            this.show = true;
            setTimeout(() => this.show = false, 4000);
        });

        // Check for Laravel flash messages on page load
        @if(session('success'))
            this.type = 'success';
            this.message = '{{ session('success') }}';
            this.show = true;
            setTimeout(() => this.show = false, 4000);
        @endif

        @if(session('error'))
            this.type = 'error';
            this.message = '{{ session('error') }}';
            this.show = true;
            setTimeout(() => this.show = false, 4000);
        @endif

        @if(session('warning'))
            this.type = 'warning';
            this.message = '{{ session('warning') }}';
            this.show = true;
            setTimeout(() => this.show = false, 4000);
        @endif

        @if(session('info'))
            this.type = 'info';
            this.message = '{{ session('info') }}';
            this.show = true;
            setTimeout(() => this.show = false, 4000);
        @endif
    }
}"
     class="fixed top-20 right-4 z-50 transition-all duration-300"
     x-show="show"
     x-transition:enter="transform ease-out duration-300 transition"
     x-transition:enter-start="translate-y-2 opacity-0"
     x-transition:enter-end="translate-y-0 opacity-100"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     style="display: none;">

    <div class="flex items-center gap-3 px-4 py-3 rounded-lg shadow-lg min-w-[300px] max-w-md"
         :class="{
            'bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800': type === 'success',
            'bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800': type === 'error',
            'bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-800': type === 'warning',
            'bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800': type === 'info'
         }">

        {{-- Icon --}}
        <div class="flex-shrink-0">
            <template x-if="type === 'success'">
                <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </template>
            <template x-if="type === 'error'">
                <svg class="w-6 h-6 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </template>
            <template x-if="type === 'warning'">
                <svg class="w-6 h-6 text-yellow-600 dark:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                </svg>
            </template>
            <template x-if="type === 'info'">
                <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </template>
        </div>

        {{-- Message --}}
        <div class="flex-1 text-sm font-medium"
             :class="{
                'text-green-800 dark:text-green-200': type === 'success',
                'text-red-800 dark:text-red-200': type === 'error',
                'text-yellow-800 dark:text-yellow-200': type === 'warning',
                'text-blue-800 dark:text-blue-200': type === 'info'
             }"
             x-text="message">
        </div>

        {{-- Close Button --}}
        <button @click="show = false"
                class="flex-shrink-0 p-1 rounded hover:bg-black/5 dark:hover:bg-white/5 transition-colors"
                :class="{
                    'text-green-600 dark:text-green-400': type === 'success',
                    'text-red-600 dark:text-red-400': type === 'error',
                    'text-yellow-600 dark:text-yellow-400': type === 'warning',
                    'text-blue-600 dark:text-blue-400': type === 'info'
                }">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>
</div>
