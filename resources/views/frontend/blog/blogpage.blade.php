<!DOCTYPE html>
<!--Top 6 posts-->
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description" content=""/>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Site Title -->
    <title>Blog</title>
    <!-- Place favicon.ico in the root directory -->
    {{--   <link rel="apple-touch-icon" href=" {{asset('frontend/assets/img/favicon.png')}} " />--}}
    {{--   <link rel="shortcut icon" type="image/png" href="{{asset('frontend/assets/img/favicon.png')}}" />--}}
    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/animate.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('frontend/assets/css/font-awesome-pro.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('frontend/assets/css/flaticon_gerold.css')}}"/>
    <link rel="stylesheet" href="{{asset('frontend/assets/css/nice-select.css')}}"/>
    <link rel="stylesheet" href="{{asset('frontend/assets/css/backToTop.css')}}"/>
    <link rel="stylesheet" href="{{asset('frontend/assets/css/owl.carousel.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('frontend/assets/css/swiper.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('frontend/assets/css/odometer-theme-default.css')}}"/>
    <link rel="stylesheet" href="{{asset('frontend/assets/css/magnific-popup.css')}}"/>
    <link rel="stylesheet" href="{{asset('frontend/assets/css/main.css')}}"/>
    <link rel="stylesheet" href="{{asset('frontend/assets/css/light-mode.css')}}"/>
    <link rel="stylesheet" href="{{asset('frontend/assets/css/responsive.css')}}"/>
    <link rel="stylesheet" href="{{ url('css/fontawesome6') }}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <style>
        .wow {
            visibility: hidden;
        }
    </style>
</head>
<body oncontextmenu="return false" ondragstart="return true" onselectstart="return false">
<!-- Preloader Area Start -->
<div class="preloader">
    <svg viewBox="0 0 1000 1000" preserveAspectRatio="none">
        <path id="preloaderSvg" d="M0,1005S175,995,500,995s500,5,500,5V0H0Z"></path>
    </svg>
    <div class="preloader-heading">
        <div class="load-text">
            <span>L</span>
            <span>o</span>
            <span>a</span>
            <span>d</span>
            <span>i</span>
            <span>n</span>
            <span>g</span>
        </div>
    </div>
</div>
<!-- Preloader Area End -->

<!-- Header -->
@include('frontend.partials.headerLegacyBlog')

<!-- Main Content -->
<main>
    @include('frontend.partials.blog')
</main>

<!-- Footer (if you have one) -->
@include('components.footerbs')
@include('frontend.partials.scroll-to-top')

<!-- JS here -->
<script src="{{asset('frontend/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/jquery.meanmenu.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/swiper.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/parallax.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/backToTop.js')}}"></script>
<script src="{{asset('frontend/assets/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/jquery.counterup.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/waypoints.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/ajax-form.js')}}"></script>
<script src="{{asset('frontend/assets/js/wow.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/odometer.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/appear.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/main.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</body>
</html>
