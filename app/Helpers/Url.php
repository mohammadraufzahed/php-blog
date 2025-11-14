<?php

namespace App\Helpers;

class Url
{
    /**
     * Generate a full URL preserving the current host and port
     */
    public static function to(string $path = '/'): string
    {
        $scheme = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';

        // Get host - HTTP_HOST should include port if it was in the original request
        // This is set by Nginx from $http_host which preserves the original Host header
        $host = $_SERVER['HTTP_HOST'] ?? $_SERVER['SERVER_NAME'] ?? 'localhost';

        // If HTTP_HOST doesn't include port, we need to add it
        // This can happen if the Host header was modified or stripped
        if (strpos($host, ':') === false) {
            // Try to get port from various sources
            $port = null;

            // Check X-Forwarded-Port first (for reverse proxies/Docker)
            if (isset($_SERVER['HTTP_X_FORWARDED_PORT'])) {
                $port = (int) $_SERVER['HTTP_X_FORWARDED_PORT'];
            }
            // Check SERVER_PORT (but this might be internal port in Docker)
            elseif (isset($_SERVER['SERVER_PORT'])) {
                $port = (int) $_SERVER['SERVER_PORT'];
            }

            // Add port if it's non-standard (not 80 for HTTP, not 443 for HTTPS)
            if ($port && (($scheme === 'http' && $port != 80) || ($scheme === 'https' && $port != 443))) {
                $host .= ':' . $port;
            }
        }

        // Normalize path - ensure it starts with / and doesn't have double slashes
        $path = '/' . ltrim($path, '/');

        return $scheme . '://' . $host . $path;
    }

    /**
     * Generate a relative URL (for internal redirects)
     */
    public static function route(string $path = '/'): string
    {
        return $path;
    }
}

