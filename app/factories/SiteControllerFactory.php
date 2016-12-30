<?php

namespace app\factories;

use app\models\SiteModel;

/**
 * Created by PhpStorm.
 * User: redex
 * Date: 17.12.16
 * Time: 21:48
 */
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