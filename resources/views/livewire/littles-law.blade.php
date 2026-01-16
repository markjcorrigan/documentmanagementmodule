{{-- resources/views/livewire/littles-law.blade.php --}}
<section>
    <div class="max-w-6xl mx-auto px-4 py-8">
    <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-8 border-b border-gray-200 dark:border-gray-700 pb-4">
        Little's Law
    </h1>

{{--    <hr class="border-t-2 border-gray-200 dark:border-gray-700 my-8">--}}

    <div class="mb-8">
        <a
                href="#playlist"
                class="inline-block text-lg font-semibold text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 bg-blue-50 dark:bg-blue-900/30 px-6 py-3 rounded-lg transition-all duration-300 hover:-translate-y-1 hover:shadow-lg"
        >
            PLAYLIST
        </a>
    </div>

    {{-- Video Player Section --}}
    <div id="player" class="text-center my-8">
        <div class="bg-gray-50 dark:bg-gray-800 rounded-lg shadow-lg p-8">
            <div class="max-w-4xl mx-auto">
                <video
                        id="video1"
                        data-able-player
                        playsinline
                        class="w-full rounded-lg"
                        poster="{{ asset('storage/images/littleslaw.jpg') }}"
                        width="580"
                        height="460"
                ></video>
            </div>
        </div>
    </div>

    {{-- Playlist Section --}}
    <div id="playlist" class="mt-12 pt-8 border-t border-gray-200 dark:border-gray-700">
        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">
            <a name="playlist"></a>Playlist
        </h2>

{{--        <p class="text-lg text-gray-700 dark:text-gray-300 mb-6">--}}
{{--            An AblePlayer playlist is any &lt;ul&gt; with class="able-playlist".<br>--}}
{{--            The value of data-player must match the id of the media element.<br>--}}
{{--            See documentation for additional details.--}}
{{--        </p>--}}

        {{-- AblePlayer playlist --}}
        <ul class="able-playlist bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden" data-player="video1">
            <li>
                <span
                        class="able-source"
                        data-type="video/mp4"
                        data-src="/ablelvids/littleslaw/littleslaw.mp4"
                        data-poster="/images/littleslaw.jpg"
                        data-width="480"
                        data-height="360"
                ></span>

                <button
                        type="button"
                        class="w-full p-6 flex items-center gap-6 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200"
                >
                    <img
                            src="{{ asset('storage/images/littleslaw.jpg') }}"
                            alt="Little's Law video thumbnail"
                            class="w-32 h-24 object-cover rounded-lg flex-shrink-0 shadow-md"
                    >
                    <span class="text-lg font-semibold text-gray-900 dark:text-white text-left">
                        Little's Law
                    </span>
                </button>
            </li>
        </ul>
    </div>
</div>

{{-- Include Able Player Assets --}}
{{--<link rel="stylesheet" href="{{ asset('ableplayer/build/ableplayer.min.css') }}">--}}
{{--<script src="{{ asset('ableplayer/thirdparty/js.cookie.js') }}"></script>--}}
{{--<script src="{{ asset('ableplayer/build/ableplayer.js') }}"></script>--}}

<style>
    /* Minimal style to hide able-source elements as they're metadata only */
    .able-source {
        display: none;
    }

    /* Reset default button styling for playlist items */
    .able-playlist {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .able-playlist li {
        padding: 0;
        margin: 0;
        border-bottom: 1px solid #e5e7eb;
    }

    .dark .able-playlist li {
        border-bottom-color: #374151;
    }

    .able-playlist li:last-child {
        border-bottom: none;
    }

    .able-playlist button {
        background: none;
        border: none;
        cursor: pointer;
        text-align: left;
    }
</style>
</section>