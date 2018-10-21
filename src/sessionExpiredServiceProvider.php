<?php

namespace devsrv\sessionout;

use Illuminate\Support\ServiceProvider;

class sessionExpiredServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');

        $this->loadViewsFrom(__DIR__ . '/views', 'sessionout');
        $this->publishes([
            __DIR__ . '/views' => resource_path('views/vendor/sessionout'),
        ]);

        $this->publishes([
            __DIR__ . '/assets' => public_path('vendor/sessionout'),
        ], 'public');

        $this->publishes([
            __DIR__ . '/config/expiredsession.php' => config_path('expiredsession.php'),
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
