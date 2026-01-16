<div class="max-w-7xl mx-auto px-4 py-8">
    {{-- Header with Actions Dropdown --}}
    <div class="mb-8 flex justify-between items-center">
        <h1 class="text-4xl font-bold text-gray-900 dark:text-white border-b border-gray-200 dark:border-gray-700 pb-4">
            <i class="fa-solid fa-chart-line mr-2"></i>Visitor Analytics
        </h1>

        @role('Super Admin')
        <div wire:ignore>
            <flux:dropdown align="end">
                <flux:button
                        variant="ghost"
                        class="text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700"
                        icon:trailing="ellipsis-vertical">
                    <span class="hidden md:inline">Actions</span>
                </flux:button>

                <flux:menu class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 w-48">
                    <flux:menu.item
                            as="button"
                            wire:click="clearAllVisitorLogs"
                            wire:confirm="Are you sure you want to clear ALL visitor logs? This action cannot be undone!"
                            class="text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/30 transition-colors w-full text-left">
                        <i class="fa-solid fa-trash-can mr-2"></i> Clear All Logs
                    </flux:menu.item>
                </flux:menu>
            </flux:dropdown>
        </div>
        @endrole
    </div>

    {{-- Flash Messages --}}
    @if (session()->has('message'))
        <div class="mb-6 flex items-center justify-between px-4 py-3 bg-green-50 dark:bg-green-900/30 border border-green-200 dark:border-green-800 rounded-lg">
            <div class="flex items-center text-green-800 dark:text-green-300">
                <i class="fa-solid fa-circle-check mr-2"></i>
                {{ session('message') }}
            </div>
            <button onclick="this.parentElement.remove()"
                    class="text-green-600 hover:text-green-800 dark:text-green-400 dark:hover:text-green-300">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
    @endif

    @if (session()->has('error'))
        <div class="mb-6 flex items-center justify-between px-4 py-3 bg-red-50 dark:bg-red-900/30 border border-red-200 dark:border-red-800 rounded-lg">
            <div class="flex items-center text-red-800 dark:text-red-300">
                <i class="fa-solid fa-circle-exclamation mr-2"></i>
                {{ session('error') }}
            </div>
            <button onclick="this.parentElement.remove()"
                    class="text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
    @endif

    {{-- Statistics Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-6 gap-4 mb-6">
        <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <div class="text-sm text-gray-500 dark:text-gray-400 mb-1">Total Sessions</div>
            <div class="text-3xl font-bold text-gray-900 dark:text-white">{{ number_format($stats['total']) }}</div>
        </div>

        <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <div class="text-sm text-gray-500 dark:text-gray-400 mb-1">Registered Users</div>
            <div class="text-3xl font-bold text-blue-600 dark:text-blue-400">{{ number_format($stats['users']) }}</div>
            @if($stats['users'] > 0)
                <div class="text-xs text-gray-500 dark:text-gray-400 mt-1">{{ $stats['unique_users'] }} unique</div>
            @endif
        </div>

        <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <div class="text-sm text-gray-500 dark:text-gray-400 mb-1">Anonymous</div>
            <div class="text-3xl font-bold text-yellow-600 dark:text-yellow-400">{{ number_format($stats['anonymous']) }}</div>
        </div>

        <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <div class="text-sm text-gray-500 dark:text-gray-400 mb-1">Bots</div>
            <div class="text-3xl font-bold text-red-600 dark:text-red-400">{{ number_format($stats['bots']) }}</div>
        </div>

        {{-- Active Sessions Card --}}
        <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <div class="text-sm text-gray-500 dark:text-gray-400 mb-1">Active Now</div>
            <div class="text-3xl font-bold text-green-600 dark:text-green-400">{{ number_format($stats['active_sessions']) }}</div>
            @if($stats['active_sessions'] > 0)
                <div class="text-xs text-green-600 dark:text-green-400 mt-1">
                    <i class="fa-solid fa-circle-dot animate-pulse"></i> Live
                </div>
            @endif
        </div>

        <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <div class="text-sm text-gray-500 dark:text-gray-400 mb-1">Time Range</div>
            <select wire:model.live="hoursBack"
                    class="mt-1 w-full text-sm px-2 py-1 border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                <option value="1">Last Hour</option>
                <option value="24">Last 24h</option>
                <option value="168">Last Week</option>
                <option value="720">Last 30 Days</option>
                <option value="">All Time</option>
            </select>
        </div>
    </div>

    {{-- Filters & Search --}}
    <div class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-4 mb-6">
        <div class="flex flex-col md:flex-row gap-4 items-start md:items-center justify-between">
            {{-- View Type Tabs --}}
            <div class="flex gap-2 flex-wrap">
                <button wire:click="setViewType('users')"
                        class="px-4 py-2 rounded-lg font-medium transition-colors {{ $viewType === 'users' ? 'bg-blue-600 text-white' : 'bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }}">
                    <i class="fa-solid fa-user mr-2"></i>Users
                    @if($viewType === 'all')
                        ({{ $stats['users'] }})
                    @endif
                </button>
                <button wire:click="setViewType('anonymous')"
                        class="px-4 py-2 rounded-lg font-medium transition-colors {{ $viewType === 'anonymous' ? 'bg-yellow-600 text-white' : 'bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }}">
                    <i class="fa-solid fa-user-secret mr-2"></i>Anonymous
                    @if($viewType === 'all')
                        ({{ $stats['anonymous'] }})
                    @endif
                </button>
                <button wire:click="setViewType('bots')"
                        class="px-4 py-2 rounded-lg font-medium transition-colors {{ $viewType === 'bots' ? 'bg-red-600 text-white' : 'bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }}">
                    <i class="fa-solid fa-robot mr-2"></i>Bots
                    @if($viewType === 'all')
                        ({{ $stats['bots'] }})
                    @endif
                </button>
                <button wire:click="setViewType('all')"
                        class="px-4 py-2 rounded-lg font-medium transition-colors {{ $viewType === 'all' ? 'bg-gray-600 text-white' : 'bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }}">
                    <i class="fa-solid fa-list mr-2"></i>All
                </button>
            </div>

            {{-- Search --}}
            <div class="w-full md:w-64">
                <input type="text"
                       wire:model.live.debounce.300ms="searchTerm"
                       placeholder="Search visitors..."
                       class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500">
            </div>
        </div>
    </div>

    {{-- Visitor Summary List --}}
    <div class="space-y-4">
        @forelse($visitorSummary as $visitor)
            <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden">
                {{-- Visitor Summary Header --}}
                <div wire:click="toggleExpanded('{{ $visitor->username }}')"
                     class="p-4 cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-4">
                            {{-- Icon --}}
                            <div class="w-12 h-12 rounded-full flex items-center justify-center text-2xl
                                {{ $visitor->visitor_type === 'user' ? 'bg-blue-100 dark:bg-blue-900' : '' }}
                                {{ $visitor->visitor_type === 'anonymous' ? 'bg-yellow-100 dark:bg-yellow-900' : '' }}
                                {{ $visitor->visitor_type === 'bot' ? 'bg-red-100 dark:bg-red-900' : '' }}">
                                @if($visitor->visitor_type === 'user')
                                    <i class="fa-solid fa-user text-blue-600 dark:text-blue-400"></i>
                                @elseif($visitor->visitor_type === 'anonymous')
                                    <i class="fa-solid fa-user-secret text-yellow-600 dark:text-yellow-400"></i>
                                @else
                                    <i class="fa-solid fa-robot text-red-600 dark:text-red-400"></i>
                                @endif
                            </div>

                            {{-- Info --}}
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    {{ $visitor->username }}
                                </h3>
                                <div class="flex gap-4 text-sm text-gray-600 dark:text-gray-400">
                                    <span>
                                        <i class="fa-solid fa-chart-simple mr-1"></i>
                                        {{ $visitor->visit_count }} {{ Str::plural('session', $visitor->visit_count) }}
                                    </span>
                                    <span>
                                        <i class="fa-solid fa-calendar-days mr-1"></i>
                                        {{ $visitor->unique_days }} {{ Str::plural('day', $visitor->unique_days) }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="text-right">
                            <div class="text-sm text-gray-500 dark:text-gray-400">
                                Last visit: {{ $visitor->last_visit->diffForHumans() }}
                            </div>
                            <div class="text-xs text-gray-400 dark:text-gray-500">
                                First: {{ $visitor->first_visit->format('M d, Y H:i') }}
                            </div>
                            <i class="fa-solid fa-chevron-{{ $expandedVisitor === $visitor->username ? 'up' : 'down' }} text-gray-400 mt-2"></i>
                        </div>
                    </div>
                </div>

                {{-- Detailed Visits (Expandable) --}}
                @if($expandedVisitor === $visitor->username && $detailedVisits)
                    <div class="border-t border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900">
                        <div class="p-4">
                            <h4 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                                <i class="fa-solid fa-list mr-2"></i>Session History ({{ $detailedVisits->count() }} sessions)
                            </h4>
                            <div class="space-y-2 max-h-96 overflow-y-auto">
                                @foreach($detailedVisits as $visit)
                                    <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded p-3 {{ $visit->is_active ? 'border-l-4 border-l-green-500' : '' }}">

                                        {{-- Active Session Badge --}}
                                        @if($visit->is_active)
                                            <div class="mb-2">
                                                <span class="inline-flex items-center px-2 py-1 rounded text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                                    <i class="fa-solid fa-circle-dot mr-1 animate-pulse"></i>Active Session
                                                </span>
                                            </div>
                                        @endif

                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-2 text-sm">
                                            {{-- Session Start --}}
                                            <div>
                                                <span class="text-gray-500 dark:text-gray-400">Session Started:</span>
                                                <span class="text-gray-900 dark:text-white font-medium ml-2">
                                                    {{ $visit->connected_at->format('M d, Y H:i:s') }}
                                                </span>
                                            </div>

                                            {{-- Session End --}}
                                            <div>
                                                <span class="text-gray-500 dark:text-gray-400">Session Ended:</span>
                                                <span class="text-gray-900 dark:text-white ml-2">
                                                    @if($visit->disconnected_at)
                                                        {{ $visit->disconnected_at->format('M d, Y H:i:s') }}
                                                    @else
                                                        <span class="text-green-600 dark:text-green-400 font-medium">Active Now</span>
                                                    @endif
                                                </span>
                                            </div>

                                            {{-- Duration --}}
                                            <div>
                                                <span class="text-gray-500 dark:text-gray-400">Duration:</span>
                                                <span class="text-gray-900 dark:text-white ml-2 font-medium">
                                                    {{ $visit->duration_formatted }}
                                                </span>
                                            </div>

                                            {{-- Last Page Visited --}}
                                            <div>
                                                <span class="text-gray-500 dark:text-gray-400">Last Page:</span>
                                                <span class="text-gray-900 dark:text-white ml-2 font-mono text-xs">
                                                    {{ Str::limit($visit->page_url, 40) }}
                                                </span>
                                            </div>

                                            {{-- Browser --}}
                                            <div>
                                                <span class="text-gray-500 dark:text-gray-400">Browser:</span>
                                                <span class="text-gray-900 dark:text-white ml-2">
                                                    {{ $visit->browser ?? 'Unknown' }}
                                                </span>
                                            </div>

                                            {{-- Platform --}}
                                            <div>
                                                <span class="text-gray-500 dark:text-gray-400">Platform:</span>
                                                <span class="text-gray-900 dark:text-white ml-2">
                                                    {{ $visit->platform ?? 'Unknown' }}
                                                </span>
                                            </div>

                                            {{-- IP Address --}}
                                            <div>
                                                <span class="text-gray-500 dark:text-gray-400">IP:</span>
                                                <span class="text-gray-900 dark:text-white ml-2 font-mono text-xs">
                                                    {{ $visit->ip_address }}
                                                </span>
                                            </div>

                                            {{-- Device Type --}}
                                            <div>
                                                <span class="text-gray-500 dark:text-gray-400">Device:</span>
                                                <span class="text-gray-900 dark:text-white ml-2">
                                                    <i class="fa-solid fa-{{ $visit->is_mobile ? 'mobile-screen' : 'desktop' }} mr-1"></i>
                                                    {{ $visit->is_mobile ? 'Mobile' : 'Desktop' }}
                                                </span>
                                            </div>
                                        </div>

                                        {{-- Session Summary --}}
                                        <div class="mt-2 pt-2 border-t border-gray-200 dark:border-gray-700 text-xs text-gray-500 dark:text-gray-400">
                                            <i class="fa-solid fa-clock mr-1"></i>
                                            Session from {{ $visit->connected_at->diffForHumans() }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        @empty
            <div class="text-center py-12 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg">
                <i class="fa-solid fa-chart-line text-gray-300 dark:text-gray-600 text-6xl mb-4"></i>
                <p class="text-xl text-gray-500 dark:text-gray-400">No visitors found for the selected filter.</p>
            </div>
        @endforelse
    </div>

    {{-- Pagination --}}
    <div class="mt-6">
        {{ $visitorSummary->links() }}
    </div>
</div>