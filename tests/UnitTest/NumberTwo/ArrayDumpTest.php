<?php

namespace UnitTest\NumberTwo;

use NumberTwo\NumberTwo;

class ArrayDumpTest extends \PHPUnit_Framework_TestCase
{
    public function testEmptyArray()
    {
        $dump = NumberTwo::dump(array());
        $this->assertEquals('[]', $dump);
    }

    public function testNumericIndexArray1()
    {
        $var = array('foo', 'bar');
        $expected = <<<END
[
    0 => "foo"
    1 => "bar"
]
END;
        $dump = NumberTwo::dump($var);
        $this->assertEquals($expected, $dump);
    }

    public function testNumericIndexArray2()
    {
        $var = array(4 => 'foo', 9 => 'bar');
        $expected = <<<END
[
    4 => "foo"
    9 => "bar"
]
END;
        $dump = NumberTwo::dump($var);
        $this->assertEquals($expected, $dump);
    }

    public function testStringIndexArray1()
    {
        $var = array(
            'foo' => 'bar',
        );
        $expected = <<<END
[
    "foo" => "bar"
]
END;
        $dump = NumberTwo::dump($var);
        $this->assertEquals($expected, $dump);
    }

    public function testMaxDepth()
    {
        $var = array(array(array('foo')));
        $expected = <<<END
[
    0 => [
        0 => [ ... ]
    ]
]
END;
        $dump = NumberTwo::dump($var, 2);
        $this->assertEquals($expected, $dump);
    }
}
