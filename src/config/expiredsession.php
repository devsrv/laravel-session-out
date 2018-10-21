<?php

return [

    /*
    |--------------------------------------------------------------------------
    | seconds between auth session existance check ajax request
    |--------------------------------------------------------------------------
    |
    |
 */
    'gap_seconds' => 30,

    /*
    |--------------------------------------------------------------------------
    | Routes group config
    |--------------------------------------------------------------------------
    |
    | The default group settings for the sessionout package routes.
    | don't remove the web middleware group as it consists of all important 
    | middlewares as session, auth etc.
    |
     */

    'route' => [
        'middleware' => ['web'],
    ],

];
