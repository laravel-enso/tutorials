<?php

namespace LaravelEnso\Tutorials\Http\Controllers;

use Illuminate\Routing\Controller;
use LaravelEnso\Tutorials\Http\Requests\ValidateTutorial;
use LaravelEnso\Tutorials\Models\Tutorial;

class Update extends Controller
{
    public function __invoke(ValidateTutorial $request, Tutorial $tutorial)
    {
        $tutorial->update($request->validated());

        return ['message' => __('The tutorial was successfully updated')];
    }
}
