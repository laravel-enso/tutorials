<?php

namespace LaravelEnso\Tutorials\App\Http\Controllers;

use Illuminate\Routing\Controller;
use LaravelEnso\Tutorials\App\Http\Responses\Index;

class Load extends Controller
{
    public function __invoke()
    {
        return new Index();
    }
}
