<?php

use Aguimaraes\Geometry\Coordinate\Cartesian;
use Aguimaraes\Geometry\Coordinate\Polar;

class CartesianTest extends \PHPUnit_Framework_TestCase
{

    public function testConversionToPolar()
    {
        $expected = new Polar(13, 22.62);
        $cartesian = new Cartesian(12, 5);

        $this->assertEquals($expected, $cartesian->toPolar());
    }
}
