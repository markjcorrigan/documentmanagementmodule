@extends('documents.layouts.main')

@section('content')
<div class="container mx-auto px-4 py-8 !bg-white dark:!bg-zinc-900 min-h-screen transition-colors duration-300">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
                <i class="fas fa-trash"></i> Trashed Documents
            </h1>
            <p class="text-gray-600 dark:text-gray-400 mt-1">
                Restore or permanently delete documents
            </p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('documents.index') }}" 
               class="px-4 py-2 bg-gray-600 dark:bg-gray-700 text-white rounded-lg hover:bg-gray-700 dark:hover:bg-gray-600 transition">
                <i class="fas fa-arrow-left"></i> Back to Documents
            </a>

            <div style="width: 2rem;"></div>

            {{-- Dark/Light Mode Toggle --}}
            <button
                id="docs-theme-toggle"
                class="px-3 py-2 bg-gray-100 dark:bg-gray-800 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-700 transition-all duration-300 border border-gray-300 dark:border-gray-600"
                aria-label="Toggle theme"
                style="min-width: 44px; min-height: 44px;">
                
                {{-- BLACK MOON for light mode --}}
                <svg id="moon-icon" class="w-5 h-5 text-gray-900 transition-transform duration-500" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                </svg>
                
                {{-- YELLOW SUN for dark mode --}}
                <svg id="sun-icon" class="w-5 h-5 text-yellow-500 transition-transform duration-500 hidden" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="mb-6 bg-green-100 dark:bg-green-900/30 border border-green-400 dark:border-green-800 text-green-700 dark:text-green-200 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    @if(session('error'))
        <div class="mb-6 bg-red-100 dark:bg-red-900/30 border border-red-400 dark:border-red-800 text-red-700 dark:text-red-200 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif

    <!-- Trashed Documents List Component -->
    @livewire('documents.trashed-list')
</div>
@endsection

@push('scripts')
<script>
(function() {
    const moonIcon = document.getElementById('moon-icon');
    const sunIcon = document.getElementById('sun-icon');
    const toggleBtn = document.getElementById('docs-theme-toggle');
    
    function updateIcons() {
        const isDark = document.documentElement.classList.contains('dark');
        
        if (isDark) {
            document.body.classList.add('dark');
        } else {
            document.body.classList.remove('dark');
        }
        
        if (isDark) {
            moonIcon?.classList.add('hidden');
            sunIcon?.classList.remove('hidden');
        } else {
            moonIcon?.classList.remove('hidden');
            sunIcon?.classList.add('hidden');
        }
    }
    
    updateIcons();
    
    toggleBtn?.addEventListener('click', function() {
        const isDark = document.documentElement.classList.contains('dark');
        const newTheme = isDark ? 'light' : 'dark';
        
        localStorage.setItem('flux.appearance', newTheme);
        localStorage.setItem('theme', newTheme);
        
        if (newTheme === 'dark') {
            document.documentElement.classList.add('dark');
            document.body.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
            document.body.classList.remove('dark');
        }
        
        updateIcons();
    });
    
    const observer = new MutationObserver(function(mutations) {
        updateIcons();
    });
    
    observer.observe(document.documentElement, {
        attributes: true,
        attributeFilter: ['class']
    });
    
    window.addEventListener('storage', function(e) {
        if (e.key === 'flux.appearance' || e.key === 'theme') {
            updateIcons();
        }
    });
})();
</script>
@endpush
