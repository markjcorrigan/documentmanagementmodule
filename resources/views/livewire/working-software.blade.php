<div class="max-w-7xl mx-auto px-4 py-8">
    <h1 class="text-4xl font-semibold text-gray-900 dark:text-white mb-8">
        Agile and Scrum: Working Software
    </h1>

    <div class="space-y-6">
        {{-- Header Section --}}
        <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">
                Agile and Scrum and the importance of building "Working Software"
            </h2>

            <hr class="border-gray-300 dark:border-gray-600 mb-6">

            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                Test your understanding of what comprises working software.<br>
                Which "Scenario" below would you say represents working software?
            </h3>

            <hr class="border-gray-300 dark:border-gray-600 mb-6">

            {{-- Working Software Image --}}
            <div class="bg-white dark:bg-white p-4 rounded-lg border border-gray-300 dark:border-gray-400 shadow-sm">
                <img alt="Working Software Scenarios"
                     class="mx-auto rounded-lg max-w-full h-auto"
                     src="{{ asset('storage/images/workingsoftware.png') }}">
            </div>
        </div>

        {{-- Interactive Answer Section --}}
        <div class="bg-white dark:bg-gray-800 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-center w-full">
                <button
                        wire:click="toggleAnswer"
                        class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow transition-colors flex items-center justify-center space-x-2 w-full max-w-md mx-auto"
                >
                    <span class="text-xl">Click here for the answer</span>
                    @if(!$showAnswer)
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    @else
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                        </svg>
                    @endif
                </button>
            </div>

            {{-- Collapsible Answer --}}
            @if($showAnswer)
                <div class="mt-6 animate-fade-in">
                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-gray-800 dark:to-gray-700 rounded-lg border border-blue-200 dark:border-blue-800">
                        {{-- Card Header --}}
                        <div class="bg-blue-600 dark:bg-blue-700 rounded-t-lg p-4">
                            <h3 class="text-xl font-semibold text-white text-center">
                                Working Software is the absolute essence of Agile and the Agile Manifesto.
                            </h3>
                        </div>

                        {{-- Card Body --}}
                        <div class="p-6 text-center space-y-6">
                            {{-- Working Software Spec Image --}}
                            <div class="bg-white dark:bg-white p-4 rounded-lg border border-gray-300 dark:border-gray-400 shadow-sm">
                                <img alt="Working Software Specification"
                                     class="mx-auto rounded-lg max-w-full h-auto"
                                     src="{{ asset('storage/images/workingsoftwarespec.png') }}">
                            </div>

                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                And pertaining to this part of the Agile Manifesto
                            </h3>

                            {{-- Agile Manifesto Image --}}
                            <div class="bg-white dark:bg-white p-4 rounded-lg border border-gray-300 dark:border-gray-400 shadow-sm">
                                <img alt="Agile Manifesto - Working Software"
                                     class="mx-auto rounded-lg max-w-full h-auto"
                                     src="{{ asset('storage/images/working.png') }}">
                            </div>
                        </div>

                        {{-- Card Footer --}}
                        <div class="bg-blue-100 dark:bg-blue-900/30 rounded-b-lg p-4 border-t border-blue-200 dark:border-blue-700">
                            <p class="text-lg font-semibold text-blue-900 dark:text-blue-300 text-center">
                                If you are not building working software and demonstrating it you are NOT doing AGILE!
                            </p>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        {{-- Resources Section --}}
        {{-- Resources Section --}}
{{--        <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 border border-gray-200 dark:border-gray-700">--}}
{{--            <div class="space-y-4">--}}
{{--                <p class="text-lg text-gray-700 dark:text-gray-300">--}}
{{--                    <a href="{{ url('viewpdf/guides/workingsoftware.pdf') }}"--}}
{{--                       target="_blank"--}}
{{--                       class="inline-flex items-center text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">--}}
{{--                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">--}}
{{--                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>--}}
{{--                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>--}}
{{--                        </svg>--}}
{{--                        View PDF about working software--}}
{{--                    </a>--}}
{{--                    <span class="mx-2 text-gray-500">|</span>--}}
{{--                    <a href="{{ url('download/guides/workingsoftware.pdf') }}"--}}
{{--                       class="inline-flex items-center text-green-600 dark:text-green-400 underline hover:text-green-800 dark:hover:text-green-300">--}}
{{--                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">--}}
{{--                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>--}}
{{--                        </svg>--}}
{{--                        Download PDF--}}
{{--                    </a>--}}
{{--                </p>--}}

{{--                <p class="text-lg text-gray-700 dark:text-gray-300">--}}
{{--                    <a href="/home/productincrement"--}}
{{--                       class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">--}}
{{--                        Click here for information about the "product increment." Use this to stay "in gradient."--}}
{{--                    </a>--}}
{{--                </p>--}}

{{--                --}}{{-- Additional resource example with video --}}
{{--                <p class="text-lg text-gray-700 dark:text-gray-300">--}}
{{--                    <a href="{{ url('viewvideo/videos/product-increment.mp4') }}"--}}
{{--                       target="_blank"--}}
{{--                       class="inline-flex items-center text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">--}}
{{--                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">--}}
{{--                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path>--}}
{{--                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>--}}
{{--                        </svg>--}}
{{--                        Watch product increment video--}}
{{--                    </a>--}}
{{--                </p>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>

    <style>
        .animate-fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</div>