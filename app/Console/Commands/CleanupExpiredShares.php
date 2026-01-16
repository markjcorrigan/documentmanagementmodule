<?php

namespace App\Console\Commands;

use App\Models\Note;
use App\Models\NoteAttachment;
use App\Models\NoteShare;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class CleanupExpiredShares extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'notes:cleanup-shares';

    /**
     * The console command description.
     */
    protected $description = 'Remove expired note shares';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Cleaning up expired note shares...');

        $expiredShares = NoteShare::where('expires_at', '<', now())->get();
        $count = $expiredShares->count();

        foreach ($expiredShares as $share) {
            $this->line("Removing expired share for note #{$share->note_id}");
            $share->delete();
        }

        $this->info("Removed {$count} expired share(s).");

        return Command::SUCCESS;
    }
}

class ReindexNotes extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'notes:reindex {--queue : Queue the indexing}';

    /**
     * The console command description.
     */
    protected $description = 'Reindex all notes for search';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Reindexing all notes...');

        if ($this->option('queue')) {
            $this->call('scout:import', [
                'model' => 'App\Models\Note',
                '--queue' => true,
            ]);
            $this->info('Notes queued for indexing.');
        } else {
            $this->call('scout:import', [
                'model' => 'App\Models\Note',
            ]);
            $this->info('Notes reindexed successfully.');
        }

        return Command::SUCCESS;
    }
}

class CleanupOrphanedFiles extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'notes:cleanup-files {--dry-run : Show what would be deleted without actually deleting}';

    /**
     * The console command description.
     */
    protected $description = 'Remove orphaned files from storage';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Scanning for orphaned files...');
        $dryRun = $this->option('dry-run');

        if ($dryRun) {
            $this->warn('DRY RUN MODE - No files will be deleted');
        }

        $deletedCount = 0;
        $deletedSize = 0;

        // Get all attachment records
        $attachmentPaths = NoteAttachment::pluck('path')->toArray();

        // Check images directory
        $this->info('Checking images directory...');
        $imageFiles = Storage::disk('public')->files('images');

        foreach ($imageFiles as $file) {
            if (! in_array($file, $attachmentPaths)) {
                $size = Storage::disk('public')->size($file);
                $deletedSize += $size;

                $this->line("Orphaned: {$file} (".$this->formatBytes($size).')');

                if (! $dryRun) {
                    Storage::disk('public')->delete($file);
                    $deletedCount++;
                }
            }
        }

        // Check documents directory
        $this->info('Checking documents directory...');
        $documentFiles = Storage::disk('public')->files('documents');

        foreach ($documentFiles as $file) {
            if (! in_array($file, $attachmentPaths)) {
                $size = Storage::disk('public')->size($file);
                $deletedSize += $size;

                $this->line("Orphaned: {$file} (".$this->formatBytes($size).')');

                if (! $dryRun) {
                    Storage::disk('public')->delete($file);
                    $deletedCount++;
                }
            }
        }

        if ($dryRun) {
            $this->info("Would delete {$deletedCount} file(s), freeing ".$this->formatBytes($deletedSize));
        } else {
            $this->info("Deleted {$deletedCount} orphaned file(s), freed ".$this->formatBytes($deletedSize));
        }

        return Command::SUCCESS;
    }

    private function formatBytes($bytes, $precision = 2)
    {
        $units = ['B', 'KB', 'MB', 'GB'];
        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);
        $bytes /= (1 << (10 * $pow));

        return round($bytes, $precision).' '.$units[$pow];
    }
}

class NotesStatistics extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'notes:stats {--user= : Show stats for specific user ID}';

    /**
     * The console command description.
     */
    protected $description = 'Display notes system statistics';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $userId = $this->option('user');

        $this->info('📊 Notes System Statistics');
        $this->newLine();

        // Total notes
        $totalNotes = $userId
            ? Note::where('user_id', $userId)->count()
            : Note::count();
        $this->line("Total Notes: <info>{$totalNotes}</info>");

        // Pinned notes
        $pinnedNotes = $userId
            ? Note::where('user_id', $userId)->where('is_pinned', true)->count()
            : Note::where('is_pinned', true)->count();
        $this->line("Pinned Notes: <info>{$pinnedNotes}</info>");

        // Notes with attachments
        $notesWithFiles = $userId
            ? Note::where('user_id', $userId)->has('attachments')->count()
            : Note::has('attachments')->count();
        $this->line("Notes with Attachments: <info>{$notesWithFiles}</info>");

        // Total attachments
        $totalAttachments = $userId
            ? NoteAttachment::whereHas('note', fn ($q) => $q->where('user_id', $userId))->count()
            : NoteAttachment::count();
        $this->line("Total Attachments: <info>{$totalAttachments}</info>");

        // Storage used
        $storageUsed = $userId
            ? NoteAttachment::whereHas('note', fn ($q) => $q->where('user_id', $userId))->sum('size')
            : NoteAttachment::sum('size');
        $this->line('Storage Used: <info>'.$this->formatBytes($storageUsed).'</info>');

        // Active shares
        $activeShares = $userId
            ? NoteShare::where('shared_by', $userId)->orWhere('shared_with', $userId)->active()->count()
            : NoteShare::active()->count();
        $this->line("Active Shares: <info>{$activeShares}</info>");

        // Categories
        $totalCategories = $userId
            ? \App\Models\Category::where('user_id', $userId)->count()
            : \App\Models\Category::count();
        $this->line("Categories: <info>{$totalCategories}</info>");

        // Tags
        $totalTags = $userId
            ? \App\Models\Tag::where('user_id', $userId)->count()
            : \App\Models\Tag::count();
        $this->line("Tags: <info>{$totalTags}</info>");

        // Templates
        $totalTemplates = $userId
            ? \App\Models\NoteTemplate::where('user_id', $userId)->count()
            : \App\Models\NoteTemplate::count();
        $this->line("Templates: <info>{$totalTemplates}</info>");

        $this->newLine();

        // Most active users (if not filtering by user)
        if (! $userId) {
            $this->info('🏆 Top 5 Most Active Users:');
            $topUsers = Note::selectRaw('user_id, users.name, COUNT(*) as note_count')
                ->join('users', 'notes.user_id', '=', 'users.id')
                ->groupBy('user_id', 'users.name')
                ->orderByDesc('note_count')
                ->limit(5)
                ->get();

            foreach ($topUsers as $user) {
                $this->line("  {$user->name}: <info>{$user->note_count} notes</info>");
            }
        }

        return Command::SUCCESS;
    }

    private function formatBytes($bytes, $precision = 2)
    {
        $units = ['B', 'KB', 'MB', 'GB'];
        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);
        $bytes /= (1 << (10 * $pow));

        return round($bytes, $precision).' '.$units[$pow];
    }
}
