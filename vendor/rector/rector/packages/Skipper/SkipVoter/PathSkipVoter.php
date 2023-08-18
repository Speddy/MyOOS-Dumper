<?php

declare (strict_types=1);
namespace Rector\Skipper\SkipVoter;

use Rector\Skipper\Contract\SkipVoterInterface;
use Rector\Skipper\Matcher\FileInfoMatcher;
use Rector\Skipper\SkipCriteriaResolver\SkippedPathsResolver;
final class PathSkipVoter implements SkipVoterInterface
{
    /**
     * @var array<string, bool>
     */
    private array $skippedFiles = [];
    public function __construct(
        /**
         * @readonly
         */
        private readonly FileInfoMatcher $fileInfoMatcher,
        /**
         * @readonly
         */
        private readonly SkippedPathsResolver $skippedPathsResolver
    )
    {
    }
    /**
     * @param string|object $element
     */
    public function match($element) : bool
    {
        return \true;
    }
    /**
     * @param string|object $element
     */
    public function shouldSkip($element, string $filePath) : bool
    {
        if (isset($this->skippedFiles[$filePath])) {
            return $this->skippedFiles[$filePath];
        }
        $skippedPaths = $this->skippedPathsResolver->resolve();
        return $this->skippedFiles[$filePath] = $this->fileInfoMatcher->doesFileInfoMatchPatterns($filePath, $skippedPaths);
    }
}
