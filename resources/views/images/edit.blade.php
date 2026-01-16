@extends('images.imagelayout.default')

@section('header')
    @section('title', 'Edit Image')
    <x-documentsnav />
@endsection('header')

@section('maincontent')
    <main class="min-h-screen">
        <div class="container mx-auto p-4 pt-6">

            {{-- Success Alert --}}
            @if (session()->has('success'))
                <div class="mb-6 bg-green-100 dark:bg-green-900 border border-green-400 dark:border-green-700
                            text-green-700 dark:text-green-100 px-4 py-3 rounded">
                    {{ session()->get('success') }}
                </div>
            @endif

            {{-- Error Alert --}}
            @if (session()->has('error'))
                <div class="mb-6 bg-red-100 dark:bg-red-900 border border-red-400 dark:border-red-700
                            text-red-700 dark:text-red-100 px-4 py-3 rounded">
                    {{ session()->get('error') }}
                </div>
            @endif

            <h1 class="text-3xl font-bold mb-8 text-center text-gray-900 dark:text-white">Edit Image</h1>

            <div class="max-w-md mx-auto bg-white dark:bg-gray-900 rounded-lg shadow-lg p-8">
                <form action="{{ route('images.update', $image->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Image Name --}}
                    <div class="mb-6">
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Image Name:
                        </label>
                        <input type="text"
                               name="name"
                               value="{{ $image->name }}"
                               class="block w-full p-3 border border-gray-300 dark:border-gray-600
                                      rounded-lg focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400
                                      focus:border-transparent bg-white dark:bg-gray-800
                                      text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400
                                      transition-colors">
                    </div>

                    {{-- Short Name --}}
                    <div class="mb-6">
                        <label for="shortname" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Short Name:
                        </label>
                        <input type="text"
                               name="shortname"
                               value="{{ $image->shortname }}"
                               class="block w-full p-3 border border-gray-300 dark:border-gray-600
                                      rounded-lg focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400
                                      focus:border-transparent bg-white dark:bg-gray-800
                                      text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400
                                      transition-colors">
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
                                  placeholder="Add a description about the image">{{ $image->description }}</textarea>
                    </div>

                    {{-- Submit Button --}}
                    <button type="submit"
                            class="w-full bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600
                                   text-white font-bold py-3 px-4 rounded-lg transition-colors">
                        Save Changes
                    </button>

                    {{-- Cancel/Back Link --}}
                    <div class="mt-4 text-center">
                        <a href="{{ route('image-uploading') }}"
                           class="text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200
                                  text-sm transition-colors">
                            ← Back to All Images
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection('maincontent')

@section('footer')
    <x-footer />
@endsection('footer')