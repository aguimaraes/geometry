<?php

use Aguimaraes\Geometry\Coordinate\Cartesian;
use Aguimaraes\Geometry\Coordinate\Polar;

class PolarTest extends \PHPUnit_Framework_TestCase
{

    public function testConversionToCartesian()
    {
        $expected = new Cartesian(12, 5);
        $polar = new Polar(13, 22.65);

        $this->assertEquals($expected, $polar->toCartesian());
    }
}
