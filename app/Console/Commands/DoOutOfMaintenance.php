<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class DoOutOfMaintenance extends Command
{
    protected $signature = 'maintenance:up';

    protected $description = 'Bring the site out of maintenance mode';

    public function handle()
    {
        Artisan::call('up');

        $this->newLine();
        $this->info('✅ Site is now LIVE!');
        $this->newLine();

        return Command::SUCCESS;
    }
}
