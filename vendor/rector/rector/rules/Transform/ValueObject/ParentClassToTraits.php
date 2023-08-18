<?php

declare (strict_types=1);
namespace Rector\Transform\ValueObject;

use Rector\Core\Validation\RectorAssert;
use RectorPrefix202308\Webmozart\Assert\Assert;
final readonly class ParentClassToTraits
{
    /**
     * @param string[] $traitNames
     */
    public function __construct(/**
     * @readonly
     */
    private string $parentType, /**
     * @readonly
     */
    private array $traitNames)
    {
        RectorAssert::className($parentType);
        Assert::allString($traitNames);
    }
    public function getParentType() : string
    {
        return $this->parentType;
    }
    /**
     * @return string[]
     */
    public function getTraitNames() : array
    {
        // keep the Trait order the way it is in config
        return \array_reverse($this->traitNames);
    }
}
