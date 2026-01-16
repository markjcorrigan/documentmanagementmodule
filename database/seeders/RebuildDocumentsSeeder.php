<?php

namespace Database\Seeders;

use App\Models\Document;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class RebuildDocumentsSeeder extends Seeder
{
    public function run()
    {
        // Path to the new assets folder
        $assetsPath = storage_path('app/public/assets');

        if (! File::exists($assetsPath)) {
            $this->command->error("❌ Assets folder not found at: $assetsPath");

            return;
        }

        // Get all files in the folder (non-recursive)
        $files = File::files($assetsPath);

        // ✅ If no files exist, ask user for confirmation
        if (empty($files)) {
            $this->command->warn("⚠️ No files found in: $assetsPath");
            $confirm = $this->command->confirm('Do you want to continue anyway?', false);

            if (! $confirm) {
                $this->command->info('Seeder stopped. Please add files to the assets folder and re-run.');

                return; // ❌ stop seeder here
            }
        }

        // ✅ Process all files
        foreach ($files as $file) {
            $originalName = $file->getFilename();

            // Generate short name by removing spaces and limiting to 30 chars
            $shortName = substr(
                preg_replace('/[\(\[].*?[\)\]]/', '', str_replace(' ', '', $originalName)),
                0,
                30
            );

            // ✅ Store relative path (from assets/)
            Document::updateOrCreate(
                ['path' => 'assets/'.$originalName],
                [
                    'name' => $originalName,
                    'shortname' => $shortName,
                    'description' => $shortName,
                ]
            );

            $this->command->info("✅ Added/Updated document: $originalName");
        }

        $this->command->info('🎉 Rebuild complete. Total files processed: '.count($files));
    }
}
