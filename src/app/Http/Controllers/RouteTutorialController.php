<?php

namespace LaravelEnso\TutorialManager\app\Http\Controllers;

use Illuminate\Routing\Controller;
use LaravelEnso\TutorialManager\app\Http\Responses\TutorialsIndex;

class RouteTutorialController extends Controller
{
    public function __invoke()
    {
        return new TutorialsIndex();
    }
}
