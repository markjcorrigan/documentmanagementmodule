@extends('images.imagelayout.default')

@section('title', 'All Images')

@section('header')
    <x-documentsnav />
@endsection

@section('maincontent')
    <main class="min-h-screen">
        <!-- Image Preview Modal -->
        <div id="imagePreviewModal" class="fixed inset-0 bg-black bg-opacity-90 dark:bg-opacity-95 z-50 hidden items-center justify-center p-4">
            <div class="relative max-w-4xl max-h-[90vh]">
                <button onclick="closePreview()"
                        class="absolute -top-10 right-0 text-white dark:text-gray-200 text-2xl
                               hover:text-gray-300 dark:hover:text-gray-100 transition-colors">
                    <i class="fas fa-times"></i>
                </button>
                <img id="previewImage" class="max-w-full max-h-[80vh] object-contain rounded-lg shadow-2xl">
                <div id="previewCaption" class="text-white dark:text-gray-200 text-center mt-4 text-lg"></div>
            </div>
        </div>

        <div class="container mx-auto p-4 pt-6">
            {{-- Success Alert --}}
            @if (session()->has('success'))
                <div class="bg-green-100 dark:bg-green-900 border border-green-400 dark:border-green-700 text-green-700 dark:text-green-100 px-4 py-3 rounded mb-6">
                    {{ session()->get('success') }}
                </div>
            @endif
            {{-- Error Alert --}}
            @if (session()->has('error'))
                <div class="bg-red-100 dark:bg-red-900 border border-red-400 dark:border-red-700 text-red-700 dark:text-red-100 px-4 py-3 rounded mb-6">
                    {{ session()->get('error') }}
                </div>
            @endif

            <h1 class="text-3xl font-bold mb-6 text-gray-900 dark:text-white">All Images</h1>

            <!-- SEARCH FORM -->
            <div class="mb-8 bg-white dark:bg-gray-900 rounded-lg shadow p-6">
                <form action="{{ route('image-uploading') }}" method="GET" class="flex flex-col sm:flex-row gap-3">
                    <input type="text"
                           name="search"
                           value="{{ $searchTerm ?? request('search') ?? '' }}"
                           placeholder="Search images by name or description..."
                           class="flex-grow px-4 py-3 border border-gray-300 dark:border-gray-600
                                  rounded-lg focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400
                                  focus:border-transparent bg-white dark:bg-gray-800
                                  text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400">

                    <div class="flex gap-2">
                        <button type="submit"
                                class="bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600
                                       text-white font-medium py-3 px-6 rounded-lg transition-colors">
                            Search
                        </button>

                        @if(!empty($searchTerm) || request('search'))
                            <a href="{{ route('image-uploading') }}"
                               class="bg-gray-300 hover:bg-gray-400 dark:bg-gray-700 dark:hover:bg-gray-600
                                      text-gray-800 dark:text-gray-200 font-medium py-3 px-6 rounded-lg transition-colors">
                                Clear
                            </a>
                        @endif
                    </div>
                </form>
            </div>

            <!-- UPLOAD FORM -->
            <div class="mb-10 bg-white dark:bg-gray-900 rounded-lg shadow p-6">
                <h2 class="text-xl font-semibold mb-4 text-gray-900 dark:text-white">Upload New Image</h2>

                <form action="{{ route('uploading') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- File Input -->
                    <div class="mb-6">
                        <label class="block mb-2 font-medium text-gray-700 dark:text-gray-300">Select Image:</label>
                        <input type="file"
                               name="image"
                               required
                               accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff,.svg,.webp"
                               class="block w-full text-sm text-gray-500 dark:text-gray-400
                                      file:mr-4 file:py-3 file:px-4 file:rounded-lg
                                      file:border-0 file:text-sm file:font-medium
                                      file:bg-blue-50 file:text-blue-700 dark:file:bg-blue-900 dark:file:text-blue-200
                                      hover:file:bg-blue-100 dark:hover:file:bg-blue-800
                                      cursor-pointer transition-colors"
                               onchange="document.getElementById('file-name').innerText = this.files[0].name">
                        <span id="file-name" class="text-gray-600 dark:text-gray-400 mt-2 block text-sm">
                            No file chosen
                        </span>
                    </div>

                    <!-- Optional Description -->
                    <div class="mb-6">
                        <label for="description" class="block mb-2 font-medium text-gray-700 dark:text-gray-300">
                            Description (optional):
                            <span class="text-gray-500 dark:text-gray-400 text-sm font-normal">
                                Leave empty to use shortname
                            </span>
                        </label>
                        <textarea name="description"
                                  rows="3"
                                  class="block w-full p-3 border border-gray-300 dark:border-gray-600
                                         rounded-lg focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400
                                         focus:border-transparent bg-white dark:bg-gray-800
                                         text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400"
                                  placeholder="Enter image description..."></textarea>
                    </div>

                    <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600
                                   text-white font-bold py-3 px-6 rounded-lg transition-colors">
                        Upload Image
                    </button>
                </form>
            </div>

            @if($images->count() > 0)
                <!-- Top Pagination -->
                <div class="mb-6">
                    {{ $images->links('pagination::tailwind') }}
                </div>

                <!-- Responsive table/cards -->
                <div class="hidden md:block overflow-x-auto bg-white dark:bg-gray-900 rounded-lg shadow">
                    <!-- Table for medium+ screens -->
                    <table class="w-full border-collapse">
                        <thead class="bg-gray-100 dark:bg-gray-800">
                        <tr>
                            <th class="border border-gray-300 dark:border-gray-700 px-4 py-3 text-left text-gray-700 dark:text-gray-300">Name</th>
                            <th class="border border-gray-300 dark:border-gray-700 px-4 py-3 text-left text-gray-700 dark:text-gray-300">Short Name</th>
                            <th class="border border-gray-300 dark:border-gray-700 px-4 py-3 text-left text-gray-700 dark:text-gray-300">Description</th>
                            <th class="border border-gray-300 dark:border-gray-700 px-4 py-3 text-left text-gray-700 dark:text-gray-300">Preview</th>
                            <th class="border border-gray-300 dark:border-gray-700 px-4 py-3 text-left text-gray-700 dark:text-gray-300">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($images as $image)
                            @php
                                $imagePath = storage_path('app/public/images/' . $image->name);
                                $imageUrl = asset('storage/images/' . $image->name);

                                // Get extension from filename if database field is empty
                                $extension = $image->extension;
                                if (empty($extension)) {
                                    $extension = strtolower(pathinfo($image->name, PATHINFO_EXTENSION));
                                }

                                $isImage = in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp', 'svg']);
                                $fileExists = file_exists($imagePath);
                            @endphp
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                                <td class="border border-gray-300 dark:border-gray-700 px-4 py-3 text-gray-900 dark:text-gray-200">{{ $image->name }}</td>
                                <td class="border border-gray-300 dark:border-gray-700 px-4 py-3 text-gray-900 dark:text-gray-200">{{ $image->shortname }}</td>
                                <td class="border border-gray-300 dark:border-gray-700 px-4 py-3 text-gray-900 dark:text-gray-200">{{ $image->description }}</td>
                                <td class="border border-gray-300 dark:border-gray-700 px-4 py-3">
                                    @if($isImage && $fileExists)
                                        <div class="relative inline-block">
                                            <img src="{{ $imageUrl }}"
                                                 alt="{{ $image->description }}"
                                                 class="w-16 h-16 object-cover rounded border border-gray-300 dark:border-gray-600
                                                        cursor-pointer hover:opacity-80 transition-opacity"
                                                 loading="lazy"
                                                 onclick="openPreview('{{ $imageUrl }}', '{{ $image->name }} - {{ $image->description }}')"
                                                 onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                            <div class="w-16 h-16 bg-gray-200 dark:bg-gray-700 rounded hidden items-center justify-center">
                                                <i class="fas fa-file-image text-gray-500 dark:text-gray-400"></i>
                                            </div>
                                        </div>
                                    @else
                                        <div class="w-16 h-16 bg-gray-200 dark:bg-gray-700 rounded flex items-center justify-center">
                                            <i class="fas fa-file-image text-gray-500 dark:text-gray-400"></i>
                                        </div>
                                    @endif
                                </td>
                                <td class="border border-gray-300 dark:border-gray-700 px-4 py-3">
                                    <div class="flex flex-wrap gap-2">
                                        <a href="{{ route('images.download', $image->shortname) }}"
                                           class="flex-1 bg-green-600 hover:bg-green-700 dark:bg-green-500 dark:hover:bg-green-600
                                                  text-white font-medium py-2 px-3 rounded text-center transition-colors">
                                            Download
                                        </a>
                                        <a href="{{ route('images.edit', $image->id) }}"
                                           class="flex-1 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600
                                                  text-white font-medium py-2 px-3 rounded text-center transition-colors">
                                            Edit
                                        </a>
                                        <form action="{{ route('images.destroy', $image->id) }}" method="POST" class="flex-1">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="w-full bg-red-600 hover:bg-red-700 dark:bg-red-500 dark:hover:bg-red-600
                                                           text-white font-medium py-2 px-3 rounded text-center transition-colors"
                                                    onclick="return confirm('Delete this image?')">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Card layout for small screens -->
                <div class="md:hidden space-y-4">
                    @foreach ($images as $image)
                        @php
                            $imagePath = storage_path('app/public/images/' . $image->name);
                            $imageUrl = asset('storage/images/' . $image->name);

                            // Get extension from filename if database field is empty
                            $extension = $image->extension;
                            if (empty($extension)) {
                                $extension = strtolower(pathinfo($image->name, PATHINFO_EXTENSION));
                            }

                            $isImage = in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp', 'svg']);
                            $fileExists = file_exists($imagePath);
                        @endphp
                        <div class="bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-700 rounded-lg p-4 shadow-sm">
                            <div class="flex items-start gap-4">
                                @if($isImage && $fileExists)
                                    <div class="relative">
                                        <img src="{{ $imageUrl }}"
                                             alt="{{ $image->description }}"
                                             class="w-20 h-20 object-cover rounded border border-gray-300 dark:border-gray-600
                                                    cursor-pointer"
                                             loading="lazy"
                                             onclick="openPreview('{{ $imageUrl }}', '{{ $image->name }} - {{ $image->description }}')"
                                             onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                        <div class="w-20 h-20 bg-gray-200 dark:bg-gray-700 rounded hidden items-center justify-center">
                                            <i class="fas fa-file-image text-gray-500 dark:text-gray-400"></i>
                                        </div>
                                        <div class="absolute inset-0 bg-black bg-opacity-0 hover:bg-opacity-10
                                                    dark:hover:bg-opacity-20 transition-all duration-200 rounded"></div>
                                    </div>
                                @else
                                    <div class="w-20 h-20 bg-gray-200 dark:bg-gray-700 rounded flex items-center justify-center">
                                        <i class="fas fa-file-image text-gray-500 dark:text-gray-400"></i>
                                    </div>
                                @endif
                                <div class="flex-1">
                                    <p class="mb-2"><strong class="text-gray-700 dark:text-gray-300">Name:</strong>
                                        <span class="text-gray-900 dark:text-gray-200">{{ $image->name }}</span></p>
                                    <p class="mb-2"><strong class="text-gray-700 dark:text-gray-300">Short Name:</strong>
                                        <span class="text-gray-900 dark:text-gray-200">{{ $image->shortname }}</span></p>
                                    <p><strong class="text-gray-700 dark:text-gray-300">Description:</strong>
                                        <span class="text-gray-900 dark:text-gray-200">{{ $image->description }}</span></p>
                                </div>
                            </div>
                            <div class="flex flex-col gap-2 mt-4">
                                <a href="{{ route('images.download', $image->shortname) }}"
                                   class="bg-green-600 hover:bg-green-700 dark:bg-green-500 dark:hover:bg-green-600
                                          text-white font-medium py-2 rounded text-center transition-colors">
                                    Download
                                </a>
                                <a href="{{ route('images.edit', $image->id) }}"
                                   class="bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600
                                          text-white font-medium py-2 rounded text-center transition-colors">
                                    Edit
                                </a>
                                <form action="{{ route('images.destroy', $image->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="w-full bg-red-600 hover:bg-red-700 dark:bg-red-500 dark:hover:bg-red-600
                                                   text-white font-medium py-2 rounded text-center transition-colors"
                                            onclick="return confirm('Delete this image?')">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{ $images->links('pagination::tailwind') }}
            @else
                {{-- No Results Message --}}
                <div class="bg-white dark:bg-gray-900 rounded-lg shadow p-8 text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <h3 class="mt-2 text-lg font-medium text-gray-900 dark:text-white">No images found</h3>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                        @if(!empty($searchTerm) || request('search'))
                            No images match your search for "{{ $searchTerm ?? request('search') }}". Try a different search term.
                        @else
                            There are no images available.
                        @endif
                    </p>
                </div>
            @endif

            @if (session()->has('success'))
                <p class="text-green-600 dark:text-green-400 mt-6 text-center">{{ session('success') }}</p>
            @endif
        </div>
        <br><br><br><br>
        <br><br><br><br>
    </main>

    <script>
        function openPreview(imageUrl, caption) {
            document.getElementById('previewImage').src = imageUrl;
            document.getElementById('previewCaption').textContent = caption;
            document.getElementById('imagePreviewModal').classList.remove('hidden');
            document.getElementById('imagePreviewModal').classList.add('flex');
            document.body.style.overflow = 'hidden';
        }

        function closePreview() {
            document.getElementById('imagePreviewModal').classList.add('hidden');
            document.getElementById('imagePreviewModal').classList.remove('flex');
            document.body.style.overflow = 'auto';
        }

        // Close modal on ESC key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closePreview();
            }
        });

        // Close modal when clicking outside image
        document.getElementById('imagePreviewModal').addEventListener('click', function(event) {
            if (event.target === this) {
                closePreview();
            }
        });
    </script>
@endsection

@section('footer')
    <x-footer />
@endsection