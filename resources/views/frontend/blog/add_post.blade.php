<!DOCTYPE html>
{{-- Legacy Blog --}}
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
    {{--
    <link rel="apple-touch-icon" href=" {{asset('frontend/assets/img/favicon.png')}} " />--}}
    {{--
    <link rel="shortcut icon" type="image/png" href="{{asset('frontend/assets/img/favicon.png')}}" />--}}

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

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    {{--
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>--}}
    {{-- <--NB valid Api key needed-->--}}

        {{--
        <script src="https://cdn.jsdelivr.net/npm/tinymce@6/tinymce.min.js"></script>--}}
        <script src="{{ asset('js/tinymce/js/tinymce/tinymce.min.js') }}"></script>


</head>
<x-blog-loading-preloader />

<body>
    <style>
        .btn.tj-btn-primary {
            position: relative;
        }

        .btn.tj-btn-primary::after {
            content: '';
            position: absolute;
            width: 0;
            height: 1px;
            /* Changed from 2px to 1px */
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
            color: #ccc !important;
            /* Change to your desired hover color */
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

        .custom-breadcrumbs {
            white-space: nowrap;
        }
    </style>
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

    <!-- start: Back To Top -->
    <div class="progress-wrap" id="scrollUp">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- end: Back To Top -->
    <main class="site-content" id="content">
        @php
        $firstPost = App\Models\BlogPost::where('approved', 1)->oldest()->first();
        $firstPostId = $firstPost->id;
        @endphp
        <!-- START: Breadcrumb Area -->

        <section class="breadcrumb_area" data-bg-image="{{ asset('frontend/assets/img/breadcrumb/breadcrumb-bg.jpg') }}"
            data-bg-color="#140C1C">
            <div class="container">
                <div class="row">

                    <div class="col">
                        <div class="breadcrumb_content d-flex flex-column align-items-end">
                            <div class="breadcrumb_navigation wow fadeInUp" data-wow-delay=".5s">
                                {{-- <span class="header-button ms-3">--}}
                                    {{-- <a href="{{ url('/blog') }}" class="btn tj-btn-primary">Back</a>--}}
                                    {{-- </span>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- END: Breadcrumb Area -->

        <!-- START: Blog Section -->
        <section class="full-width tj-post-details__area">
            <div class="container">
                <div class="grid grid-cols-12">
                    <div class="col-start-1 col-span-1 ">
                        <flux:breadcrumbs>
                            <div class="custom-breadcrumbs">
                                <flux:breadcrumbs>
                                    <div class="custom-breadcrumbs">
                                        <flux:breadcrumbs>
                                            <flux:breadcrumbs.item class="{{ Request::is('/') ? 'active' : '' }}"
                                                href="/" separator="slash">Home</flux:breadcrumbs.item>
                                            <flux:breadcrumbs.item class="{{ Request::is('blog') ? 'active' : '' }}"
                                                href="/blog" separator="slash">Blog</flux:breadcrumbs.item>
                                            <flux:breadcrumbs.item
                                                class="{{ Request::is('post/details/*') ? 'active' : '' }}"
                                                href="{{ url('/post/details/' . $firstPostId) }}" separator="slash">
                                                Posts</flux:breadcrumbs.item>
                                            <flux:breadcrumbs.item
                                                class="{{ Request::is('useraddpost/') ? 'active' : '' }}"
                                                href="{{ url('/useraddpost/') }}">Add Post</flux:breadcrumbs.item>
                                        </flux:breadcrumbs>
                                    </div>
                                </flux:breadcrumbs>
                            </div>
                        </flux:breadcrumbs>
                    </div>
                </div>
                {{-- <div class="flex justify-center items-center">--}}
                    {{-- <img src="{{ asset('images/kiss.png') }}" alt="Keep it Sweet and Simple">--}}

                    {{-- </div>--}}
                <br><br>
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="tj-post-details__container">
                            <div id="idea-box" class="p-3 rounded-3 border" style="display:inline-block; max-width:100%;">

                                <p class="m-0">
                                    In the spirit of sharing knowledge and growing in our project management profession I am looking for any ideas and experience you would like to share.  I will format your ideas for your post and attribute it to you.
                                </p>
                            </div>
                            <br>
                            <br>
                            <form class="forms-sample" method="POST" action="{{ route('user.store.post') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label for="post_title" class="col-sm-3 col-form-label">Post Title</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control @error('post_title') is-invalid @enderror"
                                            name="post_title" placeholder="Post Title" value="{{ old('post_title') }}"
                                            required>
                                        @error('post_title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="post_tags" class="col-sm-3 col-form-label">Post Tags <br>(CSV: Comma
                                        Separated Values)</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('post_tags') is-invalid @enderror"
                                            name="post_tags" placeholder="Tag1, Tag2 etc."
                                            value="{{ old('post_tags') }}" required>
                                        @error('post_tags')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="post_description" class="col-sm-3 col-form-label">Post Content</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control @error('post_description') is-invalid @enderror"
                                            id="tinymceExample" name="post_description"
                                            rows="10">{{ old('post_description') }}</textarea>
                                        @error('post_description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="post_photo" class="col-sm-3 col-form-label">Post Photo</label>
                                    <div class="col-sm-9">
                                        <input class="form-control @error('post_photo') is-invalid @enderror"
                                            name="post_photo" type="file" id="Image" required>
                                        @error('post_photo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">
                                        <img id="ShowImage" src="{{ asset('uploads/no_image.jpg') }}" alt=""
                                            style="width: 90px; height: 90px">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-secondary">Add Post</button>
                            </form>
                        </div>
                        <br><br>
                        <div id="idea-box" class="p-3 rounded-3 border" style="display:inline-block; max-width:100%;">
                            <p class="m-0">
                            Note: An email will be sent to the Webmaster when you add this post so it can be edited, approved and moved into the blog.
                            </p>
                        </div>

                    </div>
                </div>
            </div>
            <div class="flex flex-col justify-center items-center">
                <br><br>
                <h2 class="bold text-[#fcf0da] text-4xl">Remember: Keep it Sweet and Short and Simple</h2>


                <img src="/storage/images/kissimage.jpg" alt="Keep it Sweet and Simple" class="mb-4 mt-4">
                <!-- <img src="{{ asset('images/kissimage2.jpg') }}" alt="Keep it Sweet and Simple" class="mb-4"> -->

            </div>


    </main>

    <!-- FOOTER AREA START -->
    <x-footer />
    <!-- FOOTER AREA END -->

    <!-- CSS here -->
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
        tinymce.init({
            selector: '#tinymceExample',
            height: 300,
            plugins: 'advlist autolink lists link image charmap print preview anchor',
            toolbar: 'undo redo | blocks | bold italic forecolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help'
        });
    </script>


    <script>
        @if (Session:: has('message'))
        var type = "{{ Session::get('alert-type','info') }}"
        switch (type) {
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
    <script>
        $(document).ready(function () {
            $('#Image').on('change', function (e) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#ShowImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        })
    </script>


</body>

</html>
