<?php

namespace LaravelEnso\Tutorials\app\Http\Controllers;

use Illuminate\Routing\Controller;
use LaravelEnso\Tutorials\app\Forms\Builders\TutorialForm;
use LaravelEnso\Tutorials\app\Models\Tutorial;

class Edit extends Controller
{
    public function __invoke(Tutorial $tutorial, TutorialForm $form)
    {
        return ['form' => $form->edit($tutorial)];
    }
}
