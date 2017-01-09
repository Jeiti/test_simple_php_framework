<?php
/**
 * Created by PhpStorm.
 * User: evgen
 * Date: 30.12.16
 * Time: 22:55
 */

namespace app\events;
use framework\Event;

class EventHandler
{
    private $listeners = [];

    public function on($name, $callback)
    {
        $this->listeners[$name][] = $callback;
    }

    public function off($name, $callback)
    {
        if (isset($this->listeners[$name])) {
            foreach ($this->listeners[$name] as $i => $listener) {
                if ($listener === $callback) {
                    unset($this->listeners[$name][$i]);
                };
            }
        }
    }

    public function trigger($name, Event $event)
    {
        if (isset($this->listeners[$name])) {
            foreach ($this->listeners[$name] as $listener) {
                call_user_func($listener, $event);
            }
        }
    }
}