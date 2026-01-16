<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Public Landing Page</title>

    <!-- Tailwind CSS (optional, but recommended) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Or use Laravel's default CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="antialiased">
<div class="min-h-screen bg-gray-100">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ url('/') }}" class="text-xl font-bold text-gray-800">
                        Home
                    </a>
                </div>
                {{--                <div class="flex items-center space-x-4">--}}
                {{--                    <a href="{{ route('/') }}" class="text-gray-700 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">Home</a>--}}
                {{--                </div>--}}
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                    Welcome to Our Public Landing Page
                </h1>



                <div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-6xl mx-auto">
                    <!-- Agile & Project Management -->
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h2 class="text-xl font-bold text-gray-800 mb-4">Agile & Project Management</h2>
                        <p class="text-left space-y-2">
                        <p><a href="{{ asset('agileprinciples/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">Agile Principles</a></p>
                        <p><a href="{{ asset('scrum/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">Scrum</a></p>
                        <p><a href="{{ asset('scrummanual/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">Scrum Manual</a></p>
                        <p><a href="{{ asset('dsdm/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">DSDM</a></p>
                        <p><a href="{{ asset('dsdmmanual/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">DSDM Manual</a></p>
                        <p><a href="{{ asset('dsdmwhitepapers/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">DSDM Whitepapers</a></p>
                        <p><a href="{{ asset('pmbok6/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">PMBOK 6</a></p>
                        <p><a href="{{ asset('pmboksixmanual/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">PMBOK Six Manual</a></p>
                        <p><a href="{{ asset('pmi2015/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">PMI 2015</a></p>
                        <p><a href="{{ asset('prince2agile/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">PRINCE2 Agile</a></p>
                        <p><a href="{{ asset('prince2mm/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">PRINCE2 Maturity Model</a></p>
                        <p><a href="{{ asset('prince2procs/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">PRINCE2 Processes</a></p>
                        <p><a href="{{ asset('prince22015/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">PRINCE2 2015</a></p>
                        <p><a href="{{ asset('processdash/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">Process Dashboard</a></p>
                        <p><a href="{{ asset('itilfouroverview/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">ITIL 4 Overview</a></p>
                        <p><a href="{{ asset('itilfouroverviewsimple/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">ITIL 4 Overview Simple</a></p>
                        </p>
                    </div>



                    <!-- CMMI & Process Models -->
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h2 class="text-xl font-bold text-gray-800 mb-4">CMMI & Process Models</h2>
                        <p class="text-left space-y-2">
                        <p><a href="{{ asset('cmmidev/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">CMMI Development</a></p>
                        <p><a href="{{ asset('cmmidevelopment/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">CMMI Development Detailed</a></p>
                        <p><a href="{{ asset('cmmimodels/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">CMMI Models</a></p>
                        <p><a href="{{ asset('pcmm/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">People CMM</a></p>
                        </p>
                    </div>

                    <!-- Book Summaries & Resources -->
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h2 class="text-xl font-bold text-gray-800 mb-4">Book Summaries & Resources</h2>
                        <p class="text-left space-y-2">
                        <p><a href="{{ asset('booksummaries/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">Book Summaries</a></p>
                        <p><a href="{{ asset('booklets/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">Booklets</a></p>
                        <p><a href="{{ asset('strategystuff/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">Strategy Stuff</a></p>
                        <p><a href="{{ asset('macroecon/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">Macroeconomics</a></p>
                        <p><a href="{{ asset('goodcheapfast/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">Good Cheap Fast</a></p>
                        <p><a href="{{ asset('biases/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">Biases</a></p>
                        <p><a href="{{ asset('fallacies/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">Fallacies</a></p>
                        <p><a href="{{ asset('philosopherstoolkit/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">Philosopher's Toolkit</a></p>
                        <p><a href="{{ asset('robertsrulesoforder/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">Robert's Rules of Order</a></p>
                        </p>
                    </div>

                    <!-- Philosophy & Classics -->
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h2 class="text-xl font-bold text-gray-800 mb-4">Philosophy & Classics</h2>
                        <p class="text-left space-y-2">
                        <p><a href="{{ asset('tao/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">Tao</a></p>
                        <p><a href="{{ asset('apology/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">Apology</a></p>
                        <p><a href="{{ asset('plato7epistle/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">Plato's 7th Epistle</a></p>
                        <p><a href="{{ asset('complexprince/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">Complex Prince</a></p>
                        <p><a href="{{ asset('breath/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">Breath</a></p>
                        <p><a href="{{ asset('latin/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">Latin</a></p>
                        </p>
                    </div>

                    <!-- Scientology Materials -->
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h2 class="text-xl font-bold text-gray-800 mb-4">Scientology Materials</h2>
                        <p class="text-left space-y-2">
                        <p><a href="{{ asset('shsb/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">SHSB</a></p>
                        <p><a href="{{ asset('techdic/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">Technical Dictionary</a></p>
                        <p><a href="{{ asset('lrh/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">LRH</a></p>
                        <p><a href="{{ asset('standardtechcourse/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">Standard Tech Course</a></p>
                        <p><a href="{{ asset('freezonecourses/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">Freezone Courses</a></p>
                        <p><a href="{{ asset('lrhbooks/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">LRH Books</a></p>
                        <p><a href="{{ asset('conditions/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">Conditions</a></p>
                        <p><a href="{{ asset('atecdic/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">Atecdic</a></p>
                        <p><a href="{{ asset('scientologydict/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">Scientology Dictionary</a></p>
                        <p><a href="{{ asset('roadtoclear/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">Road to Clear</a></p>
                        <p><a href="{{ asset('technicaldictionary/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">Technical Dictionary Full</a></p>
                        <p><a href="{{ asset('technologydict/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">Technology Dictionary</a></p>
                        <p><a href="{{ asset('thewayaudio/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">The Way Audio</a></p>
                        <p><a href="{{ asset('trscourse/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">TRS Course</a></p>
                        <p><a href="{{ asset('emetercourse/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">Emeter Course</a></p>
                        <p><a href="{{ asset('twth/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">The Way to Happiness</a></p>
                        </p>
                    </div>

                    <!-- Miscellaneous -->
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h2 class="text-xl font-bold text-gray-800 mb-4">Miscellaneous</h2>
                        <p class="text-left space-y-2">
                        <p><a href="{{ asset('silverbullet/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">Silver Bullet</a></p>
                        <p><a href="{{ asset('sitapmo/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">SITA PMO</a></p>
                        <p><a href="{{ asset('helpme/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">Help Me</a></p>
                        <p><a href="{{ asset('studymanualt/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">Study Manual</a></p>
                        <p><a href="{{ asset('summitid/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">Summit ID</a></p>
                        <p><a href="{{ asset('cv/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">CV</a></p>
                        <p><a href="{{ asset('includesub/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">Include Sub</a></p>
                        <p><a href="{{ asset('lovemstuffs/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">Love Stuffs</a></p>
                        <p><a href="{{ asset('movies/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">Movies</a></p>
                        <p><a href="{{ asset('phoenixlecturespics/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">Phoenix Lectures Pics</a></p>
                        <p><a href="{{ asset('PMWayLanding/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">PMWay Landing</a></p>
                        <p><a href="{{ asset('recharges/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">Recharges</a></p>
                        <p><a href="{{ asset('images/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">Images</a></p>
                        <p><a href="{{ asset('imgmap/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">Image Map</a></p>
                        </p>
                    </div>
                    <!-- Training & Certifications -->
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h2 class="text-xl font-bold text-gray-800 mb-4">Training & Certifications</h2>

                        <p class="text-left space-y-2">
                        <p><a href="{{ asset('cmiitraining/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">Configuration Management CM II Training</a></p>
                        <p><a href="{{ asset('twcsstraining/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">Tailwind CSS Training</a></p>
                        </p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h2 class="text-xl font-bold text-gray-800 mb-4">Flip PDF Books</h2>
                        <br>
                        <br>
                        <p>Note:  I have installed ArclabDir2Html.  If the book does not open automatically, for Flip PDF books. navigate to mobile folder and Ctrl F index.html</p>
                        <br>
                        <p class="text-left space-y-2">
                        <p><a href="{{ asset('cmiitraining/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">Configuration Management CM II Training</a></p>

                        <p><a href="{{ asset('flipacp/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">Flip ACP</a></p>
                        <p><a href="{{ asset('flipdsdm/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">Flip DSDM</a></p>
                        <p><a href="{{ asset('flippmbokfive/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">Flip PMBOK 5</a></p>
                        <p><a href="{{ asset('flippmp/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">Flip PMP</a></p>
                        <p><a href="{{ asset('flipprince2/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">Flip PRINCE2</a></p>
                        <p><a href="{{ asset('flipprince2a/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">Flip PRINCE2 Advanced</a></p>
                        <p><a href="{{ asset('twcsstraining/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">Tailwind CSS Training</a></p>
                        </p>
                    </div>
                    <!-- Music -->
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h2 class="text-xl font-bold text-gray-800 mb-4">Miscellaneous</h2>
                        <p class="text-left space-y-2">
                        <p><a href="{{ asset('victorbusslessons/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">Victor Buss Lessons</a></p>
                        </p>
                    </div>
                    <!-- MAD MAGAZINE COLLECTION-->
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h2 class="text-xl font-bold text-gray-800 mb-4">Miscellaneous</h2>
                        <p class="text-left space-y-2">
                        <p><a href="{{ asset('madmoment/index.html') }}" class="text-blue-600 hover:text-blue-800" target="_blank">MAD MAG & ISO</a></p>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <x-footer />
</div>
</body>
</html>