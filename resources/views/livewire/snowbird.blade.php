{{-- resources/views/livewire/snowbird.blade.php --}}
<div>
    {{-- Page Header --}}
    <section class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Snowbird - and the last 3 decades</h1>
        <hr class="border-gray-300 dark:border-gray-600 mb-6">
        <p class="text-lg text-gray-700 dark:text-gray-300">
            <a href="#playlist" class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-200 font-semibold">
                PLAYLIST
            </a>
        </p>
    </section>

    {{-- Video Player Section --}}
    <section class="mb-12">
        <div class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-4 sm:p-6">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Video Player</h2>

            {{-- Player Container with Proper Centering --}}
            <div id="player" class="text-center mb-8">
                <div class="w-full mx-auto bg-white dark:bg-gray-800 p-4 rounded-lg border border-gray-200 dark:border-gray-700 mb-8">
                    <video
                            id="video1"
                            preload="false"
                            data-able-player
                            playsinline
                            loop
                            class="w-full rounded-lg">
                    </video>
                </div>
            </div>

            {{-- Playlist Section --}}
            <div id="playlist" class="mt-8">
                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">
                    <a name="playlist"></a>Playlist
                </h2>

                {{-- Able Player Playlist --}}
                <div class="w-full mx-auto">
                    <ul class="able-playlist space-y-4 w-full" data-player="video1">
                        @foreach($videos as $video)
                            <li
                                    id="{{ $video['id'] }}"
                                    data-poster="{{ Storage::url($video['poster_path']) }}"
                                    data-width="{{ $video['width'] }}"
                                    data-height="{{ $video['height'] }}"
                                    class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 overflow-hidden hover:shadow-lg transition-shadow duration-200 w-full"
                            >
                                <span class="able-source"
                                      data-type="video/mp4"
                                      data-src="{{ Storage::url($video['video_path']) }}">
                                </span>

                                <button type="button" class="w-full text-left p-4 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200 flex items-center space-x-4">
                                    <div class="flex-shrink-0">
                                        <img
                                                src="{{ Storage::url($video['poster_path']) }}"
                                                alt="{{ $video['alt'] }}"
                                                class="w-20 h-15 object-cover rounded border border-gray-200 dark:border-gray-600"
                                        >
                                    </div>
                                    <div class="flex-grow min-w-0">
                                        <span class="text-lg font-medium text-gray-900 dark:text-white break-words">
                                            {{ $video['title'] }}
                                        </span>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <svg class="w-6 h-6 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                </button>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- Implementation Notes --}}
{{--    <section class="mt-12">--}}
{{--        <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-700 rounded-lg p-6 w-full mx-auto">--}}
{{--            <h3 class="text-lg font-semibold text-blue-900 dark:text-blue-300 mb-4">Implementation Notes</h3>--}}
{{--            <div class="space-y-3 text-sm text-blue-800 dark:text-blue-200">--}}
{{--                <p><strong>Storage Path:</strong> All videos and images are stored in <code>storage/app/public/</code></p>--}}
{{--                <p><strong>Video Format:</strong> MP4 format with accessible captions support</p>--}}
{{--                <p><strong>Player Features:</strong> Loop playback, playlist navigation, responsive design</p>--}}
{{--                <p><strong>Accessibility:</strong> Fully WCAG compliant with Able Player</p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

    {{-- Simple CSS to prevent Able Player overflow --}}
    <style>
        /* Reset everything to normal first */
        #player,
        #player > div,
        #video1,
        .able-player,
        .able-wrapper {
            max-width: 100% !important;
            width: 100% !important;
            margin: 0 auto !important;
        }

        /* Specifically target the Able Player generated elements */
        .able-video,
        .able-video video,
        .able-media-container {
            max-width: 100% !important;
            width: 100% !important;
            overflow: hidden !important;
        }

        /* Mobile-specific: add some right padding to ensure scroll button space */
        @media (max-width: 768px) {
            #player > div {
                padding-right: 1rem !important;
                margin-right: 0.5rem !important;
            }
        }
    </style>

    {{-- Able Player Assets --}}
    @push('styles')
        <link rel="stylesheet" href="{{ asset('ableplayer/build/ableplayer.min.css') }}">
    @endpush

    @push('scripts')
        <script src="{{ asset('ableplayer/build/ableplayer.min.js') }}"></script>
    @endpush
</div>