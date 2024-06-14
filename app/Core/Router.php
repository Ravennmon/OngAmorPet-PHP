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
        if($this->isResourceRequest($uri)){
            $this->serveStaticFile($uri);
            return;
        }

        if($this->isAdminRequest($uri) && !isLoggedIn()){
            redirect('/login');
            return;
        }


        foreach ($this->routes[$method] as $route => $action) {
            $pattern = $this->buildRegexPattern($route);
        
            if ($this->routeMatches($pattern, $uri, $action)) {
                return;
            }
        }

        $this->notFound();
    }

    private function buildRegexPattern(string $route): string {
        $pattern = str_replace(['{', '}'], ['(?<', '>[^/]+)'], $route);
        $pattern = str_replace('/', '\/', $pattern);
        return '/^' . $pattern . '$/';
    }
    
    private function routeMatches(string $pattern, string $uri, $action): bool {
        if (preg_match($pattern, $uri, $matches)) {
            $parameters = array_slice($matches, 1);
    
            if (is_array($action) && $this->isValidAction($action)) {
                $this->executeAction($action, $parameters);
            } else {
                $this->notFound();
            }
            return true;
        }
        return false;
    }
    
    private function isValidAction(array $action): bool {
        return class_exists($action[0]) && method_exists($action[0], $action[1]);
    }
    
    private function executeAction(array $action, array $parameters): void {
        $controller = new $action[0];
        $method = $action[1];
        call_user_func_array([$controller, $method], array_values($parameters));
    }

    private function serveStaticFile($uri)
    {
        $filePath = __DIR__ . '/../..' . $uri;
        if (file_exists($filePath) && is_file($filePath)) {
            $this->sendFile($filePath);
        } else {
            $this->notFound();
        }
    }

    private function sendFile($filePath)
    {
        header('Content-Type: ' . $this->getMimeType($filePath));
        readfile($filePath);
    }

    private function getMimeType($filePath)
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

    private function notFound()
    {
        redirect('/404');
    }

    private function isResourceRequest($uri)
    {
        if (str_starts_with($uri, '/resources')) {
            return true;
        }

        return false;
    }

    private function isAdminRequest($uri)
    {
        if (str_starts_with($uri, '/admin')) {
            return true;
        }

        return false;
    }
}