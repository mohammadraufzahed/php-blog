<?php

namespace App;

use App\Providers\AppServiceProvider;
use App\Providers\BladeServiceProvider;

class Bootstrap
{
    public static function boot(): void
    {
        // Register service providers
        $providers = [
            AppServiceProvider::class,
            BladeServiceProvider::class,
        ];

        foreach ($providers as $provider) {
            $instance = new $provider();
            $instance->register();
        }

        // Boot all providers
        foreach ($providers as $provider) {
            $instance = new $provider();
            $instance->boot();
        }
    }
}

