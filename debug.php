<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';

try {
    $app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();
    echo "Bootstrap successful!\n";
} catch (\Exception $e) {
    echo 'ERROR: '.$e->getMessage()."\n\n";
    echo 'FILE: '.$e->getFile()."\n";
    echo 'LINE: '.$e->getLine()."\n\n";
    echo "STACK TRACE:\n";
    echo $e->getTraceAsString();
}
