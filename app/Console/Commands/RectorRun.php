<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class RectorRun extends Command
{
    protected $signature = 'rector:run';
    protected $description = 'Run Rector to automatically fix your PHP code';

    public function handle()
    {
        $this->info('Running Rector to apply changes...');

        $process = new Process([
            base_path('vendor/bin/rector'),
            'process'
        ]);
        $process->setTimeout(null);
        $process->run(function ($type, $buffer) {
            echo $buffer;
        });

        if ($process->isSuccessful()) {
            $this->info("\n✔ Rector successfully applied changes.");
        } else {
            $this->error("\n❌ Rector encountered errors. Restore your backup if necessary.");
        }

        return Command::SUCCESS;
    }
}
