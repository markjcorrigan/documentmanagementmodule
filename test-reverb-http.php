<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

// Get credentials from config
$appId = config('broadcasting.connections.reverb.app_id');
$key = config('broadcasting.connections.reverb.key');
$secret = config('broadcasting.connections.reverb.secret');
$host = config('broadcasting.connections.reverb.options.host');
$port = config('broadcasting.connections.reverb.options.port');

echo "🔑 Using credentials:\n";
echo "App ID: $appId\n";
echo "Key: $key\n";
echo "Secret: $secret\n";
echo "Host: $host:$port\n\n";

// Test data
$channel = 'chat-session.999';
$event = 'ChatMessageSent';
$data = json_encode(['test' => 'message']);

// Build Pusher-compatible signature
$auth_timestamp = time();
$auth_version = '1.0';
$body = json_encode([
    'name' => $event,
    'channel' => $channel,
    'data' => $data,
]);

$path = "/apps/$appId/events";
$query_string = "auth_key=$key&auth_timestamp=$auth_timestamp&auth_version=$auth_version&body_md5=".md5($body);
$string_to_sign = "POST\n$path\n$query_string";
$auth_signature = hash_hmac('sha256', $string_to_sign, $secret);

$url = "http://$host:$port$path?$query_string&auth_signature=$auth_signature";

echo "📤 Sending test broadcast to: $url\n";
echo "📦 Body: $body\n\n";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

echo "📨 Response code: $httpCode\n";
echo "📨 Response body: $response\n";

if ($httpCode == 200) {
    echo "\n✅ SUCCESS! Reverb received the broadcast!\n";
} else {
    echo "\n❌ FAILED! Reverb rejected the broadcast.\n";
}
