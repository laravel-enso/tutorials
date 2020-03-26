<?php

namespace LaravelEnso\Tutorials\App\Http\Controllers;

use Illuminate\Routing\Controller;
use LaravelEnso\Tutorials\App\Forms\Builders\TutorialForm;
use LaravelEnso\Tutorials\App\Models\Tutorial;

class Edit extends Controller
{
    public function __invoke(Tutorial $tutorial, TutorialForm $form)
    {
        return ['form' => $form->edit($tutorial)];
    }
}
