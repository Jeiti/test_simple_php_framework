<?php

/**
 * Created by PhpStorm.
 * User: evgen
 * Date: 06.01.17
 * Time: 8:04
 */
class CalculatorTest extends PHPUnit_Framework_TestCase
{
    protected $calculator;

    public function setUp()
    {
        $this->calculator = $this
            ->getMockBuilder('Calculator')
            ->setMethods(['plus', 'minus', 'operation'])
            ->getMock();
    }

    public function testMock()
    {
        $this->assertInstanceOf('Calculator',$this->calculator);
    }

    public function testAdd()
    {
        $this->calculator->expects($this->once())
            ->method('plus')
            ->with($this->equalTo(2), $this->equalTo(3))
            ->willReturn($this->returnValue(5));
        $this->calculator->plus(2,3);
//        $this->assertEquals(5, $calculator->add(2,3));
    }

    public function testOperation()
    {
        $this->calculator->expects($this->once())->method('plus');
        $this->calculator->expects($this->once())->method('minus');
        $this->calculator->operation(5,7);
    }
}