<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class RunPint extends Command
{
    protected $signature = 'code:pint 
                            {--dirty : Only run on modified files} 
                            {--commit : Auto-commit the Pint fixes}';

    protected $description = 'Run Laravel Pint with optional auto-commit fixes';

    public function handle()
    {
        $this->info('Checking if Laravel Pint is installed...');

        // Check if Pint exists
        if (! file_exists(base_path('vendor/bin/pint'))) {
            $this->error('❌ Pint is not installed. Run: composer require laravel/pint --dev');

            return Command::FAILURE;
        }

        // Print confirmation Pint is installed
        $this->info('✔ Pint is installed.');
        $this->info('Running Pint...');

        // Build Pint command
        $command = [base_path('vendor/bin/pint')];

        if ($this->option('dirty')) {
            $command[] = '--dirty';
        }

        // Run Pint
        $process = new Process($command);
        $process->setTimeout(null);
        $process->run(function ($type, $buffer) {
            echo $buffer;
        });

        if (! $process->isSuccessful()) {
            $this->error('❌ Pint failed.');

            return Command::FAILURE;
        }

        $this->info('✔ Pint fixes applied.');

        // Handle auto-commit
        if ($this->option('commit')) {
            $this->info('📦 Committing Pint fixes...');

            $gitAdd = new Process(['git', 'add', '.']);
            $gitAdd->run();

            $gitCommit = new Process([
                'git', 'commit', '-m', 'chore: apply Laravel Pint fixes',
            ]);
            $gitCommit->run();

            if ($gitCommit->isSuccessful()) {
                $this->info('✔ Fixes committed successfully.');
            } else {
                $this->warn('⚠ No changes to commit or git commit failed.');
            }
        }

        return Command::SUCCESS;
    }
}

/*
|--------------------------------------------------------------------------
| Available Flags for This Command
|--------------------------------------------------------------------------
|
| Use any of the following flags when running:
|
|   --dirty      Run Pint only on modified files
|   --commit     Auto-commit Pint fixes after running
|
|--------------------------------------------------------------------------
| Example Usage
|--------------------------------------------------------------------------
|
| Run Pint normally:
|   php artisan code:pint
|
| Run only on modified files:
|   php artisan code:pint --dirty
|
| Run Pint and automatically commit fixes:
|   php artisan code:pint --commit
|
| Combine flags:
|   php artisan code:pint --dirty --commit
|
*/
