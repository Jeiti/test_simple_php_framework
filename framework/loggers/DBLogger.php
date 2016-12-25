<?php

namespace framework\loggers;
use framework\observers\IObserver;
use framework\observers\IObservable;


class DBLogger implements ILogger, IObserver
{
    private $link;
    private $message;

    public function __construct()
    {
        $this->link = mysqli_connect(DBHOSTNAME,DBUSER,DBPASSWORD,DBNAME);
        mysqli_set_charset($this->link,'utf8');
    }

    public function writeLog($data='')
    {
        $this->data = $data;
        mysqli_query($this->link,'insert into log (message) values ($this->data)');
    }

    public function update(IObservable $observable)
    {
//        mysqli_query($this->link,'update log set message = "update" where id = ""');
    }
}