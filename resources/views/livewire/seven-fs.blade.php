<div>
    <div class="max-w-6xl mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-8 border-b border-gray-200 dark:border-gray-700 pb-4">
            3 P's & 7 F's - Development that Pays
        </h1>

        <div class="space-y-8">
            <!-- Header Section -->
            <div class="bg-white dark:bg-gray-800 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                <h2 class="text-3xl font-semibold text-gray-900 dark:text-white mb-4">3 P's and 7 F's Key Terms</h2>
                <hr class="border-gray-200 dark:border-gray-700 mb-6">

                <!-- 3 P's Section -->
                <div class="mb-6">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">3 [Problems] P's:</h3>
                    <div class="grid md:grid-cols-3 gap-4">
                        <div class="bg-red-50 dark:bg-red-900/20 rounded-lg p-4 border border-red-200 dark:border-red-800">
                            <h4 class="font-semibold text-red-900 dark:text-red-300">Pull</h4>
                        </div>
                        <div class="bg-red-50 dark:bg-red-900/20 rounded-lg p-4 border border-red-200 dark:border-red-800">
                            <h4 class="font-semibold text-red-900 dark:text-red-300">Productivity</h4>
                        </div>
                        <div class="bg-red-50 dark:bg-red-900/20 rounded-lg p-4 border border-red-200 dark:border-red-800">
                            <h4 class="font-semibold text-red-900 dark:text-red-300">Predictability</h4>
                        </div>
                    </div>
                </div>

                <!-- 7 F's Section -->
                <div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">7 [Fixes] F's:</h3>
                    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4">
                        <div class="bg-green-50 dark:bg-green-900/20 rounded-lg p-4 border border-green-200 dark:border-green-800">
                            <h4 class="font-semibold text-green-900 dark:text-green-300">Foundation</h4>
                        </div>
                        <div class="bg-green-50 dark:bg-green-900/20 rounded-lg p-4 border border-green-200 dark:border-green-800">
                            <h4 class="font-semibold text-green-900 dark:text-green-300">Flex</h4>
                        </div>
                        <div class="bg-green-50 dark:bg-green-900/20 rounded-lg p-4 border border-green-200 dark:border-green-800">
                            <h4 class="font-semibold text-green-900 dark:text-green-300">Focus</h4>
                        </div>
                        <div class="bg-green-50 dark:bg-green-900/20 rounded-lg p-4 border border-green-200 dark:border-green-800">
                            <h4 class="font-semibold text-green-900 dark:text-green-300">Flow</h4>
                        </div>
                        <div class="bg-green-50 dark:bg-green-900/20 rounded-lg p-4 border border-green-200 dark:border-green-800">
                            <h4 class="font-semibold text-green-900 dark:text-green-300">Fuel</h4>
                        </div>
                        <div class="bg-green-50 dark:bg-green-900/20 rounded-lg p-4 border border-green-200 dark:border-green-800">
                            <h4 class="font-semibold text-green-900 dark:text-green-300">Farewell</h4>
                        </div>
                        <div class="bg-green-50 dark:bg-green-900/20 rounded-lg p-4 border border-green-200 dark:border-green-800">
                            <h4 class="font-semibold text-green-900 dark:text-green-300">Fine-Tune</h4>
                        </div>
                    </div>
                </div>

                <!-- Navigation Section -->
{{--                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6">--}}
{{--                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">--}}
{{--                        Page Navigation--}}
{{--                    </h3>--}}
{{--                    <div class="flex flex-wrap gap-4 justify-center">--}}
{{--                        <a href="#playlist"--}}
{{--                           class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white rounded-lg transition-colors">--}}
{{--                            View Playlist--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}

                <div class="text-center mt-6">
                    <a href="#playlist"
                       class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 text-lg font-semibold">
                        JUMP TO VIDEO PLAYLIST ▼
                    </a>
                </div>
            </div>

            <!-- Able Player Video Section -->
            <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                <div id="player" class="text-center">
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
                    <a name="playlist"></a>Video Playlist
                </h2>

                <!-- Able Player Playlist -->
                <ul class="able-playlist space-y-4" data-player="video1">
                    <!-- 3 P's and 7 F's Video -->
                    <li data-poster="{{ Storage::url('images/sevenfs.jpg') }}"
                        data-width="1920"
                        data-height="1080"
                        class="bg-gray-50 dark:bg-gray-900 rounded-lg p-4 border border-gray-200 dark:border-gray-700">
                        <span class="able-source"
                              data-type="video/mp4"
                              data-src="{{ Storage::url('assets/ablevids/sevenfs/sevenfs.mp4') }}">
                        </span>
                        <button type="button" class="flex items-center space-x-4 w-full text-left hover:bg-gray-100 dark:hover:bg-gray-800 p-3 rounded-lg transition-colors">
                            <img src="{{ Storage::url('images/sevenfs.jpg') }}"
                                 alt="3 P's and 7 F's Video Thumbnail"
                                 class="w-24 h-16 object-cover rounded">
                            <span class="text-lg font-semibold text-gray-900 dark:text-white">3 P's and 7 F's from Development that Pays</span>
                        </button>
                    </li>

                    <!-- Story Splitting Video -->
                    <li data-poster="{{ Storage::url('images/splitstories.jpg') }}"
                        data-width="1920"
                        data-height="1080"
                        class="bg-gray-50 dark:bg-gray-900 rounded-lg p-4 border border-gray-200 dark:border-gray-700">
                        <span class="able-source"
                              data-type="video/mp4"
                              data-src="{{ Storage::url('assets/ablevids/storysplitting.mp4') }}">
                        </span>
                        <button type="button" class="flex items-center space-x-4 w-full text-left hover:bg-gray-100 dark:hover:bg-gray-800 p-3 rounded-lg transition-colors">
                            <img src="{{ Storage::url('images/splitstories.jpg') }}"
                                 alt="Story Splitting Video Thumbnail"
                                 class="w-24 h-16 object-cover rounded">
                            <span class="text-lg font-semibold text-gray-900 dark:text-white">Story Splitting</span>
                        </button>
                    </li>
                </ul>
            </div>

            <!-- Content Sections -->
            <div class="space-y-8">
                <!-- PMI ACP Section -->
                <div class="bg-white dark:bg-gray-800 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                    <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">Some ideas on above - from the trenches</h3>
                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-4">
                        The Project Management Institute Agile Certified Practitioner (ACP) Exam handles Agile in 3 key areas:
                    </p>
                    <ul class="list-disc list-inside text-xl text-gray-700 dark:text-gray-300 space-y-2 ml-4">
                        <li>Scrum (Their chosen Agile project method)</li>
                        <li>XP (Extreme Programming - focused on building Agile programming skills)</li>
                        <li>Lean/Kanban (focused on visualization of work and how well "features" [not user stories] flow through a system)</li>
                    </ul>
                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mt-4">
                        The point made is that all are needed for success in Agile!
                    </p>
                </div>

                <!-- Agile Scrum Diagram -->
                <div class="bg-white dark:bg-gray-800 rounded-lg p-6 border border-gray-200 dark:border-gray-700 text-center">
                    <img class="mx-auto rounded-lg shadow-lg max-w-full h-auto"
                         src="{{ asset('storage/images/agilescrumlifecycldiagram.png') }}"
                         alt="Agile Scrum Lifecycle Diagram">
                </div>

                <!-- Additional content sections would continue here -->
                <!-- You can add the remaining content following the same pattern -->

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