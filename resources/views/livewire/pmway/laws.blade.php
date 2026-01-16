
<div>
<div class="container mx-auto p-4" x-data="{ theme: localStorage.theme }" :class="{ 'dark': theme === 'dark' }">
    <h3 class="text-lg font-bold mb-2">Some of the core IT Laws</h3>
    <hr class="my-4 border-gray-300 dark:border-gray-700">

    <h5 class="text-md font-bold mb-2">Brook's Law</h5>
    <p class="mb-4 text-gray-600 dark:text-gray-400">
        Brooks' law is a claim about software project management according to which "adding manpower to a late software project makes it later".
        It was coined by Fred Brooks in his 1975 book The Mythical Man-Month. According to Brooks, there is an incremental person who, when added to a project, makes it take more, not less time.
        Brooks adds that "nine women can't make a baby in one month".
    </p>

    <h5 class="text-md font-bold mb-2">Parkinson's Law</h5>
    <p class="mb-4 text-gray-600 dark:text-gray-400">
        Is the adage that "work expands so as to fill the time available for its completion".
        It is sometimes applied to the growth of bureaucracy in an organization. A current form of the law is not the one Parkinson refers to by that name in the article, but a mathematical equation describing the rate at which bureaucracies expand over time.
    </p>

    <h5 class="text-md font-bold mb-2">Millar's Law</h5>
    <p class="mb-4 text-gray-600 dark:text-gray-400">
        George Miller, a professor of psychology, showed that, at any one time, we humans are capable of concentrating on only approximately seven chunks (units of information).
        However, a typical software artifact has far more than seven chunks. For example, a code artifact is likely to have considerably more than seven variables, and a requirements document is likely to have many more than seven requirements.
    </p>

    <h5 class="text-md font-bold mb-2">Linus's Law</h5>
    <p class="mb-4 text-gray-600 dark:text-gray-400">
        Linus's Law as described by Raymond is a claim about software development, named in honor of Linus Torvalds and formulated by Raymond in his essay and book 'The Cathedral and the Bazaar (1999)'.
        The law states that "given enough eyeballs, all bugs are shallow"; or more formally: "Given a large enough beta-tester and co-developer base, almost every problem will be characterized quickly and the fix will be obvious to someone."
    </p>

    <h5 class="text-md font-bold mb-2">Conway's Law</h5>
    <p class="mb-4 text-gray-600 dark:text-gray-400">
        Conway's law is an adage named after computer programmer Melvin Conway, who introduced the idea in 1967. It states that "organizations which design systems ... are constrained to produce designs which are copies of the communication structures of these organizations."
    </p>

    <h5 class="text-md font-bold mb-2">Goodheart's Law</h5>
    <p class="mb-4 text-gray-600 dark:text-gray-400">
        When a measure becomes the target, it ceases to be a good measure. I.e. All metrics of scientific evaluation are bound to be abused. Goodhart's law [...] states that when a feature of the area under inspection is picked as an indicator, then it inexorably ceases to function as that indicator because people start to game it.
    </p>

    <h5 class="text-md font-bold mb-2">Edwards W. Deming's 14 Observations for Management</h5>
    <div class="rTable mb-4">
        <div class="rTableBody">
            <div class="rTableRow">
                <div class="rTableCell"></div>
                <div class="rTableCell" align="center">
                    <img class="img-fluid" title="" src="{{ asset('storage/images/demingone.jpg') }}" onmouseover="this.src='{{ asset('storage/images/demingtwo.jpg') }}'" onmouseout="this.src='{{ asset('storage/images/demingthree.jpg') }}'" title="">
                </div>
                <div class="rTableCell">
                    <p align="center"><i><b>Hover your mouse over the Deming image above</b>.</i></p>
                    <p align="left"><a href="/cmmi">CM Level 2+,</a> differentiated from CM L1 per CMMi, is all about Process Focus for Productivity and Quality improvements; as opposed to "just do it now" - heroics.</p>
                    <p><a href="/redbeads">Click here for Dr. Deming's Red Bead Experiment</a>.<br> This is an essential concept to learn if you aim for higher levels of <a href="/gamestats">Productivity</a> and Quality and to be agile and lean.</p>
                </div>
            </div>
        </div>
    </div>

    <h5 class="text-md font-bold mb-2">Little's Law</h5>
    <p align="center"><img class="img-fluid" src="{{ asset('storage/images/littleslaw.jpg') }}"></p>
    <p><a href="/home/littleslaw" target="+blank">Click here for a video about Little's Law</a></p>
</div>


This code uses Tailwind CSS classes to style the content and make it responsive. The x-data and :class directives are used to toggle the dark class based on the theme variable stored in local storage.

You can toggle the theme by updating the localStorage.theme variable. For example, you can add a theme toggle button with the following code:


<button @click="localStorage.theme = (localStorage.theme === 'dark') ? 'light' : 'dark'">
    Toggle Theme
</button>
</div>
<!-- Content Container ends here -->
