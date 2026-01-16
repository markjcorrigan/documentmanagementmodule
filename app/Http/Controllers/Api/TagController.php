<?php

// app/Http/Controllers/Api/TagController.php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::where('user_id', auth()->id())
            ->orderBy('name')
            ->get();

        return response()->json($tags);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $tag = Tag::firstOrCreate(
            [
                'name' => $validated['name'],
                'user_id' => auth()->id(),
            ],
            [
                'slug' => \Str::slug($validated['name']),
            ]
        );

        return response()->json($tag, 201);
    }

    public function show(Tag $tag)
    {
        if ($tag->user_id !== auth()->id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        return response()->json($tag->load('notes'));
    }

    public function destroy(Tag $tag)
    {
        if ($tag->user_id !== auth()->id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $tag->delete();

        return response()->json(['message' => 'Tag deleted successfully']);
    }
}
