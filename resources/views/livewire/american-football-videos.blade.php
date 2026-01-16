<div>
    <div class="max-w-6xl mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-8 border-b border-gray-200 dark:border-gray-700 pb-4">
            American Football Videos
        </h1>

        <div class="space-y-8">
            <!-- Header Section -->
            <div class="bg-white dark:bg-gray-800 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                <h2 class="text-3xl font-semibold text-gray-900 dark:text-white mb-4">
                    American Football<br>
                    <a href="/cmmi-landing" class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300">
                        CMMi Level 2+ in action!
                    </a>
                </h2>
{{--                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">--}}
{{--                    TEAM: Together We Achieve More!--}}
{{--                </h3>--}}
            </div>

            <hr class="border-gray-200 dark:border-gray-700">

            <!-- Super Bowl Section -->
            <div class="bg-white dark:bg-gray-800 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">Super Bowl 2020 and 2019</h3>

                <div class="mb-6">
                    <a href="/american-football"
                       class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white rounded-lg transition-colors">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                        Back to American Football
                    </a>
                </div>

                <hr class="border-gray-200 dark:border-gray-700 mb-6">

                <div class="text-center mb-6">
                    <a href="#playlist"
                       class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 text-lg font-semibold">
                        JUMP TO PLAYLIST ▼
                    </a>
                </div>
            </div>

            <!-- Able Player Video Section -->
            <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                <div id="player" class="text-center">
                    <!-- Able Player will populate this -->
                    <video id="video1"
                           preload="auto"
                           data-able-player
                           playsinline
                           loop
                           class="w-full max-w-4xl mx-auto rounded-lg shadow-lg">
                    </video>
                </div>
            </div>

            <!-- Playlist Section -->
            <div id="playlist" class="bg-white dark:bg-gray-800 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">
                    <a name="playlist"></a>Playlist
                </h2>

                <!-- Able Player Playlist -->
                <ul class="able-playlist space-y-4" data-player="video1">
                    <!-- Super Bowl 2020 -->
                    <li data-poster="{{ asset('storage/images/superbowl2020.jpg') }}"
                        data-width="1920"
                        data-height="1080"
                        class="bg-gray-50 dark:bg-gray-900 rounded-lg p-4 border border-gray-200 dark:border-gray-700">
                        <span class="able-source"
                              data-type="video/mp4"
                              data-src="{{ Storage::url('assets/ablevids/superbowltwentytwenty/superbowltwentytwenty.mp4') }}">
                        </span>
                        <button type="button" class="flex items-center space-x-4 w-full text-left hover:bg-gray-100 dark:hover:bg-gray-800 p-3 rounded-lg transition-colors">
                            <img src="{{ asset('storage/images/superbowl2020.jpg') }}"
                                 alt="Super Bowl 2020 Thumbnail"
                                 class="w-24 h-16 object-cover rounded">
                            <span class="text-lg font-semibold text-gray-900 dark:text-white">Super Bowl February 2020</span>
                        </button>
                    </li>

                    <!-- Super Bowl 2019 -->
                    <li data-poster="{{ asset('storage/images/superbowl2019.jpg') }}"
                        data-width="1920"
                        data-height="1080"
                        class="bg-gray-50 dark:bg-gray-900 rounded-lg p-4 border border-gray-200 dark:border-gray-700">
                        <span class="able-source"
                              data-type="video/mp4"
                              data-src="{{ Storage::url('assets/ablevids/superbowl/superbowl.mp4') }}">
                        </span>
                        <button type="button" class="flex items-center space-x-4 w-full text-left hover:bg-gray-100 dark:hover:bg-gray-800 p-3 rounded-lg transition-colors">
                            <img src="{{ asset('storage/images/superbowl2019.jpg') }}"
                                 alt="Super Bowl 2019 Thumbnail"
                                 class="w-24 h-16 object-cover rounded">
                            <span class="text-lg font-semibold text-gray-900 dark:text-white">Super Bowl February 2019</span>
                        </button>
                    </li>
                </ul>

                <!-- Storage Path Information -->
{{--                <div class="mt-6 p-4 bg-blue-50 dark:bg-blue-900/20 rounded-lg border border-blue-200 dark:border-blue-800">--}}
{{--                    <h4 class="font-semibold text-blue-900 dark:text-blue-300 mb-2">Video Storage Paths:</h4>--}}
{{--                    <ul class="text-sm text-blue-800 dark:text-blue-200 space-y-1">--}}
{{--                        <li><strong>2020 Video:</strong> storage/app/public/assets/ablevids/superbowltwentytwenty/superbowltwentytwenty.mp4</li>--}}
{{--                        <li><strong>2019 Video:</strong> storage/app/public/assets/ablevids/superbowl/superbowl.mp4</li>--}}
{{--                        <li><strong>Posters/Thumbnails:</strong> storage/app/public/images/video-posters/ & storage/app/public/images/video-thumbnails/</li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
            </div>

            <!-- Navigation Section -->
            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                    Page Navigation
                </h3>

                <div class="flex flex-wrap gap-4 justify-center">
                    <a href="/american-football"
                       class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 dark:bg-gray-500 dark:hover:bg-gray-600 text-white rounded-lg transition-colors">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                        Back to American Football
                    </a>

                    <a href="#playlist"
                       class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white rounded-lg transition-colors">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                        View Playlist
                    </a>
                </div>
            </div>
        </div>
    </div>

{{--    <!-- Able Player Assets -->--}}
{{--    @push('styles')--}}
{{--        <link rel="stylesheet" href="{{ asset('ableplayer/build/ableplayer.min.css') }}">--}}
{{--    @endpush--}}

{{--    @push('scripts')--}}
{{--        <script src="{{ asset('ableplayer/build/ableplayer.min.js') }}"></script>--}}
{{--    @endpush--}}
</div>