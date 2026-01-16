<?php

/**
 * Batch convert image and asset paths to use Laravel storage
 * - Processes all .php and .blade.php files in resources/views/Home/pmboksix
 * - Ignores the scriptBAK folder
 * - Backs up originals to scriptBAK
 * - Converts /images/* paths to {{ asset('storage/images/*') }}
 * - Converts PDF/document paths to {{ asset('storage/assets/*') }}
 */
$sourceDir = __DIR__.'/resources/views/Home/pmboksix';
$backupDir = $sourceDir.'/scriptBAK';

// Check source directory
if (! is_dir($sourceDir)) {
    exit("Error: Source directory not found at {$sourceDir}\n");
}

// Create backup directory if missing
if (! is_dir($backupDir) && ! mkdir($backupDir, 0755, true)) {
    exit("Error: Could not create backup directory at {$backupDir}\n");
}
echo "Backups will be saved under: {$backupDir}\n\n";

// Recursive scan
$it = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($sourceDir, RecursiveDirectoryIterator::SKIP_DOTS),
    RecursiveIteratorIterator::SELF_FIRST
);

$filesProcessed = 0;
$totalChanges = 0;

foreach ($it as $file) {
    if ($file->isDir()) {
        continue;
    }

    // Skip files in scriptBAK
    if (strpos($file->getPathname(), 'scriptBAK') !== false) {
        continue;
    }

    $path = $file->getPathname();
    if (! preg_match('/\.(blade\.php|php)$/i', $path)) {
        continue;
    }

    $relativePath = substr($path, strlen($sourceDir) + 1);
    $backupPath = $backupDir.'/'.$relativePath;
    $backupDirOfFile = dirname($backupPath);

    if (! is_dir($backupDirOfFile) && ! mkdir($backupDirOfFile, 0755, true)) {
        echo "Warning: couldn't create backup folder for {$relativePath}\n";

        continue;
    }

    if (! copy($path, $backupPath)) {
        echo "Warning: couldn't backup {$relativePath}\n";

        continue;
    }

    $content = file_get_contents($path);
    $original = $content;
    $fileChangeCount = 0;

    // 1) <img src="/images/..."> or src="/images/..."
    $content = preg_replace_callback(
        '/(src\s*=\s*["\'])\/images\/([^"\']+)(["\'])/i',
        function ($m) use (&$fileChangeCount) {
            $fileChangeCount++;

            return $m[1].'{{ asset(\'storage/images/'.$m[2].'\') }}'.$m[3];
        },
        $content
    );

    // 2) ../images/... and ./images/...
    $content = preg_replace_callback(
        '/(src\s*=\s*["\'])(?:\.\.\/|\.\/)images\/([^"\']+)(["\'])/i',
        function ($m) use (&$fileChangeCount) {
            $fileChangeCount++;

            return $m[1].'{{ asset(\'storage/images/'.$m[2].'\') }}'.$m[3];
        },
        $content
    );

    // 3) CSS url(...)
    $content = preg_replace_callback(
        '/url\(\s*(["\']?)(?:\.\/|\.\.\/|\/)?images\/([^"\')]+)\1\s*\)/i',
        function ($m) use (&$fileChangeCount) {
            $fileChangeCount++;
            $quote = $m[1] ?: '"';

            return 'url('.$quote.'{{ asset(\'storage/images/'.$m[2].'\') }}'.$quote.')';
        },
        $content
    );

    // 4) JS this.src assignments
    $content = preg_replace_callback(
        '/this\.src\s*=\s*(["\'])(?:\.\/|\.\.\/|\/)?images\/([^"\']+)\1/i',
        function ($m) use (&$fileChangeCount) {
            $fileChangeCount++;
            $inner = ($m[1] === '"') ? "'" : '"';

            return 'this.src='.$m[1].'{{ asset('.$inner.'storage/images/'.$m[2].$inner.') }}'.$m[1];
        },
        $content
    );

    // 5) PDF/document paths
    $content = preg_replace_callback(
        '/(href\s*=\s*["\'])(?:\/)?(?:homeviewpdf|homesave)\/resources\/([^"\']+)(["\'])/i',
        function ($m) use (&$fileChangeCount) {
            $fileChangeCount++;

            return $m[1].'{{ asset(\'storage/assets/'.$m[2].'\') }}'.$m[3];
        },
        $content
    );

    if ($content !== $original) {
        if (file_put_contents($path, $content) === false) {
            echo "Error: couldn't write changes to {$relativePath}\n";

            continue;
        }
        echo "Converted: {$relativePath}  (changes: {$fileChangeCount})\n";
        $filesProcessed++;
        $totalChanges += $fileChangeCount;
    } else {
        echo "No changes: {$relativePath}\n";
    }
}

echo str_repeat('-', 60).PHP_EOL;
echo "Done. Files processed: {$filesProcessed}\n";
echo "Total replacements made: {$totalChanges}\n";
echo "Backups are in: {$backupDir}\n";
echo "Tip: run `grep -R \"../images/\" resources/views/Home/pmboksix` to check for remaining occurrences.\n";
