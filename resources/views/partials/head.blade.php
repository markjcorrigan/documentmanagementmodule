<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<!-- CSRF Token (required for Laravel Echo/Reverb authentication) -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Project Management Consulting South Africa | CMMI ITIL Agile Process Improvement</title>
<!-- SEO Meta Tags -->
<meta name="description" content="Expert project management consulting in South Africa. 35+ years experience in traditional & agile PM, ITIL 3/4, CMMI, governance, and process improvement. Move your organization from maturity level 0 to level 2+.">
<meta name="keywords" content="project management consulting south africa, agile project management, traditional project management, ITIL 3 consultant, ITIL 4 consultant, CMMI south africa, capability maturity model, process improvement consultant, governance consulting, strategic management consultant, business management consulting, project management south africa, cmmi level 2, process maturity south africa, project management expert johannesburg">
<meta name="author" content="PMWay">
<meta name="robots" content="index, follow">
<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:title" content="Project Management Consulting South Africa | CMMI ITIL Agile Expert">
<meta property="og:description" content="35+ years expertise in project management, ITIL, CMMI, governance and process improvement. Elevate your organization from capability maturity level 0 to level 2+.">
<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Project Management Consulting South Africa | CMMI ITIL Agile Expert">
<meta name="twitter:description" content="35+ years expertise in project management, ITIL, CMMI, governance and process improvement.">

<!-- User ID for Presence Channel (used by Echo/Reverb) -->

@auth
    <meta name="user-id" content="{{ auth()->id() }}">
    <meta name="user-name" content="{{ auth()->user()->name }}">
@endauth

@auth
    <script>
        window.userId = {{ auth()->id() }};
        const userId = {{ auth()->id() }}; // Some scripts use window.userId, some use just userId
    </script>
@endauth

<title>
    @if(!empty($title))
        {{ $title }}
    @else
        {{ config('app.name') }}
    @endif
</title>

<!-- Theme-aware Favicons -->
<link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}" media="(prefers-color-scheme: light)">
<link rel="icon" type="image/svg+xml" href="{{ asset('favicon-dark.svg') }}" media="(prefers-color-scheme: dark)">
<!-- Fallback -->
{{--<link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">--}}

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

<!-- Able Player CSS -->
<link rel="stylesheet" href="{{ asset('ableplayer/build/ableplayer.min.css') }}">

<!-- Vite Assets -->
@vite(['resources/css/app.css', 'resources/js/app.js'])

<!-- Flux Theme Support -->
@fluxAppearance

<!-- Livewire Styles -->
@livewireStyles

<!-- Additional Styles Stack -->
@stack('styles')

<!-- SweetAlert2 -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const isDark = document.documentElement.classList.contains('dark');

        const swalDefaults = Swal.mixin({
            customClass: {
                popup: isDark ? 'dark:bg-zinc-800 dark:text-white' : '',
                confirmButton: 'flux-button',
                cancelButton: 'flux-button'
            },
            background: isDark ? '#27272a' : '#ffffff',
            color: isDark ? '#ffffff' : '#000000'
        });

        const observer = new MutationObserver(function(mutations) {
            mutations.forEach(function(mutation) {
                if (mutation.attributeName === 'class') {
                    const isDark = document.documentElement.classList.contains('dark');
                    // Theme changed - could update Swal here
                }
            });
        });

        observer.observe(document.documentElement, {
            attributes: true,
            attributeFilter: ['class']
        });
    });
</script>

<!-- jQuery (required for Able Player) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- js-cookie (required by Able Player for storing preferences) -->
<script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.5/dist/js.cookie.min.js"></script>

<!-- jQuery UI (required for draggable pins) -->
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>

<!-- Able Player JS (must come AFTER jQuery and js-cookie) -->
<script src="{{ asset('ableplayer/build/ableplayer.min.js') }}"></script>

<!-- Livewire Alert -->
<x-livewire-alert::scripts />