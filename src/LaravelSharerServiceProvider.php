<?php

namespace Shuaau\LaravelSharer;

use \Illuminate\Support\ServiceProvider;

class LaravelSharerServiceProvider extends ServiceProvider {

    /**
     * Boot method
     */
    public function boot() {
        $this->publishes([
            __DIR__.'/../config/sharer.php' => config_path('sharer.php'),
        ], 'config');
    }

    /**
     * Register method
     */
    public function register()
    {
        $this->app->bind('LaravelSharer', function () {
            return new LaravelSharer();
        });
    }

}
