<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitorLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'username',
        'ip_address',
        'user_agent',
        'page_url',
        'connected_at',
        'disconnected_at',

        // New columns
        'visitor_type',
        'bot_type',
        'browser',
        'platform',
        'referrer',
        'request_method',
        'is_ajax',
        'session_id',
        'is_mobile',
    ];

    protected $casts = [
        'connected_at' => 'datetime',
        'disconnected_at' => 'datetime',
        'is_ajax' => 'boolean',
        'is_mobile' => 'boolean',
    ];

    protected $attributes = [
        'visitor_type' => 'anonymous',
        'is_ajax' => false,
        'is_mobile' => false,
    ];

    // Helper scopes
    public function scopeBots($query)
    {
        return $query->where('visitor_type', 'bot');
    }

    public function scopeUsers($query)
    {
        return $query->where('visitor_type', 'user');
    }

    public function scopeAnonymous($query)
    {
        return $query->where('visitor_type', 'anonymous');
    }

    public function scopeSearchBots($query)
    {
        return $query->where('bot_type', 'search');
    }

    public function scopeToday($query)
    {
        return $query->whereDate('connected_at', today());
    }

    public function scopeRecent($query, $hours = 24)
    {
        return $query->where('connected_at', '>', now()->subHours($hours));
    }
}