<?php

namespace App;


class Redirect
{
    public static function url($location)
    {
        return header('Location: ' . $location);
    }

    public static function home()
    {
        $config = include __DIR__ . '/../config/web_config.php';
        return header('Location: ' . $config['home_url']);
    }
}
