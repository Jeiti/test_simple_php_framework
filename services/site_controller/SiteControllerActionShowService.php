<?php
/**
 * Created by PhpStorm.
 * User: evgen
 * Date: 31.12.16
 * Time: 0:13
 */

namespace services\site_controller;
use app\controllers\SiteController;
use events\EventHandler;
use events\Event;
use services\site_controller\SiteControllerActionShowServiceEvents;
use services\site_controller\SiteControllerActionShowServiceModel;
use exceptions\ExceptionForModelGetValue;

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