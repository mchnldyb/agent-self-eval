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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/agent/admin', 'HomeController@adminIndex')->name('adminhome');
Route::get('/agent/add', 'AgentController@index')->name('agentadd');
Route::get('/agent/view', 'AgentController@showAll')->name('agentview');

Route::post('/agents', 'AgentController@store');