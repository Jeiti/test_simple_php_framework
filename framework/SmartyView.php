<?php

namespace framework;
use \Smarty;

class SmartyView extends View
{
    protected $smarty;
    private $controllerName;
    public function __construct($_controllerName)
    {
        $this->smarty = new Smarty();
        $this->smarty->force_compile = TRUE;
        $this->smarty->setCompileDir($_SERVER['DOCUMENT_ROOT']."/app/assets/templates_c/");
        $this->controllerName = $_controllerName;
    }

    public function render($action, $params)
    {
        if (!empty($params))
            foreach ($params as $key => $val)
                $this->smarty->assign($key, $val);
        $filename = $_SERVER['DOCUMENT_ROOT']."/app/views/$this->controllerName/$action.tpl";
        $this->smarty->assign('viewName', $filename);
        $layoutName = $_SERVER['DOCUMENT_ROOT']."/app/views/layouts/main.tpl";
        $this->smarty->display($layoutName);
    }
}