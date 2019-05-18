<?php

namespace LaravelEnso\Tutorials\app\Http\Controllers;

use Illuminate\Routing\Controller;
use LaravelEnso\Tables\app\Traits\Excel;
use LaravelEnso\Tutorials\app\Tables\Builders\TutorialTable;

class ExportExcel extends Controller
{
    use Excel;

    protected $tableClass = TutorialTable::class;
}
