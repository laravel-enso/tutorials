<?php

namespace LaravelEnso\Tutorials\Http\Controllers;

use Illuminate\Routing\Controller;
use LaravelEnso\Tutorials\Http\Responses\Index;

class Load extends Controller
{
    public function __invoke()
    {
        return new Index();
    }
}
