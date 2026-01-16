<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

class ListBackups extends Command
{
    protected $signature = 'db:list-backups {--type=all : Type of backups to list (all, daily, weekly, monthly)}';
    protected $description = 'List all available database backups';

    private $backupPath;
    
    public function __construct()
    {
        parent::__construct();
        $this->backupPath = storage_path('app/backups');
    }

    public function handle()
    {
        $type = $this->option('type');
        
        $this->info('═══════════════════════════════════════════════════════════');
        $this->info('           DATABASE BACKUP INVENTORY');
        $this->info('═══════════════════════════════════════════════════════════');
        $this->newLine();
        
        if ($type === 'all' || $type === 'daily') {
            $this->listBackupType('daily', 'DAILY BACKUPS (Last 7 Days)');
        }
        
        if ($type === 'all' || $type === 'weekly') {
            $this->listBackupType('weekly', 'WEEKLY BACKUPS (Last 4 Weeks)');
        }
        
        if ($type === 'all' || $type === 'monthly') {
            $this->listBackupType('monthly', 'MONTHLY BACKUPS (Last 3 Months)');
        }
        
        // Show total storage used
        $this->showStorageInfo();
        
        $this->newLine();
        $this->info('═══════════════════════════════════════════════════════════');
        $this->info('To restore a backup, use: restore-backup.bat');
        $this->info('Or manually: mysql -u root -p database < backup_file.sql');
        $this->info('═══════════════════════════════════════════════════════════');
        
        return 0;
    }
    
    private function listBackupType($type, $title)
    {
        $path = "{$this->backupPath}/{$type}";
        
        $this->info($title);
        $this->info('─────────────────────────────────────────────────────────');
        
        if (!File::exists($path)) {
            $this->warn("  No backup directory found: {$path}");
            $this->newLine();
            return;
        }
        
        $files = collect(File::files($path))
            ->sortByDesc(function ($file) {
                return $file->getMTime();
            })
            ->values();
        
        if ($files->isEmpty()) {
            $this->warn('  No backups found');
            $this->newLine();
            return;
        }
        
        $headers = ['#', 'Filename', 'Size', 'Created', 'Age'];
        $rows = [];
        
        foreach ($files as $index => $file) {
            $mtime = Carbon::createFromTimestamp($file->getMTime());
            $age = $mtime->diffForHumans();
            
            $rows[] = [
                $index + 1,
                basename($file),
                $this->formatBytes($file->getSize()),
                $mtime->format('Y-m-d H:i:s'),
                $age
            ];
        }
        
        $this->table($headers, $rows);
        $this->info("  Total: {$files->count()} backup(s)");
        $this->newLine();
    }
    
    private function showStorageInfo()
    {
        $this->newLine();
        $this->info('STORAGE SUMMARY');
        $this->info('─────────────────────────────────────────────────────────');
        
        $types = ['daily', 'weekly', 'monthly'];
        $totalSize = 0;
        $totalFiles = 0;
        
        $rows = [];
        
        foreach ($types as $type) {
            $path = "{$this->backupPath}/{$type}";
            
            if (!File::exists($path)) {
                continue;
            }
            
            $files = collect(File::files($path));
            $size = $files->sum(function ($file) {
                return $file->getSize();
            });
            
            $count = $files->count();
            $totalSize += $size;
            $totalFiles += $count;
            
            $rows[] = [
                ucfirst($type),
                $count,
                $this->formatBytes($size)
            ];
        }
        
        $this->table(
            ['Type', 'Files', 'Size'],
            $rows
        );
        
        $this->info("  Total Files: {$totalFiles}");
        $this->info("  Total Storage: " . $this->formatBytes($totalSize));
        $this->newLine();
        
        // Show disk space
        $backupDrive = substr($this->backupPath, 0, 2);
        $freeSpace = disk_free_space($backupDrive);
        $totalSpace = disk_total_space($backupDrive);
        
        $this->info("  Drive {$backupDrive} Free Space: " . $this->formatBytes($freeSpace) . " / " . $this->formatBytes($totalSpace));
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