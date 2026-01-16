<?php

$file = 'vendor/laravel/reverb/src/Servers/Reverb/Factory.php';
$content = file_get_contents($file);

// Replace the problematic line with proper multi-line code
$old_line = "        \$options['tls'] = static::configureTls(\$options['tls'] ?? [], \$hostname);";
$new_code = "        \$tlsConfig = \$options['tls'] ?? [];
        if (\$tlsConfig === true || \$tlsConfig === false) {
            \$tlsConfig = [];
        }
        \$options['tls'] = static::configureTls(\$tlsConfig, \$hostname);";

$content = str_replace($old_line, $new_code, $content);
file_put_contents($file, $content);
echo "Proper patch applied!\n";
