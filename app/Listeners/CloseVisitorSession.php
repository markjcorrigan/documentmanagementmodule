<?php

namespace App\Listeners;

use App\Models\VisitorLog;
use Illuminate\Auth\Events\Logout;

class CloseVisitorSession
{
    public function handle(Logout $event)
    {
        if (!$event->user) {
            return;
        }

        // Find and close the user's active session
        VisitorLog::where('username', $event->user->name)
            ->whereNull('disconnected_at')
            ->update([
                'disconnected_at' => now(),
            ]);
    }
}