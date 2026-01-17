@extends('documents.layouts.main')

@section('content')
    {{-- Theme initialization script --}}
    <script>
        (function() {
            try {
                const savedTheme = localStorage.getItem('flux.appearance') ||
                                  localStorage.getItem('flux:appearance') ||
                                  localStorage.getItem('theme');
                
                const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
                
                let theme = savedTheme;
                if (!savedTheme || savedTheme === 'system') {
                    theme = systemPrefersDark ? 'dark' : 'light';
                }
                
                if (theme === 'dark') {
                    document.documentElement.classList.add('dark');
                    document.body.classList.add('dark');
                }
            } catch (error) {
                console.log('Theme init failed');
            }
        })();
    </script>

<div class="container mx-auto px-4">
    <div class="max-w-6xl mx-auto">
        
        {{-- Dark/Light Mode Toggle --}}
        <div class="flex justify-end mb-4">
            <button
                onclick="toggleTheme()"
                class="px-3 py-2 bg-gray-100 dark:bg-gray-800 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-700 transition-all duration-300 border border-gray-300 dark:border-gray-600"
                aria-label="Toggle theme">
                {{-- BLACK MOON for light mode --}}
                <svg id="theme-toggle-moon-icon" class="w-5 h-5 text-gray-900 transition-transform duration-500" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                </svg>
                {{-- YELLOW SUN for dark mode --}}
                <svg id="theme-toggle-sun-icon" class="w-5 h-5 text-yellow-500 hidden transition-transform duration-500" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>

        <!-- Document Header -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 mb-6">
            <div class="flex justify-between items-start mb-6">
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white flex items-center">
                        <i class="fas {{ $document->icon }} text-3xl mr-3 text-blue-600 dark:text-blue-400"></i>
                        {{ $document->name }}
                    </h2>
                    <p class="text-gray-600 dark:text-gray-400 mt-2">{{ $document->shortname }}</p>
                </div>
                <span class="px-3 py-1 bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200 rounded-full text-sm font-semibold">
                    {{ strtoupper($document->extension) }}
                </span>
            </div>

            <!-- Details -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div>
                    <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">File Size</h3>
                    <p class="text-lg text-gray-900 dark:text-white">{{ $document->file_size }}</p>
                </div>
                <div>
                    <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Uploaded</h3>
                    <p class="text-lg text-gray-900 dark:text-white">{{ $document->created_at->format('M d, Y g:i A') }}</p>
                </div>
                <div>
                    <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Type</h3>
                    <p class="text-lg text-gray-900 dark:text-white">{{ strtoupper($document->extension) }}</p>
                </div>
            </div>

            <!-- Description -->
            @if($document->description)
            <div class="mb-6">
                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">Description</h3>
                <p class="text-gray-900 dark:text-white">{{ $document->description }}</p>
            </div>
            @endif

            <!-- Action Buttons -->
            <div class="flex flex-wrap gap-3 pt-6 border-t border-gray-200 dark:border-gray-700">
                <a href="{{ route('documents.download', $document) }}" 
                   class="px-6 py-2 bg-green-600 dark:bg-green-500 text-white rounded-lg hover:bg-green-700 dark:hover:bg-green-600 transition inline-flex items-center">
                    <i class="fas fa-download mr-2"></i>Download
                </a>
                @can('manage assets')
                <a href="{{ route('documents.edit', $document) }}" 
                   class="px-6 py-2 bg-yellow-600 dark:bg-yellow-500 text-white rounded-lg hover:bg-yellow-700 dark:hover:bg-yellow-600 transition inline-flex items-center">
                    <i class="fas fa-edit mr-2"></i>Edit
                </a>
                <form action="{{ route('documents.destroy', $document) }}" method="POST" class="inline"
                      onsubmit="return confirm('Move this document to trash?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="px-6 py-2 bg-red-600 dark:bg-red-500 text-white rounded-lg hover:bg-red-700 dark:hover:bg-red-600 transition inline-flex items-center">
                        <i class="fas fa-trash mr-2"></i>Delete
                    </button>
                </form>
                @endcan
                <button onclick="openFullscreen()" 
                        class="px-6 py-2 bg-blue-600 dark:bg-blue-500 text-white rounded-lg hover:bg-blue-700 dark:hover:bg-blue-600 transition inline-flex items-center">
                    <i class="fas fa-expand mr-2"></i>Fullscreen
                </button>
            </div>
        </div>

        <!-- Document Viewer -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">
                <i class="fas fa-eye mr-2"></i>Document Preview
            </h3>
            
            <div id="documentViewer" class="border-2 border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden bg-gray-50 dark:bg-gray-900">
                
                @if($document->extension === 'pdf')
                    {{-- PDF Viewer --}}
                    <iframe src="{{ url('storage/assets/' . $document->name) }}" 
                            class="w-full" 
                            style="height: 800px; border: none;"
                            title="PDF Viewer">
                    </iframe>
                    
                @elseif(in_array($document->extension, ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg']))
                    {{-- Image Viewer --}}
                    <div class="flex justify-center items-center p-6">
                        <img src="{{ url('storage/assets/' . $document->name) }}" 
                             alt="{{ $document->name }}" 
                             class="max-w-full h-auto rounded shadow-lg"
                             style="max-height: 800px;">
                    </div>
                    
                @elseif(in_array($document->extension, ['txt', 'csv', 'json', 'xml', 'md']))
                    {{-- Text File Viewer --}}
                    <div class="p-6">
                        @php
                            $textFilePath = storage_path('app/public/assets/' . $document->name);
                            $fileContent = file_exists($textFilePath) ? file_get_contents($textFilePath) : 'FILE NOT FOUND: ' . $textFilePath;
                        @endphp
                        
                        <pre class="bg-gray-100 dark:bg-gray-800 p-4 rounded overflow-auto text-sm text-gray-900 dark:text-gray-100 font-mono whitespace-pre-wrap break-words" style="max-height: 800px;">{{ $fileContent }}</pre>
                    </div>
                    
                @elseif(in_array($document->extension, ['doc', 'docx']))
                    {{-- Word Document --}}
                    <div class="p-6">
                        <div class="bg-blue-100 dark:bg-blue-900 border border-blue-400 dark:border-blue-700 p-4 rounded mb-4 text-blue-800 dark:text-blue-200">
                            <strong>📄 Word Document</strong><br>
                            Word documents cannot be previewed on localhost. Download the file to view it.
                        </div>
                        
                        <div class="text-center py-12">
                            <i class="fas fa-file-word text-blue-600 dark:text-blue-400 text-6xl mb-4"></i>
                            <h4 class="text-xl font-semibold text-gray-700 dark:text-gray-300 mb-4">
                                {{ $document->name }}
                            </h4>
                            <p class="text-gray-600 dark:text-gray-400 mb-6">
                                Download this document to view it in Microsoft Word
                            </p>
                            <a href="{{ route('documents.download', $document) }}" 
                               class="px-6 py-3 bg-blue-600 dark:bg-blue-500 text-white rounded-lg hover:bg-blue-700 dark:hover:bg-blue-600 transition inline-flex items-center">
                                <i class="fas fa-download mr-2"></i>Download Document
                            </a>
                        </div>
                    </div>
                    
                @elseif(in_array($document->extension, ['xls', 'xlsx']))
                    {{-- Excel --}}
                    <div class="p-6">
                        <div class="bg-green-100 dark:bg-green-900 border border-green-400 dark:border-green-700 p-4 rounded mb-4 text-green-800 dark:text-green-200">
                            <strong>📊 Excel Spreadsheet</strong><br>
                            Excel files cannot be previewed on localhost. Download the file to view it.
                        </div>
                        
                        <div class="text-center py-12">
                            <i class="fas fa-file-excel text-green-600 dark:text-green-400 text-6xl mb-4"></i>
                            <h4 class="text-xl font-semibold text-gray-700 dark:text-gray-300 mb-4">
                                {{ $document->name }}
                            </h4>
                            <p class="text-gray-600 dark:text-gray-400 mb-6">
                                Download this spreadsheet to view it in Microsoft Excel
                            </p>
                            <a href="{{ route('documents.download', $document) }}" 
                               class="px-6 py-3 bg-green-600 dark:bg-green-500 text-white rounded-lg hover:bg-green-700 dark:hover:bg-green-600 transition inline-flex items-center">
                                <i class="fas fa-download mr-2"></i>Download Spreadsheet
                            </a>
                        </div>
                    </div>
                    
                @elseif(in_array($document->extension, ['ppt', 'pptx']))
                    {{-- PowerPoint --}}
                    <div class="p-6">
                        <div class="bg-orange-100 dark:bg-orange-900 border border-orange-400 dark:border-orange-700 p-4 rounded mb-4 text-orange-800 dark:text-orange-200">
                            <strong>📽️ PowerPoint Presentation</strong><br>
                            PowerPoint files cannot be previewed on localhost. Download the file to view it.
                        </div>
                        
                        <div class="text-center py-12">
                            <i class="fas fa-file-powerpoint text-orange-600 dark:text-orange-400 text-6xl mb-4"></i>
                            <h4 class="text-xl font-semibold text-gray-700 dark:text-gray-300 mb-4">
                                {{ $document->name }}
                            </h4>
                            <p class="text-gray-600 dark:text-gray-400 mb-6">
                                Download this presentation to view it in Microsoft PowerPoint
                            </p>
                            <a href="{{ route('documents.download', $document) }}" 
                               class="px-6 py-3 bg-orange-600 dark:bg-orange-500 text-white rounded-lg hover:bg-orange-700 dark:hover:bg-orange-600 transition inline-flex items-center">
                                <i class="fas fa-download mr-2"></i>Download Presentation
                            </a>
                        </div>
                    </div>
                    
                @elseif(in_array($document->extension, ['mp4', 'webm', 'ogg']))
                    {{-- Video Player --}}
                    <div class="flex justify-center items-center p-6 bg-black">
                        <video controls class="w-full max-w-4xl">
                            <source src="{{ url('storage/assets/' . $document->name) }}" type="video/{{ $document->extension }}">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    
                @elseif(in_array($document->extension, ['mp3', 'wav', 'ogg']))
                    {{-- Audio Player --}}
                    <div class="flex justify-center items-center p-12">
                        <audio controls class="w-full max-w-2xl">
                            <source src="{{ url('storage/assets/' . $document->name) }}" type="audio/{{ $document->extension }}">
                            Your browser does not support the audio tag.
                        </audio>
                    </div>
                    
                @else
                    {{-- Unsupported --}}
                    <div class="flex flex-col justify-center items-center p-12 text-center">
                        <i class="fas fa-file-circle-question text-6xl text-gray-400 dark:text-gray-600 mb-4"></i>
                        <h4 class="text-xl font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            Preview Not Available
                        </h4>
                        <p class="text-gray-600 dark:text-gray-400 mb-6">
                            This file type ({{ strtoupper($document->extension) }}) cannot be previewed in the browser.
                        </p>
                        <a href="{{ route('documents.download', $document) }}" 
                           class="px-6 py-3 bg-blue-600 dark:bg-blue-500 text-white rounded-lg hover:bg-blue-700 dark:hover:bg-blue-600 transition inline-flex items-center">
                            <i class="fas fa-download mr-2"></i>Download to View
                        </a>
                    </div>
                @endif
            </div>
        </div>

    </div>
</div>

{{-- Fullscreen Script --}}
<script>
function openFullscreen() {
    const elem = document.getElementById('documentViewer');
    if (elem.requestFullscreen) {
        elem.requestFullscreen();
    } else if (elem.webkitRequestFullscreen) {
        elem.webkitRequestFullscreen();
    } else if (elem.msRequestFullscreen) {
        elem.msRequestFullscreen();
    }
}
</script>
@endsection

@push('scripts')
    <script>
        function toggleTheme() {
            const html = document.documentElement;
            const body = document.body;
            const moonIcon = document.getElementById('theme-toggle-moon-icon');
            const sunIcon = document.getElementById('theme-toggle-sun-icon');
            
            const isDark = html.classList.contains('dark');
            
            if (isDark) {
                html.classList.remove('dark');
                body.classList.remove('dark');
                localStorage.setItem('flux.appearance', 'light');
                localStorage.setItem('theme', 'light');
                
                moonIcon.style.display = 'block';
                sunIcon.style.display = 'none';
            } else {
                html.classList.add('dark');
                body.classList.add('dark');
                localStorage.setItem('flux.appearance', 'dark');
                localStorage.setItem('theme', 'dark');
                
                moonIcon.style.display = 'none';
                sunIcon.style.display = 'block';
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const html = document.documentElement;
            const moonIcon = document.getElementById('theme-toggle-moon-icon');
            const sunIcon = document.getElementById('theme-toggle-sun-icon');
            
            if (html.classList.contains('dark')) {
                moonIcon.style.display = 'none';
                sunIcon.style.display = 'block';
            } else {
                moonIcon.style.display = 'block';
                sunIcon.style.display = 'none';
            }
        });
    </script>
@endpush
