{{-- resources/views/livewire/logs/logs-manager.blade.php --}}
<div class="max-w-7xl mx-auto px-4 py-8">
    {{-- Header --}}
    <div class="mb-8">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <h1 class="text-4xl font-bold text-gray-900 dark:text-white border-b border-gray-200 dark:border-gray-700 pb-4">
                <i class="fa-solid fa-journal-text mr-2"></i>My Logs
            </h1>
            
            {{-- Create Button with Dropdown --}}
            <div class="relative" x-data="{ open: false }">
                <div class="flex">
                    <button wire:click="openCreateModal" 
                            class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-l-lg transition-colors">
                        <i class="fa-solid fa-plus mr-2"></i>New Log
                    </button>
                    <button @click="open = !open" 
                            class="px-3 py-2 bg-blue-600 hover:bg-blue-700 text-white border-l border-blue-700 rounded-r-lg transition-colors">
                        <i class="fa-solid fa-chevron-down"></i>
                    </button>
                </div>
                
                {{-- Dropdown Menu --}}
                <div x-show="open" 
                     @click.away="open = false"
                     x-transition:enter="transition ease-out duration-100"
                     x-transition:enter-start="transform opacity-0 scale-95"
                     x-transition:enter-end="transform opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-75"
                     x-transition:leave-start="transform opacity-100 scale-100"
                     x-transition:leave-end="transform opacity-0 scale-95"
                     class="absolute right-0 mt-2 w-56 bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 z-50">
                    @foreach($templates as $template)
                        <button wire:click="createFromTemplate({{ $template->id }})" 
                                @click="open = false"
                                class="w-full text-left px-4 py-2 text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors first:rounded-t-lg">
                            <i class="fa-solid fa-file-lines mr-2"></i>{{ $template->name }}
                        </button>
                    @endforeach
                    <hr class="border-gray-200 dark:border-gray-700">
                    <button wire:click="openTemplateModal" 
                            @click="open = false"
                            class="w-full text-left px-4 py-2 text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors rounded-b-lg">
                        <i class="fa-solid fa-plus-circle mr-2"></i>Manage Templates
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Flash Message --}}
    @if (session()->has('message'))
        <div class="mb-6 flex items-center justify-between px-4 py-3 bg-green-50 dark:bg-green-900/30 border border-green-200 dark:border-green-800 rounded-lg">
            <div class="flex items-center text-green-800 dark:text-green-300">
                <i class="fa-solid fa-circle-check mr-2"></i>
                {{ session('message') }}
            </div>
            <button onclick="this.parentElement.remove()" 
                    class="text-green-600 hover:text-green-800 dark:text-green-400 dark:hover:text-green-300">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
    @endif

    {{-- Search and Filters --}}
    <div class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg p-6 mb-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            {{-- Search --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                    <i class="fa-solid fa-magnifying-glass mr-1"></i>Search
                </label>
                <input type="text"
                       wire:model.live.debounce.300ms="searchTerm"
                       class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                       placeholder="Search logs...">
            </div>

            {{-- Category Filter --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                    <i class="fa-solid fa-folder mr-1"></i>Category
                </label>
                <select wire:model.live="filterCategory" 
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                    <option value="">All Categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }} ({{ $category->logs_count }})</option>
                    @endforeach
                </select>
            </div>

            {{-- Tag Filter --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                    <i class="fa-solid fa-tags mr-1"></i>Tag
                </label>
                <select wire:model.live="filterTag" 
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                    <option value="">All Tags</option>
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- View Type --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                    <i class="fa-solid fa-eye mr-1"></i>View
                </label>
                <select wire:model.live="viewType" 
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                    <option value="all">All Logs</option>
                    <option value="own">My Logs</option>
                    <option value="shared">Shared with Me</option>
                </select>
            </div>
        </div>
    </div>

    {{-- Logs Grid --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($logs as $log)
            <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow-sm hover:shadow-lg transition-shadow duration-300">
                <div class="p-6">
                    {{-- Header with Pin and Category --}}
                    <div class="flex justify-between items-start mb-3">
                        <div class="flex-grow-1">
                            @if($log->category)
                                <span class="inline-block px-3 py-1 rounded-full text-xs font-medium mb-2" 
                                      style="background-color: {{ $log->category->color }}; color: white;">
                                    {{ $log->category->name }}
                                </span>
                            @endif
                            @if($log->user_id !== auth()->id())
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200 mb-2">
                                    <i class="fa-solid fa-share mr-1"></i>Shared by {{ $log->user->name }}
                                </span>
                            @endif
                        </div>
                        @if($log->is_pinned)
                            <i class="fa-solid fa-thumbtack text-yellow-500 text-lg"></i>
                        @endif
                    </div>

                    {{-- Title --}}
                    <h5 class="text-xl font-bold text-gray-900 dark:text-white mb-2">{{ $log->title }}</h5>

                    {{-- Content Preview --}}
                    @if($log->content)
                        <p class="text-gray-600 dark:text-gray-400 text-sm mb-3 line-clamp-3">
                            {{ $log->content }}
                        </p>
                    @endif

                    {{-- Tags --}}
                    @if($log->tags->count() > 0)
                        <div class="flex flex-wrap gap-2 mb-3">
                            @foreach($log->tags as $tag)
                                <span class="inline-flex items-center px-2 py-1 rounded text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300">
                                    <i class="fa-solid fa-tag mr-1"></i>{{ $tag->name }}
                                </span>
                            @endforeach
                        </div>
                    @endif

                    {{-- Attachments Preview --}}
                    @if($log->attachments->count() > 0)
                        <div class="flex gap-3 mb-3 text-gray-600 dark:text-gray-400 text-sm">
                            @if($log->images->count() > 0)
                                <span>
                                    <i class="fa-solid fa-image mr-1"></i>{{ $log->images->count() }} image(s)
                                </span>
                            @endif
                            @if($log->documents->count() > 0)
                                <span>
                                    <i class="fa-solid fa-file mr-1"></i>{{ $log->documents->count() }} doc(s)
                                </span>
                            @endif
                        </div>
                    @endif

                    {{-- Meta Info --}}
                    <div class="text-gray-500 dark:text-gray-400 text-sm">
                        <i class="fa-solid fa-clock mr-1"></i>{{ $log->created_at->diffForHumans() }}
                    </div>
                </div>

                {{-- Actions --}}
                <div class="border-t border-gray-200 dark:border-gray-700 p-3 bg-gray-50 dark:bg-gray-900">
                    <div class="flex gap-2">
                        <button wire:click="openEditModal({{ $log->id }})" 
                                class="flex-1 px-3 py-2 border border-blue-600 text-blue-600 hover:bg-blue-50 dark:border-blue-400 dark:text-blue-400 dark:hover:bg-blue-900/30 font-medium rounded-lg text-sm transition-colors"
                                title="Edit">
                            <i class="fa-solid fa-pencil"></i>
                        </button>
                        
                        <button wire:click="togglePin({{ $log->id }})" 
                                class="flex-1 px-3 py-2 border border-gray-600 text-gray-600 hover:bg-gray-50 dark:border-gray-400 dark:text-gray-400 dark:hover:bg-gray-700 font-medium rounded-lg text-sm transition-colors"
                                title="Pin">
                            <i class="fa-solid fa-{{ $log->is_pinned ? 'thumbtack' : 'thumbtack' }}"></i>
                        </button>
                        
                        @can('share', $log)
                            <button wire:click="openShareModal({{ $log->id }})" 
                                    class="flex-1 px-3 py-2 border border-green-600 text-green-600 hover:bg-green-50 dark:border-green-400 dark:text-green-400 dark:hover:bg-green-900/30 font-medium rounded-lg text-sm transition-colors"
                                    title="Share">
                                <i class="fa-solid fa-share"></i>
                            </button>
                        @endcan
                        
                        {{-- Export Dropdown --}}
                        <div class="relative flex-1" x-data="{ open: false }">
                            <button @click="open = !open" 
                                    class="w-full px-3 py-2 border border-purple-600 text-purple-600 hover:bg-purple-50 dark:border-purple-400 dark:text-purple-400 dark:hover:bg-purple-900/30 font-medium rounded-lg text-sm transition-colors"
                                    title="Export">
                                <i class="fa-solid fa-download"></i>
                            </button>
                            <div x-show="open" 
                                 @click.away="open = false"
                                 class="absolute bottom-full mb-1 right-0 w-32 bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 z-10">
                                <button wire:click="exportLog({{ $log->id }}, 'pdf')" 
                                        @click="open = false"
                                        class="w-full text-left px-3 py-2 text-sm text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded-t-lg">
                                    PDF
                                </button>
                                <button wire:click="exportLog({{ $log->id }}, 'markdown')" 
                                        @click="open = false"
                                        class="w-full text-left px-3 py-2 text-sm text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded-b-lg">
                                    Markdown
                                </button>
                            </div>
                        </div>
                        
                        @can('delete', $log)
                            <button wire:click="deleteLog({{ $log->id }})"
                                    wire:confirm="Are you sure you want to delete this log?"
                                    class="flex-1 px-3 py-2 border border-red-600 text-red-600 hover:bg-red-50 dark:border-red-400 dark:text-red-400 dark:hover:bg-red-900/30 font-medium rounded-lg text-sm transition-colors"
                                    title="Delete">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        @endcan
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-12">
                <i class="fa-solid fa-journal-whills text-gray-300 dark:text-gray-600 text-6xl mb-4"></i>
                <p class="text-xl text-gray-500 dark:text-gray-400">No logs found. Create your first log!</p>
            </div>
        @endforelse
    </div>

    {{-- Pagination --}}
    <div class="mt-8">
        {{ $logs->links() }}
    </div>

    {{-- Modals --}}
    @if($showModal)
        @include('livewire.logs.partials.log-modal')
    @endif

    @if($showShareModal)
        @include('livewire.logs.partials.share-modal')
    @endif

    @if($showTemplateModal)
        @include('livewire.logs.partials.template-modal')
    @endif

    @if($showPreviewModal)
        @include('livewire.logs.partials.preview-modal')
    @endif
</div>

@push('styles')
<style>
    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
@endpush