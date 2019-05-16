<?php

namespace LaravelEnso\Tutorials\app\Http\Controllers;

use Illuminate\Routing\Controller;
use LaravelEnso\Tables\app\Traits\Excel;
use LaravelEnso\Tables\app\Traits\Datatable;
use LaravelEnso\Tutorials\app\Tables\Builders\TutorialTable;

class Table extends Controller
{
    use Datatable, Excel;

    protected $tableClass = TutorialTable::class;
}
