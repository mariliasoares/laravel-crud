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

Route::get('/boats', 'BoatsController@index');
Route::get('/boats/criar', 'BoatsController@create');
Route::post('/boats/criar', 'BoatsController@store');
Route::get('/boats/{id}/editar', 'BoatsController@edit');
Route::post('/boats/{id}/editar', 'BoatsController@update');

Route::get('/boats/{id}/delete', [
    'as' => 'boats.delete',
    'uses' => 'BoatsController@destroy'
]);
