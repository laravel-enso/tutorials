<?php

namespace LaravelEnso\TutorialManager\app\Http\Controllers;

use App\Http\Controllers\Controller;
use LaravelEnso\PermissionManager\app\Models\Permission;
use LaravelEnso\DataTable\app\Traits\DataTable;
use LaravelEnso\TutorialManager\app\DataTable\TutorialsTableStructure;
use LaravelEnso\TutorialManager\app\Enums\TutorialPlacementEnum;
use LaravelEnso\TutorialManager\app\Http\Requests\ValidateTutorialRequest;
use LaravelEnso\TutorialManager\app\Models\Tutorial;

class TutorialController extends Controller
{
    use DataTable;

    protected $tableStructureClass = TutorialsTableStructure::class;

    private const HomePermissionId = 1;

    public static function getTableQuery()
    {
        $query = Tutorial::select(\DB::raw('tutorials.id as DT_RowId, permissions.name as permissionName,
                tutorials.element, tutorials.title, tutorials.placement, tutorials.order,
                tutorials.created_at, tutorials.updated_at'))
            ->join('permissions', 'permissions.id', '=', 'tutorials.permission_id');

        return $query;
    }

    public function index()
    {
        return view('laravel-enso/tutorials::index');
    }

    public function create()
    {
        $permissions = Permission::pluck('name', 'id');
        $positions = (new TutorialPlacementEnum())->getData();

        return view('laravel-enso/tutorials::create', compact('permissions', 'positions'));
    }

    public function store(ValidateTutorialRequest $request, Tutorial $tutorial)
    {
        $tutorial = $tutorial->create($request->all());
        flash()->success(__('Tutorial Created'));

        return redirect('system/tutorials/'.$tutorial->id.'/edit');
    }

    public function edit(Tutorial $tutorial)
    {
        $permissions = Permission::pluck('name', 'id');
        $positions = (new TutorialPlacementEnum())->getData();

        return view('laravel-enso/tutorials::edit', compact('tutorial', 'permissions', 'positions'));
    }

    public function update(ValidateTutorialRequest $request, Tutorial $tutorial)
    {
        $tutorial->update($request->all());
        flash()->success(__('The Changes have been saved!'));

        return back();
    }

    public function destroy(Tutorial $tutorial)
    {
        $tutorial->delete();

        return ['message' => __('Operation was successfull')];
    }

    public function getTutorial($route)
    {
        $homeTutorials = Tutorial::wherePermissionId(self::HomePermissionId)->orderBy('order')->get();
        $permission = Permission::whereName($route)->first();
        $localTutorials = $permission ? $permission->tutorials->sortBy('order') : collect();

        return $this->translateTutorial($homeTutorials->merge($localTutorials));
    }

    private function translateTutorial($tutorials)
    {
        return $tutorials->each(function ($tutorial) {
            $tutorial->title = __($tutorial->title);
            $tutorial->content = __($tutorial->content);
        });
    }
}
