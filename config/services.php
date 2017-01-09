<?php

namespace config\services;

use app\observers\NewsObserver;
use Pimple\Container;
use app\services\news_controller\NewsControllerService;
use app\repositoryes\DataBaseRepository;
use app\events\EventHandler;
use Exception;
use app\models\NewsModel;
use app\observers\ObserverCollection;
use app\controllers\NewsController;

//require_once 'vendor/autoload.php';
//
//
//spl_autoload_register(function ($classname){
//    $classname = str_replace("\\","/",$classname);
//    $filename = $_SERVER['DOCUMENT_ROOT']."/$classname.php";
//    if(file_exists($filename)){
//        require_once ($filename);
//    }
//});

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

//Создаем EventHandler для DataBaseRepository
$container['EventHandler'] = function (Container $container){
    return new EventHandler();
};

//Создаем NewsModel для DataBaseRepository
$container['NewsModel'] = function (Container $container){
    return new NewsModel();
};

//Создаем Observer для ObserverCollection
$container['Observer'] = function (Container $container){
    return new NewsObserver();
};

//Создаем ObserverCollection для DataBaseRepository
$container['ObserverCollection'] = function (Container $container){
    return new ObserverCollection(
        $container['Observer']
    );
};

//Создаем DataBaseRepository для NewsControllerService
$container['DataBaseRepository'] = function (Container $container){
    return new DataBaseRepository(
        $container['EventHandler'],
        $container['NewsModel'],
        $container['ObserverCollection']
    );
};

//Создаем NewsControllerService для NewsController
$container['NewsControllerService'] = function(Container $container){
    return new NewsControllerService(
        $container['DataBaseRepository']
    );
};

//Создаем NewsController
$container['NewsController'] = function(Container $container){
    return new NewsController(
        $container['NewsControllerService']
    );
};