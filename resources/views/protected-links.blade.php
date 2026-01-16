<!DOCTYPE html>
<!-- PROTECTED LINKS NAV LOADED - {{ now() }} -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Protected Storage</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class'
        }
    </script>
    <style>
        /* SIMPLE NAV HEIGHT FIX */
        body {
            padding-top: 64px !important;
            margin: 0 !important;
            padding: 0 !important;
        }

        /* SCROLL TO TOP BUTTON Z-INDEX */
        #scrollToTopBtn {
            z-index: 9999 !important;
        }

        /* FIX: Books card text readability - FORCE WHITE TEXT */
        .bg-gradient-to-br.from-brown-600.to-amber-800,
        .bg-gradient-to-br.from-brown-600.to-amber-800 *,
        .bg-gradient-to-br.from-brown-600.to-amber-800 h3,
        .bg-gradient-to-br.from-brown-600.to-amber-800 p {
            color: white !important;
        }

        .bg-gradient-to-br.from-brown-600.to-amber-800 .text-brown-100,
        .bg-gradient-to-br.from-brown-600.to-amber-800 .text-brown-200 {
            color: rgba(255,255,255,0.9) !important;
        }

        /* Remove previous problematic CSS overrides */
        .style-guide-page-content {
            background-color: #f5f5f5;
        }

        .dark .style-guide-page-content {
            background-color: #27272a;
        }
    </style>
</head>
<body class="bg-white dark:bg-zinc-800">
@include('components.simple-nav')

<!-- Main Content - Follows Style Guide 4-Level Hierarchy -->
<div class="content-wrapper pt-0">
    <!-- Level 1: Outer Container (bg-gray-50 dark:bg-gray-900) -->
    <div class="max-w-6xl mx-auto px-4 py-8 bg-gray-50 dark:bg-gray-900">
        <!-- Level 2: Main Header Section (bg-white dark:bg-gray-800) -->
        <div class="mb-12 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-8 border-b border-gray-200 dark:border-gray-700 pb-4">
                🔒 Protected Storage
            </h1>

            <!-- URL Structure Section (Level 3: bg-gray-50 dark:bg-gray-700) -->
            <section class="mb-12">
                <div class="bg-gray-50 dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-lg p-6">
                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">📁 URL Structure</h2>
                    <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">
                        All storage resources are under <code class="bg-gray-100 dark:bg-gray-800 px-2 py-1 rounded text-gray-900 dark:text-gray-300">/protected-storage/</code> prefix.
                    </p>

                    <!-- Level 4: Example URL (bg-white dark:bg-gray-600) -->
                    <div class="bg-white dark:bg-gray-600 border border-gray-200 dark:border-gray-500 rounded-lg p-4 mb-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Example URL:</h3>
                        <div class="bg-gray-50 dark:bg-gray-700 p-3 rounded-lg overflow-x-auto">
                            <code class="text-blue-600 dark:text-blue-400 text-sm">
                                https://pmway.hopto.org/protected-storage/scientology/
                            </code>
                        </div>
                    </div>

                    <!-- Navigation Links -->

                </div>
            </section>
        </div>

        <!-- Storage Resources Grid (Level 2: bg-white dark:bg-gray-800) -->
        <section class="mb-12 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">📚 Storage Resources</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- ALL YOUR ORIGINAL CARDS - KEPT INTACT -->
                <!-- Scientology Card -->
                <a href="{{ route('storage.resource', ['resource' => 'scientology']) }}"
                   target="_blank"
                   class="bg-gradient-to-br from-blue-600 to-indigo-700 hover:from-blue-700 hover:to-indigo-800 dark:from-blue-700 dark:to-indigo-800 dark:hover:from-blue-600 dark:hover:to-indigo-700 text-white rounded-xl p-6 transition-all duration-300 hover:scale-105 hover:shadow-2xl border border-blue-500/30 dark:border-blue-600/30 group">
                    <div class="flex items-center mb-4">
                        <div class="text-3xl mr-3 group-hover:scale-110 transition-transform">📚</div>
                        <h3 class="text-xl font-bold">Scientology</h3>
                    </div>
                    <p class="text-blue-100 dark:text-blue-200 opacity-90">
                        Core Scientology materials and resources
                    </p>
                </a>

                <a href="{{ route('storage.resource', ['resource' => 'freezonecourses']) }}"
                   target="_blank"
                   class="bg-gradient-to-br from-green-600 to-emerald-700 hover:from-green-700 hover:to-emerald-800 dark:from-green-700 dark:to-emerald-800 dark:hover:from-green-600 dark:hover:to-emerald-700 text-white rounded-xl p-6 transition-all duration-300 hover:scale-105 hover:shadow-2xl border border-green-500/30 dark:border-green-600/30 group">
                    <div class="flex items-center mb-4">
                        <div class="text-3xl mr-3 group-hover:scale-110 transition-transform">🎓</div>
                        <h3 class="text-xl font-bold">FreeZone Courses</h3>
                    </div>
                    <p class="text-green-100 dark:text-green-200 opacity-90">
                        Independent Scientology courses and training
                    </p>
                </a>

                <a href="{{ route('storage.resource', ['resource' => 'helpme']) }}"
                   target="_blank"
                   class="bg-gradient-to-br from-yellow-600 to-amber-700 hover:from-yellow-700 hover:to-amber-800 dark:from-yellow-700 dark:to-amber-800 dark:hover:from-yellow-600 dark:hover:to-amber-700 text-white rounded-xl p-6 transition-all duration-300 hover:scale-105 hover:shadow-2xl border border-yellow-500/30 dark:border-yellow-600/30 group">
                    <div class="flex items-center mb-4">
                        <div class="text-3xl mr-3 group-hover:scale-110 transition-transform">❓</div>
                        <h3 class="text-xl font-bold">HelpMe</h3>
                    </div>
                    <p class="text-yellow-100 dark:text-yellow-200 opacity-90">
                        Help and assistance resources
                    </p>
                </a>

                <a href="{{ route('storage.resource', ['resource' => 'lrh']) }}"
                   target="_blank"
                   class="bg-gradient-to-br from-purple-600 to-violet-700 hover:from-purple-700 hover:to-violet-800 dark:from-purple-700 dark:to-violet-800 dark:hover:from-purple-600 dark:hover:to-violet-700 text-white rounded-xl p-6 transition-all duration-300 hover:scale-105 hover:shadow-2xl border border-purple-500/30 dark:border-purple-600/30 group">
                    <div class="flex items-center mb-4">
                        <div class="text-3xl mr-3 group-hover:scale-110 transition-transform">📖</div>
                        <h3 class="text-xl font-bold">LRH</h3>
                    </div>
                    <p class="text-purple-100 dark:text-purple-200 opacity-90">
                        L. Ron Hubbard materials and writings
                    </p>
                </a>

                <a href="{{ route('storage.resource', ['resource' => 'studentmotivationpdf']) }}"
                   target="_blank"
                   class="bg-gradient-to-br from-red-600 to-rose-700 hover:from-red-700 hover:to-rose-800 dark:from-red-700 dark:to-rose-800 dark:hover:from-red-600 dark:hover:to-rose-700 text-white rounded-xl p-6 transition-all duration-300 hover:scale-105 hover:shadow-2xl border border-red-500/30 dark:border-red-600/30 group">
                    <div class="flex items-center mb-4">
                        <div class="text-3xl mr-3 group-hover:scale-110 transition-transform">💪</div>
                        <h3 class="text-xl font-bold">Student Motivation PDF</h3>
                    </div>
                    <p class="text-red-100 dark:text-red-200 opacity-90">
                        Motivation and study guidance materials
                    </p>
                </a>

                <a href="{{ route('storage.resource', ['resource' => 'studymanual']) }}"
                   target="_blank"
                   class="bg-gradient-to-br from-cyan-600 to-teal-700 hover:from-cyan-700 hover:to-teal-800 dark:from-cyan-700 dark:to-teal-800 dark:hover:from-cyan-600 dark:hover:to-teal-700 text-white rounded-xl p-6 transition-all duration-300 hover:scale-105 hover:shadow-2xl border border-cyan-500/30 dark:border-cyan-600/30 group">
                    <div class="flex items-center mb-4">
                        <div class="text-3xl mr-3 group-hover:scale-110 transition-transform">📘</div>
                        <h3 class="text-xl font-bold">Study Manual</h3>
                    </div>
                    <p class="text-cyan-100 dark:text-cyan-200 opacity-90">
                        Comprehensive study guides and manuals
                    </p>
                </a>

                <a href="{{ route('storage.resource', ['resource' => 'techdic']) }}"
                   target="_blank"
                   class="bg-gradient-to-br from-orange-600 to-amber-700 hover:from-orange-700 hover:to-amber-800 dark:from-orange-700 dark:to-amber-800 dark:hover:from-orange-600 dark:hover:to-amber-700 text-white rounded-xl p-6 transition-all duration-300 hover:scale-105 hover:shadow-2xl border border-orange-500/30 dark:border-orange-600/30 group">
                    <div class="flex items-center mb-4">
                        <div class="text-3xl mr-3 group-hover:scale-110 transition-transform">🔧</div>
                        <h3 class="text-xl font-bold">Tech Dictionary</h3>
                    </div>
                    <p class="text-orange-100 dark:text-orange-200 opacity-90">
                        Technical terminology and definitions
                    </p>
                </a>

                <a href="{{ route('storage.resource', ['resource' => 'scientologydict']) }}"
                   target="_blank"
                   class="bg-gradient-to-br from-pink-600 to-rose-700 hover:from-pink-700 hover:to-rose-800 dark:from-pink-700 dark:to-rose-800 dark:hover:from-pink-600 dark:hover:to-rose-700 text-white rounded-xl p-6 transition-all duration-300 hover:scale-105 hover:shadow-2xl border border-pink-500/30 dark:border-pink-600/30 group">
                    <div class="flex items-center mb-4">
                        <div class="text-3xl mr-3 group-hover:scale-110 transition-transform">📕</div>
                        <h3 class="text-xl font-bold">Scientology Dictionary</h3>
                    </div>
                    <p class="text-pink-100 dark:text-pink-200 opacity-90">
                        Scientology-specific terminology
                    </p>
                </a>

                <a href="{{ route('storage.resource', ['resource' => 'technicaldictionary']) }}"
                   target="_blank"
                   class="bg-gradient-to-br from-indigo-600 to-blue-700 hover:from-indigo-700 hover:to-blue-800 dark:from-indigo-700 dark:to-blue-800 dark:hover:from-indigo-600 dark:hover:to-blue-700 text-white rounded-xl p-6 transition-all duration-300 hover:scale-105 hover:shadow-2xl border border-indigo-500/30 dark:border-indigo-600/30 group">
                    <div class="flex items-center mb-4">
                        <div class="text-3xl mr-3 group-hover:scale-110 transition-transform">📗</div>
                        <h3 class="text-xl font-bold">Technical Dictionary</h3>
                    </div>
                    <p class="text-indigo-100 dark:text-indigo-200 opacity-90">
                        Advanced technical references
                    </p>
                </a>

                <a href="{{ route('storage.resource', ['resource' => 'agile']) }}"
                   target="_blank"
                   class="bg-gradient-to-br from-teal-600 to-cyan-700 hover:from-teal-700 hover:to-cyan-800 dark:from-teal-700 dark:to-cyan-800 dark:hover:from-teal-600 dark:hover:to-cyan-700 text-white rounded-xl p-6 transition-all duration-300 hover:scale-105 hover:shadow-2xl border border-teal-500/30 dark:border-teal-600/30 group">
                    <div class="flex items-center mb-4">
                        <div class="text-3xl mr-3 group-hover:scale-110 transition-transform">⚡</div>
                        <h3 class="text-xl font-bold">Agile</h3>
                    </div>
                    <p class="text-teal-100 dark:text-teal-200 opacity-90">
                        Agile methodologies and frameworks
                    </p>
                </a>

                <!-- New Resource Cards -->
                <a href="{{ route('storage.resource', ['resource' => 'Pmi']) }}"
                   target="_blank"
                   class="bg-gradient-to-br from-blue-600 to-indigo-700 hover:from-blue-700 hover:to-indigo-800 dark:from-blue-700 dark:to-indigo-800 dark:hover:from-blue-600 dark:hover:to-indigo-700 text-white rounded-xl p-6 transition-all duration-300 hover:scale-105 hover:shadow-2xl border border-blue-500/30 dark:border-blue-600/30 group">
                    <div class="flex items-center mb-4">
                        <div class="text-3xl mr-3 group-hover:scale-110 transition-transform">📊</div>
                        <h3 class="text-xl font-bold">PMI</h3>
                    </div>
                    <p class="text-blue-100 dark:text-blue-200 opacity-90">
                        Project Management Institute resources
                    </p>
                </a>

                <a href="{{ route('storage.resource', ['resource' => 'Scrumban']) }}"
                   target="_blank"
                   class="bg-gradient-to-br from-green-600 to-emerald-700 hover:from-green-700 hover:to-emerald-800 dark:from-green-700 dark:to-emerald-800 dark:hover:from-green-600 dark:hover:to-emerald-700 text-white rounded-xl p-6 transition-all duration-300 hover:scale-105 hover:shadow-2xl border border-green-500/30 dark:border-green-600/30 group">
                    <div class="flex items-center mb-4">
                        <div class="text-3xl mr-3 group-hover:scale-110 transition-transform">🔄</div>
                        <h3 class="text-xl font-bold">Scrumban</h3>
                    </div>
                    <p class="text-green-100 dark:text-green-200 opacity-90">
                        Scrum + Kanban hybrid methodology
                    </p>
                </a>

                <a href="{{ route('storage.resource', ['resource' => 'Scrummanual']) }}"
                   target="_blank"
                   class="bg-gradient-to-br from-yellow-600 to-amber-700 hover:from-yellow-700 hover:to-amber-800 dark:from-yellow-700 dark:to-amber-800 dark:hover:from-yellow-600 dark:hover:to-amber-700 text-white rounded-xl p-6 transition-all duration-300 hover:scale-105 hover:shadow-2xl border border-yellow-500/30 dark:border-yellow-600/30 group">
                    <div class="flex items-center mb-4">
                        <div class="text-3xl mr-3 group-hover:scale-110 transition-transform">📖</div>
                        <h3 class="text-xl font-bold">Scrum Manual</h3>
                    </div>
                    <p class="text-yellow-100 dark:text-yellow-200 opacity-90">
                        Official Scrum guides and manuals
                    </p>
                </a>

                <a href="{{ route('storage.resource', ['resource' => 'Scrummedia']) }}"
                   target="_blank"
                   class="bg-gradient-to-br from-purple-600 to-violet-700 hover:from-purple-700 hover:to-violet-800 dark:from-purple-700 dark:to-violet-800 dark:hover:from-purple-600 dark:hover:to-violet-700 text-white rounded-xl p-6 transition-all duration-300 hover:scale-105 hover:shadow-2xl border border-purple-500/30 dark:border-purple-600/30 group">
                    <div class="flex items-center mb-4">
                        <div class="text-3xl mr-3 group-hover:scale-110 transition-transform">🎬</div>
                        <h3 class="text-xl font-bold">Scrum Media</h3>
                    </div>
                    <p class="text-purple-100 dark:text-purple-200 opacity-90">
                        Scrum videos and multimedia content
                    </p>
                </a>

                <a href="{{ route('storage.resource', ['resource' => 'Search']) }}"
                   target="_blank"
                   class="bg-gradient-to-br from-red-600 to-rose-700 hover:from-red-700 hover:to-rose-800 dark:from-red-700 dark:to-rose-800 dark:hover:from-red-600 dark:hover:to-rose-700 text-white rounded-xl p-6 transition-all duration-300 hover:scale-105 hover:shadow-2xl border border-red-500/30 dark:border-red-600/30 group">
                    <div class="flex items-center mb-4">
                        <div class="text-3xl mr-3 group-hover:scale-110 transition-transform">🔍</div>
                        <h3 class="text-xl font-bold">Search</h3>
                    </div>
                    <p class="text-red-100 dark:text-red-200 opacity-90">
                        Search tools and resources
                    </p>
                </a>

                <a href="{{ route('storage.resource', ['resource' => 'azure']) }}"
                   target="_blank"
                   class="bg-gradient-to-br from-blue-600 to-cyan-700 hover:from-blue-700 hover:to-cyan-800 dark:from-blue-700 dark:to-cyan-800 dark:hover:from-blue-600 dark:hover:to-cyan-700 text-white rounded-xl p-6 transition-all duration-300 hover:scale-105 hover:shadow-2xl border border-blue-500/30 dark:border-blue-600/30 group">
                    <div class="flex items-center mb-4">
                        <div class="text-3xl mr-3 group-hover:scale-110 transition-transform">☁️</div>
                        <h3 class="text-xl font-bold">Azure</h3>
                    </div>
                    <p class="text-blue-100 dark:text-blue-200 opacity-90">
                        Microsoft Azure cloud resources
                    </p>
                </a>

                <a href="{{ route('storage.resource', ['resource' => 'bigdata']) }}"
                   target="_blank"
                   class="bg-gradient-to-br from-purple-600 to-pink-700 hover:from-purple-700 hover:to-pink-800 dark:from-purple-700 dark:to-pink-800 dark:hover:from-purple-600 dark:hover:to-pink-700 text-white rounded-xl p-6 transition-all duration-300 hover:scale-105 hover:shadow-2xl border border-purple-500/30 dark:border-purple-600/30 group">
                    <div class="flex items-center mb-4">
                        <div class="text-3xl mr-3 group-hover:scale-110 transition-transform">📊</div>
                        <h3 class="text-xl font-bold">Big Data</h3>
                    </div>
                    <p class="text-purple-100 dark:text-purple-200 opacity-90">
                        Big Data analytics and tools
                    </p>
                </a>

                <a href="{{ route('storage.resource', ['resource' => 'booklets']) }}"
                   target="_blank"
                   class="bg-gradient-to-br from-amber-600 to-orange-700 hover:from-amber-700 hover:to-orange-800 dark:from-amber-700 dark:to-orange-800 dark:hover:from-amber-600 dark:hover:to-orange-700 text-white rounded-xl p-6 transition-all duration-300 hover:scale-105 hover:shadow-2xl border border-amber-500/30 dark:border-amber-600/30 group">
                    <div class="flex items-center mb-4">
                        <div class="text-3xl mr-3 group-hover:scale-110 transition-transform">📑</div>
                        <h3 class="text-xl font-bold">Booklets</h3>
                    </div>
                    <p class="text-amber-100 dark:text-amber-200 opacity-90">
                        Educational booklets and pamphlets
                    </p>
                </a>

                <!-- Books Card - SOLID: Proper contrast for both modes -->
                <a href="{{ route('storage.resource', ['resource' => 'books']) }}"
                   target="_blank"
                   class="bg-amber-200 dark:bg-amber-800 hover:bg-amber-300 dark:hover:bg-amber-700 rounded-xl p-6 transition-all duration-300 hover:scale-105 hover:shadow-xl border border-amber-300 dark:border-amber-600 group">
                    <div class="flex items-center mb-4">
                        <div class="text-3xl mr-3 group-hover:scale-110 transition-transform text-amber-800 dark:text-amber-100">📚</div>
                        <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100">Books</h3>
                    </div>
                    <p class="text-gray-700 dark:text-gray-200">
                        Complete books collection
                    </p>
                </a>

                <a href="{{ route('storage.resource', ['resource' => 'cobit']) }}"
                   target="_blank"
                   class="bg-gradient-to-br from-gray-600 to-slate-700 hover:from-gray-700 hover:to-slate-800 dark:from-gray-700 dark:to-slate-800 dark:hover:from-gray-600 dark:hover:to-slate-700 text-white rounded-xl p-6 transition-all duration-300 hover:scale-105 hover:shadow-2xl border border-gray-500/30 dark:border-gray-600/30 group">
                    <div class="flex items-center mb-4">
                        <div class="text-3xl mr-3 group-hover:scale-110 transition-transform">🏛️</div>
                        <h3 class="text-xl font-bold">COBIT</h3>
                    </div>
                    <p class="text-gray-100 dark:text-gray-200 opacity-90">
                        IT governance framework
                    </p>
                </a>

                <a href="{{ route('storage.resource', ['resource' => 'computing']) }}"
                   target="_blank"
                   class="bg-gradient-to-br from-blue-600 to-indigo-700 hover:from-blue-700 hover:to-indigo-800 dark:from-blue-700 dark:to-indigo-800 dark:hover:from-blue-600 dark:hover:to-indigo-700 text-white rounded-xl p-6 transition-all duration-300 hover:scale-105 hover:shadow-2xl border border-blue-500/30 dark:border-blue-600/30 group">
                    <div class="flex items-center mb-4">
                        <div class="text-3xl mr-3 group-hover:scale-110 transition-transform">💻</div>
                        <h3 class="text-xl font-bold">Computing</h3>
                    </div>
                    <p class="text-blue-100 dark:text-blue-200 opacity-90">
                        General computing resources
                    </p>
                </a>

                <a href="{{ route('storage.resource', ['resource' => 'devops']) }}"
                   target="_blank"
                   class="bg-gradient-to-br from-green-600 to-emerald-700 hover:from-green-700 hover:to-emerald-800 dark:from-green-700 dark:to-emerald-800 dark:hover:from-green-600 dark:hover:to-emerald-700 text-white rounded-xl p-6 transition-all duration-300 hover:scale-105 hover:shadow-2xl border border-green-500/30 dark:border-green-600/30 group">
                    <div class="flex items-center mb-4">
                        <div class="text-3xl mr-3 group-hover:scale-110 transition-transform">⚙️</div>
                        <h3 class="text-xl font-bold">DevOps</h3>
                    </div>
                    <p class="text-green-100 dark:text-green-200 opacity-90">
                        DevOps practices and tools
                    </p>
                </a>

                <a href="{{ route('storage.resource', ['resource' => 'devopsmedia']) }}"
                   target="_blank"
                   class="bg-gradient-to-br from-teal-600 to-cyan-700 hover:from-teal-700 hover:to-cyan-800 dark:from-teal-700 dark:to-cyan-800 dark:hover:from-teal-600 dark:hover:to-cyan-700 text-white rounded-xl p-6 transition-all duration-300 hover:scale-105 hover:shadow-2xl border border-teal-500/30 dark:border-teal-600/30 group">
                    <div class="flex items-center mb-4">
                        <div class="text-3xl mr-3 group-hover:scale-110 transition-transform">🎥</div>
                        <h3 class="text-xl font-bold">DevOps Media</h3>
                    </div>
                    <p class="text-teal-100 dark:text-teal-200 opacity-90">
                        DevOps videos and media content
                    </p>
                </a>

                <a href="{{ route('storage.resource', ['resource' => 'documents']) }}"
                   target="_blank"
                   class="bg-gradient-to-br from-gray-600 to-slate-700 hover:from-gray-700 hover:to-slate-800 dark:from-gray-700 dark:to-slate-800 dark:hover:from-gray-600 dark:hover:to-slate-700 text-white rounded-xl p-6 transition-all duration-300 hover:scale-105 hover:shadow-2xl border border-gray-500/30 dark:border-gray-600/30 group">
                    <div class="flex items-center mb-4">
                        <div class="text-3xl mr-3 group-hover:scale-110 transition-transform">📄</div>
                        <h3 class="text-xl font-bold">Documents</h3>
                    </div>
                    <p class="text-gray-100 dark:text-gray-200 opacity-90">
                        General documents and files
                    </p>
                </a>

                <a href="{{ route('storage.resource', ['resource' => 'headfirst']) }}"
                   target="_blank"
                   class="bg-gradient-to-br from-orange-600 to-amber-700 hover:from-orange-700 hover:to-amber-800 dark:from-orange-700 dark:to-amber-800 dark:hover:from-orange-600 dark:hover:to-amber-700 text-white rounded-xl p-6 transition-all duration-300 hover:scale-105 hover:shadow-2xl border border-orange-500/30 dark:border-orange-600/30 group">
                    <div class="flex items-center mb-4">
                        <div class="text-3xl mr-3 group-hover:scale-110 transition-transform">🧠</div>
                        <h3 class="text-xl font-bold">Head First</h3>
                    </div>
                    <p class="text-orange-100 dark:text-orange-200 opacity-90">
                        Head First series books
                    </p>
                </a>

                <a href="{{ route('storage.resource', ['resource' => 'home']) }}"
                   target="_blank"
                   class="bg-gradient-to-br from-yellow-600 to-amber-700 hover:from-yellow-700 hover:to-amber-800 dark:from-yellow-700 dark:to-amber-800 dark:hover:from-yellow-600 dark:hover:to-amber-700 text-white rounded-xl p-6 transition-all duration-300 hover:scale-105 hover:shadow-2xl border border-yellow-500/30 dark:border-yellow-600/30 group">
                    <div class="flex items-center mb-4">
                        <div class="text-3xl mr-3 group-hover:scale-110 transition-transform">🏠</div>
                        <h3 class="text-xl font-bold">Home</h3>
                    </div>
                    <p class="text-yellow-100 dark:text-yellow-200 opacity-90">
                        Home directory resources
                    </p>
                </a>

                <a href="{{ route('storage.resource', ['resource' => 'itil']) }}"
                   target="_blank"
                   class="bg-gradient-to-br from-blue-600 to-indigo-700 hover:from-blue-700 hover:to-indigo-800 dark:from-blue-700 dark:to-indigo-800 dark:hover:from-blue-600 dark:hover:to-indigo-700 text-white rounded-xl p-6 transition-all duration-300 hover:scale-105 hover:shadow-2xl border border-blue-500/30 dark:border-blue-600/30 group">
                    <div class="flex items-center mb-4">
                        <div class="text-3xl mr-3 group-hover:scale-110 transition-transform">🔄</div>
                        <h3 class="text-xl font-bold">ITIL</h3>
                    </div>
                    <p class="text-blue-100 dark:text-blue-200 opacity-90">
                        IT service management framework
                    </p>
                </a>

                <a href="{{ route('storage.resource', ['resource' => 'java']) }}"
                   target="_blank"
                   class="bg-gradient-to-br from-red-600 to-orange-700 hover:from-red-700 hover:to-orange-800 dark:from-red-700 dark:to-orange-800 dark:hover:from-red-600 dark:hover:to-orange-700 text-white rounded-xl p-6 transition-all duration-300 hover:scale-105 hover:shadow-2xl border border-red-500/30 dark:border-red-600/30 group">
                    <div class="flex items-center mb-4">
                        <div class="text-3xl mr-3 group-hover:scale-110 transition-transform">☕</div>
                        <h3 class="text-xl font-bold">Java</h3>
                    </div>
                    <p class="text-red-100 dark:text-red-200 opacity-90">
                        Java programming resources
                    </p>
                </a>

                <a href="{{ route('storage.resource', ['resource' => 'kanban']) }}"
                   target="_blank"
                   class="bg-gradient-to-br from-green-600 to-teal-700 hover:from-green-700 hover:to-teal-800 dark:from-green-700 dark:to-teal-800 dark:hover:from-green-600 dark:hover:to-teal-700 text-white rounded-xl p-6 transition-all duration-300 hover:scale-105 hover:shadow-2xl border border-green-500/30 dark:border-green-600/30 group">
                    <div class="flex items-center mb-4">
                        <div class="text-3xl mr-3 group-hover:scale-110 transition-transform">📋</div>
                        <h3 class="text-xl font-bold">Kanban</h3>
                    </div>
                    <p class="text-green-100 dark:text-green-200 opacity-90">
                        Kanban methodology resources
                    </p>
                </a>

                <a href="{{ route('storage.resource', ['resource' => 'laravel']) }}"
                   target="_blank"
                   class="bg-gradient-to-br from-red-600 to-pink-700 hover:from-red-700 hover:to-pink-800 dark:from-red-700 dark:to-pink-800 dark:hover:from-red-600 dark:hover:to-pink-700 text-white rounded-xl p-6 transition-all duration-300 hover:scale-105 hover:shadow-2xl border border-red-500/30 dark:border-red-600/30 group">
                    <div class="flex items-center mb-4">
                        <div class="text-3xl mr-3 group-hover:scale-110 transition-transform">🎨</div>
                        <h3 class="text-xl font-bold">Laravel</h3>
                    </div>
                    <p class="text-red-100 dark:text-red-200 opacity-90">
                        Laravel PHP framework resources
                    </p>
                </a>

                <a href="{{ route('storage.resource', ['resource' => 'lean']) }}"
                   target="_blank"
                   class="bg-gradient-to-br from-green-600 to-emerald-700 hover:from-green-700 hover:to-emerald-800 dark:from-green-700 dark:to-emerald-800 dark:hover:from-green-600 dark:hover:to-emerald-700 text-white rounded-xl p-6 transition-all duration-300 hover:scale-105 hover:shadow-2xl border border-green-500/30 dark:border-green-600/30 group">
                    <div class="flex items-center mb-4">
                        <div class="text-3xl mr-3 group-hover:scale-110 transition-transform">⚡</div>
                        <h3 class="text-xl font-bold">Lean</h3>
                    </div>
                    <p class="text-green-100 dark:text-green-200 opacity-90">
                        Lean methodology resources
                    </p>
                </a>

                <a href="{{ route('storage.resource', ['resource' => 'microsoft']) }}"
                   target="_blank"
                   class="bg-gradient-to-br from-blue-600 to-cyan-700 hover:from-blue-700 hover:to-cyan-800 dark:from-blue-700 dark:to-cyan-800 dark:hover:from-blue-600 dark:hover:to-cyan-700 text-white rounded-xl p-6 transition-all duration-300 hover:scale-105 hover:shadow-2xl border border-blue-500/30 dark:border-blue-600/30 group">
                    <div class="flex items-center mb-4">
                        <div class="text-3xl mr-3 group-hover:scale-110 transition-transform">🪟</div>
                        <h3 class="text-xl font-bold">Microsoft</h3>
                    </div>
                    <p class="text-blue-100 dark:text-blue-200 opacity-90">
                        Microsoft technologies and products
                    </p>
                </a>

                <a href="{{ route('storage.resource', ['resource' => 'mor']) }}"
                   target="_blank"
                   class="bg-gradient-to-br from-purple-600 to-violet-700 hover:from-purple-700 hover:to-violet-800 dark:from-purple-700 dark:to-violet-800 dark:hover:from-purple-600 dark:hover:to-violet-700 text-white rounded-xl p-6 transition-all duration-300 hover:scale-105 hover:shadow-2xl border border-purple-500/30 dark:border-purple-600/30 group">
                    <div class="flex items-center mb-4">
                        <div class="text-3xl mr-3 group-hover:scale-110 transition-transform">📈</div>
                        <h3 class="text-xl font-bold">MOR</h3>
                    </div>
                    <p class="text-purple-100 dark:text-purple-200 opacity-90">
                        Management of Risk resources
                    </p>
                </a>

                <a href="{{ route('storage.resource', ['resource' => 'msp']) }}"
                   target="_blank"
                   class="bg-gradient-to-br from-blue-600 to-indigo-700 hover:from-blue-700 hover:to-indigo-800 dark:from-blue-700 dark:to-indigo-800 dark:hover:from-blue-600 dark:hover:to-indigo-700 text-white rounded-xl p-6 transition-all duration-300 hover:scale-105 hover:shadow-2xl border border-blue-500/30 dark:border-blue-600/30 group">
                    <div class="flex items-center mb-4">
                        <div class="text-3xl mr-3 group-hover:scale-110 transition-transform">🛡️</div>
                        <h3 class="text-xl font-bold">MSP</h3>
                    </div>
                    <p class="text-blue-100 dark:text-blue-200 opacity-90">
                        Managing Successful Programmes
                    </p>
                </a>

                <a href="{{ route('storage.resource', ['resource' => 'notil']) }}"
                   target="_blank"
                   class="bg-gradient-to-br from-gray-600 to-slate-700 hover:from-gray-700 hover:to-slate-800 dark:from-gray-700 dark:to-slate-800 dark:hover:from-gray-600 dark:hover:to-slate-700 text-white rounded-xl p-6 transition-all duration-300 hover:scale-105 hover:shadow-2xl border border-gray-500/30 dark:border-gray-600/30 group">
                    <div class="flex items-center mb-4">
                        <div class="text-3xl mr-3 group-hover:scale-110 transition-transform">🚫</div>
                        <h3 class="text-xl font-bold">NoTIL</h3>
                    </div>
                    <p class="text-gray-100 dark:text-gray-200 opacity-90">
                        Non-ITIL resources
                    </p>
                </a>

                <a href="{{ route('storage.resource', ['resource' => 'oop']) }}"
                   target="_blank"
                   class="bg-gradient-to-br from-purple-600 to-pink-700 hover:from-purple-700 hover:to-pink-800 dark:from-purple-700 dark:to-pink-800 dark:hover:from-purple-600 dark:hover:to-pink-700 text-white rounded-xl p-6 transition-all duration-300 hover:scale-105 hover:shadow-2xl border border-purple-500/30 dark:border-purple-600/30 group">
                    <div class="flex items-center mb-4">
                        <div class="text-3xl mr-3 group-hover:scale-110 transition-transform">🧩</div>
                        <h3 class="text-xl font-bold">OOP</h3>
                    </div>
                    <p class="text-purple-100 dark:text-purple-200 opacity-90">
                        Object-Oriented Programming
                    </p>
                </a>

                <a href="{{ route('storage.resource', ['resource' => 'p3o']) }}"
                   target="_blank"
                   class="bg-gradient-to-br from-blue-600 to-cyan-700 hover:from-blue-700 hover:to-cyan-800 dark:from-blue-700 dark:to-cyan-800 dark:hover:from-blue-600 dark:hover:to-cyan-700 text-white rounded-xl p-6 transition-all duration-300 hover:scale-105 hover:shadow-2xl border border-blue-500/30 dark:border-blue-600/30 group">
                    <div class="flex items-center mb-4">
                        <div class="text-3xl mr-3 group-hover:scale-110 transition-transform">🏢</div>
                        <h3 class="text-xl font-bold">P3O</h3>
                    </div>
                    <p class="text-blue-100 dark:text-blue-200 opacity-90">
                        Portfolio, Programme and Project Offices
                    </p>
                </a>

                <a href="{{ route('storage.resource', ['resource' => 'php']) }}"
                   target="_blank"
                   class="bg-gradient-to-br from-indigo-600 to-purple-700 hover:from-indigo-700 hover:to-purple-800 dark:from-indigo-700 dark:to-purple-800 dark:hover:from-indigo-600 dark:hover:to-purple-700 text-white rounded-xl p-6 transition-all duration-300 hover:scale-105 hover:shadow-2xl border border-indigo-500/30 dark:border-indigo-600/30 group">
                    <div class="flex items-center mb-4">
                        <div class="text-3xl mr-3 group-hover:scale-110 transition-transform">🐘</div>
                        <h3 class="text-xl font-bold">PHP</h3>
                    </div>
                    <p class="text-indigo-100 dark:text-indigo-200 opacity-90">
                        PHP programming resources
                    </p>
                </a>

                <a href="{{ route('storage.resource', ['resource' => 'prince2']) }}"
                   target="_blank"
                   class="bg-gradient-to-br from-green-600 to-emerald-700 hover:from-green-700 hover:to-emerald-800 dark:from-green-700 dark:to-emerald-800 dark:hover:from-green-600 dark:hover:to-emerald-700 text-white rounded-xl p-6 transition-all duration-300 hover:scale-105 hover:shadow-2xl border border-green-500/30 dark:border-green-600/30 group">
                    <div class="flex items-center mb-4">
                        <div class="text-3xl mr-3 group-hover:scale-110 transition-transform">👑</div>
                        <h3 class="text-xl font-bold">PRINCE2</h3>
                    </div>
                    <p class="text-green-100 dark:text-green-200 opacity-90">
                        PRINCE2 project management
                    </p>
                </a>

                <a href="{{ route('storage.resource', ['resource' => 'programming']) }}"
                   target="_blank"
                   class="bg-gradient-to-br from-blue-600 to-indigo-700 hover:from-blue-700 hover:to-indigo-800 dark:from-blue-700 dark:to-indigo-800 dark:hover:from-blue-600 dark:hover:to-indigo-700 text-white rounded-xl p-6 transition-all duration-300 hover:scale-105 hover:shadow-2xl border border-blue-500/30 dark:border-blue-600/30 group">
                    <div class="flex items-center mb-4">
                        <div class="text-3xl mr-3 group-hover:scale-110 transition-transform">💻</div>
                        <h3 class="text-xl font-bold">Programming</h3>
                    </div>
                    <p class="text-blue-100 dark:text-blue-200 opacity-90">
                        General programming resources
                    </p>
                </a>

                <a href="{{ route('storage.resource', ['resource' => 'python']) }}"
                   target="_blank"
                   class="bg-gradient-to-br from-yellow-600 to-blue-600 hover:from-yellow-700 hover:to-blue-700 dark:from-yellow-700 dark:to-blue-700 dark:hover:from-yellow-600 dark:hover:to-blue-600 text-white rounded-xl p-6 transition-all duration-300 hover:scale-105 hover:shadow-2xl border border-yellow-500/30 dark:border-yellow-600/30 group">
                    <div class="flex items-center mb-4">
                        <div class="text-3xl mr-3 group-hover:scale-110 transition-transform">🐍</div>
                        <h3 class="text-xl font-bold">Python</h3>
                    </div>
                    <p class="text-yellow-100 dark:text-yellow-200 opacity-90">
                        Python programming resources
                    </p>
                </a>

                <a href="{{ route('storage.resource', ['resource' => 'safe']) }}"
                   target="_blank"
                   class="bg-gradient-to-br from-green-600 to-teal-700 hover:from-green-700 hover:to-teal-800 dark:from-green-700 dark:to-teal-800 dark:hover:from-green-600 dark:hover:to-teal-700 text-white rounded-xl p-6 transition-all duration-300 hover:scale-105 hover:shadow-2xl border border-green-500/30 dark:border-green-600/30 group">
                    <div class="flex items-center mb-4">
                        <div class="text-3xl mr-3 group-hover:scale-110 transition-transform">🛡️</div>
                        <h3 class="text-xl font-bold">SAFe</h3>
                    </div>
                    <p class="text-green-100 dark:text-green-200 opacity-90">
                        Scaled Agile Framework
                    </p>
                </a>

                <a href="{{ route('storage.resource', ['resource' => 'scrum']) }}"
                   target="_blank"
                   class="bg-gradient-to-br from-orange-600 to-amber-700 hover:from-orange-700 hover:to-amber-800 dark:from-orange-700 dark:to-amber-800 dark:hover:from-orange-600 dark:hover:to-amber-700 text-white rounded-xl p-6 transition-all duration-300 hover:scale-105 hover:shadow-2xl border border-orange-500/30 dark:border-orange-600/30 group">
                    <div class="flex items-center mb-4">
                        <div class="text-3xl mr-3 group-hover:scale-110 transition-transform">🏈</div>
                        <h3 class="text-xl font-bold">Scrum</h3>
                    </div>
                    <p class="text-orange-100 dark:text-orange-200 opacity-90">
                        Agile Scrum framework resources
                    </p>
                </a>

                <a href="{{ route('storage.resource', ['resource' => 'servicenow']) }}"
                   target="_blank"
                   class="bg-gradient-to-br from-blue-600 to-indigo-700 hover:from-blue-700 hover:to-indigo-800 dark:from-blue-700 dark:to-indigo-800 dark:hover:from-blue-600 dark:hover:to-indigo-700 text-white rounded-xl p-6 transition-all duration-300 hover:scale-105 hover:shadow-2xl border border-blue-500/30 dark:border-blue-600/30 group">
                    <div class="flex items-center mb-4">
                        <div class="text-3xl mr-3 group-hover:scale-110 transition-transform">🔄</div>
                        <h3 class="text-xl font-bold">ServiceNow</h3>
                    </div>
                    <p class="text-blue-100 dark:text-blue-200 opacity-90">
                        ServiceNow platform resources
                    </p>
                </a>

                <a href="{{ route('storage.resource', ['resource' => 'spc']) }}"
                   target="_blank"
                   class="bg-gradient-to-br from-purple-600 to-violet-700 hover:from-purple-700 hover:to-violet-800 dark:from-purple-700 dark:to-violet-800 dark:hover:from-purple-600 dark:hover:to-violet-700 text-white rounded-xl p-6 transition-all duration-300 hover:scale-105 hover:shadow-2xl border border-purple-500/30 dark:border-purple-600/30 group">
                    <div class="flex items-center mb-4">
                        <div class="text-3xl mr-3 group-hover:scale-110 transition-transform">📊</div>
                        <h3 class="text-xl font-bold">SPC</h3>
                    </div>
                    <p class="text-purple-100 dark:text-purple-200 opacity-90">
                        Statistical Process Control
                    </p>
                </a>

                <a href="{{ route('storage.resource', ['resource' => 'strategy']) }}"
                   target="_blank"
                   class="bg-gradient-to-br from-gray-600 to-slate-700 hover:from-gray-700 hover:to-slate-800 dark:from-gray-700 dark:to-slate-800 dark:hover:from-gray-600 dark:hover:to-slate-700 text-white rounded-xl p-6 transition-all duration-300 hover:scale-105 hover:shadow-2xl border border-gray-500/30 dark:border-gray-600/30 group">
                    <div class="flex items-center mb-4">
                        <div class="text-3xl mr-3 group-hover:scale-110 transition-transform">🎯</div>
                        <h3 class="text-xl font-bold">Strategy</h3>
                    </div>
                    <p class="text-gray-100 dark:text-gray-200 opacity-90">
                        Strategic planning resources
                    </p>
                </a>

                <a href="{{ route('storage.resource', ['resource' => 'studynotes']) }}"
                   target="_blank"
                   class="bg-gradient-to-br from-blue-600 to-cyan-700 hover:from-blue-700 hover:to-cyan-800 dark:from-blue-700 dark:to-cyan-800 dark:hover:from-blue-600 dark:hover:to-cyan-700 text-white rounded-xl p-6 transition-all duration-300 hover:scale-105 hover:shadow-2xl border border-blue-500/30 dark:border-blue-600/30 group">
                    <div class="flex items-center mb-4">
                        <div class="text-3xl mr-3 group-hover:scale-110 transition-transform">📝</div>
                        <h3 class="text-xl font-bold">Study Notes</h3>
                    </div>
                    <p class="text-blue-100 dark:text-blue-200 opacity-90">
                        Study notes and summaries
                    </p>
                </a>
            </div>
        </section>

        <!-- Footer Note (Level 3: bg-gray-50 dark:bg-gray-700) -->
        <div class="bg-gray-50 dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-lg p-6 mt-12">
            <div class="flex items-start">
                <svg class="w-6 h-6 text-yellow-600 dark:text-yellow-400 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                </svg>
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                        🔐 Secure Access Only
                    </h3>
                    <p class="text-gray-700 dark:text-gray-300">
                        All resources in this protected storage area are for authorized use only.
                        Unauthorized access or distribution is strictly prohibited.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>

<!-- Your Laravel Footer Component -->
<x-footer />

<script>
    // Any additional JavaScript if needed
</script>
</body>
</html>