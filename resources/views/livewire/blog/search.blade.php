{{-- resources/views/livewire/blog/search.blade.php --}}
<div x-data="{ isOpen: false }" class="relative">
    {{-- Search Icon Button --}}
    <button
        @click="isOpen = true; setTimeout(() => $refs.searchInput.focus(), 100)"
        class="flex items-center justify-center w-10 h-10 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors"
        title="Search">
        <i class="fas fa-search text-xl text-gray-900 dark:text-white"></i>
    </button>

    {{-- Search Overlay --}}
    <div
        x-show="isOpen"
        x-cloak
        @click.away="isOpen = false"
        @keydown.escape.window="isOpen = false"
        class="fixed inset-0 z-[9999] flex items-start justify-center pt-20 bg-black/50 backdrop-blur-sm"
        style="display: none;">

        <div class="w-full max-w-2xl mx-4">
            {{-- Search Input Box --}}
            <div class="bg-white dark:bg-zinc-800 rounded-lg shadow-xl border border-gray-200 dark:border-zinc-700 p-6">
                <div class="flex items-center gap-3 mb-4">
                    <i class="fas fa-search text-gray-400 dark:text-gray-500"></i>
                    <input
                        x-ref="searchInput"
                        wire:model.live.debounce.500ms="searchTerm"
                        type="text"
                        placeholder="What are you interested in?"
                        class="flex-1 bg-transparent border-none focus:outline-none text-gray-900 dark:text-white text-lg placeholder-gray-500 dark:placeholder-gray-400"
                        autocomplete="off">
                    <button 
                        @click="isOpen = false" 
                        class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 transition-colors">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>

                {{-- Loading Indicator --}}
                <div wire:loading class="text-center py-4">
                    <i class="fas fa-spinner fa-spin text-blue-600 dark:text-blue-400 text-2xl"></i>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">Searching...</p>
                </div>

                {{-- Results --}}
                <div wire:loading.remove>
                    @if (count($results) == 0 && $searchTerm !== "")
                        <div class="text-center py-8">
                            <i class="fas fa-search text-gray-300 dark:text-gray-600 text-4xl mb-3"></i>
                            <p class="text-gray-600 dark:text-gray-400">
                                Sorry, we could not find any results for "<strong class="text-gray-900 dark:text-white">{{ $searchTerm }}</strong>".
                            </p>
                        </div>
                    @endif

                    @if (count($results) > 0)
                        <div class="space-y-2">
                            <div class="text-sm text-gray-600 dark:text-gray-400 mb-3 pb-2 border-b border-gray-200 dark:border-gray-700">
                                <strong class="text-gray-900 dark:text-white">{{count($results)}}</strong> {{count($results) > 1 ? "results" : "result"}} found
                            </div>

                            <div class="max-h-[60vh] overflow-y-auto space-y-2 pr-2">
                                @foreach($results as $post)
                                    <a href="/blog/post/{{$post->id}}"
                                       @click="isOpen = false"
                                       class="block p-4 rounded-lg hover:bg-gray-50 dark:hover:bg-zinc-700 transition-colors border border-gray-200 dark:border-zinc-700">
                                        <div class="flex items-start gap-3">
                                            @if($post->user->avatar)
                                                <img src="{{$post->user->avatar}}" 
                                                     alt="{{$post->user->name}}" 
                                                     class="w-10 h-10 rounded-full flex-shrink-0">
                                            @else
                                                <div class="w-10 h-10 rounded-full bg-gray-300 dark:bg-gray-700 flex items-center justify-center text-sm font-semibold text-gray-700 dark:text-gray-300 flex-shrink-0">
                                                    {{$post->user->initials()}}
                                                </div>
                                            @endif
                                            <div class="flex-1 min-w-0">
                                                <h4 class="font-semibold text-gray-900 dark:text-white mb-1">
                                                    {{$post->post_title}}
                                                </h4>
                                                <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">
                                                    by {{$post->user->name}} on {{$post->created_at->format('M j, Y')}}
                                                </p>
                                                <p class="text-sm text-gray-500 dark:text-gray-500 line-clamp-2">
                                                    {{ Str::limit(strip_tags($post->post_description ?? $post->post_content), 100) }}
                                                </p>
                                            </div>
                                            <i class="fas fa-arrow-right text-gray-400 dark:text-gray-600 mt-2 flex-shrink-0"></i>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>