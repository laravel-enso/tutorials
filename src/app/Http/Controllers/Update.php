<?php

namespace LaravelEnso\Tutorials\App\Http\Controllers;

use Illuminate\Routing\Controller;
use LaravelEnso\Tutorials\App\Http\Requests\ValidateTutorialRequest;
use LaravelEnso\Tutorials\App\Models\Tutorial;

class Update extends Controller
{
    public function __invoke(ValidateTutorialRequest $request, Tutorial $tutorial)
    {
        $tutorial->update($request->validated());

        return ['message' => __('The tutorial was successfully updated')];
    }
}
