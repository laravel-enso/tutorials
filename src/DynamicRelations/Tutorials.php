<?php

namespace LaravelEnso\Tutorials\DynamicRelations;

use Closure;
use LaravelEnso\DynamicMethods\Contracts\Method;
use LaravelEnso\Tutorials\Models\Tutorial;

class Tutorials implements Method
{
    public function name(): string
    {
        return 'tutorials';
    }

    public function closure(): Closure
    {
        return fn () => $this->hasMany(Tutorial::class, 'permission_id');
    }
}
