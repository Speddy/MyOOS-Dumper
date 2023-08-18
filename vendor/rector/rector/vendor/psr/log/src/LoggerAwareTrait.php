<?php

namespace RectorPrefix202308\Psr\Log;

/**
 * Basic Implementation of LoggerAwareInterface.
 */
trait LoggerAwareTrait
{
    /**
     * The logger instance.
     *
     * @var LoggerInterface|null
     */
    protected $logger;
    /**
     * Sets a logger.
     *
     */
    public function setLogger(LoggerInterface $logger) : void
    {
        $this->logger = $logger;
    }
}
