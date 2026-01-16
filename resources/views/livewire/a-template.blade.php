{{-- resources/views/livewire/template-page.blade.php --}}
<div class="max-w-6xl mx-auto px-4 py-8 bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700" x-data="{ open: false, modalImg: null }">

    {{-- Page Header --}}
    <header class="text-center mb-8">
        <h1 class="text-4xl font-semibold text-gray-900 dark:text-white mb-4">Page Title Here</h1>
        <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto">
            Brief description or tagline for the page. This provides context for the content below.
        </p>
    </header>

    {{-- VIDEO SECTION - Outside Modal, at the top --}}
    <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6 border border-gray-200 dark:border-gray-700 mb-8">
        <div class="flex items-center gap-3 mb-4">
            <i class="fas fa-play-circle text-blue-500 text-xl"></i>
            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">Introduction Video</h2>
        </div>
        <p class="text-lg text-gray-700 dark:text-gray-300 mb-4">
            Watch this short video to get an overview of what this page is about.
        </p>

        {{-- Video Player --}}
        <div class="bg-black rounded-lg overflow-hidden shadow-lg">
            <video
                controls
                class="w-full"
                poster="{{ asset('storage/images/scruminsixmins.png') }}"
            >
                <source src="{{ asset('storage/assets/scrumsixmins.mp4') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
    </div>

    {{-- MAIN CONTENT SECTION - Always visible, outside modal --}}
    <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6 border border-gray-200 dark:border-gray-700 mb-8">
        <div class="flex items-center gap-3 mb-4">
            <i class="fas fa-info-circle text-green-500 text-xl"></i>
            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">Main Content Section</h2>
        </div>

        <div class="prose max-w-none dark:prose-invert">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">Primary Information</h3>

            {{-- Two Paragraphs --}}
            <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">
                This is your main content area that is always visible. Users see this immediately when they land on the page.
                This content should contain the most important information and value proposition.
            </p>

            <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300">
                This section is optimized for SEO and user engagement. It provides the core message without requiring
                any user interaction like clicking buttons or opening modals.
            </p>

            {{-- Feature List with Icons --}}
            <div class="mt-6 space-y-3">
                <div class="flex items-center gap-3">
                    <i class="fas fa-check-circle text-green-500"></i>
                    <span class="text-gray-700 dark:text-gray-300">Immediately accessible content for all users</span>
                </div>
                <div class="flex items-center gap-3">
                    <i class="fas fa-check-circle text-green-500"></i>
                    <span class="text-gray-700 dark:text-gray-300">SEO-friendly structure for better visibility</span>
                </div>
                <div class="flex items-center gap-3">
                    <i class="fas fa-check-circle text-green-500"></i>
                    <span class="text-gray-700 dark:text-gray-300">Clear value proposition without barriers</span>
                </div>
                <div class="flex items-center gap-3">
                    <i class="fas fa-check-circle text-green-500"></i>
                    <span class="text-gray-700 dark:text-gray-300">Responsive design for all devices</span>
                </div>
            </div>

            {{-- Table with Icon Header --}}
            <div class="mt-6">
                <div class="flex items-center gap-3 mb-3">
                    <i class="fas fa-table text-gray-500"></i>
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Content Overview</h4>
                </div>
                <table class="w-full border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700">
                    <thead>
                    <tr class="bg-gray-100 dark:bg-gray-600">
                        <th class="p-3 text-left text-gray-900 dark:text-white">
                            <i class="fas fa-list-ol mr-2"></i>Section
                        </th>
                        <th class="p-3 text-left text-gray-900 dark:text-white">
                            <i class="fas fa-tag mr-2"></i>Visibility
                        </th>
                        <th class="p-3 text-left text-gray-900 dark:text-white">
                            <i class="fas fa-info-circle mr-2"></i>Purpose
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="border-t border-gray-300 dark:border-gray-600">
                        <td class="p-3 text-gray-700 dark:text-gray-300">Video Section</td>
                        <td class="p-3 text-gray-700 dark:text-gray-300">Always Visible</td>
                        <td class="p-3 text-gray-700 dark:text-gray-300">Engaging multimedia introduction</td>
                    </tr>
                    <tr class="border-t border-gray-300 dark:border-gray-600">
                        <td class="p-3 text-gray-700 dark:text-gray-300">Main Content</td>
                        <td class="p-3 text-gray-700 dark:text-gray-300">Always Visible</td>
                        <td class="p-3 text-gray-700 dark:text-gray-300">Core information and value</td>
                    </tr>
                    <tr class="border-t border-gray-300 dark:border-gray-600">
                        <td class="p-3 text-gray-700 dark:text-gray-300">Additional Content</td>
                        <td class="p-3 text-gray-700 dark:text-gray-300">Collapsible</td>
                        <td class="p-3 text-gray-700 dark:text-gray-300">Supplementary details</td>
                    </tr>
                    </tbody>
                </table>
            </div>

            {{-- Quick Action Buttons --}}
            <div class="mt-6 flex flex-wrap gap-4">
                <button @click="modalImg = '{{ asset('storage/images/sampleimage.jpg') }}'"
                        class="flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded transition-colors">
                    <i class="fas fa-image"></i>
                    View Sample Image
                </button>

                <button @click="modalImg = '{{ asset('storage/assets/samplepdf.pdf') }}'"
                        class="flex items-center gap-2 bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded transition-colors">
                    <i class="fas fa-file-pdf"></i>
                    View Sample PDF
                </button>
            </div>
        </div>
    </div>

    {{-- INTERACTIVE ELEMENT - For additional content --}}
    <div class="text-center mb-8">
        <button @click="open = !open" class="inline-flex items-center justify-center gap-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-4 px-8 rounded-lg transition-all duration-300 shadow-md hover:shadow-lg">
            <span x-show="!open">
                <i class="fas fa-chevron-down text-lg"></i>
            </span>
            <span x-show="open">
                <i class="fas fa-chevron-up text-lg"></i>
            </span>
            <span x-text="open ? 'Hide Additional Content' : 'Show Additional Content'"></span>
        </button>
    </div>

    {{-- COLLAPSIBLE CONTENT SECTION --}}
    <div x-show="open" x-transition class="space-y-8">

        {{-- Additional Content Sections --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Left Column --}}
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                <div class="flex items-center gap-3 mb-3">
                    <i class="fas fa-lightbulb text-yellow-500 text-xl"></i>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Additional Insights</h3>
                </div>
                <p class="text-gray-700 dark:text-gray-300">
                    This content is revealed when users choose to explore more. It provides deeper insights
                    and supplementary information for interested visitors.
                </p>
                <button @click="modalImg = '{{ asset('storage/images/sampleimage.jpg') }}'"
                        class="inline-flex items-center gap-2 mt-3 text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">
                    View Sample Image <i class="fas fa-arrow-right text-sm"></i>
                </button>
            </div>

            {{-- Right Column --}}
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                <div class="flex items-center gap-3 mb-3">
                    <i class="fas fa-cogs text-gray-500 text-xl"></i>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Documentation</h3>
                </div>
                <p class="text-gray-700 dark:text-gray-300">
                    For users who want more detailed documentation or technical specifications. This content
                    is optional and doesn't clutter the main view.
                </p>
                <button @click="modalImg = '{{ asset('storage/assets/samplepdf.pdf') }}'"
                        class="inline-flex items-center gap-2 mt-3 text-blue-600 dark:text-blue-400 underline hover:text-blue-800 dark:hover:text-blue-300">
                    View Sample PDF <i class="fas fa-arrow-right text-sm"></i>
                </button>
            </div>
        </div>

        {{-- FAQ Section with Icons --}}
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center gap-3 mb-4">
                <i class="fas fa-question-circle text-purple-500 text-xl"></i>
                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">Frequently Asked Questions</h2>
            </div>
            <div class="space-y-4">
                <div class="border-l-4 border-blue-500 pl-4">
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center gap-2">
                        <i class="fas fa-question text-blue-500 text-sm"></i>
                        Why is content outside the modal important?
                    </h4>
                    <p class="text-gray-700 dark:text-gray-300 mt-1">
                        Content outside modals is immediately accessible, SEO-friendly, and provides better
                        user experience by reducing interaction barriers.
                    </p>
                </div>
                <div class="border-l-4 border-green-500 pl-4">
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center gap-2">
                        <i class="fas fa-question text-green-500 text-sm"></i>
                        When should I use modals?
                    </h4>
                    <p class="text-gray-700 dark:text-gray-300 mt-1">
                        Use modals for supplementary content like detailed images, PDF documents, or additional
                        information that not all users need to see immediately.
                    </p>
                </div>
                <div class="border-l-4 border-purple-500 pl-4">
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center gap-2">
                        <i class="fas fa-question text-purple-500 text-sm"></i>
                        How do I access the sample files?
                    </h4>
                    <p class="text-gray-700 dark:text-gray-300 mt-1">
                        Click the "View Sample Image" or "View Sample PDF" buttons throughout the page to open
                        the files in a modal viewer.
                    </p>
                </div>
            </div>
        </div>

    </div>

    {{-- MODAL FOR IMAGES/PDFs --}}
    <div x-show="modalImg"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50 p-4"
         @click="modalImg = null">
        <div class="relative max-w-4xl w-full max-h-[90vh] flex items-center justify-center" @click.stop>
            <button @click="modalImg = null"
                    class="absolute -top-12 right-0 text-white text-3xl bg-gray-800 rounded-full w-10 h-10 flex items-center justify-center hover:bg-gray-700 transition-colors">
                <i class="fas fa-times"></i>
            </button>
            <div class="bg-white dark:bg-gray-900 rounded-lg p-4 max-w-full max-h-full overflow-auto border border-gray-200 dark:border-gray-700">
                {{-- Image Display --}}
                <img x-show="modalImg && modalImg.match(/\.(jpg|jpeg|png|gif)$/i)"
                     :src="modalImg"
                     class="rounded-lg shadow-lg max-w-full max-h-[80vh] object-contain mx-auto">

                {{-- PDF Display --}}
                <div x-show="modalImg && modalImg.match(/\.pdf$/i)"
                     class="text-center p-8">
                    <i class="fas fa-file-pdf text-red-500 text-6xl mb-4"></i>
                    <p class="mt-4 text-lg font-semibold text-gray-900 dark:text-white">Sample PDF Document</p>
                    <p class="text-gray-600 dark:text-gray-400 mb-4">This is a sample PDF file for demonstration purposes</p>
                    <a :href="modalImg"
                       target="_blank"
                       class="inline-flex items-center gap-2 px-6 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors">
                        <i class="fas fa-external-link-alt"></i>
                        Open PDF in New Tab
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>
