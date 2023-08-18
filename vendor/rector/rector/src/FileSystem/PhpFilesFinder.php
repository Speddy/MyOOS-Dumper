<?php

declare (strict_types=1);
namespace Rector\Core\FileSystem;

use Rector\Caching\UnchangedFilesFilter;
final readonly class PhpFilesFinder
{
    public function __construct(
        /**
         * @readonly
         */
        private \Rector\Core\FileSystem\FilesFinder $filesFinder,
        /**
         * @readonly
         */
        private UnchangedFilesFilter $unchangedFilesFilter
    )
    {
    }
    /**
     * @param string[] $paths
     * @return string[]
     */
    public function findInPaths(array $paths) : array
    {
        $filePaths = $this->filesFinder->findInDirectoriesAndFiles($paths, ['php'], \false);
        // filter out non-PHP files
        foreach ($filePaths as $key => $filePath) {
            /**
             *  check .blade.php early so next .php check in next if can be skipped
             */
            if (str_ends_with($filePath, '.blade.php')) {
                unset($filePaths[$key]);
            }
        }
        return $this->unchangedFilesFilter->filterFileInfos($filePaths);
    }
}
