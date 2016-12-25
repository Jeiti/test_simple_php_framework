<?php
/**
 * Created by PhpStorm.
 * User: evgen
 * Date: 18.12.16
 * Time: 8:27
 */

namespace framework\loggers;
use framework\observers\IObserver;
use framework\observers\IObservable;


class FileLogger implements ILogger, IObserver
{
    private $descriptor;

    public function __construct($_filename)
    {
        $this->descriptor = fopen($_filename,'a+');
    }

    public function writeLog($data='')
    {
        fwrite($this->descriptor,$data);
    }

    public function update(IObservable $observable)
    {
        $this->writeLog('changed');
    }
}