{{-- Create Post - Tailwind Version --}}
<div class="max-w-3xl mx-auto px-4 py-8">
    <div class="bg-gray-50 dark:bg-gray-900 rounded-lg shadow-md p-8 border border-gray-200 dark:border-gray-700">
        <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">Create New Post</h2>

        <form wire:submit="save" class="space-y-6">
            {{-- Title --}}
            <div>
                <label for="post_title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Title <span class="text-red-500">*</span>
                </label>
                <input
                        type="text"
                        id="post_title"
                        wire:model="post_title"
                        class="w-full px-4 py-3 text-lg rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                        placeholder="Enter your post title..."
                        maxlength="255"
                >
                @error('post_title')
                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            {{-- Description --}}
            <div>
                <label for="post_description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Content <span class="text-red-500">*</span>
                </label>
                <textarea
                        id="post_description"
                        wire:model="post_description"
                        rows="12"
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                        placeholder="Write your post content..."
                ></textarea>
                @error('post_description')
                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                    You can use HTML formatting in your content
                </p>
            </div>

            {{-- Tags --}}
            <div>
                <label for="post_tags" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Tags
                </label>
                <input
                        type="text"
                        id="post_tags"
                        wire:model="post_tags"
                        class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                        placeholder="e.g. Laravel, Programming, Tutorial"
                        maxlength="500"
                >
                @error('post_tags')
                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                    Separate tags with commas
                </p>
            </div>

            {{-- Photo Upload --}}
            <div>
                <label for="photo" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Featured Image
                </label>
                <div class="flex items-center gap-4">
                    <label class="flex items-center px-4 py-2 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 rounded-lg border border-gray-300 dark:border-gray-600 cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Choose Image
                        <input type="file" wire:model="photo" accept="image/*" class="hidden" id="photo">
                    </label>
                    @if ($photo)
                        <span class="text-sm text-gray-600 dark:text-gray-400">{{ $photo->getClientOriginalName() }}</span>
                    @endif
                </div>
                @error('photo')
                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                    Max size: 2MB. Formats: JPG, PNG, GIF
                </p>

                {{-- Photo Preview --}}
                @if ($photo)
                    <div class="mt-4">
                        <img src="{{ $photo->temporaryUrl() }}" alt="Preview" class="w-full h-64 object-cover rounded-lg">
                    </div>
                @endif
            </div>

            {{-- Submit Button --}}
            <div class="flex items-center justify-between pt-6 border-t border-gray-200 dark:border-gray-700">
                <a href="/blog/feed" wire:navigate class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition-colors">
                    ← Cancel
                </a>
                <button
                        type="submit"
                        class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800"
                >
                    Publish Post
                </button>
            </div>
        </form>
    </div>
</div>