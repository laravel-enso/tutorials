<?php

namespace LaravelEnso\Tutorials\app\Http\Controllers;

use Illuminate\Routing\Controller;
use LaravelEnso\Tutorials\app\Http\Responses\Index;

class Load extends Controller
{
    public function __invoke()
    {
        return new Index;
    }
}
