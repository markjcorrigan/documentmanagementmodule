<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ToggleMaintenance extends Command
{
    protected $signature = 'app:toggle-maintenance';

    protected $description = 'Toggle website maintenance mode on or off';

    public function handle()
    {
        $choice = $this->choice(
            'Do you want to put the website into maintenance mode or bring it back online?',
            ['Maintenance Mode', 'Bring Online'],
            0
        );

        if ($choice === 'Maintenance Mode') {
            $this->call('down');
            $this->info('Website is now in maintenance mode.');
        } else {
            $this->call('up');
            $this->info('Website is now online.');
        }

        return self::SUCCESS;
    }
}
