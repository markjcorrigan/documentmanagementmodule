<div class="container mx-auto py-6 px-4">
    <!-- Right-hand side secondary menu -->
    <!-- Sub-menu (aligned right, only as wide as the links) -->
    <div class="flex justify-end px-6 py-2">
        <div class="flex gap-6 bg-gray-50 border border-gray-200 shadow-sm rounded-xl px-4 py-2">
            <a href="#section-one" class="text-blue-700 hover:text-blue-900 font-medium transition">CV / Creds</a>
            <a href="#section-two" class="text-blue-700 hover:text-blue-900 font-medium transition">Work</a>
            <a href="#section-three" class="text-blue-700 hover:text-blue-900 font-medium transition">Udemy</a>
            <a href="/portfolio" class="text-blue-700 hover:text-blue-900 font-medium transition">Portfolio</a>
        </div>
    </div>
    {{-- ================= Certificate List ================= --}}
    <h3 class="text-2xl font-bold text-blue-600 mb-2" id="section-one">Mark Corrigan's Downloadable Creds, CV, etc.</h3>
    <h6 class="text-gray-500 mb-4" >
        Note: If the links below are disabled this means that I am currently employed
    </h6>

    <ul class="list-disc pl-5 space-y-2" >
        @foreach($certificates as $cert)
            <li>
                <h5 class="text-lg">
                    <a href="{{ Storage::url('certificates/' . $cert['file']) }}"  class="text-blue-600 hover:underline">
                        {{ $cert['label'] }}
                    </a>
                    @if(isset($cert['note']))
                        <i class="text-gray-500 text-sm ml-1">{{ $cert['note'] }}</i>
                    @endif
                </h5>
            </li>
        @endforeach
    </ul>
    <br><br id="section-two">
    <livewire:work-carousel />
    <br><br>

    {{-- ================= Udemy Carousel ================= --}}
    <div class="mt-6 text-center" id="section-three">
        <button wire:click="toggleCollapse" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
            {{ $collapseCerts ? 'Hide Udemy Certificates' : 'Show Udemy Certificates' }}
        </button>

        @if($collapseCerts && count($carouselImages) > 0)
            <div class="mt-4 flex flex-col items-center gap-4">
                <img src="{{ Storage::url('udemy/' . $carouselImages[$currentSlide]) }}"
                     alt="Udemy Certificate {{ $currentSlide + 1 }}"
                     class="rounded shadow-lg max-h-96 object-contain">

                <div class="flex gap-2">
                    <button wire:click="prevSlide" class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300 transition">&lt; Prev</button>
                    <button wire:click="nextSlide" class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300 transition">Next &gt;</button>
                </div>

                <div class="text-gray-500 text-sm mt-1">
                    Slide {{ $currentSlide + 1 }} of {{ count($carouselImages) }}
                </div>
            </div>
        @elseif($collapseCerts)
            <p class="text-gray-500 mt-4">No Udemy certificates to display.</p>
        @endif
    </div>

</div>
