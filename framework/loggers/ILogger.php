<?php
/**
 * Created by PhpStorm.
 * User: evgen
 * Date: 18.12.16
 * Time: 8:25
 */

namespace framework\loggers;


interface ILogger
{
    public function writeLog($data='');
}