<?php

namespace RectorPrefix202308\Webmozart\Assert;

use ArrayAccess;
use Closure;
use Countable;
use Throwable;
/**
 * This trait provides nurllOr*, all* and allNullOr* variants of assertion base methods.
 * Do not use this trait directly: it will change, and is not designed for reuse.
 */
trait Mixin
{
    /**
     * @psalm-pure
     * @psalm-assert string|null $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrString(mixed $value, $message = '')
    {
        null === $value || static::string($value, $message);
    }
    /**
     * @psalm-pure
     * @psalm-assert iterable<string> $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allString(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::string($entry, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert iterable<string|null> $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrString(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::string($entry, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert non-empty-string|null $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrStringNotEmpty(mixed $value, $message = '')
    {
        null === $value || static::stringNotEmpty($value, $message);
    }
    /**
     * @psalm-pure
     * @psalm-assert iterable<non-empty-string> $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allStringNotEmpty(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::stringNotEmpty($entry, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert iterable<non-empty-string|null> $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrStringNotEmpty(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::stringNotEmpty($entry, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert int|null $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrInteger(mixed $value, $message = '')
    {
        null === $value || static::integer($value, $message);
    }
    /**
     * @psalm-pure
     * @psalm-assert iterable<int> $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allInteger(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::integer($entry, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert iterable<int|null> $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrInteger(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::integer($entry, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert numeric|null $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrIntegerish(mixed $value, $message = '')
    {
        null === $value || static::integerish($value, $message);
    }
    /**
     * @psalm-pure
     * @psalm-assert iterable<numeric> $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allIntegerish(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::integerish($entry, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert iterable<numeric|null> $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrIntegerish(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::integerish($entry, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert positive-int|null $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrPositiveInteger(mixed $value, $message = '')
    {
        null === $value || static::positiveInteger($value, $message);
    }
    /**
     * @psalm-pure
     * @psalm-assert iterable<positive-int> $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allPositiveInteger(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::positiveInteger($entry, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert iterable<positive-int|null> $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrPositiveInteger(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::positiveInteger($entry, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert float|null $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrFloat(mixed $value, $message = '')
    {
        null === $value || static::float($value, $message);
    }
    /**
     * @psalm-pure
     * @psalm-assert iterable<float> $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allFloat(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::float($entry, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert iterable<float|null> $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrFloat(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::float($entry, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert numeric|null $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrNumeric(mixed $value, $message = '')
    {
        null === $value || static::numeric($value, $message);
    }
    /**
     * @psalm-pure
     * @psalm-assert iterable<numeric> $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNumeric(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::numeric($entry, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert iterable<numeric|null> $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrNumeric(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::numeric($entry, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert positive-int|0|null $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrNatural(mixed $value, $message = '')
    {
        null === $value || static::natural($value, $message);
    }
    /**
     * @psalm-pure
     * @psalm-assert iterable<positive-int|0> $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNatural(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::natural($entry, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert iterable<positive-int|0|null> $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrNatural(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::natural($entry, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert bool|null $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrBoolean(mixed $value, $message = '')
    {
        null === $value || static::boolean($value, $message);
    }
    /**
     * @psalm-pure
     * @psalm-assert iterable<bool> $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allBoolean(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::boolean($entry, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert iterable<bool|null> $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrBoolean(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::boolean($entry, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert scalar|null $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrScalar(mixed $value, $message = '')
    {
        null === $value || static::scalar($value, $message);
    }
    /**
     * @psalm-pure
     * @psalm-assert iterable<scalar> $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allScalar(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::scalar($entry, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert iterable<scalar|null> $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrScalar(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::scalar($entry, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert object|null $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrObject(mixed $value, $message = '')
    {
        null === $value || static::object($value, $message);
    }
    /**
     * @psalm-pure
     * @psalm-assert iterable<object> $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allObject(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::object($entry, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert iterable<object|null> $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrObject(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::object($entry, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert resource|null $value
     *
     * @param string|null $type    type of resource this should be. @see https://www.php.net/manual/en/function.get-resource-type.php
     * @param string      $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrResource(mixed $value, $type = null, $message = '')
    {
        null === $value || static::resource($value, $type, $message);
    }
    /**
     * @psalm-pure
     * @psalm-assert iterable<resource> $value
     *
     * @param string|null $type    type of resource this should be. @see https://www.php.net/manual/en/function.get-resource-type.php
     * @param string      $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allResource(mixed $value, $type = null, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::resource($entry, $type, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert iterable<resource|null> $value
     *
     * @param string|null $type    type of resource this should be. @see https://www.php.net/manual/en/function.get-resource-type.php
     * @param string      $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrResource(mixed $value, $type = null, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::resource($entry, $type, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert callable|null $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrIsCallable(mixed $value, $message = '')
    {
        null === $value || static::isCallable($value, $message);
    }
    /**
     * @psalm-pure
     * @psalm-assert iterable<callable> $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allIsCallable(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::isCallable($entry, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert iterable<callable|null> $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrIsCallable(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::isCallable($entry, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert array|null $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrIsArray(mixed $value, $message = '')
    {
        null === $value || static::isArray($value, $message);
    }
    /**
     * @psalm-pure
     * @psalm-assert iterable<array> $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allIsArray(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::isArray($entry, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert iterable<array|null> $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrIsArray(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::isArray($entry, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert iterable|null $value
     *
     * @deprecated use "isIterable" or "isInstanceOf" instead
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrIsTraversable(mixed $value, $message = '')
    {
        null === $value || static::isTraversable($value, $message);
    }
    /**
     * @psalm-pure
     * @psalm-assert iterable<iterable> $value
     *
     * @deprecated use "isIterable" or "isInstanceOf" instead
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allIsTraversable(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::isTraversable($entry, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert iterable<iterable|null> $value
     *
     * @deprecated use "isIterable" or "isInstanceOf" instead
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrIsTraversable(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::isTraversable($entry, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert array|ArrayAccess|null $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrIsArrayAccessible(mixed $value, $message = '')
    {
        null === $value || static::isArrayAccessible($value, $message);
    }
    /**
     * @psalm-pure
     * @psalm-assert iterable<array|ArrayAccess> $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allIsArrayAccessible(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::isArrayAccessible($entry, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert iterable<array|ArrayAccess|null> $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrIsArrayAccessible(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::isArrayAccessible($entry, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert countable|null $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrIsCountable(mixed $value, $message = '')
    {
        null === $value || static::isCountable($value, $message);
    }
    /**
     * @psalm-pure
     * @psalm-assert iterable<countable> $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allIsCountable(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::isCountable($entry, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert iterable<countable|null> $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrIsCountable(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::isCountable($entry, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert iterable|null $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrIsIterable(mixed $value, $message = '')
    {
        null === $value || static::isIterable($value, $message);
    }
    /**
     * @psalm-pure
     * @psalm-assert iterable<iterable> $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allIsIterable(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::isIterable($entry, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert iterable<iterable|null> $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrIsIterable(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::isIterable($entry, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-template ExpectedType of object
     * @psalm-param class-string<ExpectedType> $class
     * @psalm-assert ExpectedType|null $value
     *
     * @param string|object $class
     * @param string        $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrIsInstanceOf(mixed $value, $class, $message = '')
    {
        null === $value || static::isInstanceOf($value, $class, $message);
    }
    /**
     * @psalm-pure
     * @psalm-template ExpectedType of object
     * @psalm-param class-string<ExpectedType> $class
     * @psalm-assert iterable<ExpectedType> $value
     *
     * @param string|object $class
     * @param string        $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allIsInstanceOf(mixed $value, $class, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::isInstanceOf($entry, $class, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-template ExpectedType of object
     * @psalm-param class-string<ExpectedType> $class
     * @psalm-assert iterable<ExpectedType|null> $value
     *
     * @param string|object $class
     * @param string        $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrIsInstanceOf(mixed $value, $class, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::isInstanceOf($entry, $class, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-template ExpectedType of object
     * @psalm-param class-string<ExpectedType> $class
     *
     * @param string|object $class
     * @param string        $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrNotInstanceOf(mixed $value, $class, $message = '')
    {
        null === $value || static::notInstanceOf($value, $class, $message);
    }
    /**
     * @psalm-pure
     * @psalm-template ExpectedType of object
     * @psalm-param class-string<ExpectedType> $class
     *
     * @param string|object $class
     * @param string        $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNotInstanceOf(mixed $value, $class, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::notInstanceOf($entry, $class, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-template ExpectedType of object
     * @psalm-param class-string<ExpectedType> $class
     * @psalm-assert iterable<!ExpectedType|null> $value
     *
     * @param string|object $class
     * @param string        $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrNotInstanceOf(mixed $value, $class, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::notInstanceOf($entry, $class, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-param array<class-string> $classes
     *
     * @param array<object|string> $classes
     * @param string               $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrIsInstanceOfAny(mixed $value, $classes, $message = '')
    {
        null === $value || static::isInstanceOfAny($value, $classes, $message);
    }
    /**
     * @psalm-pure
     * @psalm-param array<class-string> $classes
     *
     * @param array<object|string> $classes
     * @param string               $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allIsInstanceOfAny(mixed $value, $classes, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::isInstanceOfAny($entry, $classes, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-param array<class-string> $classes
     *
     * @param array<object|string> $classes
     * @param string               $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrIsInstanceOfAny(mixed $value, $classes, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::isInstanceOfAny($entry, $classes, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-template ExpectedType of object
     * @psalm-param class-string<ExpectedType> $class
     * @psalm-assert ExpectedType|class-string<ExpectedType>|null $value
     *
     * @param object|string|null $value
     * @param string             $class
     * @param string             $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrIsAOf($value, $class, $message = '')
    {
        null === $value || static::isAOf($value, $class, $message);
    }
    /**
     * @psalm-pure
     * @psalm-template ExpectedType of object
     * @psalm-param class-string<ExpectedType> $class
     * @psalm-assert iterable<ExpectedType|class-string<ExpectedType>> $value
     *
     * @param iterable<object|string> $value
     * @param string                  $class
     * @param string                  $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allIsAOf($value, $class, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::isAOf($entry, $class, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-template ExpectedType of object
     * @psalm-param class-string<ExpectedType> $class
     * @psalm-assert iterable<ExpectedType|class-string<ExpectedType>|null> $value
     *
     * @param iterable<object|string|null> $value
     * @param string                       $class
     * @param string                       $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrIsAOf($value, $class, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::isAOf($entry, $class, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-template UnexpectedType of object
     * @psalm-param class-string<UnexpectedType> $class
     *
     * @param object|string|null $value
     * @param string             $class
     * @param string             $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrIsNotA($value, $class, $message = '')
    {
        null === $value || static::isNotA($value, $class, $message);
    }
    /**
     * @psalm-pure
     * @psalm-template UnexpectedType of object
     * @psalm-param class-string<UnexpectedType> $class
     *
     * @param iterable<object|string> $value
     * @param string                  $class
     * @param string                  $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allIsNotA($value, $class, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::isNotA($entry, $class, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-template UnexpectedType of object
     * @psalm-param class-string<UnexpectedType> $class
     * @psalm-assert iterable<!UnexpectedType|null> $value
     * @psalm-assert iterable<!class-string<UnexpectedType>|null> $value
     *
     * @param iterable<object|string|null> $value
     * @param string                       $class
     * @param string                       $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrIsNotA($value, $class, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::isNotA($entry, $class, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-param array<class-string> $classes
     *
     * @param object|string|null $value
     * @param string[]           $classes
     * @param string             $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrIsAnyOf($value, $classes, $message = '')
    {
        null === $value || static::isAnyOf($value, $classes, $message);
    }
    /**
     * @psalm-pure
     * @psalm-param array<class-string> $classes
     *
     * @param iterable<object|string> $value
     * @param string[]                $classes
     * @param string                  $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allIsAnyOf($value, $classes, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::isAnyOf($entry, $classes, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-param array<class-string> $classes
     *
     * @param iterable<object|string|null> $value
     * @param string[]                     $classes
     * @param string                       $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrIsAnyOf($value, $classes, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::isAnyOf($entry, $classes, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert empty $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrIsEmpty(mixed $value, $message = '')
    {
        null === $value || static::isEmpty($value, $message);
    }
    /**
     * @psalm-pure
     * @psalm-assert iterable<empty> $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allIsEmpty(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::isEmpty($entry, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert iterable<empty|null> $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrIsEmpty(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::isEmpty($entry, $message);
        }
    }
    /**
     * @psalm-pure
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrNotEmpty(mixed $value, $message = '')
    {
        null === $value || static::notEmpty($value, $message);
    }
    /**
     * @psalm-pure
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNotEmpty(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::notEmpty($entry, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert iterable<!empty|null> $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrNotEmpty(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::notEmpty($entry, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert iterable<null> $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNull(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::null($entry, $message);
        }
    }
    /**
     * @psalm-pure
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNotNull(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::notNull($entry, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert true|null $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrTrue(mixed $value, $message = '')
    {
        null === $value || static::true($value, $message);
    }
    /**
     * @psalm-pure
     * @psalm-assert iterable<true> $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allTrue(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::true($entry, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert iterable<true|null> $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrTrue(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::true($entry, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert false|null $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrFalse(mixed $value, $message = '')
    {
        null === $value || static::false($value, $message);
    }
    /**
     * @psalm-pure
     * @psalm-assert iterable<false> $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allFalse(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::false($entry, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert iterable<false|null> $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrFalse(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::false($entry, $message);
        }
    }
    /**
     * @psalm-pure
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrNotFalse(mixed $value, $message = '')
    {
        null === $value || static::notFalse($value, $message);
    }
    /**
     * @psalm-pure
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNotFalse(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::notFalse($entry, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert iterable<!false|null> $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrNotFalse(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::notFalse($entry, $message);
        }
    }
    /**
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrIp(mixed $value, $message = '')
    {
        null === $value || static::ip($value, $message);
    }
    /**
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allIp(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::ip($entry, $message);
        }
    }
    /**
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrIp(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::ip($entry, $message);
        }
    }
    /**
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrIpv4(mixed $value, $message = '')
    {
        null === $value || static::ipv4($value, $message);
    }
    /**
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allIpv4(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::ipv4($entry, $message);
        }
    }
    /**
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrIpv4(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::ipv4($entry, $message);
        }
    }
    /**
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrIpv6(mixed $value, $message = '')
    {
        null === $value || static::ipv6($value, $message);
    }
    /**
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allIpv6(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::ipv6($entry, $message);
        }
    }
    /**
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrIpv6(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::ipv6($entry, $message);
        }
    }
    /**
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrEmail(mixed $value, $message = '')
    {
        null === $value || static::email($value, $message);
    }
    /**
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allEmail(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::email($entry, $message);
        }
    }
    /**
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrEmail(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::email($entry, $message);
        }
    }
    /**
     * @param array|null $values
     * @param string     $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrUniqueValues($values, $message = '')
    {
        null === $values || static::uniqueValues($values, $message);
    }
    /**
     * @param iterable<array> $values
     * @param string          $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allUniqueValues($values, $message = '')
    {
        static::isIterable($values);
        foreach ($values as $entry) {
            static::uniqueValues($entry, $message);
        }
    }
    /**
     * @param iterable<array|null> $values
     * @param string               $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrUniqueValues($values, $message = '')
    {
        static::isIterable($values);
        foreach ($values as $entry) {
            null === $entry || static::uniqueValues($entry, $message);
        }
    }
    /**
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrEq(mixed $value, mixed $expect, $message = '')
    {
        null === $value || static::eq($value, $expect, $message);
    }
    /**
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allEq(mixed $value, mixed $expect, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::eq($entry, $expect, $message);
        }
    }
    /**
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrEq(mixed $value, mixed $expect, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::eq($entry, $expect, $message);
        }
    }
    /**
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrNotEq(mixed $value, mixed $expect, $message = '')
    {
        null === $value || static::notEq($value, $expect, $message);
    }
    /**
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNotEq(mixed $value, mixed $expect, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::notEq($entry, $expect, $message);
        }
    }
    /**
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrNotEq(mixed $value, mixed $expect, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::notEq($entry, $expect, $message);
        }
    }
    /**
     * @psalm-pure
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrSame(mixed $value, mixed $expect, $message = '')
    {
        null === $value || static::same($value, $expect, $message);
    }
    /**
     * @psalm-pure
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allSame(mixed $value, mixed $expect, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::same($entry, $expect, $message);
        }
    }
    /**
     * @psalm-pure
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrSame(mixed $value, mixed $expect, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::same($entry, $expect, $message);
        }
    }
    /**
     * @psalm-pure
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrNotSame(mixed $value, mixed $expect, $message = '')
    {
        null === $value || static::notSame($value, $expect, $message);
    }
    /**
     * @psalm-pure
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNotSame(mixed $value, mixed $expect, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::notSame($entry, $expect, $message);
        }
    }
    /**
     * @psalm-pure
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrNotSame(mixed $value, mixed $expect, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::notSame($entry, $expect, $message);
        }
    }
    /**
     * @psalm-pure
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrGreaterThan(mixed $value, mixed $limit, $message = '')
    {
        null === $value || static::greaterThan($value, $limit, $message);
    }
    /**
     * @psalm-pure
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allGreaterThan(mixed $value, mixed $limit, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::greaterThan($entry, $limit, $message);
        }
    }
    /**
     * @psalm-pure
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrGreaterThan(mixed $value, mixed $limit, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::greaterThan($entry, $limit, $message);
        }
    }
    /**
     * @psalm-pure
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrGreaterThanEq(mixed $value, mixed $limit, $message = '')
    {
        null === $value || static::greaterThanEq($value, $limit, $message);
    }
    /**
     * @psalm-pure
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allGreaterThanEq(mixed $value, mixed $limit, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::greaterThanEq($entry, $limit, $message);
        }
    }
    /**
     * @psalm-pure
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrGreaterThanEq(mixed $value, mixed $limit, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::greaterThanEq($entry, $limit, $message);
        }
    }
    /**
     * @psalm-pure
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrLessThan(mixed $value, mixed $limit, $message = '')
    {
        null === $value || static::lessThan($value, $limit, $message);
    }
    /**
     * @psalm-pure
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allLessThan(mixed $value, mixed $limit, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::lessThan($entry, $limit, $message);
        }
    }
    /**
     * @psalm-pure
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrLessThan(mixed $value, mixed $limit, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::lessThan($entry, $limit, $message);
        }
    }
    /**
     * @psalm-pure
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrLessThanEq(mixed $value, mixed $limit, $message = '')
    {
        null === $value || static::lessThanEq($value, $limit, $message);
    }
    /**
     * @psalm-pure
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allLessThanEq(mixed $value, mixed $limit, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::lessThanEq($entry, $limit, $message);
        }
    }
    /**
     * @psalm-pure
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrLessThanEq(mixed $value, mixed $limit, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::lessThanEq($entry, $limit, $message);
        }
    }
    /**
     * @psalm-pure
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrRange(mixed $value, mixed $min, mixed $max, $message = '')
    {
        null === $value || static::range($value, $min, $max, $message);
    }
    /**
     * @psalm-pure
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allRange(mixed $value, mixed $min, mixed $max, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::range($entry, $min, $max, $message);
        }
    }
    /**
     * @psalm-pure
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrRange(mixed $value, mixed $min, mixed $max, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::range($entry, $min, $max, $message);
        }
    }
    /**
     * @psalm-pure
     *
     * @param array  $values
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrOneOf(mixed $value, $values, $message = '')
    {
        null === $value || static::oneOf($value, $values, $message);
    }
    /**
     * @psalm-pure
     *
     * @param array  $values
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allOneOf(mixed $value, $values, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::oneOf($entry, $values, $message);
        }
    }
    /**
     * @psalm-pure
     *
     * @param array  $values
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrOneOf(mixed $value, $values, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::oneOf($entry, $values, $message);
        }
    }
    /**
     * @psalm-pure
     *
     * @param array  $values
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrInArray(mixed $value, $values, $message = '')
    {
        null === $value || static::inArray($value, $values, $message);
    }
    /**
     * @psalm-pure
     *
     * @param array  $values
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allInArray(mixed $value, $values, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::inArray($entry, $values, $message);
        }
    }
    /**
     * @psalm-pure
     *
     * @param array  $values
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrInArray(mixed $value, $values, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::inArray($entry, $values, $message);
        }
    }
    /**
     * @psalm-pure
     *
     * @param string|null $value
     * @param string      $subString
     * @param string      $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrContains($value, $subString, $message = '')
    {
        null === $value || static::contains($value, $subString, $message);
    }
    /**
     * @psalm-pure
     *
     * @param iterable<string> $value
     * @param string           $subString
     * @param string           $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allContains($value, $subString, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::contains($entry, $subString, $message);
        }
    }
    /**
     * @psalm-pure
     *
     * @param iterable<string|null> $value
     * @param string                $subString
     * @param string                $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrContains($value, $subString, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::contains($entry, $subString, $message);
        }
    }
    /**
     * @psalm-pure
     *
     * @param string|null $value
     * @param string      $subString
     * @param string      $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrNotContains($value, $subString, $message = '')
    {
        null === $value || static::notContains($value, $subString, $message);
    }
    /**
     * @psalm-pure
     *
     * @param iterable<string> $value
     * @param string           $subString
     * @param string           $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNotContains($value, $subString, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::notContains($entry, $subString, $message);
        }
    }
    /**
     * @psalm-pure
     *
     * @param iterable<string|null> $value
     * @param string                $subString
     * @param string                $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrNotContains($value, $subString, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::notContains($entry, $subString, $message);
        }
    }
    /**
     * @psalm-pure
     *
     * @param string|null $value
     * @param string      $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrNotWhitespaceOnly($value, $message = '')
    {
        null === $value || static::notWhitespaceOnly($value, $message);
    }
    /**
     * @psalm-pure
     *
     * @param iterable<string> $value
     * @param string           $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNotWhitespaceOnly($value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::notWhitespaceOnly($entry, $message);
        }
    }
    /**
     * @psalm-pure
     *
     * @param iterable<string|null> $value
     * @param string                $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrNotWhitespaceOnly($value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::notWhitespaceOnly($entry, $message);
        }
    }
    /**
     * @psalm-pure
     *
     * @param string|null $value
     * @param string      $prefix
     * @param string      $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrStartsWith($value, $prefix, $message = '')
    {
        null === $value || static::startsWith($value, $prefix, $message);
    }
    /**
     * @psalm-pure
     *
     * @param iterable<string> $value
     * @param string           $prefix
     * @param string           $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allStartsWith($value, $prefix, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::startsWith($entry, $prefix, $message);
        }
    }
    /**
     * @psalm-pure
     *
     * @param iterable<string|null> $value
     * @param string                $prefix
     * @param string                $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrStartsWith($value, $prefix, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::startsWith($entry, $prefix, $message);
        }
    }
    /**
     * @psalm-pure
     *
     * @param string|null $value
     * @param string      $prefix
     * @param string      $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrNotStartsWith($value, $prefix, $message = '')
    {
        null === $value || static::notStartsWith($value, $prefix, $message);
    }
    /**
     * @psalm-pure
     *
     * @param iterable<string> $value
     * @param string           $prefix
     * @param string           $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNotStartsWith($value, $prefix, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::notStartsWith($entry, $prefix, $message);
        }
    }
    /**
     * @psalm-pure
     *
     * @param iterable<string|null> $value
     * @param string                $prefix
     * @param string                $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrNotStartsWith($value, $prefix, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::notStartsWith($entry, $prefix, $message);
        }
    }
    /**
     * @psalm-pure
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrStartsWithLetter(mixed $value, $message = '')
    {
        null === $value || static::startsWithLetter($value, $message);
    }
    /**
     * @psalm-pure
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allStartsWithLetter(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::startsWithLetter($entry, $message);
        }
    }
    /**
     * @psalm-pure
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrStartsWithLetter(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::startsWithLetter($entry, $message);
        }
    }
    /**
     * @psalm-pure
     *
     * @param string|null $value
     * @param string      $suffix
     * @param string      $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrEndsWith($value, $suffix, $message = '')
    {
        null === $value || static::endsWith($value, $suffix, $message);
    }
    /**
     * @psalm-pure
     *
     * @param iterable<string> $value
     * @param string           $suffix
     * @param string           $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allEndsWith($value, $suffix, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::endsWith($entry, $suffix, $message);
        }
    }
    /**
     * @psalm-pure
     *
     * @param iterable<string|null> $value
     * @param string                $suffix
     * @param string                $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrEndsWith($value, $suffix, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::endsWith($entry, $suffix, $message);
        }
    }
    /**
     * @psalm-pure
     *
     * @param string|null $value
     * @param string      $suffix
     * @param string      $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrNotEndsWith($value, $suffix, $message = '')
    {
        null === $value || static::notEndsWith($value, $suffix, $message);
    }
    /**
     * @psalm-pure
     *
     * @param iterable<string> $value
     * @param string           $suffix
     * @param string           $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNotEndsWith($value, $suffix, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::notEndsWith($entry, $suffix, $message);
        }
    }
    /**
     * @psalm-pure
     *
     * @param iterable<string|null> $value
     * @param string                $suffix
     * @param string                $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrNotEndsWith($value, $suffix, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::notEndsWith($entry, $suffix, $message);
        }
    }
    /**
     * @psalm-pure
     *
     * @param string|null $value
     * @param string      $pattern
     * @param string      $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrRegex($value, $pattern, $message = '')
    {
        null === $value || static::regex($value, $pattern, $message);
    }
    /**
     * @psalm-pure
     *
     * @param iterable<string> $value
     * @param string           $pattern
     * @param string           $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allRegex($value, $pattern, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::regex($entry, $pattern, $message);
        }
    }
    /**
     * @psalm-pure
     *
     * @param iterable<string|null> $value
     * @param string                $pattern
     * @param string                $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrRegex($value, $pattern, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::regex($entry, $pattern, $message);
        }
    }
    /**
     * @psalm-pure
     *
     * @param string|null $value
     * @param string      $pattern
     * @param string      $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrNotRegex($value, $pattern, $message = '')
    {
        null === $value || static::notRegex($value, $pattern, $message);
    }
    /**
     * @psalm-pure
     *
     * @param iterable<string> $value
     * @param string           $pattern
     * @param string           $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNotRegex($value, $pattern, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::notRegex($entry, $pattern, $message);
        }
    }
    /**
     * @psalm-pure
     *
     * @param iterable<string|null> $value
     * @param string                $pattern
     * @param string                $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrNotRegex($value, $pattern, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::notRegex($entry, $pattern, $message);
        }
    }
    /**
     * @psalm-pure
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrUnicodeLetters(mixed $value, $message = '')
    {
        null === $value || static::unicodeLetters($value, $message);
    }
    /**
     * @psalm-pure
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allUnicodeLetters(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::unicodeLetters($entry, $message);
        }
    }
    /**
     * @psalm-pure
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrUnicodeLetters(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::unicodeLetters($entry, $message);
        }
    }
    /**
     * @psalm-pure
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrAlpha(mixed $value, $message = '')
    {
        null === $value || static::alpha($value, $message);
    }
    /**
     * @psalm-pure
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allAlpha(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::alpha($entry, $message);
        }
    }
    /**
     * @psalm-pure
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrAlpha(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::alpha($entry, $message);
        }
    }
    /**
     * @psalm-pure
     *
     * @param string|null $value
     * @param string      $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrDigits($value, $message = '')
    {
        null === $value || static::digits($value, $message);
    }
    /**
     * @psalm-pure
     *
     * @param iterable<string> $value
     * @param string           $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allDigits($value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::digits($entry, $message);
        }
    }
    /**
     * @psalm-pure
     *
     * @param iterable<string|null> $value
     * @param string                $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrDigits($value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::digits($entry, $message);
        }
    }
    /**
     * @psalm-pure
     *
     * @param string|null $value
     * @param string      $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrAlnum($value, $message = '')
    {
        null === $value || static::alnum($value, $message);
    }
    /**
     * @psalm-pure
     *
     * @param iterable<string> $value
     * @param string           $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allAlnum($value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::alnum($entry, $message);
        }
    }
    /**
     * @psalm-pure
     *
     * @param iterable<string|null> $value
     * @param string                $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrAlnum($value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::alnum($entry, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert lowercase-string|null $value
     *
     * @param string|null $value
     * @param string      $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrLower($value, $message = '')
    {
        null === $value || static::lower($value, $message);
    }
    /**
     * @psalm-pure
     * @psalm-assert iterable<lowercase-string> $value
     *
     * @param iterable<string> $value
     * @param string           $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allLower($value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::lower($entry, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert iterable<lowercase-string|null> $value
     *
     * @param iterable<string|null> $value
     * @param string                $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrLower($value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::lower($entry, $message);
        }
    }
    /**
     * @psalm-pure
     *
     * @param string|null $value
     * @param string      $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrUpper($value, $message = '')
    {
        null === $value || static::upper($value, $message);
    }
    /**
     * @psalm-pure
     *
     * @param iterable<string> $value
     * @param string           $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allUpper($value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::upper($entry, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert iterable<!lowercase-string|null> $value
     *
     * @param iterable<string|null> $value
     * @param string                $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrUpper($value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::upper($entry, $message);
        }
    }
    /**
     * @psalm-pure
     *
     * @param string|null $value
     * @param int         $length
     * @param string      $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrLength($value, $length, $message = '')
    {
        null === $value || static::length($value, $length, $message);
    }
    /**
     * @psalm-pure
     *
     * @param iterable<string> $value
     * @param int              $length
     * @param string           $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allLength($value, $length, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::length($entry, $length, $message);
        }
    }
    /**
     * @psalm-pure
     *
     * @param iterable<string|null> $value
     * @param int                   $length
     * @param string                $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrLength($value, $length, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::length($entry, $length, $message);
        }
    }
    /**
     * @psalm-pure
     *
     * @param string|null $value
     * @param int|float   $min
     * @param string      $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrMinLength($value, $min, $message = '')
    {
        null === $value || static::minLength($value, $min, $message);
    }
    /**
     * @psalm-pure
     *
     * @param iterable<string> $value
     * @param int|float        $min
     * @param string           $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allMinLength($value, $min, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::minLength($entry, $min, $message);
        }
    }
    /**
     * @psalm-pure
     *
     * @param iterable<string|null> $value
     * @param int|float             $min
     * @param string                $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrMinLength($value, $min, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::minLength($entry, $min, $message);
        }
    }
    /**
     * @psalm-pure
     *
     * @param string|null $value
     * @param int|float   $max
     * @param string      $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrMaxLength($value, $max, $message = '')
    {
        null === $value || static::maxLength($value, $max, $message);
    }
    /**
     * @psalm-pure
     *
     * @param iterable<string> $value
     * @param int|float        $max
     * @param string           $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allMaxLength($value, $max, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::maxLength($entry, $max, $message);
        }
    }
    /**
     * @psalm-pure
     *
     * @param iterable<string|null> $value
     * @param int|float             $max
     * @param string                $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrMaxLength($value, $max, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::maxLength($entry, $max, $message);
        }
    }
    /**
     * @psalm-pure
     *
     * @param string|null $value
     * @param int|float   $min
     * @param int|float   $max
     * @param string      $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrLengthBetween($value, $min, $max, $message = '')
    {
        null === $value || static::lengthBetween($value, $min, $max, $message);
    }
    /**
     * @psalm-pure
     *
     * @param iterable<string> $value
     * @param int|float        $min
     * @param int|float        $max
     * @param string           $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allLengthBetween($value, $min, $max, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::lengthBetween($entry, $min, $max, $message);
        }
    }
    /**
     * @psalm-pure
     *
     * @param iterable<string|null> $value
     * @param int|float             $min
     * @param int|float             $max
     * @param string                $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrLengthBetween($value, $min, $max, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::lengthBetween($entry, $min, $max, $message);
        }
    }
    /**
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrFileExists(mixed $value, $message = '')
    {
        null === $value || static::fileExists($value, $message);
    }
    /**
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allFileExists(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::fileExists($entry, $message);
        }
    }
    /**
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrFileExists(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::fileExists($entry, $message);
        }
    }
    /**
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrFile(mixed $value, $message = '')
    {
        null === $value || static::file($value, $message);
    }
    /**
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allFile(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::file($entry, $message);
        }
    }
    /**
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrFile(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::file($entry, $message);
        }
    }
    /**
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrDirectory(mixed $value, $message = '')
    {
        null === $value || static::directory($value, $message);
    }
    /**
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allDirectory(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::directory($entry, $message);
        }
    }
    /**
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrDirectory(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::directory($entry, $message);
        }
    }
    /**
     * @param string|null $value
     * @param string      $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrReadable($value, $message = '')
    {
        null === $value || static::readable($value, $message);
    }
    /**
     * @param iterable<string> $value
     * @param string           $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allReadable($value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::readable($entry, $message);
        }
    }
    /**
     * @param iterable<string|null> $value
     * @param string                $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrReadable($value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::readable($entry, $message);
        }
    }
    /**
     * @param string|null $value
     * @param string      $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrWritable($value, $message = '')
    {
        null === $value || static::writable($value, $message);
    }
    /**
     * @param iterable<string> $value
     * @param string           $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allWritable($value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::writable($entry, $message);
        }
    }
    /**
     * @param iterable<string|null> $value
     * @param string                $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrWritable($value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::writable($entry, $message);
        }
    }
    /**
     * @psalm-assert class-string|null $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrClassExists(mixed $value, $message = '')
    {
        null === $value || static::classExists($value, $message);
    }
    /**
     * @psalm-assert iterable<class-string> $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allClassExists(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::classExists($entry, $message);
        }
    }
    /**
     * @psalm-assert iterable<class-string|null> $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrClassExists(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::classExists($entry, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-template ExpectedType of object
     * @psalm-param class-string<ExpectedType> $class
     * @psalm-assert class-string<ExpectedType>|ExpectedType|null $value
     *
     * @param string|object $class
     * @param string        $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrSubclassOf(mixed $value, $class, $message = '')
    {
        null === $value || static::subclassOf($value, $class, $message);
    }
    /**
     * @psalm-pure
     * @psalm-template ExpectedType of object
     * @psalm-param class-string<ExpectedType> $class
     * @psalm-assert iterable<class-string<ExpectedType>|ExpectedType> $value
     *
     * @param string|object $class
     * @param string        $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allSubclassOf(mixed $value, $class, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::subclassOf($entry, $class, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-template ExpectedType of object
     * @psalm-param class-string<ExpectedType> $class
     * @psalm-assert iterable<class-string<ExpectedType>|ExpectedType|null> $value
     *
     * @param string|object $class
     * @param string        $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrSubclassOf(mixed $value, $class, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::subclassOf($entry, $class, $message);
        }
    }
    /**
     * @psalm-assert class-string|null $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrInterfaceExists(mixed $value, $message = '')
    {
        null === $value || static::interfaceExists($value, $message);
    }
    /**
     * @psalm-assert iterable<class-string> $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allInterfaceExists(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::interfaceExists($entry, $message);
        }
    }
    /**
     * @psalm-assert iterable<class-string|null> $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrInterfaceExists(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::interfaceExists($entry, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-template ExpectedType of object
     * @psalm-param class-string<ExpectedType> $interface
     * @psalm-assert class-string<ExpectedType>|null $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrImplementsInterface(mixed $value, mixed $interface, $message = '')
    {
        null === $value || static::implementsInterface($value, $interface, $message);
    }
    /**
     * @psalm-pure
     * @psalm-template ExpectedType of object
     * @psalm-param class-string<ExpectedType> $interface
     * @psalm-assert iterable<class-string<ExpectedType>> $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allImplementsInterface(mixed $value, mixed $interface, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::implementsInterface($entry, $interface, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-template ExpectedType of object
     * @psalm-param class-string<ExpectedType> $interface
     * @psalm-assert iterable<class-string<ExpectedType>|null> $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrImplementsInterface(mixed $value, mixed $interface, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::implementsInterface($entry, $interface, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-param class-string|object|null $classOrObject
     *
     * @param string|object|null $classOrObject
     * @param string             $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrPropertyExists($classOrObject, mixed $property, $message = '')
    {
        null === $classOrObject || static::propertyExists($classOrObject, $property, $message);
    }
    /**
     * @psalm-pure
     * @psalm-param iterable<class-string|object> $classOrObject
     *
     * @param iterable<string|object> $classOrObject
     * @param string                  $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allPropertyExists($classOrObject, mixed $property, $message = '')
    {
        static::isIterable($classOrObject);
        foreach ($classOrObject as $entry) {
            static::propertyExists($entry, $property, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-param iterable<class-string|object|null> $classOrObject
     *
     * @param iterable<string|object|null> $classOrObject
     * @param string                       $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrPropertyExists($classOrObject, mixed $property, $message = '')
    {
        static::isIterable($classOrObject);
        foreach ($classOrObject as $entry) {
            null === $entry || static::propertyExists($entry, $property, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-param class-string|object|null $classOrObject
     *
     * @param string|object|null $classOrObject
     * @param string             $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrPropertyNotExists($classOrObject, mixed $property, $message = '')
    {
        null === $classOrObject || static::propertyNotExists($classOrObject, $property, $message);
    }
    /**
     * @psalm-pure
     * @psalm-param iterable<class-string|object> $classOrObject
     *
     * @param iterable<string|object> $classOrObject
     * @param string                  $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allPropertyNotExists($classOrObject, mixed $property, $message = '')
    {
        static::isIterable($classOrObject);
        foreach ($classOrObject as $entry) {
            static::propertyNotExists($entry, $property, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-param iterable<class-string|object|null> $classOrObject
     *
     * @param iterable<string|object|null> $classOrObject
     * @param string                       $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrPropertyNotExists($classOrObject, mixed $property, $message = '')
    {
        static::isIterable($classOrObject);
        foreach ($classOrObject as $entry) {
            null === $entry || static::propertyNotExists($entry, $property, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-param class-string|object|null $classOrObject
     *
     * @param string|object|null $classOrObject
     * @param string             $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrMethodExists($classOrObject, mixed $method, $message = '')
    {
        null === $classOrObject || static::methodExists($classOrObject, $method, $message);
    }
    /**
     * @psalm-pure
     * @psalm-param iterable<class-string|object> $classOrObject
     *
     * @param iterable<string|object> $classOrObject
     * @param string                  $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allMethodExists($classOrObject, mixed $method, $message = '')
    {
        static::isIterable($classOrObject);
        foreach ($classOrObject as $entry) {
            static::methodExists($entry, $method, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-param iterable<class-string|object|null> $classOrObject
     *
     * @param iterable<string|object|null> $classOrObject
     * @param string                       $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrMethodExists($classOrObject, mixed $method, $message = '')
    {
        static::isIterable($classOrObject);
        foreach ($classOrObject as $entry) {
            null === $entry || static::methodExists($entry, $method, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-param class-string|object|null $classOrObject
     *
     * @param string|object|null $classOrObject
     * @param string             $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrMethodNotExists($classOrObject, mixed $method, $message = '')
    {
        null === $classOrObject || static::methodNotExists($classOrObject, $method, $message);
    }
    /**
     * @psalm-pure
     * @psalm-param iterable<class-string|object> $classOrObject
     *
     * @param iterable<string|object> $classOrObject
     * @param string                  $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allMethodNotExists($classOrObject, mixed $method, $message = '')
    {
        static::isIterable($classOrObject);
        foreach ($classOrObject as $entry) {
            static::methodNotExists($entry, $method, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-param iterable<class-string|object|null> $classOrObject
     *
     * @param iterable<string|object|null> $classOrObject
     * @param string                       $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrMethodNotExists($classOrObject, mixed $method, $message = '')
    {
        static::isIterable($classOrObject);
        foreach ($classOrObject as $entry) {
            null === $entry || static::methodNotExists($entry, $method, $message);
        }
    }
    /**
     * @psalm-pure
     *
     * @param array|null $array
     * @param string|int $key
     * @param string     $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrKeyExists($array, $key, $message = '')
    {
        null === $array || static::keyExists($array, $key, $message);
    }
    /**
     * @psalm-pure
     *
     * @param iterable<array> $array
     * @param string|int      $key
     * @param string          $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allKeyExists($array, $key, $message = '')
    {
        static::isIterable($array);
        foreach ($array as $entry) {
            static::keyExists($entry, $key, $message);
        }
    }
    /**
     * @psalm-pure
     *
     * @param iterable<array|null> $array
     * @param string|int           $key
     * @param string               $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrKeyExists($array, $key, $message = '')
    {
        static::isIterable($array);
        foreach ($array as $entry) {
            null === $entry || static::keyExists($entry, $key, $message);
        }
    }
    /**
     * @psalm-pure
     *
     * @param array|null $array
     * @param string|int $key
     * @param string     $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrKeyNotExists($array, $key, $message = '')
    {
        null === $array || static::keyNotExists($array, $key, $message);
    }
    /**
     * @psalm-pure
     *
     * @param iterable<array> $array
     * @param string|int      $key
     * @param string          $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allKeyNotExists($array, $key, $message = '')
    {
        static::isIterable($array);
        foreach ($array as $entry) {
            static::keyNotExists($entry, $key, $message);
        }
    }
    /**
     * @psalm-pure
     *
     * @param iterable<array|null> $array
     * @param string|int           $key
     * @param string               $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrKeyNotExists($array, $key, $message = '')
    {
        static::isIterable($array);
        foreach ($array as $entry) {
            null === $entry || static::keyNotExists($entry, $key, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert array-key|null $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrValidArrayKey(mixed $value, $message = '')
    {
        null === $value || static::validArrayKey($value, $message);
    }
    /**
     * @psalm-pure
     * @psalm-assert iterable<array-key> $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allValidArrayKey(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::validArrayKey($entry, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert iterable<array-key|null> $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrValidArrayKey(mixed $value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::validArrayKey($entry, $message);
        }
    }
    /**
     * @param Countable|array|null $array
     * @param int                  $number
     * @param string               $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrCount($array, $number, $message = '')
    {
        null === $array || static::count($array, $number, $message);
    }
    /**
     * @param iterable<Countable|array> $array
     * @param int                       $number
     * @param string                    $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allCount($array, $number, $message = '')
    {
        static::isIterable($array);
        foreach ($array as $entry) {
            static::count($entry, $number, $message);
        }
    }
    /**
     * @param iterable<Countable|array|null> $array
     * @param int                            $number
     * @param string                         $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrCount($array, $number, $message = '')
    {
        static::isIterable($array);
        foreach ($array as $entry) {
            null === $entry || static::count($entry, $number, $message);
        }
    }
    /**
     * @param Countable|array|null $array
     * @param int|float            $min
     * @param string               $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrMinCount($array, $min, $message = '')
    {
        null === $array || static::minCount($array, $min, $message);
    }
    /**
     * @param iterable<Countable|array> $array
     * @param int|float                 $min
     * @param string                    $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allMinCount($array, $min, $message = '')
    {
        static::isIterable($array);
        foreach ($array as $entry) {
            static::minCount($entry, $min, $message);
        }
    }
    /**
     * @param iterable<Countable|array|null> $array
     * @param int|float                      $min
     * @param string                         $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrMinCount($array, $min, $message = '')
    {
        static::isIterable($array);
        foreach ($array as $entry) {
            null === $entry || static::minCount($entry, $min, $message);
        }
    }
    /**
     * @param Countable|array|null $array
     * @param int|float            $max
     * @param string               $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrMaxCount($array, $max, $message = '')
    {
        null === $array || static::maxCount($array, $max, $message);
    }
    /**
     * @param iterable<Countable|array> $array
     * @param int|float                 $max
     * @param string                    $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allMaxCount($array, $max, $message = '')
    {
        static::isIterable($array);
        foreach ($array as $entry) {
            static::maxCount($entry, $max, $message);
        }
    }
    /**
     * @param iterable<Countable|array|null> $array
     * @param int|float                      $max
     * @param string                         $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrMaxCount($array, $max, $message = '')
    {
        static::isIterable($array);
        foreach ($array as $entry) {
            null === $entry || static::maxCount($entry, $max, $message);
        }
    }
    /**
     * @param Countable|array|null $array
     * @param int|float            $min
     * @param int|float            $max
     * @param string               $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrCountBetween($array, $min, $max, $message = '')
    {
        null === $array || static::countBetween($array, $min, $max, $message);
    }
    /**
     * @param iterable<Countable|array> $array
     * @param int|float                 $min
     * @param int|float                 $max
     * @param string                    $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allCountBetween($array, $min, $max, $message = '')
    {
        static::isIterable($array);
        foreach ($array as $entry) {
            static::countBetween($entry, $min, $max, $message);
        }
    }
    /**
     * @param iterable<Countable|array|null> $array
     * @param int|float                      $min
     * @param int|float                      $max
     * @param string                         $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrCountBetween($array, $min, $max, $message = '')
    {
        static::isIterable($array);
        foreach ($array as $entry) {
            null === $entry || static::countBetween($entry, $min, $max, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert list|null $array
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrIsList(mixed $array, $message = '')
    {
        null === $array || static::isList($array, $message);
    }
    /**
     * @psalm-pure
     * @psalm-assert iterable<list> $array
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allIsList(mixed $array, $message = '')
    {
        static::isIterable($array);
        foreach ($array as $entry) {
            static::isList($entry, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert iterable<list|null> $array
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrIsList(mixed $array, $message = '')
    {
        static::isIterable($array);
        foreach ($array as $entry) {
            null === $entry || static::isList($entry, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert non-empty-list|null $array
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrIsNonEmptyList(mixed $array, $message = '')
    {
        null === $array || static::isNonEmptyList($array, $message);
    }
    /**
     * @psalm-pure
     * @psalm-assert iterable<non-empty-list> $array
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allIsNonEmptyList(mixed $array, $message = '')
    {
        static::isIterable($array);
        foreach ($array as $entry) {
            static::isNonEmptyList($entry, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert iterable<non-empty-list|null> $array
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrIsNonEmptyList(mixed $array, $message = '')
    {
        static::isIterable($array);
        foreach ($array as $entry) {
            null === $entry || static::isNonEmptyList($entry, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-template T
     * @psalm-param mixed|array<T>|null $array
     * @psalm-assert array<string, T>|null $array
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrIsMap(mixed $array, $message = '')
    {
        null === $array || static::isMap($array, $message);
    }
    /**
     * @psalm-pure
     * @psalm-template T
     * @psalm-param iterable<mixed|array<T>> $array
     * @psalm-assert iterable<array<string, T>> $array
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allIsMap(mixed $array, $message = '')
    {
        static::isIterable($array);
        foreach ($array as $entry) {
            static::isMap($entry, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-template T
     * @psalm-param iterable<mixed|array<T>|null> $array
     * @psalm-assert iterable<array<string, T>|null> $array
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrIsMap(mixed $array, $message = '')
    {
        static::isIterable($array);
        foreach ($array as $entry) {
            null === $entry || static::isMap($entry, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-template T
     * @psalm-param mixed|array<T>|null $array
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrIsNonEmptyMap(mixed $array, $message = '')
    {
        null === $array || static::isNonEmptyMap($array, $message);
    }
    /**
     * @psalm-pure
     * @psalm-template T
     * @psalm-param iterable<mixed|array<T>> $array
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allIsNonEmptyMap(mixed $array, $message = '')
    {
        static::isIterable($array);
        foreach ($array as $entry) {
            static::isNonEmptyMap($entry, $message);
        }
    }
    /**
     * @psalm-pure
     * @psalm-template T
     * @psalm-param iterable<mixed|array<T>|null> $array
     * @psalm-assert iterable<array<string, T>|null> $array
     * @psalm-assert iterable<!empty|null> $array
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrIsNonEmptyMap(mixed $array, $message = '')
    {
        static::isIterable($array);
        foreach ($array as $entry) {
            null === $entry || static::isNonEmptyMap($entry, $message);
        }
    }
    /**
     * @psalm-pure
     *
     * @param string|null $value
     * @param string      $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrUuid($value, $message = '')
    {
        null === $value || static::uuid($value, $message);
    }
    /**
     * @psalm-pure
     *
     * @param iterable<string> $value
     * @param string           $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allUuid($value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            static::uuid($entry, $message);
        }
    }
    /**
     * @psalm-pure
     *
     * @param iterable<string|null> $value
     * @param string                $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrUuid($value, $message = '')
    {
        static::isIterable($value);
        foreach ($value as $entry) {
            null === $entry || static::uuid($entry, $message);
        }
    }
    /**
     * @psalm-param class-string<Throwable> $class
     *
     * @param Closure|null $expression
     * @param string       $class
     * @param string       $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrThrows($expression, $class = 'Exception', $message = '')
    {
        null === $expression || static::throws($expression, $class, $message);
    }
    /**
     * @psalm-param class-string<Throwable> $class
     *
     * @param iterable<Closure> $expression
     * @param string            $class
     * @param string            $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allThrows($expression, $class = 'Exception', $message = '')
    {
        static::isIterable($expression);
        foreach ($expression as $entry) {
            static::throws($entry, $class, $message);
        }
    }
    /**
     * @psalm-param class-string<Throwable> $class
     *
     * @param iterable<Closure|null> $expression
     * @param string                 $class
     * @param string                 $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrThrows($expression, $class = 'Exception', $message = '')
    {
        static::isIterable($expression);
        foreach ($expression as $entry) {
            null === $entry || static::throws($entry, $class, $message);
        }
    }
}
