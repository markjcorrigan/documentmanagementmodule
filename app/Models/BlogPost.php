<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;

class BlogPost extends Model
{
    use Searchable;

    public function toSearchableArray()
    {
        // Strip HTML from post_description before indexing
        $cleanDescription = $this->post_description;

        if ($cleanDescription) {
            // Decode HTML entities first
            $cleanDescription = html_entity_decode($cleanDescription, ENT_QUOTES | ENT_HTML5, 'UTF-8');

            // Strip all HTML tags
            $cleanDescription = strip_tags($cleanDescription);

            // Clean up extra whitespace
            $cleanDescription = preg_replace('/\s+/', ' ', $cleanDescription);
            $cleanDescription = trim($cleanDescription);
        }

        return [
            'post_title' => $this->post_title,
            'post_slug' => $this->post_slug,
            'post_tags' => $this->post_tags,
            'post_description' => $cleanDescription,
        ];
    }

    protected function photo(): Attribute
    {
        return Attribute::make(get: function ($value) {
            if (! $value) {
                return asset('uploads/no_image.jpg');
            }

            return '/storage/images/'.$value;
        });
    }

    /**
     * Get the post description without HTML tags
     */
    public function getCleanDescriptionAttribute()
    {
        if (! $this->post_description) {
            return '';
        }

        $text = $this->post_description;

        // Remove script and style tags with their content
        $text = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', '', $text);
        $text = preg_replace('/<style\b[^>]*>(.*?)<\/style>/is', '', $text);

        // Decode HTML entities
        $text = html_entity_decode($text, ENT_QUOTES | ENT_HTML5, 'UTF-8');

        // Strip remaining HTML tags
        $text = strip_tags($text);

        // Fix common encoding issues (Windows-1252 to UTF-8 problems)
        $replacements = [
            'ΓÇö' => '-',  // em dash
            'ΓÇô' => '-',  // en dash
            'ΓÇ£' => '"',  // left double quote
            'ΓÇ¥' => '"',  // right double quote
            'ΓÇÖ' => "'",  // single quote (covers both left and right)
            'ΓÇª' => '...',  // ellipsis
            'Γäó' => '*',  // bullet
        ];

        $text = str_replace(array_keys($replacements), array_values($replacements), $text);

        // Clean up whitespace
        $text = preg_replace('/\s+/', ' ', $text);

        return trim($text);
    }

    //    protected $guarded = [];
    // In app/Models/BlogPost.php
    protected $fillable = [
        'user_id',
        'post_title',
        'post_description',
        'post_slug',
        'photo',
        'post_tags',
        'approved',
    ];

    public function scopeApprovedByUser($query, $userName)
    {
        return $query->whereHas('user', function ($query) use ($userName) {
            $query->where('name', $userName);
        })->where('approved', 1);
    }

    public static function approvedCount()
    {
        return self::where('approved', 1)->count();
    }

    public function votes()
    {
        return $this->hasMany(BlogPostVote::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
