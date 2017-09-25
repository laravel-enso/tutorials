<?php

namespace LaravelEnso\TutorialManager\app\Http\Controllers;

use App\Http\Controllers\Controller;
use LaravelEnso\TutorialManager\app\Http\Requests\ValidateTutorialRequest;
use LaravelEnso\TutorialManager\app\Http\Services\TutorialService;
use LaravelEnso\TutorialManager\app\Models\Tutorial;

class TutorialController extends Controller
{
    private $service;

    public function __construct(TutorialService $service)
    {
        $this->service = $service;
    }

    public function create()
    {
        return $this->service->create();
    }

    public function store(ValidateTutorialRequest $request)
    {
        return $this->service->store($request);
    }

    public function show(string $route)
    {
        return $this->service->show($route);
    }

    public function edit(Tutorial $tutorial)
    {
        return $this->service->edit($tutorial);
    }

    public function update(ValidateTutorialRequest $request, Tutorial $tutorial)
    {
        return $this->service->update($request, $tutorial);
    }

    public function destroy(Tutorial $tutorial)
    {
        return $this->service->destroy($tutorial);
    }
}
