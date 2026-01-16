<?php

namespace App\Console\Commands;

use App\Models\Document;
use App\Models\Image;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class RebuildScoutIndexes extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'scout:rebuild 
                            {--sync : Sync existing files from storage to database}
                            {--fresh : Fresh rebuild (flush before import)}';

    /**
     * The console command description.
     */
    protected $description = 'Rebuild Scout search indexes for Documents and Images, and clear all caches';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('🚀 Starting Scout Rebuild Process...');
        $this->newLine();

        // Step 1: Clear all caches
        $this->info('📦 Step 1: Clearing all caches...');
        $this->clearCaches();
        $this->info('✅ Caches cleared successfully');
        $this->newLine();

        // Step 2: Flush indexes if --fresh flag is used
        if ($this->option('fresh')) {
            $this->info('🗑️  Step 2: Flushing existing Scout indexes...');
            $this->flushIndexes();
            $this->info('✅ Indexes flushed successfully');
            $this->newLine();
        }

        // Step 3: Sync files from storage if --sync flag is used
        if ($this->option('sync')) {
            $this->info('📁 Step 3: Syncing files from storage to database...');
            $this->syncFilesFromStorage();
            $this->newLine();
        }

        // Step 4: Rebuild Scout indexes
        $this->info('🔍 Step 4: Rebuilding Scout indexes...');
        $this->rebuildIndexes();
        $this->info('✅ Indexes rebuilt successfully');
        $this->newLine();

        $this->info('🎉 Scout rebuild completed successfully!');

        return Command::SUCCESS;
    }

    /**
     * Clear all Laravel caches
     */
    protected function clearCaches()
    {
        $caches = [
            'cache:clear' => 'Application cache',
            'config:clear' => 'Configuration cache',
            'view:clear' => 'View cache',
            'route:clear' => 'Route cache',
        ];

        foreach ($caches as $command => $description) {
            Artisan::call($command);
            $this->line("  - Cleared {$description}");
        }
    }

    /**
     * Flush Scout indexes
     */
    protected function flushIndexes()
    {
        $this->line('  - Flushing Documents index...');
        Artisan::call('scout:flush', ['model' => 'App\\Models\\Document']);

        $this->line('  - Flushing Images index...');
        Artisan::call('scout:flush', ['model' => 'App\\Models\\Image']);
    }

    /**
     * Rebuild Scout indexes
     */
    protected function rebuildIndexes()
    {
        $documentCount = Document::count();
        $this->line("  - Indexing {$documentCount} documents...");
        Artisan::call('scout:import', ['model' => 'App\\Models\\Document']);

        $imageCount = Image::count();
        $this->line("  - Indexing {$imageCount} images...");
        Artisan::call('scout:import', ['model' => 'App\\Models\\Image']);
    }

    /**
     * Sync existing files from storage to database
     */
    protected function syncFilesFromStorage()
    {
        $syncedDocuments = 0;
        $syncedImages = 0;
        $skipped = 0;

        // Sync Documents from all folders
        $this->line('  📄 Syncing documents...');

        $basePath = 'uploads';
        $directories = Storage::disk('private')->directories($basePath);

        foreach ($directories as $directory) {
            $folder = basename($directory);
            $files = Storage::disk('private')->files($directory);
            $fileCount = count($files);

            $this->line("    - Processing folder: {$folder} ({$fileCount} files)");

            foreach ($files as $file) {
                $filename = basename($file);

                // Check if document already exists
                $exists = Document::where('path', $file)->exists();

                if ($exists) {
                    $skipped++;
                    continue;
                }

                try {
                    Document::create([
                        'name' => $filename,
                        'path' => $file,
                        'folder' => $folder,
                        'shortname' => pathinfo($filename, PATHINFO_FILENAME),
                        'description' => '',
                        'extension' => strtolower(pathinfo($filename, PATHINFO_EXTENSION)),
                    ]);
                    $syncedDocuments++;
                } catch (\Exception $e) {
                    $this->warn("      ⚠️  Failed to sync: {$filename} - {$e->getMessage()}");
                }
            }
        }

        // Sync Images
        $this->line('  🖼️  Syncing images...');

        if (Storage::disk('public')->exists('images')) {
            $files = Storage::disk('public')->files('images');
            $fileCount = count($files);
            $this->line("    - Processing images folder ({$fileCount} files)");

            foreach ($files as $file) {
                $filename = basename($file);

                // Check if image already exists
                $exists = Image::where('path', $file)->exists();

                if ($exists) {
                    $skipped++;
                    continue;
                }

                try {
                    Image::create([
                        'name' => $filename,
                        'path' => $file,
                        'shortname' => pathinfo($filename, PATHINFO_FILENAME),
                        'description' => '',
                        'extension' => strtolower(pathinfo($filename, PATHINFO_EXTENSION)),
                    ]);
                    $syncedImages++;
                } catch (\Exception $e) {
                    $this->warn("      ⚠️  Failed to sync: {$filename} - {$e->getMessage()}");
                }
            }
        } else {
            $this->line('    - No images folder found, skipping...');
        }

        $this->newLine();
        $this->info("  ✅ Synced {$syncedDocuments} documents and {$syncedImages} images");
        if ($skipped > 0) {
            $this->line("  ℹ️  Skipped {$skipped} files (already in database)");
        }
    }
}