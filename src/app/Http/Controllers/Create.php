<?php

namespace LaravelEnso\Tutorials\app\Http\Controllers;

use Illuminate\Routing\Controller;
use LaravelEnso\Tutorials\app\Forms\Builders\TutorialForm;

class Create extends Controller
{
    public function __invoke(TutorialForm $form)
    {
        return ['form' => $form->create()];
    }
}
