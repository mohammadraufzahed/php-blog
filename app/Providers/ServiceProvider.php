<?php

namespace App\Providers;

use App\Container;
use League\Container\Container as LeagueContainer;

abstract class ServiceProvider
{
    protected LeagueContainer $container;

    public function __construct()
    {
        $this->container = Container::getInstance();
    }

    /**
     * Register services in the container
     */
    abstract public function register(): void;

    /**
     * Boot services after all providers are registered
     */
    public function boot(): void
    {
        // Override in child classes if needed
    }
}

