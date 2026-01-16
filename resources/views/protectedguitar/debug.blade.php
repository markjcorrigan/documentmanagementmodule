@extends('protectedguitar.layout')

@section('content')
    <div class="max-w-7xl mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">Debug: Check File IDs</h1>
        
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
            <h2 class="text-xl font-bold mb-4">First 10 Files in Database:</h2>
            
            @php
                $testFiles = \App\Models\GuitarScore::orderBy('id')->take(10)->get(['id', 'name', 'path']);
            @endphp
            
            <table class="w-full border">
                <thead>
                    <tr class="bg-gray-100 dark:bg-gray-700">
                        <th class="border p-2">ID</th>
                        <th class="border p-2">Name</th>
                        <th class="border p-2">Edit Link</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($testFiles as $testFile)
                        <tr>
                            <td class="border p-2">{{ $testFile->id }}</td>
                            <td class="border p-2">{{ $testFile->name }}</td>
                            <td class="border p-2">
                                <a href="{{ route('guitar.edit', $testFile->id) }}" class="text-blue-600">
                                    Test Edit (ID: {{ $testFile->id }})
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            <div class="mt-6">
                <a href="{{ route('guitar.index') }}" class="px-4 py-2 bg-blue-600 text-white rounded">
                    Back to File List
                </a>
            </div>
        </div>
    </div>
@endsection
