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
        if(str_starts_with($uri, '/resources')){
            $this->serveStaticFile($uri);
            return;
        }

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

    protected function serveStaticFile($uri)
    {
        $filePath = __DIR__ .'/../..' . $uri;
        if (file_exists($filePath) && is_file($filePath)) {
            $this->sendFile($filePath);
        } else {
            $this->notFound();
        }
    }

    protected function sendFile($filePath)
    {
        header('Content-Type: ' . $this->getMimeType($filePath));
        readfile($filePath);
    }

    protected function getMimeType($filePath)
    {
        $extension = pathinfo($filePath, PATHINFO_EXTENSION);

        $mimeType = match ($extension) {
            'css' => 'text/css',
            'js' => 'application/javascript',
            'json' => 'application/json',
            'jpg', 'jpeg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif',
            'svg' => 'image/svg+xml',
            'html' => 'text/html',
            default => mime_content_type($filePath),
        };

        return $mimeType;
    }

    protected function notFound()
    {
        header("HTTP/1.0 404 Not Found");
        echo '404 Not Found';
    }
}