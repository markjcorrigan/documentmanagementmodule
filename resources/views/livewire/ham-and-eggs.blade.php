{{-- resources/views/livewire/ham-and-eggs.blade.php --}}
<div>
    <div class="max-w-6xl mx-auto px-4 py-8">
        <h1 class="text-4xl font-semibold text-gray-900 dark:text-white mb-8">
            Scrum: The Pigs and the Chickens
        </h1>

        <div class="space-y-8">
            {{-- Divider --}}
            <hr class="border-gray-300 dark:border-gray-600">

            {{-- Main Content Section --}}
            <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                <div class="text-center space-y-6">
                    {{-- Pig and Chicken Image --}}
                    <div class="bg-white dark:bg-white p-6 rounded-lg border border-gray-300 dark:border-gray-400 shadow-sm max-w-2xl mx-auto">
                        <img alt="Scrum Pigs and Chickens"
                             class="img-fluid rounded-lg w-full h-auto"
                             src="{{ asset('storage/images/Pig-and-chicken.png') }}">
                    </div>

                    {{-- PDF Download Section --}}
                    <div class="bg-white dark:bg-gray-800 rounded-lg p-6 border border-gray-200 dark:border-gray-700 max-w-2xl mx-auto">
                        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">
                            Scrum Overview
                        </h2>

                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-4">
                            <a href="{{ asset('storage/assets/scrum2p.pdf') }}"
                               class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300 font-semibold text-lg">
                                Click here for a 2 page overview of SCRUM
                            </a>
                        </p>

                        <p class="text-lg text-gray-600 dark:text-gray-400">
                            In the pdf you download, can you spot the Pigs and the Chickens?
                        </p>
                    </div>
                </div>
            </div>

            {{-- Explanation Section --}}
            <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">
                    Understanding the Analogy
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Pigs --}}
                    <div class="bg-red-50 dark:bg-red-900/20 rounded-lg p-4 border border-red-200 dark:border-red-800">
                        <h3 class="text-xl font-semibold text-red-900 dark:text-red-300 mb-3 flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd"/>
                            </svg>
                            The Pigs (Committed)
                        </h3>
                        <ul class="space-y-2 text-red-800 dark:text-red-200">
                            <li class="flex items-start">
                                <span class="text-red-500 mr-2">•</span>
                                <span>Fully committed to the project</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-red-500 mr-2">•</span>
                                <span>Accountable for success</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-red-500 mr-2">•</span>
                                <span>Core Scrum roles: Product Owner, Scrum Master, Development Team</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-red-500 mr-2">•</span>
                                <span>"Bacon and eggs" - the pig is committed!</span>
                            </li>
                        </ul>
                    </div>

                    {{-- Chickens --}}
                    <div class="bg-yellow-50 dark:bg-yellow-900/20 rounded-lg p-4 border border-yellow-200 dark:border-yellow-800">
                        <h3 class="text-xl font-semibold text-yellow-900 dark:text-yellow-300 mb-3 flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                            </svg>
                            The Chickens (Involved)
                        </h3>
                        <ul class="space-y-2 text-yellow-800 dark:text-yellow-200">
                            <li class="flex items-start">
                                <span class="text-yellow-500 mr-2">•</span>
                                <span>Involved but not committed</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-yellow-500 mr-2">•</span>
                                <span>Provide input and feedback</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-yellow-500 mr-2">•</span>
                                <span>Stakeholders, customers, managers</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-yellow-500 mr-2">•</span>
                                <span>"Bacon and eggs" - the chicken is involved!</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            {{-- Call to Action --}}
            <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6 text-center">
                <h3 class="text-xl font-semibold text-blue-900 dark:text-blue-300 mb-4">
                    Ready to Learn More About Scrum?
                </h3>
                <p class="text-blue-800 dark:text-blue-200 mb-4">
                    Download the 2-page overview and test your understanding of Scrum roles and responsibilities.
                </p>
                <a href="{{ asset('storage/assets/scrum2p.pdf') }}"
                   class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors inline-flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    Download Scrum Overview PDF
                </a>
            </div>
        </div>
    </div>
</div>