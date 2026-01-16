<?php

namespace App\Helpers;

class ProtectedFiles
{
    public static function serveFile(string $folder, string $path = '')
    {
        // Updated to your exact structure: protected/scientology/
        $filePath = storage_path("protected/scientology/{$path}");

        \Log::info("🔍 Attempting to serve: {$filePath}");

        if (is_dir($filePath)) {
            \Log::info("📁 Is directory: {$filePath}");
            $indexFile = $filePath.'/index.html';
            if (file_exists($indexFile)) {
                \Log::info("✅ Serving index: {$indexFile}");

                return response()->file($indexFile);
            }
            \Log::info('📄 No index.html, showing directory');

            return self::showDirectory($folder, $path);
        }

        if (file_exists($filePath) && is_file($filePath)) {
            \Log::info("✅ Serving file: {$filePath}");

            return response()->file($filePath);
        }

        \Log::error("❌ File not found: {$filePath}");
        abort(404, "File not found: {$path}");
    }

    private static function showDirectory(string $folder, string $currentPath)
    {
        $fullPath = storage_path("protected/scientology/{$currentPath}");
        $items = scandir($fullPath);
        $items = array_diff($items, ['.', '..']);

        $html = '<h1>Directory: /scientology'.($currentPath ? '/'.$currentPath : '').'</h1><ul>';

        // Sort: folders first
        $folders = [];
        $files = [];

        foreach ($items as $item) {
            if (is_dir($fullPath.'/'.$item)) {
                $folders[] = $item;
            } else {
                $files[] = $item;
            }
        }

        sort($folders);
        sort($files);

        // Add parent directory link
        if ($currentPath) {
            $parent = dirname($currentPath);
            if ($parent === '.') {
                $parent = '';
            }
            $html .= '<li>📁 <a href="/scientology/'.$parent.'">.. (Parent)</a></li>';
        }

        // List folders
        foreach ($folders as $item) {
            $newPath = $currentPath ? $currentPath.'/'.$item : $item;
            $html .= '<li>📁 <a href="/scientology/'.$newPath.'">'.$item.'/</a></li>';
        }

        // List files
        foreach ($files as $item) {
            $newPath = $currentPath ? $currentPath.'/'.$item : $item;
            $html .= '<li>📄 <a href="/scientology/'.$newPath.'">'.$item.'</a></li>';
        }

        $html .= '</ul>';

        return response($html);
    }
}
