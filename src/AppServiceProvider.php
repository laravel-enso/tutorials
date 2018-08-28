<?php

namespace LaravelEnso\TutorialManager;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->load();

        $this->publish();
    }

    private function load()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/api.php');

        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
    }

    private function publish()
    {
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
