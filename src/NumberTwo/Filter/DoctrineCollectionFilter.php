<?php

namespace NumberTwo\Filter;

use NumberTwo\Filter;
use NumberTwo\NumberTwo;

/**
 * Support for Doctrine's Collection class
 *
 * @author Matthieu Napoli <matthieu@mnapoli.fr>
 */
class DoctrineCollectionFilter implements Filter
{
    /**
     * {@inheritdoc}
     */
    public function dump($var, $depth = 2)
    {
        if (in_array('Doctrine\Common\Collections\Collection', class_implements($var))) {
            $var = $var->toArray();
        }

        return NumberTwo::dump($var, $depth);
    }
}
