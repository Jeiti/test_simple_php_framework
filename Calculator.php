<?php

/**
 * Created by PhpStorm.
 * User: evgen
 * Date: 06.01.17
 * Time: 8:02
 */
class Calculator
{
    public function plus($a,$b)
    {
        return $a+$b;
    }

    public function minus($a,$b)
    {
        return $a-$b;
    }

    public function operation($a,$b)
    {
        $c = $this->plus($a, $b);
        return $this->minus($c, $b);
    }
}