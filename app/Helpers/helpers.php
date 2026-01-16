<?php

use Illuminate\Support\Facades\URL;

if (! function_exists('file_url')) {
    /**
     * Generate a URL for viewing or downloading a user file.
     *
     * @param  string  $subfolder
     * @param  string  $filename
     * @param  bool  $download
     * @return string
     */
    function file_url($subfolder, $filename, $download = false)
    {
        $url = url("user/viewfile/{$subfolder}/{$filename}");
        if ($download) {
            $url .= '?download=1';
        }

        return $url;
    }
}
