<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class DownWithBypass extends Command
{
    protected $signature = 'maintenance:down';

    protected $description = 'Put the site into maintenance mode with bypass token';

    public function handle()
    {
        $secret = 'maintenance2024';

        // Call Laravel's native down command
        Artisan::call('down', [
            '--secret' => $secret,
            '--retry' => 3600,
        ]);

        $url = config('app.url').'/'.$secret;

        $this->newLine();
        $this->info('🔧 Site is now in maintenance mode!');
        $this->newLine();
        $this->line('To bypass maintenance mode, visit:');
        $this->line('👉 '.$url);
        $this->newLine();
        $this->line('To bring site back up, run: php artisan maintenance:up');
        $this->newLine();

        return Command::SUCCESS;
    }
}
