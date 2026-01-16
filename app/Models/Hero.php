<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    protected $fillable = [
        'name', 'profession', 'short_description', 'photo', 'resume',
        'twitter_url', 'linkin_url', 'github_url', 'YOE', 'PC', 'HC', 'youtube_url',
    ];
}
