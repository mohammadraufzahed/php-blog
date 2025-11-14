<?php

namespace App;

use Illuminate\View\Factory;

class Blade
{
    public static function render(string $view, array $data = []): string
    {
        $factory = Container::get('blade.view.factory');
        return $factory->make($view, $data)->render();
    }

    public static function make(string $view, array $data = []): string
    {
        return self::render($view, $data);
    }
}

