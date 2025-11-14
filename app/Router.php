<?php

namespace App;

use FastRoute\Dispatcher;
use FastRoute\RouteCollector;

class Router
{
    private Dispatcher $dispatcher;

    public function __construct()
    {
        $this->dispatcher = \FastRoute\simpleDispatcher(function (RouteCollector $r) {
            // Load web routes
            $webRoutes = require __DIR__ . '/../routes/web.php';
            $webRoutes($r);
        });
    }

    public function dispatch(string $httpMethod, string $uri): array
    {
        // Strip query string (?foo=bar) and decode URI
        if (false !== $pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);
        }
        $uri = rawurldecode($uri);

        $routeInfo = $this->dispatcher->dispatch($httpMethod, $uri);

        switch ($routeInfo[0]) {
            case Dispatcher::NOT_FOUND:
                return ['status' => 404, 'handler' => null, 'vars' => []];
            
            case Dispatcher::METHOD_NOT_ALLOWED:
                return ['status' => 405, 'handler' => null, 'vars' => []];
            
            case Dispatcher::FOUND:
                return [
                    'status' => 200,
                    'handler' => $routeInfo[1],
                    'vars' => $routeInfo[2]
                ];
        }

        return ['status' => 500, 'handler' => null, 'vars' => []];
    }
}

