<?php

namespace LaravelEnso\Tutorials\app\Http\Controllers;

use Illuminate\Routing\Controller;
use LaravelEnso\Tables\app\Traits\Data;
use LaravelEnso\Tutorials\app\Tables\Builders\TutorialTable;

class TableData extends Controller
{
    use Data;

    protected $tableClass = TutorialTable::class;
}
