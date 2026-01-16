<?php

namespace App\Console\Commands;

use App\Models\VisitorLog;
use Illuminate\Console\Command;

class CloseInactiveSessions extends Command
{
    protected $signature = 'visitors:close-inactive {--minutes=30}';
    protected $description = 'Close visitor sessions that have been inactive';

    public function handle()
    {
        $minutes = $this->option('minutes');
        $cutoff = now()->subMinutes($minutes);

        $closed = VisitorLog::whereNull('disconnected_at')
            ->where('updated_at', '<', $cutoff)
            ->update([
                'disconnected_at' => $cutoff
            ]);

        $this->info("Closed {$closed} inactive sessions (inactive for {$minutes}+ minutes)");
    }
}