<?php
/**
 * Created by PhpStorm.
 * User: evgen
 * Date: 31.12.16
 * Time: 0:13
 */

namespace app\services\site_controller;
use app\controllers\SiteController;
use app\events\EventHandler;
use framework\Event;
use app\services\site_controller\SiteControllerActionShowServiceEvents;
use app\services\site_controller\SiteControllerActionShowServiceModel;
use app\exceptions\ExceptionForModelGetValue;

class SiteControllerActionShowService
{
    public function __construct($EventHandler, $siteController, $siteControllerModel, $siteControllerActionShowServiceEvents)
    {
        try{
            $siteControllerActionShowServiceModel = new SiteControllerActionShowServiceModel($siteControllerModel);
            $siteControllerActionShowServiceEvents->callEvent($siteController);
        }
        catch (ExceptionForModelGetValue $e){
            echo $e->getMessage();
        }
    }
}