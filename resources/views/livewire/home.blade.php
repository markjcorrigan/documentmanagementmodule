<div class="home-page">
    @push('styles')
        <link rel="stylesheet"
              href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@3.26.0/dist/tabler-icons.min.css"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

        <style>
            /* Scope all styles to .home-page */
            .home-page {
                /* Pin sizing - properly constrained */

                #pin,
                #pinauthed {
                    width: 152px !important;
                    height: 144px !important;
                    min-width: 152px !important;
                    min-height: 144px !important;
                    max-width: 152px !important;
                    max-height: 144px !important;
                    object-fit: contain !important;
                    display: block !important;
                    margin-top: 1rem;
                }

                /* Coming Soon image - larger and centered for collapsible section */
                .coming-soon-image {
                    width: 12cm !important;
                    height: auto !important;
                    display: block !important;
                    margin: 0 auto !important;
                }

                @media (max-width: 640px) {
                    #pin,
                    #pinauthed {
                        width: 114px !important;
                        height: 108px !important;
                        min-width: 114px !important;
                        min-height: 108px !important;
                        max-width: 114px !important;
                        max-height: 108px !important;
                    }

                    .coming-soon-image {
                        width: 8cm !important;
                    }
                }

                @media (max-width: 480px) {
                    .coming-soon-image {
                        width: 6cm !important;
                    }
                }

                /* Keep image near edges on mobile */
                @media (max-width: 640px) {
                    .grid-container {
                        padding-left: 0.75rem !important;
                        padding-right: 0.75rem !important;
                    }

                    .image-row {
                        margin-left: -0.25rem;
                        margin-right: -0.25rem;
                        width: calc(100% + 0.5rem);
                    }

                    .flex.flex-col {
                        margin-left: -0.25rem;
                        margin-right: -0.25rem;
                        width: calc(100% + 0.5rem);
                    }
                }

                /* Responsive image constraints for ALL images */

                img {
                    max-width: 100%;
                    height: auto;
                    display: block;
                }

                /* Prevent any image from breaking container bounds */

                .grid-container img,
                .container img {
                    max-width: 100% !important;
                    width: auto !important;
                    height: auto !important;
                }

                /* Override the generic img rules for coming-soon specifically */
                .grid-container .coming-soon-image,
                .grid-container img.coming-soon-image {
                    width: 12cm !important;
                }

                /* Mission section image responsive sizing */

                .our-mission__image {
                    max-width: 100% !important;
                    width: 100% !important;
                    overflow: hidden !important;
                }

                .our-mission__image img {
                    max-width: 100% !important;
                    width: 100% !important;
                    height: auto !important;
                    object-fit: cover;
                }

                @media (min-width: 640px) {
                    .our-mission__image {
                        max-width: 400px !important;
                    }
                }

                /* Mobile-specific constraints for mission section */
                @media (max-width: 640px) {
                    .our-mission__image {
                        margin-left: 0 !important;
                        margin-right: 0 !important;
                        padding-left: 0 !important;
                        padding-right: 0 !important;
                    }

                    /* Ensure parent containers don't cause overflow */
                    .section-title {
                        overflow: hidden;
                    }

                    .col1-2 {
                        overflow: hidden;
                    }
                }

                /* Center inline images properly */

                p img.inline-block {
                    max-width: 90%;
                    margin: 0 auto;
                }

                @media (max-width: 640px) {
                    p img.inline-block {
                        max-width: 100%;
                    }
                }

                /* ITIL image container - force white background */

                .itil-container {
                    background-color: #ffffff !important;
                    padding: 1.5rem;
                    border-radius: 0.5rem;
                    border: 2px solid;
                    box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
                    display: inline-block;
                    margin: 0 auto;
                }

                .itil-container img {
                    display: block;
                    margin: 0 auto;
                    max-width: 100%;
                    height: auto;
                }
            }
        </style>
    @endpush

    @auth
        {{-- Hero Section --}}
        <section class="border border-gray-300 dark:border-blue-900 rounded-lg mb-8 shadow-sm overflow-hidden">
            <div class="bg-gray-50 dark:bg-zinc-800 p-8">
                <div class="grid-container">
                    <div class="heading-row">
                        <h2 class="hero__title text-zinc-900 dark:text-white text-4xl mt-2 mb-8 font-medium sm:text-4xl xs:mb-5">
                            Based on project performance, pin down your
                            <span class="text-blue-600 dark:text-blue-400">Capability Maturity Level?</span>
                        </h2>

                        <h3 class="hero__title text-zinc-900 dark:text-white text-2xl mt-2 mb-8 font-medium">
                            I can assist you to move up to Capability Maturity Level 2+
                        </h3>
                    </div>

                    <!-- Image and Pin Container -->
                    <div class="image-row flex flex-col" wire:ignore>
                        <!-- Dunning Kruger Image with Hover Effect -->
                        <div x-data="{ showSecond: false }"
                             class="relative cursor-pointer w-full"
                             @mouseenter="showSecond = true"
                             @mouseleave="showSecond = false"
                             @click="showSecond = !showSecond">

                            <!-- First Image (Default) -->
                            <img src="{{ asset('storage/images/dunningkrugeradjusted.jpg') }}"
                                 alt="Dunning Kruger"
                                 class="w-full h-auto rounded-lg dark:opacity-90 transition-all duration-300"
                                 x-show="!showSecond">

                            <!-- Second Image (On hover/click) -->
                            <img src="{{ asset('storage/images/dunningkrugeradjustedforcorruption.jpg') }}"
                                 alt="Dunning Kruger Alternative"
                                 class="w-full h-auto rounded-lg dark:opacity-90 transition-all duration-300"
                                 x-show="showSecond"
                                 style="display: none;">
                        </div>

                        <!-- Pin directly below the image -->
                        <img id="pinauthed"
                             src="{{ asset('storage/images/pinlarge.png') }}"
                             width="152"
                             height="144"
                             alt="Pin"
                             class="pinauthed dark:drop-shadow-[0_0_8px_rgba(255,255,255,0.3)]"
                             style="cursor: pointer; position: relative;">
                    </div>

                    <p class="text-zinc-900 dark:text-zinc-100 mt-6">Position the pin on the diagram above:</p>

                    <p class="text-zinc-800 dark:text-zinc-200 mt-4">
                        If you are serious about professional project management and
                        <a href="/capability-maturity-model" class="text-blue-600 dark:text-blue-400 hover:underline">
                            <u>operating at CM Levels 2+</u>
                        </a>, then anything to the left of the ladder in the image above is a major problem.
                    </p>

                    <br>
                    <p class="text-center px-4">
                        <img alt="How do you want to work"
                             src="{{ asset('storage/images/howdoyouwanttowork.png') }}"
                             class="inline-block max-w-full h-auto mx-auto">
                    </p>
                    <p class="text-zinc-800 dark:text-zinc-200 mt-4">Need to streamline the way you work?&nbsp;&nbsp; I
                        can bring solutions.
                    </p>

                    <p class="text-zinc-800 dark:text-zinc-200 mt-4">
                        Per the advice from ITIL 4. We start where you are.
                        <br><br>
                    <div class="itil-container border-gray-300 dark:border-gray-500">
                        <img class="img-fluid"
                             src="{{ asset('storage/images/itil4gp2.png') }}"
                             onmouseover="this.src='{{ asset('storage/images/itil4gp1.png') }}'"
                             onmouseout="this.src='{{ asset('storage/images/itil4gp2.png') }}'"
                             title="Start where you are and improve from there"
                             alt="ITIL 4 Guiding Principles">
                    </div>
                    </p>

                    <p class="text-zinc-800 dark:text-zinc-200 mt-4">To explain why this is important you are welcome to
                        delve into the problems my country are experiencing with a lack of awareness and ethics
                        (Capability Maturity Level Zero behaviour). I.e. click open the two areas below.
                    </p>

                    {{-- Collapsible Toggle Section --}}
                    <div x-data="{ open: false }"
                         class="mt-6 border border-gray-300 dark:border-gray-600 rounded-lg overflow-hidden">
                        {{-- Toggle Header --}}
                        <button
                                @click="open = !open"
                                class="w-full flex items-center justify-between px-6 py-4 bg-gray-100 dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors"
                        >
                            <h3 class="text-lg font-semibold text-zinc-900 dark:text-white text-center">
                                Professional Projects. Protected Funds. Value Delivered. Public Trust.
                            </h3>
                            <svg
                                    class="w-5 h-5 text-zinc-900 dark:text-white transition-transform duration-200"
                                    :class="{ 'rotate-180': open }"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                        {{-- Toggle Content --}}
                        <div
                                x-show="open"
                                x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 transform -translate-y-2"
                                x-transition:enter-end="opacity-100 transform translate-y-0"
                                x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="opacity-100 transform translate-y-0"
                                x-transition:leave-end="opacity-0 transform -translate-y-2"
                                class="px-6 py-4 bg-white dark:bg-gray-900 border-t border-gray-300 dark:border-gray-600"
                                style="display: none;"
                        >
                            <p class="text-zinc-800 dark:text-zinc-200">
                                True leadership is measured by its commitment to good governance. <br><br>When public
                                funds are diverted through corruption, it represents a profound ethical failure that
                                harms every citizen and compromises our collective future.<br><br>

                                Adhering to the principles of morality, sustainability, and social justice is not
                                optional; it is the foundation of a functioning society. <br><br>The current path is
                                unsustainable. <br><br>For the sake of the nation's future, we must collectively demand
                                and enact a change towards full accountability and ethical leadership, before the damage
                                becomes irreparable.
                            </p><br><br>

                            <p><img src="{{ asset('storage/images/nomoney.jpg') }}"
                                    alt="No Money"
                                    class="mx-auto block rounded-lg dark:opacity-90 dark:ring-1 dark:ring-zinc-700 my-4 max-w-full">
                            </p>

                            {{--                            <div class="container  mx-auto px-4">--}}
                            {{--                                <br>--}}
                            {{--                                <p class="text-center ">--}}
                            {{--                                    <img class="mx-auto max-w-full h-auto my-element"--}}
                            {{--                                         src="{{ asset('storage/images/divertedresources.png') }}"--}}
                            {{--                                         onmouseover="this.src='{{ asset('storage/images/corruption.png') }}'"--}}
                            {{--                                         onmouseout="this.src='{{ asset('storage/images/divertedresources.png') }}'">--}}
                            {{--                                </p>--}}
                            {{--                            </div>--}}
                            <br>

                            <p><img src="{{ asset('storage/images/otherpeoplesmoney.jpg') }}"
                                    alt="Other Peoples Money"
                                    class="mx-auto block rounded-lg dark:opacity-90 dark:ring-1 dark:ring-zinc-700 my-4 max-w-full">
                            </p>

                        </div>
                    </div>
                    {{-- END Collapsible Section --}}

                    {{-- Second Collapsible Section --}}
                    <div x-data="{ open: false }"
                         class="mt-6 border border-gray-300 dark:border-gray-600 rounded-lg overflow-hidden">
                        {{-- Toggle Header --}}
                        <button
                                @click="open = !open"
                                class="w-full flex items-center justify-between px-6 py-4 bg-gray-100 dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors"
                        >
                            <h3 class="text-lg font-semibold text-zinc-900 dark:text-white">
                                Governance Etymology for Dummies
                            </h3>
                            <svg
                                    class="w-5 h-5 text-zinc-900 dark:text-white transition-transform duration-200"
                                    :class="{ 'rotate-180': open }"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                        {{-- Toggle Content --}}
                        <div
                                x-show="open"
                                x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 transform -translate-y-2"
                                x-transition:enter-end="opacity-100 transform translate-y-0"
                                x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="opacity-100 transform translate-y-0"
                                x-transition:leave-end="opacity-0 transform -translate-y-2"
                                class="px-6 py-4 bg-white dark:bg-gray-900 border-t border-gray-300 dark:border-gray-600"
                                style="display: none;"
                        >
                            <p class="text-zinc-800 dark:text-zinc-200 mt-4">
                                Governance from the Latin "Guberare" which means to steer.
                            </p>

                            <img src="{{ asset('storage/images/steer.jpg') }}"
                                 alt="Steer"
                                 class="image rounded-lg dark:opacity-90 dark:ring-1 dark:ring-zinc-700 my-4 max-w-full h-auto">

                            <p class="text-zinc-800 dark:text-zinc-200">
                                From Latin also comes "Navigare," to steer, navigate a vessel (ship or large boat).
                            </p>

                            <img src="{{ asset('storage/images/boat-terms.png') }}"
                                 alt="Boat Terms"
                                 class="image rounded-lg dark:opacity-90 dark:ring-1 dark:ring-zinc-700 my-4 max-w-full h-auto">
                            <div class="container mx-auto px-4 flex justify-center">
                                {{--                                <a href="/gamestatsnew" target="_blank" class="block max-w-full">--}}
                                <img src="{{ asset('storage/images/saildynamics.png') }}"
                                     alt="Continuity"
                                     class="rounded-lg dark:opacity-90 dark:ring-1 dark:ring-zinc-700 my-4 max-w-full h-auto mx-auto">
                                {{--                                </a>--}}
                            </div>
                            <p class="text-zinc-800 dark:text-zinc-200">Now think of these words: "plot a course", "on
                                course", "off course", "lost", "rudderless", "run aground", "keeled over" etc.</p>
                            <br>

                            <br><br>
                            <p class="text-zinc-800 dark:text-zinc-200">Click the "continuity" image below for sage
                                advise on how to up game stats.<br>I.e. are we (a project, a marriage, a country etc.)
                                on a positive upward trending pro-survival condition or
                                one bending down to financial or other failures.</p>
                            <div class="container mx-auto px-4 flex justify-center">
                                <a href="/gamestatsnew" target="_blank" class="block max-w-full">
                                    <img src="{{ asset('storage/images/continuity.gif') }}"
                                         alt="Continuity"
                                         class="rounded-lg dark:opacity-90 dark:ring-1 dark:ring-zinc-700 my-4 max-w-full h-auto mx-auto">
                                </a>
                            </div>
                        </div>
                    </div>
                    {{-- END Collapsible Section --}}

                </div>
                {{-- END grid-container --}}
            </div>
            {{-- END bg wrapper --}}
        </section>
        {{-- END Hero Section --}}

        {{-- User Story Section --}}
{{--        <section class="border border-gray-300 dark:border-blue-900 rounded-lg mb-8 shadow-sm overflow-hidden">--}}
{{--            <div class="bg-gray-50 dark:bg-zinc-800 p-8">--}}
{{--                <div class="flex justify-center items-center py-8">--}}
{{--                    <div class="relative inline-block" x-data="{--}}
{{--                        expanded: false,--}}
{{--                        halfSize: null--}}
{{--                    }" x-init="halfSize = $refs.img.naturalWidth / 4">--}}
{{--                        <div class="relative">--}}
{{--                            <img--}}
{{--                                    x-ref="img"--}}
{{--                                    src="{{ asset('storage/images/userstorysouthafrica.png') }}"--}}
{{--                                    alt="User Story South Africa"--}}
{{--                                    class="transition-all duration-300 ease-in-out cursor-pointer"--}}
{{--                                    style="width: 4cm;"--}}
{{--                                    :style="expanded && halfSize ? 'width: ' + halfSize + 'px' : 'width: 4cm'"--}}
{{--                                    @mouseenter="expanded = true"--}}
{{--                                    @mouseleave="expanded = false"--}}
{{--                            />--}}

{{--                            <button--}}
{{--                                    x-show="expanded"--}}
{{--                                    @click="expanded = false"--}}
{{--                                    class="absolute top-2 right-2 bg-white rounded-full w-8 h-8 flex items-center justify-center shadow-lg hover:bg-gray-100 z-10"--}}
{{--                            >--}}
{{--                                <span class="text-gray-700 font-bold text-xl">&times;</span>--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}

        {{-- Mission Section --}}
        <section class="border border-gray-300 dark:border-blue-900 rounded-lg mb-8 shadow-sm overflow-hidden">
            <div class="bg-gray-50 dark:bg-zinc-800 p-4 sm:p-6 md:p-8">
                <div class="container">
                    <div class="our-vision__content">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                            <div class="col1-2 overflow-hidden">
                                <div class="section-title sm:mb-1">
                                    <div class="section-title__name">
                                        <h2 class="lets-talk text-zinc-900 dark:text-white text-4xl mt-2 mb-8 font-medium sm:text-4xl xs:mb-5">
                                            My Mission</h2>
                                    </div>
                                    <div class="our-mission__image rounded-4xl overflow-hidden w-full mx-auto dark:ring-1 dark:ring-zinc-700">
                                        <img class="w-full h-auto object-cover"
                                             src="{{ asset('storage/images/markcorriganpic.jpg') }}"
                                             alt="Our Mission"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col1-2">
                                <div class="benefits">
                                    <div class="benefits__item flex gap-4 mb-3 md:gap-2 items-start">
                                        <div class="benefits__item__content flex-1">
                                            <p class="our-mission__description text-xl text-zinc-600 dark:text-zinc-300 w-90 m0">
                                                My mission is simple: to provide you with the best project and process
                                                management improvement advice and solutions, tailored to meet your
                                                needs. I also understand that finding the perfect project method and
                                                running it at Capability Maturity Level 2+ is not easy. Also to become
                                                ITIL, COBIT or CMMi compliant is also a challenge. However, I can share
                                                with you my learning experience and knowledge, gained through my long
                                                journey, and assure you it is possible, honourable and fun to strive for
                                                higher levels of perfection in the process improvement space.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Contact Section --}}
        <section class="border border-gray-300 dark:border-blue-900 rounded-lg mb-8 shadow-sm overflow-hidden">
            <div class="bg-gray-50 dark:bg-zinc-800 p-8">
                <div class="container">
                    <div class="our-vision__content">
                        <div class="grid grid-cols-2 gap-6 md:gap-2 sm:grid-cols-1 sm:gap-4">
                            <div class="col1-2">
                                <div class="section-title sm:mb-1">
                                    <h2 class="lets-talk text-zinc-900 dark:text-white text-4xl mt-2 mb-8 font-medium sm:text-4xl xs:mb-5">
                                        If you see a need for
                                        <span class="text-blue-600 dark:text-blue-400">my skill set</span>
                                    </h2>
                                </div>
                            </div>
                            <div class="col1-2">
                                <div class="benefits">
                                    <!-- Contact Me -->
                                    <div class="benefits__item flex gap-4 mb-3 md:gap-2 items-center">
                                        <div class="benefits__item__icon flex-shrink-0">
                                            <a href="/cv/index.html#section-5" class="block">
                                                <i class="fas fa-envelope text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300 transition-colors"
                                                   style="font-size: 2em;"></i>
                                            </a>
                                        </div>
                                        <div class="flex flex-col justify-center">
                                            <h4 class="benefits__item__title text-2xl font-medium mb-1-5">
                                                <a href="/contact"
                                                   class="text-zinc-900 dark:text-white hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                                                    <u>Contact Me</u>
                                                </a>
                                            </h4>
                                            <p class="benefits__item__description text-xl text-zinc-600 dark:text-zinc-300 m-0 leading-relaxed">
                                                Let me know what your needs are and I can reply with a possible fit.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mx-auto max-w-md">
                @livewire('websocket-status')
            </div>
        </section>

    @endauth

    @guest
        {{-- Guest Hero Section --}}
        <section class="border border-gray-300 dark:border-blue-900 rounded-lg mb-8 shadow-sm overflow-hidden">
            <div class="bg-gray-50 dark:bg-zinc-800 p-8">
                <div class="grid-container">

{{--                                        <div x-data="{ open: false }"--}}
{{--                                             class="mb-6 border border-gray-300 dark:border-gray-600 rounded-lg overflow-hidden">--}}

{{--                                            <button--}}
{{--                                                    @click="open = !open"--}}
{{--                                                    class="w-full flex items-center justify-between px-6 py-4 bg-gray-100 dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors"--}}
{{--                                            >--}}
{{--                                                <h3 class="text-lg font-semibold text-zinc-900 dark:text-white">--}}
{{--                                                    Web site under construction. Launching early 2026--}}
{{--                                                </h3>--}}
{{--                                                <svg--}}
{{--                                                        class="w-5 h-5 text-zinc-900 dark:text-white transition-transform duration-200"--}}
{{--                                                        :class="{ 'rotate-180': open }"--}}
{{--                                                        fill="none"--}}
{{--                                                        stroke="currentColor"--}}
{{--                                                        viewBox="0 0 24 24"--}}
{{--                                                >--}}
{{--                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"--}}
{{--                                                          d="M19 9l-7 7-7-7"></path>--}}
{{--                                                </svg>--}}
{{--                                            </button>--}}


{{--                                            <div--}}
{{--                                                    x-show="open"--}}
{{--                                                    x-transition:enter="transition ease-out duration-200"--}}
{{--                                                    x-transition:enter-start="opacity-0 transform -translate-y-2"--}}
{{--                                                    x-transition:enter-end="opacity-100 transform translate-y-0"--}}
{{--                                                    x-transition:leave="transition ease-in duration-150"--}}
{{--                                                    x-transition:leave-start="opacity-100 transform translate-y-0"--}}
{{--                                                    x-transition:leave-end="opacity-0 transform -translate-y-2"--}}
{{--                                                    class="px-6 py-4 bg-white dark:bg-gray-900 border-t border-gray-300 dark:border-gray-600"--}}
{{--                                                    style="display: none;"--}}
{{--                                            >--}}

{{--                                                <div class="text-center mb-4">--}}
{{--                                                    <img alt="Home hosted web site going live early 2026"--}}
{{--                                                         src="{{ asset('storage/images/comingsoon.jpg') }}"--}}
{{--                                                         class="coming-soon-image"--}}
{{--                                                         title="Home hosted web site going live early 2026">--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

                    <div class="heading-row">
                        <h2 class="hero__title text-zinc-900 dark:text-white text-4xl mt-2 mb-8 font-medium sm:text-4xl xs:mb-5">
                            Based on project performance, pin down your
                            <span class="text-blue-600 dark:text-blue-400">Capability Maturity Level?</span>
                        </h2>

                        <h3 class="hero__title text-zinc-900 dark:text-white text-2xl mt-2 mb-8 font-medium">
                            I can assist you to move up to Capability Maturity Level 2+
                        </h3>
                    </div>

                    <!-- Dunning Kruger Image with Hover Effect -->
                    <div x-data="{ showSecond: false }"

                         class="relative cursor-pointer w-full"
                         @mouseenter="showSecond = true"
                         @mouseleave="showSecond = false"
                         @click="showSecond = !showSecond">

                        <!-- First Image (Default) -->
                        <img src="{{ asset('storage/images/dunningkrugeradjusted.jpg') }}"
                             alt="Dunning Kruger"
                             class="w-full h-auto rounded-lg dark:opacity-90 transition-all duration-300"
                             x-show="!showSecond">

                        <!-- Second Image (On hover/click) -->
                        <img src="{{ asset('storage/images/dunningkrugeradjustedforcorruption.jpg') }}"
                             alt="Dunning Kruger Alternative"
                             class="w-full h-auto rounded-lg dark:opacity-90 transition-all duration-300"
                             x-show="showSecond"
                             style="display: none;">
                    </div>


                    <!-- Pin aligned flush left -->
                    <div class="mt-4">
                        <img id="pin"
                             src="{{ asset('storage/images/pinlarge.png') }}"
                             width="152"
                             height="144"
                             alt="Pin"
                             class="pin dark:drop-shadow-[0_0_8px_rgba(255,255,255,0.3)]"
                             style="cursor: pointer;">
                    </div>

                    <p class="text-zinc-900 dark:text-zinc-100 mt-6">Position the pin on the diagram above:</p>

                    {{-- Dig Into Dunning Kruger Section --}}
                    <section class="mb-8">
                        {{-- Video Collapsible Section --}}
                        <div x-data="{ videoOpen: false }" class="border border-gray-300 dark:border-blue-900 rounded-lg shadow-sm overflow-hidden mb-4">
                            {{-- Video Toggle Header --}}
                            <button
                                    @click="videoOpen = !videoOpen"
                                    class="w-full flex items-center justify-between px-6 py-4 bg-gray-100 dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors"
                            >
                                <h3 class="text-lg font-semibold text-zinc-900 dark:text-white">
                                    Dig deeper into the Dunning Kruger effect:
                                </h3>
                                <svg
                                        class="w-5 h-5 text-zinc-900 dark:text-white transition-transform duration-200"
                                        :class="{ 'rotate-180': videoOpen }"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                >
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            {{-- Video Toggle Content --}}
                            <div
                                    x-show="videoOpen"
                                    x-transition:enter="transition ease-out duration-200"
                                    x-transition:enter-start="opacity-0 transform -translate-y-2"
                                    x-transition:enter-end="opacity-100 transform translate-y-0"
                                    x-transition:leave="transition ease-in duration-150"
                                    x-transition:leave-start="opacity-100 transform translate-y-0"
                                    x-transition:leave-end="opacity-0 transform -translate-y-2"
                                    class="bg-white dark:bg-gray-900 border-t border-gray-300 dark:border-gray-600"
                                    style="display: none;"
                            >
                                <div class="flex justify-center items-center py-8 px-6">
                                    <video
                                            class="max-w-full h-auto rounded-lg shadow-lg"
                                            style="max-width: 800px;"
                                            controls
                                    >
                                        <source src="{{ asset('storage/assets/dunningk.mp4') }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                                <div class="px-6 pb-4">
                                    <small class="text-gray-600 dark:text-gray-400" style="font-size: 10px !important;">Credit: YouTube - Thought Architect. Note: Content incorporates ideas and media from various sources. All creators are gratefully acknowledged.</small>
                                </div>
                            </div>
                        </div>

                        {{-- Image Collapsible Section --}}
                        <div x-data="{ imageOpen: false }" class="border border-gray-300 dark:border-blue-900 rounded-lg shadow-sm overflow-hidden mb-4">
                            {{-- Image Toggle Header --}}
                            <button
                                    @click="imageOpen = !imageOpen"
                                    class="w-full flex items-center justify-between px-6 py-4 bg-gray-100 dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors"
                            >
                                <h3 class="text-lg font-semibold text-zinc-900 dark:text-white">
                                    Know / Not Know (Forget, Remember, Occlude, Nothingness, Mystery scale)
                                </h3>
                                <svg
                                        class="w-5 h-5 text-zinc-900 dark:text-white transition-transform duration-200"
                                        :class="{ 'rotate-180': imageOpen }"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                >
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            {{-- Image Toggle Content --}}
                            <div
                                    x-show="imageOpen"
                                    x-transition:enter="transition ease-out duration-200"
                                    x-transition:enter-start="opacity-0 transform -translate-y-2"
                                    x-transition:enter-end="opacity-100 transform translate-y-0"
                                    x-transition:leave="transition ease-in duration-150"
                                    x-transition:leave-start="opacity-100 transform translate-y-0"
                                    x-transition:leave-end="opacity-0 transform -translate-y-2"
                                    class="bg-white dark:bg-gray-900 border-t border-gray-300 dark:border-gray-600"
                                    style="display: none;"
                            >
                                <div class="flex flex-col justify-center items-center py-8 px-6">
                                    <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4 text-center">
                                        <img src="{{ asset('storage/images/knowhurt.png') }}" onmouseover="this.src='{{ asset('storage/images/knowknow.png') }}'" onmouseout="this.src='{{ asset('storage/images/knowhurt.png') }}'" class="rounded-lg mx-auto dark:bg-white p-2 cursor-pointer" style="max-width: 600px;" alt="Knowledge hover effect">
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Parable Collapsible Section --}}
                        <div x-data="{ parableOpen: false }" class="border border-gray-300 dark:border-blue-900 rounded-lg shadow-sm overflow-hidden mb-4">
                            {{-- Toggle Header --}}
                            <button
                                    @click="parableOpen = !parableOpen"
                                    class="w-full flex items-center justify-between px-6 py-4 bg-gray-100 dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors"
                            >
                                <h3 class="text-lg font-semibold text-zinc-900 dark:text-white">
                                    The Parable of the Forgetting
                                </h3>
                                <svg
                                        class="w-5 h-5 text-zinc-900 dark:text-white transition-transform duration-200"
                                        :class="{ 'rotate-180': parableOpen }"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                >
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            {{-- Toggle Content --}}
                            <div
                                    x-show="parableOpen"
                                    x-transition:enter="transition ease-out duration-200"
                                    x-transition:enter-start="opacity-0 transform -translate-y-2"
                                    x-transition:enter-end="opacity-100 transform translate-y-0"
                                    x-transition:leave="transition ease-in duration-150"
                                    x-transition:leave-start="opacity-100 transform translate-y-0"
                                    x-transition:leave-end="opacity-0 transform -translate-y-2"
                                    class="bg-white dark:bg-gray-900 border-t border-gray-300 dark:border-gray-600"
                                    style="display: none;"
                            >
                                <div class="py-8 px-6">
                                    <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-6 text-gray-700 dark:text-gray-300 space-y-4 leading-relaxed">
                                        <p>There was once a being from a far-bright civilization, an alien whose mind had long ago outgrown the crude mechanics of buttons and handles. Thought itself was their technology.</p>

                                        <p>At the end of each cycle, they would glide home in their small, silver craft, humming softly as it folded into its docking cradle. Inside their dwelling, the air was calm and familiar. The alien would lower themselves into a chair shaped by years of use, rest two fingers against the side of their head, and know.</p>

                                        <p>In that knowing, the refrigerator door would open in the kitchen without a sound. An ice-cold beer would lift gently from its shelf, drifting through the corridor, rounding the corner, and settling perfectly into their waiting hand. No effort. No doubt. This had been the way of things for as long as memory reached. Reality responded because it was understood.</p>

                                        <p>One cycle, while traveling to their place of work, another craft swerved wildly, cutting across their path. The alien's calm fractured. In a flash of fury, their thoughts sharpened into something ugly.</p>

                                        <p class="italic ml-6">
                                            "Idiot," they thought.<br>
                                            "May they crash."<br>
                                            "Serves them right if they burn into the planet."
                                        </p>

                                        <p>The moment passed. The alien sped on.</p>

                                        <p>Not long after, a tremor rippled through the sky. Behind them, a violent bloom of light erupted. The other craft spiraled, failed, and struck the planet below in a thunder of fire.</p>

                                        <p>The alien did not turn back.<br>
                                            They did not reflect.<br>
                                            They did not connect the moment of thought with the moment of destruction.</p>

                                        <p>They continued their day.</p>

                                        <p>That evening, they returned home as always. The chair welcomed them. Two fingers rose to the temple. The familiar request formed—not as effort, but as expectation.</p>

                                        <p class="italic ml-6">Beer.</p>

                                        <p>Nothing happened.</p>

                                        <p>They tried again. Concentrating now. Reaching.</p>

                                        <p>Still nothing.</p>

                                        <p>A faint unease crept in. The alien leaned forward, fingers pressing harder, mind pushing where once it simply knew. The refrigerator did not open. The beer did not move.</p>

                                        <p>Confusion replaced certainty.</p>

                                        <p class="italic ml-6">
                                            Why isn't this working?<br>
                                            It always works.
                                        </p>

                                        <p>They strained, forcing thought into command. The knowing slipped into not knowing. Confidence into doubt. Doubt into forgetting. Forgetting into occlusion.</p>

                                        <p>The harder they tried, the further away the beer seemed—not just from the fridge, but from reality itself. Eventually there was only mystery. Then blankness. Then nothing at all.</p>

                                        <p>The chair felt colder now.</p>

                                        <p>Somewhere deep beneath awareness, something had invalidated itself. A being who once knew they were cause had briefly denied that truth—and the denial had been accepted.</p>

                                        <p class="font-semibold mt-6">Perhaps this is how it happened for us.</p>

                                        <p>Not with thunder or punishment, but with a moment of unowned creation. A thought disowned. A power denied. A quiet fall from knowing into forgetting.</p>

                                        <p>Maybe this is what it meant to be cast from the garden—not thrown out by a jealous god, but stepping away from certainty into confusion, until the gates closed behind us and we forgot we had ever opened them ourselves.</p>

                                        <p class="italic">And somewhere, still waiting, an ice-cold beer floats patiently in the dark, wondering why it is no longer being called home.</p>

                                        <p><i><b>The above said:</b>&nbsp;&nbsp;Imagine you are at the level mystery and striving upwards for clarity, expertise and professionalism.  Always question yourself hardest and be open to make sure your assumptions of based on the clearest knowledge you have available.</i></p>

                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Dig Deeper Collapsible Section --}}
                        <div x-data="{ digDeeperOpen: false }" class="border border-gray-300 dark:border-blue-900 rounded-lg shadow-sm overflow-hidden mb-4">
                            {{-- Dig Deeper Toggle Header --}}
                            <button
                                    @click="digDeeperOpen = !digDeeperOpen"
                                    class="w-full flex items-center justify-between px-6 py-4 bg-gray-100 dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors"
                            >
                                <h3 class="text-lg font-semibold text-zinc-900 dark:text-white">
                                    Dig Deeper (Philosophy stuff)
                                </h3>
                                <svg
                                        class="w-5 h-5 text-zinc-900 dark:text-white transition-transform duration-200"
                                        :class="{ 'rotate-180': digDeeperOpen }"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                >
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            {{-- Dig Deeper Toggle Content --}}
                            <div
                                    x-show="digDeeperOpen"
                                    x-transition:enter="transition ease-out duration-200"
                                    x-transition:enter-start="opacity-0 transform -translate-y-2"
                                    x-transition:enter-end="opacity-100 transform translate-y-0"
                                    x-transition:leave="transition ease-in duration-150"
                                    x-transition:leave-start="opacity-100 transform translate-y-0"
                                    x-transition:leave-end="opacity-0 transform -translate-y-2"
                                    class="bg-white dark:bg-gray-900 border-t border-gray-300 dark:border-gray-600"
                                    style="display: none;"
                            >
                                <div class="flex flex-col justify-center items-center py-8 px-6">
                                    <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
                                        <div class="text-left text-gray-700 dark:text-gray-300 space-y-4">
                                            <p class="font-semibold text-lg">
                                                The "Know to Mystery Scale" (often referred to as the Know-to-Nothingness Scale) is a fundamental conceptual tool that maps an individual's ability to create, perceive, and interact with the physical universe and their own existence. It defines a gradient of awareness that ranges from absolute knowledge (complete control and identification) down to "Mystery" or "Not-Knowingness" (total ignorance or inability to confront).
                                            </p>

                                            <h4 class="font-semibold text-lg mt-6">Core Concepts of the Know-to-Mystery Scale</h4>
                                            <p class="mb-2">This scale describe how an individual (a soul (you and me in our bodies)) becomes trapped in matter, energy, space, and time (MEST).</p>

                                            <ul class="list-disc list-inside space-y-2 ml-4">
                                                <li><strong>Knowingness (Top):</strong> This is the highest state on this scale, representing complete identification, understanding, and the ability to cause or create.</li>
                                                <li><strong>Gradual Degradation:</strong> As an individual moves down the scale, they move away from being able to directly know things toward having to rely on intermediate steps like looking, emoting, efforting, and thinking to understand their environment.</li>
                                                <li><strong>Effort Band:</strong> Lower on the scale, individuals are in the "Effort" band, where they feel they must work or physically interact with everything to know it.</li>
                                                <li><strong>Mystery/Not-Knowingness (Bottom):</strong> At the bottom is "Mystery," which is defined as "Not-Knowingness". It is characterized by a complete inability to perceive, understand, or confront. In this state, an individual is simply "not knowing" or has forgotten.</li>
                                            </ul>

                                            <h4 class="font-semibold text-lg mt-6">Key Definitions within the Scale</h4>
                                            <ul class="list-disc list-inside space-y-2 ml-4">
                                                <li><strong>Is-ness:</strong> The state of being or existence.</li>
                                                <li><strong>As-is-ness:</strong> Viewing a thing as it is, causing it to vanish (true understanding).</li>
                                                <li><strong>Not-is-ness:</strong> Refusal to accept that something exists, a step towards not-knowingness.</li>
                                                <li><strong>Nothingness:</strong> Defined as an absence of something.</li>
                                            </ul>

                                            <div class="my-6 flex justify-center">
                                                <img id="rightwrong"
                                                     src="{{ asset('storage/assets/mysterytoknowstaircase.png') }}"
                                                     alt="Right Wrong"
                                                     class="shadow-lg dark:shadow-[0_0_15px_rgba(255,255,255,0.2)] max-w-2xl w-full"
                                                     style="cursor: pointer;">
                                            </div>


                                            <div class="my-6 flex justify-center">
                                                <img id="rightwrongmain"
                                                     src="{{ asset('storage/assets/rightwrongmain.png') }}"
                                                     alt="Right Wrong Main"
                                                     class="shadow-lg dark:shadow-[0_0_15px_rgba(255,255,255,0.2)] max-w-2xl w-full"
                                                     style="cursor: pointer;">
                                            </div>

                                            <p class="mt-4 italic">
                                                An individual is considered to be "downtone" or stuck in low-level, non-survival states when they are operating at the "Mystery" or Not-Knowingness end of the scale.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Chess Pigeon Collapsible Section --}}
                        <div x-data="{ pigeonOpen: false }" class="border border-gray-300 dark:border-blue-900 rounded-lg shadow-sm overflow-hidden mb-4">
                            {{-- Toggle Header --}}
                            <button
                                    @click="pigeonOpen = !pigeonOpen"
                                    class="w-full flex items-center justify-between px-6 py-4 bg-gray-100 dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors"
                            >
                                <h3 class="text-lg font-semibold text-zinc-900 dark:text-white">
                                    Chess with a Pigeon (Cancel Culture etc.)
                                </h3>
                                <svg
                                        class="w-5 h-5 text-zinc-900 dark:text-white transition-transform duration-200"
                                        :class="{ 'rotate-180': pigeonOpen }"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                >
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            {{-- Toggle Content --}}
                            <div
                                    x-show="pigeonOpen"
                                    x-transition:enter="transition ease-out duration-200"
                                    x-transition:enter-start="opacity-0 transform -translate-y-2"
                                    x-transition:enter-end="opacity-100 transform translate-y-0"
                                    x-transition:leave="transition ease-in duration-150"
                                    x-transition:leave-start="opacity-100 transform translate-y-0"
                                    x-transition:leave-end="opacity-0 transform -translate-y-2"
                                    class="bg-white dark:bg-gray-900 border-t border-gray-300 dark:border-gray-600"
                                    style="display: none;"
                            >
                                <div class="flex justify-center items-center py-8 px-6">
                                    <img
                                            src="{{ asset('storage/images/chesswithapigeon.jpg') }}"
                                            alt="Chess with a Pigeon"
                                            class="max-w-full h-auto rounded-lg shadow-lg"
                                            style="max-width: 600px;"
                                    >
                                </div>
                            </div>
                        </div>

                        {{-- Cancel Culture Video with My Opinion Section --}}
                        <div x-data="{ videoOpen: false }" class="border border-gray-300 dark:border-blue-900 rounded-lg shadow-sm overflow-hidden mb-4">
                            {{-- Video Toggle Header --}}
                            <button
                                    @click="videoOpen = !videoOpen"
                                    class="w-full flex items-center justify-between px-6 py-4 bg-gray-100 dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors"
                            >
                                <h3 class="text-lg font-semibold text-zinc-900 dark:text-white">
                                    Radicalization / Wokeness / Cancel culture / Communism / Bribery and Corruption/ Censorship
                                </h3>
                                <svg
                                        class="w-5 h-5 text-zinc-900 dark:text-white transition-transform duration-200"
                                        :class="{ 'rotate-180': videoOpen }"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                >
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            {{-- Video Toggle Content --}}
                            <div
                                    x-show="videoOpen"
                                    x-transition:enter="transition ease-out duration-200"
                                    x-transition:enter-start="opacity-0 transform -translate-y-2"
                                    x-transition:enter-end="opacity-100 transform translate-y-0"
                                    x-transition:leave="transition ease-in duration-150"
                                    x-transition:leave-start="opacity-100 transform translate-y-0"
                                    x-transition:leave-end="opacity-0 transform -translate-y-2"
                                    class="bg-white dark:bg-gray-900 border-t border-gray-300 dark:border-gray-600"
                                    style="display: none;"
                            >
                                <div class="flex justify-center items-center py-8 px-6">
                                    <video
                                            class="max-w-full h-auto rounded-lg shadow-lg"
                                            style="max-width: 800px;"
                                            controls
                                    >
                                        <source src="{{ asset('storage/assets/cancelculture.mp4') }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                                <div class="px-6 pb-4">
                                    <small class="text-gray-600 dark:text-gray-400" style="font-size: 10px !important;">Credit: YouTube -
                                        How Cancel Culture Destroys Trust in Expertise - Greg Lukianoff. <br>Note: Content incorporates ideas and media from various sources. All creators are gratefully acknowledged.</small>
                                </div>

                                {{-- My Opinion Section --}}
                                <div class="px-6 pb-8">
                                    <h4 class="text-xl font-semibold text-zinc-900 dark:text-white mb-4 mt-6">My Opinion</h4>

                                    <div class="space-y-4 text-gray-700 dark:text-gray-300 leading-relaxed">
                                        <p><strong>The Autoimmune Disorder of a Thoughtless Age: How the Abandonment of Reason Breeds New Dogmas</strong></p>

                                        <p>We are living through a social autoimmune disease. A healthy society, like a healthy body, possesses mechanisms to identify and isolate genuine threats—be they pathogens or dangerous ideas. This system relies on discernment: the careful, reasoned application of evidence and principle. Its ethic is the scientific method, extended beyond the lab into the public square. It demands openness, hypothesis, scrutiny, and the humility to be proven wrong.</p>

                                        <p>But that system is now attacking the host.</p>

                                        <p>The disease manifests as the widespread celebration of a certain kind of idiocy—not a lack of innate intelligence, but a cultivated inability to think. It is the willful rejection of dispassionate inquiry in favor of the intoxicating simplicity of high-emotion discourse. When outrage, tribal loyalty, and moral vanity become the primary currencies of debate, the ability to think logically doesn't just waver; it is ritualistically discarded as a form of disloyalty. The complex becomes heretical; the nuanced becomes suspicious.</p>

                                        <p>This emotional ecosystem is the perfect petri dish for radicalization. Radicalization is not merely the adoption of extreme views. It is the cognitive process of replacing a messy, evidence-based reality with a clean, emotionally satisfying narrative of absolute good versus absolute evil. It offers a powerful antidote to anxiety: certainty. And to maintain that certainty, it must build walls. The first wall is against contradictory facts. The second is against the people who bear them.</p>

                                        <p>Thus, we arrive at the social enforcement arm of this process: cancel culture and its sibling, censorship. They are not merely "people being held accountable." They are the natural, tyrannical outcome of a radicalized emotional state. When an idea or person is deemed a contaminant to the pure narrative, the immune response must be total: not engagement, not rebuttal, but erasure. This is intolerance canonized as a civic virtue. It is the corruption of discourse itself, where the goal is not to discover truth but to silence its perceived enemies.</p>

                                        <p>And here lies the terminal stage of the disease: the corruption of systems and the rise of a new, secular dogma. Corruption, in this decay, is more than bribery. It is the corruption of truth into "lived experience" or "party doctrine." It is the corruption of institutions—universities, media, tech platforms—that surrender their duty to open inquiry to become enforcers of orthodoxy. It is the corruption of language, where words are stripped of meaning and wielded as blunt instruments of power.</p>

                                        <p>This is where a reference to Communism finds its chilling resonance. I am not speaking of economic theory, but of the 20th century's most brutal case study in this very pathology. Communism began, in part, as a claim to scientific, materialist truth. But it rapidly mutated into the ultimate closed system. It demanded absolute ideological purity, could tolerate no dissent, and wielded "criticism and self-criticism" as tools of psychological terror. It radicalized populations against "class enemies," corrupted every institution into an arm of the Party, and built a reality where the map—the ideology—was more real than the territory of human suffering beneath it.</p>

                                        <p>Our modern iteration does not require a Vanguard Party or a gulag archipelago. It is softer, more digital, and perhaps more insidious for it. But the pattern is identical: The retreat from open, reasoned inquiry creates an intellectual vacuum. That vacuum is filled by the totalizing certainty of radicalized emotion. That emotion demands intolerance to survive. And that intolerance, when institutionalized, becomes the corrupt engine of a new orthodoxy.</p>

                                        <p>We are not becoming the Soviet Union. We are replicating the human failure that made it possible: the replacement of the difficult, liberating work of thought with the easy, enslaving comfort of feeling right. We are trading the scientific method for the dogma of the mob, and in doing so, we are building our own little cathedrals of unquestionable truth—beautiful, emotion-soaked, and utterly devoid of reason.</p>

                                        <p>The cure is not a different dogma. It is the courageous, unfashionable recommitment to the principles we have abandoned: that to be wrong is not a sin, but a step toward being right; that the person who disagrees with you is not a heretic, but a potential source of correction; and that the only thing more dangerous than a bad idea is a society that has forgotten how to think its way through one.</p>


                                        <div class="my-6 flex justify-center">
                                            <img id="rightwrong"
                                                 src="{{ asset('storage/assets/postulates.png') }}"
                                                 alt="Right Wrong"
                                                 class="shadow-lg dark:shadow-[0_0_15px_rgba(255,255,255,0.2)] max-w-2xl w-full"
                                                 style="cursor: pointer;">
                                        </div>
                                        <p>Therefore.  Per the scale above, Striving upwards to higher levels of knowingness.</p>
                                        <p>We need to move our thinking patterns to the right per the image below.</p>
                                        <div class="my-6 flex justify-center">
                                            <img id="rightwrong"
                                                 src="{{ asset('storage/assets/rightwrong.png') }}"
                                                 alt="Right Wrong"
                                                 class="shadow-lg dark:shadow-[0_0_15px_rgba(255,255,255,0.2)] max-w-2xl w-full"
                                                 style="cursor: pointer;">
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <p class="text-zinc-800 dark:text-zinc-200 mt-4">
                        If you are serious about professional project management (strategy management / business management etc.) and operating at CM Levels 2 and above,
                        then anything to the left of the ladder in the image above is a major problem.
                    </p>

                    <!-- Centered Image Section -->
                    <div class="text-center mt-6">
                        <img alt="How do you want to work"
                             src="{{ asset('storage/images/howdoyouwanttowork.png') }}"
                             class="inline-block max-w-full h-auto mx-auto">
                    </div>

                    <p class="text-zinc-800 dark:text-zinc-200 mt-4">Need to streamline the way you work?&nbsp;&nbsp; I
                        can bring solutions.
                    </p>

                    <p class="text-zinc-800 dark:text-zinc-200 mt-4">
                        Per the advice from ITIL 4. We start where you are.
                    </p>

                    <div class="itil-container border border-gray-300 dark:border-gray-500 rounded-lg p-4 mt-4 mb-4">
                        <img class="img-fluid w-full max-w-md mx-auto block transition-opacity duration-300"
                             src="{{ asset('storage/images/itil4gp2.png') }}"
                             onmouseover="this.src='{{ asset('storage/images/itil4gp1.png') }}'"
                             onmouseout="this.src='{{ asset('storage/images/itil4gp2.png') }}'"
                             title="Start where you are and improve from there"
                             alt="ITIL 4 Guiding Principles">
                    </div>


                </div>
            </div>
        </section>

            {{-- User Story Section --}}
            <section class="border border-gray-300 dark:border-blue-900 rounded-lg mb-8 shadow-sm overflow-hidden">
                <div class="bg-gray-50 dark:bg-zinc-800 p-8">
                    {{-- My User Story Collapsible Section --}}
                    <div x-data="{ open: false }"
                         class="border border-gray-300 dark:border-gray-600 rounded-lg overflow-hidden">
                        {{-- Toggle Header --}}
                        <button
                                @click="open = !open"
                                class="w-full flex items-center justify-between px-6 py-4 bg-gray-100 dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors"
                        >
                            <h3 class="text-lg font-semibold text-zinc-900 dark:text-white">
                                My User Story
                            </h3>
                            <svg
                                    class="w-5 h-5 text-zinc-900 dark:text-white transition-transform duration-200"
                                    :class="{ 'rotate-180': open }"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                        {{-- Toggle Content --}}
                        <div
                                x-show="open"
                                x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 transform -translate-y-2"
                                x-transition:enter-end="opacity-100 transform translate-y-0"
                                x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="opacity-100 transform translate-y-0"
                                x-transition:leave-end="opacity-0 transform -translate-y-2"
                                class="px-6 py-4 bg-white dark:bg-gray-900 border-t border-gray-300 dark:border-gray-600"
                                style="display: none;"
                        >
                            <div class="flex justify-center items-center py-8">
                                <div class="relative inline-block" x-data="{
                expanded: false,
                fullSize: null
            }" x-init="fullSize = $refs.img.naturalWidth">
                                    <div class="relative">
                                        <img
                                                x-ref="img"
                                                src="{{ asset('storage/images/corkboardcmlzeroshift.png') }}"
                                                alt="User Story South Africa"
                                                class="transition-all duration-300 ease-in-out cursor-pointer"
                                                style="width: 20cm;"
                                                :style="expanded && fullSize ? 'width: ' + fullSize + 'px' : 'width: 20cm'"
                                                @mouseenter="expanded = true"
                                                @mouseleave="expanded = false"
                                        />

                                        <button
                                                x-show="expanded"
                                                @click="expanded = false"
                                                class="absolute top-2 right-2 bg-white rounded-full w-8 h-8 flex items-center justify-center shadow-lg hover:bg-gray-100 z-10"
                                        >
                                            <span class="text-gray-700 font-bold text-xl">&times;</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- END My User Story Collapsible Section --}}
                </div>
            </section>
    @endguest

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Wait for jQuery to be loaded (since it's in your head.blade.php)
                if (typeof jQuery === 'undefined') {
                    console.error('jQuery not loaded');
                    return;
                }

                const pinAuthed = document.getElementById('pinauthed');
                const pinGuest = document.getElementById('pin');
                const pin = pinAuthed || pinGuest;

                if (!pin) return;

                let isDragging = false;
                let offsetX, offsetY;

                pin.addEventListener('mousedown', function (e) {
                    isDragging = true;
                    const rect = pin.getBoundingClientRect();
                    offsetX = e.clientX - rect.left;
                    offsetY = e.clientY - rect.top;
                    e.preventDefault();
                });

                document.addEventListener('mousemove', function (e) {
                    if (isDragging && pin.offsetParent) {
                        const x = e.clientX - offsetX - pin.offsetParent.getBoundingClientRect().left;
                        const y = e.clientY - offsetY - pin.offsetParent.getBoundingClientRect().top;
                        pin.style.left = x + 'px';
                        pin.style.top = y + 'px';
                        pin.style.position = 'absolute';
                    }
                });

                document.addEventListener('mouseup', function () {
                    isDragging = false;
                });
            });

            // Reinitialize on Livewire navigation
            document.addEventListener('livewire:navigated', function () {
                // Same code as above for re-initialization
                const pinAuthed = document.getElementById('pinauthed');
                const pinGuest = document.getElementById('pin');
                const pin = pinAuthed || pinGuest;

                if (!pin) return;

                let isDragging = false;
                let offsetX, offsetY;

                pin.addEventListener('mousedown', function (e) {
                    isDragging = true;
                    const rect = pin.getBoundingClientRect();
                    offsetX = e.clientX - rect.left;
                    offsetY = e.clientY - rect.top;
                    e.preventDefault();
                });

                document.addEventListener('mousemove', function (e) {
                    if (isDragging && pin.offsetParent) {
                        const x = e.clientX - offsetX - pin.offsetParent.getBoundingClientRect().left;
                        const y = e.clientY - offsetY - pin.offsetParent.getBoundingClientRect().top;
                        pin.style.left = x + 'px';
                        pin.style.top = y + 'px';
                        pin.style.position = 'absolute';
                    }
                });

                document.addEventListener('mouseup', function () {
                    isDragging = false;
                });
            });
        </script>
    @endpush
</div>