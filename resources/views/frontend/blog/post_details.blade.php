<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description" content=""/>
    <script src="https://cdn.tailwindcss.com"></script>

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
{{--    <link rel="stylesheet" href="{{asset('frontend/assets/css/light-mode.css')}}"/>--}}
    <link rel="stylesheet" href="{{asset('frontend/assets/css/responsive.css')}}"/>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

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
    </style>

    <title>{{ $post->post_title }}</title>

    <!-- DARK MODE OVERRIDES - MUST LOAD LAST TO OVERRIDE EVERYTHING -->
    <style>
        /* ULTRA-AGGRESSIVE DARK MODE - MAXIMUM READABILITY */
        
        /* Force body background */
        html,
        body {
            background-color: #0a0614 !important;
            color: #f0f0f0 !important;
        }

        /* NUCLEAR OPTION - Override ALL possible white backgrounds */
        div[style*="background"],
        div[style*="background-color"],
        .card[style*="background"],
        .card-body[style*="background"],
        div[class*="bg-"],
        .bg-white,
        .bg-light,
        [class*="bg-white"],
        [class*="bg-light"] {
            background-color: #1a1526 !important;
            background: #1a1526 !important;
        }

        /* Force card backgrounds */
        .card,
        .card-body,
        div.card,
        div.card-body {
            background-color: #1a1526 !important;
            background: #1a1526 !important;
            border-color: #3d3550 !important;
        }

        /* Force all bordered divs to dark background */
        .border.rounded,
        div.border,
        [class*="border rounded"] {
            background-color: #252033 !important;
            background: #252033 !important;
            border-color: #3d3550 !important;
        }

        /* Main content area - better background */
        .tj-post__content,
        .tj-post-details__container {
            background-color: transparent !important;
            color: #f0f0f0 !important;
        }

        /* All text in post content - high contrast */
        .tj-post__content p,
        .tj-post__content li,
        .tj-post__content span,
        .tj-post__content div,
        .tj-post__content td,
        .tj-post__content th {
            color: #f0f0f0 !important;
            line-height: 1.8 !important;
        }

        /* Headings - pure white */
        h1, h2, h3, h4, h5, h6,
        .tj-post__title,
        .entry-title,
        .widget_title .title,
        .tag__title,
        .comment__title h3,
        .tj-comment__title,
        .comment-reply-title {
            color: #ffffff !important;
            font-weight: 600 !important;
        }

        /* Post title - extra emphasis */
        .tj-post__title,
        .entry-title {
            color: #ffffff !important;
            line-height: 1.3 !important;
        }

        /* Blockquotes */
        .tj-post__content blockquote {
            background-color: #252033 !important;
            border-left: 4px solid #5dade2 !important;
            padding: 1.5rem !important;
            margin: 1.5rem 0 !important;
            border-radius: 4px !important;
            color: #e8e8e8 !important;
        }

        /* Code blocks */
        .tj-post__content pre,
        .tj-post__content code {
            background-color: #1c1828 !important;
            color: #a8e6cf !important;
            border: 1px solid #3d3550 !important;
            border-radius: 4px !important;
            padding: 0.2rem 0.4rem !important;
        }

        .tj-post__content pre {
            padding: 1rem !important;
            overflow-x: auto !important;
        }

        .tj-post__content pre code {
            background: transparent !important;
            border: none !important;
            padding: 0 !important;
        }

        /* Links - bright and visible */
        a {
            color: #5dade2 !important;
            transition: color 0.2s ease !important;
        }

        a:hover {
            color: #85c1e9 !important;
        }

        /* Meta information */
        .tj-post__meta,
        .entry-meta {
            color: #b8b8b8 !important;
        }

        .tj-post__meta span,
        .tj-post__meta a,
        .entry-meta span,
        .entry-meta a {
            color: #b8b8b8 !important;
        }

        .tj-post__meta a:hover,
        .entry-meta a:hover {
            color: #5dade2 !important;
        }

        /* Tags */
        .tagcloud a,
        .tj_tag a {
            background-color: #252033 !important;
            color: #e8e8e8 !important;
            border: 1px solid #3d3550 !important;
            padding: 0.4rem 1rem !important;
            border-radius: 20px !important;
            margin: 0.25rem !important;
            display: inline-block !important;
        }

        .tagcloud a:hover,
        .tj_tag a:hover {
            background-color: #5dade2 !important;
            color: #ffffff !important;
            border-color: #5dade2 !important;
        }

        /* Images */
        .tj-post__content img,
        .tj-post__thumb img {
            border-radius: 8px !important;
            border: 1px solid #2d2638 !important;
            max-width: 100% !important;
            height: auto !important;
        }

        /* Tables */
        .tj-post__content table {
            width: 100% !important;
            border-collapse: collapse !important;
            margin: 1.5rem 0 !important;
        }

        .tj-post__content th,
        .tj-post__content td {
            padding: 0.75rem !important;
            border: 1px solid #3d3550 !important;
            color: #f0f0f0 !important;
        }

        .tj-post__content th {
            background-color: #252033 !important;
            font-weight: 600 !important;
        }

        .tj-post__content tr:nth-child(even) {
            background-color: #1c1828 !important;
        }

        /* Lists */
        .tj-post__content ul,
        .tj-post__content ol {
            padding-left: 2rem !important;
            margin: 1rem 0 !important;
        }

        .tj-post__content li {
            margin-bottom: 0.5rem !important;
            color: #f0f0f0 !important;
        }

        /* Strong and emphasis */
        .tj-post__content strong,
        .tj-post__content b {
            color: #ffffff !important;
            font-weight: 700 !important;
        }

        .tj-post__content em,
        .tj-post__content i {
            color: #e8e8e8 !important;
        }

        /* HR separators */
        hr {
            border-color: #3d3550 !important;
            opacity: 0.5 !important;
            margin: 2rem 0 !important;
        }

        /* Comments section */
        .tj-comments__container,
        .tj-comment__wrap,
        .comment-respond {
            background-color: transparent !important;
            color: #f0f0f0 !important;
        }

        .comment__text p,
        .avatar__name h5,
        .avatar__name span {
            color: #f0f0f0 !important;
        }

        .avatar__name a {
            color: #5dade2 !important;
        }

        /* Social share links */
        .share_link a {
            background-color: #252033 !important;
            color: #e8e8e8 !important;
            border: 1px solid #3d3550 !important;
            padding: 0.5rem 1rem !important;
            border-radius: 4px !important;
            margin: 0.25rem !important;
        }

        .share_link a:hover {
            background-color: #5dade2 !important;
            color: #ffffff !important;
        }

        /* Sidebar */
        .sidebar_widget *,
        .tj_main_sidebar * {
            color: #e8e8e8 !important;
        }

        .widget_title .title {
            border-bottom: 2px solid #5dade2 !important;
            padding-bottom: 0.75rem !important;
            margin-bottom: 1.5rem !important;
        }

        /* Recent posts */
        .recent-post_title a {
            color: #f0f0f0 !important;
            font-weight: 500 !important;
        }

        .recent-post_title a:hover {
            color: #5dade2 !important;
        }

        /* Form elements */
        input[type="text"],
        input[type="email"],
        textarea {
            background-color: #1c1828 !important;
            border: 1px solid #3d3550 !important;
            color: #f0f0f0 !important;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        textarea:focus {
            border-color: #5dade2 !important;
            outline: none !important;
        }

        /* Comment form */
        .form_group input,
        .form_group textarea {
            background-color: #1c1828 !important;
            border: 1px solid #3d3550 !important;
            color: #f0f0f0 !important;
            padding: 0.75rem !important;
        }

        .tj-post-comment__form label {
            color: #e8e8e8 !important;
        }

        /* Buttons */
        .btn {
            border-radius: 4px !important;
            transition: all 0.2s ease !important;
        }

        /* Override Bootstrap/inline white backgrounds */
        .bg-white,
        .bg-light,
        [style*="background-color:#f8f9fa"],
        [style*="background-color: #f8f9fa"],
        [style*="background:#f8f9fa"] {
            background-color: #1a1526 !important;
        }

        /* Fix text color in light background areas */
        .bg-white *,
        .bg-light *,
        [style*="background-color:#f8f9fa"] *,
        [style*="background:#f8f9fa"] * {
            color: #f0f0f0 !important;
        }

        /* Force center pagination */
        #recent-posts nav {
            display: block !important;
            width: 100% !important;
            text-align: center !important;
        }

        #recent-posts nav > div,
        #recent-posts nav > span {
            display: inline-block !important;
            text-align: center !important;
        }

        /* Override Tailwind pagination - ALL BUTTONS SAME SIZE */
        #recent-posts a.relative.inline-flex,
        #recent-posts a[class*="inline-flex"],
        #recent-posts span.relative.inline-flex,
        #recent-posts span[class*="inline-flex"] {
            background-color: #6c757d !important;
            background: #6c757d !important;
            color: #ffffff !important;
            border-color: #5a6268 !important;
            font-weight: 700 !important;
            font-size: 0.9rem !important;
            min-width: 35px !important;
            width: 35px !important;
            height: 35px !important;
            padding: 0 !important;
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            margin: 2px !important;
            text-align: center !important;
            vertical-align: middle !important;
        }

        #recent-posts a.relative.inline-flex:hover,
        #recent-posts a[class*="inline-flex"]:hover {
            background-color: #545b62 !important;
            color: #ffffff !important;
            border-color: #4e555b !important;
        }

        /* Target the ACTIVE/CURRENT page correctly */
        #recent-posts span[aria-current="page"],
        #recent-posts span.relative.inline-flex[aria-current="page"] {
            background-color: #e74c3c !important;
            color: #ffffff !important;
            border-color: #e74c3c !important;
        }

        /* Target all Tailwind utility classes in pagination */
        #recent-posts [class*="bg-white"],
        #recent-posts [class*="bg-gray-"] {
            background-color: #6c757d !important;
        }

        #recent-posts [class*="text-gray"] {
            color: #ffffff !important;
        }

        #recent-posts [class*="dark:bg-gray"] {
            background-color: #6c757d !important;
        }

        /* Fix SVG arrows */
        #recent-posts svg {
            width: 1em !important;
            height: 1em !important;
            color: #ffffff !important;
            fill: currentColor !important;
        }

        /* Hide mobile-only Previous/Next buttons that have the sm:hidden class */
        #recent-posts nav > span[class*="sm:hidden"] {
            display: none !important;
        }

        /* Hide elements with specific Tailwind responsive classes */
        #recent-posts [class*="sm:hidden"],
        #recent-posts .sm\:hidden {
            display: none !important;
        }
    </style>

<body>
<x-blog-loading-preloader/>
<!-- Header -->
@include('frontend.partials.headerLegacyBlog')

<main class="site-content" id="content">

    <!-- START: Breadcrumb Area -->
    <section class="breadcrumb_area" data-bg-image="{{ asset('frontend/assets/img/breadcrumb/breadcrumb-bg.jpg') }}"
             data-bg-color="#140C1C">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col text-center">
                    <div class="breadcrumb_content d-inline-flex flex-column align-items-center w-100">
                        <h2 class="title wow fadeInUp" data-wow-delay=".3s">{{ $post->post_title }}</h2><br><br>
                        <div class="d-flex justify-content-end w-100">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @php
        $comments = App\Models\Comment::where('post_id', $post->id)->where('status', 1)->get();
    @endphp

            <!-- START: Blog Section -->
    <section class="full-width tj-post-details__area">
        <div class="container">

            @php
                $firstPost = App\Models\BlogPost::where('approved', 1)->oldest()->first();
                $firstPostId = $firstPost->id;
            @endphp
            <div class="grid grid-cols-12">
                <div class="col-start-1 col-span-1 ">
                    <flux:breadcrumbs>
                        <div class="custom-breadcrumbs">
                            <flux:breadcrumbs>
                                <div class="custom-breadcrumbs">
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
                            </flux:breadcrumbs>
                        </div>
                    </flux:breadcrumbs>
                </div>
                <div>
                </div>
            </div>
            <h2></h2>
            <br><br>

            {{--        <span class="header-button">--}}
            {{--                    <a href="{{ url('/post/details/' . $firstPostId) }}" class="btn tj-btn-primary">List of Posts</a>--}}
            {{--                    </span>--}}

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="tj-post-details__container">


                        <article class="tj-single__post">
                            <div class="tj-post__thumb">
                                {{--                      <img src="{{asset($post->photo)}}" alt="" style="width: 1000px; height:400px;" />--}}
                                <img src="{{ $post->photo }}" alt="{{ $post->post_title }}" style="width: 100%; height:auto;"/>
                                {{--                      <a href="#" class="category">Tutorial</a>--}}
                            </div>

                            <div class="tj-post__content">
                                <div class="tj-post__meta entry-meta">
                                    <span><i class="fa-light fa-user"></i> <a href="#">By {{ $post->user->name ?? 'Unknown' }}</a></span>
                                    <span><i class="fa-light fa-calendar-days"></i> {{ $post->created_at->format('D M, Y') }}</span>
                                    <span><i class="fa-light fa-comments"></i><a href="#"> ({{ count($comments ?? []) }})</a></span>

                                </div>
                                <style>
                                    .compact-vote a i {
                                        font-size: 1.2rem !important; /* Makes arrows smaller */
                                    }
                                    .compact-vote h3 {
                                        font-size: 1rem !important; /* Makes vote count smaller */
                                        margin: 5px 0 !important;
                                    }
                                </style>

                                <h3 class="tj-post__title entry-title mb-4">{{ $post->post_title }}</h3>

                                <!-- Voting Box -->
                                <div class="card mb-4 shadow-sm" style="max-width: 500px; border: 2px solid #3d3550 !important; background-color: #1a1526 !important;">
                                    <div class="card-body p-3" style="background-color: #1a1526 !important;">
                                        <div class="row align-items-center">
                                            <!-- Vote Counter Box (Left Side) -->
                                            <div class="col-auto">
                                                <div class="border rounded p-2 text-center" style="min-width: 80px; background-color: #252033 !important; border-color: #3d3550 !important;">
                                                    <livewire:blog-post-votes
                                                            :blogPost="$post"
                                                            designTemplate="bootstrap"
                                                            :key="'post-votes-'.$post->id" />
                                                </div>
                                            </div>

                                            <!-- Instructions (Right Side) -->
                                            <div class="col">
                                                <h5 class="mb-1 fw-bold" style="color: #ffffff !important;">
                                                    <i class="fa fa-thumbs-up text-primary"></i> Vote for this post
                                                </h5>
                                                <p class="mb-0" style="font-size: 0.95rem; color: #e8e8e8 !important;">
                                                    Click the arrows to vote • 1 vote per logged in user
                                                    @guest
                                                        <br><a href="{{ route('login') }}" class="btn btn-sm btn-outline-primary mt-1">
                                                            <i class="fa fa-sign-in"></i> Login to Vote
                                                        </a>
                                                    @endguest
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <style>
                                    /* Force dark mode for cards (override light mode defaults) */
                                    .card {
                                        background-color: #1a1526 !important;
                                        border: 1px solid #3d3550 !important;
                                    }

                                    .card .border {
                                        background-color: #252033 !important;
                                        border-color: #3d3550 !important;
                                    }

                                    .text-muted {
                                        color: #b8b8b8 !important;
                                    }

                                    .card h5 {
                                        color: #ffffff !important;
                                    }

                                    .card p {
                                        color: #e8e8e8 !important;
                                    }

                                    /* Make vote icons slightly smaller and more compact */
                                    .card .fa-sort-asc,
                                    .card .fa-sort-desc {
                                        font-size: 1.5rem;
                                        color: #ffffff !important;
                                    }

                                    .card h3 {
                                        font-size: 1.5rem;
                                        font-weight: bold;
                                        color: #ffffff !important;
                                    }
                                </style>

                                <div class="tj-post__content" style="background-color: transparent !important; color: #f0f0f0 !important;">
                                    {!! $post->post_description !!}
                                </div>
                                
                                <!-- Force all content to be readable -->
                                <style>
                                    /* Ultra-specific selectors to override EVERYTHING in post content */
                                    .tj-post__content * {
                                        color: #f0f0f0 !important;
                                    }
                                    
                                    .tj-post__content div[style*="background"],
                                    .tj-post__content p[style*="background"],
                                    .tj-post__content span[style*="background"],
                                    .tj-post__content div[style*="color"],
                                    .tj-post__content p[style*="color"],
                                    .tj-post__content span[style*="color"] {
                                        background-color: transparent !important;
                                        background: transparent !important;
                                        color: #f0f0f0 !important;
                                    }
                                    
                                    .tj-post__content h1,
                                    .tj-post__content h2,
                                    .tj-post__content h3,
                                    .tj-post__content h4,
                                    .tj-post__content h5,
                                    .tj-post__content h6 {
                                        color: #ffffff !important;
                                    }
                                    
                                    .tj-post__content a {
                                        color: #5dade2 !important;
                                    }
                                    
                                    .tj-post__content strong,
                                    .tj-post__content b {
                                        color: #ffffff !important;
                                    }
                                </style>
                            </div>
                        </article>

                        @php
                            $tags = explode(',', $post->post_tags)
                        @endphp

                                <!-- post tags & social share -->
                        <div class="single-post_tag_share">
                            <!-- post tags -->
                            <div class="tj_tag">
                                <h4 class="tag__title">Tags:</h4>
                                <div class="tagcloud">
                                    @foreach ($tags as $tag)
                                        <a href="#"> {{ $tag }} </a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="share_link">
                                <a href="#"  class="facebook" title="Share this on Facebook"><i
                                            class="fa-brands fa-facebook-f"></i></a>
                                <a href="#" class="twitter" title="Share this on Twitter" ><i
                                            class="fa-brands fa-x-twitter"></i></a>
                                <a href="#" class="linkedin" title="Share this on Linkedin" ><i
                                            class="fa-brands fa-linkedin-in"></i></a>
                                <a href="#" class="pinterest" title="Pin this Post" ><i
                                            class="fa-brands fa-pinterest-p"></i></a>
                            </div>
                        </div>

                        <!-- comments area -->
                        <div class="tj-comments__container">
                            <div class="tj-comments__wrap">
                                <div class="tj-comment__title">
                                    <h3>{{ count($comments) }} Comments</h3>
                                </div>

                                <div class="tj-latest__comments">
                                    <ul>
                                        @unless (count($comments) < 1)
                                            @foreach ($comments as $comment)
                                                <li class="tj__comment">
                                                    <div class="tj-comment__wrap">
                                                        <div class="comment__avatar">
                                                            <img alt="" src="{{asset('uploads/no-img-avatar.png')}}"/>
                                                        </div>
                                                        <div class="comment__text">
                                                            <div class="avatar__name">
                                                                <h5><a href="#"> {{ $comment->user_name }} </a></h5>
                                                                <span>{{ $comment->created_at->format('M D, Y') }}</span>
                                                            </div>
                                                            <p>
                                                                {{ $comment->comment }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        @else
                                            <p>No Comment(s) found!! 😌😌</p>
                                        @endunless
                                    </ul>
                                </div>
                            </div>

                            <div class="comment-respond">
                                <h3 class="comment-reply-title">
                                    <span class="tj-comment__title">Leave a Comment</span>
                                </h3>

                                <form method="POST" action="{{ route('store.comment') }}" class="tj-post-comment__form">
                                    @csrf
                                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form_group">
                                                <input placeholder="Enter Name" id="author" name="name" type="text"
                                                       aria-required="true"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form_group">
                                                <input placeholder="Enter Email" id="email" name="user_email"
                                                       type="email"
                                                       aria-required="true"/>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form_group">
                                  <textarea class="msg-box" placeholder="Enter Your Comments" id="comment"
                                            name="comment" cols="45" rows="8"></textarea>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>

                                    <button class="tj-btn-primary submit" type="submit">Post Comment</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4">
                    <div class="tj_main_sidebar">
                        <!--Two ways of searching:  Livewire-->

                        <div class="sidebar_widget widget_search wow fadeInUp" data-wow-delay=".3s">
                            <div class="tj-widget__search form_group">
                                <p>List of search results:</p>
                                @livewire('lwsearch')
                            </div>
                        </div>
                        @php
                            $rposts = App\Models\BlogPost::where('approved', 1)->latest()->paginate(10);
                        @endphp

                                <!--Two ways of searching:  Traditional came with blog-->
                        @auth
                            <div class="sidebar_widget widget_search wow fadeInUp" data-wow-delay=".3s">
                                <p>Cards of search results:</p>
                                <div class="tj-widget__search form_group">

                                    <form class="search-form" action="{{ route('usersearch') }}" method="get">
                                        <input type="search" id="search" name="search" placeholder="Search..."
                                               value="{{ request()->input('search') }}"/>
                                        <button class="search-btn" type="submit"><i
                                                    class="fa-light fa-magnifying-glass"></i></button>
                                    </form>
                                </div>
                            </div>
                        @endauth

                        <div id="recent-posts" class="sidebar_widget tj_recent_posts wow fadeInUp" data-wow-delay=".3s">
                            <div class="widget_title">
                                <h3 class="title">Recent posts</h3>
                            </div>
                            <ul>
                                {{ $rposts->fragment('recent-posts')->links() }}

                                <br>
                                @foreach ($rposts as $rpost)
                                    @php $comments = App\Models\Comment::where('post_id', $rpost->id)->where('status', 1)->get(); @endphp
                                    <li>
                                        <div class="recent-post_thumb">
                                            <a href="/post/details/{{ $rpost->id }}">
                                                <img src="{{ $rpost->photo }}" alt="{{ $rpost->post_title }}"/>
                                            </a>
                                        </div>
                                        <div class="recent-post_content">
                                            <div class="tj-post__meta entry-meta">
                                                <span><i class="fa-light fa-calendar-days"></i> {{ $rpost->created_at->format('M, Y') }} </span>
                                                <span><i class="fa-light fa-comments"></i><a href="#"> ({{ count($comments) }})</a></span>
                                            </div>
                                            <h4 class="recent-post_title">
                                                <a href="/post/details/{{ $rpost->id }}">{{ Str::limit($rpost->post_title, 30) }}</a>
                                            </h4>
                                        </div>
                                    </li>
                                @endforeach
                                {{ $rposts->fragment('recent-posts')->links() }}

                            </ul>
                        </div>
                        <div class="sidebar_widget widget_tag_cloud wow fadeInUp" data-wow-delay=".3s">
                            <div class="widget_title">
                                <h3 class="title">Popular tag</h3>
                            </div>
                            <div class="tagcloud">
                                @php $tags = explode(',', $post->post_tags) @endphp
                                @foreach ($tags as $tag)
                                    <a href="#"> {{ $tag }} </a>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @if (isset($posts))
                        <div class="row">
                            @if ($posts->isNotEmpty())
                                @foreach ($posts as $post)
                                    @php $comments = App\Models\Comment::where('post_id', $post->id)->where('status', 1)->get(); @endphp
                                    <div class="col-lg-4 col-md-6">
                                        <div class="blog-item wow fadeInUp" data-wow-delay=".5s">
                                            <div class="blog-thumb">
                                                <a href="/post/details/{{ $post->id }}">
                                                    <img src="{{ $post->photo }}" alt="{{ $post->post_title }}"/>
                                                </a>
                                            </div>
                                            <div class="blog-content">
                                                <div class="blog-meta">
                                                    <ul class="ul-reset">
                                                        <li>
                                                            <i class="fa-light fa-calendar-days"></i> {{ $post->created_at->format('D M, Y') }}
                                                        </li>
                                                        <li><i class="fa-light fa-comments"></i> <a href="#">Comment
                                                                ({{ count($comments ?? []) }})</a></li>
                                                    </ul>
                                                </div>
                                                <h3 class="blog-title">
                                                    href="/post/details/{{ $post->id }}">{{ Str::limit($post->post_title, 40) }}</a>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                {{--                           {{ $posts->links() }}--}}
                            @else
                                <p>No Post found!! </p>
                            @endif
                        </div>
                    @endif

                </div>
            </div>
        </div>


        <!-- Spacing Before Most Voted Section -->


        <!-- Most Voted Posts Section -->
{{--        <div class="container-fluid px-0">--}}
{{--            <div class="row g-0">--}}
{{--                <!-- Full width container that respects 2-11 columns -->--}}
{{--                <div class="col-12 col-lg-10 offset-lg-1 px-3 px-lg-4">--}}

                    <!-- Section Header -->
{{--                    <div class="text-center mb-4">--}}
{{--                        <h2 class="fw-bold  mb-2">--}}
{{--                            <i class="fa fa-trophy text-warning fa-lg"></i>--}}
{{--                            Top Rated Posts--}}
{{--                        </h2>--}}
{{--                        <br>--}}
{{--                        <p class="lead text-white-50  mb-0">--}}
{{--                            Discover the community's favorite blog posts--}}
{{--                        </p>--}}
{{--                    </div>--}}

{{--                    <!-- Most Voted Component (FULL WIDTH) -->--}}
{{--                    <livewire:most-voted-posts--}}
{{--                            :limit="10"--}}
{{--                            designTemplate="bootstrap" />--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

        <!-- Bottom Spacing -->
{{--        <div class="mb-5 pb-4"></div>--}}

        <style>
            /* Dark mode for Bootstrap themed sections */
            [data-bs-theme="dark"] h2,
            [data-bs-theme="dark"] .lead {
                color: #ffffff !important;
            }

            [data-bs-theme="dark"] .text-muted {
                color: #b8b8b8 !important;
            }

            [data-bs-theme="dark"] hr {
                border-color: #3d3550 !important;
                opacity: 0.5 !important;
            }
        </style>

    </section>
    <!-- END: Blog Section -->


</main>

<!-- FOOTER AREA START -->
<x-footer/>
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
    @if(Session::has('message'))
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

<!-- FINAL DARK MODE OVERRIDE - LOADS ABSOLUTELY LAST -->
<style>
    /* This style block loads AFTER everything else - maximum specificity */
    
    /* Force ALL backgrounds to dark */
    body, html, main, section, div, article, aside {
        background-color: transparent !important;
    }
    
    body {
        background-color: #0a0614 !important;
    }
    
    /* Target white panels by computed color */
    .card,
    .card-body,
    [class*="card"],
    div[class*="bg-"],
    .border.rounded {
        background-color: #1a1526 !important;
        background: #1a1526 !important;
        border-color: #3d3550 !important;
    }
    
    /* Force ALL text to be light */
    body, body *, div, div *, p, p *, span, span *, li, li * {
        color: #f0f0f0 !important;
    }
    
    /* Headings white */
    h1, h1 *, h2, h2 *, h3, h3 *, h4, h4 *, h5, h5 *, h6, h6 * {
        color: #ffffff !important;
    }
    
    /* Links blue */
    a:not(.btn) {
        color: #5dade2 !important;
    }
    
    /* Forms dark */
    input, textarea, select {
        background-color: #1c1828 !important;
        border-color: #3d3550 !important;
        color: #f0f0f0 !important;
    }
    
    /* Buttons keep their colors */
    .btn {
        color: inherit !important;
    }
    
    /* Override any inline styles */
    [style*="color: #000"],
    [style*="color:#000"],
    [style*="color: black"],
    [style*="color:black"],
    [style*="color: rgb(0"],
    div[style*="color"],
    p[style*="color"],
    span[style*="color"] {
        color: #f0f0f0 !important;
    }
    
    [style*="background: #fff"],
    [style*="background:#fff"],
    [style*="background: white"],
    [style*="background:white"],
    [style*="background-color: #fff"],
    [style*="background-color:#fff"],
    [style*="background-color: white"],
    [style*="background-color:white"],
    div[style*="background"],
    [style*="background-color: rgb(255"] {
        background-color: #1a1526 !important;
        background: #1a1526 !important;
    }
</style>

<!-- Strip white backgrounds with JavaScript -->
<script>
window.addEventListener('load', function() {
    // Find all elements with inline background styles
    const allElements = document.querySelectorAll('[style]');
    
    allElements.forEach(el => {
        const style = el.getAttribute('style');
        if (style) {
            // Remove white/light backgrounds from inline styles
            let newStyle = style
                .replace(/background-color\s*:\s*#fff\s*;?/gi, 'background-color:#1a1526;')
                .replace(/background-color\s*:\s*white\s*;?/gi, 'background-color:#1a1526;')
                .replace(/background-color\s*:\s*#f8f9fa\s*;?/gi, 'background-color:#1a1526;')
                .replace(/background-color\s*:\s*rgb\(255,\s*255,\s*255\)\s*;?/gi, 'background-color:#1a1526;')
                .replace(/background\s*:\s*#fff\s*;?/gi, 'background:#1a1526;')
                .replace(/background\s*:\s*white\s*;?/gi, 'background:#1a1526;')
                .replace(/color\s*:\s*#000\s*;?/gi, 'color:#f0f0f0;')
                .replace(/color\s*:\s*black\s*;?/gi, 'color:#f0f0f0;')
                .replace(/color\s*:\s*rgb\(0,\s*0,\s*0\)\s*;?/gi, 'color:#f0f0f0;');
            
            el.setAttribute('style', newStyle);
        }
    });
});
</script>
@include('frontend.partials.scroll-to-top')

</body>
</html>