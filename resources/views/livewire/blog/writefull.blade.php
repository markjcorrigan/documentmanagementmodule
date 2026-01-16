{{-- Following Feed - Tailwind Version --}}
<div class="max-w-4xl mx-auto px-4 py-8">
    @if($posts->isEmpty())
        <div class="text-center py-12">
            <div class="mb-6">
                <svg class="mx-auto h-24 w-24 text-gray-400 dark:text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                </svg>
            </div>
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                No posts available yet
            </h2>
            <p class="text-lg text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                There are no approved blog posts to display. Check back soon!
            </p>
        </div>
    @else
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white text-center mb-2">
                Hello <strong>{{ auth()->user()->name }}</strong>
            </h2>

            @if($mode === 'discovery')
                <p class="text-center text-gray-600 dark:text-gray-400 mb-2">
                    You're not following anyone yet. Here are all recent posts to help you discover writers:
                </p>
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white text-center">
                    Discover & Follow Writers
                </h3>
                <p class="text-center text-sm text-blue-600 dark:text-blue-400 mt-2">
                    💡 Click on author names to visit their profile and follow them
                </p>
            @else
                <p class="text-center text-gray-600 dark:text-gray-400 mb-2">
                    Below is your personalized feed from the {{ $followingCount }} {{ Str::plural('writer', $followingCount) }} you follow:
                </p>
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white text-center">
                    The latest from those you follow
                </h3>
            @endif
        </div>

        {{-- Posts List - Compact Format --}}
        <div class="bg-gray-50 dark:bg-gray-900 rounded-lg shadow-md border border-gray-200 dark:border-gray-700 divide-y divide-gray-200 dark:divide-gray-700">
            @foreach($posts as $post)
                <div class="p-4 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
                    {{-- Author Info --}}
                    <div class="flex items-center mb-3">
                        <a href="/blog/profile/{{ $post->user->name }}" wire:navigate class="flex items-center hover:opacity-75 transition-opacity">
                            @if($post->user->avatar)
                                <img src="{{ $post->user->avatar }}"
                                     alt="{{ $post->user->name }}"
                                     class="h-8 w-8 rounded-full object-cover border-2 border-gray-200 dark:border-gray-600">
                            @else
                                <div class="h-8 w-8 rounded-full bg-gray-300 dark:bg-gray-700 flex items-center justify-center text-gray-900 dark:text-white font-semibold text-xs">
                                    {{ $post->user->initials() }}
                                </div>
                            @endif
                            <div class="ml-2">
                                <p class="text-sm font-medium text-gray-900 dark:text-white hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                                    {{ $post->user->name }}
                                </p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">{{ $post->created_at->format('M j, Y') }}</p>
                            </div>
                        </a>
                    </div>

                    {{-- Post Content --}}
                    <a href="/blog/post/{{ $post->id }}" wire:navigate class="block group">
                        <div class="flex items-start justify-between gap-4">
                            <div class="flex-1">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors mb-1">
                                    {{ $post->post_title }}
                                </h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400 line-clamp-2 mb-2">
                                    {{ Str::limit($post->clean_description, 150) }}
                                </p>
                                <div class="flex items-center gap-4 text-xs text-gray-500 dark:text-gray-500">
                                    @if($post->post_tags)
                                        <span>{{ Str::limit($post->post_tags, 40) }}</span>
                                    @endif
                                </div>
                            </div>

                            {{-- Small thumbnail if photo exists --}}
                            @if($post->photo)
                                <img src="{{ $post->photo }}"
                                     alt="{{ $post->post_title }}"
                                     class="w-16 h-16 rounded object-cover flex-shrink-0">
                            @endif
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="mt-8">
            {{ $posts->links() }}
        </div>
    @endif
</div>