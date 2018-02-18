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
	Route::get('getData','SubjectsController@getData')->name('getSubjectData');
	Route::post('postData','SubjectsController@postData')->name('postSubjectData');
	Route::get('fetchData','SubjectsController@fetchData')->name('fetchSubjectData');
	Route::get('removeData','SubjectsController@removeData')->name('removeSubjectData');
});

// Course
Route::prefix('courses')->group(function()
{
	Route::get('/','CoursesController@index')->name('courses');
	Route::get('getData','CoursesController@getData')->name('getCourseData');
	Route::post('postData','CoursesController@postData')->name('postCourseData');
	Route::get('fetchData','CoursesController@fetchData')->name('fetchCourseData');
	Route::get('removeData','CoursesController@removeData')->name('removeCourseData');
});

// User
Route::prefix('users')->group(function()
{
	Route::get('/','UsersController@index')->name('users');
	Route::get('getData','UsersController@getData')->name('getUserData');
	Route::post('postData','UsersController@postData')->name('postUserData');
	Route::get('fetchData','UsersController@fetchData')->name('fetchUserData');
	Route::get('removeData','UsersController@removeData')->name('removeUserData');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

