@extends('images.imagelayout.default')

@section('header')
    @section('title', 'Image Demo')
    <x-documentsnav />
@endsection('header')

@section('maincontent')
    <main class="min-h-screen bg-gray-50 dark:bg-gray-900 transition-colors duration-300">
        <br>
        <div class="container mx-auto px-4 py-8">
            <h1 class="text-3xl font-bold mb-6 text-gray-900 dark:text-white">Image Demo</h1>

            @if(session('success'))
                <div class="mb-6 bg-green-100 dark:bg-green-900 border border-green-400 dark:border-green-700
                        text-green-700 dark:text-green-100 px-4 py-3 rounded">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 bg-red-100 dark:bg-red-900 border border-red-400 dark:border-red-700
                        text-red-700 dark:text-red-100 px-4 py-3 rounded">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Search Form -->
            <div class="mb-8 bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                <form method="GET" action="{{ route('myimage-demo') }}" class="flex flex-col sm:flex-row gap-3">
                    <input type="text"
                           name="q"
                           value="{{ $query ?? '' }}"
                           placeholder="Search images..."
                           class="flex-grow px-4 py-3 border border-gray-300 dark:border-gray-600
                              rounded-lg focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400
                              focus:border-transparent bg-white dark:bg-gray-700
                              text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400">
                    <div class="flex gap-2">
                        <button type="submit"
                                class="bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600
                                   text-white px-4 py-3 rounded-lg transition-colors">
                            Search
                        </button>
                        @if(!empty($query))
                            <a href="{{ route('myimage-demo') }}"
                               class="bg-gray-300 hover:bg-gray-400 dark:bg-gray-700 dark:hover:bg-gray-600
                                  text-gray-800 dark:text-gray-200 px-4 py-3 rounded-lg transition-colors">
                                Cancel
                            </a>
                        @endif
                    </div>
                </form>
            </div>

            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-4">
                <div class="text-sm text-gray-600 dark:text-gray-400">
                    Showing {{ $images->firstItem() ?? 0 }} to {{ $images->lastItem() ?? 0 }}
                    of {{ $images->total() }} results
                </div>

                <div class="flex justify-center sm:justify-end">
                    {{ $images->links('pagination::tailwind') }}
                </div>
            </div>

            @if($images->isEmpty())
                <p class="text-gray-500 dark:text-gray-400 text-center py-8">No images found.</p>
            @else
                <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach($images as $img)
                        @php
                            // Get image name from paginator item
                            $imgName = is_array($img) ? $img['name'] : $img;
                            $imgPath = '/storage/images/' . $imgName;
                            $snippet = '<img src="' . $imgPath . '" alt="' . pathinfo($imgName, PATHINFO_FILENAME) . '" class="image">';
                            $hash = md5($snippet);
                        @endphp

                        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 flex flex-col items-center
                                border border-gray-200 dark:border-gray-700 transition-colors duration-300">

                            {{-- Image Preview --}}
                            <div class="w-full h-48 mb-4 overflow-hidden rounded-lg">
                                <img src="{{ $imgPath }}"
                                     alt="{{ pathinfo($imgName, PATHINFO_FILENAME) }}"
                                     class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                            </div>

                            {{-- Image Filename --}}
                            <p class="text-sm text-gray-700 dark:text-gray-300 mb-4 font-mono break-words text-center">
                                {{ $imgName }}
                            </p>

                            {{-- HTML Snippet --}}
                            <div class="relative w-full mb-4">
                                <div class="absolute top-2 right-2 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300
                                        text-xs px-2 py-1 rounded opacity-70 z-10">
                                    Click to copy
                                </div>
                                <div class="rounded-lg bg-gray-100 dark:bg-gray-900 border border-gray-300 dark:border-gray-700 p-3
                                        whitespace-pre-wrap break-words overflow-hidden">
                                    <code class="language-html text-gray-800 dark:text-gray-300 font-mono text-sm"
                                          id="snippet-{{ $hash }}">
                                        {{ $snippet }}
                                    </code>
                                </div>
                            </div>

                            {{-- Copy Button --}}
                            <button
                                    type="button"
                                    onclick="copySnippet('{{ $hash }}')"
                                    id="btn-{{ $hash }}"
                                    class="w-full bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600
                                   text-white text-sm py-3 rounded-lg transition-all duration-200 font-medium"
                            >
                                Copy Image HTML
                                <span id="copied-{{ $hash }}" class="hidden ml-2 text-green-300">✓ Copied!</span>
                            </button>
                        </div>
                    @endforeach
                </div>

                {{-- Pagination --}}
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mt-8 gap-4">
                    <div class="text-sm text-gray-600 dark:text-gray-400">
                        Showing {{ $images->firstItem() ?? 0 }} to {{ $images->lastItem() ?? 0 }}
                        of {{ $images->total() }} results
                    </div>

                    <div class="flex justify-center sm:justify-end">
                        {{ $images->links('pagination::tailwind') }}
                    </div>
                </div>
            @endif
        </div>

        {{-- Copy Script --}}
        <script>
            function copySnippet(hash) {
                const codeElement = document.getElementById(`snippet-${hash}`);
                const button = document.getElementById(`btn-${hash}`);
                const copiedText = document.getElementById(`copied-${hash}`);

                if (!codeElement || !button) return;

                // Get the text content and clean up whitespace
                const snippet = codeElement.textContent.replace(/\s+/g, ' ').trim();

                try {
                    navigator.clipboard.writeText(snippet)
                        .then(function() {
                            // Show success state
                            button.textContent = 'Copied!';
                            button.classList.remove('bg-blue-600', 'hover:bg-blue-700',
                                'dark:bg-blue-500', 'dark:hover:bg-blue-600');
                            button.classList.add('bg-green-600', 'hover:bg-green-700',
                                'dark:bg-green-500', 'dark:hover:bg-green-600');

                            // Show checkmark
                            if (copiedText) {
                                copiedText.classList.remove('hidden');
                            }

                            // Reset after 2 seconds
                            setTimeout(() => {
                                button.textContent = 'Copy Image HTML';
                                button.classList.remove('bg-green-600', 'hover:bg-green-700',
                                    'dark:bg-green-500', 'dark:hover:bg-green-600');
                                button.classList.add('bg-blue-600', 'hover:bg-blue-700',
                                    'dark:bg-blue-500', 'dark:hover:bg-blue-600');

                                if (copiedText) {
                                    copiedText.classList.add('hidden');
                                }
                            }, 2000);
                        })
                        .catch(function(err) {
                            console.error('Copy failed', err);
                            alert('Copy failed. Try manually.');
                        });
                } catch (err) {
                    console.error('Copy failed', err);
                    alert('Copy failed. Try manually.');
                }
            }
        </script>
    </main>
@endsection('maincontent')

@section('footer')
    <x-footer />
@endsection('footer')