<?php

namespace devsrv\sessionout\classes;

use devsrv\sessionout\Events\AuthSessionBegins;
use Auth;

class AuthState
{
    /**
     * broadcast user auth session available
     */
    public static function sessionAvailable()
    {
        broadcast(new AuthSessionBegins(Auth::id()));
    }
}
