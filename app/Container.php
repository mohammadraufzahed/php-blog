<?php

namespace App;

use League\Container\Container as LeagueContainer;
use League\Container\ReflectionContainer;

class Container
{
    private static ?LeagueContainer $instance = null;

    public static function getInstance(): LeagueContainer
    {
        if (self::$instance === null) {
            $container = new LeagueContainer();
            
            // Enable auto-wiring for dependency injection
            $container->delegate(new ReflectionContainer());
            
            self::$instance = $container;
        }

        return self::$instance;
    }

    public static function get(string $id)
    {
        return self::getInstance()->get($id);
    }

    public static function has(string $id): bool
    {
        return self::getInstance()->has($id);
    }

    public static function bind(string $id, $concrete = null): void
    {
        self::getInstance()->add($id, $concrete);
    }

    public static function singleton(string $id, $concrete = null): void
    {
        if ($concrete === null) {
            self::getInstance()->addShared($id);
        } else {
            self::getInstance()->addShared($id, $concrete);
        }
    }

    public static function make(string $class, array $args = [])
    {
        return self::getInstance()->get($class, $args);
    }
}

