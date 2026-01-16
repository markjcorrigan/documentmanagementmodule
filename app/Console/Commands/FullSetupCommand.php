<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

/**
 * FullSetupCommand
 *
 * This command runs a full setup of the application:
 * 1. Creates a user or super admin
 * 2. Rebuilds the documents table
 * 3. Rebuilds the images table
 *
 * Usage:
 * php artisan app:full-setup           // Run with prompts
 * php artisan app:full-setup --force   // Skip confirmations for rebuilds
 * php artisan app:full-setup --max-logs=20   // Customize max log files to keep
 */
class FullSetupCommand extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'app:full-setup
                            {--force : Skip confirmations for rebuilds}
                            {--max-logs=10 : Maximum number of rebuild logs to keep}';

    /**
     * The console command description.
     */
    protected $description = 'Run full setup: create super admin, rebuild documents and images tables';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->info('Starting full setup...');

        // 1. Run create user command
        $this->info('Step 1: Create user / super admin');
        $this->call('app:create-user');

        // 2. Rebuild documents
        $this->info('Step 2: Rebuilding documents table');
        $this->call('documents:rebuild', [
            '--force' => $this->option('force'),
            '--max-logs' => $this->option('max-logs'),
        ]);

        // 3. Rebuild images
        $this->info('Step 3: Rebuilding images table');
        $this->call('images:rebuild', [
            '--force' => $this->option('force'),
            '--max-logs' => $this->option('max-logs'),
        ]);

        $this->info('Full setup complete!');

        return Command::SUCCESS;
    }
}
