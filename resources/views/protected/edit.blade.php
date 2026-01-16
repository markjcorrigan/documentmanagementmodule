@extends('documents.documentlayout.default')

@section('title', 'Edit Files Library')

@section('header')
    @include('components.simple-nav')
@endsection

@section('maincontent')
    <main class="min-h-screen">
        <div class="container mx-auto p-4 pt-6">
            <h1 class="text-3xl font-bold mb-8 text-center text-gray-900 dark:text-white">Edit {{ $file->type === 'folder' ? 'Folder' : 'File' }}</h1>

            <div class="max-w-md mx-auto bg-white dark:bg-gray-900 rounded-lg shadow-lg p-8">
                <form action="{{ route('protected.update', $file->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- File Name --}}
                    <div class="mb-6">
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Name:
                        </label>
                        <input type="text"
                               name="name"
                               value="{{ $file->name }}"
                               class="block w-full p-3 border border-gray-300 dark:border-gray-600
                                      rounded-lg focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400
                                      focus:border-transparent bg-white dark:bg-gray-800
                                      text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400
                                      transition-colors">
                    </div>

                    {{-- Path (Read Only) --}}
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Path:
                        </label>
                        <input type="text"
                               value="{{ $file->path }}"
                               readonly
                               class="block w-full p-3 border border-gray-300 dark:border-gray-600
                                      rounded-lg bg-gray-100 dark:bg-gray-700
                                      text-gray-600 dark:text-gray-400">
                    </div>

                    {{-- Description --}}
                    <div class="mb-8">
                        <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Description:
                        </label>
                        <textarea name="description"
                                  rows="4"
                                  class="block w-full p-3 border border-gray-300 dark:border-gray-600
                                         rounded-lg focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400
                                         focus:border-transparent bg-white dark:bg-gray-800
                                         text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400
                                         transition-colors"
                                  placeholder="Add a description">{{ $file->description }}</textarea>
                    </div>

                    {{-- Submit Button --}}
                    <button type="submit"
                            class="w-full bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600
                                   text-white font-bold py-3 px-4 rounded-lg transition-colors">
                        Save Changes
                    </button>

                    {{-- Cancel/Back Link --}}
                    <div class="mt-4 text-center">
                        <a href="{{ route('protected.index') }}"
                           class="text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200
                                  text-sm transition-colors">
                            ← Back to All Files
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection

@section('footer')
    <x-footer />
@endsection