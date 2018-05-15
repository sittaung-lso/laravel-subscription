<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('pay/{plan}', 'PaymentsController@pay')->name('pay');
Route::post('pay/{plan}', 'PaymentsController@pay');
Route::get('cancel', 'PaymentsController@cancel')->name('cancel');
