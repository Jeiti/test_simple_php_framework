<?php

namespace app\factories;

use app\models\SiteModel;
use framework\observers\IObservable;

/**
 * Created by PhpStorm.
 * User: redex
 * Date: 17.12.16
 * Time: 21:48
 */
class SiteControllerFactory extends \framework\ControllerFactory
{
    private $observable;

    public function __construct(IObservable $_observable)
    {
        $this->observable = $_observable;
    }

    public function createModel()
    {
        return new SiteModel($this->observable);
    }

    public function createView()
    {
        return new \framework\SmartyView('site');
    }
}