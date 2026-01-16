<?php

// convert_blade_images_with_cachebust.php
// Run this in the root of your Laravel project

$viewsPath = __DIR__.'/resources/views';
$backupPath = __DIR__.'/resources/views_backup_'.date('Ymd_His');

// Create a backup of all Blade files
echo "Backing up Blade files to $backupPath\n";
mkdir($backupPath, 0777, true);
$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($viewsPath));
foreach ($iterator as $file) {
    if ($file->isFile() && preg_match('/\.blade\.php$/', $file->getFilename())) {
        $relativePath = str_replace($viewsPath, '', $file->getPathname());
        $backupFile = $backupPath.$relativePath;
        @mkdir(dirname($backupFile), 0777, true);
        copy($file->getPathname(), $backupFile);
    }
}

// Scan and replace image links
echo "Updating image links with cache-busting query...\n";

foreach ($iterator as $file) {
    if ($file->isFile() && preg_match('/\.blade\.php$/', $file->getFilename())) {
        $content = file_get_contents($file->getPathname());

        $updated = preg_replace_callback(
            '#src=["\']/images/([^"\']+)["\']#i',
            function ($matches) {
                $image = $matches[1];

                // Build the Blade asset with cache-busting using filemtime
                return 'src="{{ asset(\'storage/images/'.$image.'\') }}?v={{ file_exists(public_path(\'storage/images/'.$image.'\')) ? filemtime(public_path(\'storage/images/'.$image.'\')) : time() }}"';
            },
            $content
        );

        // Save only if changed
        if ($updated !== $content) {
            file_put_contents($file->getPathname(), $updated);
            echo 'Updated: '.$file->getPathname()."\n";
        }
    }
}

echo "Done! All Blade files updated with cache-busting.\n";
echo "Run: php artisan view:clear\n";
