# PHP Math
Simple library for convert PHP math functions to objects.

#### Features:
- High human readable API
- Numbers manipulating
- Supported chain methods!

## Installation
- `php >= 7.0` is required
- `$ composer require ayzanet/php-math:1.*`
- `$ composer update`

## Basic Usage
``` php
// Normal usage
Math::abs(-56); // 56
Math::floor(-63.6); // 63
Math::pow(2,3); // 9
Math::isNan(10); // false

// Use Chain Methods
(new Math(-10.6))->abs()->floor()->div(2)->get() // 5
```

##### Just See the code for other methods!