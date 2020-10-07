<?php

use Illuminate\Support\Facades\Route;
use LaravelEnso\Tutorials\Http\Controllers\Create;
use LaravelEnso\Tutorials\Http\Controllers\Destroy;
use LaravelEnso\Tutorials\Http\Controllers\Edit;
use LaravelEnso\Tutorials\Http\Controllers\ExportExcel;
use LaravelEnso\Tutorials\Http\Controllers\InitTable;
use LaravelEnso\Tutorials\Http\Controllers\Load;
use LaravelEnso\Tutorials\Http\Controllers\Store;
use LaravelEnso\Tutorials\Http\Controllers\TableData;
use LaravelEnso\Tutorials\Http\Controllers\Update;

Route::middleware(['api', 'auth', 'core'])
    ->prefix('api/system/tutorials')
    ->as('system.tutorials.')
    ->group(function () {
        Route::get('create', Create::class)->name('create');
        Route::post('', Store::class)->name('store');
        Route::get('{tutorial}/edit', Edit::class)->name('edit');
        Route::patch('{tutorial}', Update::class)->name('update');
        Route::delete('{tutorial}', Destroy::class)->name('destroy');

        Route::get('initTable', InitTable::class)->name('initTable');
        Route::get('tableData', TableData::class)->name('tableData');
        Route::get('exportExcel', ExportExcel::class)->name('exportExcel');

        Route::get('load', Load::class)->name('load');
    });
