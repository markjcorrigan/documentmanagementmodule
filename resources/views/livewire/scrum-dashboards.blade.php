{{-- resources/views/livewire/scrum-dashboards.blade.php --}}

{{-- Load ImageMapResizer ONCE for all maps in this component --}}
@once
    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/image-map-resizer/1.0.10/js/imageMapResizer.min.js"></script>
    @endpush
@endonce

<div>
    <div class="max-w-6xl mx-auto px-4 py-8">
        <h1 class="text-4xl font-semibold text-gray-900 dark:text-white mb-8 text-center">
            Scrum Dashboards
        </h1>

        <div class="space-y-12">
            {{-- Scrum Method Video Section --}}
            <section class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                <h2 class="text-3xl font-semibold text-gray-900 dark:text-white mb-6 text-center">
                    Scrum Method in 6 minutes
                </h2>

                <div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 p-4 rounded-lg border border-gray-200 dark:border-gray-700">
                    <video controls
                           src="{{ asset('movies/scrumin6mins.mp4') }}" type="video/mp4"
                           poster="{{ asset('storage/images/scruminsixmins.png') }}"
                           class="w-full rounded-lg"
                           playsinline>
                        Sorry, your browser doesn't support embedded videos
                    </video>
                </div>
            </section>

            {{-- Scrum Values Section --}}
            <section class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                <h2 class="text-3xl font-semibold text-gray-900 dark:text-white mb-6 text-center">
                    Scrum Values in 2 minutes
                </h2>

                <div class="space-y-6">
                    <div class="bg-white dark:bg-white p-4 rounded-lg border border-gray-300 dark:border-gray-400 shadow-sm">
                        <img alt="Scrum Values" class="w-full h-auto rounded"
                             src="{{ asset('storage/images/scrumvaluesnew.png') }}">
                    </div>

                    <div class="bg-white dark:bg-white p-4 rounded-lg border border-gray-300 dark:border-gray-400 shadow-sm">
                        <img alt="Scrum Values" class="w-full h-auto rounded"
                             src="{{ asset('storage/images/scrumvalues.png') }}">
                    </div>

                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 text-center">
                        The version below promotes the addition of <b>Visibility</b> (transparency)<br>and the
                        importance of maintaining a <b>Sense of humor</b>
                    </p>

                    <div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 p-4 rounded-lg border border-gray-200 dark:border-gray-700">
                        <video controls
                               src="{{ asset('movies/scrumvalues.mp4') }}" type="video/mp4"
                               poster="{{ asset('storage/images/sevenscrumvalues.png') }}"
                               class="w-full rounded-lg"
                               playsinline>
                            Sorry, your browser doesn't support embedded videos
                        </video>
                    </div>
                    <br>
                    <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden mb-6">
                        <!-- Clickable Header -->
                        <button
                                type="button"
                                onclick="this.nextElementSibling.classList.toggle('hidden'); this.querySelector('svg').classList.toggle('rotate-180')"
                                class="w-full px-6 py-4 flex items-center justify-between bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors"
                        >
                            <h3 class="text-2xl font-semibold text-gray-900 dark:text-white">The Scrum Values</h3>
                            <svg class="w-6 h-6 text-gray-600 dark:text-gray-400 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                        <!-- Collapsible Content -->
                        <div class="hidden px-6 py-8">
                            <!-- Introduction -->
                            <div class="mb-12">
                                <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mb-6">Agile projects are not successful if the process attached to the Agile method is adhered to mechanically. The success of Agile projects lies in the quality of the team, in the way the team thinks and acts at an individual level. The way in which team members think and act is based on a common set of values. It looks simple enough. However, do we actually know how to interpret these values correctly?</p>

                                <p class="text-lg text-gray-700 dark:text-gray-300 mb-4">Classic project management derives its success from the quality of the process involved, from the rigorous planning and from the management of the activities involved. If applied where it fits best and if led by a manager who knows how to handle processes, the process has great chances of success.</p>

                                <p class="text-lg text-gray-700 dark:text-gray-300 mb-4">Scrum-based projects will not be successful if only the process or if only the Scrum „mechanics", which is quite Spartan, is applied. The key to success in this case is the quality of the team, and the way in which each person thinks and acts. The way in which team members think and act is based on adhering to common Scrum values. It sounds simple enough: it is easy to read the seven words. However, using the seven words in practice is very hard. So do we truly understand these values?</p>
                            </div>

                            <!-- The Challenge -->
                            <div class="mb-12">
                                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6 border-b border-gray-200 dark:border-gray-700 pb-3">The Challenge of Finding Values</h2>

                                <p class="text-lg text-gray-700 dark:text-gray-300 mb-4">As soon as an Agile team is formed, one of the first questions that requires an answer is: What are our values? How can a team, especially a newly-formed team, give a satisfactory answer to this extremely important question? How can the team find the shortest path which leads to that set of values and which guides team members towards creating a suitable environment for collaboration and self-management?</p>

                                <p class="text-lg text-gray-700 dark:text-gray-300 mb-4">Some will say that it all comes down to the work experience of team members. This holds true if at least some of them have previously had the opportunity to collaborate. The past experience team members have had with Agile plays an important part. It is easier if team members worked with Scrum before. However, if the team is made up of people who have never worked together before and whose prior experience with Agile is limited, the answer is not that easy to find. So, what can be done? How can an Agile leader or coach help them?</p>

                                <p class="text-lg text-gray-700 dark:text-gray-300">Scrum values are an excellent guide for this challenge. It is very hard to work with Scrum if team members do not embrace these values, right? However, do we know how to interpret these values correctly, so that they make sense for the members of a new team?</p>
                            </div>

                            <div class="bg-white dark:bg-white p-4 rounded-lg border border-gray-300 dark:border-gray-400 shadow-sm">
                                <img alt="Scrum Values" class="w-full h-auto rounded"
                                     src="{{ asset('storage/images/sevenscrumvalues.png') }}">
                            </div>
                            <br> <br>

                            <!-- The Seven Values -->
                            <div class="mb-12">
                                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6 border-b border-gray-200 dark:border-gray-700 pb-3">Understanding the Seven Values</h2>

                                <p class="text-lg text-gray-700 dark:text-gray-300 mb-8">Let us quickly have a look at Scrum values: <span class="font-semibold text-blue-600 dark:text-blue-400">Respect, Courage, Focus, Commitment and Openness</span>. Two other values were later added to the list: <span class="font-semibold text-blue-600 dark:text-blue-400">Visibility and Sense of Humour</span>. Taken one by one, all seven values seem easy to understand. What are the relations among these values? Why were these values chosen in the detriment of other values? Let us try to discover their deeper meaning together.</p>

                                <!-- Respect -->
                                <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 mb-6 border border-gray-200 dark:border-gray-700">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Respect</h3>

                                    <p class="text-lg text-gray-700 dark:text-gray-300 mb-4">Respect is the most important value, because it underpins all other values. Why does an Agile team need respect? Respect is essential when it comes to people and the interactions among them, and it is less essential when it comes to processes and tools. In an organization where processes are well-established and the instruments are compulsory and standardized, respect is welcome, but not compulsory. Such an organization can function relatively well, by following procedures, and not by necessarily respecting the people who perform the processes. Each person carries out a role according to the process where they are included. Each person respects the process, and the process ensure success if it is efficient and practiced under strict discipline and supervision.</p>

                                    <p class="text-lg text-gray-700 dark:text-gray-300">However, in Scrum, Respect for the others is fundamental. Without respect, the productive relations among team members are impossible. A Junior's voice or an introvert's voice will never be heard, if they are not respected. Their ideas will always be ignored or – even worse – will be treated ironically or sarcastically. As time goes by, these people will not even try to express their opinions anymore, their commitment will dwindle and their personal development will be blocked. How can you work side by side with a person that does not respect you? The results will be mediocre, because, in Scrum, the people ensure the success, not the process.</p>
                                </div>

                                <!-- Courage -->
                                <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 mb-6 border border-gray-200 dark:border-gray-700">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Courage</h3>

                                    <p class="text-lg text-gray-700 dark:text-gray-300 mb-4">However, even if there is respect among team members, this does not automatically mean that each will express themselves freely. This is because Respect must be coupled with Courage. If there is respect, each team member must find the courage to speak freely, without fear, even if, sometimes, what they say may lack value or truth. We are all prone to error. If there is respect, each team member must have the courage to put their vulnerabilities on the table, without the fear of being ridiculed. No matter how senior we are, there are many things that we do not know and one needs courage to admit that this is so. No matter how much expertise we hold, sometimes we make mistakes and they lead to errors in the products that we work on. The courage to admit to our mistakes is built on the respect that others give us. We are all aware that nobody is perfect.</p>

                                    <p class="text-lg text-gray-700 dark:text-gray-300">And, perhaps, the most difficult proof of courage each team member must show is accepting that one's performance is the team's performance, or accepting that the value of one's work is the same as the success value of the entire team. In Scrum, there is no room for stars or heroes. The ultimate proof of courage is when you take responsibility for the poorer results of the team, even when you believe you did everything that was up to you or even when you out performed yourself, but your effort was not enough to reach success.</p>
                                </div>

                                <!-- Visibility -->
                                <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 mb-6 border border-gray-200 dark:border-gray-700">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Visibility</h3>

                                    <p class="text-lg text-gray-700 dark:text-gray-300 mb-4">Courage goes hand in hand with Visibility, which is also based on respect. Being part of an Agile team is not about admitting to your limits or your mistakes, but about making them visible to everybody, even before the team members discover them. Being part of an Agile team is about the sincerity of making your work public, of making your effort and your results visible, when they are successful and even when they are less spectacular.</p>

                                    <p class="text-lg text-gray-700 dark:text-gray-300">Visibility must factor in the respect each team member deserves. When things go smoothly and when things go rough, visibility must showcase not the individual's, but the team's merits and the team's weaknesses. Within the team, visibility entails that the activity of each team member is totally transparent. There are no taboos. There is no private property.</p>
                                </div>

                                <!-- Commitment -->
                                <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 mb-6 border border-gray-200 dark:border-gray-700">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Commitment</h3>

                                    <p class="text-lg text-gray-700 dark:text-gray-300 mb-4">In addition to visibility and courage, an Agile team must show Commitment, the true, unconditional devotion to the goals the team adheres to. The personal agenda must come second, and the team goals must come first. How can this be achieved if there is no respect among team members?</p>

                                    <p class="text-lg text-gray-700 dark:text-gray-300">However, commitment is not only the personal promise that individuals will work hard in future projects. It is also the duty of holding all other team members accountable for their contributions. If you do not care that a colleague is not doing their best, then you have already broken the commitment.</p>
                                </div>

                                <!-- Openness -->
                                <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 mb-6 border border-gray-200 dark:border-gray-700">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Openness</h3>

                                    <p class="text-lg text-gray-700 dark:text-gray-300">When courage and visibility are based on respect, the team reaches Openness. Being open entails the courage of accepting the other people's opinions, of embracing new ideas and of trying out new things. Being open entails accepting visibility as a means of communicating honestly, within the team and outside the team. Being open means that you understand your personal value, with its merits and its limits, and you are ready to learn something new and useful from anyone, anytime.</p>
                                </div>

                                <!-- Focus -->
                                <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 mb-6 border border-gray-200 dark:border-gray-700">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Focus</h3>

                                    <p class="text-lg text-gray-700 dark:text-gray-300">Visibility and commitment give a team the ability to Focus on what is essential. The team and each team member can focus on what really matters, namely customer satisfaction, if the team is committed and has a clear picture of its goals. The goals of each sprint, of each release cannot be achieved unless each team member and the team, as a whole, understand the progress of their work clearly and correctly, and unless members devote their entire skill set towards achieving these goals.</p>
                                </div>

                                <!-- Sense of Humour -->
                                <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 mb-6 border border-gray-200 dark:border-gray-700">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Sense of Humour</h3>

                                    <p class="text-lg text-gray-700 dark:text-gray-300 mb-4">Last, but not least, commitment and courage must trigger a Sense of Humour in each team member. The authentic pleasure of working together with other people in a relaxed environment, where jokes and laughter are part of the daily work, is refreshing.</p>

                                    <p class="text-lg text-gray-700 dark:text-gray-300">Seriousness is the last refuge of mediocrity, some say. Self-irony keeps your alert and nurtures the will to be better with each day that goes by. Self-irony is the distinctive sign of a mind which is courageous enough to admit to its own imperfections and which is always determined to learn something new.</p>
                                </div>
                            </div>

                            <!-- Putting It Into Practice -->
                            <div class="mb-12">
                                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6 border-b border-gray-200 dark:border-gray-700 pb-3">Putting It Into Practice</h2>

                                <p class="text-lg text-gray-700 dark:text-gray-300 mb-4">Many times, Scrum teams, the new ones especially, express their values as a chain of nouns. The values mentioned above are often part of this chain. If we interpret these values as I suggested in this paper, by linking them to one another, it is clear that these values do not refer to the expectations that each team member has from the others, but to the personal commitment or stand taken in front of the entire team.</p>

                                <p class="text-lg text-gray-700 dark:text-gray-300 mb-4">An Agile team that works with Scrum must be made up of people that share the behavior described above. We know that it is hard to find people who possess all these qualities and that nobody is perfect. For this reason, these values must not be seen as Procust's bed, as a strict benchmark for evaluating how well-suited people are for Scrum. These values should be the target professional behavior for team members, their pledge of allegiance which they must work towards every day.</p>

                                <p class="text-lg text-gray-700 dark:text-gray-300">We do not ask for respect, courage, sense of humour, commitment, focus, visibility and openness only from the others. We must first promise that we will promote these values ourselves. Maybe, with such a frame of mind at hand, it will come natural for every Scrum advocate to take the following pledge with oneself:</p>
                            </div>

                            <!-- The Pledge -->
                            <div class="bg-blue-50 dark:bg-blue-900/20 border-l-4 border-blue-600 dark:border-blue-400 rounded-r-lg p-6">
                                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">The Scrum Values Pledge</h2>

                                <p class="text-lg text-gray-800 dark:text-gray-200 mb-4 italic leading-relaxed">Through <span class="font-semibold text-blue-700 dark:text-blue-300">Respect</span> for my colleagues, through <span class="font-semibold text-blue-700 dark:text-blue-300">Courage</span> and <span class="font-semibold text-blue-700 dark:text-blue-300">Visibility</span>, I will show the <span class="font-semibold text-blue-700 dark:text-blue-300">Openness</span> that each Agile advocate must manifest.</p>

                                <p class="text-lg text-gray-800 dark:text-gray-200 mb-4 italic leading-relaxed">Through <span class="font-semibold text-blue-700 dark:text-blue-300">Respect</span> for my colleagues, through the <span class="font-semibold text-blue-700 dark:text-blue-300">Visibility</span> of my work and through my <span class="font-semibold text-blue-700 dark:text-blue-300">Commitment</span>, I will exercise absolute <span class="font-semibold text-blue-700 dark:text-blue-300">Focus</span> towards the team's goals, to make my team successful.</p>

                                <p class="text-lg text-gray-800 dark:text-gray-200 italic leading-relaxed">Out of <span class="font-semibold text-blue-700 dark:text-blue-300">Respect</span> for my colleagues, through <span class="font-semibold text-blue-700 dark:text-blue-300">Courage</span> and <span class="font-semibold text-blue-700 dark:text-blue-300">Commitment</span>, I will maintain my <span class="font-semibold text-blue-700 dark:text-blue-300">Sense of Humour</span> as a state of mind I must never separate from, no matter how many hardships I might encounter.</p>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
            </section>

            {{-- Scrum Principles, Processes and Aspects --}}
            <section class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                <h2 class="text-3xl font-semibold text-gray-900 dark:text-white mb-6 text-center">
                    <a href="{{ asset('scrummanual/sbok4.pdf#page=26') }}"
                       class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">
                        Scrum Principles, Processes and Aspects
                    </a>
                </h2>

                <div class="bg-white dark:bg-white p-4 rounded-lg border border-gray-300 dark:border-gray-400 shadow-sm">
                    <img class="w-full h-auto rounded" title="" alt="PrinciplesAspectsProcesses"
                         src="{{ asset('storage/images/principlesaspectsprocesses.png') }}">
                </div>
            </section>

            {{-- Scrum Principles Section with Image Map --}}
            <section class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                <h2 class="text-3xl font-semibold text-gray-900 dark:text-white mb-6 text-center">
                    <a href="{{ asset('scrummanual/sbok4.pdf#page=28') }}"
                       class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">
                        Scrum Principles
                    </a>
                </h2>

                <div wire:ignore>
                    <map name="ImgMap3" id="ImgMap3">
                        <area alt="Empirical Process Control"
                              coords="263,61,261,177,324,212,459,138,428,91,356,45,301,29,257,23,264,76"
                              href="{{ asset('scrummanual/sbok4.pdf#page=41') }}"
                              shape="poly"
                              title="Empirical Process Control">
                        <area alt="Self-organization"
                              coords="459,140,324,215,327,288,463,369,486,310,492,240,474,161"
                              href="{{ asset('scrummanual/sbok4.pdf#page=46') }}"
                              shape="poly"
                              title="Self-organization">
                        <area alt="Collaboration"
                              coords="325,294,307,310,271,322,262,324,264,481,316,473,382,447,425,417,457,377,462,372,328,289,325,297"
                              href="{{ asset('scrummanual/sbok4.pdf#page=48') }}"
                              shape="poly"
                              title="Collaboration">
                        <area alt="Value Based Prioritization"
                              coords="264,324,238,317,215,308,202,288,65,365,98,408,154,449,206,472,262,479,263,408"
                              href="{{ asset('scrummanual/sbok4.pdf#page=52') }}"
                              shape="poly"
                              title="Value Based Prioritization">
                        <area alt="Time-boxing"
                              coords="63,368,202,286,189,261,194,242,199,221,199,218,64,140,37,212,37,271,44,320"
                              href="{{ asset('scrummanual/sbok4.pdf#page=54') }}"
                              shape="poly"
                              title="Time-boxing">
                        <area alt="Iterative Development"
                              coords="61,143,199,214,223,197,246,182,262,178,259,23,182,40,122,73,82,111,64,138,199,215"
                              href="{{ asset('scrummanual/sbok4.pdf#page=57') }}"
                              shape="poly"
                              title="Iterative Development">
                    </map>

                    <div class="bg-white dark:bg-white p-4 rounded-lg border border-gray-300 dark:border-gray-400 shadow-sm">
                        <img id="principlesImage"
                             class="w-full h-auto rounded"
                             src="{{ asset('storage/images/principles.png') }}"
                             usemap="#ImgMap3"
                             alt="Scrum Principles Diagram - Click on sections to learn more">
                    </div>
                </div>
            </section>

            {{-- Scrum Processes Section with Image Map --}}
            <section class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                <a name="processes"></a>
                <h2 class="text-3xl font-semibold text-gray-900 dark:text-white mb-6 text-center">
                    <a href="{{ asset('scrummanual/sbok4.pdf#page=34markjc@') }}"
                       class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">
                        Scrum Processes
                    </a>
                </h2>

                <div wire:ignore>
                    <map name="ImgMap1" id="ImgMap1">
                        {{-- Initiate Process Group --}}
                        <area alt="Create Project Vision" coords="255,50,414,70" href="{{ asset('scrummanual/sbok4.pdf#page=158') }}"
                              shape="rect" title="#1 Create Project Vision">
                        <area alt="Identify Scrum Master and Stakeholder(s)" coords="255,69,503,88" href="{{ asset('scrummanual/sbok4.pdf#page=164') }}"
                              shape="rect" title="#2 Identify Scrum Master and Stakeholder(s)">
                        <area alt="Form Scrum Team" coords="256,87,410,104" href="{{ asset('scrummanual/sbok4.pdf#page=170') }}"
                              shape="rect" title="#3 Form Scrum Team">
                        <area alt="Develop Epic(s)" coords="257,103,421,124" href="{{ asset('scrummanual/sbok4.pdf#page=177') }}"
                              shape="rect" title="#4 Develop Epic(s)">
                        <area alt="Create Prioritized Product Backlog" coords="255,122,475,144" href="{{ asset('scrummanual/sbok4.pdf#page=185') }}"
                              shape="rect" title="#5 Create Prioritized Product Backlog">
                        <area alt="Conduct Release Planning" coords="257,143,435,161" href="{{ asset('scrummanual/sbok4.pdf#page=193') }}"
                              shape="rect" title="#6 Conduct Release Planning">

                        {{-- Plan and Estimate Process Group --}}
                        <area alt="Create User Stories" coords="256,172,412,192" href="{{ asset('scrummanual/sbok4.pdf#page=204') }}"
                              shape="rect" title="#7 Create User Stories">
                        <area alt="Estimate User Stories" coords="257,193,411,211" href="{{ asset('scrummanual/sbok4.pdf#page=210') }}"
                              shape="rect" title="#8 Estimate User Stories">
                        <area alt="Commit User Stories" coords="257,210,414,231" href="{{ asset('scrummanual/sbok4.pdf#page=215') }}"
                              shape="rect" title="#9 Commit User Stories">
                        <area alt="Identify Tasks" coords="259,229,394,246" href="{{ asset('scrummanual/sbok4.pdf#page=220') }}"
                              shape="rect" title="#10 Identify Tasks">
                        <area alt="Estimate Tasks" coords="259,246,391,264" href="{{ asset('scrummanual/sbok4.pdf#page=225') }}"
                              shape="rect" title="#11 Estimate Tasks">
                        <area alt="Update Sprint Backlog" coords="259,265,402,285" href="{{ asset('scrummanual/sbok4.pdf#page=228') }}"
                              shape="rect" title="#12 Update Sprint Backlog">

                        {{-- Implement Process Group --}}
                        <area alt="Create Deliverables" coords="258,290,399,317" href="{{ asset('scrummanual/sbok4.pdf#page=240') }}"
                              shape="rect" title="#13 Create Deliverables">
                        <area alt="Conduct Daily Standup" coords="258,316,416,335" href="{{ asset('scrummanual/sbok4.pdf#page=248') }}"
                              shape="rect" title="#14 Conduct Daily Standup">
                        <area alt="Refine Prioritized Product Backlog" coords="259,336,468,356" href="{{ asset('scrummanual/sbok4.pdf#page=254') }}"
                              shape="rect" title="#15 Refine Prioritized Product Backlog">

                        {{-- Review and Retrospect Process Group --}}
                        <area alt="Demonstrate and Validate Sprint" coords="260,365,465,386" href="{{ asset('scrummanual/sbok4.pdf#page=263') }}"
                              shape="rect" title="#16 Demonstrate and Validate Sprint">
                        <area alt="Retrospect Sprint" coords="258,387,389,409" href="{{ asset('scrummanual/sbok4.pdf#page=269') }}"
                              shape="rect" title="#17 Retrospect Sprint">

                        {{-- Release Process Group --}}
                        <area alt="Ship Deliverables" coords="259,414,385,436" href="{{ asset('scrummanual/sbok4.pdf#page=279') }}"
                              shape="rect" title="#18 Ship Deliverables">
                        <area alt="Retrospect Release" coords="260,436,398,460" href="{{ asset('scrummanual/sbok4.pdf#page=284') }}"
                              shape="rect" title="#19 Retrospect Release">

                        {{-- Process Group Areas --}}
                        <area alt="Initiate Process Group" coords="77,45,233,165" href="{{ asset('scrummanual/sbok4.pdf#page=156') }}"
                              shape="rect" title="Initiate Process Group">
                        <area alt="Plan and Estimate Process Group" coords="77,168,233,287" href="{{ asset('scrummanual/sbok4.pdf#page=202') }}"
                              shape="rect" title="Plan and Estimate Process Group">
                        <area alt="Implement Process Group" coords="77,290,237,362" href="{{ asset('scrummanual/sbok4.pdf#page=238') }}"
                              shape="rect" title="Implement Process Group">
                        <area alt="Review and Retrospect Process Group" coords="79,361,231,409" href="{{ asset('scrummanual/sbok4.pdf#page=261') }}"
                              shape="rect" title="Review and Retrospect Process Group">
                        <area alt="Release Process Group" coords="79,411,236,465" href="{{ asset('scrummanual/sbok4.pdf#page=277') }}"
                              shape="rect" title="Release Process Group">
                    </map>

                    <div class="bg-white dark:bg-white p-4 rounded-lg border border-gray-300 dark:border-gray-400 shadow-sm">
                        <img id="processesImage"
                             class="w-full h-auto rounded"
                             src="{{ asset('storage/images/scrumdash.png') }}"
                             usemap="#ImgMap1"
                             alt="Scrum Processes Dashboard - Click on processes to learn more">
                    </div>
                </div>
            </section>

            {{-- Scrum Processes Continued --}}
            <section class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6 text-center">
                    <b>Scrum processes (following the processes above as steps in a recipe) forms a flow</b>
                </h3>

                <div class="bg-white dark:bg-white p-4 rounded-lg border border-gray-300 dark:border-gray-400 shadow-sm text-center">
                    <img alt="Scrum Flow" class="w-full h-auto rounded"
                         src="{{ asset('storage/images/scrumflow1.png') }}">
                </div>

                <div class="text-center mt-6">
                    <button class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded transition-colors"
                            type="button"
                            wire:click="$toggle('showScrumFlow')">
                        Scrum Flow with Roles
                    </button>

                    @if($showScrumFlow)
                        <div class="mt-6 bg-gray-800 rounded-lg p-6 border border-gray-700">
                            <div class="text-center">
                                <div class="bg-white dark:bg-white p-4 rounded-lg border border-gray-300 dark:border-gray-400 shadow-sm">
                                    <img alt="" class="w-full h-auto rounded"
                                         src="{{ asset('storage/images/scrumproceswithroles.png') }}">
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <br><br>

                <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 text-center">
                    <a href="{{ asset('storage/images/ProductReleaseSchedule.zip') }}"
                       class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300"
                       title="Click here for a simple reporting template for the Release Schedule">
                        Simple reporting template
                    </a>
                </p>
            </section>

            {{-- Scrum Aspects Section with Image Map --}}
            <section class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                <h2 class="text-3xl font-semibold text-gray-900 dark:text-white mb-6 text-center">
                    <a href="{{ asset('scrummanual/sbok4.pdf#page=30') }}"
                       class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">
                        Scrum Aspects
                    </a>
                </h2>
            </section>

            {{-- Image outside the box --}}
            <div class="my-6" wire:ignore>
                <map name="ImgMap4" id="ImgMap4">
                    <area alt="Organization" coords="584,0,852,109"
                          href="{{ asset('scrummanual/sbok4.pdf#page=60') }}"
                          shape="rect"
                          title="Organization">
                    <area alt="Business Justification" coords="594,109,851,201"
                          href="{{ asset('scrummanual/sbok4.pdf#page=86') }}"
                          shape="rect"
                          title="Business Justification">
                    <area alt="Quality" coords="585,198,851,287"
                          href="{{ asset('scrummanual/sbok4.pdf#page=106') }}"
                          shape="rect"
                          title="Quality">
                    <area alt="Change" coords="588,287,850,370"
                          href="{{ asset('scrummanual/sbok4.pdf#page=120') }}"
                          shape="rect"
                          title="Change">
                    <area alt="Risk" coords="593,376,850,491"
                          href="{{ asset('scrummanual/sbok4.pdf#page=138') }}"
                          shape="rect"
                          title="Risk">
                </map>

                <img id="aspectsImage"
                     class="w-full h-auto rounded"
                     src="{{ asset('storage/images/aspects.jpg') }}"
                     usemap="#ImgMap4"
                     alt="Scrum Aspects">
            </div>

            <section class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                <p class="text-lg text-gray-700 dark:text-gray-300 text-center">
                    Click on any aspect above to learn more about how it applies to Scrum methodology.
                </p>
            </section>

            {{-- Governance in Scrum Section --}}
            <section class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                <a name="demoapproved"></a>
                <h2 class="text-3xl font-semibold text-gray-900 dark:text-white mb-6 text-center">
                    <b>Governance in Scrum<br>
                        (Operating @ Capability Maturity Level 2+)</b>
                </h2>

                <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 text-center mb-6">
                    Click below to find out why the PO role is crucial, not to manage the Scrum Team, but rather to
                    define User Stories (WHAT & WHEN) and approve the demo deck after each sprint
                </p>

                <div class="text-center">
                    <button class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded transition-colors"
                            type="button"
                            wire:click="$toggle('showScrumGovernance')">
                        Governance in Scrum
                    </button>

                    @if($showScrumGovernance)
                        <div class="mt-6 bg-gray-800 rounded-lg p-6 border border-gray-700">
                            <div class="text-center">
                                <div class="bg-white dark:bg-white p-4 rounded-lg border border-gray-300 dark:border-gray-400 shadow-sm">
                                    <img alt="" title="scrum governance" class="w-full h-auto rounded"
                                         src="{{ asset('storage/images/scrumgovernance.png') }}">
                                </div>
                                <div class="text-gray-400 mt-4">Page above from Scrum for Dummies 2018</div>
                            </div>
                        </div>
                    @endif
                </div>
            </section>

            {{-- Scrum Value Model Essence Section --}}
            <section class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                <div class="text-center">
                    <button class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded transition-colors mb-4"
                            type="button"
                            wire:click="$toggle('showScrumValueEssence')">
                        The Scrum Essence<br>
                        <small>(for Capability Maturity Level 2+)</small>
                    </button>

                    @if($showScrumValueEssence)
                        <div class="mt-6 bg-gray-800 rounded-lg p-6 border border-gray-700">
                            <p class="text-lg text-gray-300 text-center mb-6">
                                <i><small>The image below is the very essence of Scrum Success at CM L2!</small></i>
                            </p>

                            <div class="text-center">
                                <div class="bg-white dark:bg-white p-4 rounded-lg border border-gray-300 dark:border-gray-400 shadow-sm inline-block">
                                    <img alt="Scrum Value Model essence" class="w-full h-auto rounded max-w-4xl"
                                         src="{{ asset('storage/images/scrumvaluedessence.jpg') }}"
                                         title=""
{{--                                         onmouseover="this.src='{{ asset('storage/images/scrumvalued.jpg') }}'"--}}
{{--                                         onmouseout="this.src='{{ asset('storage/images/scrumvaluedessence.jpg') }}'">--}}
                                </div>
                            </div>

                            <br><br>

                            <div class="text-center">
                                <button class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded transition-colors"
                                        type="button"
                                        wire:click="$toggle('showShootHorses')">
                                    Scrum run correctly<br>
                                    is like riding a race horse
                                </button>

                                @if($showShootHorses)
                                    <div class="mt-6 bg-gray-700 rounded-lg p-6 border border-gray-600">
                                        <h5 class="text-xl font-semibold text-white mb-4 text-center">They shoot horses
                                            don't they?</h5>
                                        <div class="space-y-6">
                                            <p class="text-lg text-gray-300 text-center">
                                                Look at the horse images below. Can you see the truth being
                                                presented?<br>
                                                Remember, our goal is Capability Maturity @ Level 2+
                                            </p>

                                            <div class="text-center">
                                                <div class="bg-white dark:bg-white p-4 rounded-lg border border-gray-300 dark:border-gray-400 shadow-sm inline-block">
                                                    <img alt="out of control" class="w-full h-auto rounded max-w-md"
                                                         src="{{ asset('storage/images/scrumexhorsetion.jpg') }}"
                                                         onmouseover="this.src='{{ asset('storage/images/horseoutofcontroladjusted.jpg') }}'"
                                                         onmouseout="this.src='{{ asset('storage/images/scrumexhorsetion.jpg') }}'"
                                                         title="How under control is your project actually?">
                                                </div>
                                            </div>

                                            <div class="text-center">
                                                <button class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded transition-colors"
                                                        type="button"
                                                        wire:click="$toggle('showOutOfSaddle')">
                                                    Scrum<br>
                                                    digging in the spurs!
                                                </button>

                                                @if($showOutOfSaddle)
                                                    <div class="mt-6 bg-gray-600 rounded-lg p-6 border border-gray-500">
                                                        <h5 class="text-xl font-semibold text-white mb-4 text-center">
                                                            PMWay suggests that most Scrum Teams (developers) will react
                                                            badly if they are pushed too hard
                                                        </h5>
                                                        <div class="space-y-6">
                                                            <div class="text-center">
                                                                <div class="bg-white dark:bg-white p-4 rounded-lg border border-gray-300 dark:border-gray-400 shadow-sm inline-block">
                                                                    <img class="w-full h-auto rounded max-w-md"
                                                                         alt="Do not put a scrum team too hard"
                                                                         src="{{ asset('storage/images/outofthesaddle.jpg') }}">
                                                                </div>
                                                            </div>
                                                            <p class="text-lg text-gray-300 text-center">
                                                                The best way to "push scrum teams" is through the
                                                                correct use of the Professional User Story and Product
                                                                Owner approving team demo's at the end of each sprint.
                                                            </p>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>

                                            <h3 class="text-2xl font-semibold text-white text-center"><b>The image below
                                                    is much better!</b></h3>

                                            <div class="text-center">
                                                <div class="bg-white dark:bg-white p-4 rounded-lg border border-gray-300 dark:border-gray-400 shadow-sm inline-block">
                                                    <img alt="Better!" class="w-full h-auto rounded max-w-4xl"
                                                         src="{{ asset('storage/images/horsewellridden.png') }}"
                                                         title="Under control, following process, scrum working and delivering results!">
                                                </div>
                                            </div>

                                            <p class="text-lg text-gray-300 text-center">
                                                Scrum method is under control, following scrum process in a stepwise
                                                manner; delivering results!<br>
                                                If you do not know this already: <b>the Scrum Master is in the
                                                    saddle</b><br>
                                                and the developers are clear about the track and are not whipped to
                                                deliver, wild and frothing at the mouth.<br><br>
                                                <b>The Product Owner's ONLY JOB is to manage the race track!</b>
                                            </p>

                                            <p class="text-lg text-gray-300">
                                                The following is taken from page 179 or the the book "The Professional
                                                Product Owner - Leveraging Scrum As Competitive Advantage"<br><br>
                                                <i>The Product Owner and the Sprint Backlog:<br><br>
                                                    The Sprint Backlog belongs to the Development Team! It is their plan
                                                    on how
                                                    best to meet the Sprint Goal. The Product Owner can determine the
                                                    most important Product Backlog items for the Development Team to
                                                    consider
                                                    in their Sprint plan, <b>but the Product Owner cannot dictate how
                                                        much work they take on or how
                                                        they will break this down.</b>.
                                                    This truth is an essential part in building a mutually respectful
                                                    relationship
                                                    between the two roles of Product Owner and Development team. A
                                                    Development Team that truly owns the plan for
                                                    the Sprint will demonstrate much more accountability and ownership
                                                    over the
                                                    work of the Sprint.<br><br>
                                                    Together with the Development Team, the Product Owner defines the
                                                    Sprint Goal in Sprint
                                                    Planning and then one must trust the Development Team to create the
                                                    Sprint Backlog and maintain it
                                                    throughout the Sprint. The Scrum Masters role is to ensure that
                                                    Scrum Ceremonies happen at the set times for them and also that
                                                    Scrum Processes are followed.
                                                </i>
                                            </p>

                                            <br><br>

                                            <p class="text-lg text-gray-300 text-center">
                                                Here is the concept in more detail<br>
                                            <div class="bg-white dark:bg-white p-4 rounded-lg border border-gray-300 dark:border-gray-400 shadow-sm inline-block">
                                                <img alt="Better!" class="w-full h-auto rounded max-w-4xl"
                                                     src="{{ asset('storage/images/horserace.jpg') }}"
                                                     title="Away racing and geared for DevOps!">
                                            </div>
                                            </p>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <br><br>

                            <p class="text-lg text-gray-300 text-center">
                                The image below shows what Scrum roles are accountable for which Scrum Processes<br>
                            <div class="bg-white dark:bg-white p-4 rounded-lg border border-gray-300 dark:border-gray-400 shadow-sm inline-block mt-4">
                                <img alt="Better!" class="w-full h-auto rounded max-w-5xl"
                                     src="{{ asset('storage/images/scrumprocessroles.jpg') }}"
                                     title="The buck stops here!">
                            </div>
                            </p>
                        </div>
                    @endif
                </div>
            </section>
        </div>
    </div>
</div>

{{-- Initialize ALL image maps once --}}
@push('scripts')
    <script>
        (function() {
            'use strict';

            let initAttempts = 0;
            const maxAttempts = 30;

            function initializeAllImageMaps() {
                initAttempts++;

                // Check if imageMapResize is available
                if (typeof imageMapResize === 'undefined') {
                    if (initAttempts < maxAttempts) {
                        setTimeout(initializeAllImageMaps, 100);
                    } else {
                        console.error('❌ imageMapResize failed to load');
                    }
                    return;
                }

                // Find all images with usemap
                const images = document.querySelectorAll('img[usemap]');

                if (images.length === 0) {
                    if (initAttempts < maxAttempts) {
                        setTimeout(initializeAllImageMaps, 100);
                    }
                    return;
                }

                // Check if all images are loaded
                let allLoaded = true;
                images.forEach(img => {
                    if (!img.complete || img.naturalWidth === 0) {
                        allLoaded = false;
                    }
                });

                if (!allLoaded) {
                    if (initAttempts < maxAttempts) {
                        setTimeout(initializeAllImageMaps, 100);
                    }
                    return;
                }

                // All ready! Initialize all maps
                console.log('✅ Initializing ALL Image Maps');
                console.log(`📍 Found ${images.length} images with maps`);

                images.forEach((img, index) => {
                    console.log(`Image ${index + 1}:`, {
                        id: img.id,
                        natural: `${img.naturalWidth}x${img.naturalHeight}`,
                        displayed: `${img.width}x${img.height}`,
                        scale: (img.width / img.naturalWidth).toFixed(3)
                    });
                });

                try {
                    imageMapResize();
                    console.log('✅ All image maps initialized successfully!');
                } catch (error) {
                    console.error('❌ Error initializing image maps:', error);
                }
            }

            // Start initialization
            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', initializeAllImageMaps);
            } else {
                initializeAllImageMaps();
            }

            // Reinitialize on window resize
            let resizeTimeout;
            window.addEventListener('resize', function() {
                if (typeof imageMapResize !== 'undefined') {
                    clearTimeout(resizeTimeout);
                    resizeTimeout = setTimeout(function() {
                        imageMapResize();
                        console.log('🔄 All maps resized');
                    }, 250);
                }
            });
        })();
    </script>
@endpush