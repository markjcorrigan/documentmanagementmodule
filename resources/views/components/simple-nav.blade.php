<!-- Simple Navigation: Home Icon + Admin Panel + Theme Toggle -->
<nav class="nav-bar bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-700 fixed top-0 left-0 right-0" style="position: sticky; top: 0; z-index: 100; backdrop-filter: blur(10px); height: 64px;">
    <div class="nav-bar-content px-4 sm:px-6 lg:px-8 h-full" style="max-width: 6xl; margin: 0 auto;">
        <div class="flex items-center justify-between h-full">
            <!-- Left side - Home + Admin Panel -->
            <div class="flex items-center space-x-3">
                <!-- Home Icon -->
                <a href="/" class="flex items-center space-x-2 group" title="Home">
                    <div class="w-8 h-8 rounded-lg bg-blue-600 dark:bg-blue-500 flex items-center justify-center group-hover:bg-blue-700 dark:group-hover:bg-blue-600 transition-colors">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                    </div>
                </a>

                <!-- Admin Panel Icon -->
                <a href="/portfoliodash" class="flex items-center space-x-2 group" title="Admin Panel">
                    <div class="w-8 h-8 rounded-lg bg-purple-600 dark:bg-purple-500 flex items-center justify-center group-hover:bg-purple-700 dark:group-hover:bg-purple-600 transition-colors">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                </a>
            </div>

            <!-- Right side - Theme Toggle -->
            <div class="flex items-center space-x-4">
                <button id="themeToggle" class="p-2 rounded-lg bg-gray-100 dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 text-gray-900 dark:text-gray-100 transition-colors">
                    <svg id="sunIcon" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                    <svg id="moonIcon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>

{{-- COMPLETE SCROLL TO TOP BUTTON --}}
<button
    id="scrollToTopBtn"
    class="fixed bottom-6 right-6 w-12 h-12 bg-blue-600 hover:bg-blue-700 text-white rounded-full shadow-lg hover:shadow-xl transition-all duration-300 flex items-center justify-center group"
    aria-label="Scroll to top"
    style="z-index: 9999 !important; opacity: 0; pointer-events: none;">
    <svg id="progressRing" class="absolute top-0 left-0 w-12 h-12 transform -rotate-90" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid meet">
        <circle
            cx="50"
            cy="50"
            r="45"
            stroke="rgba(255,255,255,0.3)"
            stroke-width="3"
            fill="none"
        />
        <circle
            id="progressCircle"
            cx="50"
            cy="50"
            r="45"
            stroke="white"
            stroke-width="3"
            fill="none"
            stroke-dasharray="283"
            stroke-dashoffset="283"
            class="transition-all duration-100"
        />
    </svg>
    <i class="fa-solid fa-arrow-up text-white text-sm relative z-10 group-hover:transform group-hover:-translate-y-0.5 transition-transform"></i>
</button>

<script>
    // Theme toggle functionality
    document.addEventListener('DOMContentLoaded', function() {
        const themeToggle = document.getElementById('themeToggle');
        const sunIcon = document.getElementById('sunIcon');
        const moonIcon = document.getElementById('moonIcon');

        // Check for saved theme
        const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
        const savedTheme = localStorage.getItem('flux:appearance') || localStorage.getItem('flux.appearance') || localStorage.getItem('theme');

        if (savedTheme === 'dark' || (!savedTheme && prefersDark)) {
            document.documentElement.classList.add('dark');
            sunIcon.classList.remove('hidden');
            moonIcon.classList.add('hidden');
        } else {
            document.documentElement.classList.remove('dark');
            sunIcon.classList.add('hidden');
            moonIcon.classList.remove('hidden');
        }

        // Toggle theme
        themeToggle.addEventListener('click', function() {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('flux:appearance', 'light');
                localStorage.setItem('flux.appearance', 'light');
                localStorage.setItem('theme', 'light');
                sunIcon.classList.add('hidden');
                moonIcon.classList.remove('hidden');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('flux:appearance', 'dark');
                localStorage.setItem('flux.appearance', 'dark');
                localStorage.setItem('theme', 'dark');
                sunIcon.classList.remove('hidden');
                moonIcon.classList.add('hidden');
            }
        });

        // Scroll to top functionality
        const scrollToTopBtn = document.getElementById('scrollToTopBtn');
        const progressCircle = document.getElementById('progressCircle');
        const circumference = 283; // 2 * π * 45

        // Show/hide button and update progress on scroll
        window.addEventListener('scroll', function() {
            const scrollTop = window.scrollY || document.documentElement.scrollTop;
            const docHeight = document.documentElement.scrollHeight - window.innerHeight;
            const scrollPercent = scrollTop / docHeight;
            const scrollProgress = Math.min(scrollPercent * 100, 100);

            // Update progress circle
            const offset = circumference - (scrollProgress / 100) * circumference;
            progressCircle.style.strokeDashoffset = offset;

            // Show/hide button
            if (scrollTop > 300) {
                scrollToTopBtn.style.opacity = '1';
                scrollToTopBtn.style.pointerEvents = 'auto';
            } else {
                scrollToTopBtn.style.opacity = '0';
                scrollToTopBtn.style.pointerEvents = 'none';
            }
        });

        // Scroll to top when clicked
        scrollToTopBtn.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    });
</script>
