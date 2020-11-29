<?php

declare(strict_types=1);

namespace Ayzanet\PhpMath;

use Ayzanet\PhpMath\Exceptions\MathException;

/**
 * @method static \Ayzanet\PhpMath\Math abs(float $number = null)
 * @method static \Ayzanet\PhpMath\Math acos(float $number = null)
 * @method static \Ayzanet\PhpMath\Math acosh(float $number = null)
 * @method static \Ayzanet\PhpMath\Math asin(float $number = null)
 * @method static \Ayzanet\PhpMath\Math asinh(float $number = null)
 * @method static \Ayzanet\PhpMath\Math atan(float $number = null)
 * @method static \Ayzanet\PhpMath\Math atanh(float $number = null)
 * @method static \Ayzanet\PhpMath\Math bindec(string $number = null)
 * @method static \Ayzanet\PhpMath\Math ceil(float $number = null)
 * @method static \Ayzanet\PhpMath\Math cos(float $number = null)
 * @method static \Ayzanet\PhpMath\Math cosh(float $number = null)
 * @method static \Ayzanet\PhpMath\Math decbin(int $number = null)
 * @method static \Ayzanet\PhpMath\Math dechex(int $number = null)
 * @method static \Ayzanet\PhpMath\Math decoct(int $number = null)
 * @method static \Ayzanet\PhpMath\Math deg2rad(float $number = null)
 * @method static \Ayzanet\PhpMath\Math exp(float $number = null)
 * @method static \Ayzanet\PhpMath\Math expm1(float $number = null)
 * @method static \Ayzanet\PhpMath\Math floor(float $number = null)
 * @method static \Ayzanet\PhpMath\Math hexdec(float $number = null)
 * @method static \Ayzanet\PhpMath\Math log10(float $number = null)
 * @method static \Ayzanet\PhpMath\Math log1p(float $number = null)
 * @method static \Ayzanet\PhpMath\Math octdec(string $number = null)
 * @method static \Ayzanet\PhpMath\Math rad2deg(float $number = null)
 * @method static \Ayzanet\PhpMath\Math round(float $number = null)
 * @method static \Ayzanet\PhpMath\Math sin(float $number = null)
 * @method static \Ayzanet\PhpMath\Math sinh(float $number = null)
 * @method static \Ayzanet\PhpMath\Math sqrt(float $number = null)
 * @method static \Ayzanet\PhpMath\Math tan(float $number = null)
 * @method static \Ayzanet\PhpMath\Math tanh(float $number = null)
 * @method static \Ayzanet\PhpMath\Math max(array $number = null)
 * @method static \Ayzanet\PhpMath\Math min(array $number = null)
 * @method static \Ayzanet\PhpMath\Math atan2(float $y, float $x)
 * @method static \Ayzanet\PhpMath\Math baseConvert(string $number, int $frombase, int $tobase)
 * @method static \Ayzanet\PhpMath\Math fmod(float $x, float $y)
 * @method static \Ayzanet\PhpMath\Math getrandmax()
 * @method static \Ayzanet\PhpMath\Math hypot(float $x, float $y)
 * @method static \Ayzanet\PhpMath\Math lcgValue()
 * @method static \Ayzanet\PhpMath\Math pi()
 * @method static \Ayzanet\PhpMath\Math rand(int $min, int $max)
 * @method static \Ayzanet\PhpMath\Math isFinite(float $number = null)
 * @method static \Ayzanet\PhpMath\Math isInfinite(float $number = null)
 * @method static \Ayzanet\PhpMath\Math isNan(float $number = null)
 */
final class Math {

    private static float $number = 0;
    private static self $this;
    private const METHODS = [
        'chain' => [
            'abs',
            'acos',
            'acosh',
            'asin',
            'asinh',
            'atan',
            'atanh',
            'bindec',
            'ceil',
            'cos',
            'cosh',
            'decbin',
            'dechex',
            'decoct',
            'deg2rad',
            'exp',
            'expm1',
            'floor',
            'hexdec',
            'log10',
            'log1p',
            'octdec',
            'rad2deg',
            'round',
            'sin',
            'sinh',
            'sqrt',
            'tan',
            'tanh',
        ],
        'normal' => [
            'atan2',
            'baseConvert',
            'fmod',
            'getrandmax',
            'hypot',
            'lcgValue',
            'pi',
            'rand',
            'max',
            'min',
            'isFinite',
            'isInfinite',
            'isNan',
        ]
    ];

    private static function _toSnakeCase($input) {
        return ltrim(strtolower(preg_replace('/[A-Z]([A-Z](?![a-z]))*/', '_$0', $input)), '_');
    }

    public function __construct($number) {
        self::$number = $number;
        self::$this = $this;
    }

    public static function __callStatic($name, $args) {

        if (in_array($name, self::METHODS['chain'])) {

            $name = self::_toSnakeCase($name);

            if (self::$number || self::$number === 0) {
                self::$number = call_user_func($name, self::$number);
                return self::$this;
            } else {
                return call_user_func($name, ...$args);
            }
        } elseif (in_array($name, self::METHODS['normal'])) {

            $name = self::_toSnakeCase($name);

            if (self::$number)
                throw new MathException($name . ' is not a chain method!');

            return call_user_func($name, ...$args);
        }

        throw new MathException('Method not found!');
    }

    public static function div(float $divisor, float $number = null) {
        if (self::$number || self::$number === 0) {
            self::$number = self::$number / $divisor;
            return self::$this;
        } else {
            return $number / $divisor;
        }
    }

    public static function pow(float $exp, float $number = null) {
        if (self::$number || self::$number === 0) {
            self::$number = pow(self::$number, $exp);
            return self::$this;
        } else {
            return pow($number, $exp);
        }
    }

    public static function log(float $base, float $number = null) {
        if (self::$number || self::$number === 0) {
            self::$number = log(self::$number, $base);
            return self::$this;
        } else {
            return log($number, $base);
        }
    }

    public static function get() {
        return self::$number;
    }
}