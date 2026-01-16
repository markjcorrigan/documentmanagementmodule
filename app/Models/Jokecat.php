<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jokecat extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * Get the jokes for the category
     */
    public function jokes()
    {
        return $this->hasMany(Joke::class);
    }

    /**
     * Get count of jokes in this category
     */
    public function jokesCount()
    {
        return $this->jokes()->count();
    }
}
