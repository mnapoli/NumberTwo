<?php

namespace UnitTest\NumberTwo;

use NumberTwo\NumberTwo;

class NumberTwoTest extends \PHPUnit_Framework_TestCase
{
    public function testDumpNull()
    {
        $dump = NumberTwo::dump(null);

        $this->assertEquals('null', $dump);
    }
}
