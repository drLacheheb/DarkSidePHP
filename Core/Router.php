<?php

namespace Core;

use Core\Middleware\Auth;
use Core\Middleware\Guest;
use Core\Middleware\Middleware;

class Router
{
    /**
     * @var array<int, array{uri: string, controller: string, method: string, middleware: string|null}> $routes
     */
    private array $routes = [];

    public function post($uri, $controller)
    {
        return $this->add($uri, $controller, 'POST');
    }

    private function add($uri, $controller, $method, $middleware = 0)
    {
        $this->routes[] = compact('uri', 'controller', 'method', 'middleware');
        return $this;
    }

    public function delete($uri, $controller)
    {
        return $this->add($uri, $controller, 'DELETE');

    }

    public function patch($uri, $controller)
    {
        return $this->add($uri, $controller, 'PATCH');

    }

    public function put($uri, $controller)
    {
        return $this->add($uri, $controller, 'PUT');

    }

    public function get($uri, $controller)
    {
        return $this->add($uri, $controller, 'GET');

    }

    public function only(string $key)
    {
        //dd($key);
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
    }

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {

                Middleware::resolve($route['middleware']);

                return require base_path('Http/controllers/' . $route['controller']);
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
