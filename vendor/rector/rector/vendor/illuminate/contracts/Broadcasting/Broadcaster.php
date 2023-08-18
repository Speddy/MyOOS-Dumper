<?php

namespace RectorPrefix202308\Illuminate\Contracts\Broadcasting;

interface Broadcaster
{
    /**
     * Authenticate the incoming request for a given channel.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function auth($request);
    /**
     * Return the valid authentication response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function validAuthenticationResponse($request, mixed $result);
    /**
     * Broadcast the given event.
     *
     * @param  string  $event
     * @return void
     *
     * @throws \Illuminate\Broadcasting\BroadcastException
     */
    public function broadcast(array $channels, $event, array $payload = []);
}
