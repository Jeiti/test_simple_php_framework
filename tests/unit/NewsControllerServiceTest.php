<?php
/**
 * Created by PhpStorm.
 * User: evgen
 * Date: 05.01.17
 * Time: 23:47
 */

namespace tests\unit;
require_once $_SERVER['DOCUMENT_ROOT'] . 'exceptions/LinkException.php';
require_once $_SERVER['DOCUMENT_ROOT'] . 'services/news_controller/NewsControllerService.php';
use PHPUnit_Framework_TestCase;
use services\news_controller\NewsControllerService;

class NewsControllerServiceTest extends PHPUnit_Framework_TestCase
{
    protected $service;

    public function setUp()
    {
        $this->service = new NewsControllerService();
    }

    public function testExistNewsControllerService()
    {
        $this->assertFileExists($_SERVER['DOCUMENT_ROOT'] . 'services/news_controller/NewsControllerService.php');
    }

    public function testExistMethodGetAllNewsFromDataBase(){
        $this->assertTrue(method_exists($this->service,'getAllNewsFromDataBase'));
    }

    /**
    * @expectedException \exceptions\LinkException
     */
    public function testException()
    {
        $this->service->exception();
    }
}