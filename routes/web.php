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


Route::get('/', 'WelcomeController@index')
    ->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')
    ->name('home');

Route::get('/wedstrijd', 'WelcomeController@wedstrijd')
    ->name('wedstrijd');






Route::post('/PlayerSend', 'PlayerController@store')
    ->name('playersend');






Route::get('/playersView', 'PlayerController@index');
Route::get('/players/{id}', 'PlayerController@show');
Route::get('/delete/{id}', 'PlayerController@destroy');
Route::post('/delete/{id}', 'PlayerController@destroy');

Route::get('/player/{id}/edit', 'PlayerController@update');
Route::post('/player/{id}/edit', 'PlayerController@update');








