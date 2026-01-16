{{-- resources/views/livewire/burndown-short.blade.php --}}
<div>
    {{-- Apply CSS Scoping to prevent conflicts --}}
    <style>
        .burndown-page-content .able-playlist li {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 0.5rem;
            padding: 1rem;
            margin-bottom: 1rem;
            transition: all 0.3s ease;
        }

        .dark .burndown-page-content .able-playlist li {
            background: #1f2937;
            border-color: #4b5563;
        }

        .burndown-page-content .able-playlist li:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .dark .burndown-page-content .able-playlist li:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }

        .burndown-page-content .able-playlist button {
            background: #3b82f6;
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            width: 100%;
            text-align: left;
        }

        .dark .burndown-page-content .able-playlist button {
            background: #2563eb;
        }

        .burndown-page-content .able-playlist button:hover {
            background: #2563eb;
            transform: scale(1.02);
        }

        .dark .burndown-page-content .able-playlist button:hover {
            background: #1d4ed8;
        }

        .burndown-page-content .able-playlist img {
            width: 4rem;
            height: 4rem;
            object-fit: cover;
            border-radius: 0.375rem;
            margin-right: 1rem;
            border: 1px solid #d1d5db;
        }

        .dark .burndown-page-content .able-playlist img {
            border-color: #4b5563;
        }

        /* Responsive fixes for small screens */
        @media (max-width: 640px) {
            .burndown-page-content .able-playlist button {
                padding: 0.5rem;
            }

            .burndown-page-content .able-playlist img {
                width: 3rem;
                height: 3rem;
                margin-right: 0.5rem;
            }

            .burndown-page-content .able-playlist .playlist-image-wrapper {
                padding: 0.375rem;
            }
        }
    </style>

    {{-- ======================================================= --}}
    {{-- CRITICAL: CSS SCOPING WRAPPER                         --}}
    {{-- ======================================================= --}}
    <div class="burndown-page-content">
        <div class="max-w-6xl mx-auto px-4 py-8">
            <h1 class="text-4xl font-semibold text-gray-900 dark:text-white mb-8">
                The Sprint Burndown
            </h1>

            <div class="space-y-8">
                {{-- Divider --}}
                <hr class="border-gray-300 dark:border-gray-600">

                {{-- Quick Navigation --}}
                <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-4 border border-gray-200 dark:border-gray-700">
                    <p class="text-lg text-gray-700 dark:text-gray-300 text-center">
                        <a href="#playlist" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300 font-semibold">
                            JUMP TO PLAYLIST
                        </a>
                    </p>
                </div>

                {{-- ======================================================= --}}
                {{-- ABLE PLAYER MAIN VIDEO (with NO pre-loaded source)    --}}
                {{-- ======================================================= --}}
                <section>
                    <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6 text-center">
                            Sprint Burndown Videos
                        </h2>

                        <div class="text-center">
                            <div id="video-container" class="max-w-4xl mx-auto bg-white dark:bg-gray-800 p-4 rounded-lg border border-gray-200 dark:border-gray-700">
                                <video id="video1"
                                       data-able-player
                                       data-skin="2020"
                                       playsinline>
                                </video>
                            </div>
                        </div>

                        {{-- PLAYLIST HTML - Hidden, will be moved by JavaScript --}}
                        <div style="display: none;">
                            <ul class="able-playlist space-y-4" data-player="video1" data-embedded>
                                {{-- Video 1 --}}
                                <li data-poster="{{ asset('storage/images/burn_down_chart.png') }}">
                                    <span class="able-source"
                                          data-type="video/mp4"
                                          data-src="{{ asset('ablelvids/burndownshort/burndownshort.mp4') }}">
                                    </span>

                                    <button type="button" class="flex items-center bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white font-semibold py-3 px-4 rounded-lg transition-colors w-full">
                                        <div class="playlist-image-wrapper bg-white dark:bg-white p-2 rounded border border-gray-300 dark:border-gray-400 shadow-sm mr-2 sm:mr-4 flex-shrink-0">
                                            <img src="{{ asset('storage/images/burn_down_chart.png') }}"
                                                 alt="Scrum Burndown Chart"
                                                 class="w-12 h-12 sm:w-16 sm:h-16 object-cover rounded">
                                        </div>
                                        <span class="text-sm sm:text-lg text-left flex-grow min-w-0 break-words">SCRUM BURNDOWN!</span>
                                        <svg class="w-4 h-4 sm:w-5 sm:h-5 flex-shrink-0 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </button>
                                </li>

                                {{-- Video 2 --}}
                                <li data-poster="{{ asset('storage/images/burn_down_chart.png') }}">
                                    <span class="able-source"
                                          data-type="video/mp4"
                                          data-src="{{ asset('ablelvids/burndownshort/burndownup.mp4') }}">
                                    </span>

                                    <button type="button" class="flex items-center bg-green-600 hover:bg-green-700 dark:bg-green-500 dark:hover:bg-green-600 text-white font-semibold py-3 px-4 rounded-lg transition-colors w-full">
                                        <div class="playlist-image-wrapper bg-white dark:bg-white p-2 rounded border border-gray-300 dark:border-gray-400 shadow-sm mr-2 sm:mr-4 flex-shrink-0">
                                            <img src="{{ asset('storage/images/burn_down_chart.png') }}"
                                                 alt="Scrum Burndown and Burnup Chart"
                                                 class="w-12 h-12 sm:w-16 sm:h-16 object-cover rounded">
                                        </div>
                                        <span class="text-sm sm:text-lg text-left flex-grow min-w-0 break-words">SCRUM BURNDOWN and BURNUP!!</span>
                                        <svg class="w-4 h-4 sm:w-5 sm:h-5 flex-shrink-0 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </button>
                                </li>

                                {{-- Video 3 --}}
                                <li data-poster="{{ asset('storage/images/agreements.jpg') }}">
                                    <span class="able-source"
                                          data-type="video/mp4"
                                          data-src="{{ asset('ablelvids/brokenpromises/brokenpromises.mp4') }}">
                                    </span>

                                    <button type="button" class="flex items-center bg-purple-600 hover:bg-purple-700 dark:bg-purple-500 dark:hover:bg-purple-600 text-white font-semibold py-3 px-4 rounded-lg transition-colors w-full">
                                        <div class="playlist-image-wrapper bg-white dark:bg-white p-2 rounded border border-gray-300 dark:border-gray-400 shadow-sm mr-2 sm:mr-4 flex-shrink-0">
                                            <img src="{{ asset('storage/images/agreements.jpg') }}"
                                                 alt="Agreements"
                                                 class="w-12 h-12 sm:w-16 sm:h-16 object-cover rounded">
                                        </div>
                                        <span class="text-sm sm:text-lg text-left flex-grow min-w-0 break-words">Agile and Broken Promises - the King and the Mysterious Stranger</span>
                                        <svg class="w-4 h-4 sm:w-5 sm:h-5 flex-shrink-0 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </section>

                {{-- ======================================================= --}}
                {{-- PLAYLIST SECTION - EMPTY, JavaScript will move playlist here --}}
                {{-- ======================================================= --}}
                <section id="playlist">
                    <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-4 sm:p-6 border border-gray-200 dark:border-gray-700">
                        <h2 class="text-2xl sm:text-3xl font-semibold text-gray-900 dark:text-white mb-4 sm:mb-6">
                            Playlist
                        </h2>

                        <div id="playlist-target" class="bg-white dark:bg-gray-800 rounded-lg p-3 sm:p-6 border border-gray-300 dark:border-gray-600 overflow-hidden">
                            {{-- Playlist will be moved here by JavaScript --}}
                        </div>
                    </div>
                </section>

                {{-- ======================================================= --}}
                {{-- SKIING ANALOGY SECTION                               --}}
                {{-- ======================================================= --}}
                <section>
                    <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6" x-data="{ open: false }">
                        <div class="text-center">
                            <button class="inline-flex items-center bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white font-semibold py-3 px-6 rounded-lg transition-colors"
                                    type="button"
                                    @click="open = !open">
                                <div class="bg-white dark:bg-white p-2 rounded border border-gray-300 dark:border-gray-400 shadow-sm mr-4">
                                    <img src="{{ asset('storage/images/skiingdownbaseline.jpg') }}"
                                         alt="Skiing"
                                         class="w-12 h-12 object-cover rounded">
                                </div>
                                <span x-text="open ? 'Hide Skiing Analogy' : 'Ski down the guideline (target burndown)'"></span>
                                <svg class="w-5 h-5 ml-2 transition-transform duration-200"
                                     :class="{ 'rotate-180': open }"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>
                        </div>

                        <div x-show="open"
                             x-transition:enter="transition ease-out duration-300"
                             x-transition:enter-start="opacity-0 transform scale-95"
                             x-transition:enter-end="opacity-100 transform scale-100"
                             x-transition:leave="transition ease-in duration-200"
                             x-transition:leave-start="opacity-100 transform scale-100"
                             x-transition:leave-end="opacity-0 transform scale-95"
                             class="mt-6">
                            <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                                    The goal is to ski down the guideline (target burndown or delivery baseline);<br>
                                    staying as close to it as possible<br>
                                    dusting issues as you go!
                                </h3>
                                <div class="bg-white dark:bg-white p-4 rounded-lg border border-gray-300 dark:border-gray-400 shadow-sm max-w-2xl mx-auto">
                                    <img src="{{ asset('storage/images/skiingdownbaseline.jpg') }}"
                                         alt="Skiing down baseline"
                                         class="w-full h-auto rounded-lg">
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    {{-- Alpine.js for interactivity --}}
    <script src="//unpkg.com/alpinejs" defer></script>

    {{-- ======================================================= --}}
    {{-- MOVE PLAYLIST TO CORRECT LOCATION                     --}}
    {{-- ======================================================= --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                // Fix duplicate videos and play buttons
                const container = document.getElementById('video-container');
                if (container) {
                    const videos = container.querySelectorAll('video');
                    if (videos.length > 1) {
                        for (let i = 1; i < videos.length; i++) {
                            videos[i].remove();
                        }
                    }

                    const playButtons = container.querySelectorAll('.able-big-play-button');
                    if (playButtons.length > 1) {
                        for (let i = 1; i < playButtons.length; i++) {
                            playButtons[i].remove();
                        }
                    }
                }

                // MOVE PLAYLIST TO THE PLAYLIST SECTION
                const playlist = document.querySelector('.able-playlist');
                const playlistTarget = document.getElementById('playlist-target');

                if (playlist && playlistTarget) {
                    // Show the playlist (it was hidden)
                    playlist.style.display = '';
                    // Move it to the target location
                    playlistTarget.appendChild(playlist);
                }
            }, 500);
        });
    </script>

    {{-- ======================================================= --}}
    {{-- CUSTOM CSS FOR ABLE PLAYER TAILWIND STYLING          --}}
    {{-- ======================================================= --}}
    <style>
        .burndown-page-content video {
            width: 100% !important;
            height: auto !important;
            display: block !important;
        }

        .burndown-page-content .able-wrapper {
            width: 100% !important;
            position: relative !important;
        }

        .burndown-page-content #video-container > video:not(:first-child) {
            display: none !important;
        }

        .burndown-page-content .able-big-play-button ~ .able-big-play-button {
            display: none !important;
        }

        .burndown-page-content .able-button {
            background-color: #3b82f6 !important;
            color: white !important;
            border-radius: 0.375rem !important;
        }

        .dark .burndown-page-content .able-button {
            background-color: #2563eb !important;
        }

        .burndown-page-content .able-button:hover {
            background-color: #2563eb !important;
        }

        .dark .burndown-page-content .able-button:hover {
            background-color: #1d4ed8 !important;
        }

        .burndown-page-content .able-status-bar {
            background-color: #f9fafb !important;
        }

        .dark .burndown-page-content .able-status-bar {
            background-color: #111827 !important;
        }

        .burndown-page-content .able-playlist .able-playlist-current {
            border: 2px solid #3b82f6 !important;
            background-color: #eff6ff !important;
        }

        .dark .burndown-page-content .able-playlist .able-playlist-current {
            border-color: #60a5fa !important;
            background-color: #1e3a8a !important;
        }
    </style>
</div>