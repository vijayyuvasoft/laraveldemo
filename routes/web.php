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
Route::resource('/google-analytics-credentials','GAController');

Route::get("/statistics-data","GADataStatistics@index");

Route::get("/statistics-graph","GADataStatistics@displayChart");

Auth::routes();

Route::get('/home', 'HomeController@index');
