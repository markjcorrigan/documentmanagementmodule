<title>Blog</title>
{{-- INFO: Fixed Responsive Blog Landing Page | PAGE: blog.blade.php | route: /blog --}}
<x-blog-loading-preloader />

<section class="breadcrumb_area" data-bg-image="{{ asset('frontend/assets/img/breadcrumb/breadcrumb-bg.jpg') }}"
         data-bg-color="#140C1C">
    <div class="container">
        @php
            $firstPost = App\Models\BlogPost::where('approved', 1)->oldest()->first();
            $firstPostId = $firstPost ? $firstPost->id : null;
        @endphp

        <div class="row justify-content-end">
            <div class="col-auto">
                <div class="d-flex justify-content-end align-items-center">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="blog-section" id="blog-section" style="padding-top: 60px; padding-bottom: 60px;">

    <style>
        .btn.tj-btn-primary {
            position: relative;
        }

        .btn.tj-btn-primary::after {
            content: '';
            position: absolute;
            width: 0;
            height: 1px;
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

        /* Critical mobile fixes */
        .blog-item {
            margin-bottom: 30px;
            position: relative;
            z-index: 1;
            height: 100%;
        }

        /* Dark/Light theme support for blog items */
        body.light-mode .blog-item {
            background: #fff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        body.dark-mode .blog-item {
            background: #1a1a2e;
            box-shadow: 0 2px 10px rgba(0,0,0,0.3);
        }

        /* Section title theme support */
        body.light-mode .section-title {
            color: #1a1a2e;
        }

        body.dark-mode .section-title {
            color: #fff;
        }

        /* Blog content theme support */
        body.light-mode .blog-content {
            color: #333;
        }

        body.dark-mode .blog-content {
            color: #e0e0e0;
        }

        body.light-mode .blog-title a {
            color: #1a1a2e;
        }

        body.dark-mode .blog-title a {
            color: #fff;
        }

        /* Ensure proper column behavior on mobile */
        @media (max-width: 575px) {
            .blog-item {
                margin-bottom: 50px !important;
            }

            .section-header {
                margin-bottom: 60px !important;
            }

            /* Force proper spacing between cards on mobile */
            .col-12 {
                margin-bottom: 20px;
            }
        }

        /* Ensure each column has proper spacing */
        .blog-section .row > [class*="col-"] {
            margin-bottom: 30px;
            display: flex;
            flex-direction: column;
        }

        /* Ensure images are responsive */
        .blog-thumb {
            position: relative;
            overflow: hidden;
            width: 100%;
        }

        .blog-thumb img {
            width: 100%;
            height: auto;
            display: block;
            object-fit: cover;
        }

        /* Prevent card content overflow */
        .blog-content {
            word-wrap: break-word;
            overflow-wrap: break-word;
            padding: 20px;
        }

        /* Fix Bootstrap columns on mobile */
        .row {
            margin-left: -15px;
            margin-right: -15px;
        }

        .row > [class*="col-"] {
            padding-left: 15px;
            padding-right: 15px;
        }

        /* Ensure section spacing */
        .section-header {
            margin-bottom: 80px;
        }

        /* Add extra space on mobile */
        @media (max-width: 575px) {
            .section-header {
                margin-bottom: 60px !important;
            }
        }
    </style>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="custom-breadcrumbs wow fadeIn" data-wow-delay=".5s" style="margin-bottom: 30px;">
                    <flux:breadcrumbs>
                        <flux:breadcrumbs.item class="{{ Request::is('/') ? 'active' : '' }}" href="/"
                                               separator="slash">Home
                        </flux:breadcrumbs.item>
                        <flux:breadcrumbs.item class="{{ Request::is('blog') ? 'active' : '' }}"
                                               href="/blog" separator="slash">Blog
                        </flux:breadcrumbs.item>
                        <flux:breadcrumbs.item
                            class="{{ Request::is('post/details/*') ? 'active' : '' }}"
                            href="{{ url('/post/details/' . $firstPostId) }}" separator="slash">Posts
                        </flux:breadcrumbs.item>
                    </flux:breadcrumbs>
                </div>
            </div>

            <div class="col-12">
                <div class="section-header text-center">

                    <br><br>
                    <h2 class="section-title wow fadeInUp" data-wow-delay=".3s">For 6 latest posts scroll down </h2>
                    <br><br>
{{--                    <div class="text-center mb-4">--}}
{{--                        <a href="{{ route('most.voted') }}" class="btn btn-warning btn-lg">--}}
{{--                            <i class="fa fa-trophy"></i> For most voted posts click here--}}
{{--                        </a>--}}
{{--                    </div>--}}
                    <span class="breadcrumb_navigation wow fadeInUp" data-wow-delay=".5s"></span>

                    <p class="wow fadeInUp" data-wow-delay=".4s">
                        @auth
                        <p>To share your own ideas click the button below,<br> or via WriteStuff in the menu above.</p><br>
                            <span class="header-button ms-3">
                            <a href="{{ route('user.add.post') }}" class="btn tj-btn-primary">Share Your Ideas</a>
                        </span>&nbsp;&nbsp;&nbsp;

                        @endauth
                    </p>
                </div>
            </div>
        </div>

        <div class="row" style="margin-top: 30px;">
            @php
                $posts = App\Models\BlogPost::where('approved', 1)->latest()->limit(6)->get();
            @endphp

            @unless (count($posts) == 0)
                @foreach ($posts as $post)
                    @php
                        $comments = App\Models\Comment::where('post_id', $post->id)->where('status', 1)->get();
                    @endphp
                    <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                        <div class="blog-item wow fadeInUp" data-wow-delay=".5s">
                            <div class="blog-thumb">
                                <a href="/post/details/{{ $post->id }}">
                                    <img src="{{ asset('storage/images/' . basename($post->photo)) }}" alt="{{ $post->post_title }}" />
                                </a>
                            </div>

                            <div class="blog-content">
                                <div class="blog-meta">
                                    <ul class="ul-reset">
                                        <li>
                                            <i class="fa-light fa-calendar-days"></i> {{ $post->created_at->format('D M, Y')}}
                                        </li>
                                        <li><i class="fa-light fa-comments"></i> <a href="#">Comment
                                                ({{ count($comments) }})</a></li>
                                    </ul>
                                </div>
                                <h3 class="blog-title"><a href="/post/details/{{ $post->id }}">{{ Str::limit($post->post_title, 40) }}</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12">
                    <p class="text-center">No Post found!! 😌😌</p>
                </div>
            @endunless
        </div>
    </div>
</section>
