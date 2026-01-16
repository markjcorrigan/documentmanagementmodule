{{-- resources/views/livewire/agile-methods-carousel.blade.php --}}
<div>
    <style>
        .carousel-indicators {
            position: absolute;
            bottom: -35px;
        }

        .carousel-indicators li {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: #f00 none repeat scroll 0 0;
            border: 0 none;
            margin: 3px;
            opacity: 0.5;
        }

        .carousel-indicators .active {
            background: #fff none repeat scroll 0 0;
            border: 4px solid #040404;
        }

        .navbar {
            position: relative;
            width: 100%;
            z-index: 10;
            max-width: 100%;
        }

        /* Custom carousel styles */
        .carousel-container {
            position: relative;
            width: 100%;
            overflow: hidden;
        }

        .carousel-inner {
            display: flex;
            transition: transform 0.6s ease-in-out;
        }

        .carousel-item {
            min-width: 100%;
            transition: opacity 0.6s ease;
            opacity: 0;
        }

        .carousel-item.active {
            opacity: 1;
        }

        .carousel-control {
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

        @media (min-width: 768px) {
            .carousel-control {
                width: 50px;
                height: 50px;
            }
        }

        .carousel-control:hover {
            background: rgba(0, 0, 0, 0.8);
            transform: translateY(-50%) scale(1.1);
        }

        .carousel-control.prev {
            left: 10px;
        }

        .carousel-control.next {
            right: 10px;
        }

        .slide-numbers {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            justify-content: center;
            margin-top: 1rem;
            max-width: 100%;
        }

        .slide-number-btn {
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid #3b82f6;
            background: white;
            color: #3b82f6;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 0.75rem;
            font-weight: 600;
            flex-shrink: 0;
        }

        .slide-number-btn:hover,
        .slide-number-btn.active {
            background: #3b82f6;
            color: white;
            transform: scale(1.1);
        }

        .dark .slide-number-btn {
            background: #374151;
            color: #60a5fa;
            border-color: #60a5fa;
        }

        .dark .slide-number-btn:hover,
        .dark .slide-number-btn.active {
            background: #60a5fa;
            color: #1f2937;
        }
    </style>

    <div class="max-w-6xl mx-auto px-4 py-8">
        <div class="container-fluid" align="center">
            <h5 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">Agile Methods - High Level Overview</h5>
            <p class="text-lg text-gray-700 dark:text-gray-300 mb-6">
                <button type="button" wire:click="goToSlide(0)" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300 mx-1" title="Slide 1: Lean and Kanban">Lean and Kanban</button> |
                <button type="button" wire:click="goToSlide(1)" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300 mx-1" title="Slide 2: XP">XP</button> |
                <button type="button" wire:click="goToSlide(2)" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300 mx-1" title="Slide 3: Crystal">Crystal</button> |
                <button type="button" wire:click="goToSlide(3)" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300 mx-1" title="Slide 4: DSDM">DSDM</button> |
                <button type="button" wire:click="goToSlide(4)" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300 mx-1" title="Slide 5: FDD">FDD</button> |
                <button type="button" wire:click="goToSlide(5)" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300 mx-1" title="Slide 6: TDD">TDD</button> |
                <button type="button" wire:click="goToSlide(6)" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300 mx-1" title="Slide 7: ASD">ASD</button> |
                <button type="button" wire:click="goToSlide(7)" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300 mx-1" title="Slide 8: AUP">AUP</button> |
                <button type="button" wire:click="goToSlide(8)" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300 mx-1" title="Slide 9: DDD">DDD</button><br>
                <button type="button" wire:click="goToSlide(9)" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300 mx-1" title="Slide 10: SCRUM">SCRUM</button> |
                <button type="button" wire:click="goToSlide(10)" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300 mx-1" title="Slide 11: PRINCE2Agile">PRINCE2Agile</button> |
                <button type="button" wire:click="goToSlide(11)" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300 mx-1" title="Slide 12: The Agile Manifesto">Agile Manifesto</button> |
                <button type="button" wire:click="goToSlide(12)" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300 mx-1" title="Slide 13: The Project Method Selection Matrix">Project Methodology Selection Matrix</button>
            </p>
        </div>

        <!-- Custom Tailwind Carousel -->
        <div class="carousel-container bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700">
            <div class="carousel-inner" style="transform: translateX(-{{ $currentSlide * 100 }}%)">

                <!-- Slide 1: Lean and Kanban -->
                <div class="carousel-item {{ $currentSlide === 0 ? 'active' : '' }}" align="center">
                    <div class="container mx-auto p-6" style="max-width:70%">
                        <h5 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">Lean and Kanban</h5>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 text-justify mb-4">The Lean concept optimizes an organization's system to produce valuable results based on its resources, needs, and alternatives while reducing waste.</p>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 text-left mb-4">Waste could be from building the wrong thing, failure to learn, or practices that impede the process. Because these factors are dynamic, a lean organization evaluates its entire system and continuously fine-tunes its processes.</p>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 text-left mb-4">The foundation of Lean is that reducing the length of each cycle (i.e., an iteration) leads to increased productivity by reducing delays, aids in error detection at an early stage, and consequently reduces the total effort required to finish a task. Lean software principles have been successfully applied to software development.</p>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 text-left mb-4">Kanban literally means a 'signboard' or 'billboard' and promotes the use of visual aids to assist and track production.</p>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 text-left mb-4">The concept was introduced by Taiichi Ohno, considered to be the father of the Toyota Production Systems (TPS). The use of visual aids is effective and has become common practice.</p>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 text-left mb-4">A Kanban board (a pull system) looks similar to a task board, but they're not the same thing. You've seen task boards in discussions of Scrum and XP, so it's easy to look at a Kanban board and assume it's basically the same thing.<br><b>It's not!</b><br>The purpose of a task board is to make the state of current tasks clear to everybody on a team. Task boards help a team stay on top of the current status of their project. Kanban boards are different. They are created to help a team understand how work flows through their process. Because work items are kept at a feature level on a Kanban board, they aren't the best way to know exactly which task each team member is working on—but they're great for helping you see how much work is in progress in each state of your process.</p>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 text-left mb-4">These methods gained attention due to their practice at Toyota, a leader in process management. Lean Kanban integrates the use of visualization methods as prescribed by Kanban along with the principles of Lean, creating a visual incremental evolutionary process management system.</p>

                        <img alt="Lean to XP" class="img-fluid mx-auto mb-4" src="{{ asset('storage/images/lean2.png') }}"><br><br>
                        <div align="center">
                            <img alt="Agile" class="img-fluid mx-auto mb-4" src="{{ asset('storage/images/lean1.png') }}"><br><br>
                            <img alt="Lean diagram" class="img-fluid mx-auto mb-4" src="{{ asset('storage/images/lean4.png') }}"><br><br>
                            <img alt="Lean diagram" class="img-fluid mx-auto mb-4" src="{{ asset('storage/images/lean5.png') }}">
                        </div>
                    </div>
                </div>

                <!-- Slide 2: XP -->
                <div class="carousel-item {{ $currentSlide === 1 ? 'active' : '' }}" align="center">
                    <div class="container mx-auto p-6" style="max-width:70%">
                        <h5 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">Extreme Programming</h5>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 text-justify mb-4">Extreme Programming (XP), which originated at Chrysler Corporation, gained traction in the 1990s.</p>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 text-left mb-4">XP makes it possible to keep the cost of changing software from rising radically with time. The key attributes of XP include incremental development, flexible scheduling, automated test codes, verbal communication, ever-evolving design, close collaboration, and tying in the long- and short-term drives of all those involved.</p>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 text-left mb-4">XP values communication, feedback, simplicity, and courage. The different roles in the XP approach include customer, developer, tracker, and coach. It prescribes various coding, developer, and business practices as well as events and artifacts to achieve effective and efficient development. XP has been extensively adopted due to its well-defined engineering practices.</p>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 text-left">While somewhat dated, <a href="http://www.extremeprogramming.org" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">extremeprogramming.org</a> is still an excellent resource on this method. Note: Look at the bottom right of each page for the XP [Next Page] buttons.</p>
                    </div>
                </div>

                <!-- Slide 3: Crystal -->
                <div class="carousel-item {{ $currentSlide === 2 ? 'active' : '' }}" align="center">
                    <div class="container mx-auto p-6" style="max-width:70%">
                        <h5 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">Crystal Methods</h5>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 text-justify mb-4">Crystal methodologies of software development were introduced by Alistair Cockburn in the early 1990s.</p>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 text-justify mb-4">Crystal methods are intended to be people-centric, lightweight, and easy to adapt. Because people are primary, the developmental processes and tools are not fixed but are rather adjusted to the specific requirements and characteristics of the project.</p>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 text-justify mb-4">The color spectrum is used to decide on the variant for a project. Factors such as comfort, discretionary money, essential money, and life play a vital role in determining the 'weight' of the methodology, which is represented in various colors of the spectrum. The Crystal family is divided into Crystal Clear, Crystal Yellow, Crystal Orange, Crystal Orange Web, Crystal Red, Crystal Maroon, Crystal Diamond, and Crystal Sapphire.</p>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 text-justify">All Crystal methods have four roles: executive sponsor, lead designer, developers, and experienced users. Crystal Methods recommend various strategies and techniques to achieve agility. A Crystal project cycle consists of chartering, delivery cycle, and wrap-up.</p>
                    </div>
                </div>

                <!-- Slide 4: DSDM -->
                <div class="carousel-item {{ $currentSlide === 3 ? 'active' : '' }}" align="center">
                    <div class="container mx-auto p-6" style="max-width:70%">
                        <h5 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4"><a name="dsdm"></a>DSDM (AgilePM)</h5>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 text-justify mb-4">The Dynamic Systems Development Method (DSDM) framework was initially published in 1995 and is administered by the DSDM Consortium.</p>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 text-justify mb-4">DSDM sets quality and effort in terms of cost and time at the outset and adjusts the project deliverables to meet set criteria by prioritizing the deliverables into "Must have", "Should have", "Could have", and "Won't have" categories (using the MoSCoW prioritization technique).</p>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 text-justify mb-4">DSDM is a system-oriented method with six distinct phases: Pre-project; Feasibility; Foundations; Exploration and Engineering; Deployment; and Benefit Assessment.</p>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 text-justify">A later version of DSDM known as DSDM Atern was introduced in 2007 and focuses on both prioritization of deliverables and consistent user or customer collaboration. The newest version is inspired by an Arctic Tern, making it a developer-centric software development framework for on-time and in-budget delivery of user-valued and quality-controlled project features.</p>
                    </div>
                </div>

                <!-- Slide 5: FDD -->
                <div class="carousel-item {{ $currentSlide === 4 ? 'active' : '' }}" align="center">
                    <div class="container mx-auto p-6" style="max-width:70%">
                        <h5 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">Feature Driven Development</h5>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 text-justify mb-4">Feature Driven Development (FDD) was introduced by Jeff De Luca in 1997 and operates on the principle of completing a project by breaking it down into small, client-valued functions that can be delivered in less than two weeks. FDD has two core principles: software development is a human activity and software development is a client-valued functionality.</p>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 text-justify mb-4">FDD defines six major roles: Project Manager, Chief Architect, Development Manager, Chief Programmers, Class Owners, and Domain Experts with a number of supporting roles.</p>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 text-justify">The FDD process is iterative and consists of developing an overall model, building a feature list, and then planning, designing, and building by feature.</p>
                    </div>
                </div>

                <!-- Slide 6: TDD -->
                <div class="carousel-item {{ $currentSlide === 5 ? 'active' : '' }}" align="center">
                    <div class="container mx-auto p-6" style="max-width:70%">
                        <h5 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">Test Driven Development</h5>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 text-justify mb-4">Sometimes known as Test-First Development, Test Driven Development was introduced by Kent Beck, one of the creators of Extreme Programming (XP).</p>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 text-justify mb-4">Test Driven Development is a software development method that involves writing automated test code first and developing the least amount of code necessary to pass that test later.</p>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 text-justify mb-4">The entire project is broken down into small, client-valued features that need to be developed in the shortest possible development cycle. Based on clients' requirements and specifications, tests are written. The tests designed in the above stage are used to design and write the production code.</p>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 text-justify">TDD can be categorized into two levels: Acceptance TDD (ATDD) requiring a distinct acceptance test and Developer TDD (DTDD) involving writing a single developer test. TDD has become popular because of the numerous advantages it offers like rapid and reliable results, constant feedback, and reduced debugging time.</p>
                    </div>
                </div>

                <!-- Slide 7: ASD -->
                <div class="carousel-item {{ $currentSlide === 6 ? 'active' : '' }}" align="center">
                    <div class="container mx-auto p-6" style="max-width:70%">
                        <h5 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">Adaptive Software Development</h5>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 text-justify mb-4">Adaptive Software Development (ASD) grew out of the rapid application development work by Jim Highsmith and Sam Bayer.</p>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 text-justify mb-4">The highlights of ASD are constant adaptation of processes to the work at hand, provision of solutions to problems surfacing in large projects, and iterative, incremental development with continuous prototyping.</p>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 text-justify mb-4">Being a risk-driven and change-tolerant development approach, ASD believes a plan cannot admit uncertainties and risks as this indicates a flawed and failed plan. ASD is feature-based and target-driven.</p>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 text-justify">The first phase of development in ASD is Speculate (as opposed to Planning) followed by the Collaborate and Learn phases.</p>
                    </div>
                </div>

                <!-- Slide 8: AUP -->
                <div class="carousel-item {{ $currentSlide === 7 ? 'active' : '' }}" align="center">
                    <div class="container mx-auto p-6" style="max-width:70%">
                        <h5 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">Agile Unified Process</h5>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 text-justify mb-4">Agile Unified Process (AUP) evolved from IBM's Rational Unified Process.</p>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 text-justify mb-4">Developed by Scott Ambler, AUP combines industry-tried-and-tested Agile techniques such as Test Driven Development (TDD), Agile Modeling, agile change management, and database refactoring, to deliver a working product of the best quality.</p>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 text-justify">AUP models its processes and techniques on the values of Simplicity, Agility, Customizability, Self-organization, Independence of tools, and focus on high-value activities. The AUP principles and values are put into action in the phases of Inception, Elaboration, Construction, and Transition.</p>
                    </div>
                </div>

                <!-- Slide 9: DDD -->
                <div class="carousel-item {{ $currentSlide === 8 ? 'active' : '' }}" align="center">
                    <div class="container mx-auto p-6" style="max-width:70%">
                        <h5 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">Domain Driven Development</h5>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 text-justify mb-4">Domain-driven design is an Agile development approach meant for handling complex designs with implementation linked to an evolving model.</p>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 text-justify mb-4">It was conceptualized by Eric Evans in 2004 and revolves around the design of a core domain. "Domain" is defined as an area of activity to which the user applies a program or functionality. Many such areas are batched and a model is designed.</p>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 text-justify mb-4">The model consists of a system of abstractions that can be used to design the overall project and solve the problems related to the batched domains.</p>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 text-justify">The core values of DDD include domain-oriented, model-driven design, ubiquitous language, and a bounded context.</p>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 text-justify">In DDD, ubiquitous language is established and the domain is modeled. Then design, development, and testing follow. Refining and refactoring of the domain model is done until it is satisfactory.</p>
                    </div>
                </div>

                <!-- Slide 10: SCRUM -->
                <div class="carousel-item {{ $currentSlide === 9 ? 'active' : '' }}" align="center">
                    <div class="container mx-auto p-6" style="max-width:70%">
                        <h5 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4"><a name="scrum"></a>SCRUM</h5>
                        <a href="/home/scrumsixmins" ><img class="img-fluid mx-auto mb-4" src="{{ asset('storage/images/scruminsixmins.png') }}" title="Scrum in Just Six Minutes" alt="Scrum in Six Minutes"></a><br>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 text-justify mb-4">Scrum is an agile process most commonly used for product development, especially software development.</p>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 text-justify mb-4">Scrum is a project management framework that is applicable to any project with aggressive deadlines, complex requirements, and a degree of uniqueness.</p>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 text-justify">In Scrum, projects move forward via a series of iterations called sprints. Each sprint is typically two to four weeks long.<br>The idea behind "Agile" and Scrum in particular is that each sprint must produce value, typically in the form of working software.<br>i.e., as it is typically difficult to do long-range planning as envisaged in Traditional Project Management, Scrum's goal is to produce valuable products incrementally (<a href="/productincrement" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">in slices</a>); sprint by sprint which pass muster in the "<a href="{{ asset('storage/images/pppmcperscrumedited.png') }}" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">Sprint Review (Demonstrate and Validate process #16)</a>."</p>
                        <br><br>
                    </div>
                </div>

                <!-- Slide 11: PRINCE2 Agile -->
                <div class="carousel-item {{ $currentSlide === 10 ? 'active' : '' }}" align="center">
                    <div class="container mx-auto p-6" style="max-width:70%">
                        <h5 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">PRINCE2 Agile</h5>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 text-center mb-4">PMWay is of the opinion that PRINCE2 Agile is a "best and safest way" to run agile.<br><a href="/pmway/?slide=5" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">Capability Maturity Level 3</a> and above is required to run this well!<br>The image below, PMWay believes, says what needs to be said about the use of PRINCE2 Agile.</p>
                        <img alt="PRINCE2 Agile" class="img-fluid mx-auto mb-4" src="{{ asset('storage/images/p2afighter.png') }}">
                        <div style="text-align:center">
                            <button class="btn btn-primary align-center clearfix bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded transition-colors" type="button" data-toggle="collapse" data-target="#collapseagilehappens" aria-expanded="false" aria-controls="collapseagilehappens">Where Agile happens<br>in PRINCE2 Agile</button>
                            <div class="collapse" id="collapseagilehappens">
                                <div class="container">
                                    <div class="card text-center bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700">
                                        <h5 class="card-header text-xl font-semibold text-gray-900 dark:text-white" align="center">Under BOARD control (with Sponsor accountable): now agile away...</h5>
                                        <div class="card-body text-center">
                                            <img alt="Where agile happens" class="img-fluid mx-auto" src="{{ asset('storage/images/prince2modelprocwhereagilehappens.png') }}">
                                        </div>
                                        <div class="card-footer"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>

                <!-- Slide 12: Agile Manifesto -->
                <div class="carousel-item {{ $currentSlide === 11 ? 'active' : '' }}" align="center">
                    <div class="container mx-auto p-6" style="max-width:70%">
                        <p class="small text-center text-gray-600 dark:text-gray-400"><em>Hover your mouse over the image below.</em></p>
                        <img alt="Agile Manifesto" class="img-fluid mx-auto mb-4" src="{{ asset('storage/images/agile-manifesto.jpg') }}" onmouseover="this.src='{{ asset('storage/images/agilemanifestoadded.jpg') }}'" onmouseout="this.src='{{ asset('storage/images/agile-manifesto.jpg') }}'">
                        <br><br>
                        <p align="center"><a href="/snowbird" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300"><u>Snowbird</u></a></p>
                        <br>
                        <p align="center"><a href="/snowbird#heart" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300"><u>Heart of Agile</u></a></p>
                        <br>
                        <p align="center"><img alt="Heart of agile" class="img-fluid mx-auto" src="{{ asset('storage/images/heartofagile.png') }}" onmouseover="this.src='{{ asset('storage/images/heartofagileexpanded.jpg') }}'" onmouseout="this.src='{{ asset('storage/images/heartofagile.png') }}'"></p>
                        <br><br>
                    </div>
                </div>

                <!-- Slide 13: Project Method Selection Matrix -->
                <div class="carousel-item {{ $currentSlide === 12 ? 'active' : '' }}" align="center">
                    <div class="container mx-auto p-6" style="max-width:70%">
                        <h5 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">One Project Methodology does not fit all Project Types.</h5>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 text-justify mb-4">The project selection matrix from Dr. Robert K. Wysocki (below) shows how to quickly decide what project method best suits the type of project based on the criteria of clarity or lack of clarity of the project goal or solution being considered.<br>Note: While all projects are risky business, agile projects are very risky business!<br>This 'type of project methodology' decision can also be based on how risk-averse your organization is.<br><br>PMWay's recommended approach is using PRINCE2 Agile as the recipe you follow; and PMBOK version 6 for the ingredients. The mandatory use of the PRINCE2 Agile Board (who have the relevant training, experience, ability, agility, and power within the organization - to ("<a href="/red-bead-experiment" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">remove the red beads</a>") is the strategic driver for success for the PRINCE2 Agile method, PMWay (from considerable experience of the method's use in the Public and Private Sector) understands. Success in this regard is the dynamic "tension to produce results" from the empowered board who in turn remove the red beads and empower the project manager and team.<br><br>While PRINCE2 Agile is not shown in the diagram below, being a blend of the two, it would straddle across TPM and APM.</p>
                        <img alt="Project selection matrix" class="img-fluid mx-auto mb-4" width="500px" src="{{ asset('storage/images/projectselectionlandscape.png') }}">
                        <img alt="Project selection matrix" class="img-fluid mx-auto mb-4" width="700px" src="{{ asset('storage/images/projselectmatrix.png') }}">



                        <br><br>
                    </div>
                </div>

            </div>

            <!-- Carousel Controls -->
            <button class="carousel-control prev" wire:click="previousSlide">
                <svg class="w-4 h-4 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <button class="carousel-control next" wire:click="nextSlide">
                <svg class="w-4 h-4 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>

        <!-- Numbered Slide Navigation -->
        <div class="slide-numbers mt-6">
            @for($i = 0; $i < $totalSlides; $i++)
                <button type="button"
                        class="slide-number-btn {{ $currentSlide === $i ? 'active' : '' }}"
                        wire:click="goToSlide({{ $i }})"
                        title="Slide {{ $i + 1 }}">
                    {{ $i + 1 }}
                </button>
            @endfor
        </div>

        <!-- Manual Controls -->
        <div class="mt-6 flex flex-wrap justify-center gap-2">
            <button type="button"
                    class="px-3 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors text-sm"
                    wire:click="previousSlide">
                ← Previous
            </button>
            <button type="button"
                    class="px-3 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors text-sm"
                    wire:click="nextSlide">
                Next →
            </button>
        </div>
    </div>
</div>