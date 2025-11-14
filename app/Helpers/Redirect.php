<?php

namespace App\Helpers;

class Redirect
{
    /**
     * Redirect to a URL preserving the current host and port
     */
    public static function to(string $url, int $code = 302): void
    {
        // If URL is relative, make it absolute preserving port
        if (strpos($url, 'http') !== 0) {
            $url = Url::to($url);
        }
        header("Location: {$url}", true, $code);
        exit;
    }
}

