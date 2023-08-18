<?php

namespace RectorPrefix202308\Illuminate\Contracts\Auth;

interface StatefulGuard extends Guard
{
    /**
     * Attempt to authenticate a user using the given credentials.
     *
     * @param  bool  $remember
     * @return bool
     */
    public function attempt(array $credentials = [], $remember = \false);
    /**
     * Log a user into the application without sessions or cookies.
     *
     * @return bool
     */
    public function once(array $credentials = []);
    /**
     * Log a user into the application.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  bool  $remember
     * @return void
     */
    public function login(Authenticatable $user, $remember = \false);
    /**
     * Log the given user ID into the application.
     *
     * @param  bool  $remember
     * @return \Illuminate\Contracts\Auth\Authenticatable|bool
     */
    public function loginUsingId(mixed $id, $remember = \false);
    /**
     * Log the given user ID into the application without sessions or cookies.
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|bool
     */
    public function onceUsingId(mixed $id);
    /**
     * Determine if the user was authenticated via "remember me" cookie.
     *
     * @return bool
     */
    public function viaRemember();
    /**
     * Log the user out of the application.
     *
     * @return void
     */
    public function logout();
}
