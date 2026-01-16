<?php

/**
 * Test Current Broadcast Configuration
 *
 * Run: php test-broadcast-config.php
 *
 * Quickly shows what Laravel thinks the broadcast driver is
 */

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "=== BROADCAST CONFIGURATION TEST ===\n\n";

// Get the broadcast manager
$broadcastManager = app('Illuminate\Contracts\Broadcasting\Factory');

// Get default driver name
$defaultDriver = config('broadcasting.default');
echo "Default Broadcast Driver: $defaultDriver\n\n";

// Get the actual driver instance
try {
    $driver = $broadcastManager->driver();
    $driverClass = get_class($driver);
    echo "Driver Class: $driverClass\n\n";

    // Check if it's Reverb/Pusher
    if (strpos($driverClass, 'Pusher') !== false) {
        echo "✓ Using Pusher/Reverb driver\n";

        // Get Pusher configuration
        $config = config("broadcasting.connections.$defaultDriver");
        echo "\nConfiguration:\n";
        echo '  Key: '.($config['key'] ?? 'NOT SET')."\n";
        echo '  Secret: '.(isset($config['secret']) ? '***HIDDEN***' : 'NOT SET')."\n";
        echo '  App ID: '.($config['app_id'] ?? 'NOT SET')."\n";

        if (isset($config['options'])) {
            echo "\nOptions:\n";
            echo '  Host: '.($config['options']['host'] ?? 'NOT SET')."\n";
            echo '  Port: '.($config['options']['port'] ?? 'NOT SET')."\n";
            echo '  Scheme: '.($config['options']['scheme'] ?? 'NOT SET')."\n";
            echo '  Encrypted: '.(($config['options']['encrypted'] ?? false) ? 'true' : 'false')."\n";

            if (isset($config['options']['curl_options'])) {
                echo "\n  Curl Options:\n";
                foreach ($config['options']['curl_options'] as $key => $value) {
                    echo '    CURLOPT_'.constant('CURLOPT_'.$key).": $value\n";
                }
            }
        }

    } else {
        echo "⚠️  Using non-Pusher driver: $driverClass\n";
    }

} catch (\Exception $e) {
    echo '✗ ERROR: '.$e->getMessage()."\n";
}

echo "\n--- ENVIRONMENT VARIABLES ---\n";
echo 'BROADCAST_DRIVER='.env('BROADCAST_DRIVER')."\n";
echo 'PUSHER_HOST='.env('PUSHER_HOST')."\n";
echo 'PUSHER_PORT='.env('PUSHER_PORT')."\n";
echo 'REVERB_HOST='.env('REVERB_HOST')."\n";
echo 'REVERB_PORT='.env('REVERB_PORT')."\n";

echo "\n--- COMPARISON ---\n";
if (config('broadcasting.default') === 'pusher') {
    echo "Using 'pusher' connection which points to:\n";
    echo '  '.env('PUSHER_HOST').':'.env('PUSHER_PORT')."\n";

    if (env('PUSHER_HOST') === env('REVERB_HOST') && env('PUSHER_PORT') === env('REVERB_PORT')) {
        echo "\n✓ PUSHER and REVERB point to same endpoint\n";
        echo "  This is correct for Laravel Reverb!\n";
    } else {
        echo "\n⚠️  WARNING: PUSHER and REVERB point to different endpoints!\n";
    }
} elseif (config('broadcasting.default') === 'reverb') {
    echo "Using 'reverb' connection which points to:\n";
    echo '  '.env('REVERB_HOST').':'.env('REVERB_PORT')."\n";
}

echo "\n=== KEY FINDING ===\n";
$issue = null;

// Check if using wrong driver
if (config('broadcasting.default') !== 'reverb' && config('broadcasting.default') !== 'pusher') {
    $issue = "BROADCAST_DRIVER is set to '".config('broadcasting.default')."' which won't work with Reverb";
}

// Check if pusher config points to reverb
if (config('broadcasting.default') === 'pusher') {
    $pusherHost = config('broadcasting.connections.pusher.options.host');
    $pusherPort = config('broadcasting.connections.pusher.options.port');

    if ($pusherHost !== '127.0.0.1' || $pusherPort != 8080) {
        $issue = 'Pusher driver is configured but not pointing to Reverb (127.0.0.1:8080)';
    }
}

if ($issue) {
    echo "⚠️  ISSUE FOUND: $issue\n\n";
    echo "RECOMMENDED FIX:\n";
    echo "1. In .env, set: BROADCAST_DRIVER=reverb\n";
    echo "2. Run: php artisan config:clear\n";
    echo "3. Restart Reverb: pm2 restart laravel-reverb\n";
} else {
    echo "✓ Configuration looks correct!\n";
    echo "\nIf broadcasting still doesn't work, the issue is likely:\n";
    echo "1. Reverb HTTP server not starting properly\n";
    echo "2. Windows firewall blocking localhost:8080\n";
    echo "3. Reverb not listening on HTTP endpoint (only WebSocket)\n";
    echo "\nRun diagnostic-reverb.php for deeper analysis.\n";
}

echo "\n=== END TEST ===\n";
