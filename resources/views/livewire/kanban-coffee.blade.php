<div>
    <div class="max-w-6xl mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-8 border-b border-gray-200 dark:border-gray-700 pb-4">
            KanBan Coffee Process Demonstration
        </h1>

        <div class="space-y-8">
            <!-- Header Section -->
            <div class="bg-white dark:bg-gray-800 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                <h2 class="text-3xl font-semibold text-gray-900 dark:text-white mb-4">KanBan Coffee</h2>
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
                           preload="false"
                           data-able-player
                           playsinline
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
                    <!-- KanBan Coffee Video -->
                    <li data-poster="{{ Storage::url('images/kanbancoffee.jpg') }}"
                        data-width="1920"
                        data-height="1080"
                        class="bg-gray-50 dark:bg-gray-900 rounded-lg p-4 border border-gray-200 dark:border-gray-700">
                        <span class="able-source"
                              data-type="video/mp4"
                              data-src="{{ Storage::url('assets/ablevids/kanbancoffee/kanbancoffee.mp4') }}">
                        </span>
                        <button type="button" class="flex items-center space-x-4 w-full text-left hover:bg-gray-100 dark:hover:bg-gray-800 p-3 rounded-lg transition-colors">
                            <img src="{{ Storage::url('images/kanbancoffee.jpg') }}"
                                 alt="KanBan Coffee Shop Thumbnail"
                                 class="w-24 h-16 object-cover rounded">
                            <span class="text-lg font-semibold text-gray-900 dark:text-white">KanBan Coffee Shop</span>
                        </button>
                    </li>
                </ul>

                <!-- Additional Information -->
                <div class="mt-8">
                    <a href="/home/sevenfs"
                       class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white rounded-lg transition-colors">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                        Click here for the 3P's and 7F's of successful Scrum / Kanban / Scrumban
                    </a>
                </div>

                <!-- Storage Path Information -->
{{--                <div class="mt-6 p-4 bg-blue-50 dark:bg-blue-900/20 rounded-lg border border-blue-200 dark:border-blue-800">--}}
{{--                    <h4 class="font-semibold text-blue-900 dark:text-blue-300 mb-2">Video Storage Paths:</h4>--}}
{{--                    <ul class="text-sm text-blue-800 dark:text-blue-200 space-y-1">--}}
{{--                        <li><strong>Video:</strong> storage/app/public/assets/ablevids/kanbancoffee/kanbancoffee.mp4</li>--}}
{{--                        <li><strong>Poster/Thumbnail:</strong> storage/app/public/images/kanbancoffee.jpg</li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
            </div>

            <!-- Navigation Section -->
            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                    Page Navigation
                </h3>

                <div class="flex flex-wrap gap-4 justify-center">
                    <a href="#playlist"
                       class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white rounded-lg transition-colors">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                        View Playlist
                    </a>

                    <a href="/sevenfs"
                       class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 dark:bg-green-500 dark:hover:bg-green-600 text-white rounded-lg transition-colors">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                        3P's & 7F's of Scrum/Kanban
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Able Player Assets -->
{{--    @push('styles')--}}
{{--        <link rel="stylesheet" href="{{ asset('ableplayer/build/ableplayer.min.css') }}">--}}
{{--    @endpush--}}

{{--    @push('scripts')--}}
{{--        <script src="{{ asset('ableplayer/build/ableplayer.min.js') }}"></script>--}}
{{--    @endpush--}}
</div>