<?php
/**
 * Created by PhpStorm.
 * User: evgen
 * Date: 31.12.16
 * Time: 0:42
 */

namespace app\services\site_controller;


class SiteControllerActionShowServiceModel
{
    public function __construct($siteControllerModel)
    {
        $siteControllerModel->setValue('action show работает');
        echo $siteControllerModel->getValue();
    }
}