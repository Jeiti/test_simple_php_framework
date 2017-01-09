<?php
/**
 * Created by PhpStorm.
 * User: evgen
 * Date: 31.12.16
 * Time: 1:47
 */

namespace repositoryes;
use framework\Model;
use observers\NewsObserver;
use observers\Observer;
use observers\ObserverCollection;
use repositoryes\NewsRepositoryes;
use exceptions\LinkException;
use events\EventHandler;
use events\Event;

class DataBaseRepository implements NewsRepositoryes
{
//    use DataBaseRepositoryTraitWithQueryResult;

    const CONNECTION_WITH_DATA_BASE_START_EVENT = 'linked';
    const CONNECTION_WITH_DATA_BASE_CLOSE_EVENT = 'closed';

    private $eventHandler;
    private $linkToDataBase;
    private $query;
    private $observerCollection;
    private $model;

    public function __construct(Event $_eventHandler, Model $_model, Observer $_observerCollection)
    {
        $this->eventHandler = $_eventHandler;
        $this->model = $_model;
        $this->observerCollection = $_observerCollection;

    }

    public function getAllNews()
    {
//        $this->eventHandler = new EventHandler();
        $this->eventHandler->on(self::CONNECTION_WITH_DATA_BASE_START_EVENT, function (Event $event){
            echo "DataBase connection has status -> 'linked'" . '<br>';
//            $this->observerCollection = new ObserverCollection(new NewsObserver());
        });
        $this->getLinkToDataBase();
        $this->model->getTheQueryResult();
        $this->processToQueryResult();
        $this->eventHandler->on(self::CONNECTION_WITH_DATA_BASE_CLOSE_EVENT, function (Event $event){
            echo "DataBase connection has status -> 'closed'" . '<br>';
            $this->observerCollection->notify();
        });
        $this->closeConnect();
        return true;
    }

    private function getLinkToDataBase()
    {
        $this->linkToDataBase= mysqli_connect(DBHOSTNAME,DBUSER,DBPASSWORD,DBNAME);
        if(!$this->linkToDataBase)
            throw new LinkException ('Нет подключения к БД');

        $this->eventHandler->trigger(self::CONNECTION_WITH_DATA_BASE_START_EVENT, new Event($this));
    }

    private function processToQueryResult()
    {
        while($row = mysqli_fetch_array($this->query))
        {
            echo $row['id'] . ' - ' . $row['title'] . '<br>';
        }
    }

    private function closeConnect()
    {
        mysqli_close($this->linkToDataBase);
        $this->eventHandler->trigger(self::CONNECTION_WITH_DATA_BASE_CLOSE_EVENT, new Event($this));
    }

}