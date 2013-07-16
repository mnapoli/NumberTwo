<?php

namespace NumberTwo;

interface Filter
{
    /**
     * Returns a string representation of the variable.
     *
     * @param mixed $var
     * @param int   $depth
     *
     * @return string
     */
    public function dump($var, $depth = 2);
}
