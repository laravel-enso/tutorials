<?php

namespace LaravelEnso\Tutorials\app\Http\Controllers;

use Illuminate\Routing\Controller;
use LaravelEnso\Tutorials\app\Http\Responses\Show as Response;

class Show extends Controller
{
    public function __invoke()
    {
        return new Response;
    }
}
