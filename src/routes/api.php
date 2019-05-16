<?php

Route::middleware(['web', 'auth', 'core'])
    ->prefix('api/system/tutorials')
    ->as('system.tutorials.')
    ->namespace('LaravelEnso\Tutorials\app\Http\Controllers')
    ->group(function () {
        Route::get('create', 'Create')->name('create');
        Route::post('', 'Store')->name('store');
        Route::get('{tutorial}/edit', 'Edit')->name('edit');
        Route::patch('{tutorial}', 'Update')->name('update');
        Route::delete('{tutorial}', 'Destroy')->name('destroy');
        
        Route::get('initTable', 'Table@init')->name('initTable');
        Route::get('tableData', 'Table@data')->name('tableData');
        Route::get('exportExcel', 'Table@excel')->name('exportExcel');

        Route::get('show', 'Show')->name('show');
    });
