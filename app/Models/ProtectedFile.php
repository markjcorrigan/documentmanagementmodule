<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ProtectedFile extends Model
{
    protected $fillable = [
        'name',
        'path',
        'parent_path',
        'type',
        'extension',
        'mime_type',
        'size',
        'resource',
        'description',
        'metadata',
        'file_modified_at',
    ];

    protected $casts = [
        'metadata' => 'array',
        'file_modified_at' => 'datetime',
    ];

    /**
     * Get the full URL to access this file
     */
    public function getUrlAttribute()
    {
        return route('storage.resource', [
            'resource' => explode('/', $this->path)[0] ?? '',
            'path' => substr($this->path, strpos($this->path, '/') + 1)
        ]);
    }

    /**
     * Get the full filesystem path
     */
    public function getFullPathAttribute()
    {
        return Storage::disk('protected')->path($this->path);
    }

    /**
     * Check if file exists on disk
     */
    public function existsOnDisk()
    {
        return Storage::disk('protected')->exists($this->path);
    }

    /**
     * Get parent folder
     */
    public function parent()
    {
        return $this->belongsTo(ProtectedFile::class, 'parent_path', 'path');
    }

    /**
     * Get children (for folders)
     */
    public function children()
    {
        return $this->hasMany(ProtectedFile::class, 'parent_path', 'path');
    }

    /**
     * Scope to get only files
     */
    public function scopeFiles($query)
    {
        return $query->where('type', 'file');
    }

    /**
     * Scope to get only folders
     */
    public function scopeFolders($query)
    {
        return $query->where('type', 'folder');
    }

    /**
     * Scope to get files by resource
     */
    public function scopeInResource($query, $resource)
    {
        return $query->where('resource', $resource);
    }

    /**
     * Get mime types configuration
     */
    public static function mimeTypes()
    {
        return [
            // Documents
            'pdf' => 'application/pdf',
            'doc' => 'application/msword',
            'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'txt' => 'text/plain',
            'rtf' => 'application/rtf',

            // Audio
            'mp3' => 'audio/mpeg',
            'wav' => 'audio/wav',
            'ogg' => 'audio/ogg',
            'm4a' => 'audio/mp4',

            // Video
            'mp4' => 'video/mp4',
            'webm' => 'video/webm',
            'avi' => 'video/x-msvideo',
            'mov' => 'video/quicktime',

            // Images
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif',
            'svg' => 'image/svg+xml',
            'webp' => 'image/webp',

            // Web
            'html' => 'text/html',
            'htm' => 'text/html',
            'css' => 'text/css',
            'js' => 'application/javascript',

            // Archives
            'zip' => 'application/zip',
            'rar' => 'application/x-rar-compressed',
            '7z' => 'application/x-7z-compressed',
        ];
    }
}