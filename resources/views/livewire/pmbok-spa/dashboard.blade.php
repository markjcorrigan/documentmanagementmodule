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
                <a href="{{ url('pmboknutshell') }}" target="_blank"
                   class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    PMBOK6 How To
                </a>
                <a href="{{ asset('storage/assets/pmboksixcomplex.pdf') }}" target="_blank"
                   class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    PMBOK 6 Process Map image as a 1000 ft overview
                </a>
            </div>
        </div>

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
            <!-- Initiating - DARKENED -->
            <div class="bg-gradient-to-br from-green-50 to-green-100 dark:from-green-900/50 dark:to-green-800/50 rounded-xl p-4 border-2 border-green-300 dark:border-green-500">
                <h3 class="font-bold text-green-900 dark:text-green-100 mb-1">
                    <i class="fa-duotone fa-rocket-launch mr-2"></i>Initiating
                </h3>
                <p class="text-sm text-green-800 dark:text-green-200">2 processes</p>
            </div>

            <!-- Planning - DARKENED -->
            <div class="bg-gradient-to-br from-blue-50 to-blue-100 dark:from-blue-900/50 dark:to-blue-800/50 rounded-xl p-4 border-2 border-blue-300 dark:border-blue-500">
                <h3 class="font-bold text-blue-900 dark:text-blue-100 mb-1">
                    <i class="fa-duotone fa-clipboard-list mr-2"></i>Planning
                </h3>
                <p class="text-sm text-blue-800 dark:text-blue-200">24 processes</p>
            </div>

            <!-- Executing - Already good -->
            <div class="bg-gradient-to-br from-purple-50 to-purple-100 dark:from-purple-900/30 dark:to-purple-800/30 rounded-xl p-4 border-2 border-purple-300 dark:border-purple-600">
                <h3 class="font-bold text-purple-900 dark:text-purple-200 mb-1">
                    <i class="fa-duotone fa-gears mr-2"></i>Executing
                </h3>
                <p class="text-sm text-purple-800 dark:text-purple-300">10 processes</p>
            </div>

            <!-- Monitoring - Already good -->
            <div class="bg-gradient-to-br from-amber-50 to-amber-100 dark:from-amber-900/30 dark:to-amber-800/30 rounded-xl p-4 border-2 border-amber-300 dark:border-amber-600">
                <h3 class="font-bold text-amber-900 dark:text-amber-200 mb-1">
                    <i class="fa-duotone fa-chart-line mr-2"></i>Monitoring
                </h3>
                <p class="text-sm text-amber-800 dark:text-amber-300">12 processes</p>
            </div>

            <!-- Closing - DARKENED -->
            <div class="bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-700/60 dark:to-gray-600/60 rounded-xl p-4 border-2 border-gray-300 dark:border-gray-500">
                <h3 class="font-bold text-gray-900 dark:text-gray-100 mb-1">
                    <i class="fa-duotone fa-flag-checkered mr-2"></i>Closing
                </h3>
                <p class="text-sm text-gray-800 dark:text-gray-200">1 process</p>
            </div>
        </div>

        <!-- Knowledge Areas Grid -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">
                <i class="fa-duotone fa-books mr-2 text-blue-600"></i>
                Knowledge Areas
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

                <!-- Integration Management - DARKENED -->
                <div class="bg-gradient-to-br from-blue-50 to-blue-100 dark:from-blue-900/50 dark:to-blue-800/50 rounded-xl p-6 border-2 border-blue-300 dark:border-blue-500 hover:shadow-lg transition-all group">
                    <div class="flex items-start justify-between mb-3">
                        <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i class="fa-duotone fa-diagram-project text-white text-xl"></i>
                        </div>
                        <span class="px-3 py-1 bg-blue-600 text-white text-xs font-bold rounded-full">7</span>
                    </div>
                    <h3 class="font-bold text-blue-900 dark:text-blue-100 mb-1">Integration Management</h3>
                    <p class="text-sm text-blue-800 dark:text-blue-200">Chapter 4 • 7 processes</p>
                </div>

                <!-- Scope Management - DARKENED -->
                <div class="bg-gradient-to-br from-green-50 to-green-100 dark:from-green-900/50 dark:to-green-800/50 rounded-xl p-6 border-2 border-green-300 dark:border-green-500 hover:shadow-lg transition-all group">
                    <div class="flex items-start justify-between mb-3">
                        <div class="w-12 h-12 bg-green-600 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i class="fa-duotone fa-bullseye text-white text-xl"></i>
                        </div>
                        <span class="px-3 py-1 bg-green-600 text-white text-xs font-bold rounded-full">6</span>
                    </div>
                    <h3 class="font-bold text-green-900 dark:text-green-100 mb-1">Scope Management</h3>
                    <p class="text-sm text-green-800 dark:text-green-200">Chapter 5 • 6 processes</p>
                </div>

                <!-- Schedule Management - Already good -->
                <div class="bg-gradient-to-br from-purple-50 to-purple-100 dark:from-purple-900/30 dark:to-purple-800/30 rounded-xl p-6 border-2 border-purple-300 dark:border-purple-600 hover:shadow-lg transition-all group">
                    <div class="flex items-start justify-between mb-3">
                        <div class="w-12 h-12 bg-purple-600 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i class="fa-duotone fa-calendar-days text-white text-xl"></i>
                        </div>
                        <span class="px-3 py-1 bg-purple-600 text-white text-xs font-bold rounded-full">6</span>
                    </div>
                    <h3 class="font-bold text-purple-900 dark:text-purple-200 mb-1">Schedule Management</h3>
                    <p class="text-sm text-purple-800 dark:text-purple-300">Chapter 6 • 6 processes</p>
                </div>

                <!-- Cost Management - Already good -->
                <div class="bg-gradient-to-br from-yellow-50 to-yellow-100 dark:from-yellow-900/30 dark:to-yellow-800/30 rounded-xl p-6 border-2 border-yellow-300 dark:border-yellow-600 hover:shadow-lg transition-all group">
                    <div class="flex items-start justify-between mb-3">
                        <div class="w-12 h-12 bg-yellow-600 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i class="fa-duotone fa-dollar-sign text-white text-xl"></i>
                        </div>
                        <span class="px-3 py-1 bg-yellow-600 text-white text-xs font-bold rounded-full">4</span>
                    </div>
                    <h3 class="font-bold text-yellow-900 dark:text-yellow-200 mb-1">Cost Management</h3>
                    <p class="text-sm text-yellow-800 dark:text-yellow-300">Chapter 7 • 4 processes</p>
                </div>

                <!-- Quality Management - Already good -->
                <div class="bg-gradient-to-br from-red-50 to-red-100 dark:from-red-900/30 dark:to-red-800/30 rounded-xl p-6 border-2 border-red-300 dark:border-red-600 hover:shadow-lg transition-all group">
                    <div class="flex items-start justify-between mb-3">
                        <div class="w-12 h-12 bg-red-600 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i class="fa-duotone fa-badge-check text-white text-xl"></i>
                        </div>
                        <span class="px-3 py-1 bg-red-600 text-white text-xs font-bold rounded-full">3</span>
                    </div>
                    <h3 class="font-bold text-red-900 dark:text-red-200 mb-1">Quality Management</h3>
                    <p class="text-sm text-red-800 dark:text-red-300">Chapter 8 • 3 processes</p>
                </div>

                <!-- Resource Management - Already good -->
                <div class="bg-gradient-to-br from-indigo-50 to-indigo-100 dark:from-indigo-900/30 dark:to-indigo-800/30 rounded-xl p-6 border-2 border-indigo-300 dark:border-indigo-600 hover:shadow-lg transition-all group">
                    <div class="flex items-start justify-between mb-3">
                        <div class="w-12 h-12 bg-indigo-600 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i class="fa-duotone fa-users text-white text-xl"></i>
                        </div>
                        <span class="px-3 py-1 bg-indigo-600 text-white text-xs font-bold rounded-full">6</span>
                    </div>
                    <h3 class="font-bold text-indigo-900 dark:text-indigo-200 mb-1">Resource Management</h3>
                    <p class="text-sm text-indigo-800 dark:text-indigo-300">Chapter 9 • 6 processes</p>
                </div>

                <!-- Communications Management - DARKENED -->
                <div class="bg-gradient-to-br from-pink-50 to-pink-100 dark:from-pink-900/50 dark:to-pink-800/50 rounded-xl p-6 border-2 border-pink-300 dark:border-pink-500 hover:shadow-lg transition-all group">
                    <div class="flex items-start justify-between mb-3">
                        <div class="w-12 h-12 bg-pink-600 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i class="fa-duotone fa-comments text-white text-xl"></i>
                        </div>
                        <span class="px-3 py-1 bg-pink-600 text-white text-xs font-bold rounded-full">3</span>
                    </div>
                    <h3 class="font-bold text-pink-900 dark:text-pink-100 mb-1">Communications Management</h3>
                    <p class="text-sm text-pink-800 dark:text-pink-200">Chapter 10 • 3 processes</p>
                </div>

                <!-- Risk Management - DARKENED -->
                <div class="bg-gradient-to-br from-orange-50 to-orange-100 dark:from-orange-900/50 dark:to-orange-800/50 rounded-xl p-6 border-2 border-orange-300 dark:border-orange-500 hover:shadow-lg transition-all group">
                    <div class="flex items-start justify-between mb-3">
                        <div class="w-12 h-12 bg-orange-600 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i class="fa-duotone fa-triangle-exclamation text-white text-xl"></i>
                        </div>
                        <span class="px-3 py-1 bg-orange-600 text-white text-xs font-bold rounded-full">7</span>
                    </div>
                    <h3 class="font-bold text-orange-900 dark:text-orange-100 mb-1">Risk Management</h3>
                    <p class="text-sm text-orange-800 dark:text-orange-200">Chapter 11 • 7 processes</p>
                </div>

                <!-- Procurement Management - Already good -->
                <div class="bg-gradient-to-br from-teal-50 to-teal-100 dark:from-teal-900/30 dark:to-teal-800/30 rounded-xl p-6 border-2 border-teal-300 dark:border-teal-600 hover:shadow-lg transition-all group">
                    <div class="flex items-start justify-between mb-3">
                        <div class="w-12 h-12 bg-teal-600 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i class="fa-duotone fa-handshake text-white text-xl"></i>
                        </div>
                        <span class="px-3 py-1 bg-teal-600 text-white text-xs font-bold rounded-full">3</span>
                    </div>
                    <h3 class="font-bold text-teal-900 dark:text-teal-200 mb-1">Procurement Management</h3>
                    <p class="text-sm text-teal-800 dark:text-teal-300">Chapter 12 • 3 processes</p>
                </div>

                <!-- Stakeholder Management - Already good -->
                <div class="bg-gradient-to-br from-cyan-50 to-cyan-100 dark:from-cyan-900/30 dark:to-cyan-800/30 rounded-xl p-6 border-2 border-cyan-300 dark:border-cyan-600 hover:shadow-lg transition-all group">
                    <div class="flex items-start justify-between mb-3">
                        <div class="w-12 h-12 bg-cyan-600 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i class="fa-duotone fa-user-group text-white text-xl"></i>
                        </div>
                        <span class="px-3 py-1 bg-cyan-600 text-white text-xs font-bold rounded-full">4</span>
                    </div>
                    <h3 class="font-bold text-cyan-900 dark:text-cyan-200 mb-1">Stakeholder Management</h3>
                    <p class="text-sm text-cyan-800 dark:text-cyan-300">Chapter 13 • 4 processes</p>
                </div>

            </div>
        </div>

    </div>
</div>