<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['api', 'auth', 'core'])
    ->prefix('api/system/tutorials')
    ->as('system.tutorials.')
    ->namespace('LaravelEnso\Tutorials\Http\Controllers')
    ->group(function () {
        Route::get('create', 'Create')->name('create');
        Route::post('', 'Store')->name('store');
        Route::get('{tutorial}/edit', 'Edit')->name('edit');
        Route::patch('{tutorial}', 'Update')->name('update');
        Route::delete('{tutorial}', 'Destroy')->name('destroy');

        Route::get('initTable', 'InitTable')->name('initTable');
        Route::get('tableData', 'TableData')->name('tableData');
        Route::get('exportExcel', 'ExportExcel')->name('exportExcel');

        Route::get('load', 'Load')->name('load');
    });
