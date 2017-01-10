<?php

namespace config\services;

use app\observers\NewsObserver;
use Pimple\Container;
use app\services\news_controller\NewsControllerService;
use app\repositoryes\DataBaseRepository;
use app\events\EventHandler;
use Exception;
use app\observers\ObserverCollection;
use app\repositoryes\ConnectionToDB;
use framework\Event;

require_once 'vendor/autoload.php';

set_exception_handler(function (Exception $exception) {
    echo $exception->getMessage();
});

\ActiveRecord\Config::initialize(function($cfg)
{
    $cfg->set_model_directory('app/models');
    $cfg->set_connections(array(
        'development' => 'mysql://'.DBUSER.':'.DBPASSWORD.'@'.DBHOSTNAME.'/'.DBNAME));
});

//Создаем DI-container (установлен Pimple)
$container = new Container();

$container['NewsObserver'] = function (Container $container) {return new NewsObserver();};

$container['ObserverCollection'] = function (Container $container) {
    return new ObserverCollection($container['NewsObserver']);
};

$container['EventHandler'] = function (Container $container)
{
    $handler = new EventHandler(new ObserverCollection($container['NewsObserver']));
    $handler->on(ConnectionToDB::CONNECTION_WITH_DATA_BASE_START_EVENT, function (Event $event){
        echo "DataBase connection has status -> " .ConnectionToDB::CONNECTION_WITH_DATA_BASE_START_EVENT. '<br>';
    });
    $handler->on(ConnectionToDB::CONNECTION_WITH_DATA_BASE_CLOSE_EVENT, function (Event $event){
        echo "DataBase connection has status -> " .ConnectionToDB::CONNECTION_WITH_DATA_BASE_CLOSE_EVENT. '<br>';
    });

    return $handler;
};

$container['ConnectionToDB'] = function (Container $container){
    return new ConnectionToDB($container['EventHandler']);
};

$container['DataBaseRepository'] = function (Container $container){
    return new DataBaseRepository($container['ConnectionToDB']);
};

$container['NewsControllerService'] = function (Container $container){
    return new NewsControllerService($container['DataBaseRepository']);
};