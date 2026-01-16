@php
    use Spatie\Permission\Models\Role;
    use Illuminate\Support\Facades\Auth;

    $admin = Role::findByName('super admin')->users->first();
@endphp

<nav class="navbar">
    <a href="#" class="sidebar-toggler">
        <i data-feather="menu"></i>
    </a>
    <div class="navbar-content">

        <ul class="navbar-nav">

            <li class="nav-item dropdown">
                <!-- Message dropdown commented out -->
            </li>
            <li class="nav-item dropdown">
                <!-- Notification dropdown commented out -->
            </li>
            
            {{-- Theme Toggle Button --}}
            <li class="nav-item d-flex align-items-center me-3">
                <i id="themeIcon"
                   class="fa-solid fa-sun cursor-pointer"
                   title="Toggle theme"
                   role="button"
                   tabindex="0"
                   aria-label="Toggle theme"
                   onclick="toggleTheme()"
                   style="font-size: 1.25rem; cursor: pointer; transition: all 0.3s ease; color: #fbbf24;"></i>
            </li>
            
            <li class="nav-item dropdown">
                <!-- Profile image commented out -->
                <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                    <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                        <div class="text-center">
                            <p class="tx-16 fw-bolder"> {{ $admin->name }} </p>
                            <p class="tx-12">{{ $admin->email }}</p>
                        </div>
                    </div>
                    <ul class="list-unstyled p-1">
                        <li class="dropdown-item py-2">
                            <a href="{{ route('dashboard') }}" class="text-body ms-0">
                                <i class="me-2 icon-md" data-feather="user"></i>
                                <span>Profile</span>
                            </a>
                        </li>
                        <!-- Other menu items commented out -->
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>

<style>
    /* Remove navbar shadow */
    .navbar {
        box-shadow: none !important;
    }

    /* DARK MODE NAVBAR STYLES */
    html.dark-mode .navbar,
    html.dark-mode .navbar *,
    body.dark-mode .navbar,
    body.dark-mode .navbar * {
        background-color: #1e1e20 !important;
    }

    html.dark-mode .navbar,
    body.dark-mode .navbar {
        border-bottom: 1px solid #37373a !important;
    }

    html.dark-mode .navbar .dropdown-menu,
    body.dark-mode .navbar .dropdown-menu {
        background-color: #2a2a2d !important;
        border: 1px solid #37373a !important;
    }

    html.dark-mode .navbar .dropdown-item,
    body.dark-mode .navbar .dropdown-item {
        background-color: #2a2a2d !important;
        color: #d0d0d5 !important;
    }

    html.dark-mode .navbar .dropdown-item:hover,
    body.dark-mode .navbar .dropdown-item:hover {
        background-color: #3a3a3e !important;
        color: #ffffff !important;
    }

    html.dark-mode .navbar .text-body,
    body.dark-mode .navbar .text-body {
        color: #d0d0d5 !important;
    }

    html.dark-mode .navbar .text-body:hover,
    body.dark-mode .navbar .text-body:hover {
        color: #ffffff !important;
    }

    html.dark-mode .navbar .sidebar-toggler,
    body.dark-mode .navbar .sidebar-toggler {
        color: #f0f0f0 !important;
    }

    html.dark-mode .navbar .sidebar-toggler:hover,
    body.dark-mode .navbar .sidebar-toggler:hover {
        color: #ffffff !important;
    }

    html.dark-mode .navbar .tx-12,
    body.dark-mode .navbar .tx-12 {
        color: #a0a0a5 !important;
    }

    html.dark-mode .navbar .tx-16,
    body.dark-mode .navbar .tx-16 {
        color: #f0f0f0 !important;
    }

    html.dark-mode .navbar [data-feather],
    body.dark-mode .navbar [data-feather] {
        color: #a0a0a5 !important;
    }

    html.dark-mode .navbar [data-feather]:hover,
    body.dark-mode .navbar [data-feather]:hover {
        color: #ffffff !important;
    }

    html.dark-mode .navbar .active,
    body.dark-mode .navbar .active {
        background-color: #3a3a3e !important;
        color: #ffffff !important;
    }

    /* LIGHT MODE NAVBAR STYLES */
    html.light-mode .navbar,
    html.light-mode .navbar *,
    body.light-mode .navbar,
    body.light-mode .navbar * {
        background-color: #ffffff !important;
    }

    html.light-mode .navbar,
    body.light-mode .navbar {
        border-bottom: 1px solid #e5e7eb !important;
    }

    html.light-mode .navbar .dropdown-menu,
    body.light-mode .navbar .dropdown-menu {
        background-color: #ffffff !important;
        border: 1px solid #e5e7eb !important;
    }

    html.light-mode .navbar .dropdown-item,
    body.light-mode .navbar .dropdown-item {
        background-color: #ffffff !important;
        color: #374151 !important;
    }

    html.light-mode .navbar .dropdown-item:hover,
    body.light-mode .navbar .dropdown-item:hover {
        background-color: #f9fafb !important;
        color: #111827 !important;
    }

    html.light-mode .navbar .text-body,
    body.light-mode .navbar .text-body {
        color: #374151 !important;
    }

    html.light-mode .navbar .text-body:hover,
    body.light-mode .navbar .text-body:hover {
        color: #111827 !important;
    }

    html.light-mode .navbar .sidebar-toggler,
    body.light-mode .navbar .sidebar-toggler {
        color: #111827 !important;
    }

    html.light-mode .navbar .sidebar-toggler:hover,
    body.light-mode .navbar .sidebar-toggler:hover {
        color: #000000 !important;
    }

    html.light-mode .navbar .tx-12,
    body.light-mode .navbar .tx-12 {
        color: #6b7280 !important;
    }

    html.light-mode .navbar .tx-16,
    body.light-mode .navbar .tx-16 {
        color: #111827 !important;
    }

    html.light-mode .navbar [data-feather],
    body.light-mode .navbar [data-feather] {
        color: #6b7280 !important;
    }

    html.light-mode .navbar [data-feather]:hover,
    body.light-mode .navbar [data-feather]:hover {
        color: #111827 !important;
    }

    html.light-mode .navbar .active,
    body.light-mode .navbar .active {
        background-color: #f9fafb !important;
        color: #111827 !important;
    }

    /* Theme toggle icon animation */
    #themeIcon {
        transition: transform 0.3s ease, color 0.3s ease;
    }

    #themeIcon:hover {
        transform: rotate(180deg) scale(1.1);
    }
</style>
