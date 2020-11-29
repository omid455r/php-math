# PHP Math
Simple library for convert PHP math functions to objects.

#### Features:
- High human readable API
- Numbers manipulating
- Supported chain methods!

## Installation
- `php >= 7.0` is required
- `$ composer require ayzanet/php-math:^1.0`

## Basic Usage
``` php
// Normal usage
Math::abs(-56); // 56
Math::floor(-63.6); // 63
Math::pow(2,3); // 9
Math::isNan(10); // false
Math::round(5.6) // 6
Math::max([5, 3, 8]) // 8
Math::min([5, 3, 8]) // 3

// Use Chain Methods
(new Math(-10.6))::abs()::floor()::div(2)::get() // 5
(new Math(25))::sqrt()::pow(3)::get() // 125
```

###### Just See the code for other methods api!