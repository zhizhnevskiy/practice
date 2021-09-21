<?php


namespace Employee\View;


class Router
{
    private array $routes = [];

    public function dispatch(string $uri): array
    {
        return $this->routes[$uri] ?? [];
    }

    public function addRoute(string $uri, array $handler): \Employee\View\Router
    {
        $this->routes[$uri] = $handler;

        return $this;
    }
}