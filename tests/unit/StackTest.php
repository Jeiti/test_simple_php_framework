<?php


class StackTest extends PHPUnit_Framework_TestCase
{

    public function testInit(){
        $arr = [];
        $this->assertEquals(1,count($arr));
    }

    /**
    @depends testInit
     */
    public function testPush(){
        $arr = [];
        array_push($arr,1);
        $this->assertEquals(1,count($arr));
        $this->assertEquals(1,$arr[0]);
    }
}

//TODO: Протестировать собственный класс (любой простой)
//TODO: Как тестировать исключения
//TODO: Что такое фикстуры (методы setup и teerdown)
//TODO: Что такое заглушки и притворщики mocks
//TODO: Протестировать SiteModel