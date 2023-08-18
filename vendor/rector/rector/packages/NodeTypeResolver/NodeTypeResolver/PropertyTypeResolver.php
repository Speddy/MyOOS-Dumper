<?php

declare (strict_types=1);
namespace Rector\NodeTypeResolver\NodeTypeResolver;

use PhpParser\Node;
use PhpParser\Node\Expr\PropertyFetch;
use PhpParser\Node\Expr\Variable;
use PhpParser\Node\Stmt\Property;
use PHPStan\Type\Type;
use Rector\NodeTypeResolver\Contract\NodeTypeResolverInterface;
use Rector\NodeTypeResolver\Node\AttributeKey;
/**
 * @see \Rector\Tests\NodeTypeResolver\PerNodeTypeResolver\PropertyTypeResolver\PropertyTypeResolverTest
 *
 * @implements NodeTypeResolverInterface<Property>
 */
final readonly class PropertyTypeResolver implements NodeTypeResolverInterface
{
    public function __construct(
        /**
         * @readonly
         */
        private \Rector\NodeTypeResolver\NodeTypeResolver\PropertyFetchTypeResolver $propertyFetchTypeResolver
    )
    {
    }
    /**
     * @return array<class-string<Node>>
     */
    public function getNodeClasses() : array
    {
        return [Property::class];
    }
    /**
     * @param Property $node
     */
    public function resolve(Node $node) : Type
    {
        // fake property to local PropertyFetch → PHPStan understands that
        $propertyFetch = new PropertyFetch(new Variable('this'), (string) $node->props[0]->name);
        $propertyFetch->setAttribute(AttributeKey::SCOPE, $node->getAttribute(AttributeKey::SCOPE));
        return $this->propertyFetchTypeResolver->resolve($propertyFetch);
    }
}
