<?php

namespace LaravelEnso\TutorialManager\app\Http\Controllers;

use App\Http\Controllers\Controller;
use LaravelEnso\VueDatatable\app\Traits\Excel;
use LaravelEnso\VueDatatable\app\Traits\Datatable;
use LaravelEnso\TutorialManager\app\Models\Tutorial;

class TutorialTableController extends Controller
{
    use Datatable, Excel;

    private const Template = __DIR__.'/../../Tables/tutorials.json';

    public function query()
    {
        return Tutorial::select(\DB::raw(
            'tutorials.id as DT_RowId, permissions.name as permissionName,
            tutorials.element, tutorials.title, tutorials.placement, tutorials.`order`,
            tutorials.created_at, tutorials.updated_at'
        ))->join('permissions', 'permissions.id', '=', 'tutorials.permission_id');
    }
}
