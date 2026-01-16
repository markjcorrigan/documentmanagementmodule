<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class ClearLogs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'logs:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear Laravel logs with backup and cleanup old backups';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $logPath = storage_path('logs/laravel.log');
        $backupDir = storage_path('logs/backups/');

        // Ensure backup directory exists
        if (! File::exists($backupDir)) {
            File::makeDirectory($backupDir, 0755, true);
        }

        $messages = [];

        // Check if log file exists
        if (File::exists($logPath)) {
            $fileSize = File::size($logPath);

            // Only create backup if file has content
            if ($fileSize > 0) {
                // Create timestamped backup
                $timestamp = now()->format('Y-m-d_H-i-s');
                $backupPath = $backupDir."laravel_backup_{$timestamp}.log";

                // Copy the log file
                if (File::copy($logPath, $backupPath)) {
                    $messages[] = '✓ Backup created: '.basename($backupPath);
                } else {
                    $messages[] = '✗ Failed to create backup';
                }
            } else {
                $messages[] = 'ℹ Log file is empty, no backup created';
            }

            // Clear the log file
            File::put($logPath, '');
            $messages[] = '✓ Logs have been cleared';
        } else {
            $messages[] = 'ℹ Log file does not exist';
        }

        // Clean up old backups (older than 3 days)
        $oldBackupsDeleted = $this->cleanupOldBackups($backupDir);

        if ($oldBackupsDeleted > 0) {
            $messages[] = "✓ {$oldBackupsDeleted} backup(s) older than 3 days removed";
        } else {
            $messages[] = 'ℹ No old backups to remove';
        }

        // Output all messages
        $this->info('Log Clearance Report:');
        $this->newLine();

        foreach ($messages as $message) {
            $this->line($message);
        }

        $this->newLine();
        $this->info('Operation completed successfully!');
    }

    /**
     * Remove backup files older than 3 days
     */
    private function cleanupOldBackups(string $backupDir): int
    {
        if (! File::exists($backupDir)) {
            return 0;
        }

        $files = File::files($backupDir);
        $cutoffDate = Carbon::now()->subDays(3);
        $deletedCount = 0;

        foreach ($files as $file) {
            $lastModified = Carbon::createFromTimestamp(File::lastModified($file->getPathname()));

            if ($lastModified->lt($cutoffDate)) {
                if (File::delete($file->getPathname())) {
                    $deletedCount++;
                }
            }
        }

        return $deletedCount;
    }
}
