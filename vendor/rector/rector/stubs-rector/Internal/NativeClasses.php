<?php

if (PHP_VERSION_ID < 80000 && ! class_exists('ReflectionUnionType', false)) {
    class ReflectionUnionType extends ReflectionType
    {
        /** @return ReflectionType[] */
        public function getTypes()
        {
            return [];
        }
    }
}

if (PHP_VERSION_ID < 80000 && ! class_exists('Attribute', false)) {
    #[Attribute(Attribute::TARGET_CLASS)]
    class Attribute
    {

        /**
         * Marks that attribute declaration is allowed only in classes.
         */
        final public const TARGET_CLASS = 1;

        /**
         * Marks that attribute declaration is allowed only in functions.
         */
        final public const TARGET_FUNCTION = 1 << 1;

        /**
         * Marks that attribute declaration is allowed only in class methods.
         */
        final public const TARGET_METHOD = 1 << 2;

        /**
         * Marks that attribute declaration is allowed only in class properties.
         */
        final public const TARGET_PROPERTY = 1 << 3;

        /**
         * Marks that attribute declaration is allowed only in class constants.
         */
        final public const TARGET_CLASS_CONSTANT = 1 << 4;

        /**
         * Marks that attribute declaration is allowed only in function or method parameters.
         */
        final public const TARGET_PARAMETER = 1 << 5;

        /**
         * Marks that attribute declaration is allowed anywhere.
         */
        final public const TARGET_ALL = (1 << 6) - 1;

        /**
         * Notes that an attribute declaration in the same place is
         * allowed multiple times.
         */
        final public const IS_REPEATABLE = 1 << 6;

        /**
         * @param int $flags A value in the form of a bitmask indicating the places
         * where attributes can be defined.
         */
        public function __construct(public $flags = self::TARGET_ALL)
        {
        }

    }
}

if (PHP_VERSION_ID < 80100 && ! class_exists('ReturnTypeWillChange', false)) {
    #[Attribute(Attribute::TARGET_METHOD)]
    final class ReturnTypeWillChange
    {
    }
}
