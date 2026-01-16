{{-- resources/views/livewire/speedboat-tool.blade.php --}}
<section>
    <div class="max-w-6xl mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-8 border-b border-gray-200 dark:border-gray-700 pb-4">
            The Speedboat (Sailboat) Tool - Sweet and Simple!
        </h1>

        <hr class="border-t-2 border-gray-200 dark:border-gray-700 my-8">

        {{-- Video Section with Able Player --}}
        <div class="flex justify-center items-center my-8">
            <div class="w-full max-w-3xl">
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
                    <video
                            id="video1"
                            data-able-player
                            preload="auto"
                            width="640"
                            height="360"
                            playsinline
                            class="w-full rounded-lg"
                            poster="{{ asset('storage/images/speedboat.png') }}"
                    >
                        <source type="video/mp4" src="/ablelvids/sailboat/sailboat.mp4">
                    </video>
                </div>
            </div>
        </div>

        {{-- Interactive Hover Image Section --}}
        <div class="text-center my-12">
            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">
                Hover your mouse over the image below
            </h2>

            <div class="flex justify-center">
                <img
                        id="hoverImage"
                        class="max-w-2xl w-full rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 cursor-pointer hover:scale-105"
                        src="{{ asset('storage/images/sailship.jpg') }}"
                        alt="Sailboat to Speedboat Interactive Image"
                        data-original="{{ asset('storage/images/sailship.jpg') }}"
                        data-hover="{{ asset('storage/images/speedboatretro.jpg') }}"
                >
            </div>

            <p class="text-sm text-gray-600 dark:text-gray-400 mt-4 italic">
                Move your mouse over the image to see the transformation
            </p>
        </div>

        {{-- Static Speedboat Image --}}
        <div class="text-center my-8">
            <img
                    alt="Speedboat illustration"
                    class="max-w-4xl w-full mx-auto rounded-lg shadow-lg"
                    src="{{ asset('storage/images/speedboat.jpg') }}"
            >
        </div>
    </div>

{{--    --}}{{-- Include Able Player Assets --}}
{{--    <link rel="stylesheet" href="{{ asset('ableplayer/build/ableplayer.min.css') }}">--}}
{{--    <script src="{{ asset('ableplayer/thirdparty/js.cookie.js') }}"></script>--}}
{{--    <script src="{{ asset('ableplayer/build/ableplayer.js') }}"></script>--}}

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // DO NOT manually initialize Able Player - it auto-initializes with data-able-player attribute

            // Image hover effect only
            const hoverImage = document.getElementById('hoverImage');
            if (hoverImage) {
                const originalSrc = hoverImage.getAttribute('data-original');
                const hoverSrc = hoverImage.getAttribute('data-hover');

                hoverImage.addEventListener('mouseenter', function() {
                    this.src = hoverSrc;
                });

                hoverImage.addEventListener('mouseleave', function() {
                    this.src = originalSrc;
                });
            }
        });
    </script>
</section>