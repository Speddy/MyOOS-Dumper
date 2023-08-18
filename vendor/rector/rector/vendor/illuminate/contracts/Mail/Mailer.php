<?php

namespace RectorPrefix202308\Illuminate\Contracts\Mail;

interface Mailer
{
    /**
     * Begin the process of mailing a mailable class instance.
     *
     * @return \Illuminate\Mail\PendingMail
     */
    public function to(mixed $users);
    /**
     * Begin the process of mailing a mailable class instance.
     *
     * @return \Illuminate\Mail\PendingMail
     */
    public function bcc(mixed $users);
    /**
     * Send a new message with only a raw text part.
     *
     * @param  string  $text
     * @return \Illuminate\Mail\SentMessage|null
     */
    public function raw($text, mixed $callback);
    /**
     * Send a new message using a view.
     *
     * @param  \Illuminate\Contracts\Mail\Mailable|string|array  $view
     * @param  \Closure|string|null  $callback
     * @return \Illuminate\Mail\SentMessage|null
     */
    public function send($view, array $data = [], $callback = null);
}
