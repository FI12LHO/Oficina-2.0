<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/'], function () {
    // Create
    Route::get('/create', 'estimateController@create');
    Route::post('/create', 'estimateController@store');
    // Read
    Route::get('/', 'estimateController@index');
    // Update
    Route::get('/show/{id}', 'estimateController@show');
    Route::put('/edit/{id}', 'estimateController@edit');
    // Delete
    Route::get('/delete/{id}', 'estimateController@delete');
    Route::delete('/destroy/{id}', 'estimateController@destroy');
});