<?php

declare (strict_types=1);
namespace Rector\Symfony\ValueObject;

final readonly class EventNameToClassAndConstant
{
    public function __construct(
        /**
         * @readonly
         */
        private string $eventName,
        /**
         * @readonly
         */
        private string $eventClass,
        /**
         * @readonly
         */
        private string $eventConstant
    )
    {
    }
    public function getEventName() : string
    {
        return $this->eventName;
    }
    public function getEventClass() : string
    {
        return $this->eventClass;
    }
    public function getEventConstant() : string
    {
        return $this->eventConstant;
    }
}
