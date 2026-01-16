<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('fontawesome6/css/all.min.css') }}">

    @vite('resources/css/app.css')

    {{-- SIMPLE THEME INIT ONLY - NO TOGGLE LOGIC --}}
    <script>
        (function() {
            try {
                // Check ALL possible theme storage keys
                const savedTheme = localStorage.getItem('flux.appearance') ||
                    localStorage.getItem('flux:appearance') ||
                    localStorage.getItem('theme');

                const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

                let theme = savedTheme;
                if (!savedTheme || savedTheme === 'system') {
                    theme = systemPrefersDark ? 'dark' : 'light';
                }

                if (theme === 'dark') {
                    document.documentElement.classList.add('dark');
                }
            } catch (error) {
                console.log('Theme init failed');
            }
        })();
    </script>
</head>
<body class="bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 min-h-screen transition-colors duration-300">
<header>
    <nav>
        <title>@yield('title')</title>
        @yield('header')
    </nav>
</header>
<main class="pt-16">
    @yield('maincontent')
</main>

<footer>
    @yield('footer')
</footer>

{{-- REMOVE ALL THEME SCRIPT FROM HERE --}}
{{-- The navigation component handles theme toggling --}}
</body>
</html>