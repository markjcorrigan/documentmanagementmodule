<div class="text-center space-y-6" x-data>
    {{-- Main Heading --}}
    <h5 class="font-bold text-lg text-primary dark:text-primary-dark">
        Achieve Business Value through Productivity and Quality Improvements <br>
        off the stable base of Project Process Management <br>
        (<a href="{{ route('agile-traditional') }}" class="text-accent dark:text-accent-light underline hover:opacity-80 transition">
            Traditional or Agile
        </a>) <br>
        at Capability Maturity Model Level 2 (and above)
    </h5>

    {{-- Droppable Landing Area Around Main Image --}}
    <div id="droppable-area" class="border-4 border-dashed border-gray-400 dark:border-gray-600 rounded-lg p-6 transition-all duration-300 bg-gray-50 dark:bg-gray-900/30">
        {{-- Main Image --}}
        <div>
            <img
                    class="mx-auto max-w-full cursor-pointer transition duration-300"
                    src="{{ asset('storage/images/cmmproject2plus.png') }}"
                    id="main-image"
                    onmouseover="this.src='{{ asset('storage/images/cmmproject2plusshadedbezelled.png') }}'"
                    onmouseout="this.src='{{ asset('storage/images/cmmproject2plus.png') }}'"
                    title="Register with PMWay and let me help you find your way"
                    alt="CMMI Project Level 2+"
            >
        </div>

        {{-- Drop hint text --}}
        <p class="text-sm text-gray-600 dark:text-gray-400 mt-3 italic">
            Drag the pin into this area to pin down your Capability Maturity level
        </p>
    </div>
    {{-- Pin & Gateway --}}
    <div class="flex flex-col items-center gap-4">
        <img
                alt="gateway"
                class="max-w-full cursor-pointer transition duration-300"
                src="{{ asset('storage/images/gatewayflat.png') }}"
                id="gateway-image"
                onmouseover="this.src='{{ asset('storage/images/gateway.png') }}'"
                onmouseout="this.src='{{ asset('storage/images/gatewayflat.png') }}'"
        >
        <a href="{{ route('the-pmway') }}"
           title="Drag me into the dashed area above, then click me when you're ready!"
           class="draggable-pin">
            <img
                    id="pin"
                    alt="pin"
                    class="cursor-move"
                    src="{{ asset('storage/images/pinlarge.png') }}"
                    width="152"
                    height="144"
            >
        </a>
    </div>

    <p class="text-center italic text-secondary dark:text-secondary-dark">
        Drag the pin into the dashed area above to pin down your maturity level
    </p>
    <h5 class="text-primary dark:text-primary-dark font-semibold">
        PMWay is all about ideas to improve your game
    </h5>

    <p class="text-secondary dark:text-secondary-dark">
        Figure out the idea below and your Productivity and Quality will improve!
    </p>

    <img
            alt="blue arrow down"
            class="mx-auto max-w-full"
            src="{{ asset('storage/images/bluearrowdown.png') }}"
    >

    {{-- Problem Section --}}
    <div class="text-left space-y-2">
        <img
                alt="problem"
                class="max-w-full"
                src="{{ asset('storage/images/problem.png') }}"
        >
        <p class="italic text-secondary dark:text-secondary-dark">
            As with the 12 steps of AA and the recognition that a problem exists
            being the first step to recovery:
        </p>
    </div>

    <h3 class="text-center text-blue-600 dark:text-blue-400 font-bold text-xl">
        The first step in moving your
        "<a href="{{ route('gamestats') }}" class="underline text-blue-600 dark:text-blue-400 hover:opacity-80 transition">game stats</a>"
    </h3>

    <h5 class="text-center text-blue-600 dark:text-blue-400 font-semibold">
        from "Hero" to "Managed Processes Pro"
        is to take the "pin test"
    </h5>



    {{-- Collapsible Section --}}
    <div class="text-center mt-6">
        <div class="flex items-center justify-center w-full">
            <button
                    wire:click="toggleLevel1"
                    class="px-4 py-2 bg-blue-600 text-white dark:bg-blue-700 dark:text-white rounded shadow hover:opacity-90 transition duration-300 font-semibold flex items-center justify-center space-x-2"
            >
                <span class="text-center">CM Level 1? <br>What's it look like?</span>
                <!-- DOWN ARROW when closed -->
                <svg x-show="!$wire.showLevel1" class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
                <!-- UP ARROW when open -->
                <svg x-show="$wire.showLevel1" class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                </svg>
            </button>
        </div>

        <div x-show="$wire.showLevel1" x-transition x-cloak>
            <div class="mt-6 border rounded-lg p-6 bg-white dark:bg-gray-800 shadow space-y-4">
                <img class="mx-auto max-w-full" src="{{ asset('storage/images/cml1.png') }}" alt="Capability Maturity Level 1">
                <img class="mx-auto max-w-full" src="{{ asset('storage/images/noito.png') }}" alt="No ITO">
                <img class="mx-auto max-w-full" src="{{ asset('storage/images/emperorbare.png') }}" alt="Emperor Bare">

                <p>
                    <a href="{{ route('cmmi-level-one') }}" class="text-accent dark:text-accent-light underline hover:opacity-80 transition">
                        Click here for the Real Story at CM Level 1
                    </a>
                </p>

                <p class="italic text-secondary dark:text-secondary-dark">
                    Anything less (Capability Maturity Level 1 or below)
                    is the Emperor, proud of his new clothes!
                </p>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            initializeDraggable();
            initializeDroppable();
        });

        function initializeDraggable() {
            // Initialize draggable functionality
            $("#pin").draggable({
                revert: "invalid",
                cursor: "move",
                zIndex: 1000,
                containment: "document",
                start: function(event, ui) {
                    console.log('Pin drag started');
                    $(this).addClass('opacity-75');
                },
                stop: function(event, ui) {
                    console.log('Pin drag stopped');
                    $(this).removeClass('opacity-75');
                }
            });

            console.log('Pin draggable initialized');

            // Prevent the anchor tag from interfering with dragging
            $('.draggable-pin').on('click', function(e) {
                if ($(this).find('#pin').hasClass('ui-draggable-dragging')) {
                    e.preventDefault();
                }
            });
        }

        function initializeDroppable() {
            // Make the area droppable
            $("#droppable-area").droppable({
                accept: "#pin",
                tolerance: "touch",
                over: function(event, ui) {
                    console.log('Pin over droppable area');
                    $(this).removeClass('border-gray-400 dark:border-gray-600').addClass('border-blue-500 bg-blue-50 dark:bg-blue-900/50');
                    $(this).find('p').text('Drop the pin here!');
                },
                out: function(event, ui) {
                    console.log('Pin left droppable area');
                    $(this).removeClass('border-blue-500 bg-blue-50 dark:bg-blue-900/50').addClass('border-gray-400 dark:border-gray-600');
                    $(this).find('p').text('Drag the pin into this area to mark your capability maturity level');
                },
                drop: function(event, ui) {
                    console.log('Pin dropped in area');
                    $(this).removeClass('border-blue-500 bg-blue-50 dark:bg-blue-900/50').addClass('border-green-500 bg-green-50 dark:bg-green-900/50');
                    $(this).find('p').html('<span class="font-semibold text-green-600 dark:text-green-400">Success! Your Maturity Level has been pinned down.</span>');

                    setTimeout(() => {
                        $(this).removeClass('border-green-500 bg-green-50 dark:bg-green-900/50').addClass('border-gray-400 dark:border-gray-600');
                        $(this).find('p').text('Drag the pin into this area to mark your capability maturity level');
                    }, 3000);

                    // Show success message
                    showDropSuccess();
                }
            });

            console.log('Droppable area initialized');
        }

        function showDropSuccess() {
            const $message = $('<div class="fixed top-4 left-1/2 transform -translate-x-1/2 bg-green-500 text-white px-4 py-2 rounded-lg shadow-lg z-50">✓ Capability maturity level marked successfully!</div>');
            $('body').append($message);

            setTimeout(() => {
                $message.fadeOut(300, function() {
                    $(this).remove();
                });
            }, 3000);
        }

        // Reinitialize when Livewire updates
        document.addEventListener('livewire:load', function() {
            initializeDraggable();
            initializeDroppable();
        });

        document.addEventListener('livewire:update', function() {
            initializeDraggable();
            initializeDroppable();
        });
    </script>

    <style>
        [x-cloak] { display: none !important; }
        .ui-draggable-dragging {
            z-index: 1001 !important;
        }

        #droppable-area {
            transition: all 0.3s ease;
        }
    </style>
@endpush