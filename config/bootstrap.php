<?php

require_once 'vendor/autoload.php';

function filesAutoload($classname){
    $classname = str_replace("\\","/",$classname);
    $filename = $_SERVER['DOCUMENT_ROOT']."/$classname.php";
    if(file_exists($filename)){
        require_once ($filename);
    }
}
spl_autoload_register("filesAutoload");

// TODO: можно создать класс WebApplication
\ActiveRecord\Config::initialize(function($cfg)
{
    $cfg->set_model_directory('app/models');
    $cfg->set_connections(array(
        'development' => 'mysql://'.DBUSER.':'.DBPASSWORD.'@'.DBHOSTNAME.'/'.DBNAME));
});