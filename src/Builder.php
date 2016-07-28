<?php

namespace Aguimaraes\Spiral;

use Aguimaraes\Spiral\Exceptions\SpiralException;
use Aguimaraes\Spiral\Traits\ArrayAccess;
use Aguimaraes\Spiral\Traits\Countable;

class Builder implements \Countable, \ArrayAccess
{
    use Countable, ArrayAccess;

    /**
     * Where the turn will happen.
     *
     * @var int
     */
    protected $step;

    /**
     * How much?
     *
     * @var int
     */
    protected $total;

    /**
     * Where's the first point.
     *
     * @var SpiralPoint
     */
    protected $first;

    /**
     * The current direction.
     *
     * @var SpiralDirection
     */
    protected $direction;

    /**
     * The collection.
     *
     * @var array
     */
    protected $data = [];

    /**
     * Builder constructor.
     *
     * @param int                  $step
     * @param SpiralPoint|null     $first
     * @param SpiralDirection|null $direction
     */
    public function __construct(int $step = 1, SpiralPoint $first = null, SpiralDirection $direction = null)
    {
        $this->step = $step;

        $this->first = $first ?? new SpiralPoint();

        $this->direction = $direction ?? new SpiralDirection(1, 0);

        $this->add($this->first);
    }

    /**
     * Generate the spiral.
     *
     * @return array
     */
    public function generate():array
    {
        $angle = $x = $y = 0;
        $turn = $step = $this->step;
        for ($i = 1; $i < $this->total; $i++) {
            $dx = $this->direction->x;
            $dy = $this->direction->y;
            $x += $dx;
            $y += $dy;
            if ($i === $turn) {
                $angle += 90;
                if (($dx === 0 && $dy !== 0)) {
                    $step += $this->step;
                }
                $turn += $step;
                $this->updateDirection($angle);
            }
            $this->add(new SpiralPoint($x, $y));
        }

        return $this->data;
    }

    /**
     * @param int $step
     *
     * @throws SpiralException
     *
     * @return Builder
     */
    public function setStep(int $step):Builder
    {
        if ($step < 1) {
            throw new SpiralException('Step cannot less than 1.');
        }
        $this->step = $step;

        return $this;
    }

    /**
     * @param int $total
     *
     * @throws SpiralException
     *
     * @return Builder
     */
    public function setTotal(int $total):Builder
    {
        if ($total < 1) {
            throw new SpiralException('Total cannot be less than 1.');
        }
        $this->total = $total;

        return $this;
    }

    /**
     * @param int $angle
     *
     * @return Builder
     */
    protected function updateDirection(int $angle):Builder
    {
        $this->direction->x = (int) cos(deg2rad($angle));
        $this->direction->y = (int) sin(deg2rad($angle));

        return $this;
    }

    /**
     * @param SpiralPoint $point
     *
     * @return Builder
     */
    public function add(SpiralPoint $point):Builder
    {
        array_push($this->data, $point);

        return $this;
    }
}