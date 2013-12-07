# IReflection #

Wrapper around PHP Reflection to make it easier to use.

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

**Tip:** browse [`entering/compress`](https://packagist.org/packages/eso/ireflection) page to choose a stable version to use, avoid the `@stable` meta constraint.

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

[All contributors](https://github.com/ebidtech/compress/contributors)

See CONTRIBUTING file.

## License ##

IReflection library is released under the MIT License. See the bundled LICENSE file for details.

