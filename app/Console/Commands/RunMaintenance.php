<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class RunMaintenance extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'system:maintenance {--skip-npm : Skip npm install and build}';

    /**
     * The console command description.
     */
    protected $description = 'Run a full Laravel optimization and cleanup sequence including composer and npm.';

    /**
     * Command timeout in seconds (15 minutes for npm)
     */
    protected $timeout = 900;

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $isProduction = app()->environment('production');
        $environment = $isProduction ? 'PRODUCTION' : 'DEVELOPMENT';

        $this->info("🚀 Starting Laravel optimization routine [{$environment}]...");
        $this->newLine();

        // CRITICAL WARNING
        $this->alert('⚠️  IMPORTANT: You MUST restart Apache/XAMPP after this completes!');
        $this->warn('   Without restart, web requests will use OLD cached config.');
        $this->warn('   Run diagnostic after: php artisan reverb:diagnostic');
        $this->newLine();

        if (!$this->confirm('Do you want to continue?', true)) {
            $this->info('Maintenance cancelled.');
            return self::SUCCESS;
        }

        // Phase 0: Storage cleanup (safe for both dev and prod)
        $this->info('🧹 Cleaning storage directories...');
        $this->cleanStorage();
        $this->newLine();

        // Phase 0.5: Nuclear cache clearing (BEFORE composer/npm)
        $this->info('💣 Nuclear cache clear (bootstrap cache)...');
        $this->nuclearCacheClear();
        $this->newLine();

        // Phase 1: Dependency updates
        $composerCommand = $isProduction
            ? 'composer install --no-dev --optimize-autoloader'
            : 'composer install';

        $dependencyCommands = [$composerCommand];

        // Add npm commands unless --skip-npm flag is used
        if (! $this->option('skip-npm')) {
            $this->warn('⚠️  npm build will clear browser storage (may log you out of websites)');
            $dependencyCommands[] = 'npm install';
            $dependencyCommands[] = 'npm run build';
        } else {
            $this->warn('⚠️  Skipping npm install and build (--skip-npm flag detected)');
        }

        // Phase 2: Laravel optimization - SAFE VERSION (no config caching)
        $optimizationCommands = [
            'php artisan optimize:clear',      // Clears config, route, view, cache
            'php artisan clear-compiled',
            'php artisan event:clear',
        ];

        $optimizationCommands = array_merge($optimizationCommands, [
            'composer dump-autoload -o',
            'php artisan package:discover --ansi',
        ]);

        // SAFE OPTIMIZATION - Only cache routes and views, NOT config
        if ($isProduction) {
            $this->info('🔧 Running safe optimization (caching routes/views only)...');
            $optimizationCommands = array_merge($optimizationCommands, [
                'php artisan route:cache',   // Safe to cache
                'php artisan view:cache',    // Safe to cache
            ]);
        }

        $allCommands = array_merge($dependencyCommands, $optimizationCommands);

        // Add progress bar
        $progressBar = $this->output->createProgressBar(count($allCommands));
        $progressBar->start();

        foreach ($allCommands as $command) {
            $this->line("\n╔══════════════════════════════");
            $this->line("  Running: {$command}");
            $this->line("╚══════════════════════════════\n");

            $process = Process::fromShellCommandline($command, base_path());
            $process->setTimeout($this->timeout);

            $process->run(function ($type, $buffer) {
                echo $buffer;
            });

            if (! $process->isSuccessful()) {
                $this->error("❌ Command failed: {$command}");
                $this->error($process->getErrorOutput());

                // Don't fail completely if npm build fails
                if (str_contains($command, 'npm')) {
                    $this->warn('⚠️  Continuing despite npm error...');
                    $progressBar->advance();
                    $this->newLine();

                    continue;
                }

                return self::FAILURE;
            }

            $this->info("✅ Completed: {$command}");
            $progressBar->advance();
            $this->newLine();
        }

        $progressBar->finish();
        $this->newLine(2);

        // One final cache clear after everything
        $this->info('🔄 Final cache clear...');
        $this->call('optimize:clear');
        $this->newLine();

        $this->info('🎯 All optimization tasks completed successfully!');
        $this->info('✅ Sessions preserved - users will remain logged in');
        $this->newLine();

        // CRITICAL NEXT STEPS
        $this->alert('🚨 CRITICAL NEXT STEPS - DO NOT SKIP! 🚨');
        $this->newLine();

        $this->warn('1️⃣  RESTART APACHE/XAMPP NOW');
        $this->line('   • Stop Apache in XAMPP Control Panel');
        $this->line('   • Wait 5 seconds');
        $this->line('   • Start Apache');
        $this->newLine();

        $this->warn('2️⃣  RESTART REVERB (if using PM2)');
        $this->line('   pm2 restart laravel-reverb');
        $this->line('   pm2 save');
        $this->newLine();

        $this->warn('3️⃣  RUN DIAGNOSTICS');
        $this->line('   php artisan reverb:diagnostic');
        $this->newLine();

        $this->info('4️⃣  OTHER PM2 COMMANDS (optional)');
        $this->line('   pm2 status                          # Check status');
        $this->line('   pm2 logs laravel-reverb --lines 20  # View logs');
        $this->newLine();

        return self::SUCCESS;
    }

    /**
     * Nuclear cache clearing - removes ALL cache files physically
     */
    protected function nuclearCacheClear(): void
    {
        $this->line('  Removing bootstrap cache files...');

        $bootstrapCache = base_path('bootstrap/cache');
        $cacheFiles = [
            $bootstrapCache . '/config.php',
            $bootstrapCache . '/routes-v7.php',
            $bootstrapCache . '/events.php',
            $bootstrapCache . '/packages.php',
            $bootstrapCache . '/services.php',
        ];

        foreach ($cacheFiles as $file) {
            if (file_exists($file)) {
                if (unlink($file)) {
                    $this->info("  ✓ Deleted: " . basename($file));
                } else {
                    $this->warn("  ⚠  Could not delete: " . basename($file));
                }
            }
        }

        // Also clear framework cache
        $frameworkCachePath = storage_path('framework/cache/data');
        if (is_dir($frameworkCachePath)) {
            if (PHP_OS_FAMILY === 'Windows') {
                $command = 'del /f /q ' . str_replace('/', '\\', $frameworkCachePath) . '\\* 2>nul';
            } else {
                $command = 'rm -rf ' . $frameworkCachePath . '/* 2>/dev/null';
            }

            $process = Process::fromShellCommandline($command, base_path());
            $process->run();

            if ($process->isSuccessful()) {
                $this->info('  ✓ Cleared framework cache directory');
            }
        }
    }

    /**
     * Check if an artisan command exists.
     */
    protected function commandExists(string $command): bool
    {
        try {
            // Method 1: Check if command is registered in the application
            $artisan = $this->getApplication();
            if ($artisan->has($command)) {
                return true;
            }

            // Method 2: Try to run help command for the specific command
            $process = Process::fromShellCommandline("php artisan {$command} --help", base_path());
            $process->setTimeout(10);
            $process->run();

            return $process->isSuccessful();

        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Clean storage directories - removes logs and cache safely.
     * NOTE: Sessions are NOT cleaned to preserve user logins and Livewire state.
     */
    protected function cleanStorage(): void
    {
        $storagePath = storage_path();

        $cleanDirs = [
            'logs' => $storagePath.'/logs/*.log',
            'framework/cache/data' => $storagePath.'/framework/cache/data/*',
            // REMOVED: Sessions cleanup - this was causing logout issues and Livewire errors
            // Laravel handles session expiry automatically via garbage collection
            'framework/views' => $storagePath.'/framework/views/*',
        ];

        foreach ($cleanDirs as $name => $pattern) {
            $this->line("  Cleaning {$name}...");

            if (PHP_OS_FAMILY === 'Windows') {
                $command = 'del /f /q '.str_replace('/', '\\', $pattern).' 2>nul';
            } else {
                $command = 'rm -f '.$pattern.' 2>/dev/null';
            }

            $process = Process::fromShellCommandline($command, base_path());
            $process->run();

            if ($process->isSuccessful() || $process->getExitCode() === 1) {
                $this->info("  ✓ Cleaned {$name}");
            } else {
                $this->warn("  ⚠   Could not clean {$name} (may not exist)");
            }
        }

        // Recreate laravel.log
        $logFile = $storagePath.'/logs/laravel.log';
        if (! file_exists($logFile)) {
            touch($logFile);
            $this->info('  ✓ Created fresh laravel.log');
        }
    }
}