<?php

namespace App;


class Request
{
    public static function controller()
    {
        $config = include __DIR__ . '/../config/web_config.php';
        if ($config['PrettyUrl'] == true) {
            return ucfirst(Request::chpuQuery()[0]);
        } else {
            return isset($_GET['c']) ? ucfirst($_GET['c']) : false;
        }
    }

    public static function action()
    {
        $config = include __DIR__ . '/../config/web_config.php';
        if ($config['PrettyUrl']) {
            return ucfirst(Request::chpuQuery()[1]);
        } else {
            return isset($_GET['a']) ? ucfirst($_GET['a']) : false;
        }
    }

    public static function chpuQuery()
    {
        $arr = explode('/', $_GET['q']);
        $params = [];
        foreach ($arr as $value) {
            if ($value != '') {
                $params[] = $value;
            }
        }

        return $params;
    }

    public static function isGet()
    {
        return $_SERVER['REQUEST_METHOD'] == 'GET';
    }

    public static function isPost()
    {
        return $_SERVER['REQUEST_METHOD'] == 'POST';
    }

    public static function isAjax()
    {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
        strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
    }

    public static function post($name)
    {
        return $_POST[$name];
    }

    public static function get($name)
    {
        return $_GET[$name];
    }
}
