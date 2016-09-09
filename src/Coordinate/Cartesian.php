<?php

namespace Aguimaraes\Geometry\Coordinate;

class Cartesian extends Base
{
    protected $x;

    protected $y;

    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function getX()
    {
        return $this->x;
    }

    public function getY()
    {
        return $this->y;
    }

    public static function fromPolar(Polar $polar)
    {
        $theta = deg2rad($polar->getTheta());
        $x = round($polar->getR() * cos($theta));
        $y = round($polar->getR() * sin($theta));
        return new static($x, $y);
    }
}
