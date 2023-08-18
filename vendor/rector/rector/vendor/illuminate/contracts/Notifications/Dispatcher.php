<?php

namespace RectorPrefix202308\Illuminate\Contracts\Notifications;

interface Dispatcher
{
    /**
     * Send the given notification to the given notifiable entities.
     *
     * @param  \Illuminate\Support\Collection|array|mixed  $notifiables
     * @return void
     */
    public function send($notifiables, mixed $notification);
    /**
     * Send the given notification immediately.
     *
     * @param  \Illuminate\Support\Collection|array|mixed  $notifiables
     * @return void
     */
    public function sendNow($notifiables, mixed $notification);
}
