<?php

namespace app\controllers;
use app\models\SiteModel;
use events\Event;
use events\EventHandler;
use framework\Controller;
use framework\Model;
use services\site_controller\SiteControllerActionShowService;
use services\site_controller\SiteControllerActionShowServiceEvents;

class SiteController extends Controller
{
    const EVENT_SITE_SHOW = 'showText';

    public function actionIndex() {
        $param = SiteModel::find('all');
        return $this->view->render('index',[
            'models' => $param,
        ]);
    }

    public function actionShow()
    {
        $SiteControllerActionShowService = new SiteControllerActionShowService(
            new EventHandler(),
            $this,
            $this->model,
            new SiteControllerActionShowServiceEvents()
        );
    }

}
