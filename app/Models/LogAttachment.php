<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class LogAttachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'log_id',
        'filename',
        'path',
        'type',
        'mime_type',
        'size',
    ];

    protected $appends = ['url', 'formatted_size'];

    public function log(): BelongsTo
    {
        return $this->belongsTo(Log::class);
    }

    // Get the public URL for the attachment
    public function getUrlAttribute(): string
    {
        return Storage::url($this->path);
    }

    // Format file size for display
    public function getFormattedSizeAttribute(): string
    {
        $units = ['B', 'KB', 'MB', 'GB'];
        $size = $this->size;
        $unit = 0;

        while ($size >= 1024 && $unit < count($units) - 1) {
            $size /= 1024;
            $unit++;
        }

        return round($size, 2).' '.$units[$unit];
    }

    // Check if attachment is an image
    public function isImage(): bool
    {
        return $this->type === 'image';
    }

    // Check if attachment is a document
    public function isDocument(): bool
    {
        return $this->type === 'document';
    }

    // Delete file from storage when model is deleted
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($attachment) {
            Storage::delete($attachment->path);
        });
    }
}