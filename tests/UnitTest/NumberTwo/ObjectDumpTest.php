<?php

namespace UnitTest\NumberTwo;

use NumberTwo\NumberTwo;

class ObjectDumpTest extends \PHPUnit_Framework_TestCase
{
    public function testMaxDepth0()
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

    public function testPrivateProperties()
    {
        $object = new PrivateProperties("aaa", "bbb");
        $expected = <<<END
UnitTest\NumberTwo\PrivateProperties {
    foo: "aaa"
    bar: "bbb"
    bam: null
}
END;
        $dump = NumberTwo::dump($object);
        $this->assertEquals($expected, $dump);
    }

    public function testInheritedProperties()
    {
        $object = new InheritedProperties("aaa", "bbb");
        $expected = <<<END
UnitTest\NumberTwo\InheritedProperties {
    foo: "aaa"
    bam: null
}
END;
        $dump = NumberTwo::dump($object);
        $this->assertEquals($expected, $dump);
    }

    public function testMaxDepth()
    {
        $object = new PublicProperties();
        $object->foo = new PublicProperties();
        $object->foo->foo = new PrivateProperties("aaa", "bbb");
        $expected = <<<END
UnitTest\NumberTwo\PublicProperties {
    foo: UnitTest\NumberTwo\PublicProperties {
        foo: UnitTest\NumberTwo\PrivateProperties { ... }
        bar: null
    }
    bar: null
}
END;
        $dump = NumberTwo::dump($object);
        $this->assertEquals($expected, $dump);
    }

    public function testEmptyClass()
    {
        $object = new EmptyClass();
        $expected = <<<END
UnitTest\NumberTwo\EmptyClass { }
END;
        $dump = NumberTwo::dump($object);
        $this->assertEquals($expected, $dump);
    }
}

/**
 * Fixture class
 */
class PublicProperties {
    public $foo;
    public $bar;
}

/**
 * Fixture class
 */
class PrivateProperties {
    protected $foo;
    private $bar;
    public $bam;

    public function __construct($foo, $bar)
    {
        $this->foo = $foo;
        $this->bar = $bar;
    }
}

/**
 * Fixture class
 */
class EmptyClass {
}

/**
 * Fixture class
 */
class InheritedProperties extends PrivateProperties {
}
