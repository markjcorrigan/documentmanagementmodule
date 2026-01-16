<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;

    /** @use HasFactory<UserFactory> */
    use HasFactory;
    use HasFactory;
    use HasRoles;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'locale',
    ];

    protected function avatar(): Attribute
    {
        return Attribute::make(get: function ($value) {
            // If value exists and is not the default placeholder
            if ($value && $value !== 'blogpostnewavatar_no-img-avatar.png') {
                return '/storage/avatars/'.$value;
            }

            // Return the default avatar
            return '/storage/avatars/blogpostnewavatar_no-img-avatar.png';
        });
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the user's initials
     */
    public function initials(): string
    {
        return Str::of($this->name)
            ->explode(' ')
            ->map(fn (string $name) => Str::of($name)->substr(0, 1))
            ->implode('');
    }

    public function feedPosts()
    {
        return $this->hasManyThrough(BlogPost::class, Follow::class, 'user_id', 'user_id', 'id', 'followeduser');
    }

    public function followers()
    {
        return $this->hasMany(Follow::class, 'followeduser');
    }

    public function followingTheseUsers()
    {
        return $this->hasMany(Follow::class, 'user_id');
    }

    public function posts()
    {
        return $this->hasMany(BlogPost::class, 'user_id');
    }

    // ADD THIS: Online user relationship
    public function onlineUser()
    {
        return $this->hasOne(OnlineUser::class);
    }

    /**
     * Get the online status for the user (alias for onlineUser)
     */
    public function onlineStatus()
    {
        return $this->hasOne(OnlineUser::class);
    }

    /**
     * User's favorite jokes relationship
     */
    public function favoriteJokes()
    {
        return $this->belongsToMany(Joke::class, 'user_joke_favorites', 'user_id', 'joke_id')
            ->withTimestamps();
    }

    /**
     * Check if user has favorited a specific joke
     */
    public function hasFavorited($jokeId)
    {
        return $this->favoriteJokes()->where('joke_id', $jokeId)->exists();
    }

    /**
     * Toggle favorite for a joke
     */
    public function toggleFavorite($jokeId)
    {
        if ($this->hasFavorited($jokeId)) {
            $this->favoriteJokes()->detach($jokeId);

            return false; // Unfavorited
        } else {
            $this->favoriteJokes()->attach($jokeId);

            return true; // Favorited
        }
    }
}
