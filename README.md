# NumberTwo

NumberTwo is a classy variable dumper.

[![Build Status](https://travis-ci.org/mnapoli/NumberTwo.png?branch=master)](https://travis-ci.org/mnapoli/NumberTwo)

When `var_dump` or `print_r` is too verbose or unpleasant to read, go for NumberTwo.

### Scalars

```php
echo NumberTwo::dump(null);
// null

echo NumberTwo::dump(true);
// true
echo NumberTwo::dump(false);
// false

echo NumberTwo::dump(1);
// 1

echo NumberTwo::dump('foo');
// "foo"
```

### Arrays

```php
echo NumberTwo::dump(array('foo', 'bar'));
```

```php
[
    0 => "foo"
    1 => "bar"
]
```

```php
echo NumberTwo::dump(array('foo' => 'bar'));
```

```php
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

### Filters

You may want to pre-process some objects that are to be dumped.

For that, you can use the filters:

```php
$filters = array(new MyFilter());

echo NumberTwo::dump($otherObject, 2, $filters);
```

#### Doctrine Collection

NumberTwo provides a filter for Doctrine's collections:

```php
use NumberTwo\Filter\DoctrineCollectionFilter;

$filters = array(new DoctrineCollectionFilter());

echo NumberTwo::dump($otherObject, 2, $filters);
```

This filter will turn any Collection (ArrayCollection, PersistentCollection, …) into a PHP array (using the `toArray()` method).

#### Doctrine proxies

NumberTwo provides a filter for Doctrine's proxies:

```php
use NumberTwo\Filter\DoctrineProxyFilter;

$filters = array(new DoctrineProxyFilter());

echo NumberTwo::dump($otherObject, 2, $filters);
```

This filter will load uninitialized proxies and clean up properties.

Feel free to submit other filters in a pull request.

## License

NumberTwo is under the MIT license.
