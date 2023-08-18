<?php

declare (strict_types=1);
namespace Rector\Comments;

use PhpParser\Node;
use Rector\Comments\NodeTraverser\CommentRemovingNodeTraverser;
/**
 * @see \Rector\Tests\Comments\CommentRemover\CommentRemoverTest
 */
final readonly class CommentRemover
{
    public function __construct(
        /**
         * @readonly
         */
        private CommentRemovingNodeTraverser $commentRemovingNodeTraverser
    )
    {
    }
    /**
     * @param mixed[]|\PhpParser\Node|null $node
     * @return Node[]|null
     */
    public function removeFromNode($node) : ?array
    {
        if ($node === null) {
            return null;
        }
        $copiedNodes = $node;
        $nodes = \is_array($copiedNodes) ? $copiedNodes : [$copiedNodes];
        return $this->commentRemovingNodeTraverser->traverse($nodes);
    }
}
