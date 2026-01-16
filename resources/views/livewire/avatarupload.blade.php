<div class="max-w-md mx-auto p-6">
    <form wire:submit="save" action="/manage-avatar" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        {{-- File Input --}}
        <div>
            <label for="avatar" class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg cursor-pointer transition-colors duration-200 shadow-md hover:shadow-lg">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                Choose an avatar
                <input wire:loading.attr="disabled" wire:target="avatar" wire:model="avatar"
                       type="file" id="avatar" name="avatar" class="hidden" onchange="previewAvatar(event)">
            </label>
            @error('avatar')
            <p class="mt-2 text-sm text-red-600 dark:text-red-400 bg-red-50 dark:bg-red-900/20 px-3 py-2 rounded-lg">{{ $message }}</p>
            @enderror
        </div>

        {{-- Avatar Preview --}}
        <div class="flex justify-center">
            @if ($avatar)
                <img src="{{ $avatar->temporaryUrl() }}" alt="Avatar Preview"
                     class="w-32 h-32 rounded-full border-4 border-gray-200 dark:border-gray-600 shadow-lg object-cover"
                     id="avatar-preview">
            @else
                <img src="{{ url('storage/avatars/blogpostnewavatar_no-img-avatar.jpg') }}" alt="Avatar Preview"
                     class="w-32 h-32 rounded-full border-4 border-gray-200 dark:border-gray-600 shadow-lg object-cover"
                     id="avatar-preview">
            @endif
        </div>

        {{-- Submit Button --}}
        <div class="flex justify-center">
            <button
                wire:loading.attr="disabled"
                wire:target="avatar"
                class="inline-flex items-center px-8 py-3 bg-green-600 hover:bg-green-700 disabled:bg-green-400 text-white font-semibold rounded-lg transition-colors duration-200 shadow-md hover:shadow-lg"
            >
                <svg wire:loading wire:target="avatar" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span wire:loading.remove wire:target="avatar">Save Avatar</span>
                <span wire:loading wire:target="avatar">Saving...</span>
            </button>
        </div>
    </form>
</div>

<script>
    function previewAvatar(event) {
        const input = event.target;
        const preview = document.getElementById('avatar-preview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
