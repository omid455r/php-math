<?php

namespace Ayzanet\PhpMath\Tests;

use Ayzanet\PhpMath\Math;
use PHPUnit\Framework\TestCase;

final class MathTest extends TestCase {

    public function tests() {

        $this->assertEquals(Math::abs(-0), 0);
        $this->assertEquals(Math::abs(-10), 10);
        $this->assertEquals(Math::pow(2, 2), 4);
        $this->assertEquals(Math::div(2, 2), 1);
        $this->assertEquals(Math::rand(1, 1), 1);
        $this->assertEquals(Math::floor(5.6), 5);
        $this->assertEquals(Math::round(5.6), 6);
        $this->assertEquals(Math::isNan(8), false);
        $this->assertEquals(Math::max([5, 3, 8]), 8);

        $this->assertEquals((new Math(-10.6))::abs()::floor()::div(2)::get(), 5);
        $this->assertEquals((new Math(25))::sqrt()::pow(3)::get(), 125);
    }
}