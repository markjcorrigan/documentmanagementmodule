<section class="w-full">

    <style>
        /* Custom font size rules for p and heading tags */
        .text-container p {
            font-size: 1.125rem; /* text-lg equivalent */
            line-height: 1.75rem; /* leading-loose equivalent */
            margin-bottom: 1rem;
        }

        .text-container h1, .text-container h2, .text-container h3,
        .text-container h4, .text-container h5, .text-container h6 {
            font-size: 1.25rem; /* text-xl equivalent */
            line-height: 1.75rem;
            margin-bottom: 1rem;
        }

        .text-container h1 {
            font-size: 1.5rem; /* text-2xl equivalent */
            font-weight: bold;
        }

        .text-container h3, .text-container h4 {
            font-weight: bold;
        }

        /* Remove green/brown from dark mode graphs */
        .dark .bg-green-50,
        .dark .bg-green-100,
        .dark .bg-green-900 {
            background-color: #f8fafc !important; /* slate-50 */
        }

        .dark .border-green-200,
        .dark .border-green-800 {
            border-color: #e2e8f0 !important; /* slate-200 */
        }

        /* NEW: Make only graph containers white in both modes */
        .text-container .bg-green-50,
        .text-container .bg-green-100,
        .text-container .bg-slate-100,
        .text-container .bg-slate-200,
        .text-container .bg-gray-100,
        .text-container .bg-gray-700,
        .text-container .bg-white,
        .dark .text-container .bg-green-50,
        .dark .text-container .bg-green-100,
        .dark .text-container .bg-slate-100,
        .dark .text-container .bg-slate-200,
        .dark .text-container .bg-gray-100,
        .dark .text-container .bg-gray-700,
        .dark .text-container .bg-gray-800 {
            background-color: #ffffff !important;
        }

        /* Also ensure graph container borders are consistent */
        .text-container .border-green-200,
        .text-container .border-slate-200,
        .text-container .border-gray-300,
        .text-container .border-gray-700,
        .dark .text-container .border-green-200,
        .dark .text-container .border-slate-200,
        .dark .text-container .border-gray-300,
        .dark .text-container .border-gray-700 {
            border-color: #e5e7eb !important; /* gray-200 */
        }
    </style>
    <script>
        tailwind.config = {
            darkMode: 'class',
        }
    </script>
    <script>
        // Check for saved theme in localStorage
        if (localStorage.getItem('flux:appearance') === 'dark' ||
            (!localStorage.getItem('flux:appearance') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>

    <div class="bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 transition-colors duration-200">
        <div class="container mx-auto px-8 py-8 text-container"> <!-- Increased padding and added text-container class -->
            <h3 class="text-left text-xl font-bold mb-4 dark:text-white">Up Your Game STATS!</h3>
            <hr class="border-gray-300 dark:border-gray-700 mb-6">

            <h5 class="text-center text-xl font-semibold mb-6 dark:text-gray-200">Use of Statistics to Up Production<br>A Management tool</h5>
            <div class="flex justify-end">
                <a href="/red-bead-experiment" class="inline-block">
                    <img
                            alt="red beads out"
                            class="max-w-full h-auto"
                            src="{{ asset('storage/images/redbeadsoutsmall.png') }}"
                            title="Executive Action Team: EAT the Red Beads"
                    >
                </a>
            </div>

            <div class="text-center mb-6">
                <a href="/conditions/conditions.htm">
                    <img alt="" class="w-full bg-white max-w-6xl mx-auto" src="{{ asset('storage/images/conditionsscale.png') }}" title="Click here for more on the Conditions Scale.">
                </a>
            </div>

            <h5 class="text-center text-xl font-semibold mb-6 dark:text-gray-200">There is a game called PRODUCTION.&nbsp; It's a pro-survival game:</h5>

            <div class="flex flex-col md:flex-row items-start gap-6 mb-6">

                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">This is the game you play, in one form or another, when you go to work or are part of an organized activity.  Obviously, if you are a salesman you are a better salesman the more you sell. If you are a hunter you are a better hunter the more game you bring home. Production and survival are closely related. In the physical universe you don't survive for long unless you produce <em class="dark:text-gray-200">something</em> that is right; you have to do work to survive.</p>

            </div>

            <div class="bg-green-50 dark:bg-slate-100 border border-green-200 dark:border-slate-200 rounded-lg p-6 mb-6"> <!-- Changed dark mode colors -->
                <div class="flex flex-col md:flex-row items-center justify-center gap-4">
                    <div class="md:w-1/3">
                        <img class="w-full rounded" src="{{ asset('storage/images/saleup.jpg') }}">
                    </div>
                    <div class="md:w-2/3 bg-green-100 dark:bg-slate-200 p-4 rounded"> <!-- Changed dark mode colors -->
                        <h3 class="text-center dark:text-gray-800">Production and survival are&nbsp;<br>closely related. In the physical&nbsp;&nbsp;&nbsp;<br>universe you have to do&nbsp;<br>work to survive.</h3>
                    </div>
                </div>
            </div>



            <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">This is not to say that production equals survival nor Ethics. Production is a much narrower scope. Production is sweating it out, not reflection. It does not consider the hard choices and it does not consider <em class="dark:text-gray-200">what</em> you produce - only how much. In other words, when you measure production using statistics you are asking for numbers, not prior reasoning or ethical concerns. Immediate advantage and results will dominate. That said, using statistics in combination with the so-called Ethics Conditions are very applicable to the work situation as management tools. The Conditions scale above is the study of organizations and they were defined as operating states.&nbsp; Yet the Conditions can also be used to study of the survival of an individual, a group, a country, our planet, its wildlife etc.</p>

            <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">The fact that 'Valuable Final Products' are established using statistics makes a lot of sense. Once you have a bakery the baker that bakes more bread is the better baker.&nbsp; This is also the worker you want to hire or keep if you run the activity.</p>

            <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">In the following we thus assume that what you produce has already past the test of being useful and will be needed and wanted as a valuable final product within that overall activity or society. Once that is established more is better. We can start to apply the Conditions Formulas (these are described below) to increase production and handle factors that impede production. We are in other words into some level of management, whether it is of our own affairs or include a whole organization with hundreds of workers whose production we are responsible for.</p>

            <h4 class="text-center font-bold text-xl mb-4 dark:text-white">Using Statistics</h4>

            <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">The basic rules on how you use statistics to manage a production are simple. It all starts with plotting your production on a graph. When you have done that for a while you take a step back and look at the graph in order to see how you are doing.</p>

            <p class="font-bold mb-4 dark:text-white">Here is a basic production graph:</p>

            <div class="bg-white dark:bg-white border border-gray-300 dark:border-gray-300 rounded-lg overflow-hidden mb-6">
                <div class="flex">
                    <div class="w-16 bg-white dark:bg-white flex items-center justify-center p-2">
                        <h3 class="text-xs text-center transform -rotate-90 whitespace-nowrap dark:text-gray-900 py-6 px-4">Number<br>of items<br>produced</h3>
                    </div>
                    <div class="flex-1 bg-white dark:bg-white p-4 flex items-center justify-center">
                        <img class="max-w-full h-auto" src="{{ asset('storage/images/graph1.gif') }}">
                    </div>
                </div>
                <div class="flex border-t border-gray-300 dark:border-gray-300">
{{--                    <div class="w-16 bg-gray-300 dark:bg-gray-300"></div>--}}
                    <div class="flex-1 bg-white dark:bg-white p-2 text-center">
                        <h3 class="text-xs dark:text-gray-900">Timeline. Each line represents one day.</h3>
                    </div>
                </div>
                <div class="p-4 text-center bg-white dark:bg-white">
                    <p class="dark:text-gray-900">At the end of each day you count your production and mark&nbsp;<br>the number with a dot. The more you produced the higher&nbsp;<br>up the dot. Then you connect the dots and get a graph.<br>&nbsp;&nbsp; The shown graph depicts 5 days of production. As it can be&nbsp;&nbsp;&nbsp;<br>seen the overall trend is going up. You are doing well.</p>
                </div>
            </div>
            <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">One thing to consider when making a graph is that the graph is properly scaled. The variations in production has to show up visually. If you made a graph of a salesman's sales of bread in 'millions of dollars (or whatever your currency) per week' it would just be a straight line along the bottom of the graph paper and tell you nothing. If you made a graph of sales in dollars per week a difference between $1,000 and $3,000 would show up as a significant difference and you would have a graph you could work with. To get this right you may have to adjust the range you graph and what numerical units to use. If after a while it becomes clear the sales of bread is mainly between $500 and $2,000 you make sure your graph shows this range clearly and gives a clear picture of ups and downs in that range.</p>

            <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">In order to use the Conditions Formulas in connection with production you have to look at the trend of the graph. The tend is the main direction of the overall graph or a section thereof. The <em class="dark:text-gray-200">trend</em> is what tells you what Condition to apply. Another factor to consider, when reading a graph, is the time span to use. The closer and the more directly involved you are in the graphed production the shorter a time span you use.</p>

            <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">You can monitor your personal production down to the hour. How many loaves of bread did you bake in the last hour? How many loaves of bread did you sell in the last hour?</p>

            <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">A more usable trend may come about if you compare each day. After all there are supporting activities, such as cleaning, that have to be done in order to bake bread. Cleaning would not add up to baked loaves of bread but is part of the whole process. If you are responsible for the day to day operation it is relevant to see where you stand at the end of the day. You would add up the total number of loaves of bread baked; in sales you would simply add up the total sales.</p>

            <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">If you are responsible on a senior level for an activity you would use a longer time span in order to determine the trend. You wouldn't micro-manage the activity but supervise it on a distance and only be ready to step in if a long range slump seems to set in. If you are the overall top manager of a large activity with many remote locations you would follow the statistics continuously, but you would not issue serious orders or start major programs to repair a slump unless you saw a trend developing over several months or longer. The key to determine how long a trend has to be actionable depends upon how long the remedies you are authorized to use would take to get communicated, working and completed.&nbsp;If you sit in New York and the production takes place in Vancouver you would only issue strategic orders. Not orders having to do with the day to day operation on a junior level. That is why the higher up you go in an organization the longer the trends are that you watch.</p>

            <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">Here is how the trends relate to the Conditions. The Condition Formulas would tell you the general steps to take in an overall plan when seeking to remedy a bad situation or improve upon a favorable one. To apply the Conditions intelligently and effectively are what takes real genius in top administrators.&nbsp;</p>

            <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">&nbsp;</p>

            <div class="bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-lg overflow-hidden mb-6 max-w-md mx-auto">
                <div class="bg-gray-100 dark:bg-gray-700 p-4 flex items-center justify-center h-48">
                    <img class="max-w-full h-auto" src="{{ asset('storage/images/graph_nonex.gif') }}">
                </div>
                <div class="bg-green-50 dark:bg-slate-100 p-4 text-center"> <!-- Changed dark mode colors -->
                    <p class="dark:text-gray-800">Steep or near vertical down:<br>Non-Existence trend.</p>
                </div>
            </div>

            <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">What is shown is the trend. If you have a statistic with many periods plotted it will of course not be a straight line but for instance look like this:</p>

            <div class="bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-lg overflow-hidden mb-6 max-w-md mx-auto">
                <div class="bg-gray-100 dark:bg-gray-700 p-4 flex items-center justify-center">
                    <img class="max-w-full h-auto" src="{{ asset('storage/images/graph_trend.gif') }}">
                </div>
                <div class="bg-green-50 dark:bg-slate-100 p-4 text-center"> <!-- Changed dark mode colors -->
                    <p class="dark:text-gray-800">A ten period graph showing a Non-Existence trend.</p>
                </div>
            </div>

            <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">&nbsp;</p>

            <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">The longer the period the more small ups and downs there will be. The day to day people would react to and seek to remedy the small ups and downs based on a short trend. The overall in charge at a remote location would only react to a trend becoming evident on a many moths' graph. He uses these long trends to work out a strategy for the company. He ignores the small ups and downs and assigns the Condition to use based on this long trend.&nbsp;</p>

            <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">&nbsp;</p>

            <div class="bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-lg overflow-hidden mb-6 max-w-md mx-auto">
                <div class="bg-gray-100 dark:bg-gray-700 p-4 flex items-center justify-center">
                    <img class="max-w-full h-auto" src="{{ asset('storage/images/graph_stock.gif') }}">
                </div>
                <div class="bg-green-50 dark:bg-slate-100 p-4 text-center"> <!-- Changed dark mode colors -->
                    <p class="dark:text-gray-800">A long range graph will have many ups and downs.<br>The totality of this graph is a normal trend, but<br>you can find all the trends described below<br>in sections of this graph.&nbsp;&nbsp;&nbsp;</p>
                </div>
            </div>

            <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">&nbsp;</p>

            <h4 class="text-center font-bold text-lg mb-6 dark:text-white">Here are the rest of the trends:</h4>
            <div class="container mx-auto px-4">
                <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">&nbsp;</p>

                <!-- Single column layout for all trend images -->
                <div class="flex flex-col items-center gap-6 mb-8">
                    <!-- Danger Trend -->
                    <div class="bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-lg overflow-hidden max-w-md w-full">
                        <div class="bg-gray-100 dark:bg-gray-700 p-4 flex items-center justify-center h-48">
                            <img class="max-w-full h-auto" src="{{ asset('storage/images/graph_danger.gif') }}">
                        </div>
                        <div class="bg-green-50 dark:bg-slate-100 p-4 text-center"> <!-- Changed dark mode colors -->
                            <p class="dark:text-gray-800">Less down:&nbsp;<br>Danger trend.</p>
                        </div>
                    </div>

                    <!-- Emergency Trend -->
                    <div class="bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-lg overflow-hidden max-w-md w-full">
                        <div class="bg-gray-100 dark:bg-gray-700 p-4 flex items-center justify-center h-48">
                            <img class="max-w-full h-auto" src="{{ asset('storage/images/graph_emergency.gif') }}">
                        </div>
                        <div class="bg-green-50 dark:bg-slate-100 p-4 text-center"> <!-- Changed dark mode colors -->
                            <p class="dark:text-gray-800">&nbsp;Only slightly down:&nbsp;<br>Emergency trend.</p>
                        </div>
                    </div>

                    <!-- Normal Trend -->
                    <div class="bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-lg overflow-hidden max-w-md w-full">
                        <div class="bg-gray-100 dark:bg-gray-700 p-4 flex items-center justify-center h-48">
                            <img class="max-w-full h-auto" src="{{ asset('storage/images/graph_normal.gif') }}">
                        </div>
                        <div class="bg-green-50 dark:bg-slate-100 p-4 text-center"> <!-- Changed dark mode colors -->
                            <p class="dark:text-gray-800">Slightly up:&nbsp;<br>Normal trend.</p>
                        </div>
                    </div>

                    <!-- Affluence Trend -->
                    <div class="bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-lg overflow-hidden max-w-md w-full">
                        <div class="bg-gray-100 dark:bg-gray-700 p-4 flex items-center justify-center h-48">
                            <img class="max-w-full h-auto" src="{{ asset('storage/images/graph_affluence.gif') }}">
                        </div>
                        <div class="bg-green-50 dark:bg-slate-100 p-4 text-center"> <!-- Changed dark mode colors -->
                            <p class="dark:text-gray-800">Steeply up:<br>Affluence trend.</p>
                        </div>
                    </div>
                </div>

                <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">A Power Condition graph cannot be determined as a straight line trend. It would start as an Affluence that at some point would level off at a new and higher level. It would only reveal itself after some time has gone by:</p>

                <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">&nbsp;</p>

                <!-- Power Trend (already centered) -->
                <div class="bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-lg overflow-hidden mb-6 max-w-md mx-auto">
                    <div class="bg-gray-100 dark:bg-gray-700 p-4 flex items-center justify-center">
                        <img class="max-w-full h-auto" src="{{ asset('storage/images/graph_power.gif') }}">
                    </div>
                    <div class="bg-green-50 dark:bg-slate-100 p-4 text-center"> <!-- Changed dark mode colors -->
                        <p class="dark:text-gray-800">Affluence leveling off at a higher level:<br>Power trend.</p>
                    </div>
                </div>
            </div>

            <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">&nbsp;</p>

            <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">For all this to work the statistics themselves have to be subject to review on a regular basis. If using a certain combination of statistics tend to neglect some vital functions to the overall health of a business it may be necessary to reconsider which statistics to use or give them different weight. Here we are into what top management has to consider. For &quot;the man on the floor&quot; it is usually obvious what he has to produce in order to keep his job or survive. It's not money but something he can exchange for money, goods and services. This is usually easy to express as a statistic and that is what he uses in his daily activities.&nbsp;</p>

            <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">The stats will, besides giving him a tool to manage his own job by, also become something he can hold up to prove his worth to the company. This is his personal life insurance and a basic protection against injustices. Good managers give the good producers, the upstat people, more privileges and a little more freedom and will overlook any breakage of petty rules. They understand that the worker probably did it in order to get his work done and product completed. They will even consider it a reason to change the rules in general as a successful producer has shown what it takes. On the other hand a low producing worker, a downstat person, is not given such freedoms but is disciplined for only small infractions.&nbsp;</p>

            <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">A person that has proven to cause statistics and production to rise consistently whatever he is made to do is a great asset to a company. He can be declared <strong class="dark:text-white">Kha Khan</strong>. This is an old title used by Ghengis Khan and others as an award or distinction given to warriors of great bravery. They were forgiven the death penalty ten times should they ever face a trial for their lives in the future.</p>

            <hr class="border-gray-300 dark:border-gray-700 my-8">

            <h1 class="text-center font-bold text-2xl mb-6 dark:text-blue-900"><strong class="dark:blue-900 bg-white ">Bottom Line</strong></h1>

            <div class="text-center">
                <img alt="Lord Kelvin" class="w-full bg-white max-w-md mx-auto" src="{{ asset('storage/images/gg_measure1.png') }}">
            </div>
        </div>

</section>
