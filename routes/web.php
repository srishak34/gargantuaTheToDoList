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
//Viewwwws HAHA!
Route::resource('/task', 'TaskController');
//edit route
Route::get('/task/{id}/edit', 'TaskController@edit');
Route::put('/task/{id}', 'TaskController@update');
//delete route 
Route::delete('/task/{id}', 'TaskController@destroy');
