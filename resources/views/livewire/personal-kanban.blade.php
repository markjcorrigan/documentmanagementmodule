<div>
    <div class="max-w-6xl mx-auto px-4 py-8">
        {{-- Page Header --}}
        <div class="mb-8">
            <h1 class="text-4xl font-semibold text-gray-900 dark:text-white mb-4">
                Personal Kanban
            </h1>
            <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-300 mb-6">
                Kanban made Sweet and Simple!
            </h2>
            <hr class="border-gray-200 dark:border-gray-700 mb-8">
        </div>

        {{-- Video Section --}}
        <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex flex-col items-center">
                {{-- Simple Video Container --}}
                <div class="w-full max-w-2xl">
                    <div class="rounded-lg">
                        <video id="video1"
                               data-able-player
                               preload="auto"
                               data-speed-icons="true"
                               class="w-full h-auto rounded-lg"
                               poster="{{ asset('storage/images/personalkanban.jpg') }}"
                               playsinline>
                            <source type="video/mp4" src="{{ asset('ablelvids/kanban/kanban.mp4') }}">
                            {{-- Optional: Add captions track --}}
                            {{-- <track kind="captions" src="{{ asset('ablelvids/kanban/captions.vtt') }}" srclang="en" label="English"> --}}
                        </video>
                    </div>

                    {{-- Video Description --}}
                    <div class="mt-4 text-center">
                        <p class="text-lg text-gray-600 dark:text-gray-400">
                            Watch how Personal Kanban can transform your workflow
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Features Section --}}
        <div class="mt-12 bg-gray-50 dark:bg-gray-900 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
            <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6 text-center">
                Why Choose Personal Kanban?
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="text-center p-4">
                    <div class="bg-blue-100 dark:bg-blue-900 w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Simple & Intuitive</h4>
                    <p class="text-gray-600 dark:text-gray-400">Easy-to-use interface that gets out of your way</p>
                </div>

                <div class="text-center p-4">
                    <div class="bg-purple-100 dark:bg-purple-900 w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-4">
                        <img src="{{ asset('storage/images/archery.svg') }}"
                             alt="Learn Prioritization"
                             class="w-6 h-6 text-purple-600 dark:text-purple-400">
                    </div>
                    <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Learn Prioritization</h4>
                    <p class="text-gray-600 dark:text-gray-400">Focus on what you can complete next</p>
                </div>

                <div class="text-center p-4">
                    <div class="bg-green-100 dark:bg-green-900 w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Boost Productivity</h4>
                    <p class="text-gray-600 dark:text-gray-400">Visualize your workflow and get more done</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Include Able Player Assets --}}
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/ableplayer.min.css') }}">
        <style>
            /* Ensure Able Player works properly */
            .able-wrapper {
                width: 100% !important;
                max-width: 100% !important;
            }
            .able {
                width: 100% !important;
                max-width: 100% !important;
            }
            .able-video {
                width: 100% !important;
                max-width: 100% !important;
                height: auto !important;
            }

            /* Responsive fixes */
            @media (max-width: 640px) {
                .able-wrapper, .able, .able-video {
                    width: 100% !important;
                    max-width: 100% !important;
                }
            }
        </style>
    @endpush

    @push('scripts')
        <script src="{{ asset('js/ableplayer.min.js') }}"></script>
    @endpush
</div>