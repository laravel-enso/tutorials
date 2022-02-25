<?php

namespace LaravelEnso\Tutorials\Http\Controllers;

use Illuminate\Routing\Controller;
use LaravelEnso\Tutorials\Forms\Builders\Tutorial;

class Create extends Controller
{
    public function __invoke(Tutorial $form)
    {
        return ['form' => $form->create()];
    }
}
