<?php

namespace LaravelEnso\TutorialManager\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use LaravelEnso\TutorialManager\app\Http\Requests\ValidateTutorialRequest;
use LaravelEnso\TutorialManager\app\Http\Services\TutorialService;
use LaravelEnso\TutorialManager\app\Models\Tutorial;

class TutorialController extends Controller
{
    private $tutorials;

    public function __construct(Request $request)
    {
        $this->tutorials = new TutorialService($request);
    }

    public function index()
    {
        return view('laravel-enso/tutorials::index');
    }

    public function create()
    {
        return $this->tutorials->create();
    }

    public function store(ValidateTutorialRequest $request, Tutorial $tutorial)
    {
        return $this->tutorials->store($tutorial);
    }

    public function edit(Tutorial $tutorial)
    {
        return $this->tutorials->edit($tutorial);
    }

    public function update(ValidateTutorialRequest $request, Tutorial $tutorial)
    {
        return $this->tutorials->update($tutorial);
    }

    public function destroy(Tutorial $tutorial)
    {
        return $this->tutorials->destroy($tutorial);
    }

    public function show($route)
    {
        return $this->tutorials->show($route);
    }
}
