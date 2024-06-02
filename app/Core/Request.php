<?php
namespace App\Core;

class Request
{
    private static $instance = null;
    private $data;

    public function __construct() {
        $this->data = $this->parseIncomingRequest();
    }

    private function parseIncomingRequest() {
        $contentType = $_SERVER['CONTENT_TYPE'] ?? '';
        
        if (stripos($contentType, 'application/json') !== false) {
            $rawInput = file_get_contents('php://input');
            return json_decode($rawInput, true);
        }

        return $_REQUEST;
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function __get($name)
    {
        return isset($this->data[$name]) ? $this->data[$name] : null;
    }

    public function all()
    {
        return $this->data;
    }

    public function input($name, $default = null)
    {
        return isset($this->data[$name]) ? $this->data[$name] : $default;
    }

    public function has($name)
    {
        return isset($this->data[$name]);
    }
}