<?php
/**
 * Created by PhpStorm.
 * User: evgen
 * Date: 31.12.16
 * Time: 0:34
 */

namespace services\site_controller;
use events\EventHandler;
use app\controllers\SiteController;
use events\Event;


class SiteControllerActionShowServiceEvents
{
    public function callEvent($siteController)
    {
        $eventHandler = new EventHandler();
        $eventHandler->on(SiteController::EVENT_SITE_SHOW, function (Event $event){
            $this->showText();
            $this->logToFile();
        });
        $eventHandler->trigger($siteController::EVENT_SITE_SHOW, new Event($siteController));
    }

    public function showText()
    {
        echo ' - событие в action show сработало';
    }

    public function logToFile()
    {
        $file = fopen($_SERVER['DOCUMENT_ROOT'].'/logs/access.log', 'a+');
        fwrite($file, $_SERVER['DOCUMENT_ROOT'].'/logs/access.log - ' . date('d F Y') . ' - host - ');
        fclose($file);
    }
}