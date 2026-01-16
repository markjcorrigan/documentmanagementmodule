<?php

namespace App\Listeners;

use App\Events\VisitorConnected;
use App\Models\VisitorLog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogVisitorConnection
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(VisitorConnected $event): void
    {
        // Create a log entry in the database
        VisitorLog::create([
            'user_id' => $event->userId,
            'username' => $event->username,
            'ip_address' => $event->ipAddress,
            'user_agent' => $event->userAgent,
            'page_url' => $event->pageUrl,
            'connected_at' => now(),
        ]);
    }
}