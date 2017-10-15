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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')
    ->name('home');

Route::get('/wedstrijd', 'HomeController@wedstrijd')
    ->name('wedstrijd');

Route::get('/win', 'HomeController@win')
    ->name('win');

Route::get('/user_dashboard', 'HomeController@user_dashboard')
    ->name('dashboard');

Route::post('/PlayerSend', 'PlayerController@store');


Route::get('/edit_question', 'HomeController@user_dashboard')
    ->name('edit');














