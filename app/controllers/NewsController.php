<?php
/**
 * Created by PhpStorm.
 * User: evgen
 * Date: 31.12.16
 * Time: 1:31
 */

namespace app\controllers;

use framework\FrontController;
use Pimple\Container;
use app\services\news_controller\NewsControllerService;
use framework\Controller;

class NewsController extends Controller
{
    private $newsControllerService;

    public function __construct($_newsControllerService)
    {
        $this->newsControllerService = $_newsControllerService['NewsControllerService'];
    }

    public function actionIndex()
    {
        $this->newsControllerService->getAllNewsFromDataBase();
    }
}