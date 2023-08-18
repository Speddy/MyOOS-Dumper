<?php

/*
 * This file is part of the webmozart/assert package.
 *
 * (c) Bernhard Schussek <bschussek@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace RectorPrefix202308\Webmozart\Assert;

use ArrayAccess;
use BadMethodCallException;
use Closure;
use Countable;
use DateTime;
use DateTimeImmutable;
use Exception;
use ResourceBundle;
use SimpleXMLElement;
use Throwable;
use Traversable;
/**
 * Efficient assertions to validate the input/output of your methods.
 *
 * @since  1.0
 *
 * @author Bernhard Schussek <bschussek@gmail.com>
 */
class Assert
{
    use Mixin;
    /**
     * @psalm-pure
     * @psalm-assert string $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function string(mixed $value, $message = '')
    {
        if (!\is_string($value)) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected a string. Got: %s', static::typeToString($value)));
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert non-empty-string $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function stringNotEmpty(mixed $value, $message = '')
    {
        static::string($value, $message);
        static::notEq($value, '', $message);
    }
    /**
     * @psalm-pure
     * @psalm-assert int $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function integer(mixed $value, $message = '')
    {
        if (!\is_int($value)) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected an integer. Got: %s', static::typeToString($value)));
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert numeric $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function integerish(mixed $value, $message = '')
    {
        if (!\is_numeric($value) || $value != (int) $value) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected an integerish value. Got: %s', static::typeToString($value)));
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert positive-int $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function positiveInteger(mixed $value, $message = '')
    {
        if (!(\is_int($value) && $value > 0)) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected a positive integer. Got: %s', static::valueToString($value)));
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert float $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function float(mixed $value, $message = '')
    {
        if (!\is_float($value)) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected a float. Got: %s', static::typeToString($value)));
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert numeric $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function numeric(mixed $value, $message = '')
    {
        if (!\is_numeric($value)) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected a numeric. Got: %s', static::typeToString($value)));
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert positive-int|0 $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function natural(mixed $value, $message = '')
    {
        if (!\is_int($value) || $value < 0) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected a non-negative integer. Got: %s', static::valueToString($value)));
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert bool $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function boolean(mixed $value, $message = '')
    {
        if (!\is_bool($value)) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected a boolean. Got: %s', static::typeToString($value)));
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert scalar $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function scalar(mixed $value, $message = '')
    {
        if (!\is_scalar($value)) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected a scalar. Got: %s', static::typeToString($value)));
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert object $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function object(mixed $value, $message = '')
    {
        if (!\is_object($value)) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected an object. Got: %s', static::typeToString($value)));
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert resource $value
     *
     * @param string|null $type    type of resource this should be. @see https://www.php.net/manual/en/function.get-resource-type.php
     * @param string      $message
     *
     * @throws InvalidArgumentException
     */
    public static function resource(mixed $value, $type = null, $message = '')
    {
        if (!\is_resource($value)) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected a resource. Got: %s', static::typeToString($value)));
        }
        if ($type && $type !== \get_resource_type($value)) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected a resource of type %2$s. Got: %s', static::typeToString($value), $type));
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert callable $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function isCallable(mixed $value, $message = '')
    {
        if (!\is_callable($value)) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected a callable. Got: %s', static::typeToString($value)));
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert array $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function isArray(mixed $value, $message = '')
    {
        if (!\is_array($value)) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected an array. Got: %s', static::typeToString($value)));
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert iterable $value
     *
     * @deprecated use "isIterable" or "isInstanceOf" instead
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function isTraversable(mixed $value, $message = '')
    {
        @\trigger_error(\sprintf('The "%s" assertion is deprecated. You should stop using it, as it will soon be removed in 2.0 version. Use "isIterable" or "isInstanceOf" instead.', __METHOD__), \E_USER_DEPRECATED);
        if (!\is_array($value) && !$value instanceof Traversable) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected a traversable. Got: %s', static::typeToString($value)));
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert array|ArrayAccess $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function isArrayAccessible(mixed $value, $message = '')
    {
        if (!\is_array($value) && !$value instanceof ArrayAccess) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected an array accessible. Got: %s', static::typeToString($value)));
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert countable $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function isCountable(mixed $value, $message = '')
    {
        if (!\is_array($value) && !$value instanceof Countable && !$value instanceof ResourceBundle && !$value instanceof SimpleXMLElement) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected a countable. Got: %s', static::typeToString($value)));
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert iterable $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function isIterable(mixed $value, $message = '')
    {
        if (!\is_array($value) && !$value instanceof Traversable) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected an iterable. Got: %s', static::typeToString($value)));
        }
    }
    /**
     * @psalm-pure
     * @psalm-template ExpectedType of object
     * @psalm-param class-string<ExpectedType> $class
     * @psalm-assert ExpectedType $value
     *
     * @param string|object $class
     * @param string        $message
     *
     * @throws InvalidArgumentException
     */
    public static function isInstanceOf(mixed $value, $class, $message = '')
    {
        if (!$value instanceof $class) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected an instance of %2$s. Got: %s', static::typeToString($value), $class));
        }
    }
    /**
     * @psalm-pure
     * @psalm-template ExpectedType of object
     * @psalm-param class-string<ExpectedType> $class
     * @psalm-assert !ExpectedType $value
     *
     * @param string|object $class
     * @param string        $message
     *
     * @throws InvalidArgumentException
     */
    public static function notInstanceOf(mixed $value, $class, $message = '')
    {
        if ($value instanceof $class) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected an instance other than %2$s. Got: %s', static::typeToString($value), $class));
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
     */
    public static function isInstanceOfAny(mixed $value, array $classes, $message = '')
    {
        foreach ($classes as $class) {
            if ($value instanceof $class) {
                return;
            }
        }
        static::reportInvalidArgument(\sprintf($message ?: 'Expected an instance of any of %2$s. Got: %s', static::typeToString($value), \implode(', ', \array_map(static::valueToString(...), $classes))));
    }
    /**
     * @psalm-pure
     * @psalm-template ExpectedType of object
     * @psalm-param class-string<ExpectedType> $class
     * @psalm-assert ExpectedType|class-string<ExpectedType> $value
     *
     * @param object|string $value
     * @param string        $class
     * @param string        $message
     *
     * @throws InvalidArgumentException
     */
    public static function isAOf($value, $class, $message = '')
    {
        static::string($class, 'Expected class as a string. Got: %s');
        if (!\is_a($value, $class, \is_string($value))) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected an instance of this class or to this class among its parents "%2$s". Got: %s', static::valueToString($value), $class));
        }
    }
    /**
     * @psalm-pure
     * @psalm-template UnexpectedType of object
     * @psalm-param class-string<UnexpectedType> $class
     * @psalm-assert !UnexpectedType $value
     * @psalm-assert !class-string<UnexpectedType> $value
     *
     * @param object|string $value
     * @param string        $class
     * @param string        $message
     *
     * @throws InvalidArgumentException
     */
    public static function isNotA($value, $class, $message = '')
    {
        static::string($class, 'Expected class as a string. Got: %s');
        if (\is_a($value, $class, \is_string($value))) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected an instance of this class or to this class among its parents other than "%2$s". Got: %s', static::valueToString($value), $class));
        }
    }
    /**
     * @psalm-pure
     * @psalm-param array<class-string> $classes
     *
     * @param object|string $value
     * @param string[]      $classes
     * @param string        $message
     *
     * @throws InvalidArgumentException
     */
    public static function isAnyOf($value, array $classes, $message = '')
    {
        foreach ($classes as $class) {
            static::string($class, 'Expected class as a string. Got: %s');
            if (\is_a($value, $class, \is_string($value))) {
                return;
            }
        }
        static::reportInvalidArgument(\sprintf($message ?: 'Expected an instance of any of this classes or any of those classes among their parents "%2$s". Got: %s', static::valueToString($value), \implode(', ', $classes)));
    }
    /**
     * @psalm-pure
     * @psalm-assert empty $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function isEmpty(mixed $value, $message = '')
    {
        if (!empty($value)) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected an empty value. Got: %s', static::valueToString($value)));
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert !empty $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function notEmpty(mixed $value, $message = '')
    {
        if (empty($value)) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected a non-empty value. Got: %s', static::valueToString($value)));
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert null $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function null(mixed $value, $message = '')
    {
        if (null !== $value) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected null. Got: %s', static::valueToString($value)));
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert !null $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function notNull(mixed $value, $message = '')
    {
        if (null === $value) {
            static::reportInvalidArgument($message ?: 'Expected a value other than null.');
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert true $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function true(mixed $value, $message = '')
    {
        if (\true !== $value) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected a value to be true. Got: %s', static::valueToString($value)));
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert false $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function false(mixed $value, $message = '')
    {
        if (\false !== $value) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected a value to be false. Got: %s', static::valueToString($value)));
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert !false $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function notFalse(mixed $value, $message = '')
    {
        if (\false === $value) {
            static::reportInvalidArgument($message ?: 'Expected a value other than false.');
        }
    }
    /**
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function ip(mixed $value, $message = '')
    {
        if (\false === \filter_var($value, \FILTER_VALIDATE_IP)) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected a value to be an IP. Got: %s', static::valueToString($value)));
        }
    }
    /**
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function ipv4(mixed $value, $message = '')
    {
        if (\false === \filter_var($value, \FILTER_VALIDATE_IP, \FILTER_FLAG_IPV4)) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected a value to be an IPv4. Got: %s', static::valueToString($value)));
        }
    }
    /**
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function ipv6(mixed $value, $message = '')
    {
        if (\false === \filter_var($value, \FILTER_VALIDATE_IP, \FILTER_FLAG_IPV6)) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected a value to be an IPv6. Got: %s', static::valueToString($value)));
        }
    }
    /**
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function email(mixed $value, $message = '')
    {
        if (\false === \filter_var($value, \FILTER_VALIDATE_EMAIL)) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected a value to be a valid e-mail address. Got: %s', static::valueToString($value)));
        }
    }
    /**
     * Does non strict comparisons on the items, so ['3', 3] will not pass the assertion.
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function uniqueValues(array $values, $message = '')
    {
        $allValues = \count($values);
        $uniqueValues = \count(\array_unique($values));
        if ($allValues !== $uniqueValues) {
            $difference = $allValues - $uniqueValues;
            static::reportInvalidArgument(\sprintf($message ?: 'Expected an array of unique values, but %s of them %s duplicated', $difference, 1 === $difference ? 'is' : 'are'));
        }
    }
    /**
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function eq(mixed $value, mixed $expect, $message = '')
    {
        if ($expect != $value) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected a value equal to %2$s. Got: %s', static::valueToString($value), static::valueToString($expect)));
        }
    }
    /**
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function notEq(mixed $value, mixed $expect, $message = '')
    {
        if ($expect == $value) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected a different value than %s.', static::valueToString($expect)));
        }
    }
    /**
     * @psalm-pure
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function same(mixed $value, mixed $expect, $message = '')
    {
        if ($expect !== $value) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected a value identical to %2$s. Got: %s', static::valueToString($value), static::valueToString($expect)));
        }
    }
    /**
     * @psalm-pure
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function notSame(mixed $value, mixed $expect, $message = '')
    {
        if ($expect === $value) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected a value not identical to %s.', static::valueToString($expect)));
        }
    }
    /**
     * @psalm-pure
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function greaterThan(mixed $value, mixed $limit, $message = '')
    {
        if ($value <= $limit) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected a value greater than %2$s. Got: %s', static::valueToString($value), static::valueToString($limit)));
        }
    }
    /**
     * @psalm-pure
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function greaterThanEq(mixed $value, mixed $limit, $message = '')
    {
        if ($value < $limit) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected a value greater than or equal to %2$s. Got: %s', static::valueToString($value), static::valueToString($limit)));
        }
    }
    /**
     * @psalm-pure
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function lessThan(mixed $value, mixed $limit, $message = '')
    {
        if ($value >= $limit) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected a value less than %2$s. Got: %s', static::valueToString($value), static::valueToString($limit)));
        }
    }
    /**
     * @psalm-pure
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function lessThanEq(mixed $value, mixed $limit, $message = '')
    {
        if ($value > $limit) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected a value less than or equal to %2$s. Got: %s', static::valueToString($value), static::valueToString($limit)));
        }
    }
    /**
     * Inclusive range, so Assert::(3, 3, 5) passes.
     *
     * @psalm-pure
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function range(mixed $value, mixed $min, mixed $max, $message = '')
    {
        if ($value < $min || $value > $max) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected a value between %2$s and %3$s. Got: %s', static::valueToString($value), static::valueToString($min), static::valueToString($max)));
        }
    }
    /**
     * A more human-readable alias of Assert::inArray().
     *
     * @psalm-pure
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function oneOf(mixed $value, array $values, $message = '')
    {
        static::inArray($value, $values, $message);
    }
    /**
     * Does strict comparison, so Assert::inArray(3, ['3']) does not pass the assertion.
     *
     * @psalm-pure
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function inArray(mixed $value, array $values, $message = '')
    {
        if (!\in_array($value, $values, \true)) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected one of: %2$s. Got: %s', static::valueToString($value), \implode(', ', \array_map(static::valueToString(...), $values))));
        }
    }
    /**
     * @psalm-pure
     *
     * @param string $value
     * @param string $subString
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function contains($value, $subString, $message = '')
    {
        if (!str_contains($value, $subString)) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected a value to contain %2$s. Got: %s', static::valueToString($value), static::valueToString($subString)));
        }
    }
    /**
     * @psalm-pure
     *
     * @param string $value
     * @param string $subString
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function notContains($value, $subString, $message = '')
    {
        if (str_contains($value, $subString)) {
            static::reportInvalidArgument(\sprintf($message ?: '%2$s was not expected to be contained in a value. Got: %s', static::valueToString($value), static::valueToString($subString)));
        }
    }
    /**
     * @psalm-pure
     *
     * @param string $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function notWhitespaceOnly($value, $message = '')
    {
        if (\preg_match('/^\\s*$/', $value)) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected a non-whitespace string. Got: %s', static::valueToString($value)));
        }
    }
    /**
     * @psalm-pure
     *
     * @param string $value
     * @param string $prefix
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function startsWith($value, $prefix, $message = '')
    {
        if (!str_starts_with($value, $prefix)) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected a value to start with %2$s. Got: %s', static::valueToString($value), static::valueToString($prefix)));
        }
    }
    /**
     * @psalm-pure
     *
     * @param string $value
     * @param string $prefix
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function notStartsWith($value, $prefix, $message = '')
    {
        if (str_starts_with($value, $prefix)) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected a value not to start with %2$s. Got: %s', static::valueToString($value), static::valueToString($prefix)));
        }
    }
    /**
     * @psalm-pure
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function startsWithLetter(mixed $value, $message = '')
    {
        static::string($value);
        $valid = isset($value[0]);
        if ($valid) {
            $locale = \setlocale(\LC_CTYPE, 0);
            \setlocale(\LC_CTYPE, 'C');
            $valid = \ctype_alpha($value[0]);
            \setlocale(\LC_CTYPE, $locale);
        }
        if (!$valid) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected a value to start with a letter. Got: %s', static::valueToString($value)));
        }
    }
    /**
     * @psalm-pure
     *
     * @param string $value
     * @param string $suffix
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function endsWith($value, $suffix, $message = '')
    {
        if (!str_ends_with($value, $suffix)) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected a value to end with %2$s. Got: %s', static::valueToString($value), static::valueToString($suffix)));
        }
    }
    /**
     * @psalm-pure
     *
     * @param string $value
     * @param string $suffix
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function notEndsWith($value, $suffix, $message = '')
    {
        if (str_ends_with($value, $suffix)) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected a value not to end with %2$s. Got: %s', static::valueToString($value), static::valueToString($suffix)));
        }
    }
    /**
     * @psalm-pure
     *
     * @param string $value
     * @param string $pattern
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function regex($value, $pattern, $message = '')
    {
        if (!\preg_match($pattern, $value)) {
            static::reportInvalidArgument(\sprintf($message ?: 'The value %s does not match the expected pattern.', static::valueToString($value)));
        }
    }
    /**
     * @psalm-pure
     *
     * @param string $value
     * @param string $pattern
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function notRegex($value, $pattern, $message = '')
    {
        if (\preg_match($pattern, $value, $matches, \PREG_OFFSET_CAPTURE)) {
            static::reportInvalidArgument(\sprintf($message ?: 'The value %s matches the pattern %s (at offset %d).', static::valueToString($value), static::valueToString($pattern), $matches[0][1]));
        }
    }
    /**
     * @psalm-pure
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function unicodeLetters(mixed $value, $message = '')
    {
        static::string($value);
        if (!\preg_match('/^\\p{L}+$/u', $value)) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected a value to contain only Unicode letters. Got: %s', static::valueToString($value)));
        }
    }
    /**
     * @psalm-pure
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function alpha(mixed $value, $message = '')
    {
        static::string($value);
        $locale = \setlocale(\LC_CTYPE, 0);
        \setlocale(\LC_CTYPE, 'C');
        $valid = !\ctype_alpha($value);
        \setlocale(\LC_CTYPE, $locale);
        if ($valid) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected a value to contain only letters. Got: %s', static::valueToString($value)));
        }
    }
    /**
     * @psalm-pure
     *
     * @param string $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function digits($value, $message = '')
    {
        $locale = \setlocale(\LC_CTYPE, 0);
        \setlocale(\LC_CTYPE, 'C');
        $valid = !\ctype_digit($value);
        \setlocale(\LC_CTYPE, $locale);
        if ($valid) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected a value to contain digits only. Got: %s', static::valueToString($value)));
        }
    }
    /**
     * @psalm-pure
     *
     * @param string $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function alnum($value, $message = '')
    {
        $locale = \setlocale(\LC_CTYPE, 0);
        \setlocale(\LC_CTYPE, 'C');
        $valid = !\ctype_alnum($value);
        \setlocale(\LC_CTYPE, $locale);
        if ($valid) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected a value to contain letters and digits only. Got: %s', static::valueToString($value)));
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert lowercase-string $value
     *
     * @param string $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function lower($value, $message = '')
    {
        $locale = \setlocale(\LC_CTYPE, 0);
        \setlocale(\LC_CTYPE, 'C');
        $valid = !\ctype_lower($value);
        \setlocale(\LC_CTYPE, $locale);
        if ($valid) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected a value to contain lowercase characters only. Got: %s', static::valueToString($value)));
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert !lowercase-string $value
     *
     * @param string $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function upper($value, $message = '')
    {
        $locale = \setlocale(\LC_CTYPE, 0);
        \setlocale(\LC_CTYPE, 'C');
        $valid = !\ctype_upper($value);
        \setlocale(\LC_CTYPE, $locale);
        if ($valid) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected a value to contain uppercase characters only. Got: %s', static::valueToString($value)));
        }
    }
    /**
     * @psalm-pure
     *
     * @param string $value
     * @param int    $length
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function length($value, $length, $message = '')
    {
        if ($length !== static::strlen($value)) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected a value to contain %2$s characters. Got: %s', static::valueToString($value), $length));
        }
    }
    /**
     * Inclusive min.
     *
     * @psalm-pure
     *
     * @param string    $value
     * @param int|float $min
     * @param string    $message
     *
     * @throws InvalidArgumentException
     */
    public static function minLength($value, $min, $message = '')
    {
        if (static::strlen($value) < $min) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected a value to contain at least %2$s characters. Got: %s', static::valueToString($value), $min));
        }
    }
    /**
     * Inclusive max.
     *
     * @psalm-pure
     *
     * @param string    $value
     * @param int|float $max
     * @param string    $message
     *
     * @throws InvalidArgumentException
     */
    public static function maxLength($value, $max, $message = '')
    {
        if (static::strlen($value) > $max) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected a value to contain at most %2$s characters. Got: %s', static::valueToString($value), $max));
        }
    }
    /**
     * Inclusive , so Assert::lengthBetween('asd', 3, 5); passes the assertion.
     *
     * @psalm-pure
     *
     * @param string    $value
     * @param int|float $min
     * @param int|float $max
     * @param string    $message
     *
     * @throws InvalidArgumentException
     */
    public static function lengthBetween($value, $min, $max, $message = '')
    {
        $length = static::strlen($value);
        if ($length < $min || $length > $max) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected a value to contain between %2$s and %3$s characters. Got: %s', static::valueToString($value), $min, $max));
        }
    }
    /**
     * Will also pass if $value is a directory, use Assert::file() instead if you need to be sure it is a file.
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function fileExists(mixed $value, $message = '')
    {
        static::string($value);
        if (!\file_exists($value)) {
            static::reportInvalidArgument(\sprintf($message ?: 'The file %s does not exist.', static::valueToString($value)));
        }
    }
    /**
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function file(mixed $value, $message = '')
    {
        static::fileExists($value, $message);
        if (!\is_file($value)) {
            static::reportInvalidArgument(\sprintf($message ?: 'The path %s is not a file.', static::valueToString($value)));
        }
    }
    /**
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function directory(mixed $value, $message = '')
    {
        static::fileExists($value, $message);
        if (!\is_dir($value)) {
            static::reportInvalidArgument(\sprintf($message ?: 'The path %s is no directory.', static::valueToString($value)));
        }
    }
    /**
     * @param string $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function readable($value, $message = '')
    {
        if (!\is_readable($value)) {
            static::reportInvalidArgument(\sprintf($message ?: 'The path %s is not readable.', static::valueToString($value)));
        }
    }
    /**
     * @param string $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function writable($value, $message = '')
    {
        if (!\is_writable($value)) {
            static::reportInvalidArgument(\sprintf($message ?: 'The path %s is not writable.', static::valueToString($value)));
        }
    }
    /**
     * @psalm-assert class-string $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function classExists(mixed $value, $message = '')
    {
        if (!\class_exists($value)) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected an existing class name. Got: %s', static::valueToString($value)));
        }
    }
    /**
     * @psalm-pure
     * @psalm-template ExpectedType of object
     * @psalm-param class-string<ExpectedType> $class
     * @psalm-assert class-string<ExpectedType>|ExpectedType $value
     *
     * @param string|object $class
     * @param string        $message
     *
     * @throws InvalidArgumentException
     */
    public static function subclassOf(mixed $value, $class, $message = '')
    {
        if (!\is_subclass_of($value, $class)) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected a sub-class of %2$s. Got: %s', static::valueToString($value), static::valueToString($class)));
        }
    }
    /**
     * @psalm-assert class-string $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function interfaceExists(mixed $value, $message = '')
    {
        if (!\interface_exists($value)) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected an existing interface name. got %s', static::valueToString($value)));
        }
    }
    /**
     * @psalm-pure
     * @psalm-template ExpectedType of object
     * @psalm-param class-string<ExpectedType> $interface
     * @psalm-assert class-string<ExpectedType> $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function implementsInterface(mixed $value, mixed $interface, $message = '')
    {
        if (!\in_array($interface, \class_implements($value))) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected an implementation of %2$s. Got: %s', static::valueToString($value), static::valueToString($interface)));
        }
    }
    /**
     * @psalm-pure
     * @psalm-param class-string|object $classOrObject
     *
     * @param string|object $classOrObject
     * @param string        $message
     *
     * @throws InvalidArgumentException
     */
    public static function propertyExists($classOrObject, mixed $property, $message = '')
    {
        if (!\property_exists($classOrObject, $property)) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected the property %s to exist.', static::valueToString($property)));
        }
    }
    /**
     * @psalm-pure
     * @psalm-param class-string|object $classOrObject
     *
     * @param string|object $classOrObject
     * @param string        $message
     *
     * @throws InvalidArgumentException
     */
    public static function propertyNotExists($classOrObject, mixed $property, $message = '')
    {
        if (\property_exists($classOrObject, $property)) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected the property %s to not exist.', static::valueToString($property)));
        }
    }
    /**
     * @psalm-pure
     * @psalm-param class-string|object $classOrObject
     *
     * @param string|object $classOrObject
     * @param string        $message
     *
     * @throws InvalidArgumentException
     */
    public static function methodExists($classOrObject, mixed $method, $message = '')
    {
        if (!(\is_string($classOrObject) || \is_object($classOrObject)) || !\method_exists($classOrObject, $method)) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected the method %s to exist.', static::valueToString($method)));
        }
    }
    /**
     * @psalm-pure
     * @psalm-param class-string|object $classOrObject
     *
     * @param string|object $classOrObject
     * @param string        $message
     *
     * @throws InvalidArgumentException
     */
    public static function methodNotExists($classOrObject, mixed $method, $message = '')
    {
        if ((\is_string($classOrObject) || \is_object($classOrObject)) && \method_exists($classOrObject, $method)) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected the method %s to not exist.', static::valueToString($method)));
        }
    }
    /**
     * @psalm-pure
     *
     * @param array      $array
     * @param string|int $key
     * @param string     $message
     *
     * @throws InvalidArgumentException
     */
    public static function keyExists($array, $key, $message = '')
    {
        if (!(isset($array[$key]) || \array_key_exists($key, $array))) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected the key %s to exist.', static::valueToString($key)));
        }
    }
    /**
     * @psalm-pure
     *
     * @param array      $array
     * @param string|int $key
     * @param string     $message
     *
     * @throws InvalidArgumentException
     */
    public static function keyNotExists($array, $key, $message = '')
    {
        if (isset($array[$key]) || \array_key_exists($key, $array)) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected the key %s to not exist.', static::valueToString($key)));
        }
    }
    /**
     * Checks if a value is a valid array key (int or string).
     *
     * @psalm-pure
     * @psalm-assert array-key $value
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function validArrayKey(mixed $value, $message = '')
    {
        if (!(\is_int($value) || \is_string($value))) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected string or integer. Got: %s', static::typeToString($value)));
        }
    }
    /**
     * Does not check if $array is countable, this can generate a warning on php versions after 7.2.
     *
     * @param Countable|array $array
     * @param int             $number
     * @param string          $message
     *
     * @throws InvalidArgumentException
     */
    public static function count($array, $number, $message = '')
    {
        static::eq(\count($array), $number, \sprintf($message ?: 'Expected an array to contain %d elements. Got: %d.', $number, \count($array)));
    }
    /**
     * Does not check if $array is countable, this can generate a warning on php versions after 7.2.
     *
     * @param Countable|array $array
     * @param int|float       $min
     * @param string          $message
     *
     * @throws InvalidArgumentException
     */
    public static function minCount($array, $min, $message = '')
    {
        if (\count($array) < $min) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected an array to contain at least %2$d elements. Got: %d', \count($array), $min));
        }
    }
    /**
     * Does not check if $array is countable, this can generate a warning on php versions after 7.2.
     *
     * @param Countable|array $array
     * @param int|float       $max
     * @param string          $message
     *
     * @throws InvalidArgumentException
     */
    public static function maxCount($array, $max, $message = '')
    {
        if (\count($array) > $max) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected an array to contain at most %2$d elements. Got: %d', \count($array), $max));
        }
    }
    /**
     * Does not check if $array is countable, this can generate a warning on php versions after 7.2.
     *
     * @param Countable|array $array
     * @param int|float       $min
     * @param int|float       $max
     * @param string          $message
     *
     * @throws InvalidArgumentException
     */
    public static function countBetween($array, $min, $max, $message = '')
    {
        $count = \count($array);
        if ($count < $min || $count > $max) {
            static::reportInvalidArgument(\sprintf($message ?: 'Expected an array to contain between %2$d and %3$d elements. Got: %d', $count, $min, $max));
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert list $array
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function isList(mixed $array, $message = '')
    {
        if (!\is_array($array)) {
            static::reportInvalidArgument($message ?: 'Expected list - non-associative array.');
        }
        if ($array === \array_values($array)) {
            return;
        }
        $nextKey = -1;
        foreach ($array as $k => $v) {
            if ($k !== ++$nextKey) {
                static::reportInvalidArgument($message ?: 'Expected list - non-associative array.');
            }
        }
    }
    /**
     * @psalm-pure
     * @psalm-assert non-empty-list $array
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function isNonEmptyList(mixed $array, $message = '')
    {
        static::isList($array, $message);
        static::notEmpty($array, $message);
    }
    /**
     * @psalm-pure
     * @psalm-template T
     * @psalm-param mixed|array<T> $array
     * @psalm-assert array<string, T> $array
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function isMap(mixed $array, $message = '')
    {
        if (!\is_array($array) || \array_keys($array) !== \array_filter(\array_keys($array), '\\is_string')) {
            static::reportInvalidArgument($message ?: 'Expected map - associative array with string keys.');
        }
    }
    /**
     * @psalm-pure
     * @psalm-template T
     * @psalm-param mixed|array<T> $array
     * @psalm-assert array<string, T> $array
     * @psalm-assert !empty $array
     *
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function isNonEmptyMap(mixed $array, $message = '')
    {
        static::isMap($array, $message);
        static::notEmpty($array, $message);
    }
    /**
     * @psalm-pure
     *
     * @param string $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     */
    public static function uuid($value, $message = '')
    {
        $value = \str_replace(['urn:', 'uuid:', '{', '}'], '', $value);
        // The nil UUID is special form of UUID that is specified to have all
        // 128 bits set to zero.
        if ('00000000-0000-0000-0000-000000000000' === $value) {
            return;
        }
        if (!\preg_match('/^[0-9A-Fa-f]{8}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{12}$/', $value)) {
            static::reportInvalidArgument(\sprintf($message ?: 'Value %s is not a valid UUID.', static::valueToString($value)));
        }
    }
    /**
     * @psalm-param class-string<Throwable> $class
     *
     * @param string  $class
     * @param string  $message
     *
     * @throws InvalidArgumentException
     */
    public static function throws(Closure $expression, $class = 'Exception', $message = '')
    {
        static::string($class);
        $actual = 'none';
        try {
            $expression();
        } catch (Exception|Throwable $e) {
            $actual = $e::class;
            if ($e instanceof $class) {
                return;
            }
        }
        static::reportInvalidArgument($message ?: \sprintf('Expected to throw "%s", got "%s"', $class, $actual));
    }
    /**
     * @throws BadMethodCallException
     */
    public static function __callStatic($name, $arguments)
    {
        if (str_starts_with((string) $name, 'nullOr')) {
            if (null !== $arguments[0]) {
                $method = \lcfirst(\substr((string) $name, 6));
                \call_user_func_array([static::class, $method], $arguments);
            }
            return;
        }
        if (str_starts_with((string) $name, 'all')) {
            static::isIterable($arguments[0]);
            $method = \lcfirst(\substr((string) $name, 3));
            $args = $arguments;
            foreach ($arguments[0] as $entry) {
                $args[0] = $entry;
                \call_user_func_array([static::class, $method], $args);
            }
            return;
        }
        throw new BadMethodCallException('No such method: ' . $name);
    }
    /**
     *
     * @return string
     */
    protected static function valueToString(mixed $value)
    {
        if (null === $value) {
            return 'null';
        }
        if (\true === $value) {
            return 'true';
        }
        if (\false === $value) {
            return 'false';
        }
        if (\is_array($value)) {
            return 'array';
        }
        if (\is_object($value)) {
            if (\method_exists($value, '__toString')) {
                return $value::class . ': ' . self::valueToString($value->__toString());
            }
            if ($value instanceof DateTime || $value instanceof DateTimeImmutable) {
                return $value::class . ': ' . self::valueToString($value->format('c'));
            }
            return $value::class;
        }
        if (\is_resource($value)) {
            return 'resource';
        }
        if (\is_string($value)) {
            return '"' . $value . '"';
        }
        return (string) $value;
    }
    /**
     *
     * @return string
     */
    protected static function typeToString(mixed $value)
    {
        return get_debug_type($value);
    }
    protected static function strlen($value)
    {
        if (!\function_exists('mb_detect_encoding')) {
            return \strlen((string) $value);
        }
        if (\false === ($encoding = \mb_detect_encoding((string) $value))) {
            return \strlen((string) $value);
        }
        return \mb_strlen((string) $value, $encoding);
    }
    /**
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @psalm-pure this method is not supposed to perform side-effects
     * @psalm-return never
     */
    protected static function reportInvalidArgument($message): never
    {
        throw new InvalidArgumentException($message);
    }
    private function __construct()
    {
    }
}
