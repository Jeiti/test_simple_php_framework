<?php

namespace app\factories;

use app\models\SiteModel;

class SiteControllerFactory extends \framework\ControllerFactory
{


    public function __construct()
    {
    }

    public function createModel()
    {
        return new SiteModel();
    }

    public function createView()
    {
        return new \framework\SmartyView('site');
    }
}