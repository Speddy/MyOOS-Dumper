<?php

declare (strict_types=1);
namespace Rector\BetterPhpDocParser;

use PHPStan\PhpDocParser\Ast\PhpDoc\PhpDocNode;
use Rector\BetterPhpDocParser\Contract\BasePhpDocNodeVisitorInterface;
use Rector\BetterPhpDocParser\DataProvider\CurrentTokenIteratorProvider;
use Rector\BetterPhpDocParser\ValueObject\Parser\BetterTokenIterator;
use Rector\PhpDocParser\PhpDocParser\PhpDocNodeTraverser;
use Rector\PhpDocParser\PhpDocParser\PhpDocNodeVisitor\CloningPhpDocNodeVisitor;
use Rector\PhpDocParser\PhpDocParser\PhpDocNodeVisitor\ParentConnectingPhpDocNodeVisitor;
use RectorPrefix202308\Webmozart\Assert\Assert;
/**
 * @see \Rector\Tests\BetterPhpDocParser\PhpDocNodeMapperTest
 */
final readonly class PhpDocNodeMapper
{
    /**
     * @param BasePhpDocNodeVisitorInterface[] $phpDocNodeVisitors
     */
    public function __construct(/**
     * @readonly
     */
    private CurrentTokenIteratorProvider $currentTokenIteratorProvider, /**
     * @readonly
     */
    private ParentConnectingPhpDocNodeVisitor $parentConnectingPhpDocNodeVisitor, /**
     * @readonly
     */
    private CloningPhpDocNodeVisitor $cloningPhpDocNodeVisitor, /**
     * @readonly
     */
    private array $phpDocNodeVisitors)
    {
        Assert::notEmpty($phpDocNodeVisitors);
    }
    public function transform(PhpDocNode $phpDocNode, BetterTokenIterator $betterTokenIterator) : void
    {
        $this->currentTokenIteratorProvider->setBetterTokenIterator($betterTokenIterator);
        $parentPhpDocNodeTraverser = new PhpDocNodeTraverser();
        $parentPhpDocNodeTraverser->addPhpDocNodeVisitor($this->parentConnectingPhpDocNodeVisitor);
        $parentPhpDocNodeTraverser->traverse($phpDocNode);
        $cloningPhpDocNodeTraverser = new PhpDocNodeTraverser();
        $cloningPhpDocNodeTraverser->addPhpDocNodeVisitor($this->cloningPhpDocNodeVisitor);
        $cloningPhpDocNodeTraverser->traverse($phpDocNode);
        $phpDocNodeTraverser = new PhpDocNodeTraverser();
        foreach ($this->phpDocNodeVisitors as $phpDocNodeVisitor) {
            $phpDocNodeTraverser->addPhpDocNodeVisitor($phpDocNodeVisitor);
        }
        $phpDocNodeTraverser->traverse($phpDocNode);
    }
}
