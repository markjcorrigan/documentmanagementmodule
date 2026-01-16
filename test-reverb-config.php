<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "Full reverb.servers.reverb config:\n";
print_r(config('reverb.servers.reverb'));

echo "\n\nChecking for env variables that might override:\n";
echo "REVERB_OPTIONS: " . (getenv('REVERB_OPTIONS') ?: 'not set') . "\n";
echo "REVERB_TLS: " . (getenv('REVERB_TLS') ?: 'not set') . "\n";
echo "REVERB_SERVER_TLS: " . (getenv('REVERB_SERVER_TLS') ?: 'not set') . "\n";
