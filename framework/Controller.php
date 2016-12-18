<?php
namespace framework;


class Controller
{
    private $abstractFactory;
    private $model;
    private $view;

    public function __construct(ControllerFactory $controllerFactory)
    {
        $this->abstractFactory = $controllerFactory;
        $this->model = $this->abstractFactory->createModel();
        $this->view = $this->abstractFactory->createView();
    }
}