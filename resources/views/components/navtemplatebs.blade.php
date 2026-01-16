{{-- BOOTSTRAP NAVIGATION COMPONENT - Non-Livewire Version --}}
<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom shadow-sm" id="mainNav">
    <div class="container-fluid px-3 px-md-4">
        <div class="row w-100 align-items-center">
            {{-- Empty columns 1-2 (left offset) --}}
            <div class="col-2 d-none d-md-block"></div>

            {{-- Logo / Home Link (Column 3) --}}
            <div class="col-auto">
                <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center">
                    <span class="d-flex align-items-center justify-content-center rounded" style="height: 40px; width: 40px;">
                        <span class="light-logo">
                            <x-app-logo-icon-black/>
                        </span>
                        <span class="dark-logo" style="display: none;">
                            <x-app-logo-icon-white/>
                        </span>
                    </span>
                </a>
            </div>

            {{-- Navigation Items (Middle columns) --}}
            <div class="col">
                {{-- Mobile Toggle Button --}}
                <button class="navbar-toggler d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                {{-- Right Side Navigation --}}
                <div class="collapse navbar-collapse d-md-block" id="navbarNav">
                    <ul class="navbar-nav ms-auto align-items-center gap-2">

                        {{-- EXAMPLE: Dropdown Menu with Super Admin permissions --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle btn btn-outline-secondary" href="#" id="navDropdown"
                               role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="d-none d-md-inline">Menu</span>
                                <i class="fa-solid fa-bars d-md-none"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navDropdown">
                                {{-- Public menu items (everyone can see) --}}
                                <li><a class="dropdown-item" href="{{ route('home') }}">
                                        <i class="fa-solid fa-home me-2"></i> Home
                                    </a></li>

                                <li><hr class="dropdown-divider"></li>

                                {{-- Permission-based: 'manage jokes' --}}
                                @can('manage jokes')
                                    <li><a class="dropdown-item" href="{{ route('jokes.create') }}">
                                            <i class="fa-solid fa-plus me-2"></i> Create Joke
                                        </a></li>

                                    <li><a class="dropdown-item" href="{{ route('jokes.jokecats.index') }}">
                                            <i class="fa-solid fa-list me-2"></i> Manage Categories
                                        </a></li>

                                    <li><hr class="dropdown-divider"></li>
                                @endcan

                                {{-- Role-based: Super Admin only --}}
                                @role('Super Admin')
                                <li><a class="dropdown-item" href="{{ route('admin.index') }}">
                                        <i class="fa-solid fa-shield me-2"></i> Admin Dashboard
                                    </a></li>

                                <li><a class="dropdown-item" href="#">
                                        <i class="fa-solid fa-users-cog me-2"></i> User Management
                                    </a></li>

                                <li><hr class="dropdown-divider"></li>
                                @endrole

                                {{-- More public items --}}
                                <li><a class="dropdown-item" href="#">
                                        <i class="fa-solid fa-cog me-2"></i> Settings
                                    </a></li>

                                <li><a class="dropdown-item" href="#">
                                        <i class="fa-solid fa-envelope me-2"></i> Contact
                                    </a></li>
                            </ul>
                        </li>

                        {{-- Home Link (Optional - uncomment if needed) --}}
                        {{--
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">
                                <i class="fa-solid fa-home me-1"></i>
                                <span class="d-none d-md-inline">Home</span>
                            </a>
                        </li>
                        --}}
                    </ul>
                </div>
            </div>

            {{-- Theme Toggle --}}
            <div class="col-auto">
                <i id="themeIcon"
                   class="fa-solid fa-moon fs-5 cursor-pointer theme-toggle-icon"
                   style="color: #1f2937; cursor: pointer;"
                   title="Toggle theme"
                   role="button"
                   tabindex="0"
                   aria-label="Toggle theme"></i>
            </div>

            {{-- Empty columns (right offset - same as left) --}}
            <div class="col-2 d-none d-md-block"></div>
        </div>
    </div>
</nav>

{{-- Theme Toggle Styles --}}
<style>
    /* Dark mode styles */
    .dark .navbar,
    [data-bs-theme="dark"] .navbar {
        background-color: #18181a !important;
        border-color: #374151 !important;
    }

    .dark .navbar-brand,
    .dark .nav-link,
    .dark .dropdown-item,
    [data-bs-theme="dark"] .navbar-brand,
    [data-bs-theme="dark"] .nav-link,
    [data-bs-theme="dark"] .dropdown-item {
        color: #ffffff !important;
    }

    .dark .dropdown-menu,
    [data-bs-theme="dark"] .dropdown-menu {
        background-color: #374151;
        border-color: #4b5563;
    }

    .dark .dropdown-item:hover,
    [data-bs-theme="dark"] .dropdown-item:hover {
        background-color: #4b5563;
    }

    .dark .btn-outline-secondary,
    [data-bs-theme="dark"] .btn-outline-secondary {
        color: #ffffff;
        border-color: #6b7280;
    }

    .dark .btn-outline-secondary:hover,
    [data-bs-theme="dark"] .btn-outline-secondary:hover {
        background-color: #4b5563;
        border-color: #6b7280;
    }

    .dark .navbar-toggler-icon,
    [data-bs-theme="dark"] .navbar-toggler-icon {
        filter: invert(1);
    }

    /* Theme toggle icon transitions */
    .theme-toggle-icon {
        transition: transform 0.3s ease, color 0.3s ease;
    }

    .theme-toggle-icon:hover {
        transform: rotate(180deg) scale(1.1);
    }

    /* Logo display toggle */
    .dark .light-logo,
    [data-bs-theme="dark"] .light-logo {
        display: none !important;
    }

    .dark .dark-logo,
    [data-bs-theme="dark"] .dark-logo {
        display: block !important;
    }

    .light-logo {
        display: block !important;
    }

    .dark-logo {
        display: none !important;
    }

    /* Yellow sun in dark mode */
    [data-bs-theme="dark"] #themeIcon.fa-sun,
    .dark #themeIcon.fa-sun {
        color: #ffc107 !important;
    }

    [data-bs-theme="light"] #themeIcon.fa-moon,
    #themeIcon.fa-moon {
        color: #212529 !important;
    }
</style>

{{-- Theme Toggle JavaScript --}}
<script>
    (function() {
        // READING - Check all three keys in priority order
        const getStoredTheme = () => {
            return localStorage.getItem('flux.appearance') ||
                localStorage.getItem('flux:appearance') ||
                localStorage.getItem('theme') ||
                'light';
        };

        // WRITING - Set all three keys simultaneously
        const setStoredTheme = (theme) => {
            localStorage.setItem('flux.appearance', theme);  // Main site
            localStorage.setItem('flux:appearance', theme);  // Compatibility
            localStorage.setItem('theme', theme);            // Bootstrap
        };

        // APPLYING - Use both methods
        const applyTheme = (theme) => {
            const html = document.documentElement;

            if (theme === 'dark') {
                html.classList.add('dark');                        // Tailwind
                html.setAttribute('data-bs-theme', 'dark');        // Bootstrap
                html.setAttribute('data-theme', 'dark');           // Generic
                html.setAttribute('flux:appearance', 'dark');      // Flux
            } else {
                html.classList.remove('dark');
                html.setAttribute('data-bs-theme', 'light');
                html.setAttribute('data-theme', 'light');
                html.setAttribute('flux:appearance', 'light');
            }

            // Update theme icon
            const icon = document.getElementById('themeIcon');
            if (icon) {
                if (theme === 'dark') {
                    icon.classList.remove('fa-moon');
                    icon.classList.add('fa-sun');
                } else {
                    icon.classList.remove('fa-sun');
                    icon.classList.add('fa-moon');
                }
            }
        };

        // Initialize theme immediately (before DOMContentLoaded to prevent flash)
        const initialTheme = getStoredTheme();
        applyTheme(initialTheme);

        // Toggle theme on icon click
        document.addEventListener('DOMContentLoaded', function() {
            const themeIcon = document.getElementById('themeIcon');
            if (themeIcon) {
                themeIcon.addEventListener('click', function() {
                    const currentTheme = getStoredTheme();
                    const newTheme = currentTheme === 'light' ? 'dark' : 'light';
                    setStoredTheme(newTheme);
                    applyTheme(newTheme);
                });

                // Keyboard accessibility
                themeIcon.addEventListener('keypress', function(e) {
                    if (e.key === 'Enter' || e.key === ' ') {
                        e.preventDefault();
                        this.click();
                    }
                });
            }
        });
    })();
</script>