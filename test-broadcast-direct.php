<?php

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "🔍 Testing broadcast() function...\n\n";

// Get a test message
$message = \App\Models\ChatMessage::first();
if (! $message) {
    echo "❌ No messages in database. Send a test message first.\n";
    exit(1);
}

echo "✓ Got message ID: {$message->id}\n";

// Create event
echo "✓ Creating ChatMessageSent event...\n";
$event = new \App\Events\ChatMessageSent($message);

// Check event configuration
echo '✓ Event class: '.get_class($event)."\n";

if ($event instanceof \Illuminate\Contracts\Broadcasting\ShouldBroadcast) {
    echo "✓ Implements ShouldBroadcast\n\n";
} else {
    echo "❌ Does NOT implement ShouldBroadcast!\n";
    exit(1);
}

// Now try broadcast with timeout
echo "📡 Calling broadcast()...\n";
echo "   (If this hangs for >5 seconds, we found the problem)\n\n";

$start = microtime(true);

try {
    broadcast($event);
    $elapsed = microtime(true) - $start;
    echo "✅ SUCCESS! broadcast() returned in {$elapsed}s\n";
} catch (\Exception $e) {
    $elapsed = microtime(true) - $start;
    echo "❌ EXCEPTION after {$elapsed}s: {$e->getMessage()}\n";
    echo "   File: {$e->getFile()}:{$e->getLine()}\n";
}

echo "\n=== TEST COMPLETE ===\n";
