<?php
/**
 * Created by PhpStorm.
 * User: evgen
 * Date: 18.12.16
 * Time: 8:35
 */

namespace framework\observers;


class ModelObservable implements IObservable
{
    private $observers=[];

    public function addObserver(IObserver $_observer)
    {
        $this->observers[]=$_observer;
    }

    public function removeObserver(IObserver $_observer)
    {
        unset($_observer, $this->observers);
    }

    public function notifyObservers()
    {
        $arr = new \ArrayObject($this->observers);
        for ($i=$arr->getIterator();$i->valid(); $i->next()){
            $i->current()->update($this);
        }
    }
}