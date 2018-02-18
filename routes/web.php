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
    return view('index');
});

// Subject
Route::prefix('subjects')->group(function()
{
	Route::get('/','SubjectsController@index')->name('subjects');
	Route::get('getData','SubjectsController@getData')->name('getData');
	Route::post('postData','SubjectsController@postData')->name('postData');
	Route::get('fetchData','SubjectsController@fetchData')->name('fetchData');
	Route::get('removeData','SubjectsController@removeData')->name('removeData');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

