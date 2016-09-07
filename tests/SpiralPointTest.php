<?php

use Aguimaraes\Geometry\Exceptions\SpiralPointException;
use Aguimaraes\Geometry\SpiralPoint;

class SpiralPointTest extends PHPUnit_Framework_TestCase
{
    public function testCoordinates()
    {
        $point = new SpiralPoint(39, -8);

        $this->assertEquals(39, $point->get('x'));
        $this->assertEquals(-8, $point->get('y'));
    }

    public function testCoordinatesMustBeAPairOfIntegers()
    {
        $point = new SpiralPoint(11.34, 76.4);

        $expected = new SpiralPoint(11, 76);

        $this->assertEquals($expected, $point);
    }

    public function testGetNonExistentCoordinates()
    {
        $point = new SpiralPoint(0, 1);

        $this->expectException(SpiralPointException::class);
        $point->get('z');
    }

    public function testSetCoordinates()
    {
        $point = new SpiralPoint();
        $point->set('x', 10);
        $point->set('y', 35);

        $this->assertEquals(10, $point->get('x'));
        $this->assertEquals(35, $point->get('y'));
    }

    public function testSetNonExistentCoordinates()
    {
        $point = new SpiralPoint();

        $this->expectException(SpiralPointException::class);

        $point->set('z', 34);
    }

    public function testToString()
    {
        $point = new SpiralPoint(7, -8);
        $this->assertEquals('7,-8', (string) $point);
    }
}
