# IReflection #

[![Latest Stable Version](https://poser.pugx.org/eso/ireflection/v/stable.png)](https://packagist.org/packages/eso/ireflection)
[![Build Status](https://travis-ci.org/entering/ireflection.png?branch=master)](https://travis-ci.org/entering/ireflection)
[![Coverage Status](https://coveralls.io/repos/github/entering/ireflection/badge.svg?branch=master)](https://coveralls.io/github/entering/ireflection?branch=master)

Wrapper around PHP Reflection to make it easier to use.

## Requirements ##

* PHP >= 5.4

## Installation ##

The recommended way to install is through composer.

Just create a `composer.json` file for your project:

```json
{
    "require": {
        "eso/ireflection": "@stable"
    }
}
```

**Tip:** browse [`eso/ireflection`](https://packagist.org/packages/eso/ireflection) page to choose a stable version to use, avoid the `@stable` meta constraint.

And run these two commands to install it:

```bash
$ curl -sS https://getcomposer.org/installer | php
$ composer install
```

Now you can add the autoloader, and you will have access to the library:

```php
<?php

require 'vendor/autoload.php';
```

## Usage ##

Get/set some properties using Reflection:

```php
class A { protected $a = 5; protected $b = 10; }
$a = new A();
$refClass = new \ReflectionClass($a);
$propA = $refClass->getProperty('a');
$propB = $refClass->getProperty('b');

$propA->setAccessible(true);
$propB->setAccessible(true);

echo $propA->getValue($a) . "\n"; // prints 5
echo $propB->getValue($a) . "\n"; // prints 10

$propA->setValue($a, 10);
$propB->setValue($a, 20);

echo $propA->getValue($a) . "\n"; // prints 10
echo $propB->getValue($a) . "\n"; // prints 20
```

Get/set the same properties using ReflClass:

```php
class A { protected $a = 5; protected $b = 10; }
$a = new A();
$refClass = ReflClass::create($a);

echo $refClass->getAnyPropertyValue('a') . "\n"; // prints 5
echo $refClass->getAnyPropertyValue('b') . "\n"; // prints 10

$refClass->setAnyPropertiesValues(array('a' => 10, 'b' => 20));

echo $refClass->getAnyPropertyValue('a') . "\n"; // prints 5
echo $refClass->getAnyPropertyValue('b') . "\n"; // prints 10
```

Other example, invoke a method:

```php
class A { function sum($a, $b) { return $a + $b; } }
$a = new A();

$method = (new \ReflectionClass($a))->getMethod('sum');
$method->setAccessible(true);
echo $method->invokeArgs($a, array(5, 3)) . "\n"; // prints 8
```

Using ReflClass:

```php
class A { function sum($a, $b) { return $a + $b; } }
$a = new A();

echo ReflClass::create($a)->invokeAnyMethod('sum', array(10, 3)); // prints 8
```

## Contributing ##

[All contributors](https://github.com/entering/ireflection/contributors)

See CONTRIBUTING file.

## License ##

IReflection library is released under the MIT License. See the bundled LICENSE file for details.

