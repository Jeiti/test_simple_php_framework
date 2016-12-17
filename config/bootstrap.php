<?php
function filesAutoload($classname){
    $classname = str_replace("\\","/",$classname);
    $filename = $_SERVER['DOCUMENT_ROOT']."/$classname.php";
    if(file_exists($filename)){
        require_once ($filename);
    }
}
spl_autoload_register("filesAutoload");