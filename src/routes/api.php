<?php

Route::middleware(['web', 'auth', 'core'])
    ->prefix('api/system')->as('system.')
    ->namespace('LaravelEnso\TutorialManager\app\Http\Controllers')
    ->group(function () {
        Route::prefix('tutorials')->as('tutorials.')
            ->group(function () {
                Route::get('initTable', 'TutorialTableController@init')
                    ->name('initTable');
                Route::get('getTableData', 'TutorialTableController@data')
                    ->name('getTableData');
                Route::get('exportExcel', 'TutorialTableController@excel')
                    ->name('exportExcel');

                Route::get('show', 'RouteTutorialController')
                    ->name('show');
            });

        Route::resource('tutorials', 'TutorialController', ['except' => ['show', 'index']]);
    });
