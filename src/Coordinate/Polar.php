<?php

namespace Aguimaraes\Geometry\Coordinate;

class Polar extends Base
{
    public $r;

    public $theta;

    public function __construct($r, $theta)
    {
        $this->r = (float) $r;
        $this->theta = round($theta);
    }

    public function toCartesian()
    {
        $radiansTheta = deg2rad($this->theta);
        $x = round($this->r * cos($radiansTheta));
        $y = round($this->r * sin($radiansTheta));
        return new Cartesian($x, $y);
    }
}
