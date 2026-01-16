{{-- Profile Posts - Tailwind Version with CSS Scoping --}}

<style>
    /* =================================
       SCOPED STYLES FOR PROFILE PAGE
       Prevents conflicts with header/menu
       ================================= */

    /* Explicitly protect chat button from any width constraints */
    a[href*="chat.index"] flux\:button,
    a[href*="chat.index"] {
        width: auto !important;
        min-width: auto !important;
        max-width: none !important;
    }

    /* Ensure chat button displays properly */
    .profile-posts-page-content ~ * a[href*="chat.index"] flux\:button {
        display: flex !important;
        align-items: center !important;
        padding: 0.25rem 0.5rem !important;
    }

    /* Scope any custom styles to this page only */
    .profile-posts-page-content {
        /* Add page-specific styles here if needed */
    }
</style>

{{-- ✅ CRITICAL: Opening wrapper div --}}
<div class="profile-posts-page-content">

    <div class="max-w-6xl mx-auto px-4 py-8">
        {{--    <p class="text-blue-500 text-xs mb-4">resources/views/livewire/blog/profile-posts.blade.php</p>--}}

        {{-- Profile Header --}}
        <div class="bg-gray-50 dark:bg-gray-900 rounded-lg shadow-md border border-gray-200 dark:border-gray-700 p-6 mb-8">
            <div class="flex items-center justify-between flex-wrap gap-4">
                {{-- Avatar and Name --}}
                <div class="flex items-center gap-4">
                    @if($user->avatar)
                        <img src="{{ $user->avatar }}"
                             alt="{{ $user->name }}"
                             class="w-20 h-20 rounded-full object-cover border-4 border-gray-200 dark:border-zinc-600">
                    @else
                        <div class="w-20 h-20 rounded-full bg-gray-300 dark:bg-gray-700 flex items-center justify-center text-2xl font-bold text-gray-900 dark:text-white border-4 border-gray-200 dark:border-zinc-600">
                            {{ $user->initials() }}
                        </div>
                    @endif
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">{{ $user->name }}</h1>
                        <p class="text-gray-600 dark:text-gray-400">Member since {{ $user->created_at ? $user->created_at->format('M Y') : 'Unknown' }}</p>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="flex items-center gap-2">
                    @auth
                        @if($isCurrentUser)
                            <a href="/manage-avatar"
                               class="px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg transition-colors">
                                <i class="fas fa-user-circle mr-2"></i>
                                Manage Avatar
                            </a>
                        @else
                            {{-- Follow/Unfollow buttons --}}
                            <livewire:blog.addfollow :name="$user->name" :key="'follow-'.$user->id" />
                            <livewire:blog.removefollow :name="$user->name" :key="'unfollow-'.$user->id" />
                        @endif
                    @endauth
                </div>
            </div>

            {{-- Stats Tabs --}}
            <div class="flex gap-6 mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
                <a href="/blog/profile/{{ $user->name }}"
                   class="flex flex-col items-center px-4 py-2 rounded-lg transition-colors {{ request()->is('blog/profile/'.$user->name) ? 'bg-blue-50 dark:bg-blue-900/20 text-blue-600 dark:text-blue-400' : 'hover:bg-gray-50 dark:hover:bg-gray-800 text-gray-600 dark:text-gray-400' }}">
                    <span class="text-2xl font-bold">{{ $posts->total() }}</span>
                    <span class="text-sm">Posts</span>
                </a>
                <a href="/blog/profile/{{ $user->name }}/followers"
                   class="flex flex-col items-center px-4 py-2 rounded-lg transition-colors hover:bg-gray-50 dark:hover:bg-gray-800 text-gray-600 dark:text-gray-400">
                    <span class="text-2xl font-bold">{{ $user->followers()->count() }}</span>
                    <span class="text-sm">Followers</span>
                </a>
                <a href="/blog/profile/{{ $user->name }}/following"
                   class="flex flex-col items-center px-4 py-2 rounded-lg transition-colors hover:bg-gray-50 dark:hover:bg-gray-800 text-gray-600 dark:text-gray-400">
                    <span class="text-2xl font-bold">{{ $user->followingTheseUsers()->count() }}</span>
                    <span class="text-sm">Following</span>
                </a>
            </div>
        </div>

        {{-- Posts Section --}}
        @if($posts->isEmpty())
            <div class="text-center py-12">
                <div class="mb-6">
                    <i class="fas fa-inbox text-6xl text-gray-400 dark:text-gray-600"></i>
                </div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                    No posts yet
                </h2>
                <p class="text-lg text-gray-600 dark:text-gray-400">
                    {{ $isCurrentUser ? "You haven't created any posts yet." : $user->name . " hasn't created any posts yet." }}
                </p>
            </div>
        @else
            {{-- Posts List - Compact Version --}}
            <div class="bg-gray-50 dark:bg-gray-900 rounded-lg shadow-md border border-gray-200 dark:border-gray-700 divide-y divide-gray-200 dark:divide-gray-700">
                @foreach($posts as $post)
                    <div class="p-4 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
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
                                        <span>{{ $post->created_at->format('M j, Y') }}</span>
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

    {{-- ✅ CRITICAL: Closing wrapper div --}}
</div>