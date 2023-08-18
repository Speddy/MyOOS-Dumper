<?php

declare (strict_types=1);
namespace Rector\PhpAttribute\AnnotationToAttributeMapper;

use PhpParser\Node\Expr;
use PhpParser\Node\Expr\Array_;
use PhpParser\Node\Expr\ArrayItem;
use PhpParser\Node\Expr\ClassConstFetch;
use PhpParser\Node\Name;
use PhpParser\Node\Scalar\String_;
use Rector\Core\PhpParser\Node\Value\ValueResolver;
use Rector\PhpAttribute\AnnotationToAttributeMapper;
use Rector\PhpAttribute\Contract\AnnotationToAttributeMapperInterface;
use Rector\PhpAttribute\Enum\DocTagNodeState;
use RectorPrefix202308\Webmozart\Assert\Assert;
/**
 * @implements AnnotationToAttributeMapperInterface<mixed[]>
 */
final class ArrayAnnotationToAttributeMapper implements AnnotationToAttributeMapperInterface
{
    private ?\Rector\PhpAttribute\AnnotationToAttributeMapper $annotationToAttributeMapper = null;
    public function __construct(
        /**
         * @readonly
         */
        private readonly ValueResolver $valueResolver
    )
    {
    }
    public function autowire(AnnotationToAttributeMapper $annotationToAttributeMapper) : void
    {
        $this->annotationToAttributeMapper = $annotationToAttributeMapper;
    }
    /**
     * @param mixed $value
     */
    public function isCandidate($value) : bool
    {
        return \is_array($value);
    }
    /**
     * @param mixed[] $value
     */
    public function map($value) : Expr
    {
        $arrayItems = [];
        foreach ($value as $key => $singleValue) {
            $valueExpr = $this->annotationToAttributeMapper->map($singleValue);
            // remove node
            if ($valueExpr === DocTagNodeState::REMOVE_ARRAY) {
                continue;
            }
            // remove value
            if ($this->isRemoveArrayPlaceholder($singleValue)) {
                continue;
            }
            if ($valueExpr instanceof ArrayItem) {
                $valueExpr = $this->resolveValueExprWithSingleQuoteHandling($valueExpr);
                $arrayItems[] = $this->resolveValueExprWithSingleQuoteHandling($valueExpr);
            } else {
                $keyExpr = null;
                if (!\is_int($key)) {
                    $keyExpr = $this->annotationToAttributeMapper->map($key);
                    Assert::isInstanceOf($keyExpr, Expr::class);
                }
                $arrayItems[] = new ArrayItem($valueExpr, $keyExpr);
            }
        }
        return new Array_($arrayItems);
    }
    private function resolveValueExprWithSingleQuoteHandling(ArrayItem $arrayItem) : ArrayItem
    {
        if (!$arrayItem->key instanceof Expr && $arrayItem->value instanceof ClassConstFetch && $arrayItem->value->class instanceof Name && str_contains((string) $arrayItem->value->class, "'")) {
            $arrayItem->value = new String_($this->valueResolver->getValue($arrayItem->value));
            return $arrayItem;
        }
        return $arrayItem;
    }
    private function isRemoveArrayPlaceholder(mixed $value) : bool
    {
        if (!\is_array($value)) {
            return \false;
        }
        return \in_array(DocTagNodeState::REMOVE_ARRAY, $value, \true);
    }
}
