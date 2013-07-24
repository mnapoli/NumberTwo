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

/**
 * Support for Doctrine's proxies
 *
 * @author Matthieu Napoli <matthieu@mnapoli.fr>
 */
class DoctrineProxyFilter implements Filter
{
    /**
     * @return string Class or interface name to match
     */
    public function getClassName()
    {
        // Proxy interface compatible with Doctrine >2.0 (other interfaces are >2.2 or >2.4)
        return 'Doctrine\ORM\Proxy\Proxy';
    }

    /**
     * {@inheritdoc}
     */
    public function filter($var)
    {
        if (!$var->__isInitialized()) {
            $var->__load();
        }
        // It's a public property, we can delete it
        unset($var->__isInitialized__);
    }
}
