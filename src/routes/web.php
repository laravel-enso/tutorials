<?php

Route::middleware(['web', 'auth', 'core'])
    ->namespace('LaravelEnso\TutorialManager\app\Http\Controllers')
    ->group(function () {
        Route::prefix('system/tutorials')->as('system.tutorials.')
            ->group(function () {
                Route::get('initTable', 'TutorialController@initTable')
                    ->name('initTable');
                Route::get('getTableData', 'TutorialController@getTableData')
                    ->name('getTableData');
                Route::get('exportExcel', 'TutorialController@exportExcel')
                    ->name('exportExcel');

                Route::get('getTutorial/{route}', 'TutorialController@getTutorial')
                    ->name('getTutorial');
            });

        Route::prefix('system')->as('system.')
            ->group(function () {
                Route::resource('tutorials', 'TutorialController', ['except' => ['show']]);
            });
    });
