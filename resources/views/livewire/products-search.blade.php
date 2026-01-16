<div class="container mx-auto py-16 px-8">
    @if ($productDeletedMessage)
        <div class="alert alert-success">
            {{ $productDeletedMessage }}
        </div>
    @endif
    @if ($productSavedMessage)
        <div class="alert alert-success">
            {{ $productSavedMessage }}
        </div>
    @endif
    <script>
        document.addEventListener('livewire:load', () => {
        @this.on('showMessage', () => {
            setTimeout(() => {
            @this.resetMessages()
            }, 3000);
        });
        });
    </script>
        <div class="mb-4 flex justify-between">
            <div class="flex">
                <input type="text" wire:model.live="search" placeholder="Search for Products" class="w-full py-2 px-4 rounded-l-lg border border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @if($search)
                    <button wire:click="$set('search', '')" class="py-2 px-4 bg-gray-200 hover:bg-gray-300 rounded-r-lg text-gray-600 shadow-sm">Clear</button>
                @endif
            </div>
            <button wire:click="create" class="py-2 px-4 bg-indigo-500 hover:bg-indigo-600 rounded-lg text-white shadow-md">Add Product</button>
        </div>


        <table class="table-auto w-full border-collapse border border-gray-200">
        <thead>
        <tr>
            <th class="py-2 px-3 bg-gray-100 border-b-2 border-gray-200 text-left text-gray-600">ID</th>
            <th class="py-2 px-3 bg-gray-100 border-b-2 border-gray-200 text-left text-gray-600">Image</th>
            <th class="py-2 px-3 bg-gray-100 border-b-2 border-gray-200 text-left text-gray-600">Title</th>
            <th class="py-2 px-3 bg-gray-100 border-b-2 border-gray-200 text-left text-gray-600">Price</th>
            <th class="py-2 px-3 bg-gray-100 border-b-2 border-gray-200 text-left text-gray-600">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td class="py-2 px-3 border-b border-gray-200">{{$product->id}}</td>
                <td class="py-2 px-3 border-b border-gray-200">
                    <img class="w-16 h-16 object-cover rounded" src="{{ asset('storage/' . $product->image) }}">
                </td>
                <td class="py-2 px-3 border-b border-gray-200">{{$product->title}}</td>
                <td class="py-2 px-3 border-b border-gray-200">{{$product->price}}</td>
                <td class="py-2 px-3 border-b border-gray-200">
                    <button wire:click="edit({{$product->id}})" class="py-1 px-2 bg-blue-500 hover:bg-blue-600 rounded-lg text-white shadow-md">Edit</button>
                    <button wire:click="delete({{$product->id}})" class="py-1 px-2 bg-red-500 hover:bg-red-600 rounded-lg text-white shadow-md">Delete</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="mt-4">
        {{$products->links()}}
    </div>
    @if($isOpen)
        @include('livewire.product-form')
    @endif
</div>

