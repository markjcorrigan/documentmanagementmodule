<?php

namespace App\Listeners;

use App\Notifications\NewUserRegistered;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Notification;

class SendNewUserNotification
{
    public function handle(Registered $event): void
    {
        // Send notification to admin email
        Notification::route('mail', config('mail.admin_email'))
            ->notify(new NewUserRegistered($event->user));
    }
}
