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

Route::get('/', 'HomeController@show')->name('home');
Route::get('/getproject/{id}','HomeController@ajaxGetProject');

Route::get('/projects', 'ProjectController@index')->name('projects');
Route::get('/projects/{project}', 'ProjectController@show')->name('projects.show');


// CATCH ALL FOR 404 INSTANCE... but mostly for refresh on page
Route::get('/{any}', 'HomeController@show')->name('homeRedirect')->where('any', '.*');

