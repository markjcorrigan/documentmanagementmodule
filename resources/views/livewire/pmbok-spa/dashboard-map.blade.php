<div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 mb-8">

    @if(!$showAsReadOnly)
        <!-- Only show selected info banner on main dashboard - UPDATED WITH RESPONSIVE FIX -->
        <div id="selected-info" class="mb-4 p-4 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg shadow-lg hidden transform transition-all duration-300">

            <!-- Main container - Stack vertically on mobile, row on desktop -->
            <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between gap-3">

                <!-- Left: Process Info -->
                <div class="flex-1 w-full lg:w-auto">
                    <p class="text-xs sm:text-sm opacity-90">Selected Process</p>
                    <p id="selected-text" class="text-lg sm:text-xl lg:text-2xl font-bold break-words"></p>
                </div>

                <!-- Right: Buttons - Stack vertically on mobile, row on larger screens -->
                <div class="flex flex-col sm:flex-row gap-2 w-full lg:w-auto">

                    <!-- View Details Button -->
                    <button id="view-details-btn"
                            class="w-full sm:w-auto bg-white text-blue-600 px-4 py-2 rounded-lg font-semibold hover:bg-blue-50 transition-colors text-sm flex items-center justify-center whitespace-nowrap">
                        <i class="fa-solid fa-eye mr-2"></i>
                        <span>View Details</span>
                    </button>

                    <!-- View ITTOs Button -->
                    <button id="view-ittos-btn"
                            class="w-full sm:w-auto bg-blue-700 text-white px-4 py-2 rounded-lg font-semibold hover:bg-blue-800 transition-colors text-sm flex items-center justify-center whitespace-nowrap">
                        <i class="fa-solid fa-list-check mr-2"></i>
                        <span>View ITTOs</span>
                    </button>

                    <!-- Close Button -->
                    <button onclick="document.getElementById('selected-info').classList.add('hidden')"
                            class="w-full sm:w-auto text-white hover:text-blue-200 px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors text-sm flex items-center justify-center">
                        <i class="fa-solid fa-times mr-2 sm:mr-0"></i>
                        <span class="sm:hidden">Close</span>
                    </button>
                </div>
            </div>
        </div>
    @else
        <!-- Show location badge on process page -->
        <div class="mb-4 p-4 bg-gradient-to-r from-purple-500 to-purple-600 text-white rounded-lg shadow-lg">
            <div class="flex items-center">
                <i class="fa-solid fa-location-crosshairs text-2xl mr-3"></i>
                <div>
                    <p class="text-sm opacity-90">Your Current Location</p>
                    <p class="text-xl font-bold">Process {{ $highlightedProcessId }}</p>
                    <p class="text-sm opacity-75">Click any other process to navigate</p>
                </div>
            </div>
        </div>
    @endif

    <div class="relative inline-block w-full">
        <img src="{{ asset('storage/images/pmbok/dashboard.png') }}"
             alt="PMBOK 6 Dashboard"
             class="w-full h-auto rounded-lg"
             id="pmbok-dashboard">

        <div id="overlay-container"></div>
    </div>
</div>

<script>
    const processes = @js($processes ?? []);
    const highlightedId = @js($highlightedProcessId);
    const isReadOnly = @js($showAsReadOnly);
    let scale = 1;
    let originalWidth = 0;
    let selectedProcessId = highlightedId; // Pre-select the highlighted process

    function updateOverlays() {
        const img = document.getElementById('pmbok-dashboard');
        const container = document.getElementById('overlay-container');

        if (!img || !container || !img.complete) return;

        originalWidth = img.naturalWidth;
        scale = img.clientWidth / originalWidth;

        container.innerHTML = '';

        processes.forEach(process => {
            const div = document.createElement('div');
            div.id = 'process-box-' + process.id;
            div.style.position = 'absolute';
            div.style.top = (process.y * scale) + 'px';
            div.style.left = (process.x * scale) + 'px';
            div.style.width = ((process.x2 - process.x) * scale) + 'px';
            div.style.height = ((process.y2 - process.y) * scale) + 'px';
            div.style.cursor = 'pointer';
            div.style.transition = 'all 0.2s';
            div.style.zIndex = '10';
            div.title = (process.code || process.id) + ' - ' + process.name;

            // Highlight current process with green, others with blue
            if (highlightedId && process.id === highlightedId) {
                div.style.backgroundColor = 'rgba(34, 197, 94, 0.4)';
                div.style.borderColor = 'rgb(34, 197, 94)';
                div.style.border = '3px solid';
                div.style.zIndex = '20';
            } else {
                div.style.backgroundColor = 'rgba(59, 130, 246, 0.1)';
                div.style.border = '2px solid transparent';
            }

            div.addEventListener('click', (e) => {
                e.preventDefault();
                e.stopPropagation();
                if (!isReadOnly) {
                    selectProcess(process);
                } else {
                    // On process page, navigate to clicked process
                @this.selectProcess(process.id);
                }
            });

            div.addEventListener('mouseenter', () => {
                if (!(highlightedId && process.id === highlightedId)) {
                    div.style.backgroundColor = 'rgba(59, 130, 246, 0.3)';
                    div.style.borderColor = 'rgb(37, 99, 235)';
                }
            });

            div.addEventListener('mouseleave', () => {
                if (!(highlightedId && process.id === highlightedId)) {
                    div.style.backgroundColor = 'rgba(59, 130, 246, 0.1)';
                    div.style.borderColor = 'transparent';
                }
            });

            container.appendChild(div);
        });
    }

    function selectProcess(process) {
        selectedProcessId = process.id;

        document.getElementById('selected-text').textContent =
            (process.code || process.id) + ': ' + process.name;
        document.getElementById('selected-info').classList.remove('hidden');

        document.getElementById('view-details-btn').onclick = () => {
        @this.selectProcess(process.id);
        };

        document.getElementById('view-ittos-btn').onclick = () => {
            window.location.href = `/pmbok-spa/process/${process.id}#ittos`;
        };

        document.getElementById('selected-info').scrollIntoView({
            behavior: 'smooth',
            block: 'nearest'
        });

        updateOverlays();
    }

    const img = document.getElementById('pmbok-dashboard');
    if (img.complete) {
        updateOverlays();
    } else {
        img.addEventListener('load', updateOverlays);
    }

    window.addEventListener('resize', updateOverlays);
    setTimeout(updateOverlays, 100);
</script>
