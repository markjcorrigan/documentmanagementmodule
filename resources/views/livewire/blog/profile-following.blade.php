{{-- resources/views/livewire/blog/profile-following.blade.php --}}
<div class="profile-following-page-content">
    <div class="max-w-6xl mx-auto px-4 py-8">

        <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-8 border-b border-gray-200 dark:border-gray-700 pb-4">
            {{ $user->name }} is Following
        </h1>

        {{-- Flash Messages --}}
        @if (session()->has('success'))
            <div class="bg-green-50 dark:bg-green-900/30 border border-green-200 dark:border-green-700 text-green-800 dark:text-green-200 px-4 py-3 rounded-lg mb-6">
                <p class="text-lg text-gray-700 dark:text-gray-300">{{ session('success') }}</p>
            </div>
        @endif

        @if (session()->has('error'))
            <div class="bg-red-50 dark:bg-red-900/30 border border-red-200 dark:border-red-700 text-red-800 dark:text-red-200 px-4 py-3 rounded-lg mb-6">
                <p class="text-lg text-gray-700 dark:text-gray-300">{{ session('error') }}</p>
            </div>
        @endif

        {{-- Profile Header --}}
        <div class="bg-white dark:bg-zinc-800 rounded-lg shadow-md border border-gray-200 dark:border-zinc-700 p-6 mb-8">
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
                        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-2">{{ $user->name }}</h2>
                        <p class="text-lg text-gray-700 dark:text-gray-300">People {{ $user->name }} follows</p>
                    </div>
                </div>
            </div>

            {{-- Stats Tabs --}}
            <div class="flex gap-6 mt-6 pt-6 border-t border-gray-200 dark:border-zinc-700">
                <a href="/blog/profile/{{ $user->name }}"
                   class="flex flex-col items-center px-4 py-2 rounded-lg transition-colors hover:bg-gray-50 dark:hover:bg-zinc-700 text-gray-600 dark:text-gray-400">
                    <span class="text-2xl font-bold">{{ $user->posts()->count() }}</span>
                    <span class="text-sm text-gray-700 dark:text-gray-300">Posts</span>
                </a>
                <a href="/blog/profile/{{ $user->name }}/followers"
                   class="flex flex-col items-center px-4 py-2 rounded-lg transition-colors hover:bg-gray-50 dark:hover:bg-zinc-700 text-gray-600 dark:text-gray-400">
                    <span class="text-2xl font-bold">{{ $user->followers()->count() }}</span>
                    <span class="text-sm text-gray-700 dark:text-gray-300">Followers</span>
                </a>
                <a href="/blog/profile/{{ $user->name }}/following"
                   class="flex flex-col items-center px-4 py-2 rounded-lg transition-colors bg-blue-50 dark:bg-blue-900/20 text-blue-600 dark:text-blue-400">
                    <span class="text-2xl font-bold">{{ $user->followingTheseUsers()->count() }}</span>
                    <span class="text-sm text-gray-700 dark:text-gray-300">Following</span>
                </a>
            </div>
        </div>

        {{-- Following List Section --}}
        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">Following</h2>

        @if($following->isEmpty())
            <div class="bg-white dark:bg-zinc-800 rounded-lg shadow-md border border-gray-200 dark:border-zinc-700 p-12 text-center">
                <div class="mb-6">
                    <i class="fas fa-users text-6xl text-gray-400 dark:text-gray-600"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Not Following Anyone Yet</h3>
                <p class="text-lg text-gray-700 dark:text-gray-300">
                    {{ $isCurrentUser ? "You're not following anyone yet." : $user->name . " isn't following anyone yet." }}
                </p>
            </div>
        @else
            <div class="bg-white dark:bg-zinc-800 rounded-lg shadow-md border border-gray-200 dark:border-zinc-700 divide-y divide-gray-200 dark:divide-zinc-700">
                @foreach($following as $follow)
                    @php
                        $followedUser = $follow->userBeingFollowed;
                    @endphp

                    @if($followedUser)
                        <div class="p-6 hover:bg-gray-50 dark:hover:bg-zinc-700/50 transition-colors">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-4">
                                    {{-- Avatar --}}
                                    @if($followedUser->avatar)
                                        <img src="{{ $followedUser->avatar }}"
                                             alt="{{ $followedUser->name }}"
                                             class="w-16 h-16 rounded-full object-cover border-2 border-gray-200 dark:border-zinc-600">
                                    @else
                                        <div class="w-16 h-16 rounded-full bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center text-white font-bold text-xl">
                                            {{ $followedUser->initials() }}
                                        </div>
                                    @endif

                                    {{-- User Info --}}
                                    <div>
                                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-1">
                                            <a href="/blog/profile/{{ $followedUser->name }}"
                                               class="hover:text-blue-600 dark:hover:text-blue-400 transition-colors"
                                               wire:navigate>
                                                {{ $followedUser->name }}
                                            </a>
                                        </h4>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">
                                            Member since {{ $followedUser->created_at->format('M Y') }}
                                        </p>
                                    </div>
                                </div>

                                {{-- Action Buttons --}}
                                @auth
                                    <div class="flex gap-2">
                                        @if($isCurrentUser)
                                            {{-- User can unfollow people they're following --}}
                                            <button wire:click="unfollow({{ $followedUser->id }})"
                                                    wire:confirm="Are you sure you want to unfollow {{ $followedUser->name }}?"
                                                    class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-colors">
                                                <i class="fas fa-user-minus mr-2"></i>
                                                Unfollow
                                            </button>
                                        @elseif(Auth::id() !== $followedUser->id)
                                            {{-- Other users can follow/unfollow these users --}}
                                            @php
                                                $isFollowing = Auth::user()->followingTheseUsers()
                                                    ->where('followeduser', $followedUser->id)
                                                    ->exists();
                                            @endphp

                                            @if($isFollowing)
                                                <button wire:click="unfollow({{ $followedUser->id }})"
                                                        class="px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg transition-colors">
                                                    <i class="fas fa-user-minus mr-2"></i>
                                                    Unfollow
                                                </button>
                                            @else
                                                <button wire:click="followUser({{ $followedUser->id }})"
                                                        class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors">
                                                    <i class="fas fa-user-plus mr-2"></i>
                                                    Follow
                                                </button>
                                            @endif
                                        @endif
                                    </div>
                                @endauth
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        @endif
    </div>
</div>