<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace RectorPrefix202308\Symfony\Component\Process\Exception;

use RectorPrefix202308\Symfony\Component\Process\Process;
/**
 * Exception that is thrown when a process times out.
 *
 * @author Johannes M. Schmitt <schmittjoh@gmail.com>
 */
class ProcessTimedOutException extends RuntimeException
{
    final public const TYPE_GENERAL = 1;
    final public const TYPE_IDLE = 2;
    public function __construct(private readonly Process $process, private readonly int $timeoutType)
    {
        parent::__construct(\sprintf('The process "%s" exceeded the timeout of %s seconds.', $process->getCommandLine(), $this->getExceededTimeout()));
    }
    /**
     * @return Process
     */
    public function getProcess()
    {
        return $this->process;
    }
    /**
     * @return bool
     */
    public function isGeneralTimeout()
    {
        return self::TYPE_GENERAL === $this->timeoutType;
    }
    /**
     * @return bool
     */
    public function isIdleTimeout()
    {
        return self::TYPE_IDLE === $this->timeoutType;
    }
    public function getExceededTimeout() : ?float
    {
        return match ($this->timeoutType) {
            self::TYPE_GENERAL => $this->process->getTimeout(),
            self::TYPE_IDLE => $this->process->getIdleTimeout(),
            default => throw new \LogicException(\sprintf('Unknown timeout type "%d".', $this->timeoutType)),
        };
    }
}
