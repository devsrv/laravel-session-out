<?php

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
 */

Broadcast::channel('user.sessiotrack.{id}', function ($user, $user_id) {
    return (int) $user->id === (int) $user_id;
});
