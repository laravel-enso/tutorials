<?php

Route::group(['namespace' => 'LaravelEnso\TutorialManager\Http\Controllers', 'middleware' => ['web', 'auth', 'core']], function () {
    Route::group(['prefix' => 'system/tutorials', 'as' => 'system.tutorials.'], function () {
        Route::get('initTable', 'TutorialController@initTable')->name('initTable');
        Route::get('getTableData', 'TutorialController@getTableData')->name('getTableData');
        Route::get('getTutorial/{route}', 'TutorialController@getTutorial')->name('getTutorial');
    });

    Route::group(['prefix' => 'system', 'as' => 'system.'], function () {
        Route::resource('tutorials', 'TutorialController');
    });
});