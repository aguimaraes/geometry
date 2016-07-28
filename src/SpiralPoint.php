<?php

namespace Aguimaraes\Spiral;

use Aguimaraes\Spiral\Exceptions\SpiralPointException;

class SpiralPoint
{
    /**
     * @var int
     */
    protected $x;

    /**
     * @var int
     */
    protected $y;

    /**
     * SpiralPoint constructor.
     *
     * @param int $x
     * @param int $y
     */
    public function __construct(int $x = 0, int $y = 0)
    {
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * @param string $coordinate
     * @return int
     * @throws SpiralPointException
     */
    public function get(string $coordinate):int
    {
        if (!property_exists($this, $coordinate)) {
            throw new SpiralPointException('Inexistent coordinate.');
        }
        return $this->{$coordinate};
    }

    /**
     * @param string $coordinate
     * @param $value
     * @return SpiralPoint
     * @throws SpiralPointException
     */
    public function set(string $coordinate, $value):SpiralPoint
    {
        if (!property_exists($this, $coordinate)) {
            throw new SpiralPointException('Inexistent coordinate.');
        }
        $this->{$coordinate} = $value;
        return $this;
    }

    /**
     * Will return the string: 0,0
     *
     * @return string
     */
    public function __toString()
    {
        return sprintf('%d,%d', $this->x, $this->y);
    }
}
