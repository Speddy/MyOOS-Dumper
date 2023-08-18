<?php

declare (strict_types=1);
namespace Rector\Caching;

use Rector\Caching\Detector\ChangedFilesDetector;
final readonly class UnchangedFilesFilter
{
    public function __construct(
        /**
         * @readonly
         */
        private ChangedFilesDetector $changedFilesDetector
    )
    {
    }
    /**
     * @param string[] $filePaths
     * @return string[]
     */
    public function filterFileInfos(array $filePaths) : array
    {
        $changedFileInfos = [];
        foreach ($filePaths as $filePath) {
            if (!$this->changedFilesDetector->hasFileChanged($filePath)) {
                continue;
            }
            $changedFileInfos[] = $filePath;
            $this->changedFilesDetector->invalidateFile($filePath);
        }
        return \array_unique($changedFileInfos);
    }
}
