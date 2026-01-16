<div class="container mx-auto p-4 pt-6">
    {{-- Page Title --}}
    <h1 class="text-3xl font-bold mb-8 text-gray-900 dark:text-white">Upload Image</h1>

    {{-- Success Message --}}
    @if (session()->has('success'))
        <div class="mb-6 bg-green-100 dark:bg-green-900 border border-green-400 dark:border-green-700
                    text-green-700 dark:text-green-100 px-4 py-3 rounded">
            {{ session('success') }}
        </div>
    @endif

    {{-- Upload Form --}}
    <div class="max-w-md mx-auto bg-white dark:bg-gray-900 rounded-lg shadow-lg p-8">
        <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- File Input with Custom Styling --}}
            <div class="mb-6">
                <input type="file"
                       name="image"
                       id="image"
                       accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff,.svg,.webp"
                       class="hidden"
                       onchange="document.getElementById('file-name').innerText = this.files[0].name">

                <label for="image"
                       class="inline-block w-full bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600
                              text-white font-medium py-3 px-6 rounded-lg text-center cursor-pointer
                              transition-colors duration-300">
                    <i class="fas fa-cloud-upload-alt mr-2"></i>
                    Choose Image
                </label>

                <span id="file-name" class="block mt-3 text-gray-600 dark:text-gray-400 text-sm">
                    No file chosen
                </span>
            </div>

            {{-- Upload Button --}}
            <button type="submit"
                    class="w-full bg-green-600 hover:bg-green-700 dark:bg-green-500 dark:hover:bg-green-600
                           text-white font-bold py-3 px-6 rounded-lg transition-colors duration-300">
                <i class="fas fa-upload mr-2"></i>
                Upload Image
            </button>

            {{-- Note --}}
            <p class="mt-4 text-sm text-gray-500 dark:text-gray-400 text-center">
                Supported formats: JPG, PNG, GIF, BMP, TIFF, SVG, WEBP
            </p>
        </form>
    </div>
</div>

<style>
    /* Custom file upload hover effects */
    label[for="image"]:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    label[for="image"]:active {
        transform: translateY(0);
    }

    /* Dark mode adjustments */
    .dark label[for="image"]:hover {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    }
</style>


