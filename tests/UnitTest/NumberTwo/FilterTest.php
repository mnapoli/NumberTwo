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
            ->method('dump')
            ->will($this->returnValue('foo'));

        $dump = NumberTwo::dump(new \stdClass(), 2, array('stdClass' => $filter));

        $this->assertEquals('foo', $dump);
    }
}
