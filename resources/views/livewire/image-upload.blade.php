<div class="p-6 max-w-7xl mx-auto">
    {{-- Upload Form --}}
    <form wire:submit.prevent="save" class="mb-6">
        <div class="flex items-center gap-4">
            <input type="file" wire:model="image" multiple class="border p-2 rounded w-full" />
            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded shadow">
                Upload
            </button>
        </div>

        @error('image.*')
        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
        @enderror
    </form>

    {{-- Flash Message --}}
    @if (session()->has('message'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-6">
            {{ session('message') }}
        </div>
    @endif

    {{-- Image Grid --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach ($images as $image)
            @php
                // Extract just the filename from the asset path (e.g. 'storage/images/foo.jpg')
                $relativePath = str_replace(asset(''), '', $image);
                $filename = basename($relativePath);
                // Construct the HTML-ready snippet
                $snippet = '<img src="/storage/images/' . $filename . '" alt="' . pathinfo($filename, PATHINFO_FILENAME) . '" class="image">';
                $hash = md5($snippet);
            @endphp

            <div class="bg-white rounded-2xl shadow-lg p-4 flex flex-col items-center">
                {{-- Image Preview --}}
                <img src="{{ $image }}" alt="{{ pathinfo($filename, PATHINFO_FILENAME) }}"
                     class="rounded-lg mb-3 w-full h-48 object-cover shadow-sm">

                {{-- HTML Snippet --}}
                <div class="w-full">
                    <textarea
                        readonly
                        id="link-{{ $hash }}"
                        class="border rounded w-full text-xs p-2 focus:outline-none bg-gray-50 text-gray-700 cursor-pointer resize-none"
                        rows="3"
                    >{{ $snippet }}</textarea>

                    {{-- Copy Button --}}
                    <button
                        type="button"
                        onclick="copyToClipboard('{{ $hash }}')"
                        id="btn-{{ $hash }}"
                        class="mt-2 w-full bg-blue-500 hover:bg-blue-600 text-white text-sm py-2 rounded transition-all duration-200"
                    >
                        Copy Image HTML
                    </button>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Pagination --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mt-8 gap-4">
        <div class="text-sm text-gray-600">
            Showing {{ $images->firstItem() ?? 0 }} to {{ $images->lastItem() ?? 0 }}
            of {{ $images->total() }} results
        </div>

        <div class="flex justify-center sm:justify-end space-x-2">
            {{ $images->links() }}
        </div>
    </div>


</div>

{{-- Copy Script --}}
<script>
    function copyToClipboard(hash) {
        const input = document.getElementById(`link-${hash}`);
        const button = document.getElementById(`btn-${hash}`);

        navigator.clipboard.writeText(input.value).then(() => {
            button.textContent = 'Copied!';
            button.classList.add('bg-green-500', 'hover:bg-green-600');
            button.classList.remove('bg-blue-500', 'hover:bg-blue-600');

            setTimeout(() => {
                button.textContent = 'Copy Image HTML';
                button.classList.remove('bg-green-500', 'hover:bg-green-600');
                button.classList.add('bg-blue-500', 'hover:bg-blue-600');
            }, 2000);
        });
    }
</script>
