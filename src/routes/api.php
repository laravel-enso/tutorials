<?php

Route::middleware(['auth:api', 'api', 'core'])
    ->prefix('api')
    ->namespace('LaravelEnso\TutorialManager\app\Http\Controllers')
    ->group(function () {
        Route::prefix('system/tutorials')->as('system.tutorials.')
            ->group(function () {
                Route::get('initTable', 'TutorialTableController@initTable')
                    ->name('initTable');
                Route::get('getTableData', 'TutorialTableController@getTableData')
                    ->name('getTableData');
                Route::get('exportExcel', 'TutorialTableController@exportExcel')
                    ->name('exportExcel');
            });

        Route::prefix('system')->as('system.')
            ->group(function () {
                Route::resource('tutorials', 'TutorialController');
            });
    });
