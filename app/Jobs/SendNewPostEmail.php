<?php

namespace App\Jobs;

use App\Mail\NewPostEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendNewPostEmail implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public $incoming;

    /**
     * Create a new job instance.
     */
    public function __construct($incoming)
    {
        $this->incoming = $incoming;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->incoming['sendTo'])->send(new NewPostEmail(['name' => $this->incoming['name'], 'post_title' => $this->incoming['post_title']]));  // sends relatively fast but not jobs table

        // Mail::to($this->incoming['sendTo'])->queue((new NewPostEmail(['name' => $this->incoming['name'], 'title' => $this->incoming['title']]))->onConnection('database'));  //php artisan queue:work database

    }
}
