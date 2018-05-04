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



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/jobs/create', 'JobsController@create')->middleware("auth");
Route::get('/jobs/moderation', 'JobsController@moderation')->middleware("auth");
Route::get('/job/approve/{id}', 'JobsController@approve')->middleware("auth");
Route::post('/jobs/save', 'JobsController@save')->middleware("auth");
