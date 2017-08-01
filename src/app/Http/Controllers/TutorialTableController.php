<?php

namespace LaravelEnso\TutorialManager\app\Http\Controllers;

use App\Http\Controllers\Controller;
use LaravelEnso\DataTable\app\Traits\DataTable;
use LaravelEnso\TutorialManager\app\DataTable\TutorialsTableStructure;
use LaravelEnso\TutorialManager\app\Models\Tutorial;

class TutorialTableController extends Controller
{
    use DataTable;

    protected $tableStructureClass = TutorialsTableStructure::class;

    public function getTableQuery()
    {
        return Tutorial::select(\DB::raw('tutorials.id as DT_RowId, permissions.name as permissionName,
                tutorials.element, tutorials.title, tutorials.placement, tutorials.order,
                tutorials.created_at, tutorials.updated_at'))
            ->join('permissions', 'permissions.id', '=', 'tutorials.permission_id');
    }
}
