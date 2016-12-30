<?php
namespace framework;


class Controller
{
    protected $abstractFactory;
    protected $model;
    protected $view;

    public function __construct(ControllerFactory $controllerFactory)
    {
        $this->abstractFactory = $controllerFactory;
        $this->model = $this->abstractFactory->createModel();
        $this->view = $this->abstractFactory->createView();
    }
}