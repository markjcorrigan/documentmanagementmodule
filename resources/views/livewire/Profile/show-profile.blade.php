@php
    $approvedCount = \App\Models\BlogPost::approvedCount();
@endphp

<div class="w-full max-w-6xl mx-auto px-4 py-6 md:py-12">
    {{-- Header Section --}}
    <div class="mb-8">
        <h1 class="text-4xl font-light text-zinc-600 dark:text-zinc-400 mb-4">Remember Writing?</h1>

        <div class="space-y-4 text-zinc-600 dark:text-zinc-400">
            <p class="text-lg">
                Are you sick of short tweets and impersonal "shared" posts that are reminiscent of the late 90's email forwards?
                We believe getting back to actually writing is the key to enjoying the internet again.
                Our users have authored <span class="font-semibold">{{ $approvedCount }}</span> posts.
            </p>
            <p class="text-lg">Your list of approved posts is below.</p>
        </div>
    </div>

    {{-- Profile Header with Avatar and Actions --}}
    <div class="mb-8">
        <div class="flex items-center gap-4 mb-6">
            <img class="w-16 h-16 rounded-full object-cover border-2 border-zinc-300 dark:border-zinc-600"
                 src="{{ $sharedData['avatar'] }}"
                 alt="{{ $sharedData['name'] }}" />

            @auth
                <div class="flex items-center gap-3">
                    {{-- Follow/Unfollow Buttons --}}
                    @if(!$sharedData['currentlyFollowing'] AND auth()->user()->name != $sharedData['name'])
                        <livewire:addfollow :name="$sharedData['name']" />
                    @endif

                    @if($sharedData['currentlyFollowing'])
                        <livewire:removefollow :name="$sharedData['name']" />
                    @endif

                    {{-- Manage Avatar Button (Own Profile) --}}
                    @if(auth()->user()->name == $sharedData['name'])
                        <flux:button
                            href="/manage-avatar"
                            size="sm"
                            variant="ghost"
                            class="bg-zinc-200 hover:bg-zinc-300 dark:bg-zinc-700 dark:hover:bg-zinc-600">
                            Manage Avatar
                        </flux:button>
                    @endif
                </div>
            @endauth
        </div>

        {{-- Profile Navigation Tabs --}}
        <div class="border-b border-zinc-200 dark:border-zinc-700">
            <nav class="flex gap-6 -mb-px" aria-label="Profile tabs">
                {{-- Posts Tab --}}
                <a wire:navigate
                   href="/profile/{{$sharedData['name']}}"
                   class="px-4 py-3 text-sm font-medium border-b-2 transition-colors
                          {{ Request::segment(3) == ''
                             ? 'border-blue-500 text-blue-600 dark:text-blue-400'
                             : 'border-transparent text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-zinc-100 hover:border-zinc-300 dark:hover:border-zinc-600' }}">
                    Posts: <span class="font-semibold">{{$sharedData['postCount']}} | {{ \App\Models\BlogPost::approvedByUser($sharedData['name'])->count()}}</span>
                </a>

                {{-- Followers Tab --}}
                <a wire:navigate
                   href="/profile/{{$sharedData['name']}}/followers"
                   class="px-4 py-3 text-sm font-medium border-b-2 transition-colors
                          {{ Request::segment(3) == 'followers'
                             ? 'border-blue-500 text-blue-600 dark:text-blue-400'
                             : 'border-transparent text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-zinc-100 hover:border-zinc-300 dark:hover:border-zinc-600' }}">
                    Followers: <span class="font-semibold">{{$sharedData['followerCount']}}</span>
                </a>

                {{-- Following Tab --}}
                <a wire:navigate
                   href="/profile/{{$sharedData['name']}}/following"
                   class="px-4 py-3 text-sm font-medium border-b-2 transition-colors
                          {{ Request::segment(3) == 'following'
                             ? 'border-blue-500 text-blue-600 dark:text-blue-400'
                             : 'border-transparent text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-zinc-100 hover:border-zinc-300 dark:hover:border-zinc-600' }}">
                    Following: <span class="font-semibold">{{$sharedData['followingCount']}}</span>
                </a>
            </nav>
        </div>
    </div>

    {{-- Profile Content Slot --}}
    <div class="mt-8">
        {{$slot}}
    </div>
</div>
