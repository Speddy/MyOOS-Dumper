<?php

namespace RectorPrefix202308\React\Promise;

class UnhandledRejectionException extends \RuntimeException
{
    public static function resolve($reason)
    {
        if ($reason instanceof \Exception || $reason instanceof \Throwable) {
            return $reason;
        }
        return new static($reason);
    }
    public function __construct(private $reason)
    {
        $message = \sprintf('Unhandled Rejection: %s', \json_encode($reason, JSON_THROW_ON_ERROR));
        parent::__construct($message, 0);
    }
    public function getReason()
    {
        return $this->reason;
    }
}
