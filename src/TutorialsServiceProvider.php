<?php

namespace LaravelEnso\TutorialManager;

use Illuminate\Support\ServiceProvider;

class TutorialsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');

        $this->publishes([
            __DIR__.'/resources/assets/js' => resource_path('assets/js'),
        ], 'tutorials-assets');

        $this->publishes([
            __DIR__.'/resources/assets/js' => resource_path('assets/js'),
        ], 'enso-assets');
    }

    public function register()
    {
        //
    }
}
