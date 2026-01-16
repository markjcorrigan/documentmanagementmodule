{{-- resources/views/livewire/the-spike.blade.php --}}
<div class="max-w-6xl mx-auto px-4 py-8">
    <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-8 border-b border-gray-200 dark:border-gray-700 pb-4">
        The Spike
    </h1>


    <div class="flex justify-center mb-8">
        <img
                alt="Spike concept illustration"
                class="rounded-lg shadow-lg bg-white"
                style="width: 450px;"
                src="{{ asset('storage/images/leftrightbrain.jpg') }}"
        >
    </div>
    <div class="flex justify-center mb-8">
        <img
                alt="Spike concept illustration"
                class="rounded-lg shadow-lg "
                style="width: 350px;"
                src="{{ asset('storage/images/spikelb.png') }}"
        >
    </div>

    <hr class="border-t-2 border-gray-200 dark:border-gray-700 my-8">

    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-8">
        Spikes are an invention of Extreme Programming (XP), are a special type of user story that is used to gain the knowledge necessary to reduce the risk of a technical approach, better understand a requirement, or increase the reliability of a story estimate. A spike has a maximum time-box size as the sprint it is contained in it. At the end of a sprint, the spike will be determined that is done or not-done just like any other ordinary user story. A Spike is a great way to mitigate risks early and allows the team ascertain feedback and develop an understanding on an upcoming PBI (Product Blocking Item)'s complexity.
    </p>

    <div class="flex flex-wrap gap-8 my-8 items-start">
        <div class="flex-1 min-w-[300px]">
            <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-lg">
                <img
                        alt="Spike visualization"
                        class="w-full rounded-lg"
                        src="{{ asset('storage/images/spike6.png') }}"
                >
            </div>
        </div>
        <div class="flex-[2] min-w-[300px]">
            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">
                When To Use Spike?
            </h2>

            <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-6">
                Sometime the team are unsure if they can complete the story due to some potential blockers and probably can't even estimate the story. Thus, you may consider a spike as an investment for a Product Owner to figure out what needs to be built and how the team is going to build it. The Product Owner allocates a little bit of the team's capacity now, ahead of when the story needs to be delivered, so that when the story comes into the sprint, the team knows what to do.
            </p>

            <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-4">
                Here are the examples of when Spikes may be used:
            </p>

            <ul class="space-y-3 ml-6 mb-6">
                <li class="text-lg text-gray-700 dark:text-gray-300 leading-relaxed">
                    The team may not have knowledge of a new technology, and spikes may be used for basic research to ensure the feasibility of the new technology (domain or new approach).
                </li>
                <li class="text-lg text-gray-700 dark:text-gray-300 leading-relaxed">
                    A story requires to be implemented using a 3<sup>rd</sup> party library with API that is poorly written and documented.
                </li>
                <li class="text-lg text-gray-700 dark:text-gray-300 leading-relaxed">
                    The story may contain significant technical risk, and the team may have to do some experiments or prototypes to gain confidence in a technological approach that may allow them to commit the user story to some future timebox.
                </li>
            </ul>
        </div>
    </div>

    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">
        Technical Spikes and Functional Spikes
    </h2>

    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-8">
        Spikes primarily come in two forms: technical and functional. A distinction can be made between technical spikes and functional spikes:
    </p>

    {{-- Technical Spike Section --}}
    <div class="mb-8">
        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
            Technical Spike
        </h3>

        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-6">
            The technical spike is used more often for evaluating the impact new technology has on the current implementation that the team needs experiment a new technology to gain more confident for a desired approach before committing new functionality to a timebox.
        </p>

        <div class="bg-gray-50 dark:bg-gray-800 border-l-4 border-green-600 dark:border-green-400 p-6 rounded-r-lg mb-6">
            <p class="text-lg italic text-gray-700 dark:text-gray-300">
                i.e. "how long it takes to update a customer display to current usage, determining communication requirements, bandwidth, and whether to push or pull the data"
            </p>
        </div>
    </div>

    {{-- Functional Spike Section --}}
    <div class="mb-8">
        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
            Functional Spike
        </h3>

        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-6">
            A functional spike are used whenever there is significant uncertainty as to how a user might interact with the system. Functional spikes are often best evaluated through some level of prototyping, whether it be user interface mockups, wireframes, page flows, or whatever techniques is best suited to get feedback from the customer or stakeholders.
        </p>

        <div class="bg-gray-50 dark:bg-gray-800 border-l-4 border-green-600 dark:border-green-400 p-6 rounded-r-lg mb-6">
            <p class="text-lg italic text-gray-700 dark:text-gray-300">
                i.e. "Prototype a histogram in the web portal and get some user feedback on presentation size, style, and charting"
            </p>
        </div>
    </div>

    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-8">
        Spikes should be estimated as in-Sprint tasks during Sprint Planning. The task's duration should be spent researching and developing some 'thing' that can be delivered. That thing can be a working piece of software, workflow, documentation, etc. Ultimately the value from the spike is a direction or re-direction in the course of the feature. If the team estimated that a Spike takes four hours, then ONLY four hours should be spent researching or developing. Prototypes, Proof of Concepts (PoC), and Wireframes all fall into the classification of Spikes.
    </p>

    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">
        Acceptance Criteria for Spike Stories
    </h2>

    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-8">
        Just like any other ordinary user story, they need fulfil some certain criteria to obtain the status of done by making sure that the "Spike Story" estimable, demonstrable, and acceptable:
    </p>

    {{-- Estimable Criteria --}}
    <div class="bg-blue-50 dark:bg-blue-900/20 border-l-4 border-blue-600 dark:border-blue-400 p-8 rounded-r-lg mb-6">
        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
            Estimable
        </h3>
        <p class="text-lg text-gray-700 dark:text-gray-300 mb-4">
            Like other stories, spikes are put in the backlog, estimable and sized to fit in an iteration. Spike results are different from a story, as they generally produce information, rather than working code. A spike may result in a decision, a prototype, storyboard, proof of concept, or some other partial solution to help drive the final results.
        </p>
        <p class="text-lg text-gray-700 dark:text-gray-300">
            In any case, the spike should develop just the information sufficient to resolve the uncertainty in being able to identify and size the stories hidden beneath the spike.
        </p>
    </div>

    {{-- Demonstrable Criteria --}}
    <div class="bg-blue-50 dark:bg-blue-900/20 border-l-4 border-blue-600 dark:border-blue-400 p-8 rounded-r-lg mb-6">
        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
            Demonstrable
        </h3>
        <p class="text-lg text-gray-700 dark:text-gray-300">
            The output of a spike is demonstrable to the team. This brings visibility to the research and architectural efforts and also helps build collective ownership and shared responsibility for the key decisions that are being taken.
        </p>
    </div>

    {{-- Acceptable Criteria --}}
    <div class="bg-blue-50 dark:bg-blue-900/20 border-l-4 border-blue-600 dark:border-blue-400 p-8 rounded-r-lg mb-8">
        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
            Acceptable
        </h3>
        <p class="text-lg text-gray-700 dark:text-gray-300">
            And like any other story, spikes are accepted by the product owner when the acceptance criteria for the spike have been fulfilled.
        </p>
    </div>

    <hr class="border-t-2 border-gray-200 dark:border-gray-700 my-8">

    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-8">
        Spikes have their inspiration from mountain climbing where a climber secures his position on a cliff face by banging in spikes and rope before considering the next best move forward to move further up the rock face. Spikes, used often, also ensure safety at difficult spots ensuring safety for the duration of the climb.
    </p>

    {{-- Image Gallery --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-4 my-8">
        <img
                alt="Spike mountain climbing 1"
                class="w-full h-48 object-cover rounded-lg shadow-lg hover:scale-105 transition-transform duration-300"
                src="{{ asset('storage/images/spike2.jpg') }}"
        >
        <img
                alt="Spike mountain climbing 2"
                class="w-full h-48 object-cover rounded-lg shadow-lg hover:scale-105 transition-transform duration-300"
                src="{{ asset('storage/images/spike3.jpg') }}"
        >
        <img
                alt="Spike mountain climbing 3"
                class="w-full h-48 object-cover rounded-lg shadow-lg hover:scale-105 transition-transform duration-300"
                src="{{ asset('storage/images/spike5.jpg') }}"
        >
        <img
                alt="Spike mountain climbing 4"
                class="w-full h-48 object-cover rounded-lg shadow-lg hover:scale-105 transition-transform duration-300"
                src="{{ asset('storage/images/spike.jpg') }}"
        >
        <img
                alt="Spike mountain climbing 5"
                class="w-full h-48 object-cover rounded-lg shadow-lg hover:scale-105 transition-transform duration-300"
                src="{{ asset('storage/images/spike4.jpg') }}"
        >

        <img
                alt="Spike mountain climbing 5"
                class="w-full h-48 object-cover rounded-lg shadow-lg hover:scale-105 transition-transform duration-300"
                src="{{ asset('storage/images/spikeeight.jpg') }}"
        >
    </div>

    <hr class="border-t-2 border-gray-200 dark:border-gray-700 my-8">

    <div class="text-center">
        <p class="text-sm text-gray-600 dark:text-gray-400">
            <a href="https://www.visual-paradigm.com/scrum/what-is-scrum-spike/" class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 underline font-medium" target="_blank" rel="noopener noreferrer">
                Thanks to Visual Paradigm
            </a>
        </p>
    </div>
</div>