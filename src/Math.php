<?php

declare(strict_types=1);

namespace Ayzanet\PhpMath;

use Ayzanet\PhpMath\Exceptions\MathException;

final class Math {

    private static float $number = 0;
    private static self $this;

    private static function _callDynamicFunc($function, $args) {

        if (!$function)
            throw new MathException('Undefined function name.');

        if (self::$number || self::$number === 0) {
            self::$number = call_user_func($function, self::$number);
            return self::$this;
        } else {

            if (!isset($args[0]))
                throw new MathException('at least 1 parameter is required.');

            return call_user_func($function, $args[0]);
        }
    }

    public function __construct(float $number) {
        self::$number = $number;
        self::$this = $this;
    }

    // Chaining methods
    public static function abs(float $number = null) {
        return self::_callDynamicFunc(__FUNCTION__, func_get_args());
    }

    public static function acos(float $number = null) {
        return self::_callDynamicFunc(__FUNCTION__, func_get_args());
    }

    public static function acosh(float $number = null) {
        return self::_callDynamicFunc(__FUNCTION__, func_get_args());
    }

    public static function asin(float $number = null) {
        return self::_callDynamicFunc(__FUNCTION__, func_get_args());
    }

    public static function asinh(float $number = null) {
        return self::_callDynamicFunc(__FUNCTION__, func_get_args());
    }

    public static function atan(float $number = null) {
        return self::_callDynamicFunc(__FUNCTION__, func_get_args());
    }

    public static function atanh(float $number = null) {
        return self::_callDynamicFunc(__FUNCTION__, func_get_args());
    }

    public static function bindec(float $number = null) {
        return self::_callDynamicFunc(__FUNCTION__, func_get_args());
    }

    public static function ceil(float $number = null) {
        return self::_callDynamicFunc(__FUNCTION__, func_get_args());
    }

    public static function cos(float $number = null) {
        return self::_callDynamicFunc(__FUNCTION__, func_get_args());
    }

    public static function cosh(float $number = null) {
        return self::_callDynamicFunc(__FUNCTION__, func_get_args());
    }

    public static function decbin(int $number = null) {
        return self::_callDynamicFunc(__FUNCTION__, func_get_args());
    }

    public static function dechex(int $number = null) {
        return self::_callDynamicFunc(__FUNCTION__, func_get_args());
    }

    public static function decoct(int $number = null) {
        return self::_callDynamicFunc(__FUNCTION__, func_get_args());
    }

    public static function deg2rad(float $number = null) {
        return self::_callDynamicFunc(__FUNCTION__, func_get_args());
    }

    public static function exp(float $number = null) {
        return self::_callDynamicFunc(__FUNCTION__, func_get_args());
    }

    public static function expm1(float $number = null) {
        return self::_callDynamicFunc(__FUNCTION__, func_get_args());
    }

    public static function floor(float $number = null) {
        return self::_callDynamicFunc(__FUNCTION__, func_get_args());
    }

    public static function hexdec(string $number = null) {
        return self::_callDynamicFunc(__FUNCTION__, func_get_args());
    }

    public static function log10(float $number = null) {
        return self::_callDynamicFunc(__FUNCTION__, func_get_args());
    }

    public static function log1p(float $number = null) {
        return self::_callDynamicFunc(__FUNCTION__, func_get_args());
    }

    public static function octdec(string $number = null) {
        return self::_callDynamicFunc(__FUNCTION__, func_get_args());
    }

    public static function rad2deg(float $number = null) {
        return self::_callDynamicFunc(__FUNCTION__, func_get_args());
    }

    public static function round(float $number = null) {
        return self::_callDynamicFunc(__FUNCTION__, func_get_args());
    }

    public static function sin(float $number = null) {
        return self::_callDynamicFunc(__FUNCTION__, func_get_args());
    }

    public static function sinh(float $number = null) {
        return self::_callDynamicFunc(__FUNCTION__, func_get_args());
    }

    public static function sqrt(float $number = null) {
        return self::_callDynamicFunc(__FUNCTION__, func_get_args());
    }

    public static function tan(float $number = null) {
        return self::_callDynamicFunc(__FUNCTION__, func_get_args());
    }

    public static function tanh(float $number = null) {
        return self::_callDynamicFunc(__FUNCTION__, func_get_args());
    }

    public static function max(array $numbers = null) {
        return self::_callDynamicFunc(__FUNCTION__, func_get_args());
    }

    public static function min(array $numbers = null) {
        return self::_callDynamicFunc(__FUNCTION__, func_get_args());
    }

    public static function div(float $divisor, float $number = null) {
        if (self::$number) {
            self::$number = self::$number / $divisor;
            return self::$this;
        } else {
            return $number / $divisor;
        }
    }

    public static function pow(float $exp, float $number = null) {
        if (self::$number) {
            self::$number = pow(self::$number, $exp);
            return self::$this;
        } else {
            return pow($number, $exp);
        }
    }

    public static function log(float $base, float $number = null) {
        if (self::$number) {
            self::$number = log(self::$number, $base);
            return self::$this;
        } else {
            return log($number, $base);
        }
    }

    // Normal methods
    public static function atan2(float $y, float $x): float {
        if (self::$number)
            throw new MathException(__FUNCTION__ . ' is not a chain method!');

        return atan2($y, $x);
    }

    public static function baseConvert(string $number, int $frombase, int $tobase): string {
        if (self::$number)
            throw new MathException(__FUNCTION__ . ' is not a chain method!');

        return base_convert($number, $frombase, $tobase);
    }

    public static function fmod(float $x, float $y): float {
        if (self::$number)
            throw new MathException(__FUNCTION__ . ' is not a chain method!');

        return fmod($x, $y);
    }

    public static function getRandMax(): int {
        if (self::$number)
            throw new MathException(__FUNCTION__ . ' is not a chain method!');

        return getrandmax();
    }

    public static function hypot(float $x, float $y): float {
        if (self::$number)
            throw new MathException(__FUNCTION__ . ' is not a chain method!');

        return hypot($x, $y);
    }

    public static function lgcValue(): float {
        if (self::$number)
            throw new MathException(__FUNCTION__ . ' is not a chain method!');

        return lcg_value();
    }

    public static function pi(): float {
        if (self::$number)
            throw new MathException(__FUNCTION__ . ' is not a chain method!');

        return pi();
    }

    public static function rand($min, $max) {
        if (self::$number)
            throw new MathException(__FUNCTION__ . ' is not a chain method!');

        return rand($min, $max);
    }

    // Validation methods
    public static function isFinite(float $number): bool {
        if (self::$number)
            throw new MathException(__FUNCTION__ . ' is not a chain method!');

        return is_finite($number);
    }

    public static function isInfinite(float $number): bool {
        if (self::$number)
            throw new MathException(__FUNCTION__ . ' is not a chain method!');

        return is_infinite($number);
    }

    public static function isNan(float $number): bool {
        if (self::$number)
            throw new MathException(__FUNCTION__ . ' is not a chain method!');

        return is_nan($number);
    }

    // Get chain result
    public static function get() {
        return self::$number;
    }
}