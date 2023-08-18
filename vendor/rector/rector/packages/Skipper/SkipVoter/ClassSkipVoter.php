<?php

declare (strict_types=1);
namespace Rector\Skipper\SkipVoter;

use PHPStan\Reflection\ReflectionProvider;
use Rector\Skipper\Contract\SkipVoterInterface;
use Rector\Skipper\SkipCriteriaResolver\SkippedClassResolver;
use Rector\Skipper\Skipper\SkipSkipper;
final readonly class ClassSkipVoter implements SkipVoterInterface
{
    public function __construct(
        /**
         * @readonly
         */
        private SkipSkipper $skipSkipper,
        /**
         * @readonly
         */
        private SkippedClassResolver $skippedClassResolver,
        /**
         * @readonly
         */
        private ReflectionProvider $reflectionProvider
    )
    {
    }
    /**
     * @param string|object $element
     */
    public function match($element) : bool
    {
        if (\is_object($element)) {
            return \true;
        }
        return $this->reflectionProvider->hasClass($element);
    }
    /**
     * @param string|object $element
     */
    public function shouldSkip($element, string $filePath) : bool
    {
        $skippedClasses = $this->skippedClassResolver->resolve();
        return $this->skipSkipper->doesMatchSkip($element, $filePath, $skippedClasses);
    }
}
