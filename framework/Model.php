<?php
/**
 * Created by PhpStorm.
 * User: redex
 * Date: 17.12.16
 * Time: 21:46
 */

namespace framework;

use ArrayObject;
use \Exception;
use exceptions\ExceptionForModelGetValue;

class Model extends \ActiveRecord\Model
{
    private $value;

    public function setValue($_value)
    {
        $this->value = $_value;
    }

    public function getValue()
    {
        if(!$this->value){
            throw new ExceptionForModelGetValue('Вы не передали значение');
        }else{
            return $this->value;
        }
    }
}


