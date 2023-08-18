<?php

namespace RectorPrefix202308\Illuminate\Contracts\Bus;

interface Dispatcher
{
    /**
     * Dispatch a command to its appropriate handler.
     *
     * @return mixed
     */
    public function dispatch(mixed $command);
    /**
     * Dispatch a command to its appropriate handler in the current process.
     *
     * Queueable jobs will be dispatched to the "sync" queue.
     *
     * @return mixed
     */
    public function dispatchSync(mixed $command, mixed $handler = null);
    /**
     * Dispatch a command to its appropriate handler in the current process.
     *
     * @return mixed
     */
    public function dispatchNow(mixed $command, mixed $handler = null);
    /**
     * Determine if the given command has a handler.
     *
     * @return bool
     */
    public function hasCommandHandler(mixed $command);
    /**
     * Retrieve the handler for a command.
     *
     * @return bool|mixed
     */
    public function getCommandHandler(mixed $command);
    /**
     * Set the pipes commands should be piped through before dispatching.
     *
     * @return $this
     */
    public function pipeThrough(array $pipes);
    /**
     * Map a command to a handler.
     *
     * @return $this
     */
    public function map(array $map);
}
