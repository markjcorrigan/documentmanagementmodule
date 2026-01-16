<style>
    /* DARK MODE SIDEBAR STYLES */
    html.dark-mode .sidebar,
    html.dark-mode .sidebar *,
    html.dark-mode .sidebar .nav,
    html.dark-mode .sidebar .sidebar-body,
    html.dark-mode .sidebar .nav-item,
    html.dark-mode .sidebar .nav-link,
    body.dark-mode .sidebar,
    body.dark-mode .sidebar *,
    body.dark-mode .sidebar .nav,
    body.dark-mode .sidebar .sidebar-body,
    body.dark-mode .sidebar .nav-item,
    body.dark-mode .sidebar .nav-link {
        background-color: #1e1e20 !important;
    }

    html.dark-mode .nav,
    html.dark-mode .nav-item,
    html.dark-mode .nav-link,
    html.dark-mode .sidebar-body,
    body.dark-mode .nav,
    body.dark-mode .nav-item,
    body.dark-mode .nav-link,
    body.dark-mode .sidebar-body {
        background-color: #1e1e20 !important;
        border-color: #37373a !important;
    }

    html.dark-mode .sidebar .nav-link,
    html.dark-mode .sidebar .dropdown-item,
    html.dark-mode .sidebar .nav-category,
    html.dark-mode .sidebar .link-title,
    body.dark-mode .sidebar .nav-link,
    body.dark-mode .sidebar .dropdown-item,
    body.dark-mode .sidebar .nav-category,
    body.dark-mode .sidebar .link-title {
        color: #f0f0f0 !important;
    }

    html.dark-mode .sidebar .nav-category,
    body.dark-mode .sidebar .nav-category {
        color: #a0a0a5 !important;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
    }

    html.dark-mode .sidebar .dropdown-menu,
    html.dark-mode .sidebar .sub-menu,
    html.dark-mode .sidebar .collapse .nav,
    body.dark-mode .sidebar .dropdown-menu,
    body.dark-mode .sidebar .sub-menu,
    body.dark-mode .sidebar .collapse .nav {
        background-color: #2a2a2d !important;
    }

    html.dark-mode .sidebar .dropdown-item,
    html.dark-mode .sidebar .sub-menu .nav-link,
    body.dark-mode .sidebar .dropdown-item,
    body.dark-mode .sidebar .sub-menu .nav-link {
        color: #d0d0d5 !important;
    }

    html.dark-mode .sidebar .nav-link.active,
    html.dark-mode .sidebar .dropdown-item.active,
    body.dark-mode .sidebar .nav-link.active,
    body.dark-mode .sidebar .dropdown-item.active {
        background-color: #3a3a3e !important;
        color: #ffffff !important;
    }

    html.dark-mode .sidebar .nav-link:hover,
    html.dark-mode .sidebar .dropdown-item:hover,
    body.dark-mode .sidebar .nav-link:hover,
    body.dark-mode .sidebar .dropdown-item:hover {
        background-color: #2a2a2d !important;
        color: #ffffff !important;
    }

    html.dark-mode .sidebar-header,
    body.dark-mode .sidebar-header {
        border-bottom: 1px solid #37373a !important;
    }

    html.dark-mode .sidebar .link-icon,
    body.dark-mode .sidebar .link-icon {
        color: #a0a0a5 !important;
    }

    html.dark-mode .sidebar .link-arrow,
    body.dark-mode .sidebar .link-arrow {
        color: #a0a0a5 !important;
    }

    html.dark-mode .sidebar-brand,
    body.dark-mode .sidebar-brand {
        color: #f0f0f0 !important;
    }

    /* LIGHT MODE SIDEBAR STYLES */
    html.light-mode .sidebar,
    html.light-mode .sidebar *,
    html.light-mode .sidebar .nav,
    html.light-mode .sidebar .sidebar-body,
    html.light-mode .sidebar .nav-item,
    html.light-mode .sidebar .nav-link,
    body.light-mode .sidebar,
    body.light-mode .sidebar *,
    body.light-mode .sidebar .nav,
    body.light-mode .sidebar .sidebar-body,
    body.light-mode .sidebar .nav-item,
    body.light-mode .sidebar .nav-link {
        background-color: #ffffff !important;
    }

    html.light-mode .nav,
    html.light-mode .nav-item,
    html.light-mode .nav-link,
    html.light-mode .sidebar-body,
    body.light-mode .nav,
    body.light-mode .nav-item,
    body.light-mode .nav-link,
    body.light-mode .sidebar-body {
        background-color: #ffffff !important;
        border-color: #e5e7eb !important;
    }

    html.light-mode .sidebar .nav-link,
    html.light-mode .sidebar .dropdown-item,
    html.light-mode .sidebar .nav-category,
    html.light-mode .sidebar .link-title,
    body.light-mode .sidebar .nav-link,
    body.light-mode .sidebar .dropdown-item,
    body.light-mode .sidebar .nav-category,
    body.light-mode .sidebar .link-title {
        color: #111827 !important;
    }

    html.light-mode .sidebar .nav-category,
    body.light-mode .sidebar .nav-category {
        color: #6b7280 !important;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
    }

    html.light-mode .sidebar .dropdown-menu,
    html.light-mode .sidebar .sub-menu,
    html.light-mode .sidebar .collapse .nav,
    body.light-mode .sidebar .dropdown-menu,
    body.light-mode .sidebar .sub-menu,
    body.light-mode .sidebar .collapse .nav {
        background-color: #f9fafb !important;
    }

    html.light-mode .sidebar .dropdown-item,
    html.light-mode .sidebar .sub-menu .nav-link,
    body.light-mode .sidebar .dropdown-item,
    body.light-mode .sidebar .sub-menu .nav-link {
        color: #374151 !important;
    }

    html.light-mode .sidebar .nav-link.active,
    html.light-mode .sidebar .dropdown-item.active,
    body.light-mode .sidebar .nav-link.active,
    body.light-mode .sidebar .dropdown-item.active {
        background-color: #e0e7ff !important;
        color: #4f46e5 !important;
    }

    html.light-mode .sidebar .nav-link:hover,
    html.light-mode .sidebar .dropdown-item:hover,
    body.light-mode .sidebar .nav-link:hover,
    body.light-mode .sidebar .dropdown-item:hover {
        background-color: #f3f4f6 !important;
        color: #111827 !important;
    }

    html.light-mode .sidebar-header,
    body.light-mode .sidebar-header {
        border-bottom: 1px solid #e5e7eb !important;
    }

    html.light-mode .sidebar .link-icon,
    body.light-mode .sidebar .link-icon {
        color: #6b7280 !important;
    }

    html.light-mode .sidebar .link-arrow,
    body.light-mode .sidebar .link-arrow {
        color: #6b7280 !important;
    }

    html.light-mode .sidebar-brand,
    body.light-mode .sidebar-brand {
        color: #111827 !important;
    }
</style>

<nav class="sidebar">
    <div class="sidebar-header">

         <a href="{{ route('admin.index') }}" class="sidebar-brand">

         <span>Admin</span>
         </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item">
                {{-- <a href="{{ route('dashboard') }}" class="nav-link">--}}
                <a href="{{ url('/') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Home</span>
                </a>
            </li>
            <li class="nav-item">
                {{-- <a href="{{ route('dashboard') }}" class="nav-link">--}}
                <a href="{{ url('admin') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>

            <li class="nav-item nav-category">Components</li>

            <li class="nav-item">
                <a href="{{ route('hero.section') }}" class="nav-link">


                    <i class="link-icon" data-feather="feather"></i>
                    <span class="link-title">Hero Section</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#service" role="button" aria-expanded="false"
                   aria-controls="uiComponents">
                    <i class="link-icon" data-feather="feather"></i>
                    <span class="link-title">My Quality Services</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="service">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('add.service') }}" class="nav-link">Add Service</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('all.services') }}" class="nav-link">All Services</a>
                        </li>

                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#portfolio" role="button" aria-expanded="false"
                   aria-controls="uiComponents">
                    <i class="link-icon" data-feather="feather"></i>
                    <span class="link-title">My Recent Works</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="portfolio">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('add.work') }}" class="nav-link">Add Work</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('all.recent.works') }}" class="nav-link">Portfolio</a>
                        </li>

                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a href="{{ route('my.experience') }}" class="nav-link">
                    <i class="link-icon" data-feather="feather"></i>
                    <span class="link-title">My Experience</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('my.education') }}" class="nav-link">
                    <i class="link-icon" data-feather="feather"></i>
                    <span class="link-title">My Education</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#myskill" role="button" aria-expanded="false"
                   aria-controls="uiComponents">
                    <i class="link-icon" data-feather="feather"></i>
                    <span class="link-title">My Skills</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="myskill">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('add.skill') }}" class="nav-link">Add Skill</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('all.skills') }}" class="nav-link">All Skills</a>
                        </li>

                    </ul>
                </div>
            </li>


            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#testimonial" role="button" aria-expanded="false"
                   aria-controls="uiComponents">
                    <i class="link-icon" data-feather="feather"></i>
                    <span class="link-title">Testimonials</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="testimonial">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('add.testimony') }}" class="nav-link">Add Testimony</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('all.testimoies') }}" class="nav-link">All Testimonies</a>
                        </li>

                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#blog" role="button" aria-expanded="false"
                   aria-controls="uiComponents">
                    <i class="link-icon" data-feather="feather"></i>
                    <span class="link-title">Blogs</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="blog">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('add.post') }}" class="nav-link">Add Post</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('all.post') }}" class="nav-link">All Posts</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('blogs.by.author') }}" class="nav-link">All Posts by Author</a>
                        </li>

                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a href="{{ route('user.comments') }}" class="nav-link">
                    <i class="link-icon" data-feather="feather"></i>
                    <span class="link-title">Comments</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('contact.message') }}" class="nav-link">
                    <i class="link-icon" data-feather="feather"></i>
                    <span class="link-title">Contacts</span>
                </a>
            </li>

            @can('manage assets')
                <li class="nav-item">
                    <a href="{{ route('admin.document.manager') }}"
                       class="nav-link {{ request()->routeIs('admin.document.manager') ? 'active' : '' }}">
                        <i class="link-icon" data-feather="folder"></i>
                        <span class="link-title">Document Manager</span>
                    </a>
                </li>
            @endcan
            @role('Super Admin')
            <!-- Documents Menu -->
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#neoDocuments" role="button" aria-expanded="false"
                   aria-controls="neoDocuments">
                    <i class="link-icon" data-feather="folder"></i>
                    <span class="link-title">Neo Document Manager</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="neoDocuments">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('livedocuments.index') }}"
                               class="nav-link {{ request()->routeIs('livedocuments.index') ? 'active' : '' }}">
                                Document Grid
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('livedocuments.list') }}"
                               class="nav-link {{ request()->routeIs('livedocuments.list') ? 'active' : '' }}">
                                Document List
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- Images Menu -->
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#neoImages" role="button" aria-expanded="false"
                   aria-controls="neoImages">
                    <i class="link-icon" data-feather="image"></i>
                    <span class="link-title">Neo Image Manager</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="neoImages">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('liveimages.index') }}"
                               class="nav-link {{ request()->routeIs('liveimages.index') ? 'active' : '' }}">
                                Image Grid
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('liveimages.list') }}"
                               class="nav-link {{ request()->routeIs('liveimages.list') ? 'active' : '' }}">
                                Image List
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            @endrole


            <li class="nav-item">
                <a href="{{ route('uploads') }}" class="nav-link">
                    <i class="link-icon" data-feather="folder"></i>
                    <span class="link-title">Up/Downloads</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#protectedStorageMenu" role="button" aria-expanded="false" aria-controls="protectedStorageMenu">
                    <i class="link-icon" data-feather="folder"></i>
                    <span class="link-title">Protected Storage Files</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="protectedStorageMenu">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('storage.home') }}" class="nav-link">
                                <i class="fas fa-folder-open"></i> Browse Files
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('storage.dashboard') }}" class="nav-link">
                                <i class="fas fa-cog"></i> Manage Files
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a href="{{ route('protectedstorage.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="folder"></i>
                    <span class="link-title">Protected Storage Files</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('guitar.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="music"></i>
                    <span class="link-title">Guitar Scores</span>
                </a>
            </li>


            <li class="nav-item">
                <a href="{{ route('site.settings') }}" class="nav-link">
                    <i class="link-icon" data-feather="feather"></i>
                    <span class="link-title">Site Settings</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('public-landing') }}" class="nav-link">
                    <i class="link-icon" data-feather="feather"></i>
                    <span class="link-title">Landing Page</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('booklets.seagull') }}" class="nav-link">
                    <i class="link-icon" data-feather="feather"></i>
                    <span class="link-title">Scientology</span>
                </a>
            </li>

        </ul>
    </div>
</nav>
