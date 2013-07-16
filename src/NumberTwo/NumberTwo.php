<?php

namespace NumberTwo;

/**
 * NumberTwo is a classy variable dumper.
 *
 * @author Matthieu Napoli <matthieu@mnapoli.fr>
 */
class NumberTwo
{
    /**
     * Returns a string representation of the variable.
     *
     * @param mixed $var
     * @param int   $depth
     *
     * @return string
     */
    public static function dump($var, $depth = 2)
    {
        // Null
        if (is_null($var)) {
            return 'null';
        }

        // Boolean
        if (is_bool($var)) {
            if ($var === false) {
                return 'false';
            }
            return 'true';
        }

        // String
        if (is_string($var)) {
            return '"' . $var . '"';
        }

        // Scalar
        if (is_scalar($var)) {
            return (string) $var;
        }

        return '';
    }
}
