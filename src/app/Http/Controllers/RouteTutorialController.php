<?php

namespace LaravelEnso\TutorialManager\app\Http\Controllers;

use App\Http\Controllers\Controller;
use LaravelEnso\TutorialManager\app\Handlers\TutorialResource;

class RouteTutorialController extends Controller
{
    public function __invoke($route)
    {
        return (new TutorialResource($route))->collection();
    }
}
