<?php

namespace App\Providers;

use App\Providers\ServiceProvider;
use Database\Mysql;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Register Database as singleton (shared instance)
        $this->container->addShared(Mysql::class, function () {
            return new Mysql();
        });

        // Register Database with alias for convenience
        $this->container->addShared('db', Mysql::class);

        // Other classes can be auto-wired, but we can also explicitly register them
        // The container will auto-wire dependencies if they're registered
    }
}

