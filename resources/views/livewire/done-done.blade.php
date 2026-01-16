{{-- resources/views/livewire/done-done.blade.php --}}
<div>
    <div class="max-w-6xl mx-auto px-4 py-8">
        <h1 class="text-4xl font-semibold text-gray-900 dark:text-white mb-8">
            Done Done: It ain't over 'till it's over!
        </h1>

        <hr class="border-gray-300 dark:border-gray-600 mb-6">

        <div class="space-y-6">
            {{-- Introduction --}}
            <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">
                    In the Scrum.org Headquarters there is a picture of Ken Schwaber - one of the founders of Scrum - pointing at a sticky saying "Done." This picture underscores the most essential rule in Scrum: create "Done" software every Sprint.
                </p>

                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">
                    But many teams struggle with this rule. It is tempting to fall into "shades of Done." An increment is considered "Done" by the Development Team, but requires further testing and stabilization in the next Sprint. Or work is considered "Done" by the Development Team, but the install package still needs to be created. Or work is considered "Done," but acceptance testing hasn't been done yet.
                </p>

                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300">
                    But "Done" doesn't support adjectives like "nearly," "pretty much" or "almost." An increment is "Done" or it isn't - there is no gray area. And there is a very powerful, compelling reason behind this: the Scrum Framework only helps to reduce the risk of wasting money and effort when you deliver "Done" software <em class="font-semibold">every</em> Sprint.
                </p>

                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mt-4">
                    Essentially Done Software is a new version of your product that is, or with the proverbial press of a button, can be, released to users which can be used by them and which is valuable to them!
                </p>

                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mt-4 font-semibold">
                    If you are unable to deliver a "Done" increment during a Sprint, you are not doing Scrum!
                </p>

                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mt-4">
                    This is clearly explained in the image directly below. Now click the image to see what happens if this problem continues sprint after sprint.
                </p>
            </div>

            {{-- Main Image --}}
            <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-6 text-center">
                <a href="/scrumrca#indexc" title="Click the image to find out more about the 7 Dysfunctional Scrum Types">
                    <img
                            alt="Done and Undone Scrum"
                            class="img-fluid rounded-lg mx-auto dark:bg-white p-2 cursor-pointer"
                            src="{{ asset('storage/images/doneandundone.jpg') }}"
                            onmouseover="this.src='{{ asset('storage/images/undonescrum.jpg') }}'"
                            onmouseout="this.src='{{ asset('storage/images/doneandundone.jpg') }}'"
                    >
                </a>
                <p class="text-lg text-gray-700 dark:text-gray-300 mt-4 italic">
                    <i>Click here for the 7 types of Scrum Dysfunctions of which Undone Scrum is one</i>
                </p>
            </div>

            {{-- Defining Done Section --}}
            <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">
                    Defining "Done"
                </h2>

                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">
                    What constitutes "Done" depends greatly on context. Building a website for an external customer will require different work then when you're working with different Scrum Teams on mission-critical software for internal users. It depends on the quality guidelines that already exist within your organization, how critical the software is to the business, the level of involvement of users, the technologies in use and many other factors.
                </p>

                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">
                    Suppose that you are building a new feature for your product as part of the current Sprint. Building this feature requires a workflow of all sorts of tasks, from writing code to creating unit tests, from creating a design to testing it on mobile devices and from testing it with users to integrating it with work done by other teams. And ultimately deploying it to your users. Necessarily, this requires all sorts of skills in the Development Team. And it requires an effective workflow to do all this within a single Sprint.
                </p>

                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4 mt-6">
                    It may be tempting to limit "Done" to what a Development Team can actually do
                </h3>

                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">
                    Many teams starting out with Scrum are unable to do this because of technical and organizational impediments. It may be tempting to limit the definition of "Done" to what a Development Team can <em class="font-semibold">actually achieve</em> in a Sprint. Thus, they may end up defining "Done" as no more than:
                </p>

                <ul class="list-disc list-inside space-y-2 text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">
                    <li>The code has been peer reviewed by another developer in the team;</li>
                    <li>Unit tests have been written and are passing for the item;</li>
                    <li>The code is merged and has been checked into the develop-branch;</li>
                </ul>

                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300">
                    More specifically, the Development Team will move items to "Done" on their Scrum Board when it meets these criteria.
                </p>
            </div>

            {{-- Done and Undone Work Section --}}
            <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">
                    "Done" and Undone Work
                </h2>

                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">
                    This Development Team may think they are delivering a "Done" - increment every Sprint. After all, they can tick all the boxes in their definition of "Done." But are they really? But with a definition of "Done" that is mostly focused on working code, the resulting software will be hard to review by the Product Owner. Any feedback on this intermediate result will be incomplete at best. A number of things may happen in the next Sprints, <em class="font-semibold">after</em> the team considers work "Done," when other steps in the workflow are completed. Some examples are:
                </p>

                <ul class="list-disc list-inside space-y-2 text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">
                    <li>When reviewing the feature, the Product Owner determines that an essential element promised to stakeholders is missing, requiring changes during the next Sprint;</li>
                    <li>While testing the feature, a user discovers a breaking bug that needs to be fixed during the next Sprint;</li>
                    <li>Integration of the code with work done by another team for the same product fails, requiring the Development Team to resolve complicated merge conflicts during the next Sprint;</li>
                    <li>The feature doesn't scale correctly on some mobile devices, requiring the Development Team to fix the feature in the next Sprint;</li>
                    <li>When trying to deploy the feature to production, the install fails. After investigation during the next Sprint, the Development Team discovers that the issue is caused by a missing dependency;</li>
                    <li>A security scan uncovers that the feature is susceptible to SQL Injection, requiring the Development Team to fix this during the next Sprint;</li>
                    <li>After deploying the feature, it is discovered that latency on the network is too high to make the features work well for users;</li>
                    <li>Because of missing support documentation, the Development Team receives several support calls about the feature that are easy to answer, but nonetheless take time away from the current Sprint;</li>
                    <li>The feature turns out to be unusable by people with (for example) poor eyesight - an important group of users - requiring tweaks in the current Sprint.</li>
                </ul>

                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">
                    Fundamentally, this work is not <em class="font-semibold">discovered</em> during the current Sprint, but during future Sprints. This makes them examples of <strong class="font-bold">undone work</strong>; work that is required to truly complete an item on the Product Backlog and is not covered by the definition of "Done." Undone work has four consequences:
                </p>

                <ol class="list-decimal list-inside space-y-2 text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">
                    <li>It <strong class="font-bold">draws time and energy</strong> from the Development Team away from the focus and work in future Sprints. The bigger the gap between what a team defines as "Done" and what is actually needed - the more disruptions and interruptions will happen in future Sprints due to undone work. It will become progressively harder for the Scrum Team to make any kind of meaningful forecasts about work in future Sprints;</li>
                    <li>Because undone work is not discovered during the current Sprint, it is unclear and unpredictable how much of it will occur. This <strong class="font-bold">decreases the transparency of the Increment</strong> and the features being developed. More specifically, it will be harder to answer questions from stakeholders about whether or not a feature is "Done";</li>
                    <li>Scrum Teams fool themselves into believing that they are successful by <strong class="font-bold">"staying busy."</strong> They pull a lot of work into their Sprint Backlogs, their velocity may be excellent, everyone is working very hard all the time. But at the end of a Sprint, there is no potentially releasable product increment;</li>
                    <li>The <strong class="font-bold">risk of software development</strong> remains high as both the state of the Increment and its features, but also the amount of undone work remaining, is not transparent. We still can't validate assumptions about features or the product as a whole because it isn't really "Done."</li>
                </ol>

                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300">
                    Taken together, this will erode trust in the Scrum Team over time as stakeholders and management lose confidence in what the team - and Scrum - can deliver.
                </p>

                <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-6 mt-4 border-l-4 border-blue-500">
                    <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 italic">
                        The bigger the gap between what a team defines as "Done" and what is actually needed - the more disruptions and interruptions will happen in future Sprints due to undone work.
                    </p>
                </div>
            </div>

            {{-- Examples Section --}}
            <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">
                    Three examples to illustrate the point
                </h2>

                <ul class="list-disc list-inside space-y-4 text-lg leading-relaxed text-gray-700 dark:text-gray-300">
                    <li>I recently witnessed a Scrum Team that had spent months customizing software for complicated machinery. They involved users from the very start and worked hard to release "Done" software every Sprint. For practical reasons, they decided not to roll out to the actual machinery, effectively keeping the software running in a pre-production environment. When they did roll out, they discovered that hardware issues caused so many issues in the software that users reverted to the old software. After months of work, the team was confronted with the possibility that the project had to be cancelled altogether - effectively negating the investments up to that point;</li>
                    <li>I once participated in a Scrum Team that was building a product that was supposed to change the market we were operating in at the time. The Product Owner was wholly convinced of this and continued to pour money into its development, spurred on by positive feedback from the internal organization. But the product was never exposed to actual users throughout the first year of development. When it was finally deployed, the expected demand for the product didn't pan out, effectively wasting the investment;</li>
                    <li>We recently spend a week with a Development Team to build the website for The Liberators. Although very small by comparison, we noticed how both the Product Owner and stakeholders could only provide useful feedback to Product Backlog Items that were really "Done." It was hard to give feedback to any of the earlier stages - from wire-frames to designs, and from looking over the shoulder of a developer creating pages to acceptance versions with placeholder texts and images;</li>
                </ul>

                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mt-4">
                    Not only do these examples illustrate how limiting "Done" reduces your ability to minimize the risk of complex work, it also illustrates how releasing to users early and often is the best way to mitigate risk. It also illustrates clearly how defining "Done" should be a collaboration between Development Teams and Product Owners, integrating both technical and business considerations.
                </p>

                <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-6 mt-4 border-l-4 border-blue-500">
                    <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 italic">
                        A complete definition of "Done" is your most powerful risk detector for complex work
                    </p>
                </div>
            </div>

            {{-- Risk Detector Section --}}
            <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">
                    Definition of Done as a "risk detector"
                </h2>

                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300">
                    In Scrum, a complete definition of "Done" is your most powerful risk detector for complex work. It helps you reduce the risk of undone work by making transparent all that is needed to create "Done" increments <em class="font-semibold">every</em> Sprint. It will also make very transparent all the impediments that are getting in the way of achieving this goal.
                </p>
            </div>

            {{-- Now What Section --}}
            <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">
                    Now what?
                </h2>

                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">
                    Obviously, creating "Done" increments <em class="font-semibold">every</em> Sprint is a tall order for any Scrum Team. But there are things that help:
                </p>

                <ul class="list-disc list-inside space-y-4 text-lg leading-relaxed text-gray-700 dark:text-gray-300">
                    <li><strong class="font-bold">Maintain a ruthless focus on "Done" software</strong>. If you can't deliver a potentially releasable increment in a Sprint, don't fill the Sprint Backlog with work to give the impression that you're creating value. Instead, populate the Sprint Backlog with whatever is needed to create potentially releasable increments. This may involve setting up infrastructure, learning skills or technologies and removing organizational impediments;</li>
                    <li><strong class="font-bold">Make the gap between what you can do and what is needed for "Done" transparent</strong>. Don't go the easy way and limit your definition of "Done" to what you can realistically do. Instead, identify what you <em class="font-semibold">should be doing</em> to achieve a "Done" increment and offset it with what you <em class="font-semibold">are currently capable of doing</em>. List all the things getting in the way as impediments that need to be resolved, and keep reminding everyone involved - in particular management - that you will only really start reducing risks when the gap decreases;</li>
                    <li><strong class="font-bold">Make it smaller & simpler</strong>. The simplest truth in Scrum, and everything Agile, is to make it smaller and simpler. This is why refinement is such an important activity in the Scrum Framework. If its impossible to go through all the required steps for a piece of software, make it smaller and focus on getting those smaller bits through the entire pipeline in one Sprint. Less really is more with Scrum;</li>
                    <li><strong class="font-bold">It's not about Scrum, but about reducing risk and maximizing value and making impediments transparent</strong>. It might be tempting to throw your hands in the air and consider what Scrum asks of you impossible. But in the world of complex work - which software development is - an empirical process (like Scrum) is the best tool we have to reduce risks and to maximize the value we can deliver to stakeholders. Furthermore, it is the best way to make everything holding you back - like team composition, organizational procedures and bottlenecks - transparent and (therefore) resolvable. And yes, this transparency should hurt.</li>
                </ul>
            </div>

            {{-- Hard Truth Section --}}
            <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">
                    A hard truth
                </h2>

                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">
                    The hard truth is that if you are unable to deliver a "Done" increment (at least) every Sprint, you aren't there yet. You can congratulate yourself on your journey towards Scrum, but don't fool yourself by calling it Scrum. Because your ability to detect risks is still very limited, you will see very little benefits of the empirical process that the Scrum Framework is all about. But the good news is that keeping a ruthless focus on creating "Done" software every Sprint will make everything getting in the way of this highly visible.
                </p>

                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300">
                    <a href="https://medium.com/the-liberators/why-scrum-requires-completely-done-software-every-sprint-f7fa3ca33286" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">Thanks to the Liberators for the above</a>. Excellent work guys.
                </p>
            </div>

            {{-- Collapsible Section --}}
            <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 border border-gray-200 dark:border-gray-700 text-center">
                <button
                        id="doneDoneToggle"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded transition-colors"
                        onclick="toggleDoneDone()"
                >
                    Done Done
                </button>

                <div id="doneDoneContent" class="mt-6 hidden">
                    <div class="bg-white dark:bg-gray-800 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                        <h5 class="text-xl font-semibold text-gray-900 dark:text-white mb-4 text-center">
                            It ain't over 'till its over!
                        </h5>
                        <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                            <img alt="Done Done" class="img-fluid rounded-lg mx-auto dark:bg-white p-2" src="{{ asset('storage/images/donedone.jpg') }}">
                        </div>
                        <p class="text-lg text-gray-700 dark:text-gray-300 mt-4 text-center">
                            <a href="/productincrement" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">Click here for information about the Product Increment.</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Toggle function for Done Done section
        function toggleDoneDone() {
            const content = document.getElementById('doneDoneContent');
            const button = document.getElementById('doneDoneToggle');

            content.classList.toggle('hidden');

            if (content.classList.contains('hidden')) {
                button.textContent = 'Done Done';
            } else {
                button.textContent = 'Hide Done Done';
            }
        }

        // Handle image hover effects
        document.addEventListener('DOMContentLoaded', function() {
            const images = document.querySelectorAll('img[onmouseover]');
            images.forEach(img => {
                // Ensure PNG images have white background in dark mode
                if (img.src.includes('.png')) {
                    img.classList.add('dark:bg-white', 'p-2');
                }
            });
        });
    </script>
</div>