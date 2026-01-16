@extends('layouts.frontend-fullbg')

@section('title')
    @auth
        Technical Dictionaries
    @else
        PMWay
    @endauth
@endsection

@push('styles')
<style>
    /* Page background - same for both modes */
    .page-outer-bg {
        background-color: #27272a !important;
    }
    
    /* Content container - changes with theme */
    [data-bs-theme="light"] .content-container {
        background-color: #ffffff !important;
        color: #212529 !important;
    }
    
    [data-bs-theme="dark"] .content-container {
        background-color: #111827 !important;
        color: #e5e7eb !important;
    }
    
    /* Ensure Bootstrap components work in dark mode */
    [data-bs-theme="dark"] .content-container h1,
    [data-bs-theme="dark"] .content-container h2,
    [data-bs-theme="dark"] .content-container h3,
    [data-bs-theme="dark"] .content-container h4,
    [data-bs-theme="dark"] .content-container h5,
    [data-bs-theme="dark"] .content-container h6 {
        color: #ffffff !important;
    }
    
    [data-bs-theme="dark"] .content-container p,
    [data-bs-theme="dark"] .content-container div,
    [data-bs-theme="dark"] .content-container a:not(.btn) {
        color: #e5e7eb !important;
    }
    
    [data-bs-theme="dark"] .content-container a:not(.btn):hover {
        color: #60a5fa !important;
    }
</style>
@endpush

@section('content')
    @auth
        <div class="min-h-screen page-outer-bg">
            <div class="max-w-6xl mx-auto px-12 py-8" style="background-color: transparent !important;">
                <br><br>
                <div class="container content-container rounded-lg p-6">
                    <!-- ALL YOUR EXISTING CONTENT STAYS EXACTLY THE SAME -->
                    <h1>Technical Dictionaries &amp; Glossaries</h1>

                    <p>This page provides access to various technical dictionaries pertaining to the study of Scientology.</p>

                    <hr>
                    <div class="alert alert-warning" role="alert">
                        <div class="d-flex">
                            <div class="me-3">
                                <i class="fas fa-info-circle fa-2x"></i>
                            </div>
                            <div>
                                <h5 class="alert-heading">Important Notice</h5>
                                <p class="mb-1">What you find in this section is <strong>esoteric, philosophical, and for some, controversial</strong>.</p>
                                <p class="mb-1">This content is included in PMWay because I am interested in this subject, and much of the knowledge here has assisted me personally.</p>
                                <hr>
                                <p class="mb-0">
                                    <strong>Please note:</strong> If you do not have an enquiring mind and are not open to the material you find here,
                                    <a href="/" class="alert-link">you are asked to please leave</a>.
                                    <br>
                                    <em>Remember: What follows is simply a philosophical model. A model (map) can never fully claim to be the territory.</em>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">Online Dictionaries</h5>
                                    <ul class="list-unstyled">
                                        <li class="mb-2">
                                            <a href="/technologydict/contents.htm" target="_blank" class="text-decoration-none">
                                                <i class="fas fa-book me-2"></i>The Dictionary (Opens in new tab)
                                            </a>
                                        </li>
                                        <li class="mb-2">
                                            <a href="/atecdic/index.htm" target="_blank" class="text-decoration-none">
                                                <i class="fas fa-book-open me-2"></i>The LRH Free Dictionary (Opens in new tab)
                                            </a>
                                        </li>
                                        <li class="mb-2">
                                            <a href="/techdic/abcindex.htm" target="_blank" class="text-decoration-none">
                                                <i class="fas fa-book-reader me-2"></i>Another Technical Dictionary (Opens in new tab)
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">PDF Downloads</h5>
                                    <ul class="list-unstyled">
                                        <li class="mb-2">
                                            <a href="{{ route('techdict.technical') }}" target="_blank" class="text-decoration-none">
                                                <i class="fas fa-file-pdf me-2 text-danger"></i>Technical Dictionary as PDF
                                            </a>
                                        </li>
                                        {{--                                <li class="mb-2">--}}
                                        {{--                                    <a href="{{ route('techdict.master-glossary') }}" target="_blank" class="text-decoration-none">--}}
                                        {{--                                        <i class="fas fa-file-pdf me-2 text-danger"></i>Master Glossary as PDF--}}
                                        {{--                                    </a>--}}
                                        {{--                                </li>--}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle me-2"></i>
                            <strong>Note:</strong> The symlinks created earlier ensure that dictionary links work correctly.
                            All PDFs are stored in the <code>/technical dictionary/</code> folder.
                        </div>
                    </div>

                    <div class="mt-4 text-center">
                        <a href="/booklets/seagull" class="btn btn-outline-primary">
                            <i class="fas fa-arrow-left me-2"></i>Back to Ethics Booklets
                        </a>
                        <br><br>
                    </div>
                </div>
                <br><br>
            </div>
        </div>
    @endauth
@endsection
