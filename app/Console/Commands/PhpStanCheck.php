<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class PhpStanCheck extends Command
{
    protected $signature = 'phpstan:check
                            {--level=8 : PHPStan analysis level (0-8)}
                            {--paths=app,routes,database : Comma-separated paths to scan}';

    protected $description = 'Run PHPStan to analyze PHP code for errors';

    public function handle()
    {
        $this->info('Running PHPStan...');

        // Build paths argument
        $paths = explode(',', $this->option('paths'));

        $command = [
            base_path('vendor/bin/phpstan'),
            'analyse',
            ...$paths,
            '--level=' . $this->option('level')
        ];

        $process = new Process($command);
        $process->setTimeout(null);
        $process->run(function ($type, $buffer) {
            echo $buffer;
        });

        if ($process->isSuccessful()) {
            $this->info("\n✔ PHPStan completed successfully. No errors found.");
        } else {
            $this->warn("\n⚠ PHPStan detected issues.");
        }

        return Command::SUCCESS;
    }
}
