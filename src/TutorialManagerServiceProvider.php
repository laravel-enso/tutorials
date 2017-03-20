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
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        $this->loadViewsFrom(__DIR__.'/../resources/views/system/tutorials', 'tutorials');

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->publishes([
            __DIR__.'/../database/migrations' => database_path('migrations'),
        ], 'tutorials-migration');

        $this->publishes([
            __DIR__.'/../resources' => base_path('resources'),
        ], 'tutorials-resources');
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
