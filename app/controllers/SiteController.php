<?php

namespace app\controllers;
use app\models\SiteModel;
use framework\Controller;

class SiteController extends Controller
{
    public function actionIndex() {
        $param = SiteModel::find('all');
        return $this->view->render('index',[
            'models' => $param,
        ]);
    }

    public function actionShow()
    {
        $this->model->setValue('test');
        echo 'Show';
    }
}