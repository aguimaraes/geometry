<?php

namespace Aguimaraes\Geometry;

use Aguimaraes\Geometry\Exceptions\SpiralException;
use Aguimaraes\Geometry\Traits\ArrayAccess;
use Aguimaraes\Geometry\Traits\Countable;

class Spiral implements \Countable, \ArrayAccess
{
    use Countable, ArrayAccess;

    /**
     * Where the turn will happen.
     *
     * @var int
     */
    protected $step;

    /**
     * @var int How much to turn?
     */
    protected $angle;

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
     * @param int                  $angle
     * @param SpiralPoint|null     $first
     * @param SpiralDirection|null $direction
     */
    public function __construct(int $step = 1, int $angle = 90, SpiralPoint $first = null, SpiralDirection $direction = null)
    {
        $this->step = $step;

        $this->angle = $angle;

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
        // initialize auxiliary variables
        $headAngle = $x = $y = 0; // head starts at 0 (right)
        $turn = $step = $this->step; // will turn for the first time at the step value
        for ($i = 1; $i < $this->total; $i++) {
            $dx = $this->direction->x;
            $dy = $this->direction->y;
            $x += $dx;
            $y += $dy;
            if ($i === $turn) { // should I turn my head now?
                $headAngle += $this->angle; // turn
                if (($dx === 0 && $dy !== 0)) {
                    $step += $this->step; // double the steps
                }
                $turn += $step; // will go further steps to turn next time
                $this->updateDirection($headAngle);
            }
            $this->add(new SpiralPoint($x, $y));
        }

        return $this->data;
    }

    /**
     * @param int $step
     *
     * @throws SpiralException
     * @return Spiral
     */
    public function setStep(int $step):Spiral
    {
        if ($step < 1) {
            throw new SpiralException('Step cannot less than 1.');
        }
        $this->step = $step;

        return $this;
    }

    /**
     * @param int $angle
     *
     * @throws SpiralException
     *
     * @return Spiral
     */
    public function setAngle(int $angle)
    {
        if ($angle > 90 || $angle % 45 !== 0) {
            throw new SpiralException('Angle must <= 90 and multiple of 45.');
        }
        $this->angle = $angle;

        return $this;
    }

    /**
     * @param int $total
     *
     * @throws SpiralException
     * @return Spiral
     */
    public function setTotal(int $total):Spiral
    {
        if ($total < 1) {
            throw new SpiralException('Total cannot be less than 1.');
        }
        $this->total = $total;

        return $this;
    }

    /**
     * Where should I go next time.
     *
     * @param int $angle
     *
     * @return Spiral
     */
    protected function updateDirection(int $angle):Spiral
    {
        $this->direction->x = (int)round(cos(deg2rad($angle)));
        $this->direction->y = (int)round(sin(deg2rad($angle)));

        return $this;
    }

    /**
     * @param SpiralPoint $point
     *
     * @return Spiral
     */
    public function add(SpiralPoint $point):Spiral
    {
        array_push($this->data, $point);

        return $this;
    }
}
