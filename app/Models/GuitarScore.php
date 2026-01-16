<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class GuitarScore extends Model
{
    protected $table = 'guitar_scores';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'name',
        'path',
        'type',
        'extension',
        'mime_type',
        'size',
        'file_modified_at',
        'composer',
        'title',
        'performer',
        'notes'
    ];
    
    protected $casts = [
        'file_modified_at' => 'datetime',
        'size' => 'integer',
        'working_on' => 'boolean',
        'interested_in' => 'boolean',
    ];
    
    /**
     * Simple mime types mapping
     */
    public static function mimeTypes()
    {
        return [
            'pdf' => 'application/pdf',
            'mp3' => 'audio/mpeg',
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif',
        ];
    }
    
    /**
     * Get human readable file size
     */
    public function getHumanSizeAttribute()
    {
        $bytes = $this->size;
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        for ($i = 0; $bytes > 1024 && $i < count($units) - 1; $i++) {
            $bytes /= 1024;
        }
        return round($bytes, 2) . ' ' . $units[$i];
    }
}
