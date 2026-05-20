<?php

namespace app\Core;

use http\Exception\BadConversionException;

class Router
{
    private array $routes = [];
    public function get(string $path, string $controller)
    {
        $this->routes[$path] = $controller;
    }

    public function run()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        if (key_exists($uri, $this->routes))
        {
            $controllerPath = $this->routes[$uri];
            require_once $controllerPath;
            exit;
        }

        http_response_code(404);
        echo "Страница не найдена";
    }

}