<?php
/**
 * Created by PhpStorm.
 * User: evgen
 * Date: 31.12.16
 * Time: 3:15
 */

namespace observers;
use observers\Observer;


class NewsObserver implements Observer
{
    public function notify()
    {
        echo 'NewsObserver is notified';
    }
}