<?php

namespace LaravelEnso\Tutorials\App\Http\Controllers;

use Illuminate\Routing\Controller;
use LaravelEnso\Tables\App\Traits\Init;
use LaravelEnso\Tutorials\App\Tables\Builders\TutorialTable;

class InitTable extends Controller
{
    use Init;

    protected string $tableClass = TutorialTable::class;
}
