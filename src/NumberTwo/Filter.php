<?php
/**
 * NumberTwo
 *
 * @link      https://github.com/mnapoli/NumberTwo
 * @copyright Matthieu Napoli (http://mnapoli.fr/)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE file)
 */

namespace NumberTwo;

/**
 * Dump filter, called before an object is dumped.
 *
 * @author Matthieu Napoli <matthieu@mnapoli.fr>
 */
interface Filter
{
    /**
     * @return string Class or interface name to match.
     */
    public function getClassName();

    /**
     * Filters the object.
     *
     * @param mixed $var
     *
     * @return string
     */
    public function filter($var);
}
