<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class RectorCheck extends Command
{
    protected $signature = 'rector:check';
    protected $description = 'Run Rector in dry-run mode and report files that would be changed';

    public function handle()
    {
        $this->info('Running Rector in dry-run mode...');

        $process = new Process([
            base_path('vendor/bin/rector'),
            'process',
            '--dry-run'
        ]);
        $process->setTimeout(null);
        $process->run(function ($type, $buffer) {
            echo $buffer;
        });

        if ($process->isSuccessful()) {
            $this->info("\n✔ Rector dry-run completed. No fatal errors detected.");
        } else {
            $this->warn("\n⚠ Rector dry-run detected issues or errors.");
        }

        return Command::SUCCESS;
    }
}
