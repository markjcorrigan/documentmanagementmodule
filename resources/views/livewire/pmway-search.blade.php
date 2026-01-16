<section class="w-full max-w-md mx-auto mt-20">
    {{-- PMWay Search on the main menu --}}
    <div class="flex flex-col items-center">
        <!-- Search input -->
        <input
            type="search"
            wire:model.live="searchTerm"
            placeholder="Search..."
            class="w-full p-4 mb-4 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-100 dark:bg-gray-700 text-lg text-gray-900 dark:text-white"
        >

        <!-- Results -->
        @if($results->count() > 0)
            <ul class="w-full">
                @foreach($results as $result)
                    <li class="py-2 border-b border-gray-200 dark:border-gray-700 flex justify-between">
                        <a href="{{ $result->link }}" class="text-blue-500 hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-300">
                            {{ $result->terms }}
                        </a>
                        @can('Super Admin')
                            <input type="checkbox" wire:click="updateChecked({{ $result->id }})" {{ $result->checked ? 'checked' : '' }}>
                        @endcan
                    </li>
                @endforeach
            </ul>

            <!-- Load More button -->
            @if($results->hasMorePages())
                <button wire:click="nextPage" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-700">
                    Load More
                </button>
            @endif
        @else
            <!-- No results -->
            <p class="mt-6 text-gray-500 dark:text-gray-400 text-center">
                No results found.
            </p>
        @endif
    </div>
</section>
