<?php

/**
 * Script to fix the tailoring notes toggle functionality in all PMBOK blade files
 * Run this from the root directory of your Laravel project
 */
$directory = 'resources/views/pmboksix/';

// Check if directory exists
if (! is_dir($directory)) {
    echo "Error: Directory {$directory} does not exist!\n";
    exit(1);
}

// Get all .blade.php files in the directory
$files = glob($directory.'*.blade.php');

if (empty($files)) {
    echo "No .blade.php files found in {$directory}\n";
    exit(1);
}

echo 'Found '.count($files)." blade files to process...\n\n";

$processedCount = 0;
$errorCount = 0;

foreach ($files as $file) {
    $filename = basename($file);

    echo "Processing {$filename}... ";

    try {
        // Read the file content
        $content = file_get_contents($file);

        if ($content === false) {
            throw new Exception('Could not read file');
        }

        // Store original content for backup
        $originalContent = $content;

        // Fix the tailoring notes toggle functionality
        $content = fixTailoringToggle($content);

        // Only write if content has changed
        if ($content !== $originalContent) {
            // Create backup
            $backupFile = $file.'.toggle-backup.'.date('Y-m-d-H-i-s');
            file_put_contents($backupFile, $originalContent);

            // Write the updated content
            if (file_put_contents($file, $content) === false) {
                throw new Exception('Could not write to file');
            }

            echo '✓ Updated (backup: '.basename($backupFile).")\n";
            $processedCount++;
        } else {
            echo "- No changes needed\n";
        }

    } catch (Exception $e) {
        echo '✗ Error: '.$e->getMessage()."\n";
        $errorCount++;
    }
}

echo "\n".str_repeat('=', 50)."\n";
echo "Processing complete!\n";
echo "Files processed: {$processedCount}\n";
echo "Errors: {$errorCount}\n";
echo "Backups created in the same directory with .toggle-backup.timestamp extension\n";

/**
 * Fix the tailoring notes toggle functionality
 */
function fixTailoringToggle($content)
{
    // Fix 1: Change button href to data-target and add type="button"
    $content = preg_replace(
        '/<button\s+href="#collapse99"\s+class="nav-toggle">/',
        '<button type="button" class="nav-toggle" data-target="#collapse99">',
        $content
    );

    // Fix 2: Update the JavaScript to use data-target instead of href
    $oldJsPattern = '/var collapseId = this\.getAttribute\("href"\);/';
    $newJs = 'var collapseId = this.getAttribute("data-target");';
    $content = preg_replace($oldJsPattern, $newJs, $content);

    // Fix 3: Add null check to make the code more robust
    $oldConditionPattern = '/if \(collapseEl\.style\.display === "none"\) \{/';
    $newCondition = 'if (collapseEl && collapseEl.style.display === "none") {';
    $content = preg_replace($oldConditionPattern, $newCondition, $content);

    $oldElsePattern = '/\} else \{(\s+)collapseEl\.style\.display = "none";/';
    $newElse = '} else if (collapseEl) {$1collapseEl.style.display = "none";';
    $content = preg_replace($oldElsePattern, $newElse, $content);

    // Fix 4: Remove the broken "Return to top of pop open box" link
    $content = preg_replace(
        '/\s*<div class="left">\s*<a href="#topofbox99">\s*<span class="smltxt">Return to top of pop open box<\/span>\s*<\/a>\s*<\/div>/s',
        '',
        $content
    );

    // Alternative pattern in case spacing is different
    $content = preg_replace(
        '/\s*<div class="left"><a href="#topofbox99"><span class="smltxt">Return to top of pop open box<\/span><\/a><\/div>/s',
        '',
        $content
    );

    return $content;
}

echo "Starting tailoring notes toggle fix...\n";
