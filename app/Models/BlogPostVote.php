<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BlogPostVote extends Model
{
    use HasFactory;

    protected $fillable = ['blog_post_id', 'user_id', 'vote'];

    protected $casts = [
        'vote' => 'integer',
    ];

    /**
     * Get the blog post that owns the vote
     */
    public function blogPost(): BelongsTo
    {
        return $this->belongsTo(BlogPost::class, 'blog_post_id');
    }

    /**
     * Get the user who cast the vote
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
