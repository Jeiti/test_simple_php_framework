<?php

namespace framework;
//use framework\loggers\FileLogger;
//use framework\observers\ModelObservable;


class FrontController
{
//    private static $instance = NULL;
    private $container;

//    public static function getInstance() {
//        if (!static::$instance)
//        static::$instance = new self();
//        return static::$instance;
//    }

    public function __construct($container)
    {
        $this->container = $container;
    }

    private function __clone(){}

    public function start() {
        $url = parse_url($_SERVER['REQUEST_URI']);
        $routes = explode("/", $url['path']);
        empty($routes[1])? $controllerName = 'site' : $controllerName = $routes[1];
        empty($routes[2])? $actionName = 'index' : $actionName = $routes[2];


        //$controllerName = 'news';
        //$actionName = 'index';


        $controllerFactoryName = ucfirst(strtolower($controllerName));
        $controllerName = "app\\controllers\\$controllerFactoryName";
        $controllerName .= 'Controller';
        $controllerFactoryName = "app\\factories\\${controllerFactoryName}ControllerFactory";

        $actionName = ucfirst(strtolower($actionName));
        $actionName = 'action'.$actionName;




        $controllerClass = new \ReflectionClass($controllerName);
        $controllerFactoryClass = new \Reflectionclass($controllerFactoryName);
        // TODO: добавить вызов исключения, если метода в контроллере нет
        if ($controllerClass->isInstantiable()) {
            $controllerFactory = $controllerFactoryClass->newInstance();
            $controller = $controllerClass->newInstance($controllerFactory);
            if (method_exists($controllerName, $actionName)) {
                $method = new \ReflectionMethod($controllerName, $actionName);
                return $method->invoke($controller);
            }
        }

    }
}



//TODO: Создать класс webApplication куда поместить все настройки.
//TODO: Применить паттерн "Стратегия" - есть 2 способа генерация паролей, выбрать один из них (md5, sha1)
//TODO: Реализовать DbLogger
//TODO: Применить структурные шаблоны - Фасад или Декоратор или Адаптер
//TODO: почитать про рефакторинг