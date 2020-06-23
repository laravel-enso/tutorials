<?php

namespace LaravelEnso\Tutorials\Http\Controllers;

use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Data;
use LaravelEnso\Tutorials\Tables\Builders\TutorialTable;

class TableData extends Controller
{
    use Data;

    protected string $tableClass = TutorialTable::class;
}
