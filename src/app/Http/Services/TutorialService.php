<?php

namespace LaravelEnso\TutorialManager\app\Http\Services;

use Illuminate\Http\Request;
use LaravelEnso\DataTable\app\Traits\DataTable;
use LaravelEnso\FormBuilder\app\Classes\FormBuilder;
use LaravelEnso\PermissionManager\app\Models\Permission;
use LaravelEnso\TutorialManager\app\DataTable\TutorialsTableStructure;
use LaravelEnso\TutorialManager\app\Enums\TutorialPlacement;
use LaravelEnso\TutorialManager\app\Models\Tutorial;

class TutorialService
{
    use DataTable;

    protected $tableStructureClass = TutorialsTableStructure::class;

    private const HomePermissionId = 1;

    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function create()
    {
        $form = (new FormBuilder(__DIR__.'/../../Forms/tutorial.json'))
            ->setAction('POST')
            ->setTitle('Create Tutorial')
            ->setUrl('/system/tutorials')
            ->setSelectOptions('permission_id', Permission::pluck('name', 'id'))
            ->setSelectOptions('placement', (object) (new TutorialPlacement())->getData())
            ->getData();

        return view('laravel-enso/tutorials::create', compact('form'));
    }

    public function store(Tutorial $tutorial)
    {
        $tutorial = $tutorial->create($this->request->all());

        return [
            'message'  => __('The tutorial was created!'),
            'redirect' => '/system/tutorials/'.$tutorial->id.'/edit',
        ];
    }

    public function edit(Tutorial $tutorial)
    {
        $form = (new FormBuilder(__DIR__.'/../../Forms/tutorial.json', $tutorial))
            ->setAction('PATCH')
            ->setTitle('Edit Tutorial')
            ->setUrl('/system/tutorials/'.$tutorial->id)
            ->setSelectOptions('permission_id', Permission::pluck('name', 'id'))
            ->setSelectOptions('placement', (object) (new TutorialPlacement())->getData())
            ->getData();

        return view('laravel-enso/tutorials::edit', compact('form'));
    }

    public function update(Tutorial $tutorial)
    {
        $tutorial->update($this->request->all());

        return [
            'message' => __(config('labels.savedChanges')),
        ];
    }

    public function destroy(Tutorial $tutorial)
    {
        $tutorial->delete();

        return ['message' => __(config('labels.successfulOperation'))];
    }

    public function show($route)
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
