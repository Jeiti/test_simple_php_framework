<?php

namespace app\controllers;
use app\models\SiteModel;
use framework\Event;
use app\events\EventHandler;
use framework\Controller;
use framework\Model;
use app\services\site_controller\SiteControllerActionShowService;
use app\services\site_controller\SiteControllerActionShowServiceEvents;

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
