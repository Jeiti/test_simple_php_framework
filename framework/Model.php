<?php
/**
 * Created by PhpStorm.
 * User: redex
 * Date: 17.12.16
 * Time: 21:46
 */

namespace framework;

use ArrayObject;
use framework\observers\IObservable;

class Model extends \ActiveRecord\Model
{
    private $value;
    private $observable;

//    Не использовать конструктор
    public function __construct(IObservable $_observable)
    {
        $this->observable = $_observable;
    }

    public function setValue($_value)
    {
        if(!$_value){
            throw new \Exception('Вы не передали никакого значения');
        } else {
            $this->value = $_value;
            $this->observable->notifyObservers();
        }
    }

    public function getValue()
    {
        return $this->value;
    }
}


try{
    $model = new Model();
    $model->setValue();
}
catch (\Exception $e){
    echo $e->getMessage();
}