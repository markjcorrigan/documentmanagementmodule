<div x-data="{ isOpen: false }">
    <button x-on:click="isOpen = true; setTimeout(() => document.querySelector('#live-search-field').focus(), 50)"
            style="background: none; border: none; padding: 0; margin: 0; outline: none; cursor: pointer"
            class="text-white mr-2 header-search-icon" title="Search" data-toggle="tooltip" data-placement="bottom">
        <i class="fas fa-search"></i>
    </button>

    <div class="search-overlay fixed inset-0 bg-gray-900 bg-opacity-90 z-50" x-bind:class="isOpen ? 'search-overlay--visible' : ''">

    <div class="search-overlay-top shadow-sm">
            <div class="container mx-auto px-4 py-2" style="max-width: 100%; padding: 0 20px;">
                <label for="live-search-field" class="search-overlay-icon">
                    <i class="fas fa-search"></i>
                </label>
                <input
                    x-on:keydown="document.querySelector('.circle-loader').classList.add('circle-loader--visible'); if (document.querySelector('#no-results')) {document.querySelector('#no-results').style.display = 'none'}"
                    wire:model.live.debounce.750ms="searchTerm"
                    autocomplete="off"
                    type="text"
                    id="live-search-field"
                    class="live-search-field w-full px-4 py-2 rounded-md"
                    placeholder="What are you interested in?">
                <span wire:click="$set('searchTerm', '')" x-on:click="isOpen = false" class="close-live-search ml-2 cursor-pointer">
                    <i class="fas fa-times-circle"></i>
                </span>
            </div>
        </div>

        <div class="search-overlay-bottom w-full">
            <div class="container mx-auto px-4 py-3" style="max-width: 100%; padding: 0 20px;">
                <div class="circle-loader"></div>

                @if($images->isNotEmpty())
                    <div class="hidden md:block">
                        <table class="table table-striped table-bordered w-full border-collapse border border-gray-400">
                            <thead class="bg-gray-200">
                            <tr>
                                <th class="border border-gray-400 px-4 py-2">ID</th>
                                <th class="border border-gray-400 px-4 py-2">Name</th>
                                <th class="border border-gray-400 px-4 py-2">Short Name</th>
                                <th class="border border-gray-400 px-4 py-2">Path</th>
                                <th class="border border-gray-400 px-4 py-2">Created At</th>
                                <th class="border border-gray-400 px-4 py-2">Updated At</th>
                                <th class="border border-gray-400 px-4 py-2">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($images as $image)
                                <tr>
                                    <td class="border border-gray-400 px-4 py-2">{{ $image->id }}</td>
                                    <td class="border border-gray-400 px-4 py-2">{{ $image->name }}</td>
                                    <td class="border border-gray-400 px-4 py-2">{{ $image->shortname }}</td>
                                    <td class="border border-gray-400 px-4 py-2">{{ $image->path }}</td>
                                    <td class="border border-gray-400 px-4 py-2">{{ $image->created_at }}</td>
                                    <td class="border border-gray-400 px-4 py-2">{{ $image->updated_at }}</td>
                                    <td class="border border-gray-400 px-4 py-2 flex flex-wrap gap-2">
                                        <a wire:click.prevent="editImage({{ $image->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded text-center">Edit</a>
                                        <button wire:click="deleteImage({{ $image->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Delete</button>
                                        <a href="{{ route('downloadByShortName', $image->shortname) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded text-center">Download</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        <div class="mt-4">
                            {{ $images->links() }}  <!-- Make sure Livewire pagination is triggered -->
                        </div>
                    </div>
                @else
                    <p id="no-results" class="alert alert-danger text-center shadow-sm mt-4">No results found for your search term.</p>
                @endif
            </div>
        </div>
    </div>
</div>
