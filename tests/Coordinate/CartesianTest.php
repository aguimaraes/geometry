<?php

namespace Coordinate;

use Aguimaraes\Geometry\Coordinate\Cartesian;
use Aguimaraes\Geometry\Coordinate\Polar;

class CartesianTest extends \PHPUnit_Framework_TestCase
{

    public function testConversionFromPolar()
    {
        $polar = new Polar(13, 22.6);
        $cartesian = Cartesian::fromPolar($polar);

        $expected = new Cartesian(12, 5);

        $this->assertEquals($expected, $cartesian);
    }

}
