<?php

namespace App;

use App\Helpers\Url;
use Blog\Info;

abstract class Controller
{
    protected function view(string $view, array $data = []): void
    {
        // Automatically include blog info for views that extend layouts.app
        // Check if blog data is not already provided
        if (!isset($data['blog'])) {
            $data['blog'] = Container::make(Info::class);
        }

        echo Blade::render($view, $data);
    }

    protected function redirect(string $url, int $code = 302): void
    {
        // If URL is relative, make it absolute preserving port
        if (strpos($url, 'http') !== 0) {
            $url = Url::to($url);
        }
        header("Location: {$url}", true, $code);
        exit;
    }

    protected function json(array $data, int $code = 200): void
    {
        http_response_code($code);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }
}

