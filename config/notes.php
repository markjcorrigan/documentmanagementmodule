<?php

return [

    /*
    |--------------------------------------------------------------------------
    | File Upload Settings
    |--------------------------------------------------------------------------
    */

    'uploads' => [
        'images' => [
            'disk' => 'public',
            'path' => 'images',
            'max_size' => 5120, // 5MB in kilobytes
            'allowed_mimes' => ['jpg', 'jpeg', 'png', 'gif', 'webp'],
            'allowed_extensions' => ['jpg', 'jpeg', 'png', 'gif', 'webp'],
        ],

        'documents' => [
            'disk' => 'public',
            'path' => 'documents',
            'max_size' => 10240, // 10MB in kilobytes
            'allowed_mimes' => [
                'pdf',
                'doc', 'docx',
                'xls', 'xlsx',
                'ppt', 'pptx',
                'txt',
            ],
            'allowed_extensions' => [
                'pdf',
                'doc', 'docx',
                'xls', 'xlsx',
                'ppt', 'pptx',
                'txt',
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Pagination Settings
    |--------------------------------------------------------------------------
    */

    'pagination' => [
        'per_page' => 12,
        'max_per_page' => 100,
    ],

    /*
    |--------------------------------------------------------------------------
    | Search Settings
    |--------------------------------------------------------------------------
    */

    'search' => [
        'enabled' => true,
        'driver' => env('SCOUT_DRIVER', 'database'),
        'queue' => env('SCOUT_QUEUE', false),
    ],

    /*
    |--------------------------------------------------------------------------
    | Share Settings
    |--------------------------------------------------------------------------
    */

    'sharing' => [
        'enabled' => true,
        'default_permission' => 'view',
        'allow_reshare' => true,
        'max_expiration_days' => 365,
    ],

    /*
    |--------------------------------------------------------------------------
    | Templates Settings
    |--------------------------------------------------------------------------
    */

    'templates' => [
        'enabled' => true,
        'public_templates_enabled' => true,
        'max_user_templates' => 50,
    ],

    /*
    |--------------------------------------------------------------------------
    | Export Settings
    |--------------------------------------------------------------------------
    */

    'export' => [
        'enabled' => true,
        'formats' => ['pdf', 'markdown', 'json'],
        'pdf' => [
            'paper_size' => 'a4',
            'orientation' => 'portrait',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Cleanup Settings
    |--------------------------------------------------------------------------
    */

    'cleanup' => [
        'auto_delete_expired_shares' => true,
        'auto_cleanup_orphaned_files' => true,
        'retention_days' => [
            'deleted_notes' => 30, // Soft delete retention
            'expired_shares' => 7,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | UI Settings
    |--------------------------------------------------------------------------
    */

    'ui' => [
        'default_category_color' => '#3b82f6',
        'suggested_colors' => [
            '#3b82f6', // Blue
            '#ef4444', // Red
            '#10b981', // Green
            '#f59e0b', // Amber
            '#8b5cf6', // Purple
            '#ec4899', // Pink
            '#14b8a6', // Teal
            '#f97316', // Orange
        ],
        'items_per_row' => [
            'mobile' => 1,
            'tablet' => 2,
            'desktop' => 3,
            'wide' => 4,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | API Settings
    |--------------------------------------------------------------------------
    */

    'api' => [
        'enabled' => true,
        'version' => 'v1',
        'rate_limit' => [
            'enabled' => true,
            'per_minute' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Performance Settings
    |--------------------------------------------------------------------------
    */

    'performance' => [
        'cache_enabled' => true,
        'cache_duration' => 300, // 5 minutes
        'eager_load_relations' => ['category', 'tags', 'attachments', 'user'],
    ],

];

// ============================================================================

// Usage in your application:

// In a controller or service:
$maxImageSize = config('notes.uploads.images.max_size');
$allowedFormats = config('notes.export.formats');
$perPage = config('notes.pagination.per_page');

// Validation using config:
$request->validate([
    'image' => [
        'image',
        'max:'.config('notes.uploads.images.max_size'),
        'mimes:'.implode(',', config('notes.uploads.images.allowed_mimes')),
    ],
    'document' => [
        'file',
        'max:'.config('notes.uploads.documents.max_size'),
        'mimes:'.implode(',', config('notes.uploads.documents.allowed_mimes')),
    ],
]);
