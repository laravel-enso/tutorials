<?php

namespace LaravelEnso\TutorialManager\app\Http\Services;

use Illuminate\Http\Request;
use LaravelEnso\FormBuilder\app\Classes\FormBuilder;
use LaravelEnso\PermissionManager\app\Models\Permission;
use LaravelEnso\TutorialManager\app\Enums\TutorialPlacement;
use LaravelEnso\TutorialManager\app\Models\Tutorial;

class TutorialService
{
    const HomePermissionId = 1;

    const FormPath = __DIR__.'/../../Forms/tutorial.json';

    public function create()
    {
        $form = (new FormBuilder(self::FormPath))
            ->setMethod('POST')
            ->setTitle('Create Tutorial')
            ->setSelectOptions('permission_id', Permission::pluck('name', 'id'))
            ->setSelectOptions('placement', TutorialPlacement::object())
            ->getData();

        return compact('form');
    }

    public function store(Request $request)
    {
        $tutorial = Tutorial::create($request->all());

        return [
            'message'  => __('The tutorial was created!'),
            'redirect' => 'system.tutorials.edit',
            'id'       => $tutorial->id,
        ];
    }

    public function show($route)
    {
        $homeTutorials = Tutorial::wherePermissionId(self::HomePermissionId)->orderBy('order')->get();
        $permission = Permission::whereName($route)->first();
        $localTutorials = $permission ? $permission->tutorials->sortBy('order') : collect();

        return $this->prepareTutorial($homeTutorials->merge($localTutorials));
    }

    public function edit(Tutorial $tutorial)
    {
        $form = (new FormBuilder(self::FormPath, $tutorial))
            ->setMethod('PATCH')
            ->setTitle('Edit Tutorial')
            ->setSelectOptions('permission_id', Permission::pluck('name', 'id'))
            ->setSelectOptions('placement', TutorialPlacement::object())
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
            'redirect' => 'system.tutorials.index',
        ];
    }

    private function prepareTutorial($tutorials)
    {
        return $tutorials->reduce(function ($tutorials, $tutorial) {
            $tutorials->push([
                'intro'               => __($tutorial->content),
                'element'             => $tutorial->element,
                'position'            => TutorialPlacement::get($tutorial->placement),
                'disable-interaction' => true,
            ]);

            return $tutorials;
        }, collect());
    }
}
