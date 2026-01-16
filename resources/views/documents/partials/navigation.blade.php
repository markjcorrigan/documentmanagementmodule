{{-- Documents Module Navigation --}}
<nav class="bg-white dark:bg-zinc-900 border-b border-gray-200 dark:border-gray-700 shadow-sm">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center h-16">
            
            {{-- Left Side - HOME --}}
            <div class="flex items-center">
                <a href="{{ route('home') }}" 
                   class="px-4 py-2 text-gray-900 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 font-semibold text-lg transition"
                   title="Home">
                    HOME
                </a>
            </div>

            {{-- Right Side - Documents Landing --}}
            <div class="flex items-center space-x-4">
                <a href="{{ route('documents.index') }}" 
                   class="px-4 py-2 text-gray-900 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 font-semibold text-lg transition inline-flex items-center"
                   title="Document Library">
                    <i class="fas fa-file-alt mr-2"></i>
                    Documents
                </a>
                
                @can('manage assets')
                <a href="{{ route('documents.trashed') }}" 
                   class="px-4 py-2 text-gray-600 dark:text-gray-400 hover:text-red-600 dark:hover:text-red-400 transition inline-flex items-center"
                   title="Trash">
                    <i class="fas fa-trash mr-2"></i>
                    Trash
                </a>
                @endcan
            </div>

        </div>
    </div>
</nav>