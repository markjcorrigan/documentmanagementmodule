{{-- resources/views/livewire/improving-scrum.blade.php --}}
<section>
    <div x-data="{
        isTeamExampleOpen: false,
        init() {
            this.setupDragDrop();
        },
        setupDragDrop() {
            const draggableElements = document.querySelectorAll('#heart, #zapper');
            const dropTarget = document.getElementById('target');

            draggableElements.forEach(element => {
                element.setAttribute('draggable', 'true');

                element.addEventListener('dragstart', (e) => {
                    e.dataTransfer.setData('text/plain', e.target.id);
                    e.target.classList.add('opacity-50');
                });

                element.addEventListener('dragend', (e) => {
                    e.target.classList.remove('opacity-50');
                });
            });

            if (dropTarget) {
                dropTarget.addEventListener('dragover', (e) => {
                    e.preventDefault();
                    dropTarget.classList.add('ring-2', 'ring-yellow-400');
                });

                dropTarget.addEventListener('dragleave', (e) => {
                    dropTarget.classList.remove('ring-2', 'ring-yellow-400');
                });

                dropTarget.addEventListener('drop', (e) => {
                    e.preventDefault();
                    dropTarget.classList.remove('ring-2', 'ring-yellow-400');

                    const draggedId = e.dataTransfer.getData('text/plain');
                    const draggedElement = document.getElementById(draggedId);

                    if (draggedElement) {
                        alert('Awesome! You have Got It! You kill Mechanical (Zombie) Scrum with Heart! Understanding and Applying the information on this page will make your Heart strong!');

                        // Animate success
                        dropTarget.classList.add('scale-105', 'transition-transform');
                        setTimeout(() => {
                            dropTarget.classList.remove('scale-105');
                        }, 300);
                    }
                });
            }
        }
    }">
        <div class="max-w-6xl mx-auto px-4 py-8">
            <h1 class="text-4xl font-semibold text-gray-900 dark:text-white mb-8">
                Improving For Professional Scrum
            </h1>

            <div class="space-y-6">
                <!-- Top section with note -->
                <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-4">
                        <strong>Find Out How To Continuously Improve Your Scrum Practice</strong>
                    </p>

                    <div class="flex flex-col md:flex-row gap-6">
                        <!-- Table of contents -->
                        <div class="flex-1">
                            <a name="top"></a>
                            <ol class="text-lg text-gray-700 dark:text-gray-300 space-y-2">
                                <li><a href="#indexa" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">Seven Key Improvement Areas to Improve Scrum Practice</a></li>
                                <li><a href="#indexb" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">Five Other Capability Improvement Areas</a></li>
                                <li><a href="#indexc" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">Seven Types of Scrum Dysfunction</a></li>
                                <li><a href="#rca" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">Root Cause Analysis</a></li>
                            </ol>
                        </div>

                        <!-- Note section -->
                        <div class="flex-1">
                            <div class="border-t border-b border-gray-300 dark:border-gray-600 py-4">
                                <p class="text-lg text-gray-700 dark:text-gray-300">
                                    <strong>Note:</strong> PMWay suggests that any Scrum team wishing to improve their "<a href="/gamestats" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">game stats</a>" (to become Professional Practitioners of Scrum), should focus their effort 100% on the advice found below: To GET IT, to DO IT a.s.a.p!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Introduction content -->
                <div class="space-y-4">
                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">
                        Scrum is a lightweight framework that helps teams create valuable <a href="/release" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">releasable</a> <a href="/productincrement" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">products</a> frequently.
                    </p>
                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">
                        The rules that exist for Scrum practice are important to ensure transparency, to enable effective inspecting and adapting, to reduce waste, and to enable business agility.
                    </p>
                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">
                        The Scrum Value Model below shows the Vision, Product Roadmap, Release Plan and Products Released areas. Often these "squeaky wheels," if given oil, will really help the team to "up their game stats." Achieving improvement in these core areas, sprint by sprint, is not easy to get right. However, PMWay asserts that focusing improvements here (<strong>as soon as possible!</strong>) will be what ultimately sorts the poorly run scrum team from the great scrum team!
                    </p>
                </div>

                <!-- Image section -->
                <div class="text-center">
                    <div class="inline-block bg-gray-50 dark:bg-white p-6 rounded-lg">
                        <img alt="Scrum Value Model" class="mx-auto max-w-full h-auto rounded-lg shadow-lg" src="{{ asset('storage/images/scrumvaluemodelessence.jpg') }}">
                    </div>
                </div>

                <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">
                    No matter how experienced, every team can improve its ability to inspect and adapt to deliver valuable Product Increments. Customers are continually evolving, and their needs are constantly changing. Competitors are continually evolving and adapting as well. Likewise, technologies are constantly changing, enabling new capabilities while also creating new challenges to overcome. New team members bring new skills and insights but may change the dynamics of the team. Meeting these challenges means not only mastering the delivery of great products by using <a href="/empirical" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">empiricism</a>
                    <br>(<a href="/scrum" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">empirical process control is a scrum principle</a>), but also inspecting, adapting, and improving the Scrum Team's capabilities.
                </p>

                <!-- Seven Key Areas Section -->
                <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                    <a name="indexa"></a>
                    <h2 class="text-3xl font-semibold text-gray-900 dark:text-white mb-4">
                        Focus on Seven Key Areas to Improve Your Scrum Practice
                    </h2>

                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-4">
                        To help you and your teams improve, we have broken the problem down into seven key improvements:
                    </p>

                    <div class="flex justify-between items-center mb-6">
                        <a href="#top" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">TOP</a>
                        <span class="font-semibold text-gray-700 dark:text-gray-300">INDEX</span>
                    </div>

                    <ol class="text-lg text-gray-700 dark:text-gray-300 space-y-2 list-decimal list-inside mb-6">
                        <li><a href="#1a" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">An agile mindset</a></li>
                        <li><a href="#2a" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">Empiricism</a></li>
                        <li><a href="#3a" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">Teamwork</a></li>
                        <li><a href="#4a" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">Team process</a></li>
                        <li><a href="#5a" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">Team identity</a></li>
                        <li><a href="#6a" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">Product value</a></li>
                        <li><a href="#7a" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">Organization</a></li>
                    </ol>

                    <!-- 1. Agile Mindset -->
                    <div class="mb-8">
                        <a name="1a"></a>
                        <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-3">1. An Agile Mindset</h3>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-3">
                            An agile mindset is essential to improving the attitudes and outlooks held by the members of a Scrum Team, shaping how they interpret the world and how they work with each other and the world at large. When we talk about an agile mindset, we include the Scrum values, the values and principles from the <a href="/agile?slide=12" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300"><em>Manifesto for Agile Software Development</em></a>, and Lean Principles. These values and principles guide the decisions that a Scrum Team makes, and they directly affect the effectiveness of that team in collaborating while using an empirical process to deliver valuable <a href="/productincrement" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">Product Increments</a>.
                        </p>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">
                            Delivering value in a complex world means that there are few rules and no "best practices" that a team can apply. Instead, team members are guided by an agile mindset to make decisions based on the best data available to them.
                        </p>
                    </div>

                    <!-- 2. Empiricism -->
                    <div class="mb-8">
                        <a name="2a"></a>
                        <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-3">2. Empiricism Is at the Heart of Scrum!</h3>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-3">
                            Scrum is designed to enable empiricism. Embracing empiricism improves transparency, inspection, and adaptation. Understanding these three pillars of any empirical process is essential for a Scrum Team to improve its ability to deliver valuable Product Increments.
                        </p>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-3">
                            (Remember in Traditional Project Management loads of documentation and planning is used to "define the way forward." In Agile (Scrum) this is minimized. Therefore Empiricism is crucial to minimize <a href="/pmway/?slide=12" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">risk</a>!)
                        </p>

                        <div class="bg-gray-800 rounded-lg p-4 mb-3">
                            <h4 class="text-xl font-semibold text-white mb-2">Transparency</h4>
                            <p class="text-lg text-gray-300">
                                means that the Scrum Team has a full understanding of what's going on; all aspects of the process that affect outcomes are visible to them. Transparency helps them understand which features and functions are planned for the product, how the Scrum Team is progressing toward its goals, and what value customers receive when they use the product.
                            </p>
                        </div>

                        <div class="bg-gray-800 rounded-lg p-4 mb-3">
                            <h4 class="text-xl font-semibold text-white mb-2">Inspection</h4>
                            <p class="text-lg text-gray-300">
                                means that the Scrum Team is able, at frequent intervals, to observe results and learn from new information. Team members actively seek information about both achievements and shortfalls from desired outcomes and goals.
                            </p>
                        </div>

                        <div class="bg-gray-800 rounded-lg p-4 mb-3">
                            <h4 class="text-xl font-semibold text-white mb-2">Adaptation</h4>
                            <p class="text-lg text-gray-300">
                                means that the Scrum Team, at frequent intervals, uses information obtained from inspection to change its strategy, plans, techniques, and behaviors to realign them with the desired outcomes and goals.
                            </p>
                        </div>

                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-3">
                            The Scrum Framework provides a set of lightweight rules that help a Scrum Team to achieve a minimal level of empiricism:
                        </p>
                        <ul class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 list-disc list-inside space-y-2 mb-3">
                            <li>Time-boxes help a Scrum Team create empirical feedback loops.</li>
                            <li>By producing a "<a href="/donedone" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">Done</a>" Increment at least once during a Sprint, a Scrum Team enables transparency that allows them to validate their assumptions about value.</li>
                        </ul>

                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-3">
                            To truly maximize the benefits of Scrum, Scrum Teams must increase the breadth (quantity) and depth (quality) of their empiricism. For example:
                        </p>
                        <ul class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 list-disc list-inside space-y-2">
                            <li>By increasing transparency into how they do their work, they are able to identify improvements in their processes, tools, and interactions.</li>
                            <li>By increasing transparency into the value that customers realize from using the product, they gain deeper insights into how they can improve the product.</li>
                            <li>By increasing their frequency of collaboration during the day, beyond just the Daily Scrum, they can identify and resolve issues sooner, thereby improving their flow of work.</li>
                            <li>By collaborating with the Product Owner as the work is being done, they can increase the speed with which they are able to improve the product.</li>
                        </ul>
                    </div>

                    <!-- 3. Teamwork -->
                    <div class="mb-8">
                        <a name="3a"></a>
                        <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-3">3. Mastering Scrum Means Improving Teamwork</h3>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-3">
                            To make empiricism work, Scrum Teams need to collaborate to deliver valuable solutions to complex problems, then measure the results, and subsequently adapt based on feedback.
                        </p>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-3">
                            An effective Scrum Team is:
                        </p>

                        <div class="bg-gray-800 rounded-lg p-4 mb-3">
                            <h4 class="text-xl font-semibold text-white mb-2">Cross-functional</h4>
                            <p class="text-lg text-gray-300">
                                A cross-functional team has all of the skills needed to accomplish the goal. This reduces the risk caused by dependencies outside the team, including potential waste from partially done work. "Cross-functional" does not mean that every person needs to be able to perform every activity. Instead, a team must figure out the combination of skills and how to spread the skills among the team to reduce waste, improve innovation and quality, and adapt to changing needs.
                            </p>
                        </div>

                        <div class="bg-gray-800 rounded-lg p-4 mb-3">
                            <h4 class="text-xl font-semibold text-white mb-2">Self-organizing</h4>
                            <p class="text-lg text-gray-300">
                                A self-organizing team determines what it can accomplish and how team members will work together to accomplish it. To ensure accountability, the first step is for a team to feel ownership of the work. Members need to be trusted as the experts and allowed to experiment, try new things, and change direction—all in the service of value delivery.
                            </p>
                        </div>

                        <div class="bg-gray-800 rounded-lg p-4 mb-3">
                            <h4 class="text-xl font-semibold text-white mb-2">Collaborative</h4>
                            <p class="text-lg text-gray-300">
                                To harness the power of collective intelligence, a self-organizing, cross-functional team must break down silos to gain the benefits of collaboration. Working in silos makes it challenging to innovate or even to simply deliver something of value to a customer quickly. <strong>Handoffs must be eliminated at all cost as these create gaps in understanding, delays, and other waste!</strong>
                            </p>
                        </div>

                        <div class="bg-gray-800 rounded-lg p-4 mb-3">
                            <h4 class="text-xl font-semibold text-white mb-2">Stable</h4>
                            <p class="text-lg text-gray-300">
                                A self-organizing, cross-functional, collaborative team is more than a collection of individuals; it is an entirely new entity made up of <a href="/pmway/?slide=14" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300" title="CMM People is a People / Team improvement Capability Maturity model">people</a> who themselves are wonderfully complex creatures. It takes time and conscious effort to bring a group of individuals together to form a cohesive team that is able to continuously evolve in terms of who it is and how it works. Without stability, the team never completely forms, and its sponsoring organization never truly reaps the benefits of a high-performing team. This does not mean that team composition should never change, only that when it does it will take time and conscious effort to help the individuals work as a team again.
                            </p>
                        </div>
                    </div>

                    <!-- Teamwork Video Section -->
                    <div class="text-center mb-8">
                        <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">PMWay suggests this video below is an example of Awesome Teamwork!</h4>

                        {{-- Video Player with Able Player --}}
                        <div class="max-w-4xl mx-auto mb-6">
                            <video id="video1"
                                   data-able-player
                                   preload="metadata"
                                   data-speed-icons="true"
                                   class="w-full rounded-lg"
                                   poster="{{ asset('storage/images/walkofftheearth.jpg') }}"
                                   playsinline>
                                <source type="video/mp4" src="{{ asset('ablelvids/somebody/somebody.mp4') }}">
                            </video>
                        </div>

                        {{-- Team Images --}}
                        <div class="flex justify-center space-x-4">
                            <div class="inline-block bg-gray-50 dark:bg-white p-4 rounded-lg">
                                <img alt="Team" class="max-w-full h-auto rounded-lg" src="{{ asset('storage/images/team.png') }}">
                            </div>
                            <div class="inline-block bg-gray-50 dark:bg-white p-4 rounded-lg">
                                <img alt="Team Pulling Together" class="max-w-full h-auto rounded-lg" src="{{ asset('storage/images/teampullingtogether.png') }}">
                            </div>
                        </div>
                    </div>

                    <!-- Collapsible Team Example -->
                    <div class="text-center mb-8">
                        <button @click="isTeamExampleOpen = !isTeamExampleOpen"
                                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors shadow-md hover:shadow-lg">
                            Example of a TEAM <br>not working together well
                        </button>

                        <div x-show="isTeamExampleOpen" x-transition:enter="transition ease-out duration-300"
                             x-transition:enter-start="opacity-0 transform scale-95"
                             x-transition:enter-end="opacity-100 transform scale-100"
                             class="mt-4">
                            <div class="bg-gray-800 rounded-lg p-6 text-center shadow-lg">
                                <h5 class="text-xl font-semibold text-white mb-4">TEAM operating @ Capability Maturity Level 1</h5>
                                <div class="text-center space-y-4">
                                    <p class="text-lg text-gray-300 mb-4">An example of a team not working together!</p>
                                    <div class="inline-block bg-gray-50 dark:bg-white p-4 rounded-lg">
                                        <img alt="" class="mx-auto max-w-full h-auto mb-4 rounded-lg" src="{{ asset('storage/images/teamwork_teamwork_a.png') }}">
                                    </div>
                                    <div class="inline-block bg-gray-50 dark:bg-white p-4 rounded-lg">
                                        <img alt="" class="mx-auto max-w-full h-auto rounded-lg" src="{{ asset('storage/images/teamwork-boat.jpg') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 4. Team Process -->
                    <div class="mb-8">
                        <a name="4a"></a>
                        <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-3">4. To Improve, Teams Must Hone Their Team Processes</h3>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-3">
                            The Scrum Team defines its way of working within <em>guard rails</em> established by the Scrum Framework—that is, the boundaries and guidance established by role accountabilities, event goals, and artifact purposes. How the Scrum Team fulfills the roles, uses the artifacts, and conducts the events is left up to them. How they create the Product Increment and ensure quality is also left up to them.
                        </p>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-3">
                            The Team Process dimension includes practices, tools, and ways of working together. It touches on a wide variety of areas, including the following:
                        </p>
                        <ul class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 list-disc list-inside space-y-2 mb-3">
                            <li>Engineering practices and tools</li>
                            <li>Quality practices and tools</li>
                            <li>Product (and <a href="/scrum" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">Project</a>) management processes, practices and tools</li>
                            <li>Product Backlog management practices and tools Effective use of Scrum events and artifacts Effective communication and collaboration Identification and removal of sources of waste Identification and removal of impediments</li>
                            <li>Effective use and growth of <a href="/pmway/?slide=14" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300" title="People CMM can be used here to measure Team Capability and Maturity">team knowledge, skills, and capabilities</a> for Scrum specifically and in general (To illustrate: How many members of the scrum team actually have scrum certification? What about certification for the software development areas they work in?)</li>
                        </ul>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-3">
                            The practices and tools that a team uses will be influenced by the product type, its technology platform, the environment in which the product is used, the users of the product and how they use it, regulatory and legal conditions, market trends, changing needs of the business, and so forth. That's a lot of stuff! Moreover, much of that stuff changes over time.
                        </p>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">
                            As a result, Scrum Teams must remain vigilant in inspecting and adapting what they are doing, why they are doing it, how they are doing it, and what benefits they are getting from doing it. New practices and tools are continuously being created and shared in product development communities around the world, so it is important to stay connected and keep learning. In fact, teams may need to invent new practices and tools to meet their unique challenges and needs.
                        </p>
                    </div>

                    <!-- 5. Team Identity -->
                    <div class="mb-8">
                        <a name="5a"></a>
                        <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-3">5. Every Strong Team has a Distinct Team Identity</h3>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-3">
                            A team starts as a collection of individuals. Together they form an entirely new living and breathing organism. This new organism forms an identity over time. Just as a child grows up and becomes a teenager and then a young adult, a team must constantly seek to discover and evolve its identity.
                        </p>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-3">
                            At a fundamental level, establishing identity is about answering three big questions that guide a team on its journey toward high performance:
                        </p>
                        <ol class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 list-decimal list-inside space-y-2">
                            <li>Why do we exist? (Purpose)</li>
                            <li>What is important to us? (Values)</li>
                            <li>What do we want? (Vision)</li>
                        </ol>
                    </div>

                    <!-- 6. Product Value -->
                    <div class="mb-8">
                        <a name="6a"></a>
                        <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-3">6. Every Scrum Team Must Focus on Improving the Value That Its Product Delivers</h3>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-3">
                            The purpose of a Scrum Team is to deliver a series of valuable Product Increments. To deliver value, a Scrum Team must:
                        </p>
                        <ul class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 list-disc list-inside space-y-2 mb-3">
                            <li>Understand the motivations, behaviors, and needs (both stated and latent) of users and customers.</li>
                            <li>Align the product's vision, its strategy, and the mission and objectives of the organization.</li>
                            <li>Measure the actual value delivered.</li>
                        </ul>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">
                            Essentially, Scrum enables a team to deliver a lot of stuff, frequently. However, if the team isn't optimizing the value of the Product, it will achieve very little.
                        </p>
                    </div>

                    <!-- 7. Organization -->
                    <div class="mb-8">
                        <a name="7a"></a>
                        <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-3">7. The Organization Can Greatly Influence the Team's Performance</h3>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-3">
                            Organizations provide both structure and culture. Both of these facets impact the teams and products that live within the organization, in either positive ways or negative ways.
                        </p>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-3">
                            Structure includes the business model, which is essentially the design for successfully operating the business. This includes the mission, the strategy, products, and services, as well as how they relate to revenue sources, a customer base, and financing. Structure also includes how employees, partners, and service providers are organized. It often influences organizational processes and policies.
                        </p>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-3">
                            Culture is a body of habits that bind people together into a cohesive unit. Culture is a way of seeing things, of knowing what to do in specific circumstances. It evolves from the sum of all human behavior within an organization. It is often influenced by the organizational structure and processes, including roles, goals, and incentives.
                        </p>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">
                            The success of Scrum Teams is greatly influenced by organizational structure and culture. Maximizing the benefits of Scrum often means evolving organizational culture, processes, and possibly structure. Although you may not have to tackle these things immediately, usually Scrum Teams eventually start running into impediments that are outside of their control. They may be able to work around those impediments for a time, but this means they will reach a plateau.
                        </p>
                    </div>
                </div>

                <!-- Five Capability Areas Section -->
                <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                    <a name="indexb"></a>
                    <h2 class="text-3xl font-semibold text-gray-900 dark:text-white mb-4">
                        Growing Scrum Requires a Team to Improve Other Capabilities
                    </h2>

                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-4">
                        Scrum Teams need a number of capabilities to help them to continuously improve and to adapt to change. By "capability," we mean the ability to apply knowledge, skills, and experience to solve problems. Specifically, Scrum Teams must have knowledge (e.g., theory, techniques, domains), the ability to apply that knowledge skillfully to obtain desired results, and experience to build those skills as well as to guide intuition and foresight.
                    </p>

                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-4">
                        Scrum Teams need different capabilities depending on the kind of product they are developing and the constraints of the organization in which they work. The kinds of capabilities they need can be organized into five categories:
                    </p>

                    <div class="flex justify-between items-center mb-6">
                        <a href="#top" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">TOP</a>
                        <span class="font-semibold text-gray-700 dark:text-gray-300">INDEX</span>
                    </div>

                    <ol class="text-lg text-gray-700 dark:text-gray-300 space-y-2 list-decimal list-inside mb-6">
                        <li><a href="#1b" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">Teaching skills</a></li>
                        <li><a href="#2b" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">Facilitation skills</a></li>
                        <li><a href="#3b" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">Coaching skills</a></li>
                        <li><a href="#4b" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">Technical excellence</a></li>
                        <li><a href="#5b" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">Servant leadership</a></li>
                    </ol>

                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-6">
                        People within the Scrum Team must have these capabilities and continue to grow these capabilities so as to be successful in the dimensions that enable Professional Scrum.
                    </p>

                    <!-- 1. Teaching Skills -->
                    <div class="mb-8">
                        <a name="1b"></a>
                        <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-3">1. Teaching Skills</h3>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-3">
                            Teaching is instructing others in an effort to give them new knowledge and skills. Often, Scrum Masters employ their teaching skills to help team members understand the Scrum Framework and its underlying values and principles. Scrum Teams will likely need to be introduced to techniques that can help them move forward with Scrum and become more effective with Scrum.
                        </p>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-3">
                            The skills and knowledge that a Scrum Team needs to continuously improve and tackle new challenges will change over time. Scrum Masters recognize what the Scrum Team needs based on its growth as a team and the current context to help the team get to the next level needed. This may be professional training, short exercises and knowledge sharing, a refresher course, a situational teaching moment, or a combination of all of these.
                        </p>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-3">
                            Of course, it is not always the Scrum Master who needs to teach the team. Product Owners may teach Development Teams about the product market, customer needs, and business value. Development Team members may teach each other about quality practices, testing approaches, and tools.
                        </p>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-3">
                            Teaching does not simply mean telling people things; that is, teaching is not a lecture. People learn much more effectively by doing and discovering. They learn by relating to what they already know. They also learn when the new knowledge and skills have an emotional impact.
                        </p>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">
                            Teaching is not something everyone can do. Some people may have an innate teaching ability, but ultimately teaching is a capability that people can develop and grow. Luckily, you do not have to be at the level of a professional teacher to employ and develop this capability.
                        </p>
                    </div>

                    <!-- 2. Facilitation Skills -->
                    <div class="mb-8">
                        <a name="2b"></a>
                        <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-3">2. Facilitation Skills</h3>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-3">
                            Facilitators guide groups by using a neutral perspective to help them come to their own solutions and make decisions. The facilitator provides a group with enough structure to enable the members to engage in positive collaboration to achieve productive progress in meetings and conversations. The word "facile" is French for "easy" or "simple"; thus, a facilitator is trying to make things easier for a group of people to work together.
                        </p>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-3">
                            Facilitation skills can help improve every Scrum event. In addition, facilitation can help improve other working sessions as well as ad hoc conversations that occur when teams are doing complex work together.
                        </p>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-3">
                            The extent of facilitation can range from light to extensive, depending on the needs of the group. Wherever a meeting or conversation falls on this range, ensure there is enough structure to meet the following aims:
                        </p>
                        <ul class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 list-disc list-inside space-y-2 mb-3">
                            <li>Stay on target with their purpose or goals.</li>
                            <li>Create an environment that promotes rich discussion and collaboration.</li>
                            <li>Clarify the group's decisions, key outcomes, and next steps.</li>
                        </ul>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-3">
                            Any team member can help the team by facilitating. <a href="{{ asset('storage/assets/scrumguide.pdf') }}" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">The Scrum Guide</a> does not require the Scrum Master to facilitate all of the events; instead, facilitation is a skill that can and should be grown across a Scrum Team. Facilitation skills also help team members guide their own informal conversations and working sessions with each other to be more focused, creative, and productive.
                        </p>
                    </div>

                    <!-- 3. Coaching Skills -->
                    <div class="mb-8">
                        <a name="3b"></a>
                        <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-3">3. Coaching Skills</h3>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-3">
                            <em>Coaching enhances a person's ability to learn, make changes, and achieve desired goals. It is a thought-provoking and creative process that enables people to make conscious decisions and empowers them to become leaders in their own lives</em>.
                        </p>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-3">
                            Our view is that coaching is <em>not</em> the same as advising or consulting. The key difference is that the person being coached is the one taking the lead. With advising, the person being advised is not learning and discovering based on his or her own experiences and desires, but rather receives advice based on someone else's experience and desires. "Consulting" is a broad and loosely used term, but it typically involves doing the work (versus helping others discover solutions) and advising people how to do the work.
                        </p>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">
                            Coaching skills help Scrum Teams grow because they help the team members improve their accountability and ability to self-organize. They also help the team become more resilient when faced with complexity, new challenges, and constant change.
                        </p>
                    </div>

                    <!-- 4. Technical Excellence -->
                    <div class="mb-8">
                        <a name="4b"></a>
                        <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-3">4. Technical Excellence</h3>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-3">
                            Technical excellence means excellence in the choice and application of techniques; it is not just about the technology. Scrum doesn't tell you how to be an excellent Development Team, nor does it tell you how to be an excellent Product Owner. The approaches, skills, and tools you will need in each role are completely dependent on the context in which you are working. Although Scrum doesn't define what sort of things you will need to exhibit technical excellence, doing Scrum well absolutely requires that you demonstrate technical excellence. Technical excellence encompasses many things: from engineering practices to programming languages, from product management practices to quality assurance, from mechanical engineering to user experience design, and much more.
                        </p>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">
                            Because technology and business are changing so rapidly, along with other environmental changes that impact product possibilities, any attempt to define exactly what is needed to deliver with technical excellence would become outdated immediately. Furthermore, products are becoming much more than just software. As a result, Scrum Teams need to constantly refine and evolve what technical excellence means to them as business and technology needs change.
                        </p>
                    </div>

                    <!-- 5. Servant Leadership -->
                    <div class="mb-8">
                        <a name="5b"></a>
                        <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-3">5. Servant Leadership</h3>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-3">
                            The Scrum Guide describes the Scrum Master as a servant-leader and provides examples of ways that the Scrum Master serves the Product Owner, the Development Team, and the organization. Scrum Masters are accountable servant-leaders, which means a Scrum Master's success is determined by the success of his or her Scrum Team. A Scrum Master helps everyone grow their capabilities, effectively navigate limitations and challenges, and embrace empiricism to deliver, on a frequent cadence, valuable products in a complex and unpredictable world.
                        </p>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-3">
                            However, there is an artful complexity to fulfilling the accountability of the Scrum Master role. When success depends on the actions of others, it is easy to want to direct them and step in when things appear to be going off-course. Yet such intervention can undermine self-organization and their feeling of accountability. This is where the capabilities of servant leadership guide a Scrum Master.
                        </p>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-3">
                            Here are examples of behaviors of accountable Scrum Masters:
                        </p>
                        <ul class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 list-disc list-inside space-y-2 mb-3">
                            <li>They create an environment of safety, encouraging productive debate to ensure people feel heard and respected, thereby helping teams reach better decisions and own those decisions.</li>
                            <li>They facilitate consensus, helping teams clarify decisions and responsibilities to increase focus and create shared understanding.</li>
                            <li>They refrain from solving problems and aim to increase transparency, which empowers teams and helps them to better self-organize, taking ownership of their process, decisions, and outcomes.</li>
                            <li>They are comfortable with failure and ambiguity. When team decisions do not lead to the anticipated outcome, they help the team learn and grow and gain confidence in using an empirical approach that maximizes learning and controls risk.</li>
                            <li>They care for people, meeting them where they are and helping them find their next step for growth, but are not afraid to challenge people when they are capable of more.</li>
                            <li>They show low tolerance for organizational impediments and fiercely advocate for the team to remove obstacles that are preventing the team from achieving better results.</li>
                        </ul>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">
                            These behaviors contribute to higher engagement, faster feedback, and better outcomes for the product. When managers of Scrum Teams and other leaders in the organization act as accountable servant-leaders, they support the growth of both Scrum Teams and agility across the wider organization.
                        </p>
                    </div>

                    <!-- Process for Continuous Improvement -->
                    <div class="mb-8">
                        <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-3">A Process for Continuous Improvement</h3>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-3">
                            <u>Appendix A</u> "<u>A Self-Assessment for Understanding Where You Are</u>" (<a href="{{ asset('storage/assets/masteringprofessionalscrum2019.pdf') }}" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">from Annexures in Mastering Professional Scrum 2019</a> OR <a href="{{ asset('storage/assets/masteringprofessionalscrumwherearewemisconceptions2019.pdf') }}" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">Just the Self Assessment and Misconceptions about Scrum. I.e. only the last 2 Annexures from Mastering Professional Scrum 2019</a>), presents a set of self-assessment questions. If you take the time with your team members to complete this assessment, it will bring additional perspectives and insights. The assessment is meant to help you identify areas where you can improve as a team; it is not meant to pass judgment on you for doing things wrong. Ideally, this tool will prompt your entire Scrum Team to look objectively at where you are and where you want to be, as a starting point for your team's improvement.
                        </p>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-3">
                            After you have completed the self-assessment, look for questions where you scored yourself as 7 or lower. Especially look at questions where you scored yourself as 5 or lower.
                        </p>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-3">
                            The list of areas where you feel you need to improve may feel overwhelming, but as we said earlier, transparency is essential to improving the results that you will get by using Scrum. The way you start improving anything complex is to ask yourself three questions:
                        </p>
                        <ol class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 list-decimal list-inside space-y-2 mb-3">
                            <li>What hurts the most?</li>
                            <li>Why?</li>
                            <li>What are small experiments we can run that will deliver the most value?</li>
                        </ol>

                        <div class="bg-gray-800 rounded-lg p-4 mb-3">
                            <h4 class="text-xl font-semibold text-white mb-2">What Hurts the Most?</h4>
                            <p class="text-lg text-gray-300">
                                You can't fix everything at once. Your energy and focus will become diluted when you try to change too many things simultaneously, making it difficult to achieve anything meaningful for any one thing. When people in the organization don't see quick benefits, they tend to lose interest and withdraw their support, and the new habits may not be given the chance to take hold. Spreading yourself across too many things also makes it difficult to measure the impacts of each change or to know which changes are having the desired impacts.
                            </p>
                            <p class="text-lg text-gray-300 mt-2">
                                Instead, incrementally implement changes continuously over time, making adjustments as you learn more—in other words, improve empirically! Sometimes the changes will be small, and sometimes the changes must be big. It all depends on what is broken. The best place to start is usually where it hurts the most.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Seven Common Scrum Dysfunctions Section -->
                <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                    <a name="indexc"></a>
                    <h2 class="text-3xl font-semibold text-gray-900 dark:text-white mb-4">
                        In Practice: Seven Common Scrum Dysfunctions
                    </h2>

                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-4">
                        In our experience, seven common mistakes prevent teams and organizations from fully enabling business agility with Professional Scrum. These mistakes can happen even with the best of intentions.
                    </p>

                    <div class="flex justify-between items-center mb-6">
                        <a href="#top" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">TOP</a>
                        <span class="font-semibold text-gray-700 dark:text-gray-300">INDEX</span>
                    </div>

                    <ol class="text-lg text-gray-700 dark:text-gray-300 space-y-2 list-decimal list-inside mb-6">
                        <li><a href="#1c" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">Undone Scrum</a></li>
                        <li><a href="#2c" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">Mechanical (or Zombie) Scrum</a></li>
                        <li><a href="#3c" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">Dogmatic Scrum</a></li>
                        <li><a href="#4c" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">One-Size-Fits-All Scrum</a></li>
                        <li><a href="#5c" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">Water-Scrum-Fall</a></li>
                        <li><a href="#6c" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">Good Enough Scrum</a></li>
                        <li><a href="#7c" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">Snowflake Scrum</a></li>
                    </ol>

                    <!-- 1. Undone Scrum -->
                    <div class="mb-8">
                        <a name="1c"></a>
                        <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-3">1. Undone Scrum</h3>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-3">
                            In our experience with a wide variety of teams, we have found that the biggest pain point for Scrum Teams is not being able to create a "<a href="/donedone" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">Done</a>" Product Increment by the end of a Sprint.
                        </p>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-3">
                            Scrum Teams that don't produce a "<a href="/donedone" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">Done</a>" Increment can't inspect and adapt and are not really getting any benefit from using Scrum. This can lead to "zombie" Scrum, or water-Scrum-fall, or several of the other dysfunctions listed in points 2 to 7 below.
                        </p>
                        <div class="text-center">
                            <p class="text-lg text-gray-700 dark:text-gray-300 mb-2"><i>Hover your mouse over the image</i></p>
                            <div class="inline-block bg-gray-50 dark:bg-white p-4 rounded-lg">
                                <img alt="" class="mx-auto max-w-full h-auto cursor-pointer rounded-lg shadow-lg"
                                     title="It aint done till its done done!"
                                     id="heart"
                                     src="{{ asset('storage/images/doneandundone.jpg') }}"
                                     onmouseover="this.src='{{ asset('storage/images/undonescrum.jpg') }}'"
                                     onmouseout="this.src='{{ asset('storage/images/doneandundone.jpg') }}'">
                            </div>
                        </div>
                    </div>

                    <!-- 2. Mechanical Scrum -->
                    <div class="mb-8">
                        <a name="2c"></a>
                        <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-3">2. Mechanical (or Zombie) Scrum</h3>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-3">
                            This problem involves simply going through the motions without the spirit of continuous improvement and without understanding or caring about the underlying values and principles. This is "checking the box" to say you are doing it, but there's no beating heart.
                        </p>
                        <div class="text-center space-y-4">
                            <div class="inline-block bg-gray-50 dark:bg-white p-4 rounded-lg">
                                <img alt="zombie scrum" class="mx-auto max-w-full h-auto rounded-lg shadow-lg" id="target" src="{{ asset('storage/images/zombiescrum.jpg') }}">
                            </div>
                            <div class="inline-block bg-gray-50 dark:bg-white p-4 rounded-lg">
                                <img alt="" class="mx-auto max-w-full h-auto rounded-lg" src="{{ asset('storage/images/codered.jpg') }}">
                            </div>
                            <div class="inline-block bg-gray-50 dark:bg-white p-4 rounded-lg">
                                <img alt="" class="mx-auto max-w-full h-auto rounded-lg" src="{{ asset('storage/images/defib.png') }}">
                            </div>
                            <div class="inline-block bg-gray-50 dark:bg-white p-4 rounded-lg">
                                <img alt="" class="mx-auto max-w-full h-auto cursor-move rounded-lg" id="zapper" src="{{ asset('storage/images/defibpaddles.png') }}">
                            </div>
                            <p class="text-lg text-gray-700 dark:text-gray-300 mb-2"><i>Hover your mouse over the image</i></p>
                            <img alt="" class="mx-auto cursor-pointer rounded-lg"
                                 height="82" width="60"
                                 title="Shocked to see a pulse!? Now kill Mechanical (Zombie) Scrum by dragging your beating passionate heart into the fight!"
                                 id="heart"
                                 src="{{ asset('storage/images/notbeatingheart.png') }}"
                                 onmouseover="this.src='{{ asset('storage/images/beatingheart.gif') }}'"
                                 onmouseout="this.src='{{ asset('storage/images/notbeatingheart.png') }}'">
                        </div>
                    </div>

                    <!-- 3. Dogmatic Scrum -->
                    <div class="mb-8">
                        <a name="3c"></a>
                        <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-3">3. Dogmatic Scrum</h3>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-3">
                            This issue may happen when an "expert" tells the Scrum Team the "best practices" based on his or her own experience. <em>There are no best practices with Scrum.</em> The assertion that teams must follow certain "best practices" discourages self-organization and ultimately limits agility. Scrum is meant to be a framework for opportunistic discovery.
                        </p>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-3">
                            The reason Scrum is so lightweight is because specific practices and techniques are not universal. Product delivery is complex and unpredictable, and it requires creative exploration by self-organizing teams. The best practice is the practice that works for your product and your team in the current moment. And it likely won't be a best practice for your product and your team six months from now.
                        </p>
                        <div class="text-center">
                            <div class="inline-block bg-gray-50 dark:bg-white p-4 rounded-lg">
                                <img alt="" class="mx-auto max-w-full h-auto rounded-lg shadow-lg" src="{{ asset('storage/images/drill.jpg') }}">
                            </div>
                        </div>
                    </div>

                    <!-- 4. One-Size-Fits-All Scrum -->
                    <div class="mb-8">
                        <a name="4c"></a>
                        <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-3">4. One-Size-Fits-All Scrum</h3>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-3">
                            In one-size-fits-all Scrum, an organization wants to standardize and create a Scrum "methodology" for all Scrum Teams in the organization. This problem, which is often combined with dogmatic Scrum, sometimes emerges more because of a (misplaced) feeling of control and predictability, rather than out of a sense of creating true value for the organization. It may represent an attempt to ensure all previous activities and documents are "covered." In Scrum, the activities are not what matter; the outcomes are what matter. We need to be open to new ways of working to meet the real needs. Scrum is a process framework, and teams need to figure out their own process within the boundaries of Scrum.
                        </p>
                        <div class="text-center">
                            <div class="inline-block bg-gray-50 dark:bg-white p-4 rounded-lg">
                                <img alt="" class="mx-auto max-w-full h-auto rounded-lg shadow-lg" src="{{ asset('storage/images/onesizefitsall.jpg') }}">
                            </div>
                        </div>
                    </div>

                    <!-- 5. Water-Scrum-Fall -->
                    <div class="mb-8">
                        <a name="5c"></a>
                        <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-3">5. Water-Scrum-Fall</h3>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-3">
                            This problem comes in two flavors. In the first version, a Scrum Team is operating in a series of Sprints but essentially still doing a waterfall process within the Sprint, with silos of knowledge and skills and multiple handoffs. This often results in not having a "<a href="/donedone" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">Done</a>" Increment by the end of the Sprint. In the second manifestation, a Scrum Team does its "development" work in a Sprint, but there are up-front requirements and design cycles and later testing cycles. This is not really Scrum at all, because there is no intention of producing a releasable Increment at the end of every Sprint.
                        </p>
                        <div class="text-center">
                            <p class="text-lg text-gray-700 dark:text-gray-300 mb-2"><i>Hover your mouse over the image</i></p>
                            <div class="inline-block bg-gray-50 dark:bg-white p-4 rounded-lg">
                                <img alt="" class="mx-auto max-w-full h-auto cursor-pointer rounded-lg shadow-lg"
                                     src="{{ asset('storage/images/water_scrum_fall.jpg') }}"
                                     onmouseover="this.src='{{ asset('storage/images/waterscrumfalllarger.png') }}'"
                                     onmouseout="this.src='{{ asset('storage/images/water_scrum_fall.jpg') }}'">
                            </div>
                        </div>
                    </div>

                    <!-- 6. Good Enough Scrum -->
                    <div class="mb-8">
                        <a name="6c"></a>
                        <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-3">6. Good Enough Scrum</h3>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-3">
                            With this problem, the Scrum Team gets some efficiency benefits by regularly planning and looking at the state of the product, but it tolerates the organizational impediments and current limitations, assuming "that's the way things have always been done." Team members don't challenge themselves to improve technical and engineering practices to have a "<a href="/donedone" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">Done</a>" Increment every Sprint.
                        </p>
                        <div class="text-center">
                            <div class="inline-block bg-gray-50 dark:bg-white p-4 rounded-lg">
                                <img alt="undone scrum" class="mx-auto max-w-full h-auto rounded-lg shadow-lg" src="{{ asset('storage/images/culturecuffed.png') }}">
                            </div>
                        </div>
                    </div>

                    <!-- 7. Snowflake Scrum -->
                    <div class="mb-8">
                        <a name="7c"></a>
                        <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-3">7. Snowflake Scrum</h3>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-3">
                            This situation happens when a team or organization thinks it is "unique," so it has to adapt Scrum to fit its needs. <em>You either do Scrum or you don't do Scrum.</em> Modifying Scrum does not fix the problems. Modifying Scrum will likely hide your problems … for a little while. When the problems are hidden, it may feel better, but those problems are still there. Ultimately, they will manifest as a lack of business agility and dysfunction.
                        </p>
                        <div class="text-center space-y-4">
                            <div class="inline-block bg-gray-50 dark:bg-white p-4 rounded-lg">
                                <img alt="" class="mx-auto max-w-full h-auto rounded-lg shadow-lg" src="{{ asset('storage/images/snowflakescrum.png') }}">
                            </div>
                            <div class="inline-block bg-gray-50 dark:bg-white p-4 rounded-lg">
                                <img alt="" class="mx-auto max-w-full h-auto rounded-lg shadow-lg" src="{{ asset('storage/images/watersplashblack.png') }}">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Root Cause Analysis Section -->
                <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                    <a name="rca"></a>
                    <div class="flex justify-between items-center mb-6">
                        <a href="#top" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">TOP</a>
                        <h2 class="text-3xl font-semibold text-gray-900 dark:text-white">Root Cause Analysis</h2>
                    </div>

                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-4">
                        The question "why" is about getting down to the root cause. The <em>5 Whys</em> is a technique used to determine the root cause of a problem by repeating the question "Why." The "5" in the name of this technique comes from observation that typically five iterations of asking the question are needed to get to the root of the problem, although the actual number may be either fewer or more.
                    </p>

                    <div class="bg-gray-800 rounded-lg p-6 mb-6">
                        <h3 class="text-2xl font-semibold text-white mb-4">In Practice: Using the "5 Whys" to Diagnose Root Causes</h3>
                        <p class="text-lg text-gray-300 mb-4">
                            To illustrate using the 5 Whys, consider the following problem: "<strong>Releases are constantly delayed, frustrating customers and other stakeholders.</strong>"
                        </p>
                        <p class="text-lg text-gray-300 mb-4">
                            The first question you could ask is "Why are releases constantly delayed?" Your answer might be "Because we didn't deliver a '<a href="/donedone" class="text-blue-400 underline hover:text-blue-300">Done</a> <a href="/productincrement" class="text-blue-400 underline hover:text-blue-300">Product Increment</a>, so our work has to continue into the next Sprint."
                        </p>
                        <p class="text-lg text-gray-300 mb-4">
                            In response, your second question would likely be "Why didn't you deliver a '<a href="/donedone" class="text-blue-400 underline hover:text-blue-300">Done</a> <a href="/productincrement" class="text-blue-400 underline hover:text-blue-300">Product Increment</a>?" Your answer might be "Product Backlog items are always larger and more difficult than we think, and we don't usually discover this until late in the Sprint."
                        </p>
                        <p class="text-lg text-gray-300 mb-4">
                            Based on your experience you may already have thought of some possible root causes:
                        </p>
                        <ul class="text-lg text-gray-300 list-disc list-inside space-y-2">
                            <li>The work is too big. (Team Process)</li>
                            <li>The work is not well enough understood. (Team Process, Product Value)</li>
                            <li>How the team gets things to "<a href="/donedone" class="text-blue-400 underline hover:text-blue-300">Done</a>" is not transparent or not effective. (Empiricism, Teamwork, Team Process)</li>
                            <li>Progress is not transparent. (Empiricism, Team Process)</li>
                            <li>Team members may be afraid to bring up issues and risks. (Teamwork, Team Identity)</li>
                        </ul>
                    </div>

                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-4">
                        You can now form better questions to start digging deeper into the root causes. Your third question might be "How much transparency is there to the progress of work on a daily basis?" The answer might be "We have a Daily Scrum and look at the Scrum Board. Team members report the status for the cards they are working on. Most cards take a few days, sometimes more than a week, to get done. So it's toward the end of a Sprint that people start reporting that they are at risk of not finishing. By then, of course, the testers don't have enough time."
                    </p>

                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-4">
                        Based on our experience, possible root causes include the following issues:
                    </p>
                    <ul class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 list-disc list-inside space-y-2 mb-4">
                        <li>Not understanding the purpose of the Daily Scrum and poor facilitation of the Daily Scrum (Empiricism, Teamwork, Team Process)</li>
                        <li>Lack of shared purpose among the Development Team and not holding each other accountable (Teamwork, Team Identity)</li>
                        <li>Silos in knowledge and skills that prevent collaboration and getting items completed earlier in the Sprint (Teamwork, Team Identity, Team Process)</li>
                    </ul>

                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-4">
                        Given the answers provided, ask the following kinds of questions to refine your understanding:
                    </p>
                    <ul class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 list-disc list-inside space-y-2 mb-4">
                        <li>How much transparency is there to the progress of work on a daily basis?</li>
                        <li>Why do team members work on different things?</li>
                        <li>How does the Scrum Team adapt when it discovers that there is not enough time to finish everything?</li>
                    </ul>

                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-4">
                        There are many ways this example conversation could unfold, and in practice it will take longer and require more questions to find the root causes of the problem. Major pain points are often complex and have multiple root causes. Consequently, you will have to prioritize which paths you go down first. You will start to see themes or patterns develop. Look for the root causes that are foundational, meaning they will prevent progress in solving other issues essential to the effectiveness of Scrum.
                    </p>

                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-4">
                        Scrum Teams can use this technique in Sprint Retrospectives to help them understand why they are experiencing a particular problem (Figure 1-1).
                    </p>

                    <div class="text-center mb-6">
                        <div class="inline-block bg-gray-50 dark:bg-white p-4 rounded-lg">
                            <img alt="" class="mx-auto max-w-full h-auto rounded-lg shadow-lg" src="{{ asset('storage/images/rca.jpg') }}">
                        </div>
                        <p class="text-lg text-gray-700 dark:text-gray-300 mt-2"><strong>Figure 1-1</strong> A sample output from a root cause analysis</p>
                    </div>

                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-4">
                        A figure representing the root cause analysis report of a team is shown. The three major pain points are no "<a href="/donedone" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">Done</a>" increment, low product value, and releases and customer feedback delayed. They are related to each other as follows: no "<a href="/donedone" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">Done</a>" increment leads to releases and customer feedback delayed, which in turn leads to low product value. The possible causes for each pain point are shown. The possible causes that affect no "<a href="/donedone" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">Done</a>" Increment directly are, knowledge/skill silos, poor/unclear DoD, and external dependency. The possible causes that have an indirect effect are: lack of team ownership and accountability which is a result of knowledge/skill silos, scrum team not understanding scrum, and work being forced into sprint and not understood well, which is a result of PO not empowered to make decisions. The possible causes that affect low product value directly are: quality issues impacting customers, and PO focusing on PBI details only. The possible causes that affect the low product value indirectly are: poor or unclear DoD leading to progress not being transparent which further leads to quality issues impacting customers.
                    </p>

                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-4">
                        In Figure 1-1, a Scrum Team's three major pain points are circled, and each possible cause is shown as contributing to one or more of the pain points. Now that they have visualized the problems and root causes, the Scrum Team can make better-informed decisions about where to start to fix the most critical issues. Although there is no magic formula to address all possible root causes, an iterative and incremental approach will allow the team to discover the best options for them at this point of time. Improving incrementally is done by employing <a href="/empirical" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">empiricism</a>. By discussing challenges and their possible root causes, you have created transparency and enabled inspection of that transparent information.
                    </p>

                    <div class="bg-gray-800 rounded-lg p-6 mb-6">
                        <h3 class="text-2xl font-semibold text-white mb-4">Experiment with Different Approaches</h3>
                        <p class="text-lg text-gray-300 mb-4">
                            Complex problems don't have simple or obvious solutions. Before you make a major investment in a particular solution, make sure that you understand the problem and have a viable solution for fixing it. Regardless of the data, intuition, and experience you have, there will always be some things that you don't know. To move forward without being paralyzed by these unknowns, you can try some experiments to see what might work or to gather more information. Sounds very in alignment with navigating complexity and unpredictability, eh?
                        </p>
                        <p class="text-lg text-gray-300 mb-4">
                            To effectively use experiments to improve, follow these steps:
                        </p>
                        <ol class="text-lg text-gray-300 list-decimal list-inside space-y-2 mb-4">
                            <li>Identify the problem you are trying to solve. You've probably got some ideas about this from your root cause analysis.</li>
                            <li>Create a hypothesis about some action that you think you can take to improve.</li>
                            <li>Decide what you will do to test this hypothesis.</li>
                            <li>Run the experiment.</li>
                            <li>Analyze the results. This includes comparing actual results against expectations, reflecting on learning, and getting feedback.</li>
                            <li>Refine and repeat. This may include modifying the hypothesis or the experiment. When you design the experiment, be clear about the following points:</li>
                        </ol>
                        <ul class="text-lg text-gray-300 list-disc list-inside space-y-2">
                            <li>What are you trying to learn?</li>
                            <li>How will you measure success?</li>
                            <li>How soon can you get feedback?</li>
                        </ul>
                    </div>

                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-4">
                        When you design the experiment, you also want to consider the potential return on investment (ROI) of the experiment. Ideally, the experiment should be reasonably small, so you can minimize the investment and get feedback sooner. The experiment should also provide sufficient value. The low-hanging fruit may be fast and easy to pick, but you may get less return from it. The higher-value things may take more investment, time, and energy.
                    </p>

                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-4">
                        There is no one right answer. You have to consider your team's unique pain points and unique needs. You have to get creative about breaking down the big stuff into smaller experiments of higher value. By doing so, you can improve iteratively and incrementally.
                    </p>

                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-4">
                        Now you know where you are—and you know where you want to be. As you start identifying experiments to run in an effort to move closer to where you want to be, create an improvement backlog. Order these items and begin.
                    </p>

                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-4">
                        In the same way that Scrum uses an empirical approach to solve complex problems and deliver valuable products, you can use an empirical approach to solve complex problems and maximize the benefits of Scrum. You can do this at the Scrum Team level and at other levels of the organization beyond the Scrum Team. For an individual Scrum Team, this cycle of continuous improvement is already built into the cadence of a Sprint and the use of a Sprint Retrospective to inspect and adapt as a Scrum Team. In addition, it is up to each Scrum Team to determine the amount of time that needs to be devoted to improvement each Sprint and how to organize and validate the improvements made each Sprint.
                    </p>

                    <div class="bg-gray-800 rounded-lg p-6 mb-6">
                        <h3 class="text-2xl font-semibold text-white mb-4">Success or Failure?</h3>
                        <p class="text-lg text-gray-300 mb-4">
                            Is it possible for a success to be a failure? Is it possible for a failure to be a success? You may have noticed that many of the Business Agility assessment questions in Appendix A deal with outcomes (e.g., value, quick delivery). Although outcomes are most important, behaviors can also be important when they help build a team's capabilities.
                        </p>
                        <p class="text-lg text-gray-300 mb-4">
                            You cannot control all of the variables in complex work and the unpredictable environmental conditions around you. If you could, then you would plan everything out in advance, follow that plan, and obtain guaranteed results. In the messy real world, however, you may do all the "right things" and still not get the desired outcomes. This is why it is important to look at behaviors as well.
                        </p>
                        <p class="text-lg text-gray-300">
                            As you analyze the results of your experiments or improvement steps, consider both outcomes and behaviors, especially their trends over time. For example, consider the situation in which a Development Team uncovers major technical challenges with a new integration. The Development Team started this work on the first day of the Sprint because team members knew it would be more challenging and had previously learned the hard way that they should tackle the riskier items sooner. They swarmed. They informed the Product Owner of the situation and worked together to break the work down smaller. Ultimately, though, they didn't get to "<a href="/donedone" class="text-blue-400 underline hover:text-blue-300">Done</a>."
                        </p>
                    </div>

                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-4">
                        In this example, there is a clear failure: The team does not have a "<a href="/donedone" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">Done</a>" Increment. Yet there is also a success: The team applied learning from their previous experience and did the best they could with what they knew at the time. They collaborated, negotiated, and adapted throughout the Sprint. The key is to find new learning to do even better next time. Perhaps the team will decide to adjust how they do Product Backlog refinement to break items down in a different way. Maybe they will identify a skill gap to address. Maybe they will decide to change their development practices or tools.
                    </p>

                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-4">
                        Ultimately, there are two questions to ask:
                    </p>
                    <ul class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 list-disc list-inside space-y-2 mb-4">
                        <li>Did we do the best we could with what we knew at the time?</li>
                        <li>How can we do better?</li>
                    </ul>

                    <div class="bg-gray-800 rounded-lg p-6 mb-6">
                        <h3 class="text-2xl font-semibold text-white mb-4">Summary</h3>
                        <p class="text-lg text-gray-300 mb-3">
                            The seven key improvement areas we focus on—an agile mindset, empiricism, teamwork, team process, team identity, product value, and organization—provide a lens through which you can inspect your team's ability to achieve its goals and find ways to improve.
                        </p>
                        <p class="text-lg text-gray-300 mb-3">
                            By looking for underlying root causes, running experiments to try to improve, and then inspecting and adapting, you can gradually, consistently, and continuously improve your ability to achieve better results.
                        </p>
                        <p class="text-lg text-gray-300">
                            The seven key areas also provide a lens through which you can observe outcomes and behaviors. You can look for underlying root causes, peeling the onion. This lens creates focus and clarity so that you can reflect and take intentional action.
                        </p>
                    </div>

                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-4">
                        You improve empiricism by employing empiricism. You must create transparency about the desired outcomes of the improvements and regularly inspect and adapt your way toward maximizing the benefits of Scrum.
                    </p>

                    <div class="bg-blue-50 dark:bg-blue-900/20 rounded-lg p-6 border border-blue-200 dark:border-blue-800">
                        <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">Call to Action</h3>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-4">
                            Review your notes from your self-assessment questions and ratings and consider the following points:
                        </p>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-4">
                            What do you notice about the data? What trends do you see?
                        </p>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-4">
                            What new insights did you gain from this assessment?
                        </p>
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-4">
                            Using what we have discussed in this chapter for guidance, hold a collaborative discussion with your Scrum Team to take the following steps:
                        </p>
                        <ol class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 list-decimal list-inside space-y-2">
                            <li>Identify the top two or three pain points.</li>
                            <li>For each one, identify possible root causes.</li>
                            <li>Choose two or three root causes to address.</li>
                            <li>Create an ordered list of the first improvements you want to implement. For each of these "experiments," be sure to clarify expected outcomes and how you will measure results.</li>
                            <li>Begin.</li>
                        </ol>
                    </div>
                </div>

                <!-- Footer section -->
                <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 border border-gray-200 dark:border-gray-700 mt-8">
                    <p class="text-lg text-gray-700 dark:text-gray-300">
                        <a href="{{ asset('storage/assets/improvingscrum.pdf') }}" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">
                            To download a pdf of this page click here
                        </a>
                    </p>
                    <p class="text-lg text-gray-700 dark:text-gray-300">
                        <a href="{{ asset('storage/assets/masteringprofessionalscrumassessment.pdf') }}" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">
                            To download the assessment click here
                        </a>
                    </p>
                    <p class="text-lg text-gray-700 dark:text-gray-300 mt-4">
                        PMWay thanks: <i>Mastering Professional Scrum 2019</i>. This is truly awesome work y'all!
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/interactjs/dist/interact.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.5/dist/js.cookie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/ableplayer@4.3.21/build/ableplayer.min.js"></script>
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

</section>