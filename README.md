# IReflection #

Wrapper around PHP Reflection to make it easier to use.

[![Latest Stable Version](https://poser.pugx.org/eso/ireflection/v/stable.png)](https://packagist.org/packages/eso/ireflection) [![Build Status](https://travis-ci.org/entering/ireflection.png?branch=master)](https://travis-ci.org/entering/ireflection) [![Coverage Status](https://coveralls.io/repos/entering/ireflection/badge.png?branch=master)](https://coveralls.io/r/entering/ireflection?branch=master) [![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/entering/ireflection/badges/quality-score.png?s=b49478a20b162d700218ad3561c73956da5de7cb)](https://scrutinizer-ci.com/g/entering/ireflection/)

## Requirements ##

* PHP >= 5.3

## Installation ##

The recommended way to install is through composer.

Just create a `composer.json` file for your project:

``` json
{
    "require": {
        "eso/ireflection": "@stable"
    }
}
```

**Tip:** browse [`entering/ireflection`](https://packagist.org/packages/eso/ireflection) page to choose a stable version to use, avoid the `@stable` meta constraint.

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

## Contributing ##

[All contributors](https://github.com/entering/ireflection/contributors)

See CONTRIBUTING file.

## License ##

IReflection library is released under the MIT License. See the bundled LICENSE file for details.

