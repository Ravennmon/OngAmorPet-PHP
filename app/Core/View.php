<?php

namespace App\Core;

class View {
    public static function render($view, $data = []) {
        extract($data);
        $viewPath = __DIR__ . '/../../resources/views/' . $view . '.php';

        if (file_exists($viewPath)) {
            require $viewPath;
        } else {
            throw new \Exception("View file not found: " . $viewPath);
        }
    }
}