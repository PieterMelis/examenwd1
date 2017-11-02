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


Route::get('/', 'WelcomeController@viewWinner');

Auth::routes();

Route::get('/home', 'HomeController@index')
    ->name('home');





/*--------------------Players-------------------------*/

Route::get('/playersView', 'PlayerController@index');
Route::get('/players/{id}', 'PlayerController@show');
Route::get('/delete/{id}', 'PlayerController@destroy');
Route::post('/delete/{id}', 'PlayerController@destroy');
Route::get('/player/{id}/edit', 'PlayerController@update');
Route::post('/player/{id}/edit', 'PlayerController@update');
Route::post('/PlayerSend', 'HomeController@store');
/*---------------------Periods-------------------------*/

Route::get('/allPeriods', 'periodsController@index');

Route::get('/period/{id}/edit', 'periodsController@edit');

Route::get('editPeriod/{id}', 'periodsController@update');
Route::post('editPeriod/{id}', 'periodsController@update');


/*---------------------question-------------------------*/


Route::get('/question', 'questionController@index');

Route::get('editQuestion/{id}', 'questionController@update');
Route::post('editQuestion/{id}', 'questionController@update');

Route::get('/wedstrijd', 'WelcomeController@questionView');


Route::get('/winner', 'questionController@makeWinners');
Route::post('/winner', 'questionController@makeWinners');










