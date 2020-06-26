<?php

namespace LaravelEnso\Tutorials\DynamicsRelations;

use Closure;
use LaravelEnso\DynamicMethods\Contracts\Method;
use LaravelEnso\Tutorials\Models\Tutorial;

class Tutorials implements Method
{
    public function name(): string
    {
        return 'comments';
    }

    public function closure(): Closure
    {
        return fn () => $this->hasMany(Tutorial::class, 'created_by');
    }
}
