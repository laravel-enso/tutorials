<?php

namespace LaravelEnso\Tutorials\Http\Controllers;

use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Excel;
use LaravelEnso\Tutorials\Tables\Builders\Tutorial;

class ExportExcel extends Controller
{
    use Excel;

    protected $tableClass = Tutorial::class;
}
