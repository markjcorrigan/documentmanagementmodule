<?php

namespace App\Providers;

use App\Events\OurExampleEvent;
use App\Events\VisitorConnected;
use App\Listeners\OurExampleListener;
use App\Listeners\LogVisitorConnection;
use App\Listeners\SendNewUserNotification;
use App\Listeners\CloseVisitorSession; // ⭐ ADD THIS LINE
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Events\Logout; // ⭐ ADD THIS LINE
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        OurExampleEvent::class => [
            OurExampleListener::class,
        ],
        Registered::class => [
            SendEmailVerificationNotification::class,
            SendNewUserNotification::class,
        ],
        VisitorConnected::class => [
            LogVisitorConnection::class,
        ],
        // ⭐ ADD THIS NEW ENTRY
        Logout::class => [
            CloseVisitorSession::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return void
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}