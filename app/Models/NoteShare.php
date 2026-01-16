<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NoteShare extends Model
{
    use HasFactory;

    protected $fillable = [
        'note_id',
        'shared_by',
        'shared_with',
        'permission',
        'can_reshare',
        'expires_at',
    ];

    protected $casts = [
        'can_reshare' => 'boolean',
        'expires_at' => 'datetime',
    ];

    public function note(): BelongsTo
    {
        return $this->belongsTo(Note::class);
    }

    public function sharedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'shared_by');
    }

    public function sharedWith(): BelongsTo
    {
        return $this->belongsTo(User::class, 'shared_with');
    }

    // Check if share is still valid
    public function isValid(): bool
    {
        if ($this->expires_at === null) {
            return true;
        }

        return $this->expires_at->isFuture();
    }

    // Check if user can edit
    public function canEdit(): bool
    {
        return $this->permission === 'edit' && $this->isValid();
    }

    // Scope for active shares
    public function scopeActive($query)
    {
        return $query->where(function ($q) {
            $q->whereNull('expires_at')
                ->orWhere('expires_at', '>', now());
        });
    }
}
