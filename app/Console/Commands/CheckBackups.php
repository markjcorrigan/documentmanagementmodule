<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CheckBackups extends Command
{
    protected $signature = 'backup:status';
    protected $description = 'Check backup status and list recent backups';

    public function handle()
    {
        $backupPath = storage_path('app/backups');

        if (!is_dir($backupPath)) {
            $this->error("Backups directory not found: {$backupPath}");
            return 1;
        }

        $this->info("=== Backup Status Check ===");
        $this->info("Checked at: " . now());

        $totalSize = 0;
        $backupCount = 0;
        $rows = [];

        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($backupPath, \RecursiveDirectoryIterator::SKIP_DOTS)
        );

        foreach ($iterator as $file) {
            if (
                $file->isFile() &&
                in_array($file->getExtension(), ['sql', 'zip', 'gz'])
            ) {
                $backupCount++;
                $size = $file->getSize();
                $totalSize += $size;

                $path = $file->getPathname();
                $type = 'Unknown';

                if (str_contains($path, 'daily')) {
                    $type = 'Daily';
                } elseif (str_contains($path, 'weekly')) {
                    $type = 'Weekly';
                } elseif (str_contains($path, 'monthly')) {
                    $type = 'Monthly';
                } elseif (str_contains($path, 'config')) {
                    $type = 'Config';
                }

                $rows[] = [
                    $type,
                    $file->getFilename(),
                    $this->formatBytes($size),
                    date('Y-m-d H:i:s', $file->getMTime()),
                ];
            }
        }

        // Sort newest first
        usort($rows, fn ($a, $b) => strtotime($b[3]) <=> strtotime($a[3]));

        // Show only last 15
        $rows = array_slice($rows, 0, 15);

        // ✅ Laravel 12 requires ARRAY — not closure
        $this->table(
            ['Type', 'File', 'Size', 'Date'],
            $rows
        );

        $this->info("\n📊 Summary:");
        $this->line("Total backups: {$backupCount}");
        $this->line("Total size: " . $this->formatBytes($totalSize));

        $this->checkRecentBackups($backupPath);

        return 0;
    }

    private function formatBytes($bytes, $precision = 2)
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);
        $bytes /= pow(1024, $pow);

        return round($bytes, $precision) . ' ' . $units[$pow];
    }

    private function checkRecentBackups($backupPath)
    {
        $this->info("\n🔍 Recent Backup Check:");

        $today = date('Y-m-d');

        $dailyFiles = glob($backupPath . '/daily/*' . $today . '*.sql');
        $configFiles = glob($backupPath . '/configs/*' . $today . '*.zip');

        if (!empty($dailyFiles)) {
            $this->info("✅ Today's database backup exists: " . basename($dailyFiles[0]));
        } else {
            $this->warn("⚠️  No database backup found for today ({$today})");
        }

        if (!empty($configFiles)) {
            $this->info("✅ Today's config backup exists: " . basename($configFiles[0]));
        } else {
            $this->warn("⚠️  No config backup found for today ({$today})");
        }

        $twoDaysAgo = strtotime('-2 days');
        $allBackups = glob($backupPath . '/**/*.{sql,zip,gz}', GLOB_BRACE);

        $recentBackups = 0;
        foreach ($allBackups as $backup) {
            if (filemtime($backup) > $twoDaysAgo) {
                $recentBackups++;
            }
        }

        if ($recentBackups > 0) {
            $this->info("✅ {$recentBackups} backups from the last 2 days");
        } else {
            $this->error("❌ No backups in the last 2 days!");
        }
    }
}
