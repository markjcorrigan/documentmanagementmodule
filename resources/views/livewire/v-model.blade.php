{{-- resources/views/livewire/v-model.blade.php --}}
<div>
    <div class="max-w-6xl mx-auto px-4 py-8">
        <h1 class="text-4xl font-semibold text-gray-900 dark:text-white mb-8">
            The V Model
        </h1>

        <div class="space-y-6">
            {{-- Main content section --}}
            <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                <h2 class="text-3xl font-semibold text-gray-900 dark:text-white mb-4">
                    Understanding the V Model
                </h2>

                <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-4">
                    The V Model is all about bidirectional traceability (a CMMi REQM SP 1.4) and Verification and Validation (CMMi Level 3 processes).
                </p>

                <p class="text-lg text-gray-600 dark:text-gray-400 mb-6">
                    Essential for Software Engineering success (and especially CM (Configuration Management) if you want to do it correctly.
                </p>

                {{-- CMMI Dashboard Link --}}
                <div class="mb-6">
                    <a href="/cmmidevdashboard"
                       class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300 text-lg">
                        Click here for the CMMi Dashboard
                    </a>
                    <span class="text-lg text-gray-600 dark:text-gray-400 ml-2">
                        and find these essential processes.
                    </span>
                </div>

                {{-- V Model Image --}}
                <div class="text-center">
                    <img class="img-fluid mx-auto rounded-lg shadow-lg"
                         src="{{ asset('storage/images/vmodelbevel.png') }}"
                         alt="V Model Diagram">
                </div>
            </div>

            {{-- Key Features Section --}}
            <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">
                    Key Features of the V Model
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-lg">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                            Bidirectional Traceability
                        </h3>
                        <p class="text-gray-700 dark:text-gray-300">
                            Ensures requirements are traced through development and testing phases (CMMi REQM SP 1.4).
                        </p>
                    </div>

                    <div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-lg">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                            Verification & Validation
                        </h3>
                        <p class="text-gray-700 dark:text-gray-300">
                            Core CMMi Level 3 processes that ensure quality throughout the development lifecycle.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Benefits Section --}}
            <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">
                    Benefits of Implementing V Model
                </h2>

                <ul class="space-y-3 text-lg text-gray-700 dark:text-gray-300">
                    <li class="flex items-start">
                        <span class="text-green-500 mr-2">✓</span>
                        <span>Improved software quality and reliability</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-green-500 mr-2">✓</span>
                        <span>Better requirement management and traceability</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-green-500 mr-2">✓</span>
                        <span>Early defect detection and prevention</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-green-500 mr-2">✓</span>
                        <span>Compliance with CMMi Level 3 requirements</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-green-500 mr-2">✓</span>
                        <span>Enhanced configuration management practices</span>
                    </li>
                </ul>
            </div>

            {{-- Call to Action --}}
{{--            <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6 text-center">--}}
{{--                <h3 class="text-xl font-semibold text-blue-900 dark:text-blue-300 mb-2">--}}
{{--                    Ready to implement the V Model?--}}
{{--                </h3>--}}
{{--                <p class="text-blue-800 dark:text-blue-200 mb-4">--}}
{{--                    Explore our CMMi Dashboard to see these processes in context.--}}
{{--                </p>--}}
{{--                <a href="/cmmidevdashboard"--}}
{{--                   class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors inline-block">--}}
{{--                    Visit CMMi Dashboard--}}
{{--                </a>--}}
{{--            </div>--}}
        </div>
    </div>
</div>