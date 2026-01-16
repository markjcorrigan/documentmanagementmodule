<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use ZipArchive;

class BackupConfigs extends Command
{
    protected $signature = 'config:backup {--type=daily}';
    protected $description = 'Backup XAMPP configuration files';

    private $backupPath;
    private $xamppPath = 'C:\\xampp';

    public function __construct()
    {
        parent::__construct();
        $this->backupPath = storage_path('app/backups');
    }

    public function handle()
    {
        try {
            $this->info('Starting configuration backup...');

            // Create backup directories
            $this->createBackupDirectories();

            $type = $this->option('type');
            $now = Carbon::now();

            // Generate filename
            $filename = $this->generateFilename($type, $now);
            $filepath = "{$this->backupPath}/configs/{$type}/{$filename}";

            // Create zip backup
            $this->createConfigBackup($filepath);

            // Rotate old backups
            $this->rotateBackups($type);

            $this->info("✓ Config backup completed: {$filename}");
            Log::info("Configuration backup completed: {$filename}");

            return 0;

        } catch (\Exception $e) {
            $this->error("✗ Config backup failed: " . $e->getMessage());
            Log::error("Configuration backup failed: " . $e->getMessage());
            return 1;
        }
    }

    private function createBackupDirectories()
    {
        $directories = ['daily', 'weekly', 'monthly'];

        foreach ($directories as $dir) {
            $path = "{$this->backupPath}/configs/{$dir}";
            if (!File::exists($path)) {
                File::makeDirectory($path, 0755, true);
            }
        }
    }

    private function generateFilename($type, $now)
    {
        $date = $now->format('Y-m-d_His');
        return "xampp_configs_{$type}_{$date}.zip";
    }

    private function createConfigBackup($filepath)
    {
        $zip = new ZipArchive();

        if ($zip->open($filepath, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== true) {
            throw new \Exception("Failed to create zip file: {$filepath}");
        }

        // Files to backup
        $filesToBackup = [
            // Apache configs
            "{$this->xamppPath}\\apache\\conf\\httpd.conf" => 'apache/httpd.conf',
            "{$this->xamppPath}\\apache\\conf\\extra\\httpd-vhosts.conf" => 'apache/extra/httpd-vhosts.conf',
            "{$this->xamppPath}\\apache\\conf\\extra\\httpd-ssl.conf" => 'apache/extra/httpd-ssl.conf',
            "{$this->xamppPath}\\apache\\conf\\extra\\httpd-xampp.conf" => 'apache/extra/httpd-xampp.conf',

            // PHP config
            "{$this->xamppPath}\\php\\php.ini" => 'php/php.ini',

            // MySQL config
            "{$this->xamppPath}\\mysql\\bin\\my.ini" => 'mysql/my.ini',

            // Project .htaccess (public folder only)
            base_path('public/.htaccess') => 'project/public/.htaccess',
        ];

        $backedUpCount = 0;
        $missingFiles = [];

        foreach ($filesToBackup as $source => $destination) {
            if (file_exists($source)) {
                $zip->addFile($source, $destination);
                $this->info("  ✓ Added: {$destination}");
                $backedUpCount++;
            } else {
                $missingFiles[] = $source;
                $this->warn("  ⚠ Not found: {$source}");
            }
        }

        // Add a README with backup info
        $readme = "XAMPP Configuration Backup\n";
        $readme .= "Created: " . Carbon::now()->format('Y-m-d H:i:s') . "\n";
        $readme .= "Type: " . $this->option('type') . "\n";
        $readme .= "Files backed up: {$backedUpCount}\n\n";

        if (!empty($missingFiles)) {
            $readme .= "Missing files:\n";
            foreach ($missingFiles as $file) {
                $readme .= "  - {$file}\n";
            }
        }

        $readme .= "\n\nRESTORE INSTRUCTIONS:\n";
        $readme .= "1. Stop XAMPP services\n";
        $readme .= "2. Extract files from this zip\n";
        $readme .= "3. Copy files back to their original locations\n";
        $readme .= "4. Restart XAMPP services\n";

        $zip->addFromString('README.txt', $readme);

        $zip->close();

        if (!file_exists($filepath)) {
            throw new \Exception("Backup file was not created");
        }

        $this->info("Backup size: " . $this->formatBytes(filesize($filepath)));
        $this->info("Files backed up: {$backedUpCount}");
    }

    private function rotateBackups($type)
    {
        $limits = [
            'daily' => 7,
            'weekly' => 4,
            'monthly' => 3,
        ];

        $limit = $limits[$type] ?? 7;
        $path = "{$this->backupPath}/configs/{$type}";

        $files = collect(File::files($path))
            ->sortBy(function ($file) {
                return $file->getMTime();
            })
            ->values();

        $toDelete = $files->count() - $limit;

        if ($toDelete > 0) {
            $this->info("Rotating backups: removing {$toDelete} old backup(s)");

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