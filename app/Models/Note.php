<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class Note extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'title',
        'content',
        'user_id',
        'category_id',
        'is_pinned',
    ];

    protected $casts = [
        'is_pinned' => 'boolean',
    ];

    // Laravel Scout searchable configuration
    public function toSearchableArray(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'category' => $this->category?->name,
            'tags' => $this->tags->pluck('name')->implode(', '),
        ];
    }

    public function shouldBeSearchable(): bool
    {
        return ! empty($this->title) || ! empty($this->content);
    }

    // Relationships
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function attachments(): HasMany
    {
        return $this->hasMany(NoteAttachment::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(NoteAttachment::class)->where('type', 'image');
    }

    public function documents(): HasMany
    {
        return $this->hasMany(NoteAttachment::class)->where('type', 'document');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function shares(): HasMany
    {
        return $this->hasMany(NoteShare::class);
    }

    public function activeShares(): HasMany
    {
        return $this->hasMany(NoteShare::class)->active();
    }

    // Check if note is shared with a specific user
    public function isSharedWith($userId): bool
    {
        return $this->activeShares()
            ->where('shared_with', $userId)
            ->exists();
    }

    // Get share for specific user
    public function getShareFor($userId)
    {
        return $this->activeShares()
            ->where('shared_with', $userId)
            ->first();
    }

    // Check if user can edit this note (owner or has edit permission)
    public function canBeEditedBy($userId): bool
    {
        if ($this->user_id === $userId) {
            return true;
        }

        $share = $this->getShareFor($userId);

        return $share && $share->canEdit();
    }

    // Scope for user's own notes
    public function scopeOwnedBy($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    // Scope for notes shared with user
    public function scopeSharedWith($query, $userId)
    {
        return $query->whereHas('activeShares', function ($q) use ($userId) {
            $q->where('shared_with', $userId);
        });
    }

    // Scope for all notes accessible by user (owned + shared)
    public function scopeAccessibleBy($query, $userId)
    {
        return $query->where(function ($q) use ($userId) {
            $q->where('user_id', $userId)
                ->orWhereHas('activeShares', function ($sq) use ($userId) {
                    $sq->where('shared_with', $userId);
                });
        });
    }

    // Scope for pinned notes
    public function scopePinned($query)
    {
        return $query->where('is_pinned', true);
    }
}
