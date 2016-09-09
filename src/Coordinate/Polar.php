<?php

namespace Aguimaraes\Geometry\Coordinate;

class Polar extends Base
{
    protected $r;

    protected $theta;

    public function __construct($r, $theta)
    {
        $this->r = (float) $r;
        $this->theta = round($theta, $this->precision);
    }

    public static function fromCartesian(Cartesian $cartesian)
    {
        $x = $cartesian->getX();
        $y = $cartesian->getY();

        $r = sqrt(pow($x, 2) + pow($y, 2));
        $theta = rad2deg(atan2($y, $x));

        return new static($r, $theta);
    }

    public function getR()
    {
        return $this->r;
    }

    public function getTheta()
    {
        return $this->theta;
    }
}
