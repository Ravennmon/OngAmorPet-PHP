<?php

namespace App\Core;

class Router
{
    protected $routes = [];

    public function __construct(array $routes)
    {
        $this->routes = $routes;
    }

    public function dispatch($uri, $method)
    {
        $uri = $this->removeRootFolderUri($uri);
        if (isset($this->routes[$method][$uri])) {
            $action = $this->routes[$method][$uri];
            if (is_array($action) && class_exists($action[0]) && method_exists($action[0], $action[1])) {
                call_user_func_array([new $action[0], $action[1]], []);
            } else {

                $this->notFound();
            }
        } else {
            $this->notFound();
        }
    }

    protected function notFound()
    {
        header("HTTP/1.0 404 Not Found");
        echo '404 Not Found';
    }

    // TODO
    protected function removeRootFolderUri($uri)
    {
        return str_replace('/007', '', $uri);
    }
}