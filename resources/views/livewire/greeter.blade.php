<section class="w-full px-0 mx-0">
    {{--    <x-page-heading>--}}
    {{--        <x-slot:title>--}}

    {{--        </x-slot:title>--}}
    {{--        <x-slot:subtitle>--}}
    {{--           --}}
    {{--        </x-slot:subtitle>--}}
    {{--        <x-slot:buttons>--}}

    {{--        </x-slot:buttons>--}}
    {{--    </x-page-heading>--}}

    <div>
        <div>

            <div class="grid grid-cols-12">
                <div class="col-start-3 col-span-5">  <form wire:submit="changeName()" class="" >
                        <flux:select custom wire:model="greeting">
                            <option value="Hello">Hello</option>
                            <option value="Hi">Hi</option>
                            <option value="Hey">Hey</option>
                            <option value="Howdy" selected>Howdy</option>
                        </flux:select>
                        <flux:separator horizontal class="my-2 border-0" variant="subtle" />
                        <flux:input type="text" class="border rounded-md text-white" wire:model="name" >
                        </flux:input>
                        <flux:separator horizontal class="my-2 border-0" variant="subtle" />
                        <flux:button variant="primary" type="submit" class="text-white font-medium rounded-md px-4 py-2 bg-grey-600" >
                            Greet
                        </flux:button>
                    </form>
                    @if ($name !== '')
                        <div>
                            {{$greeting}}, {{$name}}!
                        </div>
                    @endif</div>
            </div>


        </div>


        <br>
    <br>
    <br>
    <br>
<h1 class="text-3xl bm-10">Below are the TW classes</h1>

        <div class="bg-red-300">This is a div element</div>




        <h2 class="text-4x1 font-bold text-center py-8">
            Grid
        </h2>


    <div class="grid grid-cols-12 grid-rows-4 gap-2 bg-black">
        <!-- Row 1 -->
        <div class="col-span-1 text-white">Col 1</div>
        <div class="col-span-1 text-white">Col 2</div>
        <div class="col-span-1 text-white">Col 3</div>
        <div class="col-span-1 text-white">Col 4</div>
        <div class="col-span-1 text-white">Col 5</div>
        <div class="col-span-1 text-white">Col 6</div>
        <div class="col-span-1 text-white">Col 7</div>
        <div class="col-span-1 text-white">Col 8</div>
        <div class="col-span-1 text-white">Col 9</div>
        <div class="col-span-1 text-white">Col 10</div>
        <div class="col-span-1 text-white">Col 11</div>
        <div class="col-span-1 text-white">Col 12</div>

        <!-- Row 2 -->
        <div class="col-span-1 text-white">Col 1</div>
        <div class="col-span-1 text-white">Col 2</div>
        <div class="col-span-1 text-white">Col 3</div>
        <div class="col-span-1 text-white">Col 4</div>
        <div class="col-span-1 text-white">Col 5</div>
        <div class="col-span-1 text-white">Col 6</div>
        <div class="col-span-1 text-white">Col 7</div>
        <div class="col-span-1 text-white">Col 8</div>
        <div class="col-span-1 text-white">Col 9</div>
        <div class="col-span-1 text-white">Col 10</div>
        <div class="col-span-1 text-white">Col 11</div>
        <div class="col-span-1 text-white">Col 12</div>

        <!-- Row 3 -->
        <div class="col-span-1 text-white">Col 1</div>
        <div class="col-span-1 text-white">Col 2</div>
        <div class="col-span-1 text-white">Col 3</div>
        <div class="col-span-1 text-white">Col 4</div>
        <div class="col-span-1 text-white">Col 5</div>
        <div class="col-span-1 text-white">Col 6</div>
        <div class="col-span-1 text-white">Col 7</div>
        <div class="col-span-1 text-white">Col 8</div>
        <div class="col-span-1 text-white">Col 9</div>
        <div class="col-span-1 text-white">Col 10</div>
        <div class="col-span-1 text-white">Col 11</div>
        <div class="col-span-1 text-white">Col 12</div>

        <!-- Row 4 -->
        <div class="col-span-1 text-white">Col 1</div>
        <div class="col-span-1 text-white">Col 2</div>
        <div class="col-span-1 text-white">Col 3</div>
        <div class="col-span-1 text-white">Col 4</div>
        <div class="col-span-1 text-white">Col 5</div>
        <div class="col-span-1 text-white">Col 6</div>
        <div class="col-span-1 text-white">Col 7</div>
        <div class="col-span-1 text-white">Col 8</div>
        <div class="col-span-1 text-white">Col 9</div>
        <div class="col-span-1 text-white">Col 10</div>
        <div class="col-span-1 text-white">Col 11</div>
        <div class="col-span-1 text-white">Col 12</div>
    </div>


    <h2 class="text-4x1 font-bold text-center py-8">
        Flexbox
    </h2>

    <div class="flex flex-wrap">
        <div class="bg-red-500 text-white h-26">
            <p>
                Flex Item 1
            </p>
        </div>
        <div class="bg-blue-500 text-white h-26">
            <p>
                Flex Item 2
            </p>
        </div>
        <div class="bg-yellow-500 text-white h-26">
            <p>
                Flex Item 3
            </p>
        </div>
    </div>


        <h1>And example of TW and building out a home page</h1>

        <!DOCTYPE html>
        <html lang="en" class="dark">
        <head>
            <meta charset="UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <link rel="stylesheet" href="./output.css" />
            <title>Document</title>
        </head>
        <body class="dark:bg-gray-900">
        <nav class="shadow-lg bg-white dark:bg-gray-900">
            <!--Container for the entire nav-->
            <div class="max-w-6xl mx-auto px-4">
                <!--Container for the left and right section-->
                <div class="flex justify-between">
                    <!--Left Section-->
                    <div class="flex">
                        <a class="flex items-center py-4 px-2" href="">
                            <img class="h-8 w-8 mr-2" src="./images/logo.png" alt="" />
                            <span class="text-lg font-semibold text-gray-500 dark:text-white"
                            >Prime Properties</span
                            >
                        </a>
                    </div>
                    <!--Right Section-->
                    <div class="hidden md:flex space-x-4 items-center">
                        <a
                            class="px-2 py-4 text-gray-500 dark:text-white font-semibold border-b-4 border-green-500 hover:text-green-500 transition duration-300"
                            href=""
                        >Home</a
                        >
                        <a
                            class="px-2 py-4 text-gray-500 dark:text-white font-semibold hover:text-green-500 transition duration-300"
                            href=""
                        >Services</a
                        >
                        <a
                            class="px-2 py-4 text-gray-500 dark:text-white font-semibold hover:text-green-500 transition duration-300"
                            href=""
                        >About</a
                        >
                        <a
                            class="px-2 py-4 text-gray-500 dark:text-white font-semibold hover:text-green-500 transition duration-300"
                            href=""
                        >Contact</a
                        >

                        <button
                            id="toggleDarkMode"
                            class="px-2 py-4 text-gray-500 dark:text-white font-semibold hover:text-green-500 transition duration-300"
                        >
                            ☀️ Toggle Dark Mode
                        </button>
                    </div>
                </div>
            </div>
        </nav>

        <!--Site Banner-->
        <main
            class="mt-10 px-4 mx-auto max-w-7xl md:mt-16 lg:mt-20 lg:px-8 xl:mt-18"
        >
            <div class="sm:text-center lg:text-left">
                <h1 class="text-4xl tracking-tight font-extrabold md:text-6xl">
          <span class="block xl:inline dark:text-white"
          >Premium Properties</span
          >
                    <span class="block text-green-500 xl:inline">Non-premium Prices</span>
                </h1>
                <p
                    class="mt-3 text-base dark:text-white text-gray-500 sm:text-lg sm:max-w-xl sm:mx-auto md:text-xl md:mt-5 md:text-xl lg:mx-0"
                >
                    At prime properties, we ensure that our clients get the best
                    properties at affordable prices. Luxury is our priority and budget is
                    our constraint. Pick and choose from 1000+ properties across the
                    globe.
                </p>
                <div class="sm:flex sm:justify-center mt-5 lg:justify-start">
                    <div class="m-2">
                        <a
                            class="bg-green-500 dark:bg-green-800 text-white px-8 py-3 rounded-md"
                            href=""
                        >View Properties</a
                        >
                    </div>
                    <div class="m-2">
                        <a
                            class="bg-green-300 text-green-700 dark:text-green-900 px-8 py-3 rounded-md"
                            href=""
                        >Explore Locations</a
                        >
                    </div>
                </div>
            </div>
        </main>

        <!--Section heading-->
        <div class="mt-5 p-10 flex justify-center">
            <h2 class="text-3xl text-gray-500 mb-2 dark:text-white">
                Recent Properties
            </h2>
        </div>
        <!--Card Section-->
        <!--Card Container-->
        <div class="grid p-10 sm:grid-cols-1 md:grid-cols-3 gap-5">
            <!--Card-->
            <div class="shadow-lg rounded overflow-hidden">
                <img class="w-full" src="./images/home1.jpg" alt="" />
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">Orchid Villa</div>
                    <p class="text-gray-700 dark:text-white">
                        Located in the suburbs of california, orchild villa offers luxury
                        with a modern touch. Equipped with green lighting and rainwater
                        harvesting system, this property is eco-friendly
                    </p>
                </div>

                <div class="px-6 pt-4">
          <span class="text-green-300 font-bold text-sm py-1 mr-2"
          >$4,500,000</span
          >
                </div>
                <div class="px-6 pt-4 pb-2">
          <span class="bg-gray-200 rounded-full px-3 py-1 font-semibold"
          >7 Beds</span
          >
                    <span class="bg-gray-200 rounded-full px-3 py-1 font-semibold"
                    >7 Baths</span
                    >
                </div>
                <div class="px-6 pt-4 pb-10">
                    <button
                        class="bg-green-500 rounded-full px-3 py-1 font-bold text-white mb-2"
                    >
                        View Property
                    </button>
                </div>
            </div>
            <!--Card-->
            <!--Card-->
            <div class="shadow-lg rounded overflow-hidden">
                <img class="w-full" src="./images/home2.jpg" alt="" />
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">Orchid Villa</div>
                    <p class="text-gray-700 dark:text-white">
                        Located in the suburbs of california, orchild villa offers luxury
                        with a modern touch. Equipped with green lighting and rainwater
                        harvesting system, this property is eco-friendly
                    </p>
                </div>

                <div class="px-6 pt-4">
          <span class="text-green-300 font-bold text-sm py-1 mr-2"
          >$4,500,000</span
          >
                </div>
                <div class="px-6 pt-4 pb-2">
          <span class="bg-gray-200 rounded-full px-3 py-1 font-semibold"
          >7 Beds</span
          >
                    <span class="bg-gray-200 rounded-full px-3 py-1 font-semibold"
                    >7 Baths</span
                    >
                </div>
                <div class="px-6 pt-4 pb-10">
                    <button
                        class="bg-green-500 rounded-full px-3 py-1 font-bold text-white mb-2"
                    >
                        View Property
                    </button>
                </div>
            </div>
            <!--Card-->
            <!--Card-->
            <div class="shadow-lg rounded overflow-hidden">
                <img class="w-full" src="./images/home3.jpg" alt="" />
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">Orchid Villa</div>
                    <p class="text-gray-700 dark:text-white">
                        Located in the suburbs of california, orchild villa offers luxury
                        with a modern touch. Equipped with green lighting and rainwater
                        harvesting system, this property is eco-friendly
                    </p>
                </div>

                <div class="px-6 pt-4">
          <span class="text-green-300 font-bold text-sm py-1 mr-2"
          >$4,500,000</span
          >
                </div>
                <div class="px-6 pt-4 pb-2">
          <span class="bg-gray-200 rounded-full px-3 py-1 font-semibold"
          >7 Beds</span
          >
                    <span class="bg-gray-200 rounded-full px-3 py-1 font-semibold"
                    >7 Baths</span
                    >
                </div>
                <div class="px-6 pt-4 pb-10">
                    <button
                        class="bg-green-500 rounded-full px-3 py-1 font-bold text-white mb-2"
                    >
                        View Property
                    </button>
                </div>
            </div>
            <!--Card-->
        </div>
        <!--Card Container-->
        <div
            class="h-screen py-20"
            style="
        background-image: linear-gradient(
            rgba(0, 0, 0, 0.5),
            rgba(0, 0, 0, 0.5)
          ),
          url('images/luxury.jpg');
      "
        >
            <div class="container mx-auto px-6 mt-40">
                <h2 class="text-4xl font-bold mb-2 text-white">
                    Experience Luxury Like Never Before
                </h2>
                <h3 class="text-2xl mb-8 text-white">
                    50+ Exotic Locations Across The Globe
                </h3>
                <button
                    class="text-white uppercase tracking-wider font-bold border-2 border-white px-8 py-4"
                >
                    Explore Locations
                </button>
            </div>
        </div>

        <!--Section heading-->
        <div class="mt-5 p-10 flex justify-center">
            <h2 class="text-3xl text-gray-500 mb-2 dark:text-white">Locations</h2>
        </div>
        <!--Cards container-->
        <div class="grid p-10 sm:grid-cols-1 md:grid-cols-3 gap-5">
            <div class="shadow-lg rounded overflow-hidden">
                <img class="w-full" src="./images/newyork.jpg" alt="" />
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2 dark:text-gray-200">New York</div>
                    <p class="text-gray-700 dark:text-white">
                        Located in the suburbs of california, orchild villa offers luxury
                        with a modern touch. Equipped with green lighting and rainwater
                        harvesting system, this property is eco-friendly
                    </p>
                </div>
            </div>

            <div class="shadow-lg rounded overflow-hidden">
                <img class="w-full" src="./images/chicago.jpg" alt="" />
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2 dark:text-gray-200">Chicago</div>
                    <p class="text-gray-700 dark:text-white">
                        Located in the suburbs of california, orchild villa offers luxury
                        with a modern touch. Equipped with green lighting and rainwater
                        harvesting system, this property is eco-friendly
                    </p>
                </div>
            </div>

            <div class="shadow-lg rounded overflow-hidden">
                <img class="w-full" src="./images/california.jpg" alt="" />
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2 dark:text-gray-200">
                        California
                    </div>
                    <p class="text-gray-700 dark:text-white">
                        Located in the suburbs of california, orchild villa offers luxury
                        with a modern touch. Equipped with green lighting and rainwater
                        harvesting system, this property is eco-friendly
                    </p>
                </div>
            </div>
        </div>
        <!--Cards container-->

        <!--Discount Banner-->
        <div
            class="py-20 bg-gradient-to-r from-green-500 to-bg-green-200 dark:bg-gradient-to-r dark:from-gray-800 dark:to-gray-900"
        >
            <div class="container mx-auto px-6 pt-40">
                <h2 class="text-4xl text-white font-bold mb-2">
                    Save upto 50% on broker commissions
                </h2>
                <h3 class="text-2xl mb-8 text-white">Lowest Brokerage Fees</h3>
                <button
                    class="bg-white border-2 uppercase px-8 py-4 font-bold rounded-2xl tracking-wider shadow-lg"
                >
                    Enquire
                </button>
            </div>
        </div>
        <!--Discount Banner-->
        <div class="mt-5 p-10 flex justify-center">
            <h2 class="text-3xl text-gray-500 mb-2 dark:text-white">
                What clients say about us ?
            </h2>
        </div>
        <!--Testimonials-->
        <div class="p-10 grid sm:grid-cols-1 md:grid-cols-3 gap-5">
            <!--Testimonial 1-->
            <div class="shadow-lg rounded-xl p-4 w-72 mx-auto dark:bg-slate-800">
                <p class="dark:text-gray-500">
                    <span class="text-green-500 text-lg font-bold">"</span>
                    This is one of the best property websites I have ever used. Kudos to
                    prime properties and the team
                    <span class="text-green-500 text-lg font-bold">"</span>
                </p>
                <div class="flex bg-green-100 mt-2 rounded-full mb-4 dark:bg-gray-700">
                    <div>
                        <img
                            class="h-10 w-10 rounded-full mx-auto"
                            src="./images/avatar.png"
                            alt=""
                        />
                    </div>
                    <div class="flex flex-col justify-between ml-2">
                        <span class="text-sm text-green-500">Ashutosh</span>
                        <span class="text-xs dark:text-white">Director</span>
                    </div>
                </div>
            </div>
            <!--Testimonial 1-->
            <!--Testimonial 2-->
            <div class="shadow-lg rounded-xl p-4 w-72 mx-auto dark:bg-slate-800">
                <p class="dark:text-gray-500">
                    <span class="text-green-500 text-lg font-bold">"</span>
                    This is one of the best property websites I have ever used. Kudos to
                    prime properties and the team
                    <span class="text-green-500 text-lg font-bold">"</span>
                </p>
                <div class="flex bg-green-100 mt-2 rounded-full mb-4 dark:bg-gray-700">
                    <div>
                        <img
                            class="h-10 w-10 rounded-full mx-auto"
                            src="./images/avatar.png"
                            alt=""
                        />
                    </div>
                    <div class="flex flex-col justify-between ml-2">
                        <span class="text-sm text-green-500">Ashutosh</span>
                        <span class="text-xs dark:text-white">Director</span>
                    </div>
                </div>
            </div>
            <!--Testimonial 3-->
            <div class="shadow-lg rounded-xl p-4 w-72 mx-auto dark:bg-slate-800">
                <p class="dark:text-gray-500">
                    <span class="text-green-500 text-lg font-bold">"</span>
                    This is one of the best property websites I have ever used. Kudos to
                    prime properties and the team
                    <span class="text-green-500 text-lg font-bold">"</span>
                </p>
                <div class="flex bg-green-100 mt-2 rounded-full mb-4 dark:bg-gray-700">
                    <div>
                        <img
                            class="h-10 w-10 rounded-full mx-auto"
                            src="./images/avatar.png"
                            alt=""
                        />
                    </div>
                    <div class="flex flex-col justify-between ml-2">
                        <span class="text-sm text-green-500">Ashutosh</span>
                        <span class="text-xs dark:text-white">Director</span>
                    </div>
                </div>
            </div>
        </div>
        <!--Testimonials-->

        <!--Contact form section-->
        <!--Section heading-->
        <div class="mt-5 p-10 flex justify-center">
            <h2 class="text-3xl text-gray-500 mb-2 dark:text-white">Contact us</h2>
        </div>
        <div class="bg-green-300 mt-5 flex justify-center p-10 dark:bg-gray-800">
            <form class="max-w-lg" action="">
                <div class="flex flex-wrap">
                    <div class="w-full px-3 md:w-1/2">
                        <label
                            class="dark:text-white block uppercase text-xs text-gray-700 font-bold mb-2 tracking-wider"
                            for=""
                        >First Name</label
                        >
                        <input
                            class="block bg-white mb-3 py-3 px-4 rounded text-gray-700 w-full"
                            placeholder="Jane"
                            type="text"
                            name=""
                            id=""
                        />
                        <p class="text-sm text-green-500 italic">
                            Please fill out this field
                        </p>
                    </div>
                    <div class="w-full px-3 md:w-1/2">
                        <label
                            class="dark:text-white block uppercase text-xs text-gray-700 font-bold mb-2 tracking-wider"
                            for=""
                        >Last Name</label
                        >
                        <input
                            class="block bg-white mb-3 py-3 px-4 rounded text-gray-700 w-full"
                            type="text"
                            placeholder="Ford"
                            name=""
                            id=""
                        />
                    </div>
                </div>

                <div class="w-full px-3 mt-3">
                    <label
                        class="dark:text-white block uppercase text-xs text-gray-700 font-bold mb-2 tracking-wider"
                        for=""
                    >Email</label
                    >
                    <input
                        class="block bg-white mb-3 py-3 px-4 rounded text-gray-700 w-full"
                        type="text"
                        placeholder="example@example.com"
                        name=""
                        id=""
                    />
                    <p class="text-sm text-green-500 italic">
                        Please fill out this field
                    </p>
                </div>

                <div class="px-3 mt-4">
                    <label
                        class="dark:text-white block uppercase text-xs text-gray-700 font-bold mb-2 tracking-wider"
                        for=""
                    >Message</label
                    >
                    <textarea
                        class="block no-resize resize-none h-48 bg-white mb-3 py-3 px-4 rounded text-gray-700 w-full"
                        type="text"
                        placeholder="example@example.com"
                        name=""
                        id=""
                    ></textarea>
                    <p class="text-sm text-green-500 italic">
                        Please fill out this field
                    </p>
                </div>

                <button
                    class="bg-green-400 sm:w-full md:w-1/4 text-white px-2 mx-2 py-4 rounded"
                >
                    Send
                </button>
            </form>
        </div>

        <!--Site footer-->
        <footer class="pt-40 px-4">
            <div
                class="container flex flex-col lg:flex-row justify-between mx-auto space-y-8"
            >
                <div class="lg:w-1/3">
                    <a class="flex justify-center" href="">
                        <div>
                            <img src="images/logo.png" class="h-8 w-8 mr-2" alt="" />
                        </div>
                        <span class="font-semibold text-gray-500 text-2xl dark:text-white"
                        >Prime Properties</span
                        >
                    </a>
                </div>
                <div class="lg:w-2/3 grid grid-cols-4">
                    <div class="space-y-3">
                        <h3 class="text-green-500 uppercase tracking-wider">Products</h3>
                        <ul class="space-y-1 dark:text-white">
                            <li>
                                <a href="">Features</a>
                            </li>
                            <li>
                                <a href="">Integrations</a>
                            </li>
                            <li>
                                <a href="">Pricing</a>
                            </li>
                            <li>
                                <a href="">FAQ</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <div class="space-y-3">
                            <h3 class="text-green-500 uppercase tracking-wider">Company</h3>
                            <ul class="space-y-1 dark:text-white">
                                <li>
                                    <a href="">Features</a>
                                </li>
                                <li>
                                    <a href="">Integrations</a>
                                </li>
                                <li>
                                    <a href="">Pricing</a>
                                </li>
                                <li>
                                    <a href="">FAQ</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div>
                        <div class="space-y-3">
                            <h3 class="text-green-500 uppercase tracking-wider">
                                Developers
                            </h3>
                            <ul class="space-y-1 dark:text-white">
                                <li>
                                    <a href="">Features</a>
                                </li>
                                <li>
                                    <a href="">Integrations</a>
                                </li>
                                <li>
                                    <a href="">Pricing</a>
                                </li>
                                <li>
                                    <a href="">FAQ</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div>
                        <div class="space-y-3">
                            <h3 class="text-green-500 uppercase tracking-wider">
                                Social Media
                            </h3>
                            <div class="flex justify-items-start space-x-3">
                                <a href="">
                                    <?xml version="1.0" ?><!DOCTYPE svg PUBLIC '-//W3C//DTD SVG 1.1//EN' 'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'>
                                    <svg
                                        class="w-5 h-5"
                                        height="100%"
                                        style="
                      fill-rule: evenodd;
                      clip-rule: evenodd;
                      stroke-linejoin: round;
                      stroke-miterlimit: 2;
                    "
                                        version="1.1"
                                        viewBox="0 0 512 512"
                                        width="100%"
                                        xml:space="preserve"
                                        xmlns="http://www.w3.org/2000/svg"
                                        xmlns:serif="http://www.serif.com/"
                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                    >
                    <path
                        d="M374.244,285.825l14.105,-91.961l-88.233,0l0,-59.677c0,-25.159 12.325,-49.682 51.845,-49.682l40.116,0l0,-78.291c0,0 -36.407,-6.214 -71.213,-6.214c-72.67,0 -120.165,44.042 -120.165,123.775l0,70.089l-80.777,0l0,91.961l80.777,0l0,222.31c16.197,2.541 32.798,3.865 49.709,3.865c16.911,0 33.511,-1.324 49.708,-3.865l0,-222.31l74.128,0Z"
                        style="fill-rule: nonzero"
                    />
                  </svg>
                                </a>
                                <a href="">F</a>
                                <a href="">F</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--Site footer-->

        <hr class="mt-20" />

        <div class="text-center text-green-500 text-sm py-6">@Copyright 2025</div>

        <script>
            const toggleDarkMode = document.getElementById("toggleDarkMode");
            toggleDarkMode.addEventListener("click", () => {
                document.documentElement.classList.toggle("dark");
            });
        </script>
        </body>
        </html>

</section>
