<div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Header -->
        <div class="mb-8 flex justify-between items-center">
            <div>
                <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-2">
                    <i class="fa-duotone fa-diagram-project mr-3 text-blue-600"></i> PMBOK Dashboard
                </h1>
                <p class="text-gray-600 dark:text-gray-400">
                    Navigate through 49 project management processes organized by knowledge areas and process groups
                </p>
            </div>

            <!-- Right-aligned buttons -->
            <div class="flex space-x-3">
                <a href="{{ url('pmboksix/sixone') }}"
                   class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Legacy
                </a>
                <a href="{{ asset('storage/assets/pmboksixcomplex.pdf') }}" target="_blank"
                   class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Process Map
                </a>
            </div>
        </div>


        {{--        <div class="mb-8">--}}
{{--            <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-2">--}}
{{--                <i class="fa-duotone fa-diagram-project mr-3 text-blue-600"></i>--}}
{{--                PMBOK Dashboard--}}
{{--            </h1>--}}
{{--            <p class="text-gray-600 dark:text-gray-400">--}}
{{--                Navigate through 49 project management processes organized by knowledge areas and process groups--}}
{{--            </p>--}}
{{--        </div>--}}

        <!-- Current Project Info -->
        @if($currentProject)
            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 border-2 border-blue-200 dark:border-blue-700 rounded-xl p-6 mb-8 shadow-lg">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <div class="w-16 h-16 bg-blue-600 rounded-xl flex items-center justify-center">
                            <i class="fa-duotone fa-folder-open text-white text-3xl"></i>
                        </div>
                        <div>
                            <p class="text-sm text-blue-600 dark:text-blue-300 font-semibold">Active Project</p>
                            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $currentProject->name }}</h2>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                                {{ $currentProject->pmbok_notes_count ?? 0 }} / 49 processes documented • {{ $currentProject->progress }}% complete
                            </p>
                        </div>
                    </div>
                    <button wire:click="goToProjects"
                            class="px-6 py-3 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 text-blue-600 dark:text-blue-400 rounded-xl font-semibold transition-all shadow-md border-2 border-blue-200 dark:border-blue-700">
                        <i class="fa-solid fa-exchange mr-2"></i>
                        Change Project
                    </button>
                </div>
            </div>
        @else
            <div class="bg-gray-50 dark:bg-gray-800/50 border border-gray-200 dark:border-gray-700 rounded-xl p-4 mb-6">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <i class="fa-duotone fa-info-circle text-gray-500 dark:text-gray-400 text-2xl"></i>
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                Working without a project. <span class="font-semibold text-gray-700 dark:text-gray-300">Notes will be saved globally.</span>
                            </p>
                            <p class="text-xs text-gray-500 dark:text-gray-500 mt-1">
                                Optional: Use projects to organize notes by client, initiative, or phase.
                            </p>
                        </div>
                    </div>
                    <button wire:click="goToProjects"
                            class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold transition-all text-sm shadow-md">
                        <i class="fa-solid fa-folder-open mr-2"></i>
                        Use a Project
                    </button>
                </div>
            </div>
        @endif

        <!-- PMBOK Dashboard Image with Clickable Areas -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8 mb-8">
            <livewire:pmbok-spa.dashboard-map />

            <div class="mt-6 text-center">
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    <i class="fa-solid fa-computer-mouse mr-2"></i>
                    Click on any process area to view details, ITTOs, and add notes
                </p>
            </div>
        </div>

        <!-- Process Groups Overview -->
        <div class="grid grid-cols-1 md:grid-cols-5 gap-4 mb-8">
            <div class="bg-gradient-to-br from-green-50 to-green-100 dark:from-green-900/20 dark:to-green-800/20 rounded-xl p-4 border-2 border-green-200 dark:border-green-700">
                <h3 class="font-bold text-green-900 dark:text-green-300 mb-1">
                    <i class="fa-duotone fa-rocket-launch mr-2"></i>Initiating
                </h3>
                <p class="text-sm text-green-700 dark:text-green-400">2 processes</p>
            </div>

            <div class="bg-gradient-to-br from-blue-50 to-blue-100 dark:from-blue-900/20 dark:to-blue-800/20 rounded-xl p-4 border-2 border-blue-200 dark:border-blue-700">
                <h3 class="font-bold text-blue-900 dark:text-blue-300 mb-1">
                    <i class="fa-duotone fa-clipboard-list mr-2"></i>Planning
                </h3>
                <p class="text-sm text-blue-700 dark:text-blue-400">24 processes</p>
            </div>

            <div class="bg-gradient-to-br from-purple-50 to-purple-100 dark:from-purple-900/20 dark:to-purple-800/20 rounded-xl p-4 border-2 border-purple-200 dark:border-purple-700">
                <h3 class="font-bold text-purple-900 dark:text-purple-300 mb-1">
                    <i class="fa-duotone fa-gears mr-2"></i>Executing
                </h3>
                <p class="text-sm text-purple-700 dark:text-purple-400">10 processes</p>
            </div>

            <div class="bg-gradient-to-br from-amber-50 to-amber-100 dark:from-amber-900/20 dark:to-amber-800/20 rounded-xl p-4 border-2 border-amber-200 dark:border-amber-700">
                <h3 class="font-bold text-amber-900 dark:text-amber-300 mb-1">
                    <i class="fa-duotone fa-chart-line mr-2"></i>Monitoring
                </h3>
                <p class="text-sm text-amber-700 dark:text-amber-400">12 processes</p>
            </div>

            <div class="bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900/20 dark:to-gray-800/20 rounded-xl p-4 border-2 border-gray-200 dark:border-gray-700">
                <h3 class="font-bold text-gray-900 dark:text-gray-300 mb-1">
                    <i class="fa-duotone fa-flag-checkered mr-2"></i>Closing
                </h3>
                <p class="text-sm text-gray-700 dark:text-gray-400">1 process</p>
            </div>
        </div>

        <!-- Knowledge Areas Grid -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">
                <i class="fa-duotone fa-books mr-2 text-blue-600"></i>
                Knowledge Areas
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @php
                    $knowledgeAreas = [
                        ['id' => 4, 'name' => 'Integration Management', 'icon' => 'diagram-project', 'color' => 'blue', 'count' => 7],
                        ['id' => 5, 'name' => 'Scope Management', 'icon' => 'bullseye', 'color' => 'green', 'count' => 6],
                        ['id' => 6, 'name' => 'Schedule Management', 'icon' => 'calendar-days', 'color' => 'purple', 'count' => 6],
                        ['id' => 7, 'name' => 'Cost Management', 'icon' => 'dollar-sign', 'color' => 'yellow', 'count' => 4],
                        ['id' => 8, 'name' => 'Quality Management', 'icon' => 'badge-check', 'color' => 'red', 'count' => 3],
                        ['id' => 9, 'name' => 'Resource Management', 'icon' => 'users', 'color' => 'indigo', 'count' => 6],
                        ['id' => 10, 'name' => 'Communications Management', 'icon' => 'comments', 'color' => 'pink', 'count' => 3],
                        ['id' => 11, 'name' => 'Risk Management', 'icon' => 'triangle-exclamation', 'color' => 'orange', 'count' => 7],
                        ['id' => 12, 'name' => 'Procurement Management', 'icon' => 'handshake', 'color' => 'teal', 'count' => 3],
                        ['id' => 13, 'name' => 'Stakeholder Management', 'icon' => 'user-group', 'color' => 'cyan', 'count' => 4],
                    ];
                @endphp

                @foreach($knowledgeAreas as $area)
                    <div class="bg-gradient-to-br from-{{ $area['color'] }}-50 to-{{ $area['color'] }}-100 dark:from-{{ $area['color'] }}-900/20 dark:to-{{ $area['color'] }}-800/20 rounded-xl p-6 border-2 border-{{ $area['color'] }}-200 dark:border-{{ $area['color'] }}-700 hover:shadow-lg transition-all cursor-pointer group">
                        <div class="flex items-start justify-between mb-3">
                            <div class="w-12 h-12 bg-{{ $area['color'] }}-600 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                                <i class="fa-duotone fa-{{ $area['icon'] }} text-white text-xl"></i>
                            </div>
                            <span class="px-3 py-1 bg-{{ $area['color'] }}-600 text-white text-xs font-bold rounded-full">
                                {{ $area['count'] }}
                            </span>
                        </div>
                        <h3 class="font-bold text-gray-900 dark:text-white mb-1">
                            {{ $area['name'] }}
                        </h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            Chapter {{ $area['id'] }} • {{ $area['count'] }} processes
                        </p>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</div>
