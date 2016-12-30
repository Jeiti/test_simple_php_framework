<?php
/**
 * Created by PhpStorm.
 * User: evgen
 * Date: 30.12.16
 * Time: 23:11
 */

namespace events;


class Event
{
    public $sender;

    public function __construct($_sender)
    {
        $this->sender = $_sender;
    }
}