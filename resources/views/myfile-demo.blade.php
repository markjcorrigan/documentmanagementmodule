@extends('documents.documentlayout.default')

@section('header')
    @section('title', 'File Demo')
    <x-documentsnav />
@endsection('header')

@section('maincontent')
    <main class="min-h-screen bg-gray-50 dark:bg-gray-900 transition-colors duration-300">
        <br>
        <div class="container mx-auto px-4 py-8">
            <h1 class="text-3xl font-bold mb-6 text-gray-900 dark:text-white">File Demo</h1>

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
                <form method="GET" action="{{ route('myfile-demo') }}" class="flex flex-col sm:flex-row gap-3">
                    <input type="text"
                           name="q"
                           value="{{ $query ?? '' }}"
                           placeholder="Search files..."
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
                            <a href="{{ route('myfile-demo') }}"
                               class="bg-gray-300 hover:bg-gray-400 dark:bg-gray-700 dark:hover:bg-gray-600
                                  text-gray-800 dark:text-gray-200 px-4 py-3 rounded-lg transition-colors">
                                Cancel
                            </a>
                        @endif
                    </div>
                </form>
            </div>

            <!-- Top Pagination -->
            @if(isset($documents) && $documents->count())
                <div class="mb-6">
                    {{ $documents->links('pagination::tailwind') }}
                </div>
            @endif

            @if(!isset($documents) || $documents->isEmpty())
                <p class="text-gray-500 dark:text-gray-400 text-center py-8">No files found.</p>
            @else
                <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach($documents as $index => $doc)
                        @php
                            $docName = is_array($doc) ? $doc['name'] : $doc->name;
                            $docRendered = is_array($doc) ? $doc['rendered'] : $doc->rendered;
                            $docCode = is_array($doc) ? $doc['code'] : $doc->code;
                            $docCodeSafe = is_array($doc) ? $doc['code_safe'] : $doc->code_safe;

                            // Update docCode and docCodeSafe to point to /storage/assets/
                            $docCode = preg_replace('/<a href="[^"]+\/([^"]+)">([^<]+)<\/a>/', '<a href="/storage/assets/$1">$2</a>', $docCode);
                            $docCodeSafe = htmlspecialchars(preg_replace('/<a href="[^"]+\/([^"]+)">([^<]+)<\/a>/', '<a href="/storage/assets/$1">$2</a>', htmlspecialchars_decode($docCodeSafe)));

                            $docId = is_array($doc) ? $doc['id'] : $doc->id;
                            $ext = strtolower(pathinfo($docName, PATHINFO_EXTENSION));
                            switch($ext) {
                                case 'jpg':
                                case 'jpeg':
                                case 'png':
                                case 'gif':
                                case 'bmp':
                                case 'svg':
                                    $badge = '<span class="file-badge bg-blue-500 text-white px-2 py-1 rounded text-xs">Image</span>';
                                    break;
                                case 'mp4':
                                case 'webm':
                                case 'ogg':
                                case 'mov':
                                case 'avi':
                                    $badge = '<span class="file-badge bg-red-500 text-white px-2 py-1 rounded text-xs">Video</span>';
                                    break;
                                case 'mp3':
                                case 'wav':
                                case 'mid':
                                    $badge = '<span class="file-badge bg-green-500 text-white px-2 py-1 rounded text-xs">Audio</span>';
                                    break;
                                case 'pdf':
                                    $badge = '<span class="file-badge bg-red-600 text-white px-2 py-1 rounded text-xs">PDF</span>';
                                    break;
                                case 'ppt':
                                case 'pptx':
                                    $badge = '<span class="file-badge bg-orange-500 text-white px-2 py-1 rounded text-xs">PPT</span>';
                                    break;
                                case 'doc':
                                case 'docx':
                                    $badge = '<span class="file-badge bg-blue-700 text-white px-2 py-1 rounded text-xs">DOC</span>';
                                    break;
                                case 'xls':
                                case 'xlsx':
                                    $badge = '<span class="file-badge bg-green-700 text-white px-2 py-1 rounded text-xs">Excel</span>';
                                    break;
                                case 'zip':
                                case 'rar':
                                case '7z':
                                case 'tar':
                                case 'gz':
                                    $badge = '<span class="file-badge bg-gray-500 text-white px-2 py-1 rounded text-xs">Archive</span>';
                                    break;
                                default:
                                    $badge = '<span class="file-badge bg-gray-400 text-white px-2 py-1 rounded text-xs">File</span>';
                                    break;
                            }
                        @endphp

                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 file-block file-card
                                border border-gray-200 dark:border-gray-700 transition-colors duration-300">
                            <h3 class="text-lg font-semibold mb-3 flex items-center justify-between">
                                <span class="truncate text-gray-900 dark:text-white" title="{{ $docName }}">
                                    {{ $docName }}
                                </span>
                                {!! $badge !!}
                            </h3>

                            <div class="preview-container mb-4 border border-gray-200 dark:border-gray-700 rounded p-2
                                   bg-gray-50 dark:bg-gray-900">
                                {!! $docRendered !!}
                            </div>

                            <!-- HTML Snippet Section -->
                            <h4 class="font-semibold mt-4 mb-2 text-gray-800 dark:text-gray-200">
                                HTML snippet (copy to web page):
                            </h4>
                            <div class="relative mb-4">
                                <pre class="rounded bg-gray-100 dark:bg-gray-900 border border-gray-300 dark:border-gray-700 p-3
                                       whitespace-pre-wrap break-words overflow-hidden font-mono text-sm">
                                    <code class="language-html text-gray-800 dark:text-gray-300" id="code-{{ $index }}">
                                        {{ $docCode }}
                                    </code>
                                </pre>
                                <div class="absolute top-2 right-2 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300
                                            text-xs px-2 py-1 rounded opacity-70">
                                    Click to copy
                                </div>
                            </div>
                            <button class="copy-btn bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600
                                          text-gray-800 dark:text-gray-200 rounded px-3 py-2 transition-colors w-full mb-4"
                                    onclick="copyToClipboard('code-{{ $index }}', this)">
                                Copy HTML snippet
                                <span class="tooltip hidden ml-2 text-green-600 dark:text-green-400">✓ Copied!</span>
                            </button>

                            <!-- Safe Snippet Section -->
                            <h4 class="font-semibold mt-4 mb-2 text-gray-800 dark:text-gray-200">
                                Safe snippet (quotes escaped):
                            </h4>
                            <div class="relative mb-4">
                                <pre class="rounded bg-gray-100 dark:bg-gray-900 border border-gray-300 dark:border-gray-700 p-3
                                       whitespace-pre-wrap break-words overflow-hidden font-mono text-sm">
                                    <code class="language-html text-gray-800 dark:text-gray-300" id="code-safe-{{ $index }}">
                                        {{ $docCodeSafe }}
                                    </code>
                                </pre>
                                <div class="absolute top-2 right-2 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300
                                            text-xs px-2 py-1 rounded opacity-70">
                                    Click to copy
                                </div>
                            </div>
                            <button class="copy-btn bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600
                                          text-gray-800 dark:text-gray-200 rounded px-3 py-2 transition-colors w-full mb-4"
                                    onclick="copyToClipboard('code-safe-{{ $index }}', this)">
                                Copy safe snippet
                                <span class="tooltip hidden ml-2 text-green-600 dark:text-green-400">✓ Copied!</span>
                            </button>

                            <button class="copy-btn bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600
                                      text-gray-800 dark:text-gray-200 rounded px-3 py-2 mt-2 w-full transition-colors"
                                    onclick="copyFilename(this)">
                                Copy Filename
                                <span class="tooltip hidden ml-2 text-green-600 dark:text-green-400">✓ Filename Copied!</span>
                            </button>
                        </div>
                    @endforeach
                </div>

                <!-- Bottom Pagination -->
                <div class="mt-8">
                    {{ $documents->links('pagination::tailwind') }}
                </div>
            @endif

            <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.30.0/prism.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.30.0/components/prism-markup.min.js"></script>

            <script>
                function copyToClipboard(id, button) {
                    var codeElement = document.getElementById(id);
                    var code = codeElement.textContent;

                    // Clean up any extra whitespace from wrapping
                    code = code.replace(/\s+/g, ' ').trim();

                    var regex = /<a href="[^"]+\/([^"]+)">([^<]+)<\/a>/;
                    var match = code.match(regex);
                    if (match) {
                        var filename = match[1];
                        code = '<a href="/storage/assets/' + filename + '">' + match[2] + '</a>';
                    }

                    navigator.clipboard.writeText(code)
                        .then(function() {
                            var tooltip = button.querySelector('.tooltip');
                            tooltip.classList.remove('hidden');
                            setTimeout(function() {
                                tooltip.classList.add('hidden');
                            }, 2000);
                        })
                        .catch(function(error) {
                            console.error('Error copying text: ', error);
                        });
                }

                function copyFilename(button) {
                    var card = button.closest('.file-card');
                    var filenameElement = card.querySelector('h3 span');
                    var filename = filenameElement.textContent.trim();
                    filename = filename.replace(/^[\d]+[_]?/, '');

                    navigator.clipboard.writeText(filename)
                        .then(function() {
                            var tooltip = button.querySelector('.tooltip');
                            tooltip.classList.remove('hidden');
                            setTimeout(function() {
                                tooltip.classList.add('hidden');
                            }, 2000);
                        })
                        .catch(function(error) {
                            console.error('Error copying text: ', error);
                        });
                }

                // Initialize Prism for syntax highlighting
                document.addEventListener('DOMContentLoaded', function() {
                    if (typeof Prism !== 'undefined') {
                        Prism.highlightAll();
                    }
                });
            </script>
        </div>
    </main>
@endsection('maincontent')

@section('footer')
    <x-footer />
@endsection('footer')