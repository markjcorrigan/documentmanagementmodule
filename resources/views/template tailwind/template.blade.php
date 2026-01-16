{{--
┌─────────────────────────────────────────────────────────────────────────────┐
│ TAILWIND PAGE TEMPLATE - REUSABLE FOR MULTIPLE PAGES                       │
├─────────────────────────────────────────────────────────────────────────────┤
│                                                                             │
│ LAYOUT USED:                                                                │
│   - resources/views/components/layouts/app/frontend.blade.php              │
│   - Includes: resources/views/partials/head.blade.php                      │
│   - Includes: resources/views/partials/footer.blade.php                    │
│                                                                             │
│ LAYOUT SET IN: config/livewire.php                                         │
│   'layout' => 'components.layouts.app.frontend'                            │
│                                                                             │
│ LIVEWIRE COMPONENT EXAMPLE:                                                │
│   namespace App\Livewire;                                                  │
│   use Livewire\Component;                                                  │
│   use Livewire\Attributes\Layout;                                          │
│                                                                             │
│   class YourPage extends Component {                                       │
│       #[Layout('components.layouts.app.frontend')]                         │
│       public function render() {                                           │
│           return view('livewire.your-page');                               │
│       }                                                                     │
│   }                                                                         │
│                                                                             │
│ DARK/LIGHT MODE:                                                           │
│   - Light mode: text-zinc-900, bg-white                                    │
│   - Dark mode: dark:text-white, dark:bg-zinc-800                           │
│   - Always include BOTH classes for text and backgrounds                   │
│                                                                             │
│ QUICK REFERENCE:                                                           │
│   Headers:    text-zinc-900 dark:text-white                                │
│   Body Text:  text-zinc-700 dark:text-zinc-200                             │
│   Muted Text: text-zinc-600 dark:text-zinc-400                             │
│   Links:      text-blue-600 dark:text-blue-400 hover:underline            │
│   Buttons:    bg-blue-600 hover:bg-blue-700 dark:bg-blue-500              │
│   Containers: bg-white dark:bg-zinc-800                                    │
│   Borders:    border-zinc-200 dark:border-zinc-700                         │
│                                                                             │
└─────────────────────────────────────────────────────────────────────────────┘
--}}

<div class="w-full">

    {{-- ============================================================
         HERO SECTION - Main page header with title and subtitle
         ============================================================ --}}
    <section class="bg-white dark:bg-zinc-800 py-12 md:py-16">
        <div class="container mx-auto px-4">
            {{-- Main Page Title --}}
            <h1 class="text-4xl md:text-5xl font-bold text-zinc-900 dark:text-white mb-4">
                Your Page Title Here
            </h1>

            {{-- Subtitle with accent color --}}
            <p class="text-xl text-zinc-700 dark:text-zinc-200 mb-6">
                A compelling subtitle with
                <span class="text-blue-600 dark:text-blue-400 font-semibold">highlighted text</span>
            </p>

            {{-- Description paragraph --}}
            <p class="text-lg text-zinc-600 dark:text-zinc-300 max-w-3xl">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                exercitation ullamco laboris.
            </p>
        </div>
    </section>

    {{-- ============================================================
         CONTENT SECTION - Main content area with various elements
         ============================================================ --}}
    <section class="bg-zinc-50 dark:bg-zinc-900 py-12">
        <div class="container mx-auto px-4">

            {{-- Section Header (H2) --}}
            <h2 class="text-3xl font-semibold text-zinc-900 dark:text-white mb-6">
                Section Title
            </h2>

            {{-- Regular Paragraphs --}}
            <div class="prose prose-lg max-w-none mb-8">
                <p class="text-zinc-700 dark:text-zinc-200 mb-4 leading-relaxed">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>

                <p class="text-zinc-700 dark:text-zinc-200 mb-4 leading-relaxed">
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                    culpa qui officia deserunt mollit anim id est laborum.
                </p>
            </div>

            {{-- Text with Link Example --}}
            <p class="text-zinc-700 dark:text-zinc-200 mb-8">
                This is a paragraph with a
                <a href="#" wire:navigate class="text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300 hover:underline font-medium transition-colors">
                    link that works in both modes
                </a>
                and continues with more text.
            </p>

            {{-- Subsection (H3) --}}
            <h3 class="text-2xl font-semibold text-zinc-900 dark:text-white mb-4 mt-8">
                Subsection Title
            </h3>

            <p class="text-zinc-700 dark:text-zinc-200 mb-6 leading-relaxed">
                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis.
            </p>

            {{-- ============================================================
                 CARD/BOX EXAMPLE - Content in a bordered container
                 ============================================================ --}}
            <div class="bg-white dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 rounded-lg p-6 shadow-sm mb-8">
                <h4 class="text-xl font-semibold text-zinc-900 dark:text-white mb-3">
                    Card Title
                </h4>
                <p class="text-zinc-600 dark:text-zinc-300 mb-4">
                    This is content inside a card/box. It has proper borders and backgrounds that adapt
                    to dark and light modes automatically.
                </p>
                <a href="#" wire:navigate class="inline-flex items-center text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300 font-medium">
                    Learn more
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>

            {{-- ============================================================
                 BUTTON EXAMPLES - Different button styles
                 ============================================================ --}}
            <div class="mb-8">
                <h4 class="text-xl font-semibold text-zinc-900 dark:text-white mb-4">
                    Button Examples
                </h4>

                <div class="flex flex-wrap gap-3">
                    {{-- Primary Button --}}
                    <button class="px-6 py-3 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white font-medium rounded-lg transition-colors">
                        Primary Button
                    </button>

                    {{-- Secondary Button --}}
                    <button class="px-6 py-3 bg-zinc-200 hover:bg-zinc-300 dark:bg-zinc-700 dark:hover:bg-zinc-600 text-zinc-900 dark:text-white font-medium rounded-lg transition-colors">
                        Secondary Button
                    </button>

                    {{-- Outline Button --}}
                    <button class="px-6 py-3 border-2 border-blue-600 dark:border-blue-400 text-blue-600 dark:text-blue-400 hover:bg-blue-600 dark:hover:bg-blue-500 hover:text-white font-medium rounded-lg transition-colors">
                        Outline Button
                    </button>
                </div>
            </div>

            {{-- ============================================================
                 LIST EXAMPLES - Unordered and ordered lists
                 ============================================================ --}}
            <div class="mb-8">
                <h4 class="text-xl font-semibold text-zinc-900 dark:text-white mb-4">
                    List Examples
                </h4>

                <div class="grid md:grid-cols-2 gap-6">
                    {{-- Unordered List --}}
                    <div>
                        <h5 class="text-lg font-medium text-zinc-900 dark:text-white mb-3">Unordered List</h5>
                        <ul class="list-disc list-inside space-y-2 text-zinc-700 dark:text-zinc-200">
                            <li>First bullet point item</li>
                            <li>Second bullet point item</li>
                            <li>Third bullet point item</li>
                            <li>Fourth bullet point item</li>
                        </ul>
                    </div>

                    {{-- Ordered List --}}
                    <div>
                        <h5 class="text-lg font-medium text-zinc-900 dark:text-white mb-3">Ordered List</h5>
                        <ol class="list-decimal list-inside space-y-2 text-zinc-700 dark:text-zinc-200">
                            <li>First numbered item</li>
                            <li>Second numbered item</li>
                            <li>Third numbered item</li>
                            <li>Fourth numbered item</li>
                        </ol>
                    </div>
                </div>
            </div>

            {{-- ============================================================
                 TWO COLUMN LAYOUT - Side by side content
                 ============================================================ --}}
            <div class="grid md:grid-cols-2 gap-8 mb-8">
                <div>
                    <h4 class="text-xl font-semibold text-zinc-900 dark:text-white mb-3">
                        Left Column
                    </h4>
                    <p class="text-zinc-700 dark:text-zinc-200 mb-4">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                </div>

                <div>
                    <h4 class="text-xl font-semibold text-zinc-900 dark:text-white mb-3">
                        Right Column
                    </h4>
                    <p class="text-zinc-700 dark:text-zinc-200 mb-4">
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                        ut aliquip ex ea commodo consequat.
                    </p>
                </div>
            </div>

            {{-- ============================================================
                 ALERT/NOTICE BOXES - Informational callouts
                 ============================================================ --}}
            <div class="space-y-4 mb-8">
                <h4 class="text-xl font-semibold text-zinc-900 dark:text-white mb-4">
                    Alert Examples
                </h4>

                {{-- Info Alert --}}
                <div class="bg-blue-50 dark:bg-blue-900/20 border-l-4 border-blue-600 dark:border-blue-400 p-4">
                    <p class="text-blue-800 dark:text-blue-200">
                        <strong class="font-semibold">Info:</strong> This is an informational message.
                    </p>
                </div>

                {{-- Success Alert --}}
                <div class="bg-green-50 dark:bg-green-900/20 border-l-4 border-green-600 dark:border-green-400 p-4">
                    <p class="text-green-800 dark:text-green-200">
                        <strong class="font-semibold">Success:</strong> This is a success message.
                    </p>
                </div>

                {{-- Warning Alert --}}
                <div class="bg-yellow-50 dark:bg-yellow-900/20 border-l-4 border-yellow-600 dark:border-yellow-400 p-4">
                    <p class="text-yellow-800 dark:text-yellow-200">
                        <strong class="font-semibold">Warning:</strong> This is a warning message.
                    </p>
                </div>
            </div>

            {{-- ============================================================
                 IMAGE EXAMPLE - Responsive image with caption
                 ============================================================ --}}
            <div class="mb-8">
                <h4 class="text-xl font-semibold text-zinc-900 dark:text-white mb-4">
                    Image Example
                </h4>
                <div class="bg-white dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 rounded-lg overflow-hidden">
                    <img src="{{ asset('storage/images/placeholder.jpg') }}"
                         alt="Description"
                         class="w-full h-64 object-cover dark:opacity-90">
                    <div class="p-4">
                        <p class="text-sm text-zinc-600 dark:text-zinc-400 italic">
                            Image caption goes here with proper styling for both modes.
                        </p>
                    </div>
                </div>
            </div>

            {{-- ============================================================
                 SMALLER HEADINGS (H5, H6)
                 ============================================================ --}}
            <h5 class="text-lg font-semibold text-zinc-900 dark:text-white mb-2">
                This is an H5 Heading
            </h5>
            <p class="text-zinc-700 dark:text-zinc-200 mb-4">
                Smaller heading for minor sections within your content.
            </p>

            <h6 class="text-base font-semibold text-zinc-900 dark:text-white mb-2">
                This is an H6 Heading
            </h6>
            <p class="text-zinc-700 dark:text-zinc-200 mb-8">
                The smallest heading size, useful for very minor subsections.
            </p>

            {{-- ============================================================
                 BLOCKQUOTE EXAMPLE
                 ============================================================ --}}
            <blockquote class="border-l-4 border-zinc-300 dark:border-zinc-600 pl-4 py-2 my-6 italic text-zinc-700 dark:text-zinc-300">
                "This is a blockquote. Use this for quotes or highlighted text that needs
                to stand out from the main content."
            </blockquote>

            {{-- ============================================================
                 MUTED/SMALL TEXT
                 ============================================================ --}}
            <p class="text-sm text-zinc-500 dark:text-zinc-400">
                This is smaller, muted text. Perfect for footnotes, captions, or less important information.
            </p>

        </div>
    </section>

    {{-- ============================================================
         CALL TO ACTION SECTION - Final section with action button
         ============================================================ --}}
    <section class="bg-white dark:bg-zinc-800 py-16">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold text-zinc-900 dark:text-white mb-4">
                Ready to Get Started?
            </h2>
            <p class="text-xl text-zinc-600 dark:text-zinc-300 mb-8 max-w-2xl mx-auto">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Take action today!
            </p>
            <button class="px-8 py-4 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white text-lg font-semibold rounded-lg transition-colors shadow-lg">
                Get Started Now
            </button>
        </div>
    </section>

</div>
