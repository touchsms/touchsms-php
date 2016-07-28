# touchSMS Gateway Class

[![Build Status](https://travis-ci.org/touchsms/touchsms-PHP-API.svg?branch=master)](https://travis-ci.org/touchsms/touchsms-PHP-API)
[![Latest Stable Version](https://poser.pugx.org/touchsms/touchsms/version)](https://packagist.org/packages/touchsms/touchsms)

### Get started

Before getting started you must have a valid [api key](https://platform.touchsms.com.au/apis/) for touchSMS.

### Installation

Use [Composer](https://getcomposer.org/) to keep up to date.

```
$ composer require touchsms/touchsms
```

### Initialize the class

```php
require_once('vendor/autoload.php');

use touchSMS\touchSMS;

$touchsms = new touchSMS('YOUR_API_ID', 'YOUR_API_PASSWORD');
```

### Examples

Provided in the [examples](https://github.com/touchsms/touchsms-PHP-API/tree/master/example) folder.