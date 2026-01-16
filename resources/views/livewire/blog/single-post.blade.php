{{-- Single Post View - Tailwind Version --}}
<div class="max-w-4xl mx-auto px-4 py-8">
    @push('styles')
        <style>
            /* Custom prose styles for dark mode content */
            .prose.dark\:prose-invert {
                color: #e4e4e7;
            }

            .prose.dark\:prose-invert h1,
            .prose.dark\:prose-invert h2,
            .prose.dark\:prose-invert h3,
            .prose.dark\:prose-invert h4,
            .prose.dark\:prose-invert h5,
            .prose.dark\:prose-invert h6 {
                color: #f4f4f5;
            }

            .prose.dark\:prose-invert a {
                color: #60a5fa;
            }

            .prose.dark\:prose-invert a:hover {
                color: #93c5fd;
            }

            .prose.dark\:prose-invert strong {
                color: #f4f4f5;
            }

            .prose.dark\:prose-invert code {
                color: #f472b6;
                background-color: #3f3f46;
            }

            .prose.dark\:prose-invert pre {
                background-color: #18181b;
                border: 1px solid #3f3f46;
            }

            .prose.dark\:prose-invert blockquote {
                border-left-color: #52525b;
                color: #d4d4d8;
            }
        </style>
    @endpush

    <article class="bg-gray-50 dark:bg-gray-900 rounded-lg shadow-md overflow-hidden border border-gray-200 dark:border-gray-700">
        {{-- Featured Image --}}
        @if($post->photo)
            <img src="{{ $post->photo }}" alt="{{ $post->post_title }}" class="w-full h-96 object-cover">
        @endif

        {{-- Post Header --}}
        <div class="p-8">
            {{-- Title --}}
            <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-6">
                {{ $post->post_title }}
            </h1>

            {{-- Author & Meta Info --}}
            <div class="flex items-center mb-6 pb-6 border-b border-gray-200 dark:border-gray-700">
                <a href="/blog/profile/{{ $post->user->name }}" wire:navigate class="flex items-center hover:opacity-75 transition-opacity">
                    @if($post->user->avatar)
                        <img src="{{ $post->user->avatar }}"
                             alt="{{ $post->user->name }}"
                             class="h-12 w-12 rounded-full object-cover border-2 border-gray-200 dark:border-gray-600">
                    @else
                        <div class="h-12 w-12 rounded-full bg-gray-300 dark:bg-gray-700 flex items-center justify-center text-gray-900 dark:text-white font-semibold">
                            {{ $post->user->initials() }}
                        </div>
                    @endif
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $post->user->name }}</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">
                            Published {{ $post->created_at->format('F j, Y') }}
                            @if($post->created_at != $post->updated_at)
                                • Updated {{ $post->updated_at->format('F j, Y') }}
                            @endif
                        </p>
                    </div>
                </a>
            </div>

            {{-- Post Content --}}
            <div class="prose prose-lg dark:prose-invert max-w-none mb-8">
                <div class="text-gray-800 dark:text-gray-200 leading-relaxed">
                    {!! $post->post_description !!}
                </div>
            </div>

            {{-- Tags --}}
            @if($post->post_tags)
                <div class="mb-6 pb-6 border-b border-gray-200 dark:border-zinc-700">
                    <p class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">Tags:</p>
                    <div class="flex flex-wrap gap-2">
                        @foreach(explode(',', $post->post_tags) as $tag)
                            <span class="px-4 py-2 bg-gray-100 dark:bg-zinc-700 text-gray-700 dark:text-gray-300 text-sm rounded-full">
                                {{ trim($tag) }}
                            </span>
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- Vote Component --}}
            <div class="flex items-center justify-between">
{{--                <div class="flex items-center gap-6">--}}
{{--                    <livewire:blog-post-votes :blogPost="$post" designTemplate="tailwind" :key="'post-votes-'.$post->id" />--}}
{{--                </div>--}}

                <a href="/blog/feed" wire:navigate class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition-colors">
                    ← Back to feed
                </a>
            </div>
        </div>
    </article>

    {{-- Comments Section (Future Enhancement) --}}
{{--    <div class="mt-8 bg-gray-50 dark:bg-gray-900 rounded-lg shadow-md p-8 border border-gray-200 dark:border-gray-700">--}}
{{--        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Comments</h3>--}}
{{--        <p class="text-gray-600 dark:text-gray-400">Comments feature coming soon!</p>--}}
{{--    </div>--}}
</div>