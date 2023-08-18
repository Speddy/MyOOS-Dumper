<?php

declare (strict_types=1);
namespace Rector\NodeTypeResolver\PhpDoc\NodeAnalyzer;

use PhpParser\Node;
use PHPStan\PhpDocParser\Ast\PhpDoc\PhpDocNode;
use Rector\NodeTypeResolver\PhpDocNodeVisitor\NameImportingPhpDocNodeVisitor;
use Rector\PhpDocParser\PhpDocParser\PhpDocNodeTraverser;
final readonly class DocBlockNameImporter
{
    public function __construct(
        /**
         * @readonly
         */
        private NameImportingPhpDocNodeVisitor $nameImportingPhpDocNodeVisitor
    )
    {
    }
    public function importNames(PhpDocNode $phpDocNode, Node $node) : void
    {
        if ($phpDocNode->children === []) {
            return;
        }
        $this->nameImportingPhpDocNodeVisitor->setCurrentNode($node);
        $phpDocNodeTraverser = new PhpDocNodeTraverser();
        $phpDocNodeTraverser->addPhpDocNodeVisitor($this->nameImportingPhpDocNodeVisitor);
        $phpDocNodeTraverser->traverse($phpDocNode);
    }
}
