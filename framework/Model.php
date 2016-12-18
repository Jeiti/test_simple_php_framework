<?php
/**
 * Created by PhpStorm.
 * User: redex
 * Date: 17.12.16
 * Time: 21:46
 */

namespace framework;

use ArrayObject;

class Model extends \ActiveRecord\Model implements IObservable
{
    private $value;

    public function setValue($_value) {
        $this->value = $_value;
        $this->notifyObservers();
    }

    public function getValue() {
        return $this->value;
    }

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
        $arr = new ArrayObject($this->observers);
        for ($i=$arr->getIterator();$i->valid(); $i->next()){
            $i->current()->update($this);
        }
    }
}