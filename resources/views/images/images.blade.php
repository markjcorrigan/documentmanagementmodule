<div class="container mx-auto p-4 pt-6">
    {{-- Page Title --}}
    <h1 class="text-3xl font-bold mb-6 text-gray-900 dark:text-white">Images</h1>

    {{-- Search Form --}}
    <div class="mb-8 bg-white dark:bg-gray-900 rounded-lg shadow p-6">
        <form action="{{ route('images') }}" method="GET" class="flex flex-col sm:flex-row gap-3">
            <input type="text"
                   name="query"
                   value="{{ $query ?? '' }}"
                   placeholder="Search images..."
                   class="flex-grow px-4 py-3 border border-gray-300 dark:border-gray-600
                          rounded-lg focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400
                          focus:border-transparent bg-white dark:bg-gray-800
                          text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400">

            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600
                           text-white font-medium py-3 px-6 rounded-lg transition-colors">
                Search
            </button>
        </form>
    </div>

    @if($images->count() > 0)
        {{-- Images Table --}}
        <div class="bg-white dark:bg-gray-900 rounded-lg shadow overflow-hidden">
            <table class="w-full border-collapse">
                <thead class="bg-gray-100 dark:bg-gray-800">
                <tr>
                    <th class="border border-gray-300 dark:border-gray-700 px-4 py-3 text-left text-gray-700 dark:text-gray-300 font-medium">
                        Name
                    </th>
                    <th class="border border-gray-300 dark:border-gray-700 px-4 py-3 text-left text-gray-700 dark:text-gray-300 font-medium">
                        Download
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach ($images as $image)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                        <td class="border border-gray-300 dark:border-gray-700 px-4 py-3 text-gray-900 dark:text-gray-200">
                            {{ $image->name }}
                        </td>
                        <td class="border border-gray-300 dark:border-gray-700 px-4 py-3">
                            <a href="{{ route('download', $image->name) }}"
                               class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300
                                      font-medium transition-colors">
                                Download
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="mt-6">
            {{ $images->links() }}
        </div>
    @else
        {{-- No Results Message --}}
        <div class="bg-white dark:bg-gray-900 rounded-lg shadow p-8 text-center">
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <h3 class="mt-2 text-lg font-medium text-gray-900 dark:text-white">No images found</h3>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                @if(!empty($query))
                    No images match your search for "{{ $query }}". Try a different search term.
                @else
                    There are no images available.
                @endif
            </p>
        </div>
    @endif
</div>