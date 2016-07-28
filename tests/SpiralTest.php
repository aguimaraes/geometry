<?php

use Aguimaraes\Spiral\Spiral;
use Aguimaraes\Spiral\SpiralPoint;

class SpiralTest extends PHPUnit_Framework_TestCase
{
    public function testIfTotalsWillBeRespected()
    {
        $collection = (new Spiral())->setTotal(3)
            ->generate();
        $this->assertEquals(3, count($collection));
    }

    public function testIfStepsWillBeRespected()
    {
        $collection = (new Spiral())->setStep(2)
            ->setTotal(8)
            ->generate();
        $firstTurn = new SpiralPoint(2, 1);
        $secondTurn = new SpiralPoint(1, 2);
        $this->assertEquals($firstTurn, $collection[3]);
        $this->assertEquals($secondTurn, $collection[5]);
    }
}
