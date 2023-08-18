<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace RectorPrefix202308\Symfony\Component\Console\Helper;

use RectorPrefix202308\Symfony\Component\Console\Output\OutputInterface;
use RectorPrefix202308\Symfony\Component\VarDumper\Cloner\ClonerInterface;
use RectorPrefix202308\Symfony\Component\VarDumper\Cloner\VarCloner;
use RectorPrefix202308\Symfony\Component\VarDumper\Dumper\CliDumper;
/**
 * @author Roland Franssen <franssen.roland@gmail.com>
 */
final class Dumper
{
    /**
     * @var \Symfony\Component\Console\Output\OutputInterface
     */
    private $output;
    private ?\Closure $handler = null;
    public function __construct(OutputInterface $output, private $dumper = null, private $cloner = null)
    {
        $this->output = $output;
        if (\class_exists(CliDumper::class)) {
            $this->handler = function ($var) : string {
                $dumper = $this->dumper ??= new CliDumper(null, null, CliDumper::DUMP_LIGHT_ARRAY | CliDumper::DUMP_COMMA_SEPARATOR);
                $dumper->setColors($this->output->isDecorated());
                return \rtrim((string) $dumper->dump(($this->cloner ??= new VarCloner())->cloneVar($var)->withRefHandles(\false), \true));
            };
        } else {
            $this->handler = fn($var): string => match (\true) {
                null === $var => 'null',
                \true === $var => 'true',
                \false === $var => 'false',
                \is_string($var) => '"' . $var . '"',
                default => \rtrim(\print_r($var, \true)),
            };
        }
    }
    public function __invoke(mixed $var) : string
    {
        return ($this->handler)($var);
    }
}
