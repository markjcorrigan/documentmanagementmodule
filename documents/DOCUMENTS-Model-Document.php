<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'shortname',
        'path',
        'description',
        'extension',
    ];

    protected $dates = ['deleted_at'];

    /**
     * Supported MIME types for document uploads
     */
    public static function mimeTypes(): array
    {
        return [
            'pdf' => 'application/pdf',
            'doc' => 'application/msword',
            'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'xls' => 'application/vnd.ms-excel',
            'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'ppt' => 'application/vnd.ms-powerpoint',
            'pptx' => 'application/vnd.openxmlformats-officedocument.presentationml.presentation',
            'txt' => 'text/plain',
            'csv' => 'text/csv',
            'zip' => 'application/zip',
            'rar' => 'application/x-rar-compressed',
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif',
            'svg' => 'image/svg+xml',
        ];
    }

    /**
     * Get file size in human readable format
     */
    public function getFileSizeAttribute(): string
    {
        $fullPath = storage_path('app/public/assets/' . $this->name);
        
        if (!file_exists($fullPath)) {
            return 'N/A';
        }
        
        $bytes = filesize($fullPath);
        
        if ($bytes >= 1073741824) {
            return number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            return number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            return number_format($bytes / 1024, 2) . ' KB';
        } elseif ($bytes > 1) {
            return $bytes . ' bytes';
        } elseif ($bytes == 1) {
            return $bytes . ' byte';
        } else {
            return '0 bytes';
        }
    }

    /**
     * Get icon class based on file extension
     */
    public function getIconAttribute(): string
    {
        $iconMap = [
            'pdf' => 'fa-file-pdf text-red-600',
            'doc' => 'fa-file-word text-blue-600',
            'docx' => 'fa-file-word text-blue-600',
            'xls' => 'fa-file-excel text-green-600',
            'xlsx' => 'fa-file-excel text-green-600',
            'ppt' => 'fa-file-powerpoint text-orange-600',
            'pptx' => 'fa-file-powerpoint text-orange-600',
            'txt' => 'fa-file-alt text-gray-600',
            'csv' => 'fa-file-csv text-green-600',
            'zip' => 'fa-file-archive text-yellow-600',
            'rar' => 'fa-file-archive text-yellow-600',
            'jpg' => 'fa-file-image text-purple-600',
            'jpeg' => 'fa-file-image text-purple-600',
            'png' => 'fa-file-image text-purple-600',
            'gif' => 'fa-file-image text-purple-600',
            'svg' => 'fa-file-image text-purple-600',
        ];

        return $iconMap[$this->extension] ?? 'fa-file text-gray-600';
    }

    /**
     * Scope for searching documents
     */
    public function scopeSearch($query, $term)
    {
        return $query->where(function($q) use ($term) {
            $q->where('name', 'like', "%{$term}%")
              ->orWhere('description', 'like', "%{$term}%")
              ->orWhere('shortname', 'like', "%{$term}%");
        });
    }
}
