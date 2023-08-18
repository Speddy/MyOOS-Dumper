<?php

declare (strict_types=1);
namespace Rector\Core\StaticReflection;

use Rector\Core\FileSystem\FileAndDirectoryFilter;
use Rector\Core\FileSystem\FilesystemTweaker;
use Rector\Core\FileSystem\PhpFilesFinder;
use Rector\NodeTypeResolver\Reflection\BetterReflection\SourceLocatorProvider\DynamicSourceLocatorProvider;
/**
 * @see https://phpstan.org/blog/zero-config-analysis-with-static-reflection
 * @see https://github.com/rectorphp/rector/issues/3490
 */
final readonly class DynamicSourceLocatorDecorator
{
    public function __construct(
        /**
         * @readonly
         */
        private DynamicSourceLocatorProvider $dynamicSourceLocatorProvider,
        /**
         * @readonly
         */
        private PhpFilesFinder $phpFilesFinder,
        /**
         * @readonly
         */
        private FileAndDirectoryFilter $fileAndDirectoryFilter,
        /**
         * @readonly
         */
        private FilesystemTweaker $filesystemTweaker
    )
    {
    }
    /**
     * @param string[] $paths
     */
    public function addPaths(array $paths) : void
    {
        if ($paths === []) {
            return;
        }
        $paths = $this->filesystemTweaker->resolveWithFnmatch($paths);
        $files = $this->fileAndDirectoryFilter->filterFiles($paths);
        $this->dynamicSourceLocatorProvider->addFiles($files);
        $directories = $this->fileAndDirectoryFilter->filterDirectories($paths);
        foreach ($directories as $directory) {
            $filesInDirectory = $this->phpFilesFinder->findInPaths([$directory]);
            $this->dynamicSourceLocatorProvider->addFilesByDirectory($directory, $filesInDirectory);
        }
    }
    public function isPathsEmpty() : bool
    {
        return $this->dynamicSourceLocatorProvider->isPathsEmpty();
    }
}
