<?php

namespace LaravelEnso\Tutorials\app\Tables\Builders;

use LaravelEnso\Tutorials\app\Models\Tutorial;
use LaravelEnso\Tables\app\Services\Table;

class TutorialTable extends Table
{
    protected $templatePath = __DIR__.'/../Templates/tutorials.json';

    public function query()
    {
        return Tutorial::selectRaw('
                tutorials.id as "dtRowId", permissions.name as permissionName,
                tutorials.element, tutorials.title, tutorials.placement,
                tutorials.order_index, tutorials.created_at
            ')->join('permissions', 'permissions.id', '=', 'tutorials.permission_id');
    }
}
