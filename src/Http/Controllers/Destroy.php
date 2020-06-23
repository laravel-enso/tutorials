<?php

namespace LaravelEnso\Tutorials\Http\Controllers;

use Illuminate\Routing\Controller;
use LaravelEnso\Tutorials\Models\Tutorial;

class Destroy extends Controller
{
    public function __invoke(Tutorial $tutorial)
    {
        $tutorial->delete();

        return [
            'message' => __('The tutorial was successfully deleted'),
            'redirect' => 'system.tutorials.index',
        ];
    }
}
