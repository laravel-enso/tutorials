<?php

Route::middleware(['web', 'auth', 'core'])
    ->prefix('api/system')->as('system.')
    ->namespace('LaravelEnso\TutorialManager\app\Http\Controllers')
    ->group(function () {
        Route::prefix('tutorials')->as('tutorials.')
            ->group(function () {
                Route::get('initTable', 'TutorialTableController@initTable')
                    ->name('initTable');
                Route::get('getTableData', 'TutorialTableController@getTableData')
                    ->name('getTableData');
                Route::get('exportExcel', 'TutorialTableController@exportExcel')
                    ->name('exportExcel');
            });

        Route::resource('tutorials', 'TutorialController');
    });
