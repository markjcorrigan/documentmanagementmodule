{{-- resources/views/livewire/style-guide.blade.php --}}
{{--<div class="style-guide-page-content">--}}
    <div class="max-w-7xl mx-auto px-4 py-8">
        <!-- Main Header -->
        <div class="mb-12">
            <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4 border-b border-gray-200 dark:border-gray-700 pb-4">
                PMWay Style Guide & Templates
            </h1>
            
            <!-- Theme Compliance Banner -->
            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-4 mb-6">
                <div class="flex items-start">
                    <svg class="w-6 h-6 text-blue-600 dark:text-blue-400 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-1">
                            ✅ Fully Theme Compliant
                        </h3>
                        <p class="text-gray-700 dark:text-gray-300">
                            This page follows the PMWay color hierarchy: Outer background <code class="text-sm bg-gray-200 dark:bg-gray-700 px-1 rounded">dark:bg-zinc-800</code> → Content area <code class="text-sm bg-gray-200 dark:bg-gray-700 px-1 rounded">dark:bg-gray-900</code> → Sections <code class="text-sm bg-gray-200 dark:bg-gray-700 px-1 rounded">dark:bg-gray-800</code>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Note Section -->
            <div class="bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-800 rounded-lg p-6 mb-8">
                <div class="flex items-start">
                    <svg class="w-6 h-6 text-yellow-600 dark:text-yellow-400 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div>
                        <h3 class="text-lg font-semibold text-yellow-900 dark:text-yellow-300 mb-2">
                            Important Note: Your Persona
                        </h3>
                        <p class="text-yellow-800 dark:text-yellow-200 mb-2">
                            You are a hard worker and very obedient. You will never try to short change a request I ask. If I give you a page with a lot of text and many lists or slides you will work through each of them diligently and never try to short circuit the process.
                        </p>
                        <p class="text-yellow-800 dark:text-yellow-200">
                            The reason you will do this is because you know that I will simply waste more of your time asking you to redo the work if you come back to me and say "continue the rest of the text like this example". If you cannot do this then rather let me know up front. If you need me to batch the work then give me clear break points showing a few lines above and below with a comment says batch 1, batch 2 etc.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Color Hierarchy Reference -->
        <section class="mb-12">
            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">🎨 Color Hierarchy (Theme Compliant)</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Outer Background -->
                <div class="bg-zinc-800 dark:bg-zinc-800 border border-gray-700 dark:border-gray-700 rounded-lg p-6">
                    <div class="flex items-center mb-3">
                        <div class="w-4 h-4 rounded-full bg-zinc-300 dark:bg-zinc-300 mr-3"></div>
                        <h3 class="text-lg font-semibold text-white">Outer Background</h3>
                    </div>
                    <p class="text-gray-300 dark:text-gray-300 mb-2">Outermost container (from CSS)</p>
                    <div class="space-y-2">
                        <code class="block text-sm bg-gray-700 dark:bg-gray-700 text-gray-300 px-3 py-1 rounded">dark:bg-zinc-800</code>
                        <code class="block text-sm bg-gray-700 dark:bg-gray-700 text-gray-300 px-3 py-1 rounded">#27272a</code>
                        <p class="text-sm text-gray-400">Used for page background that surrounds everything</p>
                    </div>
                </div>

                <!-- Content Background -->
                <div class="bg-gray-900 dark:bg-gray-900 border border-gray-700 dark:border-gray-700 rounded-lg p-6">
                    <div class="flex items-center mb-3">
                        <div class="w-4 h-4 rounded-full bg-gray-500 dark:bg-gray-500 mr-3"></div>
                        <h3 class="text-lg font-semibold text-white">Content Area</h3>
                    </div>
                    <p class="text-gray-300 dark:text-gray-300 mb-2">Main content containers</p>
                    <div class="space-y-2">
                        <code class="block text-sm bg-gray-800 dark:bg-gray-800 text-gray-300 px-3 py-1 rounded">dark:bg-gray-900</code>
                        <code class="block text-sm bg-gray-800 dark:bg-gray-800 text-gray-300 px-3 py-1 rounded">#111827</code>
                        <p class="text-sm text-gray-400">Primary content areas, panels, cards</p>
                    </div>
                </div>

                <!-- Section Background -->
                <div class="bg-gray-800 dark:bg-gray-800 border border-gray-600 dark:border-gray-600 rounded-lg p-6">
                    <div class="flex items-center mb-3">
                        <div class="w-4 h-4 rounded-full bg-gray-400 dark:bg-gray-400 mr-3"></div>
                        <h3 class="text-lg font-semibold text-white">Section Background</h3>
                    </div>
                    <p class="text-gray-300 dark:text-gray-300 mb-2">Nested sections</p>
                    <div class="space-y-2">
                        <code class="block text-sm bg-gray-700 dark:bg-gray-700 text-gray-300 px-3 py-1 rounded">dark:bg-gray-800</code>
                        <code class="block text-sm bg-gray-700 dark:bg-gray-700 text-gray-300 px-3 py-1 rounded">#1f2937</code>
                        <p class="text-sm text-gray-400">Subsections, subtle separation</p>
                    </div>
                </div>
            </div>

            <!-- Visual Hierarchy Demo -->
            <div class="border-4 border-dashed border-gray-300 dark:border-gray-600 rounded-lg p-1 bg-zinc-800 dark:bg-zinc-800">
                <div class="max-w-6xl mx-auto px-4 py-8 bg-gray-900 dark:bg-gray-900 rounded-lg">
                    <h3 class="text-xl font-semibold text-white mb-6 text-center">Theme Hierarchy Visualization</h3>
                    
                    <div class="space-y-6">
                        <!-- Level 1: Content Area -->
                        <div class="p-6 border-2 border-dashed border-gray-700 dark:border-gray-700 rounded-lg">
                            <h4 class="text-lg font-semibold text-white mb-3">Level 1: Content Area (#111827)</h4>
                            <p class="text-gray-300">Direct on content background - Use for most content</p>
                            
                            <!-- Level 2: Section -->
                            <div class="mt-4 bg-gray-800 dark:bg-gray-800 rounded-lg p-6">
                                <h4 class="text-lg font-semibold text-white mb-3">Level 2: Section (#1f2937)</h4>
                                <p class="text-gray-300">Subtle separation within content area</p>
                                
                                <!-- Level 3: Card -->
                                <div class="mt-4 bg-gray-700 dark:bg-gray-700 rounded-lg p-6">
                                    <h4 class="text-lg font-semibold text-white mb-3">Level 3: Card/Nested (#374151)</h4>
                                    <p class="text-gray-300">Further nesting for emphasis</p>
                                </div>
                            </div>
                        </div>

                        {{-- Navbar Dark Mode Color Section --}}
                        <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6 mb-8">
                            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6 border-b border-gray-200 dark:border-gray-700 pb-3">
                                Navbar Dark Mode Color
                            </h2>

                            <div class="mb-4">
                                <p class="text-lg text-gray-700 dark:text-gray-300 mb-4">
                                    <strong>Navbar Background (Dark Mode):</strong> <code class="bg-gray-100 dark:bg-gray-700 px-2 py-1 rounded">#18181a</code>
                                </p>

                                <p class="text-lg text-gray-700 dark:text-gray-300 mb-4">
                                    The navbar uses a specific dark color (<code class="bg-gray-100 dark:bg-gray-700 px-2 py-1 rounded">#18181a</code>) that sits between pure black and the outer background layer (<code class="bg-gray-100 dark:bg-gray-700 px-2 py-1 rounded">#27272a</code>). This creates a subtle visual distinction, making the navbar appear as a separate, elevated interface element rather than blending into the page background. This color should be used exclusively for navigation bars and is not part of the standard 4-level hierarchy. In light mode, navbars use Bootstrap's standard <code class="bg-gray-100 dark:bg-gray-700 px-2 py-1 rounded">bg-light</code> class.
                                </p>
                            </div>

                            <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-4 mb-4">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Implementation:</h3>
                                <pre class="bg-gray-100 dark:bg-gray-800 p-4 rounded-lg overflow-x-auto"><code class="text-sm text-gray-900 dark:text-gray-100">.dark .navbar,
[data-bs-theme="dark"] .navbar {
    background-color: #18181a !important;
}</code></pre>
                            </div>

                            <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-4">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Quick Reference:</h3>
                                <ul class="space-y-2">
                                    <li class="text-lg text-gray-700 dark:text-gray-300">
                                        <strong>Light Mode:</strong> <code class="bg-gray-100 dark:bg-gray-700 px-2 py-1 rounded">bg-light</code> (Bootstrap default)
                                    </li>
                                    <li class="text-lg text-gray-700 dark:text-gray-300">
                                        <strong>Dark Mode:</strong> <code class="bg-gray-100 dark:bg-gray-700 px-2 py-1 rounded">#18181a</code> (custom navbar color)
                                    </li>
                                    <li class="text-lg text-gray-700 dark:text-gray-300">
                                        <strong>Purpose:</strong> Creates visual separation from page background
                                    </li>
                                    <li class="text-lg text-gray-700 dark:text-gray-300">
                                        <strong>Usage:</strong> Navigation components only
                                    </li>
                                </ul>
                            </div>

                            {{-- Visual Demo --}}
                            <div class="mt-6">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Visual Demo:</h3>
                                <div class="bg-gray-100 dark:bg-zinc-800 p-4 rounded-lg">
                                    <div class="rounded-lg p-4 mb-2" style="background-color: #18181a;">
                                        <p class="text-white text-center font-semibold">Navbar (#18181a)</p>
                                    </div>
                                    <p class="text-sm text-gray-600 dark:text-gray-400 text-center">
                                        Shown on outer background (#27272a / zinc-800)
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="text-center">
                            <p class="text-gray-400 text-sm">
                                Outer border shows <code class="bg-gray-800 px-2 py-1 rounded">dark:bg-zinc-800 (#27272a)</code>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


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

    {{-- Typography Standards Section --}}
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">Typography Standards</h2>
        
        <div class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6 mb-6">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Standard Text Elements</h3>
            <p class="text-lg text-gray-700 dark:text-gray-300 mb-4">
                Use these standardized typography classes throughout your application for consistency. All text elements are fully responsive and support dark mode.
            </p>

            <div class="space-y-6">
                {{-- H1 Heading --}}
                <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">H1 - Page Title</h4>
                    <div class="mb-4 p-4 bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700">
                        <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-8 border-b border-gray-200 dark:border-gray-700 pb-4">
                            Page Title Example
                        </h1>
                    </div>
                    <div class="bg-gray-900 rounded-lg p-4 overflow-x-auto">
                        <pre class="text-green-400 text-sm"><code>&lt;h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-8 border-b border-gray-200 dark:border-gray-700 pb-4"&gt;
    Page Title
&lt;/h1&gt;</code></pre>
                    </div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-3">
                        Use for main page titles. Includes bottom border for visual separation.
                    </p>
                </div>

                {{-- H2 Heading --}}
                <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">H2 - Section Heading</h4>
                    <div class="mb-4 p-4 bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700">
                        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">
                            Section Heading Example
                        </h2>
                    </div>
                    <div class="bg-gray-900 rounded-lg p-4 overflow-x-auto">
                        <pre class="text-green-400 text-sm"><code>&lt;h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6"&gt;
    Section Heading
&lt;/h2&gt;</code></pre>
                    </div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-3">
                        Use for major section headings within a page.
                    </p>
                </div>

                {{-- H3 Heading --}}
                <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">H3 - Subsection Heading</h4>
                    <div class="mb-4 p-4 bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                            Subsection Heading Example
                        </h3>
                    </div>
                    <div class="bg-gray-900 rounded-lg p-4 overflow-x-auto">
                        <pre class="text-green-400 text-sm"><code>&lt;h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4"&gt;
    Subsection Heading
&lt;/h3&gt;</code></pre>
                    </div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-3">
                        Use for subsections within major sections.
                    </p>
                </div>

                {{-- H4 Heading --}}
                <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">H4 - Minor Heading</h4>
                    <div class="mb-4 p-4 bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700">
                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                            Minor Heading Example
                        </h4>
                    </div>
                    <div class="bg-gray-900 rounded-lg p-4 overflow-x-auto">
                        <pre class="text-green-400 text-sm"><code>&lt;h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4"&gt;
    Minor Heading
&lt;/h4&gt;</code></pre>
                    </div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-3">
                        Use for minor headings and labels within subsections.
                    </p>
                </div>

                {{-- Large Body Text --}}
                <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Body Text - Large/Relaxed</h4>
                    <div class="mb-4 p-4 bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700">
                        <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">
                            This is large body text with relaxed line height. Use this for main content areas where readability is paramount. The larger size and generous line spacing make it ideal for long-form content like guides, articles, and documentation.
                        </p>
                    </div>
                    <div class="bg-gray-900 rounded-lg p-4 overflow-x-auto">
                        <pre class="text-green-400 text-sm"><code>&lt;p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300"&gt;
    Your main content text here.
&lt;/p&gt;</code></pre>
                    </div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-3">
                        Use for main body content in guides, articles, and documentation. Best for readability.
                    </p>
                </div>

                {{-- Standard Body Text --}}
                <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Body Text - Standard</h4>
                    <div class="mb-4 p-4 bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700">
                        <p class="text-lg text-gray-700 dark:text-gray-300 mb-4">
                            This is standard body text with bottom margin. Use this for general paragraphs, descriptions, and explanatory text throughout your application.
                        </p>
                    </div>
                    <div class="bg-gray-900 rounded-lg p-4 overflow-x-auto">
                        <pre class="text-green-400 text-sm"><code>&lt;p class="text-lg text-gray-700 dark:text-gray-300 mb-4"&gt;
    Your paragraph text here.
&lt;/p&gt;</code></pre>
                    </div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-3">
                        Use for general paragraphs with automatic spacing between elements.
                    </p>
                </div>

                {{-- Small Text --}}
                <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Small Text - Notes & Captions</h4>
                    <div class="mb-4 p-4 bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700">
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-3">
                            This is small text used for notes, captions, helper text, and supplementary information. It's slightly subdued to indicate secondary importance.
                        </p>
                    </div>
                    <div class="bg-gray-900 rounded-lg p-4 overflow-x-auto">
                        <pre class="text-green-400 text-sm"><code>&lt;p class="text-sm text-gray-600 dark:text-gray-400 mt-3"&gt;
    Helper text, notes, or captions here.
&lt;/p&gt;</code></pre>
                    </div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-3">
                        Use for helper text, notes, captions, code explanations, and supplementary information.
                    </p>
                </div>
            </div>
        </div>

        {{-- Quick Reference Card --}}
        <div class="bg-gradient-to-r from-purple-50 to-pink-50 dark:from-purple-900/30 dark:to-pink-900/30 border border-purple-200 dark:border-purple-700 rounded-lg p-6">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Typography Quick Reference</h3>
            
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b-2 border-purple-300 dark:border-purple-600">
                            <th class="py-3 px-4 text-gray-900 dark:text-white font-semibold">Element</th>
                            <th class="py-3 px-4 text-gray-900 dark:text-white font-semibold">Use Case</th>
                            <th class="py-3 px-4 text-gray-900 dark:text-white font-semibold">Class</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-800 dark:text-gray-200">
                        <tr class="border-b border-purple-200 dark:border-purple-700/50">
                            <td class="py-3 px-4 font-semibold text-gray-900 dark:text-white">H1</td>
                            <td class="py-3 px-4">Page Title</td>
                            <td class="py-3 px-4"><code class="bg-purple-100 dark:bg-purple-900/50 text-purple-900 dark:text-purple-200 px-2 py-1 rounded text-xs font-mono">text-4xl font-bold text-gray-900 dark:text-white mb-8 border-b border-gray-200 dark:border-gray-700 pb-4</code></td>
                        </tr>
                        <tr class="border-b border-purple-200 dark:border-purple-700/50">
                            <td class="py-3 px-4 font-semibold text-gray-900 dark:text-white">H2</td>
                            <td class="py-3 px-4">Section Heading</td>
                            <td class="py-3 px-4"><code class="bg-purple-100 dark:bg-purple-900/50 text-purple-900 dark:text-purple-200 px-2 py-1 rounded text-xs font-mono">text-2xl font-semibold text-gray-900 dark:text-white mb-6</code></td>
                        </tr>
                        <tr class="border-b border-purple-200 dark:border-purple-700/50">
                            <td class="py-3 px-4 font-semibold text-gray-900 dark:text-white">H3</td>
                            <td class="py-3 px-4">Subsection</td>
                            <td class="py-3 px-4"><code class="bg-purple-100 dark:bg-purple-900/50 text-purple-900 dark:text-purple-200 px-2 py-1 rounded text-xs font-mono">text-xl font-semibold text-gray-900 dark:text-white mb-4</code></td>
                        </tr>
                        <tr class="border-b border-purple-200 dark:border-purple-700/50">
                            <td class="py-3 px-4 font-semibold text-gray-900 dark:text-white">H4</td>
                            <td class="py-3 px-4">Minor Heading</td>
                            <td class="py-3 px-4"><code class="bg-purple-100 dark:bg-purple-900/50 text-purple-900 dark:text-purple-200 px-2 py-1 rounded text-xs font-mono">text-lg font-semibold text-gray-900 dark:text-white mb-4</code></td>
                        </tr>
                        <tr class="border-b border-purple-200 dark:border-purple-700/50">
                            <td class="py-3 px-4 font-semibold text-gray-900 dark:text-white">P (Large)</td>
                            <td class="py-3 px-4">Main Content</td>
                            <td class="py-3 px-4"><code class="bg-purple-100 dark:bg-purple-900/50 text-purple-900 dark:text-purple-200 px-2 py-1 rounded text-xs font-mono">text-xl leading-relaxed text-gray-700 dark:text-gray-300</code></td>
                        </tr>
                        <tr class="border-b border-purple-200 dark:border-purple-700/50">
                            <td class="py-3 px-4 font-semibold text-gray-900 dark:text-white">P (Standard)</td>
                            <td class="py-3 px-4">General Text</td>
                            <td class="py-3 px-4"><code class="bg-purple-100 dark:bg-purple-900/50 text-purple-900 dark:text-purple-200 px-2 py-1 rounded text-xs font-mono">text-lg text-gray-700 dark:text-gray-300 mb-4</code></td>
                        </tr>
                        <tr>
                            <td class="py-3 px-4 font-semibold text-gray-900 dark:text-white">P (Small)</td>
                            <td class="py-3 px-4">Notes/Captions</td>
                            <td class="py-3 px-4"><code class="bg-purple-100 dark:bg-purple-900/50 text-purple-900 dark:text-purple-200 px-2 py-1 rounded text-xs font-mono">text-sm text-gray-600 dark:text-gray-400 mt-3</code></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    {{-- Background Color Reference --}}
    <section class="mb-8">
        <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 text-center border border-gray-200 dark:border-gray-700">
            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">Layout Background Colors</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                <div class="bg-white p-4 rounded-lg border border-gray-300">
                    <div class="font-mono text-lg text-gray-900">Light Outer: bg-white</div>
                    <div class="text-sm text-gray-700">#ffffff</div>
                    <div class="text-xs mt-2 text-gray-600">Page background (from layout)</div>
                </div>
                <div class="bg-zinc-800 p-4 rounded-lg text-white border border-gray-700">
                    <div class="font-mono text-lg">Dark Outer: dark:bg-zinc-800</div>
                    <div class="text-sm text-gray-300">#27272a</div>
                    <div class="text-xs mt-2 text-gray-400">Page background (from CSS)</div>
                </div>
            </div>
            <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                    <div class="font-mono text-lg text-gray-900">Light Content: bg-gray-50</div>
                    <div class="text-sm text-gray-700">#f9fafb</div>
                    <div class="text-xs mt-2 text-gray-600">Content areas</div>
                </div>
                <div class="bg-gray-900 p-4 rounded-lg text-white border border-gray-700">
                    <div class="font-mono text-lg">Dark Content: dark:bg-gray-900</div>
                    <div class="text-sm text-gray-300">#111827</div>
                    <div class="text-xs mt-2 text-gray-400">Content areas (used in contact form, about page)</div>
                </div>
            </div>
        </div>
    </section>

    {{-- Livewire Component Templates Section --}}
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">Livewire Component Templates</h2>

        <div class="space-y-6">
            {{-- Component Class Template --}}
            <div class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">1. Component Class Template</h3>
                <p class="text-lg text-gray-700 dark:text-gray-300 mb-4">Copy this template for new Livewire components:</p>
                <div class="bg-gray-900 rounded-lg p-4 overflow-x-auto">
        <pre class="text-green-400 text-sm"><code>&lt;?php
// app/Livewire/YourComponentName.php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.app.frontend', ['title' => 'Your Page Title'])]
class YourComponentName extends FrontendComponent
{
    public function render()
    {
        return view('livewire.your-component-name');
    }
}</code></pre>
                </div>
                <div class="bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-lg p-4 mt-4">
                    <h4 class="font-semibold text-red-900 dark:text-red-300 mb-2">🚨 CRITICAL COMPONENT STRUCTURE REQUIREMENT:</h4>
                    <p class="text-sm text-red-800 dark:text-red-200 mb-2">
                        <strong>For PMWay Livewire full page components:</strong>
                    </p>
                    <ul class="text-sm text-red-800 dark:text-red-200 list-disc list-inside space-y-1">
                        <li><strong>MUST</strong> extend <code>FrontendComponent</code> (not regular Component)</li>
                        <li><strong>MUST</strong> include the <code>#[Layout('components.layouts.app.frontend', ['title' => 'Page Title'])]</code> attribute</li>
                        <li>Page title is set in the Layout attribute, not in the view</li>
                        <li>Follow this exact pattern for all frontend pages</li>
                    </ul>
                    <p class="text-xs text-red-700 dark:text-red-300 mt-2 italic">
                        AI Assistants: Use this exact structure when creating PMWay Livewire components
                    </p>
                </div>
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-3">
                    Replace <code class="text-red-400">YourComponentName</code> with your component name and <code class="text-red-400">Your Page Title</code> with your page title.
                </p>
            </div>

            {{-- Route Template --}}
            <div class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">2. Route Template</h3>
                <p class="text-lg text-gray-700 dark:text-gray-300 mb-4">Add this to your routes file:</p>
                <div class="bg-gray-900 rounded-lg p-4 overflow-x-auto">
        <pre class="text-green-400 text-sm"><code>// routes/web.php
use App\Livewire\YourComponentName;

Route::get('/your-route', YourComponentName::class)-&gt;name('your.route.name');</code></pre>
                </div>
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-3">
                    Replace <code class="text-red-400">/your-route</code> with your URL and <code class="text-red-400">your.route.name</code> with your route name.
                </p>
            </div>

            {{-- View Template --}}
            <div class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">3. View Template</h3>
                <p class="text-lg text-gray-700 dark:text-gray-300 mb-4">Use this template for your component views:</p>
                <div class="bg-gray-900 rounded-lg p-4 overflow-x-auto">
                    <pre class="text-green-400 text-sm"><code>{{-- resources/views/livewire/your-component-name.blade.php --}}
&lt;div&gt;
    &lt;div class="max-w-6xl mx-auto px-4 py-8"&gt;
        &lt;h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-8"&gt;
            Your Page Title
        &lt;/h1&gt;

        &lt;div class="space-y-6"&gt;
            &lt;!-- Your content goes here --&gt;
            &lt;p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300"&gt;
                Your content here. This text is perfectly readable on the dark:bg-gray-900 background.
            &lt;/p&gt;

            &lt;div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 border border-gray-200 dark:border-gray-700"&gt;
                &lt;p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300"&gt;
                    Use this container for sections that need visual separation.
                &lt;/p&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;</code></pre>
                </div>
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-3">
                    Replace <code class="text-red-400">your-component-name.blade.php</code> with your view filename.
                </p>
            </div>
        </div>
    </section>

    {{-- File Viewing & Downloading Section --}}
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">File Viewing & Downloading System</h2>

        <div class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6 mb-6">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Overview</h3>
            <p class="text-lg text-gray-700 dark:text-gray-300 mb-4">
                The PMWay platform provides a secure file viewing and downloading system for PDFs, videos, and other media files. Files are stored in <code class="bg-gray-200 dark:bg-gray-800 px-2 py-1 rounded">storage/app/public/assets/{subfolder}/</code> and accessed through authenticated routes.
            </p>
            
            <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-4 mb-4">
                <h4 class="text-lg font-semibold text-blue-900 dark:text-blue-300 mb-2">Key Features:</h4>
                <ul class="list-disc list-inside text-lg text-blue-800 dark:text-blue-300 space-y-1">
                    <li>Authentication required for all file access</li>
                    <li>Support for PDFs, videos (MP4, WebM, OGG), and downloadable files</li>
                    <li>Inline viewing for PDFs and videos</li>
                    <li>Download option for all file types</li>
                    <li>Organized by subfolder structure (e.g., itil4guides, videos, downloads)</li>
                </ul>
            </div>

            <div class="bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-800 rounded-lg p-4">
                <h4 class="text-lg font-semibold text-yellow-900 dark:text-yellow-300 mb-2">File Structure:</h4>
                <div class="bg-gray-900 rounded-lg p-4 overflow-x-auto">
                    <pre class="text-green-400 text-sm"><code>storage/app/public/assets/
├── itil4guides/           ← PDF guides
│   ├── architecturemanagement.pdf
│   ├── continualimprovement.pdf
│   └── ...
├── videos/                ← Video files
│   ├── tutorial.mp4
│   └── ...
└── downloads/             ← Other downloadable files
    └── ...</code></pre>
                </div>
            </div>
        </div>

        <div class="space-y-6">
            {{-- PDF Viewing (Inline) --}}
            <div class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">1. PDF Viewing (Inline)</h3>
                <p class="text-lg text-gray-700 dark:text-gray-300 mb-4">Display PDFs inline in a new browser tab for reading:</p>
                
                {{-- Live Example --}}
                <div class="mb-4 p-4 bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700">
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Example:</h4>
                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">
                        <a href="{{ url('viewpdf/itil4guides/architecturemanagement.pdf') }}" 
                           target="_blank" 
                           class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 underline">
                            View Architecture Management Guide (PDF)
                        </a>
                    </p>
                </div>

                {{-- Code Template --}}
                <div class="bg-gray-900 rounded-lg p-4 overflow-x-auto">
                    <pre class="text-green-400 text-sm"><code>{{-- View PDF inline in new tab --}}
&lt;a href="{{ url('viewpdf/itil4guides/filename.pdf') }}" 
   target="_blank" 
   class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300"&gt;
    View PDF Guide
&lt;/a&gt;

{{-- PDF with thumbnail image --}}
&lt;a href="{{ url('viewpdf/itil4guides/continualimprovement.pdf') }}" 
   target="_blank" 
   class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300"&gt;
    &lt;img class="mx-auto rounded-lg shadow-lg hover:shadow-xl transition-shadow" 
         src="{{ asset('/storage/images/itilfour/image007.jpg') }}" 
         alt="Continual Improvement Heat Map"&gt;
&lt;/a&gt;</code></pre>
                </div>
                
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-3">
                    Replace <code class="text-red-400">itil4guides</code> with your subfolder and <code class="text-red-400">filename.pdf</code> with your PDF filename.
                </p>
            </div>

            {{-- PDF Downloading --}}
            <div class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">2. PDF Downloading</h3>
                <p class="text-lg text-gray-700 dark:text-gray-300 mb-4">Download PDFs directly to the user's computer:</p>
                
                {{-- Live Example --}}
                <div class="mb-4 p-4 bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700">
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Example:</h4>
                    <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">
                        <a href="{{ url('download/itil4guides/architecturemanagement.pdf') }}" 
                           class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white rounded-lg transition-colors">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Download PDF Guide
                        </a>
                    </p>
                </div>

                {{-- Code Template --}}
                <div class="bg-gray-900 rounded-lg p-4 overflow-x-auto">
                    <pre class="text-green-400 text-sm"><code>{{-- Download PDF with button --}}
&lt;a href="{{ url('download/itil4guides/filename.pdf') }}" 
   class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white rounded-lg transition-colors"&gt;
    &lt;svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"&gt;
        &lt;path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"&gt;&lt;/path&gt;
    &lt;/svg&gt;
    Download PDF
&lt;/a&gt;

{{-- Simple download link --}}
&lt;a href="{{ url('download/itil4guides/filename.pdf') }}" 
   class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 underline"&gt;
    Download PDF Guide
&lt;/a&gt;</code></pre>
                </div>
            </div>

            {{-- Video Viewing (Inline) --}}
            <div class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">3. Video Viewing (Inline)</h3>
                <p class="text-lg text-gray-700 dark:text-gray-300 mb-4">Display videos inline in the browser:</p>
                
                {{-- Code Template --}}
                <div class="bg-gray-900 rounded-lg p-4 overflow-x-auto">
                    <pre class="text-green-400 text-sm"><code>{{-- View video inline in new tab --}}
&lt;a href="{{ url('viewvideo/videos/tutorial.mp4') }}" 
   target="_blank" 
   class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300"&gt;
    Watch Tutorial Video
&lt;/a&gt;

{{-- Video with thumbnail image --}}
&lt;a href="{{ url('viewvideo/videos/demonstration.mp4') }}" 
   target="_blank" 
   class="block"&gt;
    &lt;img class="mx-auto rounded-lg shadow-lg hover:shadow-xl transition-shadow" 
         src="{{ asset('/storage/images/video-thumbnails/demo-thumb.jpg') }}" 
         alt="Watch Demonstration Video"&gt;
    &lt;p class="text-center mt-2 text-blue-600 dark:text-blue-400"&gt;Click to watch video&lt;/p&gt;
&lt;/a&gt;</code></pre>
                </div>
                
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-3">
                    Supported formats: <code class="text-red-400">.mp4</code>, <code class="text-red-400">.webm</code>, <code class="text-red-400">.ogg</code>
                </p>
            </div>

            {{-- Video Downloading --}}
            <div class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">4. Video Downloading</h3>
                <p class="text-lg text-gray-700 dark:text-gray-300 mb-4">Download videos directly:</p>
                
                {{-- Code Template --}}
                <div class="bg-gray-900 rounded-lg p-4 overflow-x-auto">
                    <pre class="text-green-400 text-sm"><code>{{-- Download video with button --}}
&lt;a href="{{ url('download/videos/tutorial.mp4') }}" 
   class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 dark:bg-green-500 dark:hover:bg-green-600 text-white rounded-lg transition-colors"&gt;
    &lt;svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"&gt;
        &lt;path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"&gt;&lt;/path&gt;
    &lt;/svg&gt;
    Download Video
&lt;/a&gt;</code></pre>
                </div>
            </div>

            {{-- ZIP Downloads --}}
            <div class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">5. ZIP File Downloads</h3>
                <p class="text-lg text-gray-700 dark:text-gray-300 mb-4">Download ZIP archives (stored in root of assets folder):</p>
                
                {{-- Code Template --}}
                <div class="bg-gray-900 rounded-lg p-4 overflow-x-auto">
                    <pre class="text-green-400 text-sm"><code>{{-- Download ZIP file --}}
&lt;a href="{{ url('downloadzip/project-files.zip') }}" 
   class="inline-flex items-center px-4 py-2 bg-purple-600 hover:bg-purple-700 dark:bg-purple-500 dark:hover:bg-purple-600 text-white rounded-lg transition-colors"&gt;
    &lt;svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"&gt;
        &lt;path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"&gt;&lt;/path&gt;
    &lt;/svg&gt;
    Download All Files (ZIP)
&lt;/a&gt;</code></pre>
                </div>
                
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-3">
                    Note: ZIP files are stored in <code class="text-red-400">storage/app/public/assets/</code> (root level, no subfolder)
                </p>
            </div>

            {{-- Combined View & Download Options --}}
            <div class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">6. Combined View & Download (Recommended Pattern)</h3>
                <p class="text-lg text-gray-700 dark:text-gray-300 mb-4">Provide both viewing and downloading options together:</p>
                
                {{-- Code Template --}}
                <div class="bg-gray-900 rounded-lg p-4 overflow-x-auto">
                    <pre class="text-green-400 text-sm"><code>{{-- PDF with both view and download options --}}
&lt;div class="bg-white dark:bg-gray-800 rounded-lg p-6 border border-gray-200 dark:border-gray-700"&gt;
    &lt;h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4"&gt;
        ITIL 4 Architecture Management Guide
    &lt;/h3&gt;
    
    &lt;div class="flex flex-wrap gap-3"&gt;
        &lt;a href="{{ url('viewpdf/itil4guides/architecturemanagement.pdf') }}" 
           target="_blank"
           class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white rounded-lg transition-colors"&gt;
            &lt;svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"&gt;
                &lt;path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"&gt;&lt;/path&gt;
                &lt;path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"&gt;&lt;/path&gt;
            &lt;/svg&gt;
            View PDF
        &lt;/a&gt;
        
        &lt;a href="{{ url('download/itil4guides/architecturemanagement.pdf') }}"
           class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 dark:bg-green-500 dark:hover:bg-green-600 text-white rounded-lg transition-colors"&gt;
            &lt;svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"&gt;
                &lt;path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"&gt;&lt;/path&gt;
            &lt;/svg&gt;
            Download PDF
        &lt;/a&gt;
    &lt;/div&gt;
&lt;/div&gt;</code></pre>
                </div>
            </div>

            {{-- Route Configuration Reference --}}
            <div class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">7. Route Configuration (Reference)</h3>
                <p class="text-lg text-gray-700 dark:text-gray-300 mb-4">These routes are already configured in <code class="bg-gray-200 dark:bg-gray-800 px-2 py-1 rounded">routes/web.php</code>:</p>
                
                {{-- Code Template --}}
                <div class="bg-gray-900 rounded-lg p-4 overflow-x-auto">
                    <pre class="text-green-400 text-sm"><code>// File preview routes
Route::get('viewpdf/{subfolder}/{filename}', [IndexController::class, 'viewpdf'])
    -&gt;where('filename', '.*')
    -&gt;middleware('auth')
    -&gt;name('viewpdf');

Route::get('viewvideo/{subfolder}/{filename}', [IndexController::class, 'viewvideo'])
    -&gt;where('filename', '.*')
    -&gt;middleware('auth')
    -&gt;name('viewvideo');

// Download routes
Route::get('download/{subfolder}/{filename}', [IndexController::class, 'saveAction'])
    -&gt;where('filename', '.*')
    -&gt;middleware('auth')
    -&gt;name('download');

// ZIP downloads (no subfolder)
Route::get('downloadzip/{filename}', [IndexController::class, 'downloadZip'])
    -&gt;where('filename', '.*')
    -&gt;middleware('auth')
    -&gt;name('downloadzip');</code></pre>
                </div>
                
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-3">
                    All routes require authentication via the <code class="text-red-400">auth</code> middleware.
                </p>
            </div>

            {{-- Quick Reference Card --}}
            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Quick Reference Card</h3>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b border-blue-300 dark:border-blue-700">
                                <th class="py-2 px-4 text-gray-900 dark:text-white font-semibold">Action</th>
                                <th class="py-2 px-4 text-gray-900 dark:text-white font-semibold">URL Pattern</th>
                                <th class="py-2 px-4 text-gray-900 dark:text-white font-semibold">Example</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700 dark:text-gray-300">
                            <tr class="border-b border-blue-200 dark:border-blue-800">
                                <td class="py-2 px-4 font-medium">View PDF</td>
                                <td class="py-2 px-4"><code class="bg-white dark:bg-gray-800 px-2 py-1 rounded text-sm">viewpdf/{subfolder}/{file}</code></td>
                                <td class="py-2 px-4"><code class="bg-white dark:bg-gray-800 px-2 py-1 rounded text-sm">viewpdf/itil4guides/guide.pdf</code></td>
                            </tr>
                            <tr class="border-b border-blue-200 dark:border-blue-800">
                                <td class="py-2 px-4 font-medium">View Video</td>
                                <td class="py-2 px-4"><code class="bg-white dark:bg-gray-800 px-2 py-1 rounded text-sm">viewvideo/{subfolder}/{file}</code></td>
                                <td class="py-2 px-4"><code class="bg-white dark:bg-gray-800 px-2 py-1 rounded text-sm">viewvideo/videos/tutorial.mp4</code></td>
                            </tr>
                            <tr class="border-b border-blue-200 dark:border-blue-800">
                                <td class="py-2 px-4 font-medium">Download File</td>
                                <td class="py-2 px-4"><code class="bg-white dark:bg-gray-800 px-2 py-1 rounded text-sm">download/{subfolder}/{file}</code></td>
                                <td class="py-2 px-4"><code class="bg-white dark:bg-gray-800 px-2 py-1 rounded text-sm">download/itil4guides/guide.pdf</code></td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 font-medium">Download ZIP</td>
                                <td class="py-2 px-4"><code class="bg-white dark:bg-gray-800 px-2 py-1 rounded text-sm">downloadzip/{file}</code></td>
                                <td class="py-2 px-4"><code class="bg-white dark:bg-gray-800 px-2 py-1 rounded text-sm">downloadzip/project.zip</code></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    {{-- Able Player Section --}}
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">Able Player Implementation</h2>

        <div class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Able Player Video Setup</h3>
            <p class="text-lg text-gray-700 dark:text-gray-300 mb-6">
                Accessible video player implementation with proper dark mode support.
            </p>

            {{-- Storage Path Information --}}
            <div class="mb-6 p-4 bg-amber-50 dark:bg-amber-900/20 rounded-lg border border-amber-200 dark:border-amber-700">
                <h4 class="font-semibold text-amber-900 dark:text-amber-300 mb-2">Storage Path Configuration:</h4>
                <ul class="text-sm text-amber-800 dark:text-amber-200 space-y-1">
                    <li><strong>New Videos:</strong> storage/app/public/assets/ablevids/</li>
                    <li><strong>Legacy Videos:</strong> public/ablelvids/ (to be migrated)</li>
                    <li><strong>Poster Images:</strong> storage/app/public/images/</li>
                    <li><strong>Able Player Assets:</strong> public/ableplayer/</li>
                </ul>
                <p class="text-xs text-amber-700 dark:text-amber-300 mt-2">
                    Note: All new videos should use the storage path. Legacy videos in the public folder will be migrated over time.
                </p>
            </div>

            {{-- Live Example --}}
            <div class="mb-8">
                <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Live Example:</h4>
                <div class="max-w-4xl mx-auto mb-6 bg-white dark:bg-gray-800 p-4 rounded-lg border border-gray-200 dark:border-gray-700">
                    <video id="video1"
                           data-able-player
                           preload="metadata"
                           data-speed-icons="true"
                           class="w-full rounded-lg"
                           poster="{{ Storage::url('images/walkofftheearth.jpg') }}"
                           playsinline>
                        <source type="video/mp4" src="{{ Storage::url('assets/ablevids/somebody/somebody.mp4') }}">
                    </video>
                </div>
            </div>

            {{-- Code Template --}}
            <div>
                <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Implementation Code:</h4>
                <div class="bg-gray-900 rounded-lg p-4 overflow-x-auto">
                <pre class="text-green-400 text-sm"><code>{{-- Able Player Video Component --}}
&lt;div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 p-4 rounded-lg border border-gray-200 dark:border-gray-700"&gt;
    &lt;video id="video1"
           data-able-player
           preload="metadata"
           data-speed-icons="true"
           class="w-full rounded-lg"
           poster="{{ Storage::url('images/your-poster.jpg') }}"
           playsinline&gt;
        &lt;source type="video/mp4" src="{{ Storage::url('assets/ablevids/your-folder/your-video.mp4') }}"&gt;
        {{-- Add additional sources for different formats if needed --}}
        &lt;track kind="captions" src="{{ Storage::url('assets/ablevids/your-folder/captions.vtt') }}" srclang="en" label="English"&gt;
    &lt;/video&gt;
&lt;/div&gt;

{{-- Able Player assets should be included from the layout --}}
&lt;link rel="stylesheet" href="{{ asset('ableplayer/build/ableplayer.min.css') }}"&gt;
&lt;script src="{{ asset('ableplayer/build/ableplayer.min.js') }}"&gt;&lt;/script&gt;</code></pre>
                </div>

                {{-- Legacy Migration Note --}}
                <div class="mt-4 p-4 bg-purple-50 dark:bg-purple-900/20 rounded-lg">
                    <h5 class="font-semibold text-purple-900 dark:text-purple-300 mb-2">Legacy Migration:</h5>
                    <p class="text-sm text-purple-800 dark:text-purple-200 mb-2">
                        For videos still in the old public folder structure, use:
                    </p>
                    <pre class="text-sm bg-purple-900 text-purple-200 p-2 rounded mb-2 overflow-x-auto"><code>src="{{ asset('ablelvids/your-folder/your-video.mp4') }}"</code></pre>
                    <p class="text-xs text-purple-700 dark:text-purple-300">
                        These should be migrated to the storage folder when possible.
                    </p>
                </div>

                <div class="mt-4 p-4 bg-blue-50 dark:bg-blue-900/20 rounded-lg">
                    <h5 class="font-semibold text-blue-900 dark:text-blue-300 mb-2">Key Features:</h5>
                    <ul class="text-sm text-blue-800 dark:text-blue-200 space-y-1 list-disc list-inside">
                        <li>Full accessibility support (WCAG compliant)</li>
                        <li>Speed control and keyboard navigation</li>
                        <li>Dark mode compatible container</li>
                        <li>Caption and transcript support</li>
                        <li>Responsive design</li>
                        <li>Optimized storage path structure</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>




        {{-- ABLE with PLAYLIST --}}


        {{-- resources/views/style-guide/partials/able-player-docs.blade.php --}}

        {{--
            WRAPPER SAFEGUARD:
            'clear-both' ensures this drops below any floating sidebars.
            'w-full' ensures it uses available width.
        --}}
        <section class="mb-12 w-full relative block clear-both">
            <h2 class="text-4xl font-semibold text-gray-900 dark:text-white mb-6 border-b border-gray-200 dark:border-gray-700 pb-4">
                Able Player Video Playlist
            </h2>

            {{-- ======================================================================== --}}
            {{-- LIVE WORKING EXAMPLE                                                     --}}
            {{-- ======================================================================== --}}
            <div class="mb-8 bg-gradient-to-r from-purple-50 to-blue-50 dark:from-purple-900/20 dark:to-blue-900/20 border border-purple-200 dark:border-purple-700 rounded-lg p-6">
                <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">
                    🎬 Live Working Example
                </h3>
                <p class="text-lg text-gray-700 dark:text-gray-300 mb-4">
                    Below is a fully functional Able Player with playlist. Click playlist items to change videos.
                </p>

                {{-- START: Copyable Demo --}}
                <div class="bg-gray-900 border border-gray-700 rounded-lg p-4 mb-6">
                    <div class="demo-page-content">
                        <div class="max-w-6xl mx-auto px-4 py-8">
                            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6 text-center">
                                Video Playlist Demo
                            </h2>

                            {{-- Jump Link --}}
                            <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-4 border border-gray-200 dark:border-gray-700 mb-6">
                                <p class="text-lg text-gray-700 dark:text-gray-300 text-center">
                                    <a href="#demo-playlist-section" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300 font-semibold">
                                        JUMP TO PLAYLIST
                                    </a>
                                </p>
                            </div>

                            {{-- Main Video Player --}}
                            <div class="text-center mb-8">
                                <div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 p-4 rounded-lg border border-gray-200 dark:border-gray-700">
                                    {{-- ID is unique for the demo --}}
                                    <video id="demoVideo1"
                                           data-able-player
                                           data-skin="2020"
                                           playsinline
                                           class="w-full rounded-lg">
                                        {{-- No source - Able Player will inject from playlist --}}
                                    </video>
                                </div>
                            </div>

                            {{-- Playlist --}}
                            <div id="demo-playlist-section" class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Playlist</h3>

                                {{-- data-player matches demoVideo1 --}}
                                <ul class="able-playlist space-y-3" data-player="demoVideo1">
                                    {{-- Video 1 --}}
                                    <li data-poster="https://picsum.photos/640/360?random=1">
                                        <span class="able-source" data-type="video/mp4" data-src="https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4"></span>
                                        <button type="button" class="flex items-center w-full p-3 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white rounded-lg transition-colors">
                                            <div class="bg-white dark:bg-white p-2 rounded border border-gray-300 dark:border-gray-400 shadow-sm mr-3 flex-shrink-0">
                                                <img src="https://picsum.photos/100/100?random=1" alt="Demo 1" class="w-12 h-12 object-cover rounded">
                                            </div>
                                            <span class="text-left flex-grow">Big Buck Bunny (Demo 1)</span>
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                        </button>
                                    </li>

                                    {{-- Video 2 --}}
                                    <li data-poster="https://picsum.photos/640/360?random=2">
                                        <span class="able-source" data-type="video/mp4" data-src="https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ElephantsDream.mp4"></span>
                                        <button type="button" class="flex items-center w-full p-3 bg-green-600 hover:bg-green-700 dark:bg-green-500 dark:hover:bg-green-600 text-white rounded-lg transition-colors">
                                            <div class="bg-white dark:bg-white p-2 rounded border border-gray-300 dark:border-gray-400 shadow-sm mr-3 flex-shrink-0">
                                                <img src="https://picsum.photos/100/100?random=2" alt="Demo 2" class="w-12 h-12 object-cover rounded">
                                            </div>
                                            <span class="text-left flex-grow">Elephants Dream (Demo 2)</span>
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                        </button>
                                    </li>

                                    {{-- Video 3 --}}
                                    <li data-poster="https://picsum.photos/640/360?random=3">
                                        <span class="able-source" data-type="video/mp4" data-src="https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerBlazes.mp4"></span>
                                        <button type="button" class="flex items-center w-full p-3 bg-purple-600 hover:bg-purple-700 dark:bg-purple-500 dark:hover:bg-purple-600 text-white rounded-lg transition-colors">
                                            <div class="bg-white dark:bg-white p-2 rounded border border-gray-300 dark:border-gray-400 shadow-sm mr-3 flex-shrink-0">
                                                <img src="https://picsum.photos/100/100?random=3" alt="Demo 3" class="w-12 h-12 object-cover rounded">
                                            </div>
                                            <span class="text-left flex-grow">For Bigger Blazes (Demo 3)</span>
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                        </button>
                                    </li>
                                </ul>
                            </div>

                            {{-- Toggle Button Demo --}}
                            <div class="mt-8">
                                <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6 text-center" x-data="{ open: false }">
                                    <button class="inline-flex items-center bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white font-semibold py-3 px-6 rounded-lg transition-colors mb-4"
                                            type="button"
                                            @click="open = !open">
                                        <div class="bg-white dark:bg-white p-2 rounded border border-gray-300 dark:border-gray-400 shadow-sm mr-4">
                                            <img src="https://picsum.photos/64/64?random=4"
                                                 alt="Toggle Icon"
                                                 class="w-12 h-12 object-cover rounded">
                                        </div>
                                        <span x-text="open ? 'Hide Additional Content' : 'Show Additional Content'"></span>
                                        <svg class="w-5 h-5 ml-2 transition-transform duration-200"
                                             :class="{ 'rotate-180': open }"
                                             fill="none"
                                             stroke="currentColor"
                                             viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                        </svg>
                                    </button>

                                    <div x-show="open"
                                         x-transition:enter="transition ease-out duration-300"
                                         x-transition:enter-start="opacity-0 transform scale-95"
                                         x-transition:enter-end="opacity-100 transform scale-100"
                                         x-transition:leave="transition ease-in duration-200"
                                         x-transition:leave-start="opacity-100 transform scale-100"
                                         x-transition:leave-end="opacity-0 transform scale-95"
                                         class="mt-6">
                                        <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                                                Additional Content
                                            </h3>
                                            <div class="bg-white dark:bg-white p-4 rounded-lg border border-gray-300 dark:border-gray-400 shadow-sm max-w-2xl mx-auto">
                                                <img src="https://picsum.photos/640/360?random=5"
                                                     alt="Additional Content Image"
                                                     class="w-full h-auto rounded-lg">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                {{-- END: Copyable Demo --}}
            </div>


            {{-- ======================================================================== --}}
            {{-- KEY CONCEPTS                                                             --}}
            {{-- ======================================================================== --}}
            <div class="mb-8">
                <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">
                    🧠 Key Concepts
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Concept 1 --}}
                    <div class="bg-white dark:bg-gray-800 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                        <div class="text-3xl text-blue-600 dark:text-blue-400 mb-2">1️⃣</div>
                        <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">Video Element Structure</h4>
                        <p class="text-gray-700 dark:text-gray-300 mb-3">The video element must have <strong>NO source tag</strong> initially:</p>
                        <pre class="bg-gray-900 text-green-400 p-3 rounded text-sm overflow-x-auto"><code>&lt;video id="video1"
data-able-player
data-skin="2020"
playsinline&gt;
{{-- NO &lt;source&gt; TAG HERE! --}}
&lt;/video&gt;</code></pre>
                    </div>

                    {{-- Concept 2 --}}
                    <div class="bg-white dark:bg-gray-800 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                        <div class="text-3xl text-green-600 dark:text-green-400 mb-2">2️⃣</div>
                        <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">Playlist Structure</h4>
                        <p class="text-gray-700 dark:text-gray-300 mb-3">Playlist items use special Able Player classes:</p>
                        <pre class="bg-gray-900 text-green-400 p-3 rounded text-sm overflow-x-auto"><code>&lt;ul class="able-playlist" data-player="video1"&gt;
&lt;li data-poster="poster.jpg"&gt;
&lt;span class="able-source"
      data-type="video/mp4"
      data-src="video.mp4"&gt;
&lt;/span&gt;
{{-- Your button/content --}}
&lt;/li&gt;
&lt;/ul&gt;</code></pre>
                    </div>

                    {{-- Concept 3 --}}
                    <div class="bg-white dark:bg-gray-800 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                        <div class="text-3xl text-purple-600 dark:text-purple-400 mb-2">3️⃣</div>
                        <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">File Structure</h4>
                        <p class="text-gray-700 dark:text-gray-300 mb-3">Organize videos in specific folders:</p>
                        <pre class="bg-gray-900 text-green-400 p-3 rounded text-sm"><code>public/
├── ableplayer/          # Able Player assets
├── ablelvids/           # Legacy video folder
│   ├── topic1/
│   │   ├── video1.mp4
│   │   └── video2.mp4
│   └── topic2/
│       └── video3.mp4
storage/app/public/images/  # Poster images</code></pre>
                    </div>

                    {{-- Concept 4 --}}
                    <div class="bg-white dark:bg-gray-800 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                        <div class="text-3xl text-yellow-600 dark:text-yellow-400 mb-2">4️⃣</div>
                        <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">CSS Scoping</h4>
                        <p class="text-gray-700 dark:text-gray-300 mb-3">Prevent conflicts with global styles:</p>
                        <pre class="bg-gray-900 text-green-400 p-3 rounded text-sm"><code>&lt;style&gt;
.page-scope .able-playlist li { ... }
.page-scope .able-button { ... }
&lt;/style&gt;

&lt;div class="page-scope"&gt;
{{-- Your content --}}
&lt;/div&gt;</code></pre>
                    </div>
                </div>
            </div>


            {{-- ======================================================================== --}}
            {{-- COMPLETE TEMPLATE                                                        --}}
            {{-- ======================================================================== --}}
            <div class="mb-8">
                <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">
                    📋 Complete Implementation Template
                </h3>

                <div class="bg-white dark:bg-gray-800 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                    <div class="flex items-center justify-between mb-4">
                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Copy-Paste Ready Template</h4>
                        <button onclick="copyAblePlayerTemplate()" class="bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white px-4 py-2 rounded text-sm transition-colors">
                            📋 Copy Template
                        </button>
                    </div>

                    <pre id="ablePlayerTemplate" class="bg-gray-900 p-4 rounded overflow-x-auto text-sm"><code>&lt;!-- resources/views/livewire/your-component.blade.php --&gt;
&lt;div&gt;
    {{-- CSS Scoping Wrapper --}}
    &lt;style&gt;
        /* Ensure images inside Able player are contained */
        .your-page-content .able img {
            max-width: 100% !important;
            height: auto !important;
        }

        .your-page-content .able-playlist li {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 0.5rem;
            padding: 1rem;
            margin-bottom: 1rem;
            transition: all 0.3s ease;
            list-style: none !important;
        }

        .dark .your-page-content .able-playlist li {
            background: #1f2937;
            border-color: #4b5563;
        }

        .your-page-content .able-playlist li:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .dark .your-page-content .able-playlist li:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }
    &lt;/style&gt;

    &lt;div class="your-page-content"&gt;
        &lt;div class="max-w-6xl mx-auto px-4 py-8"&gt;
            &lt;h1 class="text-4xl font-semibold text-gray-900 dark:text-white mb-8"&gt;
                Your Page Title
            &lt;/h1&gt;

            {{-- Jump to Playlist Link --}}
            &lt;div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-4 border border-gray-200 dark:border-gray-700 mb-6"&gt;
                &lt;p class="text-lg text-gray-700 dark:text-gray-300 text-center"&gt;
                    &lt;a href="#playlist-section" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300 font-semibold"&gt;
                        JUMP TO PLAYLIST
                    &lt;/a&gt;
                &lt;/p&gt;
            &lt;/div&gt;

            {{-- Main Video Player --}}
            &lt;div class="text-center mb-8"&gt;
                &lt;div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 p-4 rounded-lg border border-gray-200 dark:border-gray-700"&gt;
                    &lt;video id="video1"
                           data-able-player
                           data-skin="2020"
                           playsinline
                           class="w-full rounded-lg"&gt;
                        {{-- NO SOURCE TAG --}}
                    &lt;/video&gt;
                &lt;/div&gt;
            &lt;/div&gt;

            {{-- Playlist --}}
            &lt;div id="playlist-section" class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 border border-gray-200 dark:border-gray-700"&gt;
                &lt;h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4"&gt;
                    Playlist
                &lt;/h2&gt;

                &lt;ul class="able-playlist space-y-3" data-player="video1"&gt;
                    {{-- Video 1 --}}
                    &lt;li data-poster="@{{ asset('storage/images/poster1.jpg') }}"&gt;
                        &lt;span class="able-source"
                              data-type="video/mp4"
                              data-src="@{{ asset('ablelvids/folder/video1.mp4') }}"&gt;
                        &lt;/span&gt;
                        &lt;button type="button" class="flex items-center w-full p-3 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white rounded-lg transition-colors"&gt;
                            &lt;div class="bg-white dark:bg-white p-2 rounded border border-gray-300 dark:border-gray-400 shadow-sm mr-3 flex-shrink-0"&gt;
                                &lt;img src="@{{ asset('storage/images/thumbnail1.jpg') }}"
                                     alt="Video 1"
                                     class="w-12 h-12 object-cover rounded"&gt;
                            &lt;/div&gt;
                            &lt;span class="text-left flex-grow"&gt;Video 1 Title&lt;/span&gt;
                            &lt;svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"&gt;
                                &lt;path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/&gt;
                                &lt;path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/&gt;
                            &lt;/svg&gt;
                        &lt;/button&gt;
                    &lt;/li&gt;

                    {{-- Add more videos as needed --}}
                &lt;/ul&gt;
            &lt;/div&gt;

            {{-- Toggle Button Section --}}
            &lt;div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6 text-center" x-data="{ open: false }"&gt;
                &lt;button class="inline-flex items-center bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white font-semibold py-3 px-6 rounded-lg transition-colors mb-4"
                        type="button"
                        @click="open = !open"&gt;
                    &lt;div class="bg-white dark:bg-white p-2 rounded border border-gray-300 dark:border-gray-400 shadow-sm mr-4"&gt;
                        &lt;img src="@{{ asset('storage/images/icon.jpg') }}"
                             alt="Toggle Icon"
                             class="w-12 h-12 object-cover rounded"&gt;
                    &lt;/div&gt;
                    &lt;span x-text="open ? 'Hide Additional Content' : 'Show Additional Content'"&gt;&lt;/span&gt;
                    &lt;svg class="w-5 h-5 ml-2 transition-transform duration-200"
                         :class="{ 'rotate-180': open }"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24"&gt;
                        &lt;path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/&gt;
                    &lt;/svg&gt;
                &lt;/button&gt;

                &lt;div x-show="open"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 transform scale-95"
                     x-transition:enter-end="opacity-100 transform scale-100"
                     x-transition:leave="transition ease-in duration-200"
                     x-transition:leave-start="opacity-100 transform scale-100"
                     x-transition:leave-end="opacity-0 transform scale-95"
                     class="mt-6"&gt;
                    &lt;div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-6 border border-gray-200 dark:border-gray-700"&gt;
                        &lt;h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4"&gt;
                            Additional Content Title
                        &lt;/h3&gt;
                        &lt;div class="bg-white dark:bg-white p-4 rounded-lg border border-gray-300 dark:border-gray-400 shadow-sm max-w-2xl mx-auto"&gt;
                            &lt;img src="@{{ asset('storage/images/additional-image.jpg') }}"
                                 alt="Additional Content"
                                 class="w-full h-auto rounded-lg"&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;</code></pre>
                </div>
            </div>


            {{-- ======================================================================== --}}
            {{-- QUICK REFERENCE                                                          --}}
            {{-- ======================================================================== --}}
            <div class="mb-8">
                <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">
                    📝 Quick Reference
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    {{-- Do's --}}
                    <div class="bg-green-50 dark:bg-green-900/20 border-l-4 border-green-500 p-4 rounded-r-lg">
                        <h4 class="font-bold text-green-900 dark:text-green-300 mb-2">✅ Do's:</h4>
                        <ul class="text-sm text-green-800 dark:text-green-200 space-y-1">
                            <li>• Use <code>able-playlist</code> class</li>
                            <li>• Add <code>data-player="video1"</code></li>
                            <li>• Use <code>able-source</code> for sources</li>
                            <li>• Scope CSS with page wrapper</li>
                            <li>• Include Alpine.js for toggles</li>
                        </ul>
                    </div>

                    {{-- Don'ts --}}
                    <div class="bg-red-50 dark:bg-red-900/20 border-l-4 border-red-500 p-4 rounded-r-lg">
                        <h4 class="font-bold text-red-900 dark:text-red-300 mb-2">❌ Don'ts:</h4>
                        <ul class="text-sm text-red-800 dark:text-red-200 space-y-1">
                            <li>• Add <code>&lt;source&gt;</code> to video tag</li>
                            <li>• Use global CSS selectors</li>
                            <li>• Forget CSS scoping wrapper</li>
                            <li>• Skip Able Player assets</li>
                            <li>• Use <code>preload="auto"</code></li>
                        </ul>
                    </div>

                    {{-- Tips --}}
                    <div class="bg-blue-50 dark:bg-blue-900/20 border-l-4 border-blue-500 p-4 rounded-r-lg">
                        <h4 class="font-bold text-blue-900 dark:text-blue-300 mb-2">💡 Tips:</h4>
                        <ul class="text-sm text-blue-800 dark:text-blue-200 space-y-1">
                            <li>• Use <code>id="playlist-section"</code> for anchor links</li>
                            <li>• Add transition effects to toggle sections</li>
                            <li>• Use responsive images</li>
                            <li>• Add alt text to all images</li>
                            <li>• Validate file paths</li>
                        </ul>
                    </div>
                </div>
            </div>


            {{-- ======================================================================== --}}
            {{-- COMMON ISSUES (FIXED)                                                    --}}
            {{-- ======================================================================== --}}
            <div class="mb-8">
                <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">
                    🔧 Common Issues & Solutions
                </h3>

                <div class="space-y-4">
                    {{-- Issue 1 --}}
                    <div class="bg-yellow-50 dark:bg-yellow-900/20 border-l-4 border-yellow-500 p-4 rounded-r-lg">
                        <h4 class="font-bold text-yellow-900 dark:text-yellow-300 mb-2">
                            ❌ Issue: Multiple videos playing simultaneously
                        </h4>
                        <p class="text-sm text-yellow-800 dark:text-yellow-200 mb-2">
                            <strong>Cause:</strong> Video element has <code>&lt;source&gt;</code> tags or multiple Able Players
                        </p>
                        {{-- FIX: Updated comments below to HTML entities --}}
                        <pre class="bg-gray-900 text-green-400 p-2 rounded text-xs"><code>&lt;!-- WRONG --&gt;
&lt;video id="video1"&gt;
&lt;source src="video1.mp4"&gt;  &lt;!-- REMOVE THIS --&gt;
&lt;/video&gt;

&lt;!-- CORRECT --&gt;
&lt;video id="video1"&gt;
&lt;!-- NO SOURCE TAGS --&gt;
&lt;/video&gt;</code></pre>
                    </div>

                    {{-- Issue 2 --}}
                    <div class="bg-yellow-50 dark:bg-yellow-900/20 border-l-4 border-yellow-500 p-4 rounded-r-lg">
                        <h4 class="font-bold text-yellow-900 dark:text-yellow-300 mb-2">
                            ❌ Issue: Jump links not working
                        </h4>
                        <p class="text-sm text-yellow-800 dark:text-yellow-200 mb-2">
                            <strong>Cause:</strong> Missing <code>id</code> on target element
                        </p>
                        {{-- FIX: Updated comments below to HTML entities --}}
                        <pre class="bg-gray-900 text-green-400 p-2 rounded text-xs"><code>&lt;!-- WRONG --&gt;
&lt;a href="#playlist"&gt;JUMP TO PLAYLIST&lt;/a&gt;
&lt;div&gt; &lt;!-- No ID --&gt;
&lt;!-- Playlist content --&gt;
&lt;/div&gt;

&lt;!-- CORRECT --&gt;
&lt;a href="#playlist-section"&gt;JUMP TO PLAYLIST&lt;/a&gt;
&lt;div id="playlist-section"&gt;
&lt;!-- Playlist content --&gt;
&lt;/div&gt;</code></pre>
                    </div>

                    {{-- Issue 3 --}}
                    <div class="bg-yellow-50 dark:bg-yellow-900/20 border-l-4 border-yellow-500 p-4 rounded-r-lg">
                        <h4 class="font-bold text-yellow-900 dark:text-yellow-300 mb-2">
                            ❌ Issue: Toggle button not working
                        </h4>
                        <p class="text-sm text-yellow-800 dark:text-yellow-200 mb-2">
                            <strong>Cause:</strong> Missing Alpine.js or incorrect x-data
                        </p>
                        {{-- FIX: This one was already correct in your snippet --}}
                        <pre class="bg-gray-900 text-green-400 p-2 rounded text-xs"><code>&lt;!-- WRONG --&gt;
&lt;button onclick="toggle()"&gt;Toggle&lt;/button&gt; &lt;!-- No Alpine --&gt;

&lt;!-- CORRECT --&gt;
&lt;div x-data="{ open: false }"&gt;
&lt;button @click="open = !open"&gt;Toggle&lt;/button&gt;
&lt;div x-show="open"&gt;Content&lt;/div&gt;
&lt;/div&gt;</code></pre>
                    </div>
                </div>
            </div>
                    ```

    {{-- ======================================================================== --}}
                        {{-- TOGGLE BUTTON PATTERN                                                    --}}
                        {{-- ======================================================================== --}}
    <div class="mt-12 pt-8 border-t border-gray-300 dark:border-gray-700">
        <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">
            🎛️ Toggle Button with Image Pattern
        </h3>

        <div class="bg-gradient-to-r from-indigo-50 to-purple-50 dark:from-indigo-900/20 dark:to-purple-900/20 border border-indigo-200 dark:border-indigo-700 rounded-lg p-6">
            <p class="text-lg text-gray-700 dark:text-gray-300 mb-6">
                This pattern creates an expandable/collapsible section with an image in the toggle button.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Code Example --}}
                <div class="bg-white dark:bg-gray-800 rounded-lg p-6">
                    <h4 class="font-semibold text-gray-900 dark:text-white mb-3">Code Structure:</h4>
                    <pre class="bg-gray-900 text-green-400 p-4 rounded overflow-x-auto text-sm"><code>&lt;div x-data="{ open: false }"&gt;
&lt;button @click="open = !open"
        class="inline-flex items-center"&gt;
    {{-- Image in button --}}
    &lt;div class="bg-white dark:bg-white p-2 rounded border"&gt;
        &lt;img src="icon.jpg"
             alt="Icon"
             class="w-12 h-12 rounded"&gt;
    &lt;/div&gt;

    {{-- Button text --}}
    &lt;span x-text="open ? 'Hide' : 'Show'"&gt;&lt;/span&gt;

    {{-- Animated arrow --}}
    &lt;svg class="w-5 h-5 transition-transform"
         :class="{ 'rotate-180': open }"&gt;
        &lt;path d="M19 9l-7 7-7-7"/&gt;
    &lt;/svg&gt;
&lt;/button&gt;

{{-- Collapsible content --}}
&lt;div x-show="open"
     x-transition&gt;
    &lt;!-- Your content here --&gt;
&lt;/div&gt;
&lt;/div&gt;</code></pre>
                </div>


                {{-- Key Features --}}
                <div class="bg-white dark:bg-gray-800 rounded-lg p-6">
                    <h4 class="font-semibold text-gray-900 dark:text-white mb-3">Key Features:</h4>
                    <ul class="space-y-3 text-gray-700 dark:text-gray-300">
                        <li class="flex items-start">
                            <span class="text-green-500 mr-2">✓</span>
                            <span><strong>Image in button:</strong> Visual feedback in toggle</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-green-500 mr-2">✓</span>
                            <span><strong>Animated arrow:</strong> Rotates 180° when open</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-green-500 mr-2">✓</span>
                            <span><strong>Smooth transitions:</strong> fade + scale effects</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-green-500 mr-2">✓</span>
                            <span><strong>Dark mode ready:</strong> Uses your color palette</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-green-500 mr-2">✓</span>
                            <span><strong>Accessible:</strong> Proper alt text and ARIA</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {{-- JavaScript helper --}}
    <script>
        function copyAblePlayerTemplate() {
            const template = document.getElementById('ablePlayerTemplate').innerText;
            navigator.clipboard.writeText(template).then(() => {
                alert('✅ Template copied to clipboard!');
            });
        }
    </script>

        </section>



        {{-- ABLE with PLAYLIST ENDS}}

{{-- resources/views/style-guide/partials/blade-gotchas.blade.php --}}

        <section class="mb-12 w-full relative block clear-both">
            <h2 class="text-4xl font-semibold text-gray-900 dark:text-white mb-6 border-b border-gray-200 dark:border-gray-700 pb-4">
                ⚠️ Critical Blade Syntax Gotchas
            </h2>

            <div class="bg-red-50 dark:bg-red-900/20 border-l-4 border-red-500 p-6 rounded-r-lg shadow-sm">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <svg class="h-8 w-8 text-red-600 dark:text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        </svg>
                    </div>
                    <div class="ml-4 w-full">
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">
                            The "Invisible Page Killer"
                        </h3>
                        <p class="text-gray-700 dark:text-gray-300 mb-4">
                            Writing a Laravel Blade comment <code>&amp;#123;&amp;#123;-- --}}</code> inside a generic <code>&lt;code&gt;</code> block will crash the page layout.
                        </p>

                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            {{-- The Problem --}}
                            <div class="bg-white dark:bg-gray-800 p-4 rounded-lg border border-red-200 dark:border-red-800">
                                <h4 class="font-bold text-red-600 dark:text-red-400 mb-2">❌ THE TRAP</h4>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">
                                    If you put raw Blade comments in a code example, Blade executes them on the server. It strips everything following the opening tag until it finds a closing tag (which might not exist), deleting your footer and closing tags.
                                </p>
                                <pre class="bg-gray-900 text-red-300 p-3 rounded text-xs overflow-x-auto"><code>&lt;!-- Code Example --&gt;
&lt;div&gt;
    &lt;!-- This triggers the crash: --&gt;
    &amp;#123;&amp;#123;-- This comment eats the rest of the page...
&lt;/div&gt;
&lt;!-- Footer never renders --&gt;</code></pre>
                            </div>

                            {{-- The Solution --}}
                            <div class="bg-white dark:bg-gray-800 p-4 rounded-lg border border-green-200 dark:border-green-800">
                                <h4 class="font-bold text-green-600 dark:text-green-400 mb-2">✅ THE FIX</h4>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">
                                    Always use <strong>HTML Entities</strong> to represent comments in documentation code blocks. This forces the browser to display the characters instead of Blade executing them.
                                </p>
                                <pre class="bg-gray-900 text-green-400 p-3 rounded text-xs overflow-x-auto"><code>&lt;!-- Code Example --&gt;
&lt;div&gt;
    &lt;!-- Use HTML entities instead: --&gt;
    &amp;lt;!-- This is safe --&amp;gt;

    &lt;!-- Or for Blade syntax display: --&gt;
    &amp;#123;&amp;#123;-- Safe Blade Comment --&amp;#125;&amp;#125;
&lt;/div&gt;
&lt;!-- Page renders correctly --&gt;</code></pre>
                            </div>
                        </div>

                        <div class="mt-4 bg-white dark:bg-gray-800 p-4 rounded-lg border border-gray-200 dark:border-gray-700">
                            <h4 class="font-semibold text-gray-900 dark:text-white mb-2">Quick Reference for Escaping</h4>
                            <div class="grid grid-cols-2 gap-4 text-sm font-mono">
                                <div class="text-gray-600 dark:text-gray-400">To display <code>&lt;</code></div>
                                <div class="text-blue-600 dark:text-blue-400">Use <code>&amp;lt;</code></div>

                                <div class="text-gray-600 dark:text-gray-400">To display <code>&gt;</code></div>
                                <div class="text-blue-600 dark:text-blue-400">Use <code>&amp;gt;</code></div>

                                {{-- THIS WAS THE PROBLEM LINE: NOW FIXED WITH ENTITIES --}}
                                <div class="text-gray-600 dark:text-gray-400">To display <code>&amp;#123;&amp;#123;--</code></div>
                                <div class="text-blue-600 dark:text-blue-400">Use <code>&amp;#123;&amp;#123;--</code></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    {{-- Transparent Images Section --}}
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">Transparent PNG Images</h2>

        <div class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Dark Mode Background Solution</h3>
            <p class="text-lg text-gray-700 dark:text-gray-300 mb-6">
                For transparent PNG images that need proper visibility in dark mode.
            </p>

            {{-- Live Example --}}
            <div class="mb-8">
                <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Live Example:</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Without Background --}}
                    <div class="text-center">
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">Without background (hard to see in dark mode):</p>
                        <div class="bg-gray-50 dark:bg-gray-900 p-6 rounded-lg border border-gray-200 dark:border-gray-700">
                            <img src="{{ asset('storage/images/snowflakescrum.png') }}"
                                 alt="Transparent Logo"
                                 class="mx-auto h-32 w-auto">
                        </div>
                    </div>

                    {{-- With Background --}}
                    <div class="text-center">
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">With white background in dark mode:</p>
                        <div class="bg-gray-50 dark:bg-gray-900 p-6 rounded-lg border border-gray-200 dark:border-gray-700">
                            <div class="bg-white dark:bg-white p-4 rounded-lg border border-gray-300 dark:border-gray-400 shadow-sm">
                                <img src="{{ asset('storage/images/snowflakescrum.png') }}"
                                     alt="Transparent Logo"
                                     class="mx-auto h-32 w-auto">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Code Template --}}
            <div>
                <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Implementation Code:</h4>
                <div class="bg-gray-900 rounded-lg p-4 overflow-x-auto">
                    <pre class="text-green-400 text-sm"><code>{{-- Transparent PNG with Dark Mode Support --}}
&lt;div class="bg-white dark:bg-white p-4 rounded-lg border border-gray-300 dark:border-gray-400 shadow-sm"&gt;
    &lt;img src="{{ asset('storage/images/your-transparent-image.png') }}"
         alt="Your Image Description"
         class="mx-auto h-32 w-auto"&gt;
&lt;/div&gt;

{{-- Alternative: Inline background for specific use cases --}}
&lt;div class="bg-white dark:bg-white p-2 rounded"&gt;
    &lt;img src="{{ asset('storage/images/transparent-logo.png') }}"
         alt="Logo"
         class="h-16 w-auto"&gt;
&lt;/div&gt;

{{-- For consistent sizing and centering --}}
&lt;div class="flex items-center justify-center bg-white dark:bg-white p-6 rounded-lg border"&gt;
    &lt;img src="{{ asset('storage/images/transparent-icon.png') }}"
         alt="Icon"
         class="max-w-full h-auto"&gt;
&lt;/div&gt;</code></pre>
                </div>

                <div class="mt-4 p-4 bg-yellow-50 dark:bg-yellow-900/20 rounded-lg">
                    <h5 class="font-semibold text-yellow-900 dark:text-yellow-300 mb-2">Usage Notes:</h5>
                    <ul class="text-sm text-yellow-800 dark:text-yellow-200 space-y-1 list-disc list-inside">
                        <li>Use <code class="bg-yellow-100 dark:bg-yellow-800 px-1 rounded">bg-white dark:bg-white</code> to force white background in both modes</li>
                        <li>Add <code class="bg-yellow-100 dark:bg-yellow-800 px-1 rounded">border border-gray-300 dark:border-gray-400</code> for definition</li>
                        <li>Include <code class="bg-yellow-100 dark:bg-yellow-800 px-1 rounded">shadow-sm</code> for subtle depth</li>
                        <li>Adjust padding with <code class="bg-yellow-100 dark:bg-yellow-800 px-1 rounded">p-2</code>, <code class="bg-yellow-100 dark:bg-yellow-800 px-1 rounded">p-4</code>, or <code class="bg-yellow-100 dark:bg-yellow-800 px-1 rounded">p-6</code> as needed</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- Text Hierarchy Section --}}
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">Text Hierarchy</h2>

        <div class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6 space-y-6">
            {{-- Headings --}}
            <div class="space-y-2">
                <h1 class="text-4xl font-semibold text-gray-900 dark:text-white">Heading 1 - text-4xl (36px)</h1>
                <code class="text-sm bg-gray-200 dark:bg-gray-800 text-gray-800 dark:text-gray-300 p-2 rounded block">class="text-4xl font-semibold text-gray-900 dark:text-white"</code>
            </div>

            <div class="space-y-2">
                <h2 class="text-3xl font-semibold text-gray-900 dark:text-white">Heading 2 - text-3xl (30px)</h2>
                <code class="text-sm bg-gray-200 dark:bg-gray-800 text-gray-800 dark:text-gray-300 p-2 rounded block">class="text-3xl font-semibold text-gray-900 dark:text-white"</code>
            </div>

            <div class="space-y-2">
                <h3 class="text-2xl font-semibold text-gray-900 dark:text-white">Heading 3 - text-2xl (24px)</h3>
                <code class="text-sm bg-gray-200 dark:bg-gray-800 text-gray-800 dark:text-gray-300 p-2 rounded block">class="text-2xl font-semibold text-gray-900 dark:text-white"</code>
            </div>

            <div class="space-y-2">
                <h4 class="text-xl font-semibold text-gray-900 dark:text-white">Heading 4 - text-xl (20px)</h4>
                <code class="text-sm bg-gray-200 dark:bg-gray-800 text-gray-800 dark:text-gray-300 p-2 rounded block">class="text-xl font-semibold text-gray-900 dark:text-white"</code>
            </div>
            {{-- resources/views/livewire/style-guide.blade.php --}}
            <div class="max-w-6xl mx-auto px-4 py-8">
{{--                <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-8 border-b border-gray-200 dark:border-gray-700 pb-4">--}}
{{--                    PMWay Style Guide & Templates--}}
{{--                </h1>--}}

                <!-- Existing content... -->

                <!-- Horizontal Layout Template with Style Explanations -->
                <!-- Horizontal Layout Template - All in One Row -->
                <div class="flex flex-nowrap items-start justify-between gap-4">
                    <!-- Left Aligned Container -->
                    <div class="max-w-md flex-1">
                        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg border border-gray-200 dark:border-gray-700">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Left Aligned</h3>
                            <p class="text-gray-700 dark:text-gray-300 mb-4">This container uses flexbox to stay in row</p>
                            <div class="bg-gray-100 dark:bg-gray-700 p-3 rounded text-sm">
                                <p><strong>max-w-md</strong> = 448px max width</p>
                                <p><strong>flex-1</strong> = Takes available space equally</p>
                                <p><strong>No margin utilities</strong> = Stays in flex flow</p>
                            </div>
                        </div>
                    </div>

                    <!-- Center Aligned Container -->
                    <div class="max-w-lg flex-1">
                        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg border border-gray-200 dark:border-gray-700">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Center Position</h3>
                            <p class="text-gray-700 dark:text-gray-300 mb-4">This container sits in the middle of the row</p>
                            <div class="bg-gray-100 dark:bg-gray-700 p-3 rounded text-sm">
                                <p><strong>max-w-lg</strong> = 512px max width</p>
                                <p><strong>flex-1</strong> = Takes available space equally</p>
                                <p><strong>No margin utilities</strong> = Stays in flex flow</p>
                            </div>
                        </div>
                    </div>

                    <!-- Right Aligned Container -->
                    <div class="max-w-md flex-1">
                        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg border border-gray-200 dark:border-gray-700">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Right Position</h3>
                            <p class="text-gray-700 dark:text-gray-300 mb-4">This container stays in the row using flexbox</p>
                            <div class="bg-gray-100 dark:bg-gray-700 p-3 rounded text-sm">
                                <p><strong>max-w-md</strong> = 448px max width</p>
                                <p><strong>flex-1</strong> = Takes available space equally</p>
                                <p><strong>No margin utilities</strong> = Stays in flex flow</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Row Container Styles Explanation -->
                <div class="mt-8 p-4 bg-blue-50 dark:bg-blue-900/20 rounded-lg">
                    <h4 class="font-semibold text-blue-900 dark:text-blue-300 mb-2">Fixed Row Container Styles:</h4>
                    <div class="text-sm text-blue-800 dark:text-blue-200">
                        <p><strong>flex</strong> = Enables flexbox layout</p>
                        <p><strong>flex-nowrap</strong> = Prevents items from wrapping to new line</p>
                        <p><strong>justify-between</strong> = Spaces items evenly across the row</p>
                        <p><strong>items-start</strong> = Aligns items to the top</p>
                        <p><strong>gap-4</strong> = 1rem gap between items</p>
                        <p><strong>gap-6</strong> = 1.5rem gap between items</p>
                        <p><strong>flex-1</strong> (on each container) = Makes all containers equal width and keeps them in one row</p>
                    </div>
                </div>
                <br><br>

{{--                <!-- Row Container Styles -->--}}
{{--                <div class="mt-8 p-4 bg-blue-50 dark:bg-blue-900/20 rounded-lg">--}}
{{--                    <h4 class="font-semibold text-blue-900 dark:text-blue-300 mb-2">Row Container Styles:</h4>--}}
{{--                    <div class="text-sm text-blue-800 dark:text-blue-200">--}}
{{--                        <p><strong>flex</strong> = Enables flexbox layout</p>--}}
{{--                        <p><strong>flex-wrap</strong> = Allows items to wrap to next line if needed</p>--}}
{{--                        <p><strong>items-start</strong> = Aligns items to the top of the container</p>--}}
{{--                        <p><strong>gap-6</strong> = 1.5rem gap between items</p>--}}
{{--                    </div>--}}
{{--                </div>--}}

                {{-- Tailwind Size Reference Section --}}
                <section class="mb-12">
                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">Tailwind Size Reference</h2>

                    <div class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Max-Width Utilities</h3>
                        <p class="text-lg text-gray-700 dark:text-gray-300 mb-6">
                            Complete reference for Tailwind max-width classes with live text examples.
                        </p>

                        <!-- Size Reference Cards -->
                        <div class="space-y-8">
                            <!-- max-w-xs -->
                            <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                                <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4">
                                    <div>
                                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white">max-w-xs</h4>
                                        <p class="text-gray-600 dark:text-gray-400">320px - Extra Small Container</p>
                                    </div>
                                    <button class="copy-size-btn mt-2 md:mt-0 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded text-sm font-medium transition-colors" data-class="max-w-xs">
                                        Copy max-w-xs
                                    </button>
                                </div>
                                <div class="max-w-xs p-4 bg-gray-100 dark:bg-gray-700 rounded border">
                                    <p class="text-gray-700 dark:text-gray-300">
                                        This is what text looks like inside a max-w-xs container. Perfect for small cards, labels, or compact content sections.
                                    </p>
                                </div>
                            </div>

                            <!-- max-w-sm -->
                            <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                                <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4">
                                    <div>
                                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white">max-w-sm</h4>
                                        <p class="text-gray-600 dark:text-gray-400">384px - Small Container</p>
                                    </div>
                                    <button class="copy-size-btn mt-2 md:mt-0 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded text-sm font-medium transition-colors" data-class="max-w-sm">
                                        Copy max-w-sm
                                    </button>
                                </div>
                                <div class="max-w-sm p-4 bg-gray-100 dark:bg-gray-700 rounded border">
                                    <p class="text-gray-700 dark:text-gray-300">
                                        This container uses max-w-sm. Great for small cards, sidebar widgets, or compact forms. Text flows naturally within this width.
                                    </p>
                                </div>
                            </div>

                            <!-- max-w-md -->
                            <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                                <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4">
                                    <div>
                                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white">max-w-md</h4>
                                        <p class="text-gray-600 dark:text-gray-400">448px - Medium Container</p>
                                    </div>
                                    <button class="copy-size-btn mt-2 md:mt-0 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded text-sm font-medium transition-colors" data-class="max-w-md">
                                        Copy max-w-md
                                    </button>
                                </div>
                                <div class="max-w-md p-4 bg-gray-100 dark:bg-gray-700 rounded border">
                                    <p class="text-gray-700 dark:text-gray-300">
                                        This is a max-w-md container. Ideal for standard cards, modal content, or medium-sized content blocks. Provides comfortable reading width for most text content.
                                    </p>
                                </div>
                            </div>

                            <!-- max-w-lg -->
                            <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                                <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4">
                                    <div>
                                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white">max-w-lg</h4>
                                        <p class="text-gray-600 dark:text-gray-400">512px - Large Container</p>
                                    </div>
                                    <button class="copy-size-btn mt-2 md:mt-0 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded text-sm font-medium transition-colors" data-class="max-w-lg">
                                        Copy max-w-lg
                                    </button>
                                </div>
                                <div class="max-w-lg p-4 bg-gray-100 dark:bg-gray-700 rounded border">
                                    <p class="text-gray-700 dark:text-gray-300">
                                        This container uses max-w-lg. Perfect for blog content, detailed forms, or larger cards. The width allows for comfortable reading while maintaining good line lengths for readability.
                                    </p>
                                </div>
                            </div>

                            <!-- max-w-xl -->
                            <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                                <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4">
                                    <div>
                                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white">max-w-xl</h4>
                                        <p class="text-gray-600 dark:text-gray-400">576px - Extra Large Container</p>
                                    </div>
                                    <button class="copy-size-btn mt-2 md:mt-0 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded text-sm font-medium transition-colors" data-class="max-w-xl">
                                        Copy max-w-xl
                                    </button>
                                </div>
                                <div class="max-w-xl p-4 bg-gray-100 dark:bg-gray-700 rounded border">
                                    <p class="text-gray-700 dark:text-gray-300">
                                        This is a max-w-xl container. Excellent for main content areas, documentation, or detailed product descriptions. The width provides ample space for rich content while keeping lines at an optimal reading length.
                                    </p>
                                </div>
                            </div>

                            <!-- max-w-2xl -->
                            <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                                <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4">
                                    <div>
                                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white">max-w-2xl</h4>
                                        <p class="text-gray-600 dark:text-gray-400">672px - 2X Large Container</p>
                                    </div>
                                    <button class="copy-size-btn mt-2 md:mt-0 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded text-sm font-medium transition-colors" data-class="max-w-2xl">
                                        Copy max-w-2xl
                                    </button>
                                </div>
                                <div class="max-w-2xl p-4 bg-gray-100 dark:bg-gray-700 rounded border">
                                    <p class="text-gray-700 dark:text-gray-300">
                                        This container uses max-w-2xl. Great for wide content sections, documentation with code examples, or pages that need to accommodate side-by-side content. Perfect for technical documentation or content-heavy pages.
                                    </p>
                                </div>
                            </div>

                            <!-- max-w-3xl -->
                            <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                                <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4">
                                    <div>
                                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white">max-w-3xl</h4>
                                        <p class="text-gray-600 dark:text-gray-400">768px - 3X Large Container</p>
                                    </div>
                                    <button class="copy-size-btn mt-2 md:mt-0 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded text-sm font-medium transition-colors" data-class="max-w-3xl">
                                        Copy max-w-3xl
                                    </button>
                                </div>
                                <div class="max-w-3xl p-4 bg-gray-100 dark:bg-gray-700 rounded border">
                                    <p class="text-gray-700 dark:text-gray-300">
                                        This is a max-w-3xl container. Ideal for wide layouts, dashboards, or content that needs to span most of the screen width while maintaining some margins. Works well for data tables, wide forms, or content with multiple columns.
                                    </p>
                                </div>
                            </div>

                            <!-- max-w-4xl -->
                            <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                                <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4">
                                    <div>
                                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white">max-w-4xl</h4>
                                        <p class="text-gray-600 dark:text-gray-400">896px - 4X Large Container</p>
                                    </div>
                                    <button class="copy-size-btn mt-2 md:mt-0 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded text-sm font-medium transition-colors" data-class="max-w-4xl">
                                        Copy max-w-4xl
                                    </button>
                                </div>
                                <div class="max-w-4xl p-4 bg-gray-100 dark:bg-gray-700 rounded border">
                                    <p class="text-gray-700 dark:text-gray-300">
                                        This container uses max-w-4xl. Perfect for full-width content that still needs some breathing room on larger screens. Great for hero sections, wide image galleries, or content that needs to make use of the available horizontal space while maintaining readability.
                                    </p>
                                </div>
                            </div>

                            <!-- max-w-5xl -->
                            <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                                <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4">
                                    <div>
                                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white">max-w-5xl</h4>
                                        <p class="text-gray-600 dark:text-gray-400">1024px - 5X Large Container</p>
                                    </div>
                                    <button class="copy-size-btn mt-2 md:mt-0 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded text-sm font-medium transition-colors" data-class="max-w-5xl">
                                        Copy max-w-5xl
                                    </button>
                                </div>
                                <div class="max-w-5xl p-4 bg-gray-100 dark:bg-gray-700 rounded border">
                                    <p class="text-gray-700 dark:text-gray-300">
                                        This is a max-w-5xl container. Nearly full-width on most desktop screens, perfect for content that needs to utilize most of the available space while maintaining small margins. Excellent for dashboards, data visualization, or wide layout components.
                                    </p>
                                </div>
                            </div>

                            <!-- max-w-6xl -->
                            <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                                <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4">
                                    <div>
                                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white">max-w-6xl</h4>
                                        <p class="text-gray-600 dark:text-gray-400">1152px - 6X Large Container</p>
                                    </div>
                                    <button class="copy-size-btn mt-2 md:mt-0 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded text-sm font-medium transition-colors" data-class="max-w-6xl">
                                        Copy max-w-6xl
                                    </button>
                                </div>
                                <div class="max-w-6xl p-4 bg-gray-100 dark:bg-gray-700 rounded border">
                                    <p class="text-gray-700 dark:text-gray-300">
                                        This container uses max-w-6xl. The largest standard Tailwind container size, perfect for full-width layouts that still need small margins on very large screens. Ideal for wide dashboards, full-screen applications, or content that needs to maximize horizontal space usage.
                                    </p>
                                </div>
                            </div>

                            <!-- max-w-7xl -->
                            <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                                <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4">
                                    <div>
                                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white">max-w-7xl</h4>
                                        <p class="text-gray-600 dark:text-gray-400">1280px - 7X Large Container</p>
                                    </div>
                                    <button class="copy-size-btn mt-2 md:mt-0 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded text-sm font-medium transition-colors" data-class="max-w-7xl">
                                        Copy max-w-7xl
                                    </button>
                                </div>
                                <div class="max-w-7xl p-4 bg-gray-100 dark:bg-gray-700 rounded border">
                                    <p class="text-gray-700 dark:text-gray-300">
                                        This is a max-w-7xl container. The maximum width container in Tailwind's default scale. Perfect for ultra-wide layouts, full-screen applications, or content that needs to utilize almost all available horizontal space on large desktop monitors while maintaining minimal margins.
                                    </p>
                                </div>
                            </div>

                            <!-- max-w-full -->
                            <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                                <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4">
                                    <div>
                                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white">max-w-full</h4>
                                        <p class="text-gray-600 dark:text-gray-400">100% - Full Width Container</p>
                                    </div>
                                    <button class="copy-size-btn mt-2 md:mt-0 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded text-sm font-medium transition-colors" data-class="max-w-full">
                                        Copy max-w-full
                                    </button>
                                </div>
                                <div class="max-w-full p-4 bg-gray-100 dark:bg-gray-700 rounded border">
                                    <p class="text-gray-700 dark:text-gray-300">
                                        This container uses max-w-full, which spans 100% of its parent container's width. Perfect for full-width sections, hero banners, or any content that needs to stretch completely across the available space without any width restrictions.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Usage Examples -->
                        <div class="mt-8">
                            <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Common Usage Patterns:</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Centered Layout -->
                                <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-4">
                                    <h5 class="font-semibold text-gray-900 dark:text-white mb-2">Centered Content Layout</h5>
                                    <div class="bg-gray-900 rounded p-3 mb-3">
                            <pre class="text-green-400 text-sm"><code>&lt;div class="max-w-4xl mx-auto px-4 py-8"&gt;
    &lt;h1 class="text-3xl font-bold"&gt;Page Title&lt;/h1&gt;
    &lt;p class="text-lg mt-4"&gt;Your content here...&lt;/p&gt;
&lt;/div&gt;</code></pre>
                                    </div>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                        Perfect for blog posts, documentation, and content pages
                                    </p>
                                </div>

                                <!-- Card Grid -->
                                <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-4">
                                    <h5 class="font-semibold text-gray-900 dark:text-white mb-2">Responsive Card Grid</h5>
                                    <div class="bg-gray-900 rounded p-3 mb-3">
                            <pre class="text-green-400 text-sm"><code>&lt;div class="grid grid-cols-1 md:grid-cols-2 gap-6"&gt;
    &lt;div class="max-w-sm mx-auto"&gt;
        &lt;!-- Card content --&gt;
    &lt;/div&gt;
    &lt;div class="max-w-sm mx-auto"&gt;
        &lt;!-- Card content --&gt;
    &lt;/div&gt;
&lt;/div&gt;</code></pre>
                                    </div>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                        Great for product cards, feature boxes, and team members
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Quick Reference -->
                        <div class="mt-8 p-4 bg-blue-50 dark:bg-blue-900/20 rounded-lg">
                            <h5 class="font-semibold text-blue-900 dark:text-blue-300 mb-2">Quick Size Reference:</h5>
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-2 text-sm">
                                <div class="flex items-center">
                                    <div class="w-3 h-3 bg-blue-500 rounded mr-2"></div>
                                    <code class="text-blue-800 dark:text-blue-200">max-w-sm</code>
                                    <span class="text-blue-600 dark:text-blue-300 ml-1">384px</span>
                                </div>
                                <div class="flex items-center">
                                    <div class="w-3 h-3 bg-blue-500 rounded mr-2"></div>
                                    <code class="text-blue-800 dark:text-blue-200">max-w-md</code>
                                    <span class="text-blue-600 dark:text-blue-300 ml-1">448px</span>
                                </div>
                                <div class="flex items-center">
                                    <div class="w-3 h-3 bg-blue-500 rounded mr-2"></div>
                                    <code class="text-blue-800 dark:text-blue-200">max-w-lg</code>
                                    <span class="text-blue-600 dark:text-blue-300 ml-1">512px</span>
                                </div>
                                <div class="flex items-center">
                                    <div class="w-3 h-3 bg-blue-500 rounded mr-2"></div>
                                    <code class="text-blue-800 dark:text-blue-200">max-w-xl</code>
                                    <span class="text-blue-600 dark:text-blue-300 ml-1">576px</span>
                                </div>
                                <div class="flex items-center">
                                    <div class="w-3 h-3 bg-blue-500 rounded mr-2"></div>
                                    <code class="text-blue-800 dark:text-blue-200">max-w-2xl</code>
                                    <span class="text-blue-600 dark:text-blue-300 ml-1">672px</span>
                                </div>
                                <div class="flex items-center">
                                    <div class="w-3 h-3 bg-blue-500 rounded mr-2"></div>
                                    <code class="text-blue-800 dark:text-blue-200">max-w-4xl</code>
                                    <span class="text-blue-600 dark:text-blue-300 ml-1">896px</span>
                                </div>
                                <div class="flex items-center">
                                    <div class="w-3 h-3 bg-blue-500 rounded mr-2"></div>
                                    <code class="text-blue-800 dark:text-blue-200">max-w-6xl</code>
                                    <span class="text-blue-600 dark:text-blue-300 ml-1">1152px</span>
                                </div>
                                <div class="flex items-center">
                                    <div class="w-3 h-3 bg-blue-500 rounded mr-2"></div>
                                    <code class="text-blue-800 dark:text-blue-200">max-w-full</code>
                                    <span class="text-blue-600 dark:text-blue-300 ml-1">100%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Rest of your existing content... -->
            </div>

            <script>
                // Copy functionality for size classes
                document.addEventListener('DOMContentLoaded', function() {
                    const copyButtons = document.querySelectorAll('.copy-size-btn');

                    copyButtons.forEach(button => {
                        button.addEventListener('click', function() {
                            const sizeClass = this.getAttribute('data-class');

                            // Copy to clipboard
                            navigator.clipboard.writeText(sizeClass).then(() => {
                                // Visual feedback
                                const originalText = this.textContent;
                                this.textContent = '✓ Copied!';
                                this.classList.add('bg-green-600', 'hover:bg-green-700');
                                this.classList.remove('bg-blue-600', 'hover:bg-blue-700');

                                // Reset after 2 seconds
                                setTimeout(() => {
                                    this.textContent = originalText;
                                    this.classList.remove('bg-green-600', 'hover:bg-green-700');
                                    this.classList.add('bg-blue-600', 'hover:bg-blue-700');
                                }, 2000);
                            }).catch(err => {
                                console.error('Failed to copy: ', err);
                                alert('Failed to copy to clipboard');
                            });
                        });
                    });
                });
            </script>

            {{-- Body Text --}}
            <div class="space-y-2">
                <p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">
                    Body Text - text-xl leading-relaxed (20px) - This is your standard paragraph text.
                </p>
                <code class="text-sm bg-gray-200 dark:bg-gray-800 text-gray-800 dark:text-gray-300 p-2 rounded block">class="text-xl leading-relaxed text-gray-700 dark:text-gray-300"</code>
            </div>

            <div class="space-y-2">
                <p class="text-lg text-gray-600 dark:text-gray-400">
                    Secondary Text - text-lg (18px) - Use for less important content.
                </p>
                <code class="text-sm bg-gray-200 dark:bg-gray-800 text-gray-800 dark:text-gray-300 p-2 rounded block">class="text-lg text-gray-600 dark:text-gray-400"</code>
            </div>

            <div class="space-y-2">
                <p class="text-base text-gray-500 dark:text-gray-500">
                    Small Text - text-base (16px) - Use for labels, captions, or fine print.
                </p>
                <code class="text-sm bg-gray-200 dark:bg-gray-800 text-gray-800 dark:text-gray-300 p-2 rounded block">class="text-base text-gray-500 dark:text-gray-500"</code>
            </div>
        </div>
    </section>

    {{-- Colors Section --}}
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">Colors</h2>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <div class="bg-zinc-800 text-white p-4 rounded-lg text-center shadow">
                <div class="font-semibold">Outer Background</div>
                <div class="text-sm">#27272a</div>
                <div class="text-xs mt-1">Page background</div>
            </div>
            <div class="bg-gray-900 text-white p-4 rounded-lg text-center shadow">
                <div class="font-semibold">Gray-900</div>
                <div class="text-sm">#111827</div>
                <div class="text-xs mt-1">Content background</div>
            </div>
            <div class="bg-gray-700 text-white p-4 rounded-lg text-center shadow">
                <div class="font-semibold">Gray-700</div>
                <div class="text-sm">#374151</div>
                <div class="text-xs mt-1">text-gray-700</div>
            </div>
            <div class="bg-blue-600 text-white p-4 rounded-lg text-center shadow">
                <div class="font-semibold">Blue-600</div>
                <div class="text-sm">#2563eb</div>
                <div class="text-xs mt-1">text-blue-600</div>
            </div>
        </div>
    </section>

    {{-- Side by side --}}
    {{-- Color Comparison Test --}}
    <section class="mb-8">
        <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Color Comparison Test</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bg-[#27272a] h-32 rounded-lg flex items-center justify-center text-white">
                    <div class="text-center">
                        <div class="font-semibold">Hex Code</div>
                        <div class="text-sm">#27272a</div>
                        <div class="text-xs">Explicit hex</div>
                    </div>
                </div>
                <div class="bg-zinc-800 h-32 rounded-lg flex items-center justify-center text-white">
                    <div class="text-center">
                        <div class="font-semibold">Tailwind Class</div>
                        <div class="text-sm">bg-zinc-800</div>
                        <div class="text-xs">Should be #27272a</div>
                    </div>
                </div>
            </div>
            <p class="text-center text-gray-600 dark:text-gray-400 mt-4">
                Left: Explicit <code class="bg-gray-200 dark:bg-gray-800 px-1 rounded">bg-[#27272a]</code> | Right: <code class="bg-gray-200 dark:bg-gray-800 px-1 rounded">bg-zinc-800</code>
            </p>
        </div>
    </section>

    {{-- Bottom line --}}
    {{-- Quick Color Reference --}}
    <section class="mb-8">
        <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">🎨 Essential Color Reference</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                {{-- Outer Background --}}
                <div class="bg-[#27272a] p-4 rounded-lg text-white text-center">
                    <div class="font-bold text-lg">Outer Background</div>
                    <div class="text-sm">#27272a</div>
                    <div class="text-xs mt-1">(zinc-800)</div>
                    <div class="text-xs mt-2">Page background that surrounds everything</div>
                </div>

                {{-- Content Background --}}
                <div class="bg-[#111827] p-4 rounded-lg text-white text-center">
                    <div class="font-bold text-lg">Content Background</div>
                    <div class="text-sm">#111827</div>
                    <div class="text-xs mt-1">(gray-900)</div>
                    <div class="text-xs mt-2">Main content areas, panels, cards</div>
                </div>

                {{-- Section Background --}}
                <div class="bg-[#1f2937] p-4 rounded-lg text-white text-center">
                    <div class="font-bold text-lg">Section Background</div>
                    <div class="text-sm">#1f2937</div>
                    <div class="text-xs mt-1">(gray-800)</div>
                    <div class="text-xs mt-2">Nested sections, subtle separation</div>
                </div>
            </div>

            {{-- Usage Examples --}}
            <div class="mt-6 p-4 bg-gray-800 rounded-lg">
                <h3 class="text-lg font-semibold text-white mb-3">Usage Examples:</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-300">
                    <div>
                        <code class="block bg-gray-700 p-2 rounded mb-2">dark:bg-zinc-800</code>
                        <span class="text-xs">← Outer page background</span>
                    </div>
                    <div>
                        <code class="block bg-gray-700 p-2 rounded mb-2">dark:bg-gray-900</code>
                        <span class="text-xs">← Content containers</span>
                    </div>
                    <div>
                        <code class="block bg-gray-700 p-2 rounded mb-2">dark:bg-gray-800</code>
                        <span class="text-xs">← Nested sections</span>
                    </div>
                    <div>
                        <code class="block bg-gray-700 p-2 rounded mb-2">text-gray-300</code>
                        <span class="text-xs">← Readable text on dark</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Container Examples Section --}}
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">Container Examples</h2>

        <div class="space-y-6">
            {{-- Direct on background --}}
            <div class="p-6 border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Direct on #27272a Background</h3>
                <p class="text-lg text-gray-700 dark:text-gray-300">
                    This content sits directly on your outer dark background. Perfect for most content.
                </p>
            </div>

            {{-- Subtle container --}}
            <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Subtle Container</h3>
                <p class="text-lg text-gray-700 dark:text-gray-300">
                    Use <code class="text-sm bg-gray-200 dark:bg-gray-800 p-1 rounded">bg-gray-50 dark:bg-gray-900</code> for sections that need separation.
                </p>
            </div>

            {{-- Bordered container --}}
            <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Bordered Container</h3>
                <p class="text-lg text-gray-700 dark:text-gray-300">
                    Use <code class="text-sm bg-gray-200 dark:bg-gray-800 p-1 rounded">border border-gray-200 dark:border-gray-700</code> for card-like sections.
                </p>
            </div>
        </div>
    </section>

    {{-- Links Section --}}
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">Links</h2>

        <div class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6 space-y-4">
            <div class="space-y-2">
                <a href="#" class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">
                    Standard Link - text-blue-600 dark:text-blue-400
                </a>
                <code class="text-sm bg-gray-200 dark:bg-gray-800 text-gray-800 dark:text-gray-300 p-2 rounded block">class="text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300"</code>
            </div>

            <div class="space-y-2">
                <a href="#" class="text-xl text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">
                    Large Link - text-xl with link colors
                </a>
                <code class="text-sm bg-gray-200 dark:bg-gray-800 text-gray-800 dark:text-gray-300 p-2 rounded block">class="text-xl text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300"</code>
            </div>
        </div>
    </section>

    {{-- Buttons Section --}}
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">Buttons</h2>

        <div class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6 space-y-4">
            <div class="space-y-2">
                <button class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded transition-colors">
                    Primary Button
                </button>
                <code class="text-sm bg-gray-200 dark:bg-gray-800 text-gray-800 dark:text-gray-300 p-2 rounded block">class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded transition-colors"</code>
            </div>

            <div class="space-y-2">
                <button class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded transition-colors">
                    Secondary Button
                </button>
                <code class="text-sm bg-gray-200 dark:bg-gray-800 text-gray-800 dark:text-gray-300 p-2 rounded block">class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded transition-colors"</code>
            </div>
        </div>
    </section>

    {{-- Quick Reference Section --}}
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">Quick Reference</h2>

        <div class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Most Used Patterns:</h3>
            <ul class="space-y-3 text-lg text-gray-700 dark:text-gray-300">
                <li>
                    <strong>Main Headings:</strong>
                    <code class="text-sm ml-2 bg-gray-200 dark:bg-gray-800 p-1 rounded">text-4xl font-semibold text-gray-900 dark:text-white</code>
                </li>
                <li>
                    <strong>Section Headings:</strong>
                    <code class="text-sm ml-2 bg-gray-200 dark:bg-gray-800 p-1 rounded">text-3xl font-semibold text-gray-900 dark:text-white</code>
                </li>
                <li>
                    <strong>Subheadings:</strong>
                    <code class="text-sm ml-2 bg-gray-200 dark:bg-gray-800 p-1 rounded">text-2xl font-semibold text-gray-900 dark:text-white</code>
                </li>
                <li>
                    <strong>Body Text:</strong>
                    <code class="text-sm ml-2 bg-gray-200 dark:bg-gray-800 p-1 rounded">text-xl leading-relaxed text-gray-700 dark:text-gray-300</code>
                </li>
                <li>
                    <strong>Links:</strong>
                    <code class="text-sm ml-2 bg-gray-200 dark:bg-gray-800 p-1 rounded">text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300</code>
                </li>
                <li>
                    <strong>Containers:</strong>
                    <code class="text-sm ml-2 bg-gray-200 dark:bg-gray-800 p-1 rounded">bg-gray-50 dark:bg-gray-900 rounded-lg p-6</code>
                </li>
                <li>
                    <strong>Primary Buttons:</strong>
                    <code class="text-sm ml-2 bg-gray-200 dark:bg-gray-800 p-1 rounded">bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded transition-colors</code>
                </li>
                <li>
                    <strong>Transparent Images:</strong>
                    <code class="text-sm ml-2 bg-gray-200 dark:bg-gray-800 p-1 rounded">bg-white dark:bg-white p-4 rounded-lg border</code>
                </li>
            </ul>
        </div>
    </section>

    {{-- Layout Preview Section --}}
    <section>
        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">Layout Preview</h2>

        <div class="border-4 border-dashed border-gray-300 dark:border-gray-600 rounded-lg p-1 bg-zinc-800">
            <div class="max-w-6xl mx-auto px-4 py-8 bg-gray-900 rounded-lg">
                <h1 class="text-4xl font-semibold text-white mb-8">Example Page Title</h1>

                <div class="space-y-6">
                    <p class="text-xl leading-relaxed text-gray-300">
                        This preview shows the correct background hierarchy:
                    </p>
                    <ul class="text-xl leading-relaxed text-gray-300 list-disc list-inside space-y-2">
                        <li>Outer container: <code class="text-sm bg-gray-800 text-gray-300 p-1 rounded">dark:bg-zinc-800 (#27272a)</code> - from CSS</li>
                        <li>Content area: <code class="text-sm bg-gray-800 text-gray-300 p-1 rounded">dark:bg-gray-900 (#111827)</code> - content background</li>
                    </ul>

                    <div class="bg-gray-800 rounded-lg p-6">
                        <h2 class="text-2xl font-semibold text-white mb-4">Section Heading</h2>
                        <p class="text-xl leading-relaxed text-gray-300">
                            This container uses <code class="text-sm bg-gray-700 text-gray-300 p-1 rounded">bg-gray-800</code> for subtle separation.
                        </p>
                        <a href="#" class="text-blue-400 underline hover:text-blue-300 mt-4 inline-block">
                            Example Link
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <p class="text-lg text-gray-700 dark:text-gray-300 mt-4 text-center">
            ↑ This preview shows the correct background hierarchy with <strong>#27272a</strong> outer and <strong>#111827</strong> content area
        </p>
    </section>
    <div>
        <script>
            tailwind.config = {
                darkMode: 'class',
                theme: {
                    extend: {
                        colors: {
                            primary: {
                                50: '#eff6ff',
                                100: '#dbeafe',
                                200: '#bfdbfe',
                                300: '#93c5fd',
                                400: '#60a5fa',
                                500: '#3b82f6',
                                600: '#2563eb',
                                700: '#1d4ed8',
                                800: '#1e40af',
                                900: '#1e3a8a',
                            }
                        }
                    }
                }
            }
        </script>

        <style>
            .draggable-element {
                width: 100px;
                height: 100px;
                display: flex;
                align-items: center;
                justify-content: center;
                border-radius: 8px;
                font-weight: 600;
                cursor: move;
                user-select: none;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                transition: all 0.2s ease;
            }

            .draggable-element:hover {
                transform: scale(1.05);
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
            }

            .droppable-target {
                width: 200px;
                height: 200px;
                display: flex;
                align-items: center;
                justify-content: center;
                border: 2px dashed;
                border-radius: 12px;
                transition: all 0.3s ease;
            }

            .ui-draggable-dragging {
                z-index: 1000;
                transform: rotate(5deg);
                box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            }

            .highlight {
                background-color: #94be0f !important;
                border-color: navy !important;
                border-width: 3px !important;
            }

            /* Enhanced carousel styles for mobile */
            .carousel {
                position: relative;
                width: 100%;
                overflow: hidden;
                border-radius: 12px;
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            }

            .carousel-inner {
                display: flex;
                transition: transform 0.6s ease-in-out;
                touch-action: pan-y pinch-zoom;
                width: 100%;
            }

            .carousel-item {
                min-width: 100%;
                flex-shrink: 0;
                transition: opacity 0.6s ease;
                width: 100%;
                box-sizing: border-box;
            }

            .carousel-control {
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                background: rgba(0, 0, 0, 0.5);
                color: white;
                border: none;
                padding: 12px;
                cursor: pointer;
                border-radius: 50%;
                width: 40px;
                height: 40px;
                display: flex;
                align-items: center;
                justify-content: center;
                transition: all 0.3s ease;
                z-index: 10;
            }

            @media (min-width: 768px) {
                .carousel-control {
                    width: 50px;
                    height: 50px;
                }
            }

            .carousel-control:hover {
                background: rgba(0, 0, 0, 0.8);
                transform: translateY(-50%) scale(1.1);
            }

            .carousel-control.prev {
                left: 10px;
            }

            .carousel-control.next {
                right: 10px;
            }

            @media (min-width: 768px) {
                .carousel-control.prev {
                    left: 20px;
                }
                .carousel-control.next {
                    right: 20px;
                }
            }

            /* Numbered slide navigation */
            .slide-numbers {
                display: flex;
                flex-wrap: wrap;
                gap: 6px;
                justify-content: center;
                margin-top: 1rem;
                max-width: 100%;
            }

            .slide-number-btn {
                width: 32px;
                height: 32px;
                display: flex;
                align-items: center;
                justify-content: center;
                border: 2px solid #3b82f6;
                background: white;
                color: #3b82f6;
                border-radius: 6px;
                cursor: pointer;
                transition: all 0.3s ease;
                font-size: 0.75rem;
                font-weight: 600;
                flex-shrink: 0;
            }

            .slide-number-btn:hover {
                background: #3b82f6;
                color: white;
                transform: scale(1.1);
            }

            .slide-number-btn.active {
                background: #3b82f6;
                color: white;
                transform: scale(1.1);
            }

            .dark .slide-number-btn {
                background: #374151;
                color: #60a5fa;
                border-color: #60a5fa;
            }

            .dark .slide-number-btn:hover,
            .dark .slide-number-btn.active {
                background: #60a5fa;
                color: #1f2937;
            }

            /* Mobile optimizations */
            .mobile-slide-content {
                padding: 1rem;
                min-height: 300px;
                overflow-y: auto;
                width: 100%;
                box-sizing: border-box;
            }

            @media (min-width: 768px) {
                .mobile-slide-content {
                    padding: 2rem;
                    min-height: 400px;
                }
            }

            .slide-title {
                font-size: 1.25rem;
                font-weight: bold;
                margin-bottom: 1rem;
                text-align: center;
            }

            @media (min-width: 768px) {
                .slide-title {
                    font-size: 1.5rem;
                }
            }

            .slide-text {
                font-size: 0.875rem;
                line-height: 1.5;
            }

            @media (min-width: 768px) {
                .slide-text {
                    font-size: 1rem;
                }
            }

            /* Uniform dark slide styling */
            .dark-slide {
                background: #1f2937 !important;
                color: #f9fafb !important;
            }

            .dark-slide-content {
                color: #e5e7eb !important;
            }

            .dark-slide-highlight {
                background: #374151 !important;
                color: #d1d5db !important;
                border: 1px solid #4b5563 !important;
            }

            /* Ensure proper carousel item sizing */
            .carousel-item > div {
                width: 100%;
                height: 100%;
            }

            /* Navigation panel styling */
            .slide-navigation-panel {
                margin-top: 2rem;
                padding-top: 1rem;
                border-top: 1px solid #e5e7eb;
            }

            .dark .slide-navigation-panel {
                border-top: 1px solid #4b5563;
            }
        </style>

        <div class="min-h-screen bg-white dark:bg-gray-900 py-8">
            <!-- First Carousel - Navigation at Bottom Only -->
            <div class="container mx-auto px-4 py-8">
                <h2 class="text-2xl font-bold mb-4 text-gray-800 dark:text-white text-center">Process Walkthrough Carousel (Navigation at Bottom)</h2>

                <!-- Custom Tailwind Carousel -->
                <div class="carousel bg-gray-800">
                    <div class="carousel-inner">
                        <!-- Slide 1: PMBOK -->
                        <div class="carousel-item active">
                            <div class="mobile-slide-content dark-slide flex flex-col justify-between min-h-[500px]">
                                <div class="text-center w-full max-w-4xl dark-slide-content">
                                    <h3 class="slide-title text-white">PMBOK Guide</h3>
                                    <p class="slide-text mb-4">
                                        The Project Management Body of Knowledge (PMBOK) provides fundamental practices for project management.
                                    </p>
                                    <div class="dark-slide-highlight p-4 rounded-lg inline-block">
                                        <div class="text-sm">Essential project management processes</div>
                                    </div>
                                </div>

                                <!-- ============================================
                                     CAROUSEL NAVIGATION SECTION - START
                                     Copy this entire section for other slides
                                     ============================================ -->
                                <div class="slide-navigation-panel">
                                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                                            Slide Navigation
                                        </h3>

                                        <div class="flex flex-wrap gap-4 justify-center">
                                            <button
                                                    onclick="carouselPrev()"
                                                    class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 dark:bg-gray-500 dark:hover:bg-gray-600 text-white rounded-lg transition-colors"
                                            >
                                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                                </svg>
                                                Previous Slide
                                            </button>

                                            <button
                                                    onclick="carouselNext()"
                                                    class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white rounded-lg transition-colors"
                                            >
                                                Next Slide
                                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- ============================================
                                     CAROUSEL NAVIGATION SECTION - END
                                     ============================================ -->
                            </div>
                        </div>

                        <!-- Slide 2: Standards Framework -->
                        <div class="carousel-item">
                            <div class="mobile-slide-content dark-slide flex flex-col justify-between min-h-[500px]">
                                <div class="text-center w-full max-w-4xl dark-slide-content">
                                    <h3 class="slide-title text-white">Standards & Frameworks</h3>
                                    <p class="slide-text mb-4">
                                        Various standards and frameworks support different aspects of project and process management.
                                    </p>
                                    <div class="grid grid-cols-2 gap-2 mt-4 max-w-xs mx-auto">
                                        <div class="dark-slide-highlight p-2 rounded text-xs text-center">ISO Standards</div>
                                        <div class="dark-slide-highlight p-2 rounded text-xs text-center">PMBOK</div>
                                        <div class="dark-slide-highlight p-2 rounded text-xs text-center">ITIL</div>
                                        <div class="dark-slide-highlight p-2 rounded text-xs text-center">CMMI</div>
                                    </div>
                                </div>

                                <!-- Navigation Panel -->
                                <div class="slide-navigation-panel">
                                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Slide Navigation</h3>
                                        <div class="flex flex-wrap gap-4 justify-center">
                                            <button onclick="carouselPrev()" class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 dark:bg-gray-500 dark:hover:bg-gray-600 text-white rounded-lg transition-colors">
                                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                                                Previous Slide
                                            </button>
                                            <button onclick="carouselNext()" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white rounded-lg transition-colors">
                                                Next Slide
                                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 3: Strategy Wall -->
                        <div class="carousel-item">
                            <div class="mobile-slide-content dark-slide flex flex-col justify-between min-h-[500px]">
                                <div class="text-center w-full max-w-4xl dark-slide-content">
                                    <h3 class="slide-title text-white">Strategy Implementation</h3>
                                    <p class="slide-text">
                                        Successful strategy requires effective implementation through well-defined processes and governance.
                                    </p>
                                </div>
                                <!-- Navigation Panel -->
                                <div class="slide-navigation-panel">
                                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Slide Navigation</h3>
                                        <div class="flex flex-wrap gap-4 justify-center">
                                            <button onclick="carouselPrev()" class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 dark:bg-gray-500 dark:hover:bg-gray-600 text-white rounded-lg transition-colors">
                                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                                                Previous Slide
                                            </button>
                                            <button onclick="carouselNext()" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white rounded-lg transition-colors">
                                                Next Slide
                                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 4: Capability Maturity -->
                        <div class="carousel-item">
                            <div class="mobile-slide-content dark-slide flex flex-col justify-between min-h-[500px]">
                                <div class="text-center w-full max-w-4xl dark-slide-content">
                                    <h3 class="slide-title text-white">Capability Maturity Model</h3>
                                    <p class="slide-text mb-4">
                                        CMM helps organizations improve their processes through defined maturity levels.
                                    </p>
                                    <div class="space-y-2 text-sm max-w-xs mx-auto">
                                        <div class="flex justify-between"><span>Level 1:</span><span>Initial</span></div>
                                        <div class="flex justify-between"><span>Level 2:</span><span>Managed</span></div>
                                        <div class="flex justify-between"><span>Level 3:</span><span>Defined</span></div>
                                        <div class="flex justify-between"><span>Level 4:</span><span>Quantitatively Managed</span></div>
                                        <div class="flex justify-between"><span>Level 5:</span><span>Optimizing</span></div>
                                    </div>
                                </div>
                                <!-- Navigation Panel -->
                                <div class="slide-navigation-panel">
                                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Slide Navigation</h3>
                                        <div class="flex flex-wrap gap-4 justify-center">
                                            <button onclick="carouselPrev()" class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 dark:bg-gray-500 dark:hover:bg-gray-600 text-white rounded-lg transition-colors">
                                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                                                Previous Slide
                                            </button>
                                            <button onclick="carouselNext()" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white rounded-lg transition-colors">
                                                Next Slide
                                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 5: CMMI Development -->
                        <div class="carousel-item">
                            <div class="mobile-slide-content dark-slide flex flex-col justify-between min-h-[500px]">
                                <div class="text-center w-full max-w-4xl dark-slide-content">
                                    <h3 class="slide-title text-white">CMMI for Development</h3>
                                    <p class="slide-text">
                                        CMMI-DEV provides guidance for developing products and services across the lifecycle.
                                    </p>
                                </div>
                                <!-- Navigation Panel -->
                                <div class="slide-navigation-panel">
                                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Slide Navigation</h3>
                                        <div class="flex flex-wrap gap-4 justify-center">
                                            <button onclick="carouselPrev()" class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 dark:bg-gray-500 dark:hover:bg-gray-600 text-white rounded-lg transition-colors">
                                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                                                Previous Slide
                                            </button>
                                            <button onclick="carouselNext()" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white rounded-lg transition-colors">
                                                Next Slide
                                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 6: People Process Technology -->
                        <div class="carousel-item">
                            <div class="mobile-slide-content dark-slide flex flex-col justify-between min-h-[500px]">
                                <div class="text-center w-full max-w-4xl dark-slide-content">
                                    <h3 class="slide-title text-white">People - Process - Technology</h3>
                                    <p class="slide-text mb-4">
                                        Successful implementations balance people, processes, and technology in harmony.
                                    </p>
                                    <div class="flex flex-col sm:flex-row justify-center space-y-2 sm:space-y-0 sm:space-x-4 text-sm">
                                        <div class="dark-slide-highlight p-2 rounded text-center">People</div>
                                        <div class="dark-slide-highlight p-2 rounded text-center">Process</div>
                                        <div class="dark-slide-highlight p-2 rounded text-center">Technology</div>
                                    </div>
                                </div>
                                <!-- Navigation Panel -->
                                <div class="slide-navigation-panel">
                                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Slide Navigation</h3>
                                        <div class="flex flex-wrap gap-4 justify-center">
                                            <button onclick="carouselPrev()" class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 dark:bg-gray-500 dark:hover:bg-gray-600 text-white rounded-lg transition-colors">
                                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                                                Previous Slide
                                            </button>
                                            <button onclick="carouselNext()" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white rounded-lg transition-colors">
                                                Next Slide
                                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 7: V Model -->
                        <div class="carousel-item">
                            <div class="mobile-slide-content dark-slide flex flex-col justify-between min-h-[500px]">
                                <div class="text-center w-full max-w-4xl dark-slide-content">
                                    <h3 class="slide-title text-white">V-Model Development</h3>
                                    <p class="slide-text">
                                        The V-Model emphasizes verification and validation throughout the development lifecycle.
                                    </p>
                                </div>
                                <!-- Navigation Panel -->
                                <div class="slide-navigation-panel">
                                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Slide Navigation</h3>
                                        <div class="flex flex-wrap gap-4 justify-center">
                                            <button onclick="carouselPrev()" class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 dark:bg-gray-500 dark:hover:bg-gray-600 text-white rounded-lg transition-colors">
                                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                                                Previous Slide
                                            </button>
                                            <button onclick="carouselNext()" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white rounded-lg transition-colors">
                                                Next Slide
                                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 8: ITIL 3 -->
                        <div class="carousel-item">
                            <div class="mobile-slide-content dark-slide flex flex-col justify-between min-h-[500px]">
                                <div class="text-center w-full max-w-4xl dark-slide-content">
                                    <h3 class="slide-title text-white">ITIL v3 Framework</h3>
                                    <p class="slide-text mb-4">
                                        ITIL v3 provides best practices for IT service management across the service lifecycle.
                                    </p>
                                    <div class="text-sm space-y-1 max-w-xs mx-auto">
                                        <div class="text-center">Service Strategy</div>
                                        <div class="text-center">Service Design</div>
                                        <div class="text-center">Service Transition</div>
                                        <div class="text-center">Service Operation</div>
                                        <div class="text-center">Continual Service Improvement</div>
                                    </div>
                                </div>
                                <!-- Navigation Panel -->
                                <div class="slide-navigation-panel">
                                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Slide Navigation</h3>
                                        <div class="flex flex-wrap gap-4 justify-center">
                                            <button onclick="carouselPrev()" class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 dark:bg-gray-500 dark:hover:bg-gray-600 text-white rounded-lg transition-colors">
                                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                                                Previous Slide
                                            </button>
                                            <button onclick="carouselNext()" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white rounded-lg transition-colors">
                                                Next Slide
                                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 9: DevOps -->
                        <div class="carousel-item">
                            <div class="mobile-slide-content dark-slide flex flex-col justify-between min-h-[500px]">
                                <div class="text-center w-full max-w-4xl dark-slide-content">
                                    <h3 class="slide-title text-white">DevOps Practices</h3>
                                    <p class="slide-text">
                                        DevOps bridges development and operations through automation, collaboration, and continuous delivery.
                                    </p>
                                </div>
                                <!-- Navigation Panel -->
                                <div class="slide-navigation-panel">
                                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Slide Navigation</h3>
                                        <div class="flex flex-wrap gap-4 justify-center">
                                            <button onclick="carouselPrev()" class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 dark:bg-gray-500 dark:hover:bg-gray-600 text-white rounded-lg transition-colors">
                                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                                                Previous Slide
                                            </button>
                                            <button onclick="carouselNext()" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white rounded-lg transition-colors">
                                                Next Slide
                                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 10: PRINCE2 Agile -->
                        <div class="carousel-item">
                            <div class="mobile-slide-content dark-slide flex flex-col justify-between min-h-[500px]">
                                <div class="text-center w-full max-w-4xl dark-slide-content">
                                    <h3 class="slide-title text-white">PRINCE2 Agile</h3>
                                    <p class="slide-text">
                                        Combines PRINCE2's governance with agile delivery methods for controlled flexibility.
                                    </p>
                                </div>
                                <!-- Navigation Panel -->
                                <div class="slide-navigation-panel">
                                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Slide Navigation</h3>
                                        <div class="flex flex-wrap gap-4 justify-center">
                                            <button onclick="carouselPrev()" class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 dark:bg-gray-500 dark:hover:bg-gray-600 text-white rounded-lg transition-colors">
                                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                                                Previous Slide
                                            </button>
                                            <button onclick="carouselNext()" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white rounded-lg transition-colors">
                                                Next Slide
                                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 11: DSDM -->
                        <div class="carousel-item">
                            <div class="mobile-slide-content dark-slide flex flex-col justify-between min-h-[500px]">
                                <div class="text-center w-full max-w-4xl dark-slide-content">
                                    <h3 class="slide-title text-white">Dynamic Systems Development</h3>
                                    <p class="slide-text">
                                        DSDM provides an agile project delivery framework focusing on business needs.
                                    </p>
                                </div>
                                <!-- Navigation Panel -->
                                <div class="slide-navigation-panel">
                                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Slide Navigation</h3>
                                        <div class="flex flex-wrap gap-4 justify-center">
                                            <button onclick="carouselPrev()" class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 dark:bg-gray-500 dark:hover:bg-gray-600 text-white rounded-lg transition-colors">
                                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                                                Previous Slide
                                            </button>
                                            <button onclick="carouselNext()" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white rounded-lg transition-colors">
                                                Next Slide
                                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 12: Scrum -->
                        <div class="carousel-item">
                            <div class="mobile-slide-content dark-slide flex flex-col justify-between min-h-[500px]">
                                <div class="text-center w-full max-w-4xl dark-slide-content">
                                    <h3 class="slide-title text-white">Scrum Framework</h3>
                                    <p class="slide-text mb-4">
                                        Scrum is an agile framework for complex product development through iterative sprints.
                                    </p>
                                    <div class="text-sm space-y-1 max-w-xs mx-auto">
                                        <div class="text-center">Product Owner</div>
                                        <div class="text-center">Scrum Master</div>
                                        <div class="text-center">Development Team</div>
                                        <div class="text-center">Sprints</div>
                                        <div class="text-center">Artifacts & Events</div>
                                    </div>
                                </div>
                                <!-- Navigation Panel -->
                                <div class="slide-navigation-panel">
                                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Slide Navigation</h3>
                                        <div class="flex flex-wrap gap-4 justify-center">
                                            <button onclick="carouselPrev()" class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 dark:bg-gray-500 dark:hover:bg-gray-600 text-white rounded-lg transition-colors">
                                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                                                Previous Slide
                                            </button>
                                            <button onclick="carouselNext()" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white rounded-lg transition-colors">
                                                Next Slide
                                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 13: SAFe -->
                        <div class="carousel-item">
                            <div class="mobile-slide-content dark-slide flex flex-col justify-between min-h-[500px]">
                                <div class="text-center w-full max-w-4xl dark-slide-content">
                                    <h3 class="slide-title text-white">Scaled Agile Framework</h3>
                                    <p class="slide-text">
                                        SAFe provides guidance for scaling agile practices across large enterprises.
                                    </p>
                                </div>
                                <!-- Navigation Panel -->
                                <div class="slide-navigation-panel">
                                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Slide Navigation</h3>
                                        <div class="flex flex-wrap gap-4 justify-center">
                                            <button onclick="carouselPrev()" class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 dark:bg-gray-500 dark:hover:bg-gray-600 text-white rounded-lg transition-colors">
                                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                                                Previous Slide
                                            </button>
                                            <button onclick="carouselNext()" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white rounded-lg transition-colors">
                                                Next Slide
                                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 14: People CMM -->
                        <div class="carousel-item">
                            <div class="mobile-slide-content dark-slide flex flex-col justify-between min-h-[500px]">
                                <div class="text-center w-full max-w-4xl dark-slide-content">
                                    <h3 class="slide-title text-white">People Capability Maturity</h3>
                                    <p class="slide-text">
                                        P-CMM focuses on developing workforce capabilities to enhance organizational performance.
                                    </p>
                                </div>
                                <!-- Navigation Panel -->
                                <div class="slide-navigation-panel">
                                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Slide Navigation</h3>
                                        <div class="flex flex-wrap gap-4 justify-center">
                                            <button onclick="carouselPrev()" class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 dark:bg-gray-500 dark:hover:bg-gray-600 text-white rounded-lg transition-colors">
                                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                                                Previous Slide
                                            </button>
                                            <button onclick="carouselNext()" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white rounded-lg transition-colors">
                                                Next Slide
                                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 15: COBIT 5 -->
                        <div class="carousel-item">
                            <div class="mobile-slide-content dark-slide flex flex-col justify-between min-h-[500px]">
                                <div class="text-center w-full max-w-4xl dark-slide-content">
                                    <h3 class="slide-title text-white">COBIT 5 Framework</h3>
                                    <p class="slide-text">
                                        COBIT provides a comprehensive framework for governance and management of enterprise IT.
                                    </p>
                                </div>
                                <!-- Navigation Panel -->
                                <div class="slide-navigation-panel">
                                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Slide Navigation</h3>
                                        <div class="flex flex-wrap gap-4 justify-center">
                                            <button onclick="carouselPrev()" class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 dark:bg-gray-500 dark:hover:bg-gray-600 text-white rounded-lg transition-colors">
                                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                                                Previous Slide
                                            </button>
                                            <button onclick="carouselNext()" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white rounded-lg transition-colors">
                                                Next Slide
                                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Your existing code... -->
                    </div>

                    <!-- Numbered Slide Navigation -->
                    <div class="slide-numbers" id="slideNumbers">
                        <!-- Number buttons will be generated by JavaScript -->
                    </div>

                    <!-- ============================================
                         MISSING EXTERNAL NAVIGATION BUTTONS - ADD THIS
                         ============================================ -->
                    <div class="mt-6 flex flex-wrap justify-center gap-2">
                        <button class="px-3 py-2 bg-primary-600 hover:bg-primary-700 text-white rounded-lg transition-colors text-sm" onclick="carouselPrev()">
                            ← Previous
                        </button>
                        <button class="px-3 py-2 bg-primary-600 hover:bg-primary-700 text-white rounded-lg transition-colors text-sm" onclick="carouselNext()">
                            Next →
                        </button>
                    </div>
                    <!-- ============================================
                         END OF MISSING SECTION
                         ============================================ -->
                </div>
            <!-- Second Carousel - With Top & Bottom Controls -->
                <!-- Second Carousel - With Top & Bottom Controls -->
                <br><br><br>

                <div class="container mx-auto px-4 py-8">
                    <h2 class="text-2xl font-bold mb-4 text-gray-800 dark:text-white text-center">Process Walkthrough Carousel (Top/Bottom Controls)</h2>

                    <!-- TOP SECTION: Previous/Next Buttons -->
                    <div class="mb-4 flex flex-wrap justify-center gap-2">
                        <button class="px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white rounded-lg transition-colors text-sm font-medium" onclick="carousel2Prev()">
                            ← Previous Slide
                        </button>
                        <button class="px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white rounded-lg transition-colors text-sm font-medium" onclick="carousel2Next()">
                            Next Slide →
                        </button>
                    </div>

                    <!-- TOP SECTION: Numbered Navigation -->
                    <div class="slide-numbers mb-4" id="slideNumbers2Top">
                        <!-- Number buttons will be generated by JavaScript -->
                    </div>

                    <!-- Custom Tailwind Carousel -->
                    <div class="carousel bg-gray-800" id="carousel2">
                        <div class="carousel-inner" id="carouselInner2">
                            <!-- Slide 1: [Your Title Here] -->
                            <div class="carousel-item active">
                                <div class="mobile-slide-content dark-slide flex flex-col justify-between min-h-[500px]">
                                    <div class="text-center w-full max-w-4xl dark-slide-content">
                                        <h3 class="slide-title text-white">[Your Slide Title Here]</h3>
                                        <p class="slide-text mb-4">[Your main content text goes here. This is where you describe the topic or concept.]</p>
                                        <div class="dark-slide-highlight p-4 rounded-lg inline-block">
                                            <div class="text-sm">[Your highlight or key point here]</div>
                                        </div>
                                    </div>

                                    <!-- SLIDE NAVIGATION PANEL -->
                                    <div class="slide-navigation-panel">
                                        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6">
                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Slide Navigation</h3>
                                            <div class="flex flex-wrap gap-4 justify-center">
                                                <button onclick="carousel2Prev()" class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 dark:bg-gray-500 dark:hover:bg-gray-600 text-white rounded-lg transition-colors">
                                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                                                    Previous Slide
                                                </button>
                                                <button onclick="carousel2Next()" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white rounded-lg transition-colors">
                                                    Next Slide
                                                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 2: [Your Title Here] -->
                            <div class="carousel-item">
                                <div class="mobile-slide-content dark-slide flex flex-col justify-between min-h-[500px]">
                                    <div class="text-center w-full max-w-4xl dark-slide-content">
                                        <h3 class="slide-title text-white">[Your Slide Title Here]</h3>
                                        <p class="slide-text mb-4">[Your main content text goes here. This is where you describe the topic or concept.]</p>
                                        <div class="dark-slide-highlight p-4 rounded-lg inline-block">
                                            <div class="text-sm">[Your highlight or key point here]</div>
                                        </div>
                                    </div>

                                    <!-- SLIDE NAVIGATION PANEL -->
                                    <div class="slide-navigation-panel">
                                        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6">
                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Slide Navigation</h3>
                                            <div class="flex flex-wrap gap-4 justify-center">
                                                <button onclick="carousel2Prev()" class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 dark:bg-gray-500 dark:hover:bg-gray-600 text-white rounded-lg transition-colors">
                                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                                                    Previous Slide
                                                </button>
                                                <button onclick="carousel2Next()" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white rounded-lg transition-colors">
                                                    Next Slide
                                                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 3: [Your Title Here] -->
                            <div class="carousel-item active">
                                <div class="mobile-slide-content dark-slide flex flex-col justify-between min-h-[500px]">
                                    <div class="text-center w-full max-w-4xl dark-slide-content">
                                        <h3 class="slide-title text-white">[Your Slide Title Here]</h3>
                                        <p class="slide-text mb-4">[Your main content text goes here. This is where you describe the topic or concept.]</p>
                                        <div class="dark-slide-highlight p-4 rounded-lg inline-block">
                                            <div class="text-sm">[Your highlight or key point here]</div>
                                        </div>
                                    </div>

                                    <!-- SLIDE NAVIGATION PANEL -->
                                    <div class="slide-navigation-panel">
                                        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6">
                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Slide Navigation</h3>
                                            <div class="flex flex-wrap gap-4 justify-center">
                                                <button onclick="carousel2Prev()" class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 dark:bg-gray-500 dark:hover:bg-gray-600 text-white rounded-lg transition-colors">
                                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                                                    Previous Slide
                                                </button>
                                                <button onclick="carousel2Next()" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white rounded-lg transition-colors">
                                                    Next Slide
                                                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 4: [Your Title Here] -->
                            <div class="carousel-item">
                                <div class="mobile-slide-content dark-slide flex flex-col justify-between min-h-[500px]">
                                    <div class="text-center w-full max-w-4xl dark-slide-content">
                                        <h3 class="slide-title text-white">[Your Slide Title Here]</h3>
                                        <p class="slide-text mb-4">[Your main content text goes here. This is where you describe the topic or concept.]</p>
                                        <div class="dark-slide-highlight p-4 rounded-lg inline-block">
                                            <div class="text-sm">[Your highlight or key point here]</div>
                                        </div>
                                    </div>

                                    <!-- SLIDE NAVIGATION PANEL -->
                                    <div class="slide-navigation-panel">
                                        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6">
                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Slide Navigation</h3>
                                            <div class="flex flex-wrap gap-4 justify-center">
                                                <button onclick="carousel2Prev()" class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 dark:bg-gray-500 dark:hover:bg-gray-600 text-white rounded-lg transition-colors">
                                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                                                    Previous Slide
                                                </button>
                                                <button onclick="carousel2Next()" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white rounded-lg transition-colors">
                                                    Next Slide
                                                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 5: [Your Title Here] -->
                            <div class="carousel-item active">
                                <div class="mobile-slide-content dark-slide flex flex-col justify-between min-h-[500px]">
                                    <div class="text-center w-full max-w-4xl dark-slide-content">
                                        <h3 class="slide-title text-white">[Your Slide Title Here]</h3>
                                        <p class="slide-text mb-4">[Your main content text goes here. This is where you describe the topic or concept.]</p>
                                        <div class="dark-slide-highlight p-4 rounded-lg inline-block">
                                            <div class="text-sm">[Your highlight or key point here]</div>
                                        </div>
                                    </div>

                                    <!-- SLIDE NAVIGATION PANEL -->
                                    <div class="slide-navigation-panel">
                                        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6">
                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Slide Navigation</h3>
                                            <div class="flex flex-wrap gap-4 justify-center">
                                                <button onclick="carousel2Prev()" class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 dark:bg-gray-500 dark:hover:bg-gray-600 text-white rounded-lg transition-colors">
                                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                                                    Previous Slide
                                                </button>
                                                <button onclick="carousel2Next()" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white rounded-lg transition-colors">
                                                    Next Slide
                                                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 6: [Your Title Here] -->
                            <div class="carousel-item">
                                <div class="mobile-slide-content dark-slide flex flex-col justify-between min-h-[500px]">
                                    <div class="text-center w-full max-w-4xl dark-slide-content">
                                        <h3 class="slide-title text-white">[Your Slide Title Here]</h3>
                                        <p class="slide-text mb-4">[Your main content text goes here. This is where you describe the topic or concept.]</p>
                                        <div class="dark-slide-highlight p-4 rounded-lg inline-block">
                                            <div class="text-sm">[Your highlight or key point here]</div>
                                        </div>
                                    </div>

                                    <!-- SLIDE NAVIGATION PANEL -->
                                    <div class="slide-navigation-panel">
                                        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6">
                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Slide Navigation</h3>
                                            <div class="flex flex-wrap gap-4 justify-center">
                                                <button onclick="carousel2Prev()" class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 dark:bg-gray-500 dark:hover:bg-gray-600 text-white rounded-lg transition-colors">
                                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                                                    Previous Slide
                                                </button>
                                                <button onclick="carousel2Next()" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white rounded-lg transition-colors">
                                                    Next Slide
                                                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 7: [Your Title Here] -->
                            <div class="carousel-item active">
                                <div class="mobile-slide-content dark-slide flex flex-col justify-between min-h-[500px]">
                                    <div class="text-center w-full max-w-4xl dark-slide-content">
                                        <h3 class="slide-title text-white">[Your Slide Title Here]</h3>
                                        <p class="slide-text mb-4">[Your main content text goes here. This is where you describe the topic or concept.]</p>
                                        <div class="dark-slide-highlight p-4 rounded-lg inline-block">
                                            <div class="text-sm">[Your highlight or key point here]</div>
                                        </div>
                                    </div>

                                    <!-- SLIDE NAVIGATION PANEL -->
                                    <div class="slide-navigation-panel">
                                        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6">
                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Slide Navigation</h3>
                                            <div class="flex flex-wrap gap-4 justify-center">
                                                <button onclick="carousel2Prev()" class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 dark:bg-gray-500 dark:hover:bg-gray-600 text-white rounded-lg transition-colors">
                                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                                                    Previous Slide
                                                </button>
                                                <button onclick="carousel2Next()" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white rounded-lg transition-colors">
                                                    Next Slide
                                                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 8: [Your Title Here] -->
                            <div class="carousel-item">
                                <div class="mobile-slide-content dark-slide flex flex-col justify-between min-h-[500px]">
                                    <div class="text-center w-full max-w-4xl dark-slide-content">
                                        <h3 class="slide-title text-white">[Your Slide Title Here]</h3>
                                        <p class="slide-text mb-4">[Your main content text goes here. This is where you describe the topic or concept.]</p>
                                        <div class="dark-slide-highlight p-4 rounded-lg inline-block">
                                            <div class="text-sm">[Your highlight or key point here]</div>
                                        </div>
                                    </div>

                                    <!-- SLIDE NAVIGATION PANEL -->
                                    <div class="slide-navigation-panel">
                                        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6">
                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Slide Navigation</h3>
                                            <div class="flex flex-wrap gap-4 justify-center">
                                                <button onclick="carousel2Prev()" class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 dark:bg-gray-500 dark:hover:bg-gray-600 text-white rounded-lg transition-colors">
                                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                                                    Previous Slide
                                                </button>
                                                <button onclick="carousel2Next()" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white rounded-lg transition-colors">
                                                    Next Slide
                                                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 9: [Your Title Here] -->
                            <div class="carousel-item active">
                                <div class="mobile-slide-content dark-slide flex flex-col justify-between min-h-[500px]">
                                    <div class="text-center w-full max-w-4xl dark-slide-content">
                                        <h3 class="slide-title text-white">[Your Slide Title Here]</h3>
                                        <p class="slide-text mb-4">[Your main content text goes here. This is where you describe the topic or concept.]</p>
                                        <div class="dark-slide-highlight p-4 rounded-lg inline-block">
                                            <div class="text-sm">[Your highlight or key point here]</div>
                                        </div>
                                    </div>

                                    <!-- SLIDE NAVIGATION PANEL -->
                                    <div class="slide-navigation-panel">
                                        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6">
                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Slide Navigation</h3>
                                            <div class="flex flex-wrap gap-4 justify-center">
                                                <button onclick="carousel2Prev()" class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 dark:bg-gray-500 dark:hover:bg-gray-600 text-white rounded-lg transition-colors">
                                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                                                    Previous Slide
                                                </button>
                                                <button onclick="carousel2Next()" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white rounded-lg transition-colors">
                                                    Next Slide
                                                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 10: [Your Title Here] -->
                            <div class="carousel-item">
                                <div class="mobile-slide-content dark-slide flex flex-col justify-between min-h-[500px]">
                                    <div class="text-center w-full max-w-4xl dark-slide-content">
                                        <h3 class="slide-title text-white">[Your Slide Title Here]</h3>
                                        <p class="slide-text mb-4">[Your main content text goes here. This is where you describe the topic or concept.]</p>
                                        <div class="dark-slide-highlight p-4 rounded-lg inline-block">
                                            <div class="text-sm">[Your highlight or key point here]</div>
                                        </div>
                                    </div>

                                    <!-- SLIDE NAVIGATION PANEL -->
                                    <div class="slide-navigation-panel">
                                        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6">
                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Slide Navigation</h3>
                                            <div class="flex flex-wrap gap-4 justify-center">
                                                <button onclick="carousel2Prev()" class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 dark:bg-gray-500 dark:hover:bg-gray-600 text-white rounded-lg transition-colors">
                                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                                                    Previous Slide
                                                </button>
                                                <button onclick="carousel2Next()" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white rounded-lg transition-colors">
                                                    Next Slide
                                                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 11: [Your Title Here] -->
                            <div class="carousel-item active">
                                <div class="mobile-slide-content dark-slide flex flex-col justify-between min-h-[500px]">
                                    <div class="text-center w-full max-w-4xl dark-slide-content">
                                        <h3 class="slide-title text-white">[Your Slide Title Here]</h3>
                                        <p class="slide-text mb-4">[Your main content text goes here. This is where you describe the topic or concept.]</p>
                                        <div class="dark-slide-highlight p-4 rounded-lg inline-block">
                                            <div class="text-sm">[Your highlight or key point here]</div>
                                        </div>
                                    </div>

                                    <!-- SLIDE NAVIGATION PANEL -->
                                    <div class="slide-navigation-panel">
                                        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6">
                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Slide Navigation</h3>
                                            <div class="flex flex-wrap gap-4 justify-center">
                                                <button onclick="carousel2Prev()" class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 dark:bg-gray-500 dark:hover:bg-gray-600 text-white rounded-lg transition-colors">
                                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                                                    Previous Slide
                                                </button>
                                                <button onclick="carousel2Next()" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white rounded-lg transition-colors">
                                                    Next Slide
                                                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 12: [Your Title Here] -->
                            <div class="carousel-item">
                                <div class="mobile-slide-content dark-slide flex flex-col justify-between min-h-[500px]">
                                    <div class="text-center w-full max-w-4xl dark-slide-content">
                                        <h3 class="slide-title text-white">[Your Slide Title Here]</h3>
                                        <p class="slide-text mb-4">[Your main content text goes here. This is where you describe the topic or concept.]</p>
                                        <div class="dark-slide-highlight p-4 rounded-lg inline-block">
                                            <div class="text-sm">[Your highlight or key point here]</div>
                                        </div>
                                    </div>

                                    <!-- SLIDE NAVIGATION PANEL -->
                                    <div class="slide-navigation-panel">
                                        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6">
                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Slide Navigation</h3>
                                            <div class="flex flex-wrap gap-4 justify-center">
                                                <button onclick="carousel2Prev()" class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 dark:bg-gray-500 dark:hover:bg-gray-600 text-white rounded-lg transition-colors">
                                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                                                    Previous Slide
                                                </button>
                                                <button onclick="carousel2Next()" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white rounded-lg transition-colors">
                                                    Next Slide
                                                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 13: [Your Title Here] -->
                            <div class="carousel-item active">
                                <div class="mobile-slide-content dark-slide flex flex-col justify-between min-h-[500px]">
                                    <div class="text-center w-full max-w-4xl dark-slide-content">
                                        <h3 class="slide-title text-white">[Your Slide Title Here]</h3>
                                        <p class="slide-text mb-4">[Your main content text goes here. This is where you describe the topic or concept.]</p>
                                        <div class="dark-slide-highlight p-4 rounded-lg inline-block">
                                            <div class="text-sm">[Your highlight or key point here]</div>
                                        </div>
                                    </div>

                                    <!-- SLIDE NAVIGATION PANEL -->
                                    <div class="slide-navigation-panel">
                                        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6">
                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Slide Navigation</h3>
                                            <div class="flex flex-wrap gap-4 justify-center">
                                                <button onclick="carousel2Prev()" class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 dark:bg-gray-500 dark:hover:bg-gray-600 text-white rounded-lg transition-colors">
                                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                                                    Previous Slide
                                                </button>
                                                <button onclick="carousel2Next()" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white rounded-lg transition-colors">
                                                    Next Slide
                                                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 14: [Your Title Here] -->
                            <div class="carousel-item">
                                <div class="mobile-slide-content dark-slide flex flex-col justify-between min-h-[500px]">
                                    <div class="text-center w-full max-w-4xl dark-slide-content">
                                        <h3 class="slide-title text-white">[Your Slide Title Here]</h3>
                                        <p class="slide-text mb-4">[Your main content text goes here. This is where you describe the topic or concept.]</p>
                                        <div class="dark-slide-highlight p-4 rounded-lg inline-block">
                                            <div class="text-sm">[Your highlight or key point here]</div>
                                        </div>
                                    </div>

                                    <!-- SLIDE NAVIGATION PANEL -->
                                    <div class="slide-navigation-panel">
                                        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6">
                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Slide Navigation</h3>
                                            <div class="flex flex-wrap gap-4 justify-center">
                                                <button onclick="carousel2Prev()" class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 dark:bg-gray-500 dark:hover:bg-gray-600 text-white rounded-lg transition-colors">
                                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                                                    Previous Slide
                                                </button>
                                                <button onclick="carousel2Next()" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white rounded-lg transition-colors">
                                                    Next Slide
                                                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Slide 15: [Your Title Here] -->
                            <div class="carousel-item active">
                                <div class="mobile-slide-content dark-slide flex flex-col justify-between min-h-[500px]">
                                    <div class="text-center w-full max-w-4xl dark-slide-content">
                                        <h3 class="slide-title text-white">[Your Slide Title Here]</h3>
                                        <p class="slide-text mb-4">[Your main content text goes here. This is where you describe the topic or concept.]</p>
                                        <div class="dark-slide-highlight p-4 rounded-lg inline-block">
                                            <div class="text-sm">[Your highlight or key point here]</div>
                                        </div>
                                    </div>

                                    <!-- SLIDE NAVIGATION PANEL -->
                                    <div class="slide-navigation-panel">
                                        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6">
                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Slide Navigation</h3>
                                            <div class="flex flex-wrap gap-4 justify-center">
                                                <button onclick="carousel2Prev()" class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 dark:bg-gray-500 dark:hover:bg-gray-600 text-white rounded-lg transition-colors">
                                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                                                    Previous Slide
                                                </button>
                                                <button onclick="carousel2Next()" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white rounded-lg transition-colors">
                                                    Next Slide
                                                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 16: [Your Title Here] -->
                            <div class="carousel-item">
                                <div class="mobile-slide-content dark-slide flex flex-col justify-between min-h-[500px]">
                                    <div class="text-center w-full max-w-4xl dark-slide-content">
                                        <h3 class="slide-title text-white">[Your Slide Title Here]</h3>
                                        <p class="slide-text mb-4">[Your main content text goes here. This is where you describe the topic or concept.]</p>
                                        <div class="dark-slide-highlight p-4 rounded-lg inline-block">
                                            <div class="text-sm">[Your highlight or key point here]</div>
                                        </div>
                                    </div>

                                    <!-- SLIDE NAVIGATION PANEL -->
                                    <div class="slide-navigation-panel">
                                        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6">
                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Slide Navigation</h3>
                                            <div class="flex flex-wrap gap-4 justify-center">
                                                <button onclick="carousel2Prev()" class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 dark:bg-gray-500 dark:hover:bg-gray-600 text-white rounded-lg transition-colors">
                                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                                                    Previous Slide
                                                </button>
                                                <button onclick="carousel2Next()" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white rounded-lg transition-colors">
                                                    Next Slide
                                                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
            <!-- Carousel Controls (Inside) -->
            <button class="carousel-control prev" onclick="carousel2Prev()">
                <svg class="w-4 h-4 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <button class="carousel-control next" onclick="carousel2Next()">
                <svg class="w-4 h-4 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>

        <!-- BOTTOM SECTION: Numbered Navigation -->
        <div class="slide-numbers mt-4" id="slideNumbers2Bottom">
            <!-- Number buttons will be generated by JavaScript -->
        </div>

        <!-- BOTTOM SECTION: Previous/Next Buttons -->
        <div class="mt-4 flex flex-wrap justify-center gap-2">
            <button class="px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white rounded-lg transition-colors text-sm font-medium" onclick="carousel2Prev()">
                ← Previous Slide
            </button>
            <button class="px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white rounded-lg transition-colors text-sm font-medium" onclick="carousel2Next()">
                Next Slide →
            </button>
        </div>
    </div>
                    <br><br><br>


                {{-- ============================================================================
                   <!-- ==================== COPYABLE CSS ==================== -->
                  ============================================================================ --}}




                <details class="mb-8">
                    <summary class="cursor-pointer bg-blue-600 text-white p-4 rounded-lg font-semibold text-lg">
                        📋 Click to Copy Carousel CSS
                    </summary>
                    <div class="bg-gray-900 rounded-lg p-4 mt-2">
        <pre class="text-green-400 text-sm overflow-x-auto"><code>&lt;style&gt;
/* Enhanced carousel styles for mobile */
.carousel {
    position: relative;
    width: 100%;
    overflow: hidden;
    border-radius: 12px;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
}

.carousel-inner {
    display: flex;
    transition: transform 0.6s ease-in-out;
    touch-action: pan-y pinch-zoom;
    width: 100%;
}

.carousel-item {
    min-width: 100%;
    flex-shrink: 0;
    transition: opacity 0.6s ease;
    width: 100%;
    box-sizing: border-box;
}

.carousel-control {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(0, 0, 0, 0.5);
    color: white;
    border: none;
    padding: 12px;
    cursor: pointer;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    z-index: 10;
}

@media (min-width: 768px) {
    .carousel-control {
        width: 50px;
        height: 50px;
    }
}

.carousel-control:hover {
    background: rgba(0, 0, 0, 0.8);
    transform: translateY(-50%) scale(1.1);
}

.carousel-control.prev {
    left: 10px;
}

.carousel-control.next {
    right: 10px;
}

@media (min-width: 768px) {
    .carousel-control.prev {
        left: 20px;
    }
    .carousel-control.next {
        right: 20px;
    }
}

/* Numbered slide navigation */
.slide-numbers {
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
    justify-content: center;
    margin-top: 1rem;
    max-width: 100%;
}

.slide-number-btn {
    width: 32px;
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 2px solid #3b82f6;
    background: white;
    color: #3b82f6;
    border-radius: 6px;
    cursor: pointer;
    transition: all 0.3s ease;
    font-size: 0.75rem;
    font-weight: 600;
    flex-shrink: 0;
}

.slide-number-btn:hover {
    background: #3b82f6;
    color: white;
    transform: scale(1.1);
}

.slide-number-btn.active {
    background: #3b82f6;
    color: white;
    transform: scale(1.1);
}

.dark .slide-number-btn {
    background: #374151;
    color: #60a5fa;
    border-color: #60a5fa;
}

.dark .slide-number-btn:hover,
.dark .slide-number-btn.active {
    background: #60a5fa;
    color: #1f2937;
}

/* Mobile optimizations */
.mobile-slide-content {
    padding: 1rem;
    min-height: 300px;
    overflow-y: auto;
    width: 100%;
    box-sizing: border-box;
}

@media (min-width: 768px) {
    .mobile-slide-content {
        padding: 2rem;
        min-height: 400px;
    }
}

.slide-title {
    font-size: 1.25rem;
    font-weight: bold;
    margin-bottom: 1rem;
    text-align: center;
}

@media (min-width: 768px) {
    .slide-title {
        font-size: 1.5rem;
    }
}

.slide-text {
    font-size: 0.875rem;
    line-height: 1.5;
}

@media (min-width: 768px) {
    .slide-text {
        font-size: 1rem;
    }
}

/* Uniform dark slide styling */
.dark-slide {
    background: #1f2937 !important;
    color: #f9fafb !important;
}

.dark-slide-content {
    color: #e5e7eb !important;
}

.dark-slide-highlight {
    background: #374151 !important;
    color: #d1d5db !important;
    border: 1px solid #4b5563 !important;
}

/* Ensure proper carousel item sizing */
.carousel-item > div {
    width: 100%;
    height: 100%;
}

/* Navigation panel styling */
.slide-navigation-panel {
    margin-top: 2rem;
    padding-top: 1rem;
    border-top: 1px solid #e5e7eb;
}

.dark .slide-navigation-panel {
    border-top: 1px solid #4b5563;
}
&lt;/style&gt;</code></pre>
                        <button onclick="copyCss()" class="mt-2 bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded text-sm">
                            📋 Copy CSS to Clipboard
                        </button>
                    </div>
                </details>

                <!-- ==================== COPYABLE JAVASCRIPT ==================== -->
                <details class="mb-8">
                    <summary class="cursor-pointer bg-green-600 text-white p-4 rounded-lg font-semibold text-lg">
                        📋 Click to Copy Carousel JavaScript
                    </summary>
                    <div class="bg-gray-900 rounded-lg p-4 mt-2">
        <pre class="text-green-400 text-sm overflow-x-auto"><code>&lt;script&gt;
// Carousel State Management
let currentSlide = 0;
const totalSlides = 16;

// Initialize carousel when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    initializeCarousel();
    setupTouchEvents();
});

// Carousel Functions
function initializeCarousel() {
    console.log("✅ Carousel initialized with", totalSlides, "slides");
    generateNumberedButtons();
    updateCarousel();
}

function generateNumberedButtons() {
    const numbersContainer = document.getElementById('slideNumbers');
    if (!numbersContainer) return;

    numbersContainer.innerHTML = '';

    for (let i = 0; i < totalSlides; i++) {
        const btn = document.createElement('button');
        btn.className = `slide-number-btn ${i === currentSlide ? 'active' : ''}`;
        btn.textContent = i + 1;
        btn.onclick = () => goToSlide(i);
        numbersContainer.appendChild(btn);
    }
}

function updateCarousel() {
    const inner = document.querySelector('.carousel-inner');
    const numberButtons = document.querySelectorAll('.slide-number-btn');

    // Update slide position
    inner.style.transform = `translateX(-${currentSlide * 100}%)`;

    // Update active states
    document.querySelectorAll('.carousel-item').forEach((item, index) => {
        item.classList.toggle('active', index === currentSlide);
    });

    numberButtons.forEach((button, index) => {
        button.classList.toggle('active', index === currentSlide);
    });

    console.log(`Carousel moved to slide: ${currentSlide + 1}`);
}

function carouselPrev() {
    currentSlide = currentSlide === 0 ? totalSlides - 1 : currentSlide - 1;
    updateCarousel();
}

function carouselNext() {
    currentSlide = currentSlide === totalSlides - 1 ? 0 : currentSlide + 1;
    updateCarousel();
}

function goToSlide(slideIndex) {
    if (slideIndex >= 0 && slideIndex < totalSlides) {
        currentSlide = slideIndex;
        updateCarousel();
    }
}

// Touch events for mobile swiping
function setupTouchEvents() {
    const carousel = document.querySelector('.carousel-inner');
    let startX = 0;
    let currentX = 0;
    let isDragging = false;

    carousel.addEventListener('touchstart', (e) => {
        startX = e.touches[0].clientX;
        isDragging = true;
    });

    carousel.addEventListener('touchmove', (e) => {
        if (!isDragging) return;
        currentX = e.touches[0].clientX;
    });

    carousel.addEventListener('touchend', () => {
        if (!isDragging) return;
        const diff = startX - currentX;
        const threshold = 50;

        if (Math.abs(diff) > threshold) {
            if (diff > 0) {
                carouselNext();
            } else {
                carouselPrev();
            }
        }
        isDragging = false;
    });
}

// FOR MULTIPLE CAROUSELS:
// 1. Create separate state variables for each carousel
// 2. Use unique function names (carousel1Prev, carousel2Prev, etc.)
// 3. Update HTML onclick attributes to match
// 4. Use different IDs for numbered navigation containers
&lt;/script&gt;</code></pre>
                        <button onclick="copyJs()" class="mt-2 bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded text-sm">
                            📋 Copy JavaScript to Clipboard
                        </button>
                    </div>
                </details>

                <script>
                    function copyCss() {
                        const cssCode = `/* Enhanced carousel styles for mobile */
.carousel {
    position: relative;
    width: 100%;
    overflow: hidden;
    border-radius: 12px;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
}

.carousel-inner {
    display: flex;
    transition: transform 0.6s ease-in-out;
    touch-action: pan-y pinch-zoom;
    width: 100%;
}

.carousel-item {
    min-width: 100%;
    flex-shrink: 0;
    transition: opacity 0.6s ease;
    width: 100%;
    box-sizing: border-box;
}

.carousel-control {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(0, 0, 0, 0.5);
    color: white;
    border: none;
    padding: 12px;
    cursor: pointer;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    z-index: 10;
}

@media (min-width: 768px) {
    .carousel-control {
        width: 50px;
        height: 50px;
    }
}

.carousel-control:hover {
    background: rgba(0, 0, 0, 0.8);
    transform: translateY(-50%) scale(1.1);
}

.carousel-control.prev {
    left: 10px;
}

.carousel-control.next {
    right: 10px;
}

@media (min-width: 768px) {
    .carousel-control.prev {
        left: 20px;
    }
    .carousel-control.next {
        right: 20px;
    }
}

/* Numbered slide navigation */
.slide-numbers {
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
    justify-content: center;
    margin-top: 1rem;
    max-width: 100%;
}

.slide-number-btn {
    width: 32px;
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 2px solid #3b82f6;
    background: white;
    color: #3b82f6;
    border-radius: 6px;
    cursor: pointer;
    transition: all 0.3s ease;
    font-size: 0.75rem;
    font-weight: 600;
    flex-shrink: 0;
}

.slide-number-btn:hover {
    background: #3b82f6;
    color: white;
    transform: scale(1.1);
}

.slide-number-btn.active {
    background: #3b82f6;
    color: white;
    transform: scale(1.1);
}

.dark .slide-number-btn {
    background: #374151;
    color: #60a5fa;
    border-color: #60a5fa;
}

.dark .slide-number-btn:hover,
.dark .slide-number-btn.active {
    background: #60a5fa;
    color: #1f2937;
}

/* Mobile optimizations */
.mobile-slide-content {
    padding: 1rem;
    min-height: 300px;
    overflow-y: auto;
    width: 100%;
    box-sizing: border-box;
}

@media (min-width: 768px) {
    .mobile-slide-content {
        padding: 2rem;
        min-height: 400px;
    }
}

.slide-title {
    font-size: 1.25rem;
    font-weight: bold;
    margin-bottom: 1rem;
    text-align: center;
}

@media (min-width: 768px) {
    .slide-title {
        font-size: 1.5rem;
    }
}

.slide-text {
    font-size: 0.875rem;
    line-height: 1.5;
}

@media (min-width: 768px) {
    .slide-text {
        font-size: 1rem;
    }
}

/* Uniform dark slide styling */
.dark-slide {
    background: #1f2937 !important;
    color: #f9fafb !important;
}

.dark-slide-content {
    color: #e5e7eb !important;
}

.dark-slide-highlight {
    background: #374151 !important;
    color: #d1d5db !important;
    border: 1px solid #4b5563 !important;
}

/* Ensure proper carousel item sizing */
.carousel-item > div {
    width: 100%;
    height: 100%;
}

/* Navigation panel styling */
.slide-navigation-panel {
    margin-top: 2rem;
    padding-top: 1rem;
    border-top: 1px solid #e5e7eb;
}

.dark .slide-navigation-panel {
    border-top: 1px solid #4b5563;
}`;

                        navigator.clipboard.writeText(cssCode).then(() => {
                            alert('✅ CSS copied to clipboard!');
                        });
                    }

                    function copyJs() {
                        const jsCode = `// Carousel State Management
let currentSlide = 0;
const totalSlides = 16;

// Initialize carousel when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    initializeCarousel();
    setupTouchEvents();
});

// Carousel Functions
function initializeCarousel() {
    console.log("✅ Carousel initialized with", totalSlides, "slides");
    generateNumberedButtons();
    updateCarousel();
}

function generateNumberedButtons() {
    const numbersContainer = document.getElementById('slideNumbers');
    if (!numbersContainer) return;

    numbersContainer.innerHTML = '';

    for (let i = 0; i < totalSlides; i++) {
        const btn = document.createElement('button');
        btn.className = \\`slide-number-btn \\${i === currentSlide ? 'active' : ''}\\`;
        btn.textContent = i + 1;
        btn.onclick = () => goToSlide(i);
        numbersContainer.appendChild(btn);
    }
}

function updateCarousel() {
    const inner = document.querySelector('.carousel-inner');
    const numberButtons = document.querySelectorAll('.slide-number-btn');

    // Update slide position
    inner.style.transform = \\`translateX(-\\${currentSlide * 100}%)\\`;

    // Update active states
    document.querySelectorAll('.carousel-item').forEach((item, index) => {
        item.classList.toggle('active', index === currentSlide);
    });

    numberButtons.forEach((button, index) => {
        button.classList.toggle('active', index === currentSlide);
    });

    console.log(\\`Carousel moved to slide: \\${currentSlide + 1}\\`);
}

function carouselPrev() {
    currentSlide = currentSlide === 0 ? totalSlides - 1 : currentSlide - 1;
    updateCarousel();
}

function carouselNext() {
    currentSlide = currentSlide === totalSlides - 1 ? 0 : currentSlide + 1;
    updateCarousel();
}

function goToSlide(slideIndex) {
    if (slideIndex >= 0 && slideIndex < totalSlides) {
        currentSlide = slideIndex;
        updateCarousel();
    }
}

// Touch events for mobile swiping
function setupTouchEvents() {
    const carousel = document.querySelector('.carousel-inner');
    let startX = 0;
    let currentX = 0;
    let isDragging = false;

    carousel.addEventListener('touchstart', (e) => {
        startX = e.touches[0].clientX;
        isDragging = true;
    });

    carousel.addEventListener('touchmove', (e) => {
        if (!isDragging) return;
        currentX = e.touches[0].clientX;
    });

    carousel.addEventListener('touchend', () => {
        if (!isDragging) return;
        const diff = startX - currentX;
        const threshold = 50;

        if (Math.abs(diff) > threshold) {
            if (diff > 0) {
                carouselNext();
            } else {
                carouselPrev();
            }
        }
        isDragging = false;
    });
}

// FOR MULTIPLE CAROUSELS:
// 1. Create separate state variables for each carousel
// 2. Use unique function names (carousel1Prev, carousel2Prev, etc.)
// 3. Update HTML onclick attributes to match
// 4. Use different IDs for numbered navigation containers`;

                        navigator.clipboard.writeText(jsCode).then(() => {
                            alert('✅ JavaScript copied to clipboard!');
                        });
                    }
                </script>


                    <br><br><br>

                    <!-- ==================== CAROUSEL CONFIGURATION NOTES ==================== -->
                    <section class="mb-12">
                        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">Carousel Configuration</h2>

                        <div class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Changing Number of Slides</h3>

                            <div class="bg-gray-900 rounded-lg p-4 overflow-x-auto mb-6">
            <pre class="text-green-400 text-sm"><code>// To change the number of slides, update the totalSlides variable:
let currentSlide = 0;
const totalSlides = 10;  // ← Change this number to desired slide count

// For multiple carousels, update each one separately:
let currentSlide1 = 0;
const totalSlides1 = 10;  // ← Carousel 1 slide count

let currentSlide2 = 0;
const totalSlides2 = 8;   // ← Carousel 2 slide count

let currentSlide3 = 0;
const totalSlides3 = 12;  // ← Carousel 3 slide count</code></pre>
                            </div>

                            <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-4">
                                <h4 class="font-semibold text-blue-900 dark:text-blue-300 mb-2">Important Notes:</h4>
                                <ul class="text-sm text-blue-800 dark:text-blue-200 space-y-2">
                                    <li>• Make sure HTML slide count matches the <code>totalSlides</code> value</li>
                                    <li>• Numbered navigation buttons are generated automatically</li>
                                    <li>• Remove extra HTML slides if reducing slide count</li>
                                    <li>• Add more HTML slides if increasing slide count</li>
                                    <li>• Each carousel maintains its own independent state</li>
                                </ul>
                            </div>
                        </div>
                    </section>
                    <br><br><br>

    {{-- ============================================================================
     CSS SCOPING TECHNIQUE - PREVENTING STYLE CONFLICTS
     ============================================================================

     ADD THIS SECTION TO THE BOTTOM OF YOUR style-guide.blade.php FILE

     This technique prevents page-specific styles from conflicting with
     global styles, framework components, and other pages.
     ============================================================================ --}}

                <div class="container mx-auto px-4 py-12">

                    {{-- SECTION HEADER --}}
                    <div class="border-t-4 border-blue-600 dark:border-blue-400 pt-8 mb-8">
                        <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">
                            <i class="fas fa-shield-alt text-blue-600 dark:text-blue-400 mr-3"></i>
                            CSS Scoping Technique
                        </h1>
                        <p class="text-xl text-gray-600 dark:text-gray-300">
                            Isolate page-specific styles to prevent conflicts with global styles, headers, menus, and framework components
                        </p>
                    </div>

                    {{-- QUICK REFERENCE CARD --}}
                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-gray-800 dark:to-gray-700 rounded-lg p-6 mb-8 border-l-4 border-blue-600">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4 flex items-center">
                            <i class="fas fa-bolt text-yellow-500 mr-2"></i>
                            Quick Reference: The 3-Step Pattern
                        </h2>

                        <div class="grid md:grid-cols-3 gap-4">
                            {{-- Step 1 --}}
                            <div class="bg-white dark:bg-gray-800 rounded-lg p-4 shadow">
                                <div class="text-3xl font-bold text-blue-600 dark:text-blue-400 mb-2">1️⃣</div>
                                <h3 class="font-bold text-gray-900 dark:text-white mb-2">Choose Scope</h3>
                                <code class="text-sm bg-gray-100 dark:bg-gray-900 px-2 py-1 rounded">
                                    .{page-name}-page-content
                                </code>
                            </div>

                            {{-- Step 2 --}}
                            <div class="bg-white dark:bg-gray-800 rounded-lg p-4 shadow">
                                <div class="text-3xl font-bold text-blue-600 dark:text-blue-400 mb-2">2️⃣</div>
                                <h3 class="font-bold text-gray-900 dark:text-white mb-2">Prefix CSS</h3>
                                <code class="text-sm bg-gray-100 dark:bg-gray-900 px-2 py-1 rounded">
                                    .scope .selector { }
                                </code>
                            </div>

                            {{-- Step 3 --}}
                            <div class="bg-white dark:bg-gray-800 rounded-lg p-4 shadow">
                                <div class="text-3xl font-bold text-blue-600 dark:text-blue-400 mb-2">3️⃣</div>
                                <h3 class="font-bold text-gray-900 dark:text-white mb-2">Wrap HTML</h3>
                                <code class="text-sm bg-gray-100 dark:bg-gray-900 px-2 py-1 rounded">
                                    &lt;div class="scope"&gt;
                                </code>
                            </div>
                        </div>
                    </div>

                    {{-- THE PROBLEM --}}
                    <div class="mb-8">
                        <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4 flex items-center">
                            <i class="fas fa-exclamation-triangle text-red-500 mr-3"></i>
                            The Problem
                        </h2>

                        <div class="bg-red-50 dark:bg-red-900/20 border-l-4 border-red-500 p-6 rounded-r-lg mb-4">
                            <h3 class="font-bold text-red-900 dark:text-red-300 mb-3">
                                Page-specific styles conflict with global styles
                            </h3>
                            <ul class="space-y-2 text-gray-700 dark:text-gray-300">
                                <li class="flex items-start">
                                    <i class="fas fa-times-circle text-red-500 mr-2 mt-1"></i>
                                    <span>Custom <code>.btn</code> styles break header menu buttons</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-times-circle text-red-500 mr-2 mt-1"></i>
                                    <span>Carousel styles affect other pages with carousels</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-times-circle text-red-500 mr-2 mt-1"></i>
                                    <span>Dark mode styles conflict with framework components</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-times-circle text-red-500 mr-2 mt-1"></i>
                                    <span>Dropdown menus stop working due to CSS conflicts</span>
                                </li>
                            </ul>
                        </div>

                        {{-- Wrong Example --}}
                        <div class="bg-white dark:bg-gray-800 rounded-lg p-6 border border-red-300 dark:border-red-700 mb-4">
                            <div class="flex items-center mb-3">
                                <i class="fas fa-times-circle text-red-500 text-2xl mr-3"></i>
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white">Wrong: Global Styles</h3>
                            </div>

                            <pre class="bg-gray-50 dark:bg-gray-900 p-4 rounded-lg overflow-x-auto text-sm"><code>&lt;style&gt;
    /* ❌ These affect EVERYTHING on the site */
    .carousel { ... }
    .btn { ... }
    .slide-number-btn { ... }
&lt;/style&gt;

&lt;div class="carousel"&gt;
    &lt;!-- Your carousel --&gt;
&lt;/div&gt;

&lt;button class="btn"&gt;Click Me&lt;/button&gt;</code></pre>

                            <div class="bg-red-100 dark:bg-red-900/30 p-3 rounded mt-3">
                                <p class="text-red-800 dark:text-red-300 font-semibold">
                                    <i class="fas fa-bomb mr-2"></i>
                                    Result: Header buttons broken, menu dropdowns don't work, styles leak everywhere!
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- THE SOLUTION --}}
                    <div class="mb-8">
                        <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4 flex items-center">
                            <i class="fas fa-check-circle text-green-500 mr-3"></i>
                            The Solution: CSS Namespace Scoping
                        </h2>

                        <div class="bg-green-50 dark:bg-green-900/20 border-l-4 border-green-500 p-6 rounded-r-lg mb-4">
                            <h3 class="font-bold text-green-900 dark:text-green-300 mb-3">
                                Isolate page styles with a scoping wrapper
                            </h3>
                            <p class="text-gray-700 dark:text-gray-300 mb-3">
                                Wrap your page in a unique container and prefix all CSS selectors with that container class.
                                This increases CSS specificity and isolates your styles.
                            </p>
                        </div>

                        {{-- Correct Example --}}
                        <div class="bg-white dark:bg-gray-800 rounded-lg p-6 border border-green-300 dark:border-green-700">
                            <div class="flex items-center mb-3">
                                <i class="fas fa-check-circle text-green-500 text-2xl mr-3"></i>
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white">Correct: Scoped Styles</h3>
                            </div>

                            <pre class="bg-gray-50 dark:bg-gray-900 p-4 rounded-lg overflow-x-auto text-sm"><code>&lt;style&gt;
    /* ✅ Scoped to this page only */
    .my-page-content .carousel { ... }
    .my-page-content .btn { ... }
    .my-page-content .slide-number-btn { ... }

    /* Dark mode scoping */
    .dark .my-page-content .btn { ... }

    /* Responsive scoping */
    @media (max-width: 768px) {
        .my-page-content .carousel { ... }
    }

    /* Exclude framework components */
    .my-page-content .btn:not(flux\\:button) { ... }
&lt;/style&gt;

&lt;!-- ✅ CRITICAL: Wrapper div with scoping class --&gt;
&lt;div class="my-page-content"&gt;

    &lt;div class="carousel"&gt;
        &lt;!-- Your carousel --&gt;
    &lt;/div&gt;

    &lt;button class="btn"&gt;Click Me&lt;/button&gt;

&lt;!-- ✅ CRITICAL: Close wrapper at the end --&gt;
&lt;/div&gt;</code></pre>

                            <div class="bg-green-100 dark:bg-green-900/30 p-3 rounded mt-3">
                                <p class="text-green-800 dark:text-green-300 font-semibold">
                                    <i class="fas fa-check-double mr-2"></i>
                                    Result: Page styles isolated, header works, menu functions, no conflicts! ✅
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- WHY IT WORKS --}}
                    <div class="mb-8">
                        <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4 flex items-center">
                            <i class="fas fa-lightbulb text-yellow-500 mr-3"></i>
                            Why It Works: CSS Specificity
                        </h2>

                        <div class="grid md:grid-cols-2 gap-6">
                            {{-- Specificity Table --}}
                            <div class="bg-white dark:bg-gray-800 rounded-lg p-6 shadow">
                                <h3 class="font-bold text-gray-900 dark:text-white mb-4">CSS Specificity Hierarchy</h3>
                                <table class="w-full text-sm">
                                    <thead class="bg-gray-100 dark:bg-gray-700">
                                    <tr>
                                        <th class="p-2 text-left text-gray-900 dark:text-white">Selector</th>
                                        <th class="p-2 text-left text-gray-900 dark:text-white">Specificity</th>
                                        <th class="p-2 text-left text-gray-900 dark:text-white">Winner</th>
                                    </tr>
                                    </thead>
                                    <tbody class="text-gray-700 dark:text-gray-300">
                                    <tr class="border-b dark:border-gray-700">
                                        <td class="p-2"><code>.btn</code></td>
                                        <td class="p-2">0,0,1,0</td>
                                        <td class="p-2 text-red-500">❌ Lost</td>
                                    </tr>
                                    <tr>
                                        <td class="p-2"><code>.scope .btn</code></td>
                                        <td class="p-2">0,0,2,0</td>
                                        <td class="p-2 text-green-500">✅ Wins!</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <p class="mt-3 text-sm text-gray-600 dark:text-gray-400 italic">
                                    Higher specificity = your styles win without !important
                                </p>
                            </div>

                            {{-- Visual Diagram --}}
                            <div class="bg-white dark:bg-gray-800 rounded-lg p-6 shadow">
                                <h3 class="font-bold text-gray-900 dark:text-white mb-4">Visual Scope Isolation</h3>
                                <pre class="text-xs text-gray-700 dark:text-gray-300"><code>┌─────────────────────────────────┐
│ Global Scope (Entire Site)     │
│                                 │
│  &lt;header&gt; uses .btn            │ ← Not affected
│  &lt;nav&gt; uses .carousel          │ ← Not affected
│                                 │
│  ┌───────────────────────────┐ │
│  │ .my-page-content          │ │ ← Isolated
│  │                           │ │
│  │  .carousel ✅ Custom      │ │
│  │  .btn ✅ Custom           │ │
│  │                           │ │
│  └───────────────────────────┘ │
│                                 │
│  &lt;footer&gt; uses .btn            │ ← Not affected
└─────────────────────────────────┘</code></pre>
                            </div>
                        </div>
                    </div>

                    {{-- STEP-BY-STEP IMPLEMENTATION --}}
                    <div class="mb-8">
                        <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4 flex items-center">
                            <i class="fas fa-list-ol text-blue-600 dark:text-blue-400 mr-3"></i>
                            Step-by-Step Implementation
                        </h2>

                        {{-- Step 1 --}}
                        <div class="bg-white dark:bg-gray-800 rounded-lg p-6 mb-4 shadow">
                            <div class="flex items-center mb-3">
                                <div class="bg-blue-600 text-white rounded-full w-8 h-8 flex items-center justify-center font-bold mr-3">1</div>
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white">Choose Your Scoping Class</h3>
                            </div>

                            <p class="text-gray-700 dark:text-gray-300 mb-3">
                                Use a descriptive, page-specific class name following this pattern:
                            </p>

                            <div class="bg-blue-50 dark:bg-blue-900/20 p-4 rounded">
                                <code class="text-lg font-mono text-blue-900 dark:text-blue-300">
                                    .{page-name}-page-content
                                </code>
                            </div>

                            <div class="mt-3 space-y-2">
                                <p class="text-sm text-gray-600 dark:text-gray-400"><strong>Examples:</strong></p>
                                <ul class="text-sm space-y-1 text-gray-700 dark:text-gray-300">
                                    <li><code>.pmway-page-content</code> for the-pmway.blade.php</li>
                                    <li><code>.checkout-page-content</code> for checkout.blade.php</li>
                                    <li><code>.dashboard-page-content</code> for dashboard.blade.php</li>
                                </ul>
                            </div>
                        </div>

                        {{-- Step 2 --}}
                        <div class="bg-white dark:bg-gray-800 rounded-lg p-6 mb-4 shadow">
                            <div class="flex items-center mb-3">
                                <div class="bg-blue-600 text-white rounded-full w-8 h-8 flex items-center justify-center font-bold mr-3">2</div>
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white">Prefix ALL CSS Selectors</h3>
                            </div>

                            <p class="text-gray-700 dark:text-gray-300 mb-3">
                                Add your scoping class before EVERY selector in your page styles:
                            </p>

                            <div class="grid md:grid-cols-2 gap-4">
                                <div>
                                    <p class="text-sm font-semibold text-red-600 dark:text-red-400 mb-2">❌ Before:</p>
                                    <pre class="bg-gray-50 dark:bg-gray-900 p-3 rounded text-sm"><code>.carousel { }
.btn { }
.btn:hover { }
.slide-number-btn { }</code></pre>
                                </div>

                                <div>
                                    <p class="text-sm font-semibold text-green-600 dark:text-green-400 mb-2">✅ After:</p>
                                    <pre class="bg-gray-50 dark:bg-gray-900 p-3 rounded text-sm"><code>.my-page-content .carousel { }
.my-page-content .btn { }
.my-page-content .btn:hover { }
.my-page-content .slide-number-btn { }</code></pre>
                                </div>
                            </div>

                            <div class="mt-4 bg-yellow-50 dark:bg-yellow-900/20 border-l-4 border-yellow-500 p-3">
                                <p class="text-sm font-semibold text-yellow-900 dark:text-yellow-300">
                                    <i class="fas fa-exclamation-triangle mr-2"></i>
                                    Important: Include pseudo-classes, media queries, and dark mode selectors!
                                </p>
                            </div>
                        </div>

                        {{-- Step 3 --}}
                        <div class="bg-white dark:bg-gray-800 rounded-lg p-6 mb-4 shadow">
                            <div class="flex items-center mb-3">
                                <div class="bg-blue-600 text-white rounded-full w-8 h-8 flex items-center justify-center font-bold mr-3">3</div>
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white">Wrap ALL Page Content</h3>
                            </div>

                            <p class="text-gray-700 dark:text-gray-300 mb-3">
                                Wrap your entire page content in a div with your scoping class:
                            </p>

                            <pre class="bg-gray-50 dark:bg-gray-900 p-4 rounded overflow-x-auto text-sm"><code>&lt;style&gt;
    .my-page-content .carousel { }
    .my-page-content .btn { }
&lt;/style&gt;

&lt;!-- ✅ CRITICAL: Opening wrapper --&gt;
&lt;div class="my-page-content"&gt;

    &lt;div class="container"&gt;
        &lt;!-- ALL your page content --&gt;
        &lt;div class="carousel"&gt;...&lt;/div&gt;
        &lt;button class="btn"&gt;...&lt;/button&gt;
    &lt;/div&gt;

&lt;!-- ✅ CRITICAL: Closing wrapper --&gt;
&lt;/div&gt;</code></pre>

                            <div class="mt-4 bg-red-50 dark:bg-red-900/20 border-l-4 border-red-500 p-3">
                                <p class="text-sm font-semibold text-red-900 dark:text-red-300">
                                    <i class="fas fa-bomb mr-2"></i>
                                    Don't forget to close the wrapper! Without it, your styles won't work.
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- EXCLUDING FRAMEWORK COMPONENTS --}}
                    <div class="mb-8">
                        <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4 flex items-center">
                            <i class="fas fa-filter text-purple-600 dark:text-purple-400 mr-3"></i>
                            Excluding Framework Components
                        </h2>

                        <div class="bg-purple-50 dark:bg-purple-900/20 border-l-4 border-purple-500 p-6 rounded-r-lg mb-4">
                            <p class="text-gray-700 dark:text-gray-300">
                                Sometimes you need to style <code>.btn</code> but NOT affect Flux UI buttons or Livewire components.
                                Use CSS <code>:not()</code> pseudo-class to exclude them:
                            </p>
                        </div>

                        <div class="space-y-4">
                            {{-- Flux UI Example --}}
                            <div class="bg-white dark:bg-gray-800 rounded-lg p-4">
                                <h4 class="font-bold text-gray-900 dark:text-white mb-2">Excluding Flux UI Buttons:</h4>
                                <pre class="bg-gray-50 dark:bg-gray-900 p-3 rounded text-sm"><code>/* Affects custom buttons but NOT Flux buttons */
.my-page-content .btn:not(flux\\:button),
.my-page-content .btn-primary:not(flux\\:button) {
    background: transparent !important;
    border: 2px solid blue;
}</code></pre>
                            </div>

                            {{-- Livewire Example --}}
                            <div class="bg-white dark:bg-gray-800 rounded-lg p-4">
                                <h4 class="font-bold text-gray-900 dark:text-white mb-2">Excluding Livewire Components:</h4>
                                <pre class="bg-gray-50 dark:bg-gray-900 p-3 rounded text-sm"><code>/* Affects buttons but NOT Livewire wire:loading buttons */
.my-page-content button:not([wire\\:loading]),
.my-page-content div:not([wire\\:poll]) {
    /* Custom styles */
}</code></pre>
                            </div>

                            {{-- Multiple Exclusions --}}
                            <div class="bg-white dark:bg-gray-800 rounded-lg p-4">
                                <h4 class="font-bold text-gray-900 dark:text-white mb-2">Multiple Exclusions:</h4>
                                <pre class="bg-gray-50 dark:bg-gray-900 p-3 rounded text-sm"><code>/* Exclude multiple framework components */
.my-page-content .btn:not(flux\\:button):not([wire\\:click]):not(.dropdown-toggle) {
    /* Your custom button styles */
}</code></pre>
                            </div>
                        </div>
                    </div>

                    {{-- COMPLETE TEMPLATE --}}
                    <div class="mb-8">
                        <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4 flex items-center">
                            <i class="fas fa-file-code text-indigo-600 dark:text-indigo-400 mr-3"></i>
                            Complete Template
                        </h2>

                        <div class="bg-white dark:bg-gray-800 rounded-lg p-6 shadow">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="font-bold text-gray-900 dark:text-white">Copy-Paste Template</h3>
                                <button onclick="copyTemplate()" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded text-sm">
                                    <i class="fas fa-copy mr-2"></i>Copy Template
                                </button>
                            </div>

                            <pre id="scopingTemplate" class="bg-gray-50 dark:bg-gray-900 p-4 rounded overflow-x-auto text-sm"><code>&lt;!-- FILE: my-page.blade.php --&gt;

&lt;style&gt;
    /* =================================
       SCOPED STYLES FOR THIS PAGE ONLY
       Replace {PAGE} with your page name
       ================================= --&gt;

    /* Basic scoping */
    .{PAGE}-page-content .carousel { }
    .{PAGE}-page-content .btn { }
    .{PAGE}-page-content .custom-component { }

    /* Pseudo-classes */
    .{PAGE}-page-content .btn:hover { }
    .{PAGE}-page-content .btn:active { }

    /* Exclude framework components */
    .{PAGE}-page-content .btn:not(flux\\:button) { }

    /* Dark mode */
    .dark .{PAGE}-page-content .carousel { }
    .dark .{PAGE}-page-content .btn { }

    /* Responsive */
    @media (max-width: 768px) {
        .{PAGE}-page-content .carousel { }
    }
&lt;/style&gt;

&lt;!-- ✅ CRITICAL: Opening wrapper div --&gt;
&lt;div class="{PAGE}-page-content"&gt;

    &lt;!-- ALL YOUR PAGE CONTENT GOES HERE --&gt;
    &lt;div class="container"&gt;
        &lt;div class="carousel"&gt;
            &lt;!-- Carousel content --&gt;
        &lt;/div&gt;

        &lt;button class="btn"&gt;Click Me&lt;/button&gt;

        &lt;div class="custom-component"&gt;
            &lt;!-- Component content --&gt;
        &lt;/div&gt;
    &lt;/div&gt;

&lt;!-- ✅ CRITICAL: Closing wrapper div --&gt;
&lt;/div&gt;

&lt;script&gt;
    // JavaScript can also scope to this container
    const carousel = document.querySelector('.{PAGE}-page-content .carousel');
    const buttons = document.querySelectorAll('.{PAGE}-page-content .btn');
&lt;/script&gt;</code></pre>
                        </div>
                    </div>

                    {{-- DEBUGGING CHECKLIST --}}
                    <div class="mb-8">
                        <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4 flex items-center">
                            <i class="fas fa-bug text-red-600 dark:text-red-400 mr-3"></i>
                            Debugging Checklist
                        </h2>

                        <div class="bg-white dark:bg-gray-800 rounded-lg p-6 shadow">
                            <p class="text-gray-700 dark:text-gray-300 mb-4">
                                When styles aren't working, check these items:
                            </p>

                            <div class="space-y-3">
                                <label class="flex items-start p-3 bg-gray-50 dark:bg-gray-900 rounded cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
                                    <input type="checkbox" class="mt-1 mr-3">
                                    <span class="text-gray-700 dark:text-gray-300">
                        <strong>Wrapper div exists?</strong> Check that <code>&lt;div class="my-page-content"&gt;</code> is present
                    </span>
                                </label>

                                <label class="flex items-start p-3 bg-gray-50 dark:bg-gray-900 rounded cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
                                    <input type="checkbox" class="mt-1 mr-3">
                                    <span class="text-gray-700 dark:text-gray-300">
                        <strong>All selectors prefixed?</strong> Every CSS selector should start with <code>.my-page-content</code>
                    </span>
                                </label>

                                <label class="flex items-start p-3 bg-gray-50 dark:bg-gray-900 rounded cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
                                    <input type="checkbox" class="mt-1 mr-3">
                                    <span class="text-gray-700 dark:text-gray-300">
                        <strong>Wrapper properly closed?</strong> Check for closing <code>&lt;/div&gt;</code> at the end of content
                    </span>
                                </label>

                                <label class="flex items-start p-3 bg-gray-50 dark:bg-gray-900 rounded cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
                                    <input type="checkbox" class="mt-1 mr-3">
                                    <span class="text-gray-700 dark:text-gray-300">
                        <strong>Class name consistent?</strong> Spelling must match exactly (case-sensitive!)
                    </span>
                                </label>

                                <label class="flex items-start p-3 bg-gray-50 dark:bg-gray-900 rounded cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
                                    <input type="checkbox" class="mt-1 mr-3">
                                    <span class="text-gray-700 dark:text-gray-300">
                        <strong>Check browser DevTools:</strong> Run <code>document.querySelector('.my-page-content')</code> in console
                    </span>
                                </label>

                                <label class="flex items-start p-3 bg-gray-50 dark:bg-gray-900 rounded cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
                                    <input type="checkbox" class="mt-1 mr-3">
                                    <span class="text-gray-700 dark:text-gray-300">
                        <strong>No global overrides?</strong> Check for conflicting <code>!important</code> rules
                    </span>
                                </label>
                            </div>

                            <div class="mt-4 p-4 bg-blue-50 dark:bg-blue-900/20 rounded">
                                <h4 class="font-bold text-blue-900 dark:text-blue-300 mb-2">
                                    <i class="fas fa-terminal mr-2"></i>Browser Console Test
                                </h4>
                                <pre class="text-sm text-gray-700 dark:text-gray-300"><code>// Run in browser console to verify:
document.querySelector('.my-page-content');        // Should return element
document.querySelector('.my-page-content .carousel'); // Should find carousel</code></pre>
                            </div>
                        </div>
                    </div>

                    {{-- COMMON MISTAKES --}}
                    <div class="mb-8">
                        <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4 flex items-center">
                            <i class="fas fa-times-circle text-red-600 dark:text-red-400 mr-3"></i>
                            Common Mistakes
                        </h2>

                        <div class="space-y-4">
                            {{-- Mistake 1 --}}
                            <div class="bg-red-50 dark:bg-red-900/20 border-l-4 border-red-500 p-4 rounded-r-lg">
                                <h4 class="font-bold text-red-900 dark:text-red-300 mb-2">
                                    ❌ Mistake #1: Forgot the wrapper div
                                </h4>
                                <pre class="bg-white dark:bg-gray-900 p-3 rounded text-sm mb-2"><code>&lt;style&gt;.page-scope .btn { ... }&lt;/style&gt;
&lt;button class="btn"&gt;Won't work!&lt;/button&gt;</code></pre>
                                <p class="text-sm text-red-800 dark:text-red-300">
                                    <strong>Fix:</strong> Add <code>&lt;div class="page-scope"&gt;</code> wrapper
                                </p>
                            </div>

                            {{-- Mistake 2 --}}
                            <div class="bg-red-50 dark:bg-red-900/20 border-l-4 border-red-500 p-4 rounded-r-lg">
                                <h4 class="font-bold text-red-900 dark:text-red-300 mb-2">
                                    ❌ Mistake #2: Didn't prefix ALL selectors
                                </h4>
                                <pre class="bg-white dark:bg-gray-900 p-3 rounded text-sm mb-2"><code>.page-scope .carousel { }
.btn { }  /* ← Missing scope! */
.btn:hover { }  /* ← Missing scope! */</code></pre>
                                <p class="text-sm text-red-800 dark:text-red-300">
                                    <strong>Fix:</strong> Prefix EVERY selector including pseudo-classes
                                </p>
                            </div>

                            {{-- Mistake 3 --}}
                            <div class="bg-red-50 dark:bg-red-900/20 border-l-4 border-red-500 p-4 rounded-r-lg">
                                <h4 class="font-bold text-red-900 dark:text-red-300 mb-2">
                                    ❌ Mistake #3: Inconsistent class names
                                </h4>
                                <pre class="bg-white dark:bg-gray-900 p-3 rounded text-sm mb-2"><code>&lt;style&gt;.my-page-content .btn { ... }&lt;/style&gt;
&lt;div class="my-Page-content"&gt;  &lt;!-- ← Capital P! --&gt;</code></pre>
                                <p class="text-sm text-red-800 dark:text-red-300">
                                    <strong>Fix:</strong> Class names are case-sensitive - must match exactly
                                </p>
                            </div>

                            {{-- Mistake 4 --}}
                            <div class="bg-red-50 dark:bg-red-900/20 border-l-4 border-red-500 p-4 rounded-r-lg">
                                <h4 class="font-bold text-red-900 dark:text-red-300 mb-2">
                                    ❌ Mistake #4: Forgot to close wrapper
                                </h4>
                                <pre class="bg-white dark:bg-gray-900 p-3 rounded text-sm mb-2"><code>&lt;div class="page-scope"&gt;
    &lt;div class="carousel"&gt;...&lt;/div&gt;
&lt;!-- Missing closing &lt;/div&gt; for page-scope! --&gt;</code></pre>
                                <p class="text-sm text-red-800 dark:text-red-300">
                                    <strong>Fix:</strong> Add closing <code>&lt;/div&gt;</code> at the very end of page content
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- REAL-WORLD EXAMPLE --}}
                    <div class="mb-8">
                        <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4 flex items-center">
                            <i class="fas fa-code text-green-600 dark:text-green-400 mr-3"></i>
                            Real-World Example: PMWay Page Fix
                        </h2>

                        <div class="bg-gradient-to-r from-green-50 to-blue-50 dark:from-gray-800 dark:to-gray-700 rounded-lg p-6 border-l-4 border-green-500">
                            <h3 class="font-bold text-gray-900 dark:text-white mb-3">
                                <i class="fas fa-history mr-2"></i>The Problem
                            </h3>
                            <p class="text-gray-700 dark:text-gray-300 mb-3">
                                The PMWay page had custom carousel styles that broke the header menu dropdowns.
                                Button styles made the menu buttons invisible. Dark mode didn't work properly.
                            </p>

                            <h3 class="font-bold text-gray-900 dark:text-white mb-3 mt-4">
                                <i class="fas fa-wrench mr-2"></i>The Solution
                            </h3>
                            <ul class="space-y-2 text-gray-700 dark:text-gray-300 mb-3">
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mr-2 mt-1"></i>
                                    <span>Created scoping class: <code>.pmway-page-content</code></span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mr-2 mt-1"></i>
                                    <span>Prefixed all 50+ selectors with <code>.pmway-page-content</code></span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mr-2 mt-1"></i>
                                    <span>Wrapped entire page in <code>&lt;div class="pmway-page-content"&gt;</code></span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mr-2 mt-1"></i>
                                    <span>Excluded Flux buttons: <code>.btn:not(flux\\:button)</code></span>
                                </li>
                            </ul>

                            <div class="bg-white dark:bg-gray-800 rounded p-3 border-l-4 border-green-500">
                                <p class="text-green-800 dark:text-green-300 font-bold">
                                    <i class="fas fa-trophy mr-2"></i>
                                    Result: Page styles isolated ✅ Header menu works ✅ Carousel functions ✅ No conflicts! 🎉
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- AI PROMPT TEMPLATE --}}
                    <div class="mb-8">
                        <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4 flex items-center">
                            <i class="fas fa-robot text-purple-600 dark:text-purple-400 mr-3"></i>
                            AI Assistant Prompt Template
                        </h2>

                        <div class="bg-white dark:bg-gray-800 rounded-lg p-6 shadow">
                            <p class="text-gray-700 dark:text-gray-300 mb-4">
                                Use this prompt when asking an AI to implement CSS scoping:
                            </p>

                            <div class="bg-purple-50 dark:bg-purple-900/20 p-4 rounded border-l-4 border-purple-500">
                <pre class="text-sm text-gray-800 dark:text-gray-200 whitespace-pre-wrap"><code>I have a page with custom styles that are conflicting with global styles.

Please implement CSS Namespace Scoping:

1. Create a scoping class called '.{page-name}-page-content'
2. Prefix ALL my CSS selectors with this class (including pseudo-classes, media queries, and dark mode)
3. Wrap my entire page content in &lt;div class='{page-name}-page-content'&gt;
4. Exclude framework components (Flux/Livewire) from scoping using :not() pseudo-class
5. Ensure the wrapper div is properly closed at the end

Here's my code:
[paste your code here]</code></pre>
                            </div>

                            <button onclick="copyAIPrompt()" class="mt-3 bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded text-sm">
                                <i class="fas fa-copy mr-2"></i>Copy AI Prompt
                            </button>
                        </div>
                    </div>

                    {{-- WHEN NOT TO USE --}}
                    <div class="mb-8">
                        <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4 flex items-center">
                            <i class="fas fa-ban text-orange-600 dark:text-orange-400 mr-3"></i>
                            When NOT to Use This Technique
                        </h2>

                        <div class="grid md:grid-cols-2 gap-4">
                            <div class="bg-orange-50 dark:bg-orange-900/20 border-l-4 border-orange-500 p-4 rounded-r-lg">
                                <h4 class="font-bold text-orange-900 dark:text-orange-300 mb-2">Don't Scope:</h4>
                                <ul class="space-y-2 text-sm text-gray-700 dark:text-gray-300">
                                    <li class="flex items-start">
                                        <i class="fas fa-times text-orange-500 mr-2 mt-1"></i>
                                        <span><strong>Global utility classes</strong> - Keep utilities like <code>.text-center</code> global</span>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="fas fa-times text-orange-500 mr-2 mt-1"></i>
                                        <span><strong>Shared components</strong> - Use component-scoped CSS instead</span>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="fas fa-times text-orange-500 mr-2 mt-1"></i>
                                        <span><strong>CSS frameworks</strong> - Don't scope Bootstrap/Tailwind base classes</span>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="fas fa-times text-orange-500 mr-2 mt-1"></i>
                                        <span><strong>Tiny pages</strong> - If &lt;20 lines of CSS, scoping may be overkill</span>
                                    </li>
                                </ul>
                            </div>

                            <div class="bg-green-50 dark:bg-green-900/20 border-l-4 border-green-500 p-4 rounded-r-lg">
                                <h4 class="font-bold text-green-900 dark:text-green-300 mb-2">Do Scope:</h4>
                                <ul class="space-y-2 text-sm text-gray-700 dark:text-gray-300">
                                    <li class="flex items-start">
                                        <i class="fas fa-check text-green-500 mr-2 mt-1"></i>
                                        <span><strong>Page-specific styles</strong> - Custom carousels, buttons, layouts</span>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="fas fa-check text-green-500 mr-2 mt-1"></i>
                                        <span><strong>Complex pages</strong> - Pages with 50+ lines of custom CSS</span>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="fas fa-check text-green-500 mr-2 mt-1"></i>
                                        <span><strong>Conflicting styles</strong> - When page styles break header/menu/footer</span>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="fas fa-check text-green-500 mr-2 mt-1"></i>
                                        <span><strong>One-off designs</strong> - Special landing pages, marketing pages</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    {{-- SUMMARY CARD --}}
                    <div class="bg-gradient-to-br from-blue-600 to-indigo-700 text-white rounded-lg p-8 shadow-xl">
                        <h2 class="text-3xl font-bold mb-4 flex items-center">
                            <i class="fas fa-graduation-cap mr-3"></i>
                            Summary: The CSS Scoping Pattern
                        </h2>

                        <div class="grid md:grid-cols-3 gap-6 mb-6">
                            <div class="bg-white/10 backdrop-blur rounded-lg p-4">
                                <div class="text-4xl font-bold mb-2">1</div>
                                <h3 class="font-bold mb-1">SCOPE</h3>
                                <p class="text-sm opacity-90">.{page}-page-content</p>
                            </div>

                            <div class="bg-white/10 backdrop-blur rounded-lg p-4">
                                <div class="text-4xl font-bold mb-2">2</div>
                                <h3 class="font-bold mb-1">PREFIX</h3>
                                <p class="text-sm opacity-90">.scope .selector { }</p>
                            </div>

                            <div class="bg-white/10 backdrop-blur rounded-lg p-4">
                                <div class="text-4xl font-bold mb-2">3</div>
                                <h3 class="font-bold mb-1">WRAP</h3>
                                <p class="text-sm opacity-90">&lt;div class="scope"&gt;</p>
                            </div>
                        </div>

                        <div class="bg-white/20 backdrop-blur rounded-lg p-4">
                            <h3 class="font-bold mb-2 text-lg">Key Benefits:</h3>
                            <ul class="grid md:grid-cols-2 gap-2 text-sm">
                                <li class="flex items-center">
                                    <i class="fas fa-shield-check mr-2"></i>Prevents style conflicts
                                </li>
                                <li class="flex items-center">
                                    <i class="fas fa-layer-group mr-2"></i>Better than !important
                                </li>
                                <li class="flex items-center">
                                    <i class="fas fa-lock mr-2"></i>Isolates page styles
                                </li>
                                <li class="flex items-center">
                                    <i class="fas fa-tachometer-alt mr-2"></i>No performance impact
                                </li>
                                <li class="flex items-center">
                                    <i class="fas fa-puzzle-piece mr-2"></i>Works with all frameworks
                                </li>
                                <li class="flex items-center">
                                    <i class="fas fa-code mr-2"></i>Maintainable code
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>

                {{-- JAVASCRIPT FOR COPY BUTTONS --}}
                <script>
                    function copyTemplate() {
                        const template = document.getElementById('scopingTemplate').innerText;
                        navigator.clipboard.writeText(template).then(() => {
                            alert('✅ Template copied to clipboard!');
                        });
                    }

                    function copyAIPrompt() {
                        const prompt = `I have a page with custom styles that are conflicting with global styles.

Please implement CSS Namespace Scoping:

1. Create a scoping class called '.{page-name}-page-content'
2. Prefix ALL my CSS selectors with this class (including pseudo-classes, media queries, and dark mode)
3. Wrap my entire page content in <div class='{page-name}-page-content'>
4. Exclude framework components (Flux/Livewire) from scoping using :not() pseudo-class
5. Ensure the wrapper div is properly closed at the end

Here's my code:
[paste your code here]`;

                        navigator.clipboard.writeText(prompt).then(() => {
                            alert('✅ AI Prompt copied to clipboard!');
                        });
                    }
                </script>

                {{-- END OF CSS SCOPING SECTION --}}





            </div>

            <script>
                // Carousel 2 State - Separate from Carousel 1
                let currentSlide2 = 0;
                const totalSlides2 = 16;

                // Initialize Carousel 2 when DOM is loaded
                document.addEventListener('DOMContentLoaded', function() {
                    initializeCarousel2();
                    setupTouchEvents2();
                });

                // Carousel 2 Functions
                function initializeCarousel2() {
                    console.log("✅ Carousel 2 initialized");
                    generateNumberedButtons2();
                    updateCarousel2();
                }

                function generateNumberedButtons2() {
                    const topNumbersContainer = document.getElementById('slideNumbers2Top');
                    const bottomNumbersContainer = document.getElementById('slideNumbers2Bottom');

                    topNumbersContainer.innerHTML = '';
                    bottomNumbersContainer.innerHTML = '';

                    for (let i = 0; i < totalSlides2; i++) {
                        const btnTop = document.createElement('button');
                        btnTop.className = `slide-number-btn ${i === currentSlide2 ? 'active' : ''}`;
                        btnTop.textContent = i + 1;
                        btnTop.onclick = () => goToSlide2(i);
                        topNumbersContainer.appendChild(btnTop);

                        const btnBottom = document.createElement('button');
                        btnBottom.className = `slide-number-btn ${i === currentSlide2 ? 'active' : ''}`;
                        btnBottom.textContent = i + 1;
                        btnBottom.onclick = () => goToSlide2(i);
                        bottomNumbersContainer.appendChild(btnBottom);
                    }
                }

                function updateCarousel2() {
                    const inner = document.querySelector('#carousel2 .carousel-inner');
                    const topNumberButtons = document.querySelectorAll('#slideNumbers2Top .slide-number-btn');
                    const bottomNumberButtons = document.querySelectorAll('#slideNumbers2Bottom .slide-number-btn');

                    // Update slide position
                    inner.style.transform = `translateX(-${currentSlide2 * 100}%)`;

                    // Update active states for slides
                    document.querySelectorAll('#carousel2 .carousel-item').forEach((item, index) => {
                        item.classList.toggle('active', index === currentSlide2);
                    });

                    // Update numbered buttons
                    topNumberButtons.forEach((button, index) => {
                        button.classList.toggle('active', index === currentSlide2);
                    });

                    bottomNumberButtons.forEach((button, index) => {
                        button.classList.toggle('active', index === currentSlide2);
                    });

                    console.log(`Carousel 2 moved to slide: ${currentSlide2 + 1}`);
                }

                function carousel2Prev() {
                    currentSlide2 = currentSlide2 === 0 ? totalSlides2 - 1 : currentSlide2 - 1;
                    updateCarousel2();
                }

                function carousel2Next() {
                    currentSlide2 = currentSlide2 === totalSlides2 - 1 ? 0 : currentSlide2 + 1;
                    updateCarousel2();
                }

                function goToSlide2(slideIndex) {
                    if (slideIndex >= 0 && slideIndex < totalSlides2) {
                        currentSlide2 = slideIndex;
                        updateCarousel2();
                    }
                }

                // Touch events for Carousel 2 only
                function setupTouchEvents2() {
                    const carousel2 = document.querySelector('#carousel2 .carousel-inner');
                    let startX = 0;
                    let currentX = 0;
                    let isDragging = false;

                    carousel2.addEventListener('touchstart', (e) => {
                        startX = e.touches[0].clientX;
                        isDragging = true;
                    });

                    carousel2.addEventListener('touchmove', (e) => {
                        if (!isDragging) return;
                        currentX = e.touches[0].clientX;
                    });

                    carousel2.addEventListener('touchend', () => {
                        if (!isDragging) return;
                        const diff = startX - currentX;
                        const threshold = 50;

                        if (Math.abs(diff) > threshold) {
                            if (diff > 0) {
                                carousel2Next();
                            } else {
                                carousel2Prev();
                            }
                        }
                        isDragging = false;
                    });
                }
            </script>

            <!-- Draggable Elements Section -->
            <div class="container mx-auto px-4 py-8">
                <h2 class="text-2xl font-bold mb-4 text-gray-800 dark:text-white text-center">Interactive Elements</h2>

                <div class="flex flex-col md:flex-row gap-4 mb-8 items-center justify-center">
                    <!-- Draggable Pin -->
                    <div id="pinsmall" class="draggable-element bg-red-500 hover:bg-red-600 text-white">
                        Drag Me
                    </div>

                    <!-- Droppable Target -->
                    <div id="target" class="droppable-target border-gray-400 dark:border-gray-600 text-gray-600 dark:text-gray-400 bg-gray-50 dark:bg-gray-800">
                        Drop Here
                    </div>
                </div>

                <!-- Additional draggable elements -->
                <div class="flex flex-wrap gap-4 justify-center">
                    <div id="pintwo" class="draggable-element bg-blue-500 hover:bg-blue-600 text-white">
                        Pin Two
                    </div>
                    <div id="pinthree" class="draggable-element bg-green-500 hover:bg-green-600 text-white">
                        Pin Three
                    </div>
                    <div id="steps" class="draggable-element bg-purple-500 hover:bg-purple-600 text-white">
                        Steps
                    </div>
                </div>
            </div>
        </div>

        <script>
            // Carousel state
            let currentSlide = 0;
            const totalSlides = 16;

            // Initialize when DOM is loaded
            document.addEventListener('DOMContentLoaded', function() {
                initializeCarousel();
                initializeDraggable();
                setupTouchEvents();

                // Check URL for slide parameter
                const urlParams = new URLSearchParams(window.location.search);
                const slideParam = urlParams.get('slide');
                if (slideParam && !isNaN(slideParam) && slideParam >= 1 && slideParam <= totalSlides) {
                    goToSlide(parseInt(slideParam) - 1);
                }
            });

            // Carousel Functions
            function initializeCarousel() {
                console.log("✅ Custom carousel initialized with", totalSlides, "slides");
                generateNumberedButtons();
                updateCarousel();
            }

            function generateNumberedButtons() {
                const numbersContainer = document.getElementById('slideNumbers');
                numbersContainer.innerHTML = '';

                for (let i = 0; i < totalSlides; i++) {
                    const btn = document.createElement('button');
                    btn.className = `slide-number-btn ${i === currentSlide ? 'active' : ''}`;
                    btn.textContent = i + 1;
                    btn.onclick = () => goToSlide(i);
                    numbersContainer.appendChild(btn);
                }
            }

            function updateCarousel() {
                const inner = document.querySelector('.carousel-inner');
                const numberButtons = document.querySelectorAll('.slide-number-btn');

                // Update slide position - now properly moves one slide at a time
                inner.style.transform = `translateX(-${currentSlide * 100}%)`;

                // Update active states
                document.querySelectorAll('.carousel-item').forEach((item, index) => {
                    item.classList.toggle('active', index === currentSlide);
                });

                numberButtons.forEach((button, index) => {
                    button.classList.toggle('active', index === currentSlide);
                });

                console.log(`Carousel moved to slide: ${currentSlide + 1}`);
            }

            function carouselPrev() {
                currentSlide = currentSlide === 0 ? totalSlides - 1 : currentSlide - 1;
                updateCarousel();
            }

            function carouselNext() {
                currentSlide = currentSlide === totalSlides - 1 ? 0 : currentSlide + 1;
                updateCarousel();
            }

            function goToSlide(slideIndex) {
                if (slideIndex >= 0 && slideIndex < totalSlides) {
                    currentSlide = slideIndex;
                    updateCarousel();
                }
            }

            // Touch events for mobile swiping
            function setupTouchEvents() {
                const carousel = document.querySelector('.carousel-inner');
                let startX = 0;
                let currentX = 0;
                let isDragging = false;

                carousel.addEventListener('touchstart', (e) => {
                    startX = e.touches[0].clientX;
                    isDragging = true;
                });

                carousel.addEventListener('touchmove', (e) => {
                    if (!isDragging) return;
                    currentX = e.touches[0].clientX;
                });

                carousel.addEventListener('touchend', () => {
                    if (!isDragging) return;
                    const diff = startX - currentX;
                    const threshold = 50; // Minimum swipe distance

                    if (Math.abs(diff) > threshold) {
                        if (diff > 0) {
                            carouselNext(); // Swipe left
                        } else {
                            carouselPrev(); // Swipe right
                        }
                    }
                    isDragging = false;
                });
            }

            // Draggable Functions
            function initializeDraggable() {
                if (typeof jQuery !== 'undefined' && typeof jQuery.fn.draggable !== 'undefined') {
                    console.log("✅ jQuery UI draggable is available");

                    // Make elements draggable
                    $("#pinsmall, #pintwo, #pinthree, #steps").draggable({
                        revert: "invalid",
                        start: function(event, ui) {
                            console.log("Drag started:", $(this).attr("id"));
                            $(this).addClass('opacity-75');
                        },
                        drag: function(event, ui) {
                            console.log("Dragging:", $(this).attr("id"));
                        },
                        stop: function(event, ui) {
                            console.log("Drag stopped:", $(this).attr("id"));
                            $(this).removeClass('opacity-75');
                        }
                    });

                    // Make target droppable
                    $("#target").droppable({
                        accept: "#pinsmall, #pintwo, #pinthree, #steps",
                        tolerance: 'touch',
                        over: function(event, ui) {
                            console.log("Element over target");
                            $(this).removeClass('border-gray-400 dark:border-gray-600').addClass('highlight');
                            $(this).text('Drop Now!');
                        },
                        out: function(event, ui) {
                            console.log("Element left target");
                            $(this).removeClass('highlight').addClass('border-gray-400 dark:border-gray-600');
                            $(this).text('Drop Here');
                        },
                        drop: function(event, ui) {
                            console.log("Element dropped on target");
                            $(this).removeClass('border-gray-400 dark:border-gray-600').addClass('highlight');
                            $(this).text('Success!');

                            setTimeout(() => {
                                $(this).removeClass('highlight').addClass('border-gray-400 dark:border-gray-600');
                                $(this).text('Drop Here');
                            }, 2000);

                            alert("Awesome! Now move the pin out of the way and click the target underneath to see the processes you have mastered! Remember Deming's advice: Work on the process, not the outcome of the process!");
                        }
                    });
                } else {
                    console.log("❌ jQuery UI draggable not available");
                }
            }
        </script>

        <style>
            /* Scoped styles for style guide page */
            .style-guide-page-content .slide-number-btn {
                width: 36px;
                height: 36px;
                display: flex;
                align-items: center;
                justify-content: center;
                border: 2px solid #3b82f6;
                background: white;
                color: #3b82f6;
                border-radius: 6px;
                cursor: pointer;
                transition: all 0.3s ease;
                font-size: 0.75rem;
                font-weight: 600;
                flex-shrink: 0;
            }

            .style-guide-page-content .slide-number-btn:hover {
                background: #3b82f6;
                color: white;
                transform: scale(1.1);
            }

            .style-guide-page-content .slide-number-btn.active {
                background: #3b82f6;
                color: white;
                transform: scale(1.1);
            }

            /* Dark mode adjustments */
            .dark .style-guide-page-content .slide-number-btn {
                background: #374151;
                color: #60a5fa;
                border-color: #60a5fa;
            }

            .dark .style-guide-page-content .slide-number-btn:hover,
            .dark .style-guide-page-content .slide-number-btn.active {
                background: #60a5fa;
                color: #1f2937;
            }

            /* Ensure proper background colors in dark mode */
            .dark .style-guide-page-content {
                background-color: #27272a; /* zinc-800 */
            }

            .dark .style-guide-page-content .bg-gray-900 {
                background-color: #111827 !important;
            }

            .dark .style-guide-page-content .bg-gray-800 {
                background-color: #1f2937 !important;
            }

            .dark .style-guide-page-content .bg-gray-700 {
                background-color: #374151 !important;
            }

            /* Text colors for proper contrast */
            .dark .style-guide-page-content .text-gray-300 {
                color: #d1d5db !important;
            }

            .dark .style-guide-page-content .text-gray-400 {
                color: #9ca3af !important;
            }

            .dark .style-guide-page-content .text-gray-500 {
                color: #6b7280 !important;
            }
        </style>
    </div>
</div>
</div>

<script>
    // Theme toggle and initialization
    document.addEventListener('DOMContentLoaded', function() {
        const themeToggle = document.getElementById('themeToggle');
        const sunIcon = document.getElementById('sunIcon');
        const moonIcon = document.getElementById('moonIcon');
        
        // Check for saved theme or prefer-color-scheme
        const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
        const savedTheme = localStorage.getItem('theme');
        
        if (savedTheme === 'dark' || (!savedTheme && prefersDark)) {
            document.documentElement.classList.add('dark');
            sunIcon.classList.remove('hidden');
            moonIcon.classList.add('hidden');
        } else {
            document.documentElement.classList.remove('dark');
            sunIcon.classList.add('hidden');
            moonIcon.classList.remove('hidden');
        }
        
        // Toggle theme
        themeToggle.addEventListener('click', function() {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
                sunIcon.classList.add('hidden');
                moonIcon.classList.remove('hidden');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
                sunIcon.classList.remove('hidden');
                moonIcon.classList.add('hidden');
            }
        });

        // Initialize interactive features
        setupTouchEvents();
        initializeDraggable();
    });
</script>