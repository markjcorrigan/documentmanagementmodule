<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    <!-- Sticky Process Title Bar - UPDATED: Removed Legacy and Process Map buttons -->
    <div class="sticky top-0 z-50 bg-white dark:bg-gray-900 border-b-4 border-blue-500 shadow-xl -mx-4 px-4 py-3">
        <div class="w-full mx-auto">
            <!-- Main Flex Container - Stacks on Mobile, Row on Desktop -->
            <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between gap-3">

                <!-- LEFT SECTION: Back Button + Process Name + ID Badge -->
                <div class="flex items-center space-x-3 flex-1 min-w-0 w-full lg:w-auto">
                    <!-- Back Button -->
                    <button wire:click="backToDashboard"
                            class="flex-shrink-0 text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 p-2 hover:bg-blue-50 dark:hover:bg-blue-900/20 rounded-lg transition-all">
                        <i class="fa-solid fa-arrow-left text-lg lg:text-xl"></i>
                    </button>

                    <!-- Process Name + ID Container -->
                    <div class="flex flex-wrap items-center gap-2 flex-1 min-w-0">
                        <!-- PROCESS NAME - Responsive sizing with truncation -->
                        <h1 class="text-lg sm:text-xl md:text-2xl lg:text-3xl font-black text-gray-900 dark:text-white truncate max-w-full">
                            {{ $process['name'] }}
                        </h1>

                        <!-- Process ID Badge - Compact on mobile -->
                        <span class="flex-shrink-0 inline-flex items-center px-2 py-1 lg:px-3 lg:py-1.5 bg-blue-600 text-white text-xs sm:text-sm md:text-base font-bold rounded-lg shadow-md">
                        <i class="fa-solid fa-hashtag mr-1 text-xs"></i>
                        {{ $process['id'] }}
                    </span>
                    </div>
                </div>

                <!-- RIGHT SECTION: Quick Navigation Buttons - UPDATED: Only 3 buttons now -->
                <div class="flex items-center gap-2 flex-shrink-0 w-full lg:w-auto overflow-x-auto pb-1 lg:pb-0 scrollbar-hide">

                    <!-- Dashboard Button -->
                    <a href="#dashboard-location"
                       class="flex items-center px-2.5 py-1.5 lg:px-3 lg:py-2 bg-purple-100 dark:bg-purple-900/30 text-purple-700 dark:text-purple-300 rounded-lg hover:bg-purple-200 dark:hover:bg-purple-900/50 transition-all text-xs lg:text-sm font-semibold whitespace-nowrap">
                        <i class="fa-solid fa-map-location-dot mr-1.5"></i>
                        <span class="hidden sm:inline">Dashboard</span>
                        <span class="sm:hidden">Dash</span>
                    </a>

                    <!-- ITTOs Button -->
                    <a href="#ittos"
                       class="flex items-center px-2.5 py-1.5 lg:px-3 lg:py-2 bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300 rounded-lg hover:bg-blue-200 dark:hover:bg-blue-900/50 transition-all text-xs lg:text-sm font-semibold whitespace-nowrap">
                        <i class="fa-solid fa-list-check mr-1.5"></i>
                        <span>ITTOs</span>
                    </a>

                    <!-- Notes Button -->
                    <a href="#notes"
                       class="flex items-center px-2.5 py-1.5 lg:px-3 lg:py-2 bg-amber-100 dark:bg-amber-900/30 text-amber-700 dark:text-amber-300 rounded-lg hover:bg-amber-200 dark:hover:bg-amber-900/50 transition-all text-xs lg:text-sm font-semibold whitespace-nowrap">
                        <i class="fa-solid fa-note-sticky mr-1.5"></i>
                        <span>Notes</span>
                    </a>

                </div>
            </div>

            <!-- Second Row: Metadata - Also responsive -->
            <div class="flex flex-wrap items-center gap-x-3 gap-y-1 mt-2 text-xs md:text-sm text-gray-600 dark:text-gray-400">
            <span class="flex items-center whitespace-nowrap">
                <i class="fa-solid fa-layer-group mr-1.5 text-blue-500"></i>
                <strong class="font-semibold">{{ $process['group'] }}</strong>
            </span>
                <span class="hidden sm:inline text-gray-300 dark:text-gray-600">•</span>
                <span class="flex items-center whitespace-nowrap">
                <i class="fa-solid fa-books mr-1.5 text-purple-500"></i>
                <strong class="font-semibold">{{ $process['area'] }} Management</strong>
            </span>
                <span class="hidden sm:inline text-gray-300 dark:text-gray-600">•</span>
                <span class="flex items-center whitespace-nowrap">
                <i class="fa-solid fa-book-open mr-1.5 text-indigo-500"></i>
                PMBOK 6
            </span>
            </div>
        </div>
    </div>

    {{-- Add this utility class to your CSS to hide scrollbar on button container --}}
    <style>
        .scrollbar-hide {
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }
        .scrollbar-hide::-webkit-scrollbar {
            display: none;  /* Chrome, Safari, Opera */
        }
    </style>

    <!-- SECTION 1: Dashboard with Current Process Highlighted -->
    <div id="dashboard-location" class="mb-8 scroll-mt-24">
        <h3 class="text-xl md:text-2xl font-bold text-gray-900 dark:text-white mb-4 flex items-center">
            <i class="fa-solid fa-map-location-dot text-purple-600 dark:text-purple-400 mr-3"></i>
            Process Location on Dashboard
        </h3>

        @livewire('pmbok-spa.dashboard-map', ['highlightedProcessId' => $process['id'], 'readOnly' => true])
    </div>

    <!-- SECTION 2: ITTOs -->
    <div id="ittos" class="mb-8 scroll-mt-24">
        <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6 flex items-center">
            <i class="fa-solid fa-list-check text-indigo-600 dark:text-indigo-400 mr-3 text-4xl"></i>
            Inputs, Tools & Techniques, Outputs
        </h2>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Inputs -->
            <div
                class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border-2 border-blue-200 dark:border-blue-700 hover:shadow-xl transition-shadow">
                <div class="flex items-center mb-6">
                    <div
                        class="flex items-center justify-center w-14 h-14 bg-blue-600 dark:bg-blue-500 rounded-xl mr-4 shadow-lg">
                        <i class="fa-solid fa-right-to-bracket text-white text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white">Inputs</h3>
                        <p class="text-xs text-blue-600 dark:text-blue-400 flex items-center mt-1">
                            <i class="fa-solid fa-layer-group mr-1"></i>
                            {{ count($inputs) }} items
                        </p>
                    </div>
                </div>
                <ul class="space-y-3">
                    @forelse($inputs as $input)
                        <li class="flex items-start group hover:bg-blue-50 dark:hover:bg-blue-900/20 p-2 rounded-lg transition-colors">
                            <i class="fa-solid fa-circle text-blue-600 dark:text-blue-400 text-xs mt-1.5 mr-3 group-hover:scale-125 transition-transform"></i>
                            <span class="text-gray-700 dark:text-gray-300 text-sm leading-relaxed">{{ $input }}</span>
                        </li>
                    @empty
                        <li class="text-gray-500 dark:text-gray-400 italic flex items-center">
                            <i class="fa-solid fa-circle-exclamation mr-2"></i>
                            No inputs defined yet
                        </li>
                    @endforelse
                </ul>
            </div>

            <!-- Tools & Techniques -->
            <div
                class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border-2 border-purple-200 dark:border-purple-700 hover:shadow-xl transition-shadow">
                <div class="flex items-center mb-6">
                    <div
                        class="flex items-center justify-center w-14 h-14 bg-purple-600 dark:bg-purple-500 rounded-xl mr-4 shadow-lg">
                        <i class="fa-solid fa-wrench text-white text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white">Tools & Techniques</h3>
                        <p class="text-xs text-purple-600 dark:text-purple-400 flex items-center mt-1">
                            <i class="fa-solid fa-layer-group mr-1"></i>
                            {{ count($tools) }} items
                        </p>
                    </div>
                </div>
                <ul class="space-y-3">
                    @forelse($tools as $tool)
                        <li class="flex items-start group hover:bg-purple-50 dark:hover:bg-purple-900/20 p-2 rounded-lg transition-colors">
                            <i class="fa-solid fa-circle text-purple-600 dark:text-purple-400 text-xs mt-1.5 mr-3 group-hover:scale-125 transition-transform"></i>
                            <span class="text-gray-700 dark:text-gray-300 text-sm leading-relaxed">{{ $tool }}</span>
                        </li>
                    @empty
                        <li class="text-gray-500 dark:text-gray-400 italic flex items-center">
                            <i class="fa-solid fa-circle-exclamation mr-2"></i>
                            No tools defined yet
                        </li>
                    @endforelse
                </ul>
            </div>

            <!-- Outputs -->
            <div
                class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border-2 border-green-200 dark:border-green-700 hover:shadow-xl transition-shadow">
                <div class="flex items-center mb-6">
                    <div
                        class="flex items-center justify-center w-14 h-14 bg-green-600 dark:bg-green-500 rounded-xl mr-4 shadow-lg">
                        <i class="fa-solid fa-right-from-bracket text-white text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white">Outputs</h3>
                        <p class="text-xs text-green-600 dark:text-green-400 flex items-center mt-1">
                            <i class="fa-solid fa-layer-group mr-1"></i>
                            {{ count($outputs) }} items
                        </p>
                    </div>
                </div>
                <ul class="space-y-3">
                    @forelse($outputs as $output)
                        <li class="flex items-start group hover:bg-green-50 dark:hover:bg-green-900/20 p-2 rounded-lg transition-colors">
                            <i class="fa-solid fa-circle text-green-600 dark:text-green-400 text-xs mt-1.5 mr-3 group-hover:scale-125 transition-transform"></i>
                            <span class="text-gray-700 dark:text-gray-300 text-sm leading-relaxed">{{ $output }}</span>
                        </li>
                    @empty
                        <li class="text-gray-500 dark:text-gray-400 italic flex items-center">
                            <i class="fa-solid fa-circle-exclamation mr-2"></i>
                            No outputs defined yet
                        </li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>

    <!-- SECTION 3: CREATE NEW NOTES -->
    <div id="notes" class="mb-8 scroll-mt-24">

        <!-- Success Message - MOVED HERE (directly above notes section) -->
        @if (session()->has('message'))
            <div class="mb-6 bg-green-50 dark:bg-green-900/20 border-l-4 border-green-500 text-green-800 dark:text-green-200 px-4 md:px-6 py-4 rounded-lg shadow-lg animate-pulse">
                <div class="flex items-center">
                    <i class="fa-solid fa-circle-check text-green-600 dark:text-green-400 text-xl md:text-2xl mr-3"></i>
                    <span class="font-semibold text-sm md:text-base">{{ session('message') }}</span>
                </div>
            </div>
        @endif

        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-xl p-6 border-2 border-gray-200 dark:border-gray-700">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6 flex items-center">
                <i class="fa-solid fa-pen-to-square text-amber-600 dark:text-amber-400 mr-3 text-3xl"></i>
                Create New Note
            </h2>

            <!-- Note Input Area -->
            <div class="mb-4">
                <div class="flex items-center justify-between mb-2">
                    <label for="notes-textarea" class="text-sm font-semibold text-gray-900 dark:text-gray-100">
                        <i class="fa-solid fa-message-lines mr-1"></i>
                        Note Content
                    </label>
                    <button
                        type="button"
                        wire:click="$set('notes', '')"
                        class="flex items-center px-3 py-1 text-xs font-semibold text-red-700 dark:text-red-300 bg-red-100 dark:bg-red-900/30 hover:bg-red-200 dark:hover:bg-red-900/50 rounded-lg transition-all">
                        <i class="fa-solid fa-eraser mr-1.5"></i>
                        Clear
                    </button>
                </div>
                <textarea
                    id="notes-textarea"
                    wire:model="notes"
                    rows="12"
                    class="w-full px-4 py-3 border-2 border-gray-300 dark:border-gray-600 rounded-lg
                           focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                           bg-white dark:bg-gray-900
                           text-gray-900 dark:text-gray-100
                           placeholder-gray-500 dark:placeholder-gray-400
                           resize-y font-mono text-sm transition-all"
                    placeholder="Enter your notes here... You can type multiple lines and paragraphs.

Tips for better notes:
- Be specific about what you observed
- Include dates, names, or references
- Note any decisions made
- Record action items or next steps"
                ></textarea>
                <p class="mt-2 text-xs text-gray-600 dark:text-gray-400 flex items-center">
                    <i class="fa-solid fa-circle-info mr-1"></i>
                    Plain text format. Line breaks will be preserved when saved.
                </p>
            </div>

            <!-- Save Buttons -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Productive/Positive Button -->
                <button
                    wire:click="saveNotes('positive')"
                    type="button"
                    class="bg-green-600 hover:bg-green-700 active:bg-green-800
                           text-white font-bold text-lg
                           px-6 py-4 rounded-xl
                           shadow-lg hover:shadow-xl
                           transform hover:-translate-y-0.5
                           transition-all duration-200
                           flex items-center justify-center space-x-3">
                    <i class="fa-solid fa-thumbs-up text-xl"></i>
                    <span>Save as Productive</span>
                </button>

                <!-- Unproductive/Negative Button -->
                <button
                    wire:click="saveNotes('negative')"
                    type="button"
                    class="bg-red-600 hover:bg-red-700 active:bg-red-800
                           text-white font-bold text-lg
                           px-6 py-4 rounded-xl
                           shadow-lg hover:shadow-xl
                           transform hover:-translate-y-0.5
                           transition-all duration-200
                           flex items-center justify-center space-x-3">
                    <i class="fa-solid fa-thumbs-down text-xl"></i>
                    <span>Save as Unproductive</span>
                </button>
            </div>

            <!-- Helper Text -->
            <div class="mt-6 p-4 bg-blue-50 dark:bg-blue-900/20 border-2 border-blue-200 dark:border-blue-700 rounded-lg">
                <div class="flex items-start space-x-3">
                    <i class="fa-solid fa-lightbulb text-blue-600 dark:text-blue-400 text-xl mt-0.5"></i>
                    <div class="flex-1">
                        <h4 class="font-semibold text-gray-900 dark:text-white mb-1">When to use each button:</h4>
                        <ul class="text-sm text-gray-700 dark:text-gray-300 space-y-1">
                            <li><strong class="text-green-700 dark:text-green-400">Productive:</strong> Progress made, goals achieved, positive outcomes, successful decisions</li>
                            <li><strong class="text-red-700 dark:text-red-400">Unproductive:</strong> Blockers encountered, issues found, delays, things that didn't work</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SECTION 4: Notes History -->
    @if($processNotes->isNotEmpty())
        <div class="mb-8">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-200 dark:border-gray-700">
                <!-- RESPONSIVE: Stack on mobile, row on desktop -->
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 mb-6">

                    <!-- Title and Badge -->
                    <h3 class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-white flex flex-wrap items-center gap-2">
                        <span class="flex items-center">
                            <i class="fa-solid fa-clock-rotate-left text-blue-600 dark:text-blue-400 mr-2"></i>
                            Notes History
                        </span>
                        <span class="px-3 py-1 bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300 text-xs sm:text-sm font-bold rounded-full">
                            {{ $processNotes->count() }} {{ Str::plural('note', $processNotes->count()) }}
                        </span>
                    </h3>

                    <!-- Print Buttons - Stack on mobile, row on tablet+ -->
                    <div class="flex flex-col xs:flex-row items-stretch xs:items-center gap-2 w-full sm:w-auto">
                        <button
                            onclick="printAllNotes()"
                            class="flex items-center justify-center px-4 py-2 bg-indigo-500 hover:bg-indigo-600 text-white rounded-lg transition-all text-sm font-semibold shadow-sm hover:shadow-md whitespace-nowrap">
                            <i class="fa-solid fa-print mr-2"></i>
                            Print All
                        </button>
                        <button
                            onclick="printSelectedNotes()"
                            class="flex items-center justify-center px-4 py-2 bg-purple-500 hover:bg-purple-600 text-white rounded-lg transition-all text-sm font-semibold shadow-sm hover:shadow-md whitespace-nowrap">
                            <i class="fa-solid fa-print mr-2"></i>
                            Print Selected
                        </button>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                        <tr class="bg-gray-50 dark:bg-gray-700 border-b-2 border-gray-200 dark:border-gray-600">
                            <th class="px-4 py-3 text-center w-12">
                                <input
                                    type="checkbox"
                                    id="select-all-notes"
                                    onclick="toggleAllNotes(this)"
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </th>
                            <th class="px-4 py-3 text-left text-xs font-bold text-gray-700 dark:text-gray-200 uppercase tracking-wider">
                                <i class="fa-solid fa-calendar mr-1"></i>
                                Date & Time
                            </th>
                            <th class="px-4 py-3 text-left text-xs font-bold text-gray-700 dark:text-gray-200 uppercase tracking-wider">
                                <i class="fa-solid fa-flag mr-1"></i>
                                Status
                            </th>
                            <th class="px-4 py-3 text-left text-xs font-bold text-gray-700 dark:text-gray-200 uppercase tracking-wider">
                                <i class="fa-solid fa-message-lines mr-1"></i>
                                Notes
                            </th>
                            <th class="px-4 py-3 text-center text-xs font-bold text-gray-700 dark:text-gray-200 uppercase tracking-wider">
                                <i class="fa-solid fa-ellipsis mr-1"></i>
                                Actions
                            </th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($processNotes as $note)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/30 transition-colors note-row" data-note-id="{{ $note->id }}">
                                <td class="px-4 py-4 text-center">
                                    <input
                                        type="checkbox"
                                        class="note-checkbox w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                                        data-note-id="{{ $note->id }}"
                                        data-date="{{ $note->created_at->format('M d, Y h:i A') }}"
                                        data-status="{{ $note->productive ? 'Productive' : 'Unproductive' }}"
                                        data-notes="{{ base64_encode($note->notes) }}">
                                </td>
                                <td class="px-4 py-4 text-sm text-gray-900 dark:text-gray-300 whitespace-nowrap">
                                    <div class="flex flex-col">
                                        <span class="font-semibold">{{ $note->created_at->format('M d, Y') }}</span>
                                        <span class="text-xs text-gray-500 dark:text-gray-400">{{ $note->created_at->format('h:i A') }}</span>
                                    </div>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap">
                                    @if($note->productive)
                                        <span class="inline-flex items-center px-3 py-1.5 rounded-full text-xs font-bold bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-300 border border-green-200 dark:border-green-800">
                                            <i class="fa-solid fa-thumbs-up mr-1.5"></i>
                                            Productive
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-3 py-1.5 rounded-full text-xs font-bold bg-red-100 dark:bg-red-900/30 text-red-800 dark:text-red-300 border border-red-200 dark:border-red-800">
                                            <i class="fa-solid fa-thumbs-down mr-1.5"></i>
                                            Unproductive
                                        </span>
                                    @endif
                                </td>
                                <td class="px-4 py-4 text-sm text-gray-700 dark:text-gray-300">
                                    <div class="max-w-2xl">
                                        <p class="whitespace-pre-wrap leading-relaxed">{{ $note->notes }}</p>
                                    </div>
                                </td>
                                <td class="px-4 py-4 text-center whitespace-nowrap">
                                    <div class="flex items-center justify-center gap-2">
                                        <button
                                            onclick="printSingleNoteById({{ $note->id }})"
                                            class="inline-flex items-center px-3 py-1.5 bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300 rounded-lg hover:bg-blue-200 dark:hover:bg-blue-900/50 transition-all text-xs font-semibold"
                                            title="Print this note">
                                            <i class="fa-solid fa-print mr-1"></i>
                                            Print
                                        </button>
                                        <button
                                            wire:click="deleteNote({{ $note->id }})"
                                            wire:confirm="Are you sure you want to delete this note? This action cannot be undone."
                                            class="inline-flex items-center px-3 py-1.5 bg-red-100 dark:bg-red-900/30 text-red-700 dark:text-red-300 rounded-lg hover:bg-red-200 dark:hover:bg-red-900/50 transition-all text-xs font-semibold">
                                            <i class="fa-solid fa-trash-can mr-1"></i>
                                            Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif

    <!-- Quick Navigation to Related Processes -->
    <div class="mt-8 bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-200 dark:border-gray-700">
        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4 flex items-center">
            <i class="fa-solid fa-sitemap text-indigo-600 dark:text-indigo-400 mr-3"></i>
            Other {{ $process['area'] }} Management Processes
        </h3>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3">
            @foreach(collect($allProcesses)->where('area', $process['area']) as $relatedProcess)
                <button
                    wire:click="navigateToProcess('{{ $relatedProcess['id'] }}')"
                    class="group text-left p-3 rounded-lg border-2 transition-all duration-200 transform hover:-translate-y-1
                           {{ $relatedProcess['id'] === $process['id']
                              ? 'border-blue-600 bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 shadow-lg'
                              : 'border-gray-200 dark:border-gray-700 hover:border-blue-400 dark:hover:border-blue-500 hover:bg-gray-50 dark:hover:bg-gray-700 hover:shadow-md' }}">
                    <div class="font-semibold text-gray-900 dark:text-white text-sm mb-1">
                        @if($relatedProcess['id'] === $process['id'])
                            <i class="fa-solid fa-circle-check text-blue-600 mr-1"></i>
                        @else
                            <i class="fa-regular fa-circle text-gray-400 mr-1"></i>
                        @endif
                        {{ $relatedProcess['id'] }}
                    </div>
                    <div class="text-xs text-gray-600 dark:text-gray-400 leading-tight">
                        {{ $relatedProcess['name'] }}
                    </div>
                </button>
            @endforeach
        </div>
    </div>

</div>

@push('scripts')
    <script>
        // ============ SMOOTH SCROLL FIX ============
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('href');
                    const targetElement = document.querySelector(targetId);

                    if (targetElement) {
                        const headerOffset = 120; // Account for sticky header
                        const elementPosition = targetElement.getBoundingClientRect().top;
                        const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

                        window.scrollTo({
                            top: offsetPosition,
                            behavior: 'smooth'
                        });
                    }
                });
            });
        });

        // ============ PRINT FUNCTIONALITY ============
        // Detect if parent window is in dark mode
        function isDarkMode() {
            return document.documentElement.classList.contains('dark');
        }

        // Print functionality with proper dark mode detection
        function escapeHtml(text) {
            if (!text) return '';
            const div = document.createElement('div');
            div.textContent = text;
            return div.innerHTML;
        }

        function createPrintWindow(title, content) {
            const darkMode = isDarkMode();

            let html = '<!DOCTYPE html><html><head><title>' + title + '</title>';
            html += '<meta charset="UTF-8">';
            html += '<style>';

            if (darkMode) {
                html += 'body { font-family: Arial, sans-serif; padding: 20px; line-height: 1.6; background: #1f2937; color: #f3f4f6; }';
                html += 'h1 { color: #f3f4f6; border-bottom: 3px solid #3b82f6; padding-bottom: 10px; margin-bottom: 10px; }';
                html += 'h2 { color: #d1d5db; margin-top: 5px; margin-bottom: 20px; }';
                html += '.note { margin: 20px 0; padding: 15px; border: 1px solid #4b5563; border-radius: 8px; background: #374151; }';
                html += '.note-header { display: flex; justify-content: space-between; margin-bottom: 10px; padding-bottom: 10px; border-bottom: 1px solid #4b5563; }';
                html += '.note-date { font-weight: bold; color: #f3f4f6; }';
                html += '.note-content { white-space: pre-wrap; margin-top: 10px; color: #e5e7eb; }';
                html += '.status-productive { background: #065f46; color: #d1fae5; border: 1px solid #059669; padding: 4px 12px; border-radius: 12px; font-size: 12px; font-weight: bold; }';
                html += '.status-unproductive { background: #991b1b; color: #fee2e2; border: 1px solid #dc2626; padding: 4px 12px; border-radius: 12px; font-size: 12px; font-weight: bold; }';
                html += '.controls { margin-top: 20px; text-align: center; }';
                html += '.controls button { padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; font-size: 16px; font-weight: 600; }';
                html += '.btn-print { background: #3b82f6; color: white; }';
                html += '.btn-print:hover { background: #2563eb; }';
                html += '.btn-close { background: #6b7280; color: white; margin-left: 10px; }';
                html += '.btn-close:hover { background: #9ca3af; }';
            } else {
                html += 'body { font-family: Arial, sans-serif; padding: 20px; line-height: 1.6; background: #ffffff; color: #1f2937; }';
                html += 'h1 { color: #1f2937; border-bottom: 3px solid #2563eb; padding-bottom: 10px; margin-bottom: 10px; }';
                html += 'h2 { color: #4b5563; margin-top: 5px; margin-bottom: 20px; }';
                html += '.note { margin: 20px 0; padding: 15px; border: 1px solid #d1d5db; border-radius: 8px; background: #f9fafb; }';
                html += '.note-header { display: flex; justify-content: space-between; margin-bottom: 10px; padding-bottom: 10px; border-bottom: 1px solid #d1d5db; }';
                html += '.note-date { font-weight: bold; color: #1f2937; }';
                html += '.note-content { white-space: pre-wrap; margin-top: 10px; color: #374151; }';
                html += '.status-productive { background: #d1fae5; color: #065f46; border: 1px solid #6ee7b7; padding: 4px 12px; border-radius: 12px; font-size: 12px; font-weight: bold; }';
                html += '.status-unproductive { background: #fee2e2; color: #991b1b; border: 1px solid #fca5a5; padding: 4px 12px; border-radius: 12px; font-size: 12px; font-weight: bold; }';
                html += '.controls { margin-top: 20px; text-align: center; }';
                html += '.controls button { padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; font-size: 16px; font-weight: 600; }';
                html += '.btn-print { background: #2563eb; color: white; }';
                html += '.btn-print:hover { background: #1d4ed8; }';
                html += '.btn-close { background: #6b7280; color: white; margin-left: 10px; }';
                html += '.btn-close:hover { background: #4b5563; }';
            }

            html += '@media print { .no-print { display: none; } body { padding: 10px; } .note { break-inside: avoid; page-break-inside: avoid; } }';
            html += '</style>';
            html += '</head><body>';
            html += content;
            html += '<div class="no-print controls">';
            html += '<button onclick="window.print()" class="btn-print">🖨️ Print</button>';
            html += '<button onclick="window.close()" class="btn-close">✖️ Close</button>';
            html += '</div>';
            html += '</body></html>';

            const win = window.open('', '_blank', 'width=800,height=600');
            win.document.write(html);
            win.document.close();
        }

        function printSingleNoteById(noteId) {
            const checkbox = document.querySelector('.note-checkbox[data-note-id="' + noteId + '"]');
            if (!checkbox) return;

            const date = checkbox.getAttribute('data-date');
            const status = checkbox.getAttribute('data-status');
            const notesBase64 = checkbox.getAttribute('data-notes');
            const notes = atob(notesBase64);

            const processName = '{{ $process["name"] ?? "Process" }}';
            const processId = '{{ $process["id"] ?? "" }}';
            const projectName = '{{ $processNotes->isNotEmpty() && $processNotes->first()->project ? $processNotes->first()->project->name : "" }}';

            let content = '<h1>' + escapeHtml(processName) + ' (' + processId + ')</h1>';
            if (projectName) {
                content += '<h2>Project: ' + escapeHtml(projectName) + '</h2>';
            }

            content += '<div class="note">';
            content += '<div class="note-header">';
            content += '<span class="note-date">' + escapeHtml(date) + '</span>';
            content += '<span class="status-' + (status === 'Productive' ? 'productive' : 'unproductive') + '">' + status + '</span>';
            content += '</div>';
            content += '<div class="note-content">' + escapeHtml(notes) + '</div>';
            content += '</div>';

            createPrintWindow('Print Note - ' + processName, content);
        }

        function printAllNotes() {
            const processName = '{{ $process["name"] ?? "Process" }}';
            const processId = '{{ $process["id"] ?? "" }}';
            const projectName = '{{ $processNotes->isNotEmpty() && $processNotes->first()->project ? $processNotes->first()->project->name : "" }}';

            let content = '<h1>' + escapeHtml(processName) + ' (' + processId + ')</h1>';
            if (projectName) {
                content += '<h2>Project: ' + escapeHtml(projectName) + '</h2>';
            }
            content += '<p><strong>All Notes (' + document.querySelectorAll('.note-checkbox').length + ' total)</strong></p>';

            const checkboxes = document.querySelectorAll('.note-checkbox');
            checkboxes.forEach(function(checkbox) {
                const date = checkbox.getAttribute('data-date');
                const status = checkbox.getAttribute('data-status');
                const notesBase64 = checkbox.getAttribute('data-notes');
                const notes = atob(notesBase64);

                content += '<div class="note">';
                content += '<div class="note-header">';
                content += '<span class="note-date">' + escapeHtml(date) + '</span>';
                content += '<span class="status-' + (status === 'Productive' ? 'productive' : 'unproductive') + '">' + status + '</span>';
                content += '</div>';
                content += '<div class="note-content">' + escapeHtml(notes) + '</div>';
                content += '</div>';
            });

            createPrintWindow('Print All Notes - ' + processName, content);
        }

        function printSelectedNotes() {
            const checkboxes = document.querySelectorAll('.note-checkbox:checked');

            if (checkboxes.length === 0) {
                alert('Please select at least one note to print.');
                return;
            }

            const processName = '{{ $process["name"] ?? "Process" }}';
            const processId = '{{ $process["id"] ?? "" }}';
            const projectName = '{{ $processNotes->isNotEmpty() && $processNotes->first()->project ? $processNotes->first()->project->name : "" }}';

            let content = '<h1>' + escapeHtml(processName) + ' (' + processId + ')</h1>';
            if (projectName) {
                content += '<h2>Project: ' + escapeHtml(projectName) + '</h2>';
            }
            content += '<p><strong>Selected Notes (' + checkboxes.length + ' of ' + document.querySelectorAll('.note-checkbox').length + ')</strong></p>';

            checkboxes.forEach(function(checkbox) {
                const date = checkbox.getAttribute('data-date');
                const status = checkbox.getAttribute('data-status');
                const notesBase64 = checkbox.getAttribute('data-notes');
                const notes = atob(notesBase64);

                content += '<div class="note">';
                content += '<div class="note-header">';
                content += '<span class="note-date">' + escapeHtml(date) + '</span>';
                content += '<span class="status-' + (status === 'Productive' ? 'productive' : 'unproductive') + '">' + status + '</span>';
                content += '</div>';
                content += '<div class="note-content">' + escapeHtml(notes) + '</div>';
                content += '</div>';
            });

            createPrintWindow('Print Selected Notes - ' + processName, content);
        }

        function toggleAllNotes(checkbox) {
            const checkboxes = document.querySelectorAll('.note-checkbox');
            checkboxes.forEach(function(cb) {
                cb.checked = checkbox.checked;
            });
        }

        // ============ LIVEWIRE FUNCTIONALITY ============
        document.addEventListener('livewire:initialized', () => {
            if (typeof Livewire !== 'undefined') {
                Livewire.on('resetSavedTick', () => {
                    setTimeout(() => {
                        if (window.Livewire && typeof window.Livewire.find === 'function') {
                            const component = window.Livewire.find('LnSQyysg8nBpTtKd2jdD');
                            if (component) {
                                component.set('savedButton', null);
                            }
                        }
                    }, 2000);
                });
            }
        });
    </script>
@endpush
