<?php

namespace LaravelEnso\Tutorials\Http\Controllers;

use Illuminate\Routing\Controller;
use LaravelEnso\Tutorials\Http\Requests\ValidateTutorialRequest;
use LaravelEnso\Tutorials\Models\Tutorial;

class Update extends Controller
{
    public function __invoke(ValidateTutorialRequest $request, Tutorial $tutorial)
    {
        $tutorial->update($request->validated());

        return ['message' => __('The tutorial was successfully updated')];
    }
}
