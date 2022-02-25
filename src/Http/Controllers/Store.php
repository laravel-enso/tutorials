<?php

namespace LaravelEnso\Tutorials\Http\Controllers;

use Illuminate\Routing\Controller;
use LaravelEnso\Tutorials\Http\Requests\ValidateTutorial;
use LaravelEnso\Tutorials\Models\Tutorial;

class Store extends Controller
{
    public function __invoke(ValidateTutorial $request, Tutorial $tutorial)
    {
        $tutorial->fill($request->validated())->save();

        return [
            'message' => __('The tutorial was created!'),
            'redirect' => 'system.tutorials.edit',
            'param' => ['tutorial' => $tutorial->id],
        ];
    }
}
