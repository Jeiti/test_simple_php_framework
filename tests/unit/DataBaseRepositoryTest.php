<?php
/**
 * Created by PhpStorm.
 * User: evgen
 * Date: 06.01.17
 * Time: 7:19
 */

namespace tests\unit;
//require_once $_SERVER['DOCUMENT_ROOT'] . '';
require_once $_SERVER['DOCUMENT_ROOT'] . 'config/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . 'repositoryes/DataBaseRepository.php';
require_once $_SERVER['DOCUMENT_ROOT'] . 'repositoryes/NewsRepositoryes.php';
require_once $_SERVER['DOCUMENT_ROOT'] . 'repositoryes/DataBaseRepositoryTraitWithQueryResult.php';
require_once $_SERVER['DOCUMENT_ROOT'] . 'events/Event.php';
require_once $_SERVER['DOCUMENT_ROOT'] . 'events/EventHandler.php';
require_once $_SERVER['DOCUMENT_ROOT'] . 'observers/Observer.php';
require_once $_SERVER['DOCUMENT_ROOT'] . 'observers/ObserverCollection.php';
require_once $_SERVER['DOCUMENT_ROOT'] . 'observers/NewsObserver.php';
use repositoryes\DataBaseRepository;

class DataBaseRepositoryTest extends \PHPUnit_Framework_TestCase
{
    protected $repository;

    public function setUp()
    {
        $this->repository = new DataBaseRepository();
    }

    public function testMethodGetAllNews(){
        $this->assertTrue($this->repository->getAllNews());
    }
}