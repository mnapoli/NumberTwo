<?php
/**
 * NumberTwo
 *
 * @link      https://github.com/mnapoli/NumberTwo
 * @copyright Matthieu Napoli (http://mnapoli.fr/)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE file)
 */

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
     * @return string Class or interface name to match
     */
    public function getClassName()
    {
        return 'Doctrine\Common\Collections\Collection';
    }

    /**
     * {@inheritdoc}
     */
    public function filter($var)
    {
        return $var->toArray();
    }
}
