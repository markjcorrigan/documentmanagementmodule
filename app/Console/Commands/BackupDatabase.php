<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class BackupDatabase extends Command
{
    protected $signature = 'db:backup {--all : Backup all databases} {--type= : Override automatic type detection (daily/weekly/monthly)}';
    protected $description = 'Backup the database(s) with automatic rotation and scheduling';

    private $backupPath;

    public function __construct()
    {
        parent::__construct();
        $this->backupPath = storage_path('app/backups');
    }

    public function handle()
    {
        try {
            $this->info('Starting database backup...');

            // Create backup directories if they don't exist
            $this->createBackupDirectories();

            // Determine backup type automatically based on current day
            $type = $this->determineBackupType();
            $now = Carbon::now();

            $this->info("Backup type: {$type}");

            // Get databases to backup
            $databases = $this->getDatabases();

            if (empty($databases)) {
                $this->warn('No databases found to backup');
                return 1;
            }

            $this->info("Backing up " . count($databases) . " database(s)...");

            $totalSize = 0;
            foreach ($databases as $database) {
                $this->info("Processing: {$database}");

                // Generate filename based on type
                $filename = $this->generateFilename($type, $now, $database);
                $filepath = "{$this->backupPath}/{$type}/{$filename}";

                // Create the backup
                $size = $this->createBackup($filepath, $database);
                $totalSize += $size;
            }

            // Rotate old backups for each type
            $this->rotateBackups($type);

            $this->info("✓ Backup completed successfully!");
            $this->info("Total size: " . $this->formatBytes($totalSize));
            Log::info("Database backup completed: {$type}, " . count($databases) . " databases, " . $this->formatBytes($totalSize));

            return 0;

        } catch (\Exception $e) {
            $this->error("✗ Backup failed: " . $e->getMessage());
            Log::error("Database backup failed: " . $e->getMessage());
            return 1;
        }
    }

    private function determineBackupType()
    {
        // If type is manually specified, use it
        if ($this->option('type')) {
            return $this->option('type');
        }

        $now = Carbon::now();

        // Monthly: First day of the month
        if ($now->day === 1) {
            return 'monthly';
        }

        // Weekly: Every Sunday
        if ($now->dayOfWeek === Carbon::SUNDAY) {
            return 'weekly';
        }

        // Default: Daily
        return 'daily';
    }

    private function getDatabases()
    {
        if ($this->option('all')) {
            // Get all databases except system ones
            $systemDatabases = ['mysql', 'information_schema', 'performance_schema', 'sys', 'phpmyadmin'];

            try {
                $databases = DB::select('SHOW DATABASES');
                $databases = array_map(function($db) {
                    return $db->Database;
                }, $databases);

                // Filter out system databases
                $databases = array_filter($databases, function($db) use ($systemDatabases) {
                    return !in_array(strtolower($db), $systemDatabases);
                });

                return array_values($databases);
            } catch (\Exception $e) {
                $this->warn("Could not list databases: " . $e->getMessage());
                // Fall back to configured database
                return [config('database.connections.mysql.database')];
            }
        } else {
            // Backup only the configured database
            return [config('database.connections.mysql.database')];
        }
    }

    private function createBackupDirectories()
    {
        $directories = ['daily', 'weekly', 'monthly'];

        foreach ($directories as $dir) {
            $path = "{$this->backupPath}/{$dir}";
            if (!File::exists($path)) {
                File::makeDirectory($path, 0755, true);
            }
        }
    }

    private function generateFilename($type, $now, $database)
    {
        $date = $now->format('Y-m-d_His');
        return "{$database}_{$type}_{$date}.sql";
    }

    private function createBackup($filepath, $database)
    {
        $username = config('database.connections.mysql.username');
        $password = config('database.connections.mysql.password');
        $host = config('database.connections.mysql.host');
        $port = config('database.connections.mysql.port', 3306);

        // Try to find mysqldump in common locations
        $possiblePaths = [
            'C:\\xampp\\mysql\\bin\\mysqldump.exe',
            'C:\\laragon\\bin\\mysql\\mysql-8.0.30\\bin\\mysqldump.exe',
            'C:\\laragon\\bin\\mysql\\mysql-5.7.33\\bin\\mysqldump.exe',
            'C:\\Program Files\\MySQL\\MySQL Server 8.0\\bin\\mysqldump.exe',
            'C:\\Program Files\\MySQL\\MySQL Server 5.7\\bin\\mysqldump.exe',
            '/usr/bin/mysqldump',
            '/usr/local/bin/mysqldump',
            'mysqldump', // Try system PATH
        ];

        $mysqldumpPath = null;
        foreach ($possiblePaths as $path) {
            if ($path === 'mysqldump' || file_exists($path)) {
                $mysqldumpPath = $path;
                break;
            }
        }

        if (!$mysqldumpPath) {
            throw new \Exception("mysqldump executable not found. Please check your MySQL installation.");
        }

        // Escape password for command line
        $escapedPassword = addslashes($password);

        // Build mysqldump command with proper escaping
        if ($password) {
            $command = sprintf(
                '"%s" --user=%s --password="%s" --host=%s --port=%s --single-transaction --quick --lock-tables=false %s',
                $mysqldumpPath,
                escapeshellarg($username),
                $escapedPassword,
                escapeshellarg($host),
                $port,
                escapeshellarg($database)
            );
        } else {
            $command = sprintf(
                '"%s" --user=%s --host=%s --port=%s --single-transaction --quick --lock-tables=false %s',
                $mysqldumpPath,
                escapeshellarg($username),
                escapeshellarg($host),
                $port,
                escapeshellarg($database)
            );
        }

        // Add output redirection
        $command .= ' > "' . $filepath . '" 2>&1';

        // Execute backup
        exec($command, $output, $returnVar);

        if ($returnVar !== 0) {
            $errorMessage = "mysqldump failed with code {$returnVar}";
            if (!empty($output)) {
                $errorMessage .= ": " . implode("\n", $output);
            }
            throw new \Exception($errorMessage);
        }

        // Verify backup file was created and has content
        if (!file_exists($filepath)) {
            throw new \Exception("Backup file was not created at: {$filepath}");
        }

        $filesize = filesize($filepath);
        if ($filesize < 1024) {
            // Check if there's an error message in the file
            $content = file_get_contents($filepath);
            throw new \Exception("Backup file too small ({$filesize} bytes). Content: " . substr($content, 0, 500));
        }

        $this->info("  ✓ {$database}: " . $this->formatBytes($filesize));

        return $filesize;
    }

    private function rotateBackups($type)
    {
        $limits = [
            'daily' => 7,    // Keep 7 daily backups
            'weekly' => 4,   // Keep 4 weekly backups
            'monthly' => 12, // Keep 12 monthly backups
        ];

        $limit = $limits[$type] ?? 7;
        $path = "{$this->backupPath}/{$type}";

        // Get all backup files sorted by modification time (oldest first)
        $files = collect(File::files($path))
            ->sortBy(function ($file) {
                return $file->getMTime();
            })
            ->values();

        // Delete oldest files if we exceed the limit
        $toDelete = $files->count() - $limit;

        if ($toDelete > 0) {
            $this->info("Rotating {$type} backups: removing {$toDelete} old backup(s)");

            $files->take($toDelete)->each(function ($file) {
                File::delete($file);
                $this->info("  Deleted: " . basename($file));
            });
        }
    }

    private function formatBytes($bytes)
    {
        $units = ['B', 'KB', 'MB', 'GB'];
        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);
        $bytes /= pow(1024, $pow);

        return round($bytes, 2) . ' ' . $units[$pow];
    }
}