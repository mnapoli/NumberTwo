<?php

namespace NumberTwo;

interface Filter
{
    /**
     * @return string Class or interface name to match
     */
    public function getClassName();

    /**
     * Filters the variable.
     *
     * @param mixed $var
     *
     * @return string
     */
    public function filter($var);
}
