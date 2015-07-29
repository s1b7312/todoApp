<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/','TodoAppController@index');
Route::get('todoapp/','TodoAppController@index');

Route::post('/api/todos/getById','TodosController@getById');
Route::resource('/api/todos','TodosController');


?>