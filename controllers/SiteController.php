<?php

namespace Controllers;

use App\View;

class SiteController
{
    public function actionIndex()
    {
        $view = new View('site');
        echo $view->render();
    }
}