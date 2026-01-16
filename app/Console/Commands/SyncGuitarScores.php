<?php

namespace App\Console\Commands;

use App\Models\GuitarScore;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class SyncGuitarScores extends Command
{
    protected $signature = 'guitar:sync 
        {--f|force : Force sync (clear existing records)} 
        {--skip-hidden : Skip hidden files (starting with .)}';

    protected $description = 'Sync guitar scores from protectedGuitar storage to database';

    public function handle()
    {
        $this->info('🎸 Starting guitar scores sync...');

        $disk = Storage::disk('protectedGuitar');
        $skipHidden = $this->option('skip-hidden');

        if ($this->option('force')) {
            $this->warn('⚠️  Clearing existing guitar score records...');
            GuitarScore::truncate();
            $this->info('✅ Cleared existing records.');
        }

        $this->info('🔎 Scanning directories...');
        $allDirs = $disk->allDirectories();

        // Filter out hidden directories
        if ($skipHidden) {
            $allDirs = array_filter($allDirs, function($dir) {
                $name = basename($dir);
                return !str_starts_with($name, '.');
            });
        }

        // Sort by depth (parents first)
        usort($allDirs, function($a, $b) {
            return substr_count($a, '/') - substr_count($b, '/');
        });

        $this->info("📁 Found " . count($allDirs) . " directories");

        $bar = $this->output->createProgressBar(count($allDirs));
        $bar->start();

        foreach ($allDirs as $dir) {
            $name = basename($dir);
            $parentPath = dirname($dir);
            if ($parentPath === '.') {
                $parentPath = null;
            }

            // Skip if already exists
            if (!GuitarScore::where('path', $dir)->exists()) {
                GuitarScore::create([
                    'name' => $name,
                    'path' => $dir,
                    'parent_path' => $parentPath,
                    'type' => 'folder',
                    'file_modified_at' => now(),
                ]);
            }

            $bar->advance();
        }

        $bar->finish();
        $this->newLine();
        $this->info('✅ Directories synced.');

        $this->info('🔎 Scanning files...');
        $allFiles = $disk->allFiles();

        // Filter out hidden files
        if ($skipHidden) {
            $allFiles = array_filter($allFiles, function($file) {
                $name = basename($file);
                return !str_starts_with($name, '.');
            });
        }

        $this->info("📄 Found " . count($allFiles) . " files");

        $bar = $this->output->createProgressBar(count($allFiles));
        $bar->start();

        foreach ($allFiles as $file) {
            $name = basename($file);
            $parentPath = dirname($file);
            if ($parentPath === '.') {
                $parentPath = null;
            }

            // Skip if already exists
            if (!GuitarScore::where('path', $file)->exists()) {
                $extension = strtolower(pathinfo($name, PATHINFO_EXTENSION));

                try {
                    $size = $disk->size($file);
                    $lastModified = $disk->lastModified($file);

                    GuitarScore::create([
                        'name' => $name,
                        'path' => $file,
                        'parent_path' => $parentPath,
                        'type' => 'file',
                        'extension' => $extension,
                        'size' => $size,
                        'file_modified_at' => \Carbon\Carbon::createFromTimestamp($lastModified),
                    ]);
                } catch (\Exception $e) {
                    $this->warn("⚠️  Skipping file {$file}: " . $e->getMessage());
                }
            }

            $bar->advance();
        }

        $bar->finish();
        $this->newLine();

        // Show summary
        $total = GuitarScore::count();
        $files = GuitarScore::where('type', 'file')->count();
        $folders = GuitarScore::where('type', 'folder')->count();

        $this->info('📊 Sync Summary:');
        $this->info("   Total items: {$total}");
        $this->info("   Files: {$files}");
        $this->info("   Folders: {$folders}");

        // Check SOREN_VIDS specifically
        $sorenFolder = GuitarScore::where('path', 'SOREN_VIDS')->where('type', 'folder')->first();

        if ($sorenFolder) {
            $children = GuitarScore::where('parent_path', 'SOREN_VIDS')->count();
            $this->info("✅ SOREN_VIDS folder found with {$children} items");
        } else {
            $this->warn('⚠️  SOREN_VIDS folder not found in database');
        }

        return Command::SUCCESS;
    }
}