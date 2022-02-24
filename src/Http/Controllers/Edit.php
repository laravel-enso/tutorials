<?php

namespace LaravelEnso\Tutorials\Http\Controllers;

use Illuminate\Routing\Controller;
use LaravelEnso\Tutorials\Forms\Builders\Tutorial;
use LaravelEnso\Tutorials\Models\Tutorial as Model;

class Edit extends Controller
{
    public function __invoke(Model $tutorial, Tutorial $form)
    {
        return ['form' => $form->edit($tutorial)];
    }
}
