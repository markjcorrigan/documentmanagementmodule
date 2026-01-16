<a href="{{ route('chat.index') }}"
   class="flex items-center space-x-2 px-3 py-2 md:px-3 md:py-2 sm:px-2 sm:py-1.5 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors {{ request()->routeIs('chat.index') ? 'bg-gray-100 dark:bg-gray-800' : '' }} relative">

    <!-- Chat icon - hidden on small screens (< 640px) -->
    <svg class="w-5 h-5 hidden sm:block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
    </svg>

    <!-- Text: "Chat" on mobile, "Live Chat" on desktop -->
    <span class="font-medium">
        <span class="sm:hidden">Chat</span>
        <span class="hidden sm:inline">Live Chat</span>
    </span>

    <!-- Online count badge with number - BLUE for colorblind visibility -->
    <span data-online-count-badge
          class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white bg-blue-600 rounded-full min-w-6 h-6"
          style="display: none;">
        0
    </span>

    <!-- Pulsing blue dot indicator -->
    <span data-online-count-pulse
          class="relative flex h-2 w-2"
          style="display: none;">
        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
        <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-600"></span>
    </span>
</a>