<?php

namespace LaravelEnso\TutorialManager\app\Http\Controllers;

use App\Http\Controllers\Controller;
use LaravelEnso\TutorialManager\app\Models\Tutorial;
use LaravelEnso\TutorialManager\app\Http\Services\TutorialService;
use LaravelEnso\TutorialManager\app\Http\Requests\ValidateTutorialRequest;

class TutorialController extends Controller
{
    public function create(TutorialService $service)
    {
        return $service->create();
    }

    public function store(ValidateTutorialRequest $request, TutorialService $service)
    {
        return $service->store($request);
    }

    public function show(string $route, TutorialService $service)
    {
        return $service->show($route);
    }

    public function edit(Tutorial $tutorial, TutorialService $service)
    {
        return $service->edit($tutorial);
    }

    public function update(ValidateTutorialRequest $request, Tutorial $tutorial, TutorialService $service)
    {
        return $service->update($request, $tutorial);
    }

    public function destroy(Tutorial $tutorial, TutorialService $service)
    {
        return $service->destroy($tutorial);
    }
}
