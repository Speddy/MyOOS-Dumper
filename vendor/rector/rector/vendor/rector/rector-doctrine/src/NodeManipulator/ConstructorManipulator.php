<?php

declare (strict_types=1);
namespace Rector\Doctrine\NodeManipulator;

use PhpParser\Node\Stmt\Class_;
use PhpParser\Node\Stmt\ClassMethod;
use PhpParser\Node\Stmt\Expression;
use Rector\Core\NodeManipulator\ClassInsertManipulator;
use Rector\Core\PhpParser\Node\NodeFactory;
use Rector\Core\ValueObject\MethodName;
use Rector\NodeTypeResolver\Node\AttributeKey;
final readonly class ConstructorManipulator
{
    public function __construct(
        /**
         * @readonly
         */
        private NodeFactory $nodeFactory,
        /**
         * @readonly
         */
        private ClassInsertManipulator $classInsertManipulator
    )
    {
    }
    public function addStmtToConstructor(Class_ $class, Expression $newExpression) : void
    {
        $constructClassMethod = $class->getMethod(MethodName::CONSTRUCT);
        if ($constructClassMethod instanceof ClassMethod) {
            $constructClassMethod->stmts[] = $newExpression;
        } else {
            $constructClassMethod = $this->nodeFactory->createPublicMethod(MethodName::CONSTRUCT);
            $constructClassMethod->stmts[] = $newExpression;
            $this->classInsertManipulator->addAsFirstMethod($class, $constructClassMethod);
            $class->setAttribute(AttributeKey::ORIGINAL_NODE, null);
        }
    }
}
