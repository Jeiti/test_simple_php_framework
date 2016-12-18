<?php

namespace framework;


abstract class ControllerFactory
{
    abstract public function createModel();

    abstract public function createView();
}