<?php

require_once(__DIR__ . '/autoload.php');

use App\Request;
use Controllers\SiteController;
use Controllers\ArticleController;


switch (Request::controller()) {
    case 'Site':
        $controller = new SiteController;
        break;
    case 'Article':
        $controller = new ArticleController;
        break;
    default:
        $controller = new ArticleController;
        break;
}

$action = 'action' . (Request::action() ? Request::action() : 'Index');
$controller->$action();
