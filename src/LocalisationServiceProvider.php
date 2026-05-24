<?php

namespace LaravelEnso\Tutorials;

use LaravelEnso\Localisation\TranslatableModelServiceProvider as ServiceProvider;
use LaravelEnso\Tutorials\Models\Tutorial;

class LocalisationServiceProvider extends ServiceProvider
{
    protected array $models = [
        Tutorial::class,
    ];
}
