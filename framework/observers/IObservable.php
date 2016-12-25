<?php
/**
 * Created by PhpStorm.
 * User: redex
 * Date: 18.12.16
 * Time: 8:58
 */

namespace framework\observers;


interface IObservable
{
    public function addObserver(IObserver $observer);
    public function removeObserver(IObserver $observer);
    public function notifyObservers();
}