<?php

namespace Aguimaraes\Geometry\Traits;

trait Countable
{
    /**
     * @return int
     */
    public function count():int
    {
        return count($this->data);
    }
}
