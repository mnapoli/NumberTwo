<?php

namespace UnitTest\NumberTwo;

use NumberTwo\NumberTwo;

class ObjectDumpTest extends \PHPUnit_Framework_TestCase
{
    public function testMaxDepth()
    {
        $object = new \stdClass();
        $dump = NumberTwo::dump($object, 0);
        $this->assertEquals('stdClass { ... }', $dump);
    }

    public function testPublicProperties()
    {
        $object = new PublicProperties();
        $object->foo = "aaa";
        $object->bar = "bbb";
        $expected = <<<END
UnitTest\NumberTwo\PublicProperties {
    foo: "aaa"
    bar: "bbb"
}
END;
        $dump = NumberTwo::dump($object);
        $this->assertEquals($expected, $dump);
    }
}

class PublicProperties {
    public $foo;
    public $bar;
}
