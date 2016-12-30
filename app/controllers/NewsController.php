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
    public function __construct()
    {

    }

    public function actionIndex()
    {
        $newsControllerService = new NewsControllerService();
        $newsControllerService->getAllNewsFromDataBase();
    }
}