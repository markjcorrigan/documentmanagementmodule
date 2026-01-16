{{-- resources/views/livewire/cmmi-dev-resources.blade.php --}}
<div class="max-w-6xl mx-auto px-4 py-8">
    <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-8 border-b border-gray-200 dark:border-gray-700 pb-4">
        CMMI for Development Resources
    </h1>

    <!-- Theme Toggle -->
    <div class="fixed bottom-6 right-6 z-50">
        <button id="themeToggle" class="bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-white rounded-full p-3 shadow-lg hover:shadow-xl transition-all">
            <svg id="sunIcon" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
            </svg>
            <svg id="moonIcon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
            </svg>
        </button>
    </div>

    {{-- HTML Process Area Files Section --}}
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">Process Area HTML Files</h2>

        <div class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <p class="text-lg text-gray-700 dark:text-gray-300 mb-4">
                Access individual process area documentation in HTML format.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
                @foreach($htmlFiles as $file)
                    <a href="{{ $this->getFileUrl($file) }}"
                       target="_blank"
                       class="flex items-center px-4 py-3 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg hover:bg-blue-50 dark:hover:bg-blue-900/20 hover:border-blue-500 dark:hover:border-blue-500 transition-all">
                        <svg class="w-5 h-5 mr-3 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <span class="text-gray-900 dark:text-white font-medium">{{ pathinfo($file, PATHINFO_FILENAME) }}</span>
                        <span class="ml-auto text-xs text-gray-500 dark:text-gray-400 uppercase">HTML</span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Resources Section - Modules and Documents --}}
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">Resources</h2>

        {{-- Module PDFs --}}
        <div class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6 mb-6">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Training Modules</h3>
            <p class="text-lg text-gray-700 dark:text-gray-300 mb-4">
                Comprehensive training modules covering CMMI concepts and implementation.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
                @foreach($modulePdfs as $file)
                    <a href="{{ $this->getFileUrl('resources/' . $file) }}"
                       target="_blank"
                       class="flex items-center px-4 py-3 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg hover:bg-red-50 dark:hover:bg-red-900/20 hover:border-red-500 dark:hover:border-red-500 transition-all">
                        <svg class="w-5 h-5 mr-3 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>
                        <span class="text-gray-900 dark:text-white font-medium">{{ ucfirst(pathinfo($file, PATHINFO_FILENAME)) }}</span>
                        <span class="ml-auto text-xs text-gray-500 dark:text-gray-400 uppercase">PDF</span>
                    </a>
                @endforeach
            </div>
        </div>

        {{-- Process Area PDFs from Resources --}}
        <div class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6 mb-6">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Process Area Documents</h3>
            <p class="text-lg text-gray-700 dark:text-gray-300 mb-4">
                Detailed PDF documentation for each process area.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
                @foreach($htmlFiles as $file)
                    @php
                        $filename = pathinfo($file, PATHINFO_FILENAME);
                        $pdfFile = $filename . '.pdf';
                    @endphp
                    <a href="{{ $this->getFileUrl('resources/' . $pdfFile) }}"
                       target="_blank"
                       class="flex items-center px-4 py-3 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg hover:bg-red-50 dark:hover:bg-red-900/20 hover:border-red-500 dark:hover:border-red-500 transition-all">
                        <svg class="w-5 h-5 mr-3 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>
                        <span class="text-gray-900 dark:text-white font-medium">{{ $filename }}</span>
                        <span class="ml-auto text-xs text-gray-500 dark:text-gray-400 uppercase">PDF</span>
                    </a>
                @endforeach
            </div>
        </div>

        {{-- Reference Documents --}}
        <div class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Reference Documents</h3>
            <p class="text-lg text-gray-700 dark:text-gray-300 mb-4">
                Essential CMMI reference guides and implementation documentation.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                @foreach($referenceDocuments as $file)
                    @php
                        $displayName = str_replace(
                            ['cmmifordevelopmentimplementationguide2017', 'cmmidevcombined'],
                            ['CMMI for Development Implementation Guide 2017', 'CMMI Dev Combined'],
                            pathinfo($file, PATHINFO_FILENAME)
                        );
                    @endphp
                    <a href="{{ $this->getFileUrl('resources/' . $file) }}"
                       target="_blank"
                       class="flex items-center px-4 py-3 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg hover:bg-red-50 dark:hover:bg-red-900/20 hover:border-red-500 dark:hover:border-red-500 transition-all">
                        <svg class="w-5 h-5 mr-3 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                        <span class="text-gray-900 dark:text-white font-medium">{{ $displayName }}</span>
                        <span class="ml-auto text-xs text-gray-500 dark:text-gray-400 uppercase">PDF</span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Process Areas Folder Section --}}
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">Process Area Documentation</h2>

        <div class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <p class="text-lg text-gray-700 dark:text-gray-300 mb-4">
                Detailed process area documentation organized by folder. Each process area contains comprehensive PDF documentation.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
                @foreach($processAreaPdfs as $folder => $name)
                    <a href="{{ $this->getFileUrl('resources/pareas/' . $folder . '/' . $folder . '.pdf') }}"
                       target="_blank"
                       class="flex items-center px-4 py-3 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg hover:bg-green-50 dark:hover:bg-green-900/20 hover:border-green-500 dark:hover:border-green-500 transition-all group">
                        <svg class="w-5 h-5 mr-3 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                        </svg>
                        <div class="flex-1">
                            <span class="block text-gray-900 dark:text-white font-medium">{{ strtoupper($folder) }}</span>
                            <span class="block text-xs text-gray-500 dark:text-gray-400">{{ $name }}</span>
                        </div>
                        <span class="ml-2 text-xs text-gray-500 dark:text-gray-400 uppercase">PDF</span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Info Card --}}
    <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6">
        <div class="flex items-start">
            <svg class="w-6 h-6 text-blue-600 dark:text-blue-400 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <div>
                <h4 class="text-lg font-semibold text-blue-900 dark:text-blue-100 mb-2">About CMMI for Development</h4>
                <p class="text-blue-800 dark:text-blue-200">
                    The Capability Maturity Model Integration (CMMI) for Development provides guidance for applying CMMI best practices in a development organization. The resources on this page include process area documentation, training modules, and implementation guides to support your CMMI journey.
                </p>
            </div>
        </div>
    </div>
</div>

<script>
    // Theme toggle functionality
    const themeToggle = document.getElementById('themeToggle');
    const sunIcon = document.getElementById('sunIcon');
    const moonIcon = document.getElementById('moonIcon');

    // Check for saved theme or prefer-color-scheme
    const prefersDarkScheme = window.matchMedia('(prefers-color-scheme: dark)');
    const currentTheme = localStorage.getItem('theme');

    if (currentTheme === 'dark' || (!currentTheme && prefersDarkScheme.matches)) {
        document.documentElement.classList.add('dark');
        sunIcon.classList.remove('hidden');
        moonIcon.classList.add('hidden');
    } else {
        document.documentElement.classList.remove('dark');
        sunIcon.classList.add('hidden');
        moonIcon.classList.remove('hidden');
    }

    themeToggle.addEventListener('click', () => {
        document.documentElement.classList.toggle('dark');

        if (document.documentElement.classList.contains('dark')) {
            localStorage.setItem('theme', 'dark');
            sunIcon.classList.remove('hidden');
            moonIcon.classList.add('hidden');
        } else {
            localStorage.setItem('theme', 'light');
            sunIcon.classList.add('hidden');
            moonIcon.classList.remove('hidden');
        }
    });
</script>