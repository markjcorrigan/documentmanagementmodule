<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class CacheNuke extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'cache:nuke';

    /**
     * The console command description.
     */
    protected $description = 'Nuclear option - clears ALL caches (Laravel, config, routes, views, compiled, OPcache)';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('🧹 NUCLEAR CACHE CLEAR - This will clear EVERYTHING');
        $this->newLine();

        // 1. Laravel caches
        $this->warn('Clearing Laravel caches...');
        Artisan::call('cache:clear');
        $this->line('  ✓ Application cache cleared');

        Artisan::call('config:clear');
        $this->line('  ✓ Config cache cleared');

        Artisan::call('route:clear');
        $this->line('  ✓ Route cache cleared');

        Artisan::call('view:clear');
        $this->line('  ✓ View cache cleared');

        Artisan::call('event:clear');
        $this->line('  ✓ Event cache cleared');

        $this->newLine();

        // 2. Delete cached files manually
        $this->warn('Deleting cached files...');

        // Delete bootstrap cache files (except .gitignore)
        $bootstrapCache = base_path('bootstrap/cache');
        if (File::exists($bootstrapCache)) {
            $files = File::files($bootstrapCache);
            foreach ($files as $file) {
                if ($file->getFilename() !== '.gitignore') {
                    File::delete($file);
                }
            }
            $this->line('  ✓ Bootstrap cache files deleted');
        }

        // Clear framework cache data
        $cacheData = storage_path('framework/cache/data');
        if (File::exists($cacheData)) {
            File::cleanDirectory($cacheData);
            $this->line('  ✓ Framework cache data cleared');
        }

        // Clear compiled views
        $views = storage_path('framework/views');
        if (File::exists($views)) {
            File::cleanDirectory($views);
            $this->line('  ✓ Compiled views cleared');
        }

        $this->newLine();

        // 3. Clear compiled classes
        $this->warn('Clearing compiled classes...');
        Artisan::call('clear-compiled');
        $this->line('  ✓ Compiled classes cleared');

        $this->newLine();

        // 4. Rebuild autoloader
        $this->warn('Rebuilding autoloader...');
        exec('composer dump-autoload 2>&1', $output, $returnCode);
        if ($returnCode === 0) {
            $this->line('  ✓ Autoloader rebuilt');
        } else {
            $this->error('  ✗ Failed to rebuild autoloader');
        }

        $this->newLine();

        // 5. Clear OPcache (if installed)
        if (function_exists('opcache_reset')) {
            $this->warn('Clearing OPcache...');
            opcache_reset();
            $this->line('  ✓ OPcache cleared');
            $this->newLine();
        }

        $this->newLine();
        $this->info('✅ All caches cleared!');
        $this->newLine();

        $this->warn('⚠️  NOW YOU MUST:');
        $this->line('1. Restart Apache in XAMPP Control Panel');
        $this->line('2. Run: pm2 restart laravel-reverb');
        $this->line('3. Hard refresh browser (Ctrl+Shift+R)');
        $this->line('4. Run: npm run build (if you changed JS files)');

        $this->newLine();

        return Command::SUCCESS;
    }
}
