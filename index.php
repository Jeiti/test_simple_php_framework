<?php
header("Content-type:text/html; charset=utf-8");
require_once ("config/config.php");
require_once ('config/bootstrap.php');
require_once ('WebApplication.php');

use framework\FrontController;


$controller = FrontController::getInstance();
$controller->start();