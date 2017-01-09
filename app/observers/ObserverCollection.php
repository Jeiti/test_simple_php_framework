<?php
/**
 * Created by PhpStorm.
 * User: evgen
 * Date: 31.12.16
 * Time: 3:17
 */

namespace app\observers;
use framework\Observer;


class ObserverCollection
{
    private $observer;
    private $observers = [];

    public function __construct(Observer $_observer)
    {
        $this->observer=$_observer;
        $this->registerObserver($this->observer);
    }

    public function registerObserver(Observer $_observer)
    {
        $this->observers[] = $_observer;
    }

    public function notify()
    {
        if(!empty($this->observers))
        {
            foreach ($this->observers as $observer)
            {
                $observer->notify();
            }
        }
    }
}