<?php

declare (strict_types=1);
namespace Rector\Core\Console\Command;

use Rector\Caching\Detector\ChangedFilesDetector;
use Rector\ChangesReporting\Output\JsonOutputFormatter;
use Rector\Core\Application\ApplicationFileProcessor;
use Rector\Core\Autoloading\AdditionalAutoloader;
use Rector\Core\Configuration\ConfigInitializer;
use Rector\Core\Configuration\ConfigurationFactory;
use Rector\Core\Configuration\Option;
use Rector\Core\Console\ExitCode;
use Rector\Core\Console\Output\OutputFormatterCollector;
use Rector\Core\Console\ProcessConfigureDecorator;
use Rector\Core\Exception\ShouldNotHappenException;
use Rector\Core\StaticReflection\DynamicSourceLocatorDecorator;
use Rector\Core\Util\MemoryLimiter;
use Rector\Core\ValueObject\Configuration;
use Rector\Core\ValueObject\ProcessResult;
use Rector\Core\ValueObjectFactory\ProcessResultFactory;
use RectorPrefix202308\Symfony\Component\Console\Application;
use RectorPrefix202308\Symfony\Component\Console\Command\Command;
use RectorPrefix202308\Symfony\Component\Console\Input\InputInterface;
use RectorPrefix202308\Symfony\Component\Console\Output\OutputInterface;
use RectorPrefix202308\Symfony\Component\Console\Style\SymfonyStyle;
final class ProcessCommand extends Command
{
    /**
     * @readonly
     * @var \Symfony\Component\Console\Style\SymfonyStyle
     */
    private $symfonyStyle;
    public function __construct(/**
     * @readonly
     */
    private readonly AdditionalAutoloader $additionalAutoloader, /**
     * @readonly
     */
    private readonly ChangedFilesDetector $changedFilesDetector, /**
     * @readonly
     */
    private readonly ConfigInitializer $configInitializer, /**
     * @readonly
     */
    private readonly ApplicationFileProcessor $applicationFileProcessor, /**
     * @readonly
     */
    private readonly ProcessResultFactory $processResultFactory, /**
     * @readonly
     */
    private readonly DynamicSourceLocatorDecorator $dynamicSourceLocatorDecorator, /**
     * @readonly
     */
    private readonly OutputFormatterCollector $outputFormatterCollector, SymfonyStyle $symfonyStyle, /**
     * @readonly
     */
    private readonly MemoryLimiter $memoryLimiter, /**
     * @readonly
     */
    private readonly ConfigurationFactory $configurationFactory)
    {
        $this->symfonyStyle = $symfonyStyle;
        parent::__construct();
    }
    protected function configure() : void
    {
        $this->setName('process');
        $this->setDescription('Upgrades or refactors source code with provided rectors');
        ProcessConfigureDecorator::decorate($this);
        parent::configure();
    }
    protected function execute(InputInterface $input, OutputInterface $output) : int
    {
        // missing config? add it :)
        if (!$this->configInitializer->areSomeRectorsLoaded()) {
            $this->configInitializer->createConfig(\getcwd());
            return self::SUCCESS;
        }
        $configuration = $this->configurationFactory->createFromInput($input);
        $this->memoryLimiter->adjust($configuration);
        // disable console output in case of json output formatter
        if ($configuration->getOutputFormat() === JsonOutputFormatter::NAME) {
            $this->symfonyStyle->setVerbosity(OutputInterface::VERBOSITY_QUIET);
        }
        $this->additionalAutoloader->autoloadInput($input);
        $this->additionalAutoloader->autoloadPaths();
        $paths = $configuration->getPaths();
        // 1. add files and directories to static locator
        $this->dynamicSourceLocatorDecorator->addPaths($paths);
        if ($this->dynamicSourceLocatorDecorator->isPathsEmpty()) {
            $this->symfonyStyle->error('The given paths do not match any files');
            return ExitCode::FAILURE;
        }
        // MAIN PHASE
        // 2. run Rector
        $systemErrorsAndFileDiffs = $this->applicationFileProcessor->run($configuration, $input);
        // REPORTING PHASE
        // 3. reporting phase
        // report diffs and errors
        $outputFormat = $configuration->getOutputFormat();
        $outputFormatter = $this->outputFormatterCollector->getByName($outputFormat);
        $processResult = $this->processResultFactory->create($systemErrorsAndFileDiffs);
        $outputFormatter->report($processResult, $configuration);
        return $this->resolveReturnCode($processResult, $configuration);
    }
    protected function initialize(InputInterface $input, OutputInterface $output) : void
    {
        $application = $this->getApplication();
        if (!$application instanceof Application) {
            throw new ShouldNotHappenException();
        }
        $optionDebug = (bool) $input->getOption(Option::DEBUG);
        if ($optionDebug) {
            $application->setCatchExceptions(\false);
        }
        // clear cache
        $optionClearCache = (bool) $input->getOption(Option::CLEAR_CACHE);
        if ($optionDebug || $optionClearCache) {
            $this->changedFilesDetector->clear();
        }
    }
    /**
     * @return ExitCode::*
     */
    private function resolveReturnCode(ProcessResult $processResult, Configuration $configuration) : int
    {
        // some system errors were found → fail
        if ($processResult->getErrors() !== []) {
            return ExitCode::FAILURE;
        }
        // inverse error code for CI dry-run
        if (!$configuration->isDryRun()) {
            return ExitCode::SUCCESS;
        }
        if ($processResult->getFileDiffs() !== []) {
            return ExitCode::CHANGED_CODE;
        }
        return ExitCode::SUCCESS;
    }
}
