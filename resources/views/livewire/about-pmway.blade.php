{{-- resources/views/livewire/about.blade.php --}}
<div class="max-w-6xl mx-auto px-4 py-8 bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700" x-data="{ open: false, modalImg: null }">

    <h3 class="text-center text-2xl font-semibold mb-2 text-gray-900 dark:text-white">PMWay web is an ideas sandbox</h3>
    <p class="text-center text-sm mb-4 text-gray-600 dark:text-gray-300">Click the sandbox below for more information about this website</p>

    {{-- Sandbox toggle button --}}
    <div class="text-center mb-8">
        <button @click="open = !open" class="inline-block focus:outline-none">
            <img
                :src="open ? '{{ asset('storage/images/sandpit1.png') }}' : '{{ asset('storage/images/sandpitwithoutshadow.png') }}'"
                class="mx-auto w-80 sm:w-[28rem] md:w-[32rem] lg:w-[40rem] xl:w-[50rem] rounded-xl shadow-md transition-all duration-300"
                alt="PMWay Sandbox"
                title="Click here to learn Why PMWay?"
            >
        </button>
    </div>

    {{-- Collapsible content --}}
    <div x-show="open" x-transition class="space-y-6">

        @auth
            {{-- Logged-in user view --}}
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                <h5 class="text-center text-xl font-semibold mb-4 text-gray-900 dark:text-white">More Information About PMWay</h5>

                <div class="prose max-w-none dark:prose-invert">

                    <h1 class="text-gray-900 dark:text-white">PMWay: The Way to Project and Process Management Excellence</h1>
                    <br>

                    <ul class="list-disc list-inside space-y-4 text-gray-700 dark:text-gray-300">
                        <li>
                            I built PMWay to store and organize knowledge about Project and Process Management.
                            The <a href="/pmway/?slide=2" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300" target="_blank">Frameworks landscape</a> provides a quick overview of PMWay's scope.
                            Over time, the website evolved to support my ICT MSc Dissertation.
                            PMWay uses the PMBOK as its foundation because the PMBOK has status as a Standard grouped with ANSI, ISO, and BS Standards.
                        </li>

                        <li>
                            PMWay explains how to implement process improvements for higher Capability Maturity levels to increase Productivity and Quality. Process improvements also reduce Risk, Rework, and Waste.
                            <a href="/pmway/?slide=4" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">Capability Maturity Level 2 (CM L2) focuses on Project Management processes</a>.
                            CM L2 automatically establishes Good Governance.<br>
                            The ideas for operating at CM L2+ explored here
                            (<a href="#"
                                @click.prevent="modalImg='{{ asset('storage/images/mastersdissertationmodel20200201.jpg') }}'"
                                class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300 cursor-pointer">summarized in this model</a>)
                            apply wherever Quality and Productivity improvements and reducing
                            <a href="#"
                               @click.prevent="modalImg='{{ asset('storage/assets/chaos-report.pdf') }}'"
                               class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300 cursor-pointer">the chaos</a> are the goals.
                        </li>

                        <li>
                            The Project Management Body of Knowledge version 6 Dashboard (<a href="/pmbok-spa" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">the matrix on the PMWay home page</a>) is:
                            <p class="text-center italic text-gray-700 dark:text-gray-300">"the beating heart (as primal source and power center)"</p>

                            <div class="text-center relative" style="min-height: 100px;">
                                <img id="heart"
                                     src="{{ asset('storage/images/beatingheart.gif') }}"
                                     alt=""
                                     class="absolute w-16 h-20 cursor-move"
                                     style="left: 50%; transform: translate(-50%, 0);"
                                     title="Use your mouse and drag the heart around. Notice that when all is said and done, getting to the heart of project management, to do it right you will need to return to the processes found in the PMBOK Dashboard">
                            </div>
                            <p class="text-center italic text-gray-700 dark:text-gray-300">for the collated knowledge found in the PMBOK</p>

                            <p class="text-gray-700 dark:text-gray-300">Using this Dashboard, you can easily access all the PMBOK Processes and their <strong>*ITTOs</strong> found within the Guide.</p>

                            <table class="w-full border border-gray-300 dark:border-gray-600 p-2 bg-white dark:bg-gray-700">
                                <tr>
                                    <td class="p-2 text-gray-700 dark:text-gray-300">
                                        <strong>*ITTOs are:</strong> <em><strong>Process Inputs, Tools and Techniques, and Outputs</strong></em> - for each of the 49 PMBOK processes on the Dashboard.
                                        Processes (and their ITTOs) are used from the beginning (INITIATION) to the end (CLOSURE) of a project (cross-referenced by Knowledge Area), at each step of your project management journey. They form a well-defined method (think of it as a recipe with essential ingredients) for project management success.
                                    </td>
                                </tr>
                            </table>
                        </li>

                        <li>
                            <span class="text-gray-700 dark:text-gray-300">Using the PMBOK Dashboard means you can <strong>use</strong>, <strong>practice</strong>, and <strong>improve</strong> your grasp of the PMBOK version 6 processes (along with the associated ITTOs) as essential knowledge needed to:</span>
                            <ol class="list-decimal list-inside space-y-2 mt-2 text-gray-700 dark:text-gray-300">
                                <li>Pass the Project Management Institute (PMI) Certified Associate in Project Management (CAPM) exam</li>
                                <li>Pass the Agile Certified Practitioner (PMI-ACP) exam</li>
                                <li>Pass the PMI flagship certification - the Project Management Professional (PMP) exam</li>
                                <li>Gain solid knowledge of project management processes, their ITTOs, and their implementation order. You can also use the Process Selector Wheel to test your knowledge of Process Numbers and Processes.</li>
                                <li>Signed-up members can use the Notes Section to log ideas to <strong>tailor</strong> these processes. The art of effective tailoring and knowing what and why ITTOs should be included is key for audit purposes.</li>
                                <li>Since PMWay is about process improvement, other methodologies (ITIL, COBIT) may be required for effective implementation.
                                    <a href="#"
                                       @click.prevent="modalImg='{{ asset('storage/assets/itilagiledevops.pdf') }}'"
                                       class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300 cursor-pointer">Click here</a> for input.
                                </li>
                            </ol>
                        </li>

                        <li>
                            <span class="text-gray-700 dark:text-gray-300">Agile projects can now be run under the logic of the fully agile compliant PMBOK 6 Dashboard.
                            Each knowledge area contains a new section: <strong>Approaches for Agile, Iterative and Adaptive Environments</strong>.
                            Consider the <strong>PMI Agile Certified Practitioner (PMI-ACP)</strong> for specialized qualifications.
                            <br>
                            If you think PMBOK is outdated ("waterfall"), review the PMBOK "How To". For a fun test, use the pin:</span>
                            <div class="inline-block relative" style="min-height: 50px;">
                                <a href="/cmmi" title="Drag the pin around and then click this link to take the pin test" class="inline-block text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300">
                                    <u><i>where is your game really at</i></u></a>
                                <img id="pin" src="{{ asset('storage/images/pinlarge.png') }}" class="inline cursor-move absolute" ">

                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        @endauth

        @guest
            {{-- Guest view --}}
            <div class="space-y-6">
                <p class="text-left text-xl leading-relaxed text-gray-700 dark:text-gray-300">
                    PMWay is a resource website I started in 2009 and expanded to support my Master's of Science research in IT Infrastructure improvement (ITIL, COBIT etc.), software engineering and project management and process improvement.<br><br>

                    The site focuses on implementing Capability Maturity Model improvements to increase productivity and quality while reducing risk, rework, and waste. Capability Maturity Level 2 emphasizes project management processes and establishes good governance practices.<br><br>

                    The ideas explored here (<a href="#" @click.prevent="modalImg='{{ asset('storage/images/mastersdissertationmodel20200201.jpg') }}'" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300 cursor-pointer">summarized in this model</a>) apply wherever quality and productivity improvements are goals. Additional detail is available when you log into the website.<br><br>

                    The site has grown to over 6 TB with thousands of documents and resources. Due to its size, I host it from a home server.  I also use the web site when working to supply me the resources I need.  As such PMWay availability on the internet may vary.<br><br>

                    In addition to the above I use PMWay as my <a href="/cv/index.html" target="_blank" title="Click here to go to my portfolio" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300"><u>professional portfolio</u></a> to facilitate consulting contracts.  Also <a href="/portfolio" target="_blank" title="Click here to go to my portfolio" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300"><u>click here for a more indepth portfolio</u></a> exhibiting my deep knowledge and range of skills. <br>With 4 university degrees and over 35 years of experience in IT Infrastructure improvement (ITIL, COBIT etc.), software engineering and project management and process improvement, I'm available for consulting work if I am not already engaged with a client or employer.<br><br>

                    To discuss opportunities, please contact me via this website or find me on LinkedIn.
                </p>

                <h5 class="text-left text-xl font-semibold text-gray-900 dark:text-white">Keep well.</h5>
            </div>
        @endguest

    </div>

    {{-- Modal for images --}}
    <div x-show="modalImg"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50 p-4"
         @click="modalImg = null">
        <div class="relative max-w-4xl w-full max-h-[90vh] flex items-center justify-center" @click.stop>
            <button @click="modalImg = null"
                    class="absolute -top-12 right-0 text-white text-3xl bg-gray-800 rounded-full w-10 h-10 flex items-center justify-center hover:bg-gray-700 transition-colors">
                &times;
            </button>
            <div class="bg-white dark:bg-gray-900 rounded-lg p-4 max-w-full max-h-full overflow-auto border border-gray-200 dark:border-gray-700">
                <img x-show="modalImg && modalImg.match(/\.(jpg|jpeg|png|gif)$/i)"
                     :src="modalImg"
                     class="rounded-lg shadow-lg max-w-full max-h-[80vh] object-contain">
                <div x-show="modalImg && modalImg.match(/\.pdf$/i)"
                     class="text-center p-8">
                    <svg class="w-16 h-16 mx-auto text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <p class="mt-4 text-lg font-semibold text-gray-900 dark:text-white">PDF Document</p>
                    <p class="text-gray-600 dark:text-gray-400 mb-4">This is a PDF file that would open in a new window</p>
                    <a :href="modalImg"
                       target="_blank"
                       class="inline-block px-6 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors">
                        Open PDF
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Draggable setup --}}
    <script src="https://cdn.jsdelivr.net/npm/interactjs/dist/interact.min.js"></script>
    <script>
        // Initialize draggable elements
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof interact !== 'undefined') {
                // Make heart and pin freely draggable anywhere on the page
                interact('#heart, #pin').draggable({
                    inertia: true,
                    autoScroll: true,
                    listeners: {
                        start: function (event) {
                            // Add a slight visual feedback when dragging starts
                            event.target.style.opacity = '0.8';
                        },
                        move: function (event) {
                            var target = event.target;
                            var x = (parseFloat(target.getAttribute('data-x')) || 0) + event.dx;
                            var y = (parseFloat(target.getAttribute('data-y')) || 0) + event.dy;

                            // Apply the transformation
                            target.style.transform = 'translate(' + x + 'px, ' + y + 'px)';

                            // Update the position attributes
                            target.setAttribute('data-x', x);
                            target.setAttribute('data-y', y);
                        },
                        end: function (event) {
                            // Restore opacity when dragging ends
                            event.target.style.opacity = '1';
                        }
                    }
                });
            }
        });
    </script>

</div>
