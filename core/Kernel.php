<?php

namespace Core;

use Dotenv\Dotenv;

class Kernel
{
    protected $routes = [];

    public function __construct()
    {
        // Initialize the application, load configurations, etc.
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../');
        $dotenv->load();
    }

    public function registerRoute($method, $path, $controller, $action)
    {
        $this->routes[$method][$path] = [
            'controller' => $controller,
            'action' => $action,
        ];
    }

    public function run()
    {
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $requestPath = $_SERVER['REQUEST_URI'];

        if (isset($this->routes[$requestMethod][$requestPath])) {
            
            $route = $this->routes[$requestMethod][$requestPath];
            $controllerName = $route['controller'];
            $actionName = $route['action'];

            if (class_exists($controllerName) && method_exists($controllerName, $actionName)) {
                $controller = new $controllerName();
                call_user_func([$controller, $actionName]);
            } else {
                http_response_code(404);
                echo "404 Not Found";
            }

        } else {
            http_response_code(404);
            echo "404 Not Found";
        }
    }
}