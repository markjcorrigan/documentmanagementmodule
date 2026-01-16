<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ChatSession extends Model
{
    protected $fillable = [
        'user1_id',
        'user2_id',
        'is_active',
        'ended_at',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'ended_at' => 'datetime',
    ];

    public function user1(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user1_id');
    }

    public function user2(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user2_id');
    }

    public function messages(): HasMany
    {
        return $this->hasMany(ChatMessage::class);
    }

    public function getOtherUser(int $currentUserId): User
    {
        return $this->user1_id === $currentUserId ? $this->user2 : $this->user1;
    }

    public function hasUser(int $userId): bool
    {
        return $this->user1_id === $userId || $this->user2_id === $userId;
    }

    public function endSession(): void
    {
        $this->update([
            'is_active' => false,
            'ended_at' => now(),
        ]);
    }

    public static function findActiveSession(int $user1Id, int $user2Id): ?self
    {
        return static::where('is_active', true)
            ->where(function ($query) use ($user1Id, $user2Id) {
                $query->where(function ($q) use ($user1Id, $user2Id) {
                    $q->where('user1_id', $user1Id)
                        ->where('user2_id', $user2Id);
                })->orWhere(function ($q) use ($user1Id, $user2Id) {
                    $q->where('user1_id', $user2Id)
                        ->where('user2_id', $user1Id);
                });
            })
            ->first();
    }

    public static function createSession(int $user1Id, int $user2Id): self
    {
        return static::create([
            'user1_id' => $user1Id,
            'user2_id' => $user2Id,
            'is_active' => true,
        ]);
    }

    // Add this method to your existing ChatSession model
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($chatSession) {
            // Automatically delete all messages when chat session is deleted
            $chatSession->messages()->delete();
        });
    }
}
