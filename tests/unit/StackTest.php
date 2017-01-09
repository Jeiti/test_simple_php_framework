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

//TODO: Что такое заглушки и притворщики mocks
//TODO: Реализовать тестирование NewsService через моки

//TODO: как обойтись без require_once
//TODO: как тестировать с использованием интерфейсов и трейтов DataBaseRepositoryTest
//TODO: попробовать подключить bootstrap.php
//TODO: посмотреть что такое PhphUnit.xml
