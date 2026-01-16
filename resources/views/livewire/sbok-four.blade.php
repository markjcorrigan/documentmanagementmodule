<div class="sbok-container">
    <style>
        /* Scoped styles only for this component */
        .sbok-container {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .sbok-modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9);
        }

        .sbok-modal.active {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sbok-modal-content {
            max-width: 90%;
            max-height: 90vh;
            object-fit: contain;
            border-radius: 8px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.5);
        }

        .sbok-modal-close {
            position: absolute;
            top: 20px;
            right: 40px;
            color: white;
            font-size: 40px;
            font-weight: bold;
            cursor: pointer;
            transition: color 0.3s ease;
            background: rgba(0,0,0,0.5);
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            line-height: 1;
        }

        .sbok-modal-close:hover {
            color: #e74c3c;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .sbok-fade-in {
            animation: fadeIn 0.5s ease;
        }

        @media (max-width: 768px) {
            .sbok-modal-close {
                top: 10px;
                right: 10px;
                width: 40px;
                height: 40px;
                font-size: 30px;
            }
        }
    </style>

    <div class="max-w-[1600px] mx-auto bg-white dark:bg-gray-900 rounded-2xl shadow-xl overflow-hidden">
        <!-- Header -->
        <header class="bg-gradient-to-br from-slate-700 to-blue-600 dark:from-slate-900 dark:to-blue-800 text-white p-8 text-center">
            <h1 class="text-4xl font-bold mb-2">SBOK Guide - Scrum Processes Map</h1>
            <p class="text-lg opacity-90">Click on any process to view its detailed inputs, tools, and outputs</p>
        </header>

        <!-- Legend -->
        <div class="bg-yellow-50 dark:bg-yellow-900/20 p-4 m-5 rounded-lg shadow-sm" style="border-left: 4px solid rgb(234 179 8); box-shadow: 0 1px 2px 0 rgb(0 0 0 / 0.05);">
            <span class="font-semibold text-yellow-900 dark:text-yellow-200">Note:</span>
            <span class="text-yellow-900 dark:text-yellow-200"> Items marked with </span>
            <span class="text-red-600 dark:text-red-400 font-bold">*</span>
            <span class="text-yellow-900 dark:text-yellow-200"> are particularly important and represent key areas that must be followed in the Scrum process.</span>
        </div>

        <!-- Filter Controls -->
        <div class="p-5">
            <!-- Image Buttons Row -->
            <div class="flex justify-center gap-4 flex-wrap mb-4">
                <button onclick="showModal('/storage/images/processes.jpg')"
                        class="bg-green-600 hover:bg-green-700 dark:bg-green-600 dark:hover:bg-green-500 text-white px-8 py-3 rounded-full font-semibold transition-all duration-300 shadow-lg hover:shadow-xl hover:-translate-y-1">
                    View Process Diagram
                </button>
                <button onclick="showModal('/storage/images/blogpostimage_scrumprocessespppmc.jpg')"
                        class="bg-green-600 hover:bg-green-700 dark:bg-green-600 dark:hover:bg-green-500 text-white px-8 py-3 rounded-full font-semibold transition-all duration-300 shadow-lg hover:shadow-xl hover:-translate-y-1">
                    View Process Flow
                </button>
                <button onclick="showModal('/storage/images/blogpostimage_scrumframework.jpg')"
                        class="bg-green-600 hover:bg-green-700 dark:bg-green-600 dark:hover:bg-green-500 text-white px-8 py-3 rounded-full font-semibold transition-all duration-300 shadow-lg hover:shadow-xl hover:-translate-y-1">
                    View Backlogs Flow
                </button>
            </div>

            <!-- Middle Buttons Row -->
            <div class="flex justify-center gap-4 flex-wrap mb-4">
                <button onclick="showModal('/storage/images/pppmcperscrumedited.png')"
                        class="bg-green-600 hover:bg-green-700 dark:bg-green-600 dark:hover:bg-green-500 text-white px-8 py-3 rounded-full font-semibold transition-all duration-300 shadow-lg hover:shadow-xl hover:-translate-y-1">
                    View Team Interactions
                </button>
                <a href="/scrumfix"
                   class="bg-orange-500 hover:bg-orange-600 dark:bg-orange-600 dark:hover:bg-orange-500 text-white px-8 py-3 rounded-full font-bold transition-all duration-300 shadow-lg hover:shadow-xl hover:-translate-y-1">
                    Scrum RCA
                </a>
                <a href="/scrum-dashboards"
                   class="bg-orange-500 hover:bg-orange-600 dark:bg-orange-600 dark:hover:bg-orange-500 text-white px-8 py-3 rounded-full font-bold transition-all duration-300 shadow-lg hover:shadow-xl hover:-translate-y-1">
                    Drill Baby Drill
                </a>
            </div>

            <!-- Filter Buttons Row -->
            <div class="flex justify-center gap-4 flex-wrap">
                <button
                    wire:click="toggleFilter(false)"
                    class="px-8 py-3 rounded-full font-semibold transition-all duration-300 shadow-lg hover:shadow-xl hover:-translate-y-1 text-white
                    {{ !$showImportantOnly
                        ? 'bg-red-600 hover:bg-red-700 dark:bg-red-700 dark:hover:bg-red-600'
                        : 'bg-blue-600 hover:bg-blue-700 dark:bg-blue-700 dark:hover:bg-blue-600' }}">
                    Show All Items
                </button>
                <button
                    wire:click="toggleFilter(true)"
                    class="px-8 py-3 rounded-full font-semibold transition-all duration-300 shadow-lg hover:shadow-xl hover:-translate-y-1 text-white
                    {{ $showImportantOnly
                        ? 'bg-red-600 hover:bg-red-700 dark:bg-red-700 dark:hover:bg-red-600'
                        : 'bg-blue-600 hover:bg-blue-700 dark:bg-blue-700 dark:hover:bg-blue-600' }}">
                    Show Only Important Items (*)
                </button>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex flex-wrap p-5 gap-5">
            <!-- Processes Section -->
            <div class="flex-[1.5] min-w-[500px] max-lg:min-w-full p-5">
                <!-- INITIATE PHASE -->
                <div class="mb-8">
                    <div class="bg-gradient-to-br from-slate-600 to-slate-800 dark:from-slate-800 dark:to-slate-950 text-white p-4 rounded-lg text-xl font-semibold mb-4 shadow-md">
                        Chapter 8: Initiate
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
                        @foreach(['8.1', '8.2', '8.3', '8.4', '8.5', '8.6'] as $processId)
                            <div
                                wire:click="selectProcess('{{ $processId }}')"
                                class="cursor-pointer p-4 rounded-lg border-2 transition-all duration-300 hover:-translate-y-1 hover:shadow-lg
                                {{ $selectedProcess === $processId
                                    ? 'bg-gradient-to-br from-blue-600 to-blue-800 dark:from-blue-700 dark:to-blue-900 text-white border-slate-800 dark:border-slate-950'
                                    : 'bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 border-blue-600 dark:border-blue-500 hover:border-blue-800 dark:hover:border-blue-400' }}">
                                <div class="font-bold text-sm mb-1 {{ $selectedProcess === $processId ? 'text-white/90' : 'text-blue-600 dark:text-blue-400' }}">
                                    Process {{ $processId }}
                                </div>
                                <div class="font-semibold {{ $selectedProcess === $processId ? 'text-white' : 'text-gray-900 dark:text-gray-100' }}">
                                    {{ $processData[$processId]['process'] }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- PLAN AND ESTIMATE PHASE -->
                <div class="mb-8">
                    <div class="bg-gradient-to-br from-slate-600 to-slate-800 dark:from-slate-800 dark:to-slate-950 text-white p-4 rounded-lg text-xl font-semibold mb-4 shadow-md">
                        Chapter 9: Plan and Estimate
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
                        @foreach(['9.1', '9.2', '9.3', '9.4', '9.5'] as $processId)
                            <div
                                wire:click="selectProcess('{{ $processId }}')"
                                class="cursor-pointer p-4 rounded-lg border-2 transition-all duration-300 hover:-translate-y-1 hover:shadow-lg
                                {{ $selectedProcess === $processId
                                    ? 'bg-gradient-to-br from-blue-600 to-blue-800 dark:from-blue-700 dark:to-blue-900 text-white border-slate-800 dark:border-slate-950'
                                    : 'bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 border-blue-600 dark:border-blue-500 hover:border-blue-800 dark:hover:border-blue-400' }}">
                                <div class="font-bold text-sm mb-1 {{ $selectedProcess === $processId ? 'text-white/90' : 'text-blue-600 dark:text-blue-400' }}">
                                    Process {{ $processId }}
                                </div>
                                <div class="font-semibold {{ $selectedProcess === $processId ? 'text-white' : 'text-gray-900 dark:text-gray-100' }}">
                                    {{ $processData[$processId]['process'] }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- IMPLEMENT PHASE -->
                <div class="mb-8">
                    <div class="bg-gradient-to-br from-slate-600 to-slate-800 dark:from-slate-800 dark:to-slate-950 text-white p-4 rounded-lg text-xl font-semibold mb-4 shadow-md">
                        Chapter 10: Implement
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
                        @foreach(['10.1', '10.2', '10.3'] as $processId)
                            <div
                                wire:click="selectProcess('{{ $processId }}')"
                                class="cursor-pointer p-4 rounded-lg border-2 transition-all duration-300 hover:-translate-y-1 hover:shadow-lg
                                {{ $selectedProcess === $processId
                                    ? 'bg-gradient-to-br from-blue-600 to-blue-800 dark:from-blue-700 dark:to-blue-900 text-white border-slate-800 dark:border-slate-950'
                                    : 'bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 border-blue-600 dark:border-blue-500 hover:border-blue-800 dark:hover:border-blue-400' }}">
                                <div class="font-bold text-sm mb-1 {{ $selectedProcess === $processId ? 'text-white/90' : 'text-blue-600 dark:text-blue-400' }}">
                                    Process {{ $processId }}
                                </div>
                                <div class="font-semibold {{ $selectedProcess === $processId ? 'text-white' : 'text-gray-900 dark:text-gray-100' }}">
                                    {{ $processData[$processId]['process'] }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- REVIEW AND RETROSPECT PHASE -->
                <div class="mb-8">
                    <div class="bg-gradient-to-br from-slate-600 to-slate-800 dark:from-slate-800 dark:to-slate-950 text-white p-4 rounded-lg text-xl font-semibold mb-4 shadow-md">
                        Chapter 11: Review and Retrospect
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
                        @foreach(['11.1', '11.2', '11.3'] as $processId)
                            <div
                                wire:click="selectProcess('{{ $processId }}')"
                                class="cursor-pointer p-4 rounded-lg border-2 transition-all duration-300 hover:-translate-y-1 hover:shadow-lg
                                {{ $selectedProcess === $processId
                                    ? 'bg-gradient-to-br from-blue-600 to-blue-800 dark:from-blue-700 dark:to-blue-900 text-white border-slate-800 dark:border-slate-950'
                                    : 'bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 border-blue-600 dark:border-blue-500 hover:border-blue-800 dark:hover:border-blue-400' }}">
                                <div class="font-bold text-sm mb-1 {{ $selectedProcess === $processId ? 'text-white/90' : 'text-blue-600 dark:text-blue-400' }}">
                                    Process {{ $processId }}
                                </div>
                                <div class="font-semibold {{ $selectedProcess === $processId ? 'text-white' : 'text-gray-900 dark:text-gray-100' }}">
                                    {{ $processData[$processId]['process'] }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- RELEASE PHASE -->
                <div class="mb-8">
                    <div class="bg-gradient-to-br from-slate-600 to-slate-800 dark:from-slate-800 dark:to-slate-950 text-white p-4 rounded-lg text-xl font-semibold mb-4 shadow-md">
                        Chapter 12: Release
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
                        @foreach(['12.1', '12.2'] as $processId)
                            <div
                                wire:click="selectProcess('{{ $processId }}')"
                                class="cursor-pointer p-4 rounded-lg border-2 transition-all duration-300 hover:-translate-y-1 hover:shadow-lg
                                {{ $selectedProcess === $processId
                                    ? 'bg-gradient-to-br from-blue-600 to-blue-800 dark:from-blue-700 dark:to-blue-900 text-white border-slate-800 dark:border-slate-950'
                                    : 'bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 border-blue-600 dark:border-blue-500 hover:border-blue-800 dark:hover:border-blue-400' }}">
                                <div class="font-bold text-sm mb-1 {{ $selectedProcess === $processId ? 'text-white/90' : 'text-blue-600 dark:text-blue-400' }}">
                                    Process {{ $processId }}
                                </div>
                                <div class="font-semibold {{ $selectedProcess === $processId ? 'text-white' : 'text-gray-900 dark:text-gray-100' }}">
                                    {{ $processData[$processId]['process'] }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Details Section -->
            <div class="flex-1 min-w-[400px] max-lg:min-w-full p-5 max-h-[85vh] overflow-y-auto sticky top-5">
                @if(!$selectedProcess)
                    <div class="text-center p-10 text-gray-500 dark:text-gray-400 italic">
                        <h3 class="text-xl font-semibold mb-4 text-gray-700 dark:text-gray-300">Select a Process</h3>
                        <p class="mb-4">Click on any process box to view its detailed inputs, tools, and outputs.</p>
                        <p class="mb-4">Use the filter buttons above to toggle between:</p>
                        <ul class="text-left inline-block space-y-2">
                            <li><strong class="text-gray-700 dark:text-gray-300">Show All Items:</strong> Displays all inputs, tools, and outputs</li>
                            <li><strong class="text-gray-700 dark:text-gray-300">Show Only Important Items (*):</strong> Shows only the critical elements that must be followed</li>
                        </ul>
                    </div>
                @else
                    @php
                        $data = $processData[$selectedProcess];
                    @endphp
                    <div class="bg-gray-50 dark:bg-gray-800 border-l-4 border-blue-600 dark:border-blue-500 p-6 rounded-lg shadow-md sbok-fade-in">
                        <h3 class="text-slate-800 dark:text-slate-100 text-2xl font-semibold mb-4 pb-3 border-b-2 border-gray-200 dark:border-gray-700">
                            {{ $selectedProcess }} {{ $data['process'] }}
                        </h3>
                        <div class="mb-4 text-sm">
                            <strong class="text-blue-600 dark:text-blue-400">Process Group:</strong>
                            <span class="text-gray-700 dark:text-gray-300"> {{ $data['group'] }}</span>
                        </div>

                        <!-- Inputs -->
                        <div class="mt-5 mb-3">
                            <div class="font-bold text-slate-800 dark:text-slate-100 mb-2 text-lg pb-1 border-b border-gray-300 dark:border-gray-600">
                                Inputs
                            </div>
                            <ul class="space-y-0">
                                @foreach($data['inputs'] as $item)
                                    @php
                                        $isImportant = str_ends_with($item, '*');
                                        $text = rtrim($item, '*');
                                    @endphp
                                    @if(!$showImportantOnly || $isImportant)
                                        <li class="py-1.5 border-b border-gray-200 dark:border-gray-700 last:border-b-0 {{ $isImportant ? 'font-bold text-red-600 dark:text-red-400' : 'text-gray-700 dark:text-gray-300' }}">
                                            {{ $text }}@if($isImportant)<span class="text-red-600 dark:text-red-400"> *</span>@endif
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>

                        <!-- Tools -->
                        <div class="mt-5 mb-3">
                            <div class="font-bold text-slate-800 dark:text-slate-100 mb-2 text-lg pb-1 border-b border-gray-300 dark:border-gray-600">
                                Tools
                            </div>
                            <ul class="space-y-0">
                                @foreach($data['tools'] as $item)
                                    @php
                                        $isImportant = str_ends_with($item, '*');
                                        $text = rtrim($item, '*');
                                    @endphp
                                    @if(!$showImportantOnly || $isImportant)
                                        <li class="py-1.5 border-b border-gray-200 dark:border-gray-700 last:border-b-0 {{ $isImportant ? 'font-bold text-red-600 dark:text-red-400' : 'text-gray-700 dark:text-gray-300' }}">
                                            {{ $text }}@if($isImportant)<span class="text-red-600 dark:text-red-400"> *</span>@endif
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>

                        <!-- Outputs -->
                        <div class="mt-5 mb-3">
                            <div class="font-bold text-slate-800 dark:text-slate-100 mb-2 text-lg pb-1 border-b border-gray-300 dark:border-gray-600">
                                Outputs
                            </div>
                            <ul class="space-y-0">
                                @foreach($data['outputs'] as $item)
                                    @php
                                        $isImportant = str_ends_with($item, '*');
                                        $text = rtrim($item, '*');
                                    @endphp
                                    @if(!$showImportantOnly || $isImportant)
                                        <li class="py-1.5 border-b border-gray-200 dark:border-gray-700 last:border-b-0 {{ $isImportant ? 'font-bold text-red-600 dark:text-red-400' : 'text-gray-700 dark:text-gray-300' }}">
                                            {{ $text }}@if($isImportant)<span class="text-red-600 dark:text-red-400"> *</span>@endif
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Footer -->
        <footer class="text-center p-5 bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-400 text-sm">
            <p>SBOK Guide - Scrum Processes Interactive Map | Based on SBOK Framework</p>
            <p class="mt-1 text-xs">19 Processes across 5 Process Groups</p>
        </footer>
    </div>

    <!-- Image Modal -->
    <div id="imageModal" class="sbok-modal">
        <span class="sbok-modal-close" onclick="closeModal()">&times;</span>
        <img class="sbok-modal-content" id="modalImage" alt="Process Diagram">
    </div>

    <script>
        function showModal(imageSrc) {
            const modal = document.getElementById('imageModal');
            const modalImage = document.getElementById('modalImage');
            modalImage.src = imageSrc;
            modal.classList.add('active');
        }

        function closeModal() {
            const modal = document.getElementById('imageModal');
            modal.classList.remove('active');
        }

        // Close modal when clicking outside
        document.getElementById('imageModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeModal();
            }
        });
    </script>
</div>
