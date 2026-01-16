{{-- resources/views/livewire/cmmi-level-one.blade.php --}}
<div>
    <div class="max-w-6xl mx-auto px-4 py-8">
        <h1 class="text-4xl font-semibold text-gray-900 dark:text-white mb-8">
            Capability Maturity Model integrated (CMMi) Level 1: <br>Rules of Project Management
        </h1>

        <hr class="border-gray-300 dark:border-gray-600 mb-6">

        {{-- Introduction --}}
        <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
            <h5 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                If you insist on playing the game at CMMi Level 1; 'just for fun,' here are some rules you should get to know!
            </h5>
        </div>
        <hr class="border-gray-300 dark:border-gray-600 mb-4">

        {{-- Quick Navigation - JavaScript Version --}}
        <div class="bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700 mb-8">
            <button
                    id="quickNavToggle"
                    class="w-full flex justify-between items-center p-6 text-left hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors rounded-lg"
            >
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Quick Navigation</h3>
                <svg id="quickNavArrow" class="w-5 h-5 text-gray-600 dark:text-gray-400 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>

            <div id="quickNavContent" class="px-6 pb-6 border-t border-gray-200 dark:border-gray-700 hidden">
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-2 pt-4">
                    @for($i = 1; $i <= 59; $i++)
                        <button
                                onclick="scrollToRule({{ $i }})"
                                class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 text-center bg-white dark:bg-gray-800 py-2 px-3 rounded border border-gray-200 dark:border-gray-700 transition-colors hover:bg-gray-50 dark:hover:bg-gray-700"
                        >
                            Rule {{ $i }}
                        </button>
                    @endfor
                </div>
            </div>
        </div>
        <hr class="border-gray-300 dark:border-gray-600 mb-4">

        <div class="space-y-6">

<div class="max-w-6xl mx-auto px-4 py-8">
    <h1 class="text-4xl font-semibold text-gray-900 dark:text-white mb-8">
        Capability Maturity Model integrated (CMMi) Level 1: <br>Rules of Project Management
    </h1>

    <hr class="border-gray-300 dark:border-gray-600 mb-6">

    {{-- Introduction --}}
    <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
        <h5 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
            If you insist on playing the game at CMMi Level 1; 'just for fun,' here are some rules you should get to know!
        </h5>
    </div>
    <hr class="border-gray-300 dark:border-gray-600 mb-4">

    {{-- Quick Navigation --}}
    <div class="bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700 mb-8">
        <button
                @click="quickNavOpen = !quickNavOpen"
                class="w-full flex justify-between items-center p-6 text-left hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors rounded-lg"
        >
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Quick Navigation</h3>
            <svg :class="{'rotate-180': quickNavOpen}" class="w-5 h-5 text-gray-600 dark:text-gray-400 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
        </button>

        <div x-show="quickNavOpen" x-transition class="px-6 pb-6">
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-2">
                @for($i = 1; $i <= 59; $i++)
                    <button
                            @click="scrollToElement('{{ $i }}')"
                            class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 text-center bg-white dark:bg-gray-800 py-2 px-3 rounded border border-gray-200 dark:border-gray-700 transition-colors hover:bg-gray-50 dark:hover:bg-gray-700"
                    >
                        Rule {{ $i }}
                    </button>
                @endfor
            </div>
        </div>
    </div>
    <hr class="border-gray-300 dark:border-gray-600 mb-4">

    <div class="space-y-6">

        {{-- Rule 1 --}}
        <div id="1" class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                1. It takes one woman nine months to have a baby. It cannot be done in one month by impregnating nine women.
            </h4>
            <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">
                Or as Frederick P. Brooks, Jr., in The Mythical Man Month (Chapter 1. Page 17.) said: The bearing of a child takes nine months, no matter how many women are assigned.
            </p>
            <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
                <img alt="You have to change your evil ways" class="img-fluid rounded-lg mx-auto dark:bg-white p-2" src="{{ asset('storage/images/changeyourways.png') }}">
            </div>
            <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mt-4">
                <span>"</span><em class="font-bold">Insanity</em>: I.e. doing the same thing over and over again and expecting different results." - Albert Einstein
            </p>
        </div>

        {{-- Rule 2 --}}
        <div id="2" class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                2. Nothing is impossible for the person who doesn't have to do it.
            </h4>
        </div>

        {{-- Rule 3 --}}
        <div id="3" class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                3. You can con a sucker into committing to an impossible deadline, but you cannot con him into meeting it.
            </h4>
            <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
                <img alt="" class="img-fluid rounded-lg mx-auto dark:bg-white p-2" src="{{ asset('storage/images/1percent.jpg') }}">
            </div>
        </div>

        {{-- Rule 4 --}}
        <div id="4" class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                4. At the heart of every large project is a small project trying to get out.
            </h4>
        </div>

        {{-- Rule 5 --}}
        <div id="5" class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                5. The more desperate the situation the more optimistic the situatee.
            </h4>
        </div>

        {{-- Rule 6 --}}
        <div id="6" class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                6. A problem shared is a buck passed.
            </h4>
            <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
                <img alt="" class="img-fluid rounded-lg mx-auto dark:bg-white p-2" src="{{ asset('storage/images/buck-passing.jpg') }}">
            </div>
        </div>

        {{-- Rule 7 --}}
        <div id="7" class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                7. A change freeze is like the abominable snowman: it is a myth and would anyway melt when heat is applied.
            </h4>
        </div>

        {{-- Rule 8 --}}
        <div id="8" class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                8. A user will tell you anything you ask about, but nothing more.
            </h4>
        </div>

        {{-- Rule 9 --}}
        <div id="9" class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                9. Of several possible interpretations of a communication, the least convenient is the correct one.
            </h4>
        </div>

        {{-- Rule 10 --}}
        <div id="10" class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                10. What you don't know can hurt you.
            </h4>
            <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4 text-center">
                <img src="{{ asset('storage/images/knowhurt.png') }}" onmouseover="this.src='{{ asset('storage/images/knowknow.png') }}'" onmouseout="this.src='{{ asset('storage/images/knowhurt.png') }}'" class="img-fluid rounded-lg mx-auto dark:bg-white p-2 cursor-pointer" alt="Knowledge hover effect">
                <p class="text-lg text-gray-700 dark:text-gray-300 mt-2">
                    I.e. <a href="/" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300" target="_blank">The Dunning-Kruger effect</a>
                </p>
            </div>
        </div>

        {{-- Rule 11 --}}
        <div id="11" class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                11. There's never enough time (or money) to do it right first time but there's always enough time (and money) to go back and do it again.
            </h4>
        </div>

        {{-- Rule 12 --}}
        <div id="12" class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                12. The bitterness of poor quality lasts long after the sweetness of making a date is forgotten.
            </h4>
        </div>

        {{-- Rule 13 --}}
        <div id="13" class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                13. I know that you believe that you understand what you think I said, but I am not sure you realize that what you heard is not what I meant.
            </h4>
            <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
                <img alt="" class="img-fluid rounded-lg mx-auto dark:bg-white p-2" src="{{ asset('storage/images/duh.png') }}">
            </div>
        </div>

        {{-- Rule 14 --}}
        <div id="14" class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                14. What is not on paper has not been said.
            </h4>
        </div>

        {{-- Rule 15 --}}
        <div id="15" class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                15. A little risk management saves a lot of fan cleaning.
            </h4>
            <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
                <img alt="" class="img-fluid rounded-lg mx-auto dark:bg-white p-2" src="{{ asset('storage/images/risksandshtf.jpg') }}">
            </div>
        </div>

        {{-- Rule 16 --}}
        <div id="16" class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                16. If you can keep your head while all about you are losing theirs, you haven't understood the plan.
            </h4>
        </div>

        {{-- Rule 17 --}}
        <div id="17" class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                17. If at first you don't succeed, remove all evidence you ever tried.
            </h4>
            <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
                <img alt="" class="img-fluid rounded-lg mx-auto dark:bg-white p-2" src="{{ asset('storage/images/trunkmusic.jpg') }}">
            </div>
        </div>

        {{-- Rule 18 --}}
        <div id="18" class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                18. Feather and down are padding, changes and contingencies will be real events.
            </h4>
        </div>

        {{-- Rule 19 --}}
        <div id="19" class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                19. There are no good project managers - only lucky ones.
            </h4>
        </div>

        {{-- Rule 20 --}}
        <div id="20" class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                20. The more you plan the luckier you get.
            </h4>
            <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
                <img alt="" width="550px" class="img-fluid rounded-lg mx-auto dark:bg-white p-2" src="{{ asset('storage/images/planthework.png') }}">
                <img alt="" width="350px" class="img-fluid rounded-lg mx-auto dark:bg-white p-2" src="{{ asset('storage/images/luck.jpg') }}">
            </div>
        </div>

        {{-- Rule 21 --}}
        <div id="21" class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                21. A project is one small step for the project sponsor, one giant leap for the project manager.
            </h4>
        </div>

        {{-- Rule 22 --}}
        <div id="22" class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                22. Good project management is not so much knowing what to do and when, as knowing what excuses to give and when.
            </h4>
        </div>

        {{-- Rule 23 --}}
        <div id="23" class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                23. If everything is going exactly to plan, something somewhere is going massively wrong.
            </h4>
        </div>

        {{-- Rule 24 --}}
        <div id="24" class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                24. Everyone asks for a strong project manager - when they get them they don't want them.
            </h4>
            <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
                <img alt="" class="img-fluid rounded-lg mx-auto dark:bg-white p-2" src="{{ asset('storage/images/drill.jpg') }}">
            </div>
        </div>

        {{-- Rule 25 --}}
        <div id="25" class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                25. Overtime is a figment of the naive project manager's imagination.
            </h4>
        </div>

        {{-- Rule 26 --}}
        <div id="26" class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                26. Quantitative project management is for predicting cost and schedule overruns well in advance.
            </h4>
        </div>

        {{-- Rule 27 --}}
        <div id="27" class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                27. The sooner you begin coding the later you finish.
            </h4>
        </div>

        {{-- Rule 28 --}}
        <div id="28" class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                28. Metrics are learned men's excuses.
            </h4>
        </div>

        {{-- Rule 29 --}}
        <div id="29" class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                29. For a project manager overruns are as certain as death and taxes.
            </h4>
        </div>

        {{-- Rule 30 --}}
        <div id="30" class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                30. Some projects finish on time in spite of project management best practices.
            </h4>
        </div>

        {{-- Rule 31 --}}
        <div id="31" class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                31. Fast - cheap - good - you can have any two.
            </h4>
            <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
                <img alt="" class="img-fluid rounded-lg mx-auto dark:bg-white p-2" src="{{ asset('storage/images/designertriangle.jpg') }}">
            </div>
        </div>

        {{-- Rule 32 --}}
        <div id="32" class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                32. There is such a thing as an unrealistic timescale.
            </h4>
        </div>

        {{-- Rule 33 --}}
        <div id="33" class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                33. The project would not have been started if the truth had been told about the cost and timescale.
            </h4>
        </div>

        {{-- Rule 34 --}}
        <div id="34" class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                34. A two year project will take three years, a three year project will never finish.
            </h4>
            <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
                <img alt="" class="img-fluid rounded-lg mx-auto dark:bg-white p-2" src="{{ asset('storage/images/the-five-year-project.png') }}">
            </div>
        </div>

        {{-- Rule 35 --}}
        <div id="35" class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                35. When the weight of the project paperwork equals the weight of the project itself, the project can be considered complete.
            </h4>
            <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
                <img alt="" class="img-fluid rounded-lg mx-auto dark:bg-white p-2" src="{{ asset('storage/images/paperwork.jpg') }}">
            </div>
        </div>

        {{-- Rule 36 --}}
        <div id="36" class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                36. A badly planned project will take three times longer than expected - a well planned project only twice as long as expected.
            </h4>
        </div>

        {{-- Rule 37 --}}
        <div id="37" class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                37. Warning: dates in a calendar are closer than they appear to be.
            </h4>
            <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
                <img alt="" class="img-fluid rounded-lg mx-auto dark:bg-white p-2" src="{{ asset('storage/images/datesarecloser.jpg') }}">
            </div>
        </div>

        {{-- Rule 38 --}}
        <div id="38" class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                38. Anything that can be changed will be changed until there is no time left to change anything.
            </h4>
        </div>

        {{-- Rule 39 --}}
        <div id="39" class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                39. There is no such thing as scope creep, only scope gallop.
            </h4>
            <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
                <img alt="" width="400px" class="img-fluid rounded-lg mx-auto dark:bg-white p-2" src="{{ asset('storage/images/creep.png') }}">
            </div>
        </div>

        {{-- Rule 40 --}}
        <div id="40" class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                40. A project gets a year late one day at a time.
            </h4>
            <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
                <img alt="" width="900px"  class="img-fluid rounded-lg mx-auto dark:bg-white p-2" src="{{ asset('storage/images/daybyday.jpg') }}">
            </div>
        </div>

        {{-- Rule 41 --}}
        <div id="41" class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                41. If you're 6 months late on a milestone due next week but really believe you can make it, you're a project manager.
            </h4>
        </div>

        {{-- Rule 42 --}}
        <div id="42" class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                42. No project has ever finished on time, within budget, to requirement - yours won't be the first to.
            </h4>
        </div>

        {{-- Rule 43 --}}
        <div id="43" class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                43. Activity is not achievement.
            </h4>
            <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
                <img alt="" class="img-fluid rounded-lg mx-auto dark:bg-white p-2" src="{{ asset('storage/images/stuck%20in%20mud.jpg') }}">
            </div>
        </div>

        {{-- Rule 44 --}}
        <div id="44" class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                44. Managing IT people at CMMi Level 1 is like herding cats.
            </h4>
            <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
                <img alt="" class="img-fluid rounded-lg mx-auto dark:bg-white p-2" src="{{ asset('storage/images/catz.png') }}">
            </div>
        </div>

        {{-- Rule 45 --}}
        <div id="45" class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                45. If you don't know how to do a task, start it, then ten people who know less than you will tell you how to do it.
            </h4>
        </div>

        {{-- Rule 46 --}}
        <div id="46" class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                46. If you don't plan, it doesn't work. If you do plan, it doesn't work either. Why plan!
            </h4>
        </div>

        {{-- Rule 47 --}}
        <div id="47" class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                47. The person who says it will take the longest and cost the most is the only one with a clue how to do the job.
            </h4>
        </div>

        {{-- Rule 48 --}}
        <div id="48" class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                48. The sooner you get behind schedule, the more time you have to make it up.
            </h4>
        </div>

        {{-- Rule 49 --}}
        <div id="49" class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                49. The nice thing about not planning is that failure comes as a complete surprise rather than being preceded by a period of worry and depression.
            </h4>
        </div>

        {{-- Rule 50 --}}
        <div id="50" class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                50. Good control reveals problems early - which only means you'll have longer to worry about them.
            </h4>
        </div>

        {{-- Rule 51 --}}
        <div id="51" class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                51. Murphy's Law of shortcuts: The problems associated with a shortcut are inversely proportional to the shortness of the cut.
            </h4>
            <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
                <img alt="" width="400px" class="img-fluid rounded-lg mx-auto dark:bg-white p-2" src="{{ asset('storage/images/cutcorners.png') }}">
            </div>
        </div>

        {{-- Rule 52 --}}
        <div id="52" class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                52. Murphy's Law of advice about arguing with idiots:<br>
                -- Never argue with an idiot.<br>
                -- They will drag you down to their level and beat you up with facts!
            </h4>
        </div>

        {{-- Rule 53 --}}
        <div id="53" class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                53. Adding more people to a software project makes it finish quicker!<br>
                Actually NO! This is false!<br>
                If fact Brooks's Law states: Adding manpower to a late software project makes it later.
            </h4>
            <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
                <img alt="" width="600px" class="img-fluid rounded-lg mx-auto dark:bg-white p-2 mt-4" src="{{ asset('storage/images/brooksgraph.png') }}">
                <img alt="" class="img-fluid rounded-lg mx-auto dark:bg-white p-2" src="{{ asset('storage/images/onemonth.png') }}">

            </div>
        </div>

        {{-- Rule 54 --}}
        <div id="54" class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                54. Remember why you planned!
            </h4>
            <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
                <img alt="" class="img-fluid rounded-lg mx-auto dark:bg-white p-2" src="{{ asset('storage/images/alligatorsr.png') }}">
            </div>
        </div>

        {{-- Rule 55 --}}
        <div id="55" class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                55. The SSDD formula!
            </h4>
            <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
                <img alt="" class="img-fluid rounded-lg mx-auto dark:bg-white p-2" src="{{ asset('storage/images/ssdd.gif') }}">
            </div>
            <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mt-4">
                I.e. Because the Executive <a href="/red-bead-experiment" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300" target="_blank" >do not have the 'gumption' to remove the Red Beads</a>, nothing ever changes (I.e. SSDD), fires rage and tired firefighters are the hero's - until they burn out, ready to be replaced by the next hero. Or is there a <a href="/cmmi-landing" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300" target="_blank" >CMMi Level Zero</a> reason why nothing changes for the better?
            </p>

            {{-- Gumption definition --}}
            <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4 mt-4">
                <h5 class="text-lg font-bold text-gray-900 dark:text-white mb-2">gump•tion</h5>
                <p class="text-gray-700 dark:text-gray-300">
                    <em>Pronunciation:</em> (gump'sh<em>u</em>n),<br>
                    <em>n. Informal.</em><br>
                    <strong>1.</strong> initiative; aggressiveness; resourcefulness: <em>With his gumption he'll make a success of himself.</em><br>
                    <strong>2.</strong> courage; spunk; guts: <em>It takes gumption to quit a high-paying job.</em><br>
                    <strong>3.</strong> common sense; shrewdness.
                </p>
            </div>
        </div>

        {{-- Rule 56 --}}
        <div id="56" class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                56. This one is self explanatory.
            </h4>
            <p class="text-lg text-gray-700 dark:text-gray-300 mb-4 italic">
                Hover your mouse cursor over the image if you do not get it.
            </p>
            <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4 text-center">
                <img src="{{ asset('storage/images/manyrabbits.jpg') }}" onmouseover="this.src='{{ asset('storage/images/2rabbits.jpg') }}'" onmouseout="this.src='{{ asset('storage/images/manyrabbits.jpg') }}'" class="img-fluid rounded-lg mx-auto dark:bg-white p-2 cursor-pointer" alt="Rabbits hover effect">
            </div>
        </div>

        {{-- Rule 57 --}}
        <div id="57" class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                57. And my all time CMMi Level 1 best!
            </h4>
            <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4 text-center">
                <a href="/home/pdca">
                    <img alt="Lack of planning" class="img-fluid rounded-lg mx-auto dark:bg-white p-2 hover:opacity-90 transition-opacity" src="{{ asset('storage/images/a%20lack%20of%20planning.jpeg') }}" title="Click here for more information on PDCA.">
                </a>
            </div>
            <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mt-4">
                The image above goes hand in hand with the concept of the CMMi L1 quest for a HERO and the stupidity of the Hospital Pass:
            </p>

            {{-- Hospital Pass Images --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
                    <img alt="Hospital pass diagram" class="img-fluid rounded-lg mx-auto dark:bg-white p-2" src="{{ asset('storage/images/hospital-pass%201a.png') }}">
                </div>
                <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
                    <img alt="Hospital pass" class="img-fluid rounded-lg mx-auto dark:bg-white p-2" src="{{ asset('storage/images/hospital-pass%201.png') }}">
                </div>
                <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
                    <img alt="Rugby hospital pass" class="img-fluid rounded-lg mx-auto dark:bg-white p-2" src="{{ asset('storage/images/hospital%20pass%20rubgy.jpg') }}">
                </div>
                <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
                    <img alt="American football hospital pass" class="img-fluid rounded-lg mx-auto dark:bg-white p-2" src="{{ asset('storage/images/hospitalpassamericanfootball.jpg') }}">
                </div>
            </div>

            <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4 mt-4">
                <img alt="Under the bus" class="img-fluid rounded-lg mx-auto dark:bg-white p-2" src="{{ asset('storage/images/underthebus.png') }}">
            </div>
        </div>

        {{-- Rule 58 --}}
        <div id="58" class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                58. And when you start to feel really uneasy; per the advice from Kenny Rogers.
            </h4>
            <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4 text-center">
                <img alt="Know when to run" class="img-fluid rounded-lg mx-auto dark:bg-white p-2" src="{{ asset('storage/images/knowrun.jpg') }}">
            </div>
        </div>

        {{-- Rule 59 --}}
        <div id="59" class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                59. And finally when you are just about to lose your mind; and running away is not a viable option for now.
            </h4>
            <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4 text-center">
                <img alt="Serenity prayer" class="img-fluid rounded-lg mx-auto dark:bg-white p-2" src="{{ asset('storage/images/serenity.png') }}">
            </div>
        </div>

    </div>

    {{-- Conclusion Section --}}
    <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 border border-gray-200 dark:border-gray-700 mt-8">
        <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300">
            <a href="#55" @click.prevent="scrollToElement('55')" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">c.f. #55 above</a>. If you are in Information Technology provision then, between 55 and 58 you will immediately see the problem.
        </p>
        <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mt-4">
            I.e. by not making the break and running away you have created a never ending loop that operates and glorifies the acceptance of CMMi Level 1 incompetence.
        </p>
        <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mt-4">
            The ONLY WAY to sort this out is to install PP and PMC at CMMi Level 2. The only way to install PP and PMC at CMMi Level 2 is by using the <a href="/the-pmway?slide=3" target="_blank" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">EPMS</a>.
        </p>
{{--        <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mt-4">--}}
{{--            To kill CMMi Level 1 STONE DEAD use PP and PMC at CMMi Level 2 in combination with <a href="/home/evm" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">EVM</a>. I suggest that <a href="/home/princepmboksoup" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">PMBoK as the ingredients and PRINCE2 as the recipe</a> is how to install processes for PP and PMC that will ensure CMMi Level 2 competence (<a href="/home/stats" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">performance stats</a>) remains firmly in place.--}}
{{--        </p>--}}
    </div>

</div>
<script>
    // Quick Navigation Toggle
    document.getElementById('quickNavToggle').addEventListener('click', function() {
        const content = document.getElementById('quickNavContent');
        const arrow = document.getElementById('quickNavArrow');

        content.classList.toggle('hidden');
        arrow.classList.toggle('rotate-180');
    });

    // Scroll to Rule Function
    function scrollToRule(ruleNumber) {
        // Close quick nav
        document.getElementById('quickNavContent').classList.add('hidden');
        document.getElementById('quickNavArrow').classList.remove('rotate-180');

        // Wait for nav to close, then scroll
        setTimeout(() => {
            const element = document.getElementById(ruleNumber.toString());
            if (element) {
                const header = document.querySelector('header, nav, [class*=\"header\"]');
                const headerHeight = header ? header.offsetHeight : 0;
                const elementPosition = element.offsetTop - headerHeight;

                window.scrollTo({
                    top: elementPosition,
                    behavior: 'smooth'
                });

                // Update URL without page reload
                history.replaceState(null, null, '#' + ruleNumber);
            }
        }, 200);
    }

    // Handle page load with hash
    document.addEventListener('DOMContentLoaded', function() {
        if (window.location.hash) {
            setTimeout(() => {
                const ruleNumber = window.location.hash.substring(1);
                const element = document.getElementById(ruleNumber);
                if (element) {
                    const header = document.querySelector('header, nav, [class*=\"header\"]');
                    const headerHeight = header ? header.offsetHeight : 0;
                    const elementPosition = element.offsetTop - headerHeight;

                    window.scrollTo({
                        top: elementPosition,
                        behavior: 'instant'
                    });
                }
            }, 100);
        }
    });

    // Handle internal link clicks
    document.addEventListener('click', function(e) {
        if (e.target.matches('a[href^="#"]')) {
            e.preventDefault();
            const ruleNumber = e.target.getAttribute('href').substring(1);
            scrollToRule(parseInt(ruleNumber));
        }
    });
</script>
</div>
    </div>
</div>



