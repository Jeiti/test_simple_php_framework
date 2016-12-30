<?php
/**
 * Created by PhpStorm.
 * User: evgen
 * Date: 31.12.16
 * Time: 1:38
 */

namespace services\news_controller;
use repositoryes\DataBaseRepository;



class NewsControllerService
{
    public function getAllNewsFromDataBase()
    {
        $repository = new DataBaseRepository();
        $repository->getAllNews();
    }

}