<?php

namespace LaravelEnso\Tutorials\Http\Controllers;

use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Init;
use LaravelEnso\Tutorials\Tables\Builders\TutorialTable;

class InitTable extends Controller
{
    use Init;

    protected string $tableClass = TutorialTable::class;
}
