<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Site Title -->
    <title>Blog</title>

    <!-- Place favicon.ico in the root directory -->
    {{--   <link rel="apple-touch-icon" href=" {{asset('frontend/assets/img/favicon.png')}} " />--}}
    {{--   <link rel="shortcut icon" type="image/png" href="{{asset('frontend/assets/img/favicon.png')}}" />--}}

    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/animate.min.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/assets/css/font-awesome-pro.min.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/assets/css/flaticon_gerold.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/assets/css/nice-select.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/assets/css/backToTop.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/assets/css/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/assets/css/swiper.min.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/assets/css/odometer-theme-default.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/assets/css/magnific-popup.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/assets/css/main.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/assets/css/light-mode.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/assets/css/responsive.css')}}" />

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

    <style>
        .btn.tj-btn-primary {
            position: relative;
        }

        .btn.tj-btn-primary::after {
            content: '';
            position: absolute;
            width: 0;
            height: 1px; /* Changed from 2px to 1px */
            bottom: 0;
            left: 50%;
            background-color: #fff;
            transition: all 0.3s ease-in-out;
        }

        .btn.tj-btn-primary:hover::after {
            width: 100%;
            left: 0;
        }

        .custom-breadcrumbs a {
            color: white !important;
        }

        .custom-breadcrumbs a:hover {
            color: #ccc !important; /* Change to your desired hover color */
        }


        .custom-breadcrumbs a[href*="{{ Request::url() }}"] {
            text-decoration: underline;
        }

        .custom-breadcrumbs .active {
            text-decoration: underline;
            text-decoration-color: white;
            text-underline-offset: 4px;
            text-decoration-thickness: 2px;
        }
    </style>

</head>

<body>
<x-blog-loading-preloader />
<!-- Header -->
@include('frontend.partials.headerLegacyBlog')


@php
    $firstPost = App\Models\BlogPost::where('approved', 1)->oldest()->first();
    $firstPostId = $firstPost->id;
@endphp

<main class="site-content" id="content">
<section class="breadcrumb_area" data-bg-image="{{ asset('frontend/assets/img/breadcrumb/breadcrumb-bg.jpg') }}" data-bg-color="#140C1C">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col text-center">
                <div class="breadcrumb_content d-inline-flex flex-column align-items-center">
                    <h2 class="title wow fadeInUp" data-wow-delay=".3s">Search Results for "{{ $query }}"</h2>
                    <span class="breadcrumb_navigation wow fadeInUp" data-wow-delay=".5s">
                             </span>
                </div>
            </div>
        </div>
    </div>

</section>
    <section class="full-width tj-post-details__area">
        <div class="container">
            <div class="grid grid-cols-12">
                <div class="col-start-1 col-span-1 ">
                    <flux:breadcrumbs >

                        <div class="custom-breadcrumbs">
                            <flux:breadcrumbs>
                                <div class="custom-breadcrumbs">
                                    <flux:breadcrumbs>
                                        <flux:breadcrumbs.item class="{{ Request::is('/') ? 'active' : '' }}" href="/" separator="slash">Home</flux:breadcrumbs.item>
                                        <flux:breadcrumbs.item class="{{ Request::is('blog') ? 'active' : '' }}" href="/blog" separator="slash">Blog</flux:breadcrumbs.item>
                                        <flux:breadcrumbs.item class="{{ Request::is('post/details/*') ? 'active' : '' }}" href="{{ url('/post/details/' . $firstPostId) }}" separator="slash">Posts</flux:breadcrumbs.item>
                                        <flux:breadcrumbs.item class="{{ Request::is('search/*') ? 'active' : '' }}" href="{{ url('/search/*') }}">Search</flux:breadcrumbs.item>
                                    </flux:breadcrumbs>
                                </div>

                            </flux:breadcrumbs>
                        </div>
                    </flux:breadcrumbs>
                </div>
            </div>
        </div>
            <h2></h2>
            <br><br>

        <div class="container">

            <div class="row">
                @if ($posts->isNotEmpty())
                    @foreach ($posts as $post)
                        @php $comments = App\Models\Comment::where('post_id', $post->id)->where('status', 1)->get(); @endphp
                        <div class="col-lg-4 col-md-6">
                            <div class="blog-item wow fadeInUp" data-wow-delay=".5s">
                                <div class="blog-thumb">
                                    <a href="/post/details/{{ $post->id }}">
                                        <img src="{{asset($post->photo)}}" alt="" />
                                    </a>
                                </div>
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <ul class="ul-reset">
                                            <li><i class="fa-light fa-calendar-days"></i> {{ $post->created_at->format('D M, Y')}} </li>
                                            <li><i class="fa-light fa-comments"></i> <a href="#">Comment ({{ count($comments) }})</a></li>
                                        </ul>
                                    </div>
                                    <h3 class="blog-title"><a href="/post/details/{{ $post->id }}">{{ Str::limit($post->post_title, 40) }}</a></h3>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{ $posts->links() }}
                @else
                    <p>No Post found!! </p>
                @endif
            </div>

    </section>


    <x-footer />
</main>

<script src="{{asset('frontend/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/nice-select.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/backToTop.js')}}"></script>
<script src="{{asset('frontend/assets/js/smooth-scroll.js')}}"></script>
<script src="{{asset('frontend/assets/js/appear.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/wow.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/gsap.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/one-page-nav.js')}}"></script>
<script src="{{asset('frontend/assets/js/lightcase.js')}}"></script>
<script src="{{asset('frontend/assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/swiper.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/imagesloaded-pkgd.js')}}"></script>
<script src="{{asset('frontend/assets/js/isotope.pkgd.min.j')}}s"></script>
<script src="{{asset('frontend/assets/js/odometer.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/magnific-popup.js')}}"></script>
<script src="{{asset('frontend/assets/js/validate.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/main.js')}}"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch(type){
        case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;

        case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;

        case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;

        case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
    }
    @endif
</script>
</body>
</html>

