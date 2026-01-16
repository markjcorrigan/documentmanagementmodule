<style>
    /* SCOPE ALL STYLES TO .pmway-page-content TO PREVENT CONFLICTS */
    .pmway-page-content {
        /* Draggable & Droppable Styles */
    }

    .pmway-page-content .draggable-element {
        width: 100px;
        height: 100px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        font-weight: 600;
        cursor: move;
        user-select: none;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: all 0.2s ease;
        background: transparent !important;
        border: none !important;
        box-shadow: none !important;
    }

    .pmway-page-content .draggable-element:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }

    .pmway-page-content .droppable-target {
        width: 200px;
        height: 200px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 2px dashed;
        border-radius: 12px;
        transition: all 0.3s ease;
    }

    .pmway-page-content .ui-draggable-dragging {
        z-index: 1000;
        transform: rotate(5deg);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        background: transparent !important;
    }

    .pmway-page-content .highlight {
        background-color: #94be0f !important;
        border-color: navy !important;
        border-width: 3px !important;
    }

    /* Pin specific styles */
    .pmway-page-content #pinsmall,
    .pmway-page-content #pinlarge {
        background: transparent !important;
        border: none !important;
        box-shadow: none !important;
    }

    /* Carousel Styles - UPDATED FOR DYNAMIC HEIGHT */
    .pmway-page-content .carousel {
        position: relative;
        width: 100%;
        overflow: hidden;
        border-radius: 12px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        transition: height 0.6s ease-in-out; /* Smooth height transitions */
    }

    .pmway-page-content .carousel-inner {
        display: flex;
        transition: transform 0.6s ease-in-out;
        touch-action: pan-y pinch-zoom;
        width: 100%;
    }

    .pmway-page-content .carousel-item {
        min-width: 100%;
        flex-shrink: 0;
        transition: opacity 0.6s ease;
        width: 100%;
        box-sizing: border-box;
        display: flex;
        align-items: flex-start; /* Changed from center to flex-start */
        justify-content: center;
    }

    .pmway-page-content .carousel-item > div {
        width: 100%;
        display: flex;
        align-items: flex-start; /* Changed from center to flex-start */
        justify-content: center;
    }

    .pmway-page-content .carousel-control {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(0, 0, 0, 0.5);
        color: white;
        border: none;
        padding: 12px;
        cursor: pointer;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        z-index: 10;
    }

    .pmway-page-content .carousel-control:hover {
        background: rgba(0, 0, 0, 0.8);
        transform: translateY(-50%) scale(1.1);
    }

    .pmway-page-content .carousel-control.prev {
        left: 10px;
    }

    .pmway-page-content .carousel-control.next {
        right: 10px;
    }

    /* Slide Navigation */
    .pmway-page-content .slide-numbers {
        display: flex;
        flex-wrap: wrap;
        gap: 6px;
        justify-content: center;
        margin-top: 1rem;
        max-width: 100%;
    }

    .pmway-page-content .slide-number-btn {
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 2px solid transparent !important;
        background: transparent !important;
        color: #3b82f6;
        border-radius: 6px;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 0.75rem;
        font-weight: 600;
        flex-shrink: 0;
    }

    .pmway-page-content .slide-number-btn:hover,
    .pmway-page-content .slide-number-btn.active {
        background: #3b82f6 !important;
        color: white;
        transform: scale(1.1);
    }

    /* Mobile Slide Content */
    .pmway-page-content .mobile-slide-content {
        padding: 1rem;
        min-height: 300px;
        overflow-y: auto;
        width: 100%;
        box-sizing: border-box;
    }

    .pmway-page-content .slide-title {
        font-size: 1.25rem;
        font-weight: bold;
        margin-bottom: 1rem;
        text-align: center;
    }

    .pmway-page-content .slide-text {
        font-size: 0.875rem;
        line-height: 1.5;
    }

    .pmway-page-content .dark-slide-highlight {
        background: #374151 !important;
        color: #d1d5db !important;
        border: 1px solid #4b5563 !important;
    }

    /* WHITE BACKGROUND FOR SPECIFIC PNG IMAGES IN DARK MODE - OPT-IN */
    .dark .pmway-page-content img.max-w-full h-auto.white-bg {
        background: white !important;
        padding: 8px !important;
        border-radius: 8px !important;
        border: 2px solid white !important;
    }

    .dark .pmway-page-content .slide-number-btn {
        background: #374151 !important;
        color: #60a5fa;
    }

    .dark .pmway-page-content .slide-number-btn:hover,
    .dark .pmway-page-content .slide-number-btn.active {
        background: #60a5fa !important;
        color: #1f2937;
    }

    /* IMPORTANT: Scope button styles to ONLY affect page content, not header */
    .pmway-page-content .btn:not(flux\\:button),
    .pmway-page-content .btn-primary:not(flux\\:button) {
        background: transparent !important;
        border: 2px solid transparent !important;
        color: white;
        padding: 8px 16px;
        border-radius: 6px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .pmway-page-content .btn:hover:not(flux\\:button),
    .pmway-page-content .btn-primary:hover:not(flux\\:button) {
        background: rgba(59, 130, 246, 0.1) !important;
        border: 2px solid transparent !important;
        transform: scale(1.05);
    }

    /* Utility Classes */
    .pmway-page-content .hidden {
        display: none;
    }

    /* Layout fixes for pin and target */
    .pmway-page-content .flex.justify-center.items-center {
        justify-content: center !important;
        gap: 2rem !important;
    }

    .pmway-page-content #pinsmall,
    .pmway-page-content #target {
        flex-shrink: 0;
    }

    /* Dragging styles */
    .pmway-page-content .dragging-active {
        opacity: 0.9 !important;
        z-index: 9999 !important;
    }

    .pmway-page-content #pinlarge {
        position: relative !important;
        z-index: 100 !important;
    }

    /* Responsive Design */
    @media (min-width: 768px) {
        .pmway-page-content .carousel-control {
            width: 50px;
            height: 50px;
        }

        .pmway-page-content .carousel-control.prev {
            left: 20px;
        }

        .pmway-page-content .carousel-control.next {
            right: 20px;
        }

        .pmway-page-content .mobile-slide-content {
            padding: 2rem;
            min-height: 400px;
        }

        .pmway-page-content .slide-title {
            font-size: 1.5rem;
        }

        .pmway-page-content .slide-text {
            font-size: 1rem;
        }
    }

    /* FIX: Allow slides to determine their own height */
    .pmway-page-content .carousel-item {
        min-height: auto !important;
        height: auto !important;
    }

    .pmway-page-content .carousel-item > div {
        height: auto !important;
    }

    @media (max-width: 768px) {
        .pmway-page-content .flex.justify-center.items-center {
            flex-direction: row !important;
            justify-content: center !important;
            gap: 1rem !important;
            padding: 0 1rem;
        }

        .pmway-page-content #pinsmall,
        .pmway-page-content #target {
            width: auto;
            margin: 0;
        }
    }
</style>

{{-- ✅ CRITICAL: THIS WRAPPER DIV MAKES ALL THE SCOPED STYLES WORK --}}
<div class="pmway-page-content">

    <div class="min-h-screen bg-white dark:bg-gray-900 py-8">
        <!-- Header Section -->
        <div class="container mx-auto px-4 py-8 text-center">
            <img class="max-w-full h-auto mx-auto mb-4" src="{{ asset('storage/images/howdoyoudown.png') }}"
                 title="Have you documented and are you managing and optimizing your value chains in your Service Portfolios?"
                 onmouseover="this.src='{{ asset('storage/images/itil4game.png') }}'"
                 onmouseout="this.src='{{ asset('storage/images/howdoyoudown.png') }}'">
        </div>

        <!-- ITIL Value Stream Section -->
        <div class="container mx-auto px-4 py-8 text-center">
            <button class="btn align-center clearfix mb-4" type="button" onclick="toggleSection('itilSection')">
                <img class="max-w-full bg-white h-auto mx-auto white-bg"
                     src="{{ asset('storage/images/itilvaluestreams.png') }}">
            </button>

            <div id="itilSection" class="hidden">
                <div class="card text-center bg-white dark:bg-gray-800 shadow-lg rounded-lg">
                    <div class="card-header py-4">
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white">The ITIL 4 Value Streams underpin
                            Software and Hardware Engineering, encompassing Lean, Devops, Traditional Project Management
                            (TPM) and Agile Project Management (APM)</h3>
                    </div>

                    <div class="card-body py-6">


                        {{--                        <div id="moreInfoSection" class="hidden">--}}
                        {{--                            <div class="card text-center bg-gray-50 dark:bg-gray-700 rounded-lg p-4">--}}
                        {{--                    --}}
                        {{--                                <div class="border-2 border-gray-300 dark:border-gray-600 rounded-lg p-4 mx-auto max-w-2xl">--}}
                        {{--                                    <p class="text-center italic text-gray-700 dark:text-gray-300">--}}
                        {{--                                        <a href="/cmmi" class="text-blue-600 dark:text-blue-400">Click here to go to the--}}
                        {{--                                            Capability Maturity Model</a>.<br>--}}
                        {{--                                        Can you appreciate that <a href="/cmmi"--}}
                        {{--                                                                   class="text-blue-600 dark:text-blue-400">CM Level--}}
                        {{--                                            2</a> contains the project management processes found in the <a--}}
                        {{--                                                href="/pmway/?slide=1" class="text-blue-600 dark:text-blue-400">PMBOK 6--}}
                        {{--                                            dashboard?</a><br>--}}
                        {{--                                        And guess what... They are also found in <a href="/agile"--}}
                        {{--                                                                                    class="text-blue-600 dark:text-blue-400">agile!</a><br>--}}
                        {{--                                        <a href="/home/scrumdashboards#processes"--}}
                        {{--                                           class="text-blue-600 dark:text-blue-400">Can you spot them in the popular--}}
                        {{--                                            agile method Scrum's processes?</a>--}}
                        {{--                                    </p>--}}
                        {{--                                </div>--}}

                        {{--                                 <div class="h-8"></div>--}}

                        {{--                                <h6 class="font-semibold mb-4">Click the tile below for ideas to rapidly<br>"Up Your--}}
                        {{--                                    Game Stats" for CM L2+</h6>--}}

                        {{--                                <a href="/stats"--}}
                        {{--                                   title="Click here for information about upping production statistics and red bead removal">--}}
                        {{--                                    <img alt="Red Beads" class="max-w-full h-auto mx-auto"--}}
                        {{--                                         src="{{ asset('storage/images/redbeadsoutsmall.png') }}" style="z-index:999">--}}
                        {{--                                </a>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                    </div>

                    <div class="card-footer py-6">
                        <h1 class="text-2xl font-bold mb-4">Bottom Line</h1>
                        <h3 class="text-xl font-bold text-center text-gray-800 dark:text-white">
                            <b>Are you tired of the <a href="{{ asset('storage/assets/chaos-report.pdf') }}"
                                                       class="text-blue-600 dark:text-blue-400"
                                                       title="Click here for one of the original Chaos Reports. Sound familiar?"><u>Chaos</u></a>?</b><br>


                            <b>Click the link to find out if you are a <a href="{{ route('gamestats') }}#kkahn"
                                                                          class="text-blue-600 dark:text-blue-400"
                                                                          target="|_blank"><u>Kha Khan?</u> <img
                                            class="verticalalign max-w-full h-auto mx-auto my-2"
                                            src="{{ asset('storage/images/fishsmaller.png') }}"
                                            title="Click here if you are tired of the chaos!"></a></b><br>

                            <br>
                            <img class="verticalalign max-w-full h-auto mx-auto my-2"
                                 src="{{ asset('storage/images/firstfourmedium.png') }}"
                                 onmouseover="this.src='{{ asset('storage/images/firstfivemedium.png') }}'"
                                 onmouseout="this.src='{{ asset('storage/images/firstfourmedium.png') }}'"
                                 title="are tired of the chaos?">
                        </h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-center">
            <img alt="" src="{{ asset('storage/images/cmltwoplus.png') }}">
        </div>

        <!-- ITIL 4 Guiding Principles -->
        <div class="text-center my-8">
            <a href="/laws">
                <img class="max-w-full bg-white h-auto mx-auto white-bg"
                     src="{{ asset('storage/images/itil4gp2.png') }}"
                     onmouseover="this.src='{{ asset('storage/images/itil4gp1.png') }}'"
                     onmouseout="this.src='{{ asset('storage/images/itil4gp2.png') }}'"
                     title="hover for more on ITIL 4 and their Guiding Principles or click for the importance of Millars Law">
            </a>
        </div>

        <!-- Capability Maturity Section -->
        <div class="text-center my-8">
            <div class="flex flex-col md:flex-row items-center justify-center gap-4 mb-4">
                <a href="/cmmi" title="..." class="self-end mb-8">
                    <img class="max-w-full h-auto ui-draggable ui-draggable-handle" id="pinsmall"
                         src="{{ asset('storage/images/pinsmaller.png') }}" style="position: relative;" alt="pinned">
                </a>

                <button class="btn align-center clearfix" onclick="toggleSection('capMatSection')">
                    <img alt="CMMi gateway"
                         class="max-w-full h-auto bg-white" src="{{ asset('storage/images/gatewayflat.png') }}"
                         onmouseover="this.src='{{ asset('storage/images/gateway.png') }}'"
                         onmouseout="this.src='{{ asset('storage/images/gatewayflat.png') }}'">
                </button>

                <a href="/cmmi-landing" class="self-start -mt-12">
                    <div class="droppable-pin-area border-2 border-dashed border-gray-300 p-4 rounded-lg text-center mt-4">
                        <span class="text-gray-600">  <i class="fa-solid fa-crosshairs fa-2x"
                                                         title="Click the target for the project management and other processes to maintain and improve up to Capability Maturity Level 5"></i></span>
                    </div>
                </a>
            </div>

            <div id="capMatSection" class="hidden">
                <div class="card text-center bg-white dark:bg-gray-800 shadow-lg rounded-lg">
                    <div class="card-body py-6">
                        <h5 class="text-lg font-semibold mb-4 text-center">Achieve Business Value through Productivity
                            and Quality Improvements<br>
                            off the stable base of Project Process Management at Capability Maturity Model Level 2 <br>(+
                            Software Engineering (Dev), Services and
                            Acquisition processes above CM L2)</h5>

                        <button class="btn btn-primary mb-4" onclick="toggleSection('practiceSection')">
                            Process Focus<br>
                            <img class="max-w-full h-auto no-white-bg mx-auto my-2"
                                 src="{{ asset('storage/images/unlock.png') }}"
                                 title="Read the quotes from Dr Deming here to understand that a focus on processes is the only sure way to escape Capability Maturity Level 1 and below, in order to increase Productivity an Quality at CM L2 and above.">
                            <br>Productivity & Quality
                        </button>

                        <div id="practiceSection" class="hidden">
                            <!-- Practice content would go here -->
                        </div>

                        <h5 class="font-semibold mt-6 text-gray-800 dark:text-white">PMWay is all about ideas to improve
                            your <a href="/home/gamestats" class="text-blue-600 dark:text-blue-400">game stats</a></h5>

                        <img class="max-w-full h-auto mx-auto my-4"
                             src="{{ asset('storage/images/cmmproject2plus.png') }}"
                             onmouseover="this.src='{{ asset('storage/images/cmmproject2plusshadedbezelledone.png') }}'"
                             onmouseout="this.src='{{ asset('storage/images/cmmproject2plus.png') }}'"
                             title="Register with PMWay and let me help you find your way">

                        <p class="text-left text-gray-700 dark:text-gray-300">
                            <a href="/pin"
                               title="Where is your game at. Drag the pin with your mouse upwards to the Capability Maturity model or click the pin to take the test">
                                <img alt="" id="pinlarge" height="144" src="{{ asset('storage/images/pinlarge.png') }}"
                                     width="152">
                            </a>
                            I.e. can you pin down where is your game is currently at?
                        </p>

                        <br>

                        <h5 class="text-lg font-semibold text-center text-gray-800 dark:text-white">
                            If you think the game has changed from Traditional Project Management to Agile Project
                            Management<br>
                            I suggest you are wrong!
                        </h5>

                        <!-- Additional content would continue here -->
                    </div>
                </div>
            </div>
        </div>


        <div class="grid grid-cols-3 gap-0">
            {{-- Empty left cell --}}
            <div class="flex items-center justify-center p-2"></div>

            {{-- Center cell with image --}}
            <div class="flex items-center justify-center p-2">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img
                        alt="Animated GIF of Cogs going around and around to illustrate the idea of processes working together"
                        height="50"
                        src="{{ asset('storage/images/cogsworking.gif') }}"
                        width="73"
                        class="cursor-pointer transition-all duration-300 hover:opacity-80 hover:scale-105"
                        title=""
                >
            </div>

            {{-- Empty right cell --}}
            <div class="flex items-center justify-center p-2"></div>
        </div>

        <!-- Carousel Section -->
        <div class="container mx-auto px-4 py-8">
            <h2 class="text-2xl font-bold mb-4 text-gray-800 dark:text-white text-center">1000 Foot Overview (Process
                Flythrough)</h2>

            <!-- TOP SECTION: Previous/Next Buttons -->
            <div class="mb-4 flex flex-wrap justify-center gap-2">
                <button class="px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white rounded-lg transition-colors text-sm font-medium"
                        onclick="carouselPrev()">
                    ← Previous Slide
                </button>
                <button class="px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white rounded-lg transition-colors text-sm font-medium"
                        onclick="carouselNext()">
                    Next Slide →
                </button>
            </div>

            <!-- TOP SECTION: Numbered Navigation -->
            <div class="slide-numbers mb-4" id="slideNumbersTop">
                <!-- Number buttons will be generated by JavaScript -->
            </div>

            <!-- Custom Tailwind Carousel -->
            <div class="carousel bg-blue-50 dark:bg-gray-800 p-6 transition-colors duration-300">
                <div class="carousel-inner">
                    <!-- Your 16 slides go here - I'll include just the structure for brevity -->
                    <!-- Copy all your slide content from the original file -->

                    <!-- ============================ -->
                    <!-- SLIDE 1: PMBOK DASHBOARD CONTENT AREA -->
                    <!-- ============================ -->

                    <div class="carousel-item">
                        <div class="flex items-center justify-center bg-white dark:bg-gray-800 py-2">
                            <div class="text-center w-full max-w-4xl text-gray-900 dark:text-white">
                                <!-- ⬇️ ADD THIS CONTAINER ⬇️ -->
                                <div class="max-w-6xl mx-auto px-4 py-8">

                                    <!-- YOUR SLIDE CONTENT GOES HERE -->
                                    <h3 class="text-2xl font-semibold text-gray-900 dark:text-white text-center mb-4">
                                        Your "Body of Knowledge" Gateway
                                    </h3>

                                    <!-- Interactive Dashboard Image -->
                                    <div class="bg-white dark:bg-gray-800 rounded-lg p-4 border border-gray-300 dark:border-gray-700 shadow-md">
                                        <map id="ImgMap0" name="ImgMap0">
                                            <area coords="58, 53, 339, 351" href="/pmbok-process-example" shape="rect"
                                                  title="Click here for a quick demo">
                                        </map>

                                        <img alt="PMBOK Dashboard Header"
                                             class="max-w-full h-auto bg-white dark:bg-white mx-auto" style="z-index:1"
                                             src="{{ asset('storage/images/dashheadflat.png') }}"
                                             onmouseover="this.src='{{ asset('storage/images/dashheadraised.png') }}'"
                                             onmouseout="this.src='{{ asset('storage/images/dashheadflat.png') }}'">
                                        <br>

                                        {{--                                        <map id="ImgMap4" name="ImgMap4">--}}
                                        {{--                                            <area alt="" coords="130, 110, 250, 209" href="/home/fourone" shape="rect">--}}
                                        {{--                                            <area alt="" coords="250, 110, 367, 208" href="/home/fourtwo" shape="rect">--}}
                                        {{--                                            <!-- ... include all other area tags ... -->--}}
                                        {{--                                            <area alt="" coords="0, 940, 131, 1000" href="/home/ppm" shape="rect">--}}
                                        {{--                                        </map>--}}

                                        <a href="/pmbok-process-example" target="_blank">
                                            <img alt="PMBOK Process Dashboard"
                                                 class="max-w-full h-auto bg-white dark:bg-white mx-auto mt-2"
                                                 style="z-index:0"
                                                 src="{{ asset('storage/images/mainprocessdashraisednormalflat.png') }}"
                                                 onmouseover="this.src='{{ asset('storage/images/mainprocessdashraisednormalbezelledone.png') }}'"
                                                 onmouseout="this.src='{{ asset('storage/images/mainprocessdashraisednormalflat.png') }}'"
                                                 title="Click the hand (process 4.1) to see a demo of the itto dashboard for PMBOK Process 4.1">
                                        </a>
                                    </div>

                                    <!-- PMBOK Dashboard Info Collapse -->
                                    {{--                                    <div x-data="{ open:false }" class="my-4">--}}
                                    {{--                                        <button--}}
                                    {{--                                                @click="open = !open"--}}
                                    {{--                                                class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow w-full transition-colors">--}}
                                    {{--                                            The PMBOK 6 Dashboard--}}
                                    {{--                                        </button>--}}

                                    {{--                                        <div x-show="open" x-collapse--}}
                                    {{--                                             class="mt-3 bg-white dark:bg-gray-800 rounded-lg border border-gray-300 dark:border-gray-700 p-4 shadow-md">--}}
                                    <div class="space-y-4 text-lg leading-relaxed text-gray-700 dark:text-gray-300">
                                        <div class="h-8"></div>
                                        <h3 class="text-2xl font-semibold text-gray-900 dark:text-white text-center mb-4">
                                            The Project Management Body of Knowledge Guide<br>(version 6 released
                                            September
                                            2017)<br>
                                            is still the 'how to do it' checklist for Project Management
                                            Professionals.
                                        </h3>


                                        <p class="text-left text-gray-700 dark:text-gray-300">
                                            If you understand the PMBOK you will understand that this game (the
                                            processes and inputs, tools and techniques, and outputs (itto's))
                                            from the
                                            PMBOK Dashboard below) is the same for both Traditional and Agile
                                            Project Management!<br>
                                            This truth, enabling the successful running of projects, remains the
                                            same even though PMBOK version 7 and 8 are now released.
                                        </p>

                                        <img alt="The game"
                                             class="max-w-full h-auto bg-white dark:bg-white mx-auto"
                                             src="{{ asset('storage/images/thegamelargewhite.jpg') }}">

                                        <p class="text-left text-gray-700 dark:text-gray-300">
                                            The dashboard assists understanding of the PMBOK processes (+
                                            "ittos") to help you to pass the PMI exams and run projects better
                                            at
                                            <a href="/cmmi-landing"
                                               class="text-blue-600 dark:text-blue-400 underline font-semibold hover:opacity-80">Capability
                                                Maturity Level 2+</a>.
                                            <br>The PMBOK processes (underpinned by the latest thinking found in
                                            the
                                            <em>PMI Agile Certified Practitioner (PMI-ACP) qualification</em>
                                            and others) incorporates <a href="/scrum-dashboards"
                                                                        class="text-blue-600 dark:text-blue-400 underline font-semibold hover:opacity-80">Lean
                                                and Agile</a> thinking.
                                        </p>

                                        <p class="text-left text-gray-700 dark:text-gray-300">
                                            Oh, also... do not forget that the PMBOK operates as a Standard!
                                            See this on the next slide.
                                        </p>

                                        <p class="text-left text-gray-700 dark:text-gray-300">
                                            A quick note to those "Traditional is not Agile" out there.
                                            Find process 4.7 on the PMBOK dashboard (Close Project or
                                            Phase).
                                            <br>Did you know that "tailoring" these processes means you can run
                                            a project phase
                                            as... wait for it... a two week sprint!<br>See the truth of this on slide
                                            12.
                                        </p>

                                        <p class="text-left text-gray-700 dark:text-gray-300">
                                            Operating thus, as a Professional who understands Project Management
                                            Process,
                                            (supported by your Executive [Executive Action Team (to EAT
                                            <a href="/red-bead-experiment"
                                               class="text-blue-600 dark:text-blue-400 underline hover:opacity-80">"the
                                                red beads,"</a>)])
                                            using <a href="/agile-methods?slide=13"
                                                     class="text-blue-600 dark:text-blue-400 underline hover:opacity-80"
                                                     target="_blank">best
                                                selected project methodology with the project selection
                                                matrix</a>,
                                            <br>there is less chance of dropping the ball.
                                        </p>

                                        <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg border border-gray-200 dark:border-gray-600">
                                            <img alt="drop the ball"
                                                 class="max-w-full h-auto bg-white dark:bg-white mx-auto"
                                                 src="{{ asset('storage/images/droptheball.png') }}">
                                        </div>

                                        <div class="text-center mt-4">
                                            <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">
                                                Bottom Line</h4>
                                            <p class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                                                While (when) BEST PRACTICE is understood,
                                                <br>BEST PRACTICAL (from an agile and lean perspective) can be
                                                better!
                                            </p>
                                        </div>
                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}


                                        <!-- YOUR NAVIGATION SECTION GOES HERE -->
                                    <!-- Navigation Section -->
                                        <!-- SPACING FIX FOR LIVEWIRE -->
                                        <div class="h-12"></div>

                                        <!-- Navigation Section -->
                                        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6">
                                            Slide Navigation
                                        </h3>

                                        <div class="flex flex-wrap gap-4 justify-center">
                                            <button
                                                    onclick="carouselPrev()"
                                                    class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 dark:bg-gray-500 dark:hover:bg-gray-600 text-white rounded-lg transition-colors"
                                            >
                                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                                </svg>
                                                Previous Slide
                                            </button>

                                            <button
                                                    onclick="carouselNext()"
                                                    class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white rounded-lg transition-colors"
                                            >
                                                Next Slide
                                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    </div>

                                </div>
                                <!-- ⬆️ END CONTAINER ⬆️ -->
                            </div>
                        </div>
                    </div>






                    <!-- ============================ -->
                    <!-- END SLIDE 1: PMBOK DASHBOARD -->
                    <!-- ============================ -->

                    <!-- ============================ -->
                    <!-- SLIDE 2: STANDARDS FRAMEWORK CONTENT AREA -->
                    <!-- ============================ -->

                    <div class="carousel-item">
                        <div class="flex items-center justify-center bg-white dark:bg-gray-800 py-2">
                            <div class="text-center w-full max-w-4xl text-gray-900 dark:text-white">
                                <!-- ⬇️ ADD THIS CONTAINER ⬇️ -->
                                <div class="max-w-6xl mx-auto px-4 py-8">

                                    <!-- YOUR SLIDE CONTENT GOES HERE -->
                                    <h3 class="text-2xl font-semibold text-gray-900 dark:text-white text-center">
                                        Standards, Frameworks and Methodologies etc., by focus area
                                    </h3>

                                    <p class="text-xl text-gray-700 dark:text-gray-300 text-center">
                                        Note that the PMBOK is a
                                        <a href="https://www.pmi.org/pmbok-guide-standards/foundational"
                                           class="text-blue-600 dark:text-blue-400 underline font-semibold hover:opacity-80">
                                            Standard
                                        </a>!
                                    </p>

                                    <div class="bg-white dark:bg-gray-800 rounded-lg p-4 border border-gray-300 dark:border-gray-700 shadow-md">
                                        <img class="w-full h-auto rounded-lg shadow-sm bg-white dark:bg-white"
                                             src="{{ asset('storage/images/standardsframels.jpg') }}">
                                    </div>

                                    <div class="bg-white dark:bg-gray-800 rounded-lg p-4 border border-gray-300 dark:border-gray-700 shadow-md">
                                        <img class="w-full h-auto rounded-lg shadow-sm bg-white dark:bg-white"
                                             src="{{ asset('storage/images/pptone.png') }}">
                                    </div>

                                    <div class="bg-white dark:bg-gray-800 rounded-lg p-4 border border-gray-300 dark:border-gray-700 shadow-md">
                                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 text-center italic">
                                            Answer the questions about People, Process and Technology from the image
                                            above.<br>(Slide 6) discusses the P-P-T triangle (triad).
                                        </p>
                                    </div>

                                    <!-- TIME COST QUALITY COLLAPSE -->
                                    <div x-data="{ open:false }" class="my-4">
                                        <div class="flex items-center justify-center w-full">
                                            <button
                                                    @click="open = !open"
                                                    class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow transition-colors flex items-center justify-center space-x-2 w-full max-w-md mx-auto">
                                                <span class="text-xl text-center">Time, Cost and Quality: The Essence of Project Management!</span>
                                                <!-- DOWN ARROW when closed -->
                                                <svg x-show="!open" class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                </svg>
                                                <!-- UP ARROW when open -->
                                                <svg x-show="open" class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                                                </svg>
                                            </button>
                                        </div>

                                        <div x-show="open" x-collapse
                                             class="mt-3 bg-white dark:bg-gray-800 rounded-lg border border-gray-300 dark:border-gray-700 p-4 shadow-md">
                                            <p class="text-xl text-gray-700 dark:text-gray-300 text-center">
                                                Can you find the Knowledge Areas: Time (Schedule), Cost, Scope (how much
                                                in this project phase) on the PMBOK 6 Dashboard (slide 1)? <div class="h-8"></div>
                                            Can you see that the Quality Knowledge Area is tied closely to these
                                            three dimensions? <div class="h-8"></div>
                                            What about the Resources and Risk Knowledge Areas?<br>Can you see where
                                            they fit into the PMBOK 6 Dashbaord? <div class="h-8"></div>
                                            </p>

                                            <div class="space-y-4">
                                                <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg border border-gray-200 dark:border-gray-600">
                                                    <img class="w-full h-auto rounded-lg bg-white dark:bg-white"
                                                         src="{{ asset('storage/images/timecostquality.png') }}">
                                                </div>

                                                <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg border border-gray-200 dark:border-gray-600">
                                                    <img class="w-full h-auto rounded-lg bg-white dark:bg-white"
                                                         src="{{ asset('storage/images/6%20constraints.jpg') }}">
                                                </div>

                                                <p class="text-xl text-gray-700 dark:text-gray-300 text-center">Below is
                                                    the game! Can you see it? <div class="h-8"></div>Remember that all games are broken
                                                down into sections (rounds, phases, sprints etc.). Take american
                                                football. Four quarters, numerous downs etc. <div class="h-8"></div>To say that
                                                Traditional Project Management is waterfall without any phases means
                                                you do not understand how the Project Body of Knowledge works!</p>

                                                <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg border border-gray-200 dark:border-gray-600">
                                                    <img class="w-full h-auto rounded-lg bg-white dark:bg-white"
                                                         src="{{ asset('storage/images/corefacilitate1.png') }}">
                                                </div>
                                            </div>
                                            <div class="h-8"></div>

                                            <p class="text-xl text-gray-700 dark:text-gray-300 text-center">For Agile
                                                (Scrum or <a href="/agile-methods"
                                                             class="text-blue-600 dark:text-blue-400 underline hover:opacity-80">other
                                                    agile methods</a>) the game is to release value sprint by sprint!
                                            <div class="h-8"></div>If you are not doing this then you are (<a href="/gamestats"
                                                                                                              class="text-blue-600 dark:text-blue-400 underline hover:opacity-80"><u>down
                                                    stat</u></a>) and on a losing trend (condition or streak).</p>
                                        </div>
                                    </div>
                                    <!-- END TIME COST QUALITY COLLAPSE -->

                                    <!-- GOVERNANCE COLLAPSE -->
                                    <div x-data="{ open:false }" class="my-4">
                                        <div class="flex items-center justify-center w-full">
                                            <button
                                                    @click="open = !open"
                                                    class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow transition-colors flex items-center justify-center space-x-2 w-full max-w-md mx-auto">
                                                <span class="text-xl">Under Control?</span>
                                                <!-- DOWN ARROW when closed -->
                                                <svg x-show="!open" class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                </svg>
                                                <!-- UP ARROW when open -->
                                                <svg x-show="open" class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                                                </svg>
                                            </button>
                                        </div>

                                        <div x-show="open" x-collapse
                                             class="mt-3 bg-white dark:bg-gray-800 rounded-lg border border-gray-300 dark:border-gray-700 p-4 shadow-md">
                                            <h3 class="text-2xl font-semibold text-gray-900 dark:text-white text-center mb-4">
                                                Governance and Execution</h3>

                                            <div class="space-y-4 text-lg leading-relaxed text-gray-700 dark:text-gray-300">
                                                <p class="text-xl text-gray-700 dark:text-gray-300 text-center">
                                                    <span class="font-semibold">Governance</span> (from Latin <em>gubernare</em>,
                                                    meaning "to steer") relates to steering
                                                    a project, boat, horse, or organisation.<br>
                                                    Other related words: governor, navigator, pilot, rudder, helm — all
                                                    leadership metaphors.
                                                </p>

                                                <p class="text-xl text-gray-700 dark:text-gray-300 text-center">
                                                    <span class="font-semibold">Execution</span> (Latin
                                                    <em>executio</em>) means "accomplishment/fulfilment".<br>
                                                    It's about professional ability and tight management to produce
                                                    results.
                                                </p>
                                            </div>

                                            <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg border border-gray-200 dark:border-gray-600 mt-4">
                                                <img class="w-full h-auto rounded-lg bg-white dark:bg-white"
                                                     src="{{ asset('storage/images/horsewellridden.png') }}">
                                            </div>

                                            <h4 class="text-xl font-semibold text-gray-900 dark:text-white text-center mt-4 mb-3">
                                                Are your projects under control? <div class="h-8"></div>
                                                Control means the ability to Start, Change, Stop. <div class="h-8"></div>
                                                When you stop changing, have you arrived at your planned goal and produced planned value?
                                            </h4>

                                            <p class="text-xl text-gray-700 dark:text-gray-300 text-center">
                                                Projects are temporary and move you
                                                <a href="/vmodel"
                                                   class="text-blue-600 dark:text-blue-400 underline hover:opacity-80">across
                                                    a gap</a> from one baseline to an improved one.
                                            </p>
                                            <p class="text-xl text-gray-700 dark:text-gray-300 text-center">
                                                <span class="font-semibold">Planning</span>, <span
                                                        class="font-semibold">Execution</span> and
                                                <span class="font-semibold">Monitoring & Control</span> ensure
                                                the project is being driven safely and that value is being delivered and accountability to stakeholders.
                                            </p> <div class="h-8"></div>
                                            <p class="text-xl text-gray-700 dark:text-gray-300 text-center">
                                                Can you find these on them PMBOK dashboard (slide 1). Also take a
                                                look at the PDCA process (slide 16)).
                                            </p> <div class="h-8"></div>

                                            <p class="text-xl text-gray-700 dark:text-gray-300 text-center">
                                                The Agile debate notwithstanding, Projects are either under control and
                                                delivering value or they are not.
                                            </p> <div class="h-8"></div>

                                            <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg border border-gray-200 dark:border-gray-600 mt-4">
                                                <img class="w-full h-auto rounded-lg bg-white dark:bg-white"
                                                     src="{{ asset('storage/images/horse.png') }}"
                                                     onmouseover="this.src='{{ asset('storage/images/horseoutofcontrol.jpg') }}'"
                                                     onmouseout="this.src='{{ asset('storage/images/horse.png') }}'">
                                            </div>

                                            <!-- SCRUM GOVERNANCE COLLAPSE -->
                                            <div x-data="{ openScrum:false }" class="mt-4">
                                                <div class="flex items-center justify-center w-full">
                                                    <button
                                                            @click="openScrum = !openScrum"
                                                            class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow transition-colors flex items-center justify-center space-x-2 w-full max-w-md mx-auto">
                                                        <span class="text-xl">Governance for Agile's Scrum?</span>
                                                        <!-- DOWN ARROW when closed -->
                                                        <svg x-show="!openScrum" class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                        </svg>
                                                        <!-- UP ARROW when open -->
                                                        <svg x-show="openScrum" class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                                                        </svg>
                                                    </button>
                                                </div>

                                                <div x-show="openScrum" x-collapse
                                                     class="mt-3 bg-white dark:bg-gray-800 rounded-lg border border-gray-300 dark:border-gray-700 p-4 shadow-md">
                                                    <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg border border-gray-200 dark:border-gray-600">
                                                        <img class="w-full h-auto rounded-lg bg-white dark:bg-white"
                                                             src="{{ asset('storage/images/scrumgovernance.png') }}">
                                                    </div>

                                                    {{-- <p class="text-xl text-gray-700 dark:text-gray-300 text-center">
                                                        <a href="/home/scrumvaluemodel#demoapproved"
                                                           class="text-blue-600 dark:text-blue-400 underline hover:opacity-80">Click
                                                            here for more on this</a>.
                                                    </p> --}}

                                                    <div class="text-lg text-gray-600 dark:text-gray-400 mt-2 italic">
                                                        Above page from <em>Scrum for Dummies 2018</em>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END SCRUM GOVERNANCE COLLAPSE -->
                                        </div>
                                    </div>

                                    <!-- YOUR NAVIGATION SECTION GOES HERE -->
                                    <!-- Navigation Section -->
                                    <!-- SPACING FIX FOR LIVEWIRE -->
                                    <div class="h-8"></div>

                                    <!-- Navigation Section -->
                                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                                            Slide Navigation
                                        </h3>

                                        <div class="flex flex-wrap gap-4 justify-center">
                                            <button
                                                    onclick="carouselPrev()"
                                                    class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 dark:bg-gray-500 dark:hover:bg-gray-600 text-white rounded-lg transition-colors"
                                            >
                                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                                </svg>
                                                Previous Slide
                                            </button>

                                            <button
                                                    onclick="carouselNext()"
                                                    class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white rounded-lg transition-colors"
                                            >
                                                Next Slide
                                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>

                                </div>
                                <!-- ⬆️ END CONTAINER ⬆️ -->
                            </div>
                        </div>
                    </div>





                    <!-- END carousel-item -->
                    <!-- ============================ -->
                    <!-- END SLIDE 2: STANDARDS FRAMEWORK -->
                    <!-- ============================ -->

                    <!-- ============================ -->
                    <!-- SLIDE 3: STRATEGY WALL CONTENT AREA -->
                    <!-- ============================ -->

                    <div class="carousel-item">
                        <div class="flex items-center justify-center bg-white dark:bg-gray-800 py-2">
                            <div class="text-center w-full max-w-4xl text-gray-900 dark:text-white">
                                <!-- ⬇️ ADD THIS CONTAINER ⬇️ -->
                                <div class="max-w-6xl mx-auto px-4 py-8">

                                    <!-- YOUR SLIDE CONTENT GOES HERE -->
                                    h3 class="text-2xl font-semibold text-gray-900 dark:text-white text-center">
                                    The Strategy Wall
                                    </h3>

                                    <div class="bg-white dark:bg-gray-800 rounded-lg p-4 border border-gray-300 dark:border-gray-700 shadow-md">
                                        <img class="w-full h-auto rounded-lg shadow-sm bg-white dark:bg-white cursor-pointer"
                                             src="{{ asset('storage/images/strategywall850.png') }}"
                                             onmouseover="this.src='{{ asset('storage/images/legobrickbox.png') }}'"
                                             onmouseout="this.src='{{ asset('storage/images/strategywall850.png') }}'"
                                             alt="Strategy Wall Visualization">
                                    </div>

                                    <p class="text-lg text-gray-700 dark:text-gray-300 text-center italic">
                                        Click the image above (to open the PMP CMMi lego brick) and reveal the secret to
                                        successful strategy (and project) Implementation.
                                    </p>

                                    <!-- STRATEGY COLLAPSE -->
                                    <div x-data="{ open:false }" class="my-4">
                                        <div class="flex items-center justify-center w-full">
                                            <button
                                                    @click="open = !open"
                                                    class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow transition-colors flex items-center justify-center space-x-2 w-full max-w-md mx-auto">
                                                <span class="text-xl">Strategy</span>
                                                <!-- DOWN ARROW when closed -->
                                                <svg x-show="!open" class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                </svg>
                                                <!-- UP ARROW when open -->
                                                <svg x-show="open" class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                                                </svg>
                                            </button>
                                        </div>

                                        <div x-show="open" x-collapse
                                             class="mt-3 bg-white dark:bg-gray-800 rounded-lg border border-gray-300 dark:border-gray-700 p-4 shadow-md">

                                            <div class="space-y-4 text-lg leading-relaxed text-gray-700 dark:text-gray-300">
                                                <p class="text-xl text-gray-700 dark:text-gray-300">
                                                    Do you know that many formulated strategies (and projects) fail in Implementation. Have you
                                                    found using Balanced Scorecard (in itself) has not been that successful?
                                                </p>

                                                <p class="text-xl text-gray-700 dark:text-gray-300">
                                                    Did you see the PMP and CMMi lego brick (at the top right of the image above)? <br>It is to the
                                                    right of the Balanced Scorecard, enabling it for success.
                                                </p>

                                                <p class="text-xl text-gray-700 dark:text-gray-300">
                                                    Make careful note of how to empower these bricks (all the bricks in the strategy) at CM Level 2+
                                                    per the image below!<br>
                                                    I.e. If Strategy Plan Formulation and Implementation is attempted under Capability Maturity
                                                    Level 2 it will surely be a failure.
                                                </p>
                                            </div>

                                            <h4 class="text-xl font-semibold text-gray-900 dark:text-white text-center mt-4 mb-3">
                                                Bottom Line:
                                            </h4>

                                            <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg border border-gray-200 dark:border-gray-600">
                                                <a href="/storage/assets/paper.pdf#page=299">
                                                    <img class="w-full h-auto rounded-lg bg-white dark:bg-white"
                                                         src="{{ asset('storage/images/engineanimated.gif') }}"
                                                         alt="The PMIS"
                                                         title="Click the image for a paper motivating the Project Management Information Server as sure way to achieve CM Level 2 stability for Productivity and Quality gains.">
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- END STRATEGY COLLAPSE -->


                                    <!-- YOUR NAVIGATION SECTION GOES HERE -->
                                    <!-- Navigation Section -->
                                    <!-- SPACING FIX FOR LIVEWIRE -->
                                    <div class="h-8"></div>

                                    <!-- Navigation Section -->
                                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                                            Slide Navigation
                                        </h3>

                                        <div class="flex flex-wrap gap-4 justify-center">
                                            <button
                                                    onclick="carouselPrev()"
                                                    class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 dark:bg-gray-500 dark:hover:bg-gray-600 text-white rounded-lg transition-colors"
                                            >
                                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                                </svg>
                                                Previous Slide
                                            </button>

                                            <button
                                                    onclick="carouselNext()"
                                                    class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white rounded-lg transition-colors"
                                            >
                                                Next Slide
                                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>

                                </div>
                                <!-- ⬆️ END CONTAINER ⬆️ -->
                            </div>
                        </div>
                    </div>












                    <!-- ============================ -->
                    <!-- SLIDE 4: CAPABILITY MATURITY CONTENT AREA -->
                    <!-- ============================ -->


                    <div class="carousel-item">
                        <div class="flex items-center justify-center bg-white dark:bg-gray-800 py-2">
                            <div class="text-center w-full max-w-4xl text-gray-900 dark:text-white">
                                <!-- ⬇️ ADD THIS CONTAINER ⬇️ -->
                                <div class="max-w-6xl mx-auto px-4 py-8">

                                    <!-- YOUR SLIDE CONTENT GOES HERE -->
                                    <!-- Livewire Component -->
                                    @livewire('cmmi-landing')

                                    <!-- CAPABILITY MATURITY LEVELS COLLAPSE -->
                                    <div x-data="{ open:false }" class="my-4">
                                        <div class="flex items-center justify-center w-full">
                                            <button
                                                    @click="open = !open"
                                                    class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow transition-colors flex items-center justify-center space-x-2 w-full max-w-md mx-auto">
                                                <span class="text-xl text-center">CMMi: Let's climb up out of this nonsense</span>
                                                <!-- DOWN ARROW when closed -->
                                                <svg x-show="!open" class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                </svg>
                                                <!-- UP ARROW when open -->
                                                <svg x-show="open" class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                                                </svg>
                                            </button>
                                        </div>

                                        <div x-show="open" x-collapse
                                             class="mt-3 bg-white dark:bg-gray-800 rounded-lg border border-gray-300 dark:border-gray-700 p-4 shadow-md">

                                            <div class="space-y-6">

                                                <!-- LEVEL 4 & 5 -->
                                                <div class="border-l-4 border-green-500 pl-4">
                                                    <h4 class="text-xl font-semibold text-gray-900 dark:text-white text-left">
                                                        CM Level 4 and 5+:
                                                    </h4>
                                                    <p class="text-lg text-gray-700 dark:text-gray-300 text-left italic">
                                                        "Based on Production Stats and Focus on Continual Improvement."
                                                    </p>
                                                </div>

                                                <!-- LEVEL 3 -->
                                                <div class="border-l-4 border-blue-500 pl-4">
                                                    <h4 class="text-xl font-semibold text-gray-900 dark:text-white text-left">
                                                        CM Level 3+:
                                                    </h4>
                                                    <p class="text-lg text-gray-700 dark:text-gray-300 text-left italic">
                                                        "Process, Project, Software Engineering and Support (and especially Risk Management
                                                        against non achievement of the plan) fully installed."
                                                    </p>
                                                </div>

                                                <!-- LEVEL 2 -->
                                                <div class="border-l-4 border-yellow-500 pl-4">
                                                    <h4 class="text-xl font-semibold text-gray-900 dark:text-white text-left">
                                                        CM Level 2+:
                                                    </h4>
                                                    <p class="text-lg text-gray-700 dark:text-gray-300 text-left italic">
                                                        "Mainly Project (but also some other) Processes are Understood, Tailored,
                                                        Applied and Managed. 'Now We Are Ready To Do It.'"
                                                    </p>
                                                </div>

                                                <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg border border-gray-200 dark:border-gray-600">
                                                    <p class="text-lg text-gray-700 dark:text-gray-300 text-center italic mb-4">
                                                        Starting to use the processes
                                                    </p>

                                                    <img class="w-32 h-auto mx-auto bg-transparent"
                                                         src="{{ asset('storage/images/cogsworking.gif') }}"
                                                         alt="Working cogs animation"
                                                         style="background: transparent;">
                                                </div>
                                                <!-- LEVEL 1 -->
                                                <div class="border-l-4 border-orange-500 pl-4">
                                                    <h4 class="text-xl font-semibold text-gray-900 dark:text-white text-left">
                                                        CM Level 1: Heroic
                                                    </h4>
                                                    <p class="text-lg text-gray-700 dark:text-gray-300 text-left italic">
                                                        "No Plan"<br>"Just Do It!"
                                                    </p>
                                                </div>

                                                <!-- OOPS! COLLAPSE -->
                                                <div x-data="{ openOops:false }" class="my-4">
                                                    {{--                                                    <button--}}
                                                    {{--                                                            @click="openOops = !openOops"--}}
                                                    {{--                                                            class="px-6 py-3 bg-orange-600 hover:bg-orange-700 text-white font-semibold rounded-lg shadow w-full text-left transition-colors">--}}
                                                    {{--                                                        <span class="text-xl">OOPS!</span>--}}
                                                    {{--                                                    </button>--}}

                                                    <div x-show="openOops" x-collapse
                                                         class="mt-3 bg-white dark:bg-gray-800 rounded-lg border border-gray-300 dark:border-gray-700 p-4 shadow-md">

                                                        <h4 class="text-xl font-semibold text-gray-900 dark:text-white text-center mb-4">
                                                            No Plan, Be Heroic and Just Do It is CM Level 1
                                                        </h4>

                                                        <div class="space-y-4">
                                                            <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg border border-gray-200 dark:border-gray-600">
                                                                <a href="/pin">
                                                                    <img class="w-full h-auto rounded-lg bg-white dark:bg-white cursor-pointer"
                                                                         src="{{ asset('storage/images/cmmi%20@%20level%201.png') }}"
                                                                         onmouseover="this.src='{{ asset('storage/images/danger.jpg') }}'"
                                                                         onmouseout="this.src='{{ asset('storage/images/cmmi%20@%20level%201.png') }}'"
                                                                         alt="CMMI Level 1 Danger">
                                                                </a>
                                                            </div>

                                                            <div class="text-center">
                                                                <a href="/home/fail" title="Click OOPS! now for more information on why projects fail">
                                                                    <img class="w-32 h-auto mx-auto cursor-pointer"
                                                                         src="{{ asset('storage/images/oopsmall.png') }}"
                                                                         alt="OOPS button">
                                                                </a>
                                                            </div>

                                                            <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg border border-gray-200 dark:border-gray-600">
                                                                <img class="w-full h-auto rounded-lg bg-white dark:bg-white"
                                                                     src="{{ asset('storage/images/cardrivesoffroad.png') }}"
                                                                     alt="Car driving off road">
                                                            </div>

                                                            <div class="text-lg text-gray-700 dark:text-gray-300 space-y-3">
                                                                <p>
                                                                    Just for fun <a href="/realstory" class="text-blue-600 dark:text-blue-400 underline hover:opacity-80">click here</a> for the games @ CM Level 1.
                                                                </p>
                                                                <p>
                                                                    If interested click OOPS! above for the 15 reasons why projects fail at CM Level 1.
                                                                </p>
                                                                <p>
                                                                    And <a href="/pin" class="text-blue-600 dark:text-blue-400 underline hover:opacity-80" title="Click here for the real reason there is chaos out there!">Traditional Project Management process often is blamed for the chaos</a>!?
                                                                </p>
                                                                <p>
                                                                    Agile methods touted as the solution but operated at CM Level 1 will simply add to, and bring about increased <a href="{{ asset('storage/assets/chaos-report.pdf') }}" class="text-blue-600 dark:text-blue-400 underline hover:opacity-80">chaos</a>!
                                                                </p>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <!-- END OOPS! COLLAPSE -->

                                                <!-- LEVEL ZERO -->
                                                <div class="border-l-4 border-red-500 pl-4">
                                                    <h4 class="text-xl font-semibold text-gray-900 dark:text-white text-left">
                                                        CM Level ZERO: NOWHERE!
                                                    </h4>
                                                    <p class="text-lg text-gray-700 dark:text-gray-300 text-left italic">
                                                        No Ethics. Corruption.<br>"Killing the Goose for its Golden Eggs."
                                                    </p>
                                                </div>

                                                <!-- NOWHERE! COLLAPSE -->
                                                <div x-data="{ openNowhere:false }" class="my-4">
                                                    <div class="flex items-center justify-center w-full">
                                                        <button
                                                                @click="openNowhere = !openNowhere"
                                                                class="px-6 py-3 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg shadow transition-colors flex items-center justify-center space-x-2 w-full max-w-md mx-auto">
                                                            <span class="text-xl">NOWHERE!</span>
                                                            <svg x-show="!openNowhere" class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                            </svg>
                                                            <svg x-show="openNowhere" class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                                                            </svg>
                                                        </button>
                                                    </div>

                                                    <div x-show="openNowhere" x-collapse
                                                         class="mt-3 bg-white dark:bg-gray-800 rounded-lg border border-gray-300 dark:border-gray-700 p-4 shadow-md">

                                                        <div class="space-y-6">
                                                            <p class="text-lg text-gray-700 dark:text-gray-300 text-center italic">
                                                                Move your mouse over the image directly below.
                                                            </p>

                                                            <!-- Diverted Resources/Corruption Image -->
                                                            <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg border border-gray-200 dark:border-gray-600">
                                                                <img class="w-full max-w-[20cm] h-auto rounded-lg bg-white dark:bg-white cursor-pointer mx-auto"
                                                                     src="{{ asset('storage/images/divertedresources.png') }}"
                                                                     onmouseover="this.src='{{ asset('storage/images/corruption.png') }}'"
                                                                     onmouseout="this.src='{{ asset('storage/images/divertedresources.png') }}'"
                                                                     alt="Diverted Resources and Corruption"
                                                                     style="max-width: 20cm; width: 100%; height: auto;">
                                                            </div>

                                                            <div class="text-center text-lg text-gray-700 dark:text-gray-300 space-y-6">
                                                                <p class="italic">
                                                                    Aesop's wisdom is 2500 years old...
                                                                </p>

                                                                <!-- Golden Goose Images -->
                                                                <div class="flex flex-col justify-center items-center gap-6">
                                                                    <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg border border-gray-200 dark:border-gray-600 w-full max-w-[20cm]">
                                                                        <img class="w-full h-auto rounded-lg bg-white dark:bg-white mx-auto"
                                                                             src="{{ asset('storage/images/goose1.jpg') }}"
                                                                             alt="Golden Goose 1"
                                                                             style="max-width: 20cm; width: 100%; height: auto;">
                                                                    </div>
                                                                    <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg border border-gray-200 dark:border-gray-600 w-full max-w-[20cm]">
                                                                        <img class="w-full h-auto rounded-lg bg-white dark:bg-white mx-auto"
                                                                             src="{{ asset('storage/images/goose2.png') }}"
                                                                             alt="Golden Goose 2"
                                                                             style="max-width: 20cm; width: 100%; height: auto;">
                                                                    </div>
                                                                </div>

                                                                <!-- Quote Section -->
                                                                <div class="border-t border-gray-300 dark:border-gray-600 pt-6 mt-6">
                                                                    <blockquote class="italic text-gray-600 dark:text-gray-400 text-lg leading-relaxed">
                                                                        "Annual income twenty pounds, annual expenditure nineteen six, result happiness.
                                                                        Annual income twenty pounds, annual expenditure twenty pound ought and six, result misery."
                                                                    </blockquote>
                                                                    <p class="mt-4 font-semibold text-gray-700 dark:text-gray-300">
                                                                        — Charles Dickens, David Copperfield
                                                                    </p>
                                                                </div>

                                                                <!-- Skeletal Cow Image -->
                                                                <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg border border-gray-200 dark:border-gray-600">
                                                                    <img class="w-full max-w-[20cm] h-auto rounded-lg bg-white dark:bg-white mx-auto"
                                                                         src="{{ asset('storage/images/sceletalcowproject.jpg') }}"
                                                                         alt="Skeletal cow project metaphor"
                                                                         style="max-width: 20cm; width: 100%; height: auto;">
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <!-- END NOWHERE! COLLAPSE -->

                                            </div>
                                            <!-- END space-y-6 -->

                                        </div>
                                    </div>
                                    <!-- END CAPABILITY MATURITY LEVELS COLLAPSE -->

                                    <!-- YOUR NAVIGATION SECTION GOES HERE -->
                                    <!-- Navigation Section -->
                                    <!-- SPACING FIX FOR LIVEWIRE -->
                                    <div class="h-12"></div>

                                    <!-- Navigation Section -->
                                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                                            Slide Navigation
                                        </h3>

                                        <div class="flex flex-wrap gap-4 justify-center">
                                            <button
                                                    onclick="carouselPrev()"
                                                    class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 dark:bg-gray-500 dark:hover:bg-gray-600 text-white rounded-lg transition-colors"
                                            >
                                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                                </svg>
                                                Previous Slide
                                            </button>

                                            <button
                                                    onclick="carouselNext()"
                                                    class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white rounded-lg transition-colors"
                                            >
                                                Next Slide
                                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>

                                </div>
                                <!-- ⬆️ END CONTAINER ⬆️ -->
                            </div>
                        </div>
                    </div>



                    <!-- ============================ -->
                    <!-- SLIDE 5: CMMI DEVELOPMENT CONTENT AREA -->
                    <!-- ============================ -->
                    <div class="carousel-item">
                        <div class="flex items-center justify-center bg-white dark:bg-gray-800 py-2">
                            <div class="text-center w-full max-w-4xl text-gray-900 dark:text-white">
                                <div class="max-w-6xl mx-auto px-4 py-8">

                                    <h3 class="text-2xl font-semibold text-gray-900 dark:text-white text-center">
                                        CMMi Dashboard for Development
                                    </h3>

                                    <p class="text-lg text-gray-700 dark:text-gray-300 text-center italic">
                                        Note: Look for <strong>ML</strong> on the table below.<br>This is the Capability Maturity Level.
                                    </p>

                                    <!-- CMMi Dashboard Image -->
                                    <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg border border-gray-200 dark:border-gray-600">
                                        <img class="w-full h-auto rounded-lg bg-white dark:bg-white mx-auto"
                                             src="{{ asset('storage/images/cmmi-dev1.png') }}"
                                             alt="CMMi-Dev1.3 dashboard"
                                             style="max-width: 25cm; width: 100%; height: auto;">
                                    </div>

                                    <!-- CMMi Models Image -->
                                    <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg border border-gray-200 dark:border-gray-600">
                                        <img class="w-full h-auto rounded-lg bg-white dark:bg-white mx-auto"
                                             src="{{ asset('storage/images/cmmimodelsall.jpg') }}"
                                             alt="CMMi all models"
                                             style="max-width: 20cm; width: 100%; height: auto;">
                                    </div>

                                    <!-- PDF Links -->
                                    <div class="flex flex-col justify-center items-center gap-4 bg-gray-50 dark:bg-gray-800 p-6 rounded-lg border border-gray-200 dark:border-gray-700">
                                        <a href="{{ asset('storage/assets/cmmioverview.pdf') }}" class="text-blue-600 dark:text-blue-400 underline hover:opacity-80 text-lg">
                                            CMMi 3.1 Overview
                                        </a>
                                        <a href="{{ asset('storage/assets/bestcmmi.pdf') }}" class="text-blue-600 dark:text-blue-400 underline hover:opacity-80 text-lg">
                                            CMMi 3.1 More Detailed Overview
                                        </a>
                                        <a href="{{ asset('storage/assets/cmmidevtools.pdf') }}" class="text-blue-600 dark:text-blue-400 underline hover:opacity-80 text-lg">
                                            CMMi 3.1 DevTools
                                        </a>
                                    </div>

                                    <!-- CMMi First Step Collapse -->
                                    <div x-data="{ openJourney:false }" class="my-4">
                                        <div class="flex items-center justify-center w-full">
                                            <button
                                                    @click="openJourney = !openJourney"
                                                    class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow transition-colors flex items-center justify-center space-x-2 w-full max-w-md mx-auto">
                                                <span class="text-xl text-center">CMMi - Your first step</span>
                                                <!-- DOWN ARROW when closed -->
                                                <svg x-show="!openJourney" class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                </svg>
                                                <!-- UP ARROW when open -->
                                                <svg x-show="openJourney" class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                                                </svg>
                                            </button>
                                        </div>

                                        <div x-show="openJourney" x-collapse
                                             class="mt-3 bg-white dark:bg-gray-800 rounded-lg border border-gray-300 dark:border-gray-700 p-6 shadow-md">

                                            <div class="space-y-4 text-lg text-gray-700 dark:text-gray-300">
                                                <p class="text-xl text-gray-700 dark:text-gray-300">
                                                    The first step on your CMMi journey:
                                                    <br>Find PP and PMC above.
                                                    <br>Then find these core processes on the PMBOK 6 dashboard (slide 1)!
                                                </p>
                                                <p class="text-xl text-gray-700 dark:text-gray-300">
                                                    And just for fun also find them
                                                    <a href="/scrum-dashboards" class="text-blue-600 dark:text-blue-400 underline hover:opacity-80">on the Scrum dashboard</a>.
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ACTUAL SPACING THAT WORKS -->

                                     <div class="h-8"></div>

                                    <!-- Navigation Section -->
                                    <div class="mt-8 bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                                            Slide Navigation
                                        </h3>

                                        <div class="flex flex-wrap gap-4 justify-center">
                                            <button
                                                    onclick="carouselPrev()"
                                                    class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 dark:bg-gray-500 dark:hover:bg-gray-600 text-white rounded-lg transition-colors border-2 border-gray-400">
                                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                                </svg>
                                                Previous Slide
                                            </button>

                                            <button
                                                    onclick="carouselNext()"
                                                    class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white rounded-lg transition-colors border-2 border-blue-400">
                                                Next Slide
                                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================ -->
                    <!-- SLIDE 6: PEOPLE PROCESS TECHNOLOGY CONTENT AREA -->
                    <!-- ============================ -->
                    <div class="carousel-item">
                        <div class="flex items-center justify-center bg-white dark:bg-gray-800 py-2">
                            <div class="text-center w-full max-w-4xl text-gray-900 dark:text-white">
                                <!-- ⬇️ ADD THIS CONTAINER ⬇️ -->
                                <div class="max-w-6xl mx-auto px-4 py-8">

                                    <!-- YOUR SLIDE CONTENT GOES HERE -->
                                    <h3 class="text-2xl font-semibold text-gray-900 dark:text-white text-center">
                                        The People - Process - Technology Triad<br>
                                        <br>Do you (can you?) "<a href="{{ route('red-bead-experiment') }}" class="text-blue-600 dark:text-blue-400 underline hover:opacity-80">Remove the Red Beads</a>"?
                                    </h3>

                                    <p class="text-xl text-gray-700 dark:text-gray-300">
                                        Click the image to get the importance of this!
                                    </p>

                                    <!-- Interactive PPT Image -->
                                    <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg border border-gray-200 dark:border-gray-600">
                                        <img class="w-full h-auto rounded-lg bg-white dark:bg-white mx-auto cursor-pointer"
                                             src="{{ asset('storage/images/peopleprocesstechbeads.jpg') }}"
                                             onmouseover="this.src='{{ asset('storage/images/peopleprocessbottomline.png') }}'"
                                             onmouseout="this.src='{{ asset('storage/images/peopleprocesstechbeads.jpg') }}'"
                                             alt="People Process Technology Beads"
                                             style="max-width: 20cm; width: 100%; height: auto;"
                                             onclick="window.location.href='{{ route('red-bead-experiment') }}'">
                                    </div>

                                    <p class="text-xl text-gray-700 dark:text-gray-300">
                                        Bottom line: pull the P-P-T points of the triangle outward<br>
                                        in relation to each other; improving while maintaining balance.
                                    </p>
                                     <div class="h-8"></div>




                                    <!-- YOUR NAVIGATION SECTION GOES HERE -->
                                    <!-- Navigation Section -->
                                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                                            Slide Navigation
                                        </h3>

                                        <div class="flex flex-wrap gap-4 justify-center">
                                            <button
                                                    onclick="carouselPrev()"
                                                    class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 dark:bg-gray-500 dark:hover:bg-gray-600 text-white rounded-lg transition-colors"
                                            >
                                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                                </svg>
                                                Previous Slide
                                            </button>

                                            <button
                                                    onclick="carouselNext()"
                                                    class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white rounded-lg transition-colors"
                                            >
                                                Next Slide
                                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>

                                </div>
                                <!-- ⬆️ END CONTAINER ⬆️ -->
                            </div>
                        </div>
                    </div>












                    <!-- ============================ -->
                    <!-- SLIDE 7: V MODEL CONTENT AREA -->
                    <!-- ============================ -->

                    <div class="carousel-item">
                        <div class="flex items-center justify-center bg-white dark:bg-gray-800 py-2">
                            <div class="text-center w-full max-w-4xl text-gray-900 dark:text-white">
                                <!-- ⬇️ ADD THIS CONTAINER ⬇️ -->
                                <div class="max-w-6xl mx-auto px-4 py-8">

                                    <!-- YOUR SLIDE CONTENT GOES HERE -->
                                    <h3 class="text-2xl font-semibold text-gray-900 dark:text-white text-center">
                                        Do you "Mind the Gap"?<br>The V Model shows you how.
                                    </h3>

                                    <!-- V Model Interactive Image -->
                                    <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg border border-gray-200 dark:border-gray-600">
                                        <img class="w-full h-auto rounded-lg bg-white dark:bg-white mx-auto cursor-pointer"
                                             src="{{ asset('storage/images/vmodelbevel.png') }}"
                                             onmouseover="this.src='{{ asset('storage/images/itilvaluecreation.jpg') }}'"
                                             onmouseout="this.src='{{ asset('storage/images/vmodelbevel.png') }}'"
                                             alt="V Model Diagram"
                                             style="max-width: 20cm; width: 100%; height: auto;">
                                    </div>

                                    <p class="text-xl text-gray-700 dark:text-gray-300">
                                        On the image above<br>find Configuration (Configuration Management (CM)), Verification
                                        (VER), Validation (VAL) and Bidirectional traceability of requirements (part of REQM process). <div class="h-8"></div>
                                        <a href="/cmmidevdashboard" class="text-blue-600 dark:text-blue-400 underline hover:opacity-80" target="_blank">Now click here and the CMMi for Development Dashboard will open up in a new tab.</a>.  <div class="h-8"></div>Can you find CM, VER, VAL
                                        and REQM on the CMMi Dev table? What are their CM Levels?
                                    </p>

                                    <p class="text-xl text-gray-700 dark:text-gray-300">
                                        Hover over the image below to get the importance of safety while navigating
                                        the tar pit.<br>The tar pit is where badly run software engineering projects
                                        can get bogged down and die!
                                    </p>

                                    <!-- Tar Pit Interactive Image -->
                                    <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg border border-gray-200 dark:border-gray-600">
                                        <a href="{{ asset('storage/assets/tarpitchapter.pdf') }}"
                                           title="Click the image to download the milestone Chapter by Frederick Brooks. Avoid the dangers of the tarpit. Mind the Gap!">
                                            <img class="w-full h-auto rounded-lg bg-white dark:bg-white mx-auto cursor-pointer"
                                                 src="{{ asset('storage/images/gap55wider.jpg') }}"
                                                 onmouseover="this.src='{{ asset('storage/images/tarpitstwo.jpg') }}'"
                                                 onmouseout="this.src='{{ asset('storage/images/gap55wider.jpg') }}'"
                                                 alt="Mind the Gap - Tar Pit"
                                                 style="max-width: 20cm; width: 100%; height: auto;">
                                        </a>
                                    </div>

                                    <!-- Mind the Gap Collapse -->
                                    <div x-data="{ openMindTheGap:false }" class="my-4">
                                        <div class="flex items-center justify-center w-full">
                                            <button
                                                    @click="openMindTheGap = !openMindTheGap"
                                                    class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow transition-colors flex items-center justify-center space-x-2 w-full max-w-md mx-auto">
                                                <span class="text-xl">Mind the Gap</span>
                                                <svg x-show="!openMindTheGap" class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                </svg>
                                                <svg x-show="openMindTheGap" class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                                                </svg>
                                            </button>
                                        </div>

                                        <div x-show="openMindTheGap" x-collapse
                                             class="mt-3 bg-white dark:bg-gray-800 rounded-lg border border-gray-300 dark:border-gray-700 p-6 shadow-md">

                                            <div class="space-y-4 text-lg text-gray-700 dark:text-gray-300">
                                                <p class="text-xl text-gray-700 dark:text-gray-300">
                                                    Bidirectional Traceability of Requirements is at the heart of (Requirements Management [REQM] & Configuration Management [CM]).
                                                </p>

                                                <p class="text-xl text-gray-700 dark:text-gray-300">
                                                    Can you find REQM & CM on the CMMi Dev Dashboard? <br>What is the Capability Maturity Level of REQM & CM?
                                                </p>

                                                <p class="text-xl text-gray-700 dark:text-gray-300">
                                                    What about Verification (Ver) and Validation (Val)? Can you find these CM L3 processes?<br>
                                                    Can you see that these are all about "Minding the Gap," "Step by Step" and "Start, Change, Stop?"
                                                </p>

                                                {{--                                                <p class="text-lg text-gray-700 dark:text-gray-300 text-center">--}}
                                                {{--                                                    (<a href="/agileisdead" class="text-blue-600 dark:text-blue-400 underline hover:opacity-80">Latest agile thinking here agrees with this approach</a>)--}}
                                                {{--                                                </p>--}}

                                                {{--                                                <p class="text-lg text-gray-700 dark:text-gray-300 text-center">--}}
                                                {{--                                                    Finally, can you see that this side of the Gap is where you (software developers / <a href="/pmway/?slide=8" class="text-blue-600 dark:text-blue-400 underline hover:opacity-80">ITIL Service Designers</a>) are now.--}}
                                                {{--                                                    In a next project phase (iteration, sprint etc.) you will move forward with the project goal to safely release a new version of valuable software.--}}
                                                {{--                                                </p>--}}

                                                {{--                                                <p class="text-lg text-gray-700 dark:text-gray-300 text-center">--}}
                                                {{--                                                    After UAT sign off <a href="/pmway/?slide=8" class="text-blue-600 dark:text-blue-400 underline hover:opacity-80" title="Click here for information on SO in PMWay's ITIL page">Service Operations</a> must take over, maintaining the working system while Service Strategy and Service Design look at next versions of <a href="/workingsoftware" class="text-blue-600 dark:text-blue-400 underline hover:opacity-80">Working Software</a>.--}}
                                                {{--                                                </p>--}}
                                            </div>
                                        </div>
                                    </div>
                                     <div class="h-8"></div>


                                    <!-- YOUR NAVIGATION SECTION GOES HERE -->
                                    <!-- Navigation Section -->
                                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                                            Slide Navigation
                                        </h3>

                                        <div class="flex flex-wrap gap-4 justify-center">
                                            <button
                                                    onclick="carouselPrev()"
                                                    class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 dark:bg-gray-500 dark:hover:bg-gray-600 text-white rounded-lg transition-colors"
                                            >
                                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                                </svg>
                                                Previous Slide
                                            </button>

                                            <button
                                                    onclick="carouselNext()"
                                                    class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white rounded-lg transition-colors"
                                            >
                                                Next Slide
                                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>

                                </div>
                                <!-- ⬆️ END CONTAINER ⬆️ -->
                            </div>
                        </div>
                    </div>



                    <!-- ============================ -->
                    <!-- SLIDE 8: ITIL 3 CONTENT AREA -->
                    <!-- ============================ -->

                    <div class="carousel-item">
                        <div class="flex items-center justify-center bg-white dark:bg-gray-800 py-2">
                            <div class="text-center w-full max-w-4xl text-gray-900 dark:text-white">
                                <!-- ⬇️ ADD THIS CONTAINER ⬇️ -->
                                <div class="max-w-6xl mx-auto px-4 py-8">

                                    <!-- YOUR SLIDE CONTENT GOES HERE -->
                                    h3 class="text-2xl font-semibold text-gray-900 dark:text-white text-center">
                                    ITIL 3
                                    <br><a href="{{ asset('storage/assets/itilfouroverview.pdf') }}"
                                           class="text-blue-600 dark:text-blue-400 underline hover:opacity-80 text-lg"
                                           title="Click here for a presentation about ITIL 4">
                                        Transitioning to ITIL 4: 1000 foot overview
                                    </a>
                                    </h3>

                                    <!-- ITIL Version Image -->
                                    <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg border border-gray-200 dark:border-gray-600">
                                        <img class="w-full h-auto rounded-lg bg-white dark:bg-white mx-auto"
                                             src="{{ asset('storage/images/itil_v321.png') }}"
                                             alt="ITIL Version History"
                                             style="max-width: 20cm; width: 100%; height: auto;">
                                    </div>

                                    <!-- ITIL Books Image -->
                                    <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg border border-gray-200 dark:border-gray-600">
                                        <img class="w-full h-auto rounded-lg bg-white dark:bg-white mx-auto"
                                             src="{{ asset('storage/images/itilstageswithbooks.png') }}"
                                             alt="ITIL Books and Stages"
                                             style="max-width: 20cm; width: 100%; height: auto;">
                                    </div>

                                    <!-- ITIL Overview Image Link -->
                                    <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg border border-gray-200 dark:border-gray-600">
                                        <a href="/home/itiloverview" title="Click here for the ITIL V3 processes">
                                            <img class="w-full h-auto rounded-lg bg-white dark:bg-white mx-auto cursor-pointer"
                                                 src="{{ asset('storage/images/itiloverview20191217smaller.jpg') }}"
                                                 alt="ITIL V3 Processes Overview"
                                                 style="max-width: 20cm; width: 100%; height: auto;">
                                        </a>
                                    </div>

                                    <!-- ITIL Processes Overview Collapse -->
                                    <div x-data="{ openItilOverview:false }" class="my-4">
                                        <div class="flex items-center justify-center w-full">
                                            <button
                                                    @click="openItilOverview = !openItilOverview"
                                                    class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow transition-colors flex items-center justify-center space-x-2 w-full max-w-md mx-auto">
                                                <span class="text-xl">ITIL - Processes Overview</span>
                                                <svg x-show="!openItilOverview" class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                </svg>
                                                <svg x-show="openItilOverview" class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                                                </svg>
                                            </button>
                                        </div>

                                        <div x-show="openItilOverview" x-collapse
                                             class="mt-3 bg-white dark:bg-gray-800 rounded-lg border border-gray-300 dark:border-gray-700 p-6 shadow-md">

                                            <h4 class="text-xl font-semibold text-gray-900 dark:text-white text-center mb-6">
                                                High Level Overview of the ITIL Processes
                                            </h4>

                                            <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg border border-gray-200 dark:border-gray-600">
                                                <a href="/home/itiloverview" title="Click here for the ITIL V3 processes">
                                                    <img class="w-full h-auto rounded-lg bg-white dark:bg-white mx-auto cursor-pointer"
                                                         src="{{ asset('storage/images/itil3a.png') }}"
                                                         alt="ITIL V3 Processes Detailed View"
                                                         style="max-width: 20cm; width: 100%; height: auto;">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END ITIL Processes Overview Collapse -->

                                    <!-- CSI Register & Scrum Backlog Collapse -->
                                    <div x-data="{ openCsiBl:false }" class="my-4">
                                        <div class="flex items-center justify-center w-full">
                                            <button
                                                    @click="openCsiBl = !openCsiBl"
                                                    class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow transition-colors flex items-center justify-center space-x-2 w-full max-w-md mx-auto">
                                                <span class="text-xl">ITIL, the CSI Register and the Scrum Backlog</span>
                                                <svg x-show="!openCsiBl" class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                </svg>
                                                <svg x-show="openCsiBl" class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                                                </svg>
                                            </button>
                                        </div>

                                        <div x-show="openCsiBl" x-collapse
                                             class="mt-3 bg-white dark:bg-gray-800 rounded-lg border border-gray-300 dark:border-gray-700 p-6 shadow-md">

                                            <h4 class="text-xl font-semibold text-gray-900 dark:text-white text-center mb-6">
                                                The image below explains how the CSI Register feeds the Scrum Backlog
                                            </h4>

                                            <div class="space-y-6">
                                                <!-- ITIL Pain Points Image -->
                                                <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg border border-gray-200 dark:border-gray-600">
                                                    <img class="w-full h-auto rounded-lg bg-white dark:bg-white mx-auto"
                                                         src="{{ asset('storage/images/itilpainpoints.jpg') }}"
                                                         alt="ITIL Pain Points and CSI Register"
                                                         style="max-width: 20cm; width: 100%; height: auto;">
                                                </div>

                                                <h3 class="text-2xl font-semibold text-gray-900 dark:text-white text-center">I.e.</h3>

                                                <!-- ITIL Value Streams Image -->
                                                <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg border border-gray-200 dark:border-gray-600">
                                                    <img class="w-full h-auto rounded-lg bg-white dark:bg-white mx-auto"
                                                         src="{{ asset('storage/images/itilvaluestreams.png') }}"
                                                         alt="ITIL Value Streams"
                                                         title="Do you know what your value streams are? Can you place them on a BCG Growth Share Matrix?"
                                                         style="max-width: 20cm; width: 100%; height: auto;">
                                                </div>

                                                <!-- BCG Matrix Image -->
                                                <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg border border-gray-200 dark:border-gray-600">
                                                    <img class="w-full h-auto rounded-lg bg-white dark:bg-white mx-auto"
                                                         src="{{ asset('storage/images/bcg.jpg') }}"
                                                         alt="BCG Growth Share Matrix"
                                                         title="Do you know what your value streams are? Can you place them on a BCG Growth Share Matrix?"
                                                         style="max-width: 20cm; width: 100%; height: auto;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="h-8"></div>

                                    <!-- YOUR NAVIGATION SECTION GOES HERE -->
                                    <!-- Navigation Section -->
                                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                                            Slide Navigation
                                        </h3>

                                        <div class="flex flex-wrap gap-4 justify-center">
                                            <button
                                                    onclick="carouselPrev()"
                                                    class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 dark:bg-gray-500 dark:hover:bg-gray-600 text-white rounded-lg transition-colors"
                                            >
                                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                                </svg>
                                                Previous Slide
                                            </button>

                                            <button
                                                    onclick="carouselNext()"
                                                    class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white rounded-lg transition-colors"
                                            >
                                                Next Slide
                                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>

                                </div>
                                <!-- ⬆️ END CONTAINER ⬆️ -->
                            </div>
                        </div>
                    </div>




                    <!-- ============================ -->
                    <!-- SLIDE 9: DEVOPS CONTENT AREA -->
                    <!-- ============================ -->

                    <div class="carousel-item">
                        <div class="flex items-center justify-center bg-white dark:bg-gray-800 py-2">
                            <div class="text-center w-full max-w-4xl text-gray-900 dark:text-white">
                                <!-- ⬇️ ADD THIS CONTAINER ⬇️ -->
                                <div class="max-w-6xl mx-auto px-4 py-8">

                                    <  <h3 class="text-2xl font-semibold text-gray-900 dark:text-white text-center">
                                        DevOps
                                    </h3>

                                    <!-- DevOps Interactive Image -->
                                    <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg border border-gray-200 dark:border-gray-600">
                                        <a href="/accelerate" title="Click here for the 24 capabilities and way to install Devops (eat the elephant)!">
                                            <img class="w-full h-auto rounded-lg bg-white dark:bg-white mx-auto cursor-pointer"
                                                 src="{{ asset('storage/images/devopsimage.png') }}"
                                                 onmouseover="this.src='{{ asset('storage/images/devopscogs.png') }}'"
                                                 onmouseout="this.src='{{ asset('storage/images/devopsimage.png') }}'"
                                                 alt="DevOps Process"
                                                 style="max-width: 20cm; width: 100%; height: auto;">
                                        </a>
                                    </div>

                                    <!-- Its DevOps Image -->
                                    <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg border border-gray-200 dark:border-gray-600">
                                        <a href="/accelerate" title="Click here for the 24 capabilities and way to install Devops (eat the elephant)!">
                                            <img class="w-full h-auto rounded-lg bg-white dark:bg-white mx-auto cursor-pointer"
                                                 src="{{ asset('storage/images/itsdevops.png') }}"
                                                 alt="It's DevOps"
                                                 style="max-width: 20cm; width: 100%; height: auto;">
                                        </a>
                                    </div>

                                    <p class="text-xl text-gray-700 dark:text-gray-300">
                                        Click the Elephant for DevOps essence!
                                    </p>

                                    <!-- Done or Un-Done? Collapse -->
                                    <div x-data="{ openDoneUndone:false }" class="my-4">
                                        <div class="flex items-center justify-center w-full">
                                            <button
                                                    @click="openDoneUndone = !openDoneUndone"
                                                    class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow transition-colors flex items-center justify-center space-x-2 w-full max-w-md mx-auto">
                                                <span class="text-xl">Done or Un-Done?</span>
                                                <svg x-show="!openDoneUndone" class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                </svg>
                                                <svg x-show="openDoneUndone" class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                                                </svg>
                                            </button>
                                        </div>

                                        <div x-show="openDoneUndone" x-collapse
                                             class="mt-3 bg-white dark:bg-gray-800 rounded-lg border border-gray-300 dark:border-gray-700 p-6 shadow-md">

                                            <h4 class="text-xl font-semibold text-gray-900 dark:text-white text-center mb-6">
                                                Can Scrum bridge the gap?
                                            </h4>

                                            <div class="space-y-6">
                                                <!-- DevOps Uncertain Image -->
                                                <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg border border-gray-200 dark:border-gray-600">
                                                    <img class="w-full h-auto rounded-lg bg-white dark:bg-white mx-auto cursor-pointer"
                                                         src="{{ asset('storage/images/devopsuncertain.png') }}"
                                                         onmouseover="this.src='{{ asset('storage/images/devandops.png') }}'"
                                                         onmouseout="this.src='{{ asset('storage/images/devopsuncertain.png') }}'"
                                                         alt="DevOps Uncertainty"
                                                         title="Click the image now to reduce Devops uncertainty"
                                                         style="max-width: 20cm; width: 100%; height: auto;">
                                                </div>

                                                <!-- PO as new RM Image -->
                                                <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg border border-gray-200 dark:border-gray-600">
                                                    <img class="w-full h-auto rounded-lg bg-white dark:bg-white mx-auto"
                                                         src="{{ asset('storage/images/poarenewrm.png') }}"
                                                         alt="Product Owners are the new Release Managers"
                                                         style="max-width: 20cm; width: 100%; height: auto;">
                                                </div>

                                                <!-- PO as new RM Collapse -->
                                                <div x-data="{ openPoRm:false }" class="my-4">
                                                    <div class="flex items-center justify-center w-full">
                                                        <button
                                                                @click="openPoRm = !openPoRm"
                                                                class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow transition-colors flex items-center justify-center space-x-2 w-full max-w-md mx-auto">
                                                            <span class="text-xl">PO as new RM!</span>
                                                            <svg x-show="!openPoRm" class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                            </svg>
                                                            <svg x-show="openPoRm" class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                                                            </svg>
                                                        </button>
                                                    </div>

                                                    <div x-show="openPoRm" x-collapse
                                                         class="mt-3 bg-white dark:bg-gray-800 rounded-lg border border-gray-300 dark:border-gray-700 p-6 shadow-md">

                                                        <h4 class="text-xl font-semibold text-gray-900 dark:text-white text-center mb-6">
                                                            From Reinventing ITIL in the age of DevOps<br>Abhinav Krishn Akaiser 2019
                                                        </h4>

                                                        <div class="space-y-4 text-lg text-gray-700 dark:text-gray-300 text-left">
                                                            <h5 class="font-semibold">Product Owners are the New Release Managers</h5>
                                                            <p>The release management team has been made partially redundant by machines. It is not absolute because of two reasons.</p>
                                                            <ul class="list-disc list-inside space-y-2">
                                                                <li>You need an owner for the entire release management process that cuts across both development and operations.</li>
                                                                <li>Cognitive abilities are very much in demand to ensure that the release management process succeeds and aligns with the objectives set forth.</li>
                                                            </ul>

                                                            <p>The person who manages the entire release from end to end is the release manager and is still necessary. However, the release management role went from being a full-time position to a part-time one (statistically speaking), mainly because of the diminished work (thanks to automation). Capable release managers are:</p>

                                                            <ol class="list-decimal list-inside space-y-2">
                                                                <li>Well aware of the customer landscape, the requirements, and to an extent the business priorities</li>
                                                                <li>Fully involved in the development and deployment processes</li>
                                                                <li>Understands operations and their acceptance criteria</li>
                                                            </ol>

                                                            <p class="text-xl text-gray-700 dark:text-gray-300">The person who could do all this in the past was the product owner (PO), and thus that person is a favorite choice for a part-time release manager. POs are an adequate choice mainly because of their closeness to the business and to the development and operations teams. The person was like a bridge between the two entities and was expected to keep the boat going in the most turbulent conditions.</p>

                                                            <p class="text-xl text-gray-700 dark:text-gray-300 Italic">Thanks Abhinav (page 294)<br>PS I am reminded by the above of the importance of the Board Executive to produce products in PRINCE2 Agile (slide 10)</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- END PO as new RM Collapse -->

                                                <!-- Scrum Value Model Collapse -->
                                                <div x-data="{ openValueModel:false }" class="my-4">
                                                    <div class="flex items-center justify-center w-full">
                                                        <button
                                                                @click="openValueModel = !openValueModel"
                                                                class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow transition-colors flex items-center justify-center space-x-2 w-full max-w-md mx-auto">
                                                            <span class="text-xl text-center">The Product Owner<br>and<br>Scrum Value Model</span>
                                                            <svg x-show="!openValueModel" class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                            </svg>
                                                            <svg x-show="openValueModel" class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                                                            </svg>
                                                        </button>
                                                    </div>

                                                    <div x-show="openValueModel" x-collapse
                                                         class="mt-3 bg-white dark:bg-gray-800 rounded-lg border border-gray-300 dark:border-gray-700 p-6 shadow-md">


                                                        <p class="text-xl text-gray-700 dark:text-gray-300">
                                                            Note below how value is produced in agile's Scrum method.
                                                        </p>

                                                        <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg border border-gray-200 dark:border-gray-600">
                                                            <img class="w-full h-auto rounded-lg bg-white dark:bg-white mx-auto"
                                                                 src="{{ asset('storage/images/scrumvaluemodelroles.jpg') }}"
                                                                 alt="Scrum Value Model"
                                                                 style="max-width: 20cm; width: 100%; height: auto;">
                                                        </div>

                                                        <div class="text-center text-lg text-gray-700 dark:text-gray-300 mt-4">
                                                            <p>Note above that the first 3 stages occur before sprints start</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- END Scrum Value Model Collapse -->

                                                <!-- DevOps Summary -->
                                                <div class="space-y-4 text-lg text-gray-700 dark:text-gray-300 text-center">
                                                    <h5 class="text-xl font-semibold">I.e.</h5>
                                                    <p class="text-xl text-gray-700 dark:text-gray-300">DevOps is ITIL empowered for speed!</p>

                                                </div>

                                                <!-- ITIL DevOps Model Image -->
                                                <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg border border-gray-200 dark:border-gray-600">

                                                    <img class="w-full h-auto rounded-lg bg-white dark:bg-white mx-auto cursor-pointer"
                                                         src="{{ asset('storage/images/itilppsdevopsmodel.jpg') }}"
                                                         onmouseover="this.src='{{ asset('storage/images/itil.jpg') }}'"
                                                         onmouseout="this.src='{{ asset('storage/images/itilppsdevopsmodelsinglesource.jpg') }}'"
                                                         alt="DevOps is ITIL but faster"
                                                         title="DevOps is ITIL, just empowered to be faster!"
                                                         style="max-width: 20cm; width: 100%; height: auto;">

                                                </div>


                                                <p class="text-xl text-gray-700 dark:text-gray-300">DevOps/ITIL/Agile/Scrum etc., Goal: Release Working Software (and hardware) faster!</p>

                                                <!-- ITIL DevOps Small Image -->
                                                <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg border border-gray-200 dark:border-gray-600">
                                                    <a href="/scrumfix" title="Click here and find the Un-Done Scrum image. Putting this DevOps/ITIL/ solution into place can remedy Un-Done Scrum and other Scrum Dysfunctions">
                                                        <img class="w-full h-auto rounded-lg bg-white dark:bg-white mx-auto cursor-pointer"
                                                             src="{{ asset('storage/images/itildevopsmall.png') }}"
                                                             alt="Release Working Software Faster"
                                                             style="max-width: 20cm; width: 100%; height: auto;">
                                                    </a>
                                                </div>

                                                <p class="text-xl text-gray-700 dark:text-gray-300">Notice that for pilots flying an aeroplane telemetry is either nominal or not!</p>

                                                <!-- DevOps Release Image -->
                                                <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg border border-gray-200 dark:border-gray-600">
                                                    <img class="w-full h-auto rounded-lg bg-white dark:bg-white mx-auto"
                                                         src="{{ asset('storage/images/devopsrelease.jpg') }}"
                                                         alt="DevOps Release Process"
                                                         style="max-width: 20cm; width: 100%; height: auto;">
                                                </div>


                                                <p class="text-xl text-gray-700 dark:text-gray-300">
                                                    <a href="/scrumrfix" class="text-blue-600 dark:text-blue-400 underline hover:opacity-80" title="Click here for the 7 Scrum Dysfunctions of which Un-Done Scrum is one">If you can't do the above in Scrum you may become Un-Done!</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="h-8"></div>
                                    <!-- END Done or Un-Done? Collapse -->
                                    <!-- Navigation Section -->
                                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                                            Slide Navigation
                                        </h3>

                                        <div class="flex flex-wrap gap-4 justify-center">
                                            <button
                                                    onclick="carouselPrev()"
                                                    class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 dark:bg-gray-500 dark:hover:bg-gray-600 text-white rounded-lg transition-colors"
                                            >
                                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                                </svg>
                                                Previous Slide
                                            </button>

                                            <button
                                                    onclick="carouselNext()"
                                                    class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white rounded-lg transition-colors"
                                            >
                                                Next Slide
                                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>

                                </div>
                                <!-- ⬆️ END CONTAINER ⬆️ -->
                            </div>
                        </div>
                    </div>




                    <!-- ============================ -->
                    <!-- SLIDE 10: PRINCE2 AGILE CONTENT AREA -->
                    <!-- ============================ -->
                    <div class="carousel-item">
                        <div class="flex items-center justify-center bg-white dark:bg-gray-800 py-2">
                            <div class="text-center w-full max-w-4xl text-gray-900 dark:text-white">
                                <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">PRINCE2 Agile</h3>
                                <!-- ADD YOUR PRINCE2 AGILE SLIDE CONTENT HERE -->
                                <div class="max-w-6xl mx-auto px-4 py-8">
                                    <!-- Page Title -->
                                    <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-8 border-b border-gray-200 dark:border-gray-700 pb-4">
                                        PRINCE2 (Agile)
                                    </h1>

                                    <div class="space-y-6">
                                        <!-- Interactive Image Section -->
                                        <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                                                PRINCE2 Process Model with Agile Integration
                                            </h3>

                                            <div class="text-center">
                                                <!-- Interactive Image -->
                                                <img
                                                        id="prince2Image"
                                                        class="mx-auto rounded-lg shadow-lg hover:shadow-xl transition-shadow cursor-pointer max-w-full h-auto"
                                                        src="{{ asset('storage/images/prince2processmodelwithbriefcase.jpg') }}"
                                                        alt="PRINCE2 Process Model"
                                                        onmouseover="this.src='{{ asset('storage/images/prince2modelprocwhereagilehappens.png') }}'"
                                                        onmouseout="this.src='{{ asset('storage/images/prince2processmodelwithbriefcase.jpg') }}'"
                                                >

                                                <p class="text-lg text-gray-700 dark:text-gray-300 mt-4">
                                                    <i>Hover over the image to see where Agility (with Governance) happens.</i>
                                                </p>
                                            </div>
                                        </div>

                                        <!-- Risk Explanation Section -->
                                        <div class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                                                Agile Risk Introduction
                                            </h3>

                                            <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-4">
                                                The image below shows how agility can introduce risk. Can you identify where the risks occur?
                                            </p>

                                            <div class="text-center">
                                                <a
                                                        href="/home/agile?slide=11"
                                                        title="Click here for more on the agile Methods. The Agile Manifesto section - especially project selection matrix - explains this image in more detail."
                                                        class="inline-block bg-white"
                                                >
                                                    <img
                                                            class="mx-auto rounded-lg shadow-lg hover:shadow-xl transition-shadow max-w-full h-auto"
                                                            src="{{ asset('storage/images/tradagilep2a.png') }}"
                                                            alt="Traditional vs Agile PRINCE2"
                                                    >
                                                </a>

                                                <p class="text-lg text-gray-700 dark:text-gray-300 mt-4">
                                                    <i>Click the image above for an overview of the different agile methods</i>
                                                </p>
                                            </div>
                                        </div>

                                        <!-- Additional Information Section -->
                                        <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                                                PRINCE2 Agile Overview
                                            </h3>

                                            <div class="space-y-4">
                                                <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">
                                                    PRINCE2 Agile combines the governance framework of PRINCE2 with agile delivery methods, providing controlled flexibility for project management.
                                                </p>

                                                <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-4 border border-gray-200 dark:border-gray-700">
                                                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                                                        Key Features:
                                                    </h4>
                                                    <ul class="list-disc list-inside text-lg text-gray-700 dark:text-gray-300 space-y-1">
                                                        <li>Structured governance with agile flexibility</li>
                                                        <li>Clear roles and responsibilities</li>
                                                        <li>Focus on business justification</li>
                                                        <li>Iterative delivery with continuous improvement</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="h-8"></div>

                                        <!-- Navigation Section -->
                                        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6">
                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                                                Slide Navigation
                                            </h3>

                                            <div class="flex flex-wrap gap-4 justify-center">
                                                <button
                                                        onclick="carouselPrev()"
                                                        class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 dark:bg-gray-500 dark:hover:bg-gray-600 text-white rounded-lg transition-colors"
                                                >
                                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                                    </svg>
                                                    Previous Slide
                                                </button>

                                                <button
                                                        onclick="carouselNext()"
                                                        class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white rounded-lg transition-colors"
                                                >
                                                    Next Slide
                                                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END PRINCE2 AGILE SLIDE CONTENT -->
                            </div>
                        </div>
                    </div>

                    <!-- ============================ -->
                    <!-- SLIDE 11: DSDM CONTENT AREA -->
                    <!-- ============================ -->
                    <div class="carousel-item">
                        <div class="flex items-center justify-center bg-white dark:bg-gray-800 py-2">
                            <div class="text-center w-full max-w-4xl text-gray-900 dark:text-white">
                                <!-- ⬇️ ADD THIS CONTAINER ⬇️ -->
                                <div class="max-w-6xl mx-auto px-4 py-8">

                                    <!-- YOUR SLIDE CONTENT GOES HERE -->
                                    <div class="space-y-6">
                                        <!-- Heading Section -->
                                        <div class="text-center mb-8">
                                            <h5 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">
                                                <strong>DSDM</strong>
                                            </h5>
                                        </div>

                                        <!-- DSDM Model Image -->
                                        <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 border border-gray-200 dark:border-gray-700 mb-6">
                                            <img
                                                    alt="DSDM Model"
                                                    class="mx-auto bg-white rounded-lg shadow-lg max-w-full h-auto"
                                                    src="{{ asset('storage/images/dsdmorig20160712.png') }}"
                                            >
                                        </div>

                                        <!-- Spacing -->
                                        <div class="h-4"></div>

                                        <!-- Risk Analysis Section -->
                                        <div class="bg-white dark:bg-gray-800 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                                            <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-6 italic">
                                                The image below shows how agility can introduce risk. Can you see it?
                                            </p>

                                            <!-- Interactive Image with Link -->
                                            <a
                                                    href="/agile-methods?slide=12"
                                                    title="Click here for more on the agile Methods. The Agile Manifesto section - especially project selection matrix - explains this image in more detail."
                                                    class="block hover:opacity-90 transition-opacity"
                                            >
                                                <img
                                                        alt="Traditional vs Agile DSDM Risk Comparison"
                                                        class="mx-auto bg-white rounded-lg shadow-lg max-w-full h-auto border border-gray-300 dark:border-gray-600"
                                                        src="{{ asset('storage/images/tradagiledsdm.png') }}"
                                                >
                                            </a>

                                            <p class="text-lg text-gray-600 dark:text-gray-400 mt-4 italic">
                                                Click the image above for an overview of the different agile methods
                                            </p>
                                        </div>

                                        <!-- Additional Spacing -->
                                        <div class="h-8"></div>
                                    </div>

                                    <!-- YOUR NAVIGATION SECTION GOES HERE -->
                                    <!-- SPACING FIX FOR LIVEWIRE -->
                                    <div class="h-8"></div>

                                    <!-- Navigation Section -->
                                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                                            Slide Navigation
                                        </h3>

                                        <div class="flex flex-wrap gap-4 justify-center">
                                            <button
                                                    onclick="carouselPrev()"
                                                    class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 dark:bg-gray-500 dark:hover:bg-gray-600 text-white rounded-lg transition-colors"
                                            >
                                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                                </svg>
                                                Previous Slide
                                            </button>

                                            <button
                                                    onclick="carouselNext()"
                                                    class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white rounded-lg transition-colors"
                                            >
                                                Next Slide
                                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>

                                </div>
                                <!-- ⬆️ END CONTAINER ⬆️ -->
                            </div>
                        </div>
                    </div>

                    <!-- ============================ -->
                    <!-- SLIDE 12: SCRUM CONTENT AREA -->
                    <!-- ============================ -->
                    <div class="carousel-item">
                        <div class="flex items-center justify-center bg-white dark:bg-gray-800 py-2">
                            <div class="text-center w-full max-w-4xl text-gray-900 dark:text-white">
                                <!-- ⬇️ ADD THIS CONTAINER ⬇️ -->
                                <div class="max-w-6xl mx-auto px-4 py-8">

                                    <!-- YOUR SLIDE CONTENT GOES HERE -->
                                    <div class="space-y-6">
                                        <!-- Heading Section -->
                                        <div class="text-center mb-8">
                                            <h5 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">
                                                <strong>Scrum</strong>
                                            </h5>
                                        </div>

                                        <!-- Scrum in Six Minutes Video Section -->
                                        <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 border border-gray-200 dark:border-gray-700 mb-6">
                                            <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 text-center">
                                                Scrum in Six Minutes
                                            </h4>
                                            <div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 p-4 rounded-lg border border-gray-200 dark:border-gray-700">
                                                <video id="video1"
                                                       data-able-player
                                                       preload="metadata"
                                                       data-speed-icons="true"
                                                       class="w-full rounded-lg"
                                                       poster="{{ asset('storage/images/scruminsixmins.png') }}"
                                                       playsinline>
                                                    <source type="video/mp4" src="{{ Storage::url('assets/ablevids/scrum/scrum-six-minutes.mp4') }}">
{{--                                                    <track kind="captions" src="{{ Storage::url('assets/ablevids/scrum/captions.vtt') }}" srclang="en" label="English">--}}
                                                </video>
                                            </div>
                                        </div>

                                        <!-- Scrum Process Images - Stacked Vertically -->
                                        <div class="bg-white dark:bg-gray-800 rounded-lg p-6 border border-gray-200 dark:border-gray-700 mb-6">
                                            <!-- First Image -->
                                            <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg border border-gray-200 dark:border-gray-600 mb-6">
                                                <a
                                                        href="/scrum-dashboards"
                                                        title="Click the image to go to an overview of Scrum method and its process. If you are learning Scrum these form an overview of what you need to know."
                                                        class="block hover:opacity-90 transition-opacity"
                                                >
                                                    <img
                                                            alt="sprint with PP and PMC"
                                                            class="mx-auto bg-white rounded-lg shadow-lg max-w-full h-auto"
                                                            src="{{ asset('storage/images/Scrumprocessswirl.jpg') }}"
                                                    >
                                                </a>
                                            </div>

                                            <!-- Second Image -->
                                            <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg border border-gray-200 dark:border-gray-600">
                                                <a
                                                        href="/scrum-dashboards"
                                                        title="From the Scrum Body of Knowledge 3rd edition"
                                                        class="block hover:opacity-90 transition-opacity"
                                                >
                                                    <img
                                                            class="mx-auto bg-white rounded-lg shadow-lg max-w-full h-auto"
                                                            src="{{ asset('storage/images/scrumdashnochapters.png') }}"
                                                            title="From the Scrum Body of Knowledge 3rd edition"
                                                            alt="Scrum Body of Knowledge"
                                                    >
                                                </a>
                                            </div>
                                        </div>
                                        <!-- Scrum Essence Collapsible Section -->
                                        <div x-data="{ openScrumEssence: false }" class="my-4">
                                            <div class="flex items-center justify-center w-full">
                                                <button
                                                        @click="openScrumEssence = !openScrumEssence"
                                                        class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow transition-colors flex items-center justify-center space-x-2 w-full max-w-md mx-auto">
                                                    <span class="text-xl">The Scrum Essence<br>(for Capability Maturity Level 2+)</span>
                                                    <svg x-show="!openScrumEssence" class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                    </svg>
                                                    <svg x-show="openScrumEssence" class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                                                    </svg>
                                                </button>
                                            </div>

                                            <div x-show="openScrumEssence" x-collapse
                                                 class="mt-3 bg-white dark:bg-gray-800 rounded-lg border border-gray-300 dark:border-gray-700 p-6 shadow-md">
                                                <div class="text-center mb-4">
                                                    <h6 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                        The Essence of Scrum @ Capability Maturity Level 2+
                                                    </h6>
                                                </div>

                                                <div class="text-center">
                                                    <a
                                                            href="{{ asset('storage/assets/scrumvaluemodelessence.pdf') }}"
                                                            class="block hover:opacity-90 transition-opacity"
                                                    >
                                                        <img
                                                                alt="Scrum Value Model essence"
                                                                class="mx-auto rounded-lg shadow-md max-w-full h-auto border border-gray-300 dark:border-gray-600"
                                                                src="{{ asset('storage/images/scrumvaluemodelessence.jpg') }}"
                                                                title="Click the image to download a pdf"
                                                        >
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Risk Analysis Section -->
                                        <div class="bg-white dark:bg-gray-800 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                                            <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-6 italic">
                                                The image below shows how agility can introduce risk. Can you see it?
                                            </p>

                                            <!-- Interactive Image with Link -->
                                            <a
                                                    href="/agile-methods?slide=10"
                                                    title="Click here for more on the agile methods. The Agile Manifesto section - especially project selection matrix - explains this image in more detail."
                                                    class="block hover:opacity-90 transition-opacity"
                                            >
                                                <img
                                                        alt="Traditional vs Agile Scrum Risk Comparison"
                                                        class="mx-auto bg-white rounded-lg shadow-lg max-w-full h-auto border border-gray-300 dark:border-gray-600"
                                                        src="{{ asset('storage/images/tradagilescrum.png') }}"
                                                >
                                            </a>

                                            <p class="text-lg text-gray-600 dark:text-gray-400 mt-4 italic">
                                                Click the image above for an overview of the different agile methods
                                            </p>
                                        </div>

                                        <!-- Additional Spacing -->
                                        <div class="h-8"></div>
                                    </div>

                                    <!-- YOUR NAVIGATION SECTION GOES HERE -->
                                    <!-- SPACING FIX FOR LIVEWIRE -->
                                    <div class="h-8"></div>

                                    <!-- Navigation Section -->
                                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                                            Slide Navigation
                                        </h3>

                                        <div class="flex flex-wrap gap-4 justify-center">
                                            <button
                                                    onclick="carouselPrev()"
                                                    class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 dark:bg-gray-500 dark:hover:bg-gray-600 text-white rounded-lg transition-colors"
                                            >
                                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                                </svg>
                                                Previous Slide
                                            </button>

                                            <button
                                                    onclick="carouselNext()"
                                                    class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white rounded-lg transition-colors"
                                            >
                                                Next Slide
                                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>

                                </div>
                                <!-- ⬆️ END CONTAINER ⬆️ -->
                            </div>
                        </div>
                    </div>



                    <!-- ============================ -->
                    <!-- SLIDE 13: SAFE CONTENT AREA -->
                    <!-- ============================ -->
                    <div class="carousel-item">
                        <div class="flex items-center justify-center bg-white dark:bg-gray-800 py-2">
                            <div class="text-center w-full max-w-4xl text-gray-900 dark:text-white">
                                <!-- ⬇️ ADD THIS CONTAINER ⬇️ -->
                                <div class="max-w-6xl mx-auto px-4 py-8">

                                    <!-- YOUR SLIDE CONTENT GOES HERE -->
                                    <div class="space-y-6">
                                        <!-- Heading Section -->
                                        <div class="text-center mb-8">
                                            <h5 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">
                                                <strong>Scaled Agile Framework (SAFe)</strong>
                                            </h5>
                                        </div>

                                        <!-- SAFe Video Section -->
                                        <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 border border-gray-200 dark:border-gray-700 mb-6">
                                            <div class="text-center">
                                                <a
                                                        href="/home/safe"
                                                        title="Click the image for a short video about Safe"
                                                        class="block hover:opacity-90 transition-opacity mb-4"
                                                >
                                                    <img
                                                            class="mx-auto rounded-lg shadow-lg max-w-full h-auto border border-gray-300 dark:border-gray-600 cursor-pointer"
                                                            src="{{ asset('storage/images/safe.png') }}"
                                                            onmouseover="this.src='{{ asset('storage/images/safeart.png') }}'"
                                                            onmouseout="this.src='{{ asset('storage/images/safe.png') }}'"
                                                            alt="SAFe Framework"
                                                    >
                                                </a>
                                                <p class="text-lg text-gray-700 dark:text-gray-300">
                                                    Click the image above for a short video on SAFe.
                                                </p>
                                            </div>
                                        </div>

                                        <!-- PDF Download Section -->
                                        <div class="bg-white dark:bg-gray-800 rounded-lg p-6 border border-gray-200 dark:border-gray-700 mb-6">
                                            <div class="text-center">
                                                <a
                                                        href="{{ asset('storage/assets/scrumsafelyfordownload.pdf') }}"
                                                        class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white font-semibold rounded-lg transition-colors"
                                                >
                                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                    </svg>
                                                    Click here for Scrum SAFely pdf
                                                </a>
                                            </div>
                                        </div>

                                        <!-- Bottom Line Section -->
                                        <div class="bg-red-50 dark:bg-red-900/20 rounded-lg p-6 border border-red-200 dark:border-red-700 mb-6">
                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4 text-center">
                                                Bottom line:
                                            </h3>
                                            <div class="text-center">
                                                <p class="text-lg leading-relaxed text-gray-800 dark:text-gray-200 italic">
                                                    <b>If your scrums are not <a href="/working-software" class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 underline">releasing valuable working software regularly</a>;<br>
                                                        then SAFe <br>
                                                        (as with the problems [<a href="{{ asset('storage/assets/chaos-report.pdf') }}" class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 underline">and chaos</a>] associated with traditional project management)<br>
                                                        <a href="/pin" class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 underline">if badly run at CM level 1</a><br>
                                                        can be just as <a href="/safe-critique" class="text-red-600 dark:text-red-400 hover:text-red-800 dark:hover:text-red-300 underline"><u>unsafe!</u></a></b>
                                                </p>
                                            </div>
                                        </div>

                                        <!-- Conclusion Section -->
                                        <div class="bg-green-50 dark:bg-green-900/20 rounded-lg p-6 border border-green-200 dark:border-green-700">
                                            <div class="text-center">
                                                <p class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                                                    Therefore fix <a href="/scrumfix" class="text-green-600 dark:text-green-400 hover:text-green-800 dark:hover:text-green-300 underline font-bold">scrum first!</a>
                                                </p>
                                            </div>
                                        </div>

                                        <!-- Additional Spacing -->
                                        <div class="h-8"></div>
                                    </div>

                                    <!-- YOUR NAVIGATION SECTION GOES HERE -->
                                    <!-- SPACING FIX FOR LIVEWIRE -->
                                    <div class="h-8"></div>

                                    <!-- Navigation Section -->
                                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                                            Slide Navigation
                                        </h3>

                                        <div class="flex flex-wrap gap-4 justify-center">
                                            <button
                                                    onclick="carouselPrev()"
                                                    class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 dark:bg-gray-500 dark:hover:bg-gray-600 text-white rounded-lg transition-colors"
                                            >
                                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                                </svg>
                                                Previous Slide
                                            </button>

                                            <button
                                                    onclick="carouselNext()"
                                                    class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white rounded-lg transition-colors"
                                            >
                                                Next Slide
                                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>

                                </div>
                                <!-- ⬆️ END CONTAINER ⬆️ -->
                            </div>
                        </div>
                    </div>
                    <!-- ============================ -->
                    <!-- SLIDE 14: PEOPLE CMM CONTENT AREA -->
                    <!-- ============================ -->
                    <div class="carousel-item">
                        <div class="flex items-center justify-center bg-white dark:bg-gray-800 py-2">
                            <div class="text-center w-full max-w-4xl text-gray-900 dark:text-white">
                                <!-- ⬇️ ADD THIS CONTAINER ⬇️ -->
                                <div class="max-w-6xl mx-auto px-4 py-8">

                                    <!-- YOUR SLIDE CONTENT GOES HERE -->
                                    <div class="space-y-6">
                                        <!-- Heading Section -->
                                        <div class="text-center mb-8">
                                            <h5 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">
                                                <strong>People CMM</strong>
                                            </h5>
                                        </div>

                                        <!-- People CMM Image -->
                                        <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 border border-gray-200 dark:border-gray-700 mb-6">
                                            <div class="bg-white dark:bg-white p-4 rounded-lg border border-gray-300 dark:border-gray-400 shadow-sm">
                                                <img
                                                        alt="People CMM Overview"
                                                        class="mx-auto rounded-lg max-w-full h-auto"
                                                        src="{{ asset('storage/images/pcmmoverviewbevelled.png') }}"
                                                >
                                            </div>
                                        </div>

                                        <!-- Level 1: Herding Cats Collapsible Section -->
                                        <div x-data="{ openHerdingCats: false }" class="my-4">
                                            <div class="flex items-center justify-center w-full">
                                                <button
                                                        @click="openHerdingCats = !openHerdingCats"
                                                        class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow transition-colors flex items-center justify-center space-x-2 w-full max-w-md mx-auto"
                                                >
                                                    <span class="text-xl">Level 1: Herding Cats</span>
                                                    <svg x-show="!openHerdingCats" class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                    </svg>
                                                    <svg x-show="openHerdingCats" class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                                                    </svg>
                                                </button>
                                            </div>

                                            <div x-show="openHerdingCats" x-collapse
                                                 class="mt-3 bg-white dark:bg-gray-800 rounded-lg border border-gray-300 dark:border-gray-700 p-6 shadow-md">

                                                <div class="text-center mb-6">
                                                    <h5 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                                                        <a href="/american-football" class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 underline">
                                                            Consider American Football in the NFL
                                                        </a>
                                                    </h5>
                                                    <p class="text-lg text-gray-700 dark:text-gray-300 mb-4">
                                                        (Click the link directly above to understand why PMWay sees American Football as CM Level 2+ in action)<br>
                                                        <b>These "highly professional and cooler than the coolest cats" <br>all understand EXACTLY the rules of how to win with their game!</b><br>
                                                        PMWay suggests Just Doing It with the attitude below will not win the Super bowl!
                                                    </p>
                                                </div>

                                                <div class="text-center space-y-6">
                                                    <p class="text-lg text-gray-700 dark:text-gray-300">
                                                        Now click the Shepherd below to see this from a Scrum Master's perspective. <br>
                                                        <a href="/cmmi-landing" class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 underline">
                                                            Click here
                                                        </a> to pin down the problem and obvious solution.
                                                    </p>

                                                    <!-- Interactive Catastrophe Image -->
                                                    <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg border border-gray-200 dark:border-gray-600">
                                                        <img
                                                                alt="Catastrophe to Scrum Master Perspective"
                                                                class="mx-auto rounded-lg max-w-full h-auto cursor-pointer bg-white dark:bg-white"
                                                                title="Click this image for an idea of what a Scrum Master must put up with at CM L1"
                                                                src="{{ asset('storage/images/catastrophe.jpg') }}"
                                                                onmouseover="this.src='{{ asset('storage/images/catastrophescrum.jpg') }}'"
                                                                onmouseout="this.src='{{ asset('storage/images/catastrophe.jpg') }}'"
                                                        >
                                                    </div>

                                                    <!-- Art of Herding Cats Image -->
                                                    <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg border border-gray-200 dark:border-gray-600">
                                                        <img
                                                                alt="Art of Herding Cats"
                                                                class="mx-auto rounded-lg max-w-full h-auto"
                                                                src="{{ asset('storage/images/artofherdingcats.jpg') }}"
                                                        >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- People Collapsible Section -->
                                        <div x-data="{ openPeople: false }" class="my-4">
                                            <div class="flex items-center justify-center w-full">
                                                <button
                                                        @click="openPeople = !openPeople"
                                                        class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow transition-colors flex items-center justify-center space-x-2 w-full max-w-md mx-auto"
                                                >
                                                    <span class="text-xl">People</span>
                                                    <svg x-show="!openPeople" class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                    </svg>
                                                    <svg x-show="openPeople" class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                                                    </svg>
                                                </button>
                                            </div>

                                            <div x-show="openPeople" x-collapse
                                                 class="mt-3 bg-white dark:bg-gray-800 rounded-lg border border-gray-300 dark:border-gray-700 p-6 shadow-md">

                                                <div class="space-y-6 text-left">
                                                    <p class="text-lg text-gray-700 dark:text-gray-300">
                                                        In order to run projects (especially Agile) correctly your people need capabilities and maturity.
                                                    </p>

                                                    <p class="text-lg text-gray-700 dark:text-gray-300">
                                                        Agile postulates the "cohesive empowered professional team,"<br>
                                                        with all the necessary skills required for the project existing within the team!<br>
                                                        These "adequately empowered workgroups" are normally only found at CM Level 4.<br>
                                                        Can you see the truth of this?
                                                    </p>

                                                    <p class="text-lg text-gray-700 dark:text-gray-300">
                                                        Executive support [Executive Action Team (to EAT "the red beads")] is the key to success!<br>
                                                        As a test of this (and where the Executive need to
                                                        <a href="/red-bead-experiment" class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 underline">
                                                            remove the red beads
                                                        </a>) [of which a lack of training in the team on what, when, why and how with regard to project processes to be followed will definitely create red beads],<br>
                                                        if you have a scrum team (as example),<br>
                                                        find out how many on the team actually have the entry level foundation certificate of competency for the scrum method?
                                                    </p>

                                                    <div class="bg-yellow-50 dark:bg-yellow-900/20 border-l-4 border-yellow-500 p-4 rounded-r-lg">
                                                        <p class="text-lg font-semibold text-gray-900 dark:text-white">
                                                            Bottom Line: If you want to do Scrum (or any project method correctly) that starting point is to ensure your people are adequately trained / certified!
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Additional Spacing -->
                                        <div class="h-8"></div>
                                    </div>

                                    <!-- YOUR NAVIGATION SECTION GOES HERE -->
                                    <!-- SPACING FIX FOR LIVEWIRE -->
                                    <div class="h-8"></div>

                                    <!-- Navigation Section -->
                                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                                            Slide Navigation
                                        </h3>

                                        <div class="flex flex-wrap gap-4 justify-center">
                                            <button
                                                    onclick="carouselPrev()"
                                                    class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 dark:bg-gray-500 dark:hover:bg-gray-600 text-white rounded-lg transition-colors"
                                            >
                                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                                </svg>
                                                Previous Slide
                                            </button>

                                            <button
                                                    onclick="carouselNext()"
                                                    class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white rounded-lg transition-colors"
                                            >
                                                Next Slide
                                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>

                                </div>
                                <!-- ⬆️ END CONTAINER ⬆️ -->
                            </div>
                        </div>
                    </div>Hi Unik.

                    <!-- ============================ -->
                    <!-- SLIDE 15: COBIT 5 CONTENT AREA -->
                    <!-- ============================ -->
                    <div class="carousel-item">
                        <div class="flex items-center justify-center bg-white dark:bg-gray-800 py-2">
                            <div class="text-center w-full max-w-4xl text-gray-900 dark:text-white">
                                <div class="max-w-6xl mx-auto px-4 py-8">

                                    <div class="bg-white dark:bg-gray-800 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                                        <h5 class="text-xl font-bold text-gray-900 dark:text-white mb-4 text-center">
                                            <strong>COBIT 5</strong>
                                        </h5>

                                        <div class="flex justify-center mb-6">
                                            <img alt="COBIT Process Reference Model" class="max-w-full h-auto rounded-lg shadow-md"
                                                 src="{{ asset('storage/images/11scobitprocessreferencemodel.png') }}">
                                        </div>

                                        <!-- COBIT Details Button -->
                                        <div x-data="{ openCobitDetails: false }" class="my-4">
                                            <div class="flex justify-center mb-6">
                                                <button @click="openCobitDetails = !openCobitDetails"
                                                        class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white font-semibold rounded-lg transition-colors space-x-2">
                                                    <span>COBIT Details</span>
                                                    <svg x-show="!openCobitDetails" class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                    </svg>
                                                    <svg x-show="openCobitDetails" class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                                                    </svg>
                                                </button>
                                            </div>

                                            <div x-show="openCobitDetails" x-collapse
                                                 class="mt-3 bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700 p-6">
                                                <div class="container mx-auto">
                                                    <h5 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 text-center">Control Objectives In Business and IT</h5>

                                                    <div class="space-y-4 text-left">
                                                          <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">
                                                      

                                                            It is quite a challenge to install COBIT.<br>
                                                            Guess what. It's easier to install than you realize.
                                                        </p>

                                                          <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">
                                                            Can you find BAI01 Manage Programs and Projects?
                                                        </p>

                                                          <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">
                                                            Thinking back to the <a href="/the-pmway?slide=3"
                                                                                    class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 underline" target="_blank">
                                                                Strategy Wall Slide #3</a> can you find APO02?<br>
                                                            What about the <a href="/the-pmway?slide=8"
                                                                              class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 underline" target="_blank">
                                                                ITIL Slide #8</a> (APO03, BAI04, BAI06 etc.)?
                                                        </p>

                                                          <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">
                                                            As with tailoring the PMBOK processes (and other method processes),
                                                            COBIT needs to be implemented systematically so that it leverages off
                                                            installed, operational and stable CM Model processes.
                                                        </p>

                                                        <div class="flex justify-center my-6">
                                                            <img alt="Eat the elephant one bite at a time" class="max-w-xs h-auto rounded-lg"
                                                                 src="{{ asset('storage/images/elephant_one_bite.png') }}">
                                                        </div>

                                                        <p class="text-center text-gray-700 dark:text-gray-300 font-medium">
                                                            Systematically installing the essence of the previous slides<br>
                                                            (in bite sized and digestible chunks)<br>
                                                            means COBIT is now also installed!
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="h-24"></div>

                                    <!-- Navigation Section -->
                                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                                            Slide Navigation
                                        </h3>

                                        <div class="flex flex-wrap gap-4 justify-center">
                                            <button onclick="carouselPrev()"
                                                    class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 dark:bg-gray-500 dark:hover:bg-gray-600 text-white rounded-lg transition-colors">
                                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                                </svg>
                                                Previous Slide
                                            </button>

                                            <button onclick="carouselNext()"
                                                    class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white rounded-lg transition-colors">
                                                Next Slide
                                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ============================ -->
                    <!-- SLIDE 16: PDCA CYCLE CONTENT AREA -->
                    <!-- ============================ -->
                    <div class="carousel-item">
                        <div class="flex items-center justify-center bg-white dark:bg-gray-800 py-2">
                            <div class="text-center w-full max-w-4xl text-gray-900 dark:text-white">
                                <div class="max-w-6xl mx-auto px-4 py-8">

                                    <div class="bg-white dark:bg-gray-800 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                                        <h5 class="text-xl font-bold text-gray-900 dark:text-white mb-4 text-center">
                                            <strong>PLAN DO CHECK ACT</strong> <br>(PDCA)
                                        </h5>

                                        <p class="text-center text-gray-700 dark:text-gray-300 mb-6">
                                            The image below explains why<br>
                                            "Just Do It" at CM L1 is really a bad idea!
                                        </p>

                                        <div class="flex justify-center mb-6">
                                            <img alt="No PDCA Cycle" class="max-w-full h-auto rounded-lg shadow-md"
                                                 src="{{ asset('storage/images/nopdcacycle.jpg') }}">
                                        </div>

                                        <!-- PDCA Details Button -->
                                        <div x-data="{ openPdcaDetails: false }" class="my-4">
                                            <div class="flex justify-center mb-6">
                                                <button @click="openPdcaDetails = !openPdcaDetails"
                                                        class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white font-semibold rounded-lg transition-colors space-x-2">
                                                    <span>PDCA Details</span>
                                                    <svg x-show="!openPdcaDetails" class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                    </svg>
                                                    <svg x-show="openPdcaDetails" class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                                                    </svg>
                                                </button>
                                            </div>

                                            <div x-show="openPdcaDetails" x-collapse
                                                 class="mt-3 bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700 p-6">
                                                <div class="container mx-auto">
                                                    <h6 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 text-center">Here is the PDCA cycle</h6>

                                                    <div class="flex justify-center mb-6">
                                                        <img alt="PDCA Cycle" class="max-w-md h-auto rounded-lg"
                                                             src="{{ asset('storage/images/pdca_cycle.png') }}">
                                                    </div>

                                                    <div class="space-y-4 text-left">
                                                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">
                                                            PDCA (plan do check act or plan do check adjust) is an iterative four-step management method used in business for the control and continuous improvement of processes and products. It is also known as the Deming circle/cycle/wheel, Shewhart cycle, control circle/cycle, or Plan Do Study Act (PDSA). Another version of this PDCA cycle is OPDCA. The added "O" stands for observation or as some versions say "Grasp the current condition." This emphasis on observation and current condition has currency with Lean manufacturing/Toyota Production System literature.
                                                        </p>
                                                    </div>

                                                    <!-- PDCA - How It Works Section -->
                                                    <div x-data="{ openPdcaWorks: false }" class="mt-6">
                                                        <div class="flex justify-center">
                                                            <button @click="openPdcaWorks = !openPdcaWorks"
                                                                    class="inline-flex items-center px-6 py-3 bg-green-600 hover:bg-green-700 dark:bg-green-500 dark:hover:bg-green-600 text-white font-semibold rounded-lg transition-colors space-x-2">
                                                                <span>PDCA - How It Works</span>
                                                                <svg x-show="!openPdcaWorks" class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                                </svg>
                                                                <svg x-show="openPdcaWorks" class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                                                                </svg>
                                                            </button>
                                                        </div>

                                                        <div x-show="openPdcaWorks" x-collapse
                                                             class="mt-4 bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-6">
                                                            <div class="space-y-6">
                                                                <div>
                                                                    <h5 class="text-lg font-bold text-gray-900 dark:text-white mb-3 text-center">PLAN</h5>
                                                                    <p class="text-gray-700 dark:text-gray-300 text-left">
                                                                        Establish the objectives and processes necessary to deliver results in accordance with the expected output (the target or goals). By establishing output expectations, the completeness and accuracy of the spec is also a part of the targeted improvement. When possible start on a small scale to test possible effects.
                                                                    </p>
                                                                </div>

                                                                <div>
                                                                    <h5 class="text-lg font-bold text-gray-900 dark:text-white mb-3 text-center">DO</h5>
                                                                    <p class="text-gray-700 dark:text-gray-300 text-left">
                                                                        Implement the plan, execute the process, make the product. Collect data for charting and analysis in the following "CHECK" and "ACT" steps.
                                                                    </p>
                                                                </div>

                                                                <div>
                                                                    <h5 class="text-lg font-bold text-gray-900 dark:text-white mb-3 text-center">CHECK</h5>
                                                                    <p class="text-gray-700 dark:text-gray-300 text-left">
                                                                        Study the actual results (measured and collected in "DO" above) and compare against the expected results (targets or goals from the "PLAN") to ascertain any differences. Look for deviation in implementation from the plan and also look for the appropriateness and completeness of the plan to enable the execution, i.e., "Do". Charting data can make this much easier to see trends over several PDCA cycles and in order to convert the collected data into information. Information is what you need for the next step "ACT".
                                                                    </p>
                                                                </div>

                                                                <div>
                                                                    <h5 class="text-lg font-bold text-gray-900 dark:text-white mb-3 text-center">ACT</h5>
                                                                    <p class="text-gray-700 dark:text-gray-300 text-left">
                                                                        Request corrective actions on significant differences between actual and planned results. Analyze the differences to determine their root causes. Determine where to apply changes that will include improvement of the process or product. When a pass through these four steps does not result in the need to improve, the scope to which PDCA is applied may be refined to plan and improve with more detail in the next iteration of the cycle, or attention needs to be placed in a different stage of the process.
                                                                    </p>
                                                                </div>

                                                                <p class="text-gray-700 dark:text-gray-300 text-left text-sm italic">
                                                                    Note: Some modern trainers now also refer to the "A" as "Adjust". This helps trainees to understand that the 4th step is more about adjusting/correcting the difference between the current state and the planned state instead of thinking that the "A" is all about action and implementation (which actually happens in the second ("D") stage).
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Plan, Check & Act Section -->
                                                    <div x-data="{ openCheckAct: false }" class="mt-6">
                                                        <div class="flex justify-center">
                                                            <button @click="openCheckAct = !openCheckAct"
                                                                    class="inline-flex items-center px-6 py-3 bg-purple-600 hover:bg-purple-700 dark:bg-purple-500 dark:hover:bg-purple-600 text-white font-semibold rounded-lg transition-colors space-x-2 text-center">
                                                                <span>Plan, Check & Act<br>- Difficult to get correct!</span>
                                                                <svg x-show="!openCheckAct" class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                                </svg>
                                                                <svg x-show="openCheckAct" class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                                                                </svg>
                                                            </button>
                                                        </div>

                                                        <div x-show="openCheckAct" x-collapse
                                                             class="mt-4 bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-6">
                                                            <div class="space-y-4 text-left">
                                                                  <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">
                                                                    We all know that Plan-Do-Check-Act is the heart of Continuous Improvement, so why do so many business leaders fall down when it comes to Check-Act? And what should they do about it?
                                                                </p>

                                                                  <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">
                                                                    Directors and Senior Managers provided that they aren't completely stuck in fire-fighting mode are usually quite happy with the Plan part.<br>
                                                                    They've been trained to set SMART objectives, they appraise their direct reports regularly, and they regularly provide effective feedback. They understand effective Project Management and perhaps apply Hoshin Planning/Policy Deployment. Having worked out the Plan, they often develop their people by delegating the Doing. They know that for people to learn, grow and develop they need to be challenged and supported. So they expect the best but they also provide plenty of support. In other words they coach: they work with their people, they don't do it to them or do it for them.
                                                                </p>

                                                                <p class="text-xl text-gray-700 dark:text-gray-300 font-semibold">
                                                                    Sounds great, doesn't it?
                                                                </p>

                                                                  <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">
                                                                    But experienced leaders know the reality coaching can be time-consuming, frustrating, and damned hard work! And often there just don't seem to be enough hours in the day.
                                                                </p>

                                                                  <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">
                                                                    That's one reason why many managers instead of delegating, coaching and empowering often let people just get on with it. And most operations folk are very good at getting on with it it's what they like, it's what they're good at, and traditionally it's often what they're rewarded for.
                                                                </p>

                                                                  <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">
                                                                    The problem is that most people are good at doing what they've always done, in the way that they've always done it. So they produce the same results that they've always produced not always consistently, and not always Right First Time. At an organizational level, that leads to inertia and complacency and that in turn hampers learning which ultimately leads to extinction.
                                                                </p>

                                                                <p class="text-xl text-gray-700 dark:text-gray-300 font-semibold">
                                                                    Maybe it's human nature: we all want to improve we just don't want to change. Yet in our hearts we know that if we really want to improve then we have to change what we do or how we do it.
                                                                </p>

                                                                  <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">
                                                                    We have to stand back and review what we do, and what we get, and then we need to take action as appropriate. As leaders we have to make sure that reviews are properly conducted, that follow-up's actually happen and that actions are taken. In other words, we need to spend time on Check and Act. So how do we actually do this in practice?
                                                                </p>

                                                                  <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">
                                                                    <strong>The answer as with most improvement activities is: (1) Start Simple; and (2) Make it a Habit</strong>
                                                                </p>

                                                                  <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">
                                                                    <strong>Simple</strong> means diarizing a review session, and making sure it takes place.
                                                                </p>

                                                                  <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">
                                                                    <strong>Make it a Habit</strong> means making sure that all leaders always build in a review to all improvement activities.
                                                                </p>

                                                                  <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">
                                                                    This is an ideal opportunity to lead by example show colleagues how quick and easy a review can be, and how useful it is. Once people begin to get the review habit, you can move on to formalize it, by including review and action steps in your key processes. To start with, focus on the areas of the business where this will have the biggest impact or where you most need to improve. Maybe it's after completion of each major project, job or contract. Get the team together formally with your supplier(s) and customer(s), if at all possible and ask honestly what went well, what didn't go to plan, and what you can learn from this.
                                                                </p>

                                                                  <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">
                                                                    How you handle these sessions goes to the heart of the organization's culture always remember, when things go wrong: Never blame the people; always blame the process.
                                                                </p>

                                                                  <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">
                                                                    <a href="/red-bead-experiment" class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 underline">
                                                                        As W Edwards Deming taught us many years ago
                                                                    </a> (his 14 observations for management), Continuous Improvement will only happen in an open, honest environment of trust and an absence of fear.
                                                                </p>

                                                                <p class="text-xl text-gray-700 dark:text-gray-300 font-semibold">
                                                                    Critically, leaders then need to make sure that the right actions are taken.
                                                                </p>

                                                                  <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">
                                                                    If you've achieved the results you wanted, then the new ways of working need to be locked in with Standard Operating Procedures and training, and regularly monitored until the new One Best Way becomes embedded.
                                                                </p>

                                                                  <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">
                                                                    If you haven't sufficiently closed the gap between as is and should be then you need to go through the PDCA cycle again.
                                                                </p>

                                                                  <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">
                                                                    And remember the Act part isn't done until you've taken full advantage of any read-across opportunities, you've removed those initial quick fixes and you've embedded your new One Best Way until next time!
                                                                </p>

                                                                  <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">
                                                                    The message then for senior managers is if you want to keep on improving, complete the cycle!
                                                                </p>

                                                                  <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">
                                                                    Implementation is about planning and doing but improving is about checking and taking action. By all means delegate these tasks but ultimately it's your responsibility to ensure that improvements are identified, acted upon, followed up and sustained.
                                                                </p>

                                                                  <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">
                                                                    In other words, to borrow a great motto from the corporate governance arena, <em><strong>Trust and check</strong></em>: trust people to do what is required but also build in sufficient checks and balances. If you do then you will be sure to improve, and you'll also be sure that you're improving.
                                                                </p>

                                                                <p class="text-gray-700 dark:text-gray-300 text-sm italic">
                                                                    Article by Andrew Nicholson
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- PDCA Implementation Images -->
                                                    <div class="mt-8">
                                                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4 text-center">This is how you do PDCA!</h3>

                                                        <div class="flex justify-center mb-6">
                                                            <img alt="PDCA Continually" class="max-w-full h-auto rounded-lg shadow-md"
                                                                 src="{{ asset('storage/images/pdcacontinually.png') }}">
                                                        </div>

                                                        <div class="flex justify-center mb-6">
                                                            <a name="pdca"></a>
                                                            <img alt="Quality Models" class="max-w-full h-auto rounded-lg shadow-md"
                                                                 src="{{ asset('storage/images/qualitymodels.png') }}">
                                                        </div>
                                                    </div>

                                                    <!-- PDCA History Section -->
                                                    <div x-data="{ openHistory: false }" class="mt-6">
                                                        <div class="flex justify-center">
                                                            <button @click="openHistory = !openHistory"
                                                                    class="inline-flex items-center px-6 py-3 bg-indigo-600 hover:bg-indigo-700 dark:bg-indigo-500 dark:hover:bg-indigo-600 text-white font-semibold rounded-lg transition-colors space-x-2">
                                                                <span>PDCA - History Lesson!</span>
                                                                <svg x-show="!openHistory" class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                                </svg>
                                                                <svg x-show="openHistory" class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                                                                </svg>
                                                            </button>
                                                        </div>

                                                        <div x-show="openHistory" x-collapse
                                                             class="mt-4 bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-6">
                                                            <div class="space-y-4 text-left">
                                                                  <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">
                                                                    PDCA was made popular by Dr W. Edwards Deming, who is considered by many to be the father of modern quality control; however, he always referred to it as the "Shewhart cycle". Later in Deming's career, he modified PDCA to "Plan, Do, Study, Act" (PDSA) because he felt that "check" emphasized inspection over analysis.
                                                                </p>

                                                                  <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">
                                                                    The concept of PDCA is based on the scientific method, as developed from the work of Francis Bacon (Novum Organum, 1620). The scientific method can be written as "hypothesis" "experiment" "evaluation" or plan, do and check. Shewhart described manufacture under "control" "under statistical control" as a three-step process of specification, production, and inspection. He also specifically related this to the scientific method of hypothesis, experiment, and evaluation. Shewhart says that the statistician "must help to change the demand [for goods] by showing how to close up the tolerance range and to improve the quality of goods." Clearly, Shewhart intended the analyst to take action based on the conclusions of the evaluation. According to Deming, during his lectures in Japan in the early 1950s, the Japanese participants shortened the steps to the now traditional plan, do, check, act. Deming preferred plan, do, study, act because "study" has connotations in English closer to Shewhart's intent than "check".
                                                                </p>

                                                                  <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">
                                                                    A fundamental principle of the scientific method and PDCA is iteration "once a hypothesis is confirmed (or negated), executing the cycle again will extend the knowledge further. Repeating the PDCA cycle can bring us closer to the goal, usually a perfect operation and output.
                                                                </p>

                                                                  <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">
                                                                    Another fundamental function of PDCA is the "hygienic" separation of each phase, for if not properly separated measurements of effects due to various simultaneous actions (causes) risk becoming confounded.
                                                                </p>

                                                                  <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">
                                                                    PDCA (and other forms of scientific problem solving) is also known as a system for developing critical thinking. At Toyota this is also known as "Building people before building cars." Toyota and other Lean companies propose that an engaged, problem-solving workforce using PDCA is better able to innovate and stay ahead of the competition through rigorous problem solving and the subsequent innovations. This also creates a culture of problem solvers using PDCA and creating a culture of critical thinkers.
                                                                </p>

                                                                  <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">
                                                                    In Six Sigma programs, the PDCA cycle is called "define, measure, analyze, improve, control" (DMAIC). The iterative nature of the cycle must be explicitly added to the DMAIC procedure.
                                                                </p>

                                                                  <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">
                                                                    Deming continually emphasized iterating towards an improved system, hence PDCA should be repeatedly implemented in spirals of increasing knowledge of the system that converge on the ultimate goal, each cycle closer than the previous. One can envision an open coil spring, with each loop being one cycle of the scientific method - PDCA, and each complete cycle indicating an increase in our knowledge of the system under study. This approach is based on the belief that our knowledge and skills are limited, but improving. Especially at the start of a project, key information may not be known; the PDCA scientific method "provides feedback to justify our guesses (hypotheses) and increase our knowledge. Rather than enter "analysis paralysis" to get it perfect the first time, it is better to be approximately right than exactly wrong. With the improved knowledge, we may choose to refine or alter the goal (ideal state). Certainly, the PDCA approach can bring us closer to whatever goal we choose.
                                                                </p>

                                                                  <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">
                                                                    Rate of change, that is, rate of improvement, is a key competitive factor in today's world. PDCA allows for major "jumps" in performance ("breakthroughs" often desired in a Western approach), as well as Kaizen (frequent small improvements). In the United States a PDCA approach is usually associated with a sizable project involving numerous people's time, and thus managers want to see large "breakthrough" improvements to justify the effort expended. However, the scientific method and PDCA apply to all sorts of projects and improvement activities.
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="h-24"></div>

                                    <!-- Navigation Section -->
                                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6">

                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                                            Slide Navigation
                                        </h3>

                                        <div class="flex flex-wrap gap-4 justify-center">
                                            <button onclick="carouselPrev()"
                                                    class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 dark:bg-gray-500 dark:hover:bg-gray-600 text-white rounded-lg transition-colors">
                                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                                </svg>
                                                Previous Slide
                                            </button>

                                            <button onclick="carouselNext()"
                                                    class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white rounded-lg transition-colors">
                                                Next Slide
                                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================ -->
                    <!-- END SLIDE 16: PDCA CYCLE -->
                    <!-- ============================ -->


                    <!-- End of the carousel content -->

                    <div class="carousel-item active">
                        <div class="flex items-center justify-center bg-white dark:bg-gray-800 py-2">
                            <div class="text-center w-full max-w-6xl text-gray-900 dark:text-white">
                                <h3>Slide 1 Content</h3>
                                <!-- Rest of slide 1 content -->
                            </div>
                        </div>
                    </div>

                    <!-- Continue with slides 2-16 -->

                </div>

                <!-- Carousel Controls -->
                <button class="carousel-control prev" onclick="carouselPrev()">
                    <svg class="w-4 h-4 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </button>
                <button class="carousel-control next" onclick="carouselNext()">
                    <svg class="w-4 h-4 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
            </div>

            <!-- Numbered Slide Navigation -->
            <div class="slide-numbers" id="slideNumbers">
                <!-- Number buttons will be generated by JavaScript -->
            </div>

            <!-- Manual Controls -->
            <div class="mt-6 flex flex-wrap justify-center gap-2">
                <button class="px-3 py-2 bg-primary-600 hover:bg-primary-700 text-white rounded-lg transition-colors text-sm"
                        onclick="carouselPrev()">
                    ← Previous
                </button>
                <button class="px-3 py-2 bg-primary-600 hover:bg-primary-700 text-white rounded-lg transition-colors text-sm"
                        onclick="carouselNext()">
                    Next →
                </button>
            </div>
        </div>

        <div class="flex flex-col items-center justify-center space-y-4 text-center">
            <div class="flex flex-col items-center">
                <p class="mt-2">Accessible IT Strategy?</p>
            </div>
        </div>

        <div class="flex flex-col items-center">
            <a href="{{ asset('storage/assets/itilfouroverview.pdf') }}" title="view presentation in pdf">
                <i class="fa-regular fa-4x fa-file-pdf"></i>
            </a>
        </div>
    </div>

    {{-- ✅ CLOSING THE WRAPPER DIV --}}
</div>

<script>
    // Toggle section visibility
    function toggleSection(sectionId) {
        const section = document.getElementById(sectionId);
        if (section) {
            section.classList.toggle('hidden');
            // Recalculate carousel height after section toggle
            setTimeout(updateCarouselHeight, 100);
        }
    }

    // Carousel state
    let currentSlide = 0;
    const totalSlides = 16;

    // Initialize when DOM is loaded
    document.addEventListener('DOMContentLoaded', function () {
        initializeCarousel();
        initializeDraggable();
        setupTouchEvents();

        // Check URL for slide parameter
        const urlParams = new URLSearchParams(window.location.search);
        const slideParam = urlParams.get('slide');
        if (slideParam && !isNaN(slideParam) && slideParam >= 1 && slideParam <= totalSlides) {
            goToSlide(parseInt(slideParam) - 1);
        }

        // Add window resize listener
        window.addEventListener('resize', debounce(updateCarouselHeight, 250));

        // Watch for image loads
        const carousel = document.querySelector('.pmway-page-content .carousel');
        if (carousel) {
            const images = carousel.querySelectorAll('img');
            images.forEach(img => {
                if (img.complete) {
                    updateCarouselHeight();
                } else {
                    img.addEventListener('load', updateCarouselHeight);
                }
            });
        }
    });

    // Debounce function to limit how often a function can fire
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

    // NEW: Separate function to update carousel height - ROBUST VERSION
    function updateCarouselHeight() {
        const carousel = document.querySelector('.pmway-page-content .carousel');
        const slides = document.querySelectorAll('.pmway-page-content .carousel-item');

        if (carousel && slides[currentSlide]) {
            requestAnimationFrame(() => {
                const activeSlide = slides[currentSlide];

                // Find all content within the slide
                const contentElements = activeSlide.querySelectorAll('*');
                let maxBottom = 0;

                // Find the lowest point of any content in the slide
                contentElements.forEach(element => {
                    const rect = element.getBoundingClientRect();
                    const slideRect = activeSlide.getBoundingClientRect();
                    const relativeBottom = rect.bottom - slideRect.top;
                    if (relativeBottom > maxBottom) {
                        maxBottom = relativeBottom;
                    }
                });

                // Add padding for safety
                const finalHeight = maxBottom + 40;

                console.log(`📏 Setting carousel height: ${finalHeight}px for slide ${currentSlide + 1}`);
                carousel.style.height = `${finalHeight}px`;
            });
        }
    }

    // Carousel Functions
    function initializeCarousel() {
        console.log("✅ Custom carousel initialized with", totalSlides, "slides");
        generateNumberedButtons();
        updateCarousel();

        // Set initial height after a short delay to ensure content is loaded
        setTimeout(updateCarouselHeight, 300);

        // Watch for Alpine.js collapsible changes
        document.addEventListener('click', function(e) {
            if (e.target.closest('[x-data]')) {
                setTimeout(updateCarouselHeight, 350);
            }
        });
    }

    function generateNumberedButtons() {
        const numbersContainer = document.getElementById('slideNumbers');
        const topNumbersContainer = document.getElementById('slideNumbersTop');

        if (numbersContainer) {
            numbersContainer.innerHTML = '';
        }
        if (topNumbersContainer) {
            topNumbersContainer.innerHTML = '';
        }

        for (let i = 0; i < totalSlides; i++) {
            // Bottom numbered buttons
            if (numbersContainer) {
                const btn = document.createElement('button');
                btn.className = `slide-number-btn ${i === currentSlide ? 'active' : ''}`;
                btn.textContent = i + 1;
                btn.onclick = () => goToSlide(i);
                numbersContainer.appendChild(btn);
            }

            // Top numbered buttons
            if (topNumbersContainer) {
                const btnTop = document.createElement('button');
                btnTop.className = `slide-number-btn ${i === currentSlide ? 'active' : ''}`;
                btnTop.textContent = i + 1;
                btnTop.onclick = () => goToSlide(i);
                topNumbersContainer.appendChild(btnTop);
            }
        }
    }

    function goToSlide(slideIndex) {
        if (slideIndex >= 0 && slideIndex < totalSlides) {
            currentSlide = slideIndex;
            updateCarousel();

            // Update URL
            const newUrl = window.location.pathname + '?slide=' + (slideIndex + 1);
            window.history.pushState({}, '', newUrl);

            // Update height after slide change
            setTimeout(updateCarouselHeight, 100);
        }
    }

    function updateCarousel() {
        const inner = document.querySelector('.pmway-page-content .carousel-inner');
        const topNumberButtons = document.querySelectorAll('.pmway-page-content #slideNumbersTop .slide-number-btn');
        const bottomNumberButtons = document.querySelectorAll('.pmway-page-content #slideNumbers .slide-number-btn');
        const slides = document.querySelectorAll('.pmway-page-content .carousel-item');

        if (inner) {
            inner.style.transform = `translateX(-${currentSlide * 100}%)`;
        }

        // Update active states
        slides.forEach((item, index) => {
            item.classList.toggle('active', index === currentSlide);
        });

        // Update bottom numbered buttons
        bottomNumberButtons.forEach((button, index) => {
            button.classList.toggle('active', index === currentSlide);
        });

        // Update top numbered buttons
        topNumberButtons.forEach((button, index) => {
            button.classList.toggle('active', index === currentSlide);
        });

        console.log(`🎠 Carousel moved to slide: ${currentSlide + 1}`);

        // Update height immediately and after transition
        updateCarouselHeight();
        setTimeout(updateCarouselHeight, 650); // After transition completes
    }

    function carouselNext() {
        if (currentSlide < totalSlides - 1) {
            goToSlide(currentSlide + 1);
        }
    }

    function carouselPrev() {
        if (currentSlide > 0) {
            goToSlide(currentSlide - 1);
        }
    }

    // Touch events for mobile swiping
    function setupTouchEvents() {
        const carousel = document.querySelector('.pmway-page-content .carousel-inner');
        if (!carousel) return;

        let startX = 0;
        let currentX = 0;
        let isDragging = false;

        carousel.addEventListener('touchstart', (e) => {
            startX = e.touches[0].clientX;
            isDragging = true;
        });

        carousel.addEventListener('touchmove', (e) => {
            if (!isDragging) return;
            currentX = e.touches[0].clientX;
        });

        carousel.addEventListener('touchend', () => {
            if (!isDragging) return;
            const diff = startX - currentX;
            const threshold = 50;

            if (Math.abs(diff) > threshold) {
                if (diff > 0) {
                    carouselNext();
                } else {
                    carouselPrev();
                }
            }
            isDragging = false;
        });
    }

    // ... rest of your draggable code stays the same ...
    function initializeDraggable() {
        if (typeof jQuery !== 'undefined' && typeof jQuery.fn.draggable !== 'undefined') {
            console.log("✅ jQuery UI draggable is available");

            $("#pinsmall, #pintwo, #pinthree, #steps, #pin, #pinlarge").draggable('destroy');
            $("#target, .droppable-pin-area, #droppable-area").droppable('destroy');

            $("#pinsmall, #pintwo, #pinthree, #steps, #pin, #pinlarge").draggable({
                revert: "invalid",
                containment: "document",
                cursor: "move",
                zIndex: 10000,
                start: function (event, ui) {
                    console.log("Drag started:", $(this).attr("id"));
                    $(this).addClass('opacity-75 z-50');
                    $(this).css({'position': 'relative'});
                },
                drag: function (event, ui) {
                    console.log("Dragging:", $(this).attr("id"));
                    $(this).css('visibility', 'visible');
                },
                stop: function (event, ui) {
                    console.log("Drag stopped:", $(this).attr("id"));
                    $(this).removeClass('opacity-75 z-50');
                    $(this).css({'position': '', 'visibility': 'visible'});
                }
            });

            $("#target").droppable({
                accept: "#pinsmall, #pintwo, #pinthree, #steps, #pinlarge, #pin",
                tolerance: 'touch',
                over: function (event, ui) {
                    console.log("Element over target");
                    $(this).removeClass('border-gray-400 dark:border-gray-600').addClass('border-green-500 bg-green-50 dark:bg-green-900/20');
                    $(this).text('Drop Now!');
                },
                out: function (event, ui) {
                    console.log("Element left target");
                    $(this).removeClass('border-green-500 bg-green-50 dark:bg-green-900/20').addClass('border-gray-400 dark:border-gray-600');
                    $(this).text('Drop Here');
                },
                drop: function (event, ui) {
                    console.log("Element dropped on target");
                    $(this).removeClass('border-gray-400 dark:border-gray-600').addClass('border-blue-500 bg-blue-50 dark:bg-green-900/20');
                    $(this).text('Success!');

                    setTimeout(() => {
                        $(this).removeClass('border-blue-500 bg-blue-50 dark:bg-blue-900/20').addClass('border-gray-400 dark:border-gray-600');
                        $(this).text('Drop Here');
                    }, 2000);

                    alert("Awesome! Now click the pin on the target to see the processes you have mastered! Remember Deming's advice: Work on the process, not the outcome of the process!");
                }
            });

            $(".droppable-pin-area, #droppable-area").droppable({
                accept: "#pinsmall, #pintwo, #pinthree, #pinlarge, #pin",
                tolerance: 'touch',
                over: function (event, ui) {
                    console.log("Pin over droppable area");
                    $(this).addClass('border-green-500 bg-green-50 dark:bg-green-900/20');
                    if ($(this).find('p').length) {
                        $(this).find('p').text('Drop the pin here!');
                    }
                },
                out: function (event, ui) {
                    console.log("Pin left droppable area");
                    $(this).removeClass('border-green-500 bg-green-50 dark:bg-green-900/20');
                    if ($(this).find('p').length) {
                        $(this).find('p').text('Drag the pin into this area to pin down your Capability Maturity level');
                    }
                },
                drop: function (event, ui) {
                    console.log("Pin dropped in area");
                    const pinId = ui.draggable.attr("id");
                    $(this).removeClass('border-green-500 bg-green-50 dark:bg-green-900/20').addClass('border-blue-500 bg-blue-50 dark:bg-blue-900/20');

                    if ($(this).hasClass('droppable-pin-area')) {
                        $(this).html('<span class="text-blue-600 font-bold">Pin Dropped!</span>');

                        setTimeout(() => {
                            $(this).removeClass('border-blue-500 bg-blue-50 dark:bg-blue-900/20');
                            $(this).html('<span class="text-gray-600">Click here to find out more about the CMMi Maturity Levels</span>');
                        }, 2000);
                    } else if ($(this).attr('id') === 'droppable-area') {
                        $(this).find('p').html('<span class="font-semibold text-green-600 dark:text-green-400">Success! Your Maturity Level has been pinned down.</span>');

                        setTimeout(() => {
                            $(this).removeClass('border-blue-500 bg-blue-50 dark:bg-blue-900/20');
                            $(this).find('p').text('Drag the pin into this area to pin down your Capability Maturity level');
                        }, 3000);
                    }

                    alert("Awesome! Now click the pin on the target to see the processes you have mastered! Remember Deming's advice: Work on the process, not the outcome of the process!");
                }
            });

            $('.draggable-pin').on('click', function(e) {
                const $pin = $(this).find('#pin');
                if ($pin.length && $pin.hasClass('ui-draggable-dragging')) {
                    e.preventDefault();
                    e.stopPropagation();
                }
            });

            console.log("🎯 Draggable elements initialized:", $("#pinsmall, #pintwo, #pinthree, #steps, #pin, #pinlarge").length);

        } else {
            console.log("❌ jQuery UI draggable not available");
        }
    }

    function initializeCarouselDraggable() {
        console.log("🔄 Initializing draggable for carousel...");
        setTimeout(() => {
            reinitializeDraggable();
            $("#pin, #pinlarge").css({
                'visibility': 'visible',
                'display': 'block',
                'opacity': '1'
            });
        }, 300);
    }

    function reinitializeDraggable() {
        console.log("🔄 Reinitializing draggable elements...");
        if (typeof jQuery !== 'undefined' && typeof jQuery.fn.draggable !== 'undefined') {
            try {
                $("#pinsmall, #pintwo, #pinthree, #steps, #pin, #pinlarge").draggable('destroy');
                $("#target, .droppable-pin-area, #droppable-area").droppable('destroy');
            } catch (e) {
                console.log("No existing instances to destroy");
            }
            $("#pin, #pinlarge").removeClass('ui-draggable-dragging ui-draggable-handle')
                .css({
                    'position': '',
                    'top': '',
                    'left': '',
                    'visibility': 'visible',
                    'display': 'block',
                    'opacity': '1'
                });
        }
        initializeDraggable();
    }

    $(document).ready(function() {
        console.log("📄 Document ready, initializing draggable...");
        initializeDraggable();
    });

    document.addEventListener('livewire:load', function() {
        console.log("⚡ Livewire loaded, initializing draggable...");
        setTimeout(initializeDraggable, 100);
    });

    document.addEventListener('livewire:update', function() {
        console.log("🔄 Livewire updated, reinitializing draggable...");
        setTimeout(reinitializeDraggable, 150);
    });

    document.addEventListener('carouselSlideChanged', function(e) {
        console.log("🎠 Carousel slide changed to:", e.detail);
        initializeCarouselDraggable();
    });

    const fixPinStyles = `
    #pin, #pinlarge, #pinsmall, #pintwo, #pinthree {
        position: relative !important;
        z-index: 10000 !important;
    }
    .ui-draggable-dragging {
        z-index: 10001 !important;
        visibility: visible !important;
        opacity: 0.75 !important;
    }
    .carousel-item {
        position: relative;
        overflow: visible !important;
    }
`;
    if (!document.querySelector('#pin-drag-fix')) {
        const style = document.createElement('style');
        style.id = 'pin-drag-fix';
        style.textContent = fixPinStyles;
        document.head.appendChild(style);
    }
</script>







