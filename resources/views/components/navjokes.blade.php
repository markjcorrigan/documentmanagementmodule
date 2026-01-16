{{-- BOOTSTRAP NAVIGATION COMPONENT - Jokes Module --}}
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

                {{-- Navigation Items --}}
                <div class="collapse navbar-collapse d-md-block" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('jokes.index') }}">All Jokes</a>
                        </li>
                        @can('joke management')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('jokes.create') }}">Create Joke</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('jokes.jokecats.index') }}">Categories</a>
                            </li>
                        @endcan
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
    [data-bs-theme="dark"] .navbar-brand,
    [data-bs-theme="dark"] .nav-link {
        color: #ffffff !important;
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

        // Set up toggle functionality when DOM is ready
        document.addEventListener('DOMContentLoaded', function() {
            const themeIcon = document.getElementById('themeIcon');

            if (themeIcon) {
                // Handle click events
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