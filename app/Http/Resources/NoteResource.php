<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NoteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'is_pinned' => $this->is_pinned,
            'created_at' => $this->created_at->toISOString(),
            'updated_at' => $this->updated_at->toISOString(),
            'created_at_human' => $this->created_at->diffForHumans(),
            'updated_at_human' => $this->updated_at->diffForHumans(),

            // Author information
            'author' => [
                'id' => $this->user->id,
                'name' => $this->user->name,
                'email' => $this->user->email,
            ],

            // Category
            'category' => $this->when($this->category, [
                'id' => $this->category?->id,
                'name' => $this->category?->name,
                'color' => $this->category?->color,
            ]),

            // Tags
            'tags' => $this->tags->map(fn ($tag) => [
                'id' => $tag->id,
                'name' => $tag->name,
                'slug' => $tag->slug,
            ]),

            // Attachments
            'attachments' => [
                'images' => $this->images->map(fn ($image) => [
                    'id' => $image->id,
                    'filename' => $image->filename,
                    'url' => $image->url,
                    'size' => $image->size,
                    'formatted_size' => $image->formatted_size,
                    'mime_type' => $image->mime_type,
                ]),
                'documents' => $this->documents->map(fn ($doc) => [
                    'id' => $doc->id,
                    'filename' => $doc->filename,
                    'url' => $doc->url,
                    'size' => $doc->size,
                    'formatted_size' => $doc->formatted_size,
                    'mime_type' => $doc->mime_type,
                ]),
            ],

            // Sharing information
            'is_shared' => $this->user_id !== auth()->id(),
            'is_owner' => $this->user_id === auth()->id(),
            'can_edit' => $this->canBeEditedBy(auth()->id()),

            // Shares (only for owner)
            'shares' => $this->when(
                $this->user_id === auth()->id() && $this->relationLoaded('activeShares'),
                $this->activeShares->map(fn ($share) => [
                    'id' => $share->id,
                    'shared_with' => [
                        'id' => $share->sharedWith->id,
                        'name' => $share->sharedWith->name,
                        'email' => $share->sharedWith->email,
                    ],
                    'permission' => $share->permission,
                    'can_reshare' => $share->can_reshare,
                    'expires_at' => $share->expires_at?->toISOString(),
                    'expires_at_human' => $share->expires_at?->diffForHumans(),
                ])
            ),

            // Export links
            'export_urls' => [
                'pdf' => route('api.notes.export', ['note' => $this->id, 'format' => 'pdf']),
                'markdown' => route('api.notes.export', ['note' => $this->id, 'format' => 'markdown']),
                'json' => route('api.notes.export', ['note' => $this->id, 'format' => 'json']),
            ],
        ];
    }
}
