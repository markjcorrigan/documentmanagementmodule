{{-- resources/views/livewire/pmbok-process-example.blade.php --}}

<div>
    <style>
        /* =================================
           SCOPED STYLES FOR THIS PAGE ONLY
           Scope: .pmbok-process-page-content
           ================================= */

        /* Custom carousel styles - scoped to prevent conflicts */
        .pmbok-process-page-content .carousel {
            position: relative;
            width: 100%;
            overflow: hidden;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        .pmbok-process-page-content .carousel-inner {
            display: flex;
            transition: transform 0.6s ease-in-out;
            touch-action: pan-y pinch-zoom;
            width: 100%;
        }

        .pmbok-process-page-content .carousel-item {
            min-width: 100%;
            flex-shrink: 0;
            transition: opacity 0.6s ease;
            width: 100%;
            box-sizing: border-box;
        }

        .pmbok-process-page-content .carousel-control {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 12px;
            cursor: pointer;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            z-index: 10;
        }

        @media (min-width: 768px) {
            .pmbok-process-page-content .carousel-control {
                width: 50px;
                height: 50px;
            }
        }

        .pmbok-process-page-content .carousel-control:hover {
            background: rgba(0, 0, 0, 0.8);
            transform: translateY(-50%) scale(1.1);
        }

        .pmbok-process-page-content .carousel-control.prev {
            left: 10px;
        }

        .pmbok-process-page-content .carousel-control.next {
            right: 10px;
        }

        @media (min-width: 768px) {
            .pmbok-process-page-content .carousel-control.prev {
                left: 20px;
            }
            .pmbok-process-page-content .carousel-control.next {
                right: 20px;
            }
        }

        /* Numbered slide navigation */
        .pmbok-process-page-content .slide-numbers {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            justify-content: center;
            margin-top: 1rem;
            max-width: 100%;
        }

        .pmbok-process-page-content .slide-number-btn {
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid #3b82f6;
            background: white;
            color: #3b82f6;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 0.75rem;
            font-weight: 600;
            flex-shrink: 0;
        }

        .pmbok-process-page-content .slide-number-btn:hover {
            background: #3b82f6;
            color: white;
            transform: scale(1.1);
        }

        .pmbok-process-page-content .slide-number-btn.active {
            background: #3b82f6;
            color: white;
            transform: scale(1.1);
        }

        /* Dark mode scoping */
        .dark .pmbok-process-page-content .slide-number-btn {
            background: #374151;
            color: #60a5fa;
            border-color: #60a5fa;
        }

        .dark .pmbok-process-page-content .slide-number-btn:hover,
        .dark .pmbok-process-page-content .slide-number-btn.active {
            background: #60a5fa;
            color: #1f2937;
        }

        /* Collapse functionality */
        .pmbok-process-page-content .collapse-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }

        .pmbok-process-page-content .collapse-content.expanded {
            max-height: 1000px;
            transition: max-height 0.5s ease-in;
        }

        /* Image container with white border - following style guide pattern */
        .pmbok-process-page-content .image-container {
            background: white;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            padding: 1rem;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
        }

        /* Dark mode support for image containers */
        .dark .pmbok-process-page-content .image-container {
            background: white;
            border: 1px solid #9ca3af;
        }
    </style>

    <!-- ✅ CRITICAL: Opening wrapper div -->
    <div class="pmbok-process-page-content">

        <div class="max-w-6xl mx-auto px-4 py-8">
            <!-- Header -->
            <div class="text-center mb-8">
                <h5 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">PMBOK 6 Process 4.1 Example</h5>
                <p class="text-lg text-gray-700 dark:text-gray-300">
                    <button type="button" wire:click="goToSlide(0)" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300 mx-2">
                        [ITTO-Matrix]
                    </button> |
                    <button type="button" wire:click="goToSlide(1)" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300 mx-2">
                        [ITTO-Graphic]
                    </button> |
                    <button type="button" wire:click="goToSlide(2)" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300 mx-2">
                        [Process-Flows]
                    </button>
                </p>
            </div>

            <!-- Carousel -->
            <div class="carousel bg-gray-800 dark:bg-gray-900 rounded-lg">
                <div class="carousel-inner" style="transform: translateX(-{{ $currentSlide * 100 }}%)">
                    <!-- Slide 1: ITTO Matrix -->
                    <div class="carousel-item {{ $currentSlide === 0 ? 'active' : '' }}">
                        <div class="flex items-center justify-center p-4 md:p-8">
                            <a href="/register" title="Click here to go to the drillable ITTO dashboard." class="block">
                                <div class="image-container">
                                    <img class="w-full max-w-full h-auto rounded" src="{{ asset('storage/images/41.png') }}" alt="PMBOK Process 4.1 ITTO Matrix">
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Slide 2: ITTO Graphic -->
                    <div class="carousel-item {{ $currentSlide === 1 ? 'active' : '' }}">
                        <div class="flex items-center justify-center p-4 md:p-8">
                            <div class="image-container">
                                <img class="w-full max-w-full h-auto rounded" src="{{ asset('storage/images/41ittosclean.png') }}" alt="PMBOK Process 4.1 ITTO Graphic">
                            </div>
                        </div>
                    </div>

                    <!-- Slide 3: Process Flows -->
                    <div class="carousel-item {{ $currentSlide === 2 ? 'active' : '' }}">
                        <div class="flex items-center justify-center p-4 md:p-8">
                            <div class="image-container">
                                <img class="w-full max-w-full h-auto rounded" src="{{ asset('storage/images/41flowclean.png') }}" alt="PMBOK Process 4.1 Process Flows">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Carousel Controls -->
                <button class="carousel-control prev" wire:click="prevSlide">
                    <svg class="w-4 h-4 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <button class="carousel-control next" wire:click="nextSlide">
                    <svg class="w-4 h-4 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>

            <!-- Numbered Slide Navigation -->
            <div class="slide-numbers mt-4">
                @for($i = 0; $i < $totalSlides; $i++)
                    <button
                            type="button"
                            class="slide-number-btn {{ $currentSlide === $i ? 'active' : '' }}"
                            wire:click="goToSlide({{ $i }})"
                    >
                        {{ $i + 1 }}
                    </button>
                @endfor
            </div>

            <!-- Additional Controls -->
            <div class="mt-6 flex flex-wrap justify-center gap-4">
                <button
                        type="button"
                        class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors text-sm font-medium"
                        wire:click="prevSlide"
                >
                    ← Previous Slide
                </button>
                <button
                        type="button"
                        class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors text-sm font-medium"
                        wire:click="nextSlide"
                >
                    Next Slide →
                </button>
            </div>

            <!-- ITTO Information Section -->
            <div class="mt-12 text-center">
                <button
                        id="toggleItto"
                        class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition-colors"
                        type="button"
                >
                    The Process 4.1 ITTO
                </button>

                <div id="ittoContent" class="collapse-content mt-4">
                    <div class="max-w-4xl mx-auto">
                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
                            <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                                <h5 class="text-xl font-semibold text-gray-900 dark:text-white text-center">
                                    The ITTO (Inputs, Tools and Techniques and Outputs) are at the heart of the PMBOK version 6 Dashboard.
                                </h5>
                            </div>
                            <div class="p-6">
                                <p class="text-gray-700 dark:text-gray-300 mb-4">
                                    <strong class="text-gray-900 dark:text-white">Underneath each node of the PMBOK Dashboard lies the ITTO (as you see in the example below):</strong><br><br>
                                    When registered with PMWay you have access to each of the 49 ITTO dashboards as seen for process 4.1 below.<br><br>
                                    If signed up with PMWay (which is optional) you will have access Level 2: This contains all the PMBOK processes, their ITTOs, the flows between processes, the PMBOK ver 6 guide drilldown detail, and ability to create tailoring notes per process / process ITTO's. This will facilitate you running your projects better!<br><br>
                                    Students wanting to write the PMI exams can use the PMWay Dashboard to help them with preparation. My assistance is also bundled in as well if required. Note: PMWay offers similar dashboards for other disciplines including PRINCE2 and PRINCE2 Agile, DSDM(AgilePM), SCRUM, ITIL, CMII etc., (zeroing into the Standards and Solutions Framework) as well as consulting advice on the best way to implement and use these for success.
                                </p>
                                <p class="text-gray-700 dark:text-gray-300">
                                    NOTE: The PMBOK is often disregarded as "Traditional Project Management" utilizing the "Waterfall" approach; <strong class="text-gray-900 dark:text-white">yet this is simply not correct!</strong><br>
                                    An excellent 40 minute video on the PMWay home page when you register explains exactly why this notion is totally untrue and misunderstood. In fact, the latest version of the PMBOK embraces Traditional, Agile, Iterative and Adaptive environments. And, while the PMBOK is primarily a Body of Knowledge, it is also a method that can accommodate full project lifecycles or project phases as its "Close Project or Phase" (process #4.7) clearly elucidates!
                                </p>
                            </div>
                            <div class="p-6 border-t border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-700">
                                <p class="text-gray-600 dark:text-gray-300 italic text-center">
                                    Remember that while best practice is always the goal, best practical is better.<br>
                                    I.e. tailoring these ITTO's (which is facilitated within PMWay) is key.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Simple JavaScript for collapse functionality -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const toggleButton = document.getElementById('toggleItto');
                const content = document.getElementById('ittoContent');
                let isExpanded = false;

                toggleButton.addEventListener('click', function() {
                    isExpanded = !isExpanded;

                    if (isExpanded) {
                        content.classList.add('expanded');
                        toggleButton.textContent = 'Hide Process 4.1 ITTO';
                    } else {
                        content.classList.remove('expanded');
                        toggleButton.textContent = 'The Process 4.1 ITTO';
                    }
                });
            });
        </script>

        <!-- ✅ CRITICAL: Closing wrapper div -->
    </div>
</div>