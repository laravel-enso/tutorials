<?php

namespace LaravelEnso\TutorialManager\app\Http\Controllers;

use App\Http\Controllers\Controller;
use LaravelEnso\Core\app\Models\Permission;
use LaravelEnso\DataTable\app\Traits\DataTable;
use LaravelEnso\TutorialManager\app\DataTable\TutorialsTableStructure;
use LaravelEnso\TutorialManager\app\Enums\TutorialPlacementEnum;
use LaravelEnso\TutorialManager\app\Http\Requests\ValidateTutorialRequest;
use LaravelEnso\TutorialManager\app\Models\Tutorial;

class TutorialController extends Controller
{
    use DataTable;
    protected $tableStructureClass = TutorialsTableStructure::class;

    public static function getTableQuery()
    {
        $query = Tutorial::select(\DB::raw('tutorials.id as DT_RowId, permissions.name as permissionName, tutorials.element,
                tutorials.title, tutorials.placement, tutorials.order, tutorials.created_at, tutorials.updated_at'))
            ->join('permissions', 'permissions.id', '=', 'tutorials.permission_id');

        return $query;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('laravel-enso/tutorials::index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all()->pluck('name', 'id');
        $placementsEnum = new TutorialPlacementEnum();
        $placements = $placementsEnum->getData();

        return view('laravel-enso/tutorials::create', compact('permissions', 'placements'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ValidateTutorialRequest $request
     * @param Tutorial                $tutorial
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateTutorialRequest $request, Tutorial $tutorial)
    {
        $tutorial->fill($request->all());
        $tutorial->save();

        flash()->success(__('Tutorial Created'));

        return redirect('system/tutorials/'.$tutorial->id.'/edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Tutorial $tutorial
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Tutorial $tutorial)
    {
        $permissions = Permission::all()->pluck('name', 'id');
        $placementsEnum = new TutorialPlacementEnum();
        $placements = $placementsEnum->getData();

        return view('laravel-enso/tutorials::edit', compact('tutorial', 'permissions', 'placements'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ValidateTutorialRequest $request
     * @param Tutorial                $tutorial
     *
     * @return \Illuminate\Http\Response
     */
    public function update(ValidateTutorialRequest $request, Tutorial $tutorial)
    {
        $tutorial->fill($request->all());
        $tutorial->save();

        flash()->success(__('The Changes have been saved!'));

        return back();
    }

    public function destroy(Tutorial $tutorial)
    {
        $tutorial->delete();

        return [
            'level'   => 'success',
            'message' => __('Operation was successfull'),
        ];
    }

    public function getTutorial($route)
    {
        $homeTutorial = Tutorial::wherePermissionId(1)->orderBy('order')->get();
        $permission = Permission::whereName($route)->first();
        $localTutorial = $permission ? $permission->tutorials->sortBy('order') : null;
        $tutorial = $homeTutorial->merge($localTutorial);

        return $tutorial;
    }
}
