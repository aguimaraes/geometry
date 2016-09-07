<?php

use Aguimaraes\Geometry\Exceptions\SpiralDirectionException;
use Aguimaraes\Geometry\SpiralDirection;

class SpiralDirectionTest extends PHPUnit_Framework_TestCase
{

    public function testDirection()
    {
        $direction = new SpiralDirection(-1, 0);

        $this->assertEquals(-1, $direction->x);
        $this->assertEquals(0, $direction->y);
    }

    public function testDirectionCoordinatesMustBeAPairOfIntegers()
    {
        $direction = new SpiralDirection(0.75, 1.23);

        $this->assertEquals(0, $direction->x);
        $this->assertEquals(1, $direction->y);
    }

    public function testEmptyCoordinates()
    {
        $this->expectException(TypeError::class);
        new SpiralDirection();
    }

    public function testGetNonExistentCoordinate()
    {
        $direction = new SpiralDirection(1, 0);

        $this->expectException(SpiralDirectionException::class);
        $direction->z;
    }

    public function testSetNonExistentCoordinate()
    {
        $direction = new SpiralDirection(1, 0);

        $this->expectException(SpiralDirectionException::class);
        $direction->z = 3;
    }

    public function testSetCoordinates()
    {
        $direction = new SpiralDirection(1, 0);
        $direction->set('x', 0);
        $direction->set('y', 1);

        $this->assertEquals(0, $direction->x);
        $this->assertEquals(1, $direction->y);
    }

    public function testInvalidCoordinates()
    {
        $this->expectException(SpiralDirectionException::class);
        new SpiralDirection(1, 1);
    }
}
