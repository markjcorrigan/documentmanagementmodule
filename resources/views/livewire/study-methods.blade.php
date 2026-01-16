{{-- resources/views/livewire/study-methods.blade.php --}}
<section>

<div class="max-w-6xl mx-auto px-4 py-8">
    <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-8 border-b border-gray-200 dark:border-gray-700 pb-4">
        Study Methods & Procrastination Guide
    </h1>

    {{-- Navigation Links --}}
    <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 mb-8 border border-gray-200 dark:border-gray-700">
        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">Quick Navigation</h2>
        <div class="flex flex-wrap gap-4">
            <a href="#studyloggedin" class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 underline">
                Study Methods
            </a>
            <a href="#beatit" class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 underline">
                Procrastination Part 2
            </a>
            <a href="#home" class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 underline">
                Back to Top
            </a>
        </div>
    </div>

    {{-- Introduction Section --}}
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">Study Methods: Learn How to Study Anything</h2>
        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-4">
            And how to stop procrastination dead in its tracks
        </p>

        <hr class="border-gray-300 dark:border-gray-600 my-6">

        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Procrastination Part 1: Why We Procrastinate</h3>

        <div class="space-y-4">
            <p class="text-lg text-gray-700 dark:text-gray-300">
                <a href="#beatit" class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 underline">
                    Procrastination Part 2: How to Beat It
                </a>
            </p>
            <p class="text-lg text-gray-700 dark:text-gray-300">
                <a href="#studyloggedin" class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 underline">
                    How to Study Effectively
                </a>
            </p>
        </div>
    </section>

    {{-- Key Terms Section --}}
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">Essential Tools & Concepts</h2>
        <p class="text-lg text-gray-700 dark:text-gray-300 mb-6">
            These are your essential tools to stop procrastination dead in its tracks and become seriously productive right now!
        </p>

        {{-- Accordion for Key Terms --}}
        <div class="space-y-4">
            {{-- Rational Decision Maker --}}
            <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <img src="{{ asset('storage/images/rationaldecisionsmall.jpg') }}" alt="Rational Decision Maker" class="w-16 h-16 object-contain">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">The Rational Decision Maker</h3>
                    </div>
                    <button class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                </div>
                <div class="mt-4 hidden">
                    <div class="text-center">
                        <img src="{{ asset('storage/images/NP brain.png') }}" alt="Non-Procrastinator Brain" class="mx-auto max-w-md">
                    </div>
                </div>
            </div>

            {{-- Instant Gratification Monkey --}}
            <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <img src="{{ asset('storage/images/igmsmall.png') }}" alt="Instant Gratification Monkey" class="w-16 h-16 object-contain">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">The Instant Gratification Monkey</h3>
                    </div>
                    <button class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                </div>
                <div class="mt-4 hidden">
                    <div class="text-center">
                        <img src="{{ asset('storage/images/IGM RDM interacting 1.png') }}" alt="Monkey and Decision Maker Interaction" class="mx-auto max-w-md">
                    </div>
                </div>
            </div>

            {{-- Key Terms Section --}}
            <section class="mb-12">
                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">Essential Tools & Concepts</h2>
                <p class="text-lg text-gray-700 dark:text-gray-300 mb-6">
                    These are your essential tools to stop procrastination dead in its tracks and become seriously productive right now!
                </p>

                {{-- Accordion for Key Terms --}}
                <div class="space-y-4" x-data="{ open: null }">
                    {{-- Rational Decision Maker --}}
                    <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                        <div class="flex items-center justify-between cursor-pointer" @click="open = open === 1 ? null : 1">
                            <div class="flex items-center space-x-4">
                                <img src="{{ asset('storage/images/rationaldecisionsmall.jpg') }}" alt="Rational Decision Maker" class="w-16 h-16 object-contain">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">The Rational Decision Maker</h3>
                            </div>
                            <svg class="w-6 h-6 text-gray-500 transition-transform duration-200"
                                 :class="{ 'rotate-180': open === 1 }"
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                        <div class="mt-4" x-show="open === 1" x-collapse>
                            <div class="text-center">
                                <img src="{{ asset('storage/images/NP brain.png') }}" alt="Non-Procrastinator Brain" class="mx-auto max-w-md">
                            </div>
                        </div>
                    </div>

                    {{-- Instant Gratification Monkey --}}
                    <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                        <div class="flex items-center justify-between cursor-pointer" @click="open = open === 2 ? null : 2">
                            <div class="flex items-center space-x-4">
                                <img src="{{ asset('storage/images/igmsmall.png') }}" alt="Instant Gratification Monkey" class="w-16 h-16 object-contain">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">The Instant Gratification Monkey</h3>
                            </div>
                            <svg class="w-6 h-6 text-gray-500 transition-transform duration-200"
                                 :class="{ 'rotate-180': open === 2 }"
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                        <div class="mt-4" x-show="open === 2" x-collapse>
                            <div class="text-center">
                                <img src="{{ asset('storage/images/IGM RDM interacting 1.png') }}" alt="Monkey and Decision Maker Interaction" class="mx-auto max-w-md">
                            </div>
                        </div>
                    </div>

                    {{-- Dark Playground --}}
                    <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                        <div class="flex items-center justify-between cursor-pointer" @click="open = open === 3 ? null : 3">
                            <div class="flex items-center space-x-4">
                                <img src="{{ asset('storage/images/darkplaygroundnotsmall.png') }}" alt="Dark Playground" class="w-16 h-16 object-contain">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">The Dark Playground</h3>
                            </div>
                            <svg class="w-6 h-6 text-gray-500 transition-transform duration-200"
                                 :class="{ 'rotate-180': open === 3 }"
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                        <div class="mt-4" x-show="open === 3" x-collapse>
                            <div class="text-center">
                                <img src="{{ asset('storage/images/dark woods pro 1.png') }}" alt="Dark Playground Illustration" class="mx-auto max-w-md">
                            </div>
                        </div>
                    </div>

                    {{-- Panic Monster --}}
                    <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                        <div class="flex items-center justify-between cursor-pointer" @click="open = open === 4 ? null : 4">
                            <div class="flex items-center space-x-4">
                                <img src="{{ asset('storage/images/panicmonsternotsmall.png') }}" alt="Panic Monster" class="w-16 h-16 object-contain">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">The Panic Monster</h3>
                            </div>
                            <svg class="w-6 h-6 text-gray-500 transition-transform duration-200"
                                 :class="{ 'rotate-180': open === 4 }"
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                        <div class="mt-4" x-show="open === 4" x-collapse>
                            <div class="text-center">
                                <img src="{{ asset('storage/images/PM.png') }}" alt="Panic Monster Illustration" class="mx-auto max-w-md">
                            </div>
                        </div>
                    </div>

                    {{-- Storyline --}}
                    <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                        <div class="flex items-center justify-between cursor-pointer" @click="open = open === 5 ? null : 5">
                            <div class="flex items-center space-x-4">
                                <img src="{{ asset('storage/images/storyline.png') }}" alt="Storyline" class="w-16 h-16 object-contain">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Your Story of Successes or Failures</h3>
                            </div>
                            <svg class="w-6 h-6 text-gray-500 transition-transform duration-200"
                                 :class="{ 'rotate-180': open === 5 }"
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                        <div class="mt-4" x-show="open === 5" x-collapse>
                            <div class="text-center">
                                <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                                    Your story of successes or your procrastination story of continued failures
                                </h4>
                            </div>
                        </div>
                    </div>

                    {{-- Big List of Icky --}}
                    <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                        <div class="flex items-center justify-between cursor-pointer" @click="open = open === 6 ? null : 6">
                            <div class="flex items-center space-x-4">
                                <span class="text-lg font-semibold text-gray-900 dark:text-white">big list of icky</span>
                            </div>
                            <svg class="w-6 h-6 text-gray-500 transition-transform duration-200"
                                 :class="{ 'rotate-180': open === 6 }"
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                        <div class="mt-4" x-show="open === 6" x-collapse>
                            <div class="text-center">
                                <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                                    Ineffective Planning and the big list of icky
                                </h4>
                            </div>
                        </div>
                    </div>

                    {{-- Un-Icky --}}
                    <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                        <div class="flex items-center justify-between cursor-pointer" @click="open = open === 7 ? null : 7">
                            <div class="flex items-center space-x-4">
                                <span class="text-lg font-semibold text-gray-900 dark:text-white">un-icky</span>
                            </div>
                            <svg class="w-6 h-6 text-gray-500 transition-transform duration-200"
                                 :class="{ 'rotate-180': open === 7 }"
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                        <div class="mt-4" x-show="open === 7" x-collapse>
                            <div class="text-center">
                                <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                                    Effective Planning turns icky into un-icky
                                </h4>
                            </div>
                        </div>
                    </div>

                    {{-- Bricks Focus --}}
                    <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                        <div class="flex items-center justify-between cursor-pointer" @click="open = open === 8 ? null : 8">
                            <div class="flex items-center space-x-4">
                                <img src="{{ asset('storage/images/bricksnotsmall.gif') }}" alt="Bricks" class="w-16 h-16 object-contain">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Focus on Bricks, Not the Wall</h3>
                            </div>
                            <svg class="w-6 h-6 text-gray-500 transition-transform duration-200"
                                 :class="{ 'rotate-180': open === 8 }"
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                        <div class="mt-4" x-show="open === 8" x-collapse>
                            <div class="text-center">
                                <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                                    It's all about focusing on the bricks (laying a brick at a time) and not the wall
                                </h4>
                                <img src="{{ asset('storage/images/building_brick_wall_pa_300_clr.gif') }}" alt="Building Brick Wall" class="mx-auto max-w-md">
                            </div>
                        </div>
                    </div>

                    {{-- Single Brick --}}
                    <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                        <div class="flex items-center justify-between cursor-pointer" @click="open = open === 9 ? null : 9">
                            <div class="flex items-center space-x-4">
                                <img src="{{ asset('storage/images/brick.png') }}" alt="Single Brick" class="w-16 h-16 object-contain">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Laying One Brick</h3>
                            </div>
                            <svg class="w-6 h-6 text-gray-500 transition-transform duration-200"
                                 :class="{ 'rotate-180': open === 9 }"
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                        <div class="mt-4" x-show="open === 9" x-collapse>
                            <div class="text-center">
                                <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                                    Laying one brick isn't daunting
                                </h4>
                            </div>
                        </div>
                    </div>

                    {{-- Brick Scheduling --}}
                    <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                        <div class="flex items-center justify-between cursor-pointer" @click="open = open === 10 ? null : 10">
                            <div class="flex items-center space-x-4">
                                <div class="flex items-center space-x-2">
                                    <img src="{{ asset('storage/images/brick.png') }}" alt="Brick" class="w-8 h-8 object-contain">
                                    <img src="{{ asset('storage/images/brick.png') }}" alt="Brick" class="w-8 h-8 object-contain">
                                    <img src="{{ asset('storage/images/trellosmall.jpg') }}" alt="Trello" class="w-8 h-8 object-contain">
                                </div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Brick Scheduling</h3>
                            </div>
                            <svg class="w-6 h-6 text-gray-500 transition-transform duration-200"
                                 :class="{ 'rotate-180': open === 10 }"
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                        <div class="mt-4" x-show="open === 10" x-collapse>
                            <div class="text-center">
                                <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                                    Bricks do require scheduling
                                </h4>
                            </div>
                        </div>
                    </div>

                    {{-- Critical Entrance --}}
                    <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                        <div class="flex items-center justify-between cursor-pointer" @click="open = open === 11 ? null : 11">
                            <div class="flex items-center space-x-4">
                                <img src="{{ asset('storage/images/criticalentrancenotsmall.png') }}" alt="Critical Entrance" class="w-16 h-16 object-contain">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">The Critical Entrance</h3>
                            </div>
                            <svg class="w-6 h-6 text-gray-500 transition-transform duration-200"
                                 :class="{ 'rotate-180': open === 11 }"
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                        <div class="mt-4" x-show="open === 11" x-collapse>
                            <div class="text-center">
                                <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                                    The Critical Entrance is where you go to officially start work on the task (selecting the brick to work on)
                                </h4>
                                <img src="{{ asset('storage/images/dark woods.png') }}" alt="Critical Entrance Illustration" class="mx-auto max-w-md">
                            </div>
                        </div>
                    </div>

                    {{-- Dark Woods --}}
                    <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                        <div class="flex items-center justify-between cursor-pointer" @click="open = open === 12 ? null : 12">
                            <div class="flex items-center space-x-4">
                                <img src="{{ asset('storage/images/darkwoodsnotsmall.png') }}" alt="Dark Woods" class="w-16 h-16 object-contain">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">The Dark Woods</h3>
                            </div>
                            <svg class="w-6 h-6 text-gray-500 transition-transform duration-200"
                                 :class="{ 'rotate-180': open === 12 }"
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                        <div class="mt-4" x-show="open === 12" x-collapse>
                            <div class="text-center">
                                <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                                    The Dark Wood is the process of actually doing the work task (laying the brick)
                                </h4>
                            </div>
                        </div>
                    </div>

                    {{-- Dark Woods to Happiness --}}
                    <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                        <div class="flex items-center justify-between cursor-pointer" @click="open = open === 13 ? null : 13">
                            <div class="flex items-center space-x-4">
                                <img src="{{ asset('storage/images/happyendingsplaygroundsmaller.png') }}" alt="Happy Playground" class="w-16 h-16 object-contain">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Dark Woods Lead to Happiness</h3>
                            </div>
                            <svg class="w-6 h-6 text-gray-500 transition-transform duration-200"
                                 :class="{ 'rotate-180': open === 13 }"
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                        <div class="mt-4" x-show="open === 13" x-collapse>
                            <div class="text-center">
                                <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                                    The Dark Wood leads to happiness - The Happy Playground!
                                </h4>
                                <img src="{{ asset('storage/images/dark woods pro good.png') }}" alt="Happy Playground Path" class="mx-auto max-w-md">
                            </div>
                        </div>
                    </div>

                    {{-- Bumping into Trees --}}
                    <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                        <div class="flex items-center justify-between cursor-pointer" @click="open = open === 14 ? null : 14">
                            <div class="flex items-center space-x-4">
                                <img src="{{ asset('storage/images/tree.png') }}" alt="Tree" class="w-16 h-16 object-contain">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Bumping into Trees</h3>
                            </div>
                            <svg class="w-6 h-6 text-gray-500 transition-transform duration-200"
                                 :class="{ 'rotate-180': open === 14 }"
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                        <div class="mt-4" x-show="open === 14" x-collapse>
                            <div class="text-center">
                                <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                                    Bumping into trees can happen
                                </h4>
                                <p class="text-gray-700 dark:text-gray-300 mb-4">
                                    This is a good thing! If you are smart trees can teach you stuff. Trees are where you learn and improve.
                                    But beware the Instant Gratification Monkey! He prefers the Dark Playground!
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Dark Playground Consequences --}}
                    <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                        <div class="flex items-center justify-between cursor-pointer" @click="open = open === 15 ? null : 15">
                            <div class="flex items-center space-x-4">
                                <img src="{{ asset('storage/images/darkplaygroundsmall.png') }}" alt="Dark Playground" class="w-16 h-16 object-contain">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">The Dark Playground Consequences</h3>
                            </div>
                            <svg class="w-6 h-6 text-gray-500 transition-transform duration-200"
                                 :class="{ 'rotate-180': open === 15 }"
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                        <div class="mt-4" x-show="open === 15" x-collapse>
                            <div class="text-center">
                                <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">The Dark Playground</h4>
                                <p class="text-gray-700 dark:text-gray-300 mb-4">
                                    The Dark Playground (not laying bricks by following the advice of the Instant Gratification Monkey who wants out of the Dark Woods) leads to misery
                                </p>
                                <img src="{{ asset('storage/images/dark woods pro 2.png') }}" alt="Dark Playground Consequences" class="mx-auto max-w-md">
                            </div>
                        </div>
                    </div>

                    {{-- Mixed Feelings Park --}}
                    <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                        <div class="flex items-center justify-between cursor-pointer" @click="open = open === 16 ? null : 16">
                            <div class="flex items-center space-x-4">
                                <img src="{{ asset('storage/images/mixedfeelingsnotsmaller.png') }}" alt="Mixed Feelings" class="w-16 h-16 object-contain">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">The Mixed Feelings Park</h3>
                            </div>
                            <svg class="w-6 h-6 text-gray-500 transition-transform duration-200"
                                 :class="{ 'rotate-180': open === 16 }"
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                        <div class="mt-4" x-show="open === 16" x-collapse>
                            <div class="text-center">
                                <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">The Mixed Feelings Park</h4>
                                <p class="text-gray-700 dark:text-gray-300 mb-4">
                                    The Mixed Feelings part is sub-standard delivery. I.e. quickly prepared the night before.
                                </p>
                                <img src="{{ asset('storage/images/dark woods pro 3.png') }}" alt="Mixed Feelings Park" class="mx-auto max-w-md">
                            </div>
                        </div>
                    </div>

                    {{-- High Self Esteem Banana --}}
                    <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                        <div class="flex items-center justify-between cursor-pointer" @click="open = open === 17 ? null : 17">
                            <div class="flex items-center space-x-4">
                                <img src="{{ asset('storage/images/bananasmall.png') }}" alt="Banana" class="w-16 h-16 object-contain">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">The High Self Esteem Banana</h3>
                            </div>
                            <svg class="w-6 h-6 text-gray-500 transition-transform duration-200"
                                 :class="{ 'rotate-180': open === 17 }"
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                        <div class="mt-4" x-show="open === 17" x-collapse>
                            <div class="text-center">
                                <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">The High Self Esteem Banana</h4>
                                <p class="text-gray-700 dark:text-gray-300 mb-4">
                                    High Self-Esteem Bananas satisfy and distract the monkey
                                </p>
                                <img src="{{ asset('storage/images/Pathways banana.png') }}" alt="Banana Pathway" class="mx-auto max-w-md">
                            </div>
                        </div>
                    </div>

                    {{-- Tipping Point --}}
                    <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                        <div class="flex items-center justify-between cursor-pointer" @click="open = open === 18 ? null : 18">
                            <div class="flex items-center space-x-4">
                                <div class="flex items-center space-x-2">
                                    <img src="{{ asset('storage/images/tippingpointnotsmall.png') }}" alt="Tipping Point" class="w-8 h-8 object-contain">
                                    <img src="{{ asset('storage/images/tippingpointrunningnotsmall.png') }}" alt="Running to Tipping Point" class="w-8 h-8 object-contain">
                                </div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">The Tipping Point</h3>
                            </div>
                            <svg class="w-6 h-6 text-gray-500 transition-transform duration-200"
                                 :class="{ 'rotate-180': open === 18 }"
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                        <div class="mt-4" x-show="open === 18" x-collapse>
                            <div class="text-center">
                                <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">The Tipping Point</h4>
                                <p class="text-gray-700 dark:text-gray-300 mb-4">
                                    It's all downhill from here. Yeeeee haaaa! Even the monkey thinks this is cool!
                                </p>
                                <img src="{{ asset('storage/images/running.png') }}" alt="Running to Finish" class="mx-auto max-w-md">
                            </div>
                        </div>
                    </div>

                    {{-- Flow --}}
                    <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                        <div class="flex items-center justify-between cursor-pointer" @click="open = open === 19 ? null : 19">
                            <div class="flex items-center space-x-4">
                                <div class="flex items-center space-x-2">
                                    <img src="{{ asset('storage/images/flownotsmall.png') }}" alt="Flow" class="w-8 h-8 object-contain">
                                    <img src="{{ asset('storage/images/flowridesmall.png') }}" alt="Flow Ride" class="w-8 h-8 object-contain">
                                </div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Flow!</h3>
                            </div>
                            <svg class="w-6 h-6 text-gray-500 transition-transform duration-200"
                                 :class="{ 'rotate-180': open === 19 }"
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                        <div class="mt-4" x-show="open === 19" x-collapse>
                            <div class="text-center">
                                <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Flow!</h4>
                                <p class="text-gray-700 dark:text-gray-300 mb-4">
                                    It's such a cool ride I am going to keep going! Yeeeee haaaa! Even the monkey thinks this is cool!
                                </p>
                                <img src="{{ asset('storage/images/flow.png') }}" alt="Flow State" class="mx-auto max-w-md">
                            </div>
                        </div>
                    </div>

                    {{-- Happy Playground --}}
                    <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                        <div class="flex items-center justify-between cursor-pointer" @click="open = open === 20 ? null : 20">
                            <div class="flex items-center space-x-4">
                                <img src="{{ asset('storage/images/happyendingsplaygroundsmaller.png') }}" alt="Happy Playground" class="w-16 h-16 object-contain">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">The Happy Playground</h3>
                            </div>
                            <svg class="w-6 h-6 text-gray-500 transition-transform duration-200"
                                 :class="{ 'rotate-180': open === 20 }"
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                        <div class="mt-4" x-show="open === 20" x-collapse>
                            <div class="text-center">
                                <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">The Happy Playground</h4>
                                <p class="text-gray-700 dark:text-gray-300 mb-4">
                                    Once you are finish with the task (the brick cemented into place), you're rewarded by ending up in the Happy Playground. Well Done! Chill out! So can your nemesis, now referred to as the Gratified Monkey
                                </p>
                                <img src="{{ asset('storage/images/happy playground.png') }}" alt="Happy Playground" class="mx-auto max-w-md">
                            </div>
                        </div>
                    </div>
                </div>
            </section>




        </div>
    </section>
</div>






{{-- Procrastination Definition Section --}}
<section class="mb-12">
    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">Understanding Procrastination</h2>

    <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 border border-gray-200 dark:border-gray-700 mb-6">
        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Dictionary Definition</h3>
        <div class="text-center">
            <p class="text-2xl font-bold text-gray-900 dark:text-white mb-2">pro-cras-ti-na-tion</p>
            <p class="text-gray-600 dark:text-gray-400 text-sm mb-4">|prəˌkrastəˈnāSHən, prō-|</p>
            <p class="text-lg text-gray-700 dark:text-gray-300 italic">noun</p>
            <p class="text-xl text-gray-800 dark:text-gray-200 mt-2">"the action of delaying or postponing something."</p>
        </div>
    </div>

    {{-- Brain Comparison --}}
    <div class="grid md:grid-cols-2 gap-6 mb-8">
        <div class="bg-white dark:bg-gray-800 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
            <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Non-Procrastinator's Brain</h4>
            <img src="{{ asset('storage/images/NP brain.png') }}" alt="Non-Procrastinator Brain" class="w-full rounded-lg">
            <p class="text-sm text-gray-600 dark:text-gray-400 mt-2 text-center">Pretty normal, right?</p>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
            <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Procrastinator's Brain</h4>
            <img src="{{ asset('storage/images/P brain.png') }}" alt="Procrastinator Brain" class="w-full rounded-lg">
            <p class="text-sm text-gray-600 dark:text-gray-400 mt-2 text-center">Notice anything different?</p>
        </div>
    </div>

    {{-- The Instant Gratification Monkey Explanation --}}
    <div class="bg-gradient-to-r from-orange-50 to-yellow-50 dark:from-orange-900/20 dark:to-yellow-900/20 rounded-lg p-6 border border-orange-200 dark:border-orange-700 mb-6">
        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">The Instant Gratification Monkey</h3>
        <p class="text-lg text-gray-700 dark:text-gray-300 mb-4">
            The Rational Decision Maker in the procrastinator's brain is coexisting with a pet - <strong>the Instant Gratification Monkey</strong>.
        </p>
        <p class="text-lg text-gray-700 dark:text-gray-300">
            This would be fine if the Rational Decision Maker knew how to own a monkey. But unfortunately, he's left completely helpless as the monkey makes it impossible for him to do his job.
        </p>
    </div>

    {{-- Interaction Examples --}}
    <div class="space-y-4 mb-8">
        <div class="text-center">
            <img src="{{ asset('storage/images/IGM RDM interacting 1.png') }}" alt="Interaction 1" class="mx-auto max-w-md rounded-lg shadow-lg">
        </div>
        <div class="text-center">
            <img src="{{ asset('storage/images/IGM RDM interacting 2.png') }}" alt="Interaction 2" class="mx-auto max-w-md rounded-lg shadow-lg">
        </div>
        <div class="text-center">
            <img src="{{ asset('storage/images/IGM RDM interacting 3.png') }}" alt="Interaction 3" class="mx-auto max-w-md rounded-lg shadow-lg">
        </div>
        <div class="text-center">
            <img src="{{ asset('storage/images/IGM RDM interacting 4.png') }}" alt="Interaction 4" class="mx-auto max-w-md rounded-lg shadow-lg">
        </div>
    </div>
</section>






{{-- Dark Playground Section --}}
<section class="mb-12">
    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">The Dark Playground</h2>

    <div class="bg-gray-800 rounded-lg p-6 text-white mb-6">
        <h3 class="text-xl font-semibold mb-4">A Place Every Procrastinator Knows Well</h3>
        <p class="text-lg mb-4">
            The Dark Playground is a place where leisure activities happen at times <strong>when leisure activities are not supposed to be happening</strong>.
        </p>
        <p class="text-lg">
            The fun you have in the Dark Playground isn't actually fun because it's completely unearned and the air is filled with <strong>guilt</strong>, <strong>anxiety</strong>, <strong>self-hatred</strong>, and <strong>dread</strong>.
        </p>
    </div>

    <div class="text-center mb-6">
        <img src="{{ asset('storage/images/dark woods pro 1.png') }}" alt="Dark Playground" class="mx-auto max-w-2xl rounded-lg">
    </div>
</section>

{{-- Panic Monster Section --}}
<section class="mb-12">
    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">The Panic Monster</h2>

    <div class="bg-red-50 dark:bg-red-900/20 rounded-lg p-6 border border-red-200 dark:border-red-700 mb-6">
        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">The Only Thing That Scares the Monkey</h3>
        <p class="text-lg text-gray-700 dark:text-gray-300">
            As it turns out, there's one thing that scares the shit out of the Instant Gratification Monkey...
        </p>
    </div>

    <div class="text-center mb-6">
        <img src="{{ asset('storage/images/PM.png') }}" alt="Panic Monster" class="mx-auto max-w-md rounded-lg">
    </div>

    {{-- Panic Monster Scare Sequence --}}
    <div class="space-y-4 mb-8">
        <div class="text-center">
            <img src="{{ asset('storage/images/PM Scare 1.png') }}" alt="Panic Monster Scare 1" class="mx-auto max-w-md rounded-lg">
        </div>
        <div class="text-center">
            <img src="{{ asset('storage/images/PM Scare 2.png') }}" alt="Panic Monster Scare 2" class="mx-auto max-w-md rounded-lg">
        </div>
        <div class="text-center">
            <img src="{{ asset('storage/images/PM Scare 3.png') }}" alt="Panic Monster Scare 3" class="mx-auto max-w-md rounded-lg">
        </div>
    </div>

    <div class="bg-yellow-50 dark:bg-yellow-900/20 rounded-lg p-6 border border-yellow-200 dark:border-yellow-700">
        <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Why Procrastination Needs to Change</h4>
        <ul class="space-y-2 text-gray-700 dark:text-gray-300">
            <li class="flex items-start">
                <svg class="w-5 h-5 text-yellow-600 dark:text-yellow-400 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                </svg>
                <span><strong>It's unpleasant:</strong> Too much time spent in the Dark Playground</span>
            </li>
            <li class="flex items-start">
                <svg class="w-5 h-5 text-yellow-600 dark:text-yellow-400 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                </svg>
                <span><strong>You sell yourself short:</strong> Underachieving and filled with regret</span>
            </li>
            <li class="flex items-start">
                <svg class="w-5 h-5 text-yellow-600 dark:text-yellow-400 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                </svg>
                <span><strong>Want-To-Dos don't happen:</strong> Important life goals get left in the dust</span>
            </li>
        </ul>
    </div>
</section>







{{-- Part 2 Header --}}
<section class="mb-12">
    <div class="border-t-4 border-blue-600 dark:border-blue-400 pt-8 mb-8">
        <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Procrastination Part 2: How to Beat Procrastination</h2>
        <p class="text-xl text-gray-600 dark:text-gray-300">
            Taking control of your life and productivity
        </p>
    </div>

    {{-- Better Definition --}}
    <div class="bg-blue-50 dark:bg-blue-900/20 rounded-lg p-6 border-l-4 border-blue-500 mb-8">
        <h3 class="text-xl font-semibold text-blue-900 dark:text-blue-300 mb-4">A Better Definition</h3>
        <div class="text-center">
            <p class="text-2xl font-bold text-blue-900 dark:text-blue-300 mb-2">pro-cras-ti-na-tion</p>
            <p class="text-blue-700 dark:text-blue-400 text-sm mb-4">|prəˌkrastəˈnāSHən, prō-|</p>
            <p class="text-lg text-blue-800 dark:text-blue-300 italic">noun</p>
            <p class="text-xl text-blue-900 dark:text-blue-200 mt-2 font-semibold">"the action of ruining your own life for no apparent reason"</p>
        </div>
    </div>

    {{-- Planning vs Doing --}}
    <div class="grid md:grid-cols-2 gap-6 mb-8">
        <div class="bg-white dark:bg-gray-800 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Planning</h3>
            <p class="text-lg text-gray-700 dark:text-gray-300 mb-4">
                Procrastinators love planning, quite simply because <em>planning</em> does not involve <em>doing</em>.
            </p>
            <div class="bg-red-50 dark:bg-red-900/20 p-4 rounded-lg">
                <h4 class="font-semibold text-red-900 dark:text-red-300 mb-2">Ineffective Planning Creates:</h4>
                <p class="text-red-800 dark:text-red-300 font-bold">A big list of icky, daunting tasks</p>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Doing</h3>
            <p class="text-lg text-gray-700 dark:text-gray-300 mb-4">
                The procrastinator's Kryptonite. This is where the real struggle happens.
            </p>
            <div class="bg-green-50 dark:bg-green-900/20 p-4 rounded-lg">
                <h4 class="font-semibold text-green-900 dark:text-green-300 mb-2">Effective Planning Creates:</h4>
                <p class="text-green-800 dark:text-green-300 font-bold">Clear, manageable steps forward</p>
            </div>
        </div>
    </div>

    {{-- The Bricks Metaphor --}}
    <div class="bg-gradient-to-r from-green-50 to-blue-50 dark:from-gray-800 dark:to-gray-700 rounded-lg p-6 border border-green-200 dark:border-green-700 mb-8">
        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">It's All About the Bricks</h3>
        <p class="text-lg text-gray-700 dark:text-gray-300 mb-4 italic">
            "A remarkable, glorious achievement is just what a long series of unremarkable, unglorious tasks looks like from far away."
        </p>

        <div class="text-center mb-4">
            <img src="{{ asset('storage/images/building_brick_wall_pa_300_clr.gif') }}" alt="Building Brick by Brick" class="mx-auto max-w-md rounded-lg">
        </div>

        <div class="grid md:grid-cols-3 gap-4 text-center">
            <div class="bg-white dark:bg-gray-800 p-4 rounded-lg">
                <p class="font-semibold text-gray-900 dark:text-white">No one "builds a house"</p>
                <p class="text-sm text-gray-600 dark:text-gray-400">They lay one brick again and again</p>
            </div>
            <div class="bg-white dark:bg-gray-800 p-4 rounded-lg">
                <p class="font-semibold text-gray-900 dark:text-white">45-minute gym visit</p>
                <p class="text-sm text-gray-600 dark:text-gray-400">The brick of getting in great shape</p>
            </div>
            <div class="bg-white dark:bg-gray-800 p-4 rounded-lg">
                <p class="font-semibold text-gray-900 dark:text-white">30-minute practice</p>
                <p class="text-sm text-gray-600 dark:text-gray-400">The brick of becoming great</p>
            </div>
        </div>
    </div>
</section>






{{-- Study Barriers Section --}}
<section class="mb-12">
    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">Tools to Study Anything</h2>

    <div class="bg-purple-50 dark:bg-purple-900/20 rounded-lg p-6 border-l-4 border-purple-500 mb-6">
        <h3 class="text-xl font-semibold text-purple-900 dark:text-purple-300 mb-3">Understand the Symptoms Caused by Barriers</h3>
        <p class="text-lg text-purple-800 dark:text-purple-300">
            Improve results from study effort by recognizing and overcoming these three barriers
        </p>
    </div>

    {{-- Three Barriers --}}
    <div class="space-y-6">
        {{-- Barrier 1: Lack of Mass --}}
        <div class="bg-white dark:bg-gray-800 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4 flex items-center">
                <span class="bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-200 rounded-full w-8 h-8 flex items-center justify-center mr-3">1</span>
                Lack of Mass
            </h3>
            <p class="text-lg text-gray-700 dark:text-gray-300 mb-4">
                The actual mass of the subject is missing. If a student is taught to repair cars and never shown a motor or even pictures of parts, we have a typical example of lack of mass.
            </p>

            <div class="grid md:grid-cols-2 gap-4 mb-4">
                <div class="bg-gray-50 dark:bg-gray-900 p-4 rounded-lg">
                    <h4 class="font-semibold text-gray-900 dark:text-white mb-2">Symptoms:</h4>
                    <ul class="text-sm text-gray-700 dark:text-gray-300 space-y-1">
                        <li class="flex items-start">
                            <svg class="w-4 h-4 text-red-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                            </svg>
                            Feeling squashed
                        </li>
                        <li class="flex items-start">
                            <svg class="w-4 h-4 text-red-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                            </svg>
                            Spinny and confused
                        </li>
                        <li class="flex items-start">
                            <svg class="w-4 h-4 text-red-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                            </svg>
                            'Dead' feeling
                        </li>
                    </ul>
                </div>
                <div class="bg-green-50 dark:bg-green-900/20 p-4 rounded-lg">
                    <h4 class="font-semibold text-gray-900 dark:text-white mb-2">Remedy:</h4>
                    <ul class="text-sm text-gray-700 dark:text-gray-300 space-y-1">
                        <li class="flex items-start">
                            <svg class="w-4 h-4 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            Use pictures and videos
                        </li>
                        <li class="flex items-start">
                            <svg class="w-4 h-4 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            Handle physical objects
                        </li>
                        <li class="flex items-start">
                            <svg class="w-4 h-4 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            Do demonstrations
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- Study Barriers Section --}}
        <section class="mb-12">
            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">Tools to Study Anything</h2>

            <div class="bg-purple-50 dark:bg-purple-900/20 rounded-lg p-6 border-l-4 border-purple-500 mb-6">
                <h3 class="text-xl font-semibold text-purple-900 dark:text-purple-300 mb-3">Understand the Symptoms Caused by Barriers</h3>
                <p class="text-lg text-purple-800 dark:text-purple-300">
                    Improve results from study effort by recognizing and overcoming these three barriers
                </p>
            </div>

            {{-- Three Barriers --}}
            <div class="space-y-6">
                {{-- Barrier 1: Lack of Mass --}}
                <div class="bg-white dark:bg-gray-800 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4 flex items-center">
                        <span class="bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-200 rounded-full w-8 h-8 flex items-center justify-center mr-3">1</span>
                        Lack of Mass
                    </h3>
                    <p class="text-lg text-gray-700 dark:text-gray-300 mb-4">
                        The actual mass of the subject is missing. If a student is taught to repair cars and never shown a motor or even pictures of parts, we have a typical example of lack of mass.
                    </p>

                    <div class="grid md:grid-cols-2 gap-4 mb-4">
                        <div class="bg-gray-50 dark:bg-gray-900 p-4 rounded-lg">
                            <h4 class="font-semibold text-gray-900 dark:text-white mb-2">Symptoms:</h4>
                            <ul class="text-sm text-gray-700 dark:text-gray-300 space-y-1">
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-red-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                    </svg>
                                    Feeling squashed
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-red-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                    </svg>
                                    Spinny and confused
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-red-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                    </svg>
                                    'Dead' feeling
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-red-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                    </svg>
                                    Boredom
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-red-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                    </svg>
                                    Exasperation
                                </li>
                            </ul>
                        </div>
                        <div class="bg-green-50 dark:bg-green-900/20 p-4 rounded-lg">
                            <h4 class="font-semibold text-gray-900 dark:text-white mb-2">Remedy:</h4>
                            <ul class="text-sm text-gray-700 dark:text-gray-300 space-y-1">
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    Use pictures and videos
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    Handle physical objects
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    Do demonstrations with objects
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    Demonstrate in clay
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    Reach and Withdraw exercises
                                </li>
                            </ul>
                        </div>
                    </div>

                    {{-- Example Section --}}
                    <div class="bg-blue-50 dark:bg-blue-900/20 p-4 rounded-lg border border-blue-200 dark:border-blue-800">
                        <h4 class="font-semibold text-blue-900 dark:text-blue-300 mb-2">Example:</h4>
                        <p class="text-sm text-blue-800 dark:text-blue-300">
                            Learning car repair with only text - no pictures, no tools, no actual car parts. The student struggles to visualize and ends up feeling confused and exasperated.
                        </p>
                    </div>
                </div>

                {{-- Barrier 2: Too Steep a Gradient --}}
                <div class="bg-white dark:bg-gray-800 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4 flex items-center">
                        <span class="bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-200 rounded-full w-8 h-8 flex items-center justify-center mr-3">2</span>
                        Too Steep a Gradient
                    </h3>
                    <p class="text-lg text-gray-700 dark:text-gray-300 mb-4">
                        One is going ahead to the next step before mastering the previous one. This phenomenon applies especially to doingness, but also to understanding. If a student is studying barn building and is taught all about power tools before mastering the basics of carpentry, the whole subject becomes confusing.
                    </p>

                    <div class="grid md:grid-cols-2 gap-4 mb-4">
                        <div class="bg-gray-50 dark:bg-gray-900 p-4 rounded-lg">
                            <h4 class="font-semibold text-gray-900 dark:text-white mb-2">Symptoms:</h4>
                            <ul class="text-sm text-gray-700 dark:text-gray-300 space-y-1">
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-red-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                    </svg>
                                    Confusion and disorientation
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-red-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                    </svg>
                                    Feeling spun around
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-red-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                    </svg>
                                    Concepts seem less solid
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-red-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                    </svg>
                                    Random motion sensation
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-red-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                    </svg>
                                    Overwhelm from complexity
                                </li>
                            </ul>
                        </div>
                        <div class="bg-green-50 dark:bg-green-900/20 p-4 rounded-lg">
                            <h4 class="font-semibold text-gray-900 dark:text-white mb-2">Remedy:</h4>
                            <ul class="text-sm text-gray-700 dark:text-gray-300 space-y-1">
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    Go back one step
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    Master previous skill completely
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    Break complex actions into parts
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    Practice each component skill
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    Use inch pebbles instead of milestones
                                </li>
                            </ul>
                        </div>
                    </div>

                    {{-- Visual Aid Section --}}
                    <div class="grid md:grid-cols-2 gap-4 mb-4">
                        <div class="bg-orange-50 dark:bg-orange-900/20 p-4 rounded-lg border border-orange-200 dark:border-orange-800">
                            <h4 class="font-semibold text-orange-900 dark:text-orange-300 mb-2">When you feel like this:</h4>
                            <div class="text-center">
                                <img src="{{ asset('storage/images/toosteep.png') }}" alt="Too Steep Gradient" class="mx-auto max-w-full h-16 object-contain">
                                <p class="text-xs text-orange-800 dark:text-orange-300 mt-2">Overwhelmed by complexity</p>
                            </div>
                        </div>
                        <div class="bg-teal-50 dark:bg-teal-900/20 p-4 rounded-lg border border-teal-200 dark:border-teal-800">
                            <h4 class="font-semibold text-teal-900 dark:text-teal-300 mb-2">Try this instead:</h4>
                            <div class="flex justify-center space-x-2">
                                <img src="{{ asset('storage/images/stepbystep.png') }}" alt="Step by Step" class="h-16 object-contain">
                                <img src="{{ asset('storage/images/inchpebbles.png') }}" alt="Inch Pebbles" class="h-16 object-contain">
                            </div>
                            <p class="text-xs text-teal-800 dark:text-teal-300 mt-2 text-center">Smaller, manageable steps</p>
                        </div>
                    </div>

                    {{-- Example Section --}}
                    <div class="bg-yellow-50 dark:bg-yellow-900/20 p-4 rounded-lg border border-yellow-200 dark:border-yellow-800">
                        <h4 class="font-semibold text-yellow-900 dark:text-yellow-300 mb-2">Example:</h4>
                        <p class="text-sm text-yellow-800 dark:text-yellow-300">
                            Learning to take apart a motor before mastering how to use wrenches properly. The student gets confused because they haven't built the foundational skills needed for the complex task.
                        </p>
                    </div>
                </div>

                {{-- Barrier 3: Bypassing Misunderstoods --}}
                <div class="bg-white dark:bg-gray-800 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4 flex items-center">
                        <span class="bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 rounded-full w-8 h-8 flex items-center justify-center mr-3">3</span>
                        Bypassing Misunderstoods
                    </h3>
                    <p class="text-lg text-gray-700 dark:text-gray-300 mb-4">
                        The most important barrier - bypassing undefined words or misunderstanding words. This apparently innocent oversight can cause serious reactions. Understanding depends utterly upon the student understanding all the words. When students go past misunderstood words, they experience mental blanks and find instructions incomprehensible.
                    </p>

                    <div class="grid md:grid-cols-2 gap-4 mb-4">
                        <div class="bg-gray-50 dark:bg-gray-900 p-4 rounded-lg">
                            <h4 class="font-semibold text-gray-900 dark:text-white mb-2">Symptoms:</h4>
                            <ul class="text-sm text-gray-700 dark:text-gray-300 space-y-1">
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-red-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                    </svg>
                                    Blank or washed out feeling
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-red-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                    </svg>
                                    Sleepiness or falling asleep
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-red-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                    </svg>
                                    Nervous hysteria
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-red-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                    </svg>
                                    Utter non-comprehension
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-red-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                    </svg>
                                    Violent disagreement with facts
                                </li>
                            </ul>
                        </div>
                        <div class="bg-green-50 dark:bg-green-900/20 p-4 rounded-lg">
                            <h4 class="font-semibold text-gray-900 dark:text-white mb-2">Remedy:</h4>
                            <ul class="text-sm text-gray-700 dark:text-gray-300 space-y-1">
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    Clear misunderstood words
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    Use Word Clearing methods
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    Look up definitions
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    Trace back to earlier misunderstoods
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    Restudy materials after clearing
                                </li>
                            </ul>
                        </div>
                    </div>

                    {{-- Critical Information --}}
                    <div class="bg-red-50 dark:bg-red-900/20 p-4 rounded-lg border border-red-200 dark:border-red-800 mb-4">
                        <h4 class="font-semibold text-red-900 dark:text-red-300 mb-2">⚠️ Most Important Barrier</h4>
                        <p class="text-sm text-red-800 dark:text-red-300">
                            This is the barrier that causes students to "blow" - meaning they leave courses or give up on studies that otherwise seem beneficial. It's the prime factor behind inability to perform in a field.
                        </p>
                    </div>

                    {{-- Example Section --}}
                    <div class="bg-blue-50 dark:bg-blue-900/20 p-4 rounded-lg border border-blue-200 dark:border-blue-800">
                        <h4 class="font-semibold text-blue-900 dark:text-blue-300 mb-2">Example:</h4>
                        <p class="text-sm text-blue-800 dark:text-blue-300">
                            Reading a sentence like "The x#$ist is the most important..." and not understanding the key term "x#$ist". The rest of the sentence becomes a mental blank, and the student can't follow the instruction.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Bottom Line Summary --}}
            <div class="bg-gradient-to-r from-purple-100 to-blue-100 dark:from-purple-900/30 dark:to-blue-900/30 rounded-lg p-6 mt-8 border border-purple-200 dark:border-purple-800">
                <h3 class="text-xl font-semibold text-purple-900 dark:text-purple-300 mb-4 text-center">What is the Bottom Line?</h3>
                <div class="text-center space-y-3">
                    <p class="text-lg font-semibold text-gray-900 dark:text-white">
                        Learn the symptoms of the barriers to study.
                    </p>
                    <p class="text-gray-700 dark:text-gray-300">
                        When you feel the symptom kicking in while you study, realize the barrier you have hit and then do the corrective action needed!
                    </p>
                    <p class="text-gray-700 dark:text-gray-300 font-medium">
                        This will increase your effectiveness and productivity, halting frustration in its tracks and you sloshing around!
                    </p>
                </div>
            </div>
        </section>
    </div>
</section>




{{-- Conclusion Section --}}
<section class="mb-12">
    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">Putting It All Together</h2>

    <div class="bg-gradient-to-br from-blue-600 to-indigo-700 text-white rounded-lg p-8 mb-6">
        <h3 class="text-2xl font-bold mb-4">The Bottom Line</h3>
        <p class="text-xl mb-4">
            In the same way a great achievement happens unglorious brick by unglorious brick, a deeply-engrained habit like procrastination doesn't change all at once.
        </p>
        <p class="text-xl">
            It changes one modest improvement at a time.
        </p>
    </div>

    <div class="grid md:grid-cols-2 gap-6 mb-8">
        <div class="bg-white dark:bg-gray-800 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
            <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Start Small</h4>
            <p class="text-gray-700 dark:text-gray-300">
                Don't think about going from A to Z - just start with A to B. Change the Storyline from "I procrastinate on every hard task" to "Once a week, I do a hard task without procrastinating."
            </p>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
            <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Show Yourself You Can Do It</h4>
            <p class="text-gray-700 dark:text-gray-300">
                You need to prove to yourself that you can do it. Things will change when you show yourself that they can. Until then, you won't believe it.
            </p>
        </div>
    </div>

    {{-- Final Call to Action --}}
    <div class="bg-yellow-50 dark:bg-yellow-900/20 rounded-lg p-6 border-l-4 border-yellow-500">
        <h4 class="text-xl font-semibold text-yellow-900 dark:text-yellow-300 mb-3">Remember This</h4>
        <p class="text-lg text-yellow-800 dark:text-yellow-300">
            Defeating procrastination is the same thing as gaining control over your own life. So much of what makes people happy or unhappy - their level of fulfillment and satisfaction, their self-esteem, the regrets they carry with them - is severely affected by procrastination.
        </p>
        <p class="text-lg text-yellow-800 dark:text-yellow-300 font-bold mt-3">
            So it's worthy of being taken dead seriously, and the time to start improving is now.
        </p>
    </div>
</section>

{{-- Credits --}}
<section class="mb-12">
    <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Credits & Resources</h3>
        <div class="space-y-2 text-gray-700 dark:text-gray-300">
            <p>Thanks to: <a href="https://waitbutwhy.com" class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 underline">waitbutwhy.com</a></p>
            <p>Thanks to: <a href="http://www.whatisscientology.org/html/Part03/Chp10/pg0219-b.html" class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 underline">The Student Hat</a></p>
        </div>
    </div>
</section>





{{-- The Critical Entrance & Dark Woods Section --}}
<section class="mb-12">
    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">The Work Process: Critical Entrance & Dark Woods</h2>

    {{-- Main Diagram --}}
    <div class="bg-white dark:bg-gray-800 rounded-lg p-6 border border-gray-200 dark:border-gray-700 mb-6">
        <div class="text-center mb-4">
            <img src="{{ asset('storage/images/dark woods.png') }}" alt="Dark Woods Diagram" class="mx-auto max-w-2xl rounded-lg shadow-lg">
        </div>

        <div class="grid md:grid-cols-3 gap-4 text-center">
            <div class="bg-blue-50 dark:bg-blue-900/20 p-4 rounded-lg">
                <h4 class="font-semibold text-blue-900 dark:text-blue-300 mb-2">Critical Entrance</h4>
                <p class="text-sm text-blue-800 dark:text-blue-300">Where you officially start work on the task</p>
            </div>
            <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg">
                <h4 class="font-semibold text-gray-900 dark:text-white mb-2">Dark Woods</h4>
                <p class="text-sm text-gray-700 dark:text-gray-300">The process of actually doing the work</p>
            </div>
            <div class="bg-green-50 dark:bg-green-900/20 p-4 rounded-lg">
                <h4 class="font-semibold text-green-900 dark:text-green-300 mb-2">Happy Playground</h4>
                <p class="text-sm text-green-800 dark:text-green-300">Where you end up after finishing</p>
            </div>
        </div>
    </div>

    {{-- Successful Path --}}
    <div class="bg-green-50 dark:bg-green-900/20 rounded-lg p-6 border border-green-200 dark:border-green-700 mb-6">
        <h3 class="text-xl font-semibold text-green-900 dark:text-green-300 mb-4">The Successful Path</h3>
        <div class="text-center mb-4">
            <img src="{{ asset('storage/images/dark woods pro good.png') }}" alt="Successful Path" class="mx-auto max-w-2xl rounded-lg">
        </div>
        <p class="text-lg text-green-800 dark:text-green-300 text-center">
            Enter through Critical Entrance → Work through Dark Woods → Reach Happy Playground or enter Flow state
        </p>
    </div>

    {{-- Problematic Paths --}}
    <div class="space-y-6">
        {{-- Path 1: Never Starts --}}
        <div class="bg-red-50 dark:bg-red-900/20 rounded-lg p-6 border border-red-200 dark:border-red-700">
            <h4 class="text-lg font-semibold text-red-900 dark:text-red-300 mb-3">Problem: Never Gets Started</h4>
            <div class="text-center mb-4">
                <img src="{{ asset('storage/images/dark woods pro 1.png') }}" alt="Never Starts Path" class="mx-auto max-w-md rounded-lg">
            </div>
            <p class="text-red-800 dark:text-red-300">
                Procrastinator never makes it through the Critical Entrance. Instead, spends hours in the Dark Playground, hating himself.
            </p>
        </div>

        {{-- Path 2: Can't Stay Focused --}}
        <div class="bg-orange-50 dark:bg-orange-900/20 rounded-lg p-6 border border-orange-200 dark:border-orange-700">
            <h4 class="text-lg font-semibold text-orange-900 dark:text-orange-300 mb-3">Problem: Can't Stay Focused</h4>
            <div class="text-center mb-4">
                <img src="{{ asset('storage/images/dark woods pro 2.png') }}" alt="Can't Stay Focused" class="mx-auto max-w-md rounded-lg">
            </div>
            <p class="text-orange-800 dark:text-orange-300">
                Gets started but can't stay focused. Keeps taking long breaks and doesn't finish the task.
            </p>
        </div>

        {{-- Path 3: Last Minute Panic --}}
        <div class="bg-yellow-50 dark:bg-yellow-900/20 rounded-lg p-6 border border-yellow-200 dark:border-yellow-700">
            <h4 class="text-lg font-semibold text-yellow-900 dark:text-yellow-300 mb-3">Problem: Last Minute Panic</h4>
            <div class="text-center mb-4">
                <img src="{{ asset('storage/images/dark woods pro 3.png') }}" alt="Last Minute Panic" class="mx-auto max-md rounded-lg">
            </div>
            <p class="text-yellow-800 dark:text-yellow-300">
                Waits until deadline approaches, Panic Monster appears, rushes through work, ends up in Mixed Feelings Park with sub-standard results.
            </p>
        </div>
    </div>
</section>





{{-- The Struggle Section --}}
<section class="mb-12">
    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">The Inner Struggle & Tipping Point</h2>

    {{-- Critical Entrance Battle --}}
    <div class="bg-purple-50 dark:bg-purple-900/20 rounded-lg p-6 border border-purple-200 dark:border-purple-700 mb-6">
        <h3 class="text-xl font-semibold text-purple-900 dark:text-purple-300 mb-4">The Critical Entrance Battle</h3>
        <div class="text-center mb-4">
            <img src="{{ asset('storage/images/The Critical Entrance.png') }}" alt="Critical Entrance Battle" class="mx-auto max-w-md rounded-lg">
        </div>
        <p class="text-lg text-purple-800 dark:text-purple-300">
            This is where the Instant Gratification Monkey puts up his fiercest resistance. The monkey absolutely <em>hates</em> stopping something fun to start something hard.
        </p>
    </div>

    {{-- Trees in the Dark Woods --}}
    <div class="bg-white dark:bg-gray-800 rounded-lg p-6 border border-gray-200 dark:border-gray-700 mb-6">
        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Bumping Into Trees</h3>
        <div class="flex flex-col md:flex-row items-center gap-6">
            <div class="flex-shrink-0">
                <img src="{{ asset('storage/images/treelarger.jpg') }}" alt="Tree Obstacle" class="w-48 rounded-lg">
            </div>
            <div>
                <p class="text-lg text-gray-700 dark:text-gray-300 mb-3">
                    There will be times when you bump into trees! Maybe the jog is uphill, maybe you need to use an Excel formula you don't know, maybe that song you're writing just isn't coming together.
                </p>
                <p class="text-lg text-gray-700 dark:text-gray-300">
                    This is when the monkey will make his boldest attempt at an escape back to the Dark Playground.
                </p>
            </div>
        </div>
    </div>

    {{-- Pathways Choice --}}
    <div class="bg-gradient-to-r from-blue-50 to-green-50 dark:from-gray-800 dark:to-gray-700 rounded-lg p-6 border border-blue-200 dark:border-blue-700 mb-6">
        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">The Choice at Every Tree</h3>
        <div class="text-center mb-4">
            <img src="{{ asset('storage/images/Pathways.png') }}" alt="Pathways Choice" class="mx-auto max-w-2xl rounded-lg">
        </div>
        <div class="grid md:grid-cols-2 gap-4">
            <div class="bg-red-50 dark:bg-red-900/20 p-4 rounded-lg">
                <h4 class="font-semibold text-red-900 dark:text-red-300 mb-2">Dark Playground Path</h4>
                <p class="text-sm text-red-800 dark:text-red-300">Leads to more misery and self-hatred</p>
            </div>
            <div class="bg-green-50 dark:bg-green-900/20 p-4 rounded-lg">
                <h4 class="font-semibold text-green-900 dark:text-green-300 mb-2">Dark Woods Path</h4>
                <p class="text-sm text-green-800 dark:text-green-300">Leads to happiness and accomplishment</p>
            </div>
        </div>
    </div>

    {{-- High Self-Esteem Banana --}}
    <div class="bg-yellow-50 dark:bg-yellow-900/20 rounded-lg p-6 border border-yellow-200 dark:border-yellow-700 mb-6">
        <h3 class="text-xl font-semibold text-yellow-900 dark:text-yellow-300 mb-4">The High Self-Esteem Banana</h3>
        <div class="text-center mb-4">
            <img src="{{ asset('storage/images/Pathways banana.png') }}" alt="High Self-Esteem Banana" class="mx-auto max-w-md rounded-lg">
        </div>
        <p class="text-lg text-yellow-800 dark:text-yellow-300">
            Making progress on a task produces positive feelings of accomplishment and raises your self-esteem. The monkey gains strength from low self-esteem, but when you feel a jolt of self-satisfaction, the monkey finds a High Self-Esteem Banana that distracts him.
        </p>
    </div>
</section>






{{-- Tipping Point Section --}}
<section class="mb-12">
    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">The Magical Tipping Point</h2>

    {{-- Tipping Point Diagram --}}
    <div class="bg-gradient-to-r from-green-50 to-blue-50 dark:from-green-900/20 dark:to-blue-900/20 rounded-lg p-6 border border-green-200 dark:border-green-700 mb-6">
        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">When Everything Changes</h3>
        <div class="text-center mb-4">
            <img src="{{ asset('storage/images/dark woods tipping point.png') }}" alt="Tipping Point" class="mx-auto max-w-2xl rounded-lg">
        </div>
        <p class="text-lg text-gray-700 dark:text-gray-300 text-center">
            Once you get 2/3 or 3/4 of the way through a task, especially if it's going well, you start to feel great about things and suddenly, the end is in sight.
        </p>
    </div>

    {{-- The Shift --}}
    <div class="bg-white dark:bg-gray-800 rounded-lg p-6 border border-gray-200 dark:border-gray-700 mb-6">
        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">The Monkey's Change of Heart</h3>
        <p class="text-lg text-gray-700 dark:text-gray-300 mb-4">
            The Tipping Point is important because it's not just you who can smell the Happy Playground up ahead - <strong>the monkey can smell it too</strong>.
        </p>
        <p class="text-lg text-gray-700 dark:text-gray-300">
            The monkey doesn't care if his instant gratification comes alongside you or at your expense. Once you hit the Tipping Point, the monkey becomes <strong>more interested in getting to the Happy Playground than the Dark Playground</strong>.
        </p>
    </div>

    {{-- Speeding to Finish --}}
    <div class="bg-blue-50 dark:bg-blue-900/20 rounded-lg p-6 border border-blue-200 dark:border-blue-700 mb-6">
        <h3 class="text-xl font-semibold text-blue-900 dark:text-blue-300 mb-4">Speeding Toward the Finish</h3>
        <div class="text-center mb-4">
            <img src="{{ asset('storage/images/running.png') }}" alt="Speeding to Finish" class="mx-auto max-w-md rounded-lg">
        </div>
        <p class="text-lg text-blue-800 dark:text-blue-300 text-center">
            When this happens, you lose all impulse to procrastinate and now both you and the monkey are speeding toward the finish!
        </p>
    </div>

    {{-- Happy Playground --}}
    <div class="bg-green-50 dark:bg-green-900/20 rounded-lg p-6 border border-green-200 dark:border-green-700 mb-6">
        <h3 class="text-xl font-semibold text-green-900 dark:text-green-300 mb-4">The Happy Playground</h3>
        <div class="text-center mb-4">
            <img src="{{ asset('storage/images/happy playground.png') }}" alt="Happy Playground" class="mx-auto max-w-md rounded-lg">
        </div>
        <p class="text-lg text-green-800 dark:text-green-300">
            Before you know it, you're done, and you're in the Happy Playground. Now, for the first time in a while, you and the monkey are a <strong>team</strong>. You both want to have fun, and it feels great because it's <em>earned</em>.
        </p>
    </div>

    {{-- Flow State --}}
    <div class="bg-purple-50 dark:bg-purple-900/20 rounded-lg p-6 border border-purple-200 dark:border-purple-700">
        <h3 class="text-xl font-semibold text-purple-900 dark:text-purple-300 mb-4">The State of Flow</h3>
        <div class="text-center mb-4">
            <img src="{{ asset('storage/images/flow.png') }}" alt="Flow State" class="mx-auto max-w-md rounded-lg">
        </div>
        <p class="text-lg text-purple-800 dark:text-purple-300 mb-4">
            The other thing that might happen when you pass the Tipping Point is that you might start feeling <em>fantastic</em> about what you're working on, so fantastic that continuing to work sounds like <em>much</em> more fun than stopping to do leisure activities.
        </p>
        <p class="text-lg text-purple-800 dark:text-purple-300">
            You've become obsessed with the task and you lose interest in basically everything else, including food and time - this is called <strong>Flow</strong>. Flow is not only a blissful feeling, it's usually when you do great things.
        </p>
    </div>
</section>






{{-- Practical Strategies Section --}}
<section class="mb-12">
    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">Practical Strategies to Beat Procrastination</h2>

    {{-- Three Key Strategies --}}
    <div class="grid md:grid-cols-3 gap-6 mb-8">
        {{-- Strategy 1 --}}
        <div class="bg-white dark:bg-gray-800 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
            <div class="text-3xl font-bold text-blue-600 dark:text-blue-400 mb-3">1</div>
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Internalize Your Choices</h3>
            <p class="text-gray-700 dark:text-gray-300 mb-4">
                Start by thinking about the terms we've used here. Write them down. Terms help you clarify the reality of the choices you're making.
            </p>
            <ul class="text-sm text-gray-600 dark:text-gray-400 space-y-1">
                <li>Instant Gratification Monkey</li>
                <li>Rational Decision Maker</li>
                <li>Critical Entrance</li>
                <li>Tipping Point</li>
            </ul>
        </div>

        {{-- Strategy 2 --}}
        <div class="bg-white dark:bg-gray-800 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
            <div class="text-3xl font-bold text-green-600 dark:text-green-400 mb-3">2</div>
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Create Methods to Defeat the Monkey</h3>
            <p class="text-gray-700 dark:text-gray-300 mb-4">
                Set up systems and external support to help you make better choices consistently.
            </p>
            <ul class="text-sm text-gray-600 dark:text-gray-400 space-y-1">
                <li>External accountability</li>
                <li>Create Panic Monsters</li>
                <li>Minimize distractions</li>
                <li>Use tools like Trello</li>
            </ul>
        </div>

        {{-- Strategy 3 --}}
        <div class="bg-white dark:bg-gray-800 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
            <div class="text-3xl font-bold text-purple-600 dark:text-purple-400 mb-3">3</div>
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Aim for Slow, Steady Progress</h3>
            <p class="text-gray-700 dark:text-gray-300 mb-4">
                Storylines are rewritten one page at a time. Focus on consistent small improvements rather than overnight transformation.
            </p>
            <ul class="text-sm text-gray-600 dark:text-gray-400 space-y-1">
                <li>Step by step progress</li>
                <li>Stay "in gradient"</li>
                <li>Use inch pebbles</li>
                <li>Celebrate small wins</li>
            </ul>
        </div>
    </div>

    {{-- Gradient Visualization --}}
    <div class="bg-gradient-to-r from-blue-50 to-green-50 dark:from-gray-800 dark:to-gray-700 rounded-lg p-6 border border-blue-200 dark:border-blue-700 mb-8">
        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Staying "In Gradient"</h3>

        <div class="space-y-6">
            {{-- Step by Step --}}
            <div class="text-center">
                <p class="text-lg text-gray-700 dark:text-gray-300 mb-3">The best way is step by step keeping yourself "in gradient"</p>
                <img src="{{ asset('storage/images/stepbystep.png') }}" alt="Step by Step" class="mx-auto max-w-md rounded-lg">
            </div>

            {{-- Too Steep Warning --}}
            <div class="bg-yellow-50 dark:bg-yellow-900/20 rounded-lg p-4">
                <h4 class="font-semibold text-yellow-900 dark:text-yellow-300 mb-2">If you are feeling like this...</h4>
                <div class="text-center mb-3">
                    <img src="{{ asset('storage/images/toosteep.png') }}" alt="Too Steep" class="mx-auto max-w-xs rounded-lg">
                </div>
                <p class="text-yellow-800 dark:text-yellow-300 text-center">
                    ...then possibly milestones are too much and inch pebbles are required!
                </p>
            </div>

            {{-- Inch Pebbles Solution --}}
            <div class="bg-green-50 dark:bg-green-900/20 rounded-lg p-4">
                <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                    <div class="text-center">
                        <p class="font-semibold text-green-900 dark:text-green-300 mb-2">Milestones</p>
                        <img src="{{ asset('storage/images/milestone1.png') }}" alt="Milestones" class="mx-auto max-w-xs rounded-lg">
                    </div>
                    <div class="text-2xl text-green-600 dark:text-green-400">→</div>
                    <div class="text-center">
                        <p class="font-semibold text-green-900 dark:text-green-300 mb-2">Inch Pebbles</p>
                        <img src="{{ asset('storage/images/inchpebbles.png') }}" alt="Inch Pebbles" class="mx-auto max-w-xs rounded-lg">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




{{-- Detailed Study Barriers Section --}}
<section class="mb-12">
    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">Detailed Study Barriers Analysis</h2>

    {{-- Barrier 2: Too Steep Gradient --}}
    <div class="bg-orange-50 dark:bg-orange-900/20 rounded-lg p-6 border border-orange-200 dark:border-orange-700 mb-6">
        <h3 class="text-xl font-semibold text-orange-900 dark:text-orange-300 mb-4 flex items-center">
            <span class="bg-orange-100 dark:bg-orange-900 text-orange-800 dark:text-orange-200 rounded-full w-8 h-8 flex items-center justify-center mr-3">2</span>
            Too Steep a Gradient
        </h3>

        <p class="text-lg text-orange-800 dark:text-orange-300 mb-4">
            One is going ahead to the next step before mastering the previous one. This phenomenon applies especially to doingness, but also to understanding.
        </p>

        <div class="grid md:grid-cols-2 gap-4 mb-4">
            <div class="bg-white dark:bg-gray-800 p-4 rounded-lg">
                <h4 class="font-semibold text-gray-900 dark:text-white mb-2">Symptoms:</h4>
                <ul class="text-sm text-gray-700 dark:text-gray-300 space-y-1">
                    <li class="flex items-start">
                        <svg class="w-4 h-4 text-orange-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                        </svg>
                        Confusion and disorientation
                    </li>
                    <li class="flex items-start">
                        <svg class="w-4 h-4 text-orange-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                        </svg>
                        Being spun around
                    </li>
                    <li class="flex items-start">
                        <svg class="w-4 h-4 text-orange-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                        </svg>
                        Parts seem in random motion
                    </li>
                </ul>
            </div>
            <div class="bg-green-50 dark:bg-green-900/20 p-4 rounded-lg">
                <h4 class="font-semibold text-gray-900 dark:text-white mb-2">Remedy:</h4>
                <ul class="text-sm text-gray-700 dark:text-gray-300 space-y-1">
                    <li class="flex items-start">
                        <svg class="w-4 h-4 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        Put student one step back
                    </li>
                    <li class="flex items-start">
                        <svg class="w-4 h-4 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        Master previous skill level
                    </li>
                    <li class="flex items-start">
                        <svg class="w-4 h-4 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        Break complex actions down
                    </li>
                </ul>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 p-4 rounded-lg">
            <h4 class="font-semibold text-gray-900 dark:text-white mb-2">Example:</h4>
            <p class="text-sm text-gray-700 dark:text-gray-300">
                If we use repairing of motors as an example, the student may have learned how to use wrenches and then start to learn how to take a motor apart. If they find this confusing, chances are they don't know enough about using the wrenches properly.
            </p>
        </div>
    </div>

    {{-- Barrier 3: Misunderstoods --}}
    <div class="bg-red-50 dark:bg-red-900/20 rounded-lg p-6 border border-red-200 dark:border-red-700">
        <h3 class="text-xl font-semibold text-red-900 dark:text-red-300 mb-4 flex items-center">
            <span class="bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-200 rounded-full w-8 h-8 flex items-center justify-center mr-3">3</span>
            Bypassing Misunderstoods
        </h3>

        <p class="text-lg text-red-800 dark:text-red-300 mb-4">
            The third and most important barrier to study is bypassing undefined words or symbols; words or symbols the student has no definition for.
        </p>

        <div class="grid md:grid-cols-2 gap-4 mb-4">
            <div class="bg-white dark:bg-gray-800 p-4 rounded-lg">
                <h4 class="font-semibold text-gray-900 dark:text-white mb-2">Symptoms:</h4>
                <ul class="text-sm text-gray-700 dark:text-gray-300 space-y-1">
                    <li class="flex items-start">
                        <svg class="w-4 h-4 text-red-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                        </svg>
                        Blank or washed out feeling
                    </li>
                    <li class="flex items-start">
                        <svg class="w-4 h-4 text-red-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                        </svg>
                        Sleepiness or falling asleep
                    </li>
                    <li class="flex items-start">
                        <svg class="w-4 h-4 text-red-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                        </svg>
                        Violent disagreement with facts
                    </li>
                </ul>
            </div>
            <div class="bg-green-50 dark:bg-green-900/20 p-4 rounded-lg">
                <h4 class="font-semibold text-gray-900 dark:text-white mb-2">Remedy:</h4>
                <ul class="text-sm text-gray-700 dark:text-gray-300 space-y-1">
                    <li class="flex items-start">
                        <svg class="w-4 h-4 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        Clear misunderstood words
                    </li>
                    <li class="flex items-start">
                        <svg class="w-4 h-4 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        Use Word Clearing methods
                    </li>
                    <li class="flex items-start">
                        <svg class="w-4 h-4 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        Restudy materials properly
                    </li>
                </ul>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 p-4 rounded-lg">
            <h4 class="font-semibold text-gray-900 dark:text-white mb-2">Key Insight:</h4>
            <p class="text-sm text-gray-700 dark:text-gray-300">
                This is the most important barrier. It's what psychologists have been trying to test for years without knowing exactly what it was. It's the definitions of words. Misunderstood words and symbols. That's all it goes back to.
            </p>
        </div>
    </div>
</section>






{{-- Final Summary Section --}}
<section class="mb-12">
    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">Summary & Action Plan</h2>

    {{-- Key Takeaways --}}
    <div class="grid md:grid-cols-2 gap-6 mb-8">
        <div class="bg-white dark:bg-gray-800 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">For Procrastination</h3>
            <ul class="space-y-3 text-gray-700 dark:text-gray-300">
                <li class="flex items-start">
                    <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    <span>Recognize the Instant Gratification Monkey</span>
                </li>
                <li class="flex items-start">
                    <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    <span>Force through the Critical Entrance</span>
                </li>
                <li class="flex items-start">
                    <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    <span>Work toward the Tipping Point</span>
                </li>
                <li class="flex items-start">
                    <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    <span>Enjoy the Happy Playground or Flow</span>
                </li>
            </ul>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">For Effective Studying</h3>
            <ul class="space-y-3 text-gray-700 dark:text-gray-300">
                <li class="flex items-start">
                    <svg class="w-5 h-5 text-blue-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    <span>Ensure adequate "mass" - use visuals and objects</span>
                </li>
                <li class="flex items-start">
                    <svg class="w-5 h-5 text-blue-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    <span>Stay in gradient - master each step before moving on</span>
                </li>
                <li class="flex items-start">
                    <svg class="w-5 h-5 text-blue-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    <span>Clear all misunderstood words immediately</span>
                </li>
                <li class="flex items-start">
                    <svg class="w-5 h-5 text-blue-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    <span>Recognize symptoms of each barrier as they occur</span>
                </li>
            </ul>
        </div>
    </div>

    {{-- Final Encouragement --}}
    <div class="bg-gradient-to-r from-purple-600 to-indigo-700 text-white rounded-lg p-8 text-center">
        <h3 class="text-2xl font-bold mb-4">You Can Do This!</h3>
        <p class="text-xl mb-4">
            Remember that defeating procrastination and learning to study effectively are skills that can be developed.
        </p>
        <p class="text-xl">
            Start with one small change today. Lay one brick. Clear one misunderstood word. Force through one Critical Entrance.
        </p>
        <p class="text-2xl font-bold mt-6">
            The time to start improving is now!
        </p>
    </div>
</section>

{{-- Final Navigation --}}
<div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Quick Navigation</h3>
    <div class="flex flex-wrap gap-4 justify-center">
        <a href="#home" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white rounded-lg transition-colors">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
            </svg>
            Back to Top
        </a>
        <a href="#studyloggedin" class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 dark:bg-green-500 dark:hover:bg-green-600 text-white rounded-lg transition-colors">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
            </svg>
            Study Methods
        </a>
        <a href="#beatit" class="inline-flex items-center px-4 py-2 bg-purple-600 hover:bg-purple-700 dark:bg-purple-500 dark:hover:bg-purple-600 text-white rounded-lg transition-colors">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
            </svg>
            Beat Procrastination
        </a>
    </div>
</div>






{{-- JavaScript for Interactive Elements --}}
<script>
    // Wait for DOM to be fully loaded
    document.addEventListener('DOMContentLoaded', function() {

        // ============================================
        // ACCORDION FUNCTIONALITY
        // ============================================

        // Initialize all accordions
        function initAccordions() {
            const accordionHeaders = document.querySelectorAll('.accordion-header');

            accordionHeaders.forEach(header => {
                header.addEventListener('click', function() {
                    const isActive = this.classList.contains('active');
                    const content = this.nextElementSibling;

                    // Close all other accordion items
                    closeAllAccordions();

                    // If this one wasn't active, open it
                    if (!isActive) {
                        this.classList.add('active');
                        content.classList.remove('hidden');
                        content.style.maxHeight = content.scrollHeight + 'px';
                    }
                });
            });

            // Open first accordion by default
            if (accordionHeaders.length > 0) {
                accordionHeaders[0].classList.add('active');
                const firstContent = accordionHeaders[0].nextElementSibling;
                firstContent.classList.remove('hidden');
                firstContent.style.maxHeight = firstContent.scrollHeight + 'px';
            }
        }

        function closeAllAccordions() {
            const allHeaders = document.querySelectorAll('.accordion-header');
            const allContents = document.querySelectorAll('.accordion-content');

            allHeaders.forEach(header => {
                header.classList.remove('active');
            });

            allContents.forEach(content => {
                content.classList.add('hidden');
                content.style.maxHeight = null;
            });
        }

        // ============================================
        // KEY TERMS TOGGLE FUNCTIONALITY
        // ============================================

        function initKeyTerms() {
            const termButtons = document.querySelectorAll('.term-toggle');

            termButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const content = this.parentElement.nextElementSibling;
                    const isHidden = content.classList.contains('hidden');

                    // Toggle icon
                    const icon = this.querySelector('svg');
                    if (isHidden) {
                        content.classList.remove('hidden');
                        icon.style.transform = 'rotate(180deg)';
                    } else {
                        content.classList.add('hidden');
                        icon.style.transform = 'rotate(0deg)';
                    }
                });
            });
        }

        // ============================================
        // SMOOTH SCROLLING FOR ANCHOR LINKS
        // ============================================

        function initSmoothScroll() {
            const anchorLinks = document.querySelectorAll('a[href^="#"]');

            anchorLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();

                    const targetId = this.getAttribute('href');
                    if (targetId === '#') return;

                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        const offsetTop = targetElement.offsetTop - 100; // Adjust for fixed header

                        window.scrollTo({
                            top: offsetTop,
                            behavior: 'smooth'
                        });

                        // Update URL without jumping
                        history.pushState(null, null, targetId);
                    }
                });
            });
        }

        // ============================================
        // LAZY LOADING FOR IMAGES
        // ============================================

        function initLazyLoading() {
            const images = document.querySelectorAll('img');

            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src || img.src;
                        img.classList.remove('lazy');
                        imageObserver.unobserve(img);
                    }
                });
            });

            images.forEach(img => {
                // Add lazy loading to images not in viewport initially
                if (!img.classList.contains('eager')) {
                    imageObserver.observe(img);
                }
            });
        }

        // ============================================
        // PROGRESS TRACKING
        // ============================================

        function initProgressTracking() {
            const progressBar = document.createElement('div');
            progressBar.className = 'fixed top-0 left-0 h-1 bg-blue-600 z-50';
            progressBar.style.width = '0%';
            document.body.appendChild(progressBar);

            window.addEventListener('scroll', function() {
                const windowHeight = window.innerHeight;
                const documentHeight = document.documentElement.scrollHeight - windowHeight;
                const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                const scrollPercent = (scrollTop / documentHeight) * 100;

                progressBar.style.width = scrollPercent + '%';
            });
        }

        // ============================================
        // DARK MODE PERSISTENCE
        // ============================================

        function initDarkModePersistence() {
            // Check for saved theme preference or default to system preference
            const savedTheme = localStorage.getItem('theme');
            const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

            if (savedTheme === 'dark' || (!savedTheme && systemPrefersDark)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }

            // Listen for system theme changes
            window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
                if (!localStorage.getItem('theme')) {
                    if (e.matches) {
                        document.documentElement.classList.add('dark');
                    } else {
                        document.documentElement.classList.remove('dark');
                    }
                }
            });
        }

        // ============================================
        // COPY TO CLIPBOARD FOR CODE SNIPPETS
        // ============================================

        function initCopyToClipboard() {
            const copyButtons = document.querySelectorAll('.copy-btn');

            copyButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const codeBlock = this.parentElement.querySelector('code');
                    const textToCopy = codeBlock.textContent;

                    navigator.clipboard.writeText(textToCopy).then(() => {
                        // Visual feedback
                        const originalText = this.innerHTML;
                        this.innerHTML = '✓ Copied!';
                        this.classList.add('bg-green-600');

                        setTimeout(() => {
                            this.innerHTML = originalText;
                            this.classList.remove('bg-green-600');
                        }, 2000);
                    }).catch(err => {
                        console.error('Failed to copy: ', err);
                    });
                });
            });
        }

        // ============================================
        // INITIALIZE EVERYTHING
        // ============================================

        function initAll() {
            initAccordions();
            initKeyTerms();
            initSmoothScroll();
            initLazyLoading();
            initProgressTracking();
            initDarkModePersistence();
            initCopyToClipboard();

            console.log('Study Methods page initialized successfully!');
        }

        // Start initialization
        initAll();

    });

    // ============================================
    // UTILITY FUNCTIONS
    // ============================================

    // Debounce function for scroll events
    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }

    // Throttle function for resize events
    function throttle(func, limit) {
        let inThrottle;
        return function() {
            const args = arguments;
            const context = this;
            if (!inThrottle) {
                func.apply(context, args);
                inThrottle = true;
                setTimeout(() => inThrottle = false, limit);
            }
        }
    }
</script>

<style>
    /* Additional CSS for smooth transitions */
    .accordion-content {
        transition: max-height 0.3s ease-out, opacity 0.3s ease;
        overflow: hidden;
    }

    .term-toggle svg {
        transition: transform 0.3s ease;
    }

    /* Progress bar transition */
    .fixed.h-1 {
        transition: width 0.1s ease;
    }

    /* Custom scrollbar for better UX */
    ::-webkit-scrollbar {
        width: 8px;
    }

    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    .dark ::-webkit-scrollbar-track {
        background: #374151;
    }

    ::-webkit-scrollbar-thumb {
        background: #c1c1c1;
        border-radius: 4px;
    }

    .dark ::-webkit-scrollbar-thumb {
        background: #6b7280;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #a1a1a1;
    }

    .dark ::-webkit-scrollbar-thumb:hover {
        background: #9ca3af;
    }
</style>
</section>