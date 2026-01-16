<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Joke extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'jokecat_id',
        'is_ok',
        'is_favorite',
    ];

    protected $attributes = [
        'is_ok' => false,
        'is_favorite' => false,
    ];

    protected $casts = [
        'is_ok' => 'boolean',
        'is_favorite' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the category that owns the joke
     */
    public function jokecat()
    {
        return $this->belongsTo(Jokecat::class);
    }

    /**
     * Scope a query to only include approved jokes
     */
    public function scopeApproved($query)
    {
        return $query->where('is_ok', 1);
    }

    /**
     * Scope a query to only include favorite jokes
     */
    public function scopeFavorites($query)
    {
        return $query->where('is_favorite', 1);
    }

    /**
     * Users who favorited this joke
     */
    public function favoritedByUsers()
    {
        return $this->belongsToMany(User::class, 'user_joke_favorites', 'joke_id', 'user_id')
            ->withTimestamps();
    }

    /**
     * Check if current user has favorited this joke
     */
    public function isFavoritedByUser($userId = null)
    {
        $userId = $userId ?? auth()->id();

        if (! $userId) {
            return false;
        }

        return $this->favoritedByUsers()->where('user_id', $userId)->exists();
    }

    /**
     * Count of users who favorited this joke
     */
    public function favoritesCount()
    {
        return $this->favoritedByUsers()->count();
    }

    /**
     * Scope a query to search jokes
     */
    public function scopeSearch($query, $search)
    {
        return $query->where(function ($q) use ($search) {
            $q->where('title', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
        });
    }

    /**
     * Scope to filter by category
     */
    public function scopeByCategory($query, $categoryId)
    {
        return $query->where('jokecat_id', $categoryId);
    }
}
