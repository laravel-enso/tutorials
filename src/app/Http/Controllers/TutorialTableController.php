<?php

namespace LaravelEnso\TutorialManager\app\Http\Controllers;

use App\Http\Controllers\Controller;
use LaravelEnso\VueDatatable\app\Traits\Excel;
use LaravelEnso\VueDatatable\app\Traits\Datatable;
use LaravelEnso\TutorialManager\app\Tables\Builders\TutorialTable;

class TutorialTableController extends Controller
{
    use Datatable, Excel;

    protected $tableClass = TutorialTable::class;
}
