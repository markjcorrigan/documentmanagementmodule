

<div class="min-h-screen bg-gray-50 dark:bg-gray-900 py-8 px-4 sm:px-6 lg:px-8">
{{--    --}}{{-- TEMPORARY DEBUG - REMOVE AFTER FIXING --}}
{{--    <div class="bg-red-100 border-2 border-red-500 p-4 m-4 rounded">--}}
{{--        <h3 class="font-bold text-lg">🔍 Debug Info:</h3>--}}
{{--        <p><strong>Logged In:</strong> {{ auth()->check() ? 'YES ✅' : 'NO ❌' }}</p>--}}
{{--        @auth--}}
{{--            <p><strong>User ID:</strong> {{ auth()->id() }}</p>--}}
{{--            <p><strong>User Email:</strong> {{ auth()->user()->email }}</p>--}}
{{--            <p><strong>User Name:</strong> {{ auth()->user()->name ?? 'N/A' }}</p>--}}
{{--        @else--}}
{{--            <p class="text-red-600 font-bold">YOU ARE NOT LOGGED IN!</p>--}}
{{--        @endauth--}}
{{--    </div>--}}
{{--    --}}{{-- END DEBUG --}}
    <div class="max-w-7xl mx-auto">

        <!-- Page Title -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">
                Understanding the PMBOK® Dashboard
            </h1>
            <p class="text-lg text-gray-600 dark:text-gray-400">
                Your visual roadmap for successful project management
            </p>
            <div class="w-full h-px bg-gray-300 dark:bg-gray-700 mt-4"></div>
        </div>

        <!-- Quick Start Box -->
        <div class="max-w-4xl mx-auto mb-8">
            <div class="flex space-x-3">
                <a href="{{ url('pmbok-spa') }}" target="_blank"
                   class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Back to the PMBOK6 Dashboard
                </a>
                <a href="{{ asset('storage/assets/pmboksixcomplex.pdf') }}" target="_blank"
                   class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    PMBOK 6 Process Map image as a 1000 ft overview
                </a>
            </div>
            <br>
            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 rounded-lg shadow-lg border-2 border-blue-300 dark:border-blue-700 p-6">
                <div class="flex items-start space-x-4">
                    <div class="flex-shrink-0">
                        <svg class="w-12 h-12 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-3">
                            Quick Start: What You Need to Know
                        </h2>
                        <div class="space-y-2 text-gray-700 dark:text-gray-300">
                            <p><strong>What is PMBOK?</strong> A proven guide for running successful projects, created by the Project Management Institute (PMI).</p>
                            <p><strong>What is the Dashboard?</strong> A visual map showing 49 steps (processes) that guide you from project start to finish.</p>
                            <p><strong>Why use it?</strong> It helps you avoid common mistakes and dramatically increases your chances of project success.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- The 5 Phases Overview -->
        <div class="max-w-5xl mx-auto mb-8">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md border border-gray-200 dark:border-gray-700 p-6">
                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4 text-center">
                    The 5 Project Phases (Process Groups)
                </h2>
                <p class="text-center text-gray-600 dark:text-gray-400 mb-6">
                    Think of these as the journey your project takes from idea to completion
                </p>

                <div class="grid md:grid-cols-5 gap-4">
                    <!-- Initiate -->
                    <div class="bg-green-50 dark:bg-green-900/20 rounded-lg p-4 border-2 border-green-300 dark:border-green-700">
                        <div class="text-center">
                            <div class="text-3xl mb-2">🚀</div>
                            <h3 class="font-bold text-green-800 dark:text-green-400 mb-2">1. Initiate</h3>
                            <p class="text-sm text-gray-700 dark:text-gray-300">Get approval to start</p>
                        </div>
                    </div>

                    <!-- Plan -->
                    <div class="bg-blue-50 dark:bg-blue-900/20 rounded-lg p-4 border-2 border-blue-300 dark:border-blue-700">
                        <div class="text-center">
                            <div class="text-3xl mb-2">📋</div>
                            <h3 class="font-bold text-blue-800 dark:text-blue-400 mb-2">2. Plan</h3>
                            <p class="text-sm text-gray-700 dark:text-gray-300">Decide what & how</p>
                        </div>
                    </div>

                    <!-- Execute -->
                    <div class="bg-yellow-50 dark:bg-yellow-900/20 rounded-lg p-4 border-2 border-yellow-300 dark:border-yellow-700">
                        <div class="text-center">
                            <div class="text-3xl mb-2">⚙️</div>
                            <h3 class="font-bold text-yellow-800 dark:text-yellow-400 mb-2">3. Execute</h3>
                            <p class="text-sm text-gray-700 dark:text-gray-300">Do the work</p>
                        </div>
                    </div>

                    <!-- Monitor & Control -->
                    <div class="bg-purple-50 dark:bg-purple-900/20 rounded-lg p-4 border-2 border-purple-300 dark:border-purple-700">
                        <div class="text-center">
                            <div class="text-3xl mb-2">👀</div>
                            <h3 class="font-bold text-purple-800 dark:text-purple-400 mb-2">4. Monitor</h3>
                            <p class="text-sm text-gray-700 dark:text-gray-300">Stay on track</p>
                        </div>
                    </div>

                    <!-- Close -->
                    <div class="bg-red-50 dark:bg-red-900/20 rounded-lg p-4 border-2 border-red-300 dark:border-red-700">
                        <div class="text-center">
                            <div class="text-3xl mb-2">✅</div>
                            <h3 class="font-bold text-red-800 dark:text-red-400 mb-2">5. Close</h3>
                            <p class="text-sm text-gray-700 dark:text-gray-300">Finish & hand over</p>
                        </div>
                    </div>
                </div>

{{--                <div class="mt-6 bg-gray-50 dark:bg-gray-900 rounded-lg p-4 border border-gray-200 dark:border-gray-700">--}}
{{--                    <p class="text-gray-700 dark:text-gray-300 text-center">--}}
{{--                        <strong>The Flow:</strong> Start at top left → Work through each step → End at top right.--}}
{{--                        Projects flow across and down through the Dashboard like water through connected pipes!--}}
{{--                    </p>--}}
{{--                </div>--}}
            </div>
        </div>

        <!-- Important Notes -->
        <div class="max-w-5xl mx-auto mb-8">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md border border-gray-200 dark:border-gray-700 p-6">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                    Important Things to Know
                </h2>

                <div class="space-y-4">
                    <div class="flex items-start space-x-3">
                        <div class="flex-shrink-0 mt-1">
                            <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 dark:text-white">PMBOK is NOT Traditional vs Agile or a waterfall model</h3>
                            <p class="text-gray-700 dark:text-gray-300">You can move backwards, iterate, and work in sprints. It's flexible!</p>
                            <p class="text-gray-700 dark:text-gray-300">To prove this point look at the Closing Process 4.7 on the PMBOK Dashboard below.  I.e. Close Project or Phase (or 2 week sprint)</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-3">
                        <div class="flex-shrink-0 mt-1">
                            <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 dark:text-white">Tailoring is essential</h3>
                            <p class="text-gray-700 dark:text-gray-300">You don't need to use everything. Adapt it to your project's needs. <strong>Best Practical beats Best Practice!</strong></p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-3">
                        <div class="flex-shrink-0 mt-1">
                            <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 dark:text-white">Each process has ITTO's</h3>
                            <p class="text-gray-700 dark:text-gray-300"><strong>Inputs</strong> (what you need), <strong>Tools & Techniques</strong> (how to do it), <strong>Outputs</strong> (what you create). <a href="/pmboksix/sixone" class="text-blue-600 dark:text-blue-400 hover:underline">Access them here</a>.</p>
                        </div>
                    </div>
                    <div class="mt-6 bg-gray-50 dark:bg-gray-900 rounded-lg p-4 border border-gray-200 dark:border-gray-700">
                        <p class="text-gray-700 dark:text-gray-300 text-center">
                            <strong>The Flow:</strong> Start at top left → Work through each step → End at top right.
                            Projects flow across and down through the Dashboard like water through connected pipes!
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dashboard Section -->
        <div class="w-full h-px bg-gray-300 dark:bg-gray-700 my-8"></div>

        <div class="text-center mb-6">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                The Interactive Dashboard
            </h2>
            <p class="text-gray-600 dark:text-gray-400 mb-4">
                <span class="font-semibold">👇 Hover your mouse over the image below to see how it works</span>
            </p>

            <div class="flex justify-center mb-8">
                <img class="max-w-full h-auto rounded-lg shadow-lg transition-all duration-300 hover:shadow-2xl"
                     src="{{ asset('storage/images/processdashmap.jpg') }}"
                     onmouseover="this.src='{{ asset('storage/images/processdashorig.png') }}'"
                     onmouseout="this.src='{{ asset('storage/images/processdashmap.jpg') }}'"
                     alt="PMBOK Process Dashboard">
            </div>

            <p class="text-gray-700 dark:text-gray-300 mb-4">
                See how processes connect across <strong>5 phases</strong> (top row) and <strong>10 knowledge areas</strong> (left column)?
                That's the power of the dashboard!
            </p>

            <div class="w-full h-px bg-gray-300 dark:bg-gray-700 my-8"></div>
        </div>

        <!-- Step by Step Guide -->
        <div class="max-w-5xl mx-auto space-y-4" x-data="{ openSection: null }">

            <!-- Step 1: Getting Started -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden border border-gray-200 dark:border-gray-700">
                <button @click="openSection = openSection === 1 ? null : 1"
                        class="w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-50 dark:hover:bg-gray-750 transition-colors">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        📚 Step 1: Getting Started with the Dashboard
                    </h3>
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 transform transition-transform"
                         :class="{ 'rotate-180': openSection === 1 }"
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>

                <div x-show="openSection === 1"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 transform -translate-y-2"
                     x-transition:enter-end="opacity-100 transform translate-y-0"
                     class="px-6 py-4 border-t border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900">

                    <div class="space-y-4 text-gray-700 dark:text-gray-300">

                        <!-- Simple Explanation -->
                        <div class="bg-blue-50 dark:bg-blue-900/20 rounded-lg p-4 border-l-4 border-blue-500">
                            <h4 class="font-bold text-lg mb-2 text-gray-900 dark:text-white">The Simple Version</h4>
                            <p>The Dashboard is like a GPS for your project. It shows you 49 connected steps (processes) organized in a grid. Follow the steps from top-left to top-right, and you'll successfully complete your project!</p>
                        </div>

                        <h4 class="font-semibold text-lg text-gray-900 dark:text-white">How It's Organized</h4>

                        <p><strong>Across the top (columns):</strong> The 5 project phases - Initiate, Plan, Execute, Monitor & Control, Close</p>

                        <p><strong>Down the left side (rows):</strong> The 10 knowledge areas - Integration, Scope, Schedule, Cost, Quality, Resources, Communications, Risk, Procurement, Stakeholders</p>

                        <p><strong>In each box:</strong> A specific process (numbered like 4.1, 5.2, etc.) with its inputs, tools, and outputs</p>

                        <div class="bg-yellow-50 dark:bg-yellow-900/20 rounded-lg p-4 border-l-4 border-yellow-500">
                            <p><strong>💡 Beginner Tip:</strong> Don't try to memorize all 49 processes! Just understand the flow: Start → Plan → Execute → Monitor → Close. The details will come with practice.</p>
                        </div>

                        <h4 class="font-semibold text-lg text-gray-900 dark:text-white">Breaking Down Complexity</h4>

                        <p>The PMBOK Guide is 756 pages long. This Dashboard gives you the essence in one visual page! Here's how it works:</p>

                        <ul class="list-disc list-inside space-y-2 ml-4">
                            <li><strong>Level 1 (Dashboard):</strong> Overall project roadmap - where you are now</li>
                            <li><strong>Level 2 (Process):</strong> Details for each of the 49 steps</li>
                            <li><strong>Level 3 (ITTO's):</strong> Specific inputs, tools, and outputs for each process</li>
                            <li><strong>Level 4 (PMBOK Process in action):</strong> In depth explanation given in the video below.</li>
                        </ul>

                        <div class="bg-green-50 dark:bg-green-900/20 rounded-lg p-4 border-l-4 border-green-500">
                            <p><strong>✅ Your Goal:</strong> At any point in your project, you should be able to point to where you are on the Dashboard. That's how you know you're in control!</p>
                        </div>

                        <h4 class="font-semibold text-lg text-gray-900 dark:text-white mt-6">Tailoring for Your Project</h4>

                        <p>Not every project needs all 49 processes in full detail. This is called <strong>tailoring</strong> - choosing what you need and leaving out what you don't.</p>

                        <p class="font-semibold">Remember: While BEST PRACTICE is ideal, BEST PRACTICAL is better!</p>

                        <p class="text-sm italic">Your stakeholders will appreciate a lean, focused approach over a 200-page plan that nobody reads. Start simple, add detail where needed.</p>
                    </div>
                </div>
            </div>

            <!-- Step 2: Walking Through Your Project -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden border border-gray-200 dark:border-gray-700">
                <button @click="openSection = openSection === 2 ? null : 2"
                        class="w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-50 dark:hover:bg-gray-750 transition-colors">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        🚶 Step 2: Walking Through Your Project (The Simple Flow)
                    </h3>
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 transform transition-transform"
                         :class="{ 'rotate-180': openSection === 2 }"
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>

                <div x-show="openSection === 2"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 transform -translate-y-2"
                     x-transition:enter-end="opacity-100 transform translate-y-0"
                     class="px-6 py-4 border-t border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900">

                    <div class="space-y-6 text-gray-700 dark:text-gray-300">

                        <!-- The Water Flow Analogy -->
                        <div class="bg-gradient-to-r from-blue-50 to-cyan-50 dark:from-blue-900/20 dark:to-cyan-900/20 rounded-lg p-5 border-2 border-blue-300 dark:border-blue-700">
                            <h4 class="font-bold text-lg mb-2 text-gray-900 dark:text-white">💧 Think of Water Flowing</h4>
                            <p>Imagine pouring water into the top-left of the Dashboard. The water flows down through the Initiate processes, then across and down through Planning, then Executing, then Monitoring, and finally out the top-right at Close. That's how your project flows!  If you have another phase in your project move back to the beginning and start working through the processes again!</p>
                        </div>

                        <h4 class="font-semibold text-xl text-gray-900 dark:text-white">Phase 1: INITIATE (Get Permission to Start)</h4>

                        <div class="ml-4 space-y-3">
                            <p><strong>Start with TWO critical documents:</strong></p>

                            <div class="bg-white dark:bg-gray-800 rounded-lg p-4 border border-gray-300 dark:border-gray-600">
                                <p><strong>📄 Process 4.1 - Project Charter</strong></p>
                                <p class="text-sm mt-1">This is your "ticket to ride." It officially authorizes your project. Without it signed by your sponsor, you don't have permission to spend time or money.</p>
                            </div>

                            <div class="bg-white dark:bg-gray-800 rounded-lg p-4 border border-gray-300 dark:border-gray-600">
                                <p><strong>👥 Process 13.1 - Stakeholder Register</strong></p>
                                <p class="text-sm mt-1">Who cares about this project? Who will be affected? List them here. Start with 4-5 key people, add more as you discover them.</p>
                            </div>
                        </div>

                        <div class="bg-red-50 dark:bg-red-900/20 rounded-lg p-4 border-l-4 border-red-500">
                            <p><strong>⚠️ Critical Rule:</strong> Do NOT move to Planning until your Charter is signed! No matter how much pressure you get to "just start." A project without a charter is like boarding a train without a ticket.</p>
                        </div>

                        <h4 class="font-semibold text-xl text-gray-900 dark:text-white mt-6">Phase 2: PLAN (The Most Important Phase)</h4>

                        <div class="bg-purple-50 dark:bg-purple-900/20 rounded-lg p-4 border-l-4 border-purple-500 mb-4">
                            <p class="font-semibold text-lg">Remember the Deming Cycle: PLAN → DO → CHECK → ACT</p>
                            <p class="text-sm mt-2">A dream without a plan is just a wish. Planning prevents disasters!</p>
                        </div>

                        <p><strong>The Master Plan (Process 4.2) is built from 10 sub-plans:</strong></p>

                        <div class="grid md:grid-cols-2 gap-3 ml-4 my-4">
                            <div class="bg-white dark:bg-gray-800 p-3 rounded border border-gray-300 dark:border-gray-600">
                                <p class="font-semibold">5.x Scope</p>
                                <p class="text-sm">What are we building?</p>
                            </div>
                            <div class="bg-white dark:bg-gray-800 p-3 rounded border border-gray-300 dark:border-gray-600">
                                <p class="font-semibold">6.x Schedule</p>
                                <p class="text-sm">When will we do it?</p>
                            </div>
                            <div class="bg-white dark:bg-gray-800 p-3 rounded border border-gray-300 dark:border-gray-600">
                                <p class="font-semibold">7.x Cost</p>
                                <p class="text-sm">How much will it cost?</p>
                            </div>
                            <div class="bg-white dark:bg-gray-800 p-3 rounded border border-gray-300 dark:border-gray-600">
                                <p class="font-semibold">8.x Quality</p>
                                <p class="text-sm">How good must it be?</p>
                            </div>
                            <div class="bg-white dark:bg-gray-800 p-3 rounded border border-gray-300 dark:border-gray-600">
                                <p class="font-semibold">9.x Resources</p>
                                <p class="text-sm">Who will do the work?</p>
                            </div>
                            <div class="bg-white dark:bg-gray-800 p-3 rounded border border-gray-300 dark:border-gray-600">
                                <p class="font-semibold">10.x Communications</p>
                                <p class="text-sm">How do we stay informed?</p>
                            </div>
                            <div class="bg-white dark:bg-gray-800 p-3 rounded border border-gray-300 dark:border-gray-600">
                                <p class="font-semibold">11.x Risk</p>
                                <p class="text-sm">What could go wrong?</p>
                            </div>
                            <div class="bg-white dark:bg-gray-800 p-3 rounded border border-gray-300 dark:border-gray-600">
                                <p class="font-semibold">12.x Procurement</p>
                                <p class="text-sm">What do we need to buy?</p>
                            </div>
                            <div class="bg-white dark:bg-gray-800 p-3 rounded border border-gray-300 dark:border-gray-600">
                                <p class="font-semibold">13.x Stakeholders</p>
                                <p class="text-sm">Who needs managing?</p>
                            </div>
                            <div class="bg-white dark:bg-gray-800 p-3 rounded border border-gray-300 dark:border-gray-600">
                                <p class="font-semibold">4.x Integration</p>
                                <p class="text-sm">How does it all fit together?</p>
                            </div>
                        </div>

                        <div class="bg-blue-50 dark:bg-blue-900/20 rounded-lg p-4 border-l-4 border-blue-500">
                            <p><strong>💡 Beginner Tip:</strong> Your plan doesn't need to be War & Peace! If your stakeholders agree, it can be one page. Just make sure you cover each of the 10 areas above.</p>
                        </div>

                        <p class="mt-4"><strong>Key Planning Process - 6.5 Develop Schedule:</strong></p>
                        <p class="ml-4">This is where you create your timeline. Think of it as your project GPS showing when you'll reach each milestone. Once approved, this becomes your <strong>baseline</strong> - your reference point for measuring progress.</p>

                        <h4 class="font-semibold text-xl text-gray-900 dark:text-white mt-6">Phase 3: EXECUTE (Do the Work)</h4>

                        <div class="ml-4 space-y-3">
                            <p><strong>Process 4.3 - Direct and Manage Project Work</strong></p>
                            <p>Now you actually DO what you planned! Execute your tasks, coordinate your team, and create your deliverables.</p>

                            <p><strong>Process 4.4 - Manage Project Knowledge</strong></p>
                            <p class="text-sm">Capture lessons learned as you go. What worked? What didn't? This helps future projects.</p>
                        </div>

                        <h4 class="font-semibold text-xl text-gray-900 dark:text-white mt-6">Phase 4: MONITOR & CONTROL (Stay on Track)</h4>

                        <div class="ml-4 space-y-3">
                            <p><strong>Process 4.5 - Monitor and Control Project Work</strong></p>
                            <p>Compare actual progress to your plan. Are you on schedule? On budget? Delivering what was promised?</p>

                            <p><strong>Process 4.6 - Perform Integrated Change Control</strong></p>
                            <p>When things change (and they will!), this is how you handle it. Don't just accept changes - assess impact and get approval.</p>
                        </div>

                        <div class="bg-yellow-50 dark:bg-yellow-900/20 rounded-lg p-4 border-l-4 border-yellow-500 mt-4">
                            <p><strong>⚠️ Common Mistake:</strong> Many projects skip monitoring until it's too late. Check your status weekly (or daily for fast-moving projects). Prevention is better than cure!</p>
                        </div>

                        <h4 class="font-semibold text-xl text-gray-900 dark:text-white mt-6">Phase 5: CLOSE (Finish Successfully)</h4>

                        <div class="ml-4 space-y-3">
                            <p><strong>Process 4.7 - Close Project or Phase</strong></p>
                            <p>Formally complete the project. Hand over deliverables, release resources, document final lessons, get sign-off. Don't just "finish" - close properly!</p>
                        </div>

                        <div class="bg-green-50 dark:bg-green-900/20 rounded-lg p-4 border-l-4 border-green-500 mt-4">
                            <p><strong>✅ Note:</strong> You can close by PHASE, not just at the final end. This allows for agile sprints and iterative development!</p>
                        </div>

                        <h4 class="font-semibold text-xl text-gray-900 dark:text-white mt-6">Understanding Baseline</h4>

                        <p>Think of baseline like this: You're at Point A. Your project will take you to Point B. The baseline is your approved route from A to B. If someone wants to change the destination to Point C, you need to:</p>

                        <ol class="list-decimal list-inside ml-4 space-y-2">
                            <li>Stop the project</li>
                            <li>Assess the impact (time, cost, resources)</li>
                            <li>Get approval for the new plan</li>
                            <li>Update your baseline</li>
                            <li>Continue to the new destination</li>
                        </ol>

                        <div class="bg-red-50 dark:bg-red-900/20 rounded-lg p-4 border-l-4 border-red-500 mt-4">
                            <p><strong>⚠️ Warning:</strong> Don't let executives pressure you to "just add it" without adjusting time/budget. More scope = more time/cost. Stand firm on this!</p>
                        </div>

                        <div class="mt-8 p-6 bg-gradient-to-r from-green-50 to-blue-50 dark:from-green-900/20 dark:to-blue-900/20 rounded-lg border-2 border-green-300 dark:border-green-700">
                            <h4 class="font-bold text-xl text-center text-gray-900 dark:text-white mb-3">🎯 The Bottom Line</h4>
                            <p class="text-center text-gray-700 dark:text-gray-300">Follow the Dashboard systematically. Don't skip steps. Don't start executing before planning. Don't stop monitoring. This is how successful projects are delivered!</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 3: Advanced Concepts -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden border border-gray-200 dark:border-gray-700">
                <button @click="openSection = openSection === 3 ? null : 3"
                        class="w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-50 dark:hover:bg-gray-750 transition-colors">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        🎓 Step 3: The "Castle & Moat" Concept (Advanced Thinking)
                    </h3>
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 transform transition-transform"
                         :class="{ 'rotate-180': openSection === 3 }"
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>

                <div x-show="openSection === 3"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 transform -translate-y-2"
                     x-transition:enter-end="opacity-100 transform translate-y-0"
                     class="px-6 py-4 border-t border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900">

                    <div class="space-y-6">
                        <div class="bg-purple-50 dark:bg-purple-900/20 rounded-lg p-4 border-l-4 border-purple-500">
                            <p class="text-gray-700 dark:text-gray-300"><strong>🏰 Imagine a castle protecting your execution phase:</strong> There's a moat, guardhouse, and drawbridge between Planning and Execution. Why? To prevent you from executing before you're ready!</p>
                        </div>

{{--                        <div class="flex justify-center my-6">--}}
{{--                            <img class="max-w-full h-auto rounded-lg shadow-md"--}}
{{--                                 src="{{ asset('storage/images/pmbokepmslip.png') }}"--}}
{{--                                 alt="PMBOK EPMS Slip"--}}
{{--                                 title="The Microsoft Enterprise Project Server is key towards professional delivery of projects">--}}
{{--                        </div>--}}

                        <p class="text-gray-700 dark:text-gray-300">
                            The "castle" sits right after <strong>Process 6.6 - Develop Schedule</strong>. This is your last checkpoint before execution begins. Can you see why this is critical?
                        </p>

                        <div class="bg-yellow-50 dark:bg-yellow-900/20 rounded-lg p-4">
                            <p class="text-gray-700 dark:text-gray-300 font-semibold">Think about it: If you start executing without a solid plan and schedule, you're like a knight charging out of the castle without armor or a strategy. Disaster awaits!</p>
                        </div>

                        <div class="flex justify-center my-6">
                            <img class="max-w-full h-auto rounded-lg shadow-md"
                                 src="{{ asset('storage/images/pmbok6gate.png') }}"
                                 alt="PMBOK Gate with Castle and Moat">
                        </div>

                        <div class="bg-blue-50 dark:bg-blue-900/20 rounded-lg p-4 border-l-4 border-blue-500">
                            <h4 class="font-bold text-lg mb-2 text-gray-900 dark:text-white">💡 The Lesson:</h4>
                            <p class="text-gray-700 dark:text-gray-300">The "moat" represents the discipline to complete your planning before rushing into execution. Organizations that respect this boundary have much higher success rates!</p>
                        </div>

                        <p class="text-gray-700 dark:text-gray-300 mt-4">
                            Learn more about <a href="/pin" class="text-blue-600 dark:text-blue-400 hover:underline" target="_blank">Capability Maturity Levels</a> to understand why process discipline matters so much.
                        </p>
                    </div>
                </div>
            </div>

        </div>

        <!-- Video Section -->

{{--        <!-- TEMPORARY DEBUG - Add this above your video section -->--}}
{{--        <div class="max-w-5xl mx-auto mb-8 p-6 bg-yellow-50 dark:bg-yellow-900/20 rounded-lg border-2 border-yellow-500">--}}
{{--            <h3 class="text-xl font-bold mb-4 text-gray-900 dark:text-white">🔍 Debug: Testing File Access</h3>--}}

{{--            <div class="space-y-4">--}}
{{--                <div>--}}
{{--                    <p class="font-semibold text-gray-900 dark:text-white mb-2">Video File:</p>--}}
{{--                    <a href="{{ asset('storage/assets/pmboksixprocesses.mp4') }}"--}}
{{--                       target="_blank"--}}
{{--                       class="text-blue-600 hover:underline break-all">--}}
{{--                        {{ asset('storage/assets/pmboksixprocesses.mp4') }}--}}
{{--                    </a>--}}
{{--                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Click to test - should download or play</p>--}}
{{--                </div>--}}

{{--                <div>--}}
{{--                    <p class="font-semibold text-gray-900 dark:text-white mb-2">Poster Image:</p>--}}
{{--                    <a href="{{ asset('storage/images/processflowvid.jpg') }}"--}}
{{--                       target="_blank"--}}
{{--                       class="text-blue-600 hover:underline break-all">--}}
{{--                        {{ asset('storage/images/processflowvid.jpg') }}--}}
{{--                    </a>--}}
{{--                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Click to test - should display image</p>--}}
{{--                </div>--}}

{{--                <div class="mt-4 p-4 bg-white dark:bg-gray-800 rounded">--}}
{{--                    <p class="font-semibold text-gray-900 dark:text-white mb-2">Test Image Display:</p>--}}
{{--                    <img src="{{ asset('storage/images/processflowvid.jpg') }}"--}}
{{--                         alt="Test"--}}
{{--                         class="max-w-md border-2 border-gray-300"--}}
{{--                         onerror="this.style.border='2px solid red'; this.alt='❌ IMAGE FAILED TO LOAD';">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!--Temporary debug section ends -->--}}

<!--- Able video playing from Laravel Storage --->

        <div class="w-full h-px bg-gray-300 dark:bg-gray-700 my-12"></div>

        <div class="max-w-5xl mx-auto mb-12">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md border border-gray-200 dark:border-gray-700 p-8">
                <div class="text-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">
                        🎥 Watch the Complete Visual Journey
                    </h2>
                    <p class="text-gray-600 dark:text-gray-400">
                        Understanding all 49 PMBOK processes and their connections
                    </p>
                </div>

                <div class="max-w-4xl mx-auto space-y-6">
                    <p class="text-center text-gray-700 dark:text-gray-300">
                        This video walks you through all 49 PMBOK processes and shows you exactly how they connect and why each one matters for project success.
                    </p>

                    <video
                        id="video1"
                        data-able-player
                        preload="auto"
                        poster="{{ asset('storage/images/processflowvid.jpg') }}"
                        style="width: 100%;"
                    >
                        <source type="video/mp4" src="{{ asset('storage/assets/pmboksixprocesses.mp4') }}" />
                    </video>
                    <br>

                    <div class="bg-green-50 dark:bg-green-900/20 rounded-lg p-4 border-l-4 border-green-500">

                        <p class="text-gray-700 dark:text-gray-300">

                            <strong>✅ After watching:</strong> You'll understand not just WHAT each process is, but WHY it exists and HOW it connects to the others. This is the key to mastering project management!
                        </p>
                    </div>

{{--                    <p class="text-sm text-center text-gray-500 dark:text-gray-400">--}}
{{--                        Tip: Use Able Player's accessible controls including keyboard shortcuts, playback speed adjustment, and caption support.--}}
{{--                    </p>--}}
                </div>
            </div>
        </div>


        <!-- Final CTA Section -->
        <div class="max-w-5xl mx-auto mt-12 mb-8">
            <div class="bg-gradient-to-r from-blue-600 to-indigo-600 dark:from-blue-700 dark:to-indigo-700 rounded-lg shadow-xl p-8 text-white">
                <h2 class="text-2xl font-bold mb-4 text-center">Ready to Master Project Management?</h2>
                <p class="text-center mb-6 text-blue-100">
                    The PMBOK Dashboard is your roadmap to success. Start simple, practice consistently, and you'll be running professional projects in no time!
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="/pmboksix/sixone" class="px-6 py-3 bg-white text-blue-600 rounded-lg font-semibold hover:bg-blue-50 transition-colors text-center">
                        Legacy PMBOK Dashboard - a good place for beginners to start
                    </a>
                    <a href="../contact" class="px-6 py-3 bg-blue-700 hover:bg-blue-800 rounded-lg font-semibold transition-colors text-center border-2 border-white">
                        Make Contact
                    </a>
                </div>
            </div>
        </div>

        <!-- Quick Reference Card -->
        <div class="max-w-5xl mx-auto mb-8">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md border border-gray-200 dark:border-gray-700 p-6">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4 text-center">
                    📋 Quick Reference: Your Project Checklist
                </h3>
                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <h4 class="font-semibold text-gray-900 dark:text-white mb-2">Before You Start:</h4>
                        <ul class="space-y-1 text-sm text-gray-700 dark:text-gray-300">
                            <li>☑️ Get Project Charter signed (4.1)</li>
                            <li>☑️ Identify key stakeholders (13.1)</li>
                            <li>☑️ Have sponsor approval</li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-900 dark:text-white mb-2">During Planning:</h4>
                        <ul class="space-y-1 text-sm text-gray-700 dark:text-gray-300">
                            <li>☑️ Define scope (what you're building)</li>
                            <li>☑️ Create schedule (when you'll deliver)</li>
                            <li>☑️ Estimate costs (budget needed)</li>
                            <li>☑️ Identify risks (what could go wrong)</li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-900 dark:text-white mb-2">During Execution:</h4>
                        <ul class="space-y-1 text-sm text-gray-700 dark:text-gray-300">
                            <li>☑️ Follow the plan</li>
                            <li>☑️ Manage your team</li>
                            <li>☑️ Create deliverables</li>
                            <li>☑️ Document lessons learned</li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-900 dark:text-white mb-2">Monitor & Control:</h4>
                        <ul class="space-y-1 text-sm text-gray-700 dark:text-gray-300">
                            <li>☑️ Track progress vs. plan</li>
                            <li>☑️ Manage changes formally</li>
                            <li>☑️ Communicate status regularly</li>
                            <li>☑️ Address issues quickly</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
