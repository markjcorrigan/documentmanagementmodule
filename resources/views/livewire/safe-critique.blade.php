<div>
    <div class="max-w-7xl mx-auto px-4 py-8">
        <h1 class="text-4xl font-semibold text-gray-900 dark:text-white mb-8">
            Beware SAFe: The Scaled Agile Framework for Enterprise
        </h1>

        <div class="space-y-6">
            {{-- Article Header --}}
            <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">
                    Beware SAFe (the Scaled Agile Framework for Enterprise), an Unholy Incarnation of Darkness
                </h2>

                <p class="text-lg text-gray-600 dark:text-gray-400 mb-4">
                    <i>Sean Dexter<br>
                        Jan 1, 2020 · 14 min read</i>
                </p>

                <a href="/home/agileatscale" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300 text-sm">
                    Back to agile at scale dnw
                </a>
            </div>

            {{-- Introduction --}}
            <div class="bg-white dark:bg-gray-800 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                <blockquote class="border-l-4 border-blue-500 pl-4 italic text-gray-700 dark:text-gray-300 mb-6">
                    "And, in the next place, since evil is specially characterized by its diffusion, and attains its greatest height when it simulates the appearance of the good, for that reason are signs, and marvels, and lying miracles found to accompany evil, through the cooperation of its father the devil."
                    <footer class="mt-2 text-gray-600 dark:text-gray-400">— The Theologian Origen (185–254) on recognizing the Antichrist</footer>
                </blockquote>

                <p class="text-lg text-gray-700 dark:text-gray-300">
                    If you've never heard of it before, the Scaled Agile Framework for Enterprise is a collection of principles and practices assembled with the goal of offering a way to "scale up" an Agile working model for large companies.
                </p>

                <p class="text-lg text-gray-700 dark:text-gray-300">
                    Since its inception in 2011, SAFe has experienced enormous growth. Almost half a million people worldwide have become certified SAFe practitioners. If you expect to work in product, design, or engineering at a large company — or even a growing startup — there's a chance you'll encounter SAFe at some point in your career.
                </p>

                <p class="text-lg text-gray-600 dark:text-gray-400 mb-6">
                    A graph that shows a trend that increases upwards almost linearly.<br>
                    Google search term interest for "SAFe agile" since 2011
                </p>

                {{-- SAFe Graph --}}
                <div class="bg-white dark:bg-white p-4 rounded-lg border border-gray-300 dark:border-gray-400 shadow-sm text-center">
                    <img alt="SAFe is unsafe"
                         class="img-fluid mx-auto rounded-lg"
                         src="{{ asset('storage/images/safegraph.png') }}">
                </div>
            </div>

            {{-- Spoiler Alert --}}
            <div class="bg-yellow-50 dark:bg-yellow-900/20 rounded-lg p-6 border border-yellow-200 dark:border-yellow-800">
                <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">
                    <b>Spoiler alert: I'm not a fan.</b><br><br>
                    In fact, as you may have guessed from the title of this article, I actually think SAFe is very bad. It proclaims values that seem sensible and then turns around and imposes processes and structure that stifle real agility. There are a number of "scaling frameworks" out there of varying quality, but it's SAFe in particular that exemplifies the worst of misunderstood and poorly applied Agile thinking. It's worth paying attention to — even just as an example of what to avoid.<br><br>
                    You should treat this stance for what it is: one Product Designer's individual perspective. I can't conclusively prove that SAFe is the wrong choice for all situations. What I can do is raise awareness about the commonly expressed criticisms that corroborate with what I've learned myself and heard from others in my network.<br><br>
                    I also hope to draw a clear connection between the high level criticisms and the low level structural details of the framework. This will require some explanation of those details. The good news is, there's a graphic that explains everything in a simple, intuitive way:
                </p>
            </div>

            {{-- SAFe Complex Graphic --}}
            <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 border border-gray-200 dark:border-gray-700 text-center">
                <div class="bg-white dark:bg-white p-4 rounded-lg border border-gray-300 dark:border-gray-400 shadow-sm">
                    <img alt="SAFe is unsafe"
                         class="img-fluid mx-auto rounded-lg"
                         src="{{ asset('storage/images/safeimage.png') }}">
                </div>
                <p class="text-lg text-gray-600 dark:text-gray-400 mt-4">
                    An intimidating and complex graphic laying out roles and processes<br><br>
                    …or maybe not.<br><br>
                    If you'd rather SAFe speak for itself there are hundreds of pages of documentation, hours of videos, 15 different training courses, and more. If that sounds like a little much, I'll do my best to provide some explanation of how SAFe works as I go through each point.
                </p>
            </div>

            {{-- Bureaucratic Control Section --}}
            <div class="bg-white dark:bg-gray-800 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">
                    SAFe enables bureaucratic, top-down control
                </h3>

                <p class="text-lg text-gray-700 dark:text-gray-300">
                    At the highest level, called the "Portfolio", SAFe does advocate funding indefinite "Value Streams" — which usually represent a product, product line, or customer type. However, the Lean Portfolio Management function (LPM) that controls funding (likely the same people previously responsible for waterfall-style project budgets), are given sole authority to approve which Portfolio Epics (large initiatives) move into each stream. Epics are not explanations about a problem that needs to be solved. They are pre-formed ideas about how best to solve those problems.
                </p>

                <p class="text-lg text-gray-700 dark:text-gray-300">
                    Right away we can see signs of the old-school mindset of viewing teams as a "delivery" function instead of a strategic one. The high level thinkers come up with ideas, and the low level doers execute on those ideas. Ignored is the possibility that those closest to the work might be best equipped to make decisions about it. Escaping from this misguided mindset is a core goal of Agile thinking that SAFe fails to remotely accomplish.
                </p>

                <p class="text-lg text-gray-700 dark:text-gray-300">
                    A similar issue pops up again when we look at a slightly lower level.
                    SAFe collects small product teams (often scrum teams) into "Agile Release Trains" — groups of teams with an additional layer of management roles spanning each group at what is called the "Program level".
                </p>

                <p class="text-lg text-gray-700 dark:text-gray-300">
                    Generally these roles impede the autonomy of teams. They add process and communication overhead out of proportion with the value they provide.
                    These roles include a Product Manager (PM), a System Architect (SA), and a Release Train Engineer (RTE).
                </p>

                <p class="text-lg text-gray-700 dark:text-gray-300">
                    The SA and PM define and break up larger pieces of work (often inherited from the portfolio process above) and then pass the pieces into the teams.
                    The Product Owner and team might theoretically be able to prioritize other, smaller pieces of work against the work imposed on them, but these efforts have limited visibility and buy-in from above. There will be a natural pressure to treat work coming from the highest point as most important — even if every single team member believes other items would be more valuable.
                </p>

                <div class="bg-red-50 dark:bg-red-900/20 p-4 rounded-lg border border-red-200 dark:border-red-800">
                    <p class="text-lg font-semibold text-red-900 dark:text-red-300">
                        Because of this, the role of the Product Owner is reduced to writing stories and checking acceptance criteria, instead of being the single point of accountability <span class="italic">[and go to hub for fast decision making to create agility - inspect and adapt (added by PMWay)]</span> for product leadership that was the original intention for the role.
                    </p>
                </div>

                <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mt-4">
                    The System Architect is not in a position to be close to the actual engineering work, so the architectural plan they pass on may be disconnected from the reality of the work. These sorts of roles were a hallmark of big-design-up-front waterfall projects and are well preserved in SAFe.
                </p>

                <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">
                    Release Train Engineers define consistent cross-team process and cadence, and handle many operational tasks. Ultimately this leaves less room for individual teams to modify, improve, or experiment with their own practices in any way that deviates from established standards.
                </p>

                <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">
                    Sometimes all of these problems are repeated again with the addition of a "Large Solution Level" — groups of groups of teams with analogous roles to those at the program level, but spanning Release Trains. When this occurs the same problems are likely to be repeated, but the Solution Level does seem to be less commonly put in place.
                </p>
            </div>

            {{-- Rally/Jira Section --}}
            <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">
                    SAFe (often) comes bundled with Rally (or Jira Align) — FURTHER limiting team autonomy
                </h3>

                <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">
                    SAFe is often a package deal with the project management software Rally. Rally is the sort of software you'd expect a company using SAFe to make — it's overloaded with features, unfocused, confusing, unstable, and consequently difficult to learn and use.<br><br>
                    The value proposition of adopting Rally for leadership is that they'll be able to see reporting that gives them a simple, unified picture of the progress and problems across the entire enterprise.<br><br>
                    Of course, this means everyone in the enterprise not only needs to use Rally, but they need to use it in a consistent way. Again, this can only be achieved through top-down dictation. Rally and the way it thinks about work are forced onto all teams regardless of their preference, context, or buy-in. To actually have all the information roll up requires incredible overhead in estimating and tracking that slows everything down and can be extremely disruptive to actually getting work done.<br><br>
                    Additionally, the top level reporting isn't even particularly useful. It focuses on the things Rally tracks— metrics like the volume of story points delivered (literally made up) or the quantity of bugs addressed (a terrible measure for "product quality"). If management ignores these stats, the overhead they add will be for nothing. If they manage to the metrics, the stats will be fudged so that teams look good and are left alone. Estimates will be over-padded, small pieces of work will be exaggerated, and this can easily lead to a breakdown of trust.
                </p>
            </div>

            {{-- Dependencies Section --}}
            <div class="bg-white dark:bg-gray-800 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">
                    SAFe takes the worst possible approach to managing dependencies
                </h3>

                <p class="text-lg text-gray-700 dark:text-gray-300">
                    A dependency is an instance where a team needs to wait for something to be done elsewhere before they can complete their own work. SAFe is structured around a backwards attitude that dependencies are an immutable fact of life that should be accepted and managed around. It even sometimes refers to them as a strategic advantage. In reality, when you think of dependencies as a bad thing — to be minimized at every opportunity — you may find that those opportunities are plentiful and that taking advantage of them results primarily in benefits. Here are just a few suggestions that SAFe under-emphasizes or entirely ignores:
                </p>

                <ul class="list-disc list-inside space-y-2 text-xl leading-relaxed text-gray-700 dark:text-gray-300 ml-4">
                    <li>Encourage a culture of inner-sourcing where one team can submit work to another team's code base without having to depend on them beyond accepting the merge</li>
                    <li>Make it easy for team members to temporarily or permanently swap teams when it makes sense to do so</li>
                    <li>Focus on hiring, structuring, and training teams to handle their own needs without outside help</li>
                </ul>

                <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mt-4">
                    How SAFe actually chooses to manage dependencies is by increasing focus on planning, process, hierarchy, and standardization. Predictably, this results in lots of meetings that interfere with the ability to get work done. It imposes this approach through a universal roll-out that affects the entire organization at once. No consideration is given to which areas could have been self reliant without the additional burdensome structure.
                </p>
            </div>

            {{-- Planning Section --}}
            <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">
                    SAFe is excessively oriented around planning
                </h3>

                <p class="text-lg text-gray-700 dark:text-gray-300">
                    A core feature of SAFe is the idea of ~10 week Program Increments (PIs). You can think of these sort of like huge sprints that contain all of your normal sprints.<br><br>
                    Each PI begins with a PI planning event that runs for about two days. PI planning also requires pre-planning and post-planning activities at the Program level.
                    There is definitely some value in having people get together in person to build relationships, share information, and orient around goals. On the other hand, using that limited time window to make 10 week plans of specific user stories based on pre-defined features, and then requiring commitment to those plans is much less valuable.
                </p>

                <p class="text-lg text-gray-600 dark:text-gray-400 text-center mb-4">
                    A schedule with events related mostly to SAFe PI planning
                </p>

                <div class="bg-white dark:bg-white p-4 rounded-lg border border-gray-300 dark:border-gray-400 shadow-sm text-center">
                    <img alt="SAFe is unsafe"
                         class="img-fluid mx-auto rounded-lg"
                         src="{{ asset('storage/images/safeplanimage.png') }}">
                </div>

                <p class="text-lg text-gray-600 dark:text-gray-400 text-center mt-4">
                    The recommended standard two-day PI Planning agenda
                </p>

                <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mt-4">
                    As soon as PI planning ends, those plans created based on limited understanding and numerous assumptions will become obsolete as soon as anything new is learned. Teams will be continuously torn between sticking to the plan they've learned doesn't make sense and and reorienting expectations for reasons those above them may not be in a position to understand.
                </p>
            </div>

            {{-- Continue with remaining sections following the same pattern... --}}
            {{-- Value Section --}}
            <div class="bg-white dark:bg-gray-800 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">
                    SAFe is oriented around volume, not value
                </h3>

                <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">
                    In all this focus on volume metrics, estimation, and churning work through the pipeline, the concept of what's actually valuable or successful is easily lost. It's often assumed that more work shipped out the door must be "value", even if the experience of the product is actually suffering and users are not benefiting from the additional features.<br><br>
                    SAFe is aware of the criticism that it is not value focused and has recently added "design thinking", "customer centricity", and other concepts to its documentation to compensate. So far I'm not convinced it makes any significant changes in its process that actually make room for those things, and it fumbles in even understanding them in the first place.<br><br>
                    For example, SAFe's definition of "customers" leaves the door open to defining business stakeholders or those funding the value streams as being "customers". This is very different from reorienting everyone (including those providing the funding) to focus on the needs of the end-users actually using the software, a core element of design thinking.
                </p>
            </div>

            {{-- Complexity Section --}}
            <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">
                    SAFe is unnecessarily complex
                </h3>

                <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">
                    SAFe has a natural advantage that protects it from criticism; It is so complicated that it's difficult to fully comprehend. Despite the additional time I've spent researching the framework, I'm probably still likely to get some things wrong or miss some important points. However, an abundance of complexity is itself a legitimate concern. SAFe has so many meetings, checkpoints, values, and methods that it's basically impossible to get everyone on the same page.
                </p>
            </div>

            {{-- Retrospectives Section --}}
            <div class="bg-white dark:bg-gray-800 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">
                    SAFe limits retrospectives and continuous improvement
                </h3>

                <p class="text-lg text-gray-700 dark:text-gray-300">
                    Roles at the program level and above cannot possibly attend all team retrospectives. This means retrospectives will not be directly heard by the people who can actually change many of the things being discussed.
                </p>

                <p class="text-lg text-gray-700 dark:text-gray-300">
                    The way SAFe tries to compensate for this is not sufficient.
                </p>

                <p class="text-lg text-gray-700 dark:text-gray-300">
                    PI planning is the only time where everyone in a Release Train is guaranteed to be together in-person. Unfortunately it contains a short retrospective related only to the success of the planning event itself.
                    SAFe does include an "Inspect and Adapt" event towards the end of each PI, but it seems almost designed to be skipped based on how hard it is to coordinate for the RTE. When held, the event is primed by reviewing — of course — volume metrics from the last PI. Additionally only 30 minutes of the event are allotted for an actual retrospective where issues are surfaced and agreed upon. If this time is split evenly among all the members of a 100 person Release Train, then each participant will get about 18 seconds every ~10 weeks to bring up issues in a context where they might actually be heard.
                </p>

                <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">
                    SAFe also has some other elements like "assessment charts" where teams are surveyed more broadly, but these lean heavily towards confirming that SAFe practices are being followed, not whether or not they're effective.
                </p>
            </div>

            {{-- Degrades Concepts Section --}}
            <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">
                    SAFe degrades the concepts it aggregates
                </h3>

                <p class="text-lg text-gray-700 dark:text-gray-300">
                    A key part of SAFe that I have not yet touched on is the aggregation of existing concepts like scrum, Kanban, Lean Product, Lean UX, and DevOPs.
                </p>

                <p class="text-lg text-gray-700 dark:text-gray-300">
                    If you're unfamiliar, I'd suggest exploring each concept independently over time rather than all at once. Many are valuable themselves, but SAFe doesn't do a great job at actually synthesizing them and can sometimes add confusion. Case in point:
                </p>

                <p class="text-lg text-gray-700 dark:text-gray-300">
                    SAFe routinely espouses how its practices follow "Lean-Agile" principles. The trick is that "Lean-Agile" doesn't actually refer to "Lean" or "Agile" principles.
                </p>

                <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">
                    Instead "Lean-Agile Principles" are a creation of SAFe's own design. This new set of "principles" warps the concepts it assimilates. For example, the page about decentralizing decisions (ranked the lowest of all principles) subtly subverts itself by emphasizing the importance of centralizing decision-making for many use-cases. Other listed principles have similar problems.<br><br> For a person being introduced to all of this information at once, the actual meaning of the original concepts may be lost.
                </p>
            </div>

            {{-- Not Agile Section --}}
            <div class="bg-white dark:bg-gray-800 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">
                    SAFe is not Agile
                </h3>

                <p class="text-lg text-gray-700 dark:text-gray-300">
                    By now many of the ways SAFe is inconsistent with an Agile mindset should be pretty clear. It's plan focused, bureaucratic, complicated, includes a lot of often unnecessary process, dis-empowers team autonomy, and more.
                </p>

                <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">
                    But does it matter whether or not SAFe is Agile when what we really care about is effectiveness?  Yes. It does.<br><br>
                    Agile principles are only Agile principles because they were generally recognized and agreed on as being effective. That thinking resonated with a broader community of practitioners which is why the movement originally took off. If you think agility is a predictor of effectiveness, (a belief presumably behind some of the interest in SAFe) then it matters quite a bit if SAFe is consistent with Agile thinking. Misleading people about what they're buying is a bad thing and it isn't wrong to call that out.
                </p>
            </div>

            {{-- Case Studies Section --}}
            <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">
                    What about all the case studies where SAFe is shown to have worked?
                </h3>

                <p class="text-lg text-gray-700 dark:text-gray-300">
                    There are about 40 case studies on successful SAFe adoption on scaledagileframework.com. The case studies for failures are conspicuously absent. Contrary to the acronym, SAFe involves simultaneous changes to a huge new process across an enormous ecosystem— a massive risk. Unless each of those 40 successful companies each had 11,250 certified SAFe practitioners there are quite a few companies we're not hearing from.
                </p>

                <p class="text-lg text-gray-700 dark:text-gray-300">
                    Also, I don't put much too much stock in the case studies that do exist. Even if the volume metrics they focus on really were valuable it's easy to cherry pick a few stats that make it seem like things went well.
                </p>

                <p class="text-lg text-gray-700 dark:text-gray-300">
                    To focus in on a specific example, let's take a look at an excerpt from the case study about SAFe implementation at Fitbit:
                </p>

                <div class="bg-blue-50 dark:bg-blue-900/20 p-4 rounded-lg border border-blue-200 dark:border-blue-800 mb-4">
                    <p class="text-lg italic text-gray-700 dark:text-gray-300">
                        In 2016, consumer technology company, Fitbit, released four new products to the market that were positively received by consumers, and shipped over 22 million devices. Delivering its highest number of products in a year is due in part to the company's commitment to, and success in adopting SAFe® (Scaled Agile Framework®) as a way to scale the team to meet target dates.
                        <br>© Scaled Agile, Inc.
                    </p>
                </div>

                <p class="text-lg text-gray-600 dark:text-gray-400 text-center mb-4">
                    Here's Fitbit's stock price over the last five years:
                </p>

                <div class="bg-white dark:bg-white p-4 rounded-lg border border-gray-300 dark:border-gray-400 shadow-sm text-center">
                    <img alt="SAFe is unsafe"
                         class="img-fluid mx-auto rounded-lg"
                         src="{{ asset('storage/images/fitbitstock.png') }}">
                </div>

                <p class="text-lg text-gray-600 dark:text-gray-400 text-center mt-4">
                    A stock chart that goes down sharply at the beginning of 2016 and continues downwards
                </p>

                <div class="bg-red-50 dark:bg-red-900/20 p-4 rounded-lg border border-red-200 dark:border-red-800 mt-4">
                    <p class="text-xl font-semibold text-red-900 dark:text-red-300 text-center">
                        Yeah… 2016 looks like a great year for Fitbit.
                    </p>
                </div>

                <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mt-4">
                    Now, we can't really attribute the downfall of Fitbit to SAFe adoption with the amount of information we have. But if a company can struggle this much and still hail SAFe adoption as improving the responsiveness of their product decisions, I'm going to narrow my eyes a few degrees more when checking out the rest of the case studies.
                </p>
            </div>

            {{-- Transitional Step Section --}}
            <div class="bg-white dark:bg-gray-800 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">
                    It's OK as a transitional step though, right?
                </h3>

                <p class="text-lg text-gray-700 dark:text-gray-300">
                    If you're someone who would make this argument then you must think that SAFe needs to be transitioned away from. On this point we agree!
                    To make that transition we will of course have to spend some time pointing out the parts that don't work well.
                </p>

                <p class="text-lg text-gray-700 dark:text-gray-300">
                    Is that something you've been spending a lot of time on?
                </p>

                <p class="text-lg text-gray-700 dark:text-gray-300">
                    Even if you are, SAFe is set up in a way that prevents you from actually transitioning. The authority it places in the hands of management acts as a legitimization of the top-down control mentality. This pairs poorly with the lacking methods for process improvement we've already covered. The authority to "customize" SAFe to the appropriate context is mostly unavailable to the actual teams best positioned to recognize what isn't working.
                </p>

                <p class="text-lg text-gray-700 dark:text-gray-300">
                    Nowhere in the SAFe road-map does it actually refer to any of its core practices as transitional. If it's a transitional framework, then it does a pretty poor job of providing any kind of transition plan.
                </p>

                <p class="text-lg text-gray-600 dark:text-gray-400 text-center mb-4">
                    A roadmap with red circles drawn at every stage
                </p>

                <div class="bg-white dark:bg-white p-4 rounded-lg border border-gray-300 dark:border-gray-400 shadow-sm text-center">
                    <img alt="SAFe is unsafe"
                         class="img-fluid mx-auto rounded-lg"
                         src="{{ asset('storage/images/saferoadmapdown.png') }}">
                </div>

                <p class="text-lg text-gray-600 dark:text-gray-400 text-center mt-4">
                    The SAFe Implementation Roadmap with circles added to all the points where consultant services are needed
                </p>

                <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300 mt-4">
                    The hyper-focus on certifications also hurts the framework's flexibility. If you spend hours and hours working to become certified, the certification become a part of your own value. A transition to something that looks less like SAFe may seem like it threatens that value. I can't blame anyone for getting certified in a job market where certifications matter. But those individuals have a particular responsibility to pay attention to the downsides of SAFe and possible ways to improve or deviate from it.
                </p>
            </div>

            {{-- Broad Experience Section --}}
            <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">
                    These problems are broadly experienced
                </h3>

                <p class="text-lg text-gray-700 dark:text-gray-300">
                    I'm not alone in expressing many of these criticisms — though I hope I've gone a bit further in connecting them to the specific practices in the framework. If you're looking for corroborating testimonies, here are a few:
                </p>

                <ul class="list-disc list-inside space-y-3 text-xl leading-relaxed text-gray-700 dark:text-gray-300 ml-4">
                    <li>
                        Ken Schwaber, co-developer of scrum <a href="https://kenschwaber.wordpress.com/2013/08/06/unsafe-at-any-speed/" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300"><u>expressed serious concerns about SAFe</u></a> as early as 2013.
                    </li>
                    <li>
                        Nicholas M. Chaillan, U.S. Air Force Chief Software Officer, <a href="https://twitter.com/lukadotnet/status/1203751211817742336?s=20" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300"><u>discourages</u></a> "using rigid, prescriptive frameworks such as the Scaled Agile Framework (SAFe)."
                    </li>
                    <li>
                        Forbes contributor Steve Denning <a href="https://www.forbes.com/sites/stevedenning/2019/05/23/understanding-fake-agile/#316e49034bbe" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300"><u>calls out</u></a> SAFe for being " particularly worrying" in his article on how to spot fake Agile.
                    </li>
                    <li>
                        Marty Cagan of the Silicon Valley Product Group <a href="https://svpg.com/revenge-of-the-pmo/" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300"><u>explains</u></a> how SAFe is antithetical to the mindset of Silicon Valley companies.
                    </li>
                </ul>
            </div>

            {{-- Expert Quotes Section --}}
            <div class="space-y-6">
                {{-- Jared Spool --}}
                <div class="bg-white dark:bg-gray-800 rounded-lg p-6 border border-gray-200 dark:border-gray-700 text-center">
                    <p class="text-lg text-gray-600 dark:text-gray-400 mb-4">
                        Jared Spool, Co-Founder and Co-CEO at Center Centre-UIE
                    </p>
                    <div class="bg-white dark:bg-white p-4 rounded-lg border border-gray-300 dark:border-gray-400 shadow-sm">
                        <img alt="SAFe is unsafe"
                             class="img-fluid mx-auto rounded-lg"
                             src="{{ asset('storage/images/snipone.png') }}">
                    </div>
                </div>

                {{-- Jeff Gothelf --}}
                <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 border border-gray-200 dark:border-gray-700 text-center">
                    <p class="text-lg text-gray-600 dark:text-gray-400 mb-4">
                        Jeff Gothelf, Co-author of Lean UX
                    </p>
                    <div class="bg-white dark:bg-white p-4 rounded-lg border border-gray-300 dark:border-gray-400 shadow-sm">
                        <img alt="SAFe is unsafe"
                             class="img-fluid mx-auto rounded-lg"
                             src="{{ asset('storage/images/sniptwo.png') }}">
                    </div>
                </div>

                {{-- Allen Holub --}}
                <div class="bg-white dark:bg-gray-800 rounded-lg p-6 border border-gray-200 dark:border-gray-700 text-center">
                    <p class="text-lg text-gray-600 dark:text-gray-400 mb-4">
                        Allen Holub, Agile Consultant & Computer Scientist
                    </p>
                    <div class="bg-white dark:bg-white p-4 rounded-lg border border-gray-300 dark:border-gray-400 shadow-sm">
                        <img alt="SAFe is unsafe"
                             class="img-fluid mx-auto rounded-lg"
                             src="{{ asset('storage/images/snipthree.png') }}">
                    </div>
                </div>

                {{-- Meme Account --}}
                <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 border border-gray-200 dark:border-gray-700 text-center">
                    <p class="text-lg text-gray-600 dark:text-gray-400 mb-4">
                        Some silly meme account
                    </p>
                    <div class="bg-white dark:bg-white p-4 rounded-lg border border-gray-300 dark:border-gray-400 shadow-sm">
                        <img alt="SAFe is unsafe"
                             class="img-fluid mx-auto rounded-lg"
                             src="{{ asset('storage/images/snipfour.png') }}">
                    </div>
                </div>
            </div>

            {{-- Conclusion Section --}}
            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-gray-800 dark:to-gray-700 rounded-lg p-6 border border-blue-200 dark:border-blue-800">
                <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">
                    Stay safe out there (not SAFe)
                </h3>

                <p class="text-lg text-gray-700 dark:text-gray-300">
                    While SAFe has certainly received a good deal of criticism, my personal sense is that this criticism may not have reached a large audience beyond certain online circles. This is especially likely when considered alongside the increasing number of companies adopting the framework every day.
                </p>

                <p class="text-lg text-gray-700 dark:text-gray-300">
                    For many people, the idea that there's anything wrong with SAFe— or that it conflicts with Agile principles at all — may be completely novel.
                </p>

                <p class="text-lg text-gray-700 dark:text-gray-300">
                    Increased discussion aimed at a broader audience can probably help. I hope to touch on this topic more in the future and to detail what other alternatives are out there.
                </p>

                <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">
                    For now, even if you aren't working in a SAFe environment, that's not an excuse to get complacent. The concerns I've laid out here should be taken as a broader warning — even the most sensible of ideas can easily be co-opted, corrupted, and confused if you're not paying close attention.
                </p>
            </div>

            {{-- Final Link --}}
            <div class="bg-white dark:bg-gray-800 rounded-lg p-6 border border-gray-200 dark:border-gray-700 text-center">
                <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">
                    <a href="https://seandexter1.medium.com/beware-safe-the-scaled-agile-framework-for-enterprise-an-unholy-incarnation-of-darkness-bf6819f6943f"
                       class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300 text-lg font-semibold">
                        Awesome article Sean!
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>