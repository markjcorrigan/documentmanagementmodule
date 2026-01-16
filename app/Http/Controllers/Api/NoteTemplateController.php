<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Note;
use App\Models\NoteTemplate;
use Illuminate\Http\Request;

class NoteTemplateController extends Controller
{
    public function index()
    {
        $templates = NoteTemplate::availableFor(auth()->id())
            ->with('category')
            ->orderBy('name')
            ->get();

        return response()->json($templates);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'category_id' => 'nullable|exists:categories,id',
            'is_public' => 'boolean',
        ]);

        $template = NoteTemplate::create([
            'name' => $validated['name'],
            'title' => $validated['title'] ?? null,
            'content' => $validated['content'] ?? null,
            'category_id' => $validated['category_id'] ?? null,
            'user_id' => auth()->id(),
            'is_public' => ($validated['is_public'] ?? false) && auth()->user()->hasRole('Super Admin'),
        ]);

        return response()->json($template, 201);
    }

    public function show(NoteTemplate $template)
    {
        if ($template->user_id !== auth()->id() && ! $template->is_public) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        return response()->json($template);
    }

    public function update(Request $request, NoteTemplate $template)
    {
        if ($template->user_id !== auth()->id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'title' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'category_id' => 'nullable|exists:categories,id',
            'is_public' => 'boolean',
        ]);

        if (isset($validated['is_public'])) {
            $validated['is_public'] = $validated['is_public'] && auth()->user()->hasRole('Super Admin');
        }

        $template->update($validated);

        return response()->json($template);
    }

    public function destroy(NoteTemplate $template)
    {
        if ($template->user_id !== auth()->id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $template->delete();

        return response()->json(['message' => 'Template deleted successfully']);
    }

    public function createFromTemplate(NoteTemplate $template)
    {
        if ($template->user_id !== auth()->id() && ! $template->is_public) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $note = Note::create([
            'title' => $template->title ?? '',
            'content' => $template->content ?? '',
            'category_id' => $template->category_id,
            'user_id' => auth()->id(),
            'is_pinned' => false,
        ]);

        return response()->json($note->load(['category', 'tags', 'attachments']), 201);
    }
}
