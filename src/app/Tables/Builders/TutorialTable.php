<?php

namespace LaravelEnso\TutorialManager\app\Tables\Builders;

use LaravelEnso\VueDatatable\app\Classes\Table;
use LaravelEnso\TutorialManager\app\Models\Tutorial;

class TutorialTable extends Table
{
    protected $templatePath = __DIR__.'/../Templates/tutorials.json';

    public function query()
    {
        return Tutorial::select(\DB::raw(
            'tutorials.id as "dtRowId", permissions.name as permissionName,
            tutorials.element, tutorials.title, tutorials.placement,
            tutorials.order_index, tutorials.created_at'
        ))->join('permissions', 'permissions.id', '=', 'tutorials.permission_id');
    }
}
