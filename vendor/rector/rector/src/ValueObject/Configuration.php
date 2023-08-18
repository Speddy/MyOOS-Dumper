<?php

declare (strict_types=1);
namespace Rector\Core\ValueObject;

use Rector\ChangesReporting\Output\ConsoleOutputFormatter;
use RectorPrefix202308\Webmozart\Assert\Assert;
final readonly class Configuration
{
    /**
     * @param string[] $fileExtensions
     * @param string[] $paths
     */
    public function __construct(
        /**
         * @readonly
         */
        private bool $isDryRun = \false,
        /**
         * @readonly
         */
        private bool $showProgressBar = \true,
        /**
         * @readonly
         */
        private bool $shouldClearCache = \false,
        /**
         * @readonly
         */
        private string $outputFormat = ConsoleOutputFormatter::NAME,
        /**
         * @readonly
         */
        private array $fileExtensions = ['php'],
        /**
         * @readonly
         */
        private array $paths = [],
        /**
         * @readonly
         */
        private bool $showDiffs = \true,
        /**
         * @readonly
         */
        private ?string $parallelPort = null,
        /**
         * @readonly
         */
        private ?string $parallelIdentifier = null,
        /**
         * @readonly
         */
        private bool $isParallel = \false,
        /**
         * @readonly
         */
        private ?string $memoryLimit = null
    )
    {
    }
    public function isDryRun() : bool
    {
        return $this->isDryRun;
    }
    public function shouldShowProgressBar() : bool
    {
        return $this->showProgressBar;
    }
    public function shouldClearCache() : bool
    {
        return $this->shouldClearCache;
    }
    /**
     * @return string[]
     */
    public function getFileExtensions() : array
    {
        Assert::notEmpty($this->fileExtensions);
        return $this->fileExtensions;
    }
    /**
     * @return string[]
     */
    public function getPaths() : array
    {
        return $this->paths;
    }
    public function getOutputFormat() : string
    {
        return $this->outputFormat;
    }
    public function shouldShowDiffs() : bool
    {
        return $this->showDiffs;
    }
    public function getParallelPort() : ?string
    {
        return $this->parallelPort;
    }
    public function getParallelIdentifier() : ?string
    {
        return $this->parallelIdentifier;
    }
    public function isParallel() : bool
    {
        return $this->isParallel;
    }
    public function getMemoryLimit() : ?string
    {
        return $this->memoryLimit;
    }
}
