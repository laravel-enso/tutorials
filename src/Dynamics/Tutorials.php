<?php

namespace LaravelEnso\Tutorials\Dynamics;

use Closure;
use LaravelEnso\DynamicMethods\Contracts\Relation;
use LaravelEnso\Permissions\Models\Permission;
use LaravelEnso\Tutorials\Models\Tutorial;

class Tutorials implements Relation
{
    public function bindTo(): array
    {
        return [Permission::class];
    }

    public function name(): string
    {
        return 'tutorials';
    }

    public function closure(): Closure
    {
        return fn (Permission $permission) => $permission
            ->hasMany(Tutorial::class, 'permission_id');
    }
}
