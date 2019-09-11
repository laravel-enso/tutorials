<?php

namespace LaravelEnso\Tutorials\app\Http\Controllers;

use Illuminate\Routing\Controller;
use LaravelEnso\Tutorials\app\Models\Tutorial;
use LaravelEnso\Tutorials\app\Http\Requests\ValidateTutorialRequest;

class Update extends Controller
{
    public function __invoke(ValidateTutorialRequest $request, Tutorial $tutorial)
    {
        $tutorial->update($request->validated());

        return ['message' => __('The tutorial was successfully updated')];
    }
}
