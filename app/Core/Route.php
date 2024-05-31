<?php

namespace App\Core;

class Route {
    protected static $routes = [];

    public static function get($uri, $action) {
        self::$routes['GET'][$uri] = $action;
    }

    public static function post($uri, $action) {
        self::$routes['POST'][$uri] = $action;
    }

    public static function put($uri, $action) {
        self::$routes['PUT'][$uri] = $action;
    }

    public static function delete($uri, $action) {
        self::$routes['DELETE'][$uri] = $action;
    }

    public static function getRoutes() {
        return self::$routes;
    }
}

