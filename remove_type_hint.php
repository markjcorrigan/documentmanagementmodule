<?php

$file = 'vendor/laravel/reverb/src/Servers/Reverb/Factory.php';
$content = file_get_contents($file);

// Remove the array type hint from configureTls parameter
$content = str_replace(
    'protected static function configureTls(array $context, ?string $hostname): array',
    'protected static function configureTls($context, ?string $hostname): array',
    $content
);

file_put_contents($file, $content);
echo "Type hint removed from configureTls method!\n";
