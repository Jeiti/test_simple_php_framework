<?php
/**
 * Created by PhpStorm.
 * User: evgen
 * Date: 09.01.17
 * Time: 23:05
 */

namespace app\repositoryes;

use app\exceptions\LinkException;
use framework\Event;


class ConnectionToDB
{

    const CONNECTION_WITH_DATA_BASE_START_EVENT = 'linked';
    const CONNECTION_WITH_DATA_BASE_CLOSE_EVENT = 'closed';

    private $linkToDataBase;
    private $eventHandler;

    public function __construct($_eventHandler)
    {
        $this->eventHandler = $_eventHandler;
    }

    public function getLinkToDataBase()
    {
        $this->linkToDataBase = mysqli_connect(DBHOSTNAME,DBUSER,DBPASSWORD,DBNAME);

        if(!$this->linkToDataBase)
        {
            throw new LinkException ('Нет подключения к БД');
        } else {
            $this->eventHandler->trigger(self::CONNECTION_WITH_DATA_BASE_START_EVENT, new Event($this));
            return $this->linkToDataBase;
        }
    }

    public function closeConnect()
    {
        mysqli_close($this->linkToDataBase);
        $this->eventHandler->trigger(self::CONNECTION_WITH_DATA_BASE_CLOSE_EVENT, new Event($this));
    }

}