<?php
/**
 * Created by PhpStorm.
 * User: evgen
 * Date: 31.12.16
 * Time: 1:38
 */

namespace services\news_controller;

use repositoryes\DataBaseRepository;
use exceptions\LinkException;
use repositoryes\NewsRepositoryes;



class NewsControllerService
{
    private $repository;

    public function __construct(NewsRepositoryes $dataBaseRepository)
    {
//        $repository = new DataBaseRepository();
        $this->repository = $dataBaseRepository;
    }

    public function getAllNewsFromDataBase()
    {
//        $repository = new DataBaseRepository();
        $this->repository->getAllNews();
    }

    public function exception(){
        throw new LinkException('Проверка метода');
    }

}