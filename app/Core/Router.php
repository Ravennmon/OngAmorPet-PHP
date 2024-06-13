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

        if (str_starts_with($uri, '/resources')) {
            $this->serveStaticFile($uri);
            return;
        }

        if (str_starts_with($uri, '/admin') && !isset($_SESSION['user'])) {
            header('Location: /login');
            return;
        }

        foreach ($this->routes[$method] as $route => $action) {
            $pattern = str_replace(['{', '}'], ['(?<', '>[^/]+)'], $route);
            $pattern = str_replace('/', '\/', $pattern);
            $pattern = '/^' . $pattern . '$/';

            if (preg_match($pattern, $uri, $matches)) {
                $parameters = array_slice($matches, 1);

                if (is_array($action) && class_exists($action[0]) && method_exists($action[0], $action[1])) {
                    call_user_func_array([new $action[0], $action[1]], array_values($parameters));
                    return;
                } else {
                    $this->notFound();
                    return;
                }
            }
        }

        $this->notFound();
    }

    protected function serveStaticFile($uri)
    {
        $filePath = __DIR__ . '/../..' . $uri;
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

    // TODO
    protected function removeRootFolderUri($uri)
    {
        return str_replace('/007', '', $uri);
    }
}