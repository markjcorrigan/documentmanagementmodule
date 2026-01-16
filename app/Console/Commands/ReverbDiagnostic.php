<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class ReverbDiagnostic extends Command
{
    protected $signature = 'reverb:diagnostic';

    protected $description = 'Run comprehensive Reverb configuration diagnostics';

    public function handle(): int
    {
        $this->info('🔍 Reverb Configuration Diagnostics');
        $this->info('═══════════════════════════════════════════════════════════');
        $this->newLine();

        // Test 1: CLI Environment Variables
        $this->testCliEnvironment();
        $this->newLine();

        // Test 2: Config Values
        $this->testConfigValues();
        $this->newLine();

        // Test 3: Cache Status
        $this->testCacheStatus();
        $this->newLine();

        // Test 4: Broadcasting Configuration
        $this->testBroadcastingConfig();
        $this->newLine();

        // Test 5: File Permissions
        $this->testFilePermissions();
        $this->newLine();

        // Test 6: Reverb Server Status
        $this->testReverbServer();
        $this->newLine();

        // Summary and Recommendations
        $this->showSummary();

        return self::SUCCESS;
    }

    protected function testCliEnvironment(): void
    {
        $this->info('📋 TEST 1: CLI Environment Variables (.env)');
        $this->line('─────────────────────────────────────────');

        $envVars = [
            'BROADCAST_DRIVER' => env('BROADCAST_DRIVER'),
            'REVERB_APP_ID' => env('REVERB_APP_ID'),
            'REVERB_APP_KEY' => env('REVERB_APP_KEY'),
            'REVERB_APP_SECRET' => env('REVERB_APP_SECRET'),
            'REVERB_HOST' => env('REVERB_HOST'),
            'REVERB_PORT' => env('REVERB_PORT'),
            'REVERB_SCHEME' => env('REVERB_SCHEME'),
        ];

        $allPresent = true;
        foreach ($envVars as $key => $value) {
            if ($value === null) {
                $this->error("  ✗ {$key}: NULL (MISSING!)");
                $allPresent = false;
            } else {
                $maskedValue = in_array($key, ['REVERB_APP_SECRET', 'REVERB_APP_KEY'])
                    ? substr($value, 0, 4).'***'.substr($value, -4)
                    : $value;
                $this->info("  ✓ {$key}: {$maskedValue}");
            }
        }

        if ($allPresent) {
            $this->info('✅ All environment variables present in CLI context');
        } else {
            $this->error('❌ Some environment variables missing!');
        }
    }

    protected function testConfigValues(): void
    {
        $this->info('⚙️  TEST 2: Laravel Config Cache');
        $this->line('─────────────────────────────────────────');

        $configVars = [
            'broadcasting.default' => config('broadcasting.default'),
            'broadcasting.reverb.driver' => config('broadcasting.connections.reverb.driver'),
            'broadcasting.reverb.key' => config('broadcasting.connections.reverb.key'),
            'broadcasting.reverb.secret' => config('broadcasting.connections.reverb.secret'),
            'broadcasting.reverb.app_id' => config('broadcasting.connections.reverb.app_id'),
            'broadcasting.reverb.host' => config('broadcasting.connections.reverb.options.host'),
            'broadcasting.reverb.port' => config('broadcasting.connections.reverb.options.port'),
            'broadcasting.reverb.scheme' => config('broadcasting.connections.reverb.options.scheme'),
        ];

        $allPresent = true;
        foreach ($configVars as $key => $value) {
            if ($value === null) {
                $this->error("  ✗ {$key}: NULL (MISSING!)");
                $allPresent = false;
            } else {
                $maskedValue = (str_contains($key, 'secret') || str_contains($key, 'key'))
                    ? substr($value, 0, 4).'***'
                    : $value;
                $this->info("  ✓ {$key}: {$maskedValue}");
            }
        }

        if ($allPresent) {
            $this->info('✅ All config values present');
        } else {
            $this->error('❌ Some config values missing - config cache may be stale!');
            $this->warn('   Run: php artisan config:clear && restart Apache');
        }
    }

    protected function testCacheStatus(): void
    {
        $this->info('💾 TEST 3: Cache File Status');
        $this->line('─────────────────────────────────────────');

        $cacheFiles = [
            'Config Cache' => base_path('bootstrap/cache/config.php'),
            'Routes Cache' => base_path('bootstrap/cache/routes-v7.php'),
            'Events Cache' => base_path('bootstrap/cache/events.php'),
        ];

        foreach ($cacheFiles as $name => $file) {
            if (file_exists($file)) {
                $timestamp = date('Y-m-d H:i:s', filemtime($file));
                $this->warn("  ⚠  {$name}: EXISTS (created {$timestamp})");
            } else {
                $this->info("  ✓ {$name}: Not cached (good for debugging)");
            }
        }

        $this->newLine();
        $this->comment('  💡 TIP: On development, cache files should NOT exist');
        $this->comment('     If config.php exists, run: php artisan config:clear');
    }

    protected function testBroadcastingConfig(): void
    {
        $this->info('📡 TEST 4: Broadcasting Configuration Check');
        $this->line('─────────────────────────────────────────');

        $driver = config('broadcasting.default');
        $this->line("  Default driver: {$driver}");

        if ($driver !== 'reverb') {
            $this->error("  ✗ Driver should be 'reverb' but is '{$driver}'");
        } else {
            $this->info('  ✓ Driver correctly set to reverb');
        }

        // Check if broadcasting service provider is registered
        $providers = config('app.providers', []);
        $broadcastProvider = 'App\Providers\BroadcastServiceProvider';
        
        if (in_array($broadcastProvider, $providers)) {
            $this->info('  ✓ BroadcastServiceProvider registered');
        } else {
            $this->error('  ✗ BroadcastServiceProvider NOT in config/app.php');
        }
    }

    protected function testFilePermissions(): void
    {
        $this->info('🔒 TEST 5: File Permissions');
        $this->line('─────────────────────────────────────────');

        $envFile = base_path('.env');
        
        if (!file_exists($envFile)) {
            $this->error('  ✗ .env file not found!');
            return;
        }

        $this->info("  ✓ .env file exists");
        
        if (is_readable($envFile)) {
            $this->info('  ✓ .env file is readable');
        } else {
            $this->error('  ✗ .env file is NOT readable by PHP!');
            $this->warn('    Run: chmod 644 .env');
        }

        // Check for BOM
        $contents = file_get_contents($envFile);
        if (substr($contents, 0, 3) === "\xEF\xBB\xBF") {
            $this->error('  ✗ .env file has UTF-8 BOM (this can cause parsing issues)');
            $this->warn('    Re-save .env without BOM using a text editor');
        } else {
            $this->info('  ✓ .env file has no BOM');
        }
    }

    protected function testReverbServer(): void
    {
        $this->info('🌐 TEST 6: Reverb Server Status (Optional)');
        $this->line('─────────────────────────────────────────');

        $host = env('REVERB_HOST', '127.0.0.1');
        $port = env('REVERB_PORT', 8080);
        $url = "http://{$host}:{$port}/app/".env('REVERB_APP_KEY');

        try {
            $response = Http::timeout(3)->get($url);
            
            if ($response->successful()) {
                $this->info('  ✓ Reverb HTTP endpoint is responding');
            } else {
                $this->comment("  ℹ  HTTP health check returned {$response->status()} (this is OK)");
                $this->comment('     WebSocket connections (chat) can still work fine');
            }
        } catch (\Exception $e) {
            $this->error('  ✗ Cannot connect to Reverb server');
            $this->warn('    Is Reverb running? Check: pm2 status');
            $this->warn('    If PM2 shows "online", WebSockets still work');
        }
    }

    protected function showSummary(): void
    {
        $this->info('📊 SUMMARY & RECOMMENDATIONS');
        $this->info('═══════════════════════════════════════════════════════════');
        $this->newLine();

        // Check if config values match env values
        $envKey = env('REVERB_APP_KEY');
        $configKey = config('broadcasting.connections.reverb.key');

        if ($envKey !== $configKey) {
            $this->error('🚨 CRITICAL ISSUE DETECTED:');
            $this->error('   CLI (.env) values DO NOT match Config cache values');
            $this->error('   This means web requests see different config than CLI!');
            $this->newLine();
            $this->warn('🔧 FIX:');
            $this->warn('   1. php artisan config:clear');
            $this->warn('   2. Restart Apache/XAMPP');
            $this->warn('   3. Run this diagnostic again');
        } else {
            $this->info('✅ CLI and Config values match');
            $this->newLine();
            $this->comment('💡 If chat works in browser, everything is fine!');
            $this->comment('   The HTTP health check status above is informational only.');
            $this->newLine();
            $this->comment('   If you have actual chat issues:');
            $this->comment('   1. Check: pm2 status (should show "online")');
            $this->comment('   2. Test: https://pmway.hopto.org/chat');
            $this->comment('   3. Browser console (F12) for WebSocket errors');
            $this->comment('   4. PM2 logs: pm2 logs laravel-reverb');
        }

        $this->newLine();
        $this->info('🔄 Quick Fix Commands:');
        $this->line('   php artisan optimize:clear');
        $this->line('   [Restart Apache/XAMPP]');
        $this->line('   pm2 restart laravel-reverb');
        $this->line('   php artisan reverb:diagnostic  # Run this again');
        $this->newLine();
        $this->info('📋 Check Reverb is Actually Working:');
        $this->line('   pm2 status  # Should show "online"');
        $this->line('   pm2 logs laravel-reverb --out --lines 20 --nostream');
        $this->comment('   Should show: "Starting server on 127.0.0.1:8080"');
    }
}
