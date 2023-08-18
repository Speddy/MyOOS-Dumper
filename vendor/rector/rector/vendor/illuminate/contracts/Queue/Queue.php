<?php

namespace RectorPrefix202308\Illuminate\Contracts\Queue;

interface Queue
{
    /**
     * Get the size of the queue.
     *
     * @param  string|null  $queue
     * @return int
     */
    public function size($queue = null);
    /**
     * Push a new job onto the queue.
     *
     * @param  string|object  $job
     * @param  string|null  $queue
     * @return mixed
     */
    public function push($job, mixed $data = '', $queue = null);
    /**
     * Push a new job onto the queue.
     *
     * @param  string  $queue
     * @param  string|object  $job
     * @return mixed
     */
    public function pushOn($queue, $job, mixed $data = '');
    /**
     * Push a raw payload onto the queue.
     *
     * @param  string  $payload
     * @param  string|null  $queue
     * @return mixed
     */
    public function pushRaw($payload, $queue = null, array $options = []);
    /**
     * Push a new job onto the queue after (n) seconds.
     *
     * @param  \DateTimeInterface|\DateInterval|int  $delay
     * @param  string|object  $job
     * @param  string|null  $queue
     * @return mixed
     */
    public function later($delay, $job, mixed $data = '', $queue = null);
    /**
     * Push a new job onto a specific queue after (n) seconds.
     *
     * @param  string  $queue
     * @param  \DateTimeInterface|\DateInterval|int  $delay
     * @param  string|object  $job
     * @return mixed
     */
    public function laterOn($queue, $delay, $job, mixed $data = '');
    /**
     * Push an array of jobs onto the queue.
     *
     * @param  array  $jobs
     * @param  string|null  $queue
     * @return mixed
     */
    public function bulk($jobs, mixed $data = '', $queue = null);
    /**
     * Pop the next job off of the queue.
     *
     * @param  string|null  $queue
     * @return \Illuminate\Contracts\Queue\Job|null
     */
    public function pop($queue = null);
    /**
     * Get the connection name for the queue.
     *
     * @return string
     */
    public function getConnectionName();
    /**
     * Set the connection name for the queue.
     *
     * @param  string  $name
     * @return $this
     */
    public function setConnectionName($name);
}
