<!-- COMPLETE NAVIGATION WITH ALL MENU ITEMS -->
<nav class="bg-white dark:bg-gray-900 shadow-md">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
            {{-- Left side: ALL your navigation links --}}
            <div class="flex items-center space-x-4">
                {{-- Home --}}
                <a href="{{ route('home') }}"
                   class="{{ request()->routeIs('home') ? 'bg-gray-300 dark:bg-gray-700 text-gray-900 dark:text-gray-100' : 'bg-gray-100 dark:bg-gray-600 text-gray-900 dark:text-gray-100 hover:bg-gray-200 dark:hover:bg-gray-500' }} px-4 py-2 rounded">
                    Home
                </a>

                {{-- All Documents --}}
                <a href="{{ route('uploads') }}"
                   class="{{ request()->routeIs('uploads') ? 'bg-gray-300 dark:bg-gray-700 text-gray-900 dark:text-gray-100' : 'bg-gray-100 dark:bg-gray-600 text-gray-900 dark:text-gray-100 hover:bg-gray-200 dark:hover:bg-gray-500' }} px-4 py-2 rounded">
                    All Documents
                </a>

                {{-- File Demo --}}
                <a href="{{ route('myfile-demo') }}"
                   class="{{ request()->routeIs('myfile-demo') ? 'bg-gray-300 dark:bg-gray-700 text-gray-900 dark:text-gray-100' : 'bg-gray-100 dark:bg-gray-600 text-gray-900 dark:text-gray-100 hover:bg-gray-200 dark:hover:bg-gray-500' }} px-4 py-2 rounded">
                    File Demo
                </a>

                {{-- All Images --}}
                <a href="{{ route('image-uploading') }}"
                   class="{{ request()->routeIs('image-uploads') ? 'bg-gray-300 dark:bg-gray-700 text-gray-900 dark:text-gray-100' : 'bg-gray-100 dark:bg-gray-600 text-gray-900 dark:text-gray-100 hover:bg-gray-200 dark:hover:bg-gray-500' }} px-4 py-2 rounded">
                    All Images
                </a>

                {{-- Image Demo --}}
                <a href="{{ route('myimage-demo') }}"
                   class="{{ request()->routeIs('myimage-demo') ? 'bg-gray-300 dark:bg-gray-700 text-gray-900 dark:text-gray-100' : 'bg-gray-100 dark:bg-gray-600 text-gray-900 dark:text-gray-100 hover:bg-gray-200 dark:hover:bg-gray-500' }} px-4 py-2 rounded">
                    Image Demo
                </a>

                {{-- Protected Storage --}}
                @can('protected storage')
                    <a href="{{ route('storage.home') }}"
                       class="{{ request()->routeIs('storage.*') ? 'bg-gray-300 dark:bg-gray-700 text-gray-900 dark:text-gray-100' : 'bg-gray-100 dark:bg-gray-600 text-gray-900 dark:text-gray-100 hover:bg-gray-200 dark:hover:bg-gray-500' }} px-4 py-2 rounded flex items-center">
                        <i class="fas fa-lock mr-2"></i>
                        Protected Storage
                    </a>
                @endcan

                {{-- Portfolio Dashboard --}}
                <a href="{{ route('portfoliodash') }}"
                   class="{{ request()->routeIs('portfoliodash') ? 'bg-gray-300 dark:bg-gray-700 text-gray-900 dark:text-gray-100' : 'bg-gray-100 dark:bg-gray-600 text-gray-900 dark:text-gray-100 hover:bg-gray-200 dark:hover:bg-gray-500' }} px-4 py-2 rounded">
                    Portfolio Dashboard
                </a>
            </div>

            {{-- Right side: Theme Toggle --}}
            <div class="flex items-center">
                <div class="flex-shrink-0 ml-4">
                    <button id="themeIcon"
                            class="text-gray-900 dark:text-white text-lg focus:outline-none"
                            title="Toggle theme"
                            aria-label="Toggle theme">
                        <i class="fa-solid fa-moon"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- DEBUG: Make sure navigation loaded -->
{{--<div id="navDebug" style="display: none;">Navigation loaded at: <?php echo date('H:i:s'); ?></div>--}}

<!-- SIMPLE RELIABLE THEME TOGGLE SCRIPT -->
<script>
    console.log('=== THEME SCRIPT STARTING ===');

    // Function to check if element exists
    function waitForElement(selector, callback) {
        const element = document.querySelector(selector);
        if (element) {
            callback(element);
        } else {
            setTimeout(() => waitForElement(selector, callback), 100);
        }
    }

    // Wait for theme icon
    waitForElement('#themeIcon', function(themeIcon) {
        console.log('✅ Theme icon FOUND:', themeIcon);

        // Function to update icon
        function updateThemeIcon() {
            const isDark = document.documentElement.classList.contains('dark');
            const icon = themeIcon.querySelector('i');

            if (isDark) {
                // Switch to SUN icon
                icon.classList.remove('fa-moon');
                icon.classList.add('fa-sun');
                icon.style.color = '#fbbf24'; // Sun yellow
                console.log('Icon set to SUN (dark mode)');
            } else {
                // Switch to MOON icon
                icon.classList.remove('fa-sun');
                icon.classList.add('fa-moon');
                icon.style.color = '#1f2937'; // Dark gray for light mode
                console.log('Icon set to MOON (light mode)');
            }
        }

        // Set initial icon
        updateThemeIcon();

        // Toggle theme function
        function toggleTheme() {
            console.log('🎯 Theme toggle CLICKED');

            const html = document.documentElement;
            const isDark = html.classList.contains('dark');

            console.log('Current state - Dark mode?', isDark);

            if (isDark) {
                // Switch to LIGHT mode
                html.classList.remove('dark');
                localStorage.setItem('theme', 'light');
                localStorage.setItem('flux:appearance', 'light');
                localStorage.setItem('flux.appearance', 'light');
                console.log('🔄 Switched to LIGHT mode');
            } else {
                // Switch to DARK mode
                html.classList.add('dark');
                localStorage.setItem('theme', 'dark');
                localStorage.setItem('flux:appearance', 'dark');
                localStorage.setItem('flux.appearance', 'dark');
                console.log('🌙 Switched to DARK mode');
            }

            // Update icon
            updateThemeIcon();

            // Visual feedback
            document.body.style.transition = 'background-color 0.3s';
            document.body.style.backgroundColor = isDark ? '#ffffff' : '#1f2937';
        }

        // Add click event
        themeIcon.addEventListener('click', toggleTheme);

        // Show debug info
        const navDebug = document.getElementById('navDebug');
        if (navDebug) {
            navDebug.style.display = 'block';
            navDebug.style.position = 'fixed';
            navDebug.style.top = '0';
            navDebug.style.right = '0';
            navDebug.style.background = 'green';
            navDebug.style.color = 'white';
            navDebug.style.padding = '5px';
            navDebug.style.zIndex = '9999';
        }

        console.log('✅ Theme toggle READY');
    });

    // Fallback: If icon not found after 3 seconds
    setTimeout(function() {
        const themeIcon = document.getElementById('themeIcon');
        if (!themeIcon) {
            console.error('❌ Theme icon NOT found after 3 seconds!');
            console.log('Creating emergency theme button...');

            // Create emergency button
            const emergencyButton = document.createElement('button');
            emergencyButton.id = 'emergencyTheme';
            emergencyButton.textContent = '🌓 Theme';
            emergencyButton.style.position = 'fixed';
            emergencyButton.style.top = '10px';
            emergencyButton.style.right = '10px';
            emergencyButton.style.zIndex = '9999';
            emergencyButton.style.background = 'red';
            emergencyButton.style.color = 'white';
            emergencyButton.style.padding = '10px';
            emergencyButton.style.border = 'none';
            emergencyButton.style.borderRadius = '5px';

            emergencyButton.addEventListener('click', function() {
                const html = document.documentElement;
                const isDark = html.classList.contains('dark');
                if (isDark) {
                    html.classList.remove('dark');
                } else {
                    html.classList.add('dark');
                }
            });

            document.body.appendChild(emergencyButton);
        }
    }, 3000);
</script>