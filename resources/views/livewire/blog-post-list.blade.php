
<div class="w-full sm:max-w-2xl mt-6 mb-6 px-6 py-8 bg-white shadow-md overflow-hidden sm:rounded-lg">
    <button wire:click="sortByUpvotes" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Sort by Upvotes</button>
    <button wire:click="sortByLatest" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Sort by Latest</button>

    @foreach ($posts as $post)
        <div wire:key="post-{{ $post->id }}">
            <div class="pb-3 pt-3 flex">
                <div class="w-2/12">
                    <livewire:blogpost-votes :blogpost="$post" :key="$post->id" />
                </div>
                <div class="w-10/12">
                    <h3 class="text-2xl mb-1">{{ $post->post_title }}</h3>
                    <p class="mb-1">{{ \Illuminate\Support\Str::words($post->post_description, 30) }}</p>
                </div>
            </div>
            <hr />
        </div>
    @endforeach

</div>




