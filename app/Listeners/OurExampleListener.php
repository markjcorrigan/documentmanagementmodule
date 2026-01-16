<?php

namespace App\Listeners;

use App\Events\OurExampleEvent;
use Illuminate\Support\Facades\Log;

class OurExampleListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @return void
     */
    public function handle(OurExampleEvent $event)
    {
        Log::debug("The user {$event->name} just performed {$event->action}");
    }
}
