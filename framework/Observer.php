<?php
/**
 * Created by PhpStorm.
 * User: evgen
 * Date: 31.12.16
 * Time: 3:14
 */

namespace app\observers;


interface Observer
{
    function notify();
}