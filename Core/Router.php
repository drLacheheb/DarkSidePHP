<?php

namespace Core;

class Router
{
    /**
     * @var array<int, array{uri: string, controller: string, method: string}> $routes
     */
    private array $routes = [];

    public function post($uri, $controller): void
    {
        $this->add($uri, $controller, 'POST');
    }

    private function add($uri, $controller, $method): void
    {
        $this->routes[] = compact('uri', 'controller', 'method');
    }

    public function delete($uri, $controller): void
    {
        $this->add($uri, $controller, 'DELETE');

    }

    public function patch($uri, $controller): void
    {
        $this->add($uri, $controller, 'PATCH');

    }

    public function put($uri, $controller): void
    {
        $this->add($uri, $controller, 'PUT');

    }

    public function get($uri, $controller): void
    {
        $this->add($uri, $controller, 'GET');

    }

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                return require base_path($route['controller']);
            }
        }
        $this->abort();
    }

    private function abort(): void
    {
        http_response_code(Response::NOT_FOUND);

        require base_path("controllers/error.php");

        die();
    }

}
