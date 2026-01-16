{{--@php--}}
{{--    // Fetch all portfolio items with their services--}}
{{--    $works = App\Models\Portfolio::with('service:id,service_title')--}}
{{--        ->latest()--}}
{{--        ->get();--}}

{{--    // Debug: Uncomment to check if data exists--}}
{{--    // dd($works->count(), $works);--}}
{{--@endphp--}}

{{--<section class="portfolio-section" id="works-section" aria-labelledby="portfolio-heading">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-12">--}}
{{--                <div class="section-header text-center">--}}
{{--                    <h2 id="portfolio-heading" class="section-title wow fadeInUp" data-wow-delay=".3s">--}}
{{--                        My Recent Works--}}
{{--                    </h2>--}}
{{--                    <p class="wow fadeInUp" data-wow-delay=".4s">--}}
{{--                        Browse through my portfolio of services--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="row">--}}
{{--            <div class="col-md-12">--}}
{{--                @forelse ($works as $index => $work)--}}
{{--                    @php--}}
{{--                        $delay = 0.3 + ($index * 0.1);--}}
{{--                        $imageUrl = $work->photo--}}
{{--                            ? asset($work->photo)--}}
{{--                            : asset('images/placeholder.jpg');--}}
{{--                        $serviceTitle = $work->service--}}
{{--                            ? $work->service->service_title--}}
{{--                            : 'Service';--}}
{{--                    @endphp--}}

{{--                    <article class="portfolio-item-row wow fadeInUp" data-wow-delay="{{ $delay }}s">--}}
{{--                        <div class="portfolio-content">--}}
{{--                            <div class="portfolio-text">--}}
{{--                                <span class="service-badge">{{ $serviceTitle }}</span>--}}
{{--                                <h3 class="portfolio-title">{{ $work->title }}</h3>--}}
{{--                                @if($work->sub_title)--}}
{{--                                    <p class="portfolio-subtitle">{{ $work->sub_title }}</p>--}}
{{--                                @endif--}}
{{--                                <a--}}
{{--                                    href="{{ $work->url }}"--}}
{{--                                    --}}
{{--                                    rel="noopener noreferrer"--}}
{{--                                    class="portfolio-link-btn"--}}
{{--                                    aria-label="View {{ $work->title }} project"--}}
{{--                                >--}}
{{--                                    View Project--}}
{{--                                    <i class="flaticon-up-right-arrow" aria-hidden="true"></i>--}}
{{--                                </a>--}}
{{--                            </div>--}}

{{--                            <div class="portfolio-image">--}}
{{--                                <img--}}
{{--                                    src="{{ $imageUrl }}"--}}
{{--                                    alt="{{ $work->title }}"--}}
{{--                                    loading="lazy"--}}
{{--                                    onerror="this.src='{{ asset('images/placeholder.jpg') }}'"--}}
{{--                                />--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </article>--}}
{{--                @empty--}}
{{--                    <div class="col-12 text-center py-5">--}}
{{--                        <p class="text-muted">No portfolio items available yet.</p>--}}
{{--                    </div>--}}
{{--                @endforelse--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}

{{--<style>--}}
{{--    .portfolio-item-row {--}}
{{--        margin-bottom: 3rem;--}}
{{--        /* Temporarily removing opacity to debug */--}}
{{--        /* opacity: 0; */--}}
{{--    }--}}

{{--    .portfolio-content {--}}
{{--        display: flex;--}}
{{--        align-items: center;--}}
{{--        gap: 2rem;--}}
{{--        padding: 2rem;--}}
{{--        background: #fff;--}}
{{--        border-radius: 12px;--}}
{{--        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);--}}
{{--        transition: transform 0.3s ease, box-shadow 0.3s ease;--}}
{{--    }--}}

{{--    .portfolio-content:hover {--}}
{{--        transform: translateY(-5px);--}}
{{--        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.15);--}}
{{--    }--}}

{{--    .portfolio-text {--}}
{{--        flex: 1;--}}
{{--        min-width: 0;--}}
{{--    }--}}

{{--    .service-badge {--}}
{{--        display: inline-block;--}}
{{--        padding: 0.5rem 1rem;--}}
{{--        background: #f3f3f3;--}}
{{--        border-radius: 20px;--}}
{{--        font-size: 0.875rem;--}}
{{--        font-weight: 600;--}}
{{--        color: #666;--}}
{{--        margin-bottom: 1rem;--}}
{{--    }--}}

{{--    .portfolio-title {--}}
{{--        font-size: 1.75rem;--}}
{{--        font-weight: 700;--}}
{{--        margin-bottom: 0.75rem;--}}
{{--        color: #333;--}}
{{--    }--}}

{{--    .portfolio-subtitle {--}}
{{--        font-size: 1rem;--}}
{{--        color: #666;--}}
{{--        margin-bottom: 1.5rem;--}}
{{--        line-height: 1.6;--}}
{{--    }--}}

{{--    .portfolio-link-btn {--}}
{{--        display: inline-flex;--}}
{{--        align-items: center;--}}
{{--        gap: 0.5rem;--}}
{{--        padding: 0.75rem 1.5rem;--}}
{{--        background: #333;--}}
{{--        color: #f3f3f3;--}}
{{--        text-decoration: none;--}}
{{--        border-radius: 6px;--}}
{{--        font-weight: 600;--}}
{{--        transition: background 0.3s ease;--}}
{{--    }--}}

{{--    .portfolio-link-btn:hover {--}}
{{--        background: #000;--}}
{{--        color: #fff;--}}
{{--    }--}}

{{--    .portfolio-link-btn i {--}}
{{--        font-size: 1rem;--}}
{{--    }--}}

{{--    .portfolio-image {--}}
{{--        flex: 0 0 400px;--}}
{{--        height: 300px;--}}
{{--        border-radius: 8px;--}}
{{--        overflow: hidden;--}}
{{--    }--}}

{{--    .portfolio-image img {--}}
{{--        width: 100%;--}}
{{--        height: 100%;--}}
{{--        object-fit: cover;--}}
{{--        transition: transform 0.3s ease;--}}
{{--    }--}}

{{--    .portfolio-content:hover .portfolio-image img {--}}
{{--        transform: scale(1.05);--}}
{{--    }--}}

{{--    /* Responsive Design */--}}
{{--    @media (max-width: 992px) {--}}
{{--        .portfolio-image {--}}
{{--            flex: 0 0 300px;--}}
{{--            height: 250px;--}}
{{--        }--}}
{{--    }--}}

{{--    @media (max-width: 768px) {--}}
{{--        .portfolio-content {--}}
{{--            flex-direction: column-reverse;--}}
{{--            padding: 1.5rem;--}}
{{--        }--}}

{{--        .portfolio-image {--}}
{{--            flex: 0 0 auto;--}}
{{--            width: 100%;--}}
{{--            height: 250px;--}}
{{--        }--}}

{{--        .portfolio-title {--}}
{{--            font-size: 1.5rem;--}}
{{--        }--}}
{{--    }--}}
{{--</style>--}}
