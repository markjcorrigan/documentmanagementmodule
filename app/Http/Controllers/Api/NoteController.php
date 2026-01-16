<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\NoteResource;
use App\Models\Note;
use App\Models\NoteShare;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Note::with(['category', 'tags', 'attachments', 'user'])
            ->when(! auth()->user()->hasRole('Super Admin'), function ($q) {
                $q->accessibleBy(auth()->id());
            })
            ->orderBy('is_pinned', 'desc')
            ->orderBy('created_at', 'desc');

        // Apply search
        if ($request->has('search') && ! empty($request->search)) {
            $noteIds = Note::search($request->search)->get()->pluck('id');
            $query->whereIn('id', $noteIds);
        }

        // Apply category filter
        if ($request->has('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // Apply tag filter
        if ($request->has('tag_id')) {
            $query->whereHas('tags', function ($q) use ($request) {
                $q->where('tags.id', $request->tag_id);
            });
        }

        // Apply view type filter
        if ($request->has('view_type')) {
            switch ($request->view_type) {
                case 'own':
                    $query->where('user_id', auth()->id());
                    break;
                case 'shared':
                    $query->sharedWith(auth()->id());
                    break;
            }
        }

        $notes = $query->paginate($request->per_page ?? 15);

        return NoteResource::collection($notes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('create', Note::class);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'category_id' => 'nullable|exists:categories,id',
            'is_pinned' => 'boolean',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
        ]);

        $note = Note::create([
            'title' => $validated['title'],
            'content' => $validated['content'] ?? null,
            'category_id' => $validated['category_id'] ?? null,
            'is_pinned' => $validated['is_pinned'] ?? false,
            'user_id' => auth()->id(),
        ]);

        // Sync tags
        if (isset($validated['tags'])) {
            $note->tags()->sync($validated['tags']);
        }

        return new NoteResource($note->load(['category', 'tags', 'attachments']));
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        Gate::authorize('view', $note);

        return new NoteResource($note->load(['category', 'tags', 'attachments', 'user', 'activeShares.sharedWith']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        Gate::authorize('update', $note);

        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'content' => 'nullable|string',
            'category_id' => 'nullable|exists:categories,id',
            'is_pinned' => 'boolean',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
        ]);

        $note->update($validated);

        // Sync tags if provided
        if (isset($validated['tags'])) {
            $note->tags()->sync($validated['tags']);
        }

        return new NoteResource($note->load(['category', 'tags', 'attachments']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        Gate::authorize('delete', $note);

        $note->delete();

        return response()->json([
            'message' => 'Note deleted successfully',
        ]);
    }

    /**
     * Toggle pin status
     */
    public function togglePin(Note $note)
    {
        Gate::authorize('update', $note);

        $note->is_pinned = ! $note->is_pinned;
        $note->save();

        return new NoteResource($note);
    }

    /**
     * Share note with user
     */
    public function share(Request $request, Note $note)
    {
        Gate::authorize('share', $note);

        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'permission' => 'required|in:view,edit',
            'can_reshare' => 'boolean',
            'expires_at' => 'nullable|date|after:now',
        ]);

        $share = NoteShare::updateOrCreate(
            [
                'note_id' => $note->id,
                'shared_with' => $validated['user_id'],
            ],
            [
                'shared_by' => auth()->id(),
                'permission' => $validated['permission'],
                'can_reshare' => $validated['can_reshare'] ?? false,
                'expires_at' => $validated['expires_at'] ?? null,
            ]
        );

        return response()->json([
            'message' => 'Note shared successfully',
            'share' => $share->load(['sharedWith', 'sharedBy']),
        ]);
    }

    /**
     * Remove share
     */
    public function removeShare(Note $note, NoteShare $share)
    {
        Gate::authorize('share', $note);

        if ($share->note_id !== $note->id) {
            return response()->json(['message' => 'Share not found for this note'], 404);
        }

        $share->delete();

        return response()->json([
            'message' => 'Share removed successfully',
        ]);
    }

    /**
     * Export note
     */
    public function export(Note $note, $format = 'pdf')
    {
        Gate::authorize('view', $note);

        $note->load(['category', 'tags', 'user', 'attachments']);

        if ($format === 'pdf') {
            $pdf = Pdf::loadView('notes.export-pdf', ['note' => $note]);

            return $pdf->download('note-'.\Str::slug($note->title).'.pdf');
        } elseif ($format === 'markdown') {
            $markdown = $this->generateMarkdown($note);

            return response($markdown)
                ->header('Content-Type', 'text/markdown')
                ->header('Content-Disposition', 'attachment; filename="note-'.\Str::slug($note->title).'.md"');
        } elseif ($format === 'json') {
            return response()->json($note);
        }

        return response()->json(['message' => 'Invalid format'], 400);
    }

    /**
     * Get shared notes
     */
    public function sharedWithMe()
    {
        $notes = Note::with(['category', 'tags', 'attachments', 'user'])
            ->sharedWith(auth()->id())
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return NoteResource::collection($notes);
    }

    /**
     * Get notes shared by me
     */
    public function sharedByMe()
    {
        $notes = Note::with(['category', 'tags', 'attachments', 'activeShares.sharedWith'])
            ->where('user_id', auth()->id())
            ->whereHas('activeShares')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return NoteResource::collection($notes);
    }

    /**
     * Generate markdown content
     */
    private function generateMarkdown($note)
    {
        $markdown = "# {$note->title}\n\n";

        if ($note->category) {
            $markdown .= "**Category:** {$note->category->name}\n\n";
        }

        if ($note->tags->count() > 0) {
            $markdown .= '**Tags:** '.$note->tags->pluck('name')->implode(', ')."\n\n";
        }

        $markdown .= "**Author:** {$note->user->name}\n\n";
        $markdown .= "**Created:** {$note->created_at->format('Y-m-d H:i')}\n\n";

        if ($note->updated_at != $note->created_at) {
            $markdown .= "**Updated:** {$note->updated_at->format('Y-m-d H:i')}\n\n";
        }

        $markdown .= "---\n\n";
        $markdown .= $note->content ?? '';

        if ($note->attachments->count() > 0) {
            $markdown .= "\n\n## Attachments\n\n";
            foreach ($note->attachments as $attachment) {
                $markdown .= "- {$attachment->filename} ({$attachment->formatted_size})\n";
            }
        }

        return $markdown;
    }
}
