<?php

/**
 * Debug Reverb Authentication Signature
 *
 * Run: php debug-reverb-auth.php
 */

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "=== REVERB AUTHENTICATION DEBUG ===\n\n";

// Get Reverb configuration
$reverbConfig = config('broadcasting.connections.reverb');
$pusherConfig = config('broadcasting.connections.pusher');

echo "--- REVERB CONFIG ---\n";
echo 'Key: '.$reverbConfig['key']."\n";
echo 'Secret: '.$reverbConfig['secret']."\n";
echo 'App ID: '.$reverbConfig['app_id']."\n";
echo 'Host: '.$reverbConfig['options']['host']."\n";
echo 'Port: '.$reverbConfig['options']['port']."\n";
echo 'Scheme: '.$reverbConfig['options']['scheme']."\n\n";

echo "--- PUSHER CONFIG ---\n";
echo 'Key: '.($pusherConfig['key'] ?? 'NOT SET')."\n";
echo 'Secret: '.($pusherConfig['secret'] ?? 'NOT SET')."\n";
echo 'App ID: '.($pusherConfig['app_id'] ?? 'NOT SET')."\n";
if (isset($pusherConfig['options'])) {
    echo 'Host: '.$pusherConfig['options']['host']."\n";
    echo 'Port: '.$pusherConfig['options']['port']."\n";
    echo 'Scheme: '.$pusherConfig['options']['scheme']."\n";
}
echo "\n";

// Check what the broadcaster is using
$broadcaster = app('Illuminate\Contracts\Broadcasting\Factory')->driver('reverb');

echo "--- BROADCASTER INFO ---\n";
echo 'Class: '.get_class($broadcaster)."\n";

// Use reflection to see internal config
$reflection = new ReflectionClass($broadcaster);

// Try to access pusher property if it exists
try {
    $pusherProperty = $reflection->getProperty('pusher');
    $pusherProperty->setAccessible(true);
    $pusher = $pusherProperty->getValue($broadcaster);

    if ($pusher) {
        echo 'Pusher instance found: '.get_class($pusher)."\n";

        // Get settings from Pusher
        $settingsReflection = new ReflectionClass($pusher);
        $settingsProperty = $settingsReflection->getProperty('settings');
        $settingsProperty->setAccessible(true);
        $settings = $settingsProperty->getValue($pusher);

        echo "\nPusher Settings:\n";
        echo '  Auth Key: '.($settings['auth_key'] ?? 'N/A')."\n";
        echo '  Secret: '.(isset($settings['secret']) ? '***'.substr($settings['secret'], -4) : 'N/A')."\n";
        echo '  App ID: '.($settings['app_id'] ?? 'N/A')."\n";
        echo '  Host: '.($settings['host'] ?? 'N/A')."\n";
        echo '  Port: '.($settings['port'] ?? 'N/A')."\n";
        echo '  Scheme: '.($settings['scheme'] ?? 'N/A')."\n";
    }
} catch (\Exception $e) {
    echo 'Could not access Pusher instance: '.$e->getMessage()."\n";
}

echo "\n--- CREDENTIAL COMPARISON ---\n";
$reverbKey = $reverbConfig['key'];
$reverbSecret = $reverbConfig['secret'];
$reverbAppId = $reverbConfig['app_id'];

$pusherKey = $pusherConfig['key'] ?? null;
$pusherSecret = $pusherConfig['secret'] ?? null;
$pusherAppId = $pusherConfig['app_id'] ?? null;

if ($reverbKey === $pusherKey && $reverbSecret === $pusherSecret && $reverbAppId === $pusherAppId) {
    echo "✓ REVERB and PUSHER credentials MATCH\n";
} else {
    echo "✗ CREDENTIAL MISMATCH!\n";
    if ($reverbKey !== $pusherKey) {
        echo "  Key mismatch: reverb=$reverbKey, pusher=$pusherKey\n";
    }
    if ($reverbSecret !== $pusherSecret) {
        echo "  Secret mismatch: reverb=$reverbSecret, pusher=$pusherSecret\n";
    }
    if ($reverbAppId !== $pusherAppId) {
        echo "  App ID mismatch: reverb=$reverbAppId, pusher=$pusherAppId\n";
    }
}

echo "\n=== END DEBUG ===\n";
