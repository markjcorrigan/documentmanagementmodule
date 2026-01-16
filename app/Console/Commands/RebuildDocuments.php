<?php

namespace App\Console\Commands;

use App\Models\Document;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File as FileFacade;

class RebuildDocuments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * Run with: php artisan documents:rebuild
     */
    protected $signature = 'documents:rebuild
                            {--force : Skip confirmation and rebuild automatically}
                            {--max-logs=10 : Maximum number of rebuild logs to keep}';

    /**
     * The console command description.
     */
    protected $description = 'Rebuild the documents table from files in storage/app/public/assets';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $folder = storage_path('app/public/assets');

        // Create folder if it doesn't exist
        if (! is_dir($folder)) {
            if (! FileFacade::makeDirectory($folder, 0755, true)) {
                $this->error("Failed to create folder: {$folder}");

                return 1;
            } else {
                $this->info("Folder created: {$folder}");
            }
        }

        // Check if folder has any files
        $filesInFolder = array_filter(scandir($folder), fn ($f) => ! in_array($f, ['.', '..']) && is_file($folder.DIRECTORY_SEPARATOR.$f));
        if (empty($filesInFolder)) {
            $this->warn('Warning: The assets folder is empty. No files to rebuild.');
            if (! $this->option('force')) {
                $this->info("Operation cancelled. Add files to {$folder} before running this command. NB StuffsAboutHomeHosting##RESOURCES.");

                return 0;
            } else {
                $this->warn('--force option used: proceeding despite empty folder.');
            }
        }

        // Ask for confirmation unless --force is used
        if (! $this->option('force') && ! $this->confirm("This will DELETE all existing document rows in the Documents Table and rebuild the table from files in {$folder}. Continue?")) {
            $this->info('Operation cancelled.');

            return 0;
        }

        // Prompt to create storage link
        if ($this->confirm('Do you want to create the storage symlink (public/storage → storage/app/public)?')) {
            $this->call('storage:link');
            $this->info('Storage symlink created or already exists.');
        }

        // Clear out existing records
        Document::truncate();
        $this->warn('Documents table cleared.');

        $countAdded = 0;
        $skippedFiles = [];
        $logLines = [];
        $logLines[] = 'Rebuild started at '.now();
        $logLines[] = "Assets folder: $folder";
        $logLines[] = '-----------------------------';

        foreach ($filesInFolder as $file) {
            $fullPath = $folder.DIRECTORY_SEPARATOR.$file;

            // Generate short name from file
            $shortName = substr(
                preg_replace('/[\(\[].*?[\)\]]/', '', str_replace(' ', '', $file)),
                0,
                30
            );

            // Get file extension
            $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));

            // Insert fresh record with extension
            Document::create([
                'name' => $file,
                'shortname' => $shortName,
                'path' => 'assets/'.$file,
                'description' => $shortName,
                'extension' => $ext,
            ]);

            $this->info("Added document: $file");
            $logLines[] = "Added: $file";
            $countAdded++;
        }

        // Summary
        $this->info('Rebuild complete!');
        $this->info("Total files added: $countAdded");
        $logLines[] = '-----------------------------';
        $logLines[] = "Total files added: $countAdded";

        if (! empty($skippedFiles)) {
            $this->warn('Skipped non-files or folders:');
            foreach ($skippedFiles as $skipped) {
                $this->line(" - $skipped");
                $logLines[] = " - $skipped";
            }
        }

        // Write log file
        $logDir = storage_path('logs');
        if (! FileFacade::exists($logDir)) {
            FileFacade::makeDirectory($logDir, 0755, true);
        }

        $logPath = $logDir.'/rebuild_documents_'.now()->format('Ymd_His').'.log';
        FileFacade::put($logPath, implode(PHP_EOL, $logLines));
        $this->info("Log written to: $logPath");

        // Cleanup old logs
        $maxLogs = (int) $this->option('max-logs');
        $this->cleanupOldLogs($logDir, $maxLogs);

        return 0;
    }

    /**
     * Keep only the latest $maxLogs files, delete older ones
     */
    protected function cleanupOldLogs($logDir, $maxLogs)
    {
        $logs = collect(FileFacade::files($logDir))
            ->filter(fn ($file) => str_contains($file->getFilename(), 'rebuild_documents_'))
            ->sortByDesc(fn ($file) => $file->getCTime());

        if ($logs->count() <= $maxLogs) {
            return;
        }

        $logsToDelete = $logs->slice($maxLogs);
        foreach ($logsToDelete as $oldLog) {
            FileFacade::delete($oldLog);
            $this->info('Deleted old log: '.$oldLog->getFilename());
        }
    }
}
