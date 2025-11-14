<?php

use App\Router;

// Start session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Load Composer autoloader
require_once __DIR__ . '/vendor/autoload.php';

// Create router instance
$router = new Router();

// Get HTTP method and URI
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Dispatch the route
$result = $router->dispatch($httpMethod, $uri);

// Handle the response
switch ($result['status']) {
    case 404:
        http_response_code(404);
        echo "<!DOCTYPE html><html><head><title>404 - Not Found</title></head><body><h1>404 - Page Not Found</h1></body></html>";
        break;
    
    case 405:
        http_response_code(405);
        echo "<!DOCTYPE html><html><head><title>405 - Method Not Allowed</title></head><body><h1>405 - Method Not Allowed</h1></body></html>";
        break;
    
    case 200:
        // Parse handler (format: "Controller@method")
        $handler = $result['handler'];
        [$controllerClass, $method] = explode('@', $handler);
        
        // Build full controller class name
        $fullControllerClass = "App\\Controllers\\{$controllerClass}";
        
        // Check if controller exists
        if (!class_exists($fullControllerClass)) {
            http_response_code(500);
            echo "<!DOCTYPE html><html><head><title>500 - Server Error</title></head><body><h1>500 - Controller not found</h1></body></html>";
            break;
        }
        
        // Instantiate controller
        $controller = new $fullControllerClass();
        
        // Check if method exists
        if (!method_exists($controller, $method)) {
            http_response_code(500);
            echo "<!DOCTYPE html><html><head><title>500 - Server Error</title></head><body><h1>500 - Method not found</h1></body></html>";
            break;
        }
        
        // Call the controller method
        $vars = $result['vars'] ?? [];
        if (empty($vars)) {
            $controller->$method();
        } else {
            $controller->$method($vars);
        }
        break;
    
    default:
        http_response_code(500);
        echo "<!DOCTYPE html><html><head><title>500 - Server Error</title></head><body><h1>500 - Internal Server Error</h1></body></html>";
        break;
}
