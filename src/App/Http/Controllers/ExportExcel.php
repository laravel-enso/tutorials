<?php

namespace LaravelEnso\Tutorials\App\Http\Controllers;

use Illuminate\Routing\Controller;
use LaravelEnso\Tables\App\Traits\Excel;
use LaravelEnso\Tutorials\App\Tables\Builders\TutorialTable;

class ExportExcel extends Controller
{
    use Excel;

    protected $tableClass = TutorialTable::class;
}
