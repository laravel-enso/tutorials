<?php

namespace LaravelEnso\Tutorials\Http\Controllers;

use Illuminate\Routing\Controller;
use LaravelEnso\Tutorials\Forms\Builders\TutorialForm;
use LaravelEnso\Tutorials\Models\Tutorial;

class Edit extends Controller
{
    public function __invoke(Tutorial $tutorial, TutorialForm $form)
    {
        return ['form' => $form->edit($tutorial)];
    }
}
