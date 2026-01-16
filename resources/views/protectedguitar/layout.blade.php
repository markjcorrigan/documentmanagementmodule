<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Guitar Practice Media - {{ config('app.name') }}</title>
    
    {{-- Tailwind CSS --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        zinc: {
                            800: '#27272a',
                        }
                    }
                }
            }
        }
    </script>
    
    {{-- Alpine.js --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    
    <style>
        /* Smooth transitions for dark mode */
        * {
            transition: background-color 0.2s ease-in-out, border-color 0.2s ease-in-out;
        }
        
        /* Custom scrollbar for dark mode */
        ::-webkit-scrollbar {
            width: 12px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        
        .dark ::-webkit-scrollbar-track {
            background: #1f2937;
        }
        
        ::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 6px;
        }
        
        .dark ::-webkit-scrollbar-thumb {
            background: #4b5563;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
        
        .dark ::-webkit-scrollbar-thumb:hover {
            background: #6b7280;
        }

        /* Ensure proper pagination styling */
        .pagination {
            display: flex;
            list-style: none;
            padding: 0;
            gap: 0.5rem;
        }

        .pagination li {
            margin: 0;
        }

        .pagination a,
        .pagination span {
            display: inline-block;
            padding: 0.5rem 0.75rem;
            border-radius: 0.375rem;
            transition: all 0.2s;
        }

        .pagination a {
            @apply bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-300 border border-gray-300 dark:border-gray-600;
        }

        .pagination a:hover {
            @apply bg-gray-50 dark:bg-gray-600;
        }

        .pagination .active span {
            @apply bg-blue-600 text-white border-blue-600;
        }

        .pagination .disabled span {
            @apply bg-gray-100 dark:bg-gray-800 text-gray-400 dark:text-gray-600 cursor-not-allowed;
        }
    </style>
</head>
<body class="h-full bg-zinc-800 dark:bg-zinc-800">
    <div class="min-h-full bg-gray-50 dark:bg-gray-900">
        @yield('content')
    </div>

    {{-- Initialize dark mode on page load --}}
    <script>
        // Check for dark mode preference on page load
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</body>
</html>
