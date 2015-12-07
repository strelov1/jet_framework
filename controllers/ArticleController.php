<?php

namespace Controllers;

use App\View;
use App\Request;
use App\Redirect;
use Models\Article;

class ArticleController
{
    public function __construct()
    {
        $this->view = new View('article');
    }

    public function actionIndex()
    {
        $model = new Article();
        $this->view->model = $model->getAll();
        echo $this->view->render('index');
    }

    public function actionViews()
    {
        $id_article = Request::get('id');
        $model = new Article();
        $this->view->model = $model->getOne($id_article);
        echo $this->view->render('views');
    }

    public function actionAdd()
    {
        $model = new Article();
        if (Request::isPost()) {
            if ($model->add([
                'title' => Request::post('title'),
                'content' => Request::post('content'),
            ])
            ) {
                Redirect::home();
            }
        }
        echo $this->view->render('add');
    }

}
