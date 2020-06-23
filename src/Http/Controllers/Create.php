<?php

namespace LaravelEnso\Tutorials\Http\Controllers;

use Illuminate\Routing\Controller;
use LaravelEnso\Tutorials\Forms\Builders\TutorialForm;

class Create extends Controller
{
    public function __invoke(TutorialForm $form)
    {
        return ['form' => $form->create()];
    }
}
