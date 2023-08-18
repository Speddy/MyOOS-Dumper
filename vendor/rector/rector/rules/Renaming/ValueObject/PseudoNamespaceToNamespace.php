<?php

declare (strict_types=1);
namespace Rector\Renaming\ValueObject;

/**
 * @api deprecated, soon to be removed
 */
final readonly class PseudoNamespaceToNamespace
{
    /**
     * @param string[] $excludedClasses
     */
    public function __construct(
        /**
         * @readonly
         */
        private string $namespacePrefix,
        /**
         * @readonly
         */
        private array $excludedClasses = []
    )
    {
    }
    public function getNamespacePrefix() : string
    {
        return $this->namespacePrefix;
    }
    /**
     * @return string[]
     */
    public function getExcludedClasses() : array
    {
        return $this->excludedClasses;
    }
}
