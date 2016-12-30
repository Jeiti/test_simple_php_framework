<?php
/**
 * Created by PhpStorm.
 * User: evgen
 * Date: 31.12.16
 * Time: 1:47
 */

namespace repositoryes;
use repositoryes\NewsRepositoryes;
use exceptions\LinkException;
use events\EventHandler;
use events\Event;

class DataBaseRepository implements NewsRepositoryes
{
    const CONNECTION_WITH_DATA_BASE_START_EVENT = 'linked';
    const CONNECTION_WITH_DATA_BASE_CLOSE_EVENT = 'closed';

    private $eventHandler;
    private $linkToDataBase;
    private $query;

    public function getAllNews()
    {
        $this->eventHandler = new EventHandler();
        $this->eventHandler->on(self::CONNECTION_WITH_DATA_BASE_START_EVENT, function (Event $event){
            echo "DataBase connection has status -> 'linked'" . '<br>';
        });
        $this->getLinkToDataBase();
        $this->getTheQueryResult();
        $this->processToQueryResult();
        $this->eventHandler->on(self::CONNECTION_WITH_DATA_BASE_CLOSE_EVENT, function (Event $event){
            echo "DataBase connection has status -> 'closed'";
        });
        $this->closeConnect();
    }

    public function getLinkToDataBase()
    {
        $this->linkToDataBase= mysqli_connect(DBHOSTNAME,DBUSER,DBPASSWORD,DBNAME);
        if(!$this->linkToDataBase)
            throw new LinkException ('Нет подключения к БД');

        $this->eventHandler->trigger(self::CONNECTION_WITH_DATA_BASE_START_EVENT, new Event($this));
    }

    public function getTheQueryResult()
    {
        $this->query = mysqli_query($this->linkToDataBase,"SELECT * FROM site");
    }

    public function processToQueryResult()
    {
        while($row = mysqli_fetch_array($this->query))
        {
            echo $row['id'] . ' - ' . $row['title'] . '<br>';
        }
    }

    public function closeConnect()
    {
        mysqli_close($this->linkToDataBase);
        $this->eventHandler->trigger(self::CONNECTION_WITH_DATA_BASE_CLOSE_EVENT, new Event($this));
    }

}