<?php

namespace LaravelEnso\Tutorials;

use Illuminate\Support\ServiceProvider;
use LaravelEnso\DynamicMethods\Services\Methods;
use LaravelEnso\Permissions\Models\Permission;
use LaravelEnso\Tutorials\DynamicRelations\Tutorials;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->load()
            ->publish();

        Methods::bind(Permission::class, [Tutorials::class]);
    }

    private function load()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/tutorials.php', 'enso.tutorials');

        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        return $this;
    }

    private function publish()
    {
        $this->publishes([
            __DIR__.'/../config' => config_path('enso'),
        ], ['tutorials-config', 'enso-config']);

        $this->publishes([
            __DIR__.'/../database/factories' => database_path('factories'),
        ], ['tutorials-factory', 'enso-factories']);
    }
}
