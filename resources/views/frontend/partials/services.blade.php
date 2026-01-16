<section class="services-section" id="services-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-header text-center">
                    <h2 class="section-title wow fadeInUp" data-wow-delay=".3s">My Quality Services</h2>
                    <p class="wow fadeInUp" data-wow-delay=".4s">
                        I have a range of services that I offer
                    </p>
                </div>
            </div>
        </div>

        @php
            $selectedCategory = request()->get('category');

            // Get services, optionally filtered by category
            $services = App\Models\Service::when($selectedCategory, function ($query) use ($selectedCategory) {
                    $query->where('category', $selectedCategory);
                })
                ->orderBy('category')
                ->orderBy('created_at', 'desc')
                ->get();

            $categories = App\Models\Service::select('category')
                            ->distinct()
                            ->pluck('category');
        @endphp

        {{-- Category Filter --}}
        <div class="row mb-4">
            <div class="col-md-12 text-center">
                <form method="GET" action="{{ url()->current() }}#services-section">
                    <select name="category" onchange="this.form.submit()" class="form-control d-inline-block w-auto">
                        <option value="">All Categories</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat }}" {{ $selectedCategory == $cat ? 'selected' : '' }}>
                                {{ $cat }}
                            </option>
                        @endforeach
                    </select>
                </form>
            </div>
        </div>

        {{-- Single Slider --}}
        <div class="row">
            <div class="col-md-12">
                <div class="services-widget owl-carousel position-relative">
                    @php $counter = 1; @endphp
                    @forelse($services as $service)
                        @php $delay = 0.3 + ($counter * 0.1); @endphp
                        <div class="service-item current d-flex flex-wrap align-items-center wow fadeInUp"
                             data-wow-delay="{{ $delay }}s">
                            <div class="left-box d-flex flex-wrap align-items-center">
                                <span class="number">0{{ $counter }}</span>
                                <h3 class="service-title">{{ $service->service_title }}</h3>
                                <small class="service-category">{{ $service->category }}</small>
                            </div>
                            <div class="right-box">
                                <p>{{ $service->service_description }}</p>
                            </div>
                            <i class="flaticon-up-right-arrow"></i>
                        </div>
                        @php $counter++; @endphp
                    @empty
                        <p class="text-center">No Services found! 😌😌</p>
                    @endforelse

                    <div class="active-bg wow fadeInUp" data-wow-delay=".5s"></div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- JS Initialization --}}
@push('scripts')
    <script>
        $(document).ready(function() {
            // Owl Carousel slider (single instance)
            $('.services-widget').owlCarousel({
                loop: true,
                margin: 20,
                nav: true,
                dots: false,
                responsive:{
                    0:{items:1},
                    768:{items:2},
                    992:{items:3}
                }
            });

            // Smooth scroll to section if category selected
            @if(request()->has('category'))
            $('html, body').animate({
                scrollTop: $('#services-section').offset().top - 100
            }, 500);
            @endif
        });
    </script>
@endpush
