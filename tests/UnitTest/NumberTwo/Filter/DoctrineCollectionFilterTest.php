<?php

namespace UnitTest\NumberTwo;

require_once __DIR__ . '/fixtures.php';

use Doctrine\Common\Collections\ArrayCollection;
use NumberTwo\Filter\DoctrineCollectionFilter;
use NumberTwo\NumberTwo;

class DoctrineCollectionFilterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function filterShouldReplaceObject()
    {
        $filters = array(new DoctrineCollectionFilter());

        $var = new ArrayCollection();

        $dump = NumberTwo::dump($var, 2, $filters);
        $expected = <<<END
[
    0 => "foo"
]
END;
        $this->assertEquals($expected, $dump);
    }
}
