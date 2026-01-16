{{-- resources/views/livewire/site-transition.blade.php --}}
<div class="max-w-2xl mx-auto px-4 py-8">
    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">
            Transition to Legacy System
        </h1>
        <p class="text-lg text-gray-600 dark:text-gray-300">
            You're about to access: <strong>{{ $destinationName }}</strong>
        </p>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
        <div class="text-center mb-6">
            <div class="text-6xl mb-4">{{ $icon }}</div>
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">
                {{ $destinationName }}
            </h2>
            <p class="text-gray-600 dark:text-gray-300 mb-4">
                {{ $description }}
            </p>
        </div>

        <div class="bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-800 p-4 rounded-lg mb-6">
            <div class="flex items-start gap-3">
                <span class="text-2xl">⚠️</span>
                <div class="flex-1">
                    <p class="text-yellow-800 dark:text-yellow-200 text-sm font-semibold mb-1">
                        Legacy System Notice
                    </p>
                    <p class="text-yellow-700 dark:text-yellow-300 text-sm">
                        This page uses older styling and functionality that may differ from the current PMWay experience.
                        Look for "Home" on the left of the menu bar to return to the main site at any time.
                    </p>
                </div>
            </div>
        </div>

        {{-- CRITICAL FIX: Use ?acknowledged=1 instead of ?acknowledged=true --}}
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="/{{ $target }}?acknowledged=1"
               class="px-6 py-3 bg-green-600 hover:bg-green-700 text-white rounded-lg font-semibold transition-colors text-center">
                Continue to {{ $destinationName }}
            </a>
            <a href="/" wire:navigate
               class="px-6 py-3 bg-gray-600 hover:bg-gray-700 text-white rounded-lg font-semibold transition-colors text-center">
                Go Back
            </a>
        </div>

        <p class="text-xs text-gray-500 dark:text-gray-400 text-center mt-4">
            You won't see this message again during this session
        </p>
    </div>
</div>