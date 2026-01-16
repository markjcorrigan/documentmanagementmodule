<div
    wire:init="loadSettings"
    x-data
    x-init="
        window.addEventListener('loadSettingsFinished', () => {
            $nextTick(() => {
                ScrollReveal().reveal('.reveal', {
                    distance: '20px',
                    duration: 800,
                    easing: 'ease-in-out',
                    origin: 'bottom',
                    interval: 100
                });
            });
        });
    "
>

    @if($siteSettings)

        <!-- Hero Section -->
        <section class="hero__content">
            <div class="grid-container">
                <div class="heading-row reveal" data-sr-delay="50">
                    <h2 class="hero__title text-dark text-4xl mt-2 mb-8 weight-500 sm:text-4xl xs:mb-5">
                        Based on recent project performance, where is the
                        <span class="text-primary">Capability Maturity Level?</span>
                    </h2>
                </div>
                <div class="image-row">
                    <img src="{{ $diagram }}" alt="Diagram" class="image reveal" data-sr-delay="900">
                    <img alt="" id="{{ $pinId }}" height="144" src="{{ $pinImage }}" width="152" class="reveal" data-sr-delay="200">
                    <p class="text-dark reveal" data-sr-delay="300">Drag the pin and place it in the above diagram</p>
                </div>
            </div>
        </section>

        <!-- My Vision -->
        <section class="our-vision">
            <div class="container">
                <div class="our-vision__content">
                    <div class="grid grid-cols-2 gap-6 md:gap-2 sm:grid-col sm:gap-4">

                        <div class="col1-2 reveal" data-sr-delay="0">
                            <div class="section-title sm:mb-1">
                                <div class="section-title__name"><span class="text-dark">My Vision</span></div>
                                <h2 class="section-title__title xs:mb-2">
                                    The values that drive everything I do are aligned with the five maxims of Shotokan Karate
                                </h2>
                            </div>
                        </div>

                        <div class="col1-2">
                            <div class="benefits">
                                @foreach($siteSettings['vision']['benefits'] as $index => $benefit)
                                    <div class="benefits__item flex gap-4 mb-3 md:gap-2 reveal" data-sr-delay="{{ 200 + $index*100 }}">
                                        <div class="benefits__item__icon"><i class="{{ $benefit['icon'] }}"></i></div>
                                        <div class="benefits__item__content flex-1">
                                            <h4 class="benefits__item__title text-2xl mb-1-5 weight-500">{{ $benefit['title'] }}</h4>
                                            <p class="benefits__item__description text-xl m0 text-grey w-80 md:w-full">{{ $benefit['desc'] }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <!-- Our Mission -->
        <section class="our-mission">
            <div class="container">
                <div class="our-mission__content grid gap-5 items-center md:gap-2">

                    <div class="our-mission__image rounded-4xl overflow-hidden w-[400px] sm:w-[300px] xs:w-full reveal" data-sr-delay="0">
                        <img class="w-full h-full object-cover" src="{{ asset('PMWayLanding/assets/images/markcorriganpic.jpg') }}" alt="Our Mission" />
                    </div>

                    <div class="our-mission__text reveal" data-sr-delay="100">
                        <h3 class="our-mission__title text-2xl weight-500 mb-1-5">{{ $siteSettings['mission']['title'] }}</h3>
                        <p class="our-mission__description text-xl text-grey w-90 m0">{{ $siteSettings['mission']['description'] }}</p>
                        <div class="our-mission__signature mt-4 reveal" data-sr-delay="200">
                            <img class="size-100 contain" src="{{ $siteSettings['mission']['signature'] }}" alt="Signature" />
                        </div>
                    </div>

                </div>
            </div>
        </section>

    @else
        <div class="min-h-screen flex items-center justify-center">
            <p class="text-gray-400 text-lg">Loading...</p>
        </div>
    @endif

</div>

<!-- Ensure ScrollReveal JS is included -->
<script src="https://unpkg.com/scrollreveal"></script>
