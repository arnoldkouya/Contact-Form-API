<?php

namespace ContactFormAPI;

class Router
{
    protected $routes = [];

    public function get(string $uri, callable $callback)
    {
        $this->routes['GET'][$uri] = $callback;
    }

    public function post(string $uri, callable $callback)
    {
        $this->routes['POST'][$uri] = $callback;
    }

    public function dispatch(string $method, string $uri)
    {
        $path = parse_url($uri, PHP_URL_PATH);
        $path = rtrim($path, '/') ?: '/';

        $callback = $this->routes[$method][$path] ?? null;

        if (!$callback) {
            http_response_code(404);
            echo json_encode(["status" => "error", "message" => "Route non trouvée"]);
            return;
        }

        call_user_func($callback);
    }
}
