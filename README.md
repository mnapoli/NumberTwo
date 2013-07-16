# NumberTwo

NumberTwo dumps your variables like nobody.

[![Build Status](https://travis-ci.org/mnapoli/NumberTwo.png?branch=master)](https://travis-ci.org/mnapoli/NumberTwo)

### Scalars

```php
echo NumberTwo::dump(null);
null

echo NumberTwo::dump(true);
true
echo NumberTwo::dump(false);
false

echo NumberTwo::dump(1);
1

echo NumberTwo::dump('foo');
"foo"
```

### Arrays

```php
echo NumberTwo::dump(array('foo', 'bar'));
[
    0 => "foo"
    1 => "bar"
]

echo NumberTwo::dump(array('foo' => 'bar'));
[
    "foo" => "bar"
]
```

### Objects

```php
echo NumberTwo::dump($object);
```

```php
My\ClassWithPublicProperties {
    foo: "aaa"
    bar: "bbb"
}
```

You can configure the recursive depth:

```php
echo NumberTwo::dump($otherObject, 2);
```

```php
UnitTest\NumberTwo\PublicProperties {
    foo: UnitTest\NumberTwo\PublicProperties {
        foo: UnitTest\NumberTwo\PrivateProperties { ... }
        bar: null
    }
    bar: null
}
```
