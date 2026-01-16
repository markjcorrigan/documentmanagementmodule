<?php

/**
 * Reverb Diagnostic Script
 *
 * Run this from your Laravel root: php diagnostic-reverb.php
 *
 * This script tests:
 * 1. Environment configuration
 * 2. Reverb HTTP endpoint connectivity
 * 3. Broadcasting configuration
 * 4. File permissions
 */
echo "=== REVERB DIAGNOSTIC TOOL ===\n\n";

// Load Laravel environment
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "✓ Laravel bootstrapped\n\n";

// 1. CHECK ENVIRONMENT VARIABLES
echo "--- ENVIRONMENT CONFIGURATION ---\n";
$envVars = [
    'BROADCAST_DRIVER',
    'PUSHER_APP_ID',
    'PUSHER_APP_KEY',
    'PUSHER_HOST',
    'PUSHER_PORT',
    'PUSHER_SCHEME',
    'REVERB_APP_ID',
    'REVERB_APP_KEY',
    'REVERB_HOST',
    'REVERB_PORT',
    'REVERB_SCHEME',
];

foreach ($envVars as $var) {
    $value = env($var, 'NOT SET');
    echo sprintf("%-20s = %s\n", $var, $value);
}

// Check for issues
$issues = [];
if (env('BROADCAST_DRIVER') !== 'reverb' && env('BROADCAST_DRIVER') !== 'pusher') {
    $issues[] = "BROADCAST_DRIVER is neither 'reverb' nor 'pusher'";
}
if (env('PUSHER_APP_ID') !== env('REVERB_APP_ID')) {
    $issues[] = "PUSHER_APP_ID and REVERB_APP_ID don't match (might be intentional)";
}

echo "\n";

// 2. CHECK BROADCASTING CONFIG
echo "--- BROADCASTING CONFIGURATION ---\n";
$broadcastConfig = config('broadcasting');
$defaultConnection = $broadcastConfig['default'] ?? 'NOT SET';
echo "Default Connection: $defaultConnection\n";

if (isset($broadcastConfig['connections'][$defaultConnection])) {
    $connection = $broadcastConfig['connections'][$defaultConnection];
    echo 'Driver: '.($connection['driver'] ?? 'NOT SET')."\n";
    echo 'Key: '.($connection['key'] ?? 'NOT SET')."\n";
    echo 'Host: '.($connection['options']['host'] ?? 'NOT SET')."\n";
    echo 'Port: '.($connection['options']['port'] ?? 'NOT SET')."\n";
    echo 'Scheme: '.($connection['options']['scheme'] ?? 'NOT SET')."\n";
}

echo "\n";

// 3. TEST REVERB HTTP ENDPOINT
echo "--- REVERB HTTP ENDPOINT TEST ---\n";
$reverbHost = env('REVERB_HOST', '127.0.0.1');
$reverbPort = env('REVERB_PORT', '8080');
$reverbUrl = "http://{$reverbHost}:{$reverbPort}";

echo "Testing: $reverbUrl\n";

$ch = curl_init($reverbUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 5);
curl_setopt($ch, CURLOPT_HEADER, true);
$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$error = curl_error($ch);
curl_close($ch);

if ($error) {
    echo "✗ ERROR: $error\n";
    $issues[] = "Cannot connect to Reverb HTTP endpoint at $reverbUrl";
} else {
    echo "✓ HTTP Response Code: $httpCode\n";
    if ($httpCode === 0) {
        $issues[] = 'Reverb HTTP endpoint not responding (code 0)';
    }
}

echo "\n";

// 4. TEST REVERB BROADCAST ENDPOINT
echo "--- TEST BROADCAST TO REVERB ---\n";
$appId = env('REVERB_APP_ID');
$broadcastUrl = "http://{$reverbHost}:{$reverbPort}/apps/{$appId}/events";
echo "Testing: $broadcastUrl\n";

$testPayload = json_encode([
    'name' => 'diagnostic-test-event',
    'channel' => 'diagnostic-channel',
    'data' => json_encode(['message' => 'test']),
]);

$ch = curl_init($broadcastUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $testPayload);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Content-Length: '.strlen($testPayload),
]);
curl_setopt($ch, CURLOPT_TIMEOUT, 5);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$error = curl_error($ch);
curl_close($ch);

if ($error) {
    echo "✗ ERROR: $error\n";
    $issues[] = 'Cannot POST to Reverb broadcast endpoint';
} else {
    echo "✓ HTTP Response Code: $httpCode\n";
    echo 'Response: '.substr($response, 0, 200)."\n";

    if ($httpCode !== 200 && $httpCode !== 201) {
        $issues[] = "Reverb broadcast endpoint returned non-success code: $httpCode";
    }
}

echo "\n";

// 5. CHECK LOG FILES
echo "--- LOG FILE PERMISSIONS ---\n";
$logFiles = [
    'storage/logs/reverb-error.log',
    'storage/logs/reverb-out.log',
    'storage/logs/reverb-combined.log',
    'storage/logs/laravel.log',
];

foreach ($logFiles as $logFile) {
    $fullPath = __DIR__.'/'.$logFile;
    if (file_exists($fullPath)) {
        $writable = is_writable($fullPath) ? '✓ Writable' : '✗ NOT Writable';
        $size = filesize($fullPath);
        echo sprintf("%-35s %s (%s bytes)\n", $logFile, $writable, number_format($size));
    } else {
        echo sprintf("%-35s ✗ Does not exist\n", $logFile);
    }
}

echo "\n";

// 6. CHECK REVERB PROCESS
echo "--- REVERB PROCESS STATUS ---\n";
echo "Checking if Reverb is running via PM2...\n";
exec('pm2 jlist 2>&1', $pm2Output, $pm2Return);

if ($pm2Return === 0) {
    $processes = json_decode(implode('', $pm2Output), true);
    $reverbProcess = null;

    foreach ($processes as $proc) {
        if (isset($proc['name']) && $proc['name'] === 'laravel-reverb') {
            $reverbProcess = $proc;
            break;
        }
    }

    if ($reverbProcess) {
        echo "✓ Reverb process found:\n";
        echo '  Status: '.($reverbProcess['pm2_env']['status'] ?? 'unknown')."\n";
        echo '  Uptime: '.gmdate('H:i:s', ($reverbProcess['pm2_env']['pm_uptime'] ?? 0) / 1000)."\n";
        echo '  Restarts: '.($reverbProcess['pm2_env']['restart_time'] ?? 0)."\n";
    } else {
        echo "✗ Reverb process not found in PM2\n";
        $issues[] = 'Reverb is not running via PM2';
    }
} else {
    echo "✗ Cannot check PM2 status (is PM2 installed?)\n";
}

echo "\n";

// 7. SUMMARY
echo "=== DIAGNOSTIC SUMMARY ===\n\n";

if (empty($issues)) {
    echo "✓ No obvious issues detected!\n";
    echo "\nHowever, if broadcasting still doesn't work:\n";
    echo "1. Check Reverb logs: storage/logs/reverb-out.log\n";
    echo "2. Try changing BROADCAST_DRIVER to 'reverb'\n";
    echo "3. Run: php artisan config:clear\n";
    echo "4. Restart Reverb: pm2 restart laravel-reverb\n";
} else {
    echo '✗ Found '.count($issues)." potential issue(s):\n\n";
    foreach ($issues as $i => $issue) {
        echo ($i + 1).". $issue\n";
    }
    echo "\nRecommended actions:\n";
    echo "- Review the issues above\n";
    echo "- Check storage/logs/reverb-error.log for errors\n";
    echo "- Verify Reverb is running: pm2 status\n";
    echo "- Try restarting Reverb: pm2 restart laravel-reverb\n";
}

echo "\n=== END DIAGNOSTIC ===\n";
