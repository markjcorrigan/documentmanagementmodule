<div x-data="{ showImage: false, imageSrc: '', showAdditional: false }">
    <section class="w-full py-8">
        @auth
            <div class="container mx-auto px-4 text-center">
                <h5 class="text-xl font-semibold mb-4">Project Type Selection: Traditional Project Management (TPM) or Agile Project Management (APM)</h5>

                <p class="mb-4">
                    On the image below (click the approach (processes)) required for TPM
                    <a href="/pmbok-spa"><u>(PMBOK 6)</u></a>
                    or APM  <a href="/sbok-four"><u>(SBOK 4)</u></a> Project Management.
                </p>

                <div class="relative inline-block max-w-full mx-auto">
                    <img
                        alt="TPM vs Agile"
                        class="block w-full h-auto"
                        src="{{ asset('storage/images/waterfallvsagile.png') }}"
                    >

                    <!-- Left side - PMBOK -->
                    <a href="/pmbok-spa"
                       class="absolute top-0 left-0 block z-10"
                       style="width: 42.7%; height: 100%;"
                       title="For the TPM Processes - click here">
                        <span class="sr-only">PMBOK Traditional</span>
                    </a>

                    <!-- Right side - SBOK -->
                    <a href="/sbok-four"
                       class="absolute top-0 right-0 block z-10"
                       style="width: 57.3%; height: 100%;"
                       title="For the APM (Scrum) processes click here">
                        <span class="sr-only">SBOK Agile</span>
                    </a>
                </div>

                <!-- Additional Information Collapsible Section -->
                <div class="mt-8 max-w-3xl mx-auto">
                    <button
                        @click="showAdditional = !showAdditional"
                        class="w-full bg-blue-600 dark:bg-blue-700 text-white px-6 py-3 rounded-lg flex items-center justify-between hover:bg-blue-700 dark:hover:bg-blue-800 transition-colors">
                        <span class="font-semibold">Additional Information</span>
                        <svg
                            class="w-5 h-5 transform transition-transform duration-200"
                            :class="{ 'rotate-180': showAdditional }"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>

                    <div
                        x-show="showAdditional"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform -translate-y-2"
                        x-transition:enter-end="opacity-100 transform translate-y-0"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 transform translate-y-0"
                        x-transition:leave-end="opacity-0 transform -translate-y-2"
                        class="mt-4 bg-gray-50 dark:bg-gray-800 rounded-lg p-6 text-left space-y-4">

                        <p>
                            <a href="#"
                               @click.prevent="showImage = true; imageSrc = '{{ asset('storage/images/howdoyouwanttowork.jpg') }}'"
                               class="text-blue-600 dark:text-blue-400 hover:underline cursor-pointer">
                                How do you want to work?
                            </a>
                        </p>

                        <p>
                            <a href="#"
                               @click.prevent="showImage = true; imageSrc = '{{ asset('storage/images/uncertainmatrix.gif') }}'"
                               class="text-blue-600 dark:text-blue-400 hover:underline cursor-pointer">
                                Dr Robert Wysocki, a mentor, has an interesting take on project method selection.
                            </a>
                        </p>

                        <p>
                            <a href="#"
                               @click.prevent="showImage = true; imageSrc = '{{ asset('storage/images/tradtoscrum.jpg') }}'"
                               class="text-blue-600 dark:text-blue-400 hover:underline cursor-pointer">
                                The Project Method continuum. More Agile more risk?
                            </a>
                        </p>

                        <p>
                            <a href="#"
                               @click.prevent="showImage = true; imageSrc = '{{ asset('storage/images/tailoring.jpg') }}'"
                               class="text-blue-600 dark:text-blue-400 hover:underline cursor-pointer">
                                Tailoring. You can deviate from the PMBOK processes. <br>But for audit purposes make sure you keep a note of "why and when" the decision was made!
                            </a>
                        </p>

                        <p>
                            <a href="{{ asset('storage/assets/scrumban.pdf') }}" target="_blank"
                               class="text-blue-600 dark:text-blue-400 hover:underline cursor-pointer">
                                Kanban is not a project method. ScrumBan is a move towards Scrum.
                            </a>
                        </p>
                    </div>
                </div>

            </div>
        @endauth
    </section>

    <!-- Image Lightbox Modal -->
    <div x-show="showImage"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @click="showImage = false"
         class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-75 p-4"
         style="display: none;">

        <!-- Close button -->
        <button @click="showImage = false"
                class="absolute top-4 right-4 text-white hover:text-gray-300 transition-colors z-10">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>

        <!-- Image -->
        <img :src="imageSrc"
             @click.stop
             class="max-w-full max-h-[90vh] object-contain rounded-lg shadow-2xl"
             alt="Full size image">
    </div>
</div>
