<?php

use Aguimaraes\Spiral\Builder;
use Aguimaraes\Spiral\SpiralPoint;

class BuilderTest extends PHPUnit_Framework_TestCase
{
    public function testIfTotalsWillBeRespected()
    {
        $collection = (new Builder())->setTotal(3)
            ->generate();
        $this->assertEquals(3, count($collection));
    }

    public function testIfStepsWillBeRespected()
    {
        $collection = (new Builder())->setStep(2)
            ->setTotal(8)
            ->generate();
        $firstTurn = new SpiralPoint(2, 1);
        $secondTurn = new SpiralPoint(1, 2);
        $this->assertEquals($firstTurn, $collection[3]);
        $this->assertEquals($secondTurn, $collection[5]);
    }
}
