<?php

namespace Aguimaraes\Geometry\Coordinate;

class Cartesian extends Base
{
    public $x;

    public $y;

    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * Convert this Cartesian coordinate to a Polar coordinate
     *
     * @return Polar
     */
    public function toPolar()
    {
        $r = sqrt(pow($this->x, 2) + pow($this->y, 2));
        $theta = rad2deg(atan2($this->y, $this->x));
        return new Polar($r, $theta);
    }
}
