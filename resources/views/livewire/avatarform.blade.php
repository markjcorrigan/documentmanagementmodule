<section class="w-full py-5">
    <div class="container mx-auto px-4">
        <div class="flex justify-center">
            <div class="w-full md:w-1/4">
                <form wire:submit="save" action="/manage-avatar" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="avatar" class="inline-block bg-gray-600 hover:bg-gray-700 text-white font-medium py-2 px-4 rounded cursor-pointer transition duration-200">
                            Choose an avatar
                            <input wire:loading.attr="disabled" wire:target="avatar" wire:model.live="avatar"
                                   type="file" id="avatar" name="avatar" class="hidden" onchange="previewAvatar(event)">
                        </label>
                        @error('avatar')
                        <p class="mt-2 text-sm text-red-600 bg-red-50 p-2 rounded shadow-sm">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <img src="{{ $this->avatarPreview }}" alt="Avatar Preview"
                             class="w-32 h-32 rounded-full object-cover border-2 border-gray-300" id="avatar-preview">
                    </div>
                    <button wire:loading.attr="disabled" wire:target="avatar"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded transition duration-200">
                        Save
                    </button>
                </form>
            </div>
        </div>
        <div class="h-96"></div>
    </div>
</section>
