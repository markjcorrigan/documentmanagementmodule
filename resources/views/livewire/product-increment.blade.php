<div>
    <div class="max-w-7xl mx-auto px-4 py-8">
        <h1 class="text-4xl font-semibold text-gray-900 dark:text-white mb-8">
            The Product Increment
        </h1>

        <div class="space-y-6">
            {{-- Header Section --}}
            <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">
                    The Product Increment: The art of slicing sprint delivery for most value now!
                </h2>

                <hr class="border-gray-300 dark:border-gray-600 mb-6">

                <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-6">
                    The goal is to reduce the size of the increment to smallest number (chunk of valuable work).<br>
                    This will ensure that focused value can be delivered rapidly to the Product Owner by the scrum team within
                    each sprint, and, trying to do too much, will not be carried over.
                </p>

                {{-- Main Image --}}
                <div class="bg-white dark:bg-white p-4 rounded-lg border border-gray-300 dark:border-gray-400 shadow-sm text-center">
                    <img alt="Product Increment"
                         class="img-fluid mx-auto rounded-lg"
                         src="{{ asset('storage/images/productincrement.jpg') }}">
                </div>

                {{-- Secret Section --}}
                <div class="mt-6 p-4 bg-blue-50 dark:bg-blue-900/20 rounded-lg border border-blue-200 dark:border-blue-800">
                    <h6 class="text-lg font-semibold text-blue-900 dark:text-blue-300 text-center">
                        Here is the secret: Correct "Definition of Done" and use of the Product Increment (to focus effort towards demonstrating (a slice) of valuable working software to the Product Owner) will help the team
                        stay in gradient (achieve <a href="/burndown" class="text-blue-700 dark:text-blue-400 underline hover:text-blue-900 dark:hover:text-blue-300">sprint burndown</a>), reduce pressure on the team and will increase team production!
                    </h6>
                </div>
            </div>

            {{-- Product Owner Section --}}
            <div class="bg-white dark:bg-gray-800 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                <div class="text-center mb-6">
                    <button wire:click="toggleProductOwner"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors">
                        The Product Owners role to achieve value
                    </button>
                </div>

                {{-- Product Owner Collapsible Content --}}
                @if($showProductOwner)
                    <div class="mt-6 animate-fade-in">
                        <div class="bg-gradient-to-r from-green-50 to-blue-50 dark:from-gray-800 dark:to-gray-700 rounded-lg border border-green-200 dark:border-green-800">
                            {{-- Card Header --}}
                            <div class="bg-green-600 dark:bg-green-700 rounded-t-lg p-4">
                                <h3 class="text-xl font-semibold text-white text-center">
                                    The slide below explains the crucial importance of the Product Owner.<br>
                                    Can you see it?
                                </h3>
                            </div>

                            {{-- Card Body --}}
                            <div class="p-6 text-center space-y-4">
                                <a href="/cmmidevdash" title="Find PP and PMC on the CMMi Dashboard by clicking this image now!">
                                    <div class="bg-white dark:bg-white p-4 rounded-lg border border-gray-300 dark:border-gray-400 shadow-sm">
                                        <img alt="sprint with PP and PMC"
                                             class="img-fluid mx-auto rounded-lg"
                                             src="{{ asset('storage/images/sprintmethodwithpppmc.jpg') }}">
                                    </div>
                                </a>

                                <p class="text-sm text-gray-600 dark:text-gray-400">
                                    If interested <a href="/pmway" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">Click here</a> to see where PP (Project Planning) and PMC (Project Monitoring and Control) are found <br>
                                    on the PMBOK 6 Dashboard?
                                </p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            {{-- Gradient Section --}}
            <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                <div class="text-center mb-6">
                    <button wire:click="toggleGradient"
                            class="bg-purple-600 hover:bg-purple-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors text-center">
                        More information on "In" or "Out" gradient <br>
                        and "Increasing" or "Decreasing" production stats
                    </button>
                </div>

                {{-- Gradient Collapsible Content --}}
                @if($showGradient)
                    <div class="mt-6 animate-fade-in">
                        <div class="bg-gradient-to-r from-purple-50 to-indigo-50 dark:from-gray-800 dark:to-gray-700 rounded-lg border border-purple-200 dark:border-purple-800">
                            {{-- Card Header --}}
                            <div class="bg-purple-600 dark:bg-purple-700 rounded-t-lg p-4">
                                <h3 class="text-xl font-semibold text-white text-center">
                                    Being "In" or "Out" Gradient is about managing the Product Increments (Scope) for the sprint. <br>
                                    Your Production Stats (Demonstration of Done as Working Software to the Product Owner) will reflect how capable you are at doing this.<br>
                                    The Sprint Burndown is used to get a handle on and to better manage this sprint by sprint.
                                </h3>
                            </div>

                            {{-- Card Body --}}
                            <div class="p-6 text-center space-y-6">
                                {{-- Focus Image --}}
                                <div class="bg-white dark:bg-white p-4 rounded-lg border border-gray-300 dark:border-gray-400 shadow-sm">
                                    <img alt="Focus"
                                         class="img-fluid mx-auto rounded-lg"
                                         src="{{ asset('storage/images/focus.jpg') }}">
                                </div>

                                <p class="text-lg font-semibold text-gray-900 dark:text-white">
                                    See if you can get these concepts below:
                                </p>

                                {{-- Concept Images --}}
                                <div class="space-y-4">
                                    <div class="bg-white dark:bg-white p-4 rounded-lg border border-gray-300 dark:border-gray-400 shadow-sm">
                                        <img alt="Increase Decrease"
                                             class="img-fluid mx-auto rounded-lg"
                                             src="{{ asset('storage/images/increase_decrease.jpg') }}">
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div class="bg-white dark:bg-white p-4 rounded-lg border border-gray-300 dark:border-gray-400 shadow-sm">
                                            <img alt="Step by Step"
                                                 class="img-fluid mx-auto rounded-lg"
                                                 src="{{ asset('storage/images/stepbystep.png') }}">
                                        </div>
                                        <div class="bg-white dark:bg-white p-4 rounded-lg border border-gray-300 dark:border-gray-400 shadow-sm">
                                            <img alt="Too Steep"
                                                 class="img-fluid mx-auto rounded-lg"
                                                 src="{{ asset('storage/images/toosteep.png') }}">
                                        </div>
                                    </div>
                                </div>

                                {{-- Burndown Link --}}
                                <div class="p-4 bg-yellow-50 dark:bg-yellow-900/20 rounded-lg border border-yellow-200 dark:border-yellow-800">
                                    <p class="text-lg font-semibold text-yellow-900 dark:text-yellow-300">
                                        <a href="/burndown" class="text-yellow-700 dark:text-yellow-400 underline hover:text-yellow-900 dark:hover:text-yellow-300">
                                            Use the burndown chart to get a handle on <br>
                                            (towards improving / stabilizing) <br>
                                            your team production stats (sprint by sprint)
                                        </a>!
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
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