<?php
/**
 * Created by PhpStorm.
 * User: redex
 * Date: 17.12.16
 * Time: 21:23
 */

namespace framework;

// TODO: можно сделать интерфейсом
abstract class View
{
    abstract public function render($action, $params);
}