<?php

namespace LaravelEnso\TutorialManager\app\Http\Services;

use Illuminate\Http\Request;
use LaravelEnso\FormBuilder\app\Classes\FormBuilder;
use LaravelEnso\PermissionManager\app\Models\Permission;
use LaravelEnso\TutorialManager\app\Enums\TutorialPlacement;
use LaravelEnso\TutorialManager\app\Models\Tutorial;

class TutorialService
{
    private const HomePermissionId = 1;

    public function create()
    {
        $form = (new FormBuilder(__DIR__ . '/../../Forms/tutorial.json'))
            ->setMethod('POST')
            ->setTitle('Create Tutorial')
            ->setSelectOptions('permission_id', Permission::pluck('name', 'id'))
            ->setSelectOptions('placement', (object) (new TutorialPlacement())->getData())
            ->getData();

        return compact('form');
    }

    public function store(Request $request)
    {
        $tutorial = Tutorial::create($request->all());

        return [
            'message'  => __('The tutorial was created!'),
            'redirect' => route('system.tutorials.edit', $tutorial->id, false),
        ];
    }

    public function show($route)
    {
        $homeTutorials  = Tutorial::wherePermissionId(self::HomePermissionId)->orderBy('order')->get();
        $permission     = Permission::whereName($route)->first();
        $localTutorials = $permission ? $permission->tutorials->sortBy('order') : collect();

        return $this->prepareTutorial($homeTutorials->merge($localTutorials));
    }

    public function edit(Tutorial $tutorial)
    {
        $form = (new FormBuilder(__DIR__ . '/../../Forms/tutorial.json', $tutorial))
            ->setMethod('PATCH')
            ->setTitle('Edit Tutorial')
            ->setSelectOptions('permission_id', Permission::pluck('name', 'id'))
            ->setSelectOptions('placement', (object) (new TutorialPlacement())->getData())
            ->getData();

        return compact('form');
    }

    public function update(Request $request, Tutorial $tutorial)
    {
        $tutorial->update($request->all());

        return [
            'message' => __(config('enso.labels.savedChanges')),
        ];
    }

    public function destroy(Tutorial $tutorial)
    {
        $tutorial->delete();

        return [
            'message'  => __(config('enso.labels.successfulOperation')),
            'redirect' => route('system.tutorials.index', [], false)
        ];
    }

    private function prepareTutorial($tutorials)
    {
        $placement = new TutorialPlacement();
        return $tutorials->reduce(function ($tutorials, $tutorial) use ($placement) {
            $tutorials->push([
                'intro'    => __($tutorial->content),
                'element'  => $tutorial->element,
                'position' => $placement->getValueByKey($tutorial->placement),
                'disable-interaction' => true
            ]);

            return $tutorials;
        }, collect());
    }
}
