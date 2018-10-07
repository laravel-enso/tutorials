<?php

namespace LaravelEnso\TutorialManager\app\Http\Controllers;

use Illuminate\Routing\Controller;
use LaravelEnso\TutorialManager\app\Models\Tutorial;
use LaravelEnso\TutorialManager\app\Forms\Builders\TutorialForm;
use LaravelEnso\TutorialManager\app\Http\Requests\ValidateTutorialRequest;

class TutorialController extends Controller
{
    public function create(TutorialForm $form)
    {
        return ['form' => $form->create()];
    }

    public function store(ValidateTutorialRequest $request)
    {
        $tutorial = Tutorial::create($request->validated());

        return [
            'message' => __('The tutorial was created!'),
            'redirect' => 'system.tutorials.edit',
            'id' => $tutorial->id,
        ];
    }

    public function edit(Tutorial $tutorial, TutorialForm $form)
    {
        return ['form' => $form->edit($tutorial)];
    }

    public function update(ValidateTutorialRequest $request, Tutorial $tutorial)
    {
        $tutorial->update($request->validated());

        return [
            'message' => __('The tutorial was successfully updated'),
        ];
    }

    public function destroy(Tutorial $tutorial)
    {
        $tutorial->delete();

        return [
            'message' => __('The tutorial was successfully deleted'),
            'redirect' => 'system.tutorials.index',
        ];
    }
}
