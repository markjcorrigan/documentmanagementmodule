<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NoteTemplate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'title',
        'content',
        'category_id',
        'user_id',
        'is_public',
    ];

    protected $casts = [
        'is_public' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // Scope for user's templates
    public function scopeOwnedBy($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    // Scope for public templates
    public function scopePublic($query)
    {
        return $query->where('is_public', true);
    }

    // Scope for available templates (own + public)
    public function scopeAvailableFor($query, $userId)
    {
        return $query->where(function ($q) use ($userId) {
            $q->where('user_id', $userId)
                ->orWhere('is_public', true);
        });
    }
}
