<?php

namespace Aguimaraes\Spiral\Traits;

trait ArrayAccess
{
    /**
     * @param $offset
     *
     * @return bool
     */
    public function offsetExists($offset)
    {
        return isset($this->data[$offset]);
    }

    /**
     * @param $offset
     *
     * @return null
     */
    public function offsetGet($offset)
    {
        return $this->data[$offset] ?? null;
    }

    /**
     * @param $offset
     * @param $value
     *
     * @return $this
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->data[] = $value;

            return $this;
        }
        $this->data[$offset] = $value;

        return $this;
    }

    /**
     * @param $offset
     */
    public function offsetUnset($offset)
    {
        unset($this->data[$offset]);
    }
}
