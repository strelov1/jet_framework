<?php

namespace App;

class View
{
    protected $path;
    protected $data = [];

    public function __construct($path)
    {
        $this->path = $path;
    }

    public function __set($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function __get($key)
    {
        return $this->data;
    }

    public function render($template)
    {
        extract($this->data);
        ob_start();
        include_once __DIR__ . '../../views/layout/header.php';
        include_once __DIR__ . '../../views/' . $this->path . '/' . $template . '.php';
        include_once __DIR__ . '../../views/layout/footer.php';
        return ob_get_clean();
    }
}
