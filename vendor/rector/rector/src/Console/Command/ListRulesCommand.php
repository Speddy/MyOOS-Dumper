<?php

declare (strict_types=1);
namespace Rector\Core\Console\Command;

use RectorPrefix202308\Nette\Utils\Json;
use Rector\ChangesReporting\Output\ConsoleOutputFormatter;
use Rector\Core\Configuration\Option;
use Rector\Core\Contract\Rector\RectorInterface;
use Rector\PostRector\Contract\Rector\PostRectorInterface;
use Rector\Skipper\SkipCriteriaResolver\SkippedClassResolver;
use RectorPrefix202308\Symfony\Component\Console\Command\Command;
use RectorPrefix202308\Symfony\Component\Console\Input\InputInterface;
use RectorPrefix202308\Symfony\Component\Console\Input\InputOption;
use RectorPrefix202308\Symfony\Component\Console\Output\OutputInterface;
use RectorPrefix202308\Symfony\Component\Console\Style\SymfonyStyle;
final class ListRulesCommand extends Command
{
    /**
     * @readonly
     * @var \Symfony\Component\Console\Style\SymfonyStyle
     */
    private $symfonyStyle;
    /**
     * @param RectorInterface[] $rectors
     */
    public function __construct(SymfonyStyle $symfonyStyle, /**
     * @readonly
     */
    private readonly SkippedClassResolver $skippedClassResolver, /**
     * @readonly
     */
    private readonly array $rectors)
    {
        $this->symfonyStyle = $symfonyStyle;
        parent::__construct();
    }
    protected function configure() : void
    {
        $this->setName('list-rules');
        $this->setDescription('Show loaded Rectors');
        $this->addOption(Option::OUTPUT_FORMAT, null, InputOption::VALUE_REQUIRED, 'Select output format', ConsoleOutputFormatter::NAME);
    }
    protected function execute(InputInterface $input, OutputInterface $output) : int
    {
        $rectorClasses = $this->resolveRectorClasses();
        $skippedClasses = $this->getSkippedCheckers();
        $outputFormat = $input->getOption(Option::OUTPUT_FORMAT);
        if ($outputFormat === 'json') {
            $data = ['rectors' => $rectorClasses, 'skipped-rectors' => $skippedClasses];
            echo Json::encode($data, Json::PRETTY) . \PHP_EOL;
            return Command::SUCCESS;
        }
        $this->symfonyStyle->title('Loaded Rector rules');
        $this->symfonyStyle->listing($rectorClasses);
        if ($skippedClasses !== []) {
            $this->symfonyStyle->title('Skipped Rector rules');
            $this->symfonyStyle->listing($skippedClasses);
        }
        return Command::SUCCESS;
    }
    /**
     * @return array<class-string<RectorInterface>>
     */
    private function resolveRectorClasses() : array
    {
        $customRectors = \array_filter($this->rectors, static fn(RectorInterface $rector): bool => !$rector instanceof PostRectorInterface);
        $rectorClasses = \array_map(static fn(RectorInterface $rector): string => $rector::class, $customRectors);
        \sort($rectorClasses);
        return $rectorClasses;
    }
    /**
     * @return string[]
     */
    private function getSkippedCheckers() : array
    {
        $skippedCheckers = [];
        foreach ($this->skippedClassResolver->resolve() as $checkerClass => $fileList) {
            // ignore specific skips
            if ($fileList !== null) {
                continue;
            }
            $skippedCheckers[] = $checkerClass;
        }
        return $skippedCheckers;
    }
}
