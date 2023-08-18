<?php

namespace RectorPrefix202308\React\EventLoop;

/**
 * @internal
 */
final class SignalsHandler
{
    private array $signals = [];
    public function add($signal, $listener)
    {
        if (!isset($this->signals[$signal])) {
            $this->signals[$signal] = [];
        }
        if (\in_array($listener, $this->signals[$signal])) {
            return;
        }
        $this->signals[$signal][] = $listener;
    }
    public function remove($signal, $listener)
    {
        if (!isset($this->signals[$signal])) {
            return;
        }
        $index = \array_search($listener, $this->signals[$signal], \true);
        unset($this->signals[$signal][$index]);
        if (isset($this->signals[$signal]) && (is_countable($this->signals[$signal]) ? \count($this->signals[$signal]) : 0) === 0) {
            unset($this->signals[$signal]);
        }
    }
    public function call($signal)
    {
        if (!isset($this->signals[$signal])) {
            return;
        }
        foreach ($this->signals[$signal] as $listener) {
            \call_user_func($listener, $signal);
        }
    }
    public function count($signal)
    {
        if (!isset($this->signals[$signal])) {
            return 0;
        }
        return is_countable($this->signals[$signal]) ? \count($this->signals[$signal]) : 0;
    }
    public function isEmpty()
    {
        return !$this->signals;
    }
}
