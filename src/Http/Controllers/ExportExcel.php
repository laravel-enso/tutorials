<?php

namespace LaravelEnso\Tutorials\Http\Controllers;

use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Excel;
use LaravelEnso\Tutorials\Tables\Builders\TutorialTable;

class ExportExcel extends Controller
{
    use Excel;

    protected $tableClass = TutorialTable::class;
}
