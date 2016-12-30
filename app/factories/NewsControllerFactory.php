<?php

namespace app\factories;

use app\models\NewsModel;

/**
 * Created by PhpStorm.
 * User: redex
 * Date: 17.12.16
 * Time: 21:48
 */
class NewsControllerFactory extends \framework\ControllerFactory
{


    public function __construct()
    {
    }

    public function createModel()
    {
        return new NewsModel();
    }

    public function createView()
    {
        return new \framework\SmartyView('news');
    }
}