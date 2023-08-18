<?php

declare (strict_types=1);
namespace Rector\Caching\ValueObject;

final readonly class CacheFilePaths
{
    public function __construct(
        /**
         * @readonly
         */
        private string $firstDirectory,
        /**
         * @readonly
         */
        private string $secondDirectory,
        /**
         * @readonly
         */
        private string $filePath
    )
    {
    }
    public function getFirstDirectory() : string
    {
        return $this->firstDirectory;
    }
    public function getSecondDirectory() : string
    {
        return $this->secondDirectory;
    }
    public function getFilePath() : string
    {
        return $this->filePath;
    }
}
