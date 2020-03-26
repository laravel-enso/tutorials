<?php

namespace LaravelEnso\Tutorials\App\Http\Controllers;

use Illuminate\Routing\Controller;
use LaravelEnso\Tables\App\Traits\Data;
use LaravelEnso\Tutorials\App\Tables\Builders\TutorialTable;

class TableData extends Controller
{
    use Data;

    protected string $tableClass = TutorialTable::class;
}
