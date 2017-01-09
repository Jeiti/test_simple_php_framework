<?php
header("Content-type:text/html; charset=utf-8");

//use framework\FrontController;
//use Pimple\Container;

require('vendor/pimple/pimple/src/Pimple/Container.php');
require('framework/FrontController.php');
require('vendor/autoload.php');
$container = new Container();
require('config/params.php');
require('config/services.php');

$controller = new FrontController($container);
$controller->start();