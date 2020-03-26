<?php

namespace LaravelEnso\Tutorials\App\Http\Controllers;

use Illuminate\Routing\Controller;
use LaravelEnso\Tutorials\App\Forms\Builders\TutorialForm;

class Create extends Controller
{
    public function __invoke(TutorialForm $form)
    {
        return ['form' => $form->create()];
    }
}
