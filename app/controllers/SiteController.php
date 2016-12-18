<?php

namespace app\controllers;
use framework\Controller;

class SiteController extends Controller
{
    public function actionIndex() {
        echo 'Test';
    }

    public function actionShow() {
        echo 'Show';
    }
}