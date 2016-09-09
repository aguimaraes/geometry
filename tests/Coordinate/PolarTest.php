<?php

namespace Coordinate;

use Aguimaraes\Geometry\Coordinate\Cartesian;
use Aguimaraes\Geometry\Coordinate\Polar;

class PolarTest extends \PHPUnit_Framework_TestCase
{

    public function testConversionFromCartesian()
    {
        $cartesian = new Cartesian(12, 5);

        $polar = Polar::fromCartesian($cartesian);

        $expected = new Polar(13, 22.62);

        $this->assertEquals($expected, $polar);
    }

}
