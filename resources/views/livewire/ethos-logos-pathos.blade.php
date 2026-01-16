{{-- resources/views/livewire/ethos-logos-pathos.blade.php --}}
<div>
    <div class="max-w-4xl mx-auto px-4 py-8">
        <h1 class="text-4xl font-semibold text-gray-900 dark:text-white mb-8">
            Ethos, Logos, Pathos
        </h1>

        <hr class="border-gray-300 dark:border-gray-600 mb-6">

        <div class="space-y-6">
            {{-- Images Section --}}
            <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6 text-center">
                <div class="space-y-6">
                    <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
                        <img
                                alt="Charioteer"
                                class="img-fluid rounded-lg mx-auto dark:bg-white p-2"
                                src="{{ asset('storage/images/charioteer.png') }}"
                        >
                    </div>

                    <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
                        <img
                                alt="Ethos Pathos Logos"
                                class="img-fluid rounded-lg mx-auto dark:bg-white p-2"
                                src="{{ asset('storage/images/ethospathoslogos.png') }}"
                        >
                    </div>
                </div>
            </div>

            {{-- Content Section --}}
            <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">
                    Argument comes with an ethic.
                </p>

                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-4">
                    The best that mere rhetoric can offer is mere winning.
                </p>

                <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300">
                    Truth and genuine rationality demand a far higher standard than that.
                </p>
            </div>

            {{-- Workbook Link --}}
{{--            <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 border border-gray-200 dark:border-gray-700 text-center">--}}
{{--                <a--}}
{{--                        href="/homeviewpdf/philosopherstoolkit.pdf"--}}
{{--                        target="_blank"--}}
{{--                        class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded transition-colors"--}}
{{--                >--}}
{{--                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">--}}
{{--                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>--}}
{{--                    </svg>--}}
{{--                    Download Workbook--}}
{{--                </a>--}}
{{--            </div>--}}

            {{-- Optional: Explanation Section --}}
            <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6">
                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">
                    The Three Modes of Persuasion
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="bg-blue-50 dark:bg-blue-900/20 p-4 rounded-lg">
                        <h3 class="text-xl font-semibold text-blue-800 dark:text-blue-300 mb-2">Ethos</h3>
                        <p class="text-blue-700 dark:text-blue-400">Appeal to ethics and credibility</p>
                    </div>

                    <div class="bg-green-50 dark:bg-green-900/20 p-4 rounded-lg">
                        <h3 class="text-xl font-semibold text-green-800 dark:text-green-300 mb-2">Logos</h3>
                        <p class="text-green-700 dark:text-green-400">Appeal to logic and reason</p>
                    </div>

                    <div class="bg-purple-50 dark:bg-purple-900/20 p-4 rounded-lg">
                        <h3 class="text-xl font-semibold text-purple-800 dark:text-purple-300 mb-2">Pathos</h3>
                        <p class="text-purple-700 dark:text-purple-400">Appeal to emotion and values</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Handle any interactive elements if needed
        document.addEventListener('DOMContentLoaded', function() {
            // Add smooth interactions for images if desired
            const images = document.querySelectorAll('img');
            images.forEach(img => {
                // Ensure PNG images have white background in dark mode
                if (img.src.includes('.png')) {
                    img.classList.add('dark:bg-white', 'p-2');
                }

                // Optional: Add hover effect
                img.classList.add('transition-transform', 'duration-300', 'hover:scale-105');
            });
        });
    </script>
</div>