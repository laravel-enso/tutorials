<?php

namespace LaravelEnso\TutorialManager;

use Illuminate\Support\ServiceProvider;

class TutorialManagerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishesAll();
        $this->loadDependencies();
    }

    private function publishesAll()
    {
        $this->publishes([
            __DIR__.'/database/migrations' => database_path('migrations'),
        ], 'tutorials-migration');

        $this->publishes([
            __DIR__.'/resources/views' => resource_path('views/vendor/laravel-enso/tutorialmanager'),
        ], 'tutorials-views');
    }

    private function loadDependencies()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/resources/views', 'laravel-enso/tutorials');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
