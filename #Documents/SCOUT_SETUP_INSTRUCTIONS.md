# Scout Setup Instructions for Document Management

## Database Migration
Add a 'folder' column to your documents table if it doesn't exist:

```php
php artisan make:migration add_folder_to_documents_table
```

In the migration file:
```php
public function up()
{
    Schema::table('documents', function (Blueprint $table) {
        $table->string('folder')->default('pending')->after('path');
    });
}

public function down()
{
    Schema::table('documents', function (Blueprint $table) {
        $table->dropColumn('folder');
    });
}
```

Run: `php artisan migrate`

## Clear and Rebuild Scout Index

```bash
# Flush existing index
php artisan scout:flush "App\Models\Document"

# Reimport all documents
php artisan scout:import "App\Models\Document"

# Clear all caches
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear
```

## If You Have Existing Files in Storage

You need to sync them to the database:

```php
php artisan tinker

// Run this in tinker:
$path = 'uploads/pending';
$files = Storage::disk('private')->files($path);

foreach ($files as $file) {
    \App\Models\Document::create([
        'name' => basename($file),
        'path' => $file,
        'folder' => 'pending',
        'shortname' => pathinfo(basename($file), PATHINFO_FILENAME),
        'description' => '',
    ]);
}
```

## Important Notes

1. Your search now uses Scout, which searches the database (name, shortname, description fields)
2. The #[Url] attribute keeps the search term in the URL so pagination works
3. Every file upload creates a Document record which Scout automatically indexes
4. When you delete files, the Document record and Scout index are automatically updated
