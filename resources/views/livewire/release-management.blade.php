<div>
    <div class="max-w-7xl mx-auto px-4 py-8">
        <h1 class="text-4xl font-semibold text-gray-900 dark:text-white mb-8">
            Release Management
        </h1>

        <div class="space-y-6">
            {{-- Header Section --}}
            <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                <h5 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                    Release Management
                    <span class="text-lg font-normal text-gray-600 dark:text-gray-400">
                        (for <a href="/workingsoftware" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">working software</a>) using JIRA with Bamboo
                    </span>
                </h5>

                <hr class="border-gray-300 dark:border-gray-600 mb-6">

                {{-- Images Section --}}
                <div class="text-center space-y-6">
                    <a href="/accelerate">
                        <img alt="Continuous Capability Improvement"
                             class="img-fluid mx-auto rounded-lg shadow-md"
                             src="{{ asset('storage/images/devqastageuatprod.jpg') }}"
                             title="Click Image to go to Continuous Capability Improvement areas from Accelerate">
                    </a>

                    <img alt="Flowing Process"
                         class="img-fluid mx-auto rounded-lg"
                         src="{{ asset('storage/images/flowing.png') }}">

                    <img alt="JIRA Release Report"
                         class="img-fluid mx-auto rounded-lg"
                         src="{{ asset('storage/images/jirareleasereport.png') }}">
                </div>
            </div>

            {{-- Video Section --}}
            <div class="bg-white dark:bg-gray-800 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                <h5 class="text-xl font-semibold text-gray-900 dark:text-white text-center mb-6">
                    A Bamboo and JIRA discussion
                </h5>

                <div class="flex flex-col md:flex-row items-center justify-center gap-4">
                    <div class="flex-1"></div>
                    <div class="flex-1 flex justify-center">
                        <div class="bg-white dark:bg-gray-800 p-4 rounded-lg border border-gray-200 dark:border-gray-700">
                            <video id="video1"
                                   data-able-player
                                   preload="auto"
                                   data-speed-icons="true"
                                   class="w-full max-w-md rounded-lg"
                                   poster="{{ asset('storage/images/your-poster.jpg') }}"
                                   playsinline>
                                <source type="video/mp4" src="{{ asset('ablelvids/releasemanagementandbamboo/releasemanagementandbamboo.mp4') }}">
                                {{-- Add captions track if available --}}
                                {{-- <track kind="captions" src="{{ asset('ablelvids/releasemanagementandbamboo/captions.vtt') }}" srclang="en" label="English"> --}}
                            </video>
                        </div>
                    </div>
                    <div class="flex-1"></div>
                </div>
            </div>

            {{-- Resources Section --}}
            <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                <div class="space-y-4">
                    <p class="text-lg text-gray-700 dark:text-gray-300">
                        <a href="/home/itil" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">
                            ITIL
                        </a>
                    </p>

                    <p class="text-lg text-gray-700 dark:text-gray-300">
                        <a href="{{ asset('storage/assets/releasemanagement.pdf') }}"
                           class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">
                            Click here for the pdf on ITIL Transition and Release Management
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- Include Able Player assets --}}
    <link rel="stylesheet" href="{{ asset('ableplayer/build/ableplayer.min.css') }}">
    <script src="{{ asset('ableplayer/build/ableplayer.min.js') }}"></script>
</div>