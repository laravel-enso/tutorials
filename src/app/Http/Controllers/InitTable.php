<?php

namespace LaravelEnso\Tutorials\app\Http\Controllers;

use Illuminate\Routing\Controller;
use LaravelEnso\Tables\app\Traits\Init;
use LaravelEnso\Tutorials\app\Tables\Builders\TutorialTable;

class InitTable extends Controller
{
    use Init;

    protected $tableClass = TutorialTable::class;
}
