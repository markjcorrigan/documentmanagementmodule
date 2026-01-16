@extends('layouts.frontend-fullbg')

@section('title')
    @auth
        Ethics
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

        /* Card hover effect */
        .resource-card {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .resource-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        [data-bs-theme="dark"] .resource-card:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5);
        }
    </style>
@endpush

@section('content')
    @auth
        <!--BODY-->
        <div class="min-h-screen page-outer-bg">
            <div class="max-w-6xl mx-auto px-12 py-8" style="background-color: transparent !important;">
                <br><br>
                <div class="container content-container rounded-lg p-6">
                    <br>
                    <h3 class="text-center mb-4">Other links about Scientology</h3>

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

                                    <a href="/" class="alert-link"><u>you are asked to please leave now.</u></a>
                                    <br>
                                    <em>Remember: What follows is simply a philosophical model. A model (map) can never fully claim to be the territory.</em>
                                </p>
                            </div>
                        </div>
                    </div>

                    <p align="center"><img alt="all models are wrong" class="img-fluid" src="/storage/images/modelsarewrong.png"></p>

                    <div class="alert alert-info mt-4">
                        <i class="fas fa-info-circle me-2"></i>
                        <strong>Note:</strong> These resources are protected and require proper authorization to access.
                    </div>



                    <div class="row g-4">
                        <!-- Scientology Lectures -->
                        <div class="col-md-6 col-lg-4">
                            <div class="card resource-card h-100">
                                <div class="card-body text-center">
                                    <i class="fas fa-video fa-3x mb-3 text-primary"></i>
                                    <h5 class="card-title">Scientology Lectures</h5>
                                    <p class="card-text">Access the complete lecture series</p>
                                    <a href="/protected-storage/scientology" class="btn btn-primary">
                                        View Lectures <i class="fas fa-arrow-right ms-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Freezone Courses -->
                        <div class="col-md-6 col-lg-4">
                            <div class="card resource-card h-100">
                                <div class="card-body text-center">
                                    <i class="fas fa-graduation-cap fa-3x mb-3 text-success"></i>
                                    <h5 class="card-title">Freezone Courses</h5>
                                    <p class="card-text">Independent study courses and materials</p>
                                    <a href="/protected-storage/freezonecourses" class="btn btn-success">
                                        View Courses <i class="fas fa-arrow-right ms-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Help Resources -->
                        <div class="col-md-6 col-lg-4">
                            <div class="card resource-card h-100">
                                <div class="card-body text-center">
                                    <i class="fas fa-hands-helping fa-3x mb-3 text-info"></i>
                                    <h5 class="card-title">Help Resources</h5>
                                    <p class="card-text">Get assistance and guidance</p>
                                    <a href="/protected-storage/helpme" class="btn btn-info">
                                        Get Help <i class="fas fa-arrow-right ms-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- LRH Materials -->
                        <div class="col-md-6 col-lg-4">
                            <div class="card resource-card h-100">
                                <div class="card-body text-center">
                                    <i class="fas fa-book-reader fa-3x mb-3 text-warning"></i>
                                    <h5 class="card-title">LRH Materials</h5>
                                    <p class="card-text">L. Ron Hubbard's writings and works</p>
                                    <a href="/protected-storage/lrh" class="btn btn-warning">
                                        View Materials <i class="fas fa-arrow-right ms-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Study Manual -->
                        <div class="col-md-6 col-lg-4">
                            <div class="card resource-card h-100">
                                <div class="card-body text-center">
                                    <i class="fas fa-book-open fa-3x mb-3 text-danger"></i>
                                    <h5 class="card-title">Study Manual</h5>
                                    <p class="card-text">Comprehensive study guides and manuals</p>
                                    <a href="/protected-storage/studymanual" class="btn btn-danger">
                                        View Manual <i class="fas fa-arrow-right ms-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Technical Dictionary -->
                        <div class="col-md-6 col-lg-4">
                            <div class="card resource-card h-100">
                                <div class="card-body text-center">
                                    <i class="fas fa-book fa-3x mb-3 text-secondary"></i>
                                    <h5 class="card-title">Tech Dictionary</h5>
                                    <p class="card-text">Technical terminology reference</p>
                                    <a href="/protected-storage/techdic" class="btn btn-secondary">
                                        View Dictionary <i class="fas fa-arrow-right ms-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Scientology Dictionary -->
                        <div class="col-md-6 col-lg-4">
                            <div class="card resource-card h-100">
                                <div class="card-body text-center">
                                    <i class="fas fa-spell-check fa-3x mb-3 text-primary"></i>
                                    <h5 class="card-title">Scientology Dictionary</h5>
                                    <p class="card-text">Complete Scientology terminology</p>
                                    <a href="/protected-storage/scientologydict" class="btn btn-primary">
                                        View Dictionary <i class="fas fa-arrow-right ms-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Technical Dictionary (Alternative) -->
                        <div class="col-md-6 col-lg-4">
                            <div class="card resource-card h-100">
                                <div class="card-body text-center">
                                    <i class="fas fa-atlas fa-3x mb-3 text-success"></i>
                                    <h5 class="card-title">Technical Dictionary</h5>
                                    <p class="card-text">Extended technical reference</p>
                                    <a href="/protected-storage/technicaldictionary" class="btn btn-success">
                                        View Dictionary <i class="fas fa-arrow-right ms-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <br><br>


                    <div class="mt-4 text-center">
                        <a href="/booklets/seagull" class="btn btn-outline-primary">
                            <i class="fas fa-arrow-left me-2"></i>Back to Ethics Booklets
                        </a>
                    </div>
                    <br><br>

                </div>
                <br><br>
            </div>
        </div>
    @endauth
@endsection