<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class RunMaintenanceSimple extends Command
{
    protected $signature = 'system:maintenance-simple {--with-npm : Include npm (will clear browser data)}';

    protected $description = 'Quick Laravel cleanup (skips npm to keep you logged in)';

    protected $timeout = 900;

    public function handle(): int
    {
        $this->info('🚀 Starting Laravel cleanup...');
        $this->newLine();

        // Essential cleanup only - NO npm unless explicitly requested
        $commands = [
            'php artisan optimize:clear',
            'php artisan view:clear',
            'composer dump-autoload -o',
        ];

        // Only add npm if explicitly requested
        if ($this->option('with-npm')) {
            $this->warn('⚠️  Including npm (WILL clear browser data and log you out of sites)');
            array_push($commands, 'npm install', 'npm run build');
        } else {
            $this->info('✅ Skipping npm to preserve your logins');
        }

        foreach ($commands as $command) {
            $this->line("Running: {$command}");

            $process = Process::fromShellCommandline($command, base_path());
            $process->setTimeout($this->timeout);
            $process->run(function ($type, $buffer) {
                echo $buffer;
            });

            if (! $process->isSuccessful() && ! str_contains($command, 'npm')) {
                $this->error("❌ Failed: {$command}");

                return self::FAILURE;
            }

            $this->info("✅ Done\n");
        }

        $this->info('🎯 Cleanup complete!');
        $this->info('✅ Sessions preserved - you stay logged in');
        $this->newLine();

        $this->warn('📝 If you made JavaScript changes, run with --with-npm flag');
        $this->warn('📝 Reverb status: pm2 status');
        $this->warn('📝 Restart Reverb: pm2 restart laravel-reverb');

        return self::SUCCESS;
    }
}
