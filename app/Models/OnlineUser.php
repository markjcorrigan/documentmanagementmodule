<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OnlineUser extends Model
{
    protected $fillable = [
        'user_id',
        'last_seen_at',
        'session_id',
    ];

    protected $casts = [
        'last_seen_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function isOnline(): bool
    {
        return $this->last_seen_at->diffInMinutes(now()) < 5;
    }

    public static function updatePresence(int $userId): void
    {
        static::updateOrCreate(
            ['user_id' => $userId],
            [
                'last_seen_at' => now(),
                'session_id' => session()->getId(),
            ]
        );
    }

    public static function getOnlineUsers()
    {
        return static::with('user')
            ->where('last_seen_at', '>=', now()->subMinutes(5))
            ->get();
    }

    /**
     * Get online users count excluding a specific user
     */
    public static function getOnlineCountExcluding(int $excludeUserId): int
    {
        return static::where('last_seen_at', '>=', now()->subMinutes(5))
            ->where('user_id', '!=', $excludeUserId)
            ->count();
    }

    /**
     * Get online users excluding a specific user
     */
    public static function getOnlineUsersExcluding(int $excludeUserId)
    {
        return static::with('user')
            ->where('last_seen_at', '>=', now()->subMinutes(5))
            ->where('user_id', '!=', $excludeUserId)
            ->get()
            ->pluck('user'); // Return just the user models
    }

    /**
     * Clean up old presence records (run this periodically)
     */
    public static function cleanupOldPresence(): void
    {
        static::where('last_seen_at', '<', now()->subMinutes(10))->delete();
    }

    /**
     * Scope for online users
     */
    public function scopeOnline($query)
    {
        return $query->where('last_seen_at', '>=', now()->subMinutes(5));
    }
}
