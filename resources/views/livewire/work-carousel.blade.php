<div class="container mx-auto py-6 px-4">

    <h3 class="text-2xl font-bold text-blue-600 mb-2">Mark Corrigan's Work Experience</h3>
    <h6 class="text-gray-500 mb-6">
        Click through each role to see more details about my experience
    </h6>

    <div
        x-data="{
            jobs: {{ Js::from($jobs) }},
            selected: 0,
            nextJob() {
                const len = Object.values(this.jobs).length;
                if (this.selected < len - 1) this.selected++;
            },
            previousJob() {
                if (this.selected > 0) this.selected--;
            },
            currentJob() {
                const reversedJobs = Object.values(this.jobs).reverse();
                return reversedJobs[this.selected];
            }
        }"
        class="flex flex-col items-center gap-6"
    >

        <!-- Dots -->
        <div class="flex gap-2 mt-2">
            <template x-for="(job, index) in Object.values(jobs).reverse()" :key="index">
                <span
                    x-on:click="selected = index"
                    x-bind:class="{'bg-blue-600 dark:bg-amber-600': index === selected, 'bg-gray-300 dark:bg-gray-500': index !== selected}"
                    class="w-3 h-3 rounded-full cursor-pointer transition-all"
                ></span>
            </template>
        </div>

        <!-- Navigation Buttons (now under dots) -->
        <div class="flex gap-4 mt-2">
            <button
                x-on:click="previousJob()"
                class="px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded hover:bg-gray-300 dark:hover:bg-gray-600 transition"
            >
                &lt; Earlier Jobs
            </button>
            <button
                x-on:click="nextJob()"
                class="px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded hover:bg-gray-300 dark:hover:bg-gray-600 transition"
            >
                Later Jobs &gt;
            </button>
        </div>

        <!-- Job Card -->
        <div class="w-full md:w-3/4 bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-xl shadow-lg p-6 transition-all duration-500 transform hover:scale-105 min-h-[450px] flex flex-col justify-between">

            <div x-show="true"
                 x-transition:enter="transition-opacity duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition-opacity duration-300"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="flex flex-col md:flex-row md:justify-between md:items-start gap-4 h-full overflow-y-auto"
            >
                <!-- Left: Job info -->
                <div class="md:w-1/3">
                    <h4 class="text-xl font-semibold text-gray-800 dark:text-gray-200" x-text="currentJob().title"></h4>
                    <h5 class="text-md font-medium text-gray-600 dark:text-gray-400" x-text="currentJob().company"></h5>
                    <p class="text-gray-500 dark:text-gray-400 text-sm mt-1" x-text="currentJob().location"></p>
                    <p class="text-gray-500 dark:text-gray-400 text-sm" x-text="currentJob().from + ' - ' + currentJob().to"></p>
                </div>

                <!-- Right: HTML description -->
                <div class="md:w-2/3 text-gray-700 dark:text-gray-300 mt-4 md:mt-0 overflow-y-auto"
                     x-html="currentJob().description">
                </div>
            </div>
        </div>

    </div>
</div>
