<?php

namespace Aguimaraes\Spiral;

use Aguimaraes\Spiral\Exceptions\SpiralDirectionException;

class SpiralDirection
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
     * SpiralDirection constructor.
     *
     * @param int $x
     * @param int $y
     */
    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
        $this->validate();
    }

    /**
     * @param string $coordinate
     *
     * @throws SpiralDirectionException
     *
     * @return int
     */
    public function get(string $coordinate):int
    {
        if (!property_exists($this, $coordinate)) {
            throw new SpiralDirectionException('Inexistent coordinate.');
        }

        return $this->{$coordinate};
    }

    /**
     * @param string $coordinate
     * @param $value
     *
     * @throws SpiralDirectionException
     *
     * @return SpiralDirection
     */
    public function set(string $coordinate, $value):SpiralDirection
    {
        if (!property_exists($this, $coordinate)) {
            throw new SpiralDirectionException('Inexistent coordinate.');
        }
        $this->{$coordinate} = $value;

        return $this;
    }

    /**
     * @param string $coordinate
     *
     * @return int
     */
    public function __get(string $coordinate):int
    {
        return $this->get($coordinate);
    }

    /**
     * @param string $coordinate
     * @param $value
     *
     * @return SpiralDirection
     */
    public function __set(string $coordinate, $value):SpiralDirection
    {
        return $this->set($coordinate, $value);
    }

    /**
     * Validate the coordinates.
     */
    public function validate()
    {
        $this->cantBeEquals();
        $this->cantBeMoreThanOneUnitDistantFromZero();
    }

    /**
     * You better be moving.
     *
     * @throws SpiralDirectionException
     */
    protected function cantBeEquals()
    {
        if ($this->x !== $this->y) {
            return;
        }
        throw new SpiralDirectionException("Directions can't be equals.");
    }

    /**
     * This is direction, not step.
     *
     * @throws SpiralDirectionException
     */
    protected function cantBeMoreThanOneUnitDistantFromZero()
    {
        if (
            ($this->x > 1 || $this->x * -1 > 1) ||
            ($this->y > 1 || $this->y * -1 > 1)
        ) {
            throw new SpiralDirectionException("Directions can't be more than one unit distant from zero.");
        }
    }
}
