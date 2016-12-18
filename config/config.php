<?php
define("DBHOSTNAME", "localhost");
define("DBUSER", "root");
define("DBPASSWORD", "root");
define("DBNAME", "simple_php_framework_dev");
define("NEWSPERPAGE", "3");//сколько новостей выводить на странице
define("OUTPUTNEWS", "5");//сколько кнопок пагинации выводить
define("DEBUG", true);//development-разработка или production-использование

if(DEBUG) {
    define("ERROR_LEVEL", E_ALL|E_STRICT);
    ini_set("error_reporting",E_ALL);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
}
else {
    define("ERROR_LEVEL", E_ALL & ~E_NOTICE);
}