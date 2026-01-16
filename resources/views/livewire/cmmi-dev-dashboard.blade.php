{{-- resources/views/livewire/cmmi-dev-dash.blade.php --}}
<div>
    <div class="max-w-7xl mx-auto px-4 py-8">
        <h1 class="text-4xl font-semibold text-gray-900 dark:text-white mb-8">
            CMMi for Development: Processes
        </h1>

        <div class="space-y-6">
            {{-- Introduction Section --}}
            <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-4">
                    Can you see that the PMBOK processes are found mostly at Maturity Level (ML) 2 (with a few on Level 3 and above).
                </p>

                {{-- Commented out paragraphs --}}
                {{-- <p class="text-lg text-gray-600 dark:text-gray-400 mb-4">
                    Also see that the <a href="/landscape" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">Standards / Frameworks landscape</a>: Software Engineering, DevOps, KanBan, ITIL, CM, Traditional & Agile Project Management Process, Cobit and others are fundamentally all focused on removing constraints between ML2 processes PP and PMC <a href="/home/vmodel" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">as you improve between baselines.</a>
                </p>

                <p class="text-lg text-gray-600 dark:text-gray-400">
                    To illustrate this point for Agile Project Management <a href="/scrum" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">check out PP and PMC for Scrum here.</a>
                </p> --}}
            </div>

            {{-- Divider --}}
            <hr class="border-gray-300 dark:border-gray-600">

            {{-- Definitions Section --}}
            <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">
                    CMMi Development Terminology
                </h2>

                <div class="space-y-4">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                            <span class="text-blue-600 dark:text-blue-400">Category:</span>
                        </h3>
                        <p class="text-gray-700 dark:text-gray-300">
                            Logical grouping of Process Areas I.e. Project Management, Engineering, Support etc.
                        </p>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                            <span class="text-blue-600 dark:text-blue-400">PA or Process Area:</span>
                        </h3>
                        <p class="text-gray-700 dark:text-gray-300">
                            A Process: is a set of activities, methods, practices, and transformations that people use to develop and maintain systems and associated products.
                        </p>
                        <p class="text-gray-600 dark:text-gray-400 mt-2">
                            There are 22 processes in CMMi Development 1.3 which form a cluster of related practices in an area that, when performed collectively, satisfy a set of goals considered important for making significant improvement in that area.
                        </p>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                            <span class="text-green-600 dark:text-green-400">ML or Maturity level:</span>
                        </h3>
                        <p class="text-gray-700 dark:text-gray-300">
                            Degree of process improvement across a predefined set of process areas in which all goals within the set are attained.
                        </p>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                            <span class="text-purple-600 dark:text-purple-400">SG or Specific Goal:</span>
                        </h3>
                        <p class="text-gray-700 dark:text-gray-300">
                            SG's apply to a process area and address the unique characteristics that describe what must be implemented to satisfy the process area. Specific goals are required model components and are used in appraisals to help determine whether a process area is satisfied.
                        </p>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                            <span class="text-orange-600 dark:text-orange-400">SP or Specific Practice:</span>
                        </h3>
                        <p class="text-gray-700 dark:text-gray-300">
                            SP's are an activity that is considered important in achieving the associated specific goal. The specific practices describe the activities expected to result in achievement of the specific goals of a process area. Specific practices are expected model components.
                        </p>
                    </div>
                </div>
            </div>

            {{-- CMMi Dashboard Image --}}
            <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 border border-gray-200 dark:border-gray-700 text-center">
                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">
                    CMMi Development 1.3 Dashboard
                </h2>

                <div class="bg-white dark:bg-white p-4 rounded-lg border border-gray-300 dark:border-gray-400 shadow-sm">
                    <img class="img-fluid mx-auto rounded-lg"
                         src="{{ asset('storage/images/cmmi-dev1.png') }}"
                         alt="CMMi-Dev1.3 dashboard">
                    {{-- usemap="#ImgMap0" --}}
                </div>

                {{-- Image Map (commented out) --}}
                {{-- <map name="ImgMap0">
                    <area coords="63, 1192, 470, 1211" href="/cmmidev/pp#sp1.3" shape="rect" >
                    <area coords="63, 1264, 471, 1285" href="/cmmidev/pp#sp2.2" shape="rect" >
                    <area coords="66, 1156, 471, 1177" href="/cmmidev/pp#sp1.1" shape="rect" >
                </map> --}}

            </div>

            {{-- CMMi Modules Image (commented out) --}}
            {{-- <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6 text-center">
                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">
                    CMMi Development Modules
                </h2>

                <div class="bg-white dark:bg-white p-4 rounded-lg border border-gray-300 dark:border-gray-400 shadow-sm">
                    <img class="img-fluid mx-auto rounded-lg"
                         src="{{ asset('storage/images/cmmimods.png') }}"
                         alt="CMMi Modules"
                         usemap="#ImgMap1">
                </div>

                <map name="ImgMap1">
                    <area alt="" coords="102, 10, 82, 79, 132, 27" href="cmmidev/module%201" shape="poly" >
                    <area alt="" coords="134, 27, 84, 80, 150, 59" href="cmmidev/module%202" shape="poly" >
                    <area alt="" coords="149, 62, 84, 79, 149, 96" href="cmmidev/module%203" shape="poly" >
                    <area alt="" coords="149, 100, 88, 80, 130, 126" href="cmmidev/module%204" shape="poly" >
                    <area alt="" coords="129, 127, 89, 80, 99, 144" href="cmmidev/module%205" shape="poly" >
                    <area alt="" coords="102, 144, 86, 78, 62, 144, 101, 148" href="cmmidev/module%206" shape="poly" >
                    <area alt="" coords="59, 148, 84, 77, 32, 129" href="cmmidev/module%207" shape="poly" >
                    <area alt="" coords="85, 78, 33, 130, 10, 100" href="cmmidev/module%208" shape="poly" >
                    <area alt="" coords="80, 79, 11, 99, 8, 61" href="cmmidev/module%209" shape="poly" >
                    <area alt="" coords="84, 78, 9, 60, 28, 23, 87, 79, 74, 77, 69, 72, 67, 75" href="cmmidev/module%2010" shape="poly" >
                    <area alt="" coords="82, 74, 30, 23, 60, 8" href="cmmidev/module%2011" shape="poly" >
                    <area alt="" coords="83, 73, 61, 7, 103, 9, 88, 68, 82, 65" href="cmmidev/module%2012" shape="poly" >
                </map>
            </div> --}}

            {{-- Quick Links Section (commented out) --}}
            {{-- <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6">
                <h3 class="text-xl font-semibold text-blue-900 dark:text-blue-300 mb-4">
                    Explore CMMi Development Processes
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <a href="/v-model"
                       class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-lg p-4 transition-colors">
                        <h4 class="font-semibold text-gray-900 dark:text-white mb-2">V Model</h4>
                        <p class="text-gray-600 dark:text-gray-400 text-sm">
                            Learn about bidirectional traceability and verification/validation processes
                        </p>
                    </a>

                    <a href="/landscape"
                       class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-lg p-4 transition-colors">
                        <h4 class="font-semibold text-gray-900 dark:text-white mb-2">Standards Landscape</h4>
                        <p class="text-gray-600 dark:text-gray-400 text-sm">
                            Explore how various frameworks integrate with CMMi processes
                        </p>
                    </a>
                </div>
            </div> --}}
        </div>
    </div>
</div>