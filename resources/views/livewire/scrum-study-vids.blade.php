{{-- resources/views/livewire/scrum-study-vids.blade.php --}}
<section>
<div class="max-w-6xl mx-auto px-4 py-8">
    <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-8 border-b border-gray-200 dark:border-gray-700 pb-4">
        Scrum Study Videos
    </h1>

    <hr class="border-t-2 border-gray-200 dark:border-gray-700 my-8">

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
                        preload="false"
                        data-able-player
                        playsinline
                        class="w-full rounded-lg"
                        width="480"
                        height="360"
                        poster="{{ asset('storage/images/scrum.png') }}"
                ></video>
            </div>
        </div>
    </div>

    {{-- Playlist Section --}}
    <div id="playlist" class="mt-12 pt-8 border-t border-gray-200 dark:border-gray-700">
        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">
            <a name="playlist"></a>Playlist
        </h2>

{{--        <div class="text-lg text-gray-700 dark:text-gray-300 mb-6">--}}
{{--            <p class="mb-2">An AblePlayer playlist is any &lt;ul&gt; with class="able-playlist".</p>--}}
{{--            <p class="mb-2">The value of data-player must match the id of the media element.</p>--}}
{{--            <p>See documentation for additional details.</p>--}}
{{--        </div>--}}

        {{-- Video Categories --}}
        <div class="flex flex-wrap gap-2 mb-6">
            <span class="inline-block px-4 py-2 bg-blue-50 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300 rounded-full text-sm font-medium border border-blue-200 dark:border-blue-700">
                Core Scrum Concepts
            </span>
            <span class="inline-block px-4 py-2 bg-blue-50 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300 rounded-full text-sm font-medium border border-blue-200 dark:border-blue-700">
                Scrum Principles
            </span>
            <span class="inline-block px-4 py-2 bg-blue-50 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300 rounded-full text-sm font-medium border border-blue-200 dark:border-blue-700">
                Software Developer Focus
            </span>
        </div>

        {{-- AblePlayer playlist --}}
        <ul class="able-playlist bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden max-h-[800px] overflow-y-auto" data-player="video1">
            {{-- Video 1 - Introduction --}}
            <li data-poster="{{ asset('storage/images/scrum.png') }}" data-width="480" data-height="360">
                <span class="able-source" data-type="video/mp4" data-src="/ablelvids/scrumstudy/scrumsixmins.mp4"></span>
                <button type="button" class="w-full p-6 flex items-center gap-6 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                    <img
                            src="{{ asset('storage/images/scrum.png') }}"
                            alt="Scrum in 6 Minutes"
                            class="w-32 h-24 object-cover rounded-lg flex-shrink-0 shadow-md border border-gray-200 dark:border-gray-600"
                    >
                    <div class="flex-1 flex flex-col gap-1 text-left">
                        <span class="text-sm font-medium text-gray-600 dark:text-gray-400">Introduction</span>
                        <span class="text-lg font-semibold text-gray-900 dark:text-white">SCRUM IN 6 MINUTES!</span>
                    </div>
                </button>
            </li>

            {{-- Core Scrum Videos (1-12) --}}
            @php
                $coreVideos = [
                    ['num' => 1, 'title' => 'Introduction', 'file' => 'oneintroduction.mp4'],
                    ['num' => 2, 'title' => 'Overview of Scrum', 'file' => 'twooverviewofscrum.mp4'],
                    ['num' => 3, 'title' => 'History of Scrum', 'file' => 'threehistoryofscrum.mp4'],
                    ['num' => 4, 'title' => 'Why Use Scrum', 'file' => 'fourwhyusescrum.mp4'],
                    ['num' => 5, 'title' => 'Scalability of Scrum', 'file' => 'fivescalabilityofscrum.mp4'],
                    ['num' => 6, 'title' => 'Purpose of the Scrum Bok Guide', 'file' => 'sixpurposeofsbokguide.mp4'],
                    ['num' => 7, 'title' => 'Scrum Framework', 'file' => 'sevensrumframework.mp4'],
                    ['num' => 8, 'title' => 'How to use the Scrum Bok Guide', 'file' => 'eighthowtousesbokguide.mp4'],
                    ['num' => 9, 'title' => 'Scrum Principles', 'file' => 'ninescrumprinciples.mp4'],
                    ['num' => 10, 'title' => 'Scrum Aspects', 'file' => 'tenscrumaspects.mp4'],
                    ['num' => 11, 'title' => 'Scrum Processes', 'file' => 'elevenscrumprocesses.mp4'],
                    ['num' => 12, 'title' => 'Scrum vs Traditional Project Management', 'file' => 'twelvescrumvstraditionalprojectmanagement.mp4'],
                ];
            @endphp

            @foreach($coreVideos as $video)
                <li data-poster="{{ asset('storage/images/scrum.png') }}" data-width="480" data-height="360">
                    <span class="able-source" data-type="video/mp4" data-src="/ablelvids/scrumstudy/{{ $video['file'] }}"></span>
                    <button type="button" class="w-full p-6 flex items-center gap-6 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                        <img
                                src="{{ asset('storage/images/scrum.png') }}"
                                alt="{{ $video['title'] }}"
                                class="w-32 h-24 object-cover rounded-lg flex-shrink-0 shadow-md border border-gray-200 dark:border-gray-600"
                        >
                        <div class="flex-1 flex flex-col gap-1 text-left">
                            <span class="text-sm font-medium text-gray-600 dark:text-gray-400">Video {{ $video['num'] }}</span>
                            <span class="text-lg font-semibold text-gray-900 dark:text-white">{{ $video['title'] }}</span>
                        </div>
                    </button>
                </li>
            @endforeach

            {{-- Software Developer Videos (1-8) --}}
            @php
                $devVideos = [
                    ['num' => 'SD-1', 'title' => 'Introduction to Principles of Scrum', 'file' => 'onesdintroductiontoprinciplesofscrum.mp4'],
                    ['num' => 'SD-2', 'title' => 'Empirical Process Control', 'file' => 'twosdrrolesguidesandempiricalprocesscontrol.mp4'],
                    ['num' => 'SD-3', 'title' => 'Self Organization', 'file' => 'threesdselforganization.mp4'],
                    ['num' => 'SD-4', 'title' => 'Collaboration', 'file' => 'foursdcollaboration.mp4'],
                    ['num' => 'SD-5', 'title' => 'Value Based Prioritization', 'file' => 'fivesdvaluebasedprioritization.mp4'],
                    ['num' => 'SD-6', 'title' => 'Time Boxing', 'file' => 'sixsdtimeboxing.mp4'],
                    ['num' => 'SD-7', 'title' => 'Iterative Development', 'file' => 'sevensditerativedevelopment.mp4'],
                    ['num' => 'SD-8', 'title' => 'Scrum vs Traditional Project Management', 'file' => 'eightsdscrumvstraditionalprojectnanagement.mp4'],
                ];
            @endphp

            @foreach($devVideos as $video)
                <li data-poster="/images/scrumvideostraining.png" data-width="480" data-height="360">
                    <span class="able-source" data-type="video/mp4" data-src="/ablelvids/scrumstudy/{{ $video['file'] }}"></span>
                    <button type="button" class="w-full p-6 flex items-center gap-6 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                        <img
                                src="{{ asset('storage/images/scrum.png') }}"
                                alt="{{ $video['title'] }}"
                                class="w-32 h-24 object-cover rounded-lg flex-shrink-0 shadow-md border border-gray-200 dark:border-gray-600"
                        >
                        <div class="flex-1 flex flex-col gap-1 text-left">
                            <span class="text-sm font-medium text-gray-600 dark:text-gray-400">{{ $video['num'] }}</span>
                            <span class="text-lg font-semibold text-gray-900 dark:text-white">{{ $video['title'] }}</span>
                        </div>
                    </button>
                </li>
            @endforeach
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

    /* Reset default styling for playlist */
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

    /* Mobile responsive adjustments */
    @media (max-width: 640px) {
        .able-playlist button {
            flex-direction: column;
            align-items: flex-start;
            gap: 1rem;
        }

        .able-playlist button img {
            width: 100%;
            max-width: 200px;
            height: auto;
        }
    }
</style>
</section>