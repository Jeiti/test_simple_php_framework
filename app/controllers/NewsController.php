<?php
/**
 * Created by PhpStorm.
 * User: evgen
 * Date: 31.12.16
 * Time: 1:31
 */

namespace app\controllers;


use framework\FrontController;
use services\news_controller\NewsControllerService;

class NewsController
{
    private $service;

    public function __construct()
    {
        $this->service = new NewsControllerService();
    }

    public function actionIndex()
    {
        $this->service->getAllNewsFromDataBase();
    }
}