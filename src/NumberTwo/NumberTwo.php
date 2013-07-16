<?php

namespace NumberTwo;

/**
 * NumberTwo is a classy variable dumper.
 *
 * @author Matthieu Napoli <matthieu@mnapoli.fr>
 */
class NumberTwo
{
    public static function dump($var, $depth = 2)
    {
        if ($var === null) {
            return 'null';
        }

        return null;
    }
}
