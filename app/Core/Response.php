<?php
namespace App\Core;

class Response
{
    protected $data;
    protected $status;
    protected $headers;

    public function __construct($data = [], $status = 200, $headers = [])
    {
        $this->data = $data;
        $this->status = $status;
        $this->headers = array_merge(['Content-Type' => 'application/json'], $headers);
    }

    public static function success($data = [], $status = 200, $headers = [])
    {
        $response = new self($data, $status, $headers);
        $response->send();
    }

    public static function error($data = [], $status = 400, $headers = [])
    {
        $response = new self($data, $status, $headers);
        $response->send();
    }

    public function send()
    {
        http_response_code($this->status);
        foreach ($this->headers as $key => $value) {
            header("{$key}: {$value}");
        }
        echo json_encode($this->data);
        exit();
    }
}