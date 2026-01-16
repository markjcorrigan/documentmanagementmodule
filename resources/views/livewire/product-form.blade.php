<div class="bg-white rounded-lg shadow-md p-4 w-1/2">
    <h2 class="text-lg font-bold mb-2">{{ $productId ? 'Edit Product' : 'Add Product' }}</h2>
    <form wire:submit.prevent="save">
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" wire:model="title" id="title" class="block w-full p-2 border border-gray-300 rounded-lg">
            @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
            <input type="file" wire:model="image" id="image" class="block w-full p-2 border border-gray-300 rounded-lg">
            @error('image') <span class="text-red-500">{{ $message }}</span> @enderror
            @if($image)
                <img src="{{ $image->temporaryUrl() }}" class="w-16 h-16 object-cover rounded">
            @endif
        </div>
        <div class="mb-4">
            <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
            <input type="number" wire:model="price" id="price" class="block w-full p-2 border border-gray-300 rounded-lg">
            @error('price') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="flex justify-end">
            <button type="button" wire:click="$emit('closeModal')" class="py-2 px-4 bg-gray-500 hover:bg-gray-600 rounded-lg text-white shadow-md mr-2">Cancel</button>
            <button type="submit" class="py-2 px-4 bg-indigo-500 hover:bg-indigo-600 rounded-lg text-white shadow-md">Save</button>
        </div>
    </form>
</div>

