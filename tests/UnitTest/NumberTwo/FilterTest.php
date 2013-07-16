<?php

namespace UnitTest\NumberTwo;

use NumberTwo\NumberTwo;

class FilterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function filterShouldBeUsedByDumper()
    {
        $filter = $this->getMockForAbstractClass('NumberTwo\Filter');
        $filter->expects($this->once())
            ->method('filter')
            ->will($this->returnValue(new \ArrayObject()));
        $filter->expects($this->once())
            ->method('getClassName')
            ->will($this->returnValue('stdClass'));

        $dump = NumberTwo::dump(new \stdClass(), 2, array($filter));

        $this->assertEquals('ArrayObject { }', $dump);
    }
}
