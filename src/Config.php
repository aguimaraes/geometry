<?php

namespace Aguimaraes\Spiral;

class Config
{
    public $step = 1;

    public $offset = 0;

    public $angle = 90;

    public $first;

    public $direction;

    public function __construct()
    {
        $this->direction = new SpiralDirection(1, 0);

        $this->first = new SpiralPoint();
    }
}
