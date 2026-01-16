<div class="max-w-6xl mx-auto px-4 py-8" x-data="{ showLevel1: false }">
    <style>
        #pin, #pin-guest {
            cursor: grab;
            user-select: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
        }

        #pin:active, #pin-guest:active {
            cursor: grabbing;
        }

        /* Prevent dragging from triggering link clicks */
        .draggable-pin {
            touch-action: none;
        }
    </style>

    @auth
        {{-- Logged-in user view --}}
        <div class="text-center space-y-6">
            <h5 class="text-center text-xl font-semibold text-gray-900 dark:text-white">
                Achieve Business Value through Productivity and Quality Improvements<br>
                off the stable base of Project Process Management (Traditional or Agile)<br>at Capability Maturity Model Level 2 (and above)
            </h5>

            <div class="relative inline-block">
                <img
                        id="target"
                        class="mx-auto w-full max-w-2xl rounded-lg shadow-md cursor-pointer transition-all duration-300"
                        src="{{ asset('storage/images/cmmproject2plus.png') }}"
                        x-on:mouseover="document.getElementById('target').src='{{ asset('storage/images/cmmproject2plusshadedbezelled.png') }}'"
                        x-on:mouseout="document.getElementById('target').src='{{ asset('storage/images/cmmproject2plus.png') }}'"
                        alt="Capability Maturity Model"
                        title="Register with PMWay and let me help you find your way"
                >
            </div>

            <h5 class="text-lg font-semibold text-gray-900 dark:text-white">PMWay is all about ideas to improve your game</h5>
            <p class="text-gray-700 dark:text-gray-300">Figure out the idea below and your Productivity and Quality will improve!</p>

            <img alt="blue arrow down" class="mx-auto w-16 h-16" src="{{ asset('storage/images/bluearrowdown.png') }}">

            <div class="text-left max-w-4xl mx-auto">
                <img alt="problem" class="w-16 h-16 mb-4" src="{{ asset('storage/images/problem.png') }}">
                <p class="italic text-gray-600 dark:text-gray-400 mb-6">
                    As with the 12 steps of AA and the recognition that a problem exists being the first step to recovery:
                </p>
            </div>

            <h3 class="text-blue-600 text-xl font-semibold text-center">The first step in moving your "<a href="/gamestats" class="underline hover:text-blue-800"><u>game stats</u></a>"</h3>
            <h5 class="text-blue-600 text-lg font-semibold text-center">
                from "Hero" to "Managed Processes Pro" is to take the "pin test"
            </h5>

            <div class="relative flex justify-center items-center space-x-4 my-6" style="min-height: 150px;">
                <!-- Removed hyperlink and added draggable-pin class -->
                <img alt="Pin" id="pin" class="w-32 h-32 draggable-pin" src="{{ asset('storage/images/pinlarge.png') }}">

                <div class="w-48 aspect-square">
                    <img
                            alt="Gateway"
                            id="gateway"
                            class="w-full h-full object-contain transition-all duration-300"
                            src="{{ asset('storage/images/gatewayflat.png') }}"
                            x-on:mouseover="document.getElementById('gateway').src='{{ asset('storage/images/gateway.png') }}'"
                            x-on:mouseout="document.getElementById('gateway').src='{{ asset('storage/images/gatewayflat.png') }}'"
                    >
                </div>
            </div>

            <h6 class="text-base text-gray-700 dark:text-gray-300">
                PMWay is all about ideas to improve your <a href="/home/gamestats" class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300">game stats</a>.<br>
                If you are using a mouse then click on and drag the big red pin onto the model above.<br>
                Where would you say you are operating at?
            </h6>

            <div class="my-8">
                <button
                        x-on:click="showLevel1 = !showLevel1"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50"
                >
                    CM Level 1?<br>
                    What's it look like?
                </button>
            </div>

            {{-- Collapsible CM Level 1 content --}}
            <div x-show="showLevel1" x-transition class="max-w-4xl mx-auto">
                <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden border border-gray-200 dark:border-gray-700">
                    <div class="bg-gray-50 dark:bg-gray-700 px-6 py-4 border-b border-gray-200 dark:border-gray-600">
                        <h5 class="text-lg font-semibold text-gray-900 dark:text-white text-center"></h5>
                    </div>
                    <div class="p-6 text-center space-y-4">
                        <img alt="CML1" class="mx-auto w-full max-w-md rounded" src="{{ asset('storage/images/cml1.png') }}">
                        <img alt="No ITTO" class="mx-auto w-full max-w-md rounded" src="{{ asset('storage/images/noito.png') }}">
                        <img alt="Emperor" class="mx-auto w-full max-w-md rounded" src="{{ asset('storage/images/emperorbare.png') }}">
                        <p class="mt-4">
                            <a href="/realstory" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">
                                <u>Click here for the Real Story at CM Level 1</u>
                            </a>
                        </p>
                    </div>
                    <div class="bg-gray-50 dark:bg-gray-700 px-6 py-4 border-t border-gray-200 dark:border-gray-600">
                        <p class="text-center text-gray-700 dark:text-gray-300">
                            Anything less (Capability Maturity Model Level 1 or below) is the Emperor, proud of his new clothes!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @endauth

    @guest
        {{-- Guest view --}}
        <div class="text-center space-y-6">
            <h5 class="text-center text-xl font-semibold text-gray-900 dark:text-white">
                Achieve Business Value through Productivity and Quality Improvements<br>
                off the stable base of Project Process Management (Traditional or Agile)<br>at Capability Maturity Model Level 2 (and above)
            </h5>

            <div class="relative inline-block">
                <img
                        id="target-guest"
                        class="mx-auto w-full max-w-2xl rounded-lg shadow-md cursor-pointer transition-all duration-300"
                        src="{{ asset('storage/images/cmmproject2plus.png') }}"
                        x-on:mouseover="document.getElementById('target-guest').src='{{ asset('storage/images/cmmproject2plusshadedbezelled.png') }}'"
                        x-on:mouseout="document.getElementById('target-guest').src='{{ asset('storage/images/cmmproject2plus.png') }}'"
                        alt="Capability Maturity Model"
                        title="Register with PMWay and let me help you find your way"
                >
            </div>

            <h6 class="text-base text-gray-700 dark:text-gray-300">
                PMWay is all about ideas to improve your <a href="/home/gamestats" class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300">game stats</a>.<br>
                If you are using a mouse then click on and drag the big red pin onto the model above.<br>
                Where would you say you are operating at?
            </h6>

            <div class="relative my-6" style="min-height: 150px;">
                <!-- Removed hyperlink for guest pin too -->
                <img alt="Pin" id="pin-guest" class="w-32 h-32 draggable-pin mx-auto" src="{{ asset('storage/images/pinlarge.png') }}">
            </div>

        </div>
    @endguest

    {{-- Simple drag functionality without Interact.js --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function makeDraggable(element) {
                let pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;

                element.onmousedown = dragMouseDown;

                function dragMouseDown(e) {
                    e = e || window.event;
                    e.preventDefault();

                    // Get the initial mouse cursor position
                    pos3 = e.clientX;
                    pos4 = e.clientY;

                    // Call functions whenever the cursor moves or mouse button is released
                    document.onmouseup = closeDragElement;
                    document.onmousemove = elementDrag;

                    // Change cursor style
                    element.style.cursor = 'grabbing';
                }

                function elementDrag(e) {
                    e = e || window.event;
                    e.preventDefault();

                    // Calculate the new cursor position
                    pos1 = pos3 - e.clientX;
                    pos2 = pos4 - e.clientY;
                    pos3 = e.clientX;
                    pos4 = e.clientY;

                    // Set the element's new position
                    const currentX = (parseFloat(element.getAttribute('data-x')) || 0) - pos1;
                    const currentY = (parseFloat(element.getAttribute('data-y')) || 0) - pos2;

                    element.style.transform = `translate(${currentX}px, ${currentY}px)`;
                    element.setAttribute('data-x', currentX);
                    element.setAttribute('data-y', currentY);
                }

                function closeDragElement() {
                    // Stop moving when mouse button is released
                    document.onmouseup = null;
                    document.onmousemove = null;
                    element.style.cursor = 'grab';
                }
            }

            // Make both pins draggable
            const pin = document.getElementById('pin');
            const pinGuest = document.getElementById('pin-guest');

            if (pin) makeDraggable(pin);
            if (pinGuest) makeDraggable(pinGuest);
        });
    </script>
</div>