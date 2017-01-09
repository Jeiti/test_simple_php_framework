<?php
/**
 * Created by PhpStorm.
 * User: evgen
 * Date: 05.01.17
 * Time: 23:47
 */

namespace tests\unit;
use PHPUnit_Framework_TestCase;
use services\news_controller\NewsControllerService;

class NewsControllerServiceTest extends PHPUnit_Framework_TestCase
{
    public function testExistNewsControllerService()
    {
        $this->assertFileExists($_SERVER['DOCUMENT_ROOT'] . 'services/news_controller/NewsControllerService.php');
    }

    public function testExistMethodGetAllNewsFromDataBase(){
        $this->
    }
}