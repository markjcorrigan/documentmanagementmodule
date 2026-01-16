<?php

$file = 'vendor/laravel/reverb/src/Servers/Reverb/Factory.php';
$content = file_get_contents($file);

// Find the specific lines we patched
$lines = explode("\n", $content);
for ($i = 50; $i < 65; $i++) {
    if (isset($lines[$i])) {

        echo ($i + 1).': '.$lines[$i]."\n";
    }
}

// Check if our patch is actually there
if (strpos($content, '$tlsConfig = $options') !== false &&
    strpos($content, 'if ($tlsConfig === true') !== false) {
    echo "\n✅ PATCH IS PRESENT in the file\n";
} else {
    echo "\n❌ PATCH IS MISSING from the file\n";
}
