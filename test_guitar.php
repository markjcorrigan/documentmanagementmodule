<?php
// test_guitar.php
require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "Testing Guitar Scores Database...\n\n";

try {
    // Test 1: Count
    $count = \App\Models\GuitarScore::count();
    echo "1. Total records: $count\n";

    // Test 2: Get 5 records
    echo "2. First 5 records:\n";
    $files = \App\Models\GuitarScore::limit(5)->get();
    foreach($files as $file) {
        echo "   - " . $file->name . "\n";
    }

    // Test 3: Check for null sizes
    $nullSize = \App\Models\GuitarScore::whereNull('size')->count();
    echo "3. Records with null size: $nullSize\n";

    echo "\n✅ Tests completed successfully!\n";

} catch (Exception $e) {
    echo "❌ ERROR: " . $e->getMessage() . "\n";
}