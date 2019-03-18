<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['namespace' => 'Api'], function () {

    Route::group(['prefix' => 'tasks'], function () {

        Route::get('/', 'TaskController@index');
        Route::get('/uncompleted', 'TaskController@uncompleted');
        Route::get('/completed', 'TaskController@completed');

        Route::post('/', 'TaskController@create');
        Route::post('/complete/{id}', 'TaskController@complete');
        Route::post('/uncomplete/{id}', 'TaskController@uncomplete');

        Route::put('/{id}', 'TaskController@edit');

        Route::delete('/{id}', 'TaskController@destroy');

    });
});