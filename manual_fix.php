<?php

$file = 'vendor/laravel/reverb/src/Servers/Reverb/Factory.php';
$lines = file($file);

// Find and replace line 56
foreach ($lines as $i => &$line) {
    if ($i == 55) { // Line 56 is index 55 (0-based)
        $line = "        \$tlsConfig = \$options['tls'] ?? [];\n".
                "        if (\$tlsConfig === true || \$tlsConfig === false) {\n".
                "            \$tlsConfig = [];\n".
                "        }\n".
                "        \$options['tls'] = static::configureTls(\$tlsConfig, \$hostname);\n";
    }
}

file_put_contents($file, implode('', $lines));
echo "Manual fix applied with proper formatting!\n";
