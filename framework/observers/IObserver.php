<?php
/**
 * Created by PhpStorm.
 * User: redex
 * Date: 18.12.16
 * Time: 8:56
 */

namespace framework\observers;


interface IObserver
{
    public function update(IObservable $observable);
}