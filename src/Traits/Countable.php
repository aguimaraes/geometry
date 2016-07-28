<?php

namespace Aguimaraes\Spiral\Traits;

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
