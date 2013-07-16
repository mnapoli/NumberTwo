# NumberTwo

NumberTwo dumps your variables like nobody.

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
My\ClassWithPublicProperties {
    foo: "aaa"
    bar: "bbb"
}
```
