<?php

namespace App\Core;

use http\Exception\BadConversionException;

class Router
{
    private array $routes = [];
    public function get(string $path, array $controller)
    {
        $this->routes[$path] = $controller;
    }

    public function run()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        if (key_exists($uri, $this->routes)) {
            [$className, $method] = $this->routes[$uri];

            if (class_exists($className)) {
                $controller = new $className();

                if (method_exists($controller, $method)) {
                   $controller->$method();
                   exit;
                }
            }
        }

        http_response_code(404);
        echo "Страница не найдена";
    }

}
