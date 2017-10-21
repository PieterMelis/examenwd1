<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'questionController@viewWinner');

Auth::routes();

Route::get('/home', 'HomeController@index')
    ->name('home');



Route::post('/PlayerSend', 'PlayerController@store')
    ->name('playersend');




/*--------------------Players-------------------------*/

Route::get('/playersView', 'PlayerController@index');
Route::get('/players/{id}', 'PlayerController@show');
Route::get('/delete/{id}', 'PlayerController@destroy');
Route::post('/delete/{id}', 'PlayerController@destroy');
Route::get('/player/{id}/edit', 'PlayerController@update');
Route::post('/player/{id}/edit', 'PlayerController@update');

/*---------------------Periods-------------------------*/

Route::get('/allPeriods', 'PeriodsController@index');

Route::get('/period/{id}/edit', 'PeriodsController@edit');

Route::get('editPeriod/{id}', 'PeriodsController@update');
Route::post('editPeriod/{id}', 'PeriodsController@update');


/*---------------------question-------------------------*/


Route::get('/question', 'questionController@index');

Route::get('editQuestion/{id}', 'questionController@update');
Route::post('editQuestion/{id}', 'questionController@update');

Route::get('/wedstrijd', 'questionController@questionView');


Route::get('/winner', 'questionController@makeWinners');











