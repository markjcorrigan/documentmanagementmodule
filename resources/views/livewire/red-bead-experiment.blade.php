<div>
    <div class="max-w-6xl mx-auto px-4 py-8">
        <!-- Header Section -->
        <div class="text-center mb-8">
            <h1 class="text-4xl font-semibold text-gray-900 dark:text-white mb-4">
                W. Edwards Deming's Red Bead Experiment
            </h1>
            <p class="text-xl text-gray-700 dark:text-gray-300">
                Moving towards the 14 Observations for Management
            </p>
        </div>


        <hr class="border-gray-200 dark:border-gray-700 mb-8">


        <!-- Introduction Section -->
        <div class="grid grid-cols-1 lg:grid-cols-1 gap-8 mb-8">
            <div>
                <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-4">
                        <strong>W. Edwards Deming suggested that as much as 94% of the cost of quality is management's problem and responsibility.</strong>
                    </p>
                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">
                        Once it has hit the floor, the worker level, the workers will have little ability and control to improve anything.
                    </p>
                </div>

                <div class="mt-6">
                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-4">
                        The 14 Observations for Management (below) is how you as the Executive Action Team (EAT TEAM) can remove (EAT) the Red Beads. </p>
                    <div>
                        <img
                                alt="red beads out"
                                src="{{ asset('storage/images/pacman.png') }}"
                                title="Gobble up the red beads"
                                class="w-full h-auto max-w-xs rounded-lg">
                    </div>

                </div>
            </div>


        </div>

        <hr class="border-gray-200 dark:border-gray-700 mb-8">

        <!-- Main Content -->
        <div class="space-y-8">
            <!-- Experiment Description -->
            <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-6">
                    Dr. Deming used the Red Bead Experiment to clearly and dramatically illustrate several points about poor management practices.
                    This includes the fallacy of rating people and ranking them in order of performance, based on previous performance.
                </p>

                <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-6">
                    The experiment (actually a management game that illustrates the concept) uses a container of White and Red beads as shown in the image below.
                    People in the experiment (staff) who play the game are asked to remove only the red beads with a special paddle with holes in it.
                    The white beads in the bucket symbolize the good things that we experience each day (good processes) as we do our work and the red beads symbolize the problems or bad things
                    (inefficient processes, problematic technology etc.) that we experience.
                </p>

                <!-- Interactive Image -->
                <div class="text-center mt-8">
                    <p class="text-lg text-gray-600 dark:text-gray-400 mb-4 italic">
                        Hover your mouse over this slide to get the point!
                    </p>
                    <div class="max-w-2xl mx-auto bg-white dark:bg-white p-4 rounded-lg border border-gray-300 dark:border-gray-400 shadow-sm">
                        <img
                                class="w-full h-auto rounded-lg cursor-pointer transition-opacity duration-300"
                                src="{{ asset('storage/images/peopleprocesstechbeads.jpg') }}"
                                onmouseover="this.src='{{ asset('storage/images/peopleprocessbottomline.png') }}'"
                                onmouseout="this.src='{{ asset('storage/images/peopleprocesstechbeads.jpg') }}'"
                                alt="People Process Technology - Red Beads">
                    </div>
                </div>

                <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-6">
                    The Red Bead Experiment uses statistical theory to show that even though a "willing worker" wants to do a good job,
                    their success is directly tied to and limited by the nature of the system they are working within.
                    <strong>Real and sustainable improvement on the part of the willing worker is achieved only when management is able to improve the system.</strong>
                </p>

            
            </div>

            <!-- Collapsible Sections -->
            <div class="space-y-6">
                <!-- Lessons Learned -->
                <div class="bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
                    <button
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-4 px-6 text-xl transition-colors text-center"
                            type="button"
                            wire:click="$toggle('showLessons')">
                        Lessons Learned from the Red Bead Experiment
                    </button>

                    @if($showLessons)
                        <div class="p-6">
                            <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
                                <div class="bg-gray-100 dark:bg-gray-700 px-6 py-4 border-b border-gray-200 dark:border-gray-600">
                                    <h5 class="text-xl font-semibold text-gray-900 dark:text-white text-center">
                                        Here are the bottom line lesson that I learned from the Red Bead Experiment:
                                    </h5>
                                </div>
                                <div class="p-6">
                                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-6">
                                         <strong class="text-gray-900 dark:text-white">
                                            Management must simply take the red beads out of the tray (or container)!
                                        </strong>
                                    </p>

                                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-6">
                                        If management are not striving to do this on a daily basis (through process definition that leads to quality production improvements
                                        that assist their loyal and motivated staff to do their clearly defined jobs well, 
                                        then management are not doing their jobs!  Remember that all staff are looking for is job satisfaction.
                                    </p>

                                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-6">
                                        This will ensure that a drive towards ZERO Defects is attainable!
                                        In business, management must create an environment (through defined processes that work and help the business)
                                        where staff are empowered to do their work such that they obtain satisfaction from their improved quality production efforts.
                                    </p>

                                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-6">
                                        I.e. they (management) must strive to find ways to totally remove the red beads from the tray (defects in their production process)
                                        as this is the only way to ensure staff can do their jobs well, thus also ensuring a collective move towards zero defects!
                                    </p>

                                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-8">
                                        Note that W. Edwards Deming suggest that as much as 85% of the cost of quality is management's problem and responsibility!
                                        Once the quality problem hits the floor, or worker level, workers will have little to no ability (means / control) to solve the problem!
                                    </p>

                                    <div class="text-center">
                                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-4">
                                            Ultimately only the Executive can remove the red beads!
                                        </p>
                                        <div class="bg-white dark:bg-white p-4 rounded-lg border border-gray-300 dark:border-gray-400 shadow-sm inline-block">
                                            <img
                                                    alt="Red bead removed"
                                                    class="w-full h-auto max-w-md rounded-lg"
                                                    src="{{ asset('storage/images/redbeadremoved.png') }}">
                                        </div>
                                   
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Detailed Experiment -->
                <div class="bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
                    <button
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-4 px-6 text-xl transition-colors text-center"
                            type="button"
                            wire:click="$toggle('showDetailedExperiment')">
                        The Red Bead experiment described in detail
                    </button>

                    @if($showDetailedExperiment)
                        <div class="p-6">
                            <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
                                <div class="bg-gray-100 dark:bg-gray-700 px-6 py-4 border-b border-gray-200 dark:border-gray-600">
                                    <h5 class="text-xl font-semibold text-gray-900 dark:text-white text-center">
                                        If you understand the above then this panel is background on the experiment itself!
                                    </h5>
                                </div>
                                <div class="p-6 space-y-6">
                                    <!-- Detailed content would go here -->
                                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">
                                        The Red Bead Experiment is a clever demonstration of the futility of most management systems for improving quality.<br>In fact, Dr. Deming often refers to it as a stupid experiment that you'll never forget. <br>
                                        <br>
                                        The experiment is described below in a format similar to Dr. Deming's presentation in his seminars. </p>
                                        <!-- Rest of the detailed content -->

                                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">The experiment starts with a sampling device (a bowl of beads and a special
                                        paddle with holes in them to collect the beads from the bowl) that has a composition of 80% white and 20% colored beads, normally red beads, hence the name "red bead experiment".&nbsp;
                                        Note:&nbsp; When this experiment was first shown it used a ping pong paddle with
                                        holes drilled into it and these were used to scoop out the beads from a bowl.&nbsp;<br><br>
                                        <img alt="" class="img-fluid" src="{{ asset('storage/images/pingpongpaddleswithholes.jpg') }}" ><br>
                                        Later sophisticated push button bead drop sampling devices were used.</p>
                                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">While Dr. Deming used 80% white beads and 20% red, you will find this experiment done with 80% white and 20% colored. The colored beads add another dimension to the demonstration. This will be become self evident as the script is read.</p>
                                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">The fact that the some sampling devices have various colored beads instead of all red is of no consequence, the experiment works just as well. <br>
                                        It is necessary however to have 20% colored beads to go along with the text of this demonstration. </p>
                                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300"><strong>The objective of the bead factory in the demonstration is to make white beads. </strong> </p>
                                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300"><strong>The customer will not accept anything but white beads, all colored beads are defective. </strong><br>
                                        <br>
                                        The colored beads themselves represent defects in an organization's business processes. <br>
                                        They represent a faulty machine or tool, a bad engineering design, a defective part, a procedural flaw, an unreasonable change request, ... all the things that can and do go wrong with a process. Supervisors and management control the number of red bead in the processes that are given to the workers. </p>
                                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">Now. let's proceed assuming that management has developed and purchased the white bead process for the workers of this experiment.</p>
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">The Experiment</h3>
                                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">The instructor should take on the role of the department foreman or department supervisor and first of all selects his work team. Realizing that one of the objectives of this demonstration is to point out management prejudices, the instructor can use whatever slogans or phrases he believes fit his particular audience. It many start like the following:<br>
                                    </p>
                                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">Foreman: Okay I need eight bodies. (Pointing to people he wants to select) Can you count? Okay you're hired . Can you push buttons? Okay you're hired. You don't have to think, you just have to do what I tell you. You'll be on an apprenticeship for a while and if you work out we'll hire you. We believe in high quality. We need good people.

                                        So the process goes until all nine people are selected. The roles they will perform are as follows:<br>
                                    </p>
                                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">Foreman (the instructor)<br>
                                    </p>

                                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">Workers 1 - 6 (assuming fictitious names for this description):<br>
                                        <br>
                                        &nbsp;&nbsp;&nbsp; <strong>Bob, Dorothy, Henry, Calvin, Carol, Judy</strong></p>
                                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">And Inspectors:</p>
                                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">&nbsp;&nbsp;&nbsp; <strong>Inspector 1 - Ron</strong></p>
                                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">&nbsp;&nbsp;&nbsp; <strong>Inspector 2 - Marty</strong></p>
                                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">&nbsp;&nbsp;&nbsp; <strong>Chief Inspector - Darwin</strong></p>
                                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">What will happen is that each worker will take turns drawing a sample of 50 from the sampling device. </p>
                                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">If you are using a sampling bowl then use the 50 hole paddle. If you are using a sampling box then designate the 50 hole pattern that you will use. This can be done verbally, mark on the face of the box with a water based transparency marker, or mask off the excess holes with masking tape, etc. </p>
                                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">Once a sample is drawn, then it will be checked by both inspectors (this high quality company has 200% inspection) who will independently write down the number of colored beads they count and show it to the chief inspector. </p>
                                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">The chief inspector will compare the counts, record the information on a data sheet and a graph, and then announce the number of colored beads drawn in the sample. </p>
                                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">The data sheet will show the names of the six workers and how many colored beads they each draw for the four days of the experiment. The data sheet will look like the sample data shown in figure 1. </p>
                                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">The graph will have six plot points for each day for four days and look like the graph in figure 2. </p>
                                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">These graphs can be set up on chart pads or overhead transparencies.</p>
                                    <h1 class="text-3xl font-semibold text-gray-900 dark:text-white mb-8">Red Bead Experiment Data: Output per Worker</h1>
                                    <p>Or you can watch the video's at the bottom of the page.</p>
                                    
                                    
                                    
                                    
                                

                                    <!-- Data Table -->
                                    {{-- resources/views/livewire/worker-productivity.blade.php --}}
                                    <div>
                                        <div class="max-w-6xl mx-auto px-4 py-8">
                                            <h1 class="text-3xl font-semibold text-gray-900 dark:text-white mb-8">
                                                Worker Productivity Analysis
                                            </h1>

                                            <div class="space-y-6">
                                                {{-- Figure 1 Label --}}
                                                <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                                                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-4">
                                                        <strong>Figure 1.</strong> Worker Productivity Data
                                                    </p>

                                                    {{-- Desktop Table View --}}
                                                    <div class="hidden md:block overflow-x-auto">
                                                        <table class="w-full border-collapse">
                                                            <thead class="bg-gray-100 dark:bg-gray-800">
                                                            <tr>
                                                                <th class="px-6 py-4 text-left text-base font-semibold text-gray-900 dark:text-white border border-gray-300 dark:border-gray-600">
                                                                    Worker Day
                                                                </th>
                                                                <th class="px-6 py-4 text-center text-base font-semibold text-gray-900 dark:text-white border border-gray-300 dark:border-gray-600">
                                                                    Day 1
                                                                </th>
                                                                <th class="px-6 py-4 text-center text-base font-semibold text-gray-900 dark:text-white border border-gray-300 dark:border-gray-600">
                                                                    Day 2
                                                                </th>
                                                                <th class="px-6 py-4 text-center text-base font-semibold text-gray-900 dark:text-white border border-gray-300 dark:border-gray-600">
                                                                    Day 3
                                                                </th>
                                                                <th class="px-6 py-4 text-center text-base font-semibold text-gray-900 dark:text-white border border-gray-300 dark:border-gray-600">
                                                                    Day 4
                                                                </th>
                                                                <th class="px-6 py-4 text-center text-base font-semibold text-gray-900 dark:text-white border border-gray-300 dark:border-gray-600">
                                                                    Total
                                                                </th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            {{-- Bob --}}
                                                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                                                                <td class="px-6 py-4 text-lg font-semibold text-gray-900 dark:text-white border border-gray-300 dark:border-gray-600">
                                                                    Bob
                                                                </td>
                                                                <td class="px-6 py-4 text-center text-lg font-semibold text-gray-700 dark:text-gray-300 border border-gray-300 dark:border-gray-600">
                                                                    14
                                                                </td>
                                                                <td class="px-6 py-4 text-center text-lg font-semibold text-gray-700 dark:text-gray-300 border border-gray-300 dark:border-gray-600">
                                                                    10
                                                                </td>
                                                                <td class="px-6 py-4 text-center text-lg font-semibold text-gray-700 dark:text-gray-300 border border-gray-300 dark:border-gray-600">
                                                                    9
                                                                </td>
                                                                <td class="px-6 py-4 text-center text-lg font-semibold text-gray-700 dark:text-gray-300 border border-gray-300 dark:border-gray-600">
                                                                    10
                                                                </td>
                                                                <td class="px-6 py-4 text-center text-lg font-semibold text-gray-900 dark:text-white bg-blue-50 dark:bg-blue-900/20 border border-gray-300 dark:border-gray-600">
                                                                    43
                                                                </td>
                                                            </tr>

                                                            {{-- Dorothy --}}
                                                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                                                                <td class="px-6 py-4 text-lg font-semibold text-gray-900 dark:text-white border border-gray-300 dark:border-gray-600">
                                                                    Dorothy
                                                                </td>
                                                                <td class="px-6 py-4 text-center text-lg font-semibold text-gray-700 dark:text-gray-300 border border-gray-300 dark:border-gray-600">
                                                                    12
                                                                </td>
                                                                <td class="px-6 py-4 text-center text-lg font-semibold text-gray-700 dark:text-gray-300 border border-gray-300 dark:border-gray-600">
                                                                    5
                                                                </td>
                                                                <td class="px-6 py-4 text-center text-lg font-semibold text-gray-700 dark:text-gray-300 border border-gray-300 dark:border-gray-600">
                                                                    13
                                                                </td>
                                                                <td class="px-6 py-4 text-center text-lg font-semibold text-gray-700 dark:text-gray-300 border border-gray-300 dark:border-gray-600">
                                                                    5
                                                                </td>
                                                                <td class="px-6 py-4 text-center text-lg font-semibold text-gray-900 dark:text-white bg-blue-50 dark:bg-blue-900/20 border border-gray-300 dark:border-gray-600">
                                                                    35
                                                                </td>
                                                            </tr>

                                                            {{-- Henry --}}
                                                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                                                                <td class="px-6 py-4 text-lg font-semibold text-gray-900 dark:text-white border border-gray-300 dark:border-gray-600">
                                                                    Henry
                                                                </td>
                                                                <td class="px-6 py-4 text-center text-lg font-semibold text-gray-700 dark:text-gray-300 border border-gray-300 dark:border-gray-600">
                                                                    15
                                                                </td>
                                                                <td class="px-6 py-4 text-center text-lg font-semibold text-gray-700 dark:text-gray-300 border border-gray-300 dark:border-gray-600">
                                                                    6
                                                                </td>
                                                                <td class="px-6 py-4 text-center text-lg font-semibold text-gray-700 dark:text-gray-300 border border-gray-300 dark:border-gray-600">
                                                                    4
                                                                </td>
                                                                <td class="px-6 py-4 text-center text-lg font-semibold text-gray-700 dark:text-gray-300 border border-gray-300 dark:border-gray-600">
                                                                    9
                                                                </td>
                                                                <td class="px-6 py-4 text-center text-lg font-semibold text-gray-900 dark:text-white bg-blue-50 dark:bg-blue-900/20 border border-gray-300 dark:border-gray-600">
                                                                    34
                                                                </td>
                                                            </tr>

                                                            {{-- Calvin --}}
                                                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                                                                <td class="px-6 py-4 text-lg font-semibold text-gray-900 dark:text-white border border-gray-300 dark:border-gray-600">
                                                                    Calvin
                                                                </td>
                                                                <td class="px-6 py-4 text-center text-lg font-semibold text-gray-700 dark:text-gray-300 border border-gray-300 dark:border-gray-600">
                                                                    8
                                                                </td>
                                                                <td class="px-6 py-4 text-center text-lg font-semibold text-gray-700 dark:text-gray-300 border border-gray-300 dark:border-gray-600">
                                                                    8
                                                                </td>
                                                                <td class="px-6 py-4 text-center text-lg font-semibold text-gray-700 dark:text-gray-300 border border-gray-300 dark:border-gray-600">
                                                                    9
                                                                </td>
                                                                <td class="px-6 py-4 text-center text-lg font-semibold text-gray-700 dark:text-gray-300 border border-gray-300 dark:border-gray-600">
                                                                    7
                                                                </td>
                                                                <td class="px-6 py-4 text-center text-lg font-semibold text-gray-900 dark:text-white bg-blue-50 dark:bg-blue-900/20 border border-gray-300 dark:border-gray-600">
                                                                    32
                                                                </td>
                                                            </tr>

                                                            {{-- Carol --}}
                                                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                                                                <td class="px-6 py-4 text-lg font-semibold text-gray-900 dark:text-white border border-gray-300 dark:border-gray-600">
                                                                    Carol
                                                                </td>
                                                                <td class="px-6 py-4 text-center text-lg font-semibold text-gray-700 dark:text-gray-300 border border-gray-300 dark:border-gray-600">
                                                                    10
                                                                </td>
                                                                <td class="px-6 py-4 text-center text-lg font-semibold text-gray-700 dark:text-gray-300 border border-gray-300 dark:border-gray-600">
                                                                    11
                                                                </td>
                                                                <td class="px-6 py-4 text-center text-lg font-semibold text-gray-700 dark:text-gray-300 border border-gray-300 dark:border-gray-600">
                                                                    10
                                                                </td>
                                                                <td class="px-6 py-4 text-center text-lg font-semibold text-gray-700 dark:text-gray-300 border border-gray-300 dark:border-gray-600">
                                                                    8
                                                                </td>
                                                                <td class="px-6 py-4 text-center text-lg font-semibold text-gray-900 dark:text-white bg-blue-50 dark:bg-blue-900/20 border border-gray-300 dark:border-gray-600">
                                                                    39
                                                                </td>
                                                            </tr>

                                                            {{-- Judy --}}
                                                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                                                                <td class="px-6 py-4 text-lg font-semibold text-gray-900 dark:text-white border border-gray-300 dark:border-gray-600">
                                                                    Judy
                                                                </td>
                                                                <td class="px-6 py-4 text-center text-lg font-semibold text-gray-700 dark:text-gray-300 border border-gray-300 dark:border-gray-600">
                                                                    6
                                                                </td>
                                                                <td class="px-6 py-4 text-center text-lg font-semibold text-gray-700 dark:text-gray-300 border border-gray-300 dark:border-gray-600">
                                                                    11
                                                                </td>
                                                                <td class="px-6 py-4 text-center text-lg font-semibold text-gray-700 dark:text-gray-300 border border-gray-300 dark:border-gray-600">
                                                                    10
                                                                </td>
                                                                <td class="px-6 py-4 text-center text-lg font-semibold text-gray-700 dark:text-gray-300 border border-gray-300 dark:border-gray-600">
                                                                    10
                                                                </td>
                                                                <td class="px-6 py-4 text-center text-lg font-semibold text-gray-900 dark:text-white bg-blue-50 dark:bg-blue-900/20 border border-gray-300 dark:border-gray-600">
                                                                    37
                                                                </td>
                                                            </tr>

                                                            {{-- Total Row --}}
                                                            <tr class="bg-gray-100 dark:bg-gray-800">
                                                                <td class="px-6 py-4 text-lg font-semibold text-gray-900 dark:text-white border border-gray-300 dark:border-gray-600">
                                                                    Total
                                                                </td>
                                                                <td class="px-6 py-4 text-center text-lg font-semibold text-gray-900 dark:text-white border border-gray-300 dark:border-gray-600">
                                                                    65
                                                                </td>
                                                                <td class="px-6 py-4 text-center text-lg font-semibold text-gray-900 dark:text-white border border-gray-300 dark:border-gray-600">
                                                                    51
                                                                </td>
                                                                <td class="px-6 py-4 text-center text-lg font-semibold text-gray-900 dark:text-white border border-gray-300 dark:border-gray-600">
                                                                    55
                                                                </td>
                                                                <td class="px-6 py-4 text-center text-lg font-semibold text-gray-900 dark:text-white border border-gray-300 dark:border-gray-600">
                                                                    49
                                                                </td>
                                                                <td class="px-6 py-4 text-center text-lg font-semibold text-gray-900 dark:text-white bg-blue-100 dark:bg-blue-900/30 border border-gray-300 dark:border-gray-600">
                                                                    220
                                                                </td>
                                                            </tr>

                                                            {{-- Average Row --}}
                                                            <tr class="bg-gray-100 dark:bg-gray-800">
                                                                <td class="px-6 py-4 text-lg font-semibold text-gray-900 dark:text-white border border-gray-300 dark:border-gray-600">
                                                                    Average
                                                                </td>
                                                                <td class="px-6 py-4 text-center text-lg font-semibold text-gray-900 dark:text-white border border-gray-300 dark:border-gray-600">
                                                                    10.8
                                                                </td>
                                                                <td class="px-6 py-4 text-center text-lg font-semibold text-gray-900 dark:text-white border border-gray-300 dark:border-gray-600">
                                                                    8.5
                                                                </td>
                                                                <td class="px-6 py-4 text-center text-lg font-semibold text-gray-900 dark:text-white border border-gray-300 dark:border-gray-600">
                                                                    9.2
                                                                </td>
                                                                <td class="px-6 py-4 text-center text-lg font-semibold text-gray-900 dark:text-white border border-gray-300 dark:border-gray-600">
                                                                    8.2
                                                                </td>
                                                                <td class="px-6 py-4 text-center text-lg font-semibold text-gray-900 dark:text-white bg-blue-100 dark:bg-blue-900/30 border border-gray-300 dark:border-gray-600">
                                                                    9.2
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                    {{-- Mobile Card View --}}
                                                    <div class="md:hidden space-y-4">
                                                        {{-- Bob --}}
                                                        <div class="bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg p-4">
                                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">Bob</h3>
                                                            <div class="grid grid-cols-2 gap-2 text-base">
                                                                <div class="text-gray-700 dark:text-gray-300">Day 1:</div>
                                                                <div class="font-semibold text-gray-900 dark:text-white text-right">14</div>
                                                                <div class="text-gray-700 dark:text-gray-300">Day 2:</div>
                                                                <div class="font-semibold text-gray-900 dark:text-white text-right">10</div>
                                                                <div class="text-gray-700 dark:text-gray-300">Day 3:</div>
                                                                <div class="font-semibold text-gray-900 dark:text-white text-right">9</div>
                                                                <div class="text-gray-700 dark:text-gray-300">Day 4:</div>
                                                                <div class="font-semibold text-gray-900 dark:text-white text-right">10</div>
                                                                <div class="text-gray-900 dark:text-white font-semibold pt-2 border-t border-gray-300 dark:border-gray-600">Total:</div>
                                                                <div class="font-semibold text-blue-600 dark:text-blue-400 text-right pt-2 border-t border-gray-300 dark:border-gray-600">43</div>
                                                            </div>
                                                        </div>

                                                        {{-- Dorothy --}}
                                                        <div class="bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg p-4">
                                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">Dorothy</h3>
                                                            <div class="grid grid-cols-2 gap-2 text-base">
                                                                <div class="text-gray-700 dark:text-gray-300">Day 1:</div>
                                                                <div class="font-semibold text-gray-900 dark:text-white text-right">12</div>
                                                                <div class="text-gray-700 dark:text-gray-300">Day 2:</div>
                                                                <div class="font-semibold text-gray-900 dark:text-white text-right">5</div>
                                                                <div class="text-gray-700 dark:text-gray-300">Day 3:</div>
                                                                <div class="font-semibold text-gray-900 dark:text-white text-right">13</div>
                                                                <div class="text-gray-700 dark:text-gray-300">Day 4:</div>
                                                                <div class="font-semibold text-gray-900 dark:text-white text-right">5</div>
                                                                <div class="text-gray-900 dark:text-white font-semibold pt-2 border-t border-gray-300 dark:border-gray-600">Total:</div>
                                                                <div class="font-semibold text-blue-600 dark:text-blue-400 text-right pt-2 border-t border-gray-300 dark:border-gray-600">35</div>
                                                            </div>
                                                        </div>

                                                        {{-- Henry --}}
                                                        <div class="bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg p-4">
                                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">Henry</h3>
                                                            <div class="grid grid-cols-2 gap-2 text-base">
                                                                <div class="text-gray-700 dark:text-gray-300">Day 1:</div>
                                                                <div class="font-semibold text-gray-900 dark:text-white text-right">15</div>
                                                                <div class="text-gray-700 dark:text-gray-300">Day 2:</div>
                                                                <div class="font-semibold text-gray-900 dark:text-white text-right">6</div>
                                                                <div class="text-gray-700 dark:text-gray-300">Day 3:</div>
                                                                <div class="font-semibold text-gray-900 dark:text-white text-right">4</div>
                                                                <div class="text-gray-700 dark:text-gray-300">Day 4:</div>
                                                                <div class="font-semibold text-gray-900 dark:text-white text-right">9</div>
                                                                <div class="text-gray-900 dark:text-white font-semibold pt-2 border-t border-gray-300 dark:border-gray-600">Total:</div>
                                                                <div class="font-semibold text-blue-600 dark:text-blue-400 text-right pt-2 border-t border-gray-300 dark:border-gray-600">34</div>
                                                            </div>
                                                        </div>

                                                        {{-- Calvin --}}
                                                        <div class="bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg p-4">
                                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">Calvin</h3>
                                                            <div class="grid grid-cols-2 gap-2 text-base">
                                                                <div class="text-gray-700 dark:text-gray-300">Day 1:</div>
                                                                <div class="font-semibold text-gray-900 dark:text-white text-right">8</div>
                                                                <div class="text-gray-700 dark:text-gray-300">Day 2:</div>
                                                                <div class="font-semibold text-gray-900 dark:text-white text-right">8</div>
                                                                <div class="text-gray-700 dark:text-gray-300">Day 3:</div>
                                                                <div class="font-semibold text-gray-900 dark:text-white text-right">9</div>
                                                                <div class="text-gray-700 dark:text-gray-300">Day 4:</div>
                                                                <div class="font-semibold text-gray-900 dark:text-white text-right">7</div>
                                                                <div class="text-gray-900 dark:text-white font-semibold pt-2 border-t border-gray-300 dark:border-gray-600">Total:</div>
                                                                <div class="font-semibold text-blue-600 dark:text-blue-400 text-right pt-2 border-t border-gray-300 dark:border-gray-600">32</div>
                                                            </div>
                                                        </div>

                                                        {{-- Carol --}}
                                                        <div class="bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg p-4">
                                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">Carol</h3>
                                                            <div class="grid grid-cols-2 gap-2 text-base">
                                                                <div class="text-gray-700 dark:text-gray-300">Day 1:</div>
                                                                <div class="font-semibold text-gray-900 dark:text-white text-right">10</div>
                                                                <div class="text-gray-700 dark:text-gray-300">Day 2:</div>
                                                                <div class="font-semibold text-gray-900 dark:text-white text-right">11</div>
                                                                <div class="text-gray-700 dark:text-gray-300">Day 3:</div>
                                                                <div class="font-semibold text-gray-900 dark:text-white text-right">10</div>
                                                                <div class="text-gray-700 dark:text-gray-300">Day 4:</div>
                                                                <div class="font-semibold text-gray-900 dark:text-white text-right">8</div>
                                                                <div class="text-gray-900 dark:text-white font-semibold pt-2 border-t border-gray-300 dark:border-gray-600">Total:</div>
                                                                <div class="font-semibold text-blue-600 dark:text-blue-400 text-right pt-2 border-t border-gray-300 dark:border-gray-600">39</div>
                                                            </div>
                                                        </div>

                                                        {{-- Judy --}}
                                                        <div class="bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg p-4">
                                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">Judy</h3>
                                                            <div class="grid grid-cols-2 gap-2 text-base">
                                                                <div class="text-gray-700 dark:text-gray-300">Day 1:</div>
                                                                <div class="font-semibold text-gray-900 dark:text-white text-right">6</div>
                                                                <div class="text-gray-700 dark:text-gray-300">Day 2:</div>
                                                                <div class="font-semibold text-gray-900 dark:text-white text-right">11</div>
                                                                <div class="text-gray-700 dark:text-gray-300">Day 3:</div>
                                                                <div class="font-semibold text-gray-900 dark:text-white text-right">10</div>
                                                                <div class="text-gray-700 dark:text-gray-300">Day 4:</div>
                                                                <div class="font-semibold text-gray-900 dark:text-white text-right">10</div>
                                                                <div class="text-gray-900 dark:text-white font-semibold pt-2 border-t border-gray-300 dark:border-gray-600">Total:</div>
                                                                <div class="font-semibold text-blue-600 dark:text-blue-400 text-right pt-2 border-t border-gray-300 dark:border-gray-600">37</div>
                                                            </div>
                                                        </div>

                                                        {{-- Summary Card --}}
                                                        <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-300 dark:border-blue-600 rounded-lg p-4 mt-6">
                                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">Summary</h3>
                                                            <div class="space-y-2 text-base">
                                                                <div class="flex justify-between">
                                                                    <span class="text-gray-700 dark:text-gray-300">Total Production:</span>
                                                                    <span class="font-semibold text-gray-900 dark:text-white">220</span>
                                                                </div>
                                                                <div class="flex justify-between">
                                                                    <span class="text-gray-700 dark:text-gray-300">Overall Average:</span>
                                                                    <span class="font-semibold text-gray-900 dark:text-white">9.2</span>
                                                                </div>
                                                                <div class="pt-2 border-t border-blue-300 dark:border-blue-600">
                                                                    <div class="text-sm text-gray-600 dark:text-gray-400 mb-2">Daily Averages:</div>
                                                                    <div class="grid grid-cols-2 gap-2 text-sm">
                                                                        <div class="text-gray-700 dark:text-gray-300">Day 1: <span class="font-semibold">10.8</span></div>
                                                                        <div class="text-gray-700 dark:text-gray-300">Day 2: <span class="font-semibold">8.5</span></div>
                                                                        <div class="text-gray-700 dark:text-gray-300">Day 3: <span class="font-semibold">9.2</span></div>
                                                                        <div class="text-gray-700 dark:text-gray-300">Day 4: <span class="font-semibold">8.2</span></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <br><br>
                                                    <h2 class="text-4xl font-semibold text-gray-900 dark:text-white mb-4">Here is the above data captured in an image:</h2>
                                                    <p class="ctr"> <img alt="" class="img-fluid" src="{{ asset('storage/images/red-bd01.gif') }}" ></p><br>
                                                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">After the samples are counted, the beads are returned to the sampling device and another sample is drawn (shaking the box or mixing the bowl adds to the demonstration). Obviously the percent defective is a constant 20% but the actual percentage will vary with each sample due to sampling error and this is where the spoof begins. </p>
                                                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">While there are some lessons in statistics than can be taught from this experiment, the real punch line is in the way the instructor conducts the demonstration and allows people to see themselves and the futility of management practices for improving quality. Each instructor has to know
                                                        his (or her) audience and how far he can push the points made without
                                                        turning his audience off.</p>
                                                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">As the experiment is carried out over the four days the instructor uses the results of the samples to make his points. Realizing that the data will most likely vary between 1 and 19 (determined from the control chart calculations for UCL and LCL for a process that is 20% defective and sample sizes of 50). </p>
                                                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">There are a variety of points that can be made. The exact order that the instructor will make the points will be dependent on the actual data developed in the experiment. However, after 24 samples you will have enough high and low readings along with increasing and decreasing trends to make all the points.<br>
                                                    </p><br>
                                                    <h2 class="text-4xl font-semibold text-gray-900 dark:text-white mb-4">Clear Instructions:</h2>
                                                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">The first point of the demonstration has to do with giving clear instructions. Management often believes that if they make the objectives clear then the problems will go away. It could go something like the following:
                                                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">Foreman: Bob you know that our job is to make white beads, the customer will not accept colored beads. You make white beads by first of making sure that the material is well mixed. If it is not mixed well you will have trouble making white beads. (Demonstrate how you want the box
                                                        shaken or the beads mixed in the bowl)
                                                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">You then turn the box over and hold it completely flat while you push this button on the end and white beads will fall into the holes. (If you are using a sampling bowl then the describe how the paddle is to be used to draw a sample.) Place the paddle into the bowl at the end, scoop deep into the beads and raise the paddle slowly at an angle of precisely 30 degrees and let the extra beads roll off the paddle. Now I've described the job for all your
                                                        team very clearly. I'm sure that all of you can now make white beads. Bob, would you please make our first batch of white beads.
                                                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">Bob draws the first sample and shows it to the inspectors who record the count and they show it to the chief inspector. He then announces that we have 14 red beads. If colored beads are used then let red beads be red defects, green be green defects, yellow be yellow defects, etc. Still have the chief inspector count and record the total number of colored beads, but have him also report the different number for each color. The instructor can then use this to attach more blame to the worker, i.e. "Yellow defects, you know they are the worst kind and most costly to repair," and so on.
                                                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">Foreman: Bob I've told you that the customer will only accept white beads, colored beads are not acceptable. Did you mix the material and hold the box completely flat like I told you? (Did you hold the sampling paddle at precisely 30 degrees?)
                                                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">Bob: Yes I did
                                                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">Foreman: Well you must not have been paying attention. Dorothy can you please make us a batch of white beads? Remember all that I've told you. (repeat the appropriate instructions again). <br>
                                                        Dorothy draws a sample and it comes out to be 12 colored beads.
                                                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">Foreman: Well Dorothy that is better than Bob, but you must not have been paying attention either. Let me repeat the instructions once again. (repeat the appropriate instructions) Henry will you please run this process. Remember that the customer will only accept white beads.
                                                    <br><br><h2 class="text-4xl font-semibold text-gray-900 dark:text-white mb-4">Intimidation</h2>
                                                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">Henry then draws a sample and it comes out to be 15.
                                                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">Foreman: Henry I need to talk to you. Didn't you hear me when I gave all these people instructions on how to make white beads? What were you doing at the time, dreaming of some date you were going to have with Judy? I thought you said you wanted a job. We bring you here, give you clear instructions, show you how to make white beads and you still don't do it. What's the matter with you? Now I'm telling you people, you all better start paying attention or I'll have to fire all of you. Calvin it's your turn.</p>
                                                    <br><h2 class="text-4xl font-semibold text-gray-900 dark:text-white mb-4">Praise and Comparison</h2>
                                                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">Calvin draws a sample and it comes out at 8 colored beads.</p>
                                                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">Foreman: Now that's much better. Calvin you are catching on. Calvin got the same instructions as the rest of you and he is now beginning to master the process. He was almost twice as good as Henry. We are going in the right direction now. Henry, you especially need to watch Calvin and see how he did it. In fact, the rest of you should all watch Calvin and see how he does it. Carol, it is your turn.</p>
                                                    <br><h2 class="text-4xl font-semibold text-gray-900 dark:text-white mb-4">Banners and Slogans</h2>
                                                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">Carol draws a sample and it turns out to be 10.<br>
                                                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">Foreman: Carol, I told you to watch Calvin. He knows how to do it. Now all of you listen up. We have firm quality standards at this factory. Didn't you read the quality first banner over the door of the factory? See that poster on the wall over there, it says "Satisfied customers are happy customers and that means they will buy more." Quality is critical to our survival as a company and you know what that means for all our jobs. This company has to get the silver star quality award. It is crucial to our success in the marketplace. Judy please show us how it's done.
                                                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">Judy draws and sample and it come out to be 6. The foreman then walks over and talks to the chief inspector. <br>
                                                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">Foreman: Darwin, here is a prime example of quality improvement. You see once I pointed out to everyone that we are really serious about quality at this factory, people started to improve. Judy ran the best batch of white beads that we've seen so far. I think that we need to put a poster by everyone's machine instead of just a few on the wall that we have. You know if we buy some of those quality first buttons we all could wear one and give one to every employee that improves. I'm sure that we can drive the point home more about quality. While today wasn't the best I'm sure we'll do better tomorrow. (while walking over to Judy) Judy, excellent job.
                                                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">Keep up the good work.
                                                    <br><br><h2 class="text-4xl font-semibold text-gray-900 dark:text-white mb-4">Incentives</h2>
                                                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">Tomorrow comes and the foreman asks Bob to run his batch of white beads. Bob runs his sample and it comes out at 10. <br>
                                                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">Foreman: Bob you've done better than you did yesterday but we are still going in the wrong direction. I've talked this matter over with our management and we are going to institute a quality bonus for everyone who runs good parts. If you guys and gals will all do better we will have a big pizza party and bonus for everyone. <br>
                                                        After the bonus scheme is in place Dorothy draws 5, Henry draws 6, and Calvin draws 8 colored beads. The foreman then talks to the audience as if they were the management. He is explaining the value of the bonus scheme. <br>
                                                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">Foreman: Well after we instituted the bonus scheme that I recommended things got better immediately. While things have been going up and down we are still much better than we were yesterday. I think that our people are finally getting the message and all our efforts with the new quality banners and quality first buttons are paying off. We are definitely on the road to zero defects. I think that we should design another button with a big zero in the middle that is surrounded by gold stars that we can present to our best employees. In fact I would like for one of you to speak at our employee meeting and tell them about this exciting new zero defects button program.
                                                    <br><br><h2 class="text-4xl font-semibold text-gray-900 dark:text-white mb-4">Blame</h2>
                                                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">Carol and Judy then each draw 11 colored beads.
                                                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">The foreman is very upset that things are going bad after he has told management that things were improving. He then goes over to the chief inspector and discusses the problem with him. <br>
                                                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">Foreman: Darwin, I'm really upset. These people don't care. Here you give them a good job and show that it is possible to improve and what do they do, ignore you and make life easy for themselves. I know that our incentive scheme was working, look at the results. I think Carol and Judy are spending too much time talking to one another and not paying attention to their job. I think that I'll warn both of them about their performance and tell them if I catch them talking again that I'll have to discipline them.
                                                    <br><h2 class="text-4xl font-semibold text-gray-900 dark:text-white mb-4">Performance Appraisals</h2>
                                                    <br><p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">This process continues again and again until all 24 samples have been taken. The data is then summarized for display and the supervisor then rates everyone's performance. The data is then placed on an overhead projector or summarized on a chart pad. <br>
                                                    </p>
                                                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">Foreman: Bob, you started off bad and then improved slightly. You have got to do better. Dorothy, you started off bad, then you improved, then you fell off the wagon again, and then improved again. You need to pay closer attention to your work and gain more consistency. Henry, you started off terrible and then you finally caught on. You have the same problem as Dorothy, you need more consistency. Calvin, your the best employee in the department, but you still have room for improvement. You could be the first employee to earn the zero defects button that the manager talked about at the employee meeting. Carol, your performance needs to improve. Your overall rating was good. You can do better if you stop all that talking with Judy I warned you about. Judy, you need to pay attention to your work. You started off good and something must have distracted you. I think it was all the talking with Carol. <br>
                                                    </p>
                                                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">The foreman should now take on the role of explaining the results to management as he turns to the audience. The focus can now be on the graph and the noting of the various trends. The same praise and blame is offered for the trends. An evaluation of the trends for each day and an overall comparison of each of the workers may be appropriate at this point, as you try to present the results with the best possible explanation. The supervisor would then promise that they can do better and explain all the new quality programs that are in place to address the problems, i.e. posters, etc. He would make special note that he had warned the Judy and Carol and gave them unfavorable performance evaluations. <br>
                                                    </p>
                                                    <br><h2 class="text-4xl font-semibold text-gray-900 dark:text-white mb-4">Discussion of the Experiment</h2>
                                                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">The instructor then steps out of his foreman role and now asks
                                                        questions as an instructor in order to get the class to evaluate
                                                        what has happened.</p>
                                                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">What was the average of number of defects for the experiment
                                                        (X-Bar)? Take the total number of colored beads (220) and divide
                                                        by 24. (X-Bar=220/24=9.2 for this experiment)<br>
                                                        Ask them what they
                                                        expected the average to be and why. <br>
                                                        Facilitate a discussion that
                                                        gets them to see that the average has got to be 20% defective
                                                        since we know that there was a fixed 20% defective all the time
                                                        in the sampling device. Explain that &quot;p bar&quot; is merely
                                                        the average percent defective for a given sample size. <br>
                                                        Given that
                                                        we had 20% defective, and samples of 50, 20% of 50 is 10. In our
                                                        example the actual average was 9.2. <br>
                                                        This will vary slightly with
                                                        each demonstration.</p>
                                                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">Next show that a simple p-Chart would have control limits of
                                                        1 and 17. This is determined by using the following formulas:</p>
                                                    <p class="ctr">P Bar = 220 / 6 * 4 * 50 = .18</p>
                                                    <p class="ctr">UCL or LCL = X Bar (plus/minus) 3 <i><tt>Sq Root</tt></i> [(X-Bar)(1-P Bar)]</p>
                                                    <p class="ctr">9.2 (plus/minus) 3 <i><tt>Sq Root</tt></i> [(9.2)(.82)] </p>
                                                    <p class="ctr">or</p>
                                                    <p class="ctr">9.2 (plus/minus) 8.24 = .96 to 17.44</p><br>
                                                    <p class="ctr"><img class="img-fluid" src="{{ asset('storage/images/red-bd02.gif') }}"></p><br>
                                                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">What this means is that given a 20% defective process, and with
                                                        sample sizes of 50, that the number of colored beads will vary
                                                        over 99% of the time between 1 and 17 just due to random chance.
                                                        In the demonstration we knew that it was random chance because
                                                        we controlled the experiment by virtue of a constant number of
                                                        beads. In actuality, we have what Dr. Deming calls a &quot;stable
                                                        process,&quot; or a system that is varying only because of random
                                                        chance. This random chance is also referred to as only being affected
                                                        by &quot;chance or common causes.&quot; Note that a stable process
                                                        may still turn out faulty items.</p>

                                                         <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">What this means is that given a 20% defective process, and with
                                                        sample sizes of 50, that the number of colored beads will vary
                                                        over 99% of the time between 1 and 17 just due to random chance.
                                                        In the demonstration we knew that it was random chance because
                                                        we controlled the experiment by virtue of a constant number of
                                                        beads. In actuality, we have what Dr. Deming calls a &quot;stable
                                                        process,&quot; or a system that is varying only because of random
                                                        chance. This random chance is also referred to as only being affected
                                                        by &quot;chance or common causes.&quot; Note that a stable process
                                                        may still turn out faulty items.</p><br>
                                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">Here are 11 sub-lessons (axiomatic [self evident] truths), extrapolated from the above bottom line:</h3>
                                                         <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">1.<img alt="" class="img-fluid" src="{{ asset('storage/images/lightbulbidea.png') }}" >All the variations came from the process. There was no evidence that any worker was better than another.<br>
                                                    </p>
                                                         <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">2.<img alt="" class="img-fluid"  src="{{ asset('storage/images/lightbulbidea.png') }}" > The workers could, under no circumstances, do any better. The best people doing their best does not matter. Therefore, as managers, we must not rush to blame employees. We must improve our processes and make them so robust that it produces acceptable products no matter who runs it. So, when a problem with a process occurs, we must first investigate what went wrong with the process. If we find the process to be in order, we can then begin to determine if there was an operator error.<br>
                                                    </p>
                                                         <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">3.<img alt="" class="img-fluid" src="{{ asset('storage/images/lightbulbidea.png') }}" > Pay for performance can be futile. The performance of the workers was governed by the process.<br>
                                                    </p>
                                                         <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">4.<img alt="" class="img-fluid" src="{{ asset('storage/images/lightbulbidea.png') }}" > Inspection after the process is complete does not improve quality but merely catches defects before they leave the plant. The quality inspectors in the red bead experiment were not adding value to the process. They are there just to make sure defective product did not reach the customer. Since no inspection process is perfect, we can assume that even with 2 quality inspectors, some defective product still made it to the customer. As managers, we must instill quality efforts at all stages of the process so that defects can be caught as soon as they are made rather than discovering them after we have performed more valued added activities to them. The beads may have been defective when we received them from our supplier, but with
                                                        &#39;<strong>end-of-the-line</strong>&#39; inspection, we will not discover them until we have wasted a lot of time and effort working on them.<br>
                                                    </p>
                                                         <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">5.<img alt="" class="img-fluid" src="{{ asset('storage/images/lightbulbidea.png') }}" > Clear instructions to workers will only increase the probability that the process will behave as intended. Clear instructions will not improve a process that is out of control (a process that has wild variation from day to day).<br>
                                                    </p>
                                                         <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">6.<img alt="" class="img-fluid" src="{{ asset('storage/images/lightbulbidea.png') }}"> Intimidation creates fear which does nothing to improve a process.<br>
                                                    </p>
                                                         <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">7.<img alt="" class="img-fluid" src="{{ asset('storage/images/lightbulbidea.png') }}" > Praise will encourage a person to perform the process as they have learned to perform it. It will not improve a process.<br>
                                                    </p>
                                                         <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">8.<img alt="" class="img-fluid" src="{{ asset('storage/images/lightbulbidea.png') }}" > Banners and Slogans raise the awareness of quality as an issue to be concerned with, but also tells people that management believes that a reminder a required to produce a quality produce, thus creating an environment of mistrust.<br>
                                                    </p>
                                                         <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">9.<img alt="" class="img-fluid" src="{{ asset('storage/images/lightbulbidea.png') }}" > Incentives will not improve a process and have a short effect on employee moral. </p>
                                                         <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">10.<img alt="" class="img-fluid" src="{{ asset('storage/images/lightbulbidea.png') }}" > The process has natural variation. Each day the process will produce data different from the day before within a natural range of values. We must collect data about the process to understand the range and variance of the variation.<br>
                                                    </p>
                                                         <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">11.<img alt="" class="img-fluid" src="{{ asset('storage/images/lightbulbidea.png') }}" > To satisfy the customer consistently, the process must be capable of meeting customer requirements. If the customer&#39;s requirements are tighter than we can produce on a consistent basis, then we will only produce acceptable products by accident.</p>
                                                         <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300"><br>
                                                    </p>
                                                    
                                                    
                                                    
                                                    
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- 14 Observations -->
                <div class="bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
                    <button
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-4 px-6 text-xl transition-colors text-center"
                            type="button"
                            wire:click="$toggle('showObservations')">
                        The 14 Observations for Management
                    </button>
                    @if($showObservations)
                        <div class="p-6">
                            <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
                                <div class="bg-gray-100 dark:bg-gray-700 px-6 py-4 border-b border-gray-200 dark:border-gray-600">
                                    <h5 class="text-xl font-semibold text-gray-900 dark:text-white text-center">
                                        The Red Bead Experiment and 14 Observations for Management underpin the Capability Maturity Model
                                    </h5>
                                </div>
                                <div class="p-6">
                                    <hr class="border-gray-200 dark:border-gray-700 mb-6">

                                    <h1 class="text-3xl font-semibold text-gray-900 dark:text-white text-center mb-8">
                                        Here are the 14 Observations:
                                    </h1>

                                    <!-- Observation 1 -->
                                    <div class="mb-8 p-6 bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700">
                                        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">1. Constancy of purpose:</h2>
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">Create constancy of purpose toward continual improvement of product and service, with a plan to become competitive and to stay in business.</h3>

                                        <div class="flex flex-col lg:flex-row gap-6 items-start">
                                            <div class="lg:w-1/3">
                                                <img title="Deming pt1" src="{{ asset('storage/images/deming-pt1.jpg') }}" alt="Deming pt1" class="w-full h-auto rounded-lg">
                                            </div>
                                            <div class="lg:w-2/3">
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">Management have two concerns. One deals with running the business on a day to day basis. The other deals with the future of the business.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">They must have clarity on the questions; what are we doing, and why are we doing it?</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">The answer to these questions requires knowledge and looking to the future. It is the difference between short term and long term thinking; the tortoise and the hare.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">Problems of the future require constancy of purpose, and dedication to improvement.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">Create constancy of purpose toward continual improvement of products and service, allocating resources to provide for long range needs, rather than only short term profitability, with the aim to become competitive, stay in business and to provide jobs.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">To stay in business requires that leaders spend time on innovation, research and education. They must constantly improve the design of their product and service.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">Purpose is an intent, a goal, a vision of some future desired state. To have constancy of purpose then one must first have a purpose.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Observation 2 -->
                                    <div class="mb-8 p-6 bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700">
                                        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">2. The new philosophy:</h2>
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">We are in a new economic age, created in Japan. Management must awaken to the challenge, must learn their responsibilities, and take on leadership for change.</h3>

                                        <div class="flex flex-col lg:flex-row gap-6 items-start">
                                            <div class="lg:w-1/3">
                                                <img title="Deming pt2" src="{{ asset('storage/images/deming-pt2.jpg') }}" alt="Deming pt2" class="w-full h-auto rounded-lg">
                                            </div>
                                            <div class="lg:w-2/3">
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">Improvement never stops. The system is capricious, erratic, it will affect people in different ways from one month to another. Which is why you need continuous improvement, it can never finish as change never finishes.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">The customer demands and tastes change very fast, and the competition in the market grows at a rapid rate today.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">Henry Ward Beecher said "Philosophy of one century is the common sense of the next"; we have to accept new philosophies according to the market trends and technology revolutions.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">Learn and adopt the new philosophy, one of cooperation to everyone's benefit.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">Management must awaken to the challenge, learn their responsibilities and take on leadership for change.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">We are in a new economic age, created in Japan. We can no longer live with commonly accepted levels of delays, mistakes, defective materials and defective workmanship. We cannot accept today, the levels of error that could be tolerated yesterday. Defective products and services are a cost to the system.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">Only management is in a position to do something about the vast majority of errors. Transformation of Western management style is necessary to halt the continued decline of business and industry.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">Its management's task to remove the obstacles that prevent people from doing their jobs correctly.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Observation 3 -->
                                    <div class="mb-8 p-6 bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700">
                                        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">3. Cease dependence on mass inspection:</h2>
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">Eliminate the dependence on inspection to achieve quality. Eliminate the need for inspection on a mass basis by building quality into the product in the first place.</h3>

                                        <div class="flex flex-col lg:flex-row gap-6 items-start">
                                            <div class="lg:w-1/3">
                                                <img title="Deming pt3" src="{{ asset('storage/images/deming-pt3.jpg') }}" alt="Deming pt3" class="w-full h-auto rounded-lg">
                                            </div>
                                            <div class="lg:w-2/3">
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">You can not save money if you are more worried about money, than you are about quality.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">Cease dependence on mass inspection to achieve quality. Mass inspection is not reliable. Inspection sound right, but it is wrong.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">You can't inspect quality in, yet we have organizations using ISO and audits as a means to prove quality.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">Routine inspection is the same as planning for defects, acknowledging that the process isn't correct, or that the specifications made no sense in the first place. Inspection is too late as well as ineffective and costly.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">Instead require statistical evidence that quality is built in.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">Quality doesn't come from inspection, but from improvement of the process. Improve the process so that defects aren't produced in the first place. This eliminates the need for inspection on a mass basis.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">Eliminate the need for mass inspections, as the way of life to achieve quality, by building quality into the product in the first place. Require statistical evidence of quality improvements.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">You can not save money if you are more worried about money, than you are about quality.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Observation 4 -->
                                    <div class="mb-8 p-6 bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700">
                                        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">4. End lowest tender contracts:</h2>
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">End the practice of awarding business on the basis of price tag along. Instead, minimize total cost. Move toward a single supplier for any one item, on a long-term relationship of loyalty and trust.</h3>

                                        <div class="flex flex-col lg:flex-row gap-6 items-start">
                                            <div class="lg:w-1/3">
                                                <img title="Deming pt4" src="{{ asset('storage/images/deming-pt4.jpg') }}" alt="Deming pt4" class="w-full h-auto rounded-lg">
                                            </div>
                                            <div class="lg:w-2/3">
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">Without adequate measures of quality, business drifts to the lowest bidder, therefore the result is low quality and high cost.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">Price has no meaning without measure of the quality purchased.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">End the practice of awarding business on a price tag alone. Instead, require meaningful measures of quality along with price.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">Reduce the number of suppliers for the same item, by eliminating those that do not qualify with statistical and other evidence of quality.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">The aim is for both parties to work together, by minimizing variation to increase quality, and to minimize total cost (not merely initial costs) for both parties.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">This may be achieved by moving toward a single supplier for any one item, on a long term relationship of loyalty and trust.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">It will lead to continuous improvement between both parties and as a result you will get quality supplies at reduced costs. This is why Japanese manufacturers are so closely aligned to their suppliers.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">We often spend lots of time and money to find better suppliers and shift rapidly between them for slight monetary gains. Instead of getting vendors to compete on price think long term. Purchasing managers have a new job and must learn it.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">Today many organizations just outsource to the cheapest supplier, and often to multiple suppliers within the same business unit or project.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Observation 5 -->
                                    <div class="mb-8 p-6 bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700">
                                        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">5. Improve every process:</h2>
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">Improve constantly and forever the system of production and service, to improve quality and productivity, and thus constantly decrease costs.</h3>

                                        <div class="flex flex-col lg:flex-row gap-6 items-start">
                                            <div class="lg:w-1/3">
                                                <img title="Deming pt5" src="{{ asset('storage/images/deming-pt5.jpg') }}" alt="Deming pt5" class="w-full h-auto rounded-lg">
                                            </div>
                                            <div class="lg:w-2/3">
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">Constantly improve the production and service system to improve quality and productivity, thus decreasing costs.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">Accept nothing is ever good enough. Improve constantly and forever every process for planning, production and service.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">Improvement isn't a project with a finite end. Instead, think continuous, never ending improvement.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">Institute innovation. Everyone should search continually for problems in order to improve every activity in the company, to improve quality and productivity and thus to constantly decrease costs.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">Finding what's wrong is not improvement. Plugging leaks is not improvement. Don't look at outcomes or defects, instead look at what produces the defects.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">There should be continual education on waste and continued improvement of quality in every activity, this will yield a continual rise in productivity.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">It is management's job to work continually on the system (for example work design, incoming work, improvement of tools, supervision, training and retraining). There in no stopping point in the process of quality management.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">The enterprise system and services must keep growing indefinitely in order to catch up with the competitive market.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Observation 6 -->
                                    <div class="mb-8 p-6 bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700">
                                        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">6. Institute training on the job:</h2>
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">Institute modern methods of training on the job.</h3>

                                        <div class="flex flex-col lg:flex-row gap-6 items-start">
                                            <div class="lg:w-1/3">
                                                <img title="Deming pt6" src="{{ asset('storage/images/deming-pt6.jpg') }}" alt="Deming pt6" class="w-full h-auto rounded-lg">
                                            </div>
                                            <div class="lg:w-2/3">
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">Provide learning and development. Institute training on the job, training for new skills.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">People learn in different ways. Training must be totally reconstructed.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">When training, people need to understand <em class="font-semibold">what</em> the job is and <em class="font-semibold">why</em> it is being done.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">Training must be done on the job, learning by doing; going into the work and experimenting with work methods and new ideas, studying the results, and striving for perfection.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">A trained worker has more productivity and quality than an untrained one, so giving training sessions will drastically improve the quality of the person, and also directly helps in better performance with regard to product quality.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">Institute modern methods of training on the job for all, including management, to make better use of every employee.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">New skills are required to keep up with changes in tools, methods, techniques, product and service design.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Observation 7 -->
                                    <div class="mb-8 p-6 bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700">
                                        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">7. Institute leadership of people:</h2>
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">The aim of management should be to help people to do a better job. Management is in need of overhaul.</h3>

                                        <div class="flex flex-col lg:flex-row gap-6 items-start">
                                            <div class="lg:w-1/3">
                                                <img title="Deming pt7" src="{{ asset('storage/images/deming-pt7.jpg') }}" alt="Deming pt7" class="w-full h-auto rounded-lg">
                                            </div>
                                            <div class="lg:w-2/3">
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">Leadership is required <em class="font-semibold">not</em> supervision.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">Leadership is in need of overhaul, the job of leaders is to help people.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">Adopt and institute leadership aimed at helping people to do a better job.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">Adopt and institute principles for leadership improvement.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">The emphasis of management must be changed from sheer numbers to quality. Improvement of quality will automatically improve productivity.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">Management must ensure that investigation and actions are taken on reports of inherited defects, system conditions, poor tools, fuzzy operational definitions, variation and all conditions detrimental to quality. You can't delegate quality, its a road to failure.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">The basic principle is that it's the managers job to coach their staff and improve the system</p>
                                                <ul class="list-disc pl-6 mb-4 text-lg text-gray-700 dark:text-gray-300">
                                                    <li class="mb-2">Firstly, they spend time in the work reinforcing the organizations commitment to its customers and to quality.</li>
                                                    <li class="mb-2">Secondly, they devote time to ensuring the staff doing the work have everything they need to be able to serve the customer.</li>
                                                    <li>Thirdly, when they have a decision to make about either of the above they get data to base their decisions on. There is no knee jerk, instead they get knowledge.</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Observation 8 -->
                                    <div class="mb-8 p-6 bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700">
                                        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">8. Drive out fear:</h2>
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">Drive out fear so that everyone may work effectively for the company.</h3>

                                        <div class="flex flex-col lg:flex-row gap-6 items-start">
                                            <div class="lg:w-1/3">
                                                <img title="Deming pt8" src="{{ asset('storage/images/deming-pt8.jpg') }}" alt="Deming pt8" class="w-full h-auto rounded-lg">
                                            </div>
                                            <div class="lg:w-2/3">
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">Extinguish fear so everyone may work effectively for the organization.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">Build trust. Cooperation and collaboration requires a whole different set of values and relationships than that used in the outdated command and control method.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">People are afraid of change, any attempt to make things better will lead to a fear of the unknown.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">Many organizations are run by fear; fear of not getting their bonus, being afraid that they can't meet their annual rating, or fear that they will be low on rating ladders.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">To achieve better quality people need to feel secure. We need to eliminate fear so that everyone may work effectively for the company. Fear will disappear as management improves and as employees develop confidence in management.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">Driving our fear is part of at least 8 of the 14 points.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Observation 9 -->
                                    <div class="mb-8 p-6 bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700">
                                        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">9. Break down barriers:</h2>
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">Break down barriers between departments. People in research, design, sales, technology and production must work as a team.</h3>

                                        <div class="flex flex-col lg:flex-row gap-6 items-start">
                                            <div class="lg:w-1/3">
                                                <img title="Deming pt9" src="{{ asset('storage/images/deming-pt9.jpg') }}" alt="Deming pt9" class="w-full h-auto rounded-lg">
                                            </div>
                                            <div class="lg:w-2/3">
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">Break down barriers and silos between departments. In other words build a system.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">Traditionally each silo becomes independent kingdoms, each trying to maximize their own figures.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">People in research, design, sales, technology and production must work as a team to be able to foresee any production problems, and potential product or service issues.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">Unless staff work jointly in a spirit of co-operation, each area will try to do what is best for itself, rather than what's good for the organization. It means cooperation not competition, <em class="font-semibold">everybody wins if the system wins</em>.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Observation 10 -->
                                    <div class="mb-8 p-6 bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700">
                                        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">10. Eliminate exhortations:</h2>
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">Eliminate the use of slogans and exhortations for the work force asking for zero defects and new levels of productivity.</h3>

                                        <div class="flex flex-col lg:flex-row gap-6 items-start">
                                            <div class="lg:w-1/3">
                                                <img title="Deming pt10" src="{{ asset('storage/images/deming-pt10.jpg') }}" alt="Deming pt10" class="w-full h-auto rounded-lg">
                                            </div>
                                            <div class="lg:w-2/3">
                                                <ul class="list-disc pl-6 mb-4 text-lg text-gray-700 dark:text-gray-300">
                                                    <li class="mb-2"><strong>Eliminate work standards (quotas). Substitute leadership.</strong></li>
                                                    <li class="mb-2"><strong>Eliminate management by objective. Substitute leadership.</strong></li>
                                                    <li class="mb-4"><strong>Eliminate management by numbers, numerical goals. Substitute leadership.</strong></li>
                                                </ul>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">Posters ask people to do what they can not do.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">Posters and slogans on the wall stating "do it right first time"; who can do it right first time, when the stuff someone has to work on is already wrong?</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">The causes go beyond the power of the work force, as the majority of low quality and low productivity causes result from the system.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">If the system has been built around quality, then it will be done right first time, so the slogan will be meaningless.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">Ensure you substitute work standards and quotas with effective leadership and effective methods. Substitute management (by objectives, numbers and numerical goals) with effective leadership.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Observation 11 -->
                                    <div class="mb-8 p-6 bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700">
                                        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">11. Eliminate arbitrary numerical targets:</h2>
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">Eliminate work standards that prescribe quotas for the work force and numerical goals for people in management. The responsibility of management must be changed from sheer numbers to quality.</h3>

                                        <div class="flex flex-col lg:flex-row gap-6 items-start">
                                            <div class="lg:w-1/3">
                                                <img title="Deming pt11" src="{{ asset('storage/images/deming-pt11.jpg') }}" alt="Deming pt11" class="w-full h-auto rounded-lg">
                                            </div>
                                            <div class="lg:w-2/3">
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">Numerical goals accomplish nothing.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">Traditionally quantity rules over quality.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">The cost of caring more about numbers than you do about quality is enormous, it results in high costs finding and fixing mistakes. That money spent produces nothing.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">Focus on quality rather than quantity of product. Remove obstacles depriving workers of their right to take pride in their work. Managers must focus on quality, rather than sheer numbers.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">Substitute aids and helpful leadership in order to achieve continual improvement of quality and productivity.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">A system of continuous improvement yields greater production at lower costs. The focus is <em class="font-semibold">not on how many you make</em>, it is on <em class="font-semibold">how well you make them</em>.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Observation 12 -->
                                    <div class="mb-8 p-6 bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700">
                                        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">12. Permit pride of workmanship:</h2>
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">Remove barriers that rob workers and people in management of their right to having pride in their work. This means, for example, abolishment of the annual or merit rating and of management by objective.</h3>

                                        <div class="flex flex-col lg:flex-row gap-6 items-start">
                                            <div class="lg:w-1/3">
                                                <img title="Deming pt12" src="{{ asset('storage/images/deming-pt12.jpg') }}" alt="Deming pt12" class="w-full h-auto rounded-lg">
                                            </div>
                                            <div class="lg:w-2/3">
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">Remove the obstacles and barriers that deprive workers, and people in management, of their right to take pride and joy in their work. This implies abolition of the annual merit rating (appraisal of performance) and of Management by Objective, all of which creates conflict and competition.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">These barriers to pride (a basic human need) among other things, results in low morale and absenteeism.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">We need people to have pride in their work, not in their ability to meet ratings.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">Again, the responsibility of Team Leaders, Managers, Directors and senior leaders must be changed from sheer numbers to quality.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">Fixing points for employees, and ranking them inside the company, infuses competition within that organization. We want collaboration not competition.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">Involve employees, at all levels, in the process of improvement. Supply workers with the proper methods, materials and tools. Managers work on the system that is impeding performance.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Observation 13 -->
                                    <div class="mb-8 p-6 bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700">
                                        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">13. Encourage education:</h2>
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">Institute a vigorous programmed of education and self-improvement.</h3>

                                        <div class="flex flex-col lg:flex-row gap-6 items-start">
                                            <div class="lg:w-1/3">
                                                <img title="Deming pt13" src="{{ asset('storage/images/deming-pt13.jpg') }}" alt="Deming pt13" class="w-full h-auto rounded-lg">
                                            </div>
                                            <div class="lg:w-2/3">
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">Institute a vigorous program of education and encourage self improvement for everyone.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">What an organization needs is not just good people; it needs people that are improving with education.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">Education may not be in a subject that is connected to their work.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">Self improvement keeps people's minds developing. Point 6 is training for the job, point 13 is elevating people's minds.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">Advances in competitive position will have their roots in knowledge. No organization can survive with just good people, they need people that are improving.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Observation 14 -->
                                    <div class="mb-8 p-6 bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700">
                                        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">14. Top management commitment and action:</h2>
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">Put everybody in the company to work to accomplish the transformation. The transformation is everybody's job.</h3>

                                        <div class="flex flex-col lg:flex-row gap-6 items-start">
                                            <div class="lg:w-1/3">
                                                <img title="Deming pt14" src="{{ asset('storage/images/deming-pt14.jpg') }}" alt="Deming pt14" class="w-full h-auto rounded-lg">
                                            </div>
                                            <div class="lg:w-2/3">
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">Put everybody in the organization to work to accomplish the change.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">Develop a critical mass that will bring about the change; a critical mass including top management.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">Create a structure in management who take an active part and who spend time in the work reinforcing the 14 points, and the organization's commitment to it's customers and to quality.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">Managers should devote time to ensuring the staff doing the work have everything they need to be able to serve the customer. They use data and real knowledge obtained from the customer's point of view to make decisions.</p>
                                                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">Without such a structure no viable long-term benefits will be achieved.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Summary -->
                                    <div class="mb-8 p-6 bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700">
                                        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">Summary</h2>
                                        <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">The 14 points are not a menu you can pick and choose from. Deming intended you use all 14. They are one philosophy.</p>

                                        <blockquote class="border-l-4 border-blue-500 pl-4 my-6 italic text-gray-600 dark:text-gray-400">
                                            <p class="text-lg mb-4">"The way not to depend on mass inspection (point 3) is to continually improve the process (point 5), to do that you will need quality supplies (point 4), finding a quality supplier takes time (point 1), to do so you will need to adopt the philosophy (point 2)" Lloyd Dobbins</p>
                                            <p class="text-lg mb-4">"We want our people to work together, but its hard to do so without point 8, 9, 10, 11 and 12." Lloyd Dobbins</p>
                                        </blockquote>

                                        <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">The 14 points apply anywhere, to small organizations as well as to large ones, to the service industry as well as to manufacturing. They equally apply to any division within a company.</p>

                                        <blockquote class="border-l-4 border-blue-500 pl-4 my-6 italic text-gray-600 dark:text-gray-400">
                                            <p class="text-lg">"The 14 points all have one aim, make it possible for people to work with joy and pride" Deming</p>
                                        </blockquote>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <!-- VIDEOS SECTION - AT THE BOTTOM, ALWAYS VISIBLE -->
        <div id="videos" class="mt-16 pt-8 border-t border-gray-200 dark:border-gray-700">
            <div class="text-center mb-12">
                <br><br>
                <h2 class="text-4xl font-semibold text-gray-900 dark:text-white mb-4">
                    Dr W. Edwards Deming's Red Bead Experiment Videos
                </h2>
                <p class="text-xl text-gray-700 dark:text-gray-300">
                    Watch these videos to understand the powerful lessons from the Red Bead Experiment
                </p>

            </div>

            <!-- Video 1 -->
            <div class="max-w-4xl mx-auto mb-12 bg-white dark:bg-gray-800 p-6 rounded-lg border border-gray-200 dark:border-gray-700">
                <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">
                    A short video showing and explaining the Red Bead Experiment
                </h3>
                <video id="video1"
                       data-able-player
                       preload="metadata"
                       data-speed-icons="true"
                       class="w-full rounded-lg"
                       poster="{{ asset('storage/images/redbeadremoved.jpg') }}"
                       playsinline>
                    <source type="video/mp4" src="{{ asset('ablelvids/redbeads/redbeadsone.mp4') }}">
                </video>
            </div>

            <!-- Video 2 -->
            <div class="max-w-4xl mx-auto mb-12 bg-white dark:bg-gray-800 p-6 rounded-lg border border-gray-200 dark:border-gray-700">
                <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">
                    Deming conducting a Red Bead Experiment demonstration
                </h3>
                <p class="text-lg text-gray-700 dark:text-gray-300 mb-4">
                    I was fortunate to attend one of Demings conferences when he and I were both younger. It was life changing!
                    Note: Please stick with him as in this video he is quite an old guy. As such it is sometimes difficult to hear
                    what he is saying. However, the lesson overall will soon become clear. It (and the lessons you will learn) will
                    stay with you for the rest of your life!
                </p>
                <video id="video2"
                       data-able-player
                       preload="metadata"
                       data-speed-icons="true"
                       class="w-full rounded-lg"
                       poster="{{ asset('storage/images/redbeadremoved.jpg') }}"
                       playsinline>
                    <source type="video/mp4" src="{{ asset('ablelvids/redbeads/redbeadstwo.mp4') }}">
                </video>
            </div>

            <!-- Video 3 -->
            <div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 p-6 rounded-lg border border-gray-200 dark:border-gray-700">
                <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">
                    The lessons from the experiment conducted by Deming's Red Bead Experiment demonstration
                </h3>
                <video id="video3"
                       data-able-player
                       preload="metadata"
                       data-speed-icons="true"
                       class="w-full rounded-lg"
                       poster="{{ asset('storage/images/redbeadremoved.jpg') }}"
                       playsinline>
                    <source type="video/mp4" src="{{ asset('ablelvids/redbeads/redbeadsthree.mp4') }}">
                </video>
            </div>
        </div>
    </div>
</div>
    </div>

    <script>
        // Add any necessary JavaScript for interactive elements
        document.addEventListener('DOMContentLoaded', function() {
            // Additional interactive functionality can be added here
        });
    </script>
</div>