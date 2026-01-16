{{-- resources/views/livewire/style-guide.blade.php --}}
<div class="style-guide-page-content">
    <div class="max-w-7xl mx-auto px-4 py-8">
        <!-- Theme Toggle - Fixed Position -->
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
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Body Text - Small</h4>
                    <div class="mb-4 p-4 bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700">
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-3">
                            This is small text for supplementary information, captions, or metadata. Use sparingly for less important content.
                        </p>
                    </div>
                    <div class="bg-gray-900 rounded-lg p-4 overflow-x-auto">
                        <pre class="text-green-400 text-sm"><code>&lt;p class="text-sm text-gray-600 dark:text-gray-400 mt-3"&gt;
    Your supplementary text here.
&lt;/p&gt;</code></pre>
                    </div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-3">
                        Use for captions, helper text, and metadata.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Buttons Section --}}
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">Button Styles</h2>
        
        <div class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6 mb-6">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Standard Buttons</h3>
            <p class="text-lg text-gray-700 dark:text-gray-300 mb-4">
                Use these standardized button styles for consistent user interactions. Each button type serves a specific purpose.
            </p>

            <div class="space-y-6">
                {{-- Primary Button --}}
                <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Primary Button</h4>
                    <div class="mb-4 p-4 bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700 flex gap-4">
                        <button class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition-colors">
                            Primary Action
                        </button>
                        <button class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition-colors" disabled>
                            Disabled
                        </button>
                    </div>
                    <div class="bg-gray-900 rounded-lg p-4 overflow-x-auto">
                        <pre class="text-green-400 text-sm"><code>&lt;button class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition-colors"&gt;
    Primary Action
&lt;/button&gt;</code></pre>
                    </div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-3">
                        Use for primary actions like submit, save, or continue. Maximum one per screen section.
                    </p>
                </div>

                {{-- Secondary Button --}}
                <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Secondary Button</h4>
                    <div class="mb-4 p-4 bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700 flex gap-4">
                        <button class="px-6 py-3 bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-white font-semibold rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors">
                            Secondary Action
                        </button>
                        <button class="px-6 py-3 bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-white font-semibold rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors" disabled>
                            Disabled
                        </button>
                    </div>
                    <div class="bg-gray-900 rounded-lg p-4 overflow-x-auto">
                        <pre class="text-green-400 text-sm"><code>&lt;button class="px-6 py-3 bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-white font-semibold rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors"&gt;
    Secondary Action
&lt;/button&gt;</code></pre>
                    </div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-3">
                        Use for secondary actions like cancel, back, or alternative options.
                    </p>
                </div>

                {{-- Outline Button --}}
                <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Outline Button</h4>
                    <div class="mb-4 p-4 bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700 flex gap-4">
                        <button class="px-6 py-3 border-2 border-blue-600 text-blue-600 dark:text-blue-400 font-semibold rounded-lg hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-colors">
                            Outline Action
                        </button>
                        <button class="px-6 py-3 border-2 border-blue-600 text-blue-600 dark:text-blue-400 font-semibold rounded-lg hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-colors" disabled>
                            Disabled
                        </button>
                    </div>
                    <div class="bg-gray-900 rounded-lg p-4 overflow-x-auto">
                        <pre class="text-green-400 text-sm"><code>&lt;button class="px-6 py-3 border-2 border-blue-600 text-blue-600 dark:text-blue-400 font-semibold rounded-lg hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-colors"&gt;
    Outline Action
&lt;/button&gt;</code></pre>
                    </div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-3">
                        Use for tertiary actions or when you need a lighter visual weight.
                    </p>
                </div>

                {{-- Danger Button --}}
                <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Danger Button</h4>
                    <div class="mb-4 p-4 bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700 flex gap-4">
                        <button class="px-6 py-3 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 transition-colors">
                            Delete
                        </button>
                        <button class="px-6 py-3 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 transition-colors" disabled>
                            Disabled
                        </button>
                    </div>
                    <div class="bg-gray-900 rounded-lg p-4 overflow-x-auto">
                        <pre class="text-green-400 text-sm"><code>&lt;button class="px-6 py-3 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 transition-colors"&gt;
    Delete
&lt;/button&gt;</code></pre>
                    </div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-3">
                        Use for destructive actions like delete or remove. Always confirm before action.
                    </p>
                </div>

                {{-- Icon Button --}}
                <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Icon Button</h4>
                    <div class="mb-4 p-4 bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700 flex gap-4">
                        <button class="p-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                        </button>
                        <button class="p-3 bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-white rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="bg-gray-900 rounded-lg p-4 overflow-x-auto">
                        <pre class="text-green-400 text-sm"><code>&lt;button class="p-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors"&gt;
    &lt;svg class="w-5 h-5" ...&gt;...&lt;/svg&gt;
&lt;/button&gt;</code></pre>
                    </div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-3">
                        Use for actions that are clear from the icon alone. Ensure accessibility with aria-labels.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Form Elements Section --}}
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">Form Elements</h2>
        
        <div class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6 mb-6">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Standard Form Inputs</h3>
            <p class="text-lg text-gray-700 dark:text-gray-300 mb-4">
                Consistent form elements for data entry and user input. All elements support validation states and dark mode.
            </p>

            <div class="space-y-6">
                {{-- Text Input --}}
                <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Text Input</h4>
                    <div class="mb-4 p-4 bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            Input Label
                        </label>
                        <input type="text" placeholder="Enter text..." class="w-full px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Helper text goes here</p>
                    </div>
                    <div class="bg-gray-900 rounded-lg p-4 overflow-x-auto">
                        <pre class="text-green-400 text-sm"><code>&lt;label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2"&gt;
    Input Label
&lt;/label&gt;
&lt;input type="text" class="w-full px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"&gt;</code></pre>
                    </div>
                </div>

                {{-- Textarea --}}
                <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Textarea</h4>
                    <div class="mb-4 p-4 bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            Textarea Label
                        </label>
                        <textarea rows="4" placeholder="Enter longer text..." class="w-full px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none"></textarea>
                    </div>
                    <div class="bg-gray-900 rounded-lg p-4 overflow-x-auto">
                        <pre class="text-green-400 text-sm"><code>&lt;textarea class="w-full px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none"&gt;&lt;/textarea&gt;</code></pre>
                    </div>
                </div>

                {{-- Select Dropdown --}}
                <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Select Dropdown</h4>
                    <div class="mb-4 p-4 bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            Select Option
                        </label>
                        <select class="w-full px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option>Option 1</option>
                            <option>Option 2</option>
                            <option>Option 3</option>
                        </select>
                    </div>
                    <div class="bg-gray-900 rounded-lg p-4 overflow-x-auto">
                        <pre class="text-green-400 text-sm"><code>&lt;select class="w-full px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"&gt;
    &lt;option&gt;Option 1&lt;/option&gt;
&lt;/select&gt;</code></pre>
                    </div>
                </div>

                {{-- Checkbox --}}
                <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Checkbox</h4>
                    <div class="mb-4 p-4 bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700">
                        <div class="flex items-center">
                            <input type="checkbox" id="checkbox1" class="w-4 h-4 text-blue-600 bg-white dark:bg-gray-800 border-gray-300 dark:border-gray-600 rounded focus:ring-blue-500 focus:ring-2">
                            <label for="checkbox1" class="ml-2 text-sm text-gray-700 dark:text-gray-300">
                                I agree to the terms and conditions
                            </label>
                        </div>
                    </div>
                    <div class="bg-gray-900 rounded-lg p-4 overflow-x-auto">
                        <pre class="text-green-400 text-sm"><code>&lt;div class="flex items-center"&gt;
    &lt;input type="checkbox" class="w-4 h-4 text-blue-600 bg-white dark:bg-gray-800 border-gray-300 dark:border-gray-600 rounded focus:ring-blue-500 focus:ring-2"&gt;
    &lt;label class="ml-2 text-sm text-gray-700 dark:text-gray-300"&gt;Label&lt;/label&gt;
&lt;/div&gt;</code></pre>
                    </div>
                </div>

                {{-- Radio Buttons --}}
                <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Radio Buttons</h4>
                    <div class="mb-4 p-4 bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700 space-y-2">
                        <div class="flex items-center">
                            <input type="radio" name="radio" id="radio1" class="w-4 h-4 text-blue-600 bg-white dark:bg-gray-800 border-gray-300 dark:border-gray-600 focus:ring-blue-500 focus:ring-2">
                            <label for="radio1" class="ml-2 text-sm text-gray-700 dark:text-gray-300">
                                Option 1
                            </label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" name="radio" id="radio2" class="w-4 h-4 text-blue-600 bg-white dark:bg-gray-800 border-gray-300 dark:border-gray-600 focus:ring-blue-500 focus:ring-2">
                            <label for="radio2" class="ml-2 text-sm text-gray-700 dark:text-gray-300">
                                Option 2
                            </label>
                        </div>
                    </div>
                    <div class="bg-gray-900 rounded-lg p-4 overflow-x-auto">
                        <pre class="text-green-400 text-sm"><code>&lt;div class="flex items-center"&gt;
    &lt;input type="radio" class="w-4 h-4 text-blue-600 bg-white dark:bg-gray-800 border-gray-300 dark:border-gray-600 focus:ring-blue-500 focus:ring-2"&gt;
    &lt;label class="ml-2 text-sm text-gray-700 dark:text-gray-300"&gt;Option&lt;/label&gt;
&lt;/div&gt;</code></pre>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Alert/Notification Section --}}
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">Alerts & Notifications</h2>
        
        <div class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6 mb-6">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Alert Styles</h3>
            <p class="text-lg text-gray-700 dark:text-gray-300 mb-4">
                Use these alert styles to communicate different types of messages to users.
            </p>

            <div class="space-y-6">
                {{-- Success Alert --}}
                <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Success Alert</h4>
                    <div class="mb-4 p-4 bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700">
                        <div class="bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-lg p-4">
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-green-600 dark:text-green-400 mr-3 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <div>
                                    <h5 class="text-sm font-semibold text-green-900 dark:text-green-300">Success!</h5>
                                    <p class="text-sm text-green-800 dark:text-green-200 mt-1">Your changes have been saved successfully.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-900 rounded-lg p-4 overflow-x-auto">
                        <pre class="text-green-400 text-sm"><code>&lt;div class="bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-lg p-4"&gt;
    &lt;div class="flex items-start"&gt;
        &lt;svg class="w-5 h-5 text-green-600 dark:text-green-400 mr-3"&gt;...&lt;/svg&gt;
        &lt;div&gt;
            &lt;h5 class="text-sm font-semibold text-green-900 dark:text-green-300"&gt;Success!&lt;/h5&gt;
            &lt;p class="text-sm text-green-800 dark:text-green-200"&gt;Message&lt;/p&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;</code></pre>
                    </div>
                </div>

                {{-- Info Alert --}}
                <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Info Alert</h4>
                    <div class="mb-4 p-4 bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700">
                        <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-4">
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-blue-600 dark:text-blue-400 mr-3 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <div>
                                    <h5 class="text-sm font-semibold text-blue-900 dark:text-blue-300">Information</h5>
                                    <p class="text-sm text-blue-800 dark:text-blue-200 mt-1">Here's some helpful information you should know.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-900 rounded-lg p-4 overflow-x-auto">
                        <pre class="text-green-400 text-sm"><code>&lt;div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-4"&gt;
    &lt;div class="flex items-start"&gt;
        &lt;svg class="w-5 h-5 text-blue-600 dark:text-blue-400 mr-3"&gt;...&lt;/svg&gt;
        &lt;div&gt;
            &lt;h5 class="text-sm font-semibold text-blue-900 dark:text-blue-300"&gt;Information&lt;/h5&gt;
            &lt;p class="text-sm text-blue-800 dark:text-blue-200"&gt;Message&lt;/p&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;</code></pre>
                    </div>
                </div>

                {{-- Warning Alert --}}
                <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Warning Alert</h4>
                    <div class="mb-4 p-4 bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700">
                        <div class="bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-800 rounded-lg p-4">
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-yellow-600 dark:text-yellow-400 mr-3 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                </svg>
                                <div>
                                    <h5 class="text-sm font-semibold text-yellow-900 dark:text-yellow-300">Warning</h5>
                                    <p class="text-sm text-yellow-800 dark:text-yellow-200 mt-1">Please review this before proceeding.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-900 rounded-lg p-4 overflow-x-auto">
                        <pre class="text-green-400 text-sm"><code>&lt;div class="bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-800 rounded-lg p-4"&gt;
    &lt;div class="flex items-start"&gt;
        &lt;svg class="w-5 h-5 text-yellow-600 dark:text-yellow-400 mr-3"&gt;...&lt;/svg&gt;
        &lt;div&gt;
            &lt;h5 class="text-sm font-semibold text-yellow-900 dark:text-yellow-300"&gt;Warning&lt;/h5&gt;
            &lt;p class="text-sm text-yellow-800 dark:text-yellow-200"&gt;Message&lt;/p&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;</code></pre>
                    </div>
                </div>

                {{-- Error Alert --}}
                <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Error Alert</h4>
                    <div class="mb-4 p-4 bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700">
                        <div class="bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-lg p-4">
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-red-600 dark:text-red-400 mr-3 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                <div>
                                    <h5 class="text-sm font-semibold text-red-900 dark:text-red-300">Error</h5>
                                    <p class="text-sm text-red-800 dark:text-red-200 mt-1">Something went wrong. Please try again.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-900 rounded-lg p-4 overflow-x-auto">
                        <pre class="text-green-400 text-sm"><code>&lt;div class="bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-lg p-4"&gt;
    &lt;div class="flex items-start"&gt;
        &lt;svg class="w-5 h-5 text-red-600 dark:text-red-400 mr-3"&gt;...&lt;/svg&gt;
        &lt;div&gt;
            &lt;h5 class="text-sm font-semibold text-red-900 dark:text-red-300"&gt;Error&lt;/h5&gt;
            &lt;p class="text-sm text-red-800 dark:text-red-200"&gt;Message&lt;/p&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;</code></pre>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Card Section --}}
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">Cards & Containers</h2>
        
        <div class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6 mb-6">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Standard Cards</h3>
            <p class="text-lg text-gray-700 dark:text-gray-300 mb-4">
                Use these card styles to organize and present content in a structured way.
            </p>

            <div class="space-y-6">
                {{-- Basic Card --}}
                <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Basic Card</h4>
                    <div class="mb-4 p-4 bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700">
                        <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                            <h5 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Card Title</h5>
                            <p class="text-gray-700 dark:text-gray-300">This is the card content. Cards are great for grouping related information together.</p>
                        </div>
                    </div>
                    <div class="bg-gray-900 rounded-lg p-4 overflow-x-auto">
                        <pre class="text-green-400 text-sm"><code>&lt;div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6"&gt;
    &lt;h5 class="text-lg font-semibold text-gray-900 dark:text-white mb-2"&gt;Card Title&lt;/h5&gt;
    &lt;p class="text-gray-700 dark:text-gray-300"&gt;Content&lt;/p&gt;
&lt;/div&gt;</code></pre>
                    </div>
                </div>

                {{-- Card with Header --}}
                <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Card with Header</h4>
                    <div class="mb-4 p-4 bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700">
                        <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden">
                            <div class="bg-gray-100 dark:bg-gray-700 px-6 py-4 border-b border-gray-200 dark:border-gray-600">
                                <h5 class="text-lg font-semibold text-gray-900 dark:text-white">Card Header</h5>
                            </div>
                            <div class="p-6">
                                <p class="text-gray-700 dark:text-gray-300">This card has a distinct header section for better visual organization.</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-900 rounded-lg p-4 overflow-x-auto">
                        <pre class="text-green-400 text-sm"><code>&lt;div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden"&gt;
    &lt;div class="bg-gray-100 dark:bg-gray-700 px-6 py-4 border-b border-gray-200 dark:border-gray-600"&gt;
        &lt;h5&gt;Header&lt;/h5&gt;
    &lt;/div&gt;
    &lt;div class="p-6"&gt;Content&lt;/div&gt;
&lt;/div&gt;</code></pre>
                    </div>
                </div>

                {{-- Card with Footer --}}
                <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Card with Footer</h4>
                    <div class="mb-4 p-4 bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700">
                        <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden">
                            <div class="p-6">
                                <h5 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Card Title</h5>
                                <p class="text-gray-700 dark:text-gray-300">This card includes a footer section for actions or metadata.</p>
                            </div>
                            <div class="bg-gray-100 dark:bg-gray-700 px-6 py-4 border-t border-gray-200 dark:border-gray-600 flex justify-end gap-3">
                                <button class="px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-600 rounded">Cancel</button>
                                <button class="px-4 py-2 text-sm bg-blue-600 text-white rounded hover:bg-blue-700">Save</button>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-900 rounded-lg p-4 overflow-x-auto">
                        <pre class="text-green-400 text-sm"><code>&lt;div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden"&gt;
    &lt;div class="p-6"&gt;Content&lt;/div&gt;
    &lt;div class="bg-gray-100 dark:bg-gray-700 px-6 py-4 border-t"&gt;
        Footer actions
    &lt;/div&gt;
&lt;/div&gt;</code></pre>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Layout Patterns Section --}}
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">Layout Patterns</h2>
        
        <div class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6 mb-6">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Common Layouts</h3>
            <p class="text-lg text-gray-700 dark:text-gray-300 mb-4">
                Reusable layout patterns for consistent page structure.
            </p>

            <div class="space-y-6">
                {{-- Two Column Layout --}}
                <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Two Column Layout</h4>
                    <div class="mb-4 p-4 bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="bg-blue-100 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-4">
                                <p class="text-blue-900 dark:text-blue-300">Column 1</p>
                            </div>
                            <div class="bg-blue-100 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-4">
                                <p class="text-blue-900 dark:text-blue-300">Column 2</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-900 rounded-lg p-4 overflow-x-auto">
                        <pre class="text-green-400 text-sm"><code>&lt;div class="grid grid-cols-1 md:grid-cols-2 gap-6"&gt;
    &lt;div&gt;Column 1&lt;/div&gt;
    &lt;div&gt;Column 2&lt;/div&gt;
&lt;/div&gt;</code></pre>
                    </div>
                </div>

                {{-- Three Column Layout --}}
                <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Three Column Layout</h4>
                    <div class="mb-4 p-4 bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="bg-green-100 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-lg p-4">
                                <p class="text-green-900 dark:text-green-300">Column 1</p>
                            </div>
                            <div class="bg-green-100 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-lg p-4">
                                <p class="text-green-900 dark:text-green-300">Column 2</p>
                            </div>
                            <div class="bg-green-100 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-lg p-4">
                                <p class="text-green-900 dark:text-green-300">Column 3</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-900 rounded-lg p-4 overflow-x-auto">
                        <pre class="text-green-400 text-sm"><code>&lt;div class="grid grid-cols-1 md:grid-cols-3 gap-6"&gt;
    &lt;div&gt;Column 1&lt;/div&gt;
    &lt;div&gt;Column 2&lt;/div&gt;
    &lt;div&gt;Column 3&lt;/div&gt;
&lt;/div&gt;</code></pre>
                    </div>
                </div>

                {{-- Sidebar Layout --}}
                <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Sidebar Layout</h4>
                    <div class="mb-4 p-4 bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                            <div class="md:col-span-1 bg-purple-100 dark:bg-purple-900/20 border border-purple-200 dark:border-purple-800 rounded-lg p-4">
                                <p class="text-purple-900 dark:text-purple-300">Sidebar</p>
                            </div>
                            <div class="md:col-span-3 bg-purple-100 dark:bg-purple-900/20 border border-purple-200 dark:border-purple-800 rounded-lg p-4">
                                <p class="text-purple-900 dark:text-purple-300">Main Content</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-900 rounded-lg p-4 overflow-x-auto">
                        <pre class="text-green-400 text-sm"><code>&lt;div class="grid grid-cols-1 md:grid-cols-4 gap-6"&gt;
    &lt;div class="md:col-span-1"&gt;Sidebar&lt;/div&gt;
    &lt;div class="md:col-span-3"&gt;Main Content&lt;/div&gt;
&lt;/div&gt;</code></pre>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Interactive Examples Section --}}
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">Interactive Examples</h2>

        {{-- Carousel Example --}}
        <div class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6 mb-6">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Responsive Carousel</h3>
            <p class="text-lg text-gray-700 dark:text-gray-300 mb-6">
                A fully responsive carousel with navigation controls and slide indicators.
            </p>

            <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                <div class="carousel-container relative overflow-hidden rounded-lg">
                    <div class="carousel-inner flex transition-transform duration-500 ease-in-out">
                        {{-- Slide 1 --}}
                        <div class="carousel-slide flex-shrink-0 w-full">
                            <div class="bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg p-12 text-white">
                                <h4 class="text-3xl font-bold mb-4">Slide 1</h4>
                                <p class="text-xl">This is the first slide of the carousel</p>
                            </div>
                        </div>
                        {{-- Slide 2 --}}
                        <div class="carousel-slide flex-shrink-0 w-full">
                            <div class="bg-gradient-to-r from-green-500 to-teal-600 rounded-lg p-12 text-white">
                                <h4 class="text-3xl font-bold mb-4">Slide 2</h4>
                                <p class="text-xl">This is the second slide with different content</p>
                            </div>
                        </div>
                        {{-- Slide 3 --}}
                        <div class="carousel-slide flex-shrink-0 w-full">
                            <div class="bg-gradient-to-r from-orange-500 to-red-600 rounded-lg p-12 text-white">
                                <h4 class="text-3xl font-bold mb-4">Slide 3</h4>
                                <p class="text-xl">This is the third and final slide</p>
                            </div>
                        </div>
                    </div>

                    {{-- Navigation Arrows --}}
                    <button onclick="carouselPrev()" class="carousel-nav-btn carousel-prev absolute left-4 top-1/2 -translate-y-1/2 bg-white dark:bg-gray-800 text-gray-800 dark:text-white p-3 rounded-full shadow-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-all z-10">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </button>
                    <button onclick="carouselNext()" class="carousel-nav-btn carousel-next absolute right-4 top-1/2 -translate-y-1/2 bg-white dark:bg-gray-800 text-gray-800 dark:text-white p-3 rounded-full shadow-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-all z-10">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>
                </div>

                {{-- Slide Indicators --}}
                <div class="flex justify-center gap-2 mt-6">
                    <button onclick="goToSlide(0)" class="slide-number-btn active">1</button>
                    <button onclick="goToSlide(1)" class="slide-number-btn">2</button>
                    <button onclick="goToSlide(2)" class="slide-number-btn">3</button>
                </div>
            </div>
        </div>

        {{-- Drag and Drop Example --}}
        <div class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6 mb-6">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Drag & Drop Demo</h3>
            <p class="text-lg text-gray-700 dark:text-gray-300 mb-6">
                Interactive drag and drop demonstration. Drag the colored boxes to the target area.
            </p>

            <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    {{-- Draggable Items --}}
                    <div>
                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Drag These Items</h4>
                        <div class="grid grid-cols-2 gap-4">
                            <div id="pinsmall" class="draggable-element bg-blue-500 text-white cursor-move">
                                Box 1
                            </div>
                            <div id="pintwo" class="draggable-element bg-green-500 text-white cursor-move">
                                Box 2
                            </div>
                            <div id="pinthree" class="draggable-element bg-purple-500 text-white cursor-move">
                                Box 3
                            </div>
                            <div id="steps" class="draggable-element bg-orange-500 text-white cursor-move">
                                Box 4
                            </div>
                        </div>
                    </div>

                    {{-- Drop Target --}}
                    <div class="flex items-center justify-center">
                        <div id="target" class="droppable-target border-gray-400 dark:border-gray-600 text-gray-600 dark:text-gray-400 font-semibold text-lg">
                            Drop Here
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Code Examples Section --}}
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">Code Display</h2>
        
        <div class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6 mb-6">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Code Blocks</h3>
            <p class="text-lg text-gray-700 dark:text-gray-300 mb-4">
                Use these styles for displaying code snippets and examples.
            </p>

            <div class="space-y-6">
                {{-- Inline Code --}}
                <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Inline Code</h4>
                    <div class="mb-4 p-4 bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700">
                        <p class="text-gray-700 dark:text-gray-300">
                            Use the <code class="text-sm bg-gray-200 dark:bg-gray-700 px-2 py-1 rounded text-blue-600 dark:text-blue-400">className</code> prop to apply styles.
                        </p>
                    </div>
                    <div class="bg-gray-900 rounded-lg p-4 overflow-x-auto">
                        <pre class="text-green-400 text-sm"><code>&lt;code class="text-sm bg-gray-200 dark:bg-gray-700 px-2 py-1 rounded text-blue-600 dark:text-blue-400"&gt;code&lt;/code&gt;</code></pre>
                    </div>
                </div>

                {{-- Code Block --}}
                <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Code Block</h4>
                    <div class="mb-4 p-4 bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700">
                        <div class="bg-gray-900 rounded-lg p-4 overflow-x-auto">
                            <pre class="text-green-400 text-sm"><code>function example() {
    console.log("Hello World");
    return true;
}</code></pre>
                        </div>
                    </div>
                    <div class="bg-gray-900 rounded-lg p-4 overflow-x-auto">
                        <pre class="text-green-400 text-sm"><code>&lt;div class="bg-gray-900 rounded-lg p-4 overflow-x-auto"&gt;
    &lt;pre class="text-green-400 text-sm"&gt;&lt;code&gt;...&lt;/code&gt;&lt;/pre&gt;
&lt;/div&gt;</code></pre>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Spacing Section --}}
    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">Spacing System</h2>
        
        <div class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6 mb-6">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Standard Spacing</h3>
            <p class="text-lg text-gray-700 dark:text-gray-300 mb-4">
                Consistent spacing creates visual rhythm and hierarchy. Use Tailwind's spacing scale.
            </p>

            <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                <div class="space-y-4">
                    <div class="flex items-center gap-4">
                        <div class="w-32 text-sm text-gray-600 dark:text-gray-400">mb-2 (0.5rem)</div>
                        <div class="flex-1 bg-blue-500 mb-2" style="height: 2px;"></div>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="w-32 text-sm text-gray-600 dark:text-gray-400">mb-4 (1rem)</div>
                        <div class="flex-1 bg-blue-500 mb-4" style="height: 2px;"></div>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="w-32 text-sm text-gray-600 dark:text-gray-400">mb-6 (1.5rem)</div>
                        <div class="flex-1 bg-blue-500 mb-6" style="height: 2px;"></div>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="w-32 text-sm text-gray-600 dark:text-gray-400">mb-8 (2rem)</div>
                        <div class="flex-1 bg-blue-500 mb-8" style="height: 2px;"></div>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="w-32 text-sm text-gray-600 dark:text-gray-400">mb-12 (3rem)</div>
                        <div class="flex-1 bg-blue-500 mb-12" style="height: 2px;"></div>
                    </div>
                </div>
            </div>

            <div class="mt-6 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Spacing Guidelines</h4>
                <ul class="space-y-2 text-gray-700 dark:text-gray-300">
                    <li class="flex items-start">
                        <span class="text-blue-600 dark:text-blue-400 mr-2">•</span>
                        <span>Use <code class="text-sm bg-gray-200 dark:bg-gray-700 px-1 rounded">mb-2</code> or <code class="text-sm bg-gray-200 dark:bg-gray-700 px-1 rounded">mb-3</code> between small related elements</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-blue-600 dark:text-blue-400 mr-2">•</span>
                        <span>Use <code class="text-sm bg-gray-200 dark:bg-gray-700 px-1 rounded">mb-4</code> between paragraphs and form elements</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-blue-600 dark:text-blue-400 mr-2">•</span>
                        <span>Use <code class="text-sm bg-gray-200 dark:bg-gray-700 px-1 rounded">mb-6</code> between subsections</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-blue-600 dark:text-blue-400 mr-2">•</span>
                        <span>Use <code class="text-sm bg-gray-200 dark:bg-gray-700 px-1 rounded">mb-8</code> or <code class="text-sm bg-gray-200 dark:bg-gray-700 px-1 rounded">mb-12</code> between major sections</span>
                    </li>
                </ul>
            </div>
        </div>
    </section>

        <style>
            /* Scoped styles for this page */
            .style-guide-page-content .carousel-container {
                position: relative;
            }

            .style-guide-page-content .carousel-inner {
                display: flex;
                transition: transform 0.5s ease-in-out;
            }

            .style-guide-page-content .carousel-slide {
                flex: 0 0 100%;
                width: 100%;
            }

            .style-guide-page-content .carousel-nav-btn {
                opacity: 0.8;
            }

            .style-guide-page-content .carousel-nav-btn:hover {
                opacity: 1;
            }

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

            /* Draggable elements */
            .style-guide-page-content .draggable-element {
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

            .style-guide-page-content .draggable-element:hover {
                transform: scale(1.05);
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
            }

            .style-guide-page-content .droppable-target {
                width: 200px;
                height: 200px;
                display: flex;
                align-items: center;
                justify-content: center;
                border: 2px dashed;
                border-radius: 12px;
                transition: all 0.3s ease;
            }

            .style-guide-page-content .highlight {
                background-color: #d1fae5;
                border-color: #10b981;
                color: #065f46;
            }

            .dark .style-guide-page-content .highlight {
                background-color: #064e3b;
                border-color: #10b981;
                color: #d1fae5;
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

        <script>
            // Carousel Variables
            let currentSlide = 0;
            const totalSlides = 3;

            function updateCarousel() {
                const carouselInner = document.querySelector('.carousel-inner');
                carouselInner.style.transform = `translateX(-${currentSlide * 100}%)`;

                // Update slide number buttons
                document.querySelectorAll('.slide-number-btn').forEach((btn, index) => {
                    if (index === currentSlide) {
                        btn.classList.add('active');
                    } else {
                        btn.classList.remove('active');
                    }
                });
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

            // Theme toggle functionality
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
    </div>
</div>
