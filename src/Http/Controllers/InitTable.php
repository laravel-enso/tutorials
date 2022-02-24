<?php

namespace LaravelEnso\Tutorials\Http\Controllers;

use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Init;
use LaravelEnso\Tutorials\Tables\Builders\Tutorial;

class InitTable extends Controller
{
    use Init;

    protected string $tableClass = Tutorial::class;
}
