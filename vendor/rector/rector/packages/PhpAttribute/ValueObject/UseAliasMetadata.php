<?php

declare (strict_types=1);
namespace Rector\PhpAttribute\ValueObject;

use PhpParser\Node\Stmt\UseUse;
final readonly class UseAliasMetadata
{
    public function __construct(
        /**
         * @readonly
         */
        private string $shortAttributeName,
        /**
         * @readonly
         */
        private string $useImportName,
        /**
         * @readonly
         */
        private UseUse $useUse
    )
    {
    }
    public function getShortAttributeName() : string
    {
        return $this->shortAttributeName;
    }
    public function getUseImportName() : string
    {
        return $this->useImportName;
    }
    public function getUseUse() : UseUse
    {
        return $this->useUse;
    }
}
