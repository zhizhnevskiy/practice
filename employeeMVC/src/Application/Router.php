<?php

namespace StandardFlow\Application;

class Router
{
    private array $routes = [];

    public function dispatch(string $uri): array
    {
        return $this->routes[$uri] ?? [];
    }

    public function addRoute(string $uri, array $handler): Router
    {
        $this->routes[$uri] = $handler;

        return $this;
    }
}
